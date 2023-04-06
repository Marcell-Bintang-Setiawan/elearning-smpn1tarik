<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasSiswa extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'kelas_siswa';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_siswa',
        'kode_kelas',
    ];

    public function siswa(){
        return $this->belongsTo(Siswa::class, 'kode_siswa', 'kode_siswa');
    }

    public function kelas(){
        return $this->belongsTo(Kelas::class, 'kode_kelas', 'kode_kelas');
    }

    
}
