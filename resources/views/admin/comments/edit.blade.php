@extends('adminlte::page')
@section('title', 'Cadastro::comentários')

@section('content_header')
<h1><strong>Cadastro de comentários</strong> :: editar</h1>
@include('admin._partials.breadcrumbs', ['breadcrumbs' => [
        ['nome' => 'Listar comentários', 'rota' => route('comments.index')],
        ['nome' => 'Detalhes da comentário', 'rota' => route('comments.show', ['id' => $recordSet->id])],
        ['nome' => 'Editando a comentário', 'rota' => route('comments.edit', ['id' => $recordSet->id]), 'ativo' => true]
    ]
])
@stop

@section('content')

@include('admin._partials.messages')

<div class="content row">
    <div class="box box-primary">
        {!! Form::model($recordSet, ['method' => 'put','route' => ['comments.update', $recordSet->id], 'class' => 'form']) !!}
            <div class="box-body">
                @include('admin.comments._partials.form')
            </div>
         {!! Form::close() !!}
    </div>
</div>
@stop