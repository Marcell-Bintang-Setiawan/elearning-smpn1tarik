<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login As Siswa</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/img/logso.png" rel="icon">
  <link href="/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/css/style.css" rel="stylesheet">
</head>

<body>

  <main class="main-login">
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="/img/logso.png" alt="">
                  <span class="d-none d-lg-block">SMP NEGERI 1 TARIK</span>
                  <!-- <img src="img/kemdikbud.png" alt=""> -->
                </a>
              </div><!-- End Logo -->

              

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

              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-3">
                    <h5 class="card-title text-center pb-0 fs-4">Login Sebagai Siswa</h5>
                    {{-- <p class="text-center small">As <b>Guru</b></p> --}}
                  </div>

                  <form action="/siswa/auth" method="post" class="row g-3">
                    @csrf

                    <div class="col-12">
                      <label for="username" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror username" id="username" required>

                        <span class="input-group-text">
                          <i class="bi bi-envelope"></i>
                        </span>

                        @error('username')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                      </div>
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">Password</label>
                      <div class="input-group has-validation">
                          <input class="form-control @error('password') is-invalid @enderror password" type="password" name="password" id="password" required>

                          <span class="input-group-text"><a href="" class="text-dark"><i class="bi bi-lock"></i></a></span>

                          @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>
                    </div>

                    <div class="col-12">
                      <button class="btn w-100 text-light" style="background-color: orange;" type="submit">Login</button>
                    </div>

                    <div class="col-12">
                      <a href="/" class="btn btn-white w-100 " style="border-color: orange; border-style: solid; color:orange;">Kembali</a>
                    </div>
                    {{-- <a href="#" class="text-primary">Lupa Password ?</a> --}}
                  </form>

                </div>
              </div>

              <div class="credits">
                
                Created with <span class="text-danger">&#10084;</span>  by <a href="https://www.smpn1tarik.sch.id/">SMP NEGERI 1 TARIK</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/vendor/chart.js/chart.umd.js"></script>
  <script src="/vendor/echarts/echarts.min.js"></script>
  <script src="/vendor/quill/quill.min.js"></script>
  <script src="/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="/vendor/tinymce/tinymce.min.js"></script>
  <script src="/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/js/main.js"></script>

</body>

</html>