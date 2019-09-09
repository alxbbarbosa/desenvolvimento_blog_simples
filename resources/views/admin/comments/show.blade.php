@extends('adminlte::page')
@section('title', 'Cadastro::comentários')

@section('content_header')
<h1><strong>Cadastro de comentários</strong> :: detalhes</h1>
@include('admin._partials.breadcrumbs', ['breadcrumbs' => [
        ['nome' => 'Listar comentários', 'rota' => route('comments.index')],
        ['nome' => 'Detalhes da comentário', 'rota' => route('comments.show', ['id' => $recordSet->id]), 'ativo' => true]
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
                        Aprovado:
                    </div>
                    <div class="col-md-9">
                        <strong>{{ $recordSet->approved ? 'Sim' : 'Não' }}</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 text-right">
                        Nome:
                    </div>
                    <div class="col-md-9">
                        <strong>{{ $recordSet->name }}</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 text-right">
                        E-mail:
                    </div>
                    <div class="col-md-9">
                        <strong>{{ $recordSet->email }}</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 text-right">
                        Homepage:
                    </div>
                    <div class="col-md-9">
                        <strong>{{ $recordSet->homepage }}</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 text-right">
                        Ip:
                    </div>
                    <div class="col-md-9">
                        <strong>{{ $recordSet->ip_address }}</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 text-right">
                        Comentado em:
                    </div>
                    <div class="col-md-9">
                        <strong>{{ (new DateTime($recordSet->created_at))->format('d-m-Y H:i:s') }}</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 text-right">
                        Artigo:
                    </div>
                    <div class="col-md-9">
                        <strong>{{ $recordSet->article->title }}</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 text-right">
                        Comentário:
                    </div>
                    <div class="col-md-9">
                        <strong>{{ $recordSet->body }}</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 text-right">
                        Imagem de avatar:
                    </div>
                    <div class="col-md-9">
                        <strong>{{ $recordSet->picture }}</strong>
                    </div>
                </div>
            </div>
            
            <hr>
            <a class="btn btn-primary" href="{{ route('comments.index') }}" style="display: inline-block"><i class="fas fa-fw fa-sign-out-alt"></i>&nbsp;&nbsp;Voltar</a>
            @can('comment-edit')
            <a href="{{ route('comments.edit', ['id' => $recordSet->id]) }}" class="btn btn-primary"><i class="fas fa-fw fa-edit"></i> Editar</a>
            @endcan
            @can('comment-delete')
            {!! Form::open(['method' => 'delete', 'route' => ['comments.destroy', $recordSet->id], "style" => "display: inline-block" ]) !!}
            @csrf
            {!! Form::button("<i class='fas fa-fw fa-trash'></i> Excluir", ['type' => 'submit', 'class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
            @endcan
        </div>
    </div>
</div>
@stop