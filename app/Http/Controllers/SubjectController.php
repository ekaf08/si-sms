<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index()
    {
        $data['header_title'] = 'Subject List';
        $data['getSubjectAll'] = Subject::getSubjectAll();

        return view('admin.subject.index', $data);
    }

    public function add()
    {
        $data['header_title'] = 'Tambah Subject';

        return view('admin.subject.add', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:subject',
        ]);

        $subject = new Subject();
        $subject->name = $request->name;
        $subject->type = $request->type;
        $subject->status = $request->status;
        $subject->created_by = auth()->user()->id;
        $subject->save();
        $judul = $subject->name;

        return redirect('subject/index')->with('success', ucwords($judul) . ' Berhasil Di Tambahkan.');
    }

    public function edit($id)
    {
        $id = decrypt($id);
        $data['header_title'] = 'Edit Subject';
        $data['getSubjectSingle'] = Subject::getSubjectSingle($id);

        if (!empty($data['getSubjectSingle'])) {
            return view('admin.subject.edit', $data);
        } else {
            abort(404);
        }
    }

    public function update(Request $request, $id)
    {
        $id = decrypt($id);
        $request->validate([
            'name' => 'required|max:255|unique:subject,name,' . $id,
        ]);

        $subject = Subject::getSubjectSingle($id);
        $subject->name = $request->name;
        $subject->type = $request->type;
        $subject->status = $request->status;
        $subject->created_by = auth()->user()->id;
        $subject->save();
        $judul = $subject->name;

        return redirect('subject/index')->with('success', ucwords($judul) . ' Berhasil Di Perbarui.');
    }

    public function destroy($id)
    {
        $id = decrypt($id);
        $subject = Subject::getSubjectSingle($id);
        $subject->delete();

        return redirect('subject/index')->with('success', ucwords($subject->name) . ' Berhasil Di Hapus.');
    }
}
