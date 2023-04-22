<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JobHive | Register</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('../assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('../assets/dist/css/adminlte.min.css')}}">
    <style>
        *{
            font-family: 'Roboto', sans-serif;
        }
        .login {
            min-height: 100vh;
        }

        .bg-image {
            background-image: url('/assets/img/background2.jpg');
            background-size: cover;
            background-position: center;
        }

        .login-heading {
            font-weight: 300;
        }

        .btn-login {
            font-size: 0.9rem;
            letter-spacing: 0.05rem;
            padding: 0.75rem 1rem;
        }
    </style>
</head>
<body class="hold-transition register-page">
<div class="container-fluid ps-md-0" style="background:white">
    <div class="row g-0">
        <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
        <div class="col-md-8 col-lg-6">
            <div class="login d-flex align-items-center py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-lg-8 mx-auto">
                            <h1 class="login-heading mb-4" style="font-weight: bold">Complete your registration</h1>
                            <form class="mt-4" action="{{route('custom.register')}}" method="post">
                                @csrf
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control form-control-border @error('name') is-invalid @enderror" placeholder="Full name" id="name" name="name" value="{{$user->getName()}}" required>
                                    @error('name') <span class="text-danger small">{{$message}}</span>@enderror
                                </div>
                                <div class="form-floating mb-4">
                                    <input type="email" class="form-control form-control-border  @error('email') is-invalid @enderror" placeholder="Email" id="email" name="email" value="{{$user->getEmail()}}" required>
                                    @error('email') <span class="text-danger small">{{$message}}</span>@enderror
                                </div>
                                <div class="input-group input-group-outline mb-3">
                                    <input type="text" class="form-control form-control-border  @error('company') is-invalid @enderror" placeholder="Company Name" id="company" name="company" required>
                                    @error('email') <span class="text-danger small">{{$message}}</span>@enderror
                                </div>
                                <div class="form-floating mb-4">
                                    <select class="form-control form-control-border @error('gender') is-invalid @enderror" id="gender" name="gender">
                                        <option selected disabled>Gender</option>
                                        <option value="male">Male</option>
                                        <option valeu="female">Female</option>
                                    </select>
                                    @error('gender') <span class="text-danger small">{{$message}}</span>@enderror
                                </div>

                                <div class="form-floating mb-4">
                                    <select class="form-control form-control-border  @error('role') is-invalid @enderror" id="role" name="role">
                                        <option selected disabled>Sign up as</option>
                                        <option value="1">Employer/Organization</option>
                                    </select>
                                    @error('role') <span class="text-danger small">{{$message}}</span>@enderror
                                </div>

                                <div class="form-floating mb-4">
                                    <input type="password" class="form-control form-control-border  @error('password') is-invalid @enderror" placeholder="Password" name="password" id="password" required>
                                    @error('password') <span class="text-danger small">{{$message}}</span>@enderror
                                </div>

                                <div class="form-floating mb-4">
                                    <input type="password" class="form-control form-control-border" placeholder="Retype password" name="password_confirmation" id="password_confirmation" required>
                                </div>
                                <div class="d-grid text-center">
                                    <button class="btn btn-lg btn-secondary btn-login fw-bold mb-2 mt-3" type="submit" style="color:white; width: 200px; font-size: 20px">Create</button>
                                    <br>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="{{asset('../assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('../assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('../assets/dist/js/adminlte.min.js')}}"></script>
</body>
</html>

