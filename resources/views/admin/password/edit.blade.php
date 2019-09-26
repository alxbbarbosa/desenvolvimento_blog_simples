@extends('adminlte::page')
@section('title', 'Senha de Usuário')

@section('content_header')
<h1><strong>Senha de Usuário</strong> :: editar</h1>
@include('admin._partials.breadcrumbs', ['breadcrumbs' => [
        ['nome' => 'Perfil', 'rota' => route('password.edit', ['id' => $recordSet->id]), 'ativo' => true]
    ]
])
@stop

@section('content')

@include('admin._partials.messages')

<div class="content row">
    <div class="box box-primary">
        {!! Form::model($recordSet, ['method' => 'put','route' => ['password.update', $recordSet->id], 'class' => 'form']) !!}
            <div class="box-body">
                @include('admin.password._partials.form')
            </div>
         {!! Form::close() !!}
    </div>
</div>
@stop