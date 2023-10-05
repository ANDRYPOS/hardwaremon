@extends('layout.admin')


@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item">System setup</li>
            <li class="breadcrumb-item"><a href="{{ url('products-setting') }}">Products</a></li>
            <li class="breadcrumb-item active">Create products</li>
        </ol>
    </nav>
    <div class="row">
        <div class="card col mb-5">
            <div class="card-tittle m-auto py-2">Create Products</div>
            <div class="border-bottom"></div>
            <div class="card-body my-2">
                <form method="post" enctype="multipart/form-data" action="{{ url('products-create') }}">
                    @csrf
                    <!-- form create products -->
                    <div class="row col-12">
                        {{-- category_id --}}
                        <div class="col col-12">
                            <label>Category: @error('category_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </label>
                            <select
                                class="form-select mb-2 {{ isset($errors->messages()['category_id']) ? 'is-invalid' : '' }}"
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
                        </div>
                        {{-- category_id end --}}

                        {{-- images --}}
                        <div class="col col-8">
                            <div class="row text-start">
                                <label> Image
                                    Upload: @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </label>
                                <div class="col-sm-12">
                                    <input
                                        class="form-control {{ isset($errors->messages()['image']) ? 'is-invalid' : '' }}"
                                        type="file" id="formFile" name="image"
                                        accept="image/gif, image/jpeg, image/png"
                                        oninput="previewprd.src=window.URL.createObjectURL(this.files[0])">
                                </div>
                            </div>
                        </div>
                        <div class="col col-4">
                            <img src="http://placehold.it/100" alt="Products" class="rounded m-auto img-fluid"
                                style="width:100px; height:100px" id="previewprd">
                        </div>
                        {{-- images END --}}

                        {{-- name products --}}
                        <div class="col col-8">
                            <label>Nama products: @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </label>
                            <input type="text" name="name" placeholder="Input nama products"
                                class="form-control mb-2 {{ isset($errors->messages()['name']) ? 'is-invalid' : '' }}"
                                value="{{ old('name') }}">
                        </div>
                        {{-- name products end --}}

                        {{-- qty --}}
                        <div class="col col-2">
                            <label>Stock: @error('qty')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </label>
                            <input type="text" name="qty" placeholder="Input qty"
                                class="form-control {{ isset($errors->messages()['qty']) ? 'is-invalid' : '' }}"
                                value="{{ old('qty') }}">
                        </div>
                        {{-- qty --}}

                        {{-- price --}}
                        <div class="col col-2">
                            <label>Price: @error('price')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </label>
                            <input type="text" name="price" placeholder="Input price"
                                class="form-control {{ isset($errors->messages()['price']) ? 'is-invalid' : '' }}"
                                value="{{ old('price') }}">
                        </div>
                        {{-- price end --}}

                        {{-- description --}}
                        <div class="col col-12">
                            <label>Description: @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </label>
                            <input type="text" name="description" placeholder="Input nama description"
                                class="form-control mb-2 {{ isset($errors->messages()['description']) ? 'is-invalid' : '' }}"
                                value="{{ old('description') }}">
                        </div>
                        {{-- description end --}}

                        <div class="col col-4">
                            <input type="submit" value="submit" class="btn btn-primary">
                            <a href="{{ url('products-setting') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
