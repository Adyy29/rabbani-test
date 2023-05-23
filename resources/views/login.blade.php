<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- ========================= Stylesheet =========================  --}}
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login/style.css') }}">

    {{-- ========================= Icon =========================  --}}
    <link rel="icon" href="{{ asset('') }}">

    <title>Login</title>
</head>

<body>

    {{-- Glassmorphism --}}
    <div class="container my-5">
        <div class="col-md-12">
            @if (session()->has('loginerror'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ session('loginerror') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
          </div>
        <div class="card">
            <div class="mt-3 mx-3"><a href="/" style="text-decoration: none;"><i class="fa-solid fa-arrow-left-long"></i> kembali </a></div>
            <div class="row">
                <div class="col-lg-6" id="gambar-login">
                    <div class="container mx-auto me-2" style="margin-top: 130px; margin-bottom: 120px;">
                    <img class="container mx-auto me-2" style="margin-bottom: 120px;" src="image/gambar2.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <form action="/login" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="container mx-auto me-2" style="margin-top: 170px; margin-bottom: 175px;">
                            <h5 class="text-center mb-4">Silahkan Masukkan Username Dan Password</h5>
                            <div class="form-floating mb-3">
                                <input type="text" name="username"class="form-control" id="floatingInput"
                                    placeholder="Masukkan Username">
                                <label for="floatingInput">Username</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" name="password" class="form-control" id="floatingPassword"
                                    placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-primary">
                                    <b>Masuk</b>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>

    </script>

    {{-- ========================= JavaScript =========================  --}}
    <script src="{{ asset('bootstrap/js/script.js') }}"></script>
    {{-- <script>
        window.location.assign('/')
    </script> --}}

</body>
</html>
