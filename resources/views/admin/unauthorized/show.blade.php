@extends('adminlte::page')
@section('title', 'Sem acesso')

@section('content_header')
<h1><strong>Cadastro de categorias</strong> :: detalhes</h1>
@include('admin._partials.breadcrumbs', ['breadcrumbs' => [
        ['nome' => 'Dashboard', 'rota' => route('home')],
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
                        Erro:
                    </div>
                    <div class="col-md-9">
                        <strong>Você não tem acesso ao recurso solicitado</strong>
                    </div>
                </div>
            </div>
            
            <hr>
            <a class="btn btn-primary" href="{{ redirect()->back() }}" style="display: inline-block"><i class="fas fa-fw fa-sign-out-alt"></i>&nbsp;&nbsp;Voltar</a>
        </div>
    </div>
</div>
@stop