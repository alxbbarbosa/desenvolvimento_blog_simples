@extends('adminlte::page')
@section('title', 'Configurações')

@section('content_header')
<h1><strong>Configurações</strong> :: editar</h1>
@include('admin._partials.breadcrumbs', ['breadcrumbs' => [
        ['nome' => 'Editando as configurações', 'rota' => route('config.edit', ['id' => $recordSet->id]), 'ativo' => true]
    ]
])
@stop

@section('content')

@include('admin._partials.messages')

<div class="content row">
    <div class="box box-primary">
        {!! Form::model($recordSet, ['method' => 'put','route' => ['config.update', $recordSet->id], 'class' => 'form']) !!}
            <div class="box-body">
                @include('admin.config._partials.form')
            </div>
         {!! Form::close() !!}
    </div>
</div>
@stop