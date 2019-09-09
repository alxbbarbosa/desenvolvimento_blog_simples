@extends('adminlte::page')
@section('title', 'Cadastro::Usuários')

@section('content_header')
<h1><strong>Cadastro de Usuários</strong> :: editar</h1>
@include('admin._partials.breadcrumbs', ['breadcrumbs' => [
        ['nome' => 'Listar usuários', 'rota' => route('users.index')],
        ['nome' => 'Detalhes do usuário', 'rota' => route('users.show', ['id' => $recordSet->id])],
        ['nome' => 'Editando o usuário', 'rota' => route('users.edit', ['id' => $recordSet->id]), 'ativo' => true]
    ]
])
@stop

@section('content')

@include('admin._partials.messages')

<div class="content row">
    <div class="box box-primary">
        {!! Form::model($recordSet, ['method' => 'put','route' => ['users.update', $recordSet->id], 'class' => 'form']) !!}
            <div class="box-body">
                @include('admin.users._partials.form')
            </div>
         {!! Form::close() !!}
    </div>
</div>
@stop