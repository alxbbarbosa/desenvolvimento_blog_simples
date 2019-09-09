@extends('adminlte::page')
@section('title', 'Cadastro::funções de usuário')

@section('content_header')
<h1><strong>Cadastro de funções de usuário</strong> :: detalhes</h1>
@include('admin._partials.breadcrumbs', ['breadcrumbs' => [
        ['nome' => 'Listar funções de usuário', 'rota' => route('roles.index')],
        ['nome' => 'Detalhes da funções de usuário', 'rota' => route('roles.show', ['id' => $role->id]), 'ativo' => true]
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
                        <strong>{{ $role->name }}</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 text-right">
                        Permissões:
                    </div>
                    <div class="col-md-9">
                        @if(!empty($permissions))
                            @foreach($permissions as $v)
                                <label class="label label-success">{{ $v->name }}</label>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            
            <hr>
            <a class="btn btn-primary" href="{{ route('roles.index') }}" style="display: inline-block"><i class="fas fa-fw fa-sign-out-alt"></i>&nbsp;&nbsp;Voltar</a>
            @can('role-edit')
            <a href="{{ route('roles.edit', ['id' => $role->id]) }}" class="btn btn-primary"><i class="fas fa-fw fa-edit"></i> Editar</a>
            @endcan
            @can('role-delete')
            {!! Form::open(['method' => 'delete', 'route' => ['roles.destroy', $role->id], "style" => "display: inline-block" ]) !!}
            @csrf
            {!! Form::button("<i class='fas fa-fw fa-trash'></i> Excluir", ['type' => 'submit', 'class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
             @endcan
        </div>
    </div>
</div>
@stop