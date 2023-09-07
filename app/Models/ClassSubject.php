<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Request;

class ClassSubject extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'class_subject';
    protected $guarded = [];
}
