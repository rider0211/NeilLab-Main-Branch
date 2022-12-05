{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex">
                    <h4 class="card-title">{{__('locale.add_new_marketing_campain')}}</h4>
					<a href="{!! url('/admin/marketingcampain'); !!}" class="btn btn-secondary mb-2">Back</a>
                </div>
                <div class="card-body">
					@if ($errors->any())
					<div class="alert alert-danger">
						<div class="alert-body">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					</div>
					@endif

					@if(session()->has('success'))
					<div class="alert alert-success"><div class="alert-body">{{ session()->get('success') }}</div></div>
					@endif
					<div class="row no-gutters">
						<form method="post" action="{!! url('/admin/updateMarketing/'); !!}" enctype="multipart/form-data">
							<button type=submit onclick="return false;" style="display:none;"></button>
							@csrf
							<input type="hidden" name="old_id" value="{{$id?$id:''}}"/>
							<h4 class="my-3">General Settings</h4>
							<div class="row">
								<div class="col-xl-6">
									<div class="form-group">
										<label class="mb-1"><strong>Campain Name</strong></label>
										<input type="text" class="form-control" name="campain_name" value="{{isset($data->campain_name)?$data->campain_name:old('campain_name')}}">
									</div>
								</div>
								<div class="col-xl-6">
									<div class="form-group">
										<label class="mb-1"><strong>Require KYC</strong></label>
										<select id="kyc_required" name="kyc_required">
											<option value="1">yes</option>
											<option value="2" {{isset($data->kyc_required) && $data->kyc_required==2?'selected':''}}>no</option>
										</select></div>
								</div>
							</div>
							<h4 class="my-3">Fee Settings</h4>
							<div class="row">
								<div class="col-xl-6">
									<div class="form-group">
										<label class="mb-1"><strong>Total Fee To Client</strong></label>
										<input type="number" step="any" class="form-control" name="total_fee" id="total_fee" value="{{isset($data->internal_sales_fee)?$data->internal_sales_fee+$data->uni_level_fee+$data->external_sales_fee+$data->trust_fee+$data->profit_fee:old('total_fee')}}" readonly>
									</div>
								</div>
								<div class="col-xl-6">
									<div class="form-group">
										<label class="mb-1"><strong>Internal Sales Manager Fee</strong></label>
										<input type="number" step="any" min="0" max="100" class="form-control" name="internal_sales_fee" id="internal_sales_fee"  value="{{isset($data->internal_sales_fee)?$data->internal_sales_fee:old('internal_sales_fee')}}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6">
									<div class="form-group">
										<label class="mb-1"><strong>Uni-Level Fee</strong></label>
										<input type="number" step="any" min="0" max="100" class="form-control" name="uni_level_fee" id="uni_level_fee"  value="{{isset($data->uni_level_fee)?$data->uni_level_fee:old('uni_level_fee')}}">
									</div>
								</div>
								<div class="col-xl-6">
									<div class="form-group">
										<label class="mb-1"><strong>External Sales Manager</strong></label>
										<input type="number" step="any" min="0" max="100" class="form-control" name="external_sales_fee" id="external_sales_fee"  value="{{isset($data->external_sales_fee)?$data->external_sales_fee:old('external_sales_fee')}}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6">
									<div class="form-group">
										<label class="mb-1"><strong>Trust Fee</strong></label>
										<input type="number" step="any" min="0" max="100" class="form-control" name="trust_fee" id="trust_fee"  value="{{isset($data->trust_fee)?$data->trust_fee:old('trust_fee')}}">
									</div>
								</div>
								<div class="col-xl-6">
									<div class="form-group">
										<label class="mb-1"><strong>Profit Fee</strong></label>
										<input type="number" step="any" min="0" max="100" class="form-control" name="profit_fee" id="profit_fee" value="{{isset($data->profit_fee)?$data->profit_fee:old('profit_fee')}}">
									</div>
								</div>
							</div>
							<h4 class="my-3">Sign Up Page Settings</h4>
							<div class="row">
								<div class="col-xl-6">
									<div class="form-group">
										<label class="mb-1"><strong>Trainee Video</strong> (*.mp4)</label>
										@if (isset($data->logo_image))
											<a href="javascript:" id="trainee-video-link" class="text-danger">{{$data->trainee_video}}</a>
										@endif
										<div class="form-file">
											<input type="file" name="trainee_video" id="trainee_video" class="form-control" >
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group">
									<label class="mb-1"><strong>Terms and Conditions</strong></label>
									<textarea class='form-control' name='terms' rows="5" style="height: auto">{!! isset($data->terms)?$data->terms:old('terms') !!}</textarea>
								</div>
							</div>
							<h4 class="my-3">Landing Page Settings</h4>
							<div class="row">
								<div class="col-xl-6">
									<div class="form-group">
										<label class="mb-1"><strong>Logo Image</strong>
										@if (isset($data->logo_image))
											<a href="javascript:" id="logo-img-link" class="text-danger">{{$data->logo_image}}</a>
										@endif
										</label>
										<div class="form-file">
											<input type="file" name="logo_image" class="form-control" >
										</div>
									</div>
								</div>
								<div class="col-xl-6">
									<div class="form-group">
										<label class="mb-1"><strong>Website Title</strong></label>
										<input type="text" class="form-control" name="website_name"  value="{{isset($data->website_name)?$data->website_name:old('website_name')}}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6">
									<div class="form-group">
										<label class="mb-1"><strong>Banner Title</strong></label>
										<input type="text" class="form-control" name="banner_title"  value="{{isset($data->banner_title)?$data->banner_title:old('banner_title')}}">
									</div>
								</div>
								<div class="col-xl-6">
									<div class="form-group">
										<label class="mb-1"><strong>Banner Content</strong></label>
										<input type="text" class="form-control" name="banner_content"  value="{{isset($data->banner_content)?$data->banner_content:old('banner_content')}}">
									</div>
								</div>
							</div>
							<input type="submit" class="btn btn-secondary mb-2" value="Save"></input>
						</form>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Preview</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal">
				</button>
			</div>
			<div class="modal-body"></div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

@endsection

{{-- Scripts --}}
@section('scripts')
	<script>
		jQuery(document).ready(function(){
			dezSettingsOptions.version = '<?php echo $theme_mode?>';
			setTimeout(function() {
				dezSettingsOptions.version = '<?php echo $theme_mode?>';
				new dezSettings(dezSettingsOptions);
			}, 1500)

            $('#trainee_video').change(function(event) {
                var _size = this.files[0].size;
                if(_size > 4096000){
                    alertError("You can upload video less than 20 M");
                    $("#trainee_video").val(null);
                }
            });

            function alertError(msg){
                toastr.error(msg, "Error", {
                        positionClass: "toast-top-right",
                        timeOut: 5e3,
                        closeButton: !0,
                        debug: !1,
                        newestOnTop: !0,
                        progressBar: !0,
                        preventDuplicates: !0,
                        onclick: null,
                        showDuration: "300",
                        hideDuration: "2000",
                        extendedTimeOut: "2000",
                        showEasing: "swing",
                        hideEasing: "linear",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                        tapToDismiss: !1
                    })
            }
			$("#logo-img-link").click(function(e){
				$(".modal-body").html('<img class="img-fluid" src="/storage/logo_images/'+e.target.innerText+'" >');
				$(".bd-example-modal-lg").modal('show');
			})
			$("#trainee-video-link").click(function(e){
				$(".modal-body").html('<video controls autoplay style="width: 100%; height: auto;"><source src="/storage/trainee_videos/'+e.target.innerText+'" type="video/mp4"></video>');
				$(".bd-example-modal-lg").modal('show');
			})

			$("input[type=number]").change(function(e){
				var sum = parseFloat($("#internal_sales_fee").val()==""?0:$("#internal_sales_fee").val())
				 + parseFloat($("#uni_level_fee").val()==""?0:$("#uni_level_fee").val())
				 + parseFloat($("#external_sales_fee").val()==""?0:$("#external_sales_fee").val())
				 + parseFloat($("#trust_fee").val()==""?0:$("#trust_fee").val())
				 + parseFloat($("#profit_fee").val()==""?0:$("#profit_fee").val());
				var total_fee = Math.round(sum * 100000000) / 100000000;
				$("#total_fee").val(total_fee);
			})
		});

	</script>
@endsection
