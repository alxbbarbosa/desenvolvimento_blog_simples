<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArticleFormRequest;
use App\Http\Requests\UpdateArticleFormRequest;

/**
 * ==============================================================================================================
 *
 * ArticleController:  Classe Controller
 *
 * --------------------------------------------------------------------------------------------------------------
 *
 * @author Alexandre Bezerra Barbosa <alxbbarbosa@yahoo.com.br>
 * @copyright (c) 2018, Alexandre Bezerra Barbosa
 * @version 1.00
 * ==============================================================================================================
 */
class ArticleController extends Controller
{
    protected $model;

    public function __construct(Article $model)
    {

        $this->middleware('permission:article-list');
        $this->middleware('permission:article-create',
            ['only' => ['create', 'store']]);
        $this->middleware('permission:article-edit',
            ['only' => ['edit', 'update']]);
        $this->middleware('permission:article-delete', ['only' => ['destroy']]);

        $this->middleware('auth');
        $this->model = $model;
    }

    public function search(Request $request)
    {
        $data = $request->only('page', 'search');
        $type = $request->input('type') ?? 2;

        if ($type == 1) {
            $list = $this->model->where('article', $data['search'])->paginate(8);
        } else {
            switch ($type) {
                case 2:
                    $filtro = "%{$data['search']}%";
                    break;
                case 3:
                    $filtro = "%{$data['search']}";
                    break;
                case 4:
                    $filtro = "{$data['search']}%";
                    break;
            }

            $list = $this->model->where('article', 'like', $filtro)->paginate(8);
        }
        return view('admin.articles.index', compact('data', 'type', 'list'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = $this->model->paginate(8);

        return view('admin.articles.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->pluck('category', 'id');
        return view('admin.articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleFormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleFormRequest $request)
    {
        dd($request->all());
        $data            = $request->only('title', 'category_id', 'resume');
        $data['user_id'] = auth()->user()->id;
        $data['body']    = clean($request->get('body'));
        $ativo           = $request->has('active') ? true : false;
        $data            += ['active' => $ativo];
        $tags            = explode(",", $request->tags);
        $result          = $this->model->fill($data)->save();
        $result->tag($tags);

        if ($result) {
            return redirect()
                    ->route('articles.index')
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
        return redirect()->route('articles.edit', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all()->pluck('category', 'id');
        $recordSet  = $this->model->findOrFail($id);

        return view('admin.articles.edit', compact('recordSet', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleFormRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleFormRequest $request, $id)
    {
        $recordSet    = $this->model->findOrFail($id);
        $data         = $request->only('title', 'category_id', 'resume');
        $data['body'] = clean($request->get('body'));
        $ativo        = $request->has('active') ? true : false;
        $data         += ['active' => $ativo];
        $tags         = explode(",", $request->tags);
        $result       = $recordSet->fill($data)->save();
        $result->tag($tags);

        if ($result) {
            return redirect()
                    ->route('articles.index')
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
                        ->route('admin.articles.index')
                        ->withSuccess('Item excluído com êxito');
            }
        }
        return back()->withErrors(['Item não pode ser excluído']);
    }
}