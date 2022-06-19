<?php

namespace App\Http\Controllers;

use App\Mail\SendMailConfirmarEvento;
use App\Mail\SendMailRemoveEvento;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventConfirm;
use Illuminate\Support\Facades\Mail;
use App\Notifications\CancelEvent;
use App\Notifications\ConfirmEvent;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class FullCalenderController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission');
        $this->middleware('system');
    }

    public function index(Request $request)
    {
        $this->get_tenant();
        if ($request->ajax()) {
            //consulta em json
            $data = Event::whereDate('start', '>=', $request->start)
                ->whereDate('end',   '<=', $request->end)
                ->get(['id', 'title', 'start', 'end']);

            return response()->json($data);
        }
        //consulta de eventos
        $eventos = Event::orderBy('start', 'desc')->paginate(9);
        return view('calender.fullcalender', compact('eventos'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function ajax(Request $request)
    {
        $this->get_tenant();
        $user = auth()->user();
        switch ($request->type) {
            case 'add':
                $event = Event::create([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                    'user_id' => $user->id,
                ]);
                //adicionar log
                $this->adicionar_log('4', 'C', $event);
                return response()->json($event);
                break;

            case 'update':
                $event = Event::find($request->id)->update([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);
                //adicionar log
                $this->adicionar_log('4', 'U', $event);
                return response()->json($event);
                break;

            case 'delete':
                $student = Event::where('id', $request->id)->get()->toJson();
                $event = Event::find($request->id)->delete();
                //adicionar log
                $this->adicionar_log('4', 'D', $student);
                return response()->json($event);
                break;

            default:
                # code...
                break;
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //carregar status
        return view('calender.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //pegar tenant
        $this->get_tenant();
        $validatedData = $request->validate([
            'title'             => 'required|min:1|max:64',
        ]);
        //user data
        $user = auth()->user();
        $event = new Event();
        $event->title     = $request->input('title');
        $event->body     = $request->input('body');
        $event->start   = $request->input('start');
        $event->end = $request->input('end');
        $event->hora_inicio = $request->input('hora_inicio');
        $event->hora_fim = $request->input('hora_fim');
        $event->status       = $request->has('status') ? 1 : 0;
        $event->requer_aprovacao       = $request->has('requer_aprovacao') ? 1 : 0;
        $event->user_id = $user->id;

        $event->save();
        //adicionar log
        $this->adicionar_log('4', 'U', $event);
        $request->session()->flash('message', 'Successfully edited event');
        return redirect()->route('calender.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //pegar tenant
        $this->get_tenant();
        $event = Event::find($id);
        $pessoas = EventConfirm::with('pessoaconfirmacao:id,name')->where('event_id', $id)->get();
        //validar o id se existe
        if ($event == null) {
            session()->flash("danger", "Erro interno");
            return redirect()->route('calender.index');
        }
        //carregar status
        return view('calender.edit', ['event' => $event, 'pessoas' => $pessoas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //pegar tenant
        $this->get_tenant();
        //die();
        $validatedData = $request->validate([
            'title'             => 'required|min:1|max:64',
        ]);

        $event = Event::find($id);
        $event->title     = $request->input('title');
        $event->body     = $request->input('body');
        $event->start   = $request->input('start');
        $event->end = $request->input('end');
        $event->hora_inicio = $request->input('hora_inicio');
        $event->hora_fim = $request->input('hora_fim');
        $event->status       = $request->has('status') ? 1 : 0;
        $event->requer_aprovacao       = $request->has('requer_aprovacao') ? 1 : 0;
        $event->save();
        //adicionar log
        $this->adicionar_log('4', 'U', $event);
        $request->session()->flash('message', 'Successfully edited event');
        return redirect()->back();
    }

    public function storeConfirm(Request $request, $id)
    {
        //pegar tenant
        $this->get_tenant();
        //user data
        $user = auth()->user();
        //validar se ja possui evento cadastrado
        $validar = EventConfirm::where('event_id', $id)->where('people_id', $user->people->id)->count();
        if ($validar == 0) {
            //pesquisar sobre o evento
            $evento = Event::find($id);
            $event = new EventConfirm();
            if ($evento->requer_aprovacao == false) {
                $event->event_id = $id;
                $event->people_id = $user->people->id;
                $event->aprovado = true;
                $event->save();
                //adicionar log
                $this->adicionar_log('18', 'C', $event);
                //disparar email
                $conta_name = session()->get('conta_name');
                //Mail::to($user->email)->queue(new SendMailConfirmarEvento($conta_name));
                //teste
                $details = [
                    'subject' => 'Evento Confirmado - ' . $conta_name,
                    'greeting' => 'Presença confirmada no evento',
                    'body' => 'Sua presença foi confirmada no evento ' . $evento->title . ', acesse nossa plataforma para mais detalhes.',
                    'date' => 'Data do evento: ' . $evento->start . ' até ' . $evento->end,
                    'actionText' => 'Acessar',
                    'actionURL' => url('/eventos'),
                    'event_id' => $id
                ];
                FacadesNotification::send($user, new ConfirmEvent($details));

                $request->session()->flash('message', 'Presença confirmada');
                return redirect()->route('indexEventos');
            } else {
                $event->event_id = $id;
                $event->people_id = $user->people->id;
                $event->aprovado = false;
                $event->save();
                //adicionar log
                $this->adicionar_log('18', 'C', $event);
                //disparar email
                $conta_name = session()->get('conta_name');
                //Mail::to($user->email)->queue(new SendMailConfirmarEvento($conta_name));
                //teste
                $details = [
                    'subject' => 'Evento Cadastrado - ' . $conta_name,
                    'greeting' => 'Presença confirmada no evento',
                    'body' => 'Sua presença foi confirmada no evento ' . $evento->title . ', mas requer a aprovação de um administrador, acesse nossa plataforma para mais detalhes.',
                    'date' => 'Data do evento: ' . $evento->start . ' até ' . $evento->end,
                    'actionText' => 'Acessar',
                    'actionURL' => url('/eventos'),
                    'event_id' => $id
                ];
                FacadesNotification::send($user, new ConfirmEvent($details));

                $request->session()->flash('message', 'Presença confirmada, aguarde aprovação');
                return redirect()->route('indexEventos');
            }
        } else
            $request->session()->flash('info', 'Presença já confirmada');
        return redirect()->route('indexEventos');
    }

    public function storeRemove(Request $request, $id)
    {
        //pegar tenant
        $this->get_tenant();
        //user data
        $user = auth()->user();
        //disparar email
        $conta_name = session()->get('conta_name');
        //Mail::to($user->email)->queue(new SendMailRemoveEvento($conta_name));
        //validar se ja possui evento cadastrado
        $event = EventConfirm::find($id);
        //adicionar log
        $this->adicionar_log('18', 'D', $event);
        //pesquisar sobre o evento
        $evento = Event::select('title')->find($event->event_id);
        //teste
        $details = [
            'subject' => 'Evento cancelado - ' . $conta_name,
            'greeting' => 'Presença cancelada no evento ',
            'body' => 'Sua presença foi cancelada no evento ' . $evento->title . ', acesse nossa plataforma para mais detalhes.',
            'actionText' => 'Acessar',
            'actionURL' => url('/eventos'),
            'event_id' => $id
        ];

        FacadesNotification::send($user, new CancelEvent($details));

        $event->delete();

        $request->session()->flash('danger', 'Presença retirada');
        return redirect()->route('indexEventos');
    }

    public function aprovar($id)
    {
        $event = EventConfirm::find($id);
        $event->aprovado = true;
        $event->save();
        //adicionar log
        $this->adicionar_log('18', 'U', $event);
        //adicionar log
        session()->flash('success', 'Aprovado comm sucesso!');
        return redirect()->back();
    }

    public function reprovar($id)
    {
        $event = EventConfirm::find($id);
        $event->aprovado = false;
        $event->save();
        //adicionar log
        $this->adicionar_log('18', 'U', $event);
        //adicionar log
        session()->flash('success', 'Reprovado comm sucesso!');
        return redirect()->back();
    }
}
