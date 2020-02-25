@extends('layouts.admin')

@section('content')
<div class="card card-custom bg-color">
    <div class="card-header text-nowrap">
        <h2 class="p-2 w-100 text-truncate"><strong>Subject: </strong>{{ json_decode($mail->data)->subject }}</h2>
        <h6 class="p-2 w-100 text-truncate"><strong>Email: </strong>{{ json_decode($mail->data)->email }}</h6>
        <span class="p-2 w-100 text-truncate"><strong>Name: </strong>{{ json_decode($mail->data)->name }}</span>
    </div>
    <div class="card-body text-nowrap card-xs-text-center">
        <h4>Message:</h4>
        <p>
            {{ json_decode($mail->data)->message }}
        </p>
    </div>
</div>
@endsection
