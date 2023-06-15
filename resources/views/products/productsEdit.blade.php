@extends('layout.admin')

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">System setup</li>
            <li class="breadcrumb-item"><a href="{{ url('products-setting') }}">Products</a></li>
            <li class="breadcrumb-item active">Edit products</li>
        </ol>
    </nav>
    <div class="row">
        <div class="card col-6">
            <div class="card-tittle m-auto py-2">Edit Products</div>
            <div class="border-bottom"></div>
            <div class="card-body my-2">
                @foreach ($products as $dataProducts)
                    <form method="post" enctype="multipart/form-data" action="{{ url('products-update') }}">
                        @csrf
                        @method('put')
                        <!-- form edit products -->

                        {{-- products_id --}}
                        <input type="hidden" name="id" value="{{ $dataProducts->id }}" class="form-control">
                        {{-- products_id end --}}

                        {{-- image --}}
                        <div class="card m-auto my-2">
                            <img src="{{ asset('storage/products_img/') }}/{{ $dataProducts->image }}"
                                alt="{{ $dataProducts->name }}" title="{{ $dataProducts->name }}" width="90"
                                height="90" class="rounded mb-2 m-auto">
                        </div>
                        {{-- image end --}}

                        {{-- categories --}}
                        <label for="category_id">Category: @error('category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </label>
                        <select class="form-select mb-2" id="exampleFormControlSelect2" style="cursor:pointer"
                            aria-label="Default select example" name="category_id">
                            @foreach ($categories as $dataCategories)
                                <option value="{{ $dataCategories->id }}"
                                    {{ $dataProducts->categories->id == $dataCategories->id ? 'selected' : '' }}>
                                    {{ $dataCategories->name }}
                                </option>
                            @endforeach
                        </select>
                        {{-- categories end --}}

                        {{-- name --}}
                        <label for="name">Nama products: @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </label>
                        <input type="text" name="name" placeholder="Product Name" value="{{ $dataProducts->name }}"
                            class="form-control mb-2" pattern="^[a-zA-Z0-9_.-]*$" minlength="3">
                        {{-- name end --}}

                        {{-- description --}}
                        <label for="description">Description: @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </label>
                        <input type="text" name="description" placeholder="Description" class="form-control mb-2"
                            value="{{ $dataProducts->description }}">
                        {{-- description end --}}

                        {{-- prce --}}
                        <label for="price">Price: @error('price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </label>
                        <input type="text" name="price" placeholder="Price" class="form-control mb-2"
                            value="{{ $dataProducts->price }}">
                        {{-- prce end --}}

                        {{-- image --}}
                        <div class="row text-start">
                            <label for="inputNumber" class="col-sm-12"> Image
                                Upload: @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </label>
                            <div class="col-sm-12 mb-2">
                                <input class="form-control" type="file" id="formFile" name="image"
                                    accept="image/gif, image/jpeg, image/png">
                            </div>
                        </div>
                        {{-- image end --}}

                        {{-- status --}}
                        <label for="status">Status:</label>
                        <input type="text" name="status" placeholder="Price" class="form-control mb-2"
                            style="cursor: not-allowed" value="{{ $dataProducts->status->name }}" disabled>
                        {{-- status end --}}
                        <input type="submit" value="submit" class="btn btn-primary mt-2">
                    </form>
                @endforeach
            </div>
        </div>


        {{-- categories reference --}}
        <div class="col-5 ms-4">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <!-- Table Categories -->
                        <div class="card-tittle py-2 text-center">Categories Reference</div>
                        <div class="border-bottom"></div>
                        <div class="search-bar mb-3">
                        </div>
                        <table class="table table-striped table-hover table-bordered border-text-muted"
                            style="text-align: center; font-size: small">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Kategori</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Updated At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $dataCategories)
                                    <tr>
                                        <th>{{ $loop->iteration }}.</th>
                                        <td>{{ $dataCategories->name }}</td>
                                        <td>{{ date('d-M-Y', strtotime($dataCategories->created_at)) }}</td>
                                        <td>{{ date('d-M-Y', strtotime($dataCategories->updated_at)) }}</td>
                                    </tr>
                                @empty
                                    <td colspan="4">Data Empty</td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- categories reference end --}}
    </div>
@endsection
