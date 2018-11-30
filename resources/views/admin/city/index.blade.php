@extends('layouts.admin.admin_mst_dashboard')

@section('title', 'Aplikasi Pembangunan Daerah | Dashboard')

@section('style')
    <style>
        tr:hover {
            background-color: #dedfe0;
        }

        .pagination {
            background: #f2f2f2;
            padding: 20px;
            margin-bottom: 20px;
        }

        .page {
            display: inline-block;
            padding: 0px 9px;
            margin-right: 4px;
            border-radius: 3px;
            border: solid 1px #c0c0c0;
            background: #e9e9e9;
            box-shadow: inset 0px 1px 0px rgba(255, 255, 255, .8), 0px 1px 3px rgba(0, 0, 0, .1);
            font-size: .875em;
            font-weight: bold;
            text-decoration: none;
            color: #717171;
            text-shadow: 0px 1px 0px rgba(255, 255, 255, 1);
        }

        .page:hover, .page.gradient:hover {
            background: #fefefe;
            background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#FEFEFE), to(#f0f0f0));
            background: -moz-linear-gradient(0% 0% 270deg, #FEFEFE, #f0f0f0);
        }

        .page.active {
            border: none;
            background: #616161;
            box-shadow: inset 0px 0px 8px rgba(0, 0, 0, .5), 0px 1px 0px rgba(255, 255, 255, .8);
            color: #f0f0f0;
            text-shadow: 0px 0px 3px rgba(0, 0, 0, .5);
        }

        .page.gradient {
            background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#f8f8f8), to(#e9e9e9));
            background: -moz-linear-gradient(0% 0% 270deg, #f8f8f8, #e9e9e9);
        }

        .pagination.dark {
            background: #414449;
            color: #feffff;
        }

        .page.dark {
            border: solid 1px #32373b;
            background: #3e4347;
            box-shadow: inset 0px 1px 1px rgba(255, 255, 255, .1), 0px 1px 3px rgba(0, 0, 0, .1);
            color: #feffff;
            text-shadow: 0px 1px 0px rgba(0, 0, 0, .5);
        }

        .page.dark:hover, .page.dark.gradient:hover {
            background: #3d4f5d;
            background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#547085), to(#3d4f5d));
            background: -moz-linear-gradient(0% 0% 270deg, #547085, #3d4f5d);
        }

        .page.dark.active {
            border: none;
            background: #2f3237;
            box-shadow: inset 0px 0px 8px rgba(0, 0, 0, .5), 0px 1px 0px rgba(255, 255, 255, .1);
        }

        .page.dark.gradient {
            background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#565b5f), to(#3e4347));
            background: -moz-linear-gradient(0% 0% 270deg, #565b5f, #3e4347);
        }
    </style>
@endsection

@section('sidenav')
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Navigasi Admin</li>
        <li>
            <a href="{{route('admin.dashboard')}}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        <li class="active">
            <a href="{{route('admin.city.index')}}">
                <i class="fa fa-file-text"></i> <span>Kota/Kabupaten</span>
            </a>
        </li>
        <li class="">
            <a href="{{route('admin.request.index')}}">
                <i class="fa fa-file-text"></i> <span>Permintaan</span>
            </a>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-table"></i>
                <span>Tabel Pengurus</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{route('admin.table.user')}}"><i class="fa fa-group"></i> Pengguna</a></li>
                <li><a href="{{route('admin.table.letter')}}"><i class="fa fa-envelope"></i>Jenis Surat</a></li>
            </ul>
        </li>
    </ul>
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Data Kota/Kabupaten
                <small class="change">Semua Seksi</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Kota/Kabupaten</a></li>
                <li class="active change">Semua Seksi</li>
            </ol>
        </section>
        <section class="content">

            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Tabel Profil Kota &nbsp;</h3>
                            <a class="btn btn-primary acceptall" data-toggle="tooltip"
                               href="{{ route('admin.city.create') }}">Tambah Data</a>

                            <div class="box-tools pull-right" style="margin: 5px">
                                <div class="input-group input-group-sm" style="width: 200px;">
                                    <input type="text" name="table_search" id="table_search"
                                           class="form-control pull-right" placeholder="Search">

                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-default" id="searchBtn"><i
                                                    class="fa fa-search"></i>
                                            <i class="fa fa-circle-o-notch fa-spin fa-1x fa-fw"
                                               style="display: none"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#request0" data-change="Semua Seksi"
                                                  data-id="0" title="">Semua</a>
                        </ul>
                        <div class="tab-content">
                            <div id="request0" class="tab-pane fade in active text-center"><br>
                                <div class="box-body">

                                    <div class="table-responsive">
                                        <table class="table no-margin">
                                            <thead>
                                            <tr>
                                                <th style="width:40px;">#</th>
                                                <th>Kota</th>
                                                <th>Foto</th>
                                                <th>Aksi</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($cities as $key => $value)
                                                <tr>
                                                    <td>{{ $value->id }}</td>
                                                    <td>{{ $value->name }}</td>
                                                    <td>
                                                        <img src="{{ asset('storage/' . $value->photo) }}" alt=""
                                                             style="width: 100px; height: 100px;">
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-primary" data-toggle="tooltip"
                                                           href="{{ route('admin.city.change', $value->id) }}">Ubah</a>
                                                        <a class="btn btn-danger" data-toggle="tooltip"
                                                           href="{{ route('admin.city.change', $value->id) }}">Hapus</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>

                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="overlay" id="load">
                            <img src="{{asset('images/loadingstyle/loadingimg.gif')}}"
                                 style="width: 30%;height: auto; position: absolute; top: 0; bottom:0; left: 0; right:0; margin: auto;">
                        </div>
                        <div class="box-footer clearfix">

                        </div>
                        <!-- /.box-footer -->
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#load').hide();
        });

        $('#searchBtn').on('click', function (asd) {
            $e = $.Event("keypress", {
                which: 13
            });
            $('#table_search').trigger($e);
        });
    </script>
@endsection