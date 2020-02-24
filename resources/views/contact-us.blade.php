@extends('layouts.app')

@section('content')
  <section class="sect">
    <div class="row">
      <div class="col-md">
        <h2 class="font-weight-bolder">Contact Us</h2>
        <form action="" method="post">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>
          <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" class="form-control" id="subject" name="subject">
          </div>
          <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" id="message" class="form-control" cols="5" rows="3"></textarea>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="col-md">
        <h2 class="font-weight-bolder">Shop address:</h2>
        <p></p>
      </div>
    </div>
  </section>
@endsection
