@extends('layout.admin')

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item">Users</li>
            <li class="breadcrumb-item"><a href="{{ url('users-setting') }}">Users list</a></li>
            <li class="breadcrumb-item active">Edit users</li>
        </ol>
    </nav>
    <div class="card col-6">
        <div class="card-tittle m-auto py-2">Edit Users</div>
        <div class="border-bottom"></div>
        <div class="card-body my-2">
            @foreach ($users as $dataUser)
                <form method="post" action="/users-update" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <!-- form users edit -->
                    <input type="hidden" name="id" placeholder="Name" class="form-control" value="{{ $dataUser->id }}"
                        required>

                    {{-- avatars view --}}
                    <div class="card m-auto my-4" style="height: 90px; width:90px">
                        @if ($dataUser->avatar == '')
                            <img src="{{ asset('admin/assets/img/avatar/avatar.png') }}" alt="Profile"
                                class="rounded m-auto" style="width:100px; height:100px" id="preview"
                                style="width: 10rem; height:10rem">
                        @else
                            <img src="{{ asset('storage/avatars/') }}/{{ $dataUser->avatar }}" alt="{{ $dataUser->name }}"
                                title="{{ $dataUser->name }}" width="90" height="90" class="rounded mb-2 m-auto">
                        @endif
                    </div>
                    {{-- avatars view --}}

                    {{-- name --}}
                    <label for="name">Username: @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </label>
                    <input type="text" name="name" placeholder="Name" class="form-control mb-2"
                        value="{{ $dataUser->name }}">
                    {{-- name --}}

                    {{-- email --}}
                    <label for="email">Email: @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </label>
                    <input type="email" name="email" class="form-control mb-2" id="exampleInputEmail1"
                        placeholder="Email" aria-describedby="emailHelp" value="{{ $dataUser->email }}">
                    {{-- email --}}

                    {{-- phone --}}
                    <label for="phone">Phone: @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </label>
                    <input type="tel" name="phone" placeholder="Phone" class="form-control mb-2"
                        value="{{ $dataUser->phone }}">
                    {{-- phone --}}

                    {{-- address --}}
                    <label for="address">Address: @error('address')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </label>
                    <textarea rows="4" cols="60" name="address" placeholder="Address" class="form-control mb-2">{{ $dataUser->address }}</textarea>
                    {{-- address --}}

                    {{-- password --}}
                    <label for="password">Password: @error('address')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </label>
                    <div class="input-group">
                        <input class="form-control password mb-2" id="password" placeholder="Password" type="password"
                            name="password" value="{{ $dataUser->password }}" />
                    </div>
                    {{-- password --}}

                    {{-- role --}}
                    <label for="role">Role: @error('role')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </label>
                    <select class="form-select" id="exampleFormControlSelect2" aria-label="Default select example"
                        name="role" style="cursor:pointer">
                        <option value="admin" {{ $dataUser->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="staff" {{ $dataUser->role == 'staff' ? 'selected' : '' }}>Staff</option>
                        <option value="user" {{ $dataUser->role == 'user' ? 'selected' : '' }}>Users</option>
                    </select>
                    {{-- role --}}

                    {{-- avatar upload --}}
                    <div class="row my-2 text-start">
                        <label for="inputNumber" class="col-sm-6 col-form-label"> Avatar
                            Upload: @error('avatar')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </label>
                        <div class="col-sm-12">
                            <input class="form-control" type="file" id="formFile" name="avatar"
                                accept="image/gif, image/jpeg, image/png">
                        </div>
                    </div>
                    {{-- avatar upload --}}

                    <input type="submit" value="submit" class="btn btn-primary">
                </form>
            @endforeach
        </div>
    </div>
@endsection
