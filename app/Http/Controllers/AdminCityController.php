<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\City\Store as RequestStore;
use App\Http\Requests\City\Patch as RequestPatch;

use App\trRequestChangeJob;
use App\Models\Helper\Upload;
use App\User;
use App\city;
use App\Province;

class AdminCityController extends Controller
{

    public function index()
    {
        $data['req'] = trRequestChangeJob::where('admin_id', null)->orderBy('id', 'desc')->get();
        $data['cities'] = city::all();
        return view('admin.city.index', $data);
    }

    public function create()
    {
        $data['req'] = trRequestChangeJob::where('admin_id', null)->orderBy('id', 'desc')->get();
        $data['provinces'] = Province::all();
        return view('admin.city.create', $data);
    }

    public function store(RequestStore $request)
    {
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $file = new Upload($request->file('photo'), 'city/thumbnail');
            $file = $file->save();
            $data['photo'] = isset($file['location']) ? $file['location'] : null;
        }

        if ($city = city::create($data)) {
            return redirect('admin/cities')->withErrors(['Berhasil menambahkan kota/kabupaten']);
        }
        return back()->withErrors(['Gagal menambahkan kota/kabupaten']);
    }

    public function change($id)
    {
        if ($data['city'] = city::find($id)) {
            $data['req'] = trRequestChangeJob::where('admin_id', null)->orderBy('id', 'desc')->get();
            $data['provinces'] = Province::all();
            return view('admin.city.change', $data);
        }
        return redirect('admin/cities');
    }

    public function update($id, RequestPatch $request)
    {
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $file = new Upload($request->file('photo'), 'city/thumbnail');
            $file = $file->save();
            $data['photo'] = isset($file['location']) ? $file['location'] : null;
        }

        if ($city = City::replace($id, $data)) {
            return redirect('admin/cities/' . $id . '/change')->withErrors(['Berhasil mengubah kota/kabupaten']);
        }
        return back()->withErrors(['Gagal menambahkan kota/kabupaten']);
    }

    public function delete($id)
    {
        if ($city = City::find($id)) {
            $city->delete();
        }
        return redirect('admin/cities');
    }

}
