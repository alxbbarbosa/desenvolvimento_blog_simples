@extends('adminlte::page')
@section('title', 'Cadastro::artigos')

@section('content_header')
<h1><strong>Cadastro de artigos</strong> :: detalhes</h1>
@include('admin._partials.breadcrumbs', ['breadcrumbs' => [
        ['nome' => 'Listar artigos', 'rota' => route('articles.index')],
        ['nome' => 'Detalhes do artigo', 'rota' => route('articles.show', ['id' => $recordSet->id]), 'ativo' => true]
    ]
])
@stop

@section('content')

@include('admin._partials.messages')

<div class="content row">
    <div class="box box-primary">
        <div class="box-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 text-right">
                        Categoria:
                    </div>
                    <div class="col-md-9">
                        <strong>{{ $recordSet->title }}</strong>
                    </div>
                </div>
            </div>
            
            <hr>
            <a class="btn btn-primary" href="{{ route('articles.index') }}" style="display: inline-block"><i class="fas fa-fw fa-sign-out-alt"></i>&nbsp;&nbsp;Voltar</a>
            @can('article-edit')
            <a href="{{ route('articles.edit', ['id' => $recordSet->id]) }}" class="btn btn-primary"><i class="fas fa-fw fa-edit"></i> Editar</a>
            @endcan
            @can('article-delete')
            {!! Form::open(['method' => 'delete', 'route' => ['articles.destroy', $recordSet->id], "style" => "display: inline-block" ]) !!}
            @csrf
            {!! Form::button("<i class='fas fa-fw fa-trash'></i> Excluir", ['type' => 'submit', 'class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
            @endcan
        </div>
    </div>
</div>
@stop