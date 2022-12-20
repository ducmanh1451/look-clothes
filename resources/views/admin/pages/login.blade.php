<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
    <style>
        body {
            height: 100vh;
            background-color: beige;
        }
        form {
            position: absolute;
            top: 50%; 
            left: 50%; 
            transform: translate(-50%, -50%);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <form action="{{ route('login') }}" method="POST" class="d-flex justify-content-center align-items-center">
                @csrf
                <div class="col-3">
                    <div class="form-group mt-3">
                        <label for="username">Tài khoản</label>
                        <input name="username" id="username" type="text" class="form-control">
                    </div>
                    <div class="form-group mt-3 mb-3">
                        <label for="password">Mật khẩu</label>
                        <input name="password" id="password" type="password" class="form-control">
                        <input type="hidden" name="role" value="1">
                    </div>
                    <button type="submit" class="btn btn-primary">Đăng nhập</button>
                </div>
            </form>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/js/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
