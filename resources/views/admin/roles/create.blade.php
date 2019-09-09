@extends('adminlte::page')
@section('title', 'Cadastro::funções de usuário')

@section('content_header')
<h1><strong>Cadastro de funções de usuário</strong> :: criar</h1>
@include('admin._partials.breadcrumbs', ['breadcrumbs' => [
        ['nome' => 'Listar usuários', 'rota' => route('roles.index')],
        ['nome' => 'Novo usuário', 'rota' => route('roles.create'), 'ativo' => true],
    ]
])
@stop

@section('content')

@include('admin._partials.messages')

<div class="content row">
    <div class="box box-primary">
        {!! Form::open(['route' => 'roles.store', 'class' => 'form']) !!}
            <div class="box-body">
                @include('admin.roles._partials.form')
            </div>
         {!! Form::close() !!}
    </div>
</div>
@stop