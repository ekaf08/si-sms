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
        $data['header_title'] = 'Add New Admin';
        return view('admin.admin.add', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|min:3',
        ]);

        if ($request->password == $request->cpassword) {
            User::create([
                'name'  => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return redirect('admin/list')->with('success', 'User Berhasil Di Tambahkan.');
        } else {
            return redirect()->back()->with('error', 'Mohon maaf password dan konfirmasi password tidak sesuai.');
        }
    }
}
