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
    @if (strtolower($page->pageType->name) === 'section')
      <section class="sect text-center{{ $typeNum === 0 ? 'bg-white' : ' bg-light-gray' }}">
        <div class="container">
          <h1 class="font-weight-bolder mb-4 text-capitalize">{{ $page->name }}</h1>
          <p>
            {{ $page->posts[0]->content }}
          </p>
        </div>
      </section>
    @elseif (strtolower($page->pageType->name) === 'grid')
      <section class="sect text-center{{ $typeNum === 0 ? 'bg-white' : ' bg-light-gray' }}">
        <div class="container">
          <h1 class="font-weight-bolder mb-4 text-capitalize">{{ $page->name }}</h1>
          <div class="row">
            @foreach ($page->posts as $post)
              <div class="col-md">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title text-capitalize">{{ $post->title }}</h5>
                    <p class="card-text">
                      {{ $post->content }}
                    </p>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </section>
    @endif
  @endforeach
  {{-- <section class="sect bg-white text-center">
    <div class="container">
      <h1 class="font-weight-bolder mb-4">Our Mission</h1>
      <p>
        Welcome to PLAN-B Cambodia where creativity is provided with big surprise 「!」and love「❤」. We understand that technology could make a big difference for your entire business operation. That is why we want to be everyday solution to help your business run successfully. Our team works on every task ranging from small to big projects by carrying with core concepts and values.
        Started in 2007, we are No. 1 SEO company in Japan. Still we are committed to become a leading digital marketing company in Cambodia.
      </p>
    </div>
  </section> --}}

@endsection
