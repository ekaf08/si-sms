<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index()
    {
        $data['header_title'] = 'Subject List';

        return view('admin.subject.index');
    }

    public function add()
    {
        dd('Ok Disini');
        $data['header_title'] = 'Tambah Subject';

        return view('admin.subject.add');
    }

    public function store(Request $request)
    {
        dd('Ok Disini');
    }

    public function edit($id)
    {
        dd('Ok Disini');
        $id = decrypt($id);
        $data['header_title'] = 'Edit Subject';

        return view('admin.subject.edit');
    }

    public function update(Request $request, $id)
    {
        dd('Ok Disini');
        $id = decrypt($id);
    }

    public function destroy($id)
    {
        dd('Ok Disini');
        $id = decrypt($id);
    }
}
