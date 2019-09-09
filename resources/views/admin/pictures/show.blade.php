@extends('adminlte::page')
@section('title', 'Cadastro::categorias')

@section('content_header')
<h1><strong>Cadastro de categorias</strong> :: detalhes</h1>
@include('admin._partials.breadcrumbs', ['breadcrumbs' => [
        ['nome' => 'Listar categorias', 'rota' => route('categories.index')],
        ['nome' => 'Detalhes da categoria', 'rota' => route('categories.show', ['id' => $recordSet->id]), 'ativo' => true]
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
                        <strong>{{ $recordSet->category }}</strong>
                    </div>
                </div>
            </div>
            
            <hr>
            <a class="btn btn-primary" href="{{ route('categories.index') }}" style="display: inline-block"><i class="fas fa-fw fa-sign-out-alt"></i>&nbsp;&nbsp;Voltar</a>

            <a href="{{ route('categories.edit', ['id' => $recordSet->id]) }}" class="btn btn-primary"><i class="fas fa-fw fa-edit"></i> Editar</a>

            {!! Form::open(['method' => 'delete', 'route' => ['categories.destroy', $recordSet->id], "style" => "display: inline-block" ]) !!}
            @csrf
            {!! Form::button("<i class='fas fa-fw fa-trash'></i> Excluir", ['type' => 'submit', 'class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
            
        </div>
    </div>
</div>
@stop