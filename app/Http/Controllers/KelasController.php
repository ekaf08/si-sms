<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelasController extends Controller
{
    public function index()
    {
        // $data['getRecord'] = User::getAdmin();
        $data['header_title'] = 'Kelas List';
        return view('admin.kelas.index', $data);
    }

    public function add()
    {
        $data['header_title'] = 'Tambah Kelas';
        return view('admin.kelas.add', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kelas' => 'required|unique:kelas|max:255',
            'status' => 'required'
        ]);

        $kelas = new Kelas();
        $kelas->kelas = $request->kelas;
        $kelas->status = $request->status;
        $kelas->created_by = auth()->user()->id;
        $kelas->save();

        return redirect('admin/list')->with('success', 'Kelas Berhasil Di Tambahkan.');
    }
}
