@extends('adminlte::page')
@section('title', 'Cadastro::artigos')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('js')
    <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>
@stop

@section('content_header')
<h1><strong>Cadastro de artigos</strong> :: editar</h1>
@include('admin._partials.breadcrumbs', ['breadcrumbs' => [
        ['nome' => 'Listar artigos', 'rota' => route('articles.index')],
        ['nome' => 'Detalhes do artigo', 'rota' => route('articles.show', ['id' => $recordSet->id])],
        ['nome' => 'Editando o artigo', 'rota' => route('articles.edit', ['id' => $recordSet->id]), 'ativo' => true]
    ]
])
@stop

@section('content')

@include('admin._partials.messages')

<div class="content row">
    <div class="box box-primary">
        {!! Form::model($recordSet, ['method' => 'put','route' => ['articles.update', $recordSet->id], 'class' => 'form']) !!}
            <div class="box-body">
                @include('admin.articles._partials.form')
            </div>
         {!! Form::close() !!}
    </div>
</div>
@stop