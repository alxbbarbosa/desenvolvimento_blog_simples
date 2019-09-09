@extends('adminlte::page')
@section('title', 'Cadastro::comentários')

@section('content_header')
<h1><strong>Cadastro de comentários</strong> :: listagem</h1>
@include('admin._partials.breadcrumbs', ['breadcrumbs' => [
        ['nome' => 'Listar comentários', 'rota' => route('comments.index'), 'ativo' => true]
    ]
])
@stop

@section('content')

@include('admin._partials.messages')
<div class="content row">

        @include('admin._partials.search', ['rota' => 'comments.search'])

    <div class="box box-primary">
        <div class="box-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Aprovado</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Homepage</th>
                        <th scope="col">Artigo</th>
                        <th scope="col">comentário</th>
                        <th scope="col" style="width: 100px;">@can('category-create')<a href="{{ route('comments.create') }}" class="btn btn-primary btn-sm"><i class='fas fa-fw fa-plus'></i>&nbsp;&nbsp;Cadastrar novo</a>@endcan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($list as $recordSet)
                    <tr>
                        <td scope="row">{{ $recordSet->approved ? 'Sim' : 'Não' }}</td>
                        <td scope="row">{{ $recordSet->name }}</td>
                        <td scope="row">{{ $recordSet->email }}</td>
                        <td scope="row">{{ $recordSet->homepage }}</td>
                        <td scope="row">{{ $recordSet->article->title }}</td>
                        <td scope="row">{{ substr($recordSet->body, 0, 60) }} ...</td>
                        <td scope="row">
                            <a href="{{ route('comments.show', ['id' => $recordSet->id]) }}" class="btn btn-warning btn-sm"><i class="fas fa-fw fa-eye"></i> Detalhes</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td scope="row" colspan="6">Sem dados para listar</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $list->links() }}
        </div>
    </div>
</div>
@stop