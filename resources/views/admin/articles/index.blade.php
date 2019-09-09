@extends('adminlte::page')
@section('title', 'Cadastro::artigos')

@section('content_header')
<h1><strong>Cadastro de artigos</strong> :: listagem</h1>
@include('admin._partials.breadcrumbs', ['breadcrumbs' => [
        ['nome' => 'Listar artigos', 'rota' => route('articles.index'), 'ativo' => true]
    ]
])
@stop

@section('content')

@include('admin._partials.messages')
<div class="content row">

        @include('admin._partials.search', ['rota' => 'articles.search'])

    <div class="box box-primary">
        <div class="box-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Artigo</th>
                        <th scope="col" style="width: 200px;">@can('article-create')<a href="{{ route('articles.create') }}" class="btn btn-primary btn-sm"><i class='fas fa-fw fa-plus'></i>&nbsp;&nbsp;Cadastrar novo</a>@endcan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($list as $recordSet)
                    <tr>
                        <td scope="row"><a href="{{ route('articles.show', ['id' => $recordSet->id]) }}">{{ $recordSet->title }}</a></td>
                        <td scope="row">
                            @can('article-edit')
                                <a href="{{ route('articles.edit', ['id' => $recordSet->id]) }}" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-edit"></i> Editar</a>
                            @endcan
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            @can('article-delete')
                                {!! Form::open(['method' => 'delete', 'route' => ['articles.destroy', $recordSet->id], "style" => "display: inline-block" ]) !!}
                                @csrf
                                {!! Form::button("<i class='fas fa-fw fa-trash'></i> Excluir", ['type' => 'submit', 'class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            @endcan
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td scope="row" colspan="5">Sem dados para listar</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $list->links() }}
        </div>
    </div>
</div>
@stop