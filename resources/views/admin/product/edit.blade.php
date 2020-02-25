@extends('layouts.admin')

@section('content')
<form method="POST" action="{{ route('product_update', ['id' => $product->id]) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="card card-custom bg-color">
        <div class="card-header d-flex bd-highlight">
            <h2 class="p-2 w-100 bd-highlight">Edit Product</h2>
        </div>
        <div class="card-body">
            <div class="profile-upload text-center mb-4">
                <div class="profile-overlay">
                    <div class="profile-pic" id="profile_bg_image" style="background-image: url('{{ asset($product->thumbnail ? $product->thumbnail : 'images/no-image.png') }}');"></div>
                    <button type="button" class="btn btn-primary btn-profile-upload" id="btn_profile_edit" data-toggle="tooltip" data-placement="top" title="Product thumbnail">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32px" height="32px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user w-4 h-4">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </button>
                    <input type="file" name="thumbnail" id="profile_edit" class="d-none" value="{{ $product->thumbnail }}">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="row justify-content-center">
                        <div class="form-group col-md-12">
                            <label for="name">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $product->name }}" required autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="price">{{ __('Price') }}</label>
                            <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $product->price }}" required>

                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="discount">{{ __('Discount') }}</label>
                            <input id="discount" type="number" class="form-control @error('discount') is-invalid @enderror" name="discount" value="{{ $product->discount }}" required>

                            @error('discount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="description">{{ __('Description') }}</label>
                            <textarea name="description" class="form-control" id="description" cols="5" rows="3">{{ $product->description }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row justify-content-center">
                        <div class="form-group col-md-12">
                            <label for="category">{{ __('Category') }}</label>
                            <select id="category" class="form-control" name="category">
                                <option value="0">Select any category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"{{ $product->category_id === $category->id ? ' selected' : '' }}>{{ ucfirst($category->name) }}</option>
                                @endforeach
                            </select>
                            <a class="btn btn-link" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
                                + add categories
                            </a>
                            <div class="collapse multi-collapse" id="multiCollapseExample1">
                                <div class="card card-body" style="background-color: #222;">
                                    <div class="form-group">
                                        <label for="name">{{ __('Name') }}</label>
                                        <input id="cate_name" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">{{ __('Description') }}</label>
                                        <textarea id="cate_description" cols="5" rows="3" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" id="procate_submit" class="btn btn-primary btn-reg">
                                            {{ __('Create') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="form-group col-md-12">
                <button type="submit" class="btn btn-primary btn-reg">
                    {{ __('Update') }}
                </button>
                <a href="{{ route('user_list') }}" class="btn btn-primary btn-cancel">
                    {{ __('Cancel') }}
                </a>
            </div>
        </div>
    </div>
</form>
@endsection
