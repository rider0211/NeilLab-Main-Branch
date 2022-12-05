{{-- Extends layout --}}
@extends('layout.fullwidth')



{{-- Content --}}
@section('content')
    <div class="col-md-12">
        <div class="authincation-content">
            <div class="row no-gutters">
                <div class="col-xl-12">
                    <div class="auth-form">
						<div class="text-center mb-3">
							<img src="{{ asset('images/logo-full-black.png') }}" alt="">
						</div>
                        @if(session()->has('error'))
                        <div class="alert alert-danger"><div class="alert-body">{{ session()->get('error') }}</div></div>
                        @endif

                        @if(session()->has('success'))
                        <div class="alert alert-success"><div class="alert-body">{{ session()->get('success') }}</div></div>
                        @endif

                        <h4 class="text-center mb-4">{{__('locale.signup_page_title')}}</h4>
                        <form method="POST" action="{!! url('/register_new_user'); !!}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label class="mb-1"><strong>Passport (Front)</strong> <span class="text-danger">*</span></label>
                                        <div class="form-file">
                                            <input type="file" class="form-control" name="firstname" placeholder="{{ __('locale.firstname_paceholder') }}">
                                        </div>
                                        <img src="" alt="Passport front" class="mt-2 img-fluid d-none">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label class="mb-1"><strong>Passport (Back)</strong> <span class="text-danger">*</span></label>
                                        <div class="form-file">
                                            <input type="file" class="form-control" name="lastname" placeholder="{{ __('locale.lastname_paceholder') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label class="mb-1"><strong>Passport (Front)</strong> <span class="text-danger">*</span></label>
                                        <div class="form-file">
                                            <input type="file" class="form-control" name="firstname" placeholder="{{ __('locale.firstname_paceholder') }}">
                                        </div>
                                        <img src="" alt="Passport front" class="mt-2 img-fluid d-none">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label class="mb-1"><strong>Passport (Back)</strong> <span class="text-danger">*</span></label>
                                        <div class="form-file">
                                            <input type="file" class="form-control" name="lastname" placeholder="{{ __('locale.lastname_paceholder') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 