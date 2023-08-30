<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['header_title'] = "Dashboard";
        if (Auth::user()->user_type == 1) {
            return view('admin.admin.dashboard', $data);
        } elseif (Auth::user()->user_type == 2) {
            return view('admin.student.dashboard', $data);
        } elseif (Auth::user()->user_type == 3) {
            return view('admin.teacher.dashboard', $data);
        } elseif (Auth::user()->user_type == 4) {
            return view('admin.parent.dashboard', $data);
        }
    }
}
