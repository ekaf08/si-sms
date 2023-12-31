<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getAdmin();
        $data['header_title'] = 'Admin List';
        return view('admin.admin.list', $data);
    }

    public function add()
    {
        $data['header_title'] = 'Tambah Admin';
        return view('admin.admin.add', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|unique:users|max:255|email',
            'password' => 'required|min:5',
        ]);

        if ($request->password == $request->cpassword) {
            $user =  new User;
            $user->name = trim($request->name);
            $user->email = trim($request->email);
            $user->password = Hash::make($request->password);
            $user->user_type = 1;
            $user->save();

            return redirect('admin/list')->with('success', 'Admin Berhasil Di Tambahkan.');
        } else {
            return redirect()->back()->with('error', 'Mohon maaf password dan konfirmasi password tidak sesuai.');
        }
    }

    public function edit(Request $request, $id)
    {
        $id = decrypt($id);
        $data['header_title'] = 'Edit Admin';
        $data['getRecord'] = User::getSingle($id);
        if (!empty($data['getRecord'])) {
            return view('admin.admin.edit', $data);
        } else {
            abort(404);
        }
    }

    public function update(Request $request, $id)
    {
        $id = decrypt($id);

        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
        ]);

        $user = User::getSingle($id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        if (!empty($request->password)) {
            if ($request->password == $request->cpassword) {
                $user->password = Hash::make($request->password);
            } else {
                return redirect()->back()->with('error', 'Mohon maaf password dan konfirmasi password tidak sesuai.');
            }
        }
        $user->save();
        return redirect('admin/list')->with('success', 'Admin ' . ucwords($user->name) . ' Berhasil Di Perbarui.');
    }

    public function destroy(Request $request, $id)
    {
        $id = decrypt($id);
        $user = User::getSingle($id);
        $user->delete();
        return redirect('admin/list')->with('success', 'Admin ' . ucwords($user->name) . ' Berhasil Di Hapus.');
    }
}
