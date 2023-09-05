<?php

namespace App\Http\Controllers;

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
}
