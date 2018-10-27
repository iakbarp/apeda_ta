@extends('layouts.user.mst_user_relog')
@section('title', 'Aplikasi Pembangunan Daerah ')
@section('nav')
    <li><a href="{{url('login')}}">Login</a></li>
    <li><a href="{{url('register')}}">Register</a></li>
@endsection
@section('content')
    <div class="fh5co-loader"></div>
    <script>
        swal("Selamat Datang", "Aplikasi Perencanaan Pembangunan Daerah", "info", "1500")
    </script>
    <aside id="fh5co-hero" class="js-fullheight">
        <div class="flexslider js-fullheight">
            <ul class="slides" id="listslide">
                    <li style="background-image:url({{url('images/legal.jpeg')}})">
                        <div class="overlay-gradient"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
                                    <div class="slider-text-inner">
                                        <h1>Selamat Datang</h1>
                                        <h2>Aplikasi Perencanaan Pembangunan Daerah </h2>
                                        <h2>Berminat Menggunakan Layanan APEDA ?</h2>
                                        <p><a class="btn btn-primary btn-lg"
                                              href="{{'register'}}">
                                                {{'Daftar Sekarang'}}</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
            </ul>
        </div>
    </aside>

    <div id="fh5co-practice" class="fh5co-bg-section">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2>APEDA</h2>
                    <p> APEDA merupakan pengarsipan data melalui media online, yang menyediakan Daftar Pegawai dan
                        perencanaan pembangunan </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 text-center animate-box">
                    <a href="">
                        <div class="services">
                            <span class="icon">
                                <i class="fa fa-send-o"></i>
                            </span>
                            <div class="desc">
                                <h3><a href="">Form Usulan</a></h3>
                                <p>Aplikasi Perencanaan Pembangunan bertujuan untuk memproses sistem Perencanaan Pembangunan yang ada di daerah agar efisien</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 text-center animate-box">
                    <a href="">
                        <div class="services">
                            <span class="icon">
                                <i class="fa fa-users"></i>
                            </span>
                            <div class="desc">
                                <h3><a href="">2 Tingkatan Pengguna</a></h3>
                                <p>Aplikasi ini juga dilengkapi dengan 2 halaman pengguna berdasarkan tingkat jabatan. terdapat Halaman Pengguna Tim Pelaksana Kegiatan, dan Halaman Admin Badan Perencanaan Pembangunan Daerah </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 text-center animate-box">
                    <a href="{{--{{route('hama.dashboard')}}--}}">
                        <div class="services">
                            <span class="icon">
                                <i class="fa fa-building"></i>
                            </span>
                            <div class="desc">
                                <h3><a href="{{--{{route('hama.dashboard')}}--}}">Aplikasi Bersifat Generik</a></h3>
                                <p>Aplikasi APEDA dapat digunakan oleh Kabupaten/Kota yang telah mendaftar</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        var title = document.getElementsByTagName("title")[0].innerHTML;
        (function titleScroller(text) {
            document.title = text;
            setTimeout(function () {
                titleScroller(text.substr(1) + text.substr(0, 1));
            }, 500);
        }(title + " | "));
    </script>

@endsection