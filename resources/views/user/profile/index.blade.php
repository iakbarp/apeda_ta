@extends('layouts.user.mst_user_relog')
@section('title', 'Aplikasi Pembangunan Daerah | Profil Aplikasi')
@section('nav')
    <li><a href="{{url('home#fh5co-practices')}}">Beranda</a></li>
    <li class="active"><a href="{{url('profile')}}">Profil Aplikasi</a></li>
    <li><a href="{{url('employes')}}">Daftar Kecamatan</a></li>
    @if ($user->role_id==2)
        <li><a href="{{url('admin')}}">Halaman Admin</a></li>
    @else
        <li><a href="{{url('FormUsulan')}}">RKP</a></li>
    @endif
@endsection
@section('content')
    <aside id="fh5co-hero" class="js-fullheight">
        <div class="flexslider js-fullheight">
            <ul class="slides">
                <li style="background-image: url({{asset((!empty($city->photo) && $city->photo != NULL) ? 'storage/' . $city->photo : 'images/about.jpeg')}});">
                    <div class="overlay-gradient"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
                                <div class="slider-text-inner">
                                    <h1>Aplikasi Usulan Pembangunan Daerah</h1>
                                    <p class="fh5co-lead">{{ isset($city->description)?$city->description:'Data Belum Diisi' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </aside>
    <br>
    <div id="fh5co-content">

        <div class="video fh5co-video"
             style="background-image: url({{asset((!empty($city->youtube) && $city->youtube != NULL) ? 'http://img.youtube.com/vi/' . $city->youtube . '/0.jpg' : 'images/video.jpg')}}) ; size: 100px">
            <a href="{{ (!empty($city->youtube) && $city->youtube != NULL) ? 'https://www.youtube.com/watch?v=' . $city->youtube : 'https://www.youtube.com/watch?v=kee98xLA_OQ' }}"
               class="popup-youtube"><i class="icon-video2"></i></a>
            <div class="overlay"></div>
        </div>
        <div class="choose animate-box">
            <div class="fh5co-heading">
                <h2>Visi Pembangunan Daerah (BAPPEDA)</h2>
                <p style="text-align: justify">{{ isset($city->vision)?$city->vision:'Data Belum Diisi' }}</p>
                <h2>Misi Pembangunan Daerah (BAPPEDA)</h2>
                <p style="text-align: justify">{{ isset($city->mision)?$city->mision:'Data Belum Diisi' }}</p>
            </div>
        </div>
    </div>

    <div id="fh5co-about">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2>Seksi-Seksi KPP Madya Surabaya</h2>
                    <p>Kantor Pelayanan Pajak Madya Surabaya terdiri dari beberapa seksi, yaitu :</p>
                </div>
            </div>
            <div class="row">
                @for($i=1;$i<count($data);$i++)
                    <div class="col-md-4 col-sm-2 text-center animate-box" data-animate-effect="fadeIn">
                        <div class="fh5co-staff">
                            <h3>{{$data[$i]->name}}</h3>
                            <strong class="role">{{$data[$i]->seksi}}</strong>
                            <p align="justify">
                                {{$data[$i]->desc}}
                            </p>
                        </div>

                    </div>
                @endfor
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
        }(title + " ~ "));
    </script>
@endsection