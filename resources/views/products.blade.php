@extends('layouts.app')

@section('content')
  <section class="sect">
    <div class="row">
      <div class="col-md-3">
        <div class="card">
          <div class="card-header">
            <h2 class="font-weight-bold text-truncate m-0">Categories</h2>
          </div>
          <div class="card-body">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="#">All</a>
              </li>
              @foreach ($categories as $cate)
                <li class="nav-item">
                  <a class="nav-link active" href="#">{{ ucfirst($cate->name) }}</a>
                </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <div class="row">
          @foreach ($products as $product)
            <div class="col-md-4">
              <div class="card">
                <img src="{{ asset($product->thumbnail) }}" class="card-img-top" alt="{{ $product->name }}">
                <div class="card-body">
                  <a href="{{ route('product_details', ['id' => $product->id]) }}" class="card-title" data-toggle="tooltip" data-placement="bottom" title="{{ ucfirst($product->name) }}">
                    <h5 class="text-truncate">{{ ucfirst($product->name) }}</h5>
                  </a>
                  <p class="card-text text-truncate">$ {{ $product->price }}</p>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>
@endsection
