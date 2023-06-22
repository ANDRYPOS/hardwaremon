<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HardwareMon | Register</title>

    <!-- logo -->
    <link href="{{ asset('assets/img/icon/LOGO.png') }}" rel="icon">
    <!-- /logo -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<body style="background-color: #ecf3f5">
    <script>
        AOS.init();
    </script>
    <div class="vh-100 d-flex justify-content-center align-items-center" data-aos="fade-left" data-aos-easing="linear"
        data-aos-duration="1500">
        <div class="col-md-4 p-5 shadow-lg border rounded-5 border-text-muted bg-body">
            <h2 class="text-center mb-4" style="color: #1d1777">Form Registrasi</h2>
            <form action="/register-store" method="post">
                @csrf

                {{-- username --}}
                <label for="name" class="form-label">Username:</label>
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <input type="text" name="name" class="form-control mb-2" id="name"
                    value="{{ old('name') }}" class="form-control bg-info bg-opacity-10 border border-primary">

                {{-- end username --}}

                {{-- email --}}
                <label for="email" class="form-label">Email:</label>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <input type="email" name="email" class="form-control mb-2" id="email"
                    value="{{ old('email') }}" class="form-control bg-info bg-opacity-10 border border-primary">
                {{-- email --}}

                {{-- password --}}
                <label for="pw" class="form-label">Password: @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </label>
                <div class="input-group mb-2">
                    <input type="password" name="password" class="form-control" aria-describedby="basic-addon2"
                        id="pw" class="form-control bg-info bg-opacity-10 border border-primary">
                    <span class="input-group-text" id="basic-addon2">
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" id="flexSwitchCheckChecked"
                                onclick="myFunction()" style="cursor: pointer">
                        </div>
                    </span>
                </div>
                {{-- password --}}

                {{-- phone --}}
                <label for="phone" class="form-label">Phone:</label>
                @error('phone')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <input type="text" name="phone" class="form-control mb-3" id="phone"
                    value="{{ old('phone') }}" class="form-control bg-info bg-opacity-10 border border-primary">
                {{-- end phone --}}

                <div class="d-grid">
                    <input type="submit" value="submit" class="btn btn-primary">
                </div>
                <p class="small"><a class="text-primary text-decoration-none" href="{{ url('login') }}">Have an
                        account?</a></p>
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
