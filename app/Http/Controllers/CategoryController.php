<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryFormRequest;
use App\Http\Requests\UpdateCategoryFormRequest;

/**
 * ==============================================================================================================
 *
 * CategoryController:  Classe Controller
 *
 * --------------------------------------------------------------------------------------------------------------
 *
 * @author Alexandre Bezerra Barbosa <alxbbarbosa@yahoo.com.br>
 * @copyright (c) 2018, Alexandre Bezerra Barbosa
 * @version 1.00
 * ==============================================================================================================
 */
class CategoryController extends Controller
{
    protected $model;

    public function __construct(Category $model)
    {
        $this->middleware('permission:category-list');
        $this->middleware('permission:category-create',
            ['only' => ['create', 'store']]);
        $this->middleware('permission:category-edit',
            ['only' => ['edit', 'update']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);
        $this->middleware('auth');
        $this->model = $model;
    }

    public function search(Request $request)
    {
        $data = $request->only('page', 'search');
        $type = $request->input('type') ?? 2;

        if ($type == 1) {
            $list = $this->model->where('category', $data['search'])->paginate(8);
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

            $list = $this->model->where('category', 'like', $filtro)->paginate(8);
        }
        return view('admin.categories.index', compact('data', 'type', 'list'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = $this->model->paginate(8);

        return view('admin.categories.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryFormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryFormRequest $request)
    {
        $data   = $request->only('category');
        $result = $this->model->fill($data)->save();

        if ($result) {
            return redirect()
                    ->route('categories.index')
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
        $recordSet = $this->model->findOrFail($id);

        return view('admin.categories.show', compact('recordSet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recordSet = $this->model->findOrFail($id);

        return view('admin.categories.edit', compact('recordSet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryFormRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryFormRequest $request, $id)
    {
        $recordSet = $this->model->findOrFail($id);
        $data      = $request->only('category');
        $result    = $recordSet->fill($data)->save();

        if ($result) {
            return redirect()
                    ->route('categories.index')
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
                        ->route('admin.categories.index')
                        ->withSuccess('Item excluído com êxito');
            }
        }
        return back()->withErrors(['Item não pode ser excluído']);
    }
}