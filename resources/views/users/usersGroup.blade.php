@extends('layout.admin')

@section('content')
    <div class="pagetitle">
        <h1>Role Group</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">Role Group</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <!-- Table with stripped rows -->
                        <div class="dropdown my-2">
                            <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Select role
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ url('users-group') }}">All</a></li>
                                <li><a class="dropdown-item" href="{{ url('filter-admin') }}">Admin</a></li>
                                <li><a class="dropdown-item" href="{{ url('filter-staff') }}">Staff</a></li>
                                <li><a class="dropdown-item" href="{{ url('filter-user') }}">User</a></li>
                            </ul>
                        </div>
                        <div class="table-responsive">
                            {{-- show users --}}
                            <table class="table table-striped table-hover table-bordered border-text-muted"
                                style="text-align: center; font-size: small;">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Avatar</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $dataUser)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}.</th>
                                            <td>
                                                @if ($dataUser->avatar == '')
                                                    <img src="{{ asset('admin/assets/img/avatar/avatar.png') }}"
                                                        alt="Profile" class="rounded m-auto"
                                                        style="width:100px; height:100px" id="preview"
                                                        style="width: 10rem; height:10rem">
                                                @else
                                                    <img src="{{ asset('storage/avatars') }}/{{ $dataUser->avatar }}"
                                                        alt="{{ $dataUser->name }}" title="{{ $dataUser->name }}"
                                                        width="80" height="80" class="rounded">
                                                @endif
                                            </td>
                                            <td>{{ $dataUser->name }}</td>
                                            <td>{{ $dataUser->email }}</td>
                                            <td>{{ $dataUser->phone }}</td>
                                            <td>{{ $dataUser->role }}</td>

                                        </tr>
                                    @empty
                                        <td colspan="7"> Data Empty</td>
                                    @endforelse
                                </tbody>
                            </table>
                            {{-- end show users --}}
                        </div>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
