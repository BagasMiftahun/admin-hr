<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Karyawan extends Model
{
    protected $table = 'Karyawan';
    protected $primaryKey = 'id_karyawan';
    protected $fillable = ['qr','nama','waktu','jabatan','status'];
    public $timestamps = false;
    
    public function kelas()
    {
        return $this->belongsToMany('App\Kelas', 'siswa_kelas', 'siswa_id', 'kelas_id');
    }
    public function absensi()
    {   
        return $this->belongsToMany('App\Kelas', 'absensi', 'siswa_id', 'kelas_id')->withPivot('status', 'tanggal', 'keterangan')->wherePivot('tanggal', Carbon::now('Asia/Jakarta'));
    }
}
