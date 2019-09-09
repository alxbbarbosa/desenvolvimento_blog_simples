@extends('adminlte::page')
@section('title', 'Cadastro::funções de usuário')

@section('content_header')
<h1><strong>Cadastro de funções de usuário</strong> :: listagem</h1>
@include('admin._partials.breadcrumbs', ['breadcrumbs' => [
['nome' => 'Listar funções de usuários', 'rota' => route('roles.index'), 'ativo' => true]
]
])
@stop

@section('content')

@include('admin._partials.messages')
<div class="content row">

    @include('admin._partials.search', ['rota' => 'roles.search'])

    <div class="box box-primary">
        <div class="box-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Função de usuário</th>
                        <th scope="col" style="width: 100px;">@can('role-create')<a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm"><i class='fas fa-fw fa-plus'></i>&nbsp;&nbsp;Cadastrar novo</a>@endcan</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 0 @endphp
                    @forelse ($list as $role)
                    <tr>
                        <td scope="row">{{ ++$i }}</td>
                        <td scope="row">{{ $role->name }}</td>
                        <td scope="row">
                            <a href="{{ route('roles.show', ['id' => $role->id]) }}" class="btn btn-warning btn-sm"><i class="fas fa-fw fa-eye"></i> Detalhes</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td scope="row" colspan="5">Sem dados para listar</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $list->links() }}
        </div>
    </div>
</div>
@stop