@extends('layout.admin')


@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">System setup</li>
            <li class="breadcrumb-item"><a href="{{ url('products-setting') }}">Products</a></li>
            <li class="breadcrumb-item active">Create products</li>
        </ol>
    </nav>
    <div class="row">
        <div class="card col-6">
            <div class="card-tittle m-auto py-2">Create Products</div>
            <div class="border-bottom"></div>
            <div class="card-body my-2">
                <form method="post" enctype="multipart/form-data" action="/products-create">
                    @csrf
                    <!-- form create products -->
                    {{-- category_id --}}
                    <label for="category_id">Category: @error('category_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </label>
                    <select class="form-select mb-2 {{ isset($errors->messages()['category_id']) ? 'is-invalid' : '' }}"
                        id="exampleFormControlSelect2" aria-label="Default select example" name="category_id"
                        style="cursor: pointer">
                        <option value=""> ---Select
                            categori---</option>
                        @foreach ($categories as $dataCategories)
                            <option value="{{ $dataCategories->id }}"
                                {{ old('category_id') == $dataCategories->id ? 'selected' : '' }}>
                                {{ $dataCategories->name }}
                            </option>
                        @endforeach

                    </select>
                    {{-- category_id end --}}

                    {{-- name products --}}
                    <label for="name">Nama products: @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </label>
                    <input type="text" name="name" placeholder="Input nama products"
                        class="form-control mb-2 {{ isset($errors->messages()['name']) ? 'is-invalid' : '' }}"
                        value="{{ old('name') }}">
                    {{-- name products end --}}

                    {{-- description --}}
                    <label for="description">Description: @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </label>
                    <input type="text" name="description" placeholder="Input nama description"
                        class="form-control mb-2 {{ isset($errors->messages()['description']) ? 'is-invalid' : '' }}"
                        value="{{ old('description') }}">
                    {{-- description end --}}

                    {{-- price --}}
                    <label for="price">Price: @error('price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </label>
                    <input type="text" name="price" placeholder="Input price"
                        class="form-control {{ isset($errors->messages()['price']) ? 'is-invalid' : '' }}"
                        value="{{ old('price') }}">
                    {{-- price end --}}

                    {{-- images --}}
                    <div class="row text-start">
                        <label for="" class="col-sm-12 col-form-label"> Image
                            Upload: @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </label>
                        <div class="col-sm-12 mb-2">
                            <input class="form-control {{ isset($errors->messages()['image']) ? 'is-invalid' : '' }}"
                                type="file" id="formFile" name="image" accept="image/gif, image/jpeg, image/png">
                        </div>
                    </div>
                    {{-- images END --}}

                    <input type="submit" value="submit" class="btn btn-primary mt-2">
                </form>
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
