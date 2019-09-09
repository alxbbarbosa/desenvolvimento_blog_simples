@extends('adminlte::page')
@section('title', 'Cadastro::Usuários')

@section('content_header')
<h1><strong>Cadastro de Usuários</strong> :: criar</h1>
@include('admin._partials.breadcrumbs', ['breadcrumbs' => [
        ['nome' => 'Listar usuários', 'rota' => route('users.index')],
        ['nome' => 'Novo usuário', 'rota' => route('users.create'), 'ativo' => true],
    ]
])
@stop

@section('content')

@include('admin._partials.messages')

<div class="content row">
    <div class="box box-primary">
        {!! Form::open(['route' => 'users.store', 'class' => 'form']) !!}
            <div class="box-body">
                @include('admin.users._partials.form')
            </div>
         {!! Form::close() !!}
    </div>
</div>
@stop