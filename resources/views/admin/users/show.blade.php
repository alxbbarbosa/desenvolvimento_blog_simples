@extends('adminlte::page')
@section('title', 'Cadastro::usuário')

@section('content_header')
<h1><strong>Cadastro de usuário</strong> :: detalhes</h1>
@include('admin._partials.breadcrumbs', ['breadcrumbs' => [
        ['nome' => 'Listar usuários', 'rota' => route('users.index')],
        ['nome' => 'Detalhes do usuário', 'rota' => route('users.show', ['id' => $recordSet->id]), 'ativo' => true]
    ]
])
@stop

@section('content')

@include('admin._partials.messages')

<div class="content row">
    <div class="box box-primary">
        <div class="box-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 text-right">
                        Nome:
                    </div>
                    <div class="col-md-9">
                        <strong>{{ $recordSet->name }}</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 text-right">
                        E-mail:
                    </div>
                    <div class="col-md-9">
                        <strong>{{ $recordSet->email }}</strong>
                    </div>
                </div>
                   <div class="row">
                    <div class="col-md-3 text-right">
                        Situação:
                    </div>
                    <div class="col-md-9">
                        <strong>{{ $recordSet->active ? 'Ativo' : 'Inativo' }}</strong>
                    </div>
                </div>
                <div>
                    <div class="row">
                        <div class="col-md-3 text-right">
                            Roles:
                        </div>
                        <div class="col-md-9">
                            @if(!empty($recordSet->getRoleNames()))
                                @foreach($recordSet->getRoleNames() as $v)
                                    <label class="badge badge-success">{{ $v }}</label>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            
            <hr>
            <a class="btn btn-primary" href="{{ route('users.index') }}" style="display: inline-block"><i class="fas fa-fw fa-sign-out-alt"></i>&nbsp;&nbsp;Voltar</a>
            @can('user-edit')
            <a href="{{ route('users.edit', ['id' => $recordSet->id]) }}" class="btn btn-primary"><i class="fas fa-fw fa-edit"></i> Editar</a>
            @endcan
            @can('user-delete')
            {!! Form::open(['method' => 'delete', 'route' => ['users.destroy', $recordSet->id], "style" => "display: inline-block" ]) !!}
            @csrf
            {!! Form::button("<i class='fas fa-fw fa-trash'></i> Excluir", ['type' => 'submit', 'class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
            @endcan
            
        </div>
    </div>
</div>
@stop