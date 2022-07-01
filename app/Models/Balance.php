<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB as FacadesDB;

class Balance extends Model
{
    public $timestamps = false;
    protected $connection = 'tenant';

    public function deposit($valor, $pag, $date_lancamento, $observacao, $tipo, $people, $date, $sub_total, $total_tax, $discount, $contas_financeiras): array
    {

        FacadesDB::beginTransaction();
        //dd($valor)
        $totalBefore = $this->amount ? $this->amount : 0;
        $this->amount += number_format($valor, 2, '.', '');
        $deposit = $this->save();

        $historic = Historic::create([
            'balance_id' => $contas_financeiras,
            'type' => 'I',
            'amount' => $valor,
            'tipo' => $tipo,
            'date' => date($date_lancamento),
            'observacao' => $observacao,
            'pag' => $pag,
            'total_before' => $totalBefore,
            'user_id_transaction' => $people,
            'total_after' => $this->amount,
            'user_id' => auth()->user()->id,
            'itens' => json_encode($date),
            'sub_total' => $sub_total,
            'total_tax' => $total_tax,
            'discount' => $discount
        ]);
        if ($deposit && $historic) {
            $this->adicionar_log('5', 'C', $historic);
            FacadesDB::commit();
            return [
                'success' => true,
                'message' => 'Depositado com sucesso!',
            ];
        } else {

            FacadesDB::rollback();

            return [
                'success' => false,
                'message' => 'Ocorreu um erro!',
            ];
        }
    }

    public function withdraw(float $valor, $pag, $date_lancamento, $observacao, $tipo, $retiradaconta): array
    {
        Config::set('database.connections.tenant.schema', session()->get('conexao'));

        if ($this->amount < $valor) {
            return [
                'success' => false,
                'message' => 'Seu saldo é insuficiente para efetuar saque',
            ];
        }

        FacadesDB::beginTransaction();
        //dd($valor);
        $totalBefore = $this->amount ? $this->amount : 0;
        $this->amount -= number_format($valor, 2, '.', '');
        $withdraw = $this->save();

        $historic = Historic::create([
            'balance_id' => $retiradaconta,
            'type' => 'O',
            'amount' => $valor,
            'sub_total' => $valor,
            'total_before' => $totalBefore,
            'total_after' => $this->amount,
            'date' => date($date_lancamento),
            'tipo' => $tipo,
            'observacao' => $observacao,
            'pag' => $pag,
            'total_before' => $totalBefore,
            'user_id' => auth()->user()->id,
            'total_tax' => '0',
            'discount' => '0'
        ]);

        if ($withdraw && $historic) {
            $this->adicionar_log('5', 'C', $historic);
            FacadesDB::commit();

            return [
                'success' => true,
                'message' => 'Saque efetuado com sucesso!',
            ];
        } else {

            FacadesDB::rollback();

            return [
                'success' => false,
                'message' => 'Ocorreu um erro na tentativa de saque!',
            ];
        }
    }

    // transfer
    public function transfer(float $valor, $entrada): array
    {
          if ($this->amount < $valor)
        return [
            'success' => false,
            'message' => 'Saldo insuficiente'
        ];

        FacadesDB::beginTransaction();

        // atualiza proprio saldo e historico
        $totalBefore = $this->amount ? $this->amount : 0;
        $this->amount -= number_format($valor, 2, '.', '');
        $transfer = $this->save();

        $historic = Historic::create([
            'type'                 => 'T',
            'amount'               => $valor,
            'total_before'         => $totalBefore,
            'total_after'          => $this->amount,
            'date'                 => date('Ymd'),
            'sub_total' => $valor,
            'balance_id'    => $entrada,
            'user_id'  => auth()->user()->id,
            'total_tax' => '0',
            'discount' => '0'
        ]);

        // atualiza o saldo e historico do destinatário
        $senderBalance = Balance::find($entrada);
        $totalBeforeSender = $senderBalance->amount ? $senderBalance->amount : 0;
        $senderBalance->amount += number_format($valor, 2, '.', '');
        $transferSender = $senderBalance->save();

        $historicSender = Historic::create([
            'type'                 => 'I',
            'amount'               => $valor,
            'total_before'         => $totalBeforeSender,
            'total_after'          => $senderBalance->amount,
            'date'                 => date('Ymd'),
            'sub_total' => $valor,
            'balance_id'    => $this->id,
            'user_id'  => auth()->user()->id,
            'total_tax' => '0',
            'discount' => '0'
        ]);

        if ($transfer && $historic && $transferSender && $historicSender) {
            $this->adicionar_log('5', 'C', $historic);
            FacadesDB::commit();

            return [
                'success' => true,
                'message' => 'Sucesso ao transferir!'
            ];
        }
        FacadesDB::rollBack();
    }


    public function adicionar_log($status, $type, $json)
    {
        $auditoria = Auditoria::firstOrCreate([]);
        $auditoria->log($status, $type, $json);
    }
}
