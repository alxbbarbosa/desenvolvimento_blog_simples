@extends('adminlte::page')
@section('title', 'Cadastro::funções de usuário')

@section('content_header')
<h1><strong>Cadastro de funções de usuário</strong> :: editar</h1>
@include('admin._partials.breadcrumbs', ['breadcrumbs' => [
        ['nome' => 'Listar funções de usuário', 'rota' => route('roles.index')],
        ['nome' => 'Detalhes da função de usuário', 'rota' => route('roles.show', ['id' => $role->id])],
        ['nome' => 'Editando a funções de usuário', 'rota' => route('roles.edit', ['id' => $role->id]), 'ativo' => true]
    ]
])
@stop

@section('content')

@include('admin._partials.messages')

<div class="content row">
    <div class="box box-primary">
        {!! Form::model($role, ['method' => 'put','route' => ['roles.update', $role->id], 'class' => 'form']) !!}
            <div class="box-body">
                @include('admin.roles._partials.form')
            </div>
         {!! Form::close() !!}
    </div>
</div>
@stop