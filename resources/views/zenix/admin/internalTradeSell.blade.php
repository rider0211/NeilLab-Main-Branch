{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('locale.internal_trade_sell')}}</h4>
					@if(session()->has('error'))
					<div class="alert alert-danger"><div class="alert-body">{{ session()->get('error') }}</div></div>
					@endif

					@if(session()->has('success'))
					<div class="alert alert-success"><div class="alert-body">{{ session()->get('success') }}</div></div>
					@endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example7" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>{{__('locale.internal_trade_sell_id')}}</th>
                                    <th>{{__('locale.internal_trade_sell_useremail')}}</th>
                                    <th>{{__('locale.internal_trade_sell_user_id')}}</th>
                                    <th>{{__('locale.internal_trade_sell_cronjob_list')}}</th>
                                    <th>{{__('locale.internal_trade_sell_user_type')}}</th>
                                    <th>{{__('locale.internal_trade_sell_asset_class_purchased')}}</th>
                                    <th>{{__('locale.internal_trade_sell_buy_amount_in_coin')}}</th>
                                    <th>{{__('locale.internal_trade_sell_buy_address_to_coin')}}</th>
                                    <th>{{__('locale.internal_trade_sell_pay_with')}}</th>
                                    <th>{{__('locale.internal_trade_sell_chain_stack')}}</th>
                                    <th>{{__('locale.internal_trade_sell_trasaction_description')}}</th>
                                    <th>{{__('locale.internal_trade_sell_trust_fee')}}</th>
                                    <th>{{__('locale.internal_trade_sell_campain_type')}}</th>
                                    <th>{{__('locale.internal_trade_sell_profit')}}</th>
                                    <th>{{__('locale.internal_trade_sell_commissions')}}</th>
                                    <th>{{__('locale.internal_trade_sell_free_from_exchanges')}}</th>
                                    <th>{{__('locale.internal_trade_sell_bank_changes')}}</th>
                                    <th>{{__('locale.internal_trade_sell_left_over_profit')}}</th>
                                    <th>{{__('locale.internal_trade_sell_total_amount_left_to_buy')}}</th>
                                    <th>{{__('locale.internal_trade_sell_master_load')}}</th>
                                    <th>{{__('locale.internal_trade_sell_address')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($result as $key => $value)
                                <tr>
									<td>{{$value->id}}</td>
									<td>{{$value->email}}</td>
									<td>{{$value->user_id}}</td>
									<td>{{$value->cronjob_list}}</td>
									<td>human</td>
									<td>{{$value->asset_sold}}</td>
									<td>{{$value->sell_amount}}</td>
									<td>{{$value->receive_address}}</td>
									<td>{{$value->pay_with}}</td>
									<td>{{$value->chain_stack}}</td>
									<td>{{$value->transaction_description}}</td>
									<td>{{$value->trust_fee}}</td>
									<td>{{$value->campain_type}}</td>
									<td>{{$value->profit}}</td>
									<td>{{$value->commision_id}}</td>
									<td>{{$value->fee_from_exchange}}</td>
									<td>{{$value->bank_changes}}</td>
									<td>{{$value->left_over_profit}}</td>
									<td>{{$value->total_amount_left}}</td>
									<td>{{$value->master_load}}</td>
									<td>undifined</td>
								</tr>
                                @endforeach
                            </tbody>
                        </table>
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
	</script>
@endsection	