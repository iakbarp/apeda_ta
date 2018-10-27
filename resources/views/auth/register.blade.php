@extends('layouts.user.mst_user_relog')
@section('title', 'Aplikasi Pembangunan Daerah - Register')
@section('content')
    <script>
        swal("Bagi Pengguna SKPD", "Harap hubungi Badan Perencanaan Pembangunan Daerah di Kota/Kabupaten anda untuk mendaftar sebagai pengguna SKPD", "info", "1500")
    </script>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Nama Lengkap</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('nik') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Nomor KTP</label>

                                <div class="col-md-6">
                                    <input id="nik" type="text" class="form-control" name="nik" required>

                                    @if ($errors->has('nik'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('nik') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('tempat_lahir','tgl_lahir') ? ' has-error' : '' }}">

                                <label for="password" class="col-md-4 control-label">Tempat tanggal lahir</label>

                                <div class="col-md-6">
                                    <select placeholder="Pilih Kota" id="tempat_lahir" type="text"
                                            class="form-control"
                                            name="tempat_lahir"
                                            required autofocus>
                                        <option value="" disabled selected>- Pilih Kota -
                                        </option>
                                        @foreach(\App\city::all() as $row)
                                            <option value="{{$row->name}}">{{$row->name}}</option>
                                                @endforeach
                                                <input id="tgl_lahir" type="date" class="form-control" name="tgl_lahir" required>
                                                @if ($errors->has('tempat_lahir'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('tempat_lahir') }}</strong>
                                    </span>
                                                @endif
                                                @if ($errors->has('tgl_lahir'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_lahir') }}</strong>
                                    </span>
                                            @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Kota Dinas :</label>
                                <div class="col-md-6">
                                    <select placeholder="Pilih Kota" id="city_id" type="text"
                                            class="form-control"
                                            name="city_id"
                                            required autofocus>
                                        <option value="" disabled selected>- Pilih Kota -
                                        </option>
                                        @foreach(\App\city::all() as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                        @if ($errors->has('city_id'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('city_id') }}</strong>
                                    </span>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('role_id' , 'job_id' , 'posisition_id') ? ' has-error' : '' }}">
                                <div class="col-md-6">
                                    @foreach(\App\status::find($id=['2']) as $row)
                                        <input id="role_id" type="hidden" class="form-control" name="role_id" value="{{$row->id}}" readonly>
                                    @endforeach
                                    @if ($errors->has('role_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('role_id') }}</strong>
                                    </span>
                                    @endif
                                    @foreach(\App\trDataJobDesc::find($id=['2']) as $row)
                                        <input id="job_id" type="hidden" class="form-control" name="job_id" value="{{$row->id}}" readonly>
                                    @endforeach
                                    @if ($errors->has('job_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('job_id') }}</strong>
                                    </span>
                                    @endif
                                    @foreach(\App\trDataPosisition::find($id=['2']) as $row)
                                        <input id="posisition_id" type="hidden" class="form-control" name="posisition_id" value="{{$row->id}}" readonly>
                                    @endforeach
                                    @if ($errors->has('posisition_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('posisition_id') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div style="padding-left: 5%" class="col-lg-10">
                            <a class="btn btn-link" href="{{ route('login') }}">
                                Sudah punya akun? Login disini!
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
