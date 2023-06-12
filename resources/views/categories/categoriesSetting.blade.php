@extends('layout.admin')

@section('content')
    <div class="pagetitle">
        <h1>Categories</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">System Setup</li>
                <li class="breadcrumb-item active">Categories</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    @include('sweetalert::alert')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <!-- Table Categories -->
                            <div class="search-bar">
                                <!-- Add -->
                                <a href="{{ url('categories-create') }}" class="btn btn-primary my-2" role="button"><i
                                        class="bx bxs-book-add"></i></a>
                            </div>
                            <table class="table table-striped table-hover table-bordered border-text-muted"
                                style="text-align: center; font-size: small">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Kategori</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Updated At</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categories as $dataCategories)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}.</th>
                                            <td>{{ $dataCategories->name }}</td>
                                            <td>{{ date('d-M-Y', strtotime($dataCategories->created_at)) }}</td>
                                            <td>{{ date('d-M-Y', strtotime($dataCategories->updated_at)) }}</td>
                                            <td>
                                                <a href="/categories-edit/{{ $dataCategories->id }}"
                                                    class="btn btn-info my-2"><i class="bi bi-pencil-square"></i></a>
                                                @if (Auth::user()->role == 'admin')
                                                    <a href="" class="btn btn-danger" role="button"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#delete{{ $dataCategories->id }}"><i
                                                            class="bi bi-trash"></i></a>
                                                    <!-- delete form-->
                                                    <div class="modal fade" id="delete{{ $dataCategories->id }}"
                                                        tabindex="-1" data-bs-backdrop="false">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Delete Categories</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="post" action="">
                                                                        @csrf
                                                                        <!-- form products -->
                                                                        <div class="modal-body" id="modal-categories">
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $dataCategories->id }}"
                                                                                placeholder="nama kategori"
                                                                                class="form-control" required>
                                                                            <input type="text" name="name"
                                                                                value="{{ $dataCategories->name }}"
                                                                                placeholder="nama kategori"
                                                                                class="form-control" disabled>
                                                                            <br>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="/categories-delete/{{ $dataCategories->id }}"
                                                                        class="btn btn-danger">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- End delete form-->
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <td colspan="5">Data Empty</td>
                                    @endforelse
                                </tbody>
                            </table>
                            <!-- End Table Variants -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
