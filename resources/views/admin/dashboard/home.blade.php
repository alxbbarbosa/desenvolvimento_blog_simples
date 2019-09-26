@extends('adminlte::page')

@section('title', 'AdminBlog')

@section('js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>
@stop


<!-- Content Header (Page header) -->
@section('content_header')
<section class="content-header">
    <h1>
        Dashboard
    </h1>

    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
@stop

@section('content')

<!-- Main content -->
<section class="content">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="far fa-envelope"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Comentários</span>
                    <span class="info-box-number">{{ $num_comentarios }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="far fa-copy"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Artigos</span>
                        <span class="info-box-number">{{ $num_articles }}</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="far fa-eye"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Visualizações</span>
                    <span class="info-box-number">{{ $num_visualizacoes }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Visitantes</span>
                    <span class="info-box-number">{{ $num_visitantes }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Gráfico -->
    <div class="row">
        <div class="col-md-12">

        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
        <!-- MAP & BOX PANE -->
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Mapa de Geolocalização de Visitantes</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
                <div class="box-body no-padding" style="height: 400px;">
                    <div class="row">
                        <div class="col-md-12 col-sm-8">
                            <div class="pad">
                                <div id="world-map-markers" style="height: 325px;">
                                    <world-map :markers='{!! json_encode($visitorsCoordinates) !!}'></world-map>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <!-- Chart row -->
    <div class="row">
        <div class="col-sm-12">
            <activity-graph></activity-graph>
        </div>
    </div>
    <!-- /.row -->

    <!-- TABLE: ÚLTIMOS ARTIGOS PUBLICADOS -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Últimos artigos publicados</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table class="table no-margin">
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Título</th>
                            <th>Categoria</th>
                            <th>Status</th>
                            <th>Comentários</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($articles as $a)
                        <tr>
                            <td>{{ (new DateTime($a->created_at))->format("d/m/Y H:i:s") }}</td>
                            <td><a href="{{ route('articles.show', $a->id) }}">{{ $a->title }}</a></td>
                            <td><a href="{{ route('categories.show', $a->category->id) }}">{{ $a->category->category }}</a></td>
                            <td>{!! $a->active ? '<span class="label label-success">publicado</span>' : '<span class="label label-warning">não publicado</span>' !!}</span></td>
                            <td>
                                <div class="sparkbar" data-color="#00a65a" data-height="20">{{ $a->comments->count() }}</div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">Nenhum artigo publicado</td>
                        </tr>
                        @endforelse
                        <!--
                        <tr>
                            <td><a href="pages/examples/invoice.html">OR1848</a></td>
                            <td>Samsung Smart TV</td>
                            <td><span class="label label-warning">Pending</span></td>
                            <td>
                                <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                            </td>
                        </tr>
                        <tr>
                            <td><a href="pages/examples/invoice.html">OR7429</a></td>
                            <td>iPhone 6 Plus</td>
                            <td><span class="label label-danger">Delivered</span></td>
                            <td>
                                <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                            </td>
                        </tr>
                        <tr>
                            <td><a href="pages/examples/invoice.html">OR7429</a></td>
                            <td>Samsung Smart TV</td>
                            <td><span class="label label-info">Processing</span></td>
                            <td>
                                <div class="sparkbar" data-color="#00c0ef" data-height="20">90,80,-90,70,-61,83,63</div>
                            </td>
                        </tr>
                        <tr>
                            <td><a href="pages/examples/invoice.html">OR1848</a></td>
                            <td>Samsung Smart TV</td>
                            <td><span class="label label-warning">Pending</span></td>
                            <td>
                                <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                            </td>
                        </tr>
                        <tr>
                            <td><a href="pages/examples/invoice.html">OR7429</a></td>
                            <td>iPhone 6 Plus</td>
                            <td><span class="label label-danger">Delivered</span></td>
                            <td>
                                <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                            </td>
                        </tr>
                        <tr>
                            <td><a href="pages/examples/invoice.html">OR9842</a></td>
                            <td>Call of Duty IV</td>
                            <td><span class="label label-success">Shipped</span></td>
                            <td>
                                <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                            </td>
                        </tr>
                    -->
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
            <a href="{{ route('articles.create') }}" class="btn btn-sm btn-info btn-flat pull-left">Novo artigo</a>
            <a href="{{ route('articles.index') }}" class="btn btn-sm btn-default btn-flat pull-right">Todos artigos</a>
        </div>
        <!-- /.box-footer -->
    </div>
    <!-- /.box -->
</div>
<!-- /.col -->

        <div class="col-md-4">


        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
@stop