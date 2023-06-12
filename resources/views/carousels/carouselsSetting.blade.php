@extends('layout.admin')

@section('content')
    <div class="pagetitle">
        <h1>Carousels</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">System setup</li>
                <li class="breadcrumb-item active">Carousels</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    @include('sweetalert::alert')
    <section class="section">
        {{-- form add banner --}}
        <form method="post" class="row" enctype="multipart/form-data" action="{{ url('carousels-create') }}">

            @csrf
            <div class="col-md-5">
                <label for="name">Tittle: @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </label>
                <input class="form-control mb-1" type="text" name="name">
            </div>
            <div class="col-md-4">
                <label for="banner"> Banner: @error('banner')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </label>
                <input class="form-control" type="file" id="formFile" name="banner"
                    accept="image/gif, image/jpeg, image/png">
            </div>
            <div class="col-2">
                <input type="submit" value="submit" class="btn btn-primary mt-4">
            </div>

        </form>
        {{-- add banner end --}}

        {{-- result banner & form action admin --}}
        <div class="border-bottom my-2"></div>
        {{-- <div id="carouselExampleInterval" class="carousel slide">
            <div class="carousel-inner">
                @foreach ($carousels as $key => $banner)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <div class="cards-wrapper d-flex" style="height:100%">
                            <img src="{{ asset('storage/banner/') }}/{{ $banner->banner }}" class="card" alt="...">
                            <div class="card-body">
                                <h5 class="tittle mt-1">{{ $banner->name }}</h5>
                                <div class="card-text" style="height:5rem;">
                                    <small>
                                        Created by: {{ $banner->usersCreated->name }}<br>
                                        Created at: {{ date('D, d M Y', strtotime($banner->created_at)) }}<br>
                                        Verified by: {{ $banner->usersVerified->name }}<br>
                                        Status : {{ $banner->status->name }}
                                    </small>
                                </div>
                                @if (Auth::user()->role == 'admin')
                                    <div class="action mt-5">
                                        <a href="/carousels-edit/{{ $banner->id }}" class="btn btn-info"
                                            role="button"><i class="bi bi-pencil-square"></i></a>

                                        <a href="" class="btn btn-danger" role="button" data-bs-toggle="modal"
                                            data-bs-target="#delete{{ $banner->id }}"><i class="bi bi-trash"></i></a>
                                    </div>
                                    <!-- delete -->
                                    <div class="modal fade" id="delete{{ $banner->id }}" tabindex="-1"
                                        data-bs-backdrop="false">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Delete Banner</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post">
                                                        @csrf
                                                        <!-- form products -->
                                                        <div class="modal-body" id="modal-products">
                                                            <input type="hidden" name="id"
                                                                value="{{ $banner->id }}" placeholder="nama kategori"
                                                                class="form-control" disabled>
                                                            <input type="text" name="name"
                                                                value="{{ $banner->name }}" placeholder="nama kategori"
                                                                class="form-control" disabled>
                                                            <br>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="/carousels-delete/{{ $banner->id }}"
                                                        class="btn btn-danger">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- End delete Modal-->
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="prev" style="width:20px; height:93%">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="next" style="width:20px; height:93%">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div> --}}

        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <small class="m-auto">Hero Active : {{ $carouselsCount }}</small>
                    <!-- carousels tittle count -->
                    <div class="container horizontal-scrollable">
                        <div class="row flex-nowrap d-flex flex-sm-column flex-lg-row"
                            style="overflow-x: auto;
                    white-space: nowrap">
                            @foreach ($carousels as $key => $banner)
                                <div class="col-lg-4 col-sm-8">
                                    <div class="card h-20">
                                        <img src="{{ asset('storage/banner/') }}/{{ $banner->banner }}" class="card-img-top"
                                            alt="hero" style="height: 200px">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $banner->name }}</h5>
                                            <p class="card-text">
                                                {{-- {{ $banner->is_active == 1 ? 'Waiting' : 'Active' }} --}}
                                                {{ $banner->status->name }}
                                            </p>
                                            <div class="text-center fs-4">
                                                {{-- accept --}}
                                                <a href="" role="button" type="submit"
                                                    class="btn btn-outline-primary" data-bs-toggle="modal"
                                                    data-bs-target="#acepted{{ $banner->id }}"><i
                                                        class="bi bi-hand-thumbs-up-fill mx-4"></i></a>
                                                <!-- acepted form-->
                                                <div class="modal fade" id="acepted{{ $banner->id }}" tabindex="-1"
                                                    data-bs-backdrop="false">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">
                                                                    {{ $banner->is_active == 2 ? 'Sudah di accept!' : 'Accepted Banner?' }}
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="post"
                                                                    action="{{ url('carousels-acepted') }}">
                                                                    @csrf
                                                                    @method('put')
                                                                    <div class="modal-body" id="modal-categories">
                                                                        <input type="hidden" name="id"
                                                                            value="{{ $banner->id }}"
                                                                            placeholder="nama kategori" class="form-control"
                                                                            required>
                                                                        <input
                                                                            type="{{ $banner->is_active == 2 ? 'hidden' : 'text' }}"
                                                                            name="name" value="{{ $banner->name }}"
                                                                            placeholder="nama kategori" class="form-control"
                                                                            disabled>
                                                                        <br>
                                                                    </div>
                                                                    <input
                                                                        type="{{ $banner->is_active == 2 ? 'hidden' : 'submit' }}"
                                                                        class="btn btn-Primary">
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> {{-- form accept --}}
                                                {{-- accept --}}

                                                {{-- decline --}}
                                                <a href="" role="button" type="submit"
                                                    class="btn btn-outline-success" data-bs-toggle="modal"
                                                    data-bs-target="#decline{{ $banner->id }}"><i
                                                        class="bi bi-hand-thumbs-down-fill mx-4"></i></a>
                                                <!-- decline form-->
                                                <div class="modal fade" id="decline{{ $banner->id }}" tabindex="-1"
                                                    data-bs-backdrop="false">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">
                                                                    {{ $banner->is_active == 2 ? 'Tolak Banner?' : 'Sudah ditolak' }}
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="post"
                                                                    action="{{ url('carousels-decline') }}">
                                                                    @csrf
                                                                    @method('put')
                                                                    <!-- form products -->
                                                                    <div class="modal-body" id="modal-categories">
                                                                        <input type="hidden" name="id"
                                                                            value="{{ $banner->id }}"
                                                                            placeholder="nama kategori"
                                                                            class="form-control" required>
                                                                        <input type="text" name="name"
                                                                            value="{{ $banner->name }}"
                                                                            placeholder="nama kategori"
                                                                            class="form-control">
                                                                        <br>
                                                                    </div>
                                                                    <input
                                                                        type="{{ $banner->is_active == 2 ? 'submit' : 'hidden' }}"
                                                                        class="btn btn-Primary">
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> {{-- form decline --}}
                                                {{-- decline --}}

                                                {{-- trash --}}
                                                <a href="" role="button" type="submit"
                                                    class="btn btn-outline-danger" data-bs-toggle="modal"
                                                    data-bs-target="#trash{{ $banner->id }}"><i
                                                        class="bi bi-trash-fill mx-4"></i></a>
                                                <!-- trash form-->
                                                <div class="modal fade" id="trash{{ $banner->id }}" tabindex="-1"
                                                    data-bs-backdrop="false">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">
                                                                    {{ $banner->is_active == 2 ? 'Banner sedang aktif, yakin untuk menghapus?' : 'Hapus banner?' }}
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="post" action="">
                                                                    @csrf
                                                                    <!-- form products -->
                                                                    <div class="modal-body" id="modal-categories">
                                                                        <input type="hidden" name="id"
                                                                            value="{{ $banner->id }}"
                                                                            placeholder="nama kategori"
                                                                            class="form-control" required>
                                                                        <input type="text" name="name"
                                                                            value="{{ $banner->name }}"
                                                                            placeholder="nama kategori"
                                                                            class="form-control">
                                                                        <br>
                                                                    </div>
                                                                    {{-- <input type="submit" class="btn btn-Primary"> --}}
                                                                </form>
                                                                <a href="/carousels-delete/{{ $banner->id }}"
                                                                    class="btn btn-danger">Confirm</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> {{-- trash form --}}
                                                {{-- trash --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div><!-- End banner columns -->
            {{-- result and action adamin --}}
        </div>

    </section>
@endsection