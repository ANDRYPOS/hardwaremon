@extends('layout.admin')

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Users</li>
            <li class="breadcrumb-item"><a href="{{ url('users-setting') }}">Users list</a></li>
            <li class="breadcrumb-item active">Create users</li>
        </ol>
    </nav>
    <div class="card col-6">
        <div class="card-tittle m-auto py-2">Create Users</div>
        <div class="border-bottom"></div>
        <div class="card-body my-2">
            <form method="post" action="{{ url('users-create') }}" enctype="multipart/form-data">
                @csrf
                <!-- form users -->
                {{-- username --}}
                <label for="name">Username: @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </label>
                <input type="text" name="name" placeholder="Username"
                    class="form-control mb-2  {{ isset($errors->messages()['name']) ? 'is-invalid' : '' }}"
                    value="{{ old('name') }}">
                {{-- username --}}

                {{-- email --}}
                <label for="name">Email: @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </label>
                <input type="email" name="email"
                    class="form-control mb-2  {{ isset($errors->messages()['email']) ? 'is-invalid' : '' }}"
                    id="exampleInputEmail1" placeholder="Email" aria-describedby="emailHelp" value="{{ old('email') }}">
                {{-- email --}}

                {{-- phone --}}
                <label for="phone">Phone: @error('phone')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </label>
                <input type="tel" name="phone" placeholder="Phone"
                    class="form-control mb-2  {{ isset($errors->messages()['phone']) ? 'is-invalid' : '' }}"
                    value="{{ old('phone') }}">
                {{-- phone --}}

                {{-- address --}}
                <label for="address">Address: @error('address')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </label>
                <textarea rows="4" cols="60" name="address" placeholder="Address"
                    class="form-control mb-2  {{ isset($errors->messages()['address']) ? 'is-invalid' : '' }}">{{ old('address') }}</textarea>
                {{-- address --}}

                {{-- passwrod --}}
                <label for="password">Password: @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </label>
                <div class="input-group">
                    <input
                        class="form-control password mb-2 {{ isset($errors->messages()['password']) ? 'is-invalid' : '' }}"
                        id="password" placeholder="Password" type="password" name="password"
                        value="{{ old('password') }}" />
                    <span class="input-group-text togglePassword mb-2">
                        <i class="bi bi-eye-fill" class="form-checkbox" style="cursor: pointer"></i>
                    </span>
                </div>
                {{-- passwrod --}}

                {{-- role --}}
                <label for="role">Role: @error('role')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </label>
                <select class="form-select mb-1  {{ isset($errors->messages()['role']) ? 'is-invalid' : '' }}"
                    id="exampleFormControlSelect2" aria-label="Default select example" name="role"
                    style="cursor:pointer">
                    <option disabled selected> Select Role
                    </option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="staff" {{ old('role') == 'staff' ? 'selected' : '' }}>Staff</option>
                    <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>Users</option>
                </select>
                {{-- role --}}

                {{-- avatar --}}
                <div class="row mb-2 text-start">
                    <label for="inputNumber" class="col-sm-12 col-form-label"> Avatar
                        Upload: @error('avatar')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </label>
                    <div class="col-sm-12">
                        <input class="form-control  {{ isset($errors->messages()['avatar']) ? 'is-invalid' : '' }}"
                            type="file" id="formFile" name="avatar" accept="image/gif, image/jpeg, image/png">
                    </div>
                </div>
                {{-- avatar --}}
                <input type="submit" value="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection
