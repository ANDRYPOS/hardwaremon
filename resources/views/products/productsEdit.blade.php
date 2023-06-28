@extends('layout.admin')

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item">System setup</li>
            <li class="breadcrumb-item"><a href="{{ url('products-setting') }}">Products</a></li>
            <li class="breadcrumb-item active">Edit products</li>
        </ol>
    </nav>
    <div class="row">
        <div class="card col mb-5">
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
                        <div class="row col-12">
                            {{-- image --}}
                            <div class="col col-12">
                                <div class="img-fluid my-2 text-center">
                                    <img src="{{ asset('storage/products_img/') }}/{{ $dataProducts->image }}"
                                        alt="{{ $dataProducts->name }}" title="{{ $dataProducts->name }}" width="90"
                                        height="90" class="rounded mb-2 m-auto">
                                </div>
                            </div>
                            {{-- image end --}}

                            {{-- categories --}}
                            <div class="col col-12">
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
                            </div>
                            {{-- categories end --}}

                            {{-- image --}}
                            <div class="col col-8">
                                <div class="row text-start">
                                    <label for="inputNumber" class="col-sm-12"> Image
                                        Upload: @error('image')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="file" id="formFile" name="image"
                                            accept="image/gif, image/jpeg, image/png"
                                            oninput="previewprd.src=window.URL.createObjectURL(this.files[0])">
                                    </div>
                                </div>
                            </div>
                            <div class="col col-4">
                                <img src="http://placehold.it/100" alt="Products" class="rounded m-auto img-fluid"
                                    style="width:100px; height:100px" id="previewprd">
                            </div>
                            {{-- image end --}}

                            {{-- name --}}
                            <div class="col col-8">
                                <label for="name">Nama products: @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </label>
                                <input type="text" name="name" placeholder="Product Name"
                                    value="{{ $dataProducts->name }}" class="form-control mb-2" pattern="^[a-zA-Z0-9_.-]*$"
                                    minlength="3">
                            </div>
                            {{-- name end --}}

                            {{-- prce --}}
                            <div class="col col-4">
                                <label for="price">Price: @error('price')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </label>
                                <input type="text" name="price" placeholder="Price" class="form-control mb-2"
                                    value="{{ $dataProducts->price }}">
                            </div>
                            {{-- prce end --}}

                            {{-- description --}}
                            <div class="col col-8">
                                <label for="description">Description: @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </label>
                                <input type="text" name="description" placeholder="Description" class="form-control mb-2"
                                    value="{{ $dataProducts->description }}">
                            </div>
                            {{-- description end --}}

                            {{-- status --}}
                            <div class="col col-4">
                                <label for="status">Status:</label>
                                <input type="text" name="status" placeholder="Price" class="form-control mb-2"
                                    style="cursor: not-allowed" value="{{ $dataProducts->status->name }}" disabled>
                            </div>
                            {{-- status end --}}

                            <div class="col col-4">
                                <input type="submit" value="submit" class="btn btn-primary mt-2">
                                <a href="{{ url('products-setting') }}" class="btn btn-danger mt-2">Cancel</a>
                            </div>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
    </div>
@endsection
