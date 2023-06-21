@extends('layout.admin')

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item">System setup</li>
            <li class="breadcrumb-item"><a href="{{ url('categories-setting') }}">Categories</a></li>
            <li class="breadcrumb-item active">Create categories</li>
        </ol>
    </nav>
    <div class="card col-6">
        <div class="card-tittle m-auto py-2">Create Categories</div>
        <div class="border-bottom"></div>
        <div class="card-body my-2">
            <form method="post" action="{{ url('categories-create') }}">
                @csrf
                <!-- form products -->
                <label for="name" class="mb-2">Categories name: @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </label>
                <input type="text" name="name" placeholder="Input here..."
                    class="form-control {{ isset($errors->messages()['name']) ? 'is-invalid' : '' }}">

                <input type="submit" value="submit" id="submit" class="btn btn-primary mt-3">
            </form>
        </div>
    </div>
@endsection
