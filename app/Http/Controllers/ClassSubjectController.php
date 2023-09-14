<?php

namespace App\Http\Controllers;

use App\Models\ClassSubject;
use App\Models\Kelas;
use App\Models\Subject;
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
            'status' => 'required',
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
        $getRecord = ClassSubject::getClassSubjectSingle($id);
        if (!empty($getRecord)) {
            $data['getRecord'] = $getRecord;
            $data['getAssignSubjectID'] = ClassSubject::getAssignSubjectID($getRecord->class_id);
            $data['header_title'] = 'Edit Kategori Kelas';
            $data['getClass'] = Kelas::getClass();
            $data['getSubject'] = Subject::getSubject();

            return view('admin.class_subject.edit', $data);
        } else {
            abort(404);
        }
    }

    public function update(Request $request, $id)
    {
        $id = decrypt($id);
        ClassSubject::deleteSubject($request->class_id);

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
            return redirect('subjectclass/index')->with('success', 'Data Berhasil Di Perbarui.');
        } else {
            return redirect()->back()->with('error', 'Mohon maaf, Data gagal di perbarui.');
        }
    }

    public function destroy($id)
    {
        $id = decrypt($id);
        $data = ClassSubject::getClassSubjectSingle($id);
        $data->delete();

        return redirect('subjectclass/index')->with('success', 'Data Berhasil Di Hapus.');
    }

    public function edit_single($id)
    {
        $id = decrypt($id);
        $getRecord = ClassSubject::getClassSubjectSingle($id);
        if (!empty($getRecord)) {
            $data['getRecord'] = $getRecord;
            $data['header_title'] = 'Edit Kategori Kelas';
            $data['getClass'] = Kelas::getClass();
            $data['getSubject'] = Subject::getSubject();

            return view('admin.class_subject.edit_single', $data);
        } else {
            abort(404);
        }
    }

    public function update_single(Request $request, $id)
    {
        $id = decrypt($id);
        $getAllReadyFirst = ClassSubject::getAllReadyFirst($request->class_id, $request->subject_id);
        dd($getAllReadyFirst);
        if (!empty($getAllReadyFirst)) {
            $getAllReadyFirst->status = $request->status;
            $getAllReadyFirst->save();

            return redirect('subjectclass/index')->with('success', 'Status berhasil di perbarui.');
        } else {
            $data = ClassSubject::getClassSubjectSingle($id);
            $data->class_id = $request->class_id;
            $data->subject_id = $request->subject_id;
            $data->status = $request->status;
            $data->created_by = auth()->user()->id;
            $data->save();

            return redirect('subjectclass/index')->with('success', 'Data berhasil disimpan.');
        }
    }
}
