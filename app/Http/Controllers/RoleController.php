<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\StoreRoleFormRequest;
use App\Http\Requests\UpdateRoleFormRequest;

/**
 * ==============================================================================================================
 *
 * RoleController:  Classe Controller
 *
 * --------------------------------------------------------------------------------------------------------------
 *
 * @author Alexandre Bezerra Barbosa <alxbbarbosa@yahoo.com.br>
 * @copyright (c) 2018, Alexandre Bezerra Barbosa
 * @version 1.00
 * ==============================================================================================================
 */
class RoleController extends Controller
{
    protected $model;

    public function __construct(Role $model)
    {
        $this->middleware('permission:role-list');
        $this->middleware('permission:role-create',
            ['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit',
            ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);

        $this->middleware('auth');
        $this->model = $model;
    }

    public function search(Request $request)
    {
        $data = $request->only('page', 'search');
        $type = $request->input('type') ?? 2;

        if ($type == 1) {
            $list = $this->model->where('name', $data['search'])->paginate(8);
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

            $list = $this->model->where('name', 'like', $filtro)->paginate(8);
        }
        return view('admin.roles.index', compact('data', 'type', 'list'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = $this->model->paginate(8);

        return view('admin.roles.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoleFormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleFormRequest $request)
    {
        $result = $this->model->fill(['name' => $request->input('name')])->save();
        $this->model->syncPermissions($request->input('permission'));

        if ($result) {
            return redirect()
                    ->route('roles.index')
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
        $role            = $this->model->find($id);
        $permissions = Permission::join("role_has_permissions",
                "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();

        return view('admin.roles.show', compact('role', 'permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role            = $this->model->find($id);
        $permission      = Permission::get();

        $permissions = Permission::with('roles')->whereHas('roles', function($query) use($id){
            $query->where('id', $id);
        })->get();

        $unassigned = Permission::with('roles')->whereDoesntHave('roles', function($query) use($id){
            $query->where('id', $id);
        })->get();

        return view('admin.roles.edit',
            compact('role', 'permission', 'permissions', 'unassigned'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoleFormRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleFormRequest $request, $id)
    {
        $role       = $this->model->find($id);
        $role->name = $request->input('name');
        $role->save();

        $result = $role->syncPermissions($request->input('permission'));

        if ($result) {
            return redirect()
                    ->route('roles.index')
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
                        ->route('roles.index')
                        ->withSuccess('Item excluído com êxito');
            }
        }
        return back()->withErrors(['Item não pode ser excluído']);
    }
}