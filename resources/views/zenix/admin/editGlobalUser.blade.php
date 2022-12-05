{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('locale.add_global_user_list')}}</h4>
					@if(session()->has('error'))
					<div class="alert alert-danger"><div class="alert-body">{{ session()->get('error') }}</div></div>
					@endif

					@if(session()->has('success'))
					<div class="alert alert-success"><div class="alert-body">{{ session()->get('success') }}</div></div>
					@endif
                </div>
                <div class="card-body">
					<div class="row no-gutters">
						<form method="post" action="{!! url('/admin/updateGlobalUserList'); !!}">
							@csrf
							<div class="row">
								<div class="col-xl-6">
									<div class="form-group">
										<label class="mb-1"><strong>Select User Type</strong></label>
										<select id="user_type" name="user_type">
											<option value="1">Human</option>
											<option value="2">Robot</option>
										</select>
									</div>
								</div>
								<div class="col-xl-6">
									<div class="form-group">
										<label class="mb-1"><strong>Email</strong></label>
										<input type="text" class="form-control" id="email" name="email"  value="{{isset($result)?$result[0]['email']:''}}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6">
									<div class="form-group">
										<label class="mb-1"><strong>Set buy weight</strong></label>
										<input type="number" class="form-control" id="buy_weight" name="buy_weight"  value="{{isset($result)?$result[0]['buy_weight']:''}}">
									</div>
								</div>
								<div class="col-xl-6">
									<div class="form-group">
										<label class="mb-1"><strong>Set buy amount</strong></label>
										<input type="number" class="form-control" id="amount_allow_to_buy" name="amount_allow_to_buy"  value="{{isset($result)?$result[0]['amount_allow_to_buy']:''}}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6">
									<div class="form-group">
										<label class="mb-1"><strong>Set sell weight</strong></label>
										<input type="number" class="form-control" id="sell_weight" name="sell_weight"  value="{{isset($result)?$result[0]['sell_weight']:''}}">
									</div>
								</div>
								<div class="col-xl-6">
									<div class="form-group">
										<label class="mb-1"><strong>Set sell amount</strong></label>
										<input type="number" class="form-control" id="amount_allow_to_sell" name="amount_allow_to_sell"  value="{{isset($result)?$result[0]['amount_allow_to_sell']:''}}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6">
									<div class="form-group">
										<label class="mb-1"><strong>Status</strong></label>
										<select id="status" name="status">
											<option value="1">active</option>
											<option value="2">not active</option>
										</select>
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
		});

		function generateWalletAddress(){
			var chain_stack = $('#chain_stack').find(':selected').val();
			var login = $('#login').val();
			var password = $('#password').val();
			var ipaddress = $('#ipaddress').val();
			$.ajax({
					type: "post",
					url : '{!! url('/admin/marketingcampain'); !!}',
					data: {
						"_token": "{{ csrf_token() }}",
						"chain_stack": chain_stack,
						"login" : login,
						"password" : password,
						"ipaddress" : ipaddress
					},
					success: function(data){
						if(data.success){
							$('#wallet_address').val(data.address);
							if(chain_stack == 2){
								$('#private_key').val(data.private_key);
							}
						}else{
							swal({
								title: "Error",
								text: data.message,
								timer: 2e3,
								showConfirmButton: !1
							})
						}
					},
				});
				$('#changePasswordModal').modal('show')
			}
	</script>
@endsection	