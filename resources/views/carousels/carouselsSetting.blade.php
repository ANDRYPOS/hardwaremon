@extends('layout.admin')

@section('content')
    <div class="pagetitle">
        <h1>Carousels</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item">System setup</li>
                <li class="breadcrumb-item active">Carousels</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    @include('sweetalert::alert')
    <section class="section">
        <div class="text-center">
            <div class="menu-nav my-2 d-flex justify-content-between">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">Menu</button>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <span
                            class="{{ $waiting->count() < 1 && $rejected->count() < 1 ? 'visually-hidden' : 'text-warning' }}"><strong>{{ $waiting->count() + $rejected->count() }}</strong></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{-- {{ url('products-acepted') }} --}}">Acepted List<strong
                                    class="float-end text-primary">{{ $acepted->count() }}</strong></a>
                        </li>
                        <li><a class="dropdown-item {{ $waiting->count() < 1 ? 'visually-hidden' : '' }} text-danger"
                                href="{{-- {{ url('products-waiting') }} --}}">Waiting List <strong
                                    class="float-end text-{{ $waiting->count() < 1 ? 'primary' : 'warning' }}">{{ $waiting->count() }}</strong></a>
                        </li>
                        <li><a class="dropdown-item {{ $rejected->count() < 1 ? 'visually-hidden' : '' }} text-success"
                                href="{{-- {{ url('products-rejected') }} --}}">Rejected List
                                <strong
                                    class="float-end text-{{ $rejected->count() < 1 ? 'primary' : 'success' }}">{{ $rejected->count() }}
                                </strong>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="accordion accordion-flush border-bottom mb-2" id="accordionFlushExample">
                <div class="accordion-item bg-transparent">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button
                            class="accordion-button {{ isset($errors->messages()['name']) || isset($errors->messages()['banner']) ? '' : 'collapsed' }}"
                            type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                            aria-expanded="true" aria-controls="flush-collapseOne">
                            <p class="text-primary float-start"><i class="bi bi-plus-lg"></i> Insert
                                Data</p>
                        </button>
                    </h2>
                    <div id="flush-collapseOne"
                        class="{{ isset($errors->messages()['name']) || isset($errors->messages()['banner']) ? 'accordion-collapse' : 'accordion-collapse collapse' }}"
                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            {{-- form add banner --}}
                            <form method="post" class="row" enctype="multipart/form-data"
                                action="{{ url('carousels-create') }}">

                                @csrf
                                <div class="col-md-5 text-start">
                                    <label for="name">Tittle: @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                    <input
                                        class="form-control mb-1 {{ isset($errors->messages()['name']) ? 'is-invalid' : '' }}"
                                        type="text" name="name" value="{{ old('name') }}">
                                </div>
                                <div class="col-md-5 text-start">
                                    <label for="banner"> Banner: @error('banner')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                    <input
                                        class="form-control {{ isset($errors->messages()['banner']) ? 'is-invalid' : '' }}"
                                        type="file" id="formFile" name="banner"
                                        accept="image/gif, image/jpeg, image/png">
                                </div>
                                <div class="col-2 float-start ps-0">
                                    <input type="submit" value="submit" class="btn btn-primary d-flex align-bottom"
                                        style="margin-top: 22px">
                                </div>

                            </form>
                            {{-- add banner end --}}
                        </div>
                    </div>
                </div>
            </div>

            <Strong class="text-primary m-auto">Hero List</Strong>
            <strong class="border border-1 rounded-1 float-end" style="width: 40px">{{ $carousels->count() }}</strong>
        </div>
        {{-- result banner & form action admin --}}
        <div class="border-bottom my-2"></div>

        <div class="row">
            <div class="col-lg-12">
                <div class="row">

                    <!-- carousels tittle count -->
                    <div class="container horizontal-scrollable">
                        <div class="row d-flex flex-sm-column flex-lg-row" style="white-space: nowrap">
                            @foreach ($carousels as $key => $banner)
                                <div class="col-lg-4 col-sm-8">
                                    <div class="card h-20">
                                        <img src="{{ asset('storage/banner/') }}/{{ $banner->banner }}"
                                            class="card-img-top hover-effect" alt="hero" style="height: 200px">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $banner->name }}</h5>
                                            <p
                                                @if ($banner->is_active == 1) class="text-warning"
                                                @elseif ($banner->is_active == 2) class ="text-primary"
                                                @else class="text-danger" @endif>
                                                {{ $banner->status->name }}
                                            </p>
                                            @if (Auth::user()->role == 'admin')
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
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="post"
                                                                        action="{{ url('carousels-acepted') }}">
                                                                        @csrf
                                                                        @method('put')
                                                                        <div class="modal-body" id="modal-categories">
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $banner->id }}"
                                                                                placeholder="nama kategori"
                                                                                class="form-control" required>
                                                                            <input
                                                                                type="{{ $banner->is_active == 2 ? 'hidden' : 'text' }}"
                                                                                name="name"
                                                                                value="{{ $banner->name }}"
                                                                                placeholder="nama kategori"
                                                                                class="form-control" disabled>
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
                                                        class="btn btn-outline-danger" data-bs-toggle="modal"
                                                        data-bs-target="#decline{{ $banner->id }}"><i
                                                            class="bi bi-hand-thumbs-down-fill mx-4"></i></a>
                                                    <!-- decline form-->
                                                    <div class="modal fade" id="decline{{ $banner->id }}"
                                                        tabindex="-1" data-bs-backdrop="false">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">
                                                                        {{ $banner->is_active == 2 ? 'Tolak Banner?' : 'Sudah ditolak' }}
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
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
                                                        class="btn btn-outline-success" data-bs-toggle="modal"
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
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
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
                                            @endif
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
