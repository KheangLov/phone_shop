@extends('layouts.app')

@section('content')
  @if ($message = Session::get('warning'))
    <div class="alert alert-warning mb-4 alert-dismissible fade show font-weight-bold" role="alert">
      <i class="fas fa-exclamation mr-2"></i>
      {{ $message }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
  @php($i = 0)
  @foreach ($pages as $page)
    @php($i++)
    @php($typeNum = $i % 2)
    @if (strtolower($page->pageType->name) === 'section' && count($page->posts) > 0)
      <section class="sect text-center{{ $typeNum === 0 ? ' bg-white' : ' bg-light-gray' }}">
        <div class="container">
          <h1 class="font-weight-bolder mb-4 text-capitalize">{{ $page->name }}</h1>
          @if (!empty($page->posts[0]->title) && strtolower($page->posts[0]->title) !== strtolower($page->name))
            <h4 class="font-weight-bold text-capitalize">{{ $page->posts[0]->title }}</h4>
          @endif
          <p>
            {{ $page->posts[0]->content }}
          </p>
          @if (!empty($page->posts[0]->thumbnail))
            <img src="{{ asset($page->posts[0]->thumbnail) }}" alt="{{ $page->posts[0]->title }}" class="img-fluid">
          @endif
        </div>
      </section>
    @elseif (strtolower($page->pageType->name) === 'grid' && count($page->posts) > 0)
      <section class="sect text-center{{ $typeNum === 0 ? ' bg-white' : ' bg-light-gray' }}">
        <div class="container">
          <h1 class="font-weight-bolder mb-4 text-capitalize">{{ $page->name }}</h1>
          <div class="row">
            @for ($i = 0; $i < 3; $i++)
              <div class="col-md mb-4">
                <div class="card">
                  @if (!empty($page->posts[$i]->thumbnail))
                    <div class="d-block m-auto" style="margin-top: 15px !important;">
                      <div style="width: 95px; height: 72px; background-image: url({{ asset($page->posts[$i]->thumbnail) }}); background-repeat: no-repeat; background-size: cover; background-position: center center;"></div>
                    </div>
                  @endif
                  <div class="card-body">
                    <h5 class="card-title text-capitalize">{{ $page->posts[$i]->title }}</h5>
                    <p class="card-text">
                      {{ $page->posts[$i]->content }}
                    </p>
                  </div>
                </div>
              </div>
            @endfor
          </div>
        </div>
      </section>
    @endif
  @endforeach
@endsection
