{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
	<div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('locale.sell_wizard')}}</h4>
                    </div>
                    <div class="card-body">
						<input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->id}}"/>
						<div id="smartwizard" class="form-wizard order-create">
							<ul class="nav nav-wizard">
								<li><a class="nav-link" href="#wizard_Service">
									<span>1</span>
								</a></li>
								<li><a class="nav-link" href="#wizard_Time">
									<span>2</span>
								</a></li>
								<li><a class="nav-link" href="#wizard_Details">
									<span>3</span>
								</a></li>
							</ul>
							<div class="tab-content">
								<div id="wizard_Service" class="tab-pane" role="tabpanel">
									<div class="row">
										<div class="col-lg-6 mb-2">
											<div class="form-group">
												<label class="mb-1"><strong>Select Degital Asset</strong></label>
												<select id="digital_asset" name="digital_asset" onchange="handleChange(this)">
													<option value="1">BTC</option>
													<!-- <option value="2">USDT</option> -->
												</select>
											</div>
										</div>
										<div class="col-lg-6 mb-2">
											<div class="form-group">
												<label class="mb-1"><strong>Chain Stack</strong></label>
												<select id="chain_stack" name="chain_stack">
													<option value="1">BTC</option>
												</select>
											</div>
										</div>
										<div class="col-lg-6 mb-2">
											<div class="form-group">
												<label class="text-label">How many Bitcoins (BTC) do you want to Sell?</label>
												<input type="number" name="sell_amount" id="sell_amount" class="form-control" min="0" step="any" required>
											</div>
										</div>
										<div class="col-lg-6 mb-2">
											<div class="form-group">
												<label class="text-label">Paste the USDT (ERC20) Wallet Address where your coins should be delivered to.</label>
												<input type="text" class="form-control" id="deliveredAddress" name="deliveredAddress" required>
											</div>
										</div>
									</div>
								</div>
								<div id="wizard_Time" class="tab-pane" role="tabpanel">
									<div class="row">
										<div class="col-lg-6 mb-2">
											<div class="form-group">
												<label class="mb-1"><strong>How do you want to recieve payment?</strong></label>
												<select id="pay_method" name="pay_method" onchange="handleChangeStatus(this)">
													<option value="1" selected>USDT/Ethereum Chain Stack</option>
													<option value="2">Bank Account</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6 mb-2">
											<div class="form-group">
												<label class="text-label">Copy this BTC address and send your coins here.</label>
												<input type="text" class="form-control" id="receive_address" name="receive_address" value="{{$bitcoin_wallet}}" disabled>
											</div>
										</div>
										<div class="col-lg-6 mb-2">
											<div class="form-group">
												<label class="text-label">Paste the Address that you sent your BTC from (for verification purposes)</label>
												<input type="text" class="form-control" id="senderAddress" name="senderAddress" required>
											</div>
										</div>
									</div>
								</div>
								<div id="wizard_Details" class="tab-pane" role="tabpanel">
									<div class="row">
										<div class="col-lg-6 mb-2">
											<div class="form-group" id="pay_step" name="pay_step">
												<label class='text-label'>Reconfirm the number of Bitcoin (BTC) you want to sell.</label>
												<input type='number' name='pay_with' id='pay_with' class='form-control' min='0' step='any' required>
											</div>
										</div>
										<div class="col-lg-6 mb-2">
											<div class="form-group">
												<label class="text-label">Paste the Transaction ID / Transaction Hash.</label>
												<input type="text" class="form-control" id="tx_id" name="tx_id" required>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
	jQuery(document).ready(function(){
		dezSettingsOptions.version = '<?php echo $theme_mode?>';
		setTimeout(function() {
			dezSettingsOptions.version = '<?php echo $theme_mode?>';
			new dezSettings(dezSettingsOptions);
		}, 1500)
	});
</script>
<script src="https://cdn.jsdelivr.net/npm/btcl-bcoin@1.0.0-beta.14b/lib/bcoin.js" integrity="sha256-X6zYD1A5XVau2MsOXN691kJVy2279xV2AuyNb0UXOAI=" crossorigin="anonymous"></script>
<script>

	function alertConfirmRegister(){
		var deliveredAddress 	= $('#deliveredAddress').val();
		var pay_with		 	= $('#pay_with').val();
		Swal.fire({
		html: 'Please Confirm Your Request! \n You will get USDT of <strong style="color:#eb8153">'+pay_with+'</strong> BTC to this address. \n <strong style="color:#eb8153">'+deliveredAddress+'</strong>',
		confirmButtonText: 'OK',
		type:'info',
		showCancelButton: true,
		}).then((result) => {
		if (result.value) {
			handleSubmit();
		} else if (result.dismiss) {
		}
		})
	}
	function handleSubmit(){
		var user_id 			= $('#user_id').val();
		var digital_asset 		= $('#digital_asset').val();
		var chain_stack 		= $('#chain_stack').val();
		var sell_amount 		= $('#sell_amount').val();
		var deliveredAddress 	= $('#deliveredAddress').val();
		var pay_method 			= $('#pay_method').val();
		var receive_address 	= $('#receive_address').val();
		var senderAddress 		= $('#senderAddress').val();
		var buy_amount 			= $('#buy_amount').val();
		var pay_with		 	= $('#pay_with').val();
		var tx_id 				= $('#tx_id').val();

		$.ajax({
				type: "post",
				url : '{!! url('/sell_crypto'); !!}',
				data: {
					"_token": "{{ csrf_token() }}",
					"user_id": user_id,
					"digital_asset" : digital_asset,
					"chain_stack" : chain_stack,
					"sell_amount" : sell_amount,
					"delivered_address" : deliveredAddress,
					"pay_method" : pay_method,
					"receive_address" : receive_address,
					"sender_address" : senderAddress,
					"tx_id" : tx_id,
					"pay_with" : pay_with,
				},
				success: function(data){
					if(data.success){
						alertRegisteredSuccess();
                        setTimeout(() => {
                            window.location.replace('{!! url('/sell_wizard'); !!}');
                        }, 3000);
					}else{
						alertError(data.msg);
					}
				},
			});

	}

	function handleChangeStatus(val){
		if(val.value == 1){
			$('#pay_step').html("<label class='text-label'>Pay With Crypto</label>"+
				"<input type='number' name='pay_amount' id='pay_amount' class='form-control' min='0' step='any' required>");
		}else{
			$('#pay_step').html("<label class='text-label'>Bank Pay</label>");
		}
	}

	function handleChange(val){
		if(val.value == 2){
			$('#chain_stack').html(
				"@foreach ($chainstacks as $key => $value)"+
					"<option value='{{$value['id']}}'>{{$value['stackname']}}</option>"+
				"@endforeach"
			);
		}else{
			$('#chain_stack').html(
				"<option value='1'>BTC</option>"
			);
		}
	}

	function alertRegisteredSuccess(){
		swal({
            title: "Your order registered successfully",
            text: "You will get USDT in 1 day. \n Please check status in sell report page!",
            type: "success",
            timer: 10000
        })
	}

	function alertError(val){
		swal({
            title: "error",
            html: val,
            type: "error",
            timer: 10000
        })
	}
</script>
@endsection
