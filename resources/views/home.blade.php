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
  <section class="sect text-center">
    <h1 class="font-weight-bolder mb-3">Our Goal</h1>
    <p>
      Welcome to PLAN-B Cambodia where creativity is provided with big surprise 「!」and love「❤」. We understand that technology could make a big difference for your entire business operation. That is why we want to be everyday solution to help your business run successfully. Our team works on every task ranging from small to big projects by carrying with core concepts and values.
      Started in 2007, we are No. 1 SEO company in Japan. Still we are committed to become a leading digital marketing company in Cambodia.
    </p>
  </section>
  <section class="sect text-center">
    <h1 class="font-weight-bolder mb-3">Our Mission</h1>
    <p>
      Welcome to PLAN-B Cambodia where creativity is provided with big surprise 「!」and love「❤」. We understand that technology could make a big difference for your entire business operation. That is why we want to be everyday solution to help your business run successfully. Our team works on every task ranging from small to big projects by carrying with core concepts and values.
      Started in 2007, we are No. 1 SEO company in Japan. Still we are committed to become a leading digital marketing company in Cambodia.
    </p>
  </section>
  <section class="sect text-center">
    <h1 class="font-weight-bolder mb-3">Our Services</h1>
    <div class="row">
      <div class="col-md">
        <div class="card">
          <div class="card-header">Service 1</div>
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
      <div class="col-md">
        <div class="card">
          <div class="card-header">Service 2</div>
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
      <div class="col-md">
        <div class="card">
          <div class="card-header">Service 3</div>
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
