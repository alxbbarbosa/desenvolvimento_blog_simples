<?php

namespace App\Http\Controllers;
use App\Models\Picture;
use Illuminate\Http\Request;
use App\Http\Requests\StorePictureFormRequest;
use App\Http\Requests\UpdatePictureFormRequest;

/**
 * ==============================================================================================================
 *
 * PictureController:  Classe Controller
 *
 * --------------------------------------------------------------------------------------------------------------
 *
 * @author Alexandre Bezerra Barbosa <alxbbarbosa@yahoo.com.br>
 * @copyright (c) 2018, Alexandre Bezerra Barbosa
 * @version 1.00
 * ==============================================================================================================
 */
class PictureController extends Controller
{
    protected $model;

    public function __construct(Picture $model)
    {
        $this->middleware('auth');
        $this->model = $model;
    }

    public function search(Request $request)
    {
        $list = Picture::where(['title', 'like', "%{$request->only('search')}%"])
            ->paginate();
        return view('admin.pictures.index', compact('list'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = $this->model->paginate(8);

        return view('admin.pictures.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pictures.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePictureFormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePictureFormRequest $request)
    {
        $data   = $request->only('category');
        $result = $this->model->fill($data)->save();

        if ($result) {
            return redirect()
                    ->route('admin.pictures.index')
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
        $result = $this->model->findOrFail($id);

        return view('admin.pictures.show', compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = $this->model->findOrFail($id);

        return view('admin.pictures.edit', compact('result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePictureFormRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePictureFormRequest $request, $id)
    {
        $recordSet = $this->model->findOrFail($id);
        $data      = $request->only('category');
        $result    = $recordSet->fill($data)->save();

        if ($result) {
            return redirect()
                    ->route('admin.pictures.index')
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
                        ->route('admin.pictures.index')
                        ->withSuccess('Item excluído com êxito');
            }
        }
        return back()->withErrors(['Item não pode ser excluído']);
    }
}