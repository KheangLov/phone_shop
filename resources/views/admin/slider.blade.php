@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-4 mt-5">
        <div class="card card-custom bg-color">
            <div class="card-header text-nowrap">
                <h2 class="p-2 w-100 bd-highlight text-truncate">{{ isset($edit) && $edit ? 'Edit' : 'Add' }} Slider</h2>
            </div>
            <div class="card-body">
                @if ($message = Session::get('message'))
                    <div class="alert alert-success" role="alert">
                        {{ $message }}
                    </div>
                @endif
                @if ($edit = true && isset($slider))
                    <form method="POST" action="{{ route('slider_update', ['id' => $slider->id ?? 0]) }}" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="profile-upload text-center mb-4">
                            <div class="profile-overlay">
                                <div class="profile-pic" id="profile_bg_image" style="background-image: url('{{ asset(!empty($slider->path) ? $slider->path : 'images/no-image.png') }}');"></div>
                                <button type="button" class="btn btn-primary btn-profile-upload" id="btn_profile_edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32px" height="32px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user w-4 h-4">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                </button>
                                <input type="file" name="path" id="profile_edit" class="d-none" value="{{ $slider->path }}">
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control" name="name" required value="{{ $slider->name ?? '' }}">
                        </div> --}}
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary btn-reg">
                                {{ __('Update') }}
                            </button>
                            <a href="{{ route('slider') }}" class="btn btn-reg" style="background-color: #ff2211; color: #fff; border-color: #ff2211">
                                {{ __('Cancel') }}
                            </a>
                        </div>
                    </form>
                @else
                    <form method="POST" action="{{ route('slider_create') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="profile-upload text-center mb-4">
                            <div class="profile-overlay">
                                <div class="profile-pic" id="profile_bg_image" style="background-image: url('{{ asset('images/no-image.png') }}');"></div>
                                <button type="button" class="btn btn-primary btn-profile-upload" id="btn_profile_edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32px" height="32px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user w-4 h-4">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                </button>
                                <input type="file" name="path" id="profile_edit" class="d-none">
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control" name="name" required>
                        </div> --}}
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary btn-reg">
                                {{ __('Upload') }}
                            </button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-8 mt-5">
        <div class="card card-custom bg-color">
            <div class="card-header text-nowrap">
                <div class="row">
                    <div class="col-sm-6">
                        <h2 class="p-2 w-100 bd-highlight text-truncate">Slider</h2>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if ($message = Session::get('delete_success'))
                    <div class="alert alert-success" role="alert">
                        {{ $message }}
                    </div>
                @endif
                @if ($message = Session::get('warning'))
                    <div class="alert alert-warning" role="alert">
                        {{ $message }}
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table custom-table text-nowrap text-truncate">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php ($i = 0)
                            @foreach ($sliders as $slider)
                                <tr>
                                    @php($i++)
                                    <th>{{ $i }}</th>
                                    <td>
                                        <img src="{{ asset($slider->path) }}" alt="{{ $slider->path }}" class="img-fluid" style="width: 35px; height: 35px; border-radius: 25%; border: 2px solid #fff;">
                                    </td>
                                    <td>{{ $slider->name }}</td>
                                    <td>
                                        @if (strtolower($slider->name) !== '')
                                            <a href="{{ route('slider', ['id' => $slider->id]) }}" class="btn-action btn-edit" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3 h-5 w-5 mr-4 hover:text-primary cursor-pointer">
                                                    <path d="M12 20h9"></path>
                                                    <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                                </svg>
                                            </a>
                                            <button type="button" class="btn-action btn-del p-0" data-toggle="modal" data-target="#btn_delete_cate_{{ $slider->id }}" data-placement="bottom" title="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 h-5 w-5 hover:text-danger cursor-pointer">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                                </svg>
                                            </button>
                                            <div class="modal fade custom-modal" id="btn_delete_cate_{{ $slider->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalCenterTitle">Confirm dialog</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete this category?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary btn-cancel" data-dismiss="modal">{{ __('Cancel') }}</button>
                                                            <a href="{{ route('slider_delete', ['id' => $slider->id]) }}" class="btn btn-primary btn-reg">
                                                                Yes
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer text-muted">
            </div>
        </div>
    </div>
</div>
@endsection
