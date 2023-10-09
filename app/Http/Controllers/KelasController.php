<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelasController extends Controller
{
    public function index()
    {
        $data['getKelas'] = Kelas::getKelasAll();
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
        $judul = $kelas->kelas;

        return redirect('kelas/index')->with('success', ucwords($judul) . ' Berhasil Di Tambahkan.');
    }

    public function edit($id)
    {
        $id = decrypt($id);

        $data['header_title'] = 'Edit Kelas';
        $data['getSingleKelas'] = Kelas::getSingleKelas($id);

        if (!empty($data['getSingleKelas'])) {
            return view('admin.kelas.edit', $data);
        } else {
            abort(404);
        }
    }

    public function update(Request $request, $id)
    {
        $id = decrypt($id);
        $request->validate([
            'kelas' => 'required|max:255|unique:kelas,kelas,' . $id,
            'status' => 'required'
        ]);

        $kelas = Kelas::getSingleKelas($id);
        $judul = $kelas->kelas;
        $kelas->kelas = $request->kelas;
        $kelas->status = $request->status;
        $kelas->created_by = auth()->user()->id;
        $kelas->save();

        return redirect('kelas/index')->with('success', ucwords($judul) . ' Berhasil Di Perbarui.');
    }

    public function destroy($id)
    {
        $id = decrypt($id);
        $kelas = Kelas::getSingleKelas($id);
        $kelas->delete();
        return redirect('kelas/index')->with('success', ucwords($kelas->kelas) . ' Berhasil Di Hapus.');
    }
}
