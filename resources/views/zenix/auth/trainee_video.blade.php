{{-- Extends layout --}}
@extends('layout.fullwidth')



{{-- Content --}}
@section('content')
    <div class="col-md-12">
        <div class="authincation-content">
            <div class="row no-gutters">
                <div class="col-xl-12">
                    <div class="auth-form">
                        @if(session()->has('error'))
                        <div class="alert alert-danger"><div class="alert-body">{{ session()->get('error') }}</div></div>
                        @endif

                        @if(session()->has('success'))
                        <div class="alert alert-success"><div class="alert-body">{{ session()->get('success') }}</div></div>
                        @endif

                        <h4 class="text-center mb-4">Trainee Video</h4>
                        <form method="POST" action="{!! url('/trainee_video'); !!}">
                            @csrf
                            <div class="row">
                                <div class="col-xs-12">
                                    <video controls autoplay style="width: 100%; height: auto;">
                                        <source src="/storage/trainee_videos/{{$video}}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox ms-1 mt-2">
                                            <input type="checkbox" class="form-check-input" id="agree-check">
                                            <label class="form-check-label" for="agree-check">I understood this video</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary btn-block" id="submit-btn" disabled="disabled">Go to Dashboard</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 

@section('scripts')
	<script>
		$(document).ready(function(){
            $('#agree-check').on('change', function(){
                if($('#agree-check').prop('checked')) 
                    $("#submit-btn").prop('disabled', false)
                else $("#submit-btn").prop('disabled', true)
            })
		});
	</script>
@endsection	