@extends('adminlte::page')
@section('title', 'Cadastro::comentários')

@section('content_header')
<h1><strong>Cadastro de Comentários</strong> :: criar nova</h1>
@include('admin._partials.breadcrumbs', ['breadcrumbs' => [
        ['nome' => 'Listar comentários', 'rota' => route('comments.index')],
        ['nome' => 'Novo comentário', 'rota' => route('comments.create'), 'ativo' => true],
    ]
])
@stop

@section('content')

@include('admin._partials.messages')

<div class="content row">
    <div class="box box-primary">
        {!! Form::open(['route' => 'comments.store', 'class' => 'form']) !!}
            <div class="box-body">
                @include('admin.comments._partials.form')
            </div>
         {!! Form::close() !!}
    </div>
</div>
@stop