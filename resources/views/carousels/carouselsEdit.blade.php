@extends('layout.admin')

@section('content')
    <div class="pagetitle">
        <h1>Carousels</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">System setup</li>
                <li class="breadcrumb-item"><a href="{{ url('carousels') }}">Carousels</a></li>
                <li class="breadcrumb-item active">Edit carousels</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    @include('sweetalert::alert')
    <section class="section">
        {{-- form add banner --}}
        @foreach ($carousels as $banner)
            <div class="card" style="width:50%">
                <div class="card-body table-responsive py-2">
                    <div class="tittle-form text-center">
                        <h4>Update Carousels</h4>
                    </div>
                    <form method="post" enctype="multipart/form-data" action="{{ url('carousels-update') }}">
                        @csrf
                        @method('put')
                        <input class="form-control mb-1" type="hidden" name="id" value="{{ $banner->id }}">
                        <label for="name">Tittle: @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </label>
                        <input class="form-control mb-1 {{ isset($errors->messages()['name']) ? 'is-invalid' : '' }}"
                            type="text" name="name" value="{{ $banner->name }}">
                        <label for="banner"> Banner: @error('banner')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </label>
                        <input class="form-control" type="file" id="formFile" name="banner"
                            accept="image/gif, image/jpeg, image/png">
                        <input type="submit" value="Update" class="btn btn-primary mt-4">
                    </form>
                </div>
            </div>
        @endforeach
        {{-- add banner end --}}
    </section>
@endsection
