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
                <li><a href="{{route('admin.city.index')}}">Kota/Kabupaten</a></li>
                <li class="active change">Tambah Data</li>
            </ol>
        </section>
        <section class="content">

            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Tambah Data &nbsp;</h3>
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
                        <div class="box-body">
                            <form action="{{ route('admin.city.store') }}" class="" method="POST"
                                  enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="container-fluid">
                                    @if ($errors->any())
                                        <div class="row form-group">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="alert alert-warning alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert"
                                                            aria-label="Close"><span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <ul class="">
                                                        @foreach ($errors->all() as $error)
                                                            <li>{!! $error !!}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="row form-group">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <input type="text" name="name" class="form-control" placeholder="Nama"
                                                   value="{{old('name')}}">
                                            <select name="province_id" class="form-control" style="margin: 15px 0;">
                                                @foreach ($provinces as $key => $value)
                                                    <input value="{{$value->id}}" type="hidden">
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <textarea name="description" class="form-control" cols="30" rows="5"
                                                      placeholder="Deskripsi">{{old('description')}}</textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <textarea name="vision" class="form-control" cols="30" rows="5"
                                                      placeholder="Visi">{{old('vision')}}</textarea>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <textarea name="mision" class="form-control" cols="30" rows="5"
                                                      placeholder="Misi">{{old('mision')}}</textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <input type="text" name="youtube" class="form-control"
                                                   placeholder="Youtube Video ID" value="{{old('youtube')}}">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <input type="file" name="photo" id="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <a class="btn btn-warning btn-md" href="{{ route('admin.city.index') }}">Kembali</a>
                                            <button type="submit" class="btn btn-primary btn-md"
                                                    onclick="return confirm('Tambah data?')">Tambah
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="overlay" id="load">
                            <img src="{{asset('images/loadingstyle/loadingimg.gif')}}"
                                 style="width: 30%;height: auto; position: absolute; top: 0; bottom:0; left: 0; right:0; margin: auto;">
                        </div>
                        <div class="box-footer clearfix"></div>
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