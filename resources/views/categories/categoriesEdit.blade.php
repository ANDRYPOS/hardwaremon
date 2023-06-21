@extends('layout.admin')

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item">System setup</li>
            <li class="breadcrumb-item"><a href="{{ url('categories-setting') }}">Categories</a></li>
            <li class="breadcrumb-item active">Edit categories</li>
        </ol>
    </nav>
    <div class="card col-6">
        <div class="card-tittle m-auto py-2">Edit Categories</div>
        <div class="border-bottom"></div>
        <div class="card-body my-2">
            @foreach ($categories as $dataCategories)
                <form method="post" action="{{ url('categories-update') }}">
                    @csrf
                    @method('put')
                    <!-- form products -->
                    <input type="hidden" name="id" value="{{ $dataCategories->id }}" placeholder="nama kategori"
                        class="form-control">
                    <label for="name" class="mb-2">Categories name: @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </label>
                    <input type="text" name="name" placeholder="nama kategori" pattern="[A-Z a-z]{2,30}"
                        class="form-control  {{ isset($errors->messages()['name']) ? 'is-invalid' : '' }}"
                        value="{{ $dataCategories->name }}">
                    <br>
                    <input type="submit" value="submit" class="btn btn-primary">
                </form>
            @endforeach
        </div>
    </div>
@endsection
