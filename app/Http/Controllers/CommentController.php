<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCommentFormRequest;
use App\Http\Requests\UpdateCommentFormRequest;

/**
 * ==============================================================================================================
 *
 * CommentController:  Classe Controller
 *
 * --------------------------------------------------------------------------------------------------------------
 *
 * @author Alexandre Bezerra Barbosa <alxbbarbosa@yahoo.com.br>
 * @copyright (c) 2018, Alexandre Bezerra Barbosa
 * @version 1.00
 * ==============================================================================================================
 */
class CommentController extends Controller
{
    protected $model;

    public function __construct(Comment $model)
    {
        $this->middleware('permission:comment-list');
        $this->middleware('permission:comment-create',
            ['only' => ['create', 'store']]);
        $this->middleware('permission:comment-edit',
            ['only' => ['edit', 'update']]);
        $this->middleware('permission:comment-delete', ['only' => ['destroy']]);
        $this->middleware('auth');
        $this->model = $model;
    }

    public function search(Request $request)
    {
        $list = Comment::where(['body', 'like', "%{$request->only('search')}%"])
            ->paginate();
        return view('admin.comments.index', compact('list'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = $this->model->with('article')->whereHas('article',
                function($query) {
                $query->where('user_id', auth()->user()->id);
            })->paginate(8);
        return view('admin.comments.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articles = Article::all()->pluck('title', 'id');
        return view('admin.comments.create', compact('articles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommentFormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function add(StoreCommentFormRequest $request)
    {
        $data               = $request->only('article_id', 'name', 'picture',
            'homepage', 'email', 'body');
        $data['ip_address'] = $request->ip();
        $approved           = $request->has('approved') ? true : false;
        $data               += ['approved' => $approved];
        $this->model->fill($data);
        $this->model->user()->associate($request->user());
        $article            = Article::find($request->get('article_id'));
        $result             = $article->comments()->save($this->model);

        if ($result) {
            return redirect()->back();
        }
        return back()
                ->withErrors(['Falhou ao cadastrar item'])
                ->withInput($request->input());
    }

    public function reply(Request $request)
    {
        $reply             = new Comment();
        $reply->body       = $request->get('body');
        $reply->ip_address = $request->ip();
        /**
         *
         * Necessário fazer cadastro para continuar
         * Usuário precisa se cadastrar para responder
         * 
         */
        $reply->user()->associate($request->user());
        $reply->parent_id  = $request->get('comment_id');
        $article           = Article::find($request->get('article_id'));
        $article->comments()->save($reply);

        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommentFormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentFormRequest $request)
    {
        /**
         * 
         * Necessário fazer modificações para usuário se cadastrar primeiro
         * E-mail, site, nome com função de usuário visitante
         * 
         */
        $data               = $request->only('name', 'picture', 'homepage',
            'email', 'body');
        $data['ip_address'] = $request->ip();
        $approved           = $request->has('approved') ? true : false;
        $data               += ['approved' => $approved];
        //$result             = $this->model->fill($data)->save();
        $this->model->fill($data);
        $this->model->user()->associate($request->user());
        $article            = Article::find($request->get('article_id'));
        $result             = $article->comments()->save($comment);

        if ($result) {
            return redirect()
                    ->route('comments.index')
                    ->withSuccess('Item cadastrado com êxito');
        }
        return back()
                ->withErrors(['Falhou ao cadastrar item'])
                ->withInput($request->input());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recordSet = $this->model->with('article')->findOrFail($id);

        return view('admin.comments.show', compact('recordSet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articles  = Article::all()->pluck('title', 'id');
        $recordSet = $this->model->with('article')->findOrFail($id);

        return view('admin.comments.edit', compact('recordSet', 'articles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCommentFormRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommentFormRequest $request, $id)
    {
        $recordSet          = $this->model->findOrFail($id);
        $data               = $request->only('article_id', 'name', 'picture',
            'homepage', 'email', 'body');
        $data['ip_address'] = $request->ip();
        $approved           = $request->has('approved') ? true : false;
        $data               += ['approved' => $approved];
        $result             = $recordSet->fill($data)->save();

        if ($result) {
            return redirect()
                    ->route('comments.index')
                    ->withSuccess('Item atualizado com êxito');
        }
        return back()
                ->withErrors(['Falhou ao atualizar item'])
                ->withInput($request->input());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recordSet = $this->model->findOrFail($id);
        if ($recordSet) {
            if ($recordSet->delete()) {
                return redirect()
                        ->route('comments.index')
                        ->withSuccess('Item excluído com êxito');
            }
        }
        return back()->withErrors(['Item não pode ser excluído']);
    }
}