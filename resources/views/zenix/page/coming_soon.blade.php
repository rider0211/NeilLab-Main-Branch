{{-- Extends layout --}}
@extends('layout.fullwidth')

{{-- Content --}}
@section('content')
    <div class="col-md-5">
        <div class="form-input-content text-center error-page">
            <h4>Coming Soon!!!</h4>
			<div class="py-5 my-3">
                @if (Auth::user()->user_type == 'admin')
                    <a class="btn btn-primary" href="{!! url('/admin/userlist'); !!}">Back to Home</a>
                @elseif (Auth::user()->user_type == 'client')
                    <a class="btn btn-primary" href="{!! url('/invite_friends'); !!}">Back to Home</a>
                @endif
            </div>
        </div>
    </div>
@endsection
