@extends('layout.admin')

@section('content')
    @include('sweetalert::alert')
    <div class="pagetitle">
        <h1>Products</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">System Setup</li>
                <li class="breadcrumb-item active">Products</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <!-- Table products -->
                            <div class="search-bar">
                                <!-- button Add -->
                                <a href="{{ url('products-create') }}" class="btn btn-primary my-2" role="button"><i
                                        class="bx bxs-book-add"></i></a>
                            </div>
                            {{-- result --}}
                            <table class="table table-striped table-hover table-bordered border-text-muted text-center"
                                style="font-size: small">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Products</th>
                                        <th scope="col">Categories</th>
                                        <th scope="col" class="w-25">Description</th>
                                        <th scope="col">Prices</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $dataProducts)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}.</th>
                                            <td>
                                                <img src="{{ asset('storage/products_img/') }}/{{ $dataProducts->image }}"
                                                    alt="{{ $dataProducts->name }}" title="{{ $dataProducts->name }}"
                                                    width="80" height="80" class="rounded">
                                            </td>
                                            <td>{{ $dataProducts->name }}</td>
                                            <td>{{ $dataProducts->categories->name }}</td>
                                            <td>{{ $dataProducts->description }}</td>
                                            <td>{{ number_format($dataProducts->price) }}</td>
                                            <td>{{ $dataProducts->status->name }}</td>

                                            <td>
                                                {{-- view --}}
                                                <a href="" class="btn btn-danger" role="button"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#largeModal{{ $dataProducts->id }}"><i
                                                        class="bi bi-eye-fill"></i></a>

                                                <div class="modal fade" id="largeModal{{ $dataProducts->id }}"
                                                    tabindex="-1" data-bs-backdrop="false">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Data Product</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <section class="section profile">
                                                                    <div class="row">
                                                                        <div class="col-xl-4">
                                                                            {{-- <div class="card h-100"> --}}
                                                                            <div
                                                                                class="card h-100 d-flex flex-column align-items-center">
                                                                                <img src="{{ asset('storage/products_img') }}/{{ $dataProducts->image }}"
                                                                                    alt="Profile"
                                                                                    class="rounded h-100 w-100">
                                                                            </div>
                                                                            {{-- </div> --}}
                                                                        </div>
                                                                        <div class="col-xl-8">
                                                                            <div class="card">
                                                                                <div class="card-body pt-3 text-start">
                                                                                    <!-- Bordered Tabs -->
                                                                                    <ul
                                                                                        class="nav nav-tabs nav-tabs-bordered">
                                                                                        <li class="nav-item">
                                                                                            <span
                                                                                                style="text-decoration: none">
                                                                                                Products Preview</span>
                                                                                        </li>
                                                                                    </ul>
                                                                                    <div class="tab-content pt-2">
                                                                                        <div class="tab-pane fade show active profile-overview"
                                                                                            id="profile-overview">
                                                                                            <div class="row mb-0">
                                                                                                <div
                                                                                                    class="col-lg-3 col-md-4 label">
                                                                                                    Name</div>
                                                                                                <div
                                                                                                    class="col-lg-9 col-md-8">
                                                                                                    {{ $dataProducts->name }}
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row mb-0">
                                                                                                <div
                                                                                                    class="col-lg-3 col-md-4 label">
                                                                                                    Description</div>
                                                                                                <div
                                                                                                    class="col-lg-9 col-md-8">
                                                                                                    {{ $dataProducts->description }}
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row mb-0">
                                                                                                <div
                                                                                                    class="col-lg-3 col-md-4 label">
                                                                                                    Price</div>
                                                                                                <div
                                                                                                    class="col-lg-9 col-md-8">
                                                                                                    Rp.{{ $dataProducts->price }}
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row mb-0">
                                                                                                <div
                                                                                                    class="col-lg-3 col-md-4 label">
                                                                                                    Status</div>
                                                                                                <div
                                                                                                    class="col-lg-9 col-md-8">
                                                                                                    {{ $dataProducts->status->name }}
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row mb-0">
                                                                                                <div
                                                                                                    class="col-lg-3 col-md-4 label">
                                                                                                    Authors</div>
                                                                                                <div
                                                                                                    class="col-lg-9 col-md-8">
                                                                                                    {{ $dataProducts->users->name }}
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row mb-0">
                                                                                                <div
                                                                                                    class="col-lg-3 col-md-4 label">
                                                                                                    Created</div>
                                                                                                <div
                                                                                                    class="col-lg-9 col-md-8">
                                                                                                    {{ date('d-M-Y', strtotime($dataProducts->created_at)) }}
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div><!-- End Bordered Tabs -->
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </section>
                                                            </div>
                                                            <div class="modal-footer">
                                                                {{-- <a href="" class="btn btn-danger"></a> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- view --}}

                                                <!-- edit -->
                                                <a href="/products-edit/{{ $dataProducts->id }}" class="btn btn-info"
                                                    role="button"><i class="bi bi-pencil-square"></i></a>

                                                <!-- delete admin only-->
                                                @if (Auth::user()->role == 'admin')
                                                    <a href="" class="btn btn-danger" role="button"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#delete{{ $dataProducts->id }}"><i
                                                            class="bi bi-trash"></i></a>
                                                    <div class="modal fade" id="delete{{ $dataProducts->id }}"
                                                        tabindex="-1" data-bs-backdrop="false">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Delete Product</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="post">
                                                                        @csrf
                                                                        <!-- form products -->
                                                                        <img src="{{ asset('storage/products_img/') }}/{{ $dataProducts->image }}"
                                                                            alt="{{ $dataProducts->name }}"
                                                                            title="{{ $dataProducts->name }}"
                                                                            width="80" height="80"
                                                                            class="rounded">
                                                                        <div class="modal-body" id="modal-products">
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $dataProducts->id }}"
                                                                                placeholder="nama kategori"
                                                                                class="form-control" disabled>
                                                                            <input type="text" name="name"
                                                                                value="{{ $dataProducts->name }}"
                                                                                placeholder="nama kategori"
                                                                                class="form-control" disabled>
                                                                            <br>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="/products-delete/{{ $dataProducts->id }}"
                                                                        class="btn btn-danger">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- End delete Modal-->
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <td colspan="13">Data Empty</td>
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
