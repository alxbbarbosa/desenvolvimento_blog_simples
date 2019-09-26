@extends('adminlte::page')
@section('title', 'Perfil de Usuário')

@section('content_header')
<h1><strong>Perfil de Usuário</strong> :: editar</h1>
@include('admin._partials.breadcrumbs', ['breadcrumbs' => [
        ['nome' => 'Perfil', 'rota' => route('profile.edit', ['id' => $recordSet->id]), 'ativo' => true]
    ]
])
@stop

@section('content')

@include('admin._partials.messages')

<div class="content row">
    <div class="box box-primary">
        {!! Form::model($recordSet, ['method' => 'put','route' => ['profile.update', $recordSet->id], 'class' => 'form']) !!}
            <div class="box-body">
                @include('admin.profile._partials.form')
            </div>
         {!! Form::close() !!}
    </div>
</div>
@stop