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
        //
    }

    static public function getSubjectSingle($id)
    {
        //
    }
}
