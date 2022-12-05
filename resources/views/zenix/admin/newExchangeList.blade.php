{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('locale.admin_create_new_exchange_list')}}</h4>
					@if(session()->has('error'))
					<div class="alert alert-danger"><div class="alert-body">{{ session()->get('error') }}</div></div>
					@endif

					@if(session()->has('success'))
					<div class="alert alert-success"><div class="alert-body">{{ session()->get('success') }}</div></div>
					@endif
                </div>
                <div class="card-body">
					<div class="row no-gutters">
						<form method="post" action="{!! url('/update_exchange_list'); !!}">
							@csrf
							<input type="hidden" name="old_id" value="{{isset($result)?$result[0]['id']:''}}"/>
							<div class="row">
								<div class="col-xl-6">
									<div class="form-group">
										<label class="mb-1"><strong>Exchange Name</strong></label>
										<select id="ex_name" name="ex_name">
											<?php echo (!empty($result[0]['ex_name']) && $result[0]['ex_name'] == "Binance")? "<option value='Binance' selected>Binance</option>":"<option value='Binance'>Binance</option>" ?>
											<?php echo (!empty($result[0]['ex_name']) && $result[0]['ex_name'] == "FTX")? "<option value='FTX' selected>FTX</option>":"<option value='FTX'>FTX</option>" ?>
											<?php echo (!empty($result[0]['ex_name']) && $result[0]['ex_name'] == "kucoin")? "<option value='kucoin' selected>KuCoin</option>":"<option value='kucoin'>KuCoin</option>" ?>
											<?php echo (!empty($result[0]['ex_name']) && $result[0]['ex_name'] == "gateio")? "<option value='gateio' selected>Gate.io</option>":"<option value='gateio'>Gate.io</option>" ?>
                                            <?php echo (!empty($result[0]['ex_name']) && $result[0]['ex_name'] == "huobi")? "<option value='huobi' selected>Huobi</option>":"<option value='huobi'>Huobi</option>" ?>
                                            <?php echo (!empty($result[0]['ex_name']) && $result[0]['ex_name'] == "bitstamp")? "<option value='bitstamp' selected>Bitstamp</option>":"<option value='bitstamp'>Bitstamp</option>" ?>
                                            <?php echo (!empty($result[0]['ex_name']) && $result[0]['ex_name'] == "bitfinex")? "<option value='bitfinex' selected>Bitfinex</option>":"<option value='bitfinex'>Bitfinex</option>" ?>
                                            <?php echo (!empty($result[0]['ex_name']) && $result[0]['ex_name'] == "okx")? "<option value='okx' selected>OKX</option>":"<option value='okx'>OKX</option>" ?>
                                            <?php echo (!empty($result[0]['ex_name']) && $result[0]['ex_name'] == "bitget")? "<option value='bitget' selected>Bitget</option>":"<option value='bitget'>Bitget</option>" ?>
                                            <?php echo (!empty($result[0]['ex_name']) && $result[0]['ex_name'] == "mexc")? "<option value='mexc' selected>MEXC</option>":"<option value='mexc'>MEXC</option>" ?>
										</select>
									</div>
								</div>
								<div class="col-xl-6">
									<div class="form-group">
										<label class="mb-1"><strong>Login (Required)</strong></label>
										<input type="text" class="form-control" name="ex_login" id="ex_login" value="{{isset($result)?$result[0]['ex_login']:''}}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6">
									<div class="form-group">
										<label class="mb-1"><strong>Password (Required)</strong></label>
										<input type="text" class="form-control" name="ex_password"  id="ex_password"  value="{{isset($result)?$result[0]['ex_password']:''}}">
									</div>
								</div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label class="mb-1"><strong>API Key (Required)</strong></label>
                                        <input type="text" class="form-control" name="api_key"   id="api_key" value="{{isset($result)?$result[0]['api_key']:''}}">
                                    </div>
                                </div>
							</div>
							<div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label class="mb-1"><strong>API Secret (Required)</strong></label>
                                        <input type="text" class="form-control" name="api_secret"  id="api_secret" value="{{isset($result)?$result[0]['api_secret']:''}}">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label class="mb-1"><strong>Passphase</strong></label>
                                        <input type="text" class="form-control" name="api_passphase"  value="{{isset($result)?$result[0]['api_passphase']:''}}">
                                    </div>
                                </div>
							</div>
							<div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label class="mb-1"><strong>fund Password</strong></label>
                                        <input type="text" class="form-control" name="api_fund_password"  value="{{isset($result)?$result[0]['api_fund_password']:''}}">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label class="mb-1"><strong>account name</strong></label>
										<input type="text" class="form-control" name="api_account_name"  value="{{isset($result)?$result[0]['api_account_name']:''}}">
									</div>
								</div>
							</div>
							<div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label class="mb-1"><strong>API login</strong></label>
                                        <input type="text" class="form-control" name="api_login"  value="{{isset($result)?$result[0]['api_login']:''}}">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label class="mb-1"><strong>API password</strong></label>
                                        <input type="text" class="form-control" name="api_password"  value="{{isset($result)?$result[0]['api_password']:''}}">
                                    </div>
                                </div>
							</div>
							<div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label class="mb-1"><strong>sms phone number</strong></label>
                                        <input type="text" class="form-control" name="ex_sms_phone_number"  value="{{isset($result)?$result[0]['ex_sms_phone_number']:''}}">
                                    </div>
                                </div>
								<div class="col-xl-6">
									<div class="form-group">
										<label class="mb-1"><strong>API doc</strong></label>
										<input type="text" class="form-control" name="api_doc"  value="{{isset($result)?$result[0]['api_doc']:''}}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6">
									<div class="form-group">
										<label class="mb-1"><strong>API doc Link</strong></label>
										<input type="text" class="form-control" name="api_doc_link"  value="{{isset($result)?$result[0]['api_doc_link']:''}}">
									</div>
								</div>
								<div class="col-xl-6">
									<div class="form-group">
										<label class="mb-1"><strong>Bank Login</strong></label>
										<input type="text" class="form-control" name="bank_login"  value="{{isset($result)?$result[0]['bank_login']:''}}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6">
									<div class="form-group">
										<label class="mb-1"><strong>Bank Password</strong></label>
										<input type="text" class="form-control" name="bank_password"  value="{{isset($result)?$result[0]['bank_password']:''}}">
									</div>
								</div>
								<div class="col-xl-6">
									<div class="form-group">
										<label class="mb-1"><strong>Bank Link</strong></label>
										<input type="text" class="form-control" name="bank_link"  value="{{isset($result)?$result[0]['bank_link']:''}}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6">
									<div class="form-group">
										<label class="mb-1"><strong>Bank Other</strong></label>
										<input type="text" class="form-control" name="bank_other"  value="{{isset($result)?$result[0]['bank_other']:''}}">
									</div>
								</div>
								<div class="col-xl-6">
									<div class="form-group">
										<label class="mb-1"><strong>Contact Name</strong></label>
										<input type="text" class="form-control" name="contact_name"  value="{{isset($result)?$result[0]['contact_name']:''}}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6">
									<div class="form-group">
										<label class="mb-1"><strong>Contact Email</strong></label>
										<input type="text" class="form-control" name="contact_email"  value="{{isset($result)?$result[0]['contact_email']:''}}">
									</div>
								</div>
								<div class="col-xl-6">
									<div class="form-group">
										<label class="mb-1"><strong>Contact Phone</strong></label>
										<input type="text" class="form-control" name="contact_phone"  value="{{isset($result)?$result[0]['contact_phone']:''}}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6">
									<div class="form-group">
										<label class="mb-1"><strong>Contact Telegram</strong></label>
										<input type="text" class="form-control" name="contact_telegram" value="{{isset($result)?$result[0]['contact_telegram']:''}}">
									</div>
								</div>
								<div class="col-xl-6">
									<div class="form-group">
										<label class="mb-1"><strong>Contact Whatsapp</strong></label>
										<input type="text" class="form-control" name="contact_whatsapp" value="{{isset($result)?$result[0]['contact_whatsapp']:''}}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6">
									<div class="form-group">
										<label class="mb-1"><strong>Contact skype</strong></label>
										<input type="text" class="form-control" name="contact_skype" value="{{isset($result)?$result[0]['contact_skype']:''}}">
									</div>
								</div>
								<div class="col-xl-6">
									<div class="form-group">
										<label class="mb-1"><strong>Contact Boom Boom chat</strong></label>
										<input type="text" class="form-control" name="contact_boom_boom_chat" value="{{isset($result)?$result[0]['contact_boom_boom_chat']:''}}">
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


		$( "form" ).submit(function( event ) {
            var ex_login = $("#ex_login").val();
            var ex_password = $("#ex_password").val();
            var api_key = $("#api_key").val();
            var api_secret = $("#api_secret").val();

            if (ex_login == "" || ex_password == "" || api_key == "" || api_secret == "") {
                alertError("Please fill in all required field!")
                event.preventDefault();
            }
            return
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
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
		}
	</script>
@endsection
