@extends('layout.admin')

@section('content')
    @include('sweetalert::alert')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Users profil setting</li>
        </ol>
    </nav>
    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        @if (Auth::user()->avatar == '')
                            <img src="{{ asset('admin/assets/img/avatar/avatar.png') }}" alt="Profile" class="rounded m-auto"
                                style="width:100px; height:100px">
                        @else
                            <img src="{{ asset('storage/avatars') }}/{{ Auth::user()->avatar }}" alt="Profile"
                                class="rounded" style="height:10rem; width:10rem">
                        @endif
                        <h2>{{ Auth::user()->name }}</h2>
                        <h3>{{ Auth::user()->role }}</h3>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Overview</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                    Profile</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#password-edit">Edit
                                    Password</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2">
                            {{-- overview profil --}}
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Profile Details</h5>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth::user()->name }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Role</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth::user()->role }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Address</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth::user()->address }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Phone</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth::user()->phone }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth::user()->email }}</div>
                                </div>

                            </div>
                            {{-- end overview profil --}}

                            {{-- edit profil --}}
                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form action="{{ url('profil-update') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                            Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            @if (Auth::user()->avatar == '')
                                                <img src="{{ asset('admin/assets/img/avatar/avatar.png') }}" alt="Profile"
                                                    class="rounded m-auto" style="width:100px; height:100px" id="preview"
                                                    style="width: 10rem; height:10rem">
                                            @else
                                                <img src="{{ asset('storage/avatars') }}/{{ Auth::user()->avatar }}"
                                                    alt="Profile" class="rounded" id="preview"
                                                    style="width: 10rem; height:10rem">
                                            @endif

                                            <div class="pt-2">
                                                <label for="imgInp" class="custom-file-upload">
                                                    <a class="btn btn-primary btn-sm" title="Upload new profile image"><i
                                                            class="bi bi-upload"></i></a>
                                                </label>
                                                <input id="imgInp" type="file" class="d-none" name="avatar"
                                                    oninput="preview.src=window.URL.createObjectURL(this.files[0])">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name
                                        </label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" type="text" class="form-control" id="fullName"
                                                value="{{ Auth::user()->name }}" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Job" class="col-md-4 col-lg-3 col-form-label">Role</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="role" type="text" class="form-control" id="Job"
                                                value="{{ Auth::user()->role }}" disabled style="cursor: not-allowed">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="address" type="text" class="form-control" id="Address"
                                                value="{{ Auth::user()->address }}" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone" type="text" class="form-control" id="Phone"
                                                value="{{ Auth::user()->phone }}" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="Email"
                                                value="{{ Auth::user()->email }}" required>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary float-end">Save Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->
                            </div>
                            {{-- end edit profil --}}

                            {{-- password edit --}}
                            <div class="tab-pane fade password-edit pt-3" id="password-edit">
                                <form action="{{ url('profil-updatePassword') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                    <div class="row mb-3">
                                        <label for="Password"
                                            class="col-md-4 col-lg-3 col-form-label rounded">Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="password" name="password" aria-describedby="basic-addon2"
                                                class="form-control rounded-start">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label rounded">New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <div class="input-group mb-3">
                                                <input type="password" name="newPassword" aria-describedby="basic-addon2"
                                                    id="pw" class="form-control rounded-start">
                                                <span class="input-group-text" id="basic-addon2">
                                                    <div class="form-check form-switch">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="flexSwitchCheckChecked" onclick="myFunction()"
                                                            style="cursor: pointer">
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary float-end">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                            {{-- end password edit --}}
                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>
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
@endsection
