@extends('layout.main')
@section('content')

<div class="pagetitle">
  <h1><?=$title;?></h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active"><?=$title;?></li>
    </ol>
  </nav>
</div>

<section class="section profile">
  <div class="row">
    <div class="col-xl-4">
      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

          <img src="/img/{{ auth()->user()->foto }}" alt="Profile" class="rounded-circle">
          
          <h5 class="mt-2 mb-0 pb-0"><strong>{{ auth()->user()->nama }}</strong></h5>
          <p class="mt-2">Administrator</p>
          
          {{-- <a href="#" class="btn text-white w-100" style="background-color: orange;">Ubah Profil</a> --}}
        </div>
      </div>
    </div>
    <div class="col-xl-8">

      {{-- alert --}}
      @if (session()->has('sukses'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {!! session('sukses') !!}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
      @endif

      @if (session()->has('gagal'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {!! session('gagal') !!}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
      @endif

      <div class="card">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">

            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change">Change Profile</button>
            </li>
            
            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
            </li>
          </ul>

          <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview">
              {{-- <h5 class="card-title">Detail Profil</h5> --}}

              <div class="row mt-3">
                <div class="col-lg-3 col-md-4 label ">Nama Lengkap</div>
                <div class="col-lg-9 col-md-8">{{ auth()->user()->nama }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Email</div>
                <div class="col-lg-9 col-md-8">{{ auth()->user()->email }}</div>
              </div>

            </div>


            <div class="tab-pane fade pt-3" id="profile-change-password">
              <!-- Change Password Form -->
              <form action="/admin/password/{{ auth()->user()->kode_admin }}" method="post">
                @csrf
                @method('patch')

                <div class="row mb-3">
                  <label for="password" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="password" type="password" class="form-control" id="password">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="passwordbaru" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="passwordbaru" type="password" class="form-control" id="passwordbaru">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="ulangpassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="ulangpassword" type="password" class="form-control" id="ulangpassword">
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
              </form><!-- End Change Password Form -->

            </div>

            <div class="tab-pane fade pt-3" id="profile-change">
              
              <!-- Change Password Form -->
              <form action="/admin/profile/{{ auth()->user()->kode_admin }}" method="post">
                @csrf
                @method('patch')

                <div class="row mb-3">
                  <label for="nama" class="col-md-4 col-lg-3 col-form-label">Nama</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="nama" type="text" class="form-control" id="nama" value="{{ auth()->user()->nama }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="email" type="email" class="form-control" id="email" value="{{ auth()->user()->email }}">
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Ubah Profile</button>
                </div>
              </form><!-- End Change Password Form -->

            </div>

          </div><!-- End Bordered Tabs -->

        </div>
      </div>

    </div>
    

    
  </div>
</section>

@endsection