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
        $data = ClassSubject::select('class_subject.*')
            ->paginate(10);
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
}
