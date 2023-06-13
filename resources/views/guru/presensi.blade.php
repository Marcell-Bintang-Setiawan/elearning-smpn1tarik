@extends('layout.guru')

@section('content')
<div class="pagetitle">
  <h1>{{ $title }}</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/guru">Home</a></li>
      <li class="breadcrumb-item active"><a href="/guru">Rekap Presensi</a></li>
    </ol>
  </nav>
</div>

{{-- dropdown untuk memilih kelas dan mapel, nantinya digunakan untuk download file export excel --}}

<form action="{{ '/guru/rekappresensi'}}" method="GET" class="mb-3">
    @csrf

    <div class="row">
        
            <div class="col-md-4">
                <label for="kode_pelajaran">Mata Pelajaran : </label>
                <select name="kode_pelajaran" id="kode_pelajaran" class="form-select">
                    @foreach($mapelGuru as $mapel)
                        <option value="{{ $mapel->kode_pelajaran }}">{{ $mapel->nama_pelajaran }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="kode_kelas">Kelas : </label>
                <select name="kode_kelas" id="kode_kelas" class="form-select">
                    @foreach($kelasGuru as $kelas)
                        <option value="{{ $kelas->kode_kelas }}">{{ $kelas->tingkat->nama_tingkat.$kelas->nama_kelas }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2 mt-4">
                <button type="submit" class="btn btn-primary">Export</button>
            </div>
        
    </div>
</form>



<div class="row">

    @foreach($presensi as $tanggalPresensi => $presensiPerTanggal)
        @foreach($presensiPerTanggal as $kodeKelas => $presensiPerKelas)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header-guru">                      
                        <h5 class="fw-bold">{{ \Carbon\Carbon::parse($tanggalPresensi)->translatedFormat('l, d F Y') }}</h5>
                        <p class="p-0">{{ $presensiPerKelas[0]->mapel->nama_pelajaran }} | {{ $presensiPerKelas[0]->kelas->tingkat->nama_tingkat }}{{ $presensiPerKelas[0]->kelas->nama_kelas }}</p>
                    </div>
                    <hr class="m-1">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                S = {{ $presensiPerKelas->where('status', 'S')->count() }}
                            </div>
                            <div class="col-3">
                                H = {{ $presensiPerKelas->where('status', 'H')->count() }}
                            </div>
                            <div class="col-3">
                                I = {{ $presensiPerKelas->where('status', 'I')->count() }}
                            </div>
                            <div class="col-3">
                                A = {{ $presensiPerKelas->where('status', 'A')->count() }}
                            </div>
                            <div class="col-3">
                                K = {{ $presensiPerKelas->where('status', 'K')->count() }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                Total Siswa: {{ $presensiPerKelas->count() }}
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="/guru/presensi/{{ $tanggalPresensi }}/edit/{{ $kodeKelas }}/{{ $presensiPerKelas[0]->mapel->kode_pelajaran }}" class="btn btn-sm btn-primary">Edit Presensi</a>
                        {{-- <a href="{{ route('presensi.export', ['kelas' => $presensiPerKelas[0]->kelas->kode_kelas, 'mapel' => $presensiPerKelas[0]->mapel->kode_pelajaran, 'tanggal' => $tanggalPresensi]) }}" class="btn btn-sm btn-primary">Export to Excel</a> --}}
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach
</div>
@endsection