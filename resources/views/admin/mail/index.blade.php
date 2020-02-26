@extends('layouts.admin')

@section('content')
<div class="card card-custom bg-color">
    <div class="card-header text-nowrap">
        <div class="row">
            <div class="col-sm-6">
                <h2 class="p-2 w-100 bd-highlight text-truncate">All Mails</h2>
            </div>
            <div class="col-sm-6">
                <div class="p-2">
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif
        @if ($message = Session::get('warning'))
            <div class="alert alert-warning" role="alert">
                {{ $message }}
            </div>
        @endif
        <div class="table-responsive" id="user_table">
            <table class="table custom-table text-nowrap text-truncate">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Email</th>
                        <th scope="col" style="max-width: 200px;">Message</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i = 0)
                    @foreach ($mails as $mail)
                        <tr>
                            @php($i++)
                            <th scope="row">{{ $i }}</th>
                            <td class="text-nowrap text-truncate">{{ json_decode($mail->data)->name }}</td>
                            <td class="text-nowrap text-truncate">
                                <a href="{{ route('mail_detail', ['id' => $mail->id]) }}">
                                    {{ json_decode($mail->data)->subject }}
                                </a>
                            </td>
                            <td class="text-nowrap text-truncate">{{ json_decode($mail->data)->email }}</td>
                            <td class="text-nowrap text-truncate" style="max-width: 200px;">{{ json_decode($mail->data)->message }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer text-muted">
    </div>
</div>
@endsection
