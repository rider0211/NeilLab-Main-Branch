{{-- Extends layout --}}
@extends('layout.fullwidth')



{{-- Content --}}
@section('content')
    <div class="col-md-6">
        <div class="authincation-content">
            <div class="row no-gutters">
                <div class="col-xl-12">
                    <div class="auth-form">
    					<div class="text-center mb-3 row">
                            <a href="/">
                                <!-- <img src="{{ asset('images/logo-text.png') }}"  style="width:40%" alt=""> -->
                                <h1>CandyStore VIP</h1>
                            </a>
    					</div>
                        @if(session()->has('error'))
                        <div class="alert alert-danger"><div class="alert-body">{{ session()->get('error') }}</div></div>
                        @endif
                        @if(session()->has('reset_password'))
                        <div class="alert alert-success"><div class="alert-body">{{ session()->get('reset_password') }}</div></div>
                        @endif
                        <h4 class="text-center mb-4">{{__('locale.login_page_title')}}</h4>
                        <form method="post" action="{!! url('/login_user'); !!}">
                            @csrf
                            <div class="form-group">
                                <label class="mb-1"><strong>Email</strong></label>
                                <input type="email" class="form-control" name="email" placeholder="{{__('locale.email_paceholder')}}">
                            </div>
                            <div class="form-group">
                                <label class="mb-1"><strong>Password</strong></label>
                                <input type="password" class="form-control" name="password" placeholder="{{__('locale.password_paceholder')}}" value="">
                            </div>
                            <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                <div class="form-group">
                                   <div class="custom-control custom-checkbox ms-1">
    									<input type="checkbox" class="form-check-input" id="basic_checkbox_1">
    									<label class="form-check-label" for="basic_checkbox_1">Remember my preference</label>
    								</div>
                                </div>
                                <div class="form-group">
                                    <a href="{!! url('/forgot_password'); !!}">Forgot Password?</a>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block">Sign Me In</button>
                            </div>
                        </form>
                        <div class="new-account mt-3">
                            <p>Don't have an account? <a class="text-primary" href="{!! url('/register'); !!}">Sign up</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection  