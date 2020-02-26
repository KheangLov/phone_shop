@extends('layouts.app')

@section('content')
  <section class="sect bg-light-gray">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <h2 class="font-weight-bolder border-bottom">Contact Us</h2>
          @if ($message = Session::get('success'))
            <div class="alert alert-success mb-4 alert-dismissible fade show font-weight-bold" role="alert">
              {{ $message }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
          <form method="POST" action="{{ route('contact_mail_send') }}">
            @csrf
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
              <label for="subject">Subject</label>
              <input type="text" class="form-control" id="subject" name="subject">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
              <label for="message">Message</label>
              <textarea name="message" id="message" class="form-control" cols="5" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-secondary">Send</button>
          </form>
        </div>
        <div class="col-md-4">
          <h2 class="font-weight-bolder">Shop address:</h2>
          <p>
            16F Floor, Diamond TwinTower, the corner of Street Sopheak Mongkul and Street Koh Pich, Sangkat Tonle Bassac, Khan Chamkarmorn, Phnom Penh
          </p>
        </div>
      </div>
    </div>
  </section>
@endsection
