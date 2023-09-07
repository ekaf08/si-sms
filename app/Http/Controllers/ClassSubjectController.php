<?php

namespace App\Http\Controllers;

use App\Models\ClassSubject;
use Illuminate\Http\Request;

class ClassSubjectController extends Controller
{
    public function index()
    {
        $data['header_title'] = 'Kategori Kelas';
        $data['getClassSubjectAll'] = ClassSubject::getClassSubjectAll();

        return view('admin.class_subject.index', $data);
    }

    public function add()
    {
        $data['header_title'] = 'Tambah Kategori Kelas';
        $data['getClass'] = ClassSubject::getClass();
        $data['getSubject'] = ClassSubject::getSubject();

        return view('admin.class_subject.add', $data);
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

    public function edit($id)
    {
        $data['header_title'] = 'Edit Kategori Kelas';
        $data['getClass'] = ClassSubject::getClass();
        $data['getSubject'] = ClassSubject::getSubject();

        return view('admin.class_subject.edit', $data);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
