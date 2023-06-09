<?php

namespace App\Http\Controllers;

use App\Models\Pengampu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalmengajarController extends Controller
{
    public function index(){
        $tahunAjaran = \App\Models\TahunAjaran::where('status_aktif', 1)->first();
        $data = [
            'title' => 'Jadwal Mengajar',
            'jadwal' => \App\Models\Jadwal::join('pengampu', 'pengampu.id', '=', 'jadwal.kode_pengampu')
                ->join('kelas', 'kelas.kode_kelas', '=', 'pengampu.kode_kelas')
                ->join('pelajaran', 'pelajaran.kode_pelajaran', '=', 'pengampu.kode_pelajaran')
                ->join('guru', 'guru.kode_guru', '=', 'pengampu.kode_guru')
                ->where('guru.kode_guru', Auth::user()->kode_guru)
                ->where('pengampu.kode_thajaran', $tahunAjaran->id)
                ->select('jadwal.*', 'kelas.nama_kelas', 'pelajaran.nama_pelajaran', 'guru.nama')
                ->get(),
        ];
        return view('guru.jadwal-mengajar', $data);
    }
}
