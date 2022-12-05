{{-- Extends layout --}}
@extends('layout.fullwidth')

{{-- Content --}}
@section('content')
    <div class="col-md-8">
        <div class="form-input-content text-center error-page">
            <h4>Please wait...</h4>
            <p>Your account opening request is in process. Should your application be complete, your account will be activated shortly.</p>
            <div class="py-5 my-3">
                <a class="btn btn-primary" href="{!! url('/'); !!}">Back to Home</a>
            </div>	
        </div>
    </div>
@endsection