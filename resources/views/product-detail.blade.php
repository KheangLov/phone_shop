@extends('layouts.app')

@section('content')
  <section class="sect">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-4">
              <img src="{{ asset($product->thumbnail) }}" class="img-fluid" alt="{{ $product->name }}">
            </div>
            <div class="col-md-8">
              <h2 class="font-weight-bold text-truncate border-bottom">{{ ucfirst($product->name) }}</h2>
              @if ($product->discount)
                @php($new_price = $product->price - ($product->price * $product->discount) / 100)
                <h4 class="text-dark text-truncate mt-4" style="text-decoration: line-through;">${{ $product->price }}</h4>
                <h2 class="text-warning text-truncate mb-4">${{ $new_price }}</h2>
              @else
                <h2 class="text-warning text-truncate mt-4 mb-4">${{ $product->price }}</h2>
              @endif
              <h4 class="text-truncate">Description:</h4>
              <p>
                {{ $product->description }}
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-header">
              <h2 class="font-weight-bold text-truncate m-0">Suggestion</h2>
            </div>
            <div class="card-body">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="nav-link active" href="#">All</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
