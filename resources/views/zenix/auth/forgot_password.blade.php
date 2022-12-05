{{-- Extends layout --}}
@extends('layout.fullwidth')

{{-- Content --}}
@section('content')
    <div class="col-md-6">
        <div class="authincation-content">
            <div class="row no-gutters">
                <div class="col-xl-12">
                    <div class="auth-form">
						<div class="text-center mb-3">
							<img src="images/logo-full.png" alt="">
						</div>
                        <h4 class="text-center mb-4">Forgot Password</h4>
                        <form method="post" action="{!! url('/forget-password'); !!}">
                            @csrf
                            <div class="form-group">
                                <label><strong>Email</strong></label>
                                <input type="email" name="email" class="form-control" placeholder="please input your email">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block">SUBMIT</button>
                            </div>
                            <div class="form-row d-flex justify-content-end mt-4 mb-2">
                                <div class="form-group">
                                    <a href="{!! url('/login'); !!}">Return Login</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection   