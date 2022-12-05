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

                        <h4 class="text-center mb-4">Terms and Conditions</h4>
                        <form method="POST" action="{!! url('/agreement'); !!}">
                            @csrf
                            <div class="row">
                                <div class="col-xs-12">
                                    <textarea class="form-control" readonly  rows="10" style="height: auto">{{$terms}}</textarea>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox ms-1 mt-2">
                                            <input type="checkbox" class="form-check-input" id="agree-check">
                                            <label class="form-check-label" for="agree-check">I agree to terms and conditions</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary btn-block" id="submit-btn" disabled="disabled">Submit</button>
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