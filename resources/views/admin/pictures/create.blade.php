@extends('adminlte::page')
@section('title', 'Cadastro::Categorias')

@section('content_header')
<h1><strong>Cadastro de Categorias</strong> :: criar nova</h1>
@include('admin._partials.breadcrumbs', ['breadcrumbs' => [
        ['nome' => 'Listar Categorias', 'rota' => route('categories.index')],
        ['nome' => 'Nova categoria', 'rota' => route('categories.create'), 'ativo' => true],
    ]
])
@stop

@section('content')

@include('admin._partials.messages')

<div class="content row">
    <div class="box box-primary">
        {!! Form::open(['route' => 'categories.store', 'class' => 'form']) !!}
            <div class="box-body">
                @include('admin.categories._partials.form')
            </div>
         {!! Form::close() !!}
    </div>
</div>
@stop