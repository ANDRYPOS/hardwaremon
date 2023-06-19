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

    {{-- cdn bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</head>

<body>
    @include('sweetalert::alert')
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="col-md-4 p-5 shadow-lg border rounded-5 border-text-muted">
            <h2 class="text-center mb-4 text-secondary">Login Form</h2>
            <form method="post" action="{{ url('login-proses') }}">
                @csrf
                {{-- email --}}
                <label for="email" class="form-label">Email:</label>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}"
                        class="form-control bg-info bg-opacity-10 border border-primary">
                </div>
                {{-- end email --}}

                {{-- password --}}
                <label for="pw" class="form-label">Password: @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </label>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" aria-describedby="basic-addon2"
                        id="pw" class="form-control bg-info bg-opacity-10 border border-primary">
                    <span class="input-group-text" id="basic-addon2">
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" id="flexSwitchCheckChecked"
                                onclick="myFunction()" style="cursor: pointer">
                        </div>
                    </span>
                </div>
                {{-- end password --}}

                {{-- submit --}}
                <div class="d-grid">
                    <button class="btn btn-secondary" type="submit">Login</button>
                </div>
                {{-- end submit --}}

                {{-- option --}}
                <p class="small" style="display: flex; justify-content: space-between">
                    <a class="text-primary" href="{{ url('/') }}">Back</a>
                    <a class="text-primary" href="{{ url('register') }}">Create an
                        account?</a>
                </p>
                {{-- end option --}}
            </form>
        </div>
    </div>
    <script>
        function myFunction() {
            var x = document.getElementById("pw");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>
