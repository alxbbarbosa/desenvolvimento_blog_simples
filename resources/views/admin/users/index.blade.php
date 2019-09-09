@extends('adminlte::page')
@section('title', 'Cadastro::usuários')

@section('content_header')
<h1><strong>Cadastro de usuários</strong> :: listagem</h1>
@include('admin._partials.breadcrumbs', ['breadcrumbs' => [
['nome' => 'Listar usuários', 'rota' => route('users.index'), 'ativo' => true]
]
])
@stop

@section('content')

@include('admin._partials.messages')
<div class="content row">

    @include('admin._partials.search', ['rota' => 'users.search'])

    <div class="box box-primary">
        <div class="box-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Ativo</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Permissões</th>
                        <th scope="col" style="width: 100px;">@can('user-create')<a href="{{ route('users.create') }}" class="btn btn-primary btn-sm"><i class='fas fa-fw fa-plus'></i>&nbsp;&nbsp;Cadastrar novo</a>@endcan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($list as $user)
                    <tr>
                        <td scope="row">{{ $user->active ? 'Sim' : 'Não' }}</td>
                        <td scope="row">{{ $user->name }}</td>
                        <td scope="row">{{ $user->email }}</td>
                        <td>
                        @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                            @endforeach
                        @endif
                        </td>
                        <td scope="row">
                            <a href="{{ route('users.show', ['id' => $user->id]) }}" class="btn btn-warning btn-sm"><i class="fas fa-fw fa-eye"></i> Detalhes</a>
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