@extends('layouts.app')

@section('content')
  <section class="sect">
    <div class="container">
      <div class="row">
        <div class="col-xl-9">
          <div class="row">
            <div class="col-md-5">
              <div class="tab-content" id="pills-tabContent">
                @php($i = 0)
                @foreach ($images as $image)
                  @php($i++)
                  <div class="tab-pane fade{{ $i === 1 ? ' show active': '' }}" id="pills-image-{{ $image->id }}" role="tabpanel" aria-labelledby="pills-image-{{ $image->id }}">
                    <img src="{{ asset($image->path) }}" class="img-fluid" alt="{{ $image->name }}" style="margin-bottom: 0.2rem;">
                  </div>
                @endforeach
              </div>
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                @php($i = 0)
                @foreach ($images as $image)
                  @php($i++)
                  <li class="nav-item product_images_item">
                    <a class="nav-link product_images{{ $i === 1 ? ' active': '' }}" id="pills-image-{{ $image->id }}-tab" data-toggle="pill" href="#pills-image-{{ $image->id }}" role="tab" aria-controls="pills-image-{{ $image->id }}" aria-selected="true">
                      <img src="{{ asset($image->path) }}" class="img-fluid" alt="{{ $image->name }}" style="height: 75px;">
                    </a>
                  </li>
                @endforeach
              </ul>
            </div>
            <div class="col-md-7">
              <h2 class="font-weight-bold text-truncate border-bottom text-warning">{{ ucfirst($product->name) }}</h2>
              @if ($product->discount)
                @php($new_price = $product->price - ($product->price * $product->discount) / 100)
                <h4 class="text-dark text-truncate mt-4" style="text-decoration: line-through;">${{ $product->price }}</h4>
                <h2 class="text-warning text-truncate">${{ $new_price }}</h2>
                <h6 class="text-muted text-truncate mb-4">
                  ${{ ($product->price * $product->discount) / 100 }} Saved ( {{ $product->discount }}% Off )
                </h6>
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
        <div class="col-xl-3">
          <div class="card">
            <div class="card-header">
              <h2 class="font-weight-bold text-truncate m-0">Suggestion</h2>
            </div>
            <div class="card-body">
              <ul class="nav flex-column">
                @foreach ($suggests as $suggest)
                  <li class="nav-item mb-3">
                    <a class="nav-link active p-0" href="{{ route('product_details', ['id' => $suggest->id]) }}" data-toggle="tooltip" data-placement="bottom" title="{{ ucfirst($suggest->name) }}">
                      <div class="media">
                        <img src="{{ asset($suggest->thumbnail) }}" class="mr-3" alt="{{ $suggest->name }}" style="width: 64px; height: 64px;">
                        <div class="media-body">
                          <h5 class="m-0 text-warning font-weight-bold text-truncate text-capitalize suggest_name">{{ $suggest->name }}</h5>
                          <p class="text-truncate m-0 text-dark suggest_desc">
                            {{ $suggest->description }}
                          </p>
                        </div>
                      </div>
                    </a>
                  </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
