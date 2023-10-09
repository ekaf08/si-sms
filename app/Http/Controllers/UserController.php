<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        dd('disinsek');
        $data['header_title'] = 'Ganti Password';
        return view('admin.ganti_password.index', $data);
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
