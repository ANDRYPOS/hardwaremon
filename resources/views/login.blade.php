<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HardwareMon | Login</title>

    <!-- logo -->
    <link href="{{ asset('assets/img/icon/LOGO.png') }}" rel="icon">
    <!-- /logo -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</head>

<body>
    @include('sweetalert::alert')
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="col-md-4 p-5 shadow-sm border rounded-5 border-primary">
            <h2 class="text-center mb-4 text-primary">Login Form</h2>
            <form method="post" action="{{ url('login-proses') }}">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address: @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </label>
                    <input type="email" name="email"
                        class="form-control bg-info bg-opacity-10 border border-primary {{ isset($errors->messages()['email']) ? 'is-invalid' : '' }}"
                        id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('email') }}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password: @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </label>
                    <input type="password" name="password"
                        class="form-control bg-info bg-opacity-10 border border-primary {{ isset($errors->messages()['password']) ? 'is-invalid' : '' }}"
                        id="exampleInputPassword1">
                </div>
                <div class="d-grid">
                    <button class="btn btn-primary" type="submit">Login</button>
                </div>
                <p class="small" style="display: flex; justify-content: space-between">
                    <a class="text-primary" href="{{ url('register') }}">Don't have an account?</a>
                    <a class="text-primary" href="{{ url('/') }}">Back</a>
                </p>
            </form>
        </div>
    </div>
</body>

</html>
