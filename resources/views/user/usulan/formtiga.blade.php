<div class="modal animate-box" id="modal-form-user" tabindex="1" role="dialog" aria-hidden="true"
     data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="post" class="form-horizontal">
                {{ csrf_field() }} {{ method_field('post') }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                    <h3 class="modal-title"></h3>
                </div>

                <div class="modal-body" id="content">
                    <div class="container-fluid">

                        <div class="row ">
                            <div class="col-md-4 animate-box has-feedback" data-animate-effect="flash">
                                <img style="width: 250px" id="ava">
                            </div>
                            <div class="col-md-8 animate-box has-feedback" data-animate-effect="fadeIn">
                                <table id="location"></table>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>

            </form>
        </div>
    </div>
</div>
<div class="modal animate-box" id="modal-form-see2" tabindex="1" role="dialog" aria-hidden="true"
     data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="post" class="form-horizontal">
                {{ csrf_field() }} {{ method_field('post') }}
                <input type="hidden" id="id" name="id">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                    <h3 class="modal-title">Kirim Perencanaan Usulan</h3>
                </div>

                <div class="modal-body" id="content">
                    <div class="container-fluid">
                        <div class="row container-fluid">
                            <div class="row form-group has-feedback">
                                <div class="col-md-7">
                                    <span id="deleteBerkas">Berkas :</span>
                                    <div id="contentBerkas"></div>
                                </div>
                                <div class="col-md-5 uploadfile">
                                    <span>Lampirkan Berkas Musrenbang :</span>
                                    <input type="file" name="file[]"
                                           class="form-control"
                                           multiple id="file">
                                </div>
                            </div>

                            <div class="row form-group has-feedback">
                                <div class="col-md-6">
                                    <span>Tahun :</span>
                                    <input placeholder="Tahun RKP" id="kode" type="text"
                                           class="form-control contentshow"
                                           name="kode"
                                           required autofocus>
                                </div>
                                <div class="col-md-6">
                                    <span>Nama Kegiatan :</span>
                                    <input placeholder="Nama Kegiatan" id="name" type="text"
                                           class="form-control contentshow"
                                           name="name"
                                           required autofocus>
                                </div>
                            </div>
                            <div class="row form-group has-feedback">
                                <div class="col-md-6">
                                    <span>Jenis Surat :</span>
                                    <select placeholder="Kategori Surat" id="category_id" type="text"
                                            class="form-control contentshow"
                                            name="category_id"
                                            required autofocus>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <span id="changeUser">Dibuat Oleh :</span>
                                    <input placeholder="Dibuat Oleh" id="user_id" type="text"
                                           class="form-control"
                                           name="user_id" disabled="true"
                                    >
                                </div>

                            </div>
                            <div class="row form-group has-feedback">
                                <div class="col-md-12">
                                    <input type="hidden" placeholder="Detail" id="desc"
                                           class="form-control contentshow "
                                           name="desc"
                                           required autofocus>
                                </div>
                            </div>
                            <div class="row form-group has-feedback">
                                <div class="col-md-12">
                                    <input type="hidden" placeholder="Lokasi" id="lokasi"
                                           class="form-control contentshow "
                                           name="lokasi"
                                           required autofocus>
                                </div>
                            </div>
                            <div class="row form-group has-feedback">
                                <div class="col-md-12">
                                    <input type="hidden" placeholder="Volume m2" id="volume"
                                           class="form-control contentshow "
                                           name="volume"
                                           required autofocus>
                                </div>
                            </div>
                            <div class="row form-group has-feedback">
                                <div class="col-md-12">
                                    <input type="hidden" placeholder="Anggaran" id="anggaran"
                                           class="form-control contentshow "
                                           name="anggaran"
                                           required autofocus>
                                </div>
                            </div>
                            <div class="row form-group has-feedback">
                                <div class="col-md-12">
                                    <input id="city_id" type="hidden"
                                           class="form-control contentshow "
                                           name="city_id"
                                           value="{{app\user::where('city_id',Auth::user()->city_id)->first()->city_id}}"
                                           required autofocus readonly>
                                </div>
                            </div>
                            <div class="row form-group has-feedback">
                                <div class="col-md-12">
                                    <input id="district_id" type="hidden"
                                           class="form-control contentshow "
                                           name="district_id"
                                           value="{{app\user::where('district_id',Auth::user()->district_id)->first()->district_id}}"
                                           required autofocus readonly>
                                </div>
                            </div>
                            <div class="row form-group has-feedback">
                                <div class="col-md-12">
                                    <input id="village_id" type="hidden"
                                           class="form-control contentshow "
                                           name="village_id"
                                           value="{{app\user::where('village_id',Auth::user()->village_id)->first()->village_id}}"
                                           required autofocus readonly>
                                </div>
                            </div>
                            @if ($user->role_id==4)
                                <div class="row form-group has-feedback">
                                    <div class="col-md-12">
                                        <input id="approve_id" type="text"
                                           class="form-control contentshow "
                                           name="approve_id" value="2"
                                           required autofocus readonly>
                                </div>
                            </div>
                            @elseif ($user->role_id==3)
                                <div class="row form-group has-feedback">
                                    <div class="col-md-12">
                                        <input id="approve_id" type="text"
                                               class="form-control contentshow "
                                               name="approve_id" value="3"
                                               required autofocus readonly>
                                    </div>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-save editform"><em id="berubah">Kirim</em>
                        <i class="fa fa-circle-o-notch fa-spin fa-1x fa-fw" id="loading1"></i>
                    </button>
                    <button type="button" class="btn btn-primary lihatsurat lihatform" data-action="edit"
                            data-status="0" data-id="1" data-method="0"
                            onclick="lihatsurat(this)">Ubah
                    </button>
                    <button type="button" class="btn btn-danger hapussurat lihatform" data-dismiss="modal"
                            onclick="deleteData(this)">Hapus
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                </div>

            </form>
        </div>
    </div>
</div>
<div class="modal animate-box" id="modal-form-multiple" tabindex="1" role="dialog" aria-hidden="true"
     data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="post" class="form-horizontal">
                {{ csrf_field() }} {{ method_field('post') }}
                {{--<input type="hidden" id="noarray" name="noarray">--}}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                    <h3 class="modal-title">Multiple Edit</h3>
                </div>

                <div class="modal-body" id="content">
                    <div class="container-fluid" id="fill">
                        <div class="row container-fluid loopmulti">
                            <div class="row form-group has-feedback">
                                <div class="col-md-3">
                                    <span>Tahun :</span>
                                    <input type="hidden" id="id" name="id[]">
                                    <input placeholder="Tahun RKP" id="kode" type="text"
                                           class="form-control"
                                           name="kode[]"
                                           required autofocus>
                                </div>
                                <div class="col-md-3">
                                    <span>Nama Kegiatan :</span>
                                    <input placeholder="Nama Kegiatan" id="name" type="text"
                                           class="form-control"
                                           name="name[]"
                                           required autofocus>
                                </div>
                                <div class="col-md-3">
                                    <span>Jenis Surat :</span>
                                    <select placeholder="Kategori Surat" id="category_id" type="text"
                                            class="form-control"
                                            name="category_id[]"
                                            required autofocus>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <span>Detail :</span>
                                    <textarea placeholder="Detail" id="desc"
                                              class="form-control"
                                              name="desc[]" style="height: 54px;"
                                              required autofocus></textarea>
                                </div>
                                <div class="col-md-3">
                                    <span>Lokasi :</span>
                                    <textarea placeholder="Lokasi" id="lokasi"
                                              class="form-control"
                                              name="lokasi[]" style="height: 54px;"
                                              required autofocus></textarea>
                                </div>
                                <div class="col-md-3">
                                    <span>Volume m2 :</span>
                                    <textarea placeholder="Detail" id="volumw"
                                              class="form-control"
                                              name="volume[]" style="height: 54px;"
                                              required autofocus></textarea>
                                </div>
                                <div class="col-md-3">
                                    <span>Estimasi Anggaran :</span>
                                    <textarea placeholder="Anggaran" id="anggaran"
                                              class="form-control"
                                              name="anggaran[]" style="height: 54px;"
                                              required autofocus></textarea>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-save editform"><em id="berubah">Submit</em>
                        <i class="fa fa-circle-o-notch fa-spin fa-1x fa-fw" id="loading1" data-dismiss="modal"></i>
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                </div>

            </form>
        </div>
    </div>
</div>
<div class="modal animate-box" id="modal-form-spoiler" tabindex="1" role="dialog" aria-hidden="true"
     data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="post" class="form-horizontal">
                {{ csrf_field() }} {{ method_field('post') }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                    <h3 class="modal-title">Histori Data</h3>
                </div>

                <div class="modal-body" id="content">
                    <div class="container-fluid" id="fill">
                        <div class="row container-fluid loopmulti">
                            <div class="row form-group has-feedback">
                                <div class="col-md-12" id="fill">
                                    <div class="set loopmulti spoiler0">
                                        <a href="javascript:void(0)" class="judul-spoiler" onclick="spoiler(this)">
                                            {{--Vestibulum--}}
                                            {{--<i class="fa fa-plus"></i>--}}
                                        </a>
                                        <div class="content">
                                            <div class="row container-fluid has-feedback">

                                                <div class="col-md-6 hapus-file">
                                                    <b>Hapus Data</b> <br>
                                                    <span id="fill-hapus">Data telah dihapus</span>
                                                </div>
                                                <div class="col-md-6 res-file">
                                                    <b>Pulihkan Data</b> <br>
                                                    <span id="fill-res">Data telah dipulihkan</span>
                                                </div>
                                                <div class="col-md-6 add-file">
                                                    <b>Tambah Berkas</b> <br>
                                                    <div id="fill-add">
                                                        <a href="#">dasdasd</a><br>
                                                        <a href="#">dasdasd</a><br>

                                                    </div>
                                                </div>
                                                <div class="col-md-6 del-file">
                                                    <b>Hapus Berkas</b> <br>
                                                    <div id="fill-del">
                                                        <a href="#">dasdasd</a><br>
                                                        <a href="#">dasdasd</a><br>
                                                        <a href="#">dasdasd</a><br>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 edit-data">
                                                    <b>Rubah Data</b>
                                                    <table>
                                                        <tr>
                                                            <td style="width: 100px" valign="top">Tahun RKP</td>
                                                            <td style="width: 10px" valign="top">:</td>
                                                            <td id="fill-kode">Datto</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 45px" valign="top">Nama Kegiatan</td>
                                                            <td valign="top">:</td>
                                                            <td id="fill-name">Datto</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 45px" valign="top">Kategori</td>
                                                            <td valign="top">:</td>
                                                            <td id="fill-kategori">Datto</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 45px" valign="top">Detail</td>
                                                            <td valign="top">:</td>
                                                            <td id="fill-desc">Datto</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 45px" valign="top">Lokasi</td>
                                                            <td valign="top">:</td>
                                                            <td id="fill-lokasi">Datto</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 45px" valign="top">Volume</td>
                                                            <td valign="top">:</td>
                                                            <td id="fill-volume">Datto</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 45px" valign="top">Anggaran</td>
                                                            <td valign="top">:</td>
                                                            <td id="fill-anggaran">Datto</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--<div class="set">--}}
                                    {{--<a href="#">--}}
                                    {{--Phasellus--}}
                                    {{--<i class="fa fa-plus"></i>--}}
                                    {{--</a>--}}
                                    {{--<div class="content">--}}
                                    {{--<p> Aliquam cursus vitae nulla non rhoncus. Nunc condimentum erat nec dictum tempus. Suspendisse aliquam erat hendrerit vehicula vestibulum.</p>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="set">--}}
                                    {{--<a href="#">--}}
                                    {{--Praesent--}}
                                    {{--<i class="fa fa-plus"></i>--}}
                                    {{--</a>--}}
                                    {{--<div class="content">--}}
                                    {{--<p>Pellentesque aliquam ligula libero, vitae imperdiet diam porta vitae. sed do eiusmod tempor incididunt ut labore et dolore magna.</p>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="set">--}}
                                    {{--<a href="#">--}}
                                    {{--Curabitur--}}
                                    {{--<i class="fa fa-plus"></i>--}}
                                    {{--</a>--}}
                                    {{--<div class="content">--}}
                                    {{--<p> Donec tincidunt consectetur orci at dignissim. Proin auctor aliquam justo, vitae luctus odio pretium scelerisque. </p>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                </div>
                            </div>


                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                </div>

            </form>
        </div>
    </div>
</div>
