<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission');
        $this->middleware('system');
    }

    public function show($id)
    {
        //pegar tenant
        $this->get_tenant();

        $post = Post::find($id);

        if (!$post) {
            session()->flash("info", "Post não encontrado");
            return view('timeline.index');
        }

        $comments = $post->comments()->with('user:id,name,profile_image')->get();
        return view('timeline.show', compact('post', 'comments'));
    }

    public function getArticles(Request $request)
    {
        $results = Post::orderBy('id', 'desc')->with('user:id,name,profile_image')->withCount('comments', 'likes')
            ->with('likes', function ($like) {
                return $like->where('user_id', auth()->user()->id)
                    ->select('id', 'user_id', 'post_id');
            })
            ->paginate(5);
        $artilces = '';
        
        if ($request->ajax()) {
            foreach ($results as $result) {
                $artilces .= '
                <div class="card">
                <div class="card-header d-flex  justify-content-between">
                    <div class="header-title">
                        <div class="d-flex justify-content-center flex-wrap gap-3">
                            <img class="img-fluid rounded-circle p-1 border border-2 border-primary border-dotted avatar-50"
                                src="' . $result->user->profile_image . '"
                                alt="profile-img" loading="lazy" />
                            <div class="media-support-info">
                                <div class="d-flex align-items-center mb-2 gap-2">
                                    <h6 class="mb-0">' . $result->user->name . '</h6>
                                    <small class="text-dark">Added New Post</small>
                                </div>
                                <p class="mb-0 text-muted">' . datarecente($result->created_at) . '</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="user-post">
                        <img src="'. $result->image .'"
                            class="img-fluid rounded" alt="post-image" data-bs-toggle="modal"
                            data-bs-target="#image-modal" role="button" loading="lazy">
                            '. $result->body .'
                    </div>
                    <div class="comment-area pt-3">
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                            <div class="d-flex align-items-center gap-3">
                                <div class="total-like-block">
                                    <div class="dropdown">
                                        <a href="javascript:void(0);"
                                            class="text-body d-flex align-items-center gap-2"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.4"
                                                    d="M11.7761 21.8374C9.49311 20.4273 7.37081 18.7645 5.44807 16.8796C4.09069 15.5338 3.05404 13.8905 2.41735 12.0753C1.27971 8.53523 2.60399 4.48948 6.30129 3.2884C8.2528 2.67553 10.3752 3.05175 12.0072 4.29983C13.6398 3.05315 15.7616 2.67705 17.7132 3.2884C21.4105 4.48948 22.7436 8.53523 21.606 12.0753C20.9745 13.8888 19.944 15.5319 18.5931 16.8796C16.6686 18.7625 14.5465 20.4251 12.265 21.8374L12.0161 22L11.7761 21.8374Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M12.0109 22.0001L11.776 21.8375C9.49013 20.4275 7.36487 18.7648 5.43902 16.8797C4.0752 15.5357 3.03238 13.8923 2.39052 12.0754C1.26177 8.53532 2.58605 4.48957 6.28335 3.28849C8.23486 2.67562 10.3853 3.05213 12.0109 4.31067V22.0001Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M18.2304 9.99922C18.0296 9.98629 17.8425 9.8859 17.7131 9.72157C17.5836 9.55723 17.5232 9.3434 17.5459 9.13016C17.5677 8.4278 17.168 7.78851 16.5517 7.53977C16.1609 7.43309 15.9243 7.00987 16.022 6.59249C16.1148 6.18182 16.4993 5.92647 16.8858 6.0189C16.9346 6.027 16.9816 6.04468 17.0244 6.07105C18.2601 6.54658 19.0601 7.82641 18.9965 9.22576C18.9944 9.43785 18.9117 9.63998 18.7673 9.78581C18.6229 9.93164 18.4291 10.0087 18.2304 9.99922Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                            <span class=" d-none d-sm-block">'. $result->likes->count() .' Likes</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="total-comment-block">
                                    <div class="dropdown">
                                        <a href="/timeline/' . $result->id . '"
                                            class="text-body d-flex align-items-center gap-2"
                                            >
                                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.4"
                                                    d="M12.02 2C6.21 2 2 6.74 2 12C2 13.68 2.49 15.41 3.35 16.99C3.51 17.25 3.53 17.58 3.42 17.89L2.75 20.13C2.6 20.67 3.06 21.07 3.57 20.91L5.59 20.31C6.14 20.13 6.57 20.36 7.081 20.67C8.541 21.53 10.36 21.97 12 21.97C16.96 21.97 22 18.14 22 11.97C22 6.65 17.7 2 12.02 2Z"
                                                    fill="currentColor"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M11.9807 13.2901C11.2707 13.2801 10.7007 12.7101 10.7007 12.0001C10.7007 11.3001 11.2807 10.7201 11.9807 10.7301C12.6907 10.7301 13.2607 11.3001 13.2607 12.0101C13.2607 12.7101 12.6907 13.2901 11.9807 13.2901ZM7.37033 13.2901C6.67033 13.2901 6.09033 12.7101 6.09033 12.0101C6.09033 11.3001 6.66033 10.7301 7.37033 10.7301C8.08033 10.7301 8.65033 11.3001 8.65033 12.0101C8.65033 12.7101 8.08033 13.2801 7.37033 13.2901ZM15.3105 12.0101C15.3105 12.7101 15.8805 13.2901 16.5905 13.2901C17.3005 13.2901 17.8705 12.7101 17.8705 12.0101C17.8705 11.3001 17.3005 10.7301 16.5905 10.7301C15.8805 10.7301 15.3105 11.3001 15.3105 12.0101Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                            <span class=" d-none d-sm-block">' . $result->comments->count() . ' Comments</span>
                                        </a>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="text-body d-flex align-items-center gap-2"
                                    data-bs-toggle="offcanvas" data-bs-target="#share-btn" aria-controls="share-btn">
                                    <svg class="icon-20" xmlns="http://www.w3.org/2000/svg" width="20"
                                        viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M5.50052 15C6.37518 14.9974 7.21675 14.6653 7.85752 14.07L14.1175 17.647C13.9078 18.4666 14.0002 19.3343 14.378 20.0913C14.7557 20.8483 15.3935 21.4439 16.1745 21.7692C16.9555 22.0944 17.8275 22.1274 18.6309 21.8623C19.4343 21.5971 20.1153 21.0515 20.5493 20.3252C20.9832 19.599 21.1411 18.7408 20.994 17.9076C20.8469 17.0745 20.4047 16.3222 19.7483 15.7885C19.0918 15.2548 18.2652 14.9753 17.4195 15.0013C16.5739 15.0273 15.7659 15.357 15.1435 15.93L8.88352 12.353C8.94952 12.103 8.98552 11.844 8.99152 11.585L15.1415 8.06996C15.7337 8.60874 16.4932 8.92747 17.2925 8.97268C18.0918 9.01789 18.8823 8.78684 19.5315 8.31828C20.1806 7.84972 20.6489 7.17217 20.8577 6.39929C21.0666 5.6264 21.0032 4.80522 20.6784 4.0735C20.3535 3.34178 19.7869 2.74404 19.0735 2.38056C18.3602 2.01708 17.5436 1.90998 16.7607 2.07723C15.9777 2.24447 15.2761 2.67588 14.7736 3.29909C14.271 3.92229 13.9981 4.69937 14.0005 5.49996C14.0045 5.78796 14.0435 6.07496 14.1175 6.35296L8.43352 9.59997C8.1039 9.09003 7.64729 8.67461 7.10854 8.39454C6.5698 8.11446 5.96746 7.97937 5.3607 8.00251C4.75395 8.02566 4.16365 8.20627 3.64781 8.52658C3.13197 8.84689 2.70834 9.29589 2.41853 9.82946C2.12872 10.363 1.98271 10.9628 1.99484 11.5699C2.00697 12.177 2.17683 12.7704 2.48772 13.292C2.79861 13.8136 3.23984 14.2453 3.76807 14.5447C4.29629 14.8442 4.89333 15.0011 5.50052 15Z"
                                            fill="currentColor" />
                                    </svg>
                                    <span class=" d-none d-sm-block">?? Share</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
            }
            return $artilces;
        }
        return view('timeline.index');
    }

    public function store(Request $request)
    {
        //pegar tenant
        $this->get_tenant();
        $validatedData = $request->validate([
            'body'           => 'required',
        ]);
        //user data
        $user = auth()->user();
        $posts = new Post();
        $posts->body     = $request->input('body');
        $posts->user_id = $user->id;
        $posts->save();
        //adicionar log
        $this->adicionar_log('17', 'C', $posts);
        return redirect()->route('timeline.index');
    }


    //comentario na timezone
    public function storecomentario($id, Request $request)
    {
        //pegar tenant
        $this->get_tenant();

        $post = Post::find($id);

        if (!$post) {
            session()->flash("info", "Post não encontrado");
            return view('timeline.index');
        }

        Comment::create([
            'comment' => $request->input('comment'),
            'post_id' => $id,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->back();
    }
        // delete o post
        public function destroy($id)
        {
            //pegar tenant
            $this->get_tenant();
            $post = Post::find($id);
    
            if (!$post) {
                session()->flash("info", "Post não encontrado");
                return redirect()->back();
            }
    
            if ($post->user_id != auth()->user()->id) {
                session()->flash("warning", "Você não possui permissão");
                return redirect()->back();
            }
    
            $post->delete();
    
            session()->flash("warning", "Post deletado com sucesso");
            return view('timeline.index');
        }
}
