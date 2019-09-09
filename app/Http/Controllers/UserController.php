<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreUserFormRequest;
use App\Http\Requests\UpdateUserFormRequest;

/**
 * ==============================================================================================================
 *
 * UserController:  Classe Controller
 *
 * --------------------------------------------------------------------------------------------------------------
 *
 * @author Alexandre Bezerra Barbosa <alxbbarbosa@yahoo.com.br>
 * @copyright (c) 2018, Alexandre Bezerra Barbosa
 * @version 1.00
 * ==============================================================================================================
 */
class UserController extends Controller
{
    protected $model;

    function __construct(User $model)
    {
        $this->middleware('permission:user-list');
        $this->middleware('permission:user-create',
            ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit',
            ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
        $this->middleware('auth');
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = $this->model->paginate(8);
        return view('admin.users.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserFormRequest $request)
    {
        $data  = $request->only('name', 'email');
        $ativo = $request->has('active') ? true : false;

        if ($request->has('password')) {
            $data += ['password' => bcrypt($request->get('password'))];
        }

        $data   += ['active' => $ativo];
        $result = $this->model->fill($data)->save();

        $this->model->assignRole($request->input('roles'));

        if ($result) {
            return redirect()
                    ->route('users.index')
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
        return view('admin.users.show', compact('recordSet'));
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
        $roles     = Role::pluck('name', 'name')->all();
        $userRole = $recordSet->roles->pluck('name', 'name')->all();

        return view('admin.users.edit', compact('recordSet', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserFormRequest $request, $id)
    {
        $recordSet = $this->model->findOrFail($id);

        $data  = $request->only('name', 'email');
        $ativo = $request->has('active') ? true : false;
        if ($request->has('password')) {
            $data += ['password' => bcrypt($request->get('password'))];
        }
        $data   += ['active' => $ativo];
        $result = $recordSet->fill($data)->save();
        $recordSet->assignRole($request->input('roles'));

        if ($result) {
            return redirect()
                    ->route('users.index')
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
        $User = $this->model->findOrFail($id);
        if ($User) {
            if ($User->delete()) {
                return redirect()
                        ->route('users.index')
                        ->withSuccess('Item excluído com êxito');
            }
        }
        return back()->withErrors(['Item não pode ser excluído']);
    }
}