@extends('layouts.app')

@section('content')
  <section class="sect bg-light-gray" id="sect">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="card bg-dark text-white mb-4">
            <div class="card-header">
              <h2 class="font-weight-bold text-truncate m-0">Categories</h2>
            </div>
            <div class="card-body">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="nav-link category_link text-white" href="#sect" data-id="0">All</a>
                </li>
                @foreach ($categories as $cate)
                  <li class="nav-item">
                    <a class="nav-link category_link text-white" href="#sect" data-id="{{ $cate->id }}">{{ ucfirst($cate->name) }}</a>
                  </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-9" id="product_wrap">
          <div class="row">
            @foreach ($products as $product)
              <div class="col-md-4 mb-4">
                <div class="card">
                  <img src="{{ asset($product->thumbnail) }}" class="card-img-top" alt="{{ $product->name }}">
                  <div class="card-body">
                    <a href="{{ route('product_details', ['id' => $product->id]) }}" class="card-title text-decoration-none product_name_link" data-toggle="tooltip" data-placement="bottom" title="{{ ucfirst($product->name) }}">
                      <h5 class="text-truncate product_name">{{ ucfirst($product->name) }}</h5>
                    </a>
                    @if ($product->discount)
                    @php($new_price = $product->price - ($product->price * $product->discount) / 100)
                        <p class="card-text text-dark text-truncate d-inline" style="text-decoration: line-through;">${{ $product->price }}</p>
                        <p class="card-text text-warning text-truncate d-inline">${{ $new_price }}</p>
                    @else
                        <p class="card-text text-warning text-truncate mt-4 mb-4">${{ $product->price }}</p>
                    @endif
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
