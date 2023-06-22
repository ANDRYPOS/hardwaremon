@extends('layout.admin')

@section('content')
    <main id="main" class="main">
        @include('sweetalert::alert')
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        </div>

        <section class="section dashboard">
            <div class="row">
                @if (Auth::user()->role == 'admin')
                    {{-- banner card --}}
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Banner <span>| Today</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-card-image"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>Count: {{ $carouselsCount }} &emsp; Accepted: {{ $carouselsActive }}</h6>
                                        <h6></h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Banner Card -->

                    {{-- products card --}}
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Products <span>| Today</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-journal-richtext"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>Count: {{ $productCount }} &emsp; Accepted: {{ $productsActive }}</h6>
                                        <h6></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Products Card -->
                @endif

                @if (Auth::user()->role == 'staff' || Auth::user()->role == 'admin')
                    <!-- banner columns -->
                    <div class="col-lg-12">
                        <div class="row">
                            <!-- carousels tittle count -->
                            <div class="container horizontal-scrollable">
                                <div class="row flex-nowrap d-flex flex-sm-column flex-md-row"
                                    style="overflow-x: auto;
                            white-space: nowrap">
                                    @foreach ($carousels as $key => $banner)
                                        @if ($banner->is_active == 2)
                                            <div class="col-md-4 col-sm-12">
                                                <div class="card">
                                                    <img src="{{ asset('storage/banner/') }}/{{ $banner->banner }}"
                                                        class="card-img-top" alt="hero" style="height: 200px">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ $banner->name }}</h5>
                                                        <p class="card-text text-primary">
                                                            {{ $banner->status->name }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div><!-- End banner columns -->
                @endif

                <div class="my-3"></div>

                {{-- products column --}}
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <!-- Table products -->
                            <div class="search-bar my-2">
                                <!-- button Add -->
                                <div class="card-tittle text-center">
                                    Products List
                                </div>
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
                                        @if (Auth::user()->role == 'admin')
                                            <th scope="col">Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $dataProducts)
                                        <tr>
                                            @if ($dataProducts->status_id == 2 || Auth::user()->role == 'admin' || Auth::user()->role == 'staff')
                                                <th scope="row">{{ $loop->iteration }}.</th>
                                                <td>
                                                    <img src="{{ asset('storage/products_img/') }}/{{ $dataProducts->image }}"
                                                        alt="{{ $dataProducts->name }}" title="{{ $dataProducts->name }}"
                                                        width="80" height="80" class="rounded">
                                                </td>
                                                <td>{{ $dataProducts->name }}</td>
                                                <td>{{ $dataProducts->categories->name }}</td>
                                                <td>{{ $dataProducts->description }}</td>
                                                <td>Rp. {{ number_format($dataProducts->price) }}</td>
                                                @if (Auth::user()->role == 'user')
                                                    {{-- view --}}
                                                    <td><a href="" class="btn btn-primary" role="button"
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
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <section class="section profile">
                                                                            <div class="row">
                                                                                <div class="col-xl-4">
                                                                                    <div
                                                                                        class="card h-100 d-flex flex-column align-items-center">
                                                                                        <img src="{{ asset('storage/products_img') }}/{{ $dataProducts->image }}"
                                                                                            alt="Profile"
                                                                                            class="rounded h-100 w-100">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-xl-8">
                                                                                    <div class="card">
                                                                                        <div
                                                                                            class="card-body pt-3 text-start">
                                                                                            <!-- Bordered Tabs -->
                                                                                            <ul
                                                                                                class="nav nav-tabs nav-tabs-bordered">
                                                                                                <li class="nav-item">
                                                                                                    <span
                                                                                                        style="text-decoration: none">
                                                                                                        Products
                                                                                                        Preview</span>
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
                                                                                                            Description
                                                                                                        </div>
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
                                                                                                            Rp.
                                                                                                            {{ number_format($dataProducts->price) }}
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div><!-- End Bordered Tabs -->
                                                                                        </div>
                                                                                    </div>
                                                                                    <a href="https://wa.me/+6282114558212?text=Halo..%20apakah%20product%20tersedia%3F%20%0AProduct%3A%20{{ $dataProducts->name }}%20%0ADescription%3A%0A{{ $dataProducts->description }}%20%0AHarga%3ARp.{{ number_format($dataProducts->price) }}"
                                                                                        class="btn btn-outline-primary"
                                                                                        target="_blank">Buy
                                                                                        now</a>
                                                                                </div>
                                                                            </div>
                                                                        </section>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    {{-- view --}}
                                                @else
                                                    <td
                                                        @if ($dataProducts->status_id == 1) class="text-warning"
                                                    @elseif ($dataProducts->status_id == 2)
                                                    class="text-primary"
                                                    @else
                                                    class="text-danger" @endif>
                                                        {{ $dataProducts->status->name }}</td>
                                                @endif
                                                @if (Auth::user()->role == 'admin')
                                                    <td>
                                                        <!-- accepted -->
                                                        <div class="text-center fs-4">
                                                            {{-- accepted --}}
                                                            <a href="" role="button" type="submit"
                                                                class="btn btn-outline-primary mb-2"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#aceptedproducts{{ $dataProducts->id }}"><i
                                                                    class="bi bi-hand-thumbs-up-fill mx-4"></i></a>
                                                            <!-- acepted form-->
                                                            <div class="modal fade"
                                                                id="aceptedproducts{{ $dataProducts->id }}"
                                                                tabindex="-1" data-bs-backdrop="false">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">
                                                                                {{ $dataProducts->status_id == 2 ? 'The product has been accepted' : 'Accept the product?' }}
                                                                            </h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form method="post"
                                                                                action="{{ url('products-acepted') }}">
                                                                                @csrf
                                                                                @method('put')
                                                                                <div class="modal-body"
                                                                                    id="modal-categories">
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
                                                            </div> {{-- form accept --}}
                                                            {{-- accepted --}}

                                                            {{-- decline --}}
                                                            <a href="" role="button" type="submit"
                                                                class="btn btn-outline-danger mb-2" data-bs-toggle="modal"
                                                                data-bs-target="#decline{{ $dataProducts->id }}"><i
                                                                    class="bi bi-hand-thumbs-down-fill mx-4"></i></a>
                                                            <!-- decline form-->
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
                                                                                <div class="modal-body"
                                                                                    id="modal-categories">
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
                                                            </div> {{-- form decline --}}
                                                            {{-- decline --}}
                                                        </div>
                                                    </td>
                                                @endif
                                            @endif
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
                {{-- End products columns --}}
            </div>
        </section>
    </main><!-- End #main -->
    @section('content')
