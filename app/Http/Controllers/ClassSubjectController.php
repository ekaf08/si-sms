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
        // dd($request->all());
        $request->validate([
            'class_id' => 'required',
            'subject_id' => 'required',
        ]);

        if (!empty($request->subject_id)) {
            foreach ($request->subject_id as $subject_id) {
                $getAllReadyFirst = ClassSubject::getAllReadyFirst($request->class_id, $subject_id);
                if (!empty($getAllReadyFirst)) {
                    $getAllReadyFirst->status = $request->status;
                    $getAllReadyFirst->save();
                } else {
                    $data = new ClassSubject();
                    $data->class_id = $request->class_id;
                    $data->subject_id = $subject_id;
                    $data->status = $request->status;
                    $data->created_by = auth()->user()->id;
                    $data->save();
                }
            }
            return redirect('subjectclass/index')->with('success', 'Data Berhasil Di Tambahkan.');
        } else {
            return redirect()->back()->with('error', 'Mohon maaf, Data gagal disimpan.');
        }
    }

    public function edit($id)
    {
        $id = decrypt($id);
        $data['header_title'] = 'Edit Kategori Kelas';
        $data['getClass'] = ClassSubject::getClass();
        $data['getSubject'] = ClassSubject::getSubject();
        $data['getDataSingle'] = ClassSubject::getClassSubjectSingle($id);
        dd($data['getDataSingle'], $id);

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
