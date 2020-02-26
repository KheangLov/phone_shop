@extends('layouts.app')

@section('content')
<section class="sect bg-light-gray" id="sect">
    <div class="container">
        <h2 class="text-truncate mb-4">Result: {{ count($products) }} product{{ count($products) > 1 ? 's' : '' }}</h2>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-3 mb-4">
                    <div class="card card_product">
                        <img src="{{ asset($product->thumbnail) }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <a href="{{ route('product_details', ['id' => $product->id]) }}" class="card-title text-decoration-none product_name_link" data-toggle="tooltip" data-placement="bottom" title="{{ ucfirst($product->name) }}">
                                <h5 class="text-truncate product_name">{{ ucfirst($product->name) }}</h5>
                            </a>
                            @if ($product->discount && $product->discount != 0)
                                @php($new_price = $product->price - ($product->price * $product->discount) / 100)
                                <p class="card-text text-dark text-truncate d-inline" style="text-decoration: line-through;">${{ $product->price }}</p>
                                <p class="card-text text-warning text-truncate d-inline">${{ $new_price }}</p>
                            @else
                                <p class="card-text text-warning text-truncate m-0">${{ $product->price }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
