@extends('layout.admin')

@section('content')
    @include('sweetalert::alert')
    <div class="pagetitle">
        <h1>Products</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item">System Setup</li>
                <li class="breadcrumb-item active">Products</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="menu-nav my-2 d-flex justify-content-between">
                <!-- Example split danger button -->
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">Menu</button>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <span
                            class="{{ $waiting->count() < 1 && $rejected->count() < 1 ? 'visually-hidden' : 'text-warning' }}"><strong>{{ $waiting->count() + $rejected->count() }}</strong></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ url('products-acepted') }}">Acepted List<strong
                                    class="float-end text-primary">{{ $acepted->count() }}</strong></a>
                        </li>
                        <li><a class="dropdown-item {{ $waiting->count() < 1 ? 'visually-hidden' : '' }} text-danger"
                                href="{{ url('products-waiting') }}">Waiting List <strong
                                    class="float-end text-{{ $waiting->count() < 1 ? 'primary' : 'warning' }}">{{ $waiting->count() }}</strong></a>
                        </li>
                        <li><a class="dropdown-item {{ $rejected->count() < 1 ? 'visually-hidden' : '' }} text-success"
                                href="{{ url('products-rejected') }}">Rejected List
                                <strong
                                    class="float-end text-{{ $rejected->count() < 1 ? 'primary' : 'success' }}">{{ $rejected->count() }}
                                </strong>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <!-- Table products -->
                        <div class="search-bar my-3">
                            <div class="text-center">
                                <p class="text-primary float-start"><a href="{{ url('products-create') }}"><i
                                            class="bi bi-plus-lg"></i> Insert
                                        Data</a></p>
                                <Strong class="text-primary">Product List</Strong>
                                <strong class="border border-1 rounded-1 float-end"
                                    style="width: 40px">{{ $products->count() }}</strong>
                            </div>
                        </div>
                        <hr>
                        @foreach ($products as $dataProducts)
                            <section class="product lists">
                                <div class="row">
                                    <div class="col-xl-4">
                                        <div class="card border">
                                            <b class="ms-1">{{ $loop->iteration }}</b>
                                            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                                                <img src="{{ asset('storage/products_img/') }}/{{ $dataProducts->image }}"
                                                    alt="{{ $dataProducts->name }}" title="{{ $dataProducts->name }}"
                                                    width="180" height="180" class="rounded-2 hover-effect">
                                                <h2 class="mt-2">{{ $dataProducts->name }}</h2>
                                                <h5
                                                    @if ($dataProducts->status_id == 2) class="text-primary"
                                                        @elseif ($dataProducts->status_id == 3)
                                                            class="text-danger"
                                                            @else
                                                            class="text-warning" @endif>
                                                    {{ $dataProducts->status->name }}</h5>

                                                <div class="action mt-2 d-flex gap-2">
                                                    {{-- action disini --}}
                                                    {{-- Accepted --}}
                                                    <a href="" role="button" type="submit"
                                                        class="btn btn-outline-primary w-50" data-bs-toggle="modal"
                                                        data-bs-target="#aceptedproducts{{ $dataProducts->id }}"><i
                                                            class="bi bi-hand-thumbs-up-fill m-auto"></i></a>
                                                    {{-- Accepted modal --}}
                                                    <div class="modal fade" id="aceptedproducts{{ $dataProducts->id }}"
                                                        tabindex="-1" data-bs-backdrop="false">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">
                                                                        {{ $dataProducts->status_id == 2 ? 'The product has been accepted' : 'Accept the product?' }}
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="post"
                                                                        action="{{ url('products-acepted') }}">
                                                                        @csrf
                                                                        @method('put')
                                                                        <div class="modal-body" id="modal-categories">
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $dataProducts->id }}"
                                                                                placeholder="nama kategori"
                                                                                class="form-control" required>
                                                                            <input
                                                                                type="{{ $dataProducts->status_id == 2 ? 'hidden' : 'text' }}"
                                                                                name="name"
                                                                                value="{{ $dataProducts->name }}"
                                                                                placeholder="nama kategori"
                                                                                class="form-control" disabled>
                                                                            <br>
                                                                        </div>
                                                                        <input
                                                                            type="{{ $dataProducts->status_id == 2 ? 'hidden' : 'submit' }}"
                                                                            class="btn btn-Primary">
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- End Accepted modal --}}

                                                    {{-- decline --}}
                                                    <a href="" role="button" type="submit"
                                                        class="btn btn-outline-danger w-50" data-bs-toggle="modal"
                                                        data-bs-target="#decline{{ $dataProducts->id }}"><i
                                                            class="bi bi-hand-thumbs-down-fill m-auto"></i></a>
                                                    {{-- decline modal --}}
                                                    <div class="modal fade" id="decline{{ $dataProducts->id }}"
                                                        tabindex="-1" data-bs-backdrop="false">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">
                                                                        {{ $dataProducts->status_id == 2 ? 'Reject product?' : 'Product has been rejected' }}
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="post"
                                                                        action="{{ url('products-decline') }}">
                                                                        @csrf
                                                                        @method('put')
                                                                        <!-- form products -->
                                                                        <div class="modal-body" id="modal-categories">
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $dataProducts->id }}"
                                                                                placeholder="nama kategori"
                                                                                class="form-control" required>
                                                                            <input type="text" name="name"
                                                                                value="{{ $dataProducts->name }}"
                                                                                placeholder="nama kategori"
                                                                                class="form-control">
                                                                            <br>
                                                                        </div>
                                                                        <input
                                                                            type="{{ $dataProducts->status_id == 2 ? 'submit' : 'hidden' }}"
                                                                            class="btn btn-Primary">
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- end decline modal --}}

                                                    {{-- end action --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-8">
                                        <div class="card border">
                                            <div class="card-body pt-3">
                                                <!-- Bordered Tabs -->
                                                <ul class="nav nav-tabs nav-tabs-bordered">

                                                    <li class="nav-item">
                                                        <button class="nav-link active float-start" data-bs-toggle="tab"
                                                            data-bs-target="#profile-overview">Product
                                                            Details</button>
                                                    </li>
                                                </ul>
                                                <div class="tab-content pt-2">
                                                    <div class="tab-pane fade show active products-details mt-2">
                                                        <p class="small fst-italic">{{ $dataProducts->description }}
                                                        </p>

                                                        <div class="row my-1">
                                                            <div class="col-lg-3 col-md-4 label ">Products Name</div>
                                                            <div class="col-lg-9 col-md-8 text-primary">
                                                                {{ $dataProducts->name }}
                                                            </div>
                                                        </div>

                                                        <div class="row my-1">
                                                            <div class="col-lg-3 col-md-4 label">Categori</div>
                                                            <div class="col-lg-9 col-md-8 text-primary">
                                                                {{ $dataProducts->categories->name }}
                                                            </div>
                                                        </div>

                                                        <div class="row my-1">
                                                            <div class="col-lg-3 col-md-4 label">Price</div>
                                                            <div class="col-lg-9 col-md-8 text-primary">Rp.
                                                                {{ number_format($dataProducts->price) }},-
                                                            </div>
                                                        </div>

                                                        <div class="row my-1">
                                                            <div class="col-lg-3 col-md-4 label">Published</div>
                                                            <div class="col-lg-9 col-md-8 text-primary">
                                                                {{ date_format($dataProducts->created_at, 'd M Y') }}
                                                            </div>
                                                        </div>

                                                        <div class="row my-1">
                                                            <div class="col-lg-3 col-md-4 label">Publisher</div>
                                                            <div class="col-lg-9 col-md-8 text-primary">
                                                                {{ $dataProducts->users->name }}</div>
                                                        </div>

                                                        <div class="row my-1">
                                                            <div class="col-lg-3 col-md-4 label">Action</div>
                                                            <div class="col-lg-9 col-md-8">
                                                                {{-- edit modal --}}
                                                                <a href="/products-edit/{{ $dataProducts->id }}"
                                                                    class="btn-link text-decoration-none"
                                                                    role="button">Edit</a>
                                                                {{-- end edit modal --}}
                                                                |
                                                                {{-- delete --}}
                                                                @if (Auth::user()->role == 'admin')
                                                                    <a href=""
                                                                        class="btn-link text-decoration-none"
                                                                        role="button" data-bs-toggle="modal"
                                                                        data-bs-target="#delete{{ $dataProducts->id }}">Delete</a>
                                                                    {{-- delete modal --}}
                                                                    <div class="modal fade"
                                                                        id="delete{{ $dataProducts->id }}" tabindex="-1"
                                                                        data-bs-backdrop="false">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title">Delete
                                                                                        Product</h5>
                                                                                    <button type="button"
                                                                                        class="btn-close"
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
                                                                                        <div class="modal-body"
                                                                                            id="modal-products">
                                                                                            <input type="hidden"
                                                                                                name="id"
                                                                                                value="{{ $dataProducts->id }}"
                                                                                                placeholder="nama kategori"
                                                                                                class="form-control"
                                                                                                disabled>
                                                                                            <input type="text"
                                                                                                name="name"
                                                                                                value="{{ $dataProducts->name }}"
                                                                                                placeholder="nama kategori"
                                                                                                class="form-control"
                                                                                                disabled>
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
                                                                    </div>
                                                                    {{-- end delete modal --}}
                                                                @endif
                                                                {{-- end delete --}}
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div><!-- End Bordered Tabs -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        @endforeach
                        {{-- modal view --}}
                        <div class="modal fade" id="largeModal{{ $dataProducts->id }}" tabindex="-1"
                            data-bs-backdrop="false">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Data Product</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <section class="section profile">
                                            <div class="row">
                                                <div class="col-xl-4">
                                                    {{-- <div class="card h-100"> --}}
                                                    <div class="card h-100 d-flex flex-column align-items-center">
                                                        <img src="{{ asset('storage/products_img') }}/{{ $dataProducts->image }}"
                                                            alt="Profile" class="rounded h-100 w-100">
                                                    </div>
                                                    {{-- </div> --}}
                                                </div>
                                                <div class="col-xl-8">
                                                    <div class="card">
                                                        <div class="card-body pt-3 text-start">
                                                            <!-- Bordered Tabs -->
                                                            <ul class="nav nav-tabs nav-tabs-bordered">
                                                                <li class="nav-item">
                                                                    <span style="text-decoration: none">
                                                                        Products Preview</span>
                                                                </li>
                                                            </ul>
                                                            <div class="tab-content pt-2">
                                                                <div class="tab-pane fade show active profile-overview"
                                                                    id="profile-overview">
                                                                    <div class="row mb-0">
                                                                        <div class="col-lg-3 col-md-4 label">
                                                                            Name</div>
                                                                        <div class="col-lg-9 col-md-8">
                                                                            {{ $dataProducts->name }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-0">
                                                                        <div class="col-lg-3 col-md-4 label">
                                                                            Description</div>
                                                                        <div class="col-lg-9 col-md-8">
                                                                            {{ $dataProducts->description }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-0">
                                                                        <div class="col-lg-3 col-md-4 label">
                                                                            Price</div>
                                                                        <div class="col-lg-9 col-md-8">
                                                                            Rp.{{ number_format($dataProducts->price) }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-0">
                                                                        <div class="col-lg-3 col-md-4 label">
                                                                            Status</div>
                                                                        <div class="col-lg-9 col-md-8">
                                                                            {{ $dataProducts->status->name }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-0">
                                                                        <div class="col-lg-3 col-md-4 label">
                                                                            Authors</div>
                                                                        <div class="col-lg-9 col-md-8">
                                                                            {{ $dataProducts->users->name }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-0">
                                                                        <div class="col-lg-3 col-md-4 label">
                                                                            Created</div>
                                                                        <div class="col-lg-9 col-md-8">
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
                        {{-- end modal view --}}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
