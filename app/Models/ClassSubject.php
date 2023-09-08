<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Kelas;
use App\Models\Subject;
use Request;

class ClassSubject extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'class_subject';
    protected $guarded = [];

    static public function getClassSubjectAll()
    {
        $data = ClassSubject::select('class_subject.*', 'kelas.kelas as kelas', 'subject.name as subject_name', 'users.name as created_by_name')
            ->leftJoin('kelas', 'class_subject.class_id', 'kelas.id')
            ->leftJoin('subject', 'class_subject.subject_id', 'subject.id')
            ->leftJoin('users', 'class_subject.created_by', 'users.id')
            ->orderBy('class_subject.id', 'desc')
            ->paginate(10);

        return $data;
    }

    static public function getClassSubjectSingle($id)
    {
        $data = ClassSubject::select('class_subject.*', 'kelas.kelas as kelas', 'subject.name as subject_name', 'users.name as created_by_name')
            ->leftJoin('kelas', 'class_subject.class_id', 'kelas.id')
            ->leftJoin('subject', 'class_subject.subject_id', 'subject.id')
            ->leftJoin('users', 'class_subject.created_by', 'users.id')
            ->where('class_subject.id', $id)
            ->first();

        return $data;
    }

    static public function getClass()
    {
        $data = Kelas::select('*')
            ->where('status', '=', '1')
            ->orderBy('kelas', 'asc')
            ->get();

        return $data;
    }

    static public function getSubject()
    {
        $data = Subject::select('*')
            ->where('status', '=', '1')
            ->orderBy('name', 'asc')
            ->get();
        return $data;
    }

    static public function getAllReadyFirst($class_id, $subject_id)
    {
        $data = ClassSubject::where('class_id', '=', $class_id)
            ->where('subject_id', '=', $subject_id)
            ->first();
        return $data;
    }
}
