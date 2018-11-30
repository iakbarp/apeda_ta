<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'welcomeController@index', function () {
    if (\Illuminate\Support\Facades\Auth::guest())
        return redirect(url('welcome'));
    else
        $cek = \Illuminate\Support\Facades\Auth::user()->role->name;
    if ($cek == 'Admin') {
        return redirect(url('home'));
    }
    elseif ($cek == 'Bappeda') {
        return redirect(url('home'));
    }else
        return redirect(url('home'));
});
Route::get('/register', function(){
    return redirect(url('register'));
});
Auth::routes();
Route::get('404',['as'=>'404','uses'=>'ErrorHandlerController@errorCode404']);
Route::get('405',['as'=>'405','uses'=>'ErrorHandlerController@errorCode405']);
//Route::match(['get', 'post'], 'register', function () {
//    if (\Illuminate\Support\Facades\Auth::guest())
//        return redirect(url('home'));
//    else
//        $cek = \Illuminate\Support\Facades\Auth::user()->role->name;
//    if ($cek == 'Admin') {
//        return redirect(url('admin'));
//    } else
//        return redirect(url('home'));
//});

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'api'], function () {
        Route::get('mst/data2', 'UsulanController@apiData2')->name('api.mst.data2');
        Route::get('mst/data3', 'UsulanController@apiData3')->name('api.mst.data3');
        Route::get('mst/data', 'UsulanController@apiData')->name('api.mst.data4');
    });
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', 'profileController@index')->name('profile');
    });

    Route::group(['prefix' => 'TambahDesa'], function () {
        Route::get('/', 'DesaController@index')->name('user.desa.table.user');
        Route::get('{users}', 'DesaController@index')->name('user.desa.table.user');
        Route::group(['prefix' => 'user'], function () {
            Route::get('/', 'DesaController@index')->name('user.desa.table.user');
            Route::get('/api', 'DesaController@apiUser')->name('user.desa.table.user.api');
            Route::get('/getPosisition', 'DesaController@getPosisition')->name('user.desa.table.user.getPosisition');
            Route::get('/api-penghuni', 'DesaController@apiPenghuni')->name('user.desa.table.penghuni.api');
            Route::get('/api-histori', 'DesaController@apiPenghunihistori')->name('user.desa.table.penghuni.histori');
            Route::get('/lihat', 'DesaController@lihat')->name('user.desa.table.pengguna.lihat');
            Route::get('/cekhapus', 'DesaController@cekhapus')->name('user.desa.table.pengguna.cekhapus');
            Route::get('/hapus', 'DesaController@hapus')->name('user.desa.table.pengguna.hapus');
            Route::get('/ceknik', 'DesaController@ceknik')->name('user.desa.table.pengguna.ceknik');
            Route::post('/edit', 'DesaController@edit')->name('user.desa.table.pengguna.edit');
            Route::post('/storesuratplus', 'DesaController@storesuratplus')->name('user.desa.table.pengguna.storesuratplus');
            Route::get('/resend', 'DesaController@resend')->name('user.desa.table.pengguna.resend');
        });
    });

    Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {
        Route::get('/', 'AdminController@index')->name('admin.dashboard');
        Route::get('dataget', 'AdminController@dataget')->name('admin.dataget');
        Route::get('datauniv', 'AdminController@datauniv')->name('admin.datauniv');
        Route::get('accept', 'AdminController@accept')->name('admin.accept');
        Route::get('reject', 'AdminController@reject')->name('admin.reject');
        Route::get('carouselget', 'AdminController@carouselget')->name('admin.carouselget');
        Route::get('suratshow', 'AdminController@suratshow')->name('admin.suratshow');
        Route::get('mstdatashow', 'AdminController@mstdatashow')->name('admin.mstdatashow');
        Route::post('carouseladd', 'AdminController@carouseladd')->name('admin.carouseladd');
        Route::post('carouseledit', 'AdminController@carouseledit')->name('admin.carouseledit');
        Route::get('carouseldelete', 'AdminController@carouseldelete')->name('admin.carouseldelete');
        Route::group(['prefix' => 'cities'], function () {
            // Route::get('', 'AdminCityController@index')->name('admin.city.index');
            // Route::get('create', 'AdminCityController@create')->name('admin.city.create');
            // Route::post('create', 'AdminCityController@store')->name('admin.city.store');
            Route::get('{id}/change', 'AdminCityController@change')->name('admin.city.change');
            Route::post('{id}/change', 'AdminCityController@update')->name('admin.city.update');
            // Route::get('{id}/delete', 'AdminCityController@delete')->name('admin.city.delete');
        });
        Route::group(['prefix' => 'request'], function () {
            Route::get('/', 'AdminTableManageController@index')->name('admin.request.index');
            Route::get('/apiData', 'AdminTableManageController@apiData')->name('admin.request.apiData');
            Route::get('/accept', 'AdminTableManageController@accept')->name('admin.request.accept');
            Route::get('/deny', 'AdminTableManageController@deny')->name('admin.request.deny');
//            Route::get('/', 'UsulanduaController@index')->name('usulan.index');
//        Route::post('save', 'eBerkasController@store')->name('eberkas.store');

            Route::post('/save', 'AdminTableManageController@store')->name('admin.request.store');
            Route::get('/apiusulan', 'AdminTableManageController@api')->name('admin.request.api');
            Route::get('/jumlah', 'AdminUsulanduaController@jumlah')->name('admin.request.jumlah');
            Route::get('/show', 'AdminTableManageController@edit')->name('admin.request.show');
            Route::get('/delete', 'AdminTableManageController@destroy')->name('admin.request.delete');
            Route::get('/deleteperm', 'AdminUsulanduaController@deleteperm')->name('admin.request.deleteperm');
            Route::get('/restore', 'AdminTableManageController@restore')->name('admin.request.restore');
            Route::get('/history', 'AdminTableManageController@history')->name('admin.request.history');
            Route::post('/cek', 'AdminUsulanduaController@cek')->name('admin.request.cek');
            Route::post('/update', 'AdminTableManageController@update')->name('admin.request.update');
            Route::post('/multiupdate', 'AdminTableManageController@multiupdate')->name('admin.request.multiupdate');
        });

        Route::group(['prefix' => 'table'], function () {
            Route::get('{users}', 'AdminTableUserController@index')->name('admin.table.user');
            Route::group(['prefix' => 'user'], function () {
                Route::get('/', 'AdminTableUserController@index')->name('admin.table.user');
                Route::get('/api', 'AdminTableUserController@apiUser')->name('admin.table.user.api');
                Route::get('/getPosisition', 'AdminTableUserController@getPosisition')->name('admin.table.user.getPosisition');
                Route::get('/getVillage', 'AdminTableUserController@getVillage')->name('admin.table.user.getVillage');
                Route::get('/api-penghuni', 'AdminTableLetterController@apiPenghuni')->name('admin.table.penghuni.api');
                Route::get('/api-histori', 'AdminTableLetterController@apiPenghunihistori')->name('admin.table.penghuni.histori');
                Route::get('/lihat', 'AdminTableUserController@lihat')->name('admin.table.pengguna.lihat');
                Route::get('/cekhapus', 'AdminTableUserController@cekhapus')->name('admin.table.pengguna.cekhapus');
                Route::get('/hapus', 'AdminTableUserController@hapus')->name('admin.table.pengguna.hapus');
                Route::get('/ceknik', 'AdminTableUserController@ceknik')->name('admin.table.pengguna.ceknik');
                Route::post('/edit', 'AdminTableUserController@edit')->name('admin.table.pengguna.edit');
                Route::post('/storesuratplus', 'AdminTableUserController@storesuratplus')->name('admin.table.pengguna.storesuratplus');
                Route::get('/resend', 'AdminTableUserController@resend')->name('admin.table.pengguna.resend');
            });
            Route::group(['prefix' => 'letter'], function () {
                Route::get('/', 'AdminTableLetterController@index')->name('admin.table.letter');
                Route::get('/api', 'AdminTableLetterController@api')->name('admin.table.letter.api');
                Route::get('/lihat', 'AdminTableLetterController@lihat')->name('admin.table.letter.lihat');
                Route::get('/cekhapus', 'AdminTableLetterController@cekhapus')->name('admin.table.letter.cekhapus');
                Route::get('/hapus', 'AdminTableLetterController@hapus')->name('admin.table.letter.hapus');
                Route::post('/storesurat', 'AdminTableLetterController@storesurat')->name('admin.table.letter.storesurat');
                Route::post('/storesuratplus', 'AdminTableLetterController@storesuratplus')->name('admin.table.letter.storesuratplus');
                Route::get('/apisurat', 'AdminTableUserController@apiSurat')->name('admin.table.surat.api');
                Route::post('/edit', 'AdminTableLetterController@edit')->name('admin.table.surat.edit');
            });
        });
    });

//    Route::group(['prefix' => 'bappeda'], function () {
//        Route::group(['prefix' => 'table'], function () {
//            Route::group(['prefix' => 'user'], function () {
//                Route::post('/store', 'BappedaTableUserController@store')->name('bappeda.table.pengguna.store');
//            });
//        });
//    });

    Route::group(['prefix' => 'super', 'middleware' => ['super']], function () {
        Route::get('/', 'BappedaController@index')->name('bappeda.dashboard');
        Route::get('dataget', 'BappedaController@dataget')->name('bappeda.dataget');
        Route::get('datauniv', 'BappedaController@datauniv')->name('bappeda.datauniv');
        Route::get('accept', 'BappedaBappedaController@accept')->name('bappeda.accept');
        Route::get('reject', 'BappedaController@reject')->name('bappeda.reject');
        Route::get('carouselget', 'BappedaController@carouselget')->name('bappeda.carouselget');
        Route::get('suratshow', 'BappedaController@suratshow')->name('bappeda.suratshow');
        Route::get('mstdatashow', 'BappedaController@mstdatashow')->name('bappeda.mstdatashow');
        Route::post('carouseladd', 'BappedaController@carouseladd')->name('bappeda.carouseladd');
        Route::post('carouseledit', 'BappedaController@carouseledit')->name('bappeda.carouseledit');
        Route::get('carouseldelete', 'BappedaController@carouseldelete')->name('bappeda.carouseldelete');
        Route::group(['prefix' => 'request'], function () {
            Route::get('/', 'BappedaTableManageController@index')->name('bappeda.request.index');
            Route::get('/apiData', 'BappedaTableManageController@apiData')->name('bappeda.request.apiData');
            Route::get('/accept', 'BappedaTableManageController@accept')->name('bappeda.request.accept');
            Route::get('/deny', 'BappedaTableManageController@deny')->name('bappeda.request.deny');
        });
        Route::group(['prefix' => 'table'], function () {
            Route::get('{users}', 'BappedaTableUserController@index')->name('bappeda.table.user');
            Route::group(['prefix' => 'superuser'], function () {
                Route::get('/', 'BappedaTableUserController@index')->name('bappeda.table.user');
                Route::get('/api', 'BappedaTableUserController@apiUser')->name('bappeda.table.user.api');
                Route::get('/getPosisition', 'BappedaTableUserController@getPosisition')->name('bappeda.table.user.getPosisition');
                Route::get('/api-penghuni', 'BappedaTableLetterController@apiPenghuni')->name('bappeda.table.penghuni.api');
                Route::get('/api-histori', 'BappedaTableLetterController@apiPenghunihistori')->name('bappeda.table.penghuni.histori');
                Route::get('/lihat', 'BappedaTableUserController@lihat')->name('bappeda.table.pengguna.lihat');
                Route::get('/cekhapus', 'BappedaTableUserController@cekhapus')->name('bappeda.table.pengguna.cekhapus');
                Route::get('/hapus', 'BappedaTableUserController@hapus')->name('bappeda.table.pengguna.hapus');
                Route::get('/ceknik', 'BappedaTableUserController@ceknik')->name('bappeda.table.pengguna.ceknik');
                Route::post('/edit', 'BappedaTableUserController@edit')->name('bappeda.table.pengguna.edit');
                Route::get('/resend', 'BappedaTableUserController@resend')->name('bappeda.table.pengguna.resend');
            });
            Route::group(['prefix' => 'superletter'], function () {
                Route::get('/', 'BappedaTableLetterController@index')->name('bappeda.table.letter');
                Route::get('/api', 'BappedaTableLetterController@api')->name('bappeda.table.letter.api');
                Route::get('/lihat', 'BappedaTableLetterController@lihat')->name('bappeda.table.letter.lihat');
                Route::get('/cekhapus', 'BappedaTableLetterController@cekhapus')->name('bappeda.table.letter.cekhapus');
                Route::get('/hapus', 'BappedaTableLetterController@hapus')->name('bappeda.table.letter.hapus');
                Route::post('/storesurat', 'BappedaTableLetterController@storesurat')->name('bappeda.table.letter.storesurat');
                Route::post('/storesuratplus', 'BappedaTableLetterController@storesuratplus')->name('bappeda.table.letter.storesuratplus');
                Route::get('/apisurat', 'BappedaTableUserController@apiSurat')->name('bappeda.table.surat.api');
                Route::post('/edit', 'BappedaTableLetterController@edit')->name('bappeda.table.surat.edit');
            });
        });
    });
    Route::group(['prefix' => 'user'], function () {
        Route::get('update', 'UserController@index')->name('user.update');
        Route::get('getjob', 'UserController@getjob')->name('user.getjob');
        Route::post('store', 'UserController@store')->name('user.store');
        Route::get('waktu', 'UserController@waktu')->name('user.waktu');
        Route::get('cek', 'UserController@cek')->name('user.cek');
        Route::get('kirim', 'UserController@kirim')->name('user.kirim');
        Route::group(['middleware' => ['role']], function () {
            Route::get('pengurus', 'UserController@pengurus')->name('user.pengurus');
            Route::post('suratplus', 'UserController@suratplus')->name('user.suratplus');
            Route::get('ceksurat', 'UserController@ceksurat')->name('user.ceksurat');
            Route::get('data', 'UserController@apiData')->name('user.data');
        });
    });
    Route::group(['prefix' => 'FormUsulan'], function () {
//        Route::get('/', 'eBerkasController@index')->name('eberkas.index');
        Route::get('/', 'UsulanduaController@index')->name('usulan.index');
//        Route::post('save', 'eBerkasController@store')->name('eberkas.store');
        Route::post('save', 'UsulanduaController@store')->name('usulan.store');
        Route::get('apiusulan', 'UsulanduaController@api')->name('usulan.api');
        Route::get('jumlah', 'UsulanController@jumlah')->name('usulan.jumlah');
        Route::get('show', 'UsulanduaController@edit')->name('usulan.show');
        Route::get('delete', 'UsulanduaController@destroy')->name('usulan.delete');
        Route::get('deleteperm', 'UsulanController@deleteperm')->name('usulan.deleteperm');
        Route::get('restore', 'UsulanduaController@restore')->name('usulan.restore');
        Route::get('history', 'UsulanduaController@history')->name('usulan.history');
        Route::post('cek', 'UsulanController@cek')->name('usulan.cek');
        Route::post('update', 'UsulanduaController@update')->name('usulan.update');
        Route::post('multiupdate', 'UsulanduaController@multiupdate')->name('usulan.multiupdate');
    });
    Route::group(['prefix' => 'employes'], function () {
        Route::get('/coba', 'EmployesController@coba')->name('coba');
        Route::get('/coba2', 'EmployesController@coba2')->name('coba2');
        Route::get('/caridata', 'EmployesController@caridata');
        Route::get('/', 'EmployesController@index')->name('employes.index');
    });
});

Route::get('verifyEmailFirst', 'Auth\RegisterController@verifyEmailFirst')->name('verifyEmailFirst');

Route::get('verify/{email}/{verifyToken}', 'Auth\RegisterController@sendEmailDone')->name('sendEmailDone');
//Route::get('verify/{email}/{verifyToken}', 'Auth\RegisterController@sendEmailDone')->name('sendEmailDone');
//Route::get('/admin', 'AdminController@setuju')->name('admin.dashboard.setuju');

Route::get('/home', 'GeneralController@index')->name('dashboard');
Route::get('/get', 'GeneralController@get')->name('get');
Route::get('/coba', 'GeneralController@index')->name('rumah');
Route::get('/tryemil', 'AdminTableUserController@tryna')->name('tryna');
//Route::get('/tryemil', 'BappedaTableUserController@tryna')->name('tryna');