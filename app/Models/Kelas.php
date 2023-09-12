<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use Request;

class Kelas extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'kelas';
    protected $guarded = [];

    static public function getKelasAll()
    {
        $kelas = Kelas::select('kelas.*', 'users.name as created_by_name')
            ->leftJoin('users', 'users.id', 'kelas.created_by');
        // search
        if (!empty(Request::get('kelas'))) {
            $kelas = $kelas->where('kelas.kelas', 'like', '%' . Request::get('kelas') . '%');
        }
        if (!empty(Request::get('date'))) {
            $kelas = $kelas->whereDate('kelas.created_at', '=', Request::get('date'));
        }
        // End search
        $kelas = $kelas->orderBy('kelas.kelas', 'asc')
            ->paginate(10);
        return $kelas;
    }

    static public function getSingleKelas($id)
    {
        $kelas = Kelas::find($id);
        return $kelas;
    }

    static public function getClass()
    {
        $data = Kelas::select('*')
            ->where('status', '=', '1')
            ->orderBy('kelas', 'asc')
            ->get();

        return $data;
    }
}
