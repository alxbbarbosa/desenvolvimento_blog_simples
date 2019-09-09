@extends('adminlte::page')
@section('title', 'Cadastro::categorias')

@section('content_header')
<h1><strong>Cadastro de categorias</strong> :: editar</h1>
@include('admin._partials.breadcrumbs', ['breadcrumbs' => [
        ['nome' => 'Listar categorias', 'rota' => route('categories.index')],
        ['nome' => 'Detalhes da categoria', 'rota' => route('categories.show', ['id' => $recordSet->id])],
        ['nome' => 'Editando a categoria', 'rota' => route('categories.edit', ['id' => $recordSet->id]), 'ativo' => true]
    ]
])
@stop

@section('content')

@include('admin._partials.messages')

<div class="content row">
    <div class="box box-primary">
        {!! Form::model($recordSet, ['method' => 'put','route' => ['categories.update', $recordSet->id], 'class' => 'form']) !!}
            <div class="box-body">
                @include('admin.categories._partials.form')
            </div>
         {!! Form::close() !!}
    </div>
</div>
@stop