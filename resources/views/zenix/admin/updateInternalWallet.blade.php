{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')

<div class="container-fluid">
	<div class="form-head mb-sm-5 mb-3 d-flex flex-wrap align-items-center">
		<h2 class="font-w600 title mb-2 me-auto ">{{__('locale.admin_create_new_internal_wallet_list')}}</h2>
	</div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('locale.admin_create_new_internal_wallet_list')}}</h4>
					@if(session()->has('error'))
					<div class="alert alert-danger"><div class="alert-body">{{ session()->get('error') }}</div></div>
					@endif

					@if(session()->has('success'))
					<div class="alert alert-success"><div class="alert-body">{{ session()->get('success') }}</div></div>
					@endif
                </div>
                <div class="card-body">
					<div class="row no-gutters">
						<form method="post" action="{!! url('/admin/update_wallet_list'); !!}">
							@csrf
							<div class="row">
								<div class="col-xl-6">
									<div class="form-group">
										<label class="mb-1"><strong>Chain Stack Type</strong></label>
										<select id="chain_stack" name="chain_stack">
											<option value="1">Bitcore</option>
											<option value="2">Metamask</option>
										</select>
									</div>
								</div>
								<div class="col-xl-6">
									<div class="form-group">
										<label class="mb-1"><strong>Wallet Type</strong></label>
										<select id="wallet_type" name="wallet_type">
											<option value="0">Undefined</option>
											<option value="1">Treasury Wallet</option>
											<option value="2">Trust Wallet</option>
											<option value="3">Commission Wallet</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6">
									<div class="form-group">
										<label class="mb-1"><strong>Generate Address</strong></label>
										<div class="input-group mb-3">
											<input type="text" class="form-control" id="wallet_address" name="wallet_address">
											<button class="btn btn-primary" type="button" onclick="generateWalletAddress()">Generate</button>
										</div>
									</div>
								</div>
								<div class="col-xl-6">
									<div class="form-group">
										<label class="mb-1"><strong>Private Key</strong></label>
										<input type="text" class="form-control" id="private_key" name="private_key">
									</div>
								</div>
							</div>
							{{-- <div class="row">
								<div class="col-xl-6">
									<div class="form-group">
										<label class="mb-1"><strong>Cold Storage Wallet Address</strong></label>
										<select id="cold_wallet" name="cold_storage_wallet_id">
											@foreach($cold_wallet as $key => $value)
											<option value="{{$value['id']}}">{{$value['cold_address']}}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div> --}}
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
					url : '{!! url('/admin/getNewWalletAddress'); !!}',
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
