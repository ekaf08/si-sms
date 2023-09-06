<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Request;

class Subject extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'subject';
    protected $guarded = [];

    static public function getSubjectAll()
    {
        $data = Subject::select('subject.*', 'users.name as created_by_name')
            ->leftJoin('users', 'users.id', 'subject.created_by');

        // search
        if (!empty(Request::get('subject'))) {
            $data = $data->where('subject.name', 'like', '%' . Request::get('subject') . '%');
        }
        if (!empty(Request::get('type'))) {
            $data = $data->where('subject.type', 'like', '%' . Request::get('type') . '%');
        }
        if (!empty(Request::get('date'))) {
            $data = $data->whereDate('subject.created_at', '=', Request::get('date'));
        }
        // End search
        $data = $data->orderBy('subject.name', 'asc')
            ->paginate(10);
        return $data;
    }

    static public function getSubjectSingle($id)
    {
        $data = Subject::find($id);
        return $data;
    }
}
