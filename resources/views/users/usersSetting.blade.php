@extends('layout.admin')

@section('content')
    @include('sweetalert::alert')
    <div class="pagetitle">
        <h1>Users List</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">Users List</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <!-- Table users -->
                            <div class="search-bar">
                                <!-- Add -->
                                <a href="{{ url('users-create') }}" class="btn btn-primary my-2" role="button"><i
                                        class="bx bxs-book-add"></i></a>
                                </button>
                                <!-- End Add Modal-->
                            </div>
                            {{-- result --}}
                            <table class="table table-striped table-hover table-bordered border-text-muted text-center"
                                style="font-size: small">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Avatar</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Action</th>
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
                                            <td>
                                                <!-- edit -->
                                                <a href="/users-edit/{{ $dataUser->id }}" class="btn btn-info"
                                                    role="button"><i class="bi bi-pencil-square"></i></a>

                                                @if (Auth::user()->role == 'admin')
                                                    <a href="" class="btn btn-danger" role="button"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#delete{{ $dataUser->id }}"><i
                                                            class="bi bi-trash"></i></a>
                                                    <!-- delete -->
                                                    <div class="modal fade" id="delete{{ $dataUser->id }}" tabindex="-1"
                                                        data-bs-backdrop="false">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Delete Users</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="post">
                                                                        @csrf
                                                                        <!-- form users -->
                                                                        <div class="modal-body" id="modal-users">
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $dataUser->id }}"
                                                                                placeholder="nama kategori"
                                                                                class="form-control" required>
                                                                            <input type="text" name="name"
                                                                                value="{{ $dataUser->name }}"
                                                                                placeholder="nama kategori"
                                                                                class="form-control" disabled>
                                                                            <br>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="/users-delete/{{ $dataUser->id }}"
                                                                        class="btn btn-danger">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- End delete Modal-->
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <td colspan="7">Data Empty</td>
                                    @endforelse
                                </tbody>

                            </table>
                            <!-- End Table result -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
