{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')

<div class="container-fluid">
	<div class="form-head mb-sm-5 mb-3 d-flex flex-wrap align-items-center">
		<h2 class="font-w600 title mb-2 me-auto ">{{__('locale.internal_trade')}}</h2>
		<div class="weather-btn mb-2">
			<span class="me-3 font-w600 text-black"><i class="fa fa-cloud me-2"></i>21</span>
			<select class="form-control style-1 default-select  me-3 ">
				<option>Medan, IDN</option>
				<option>Jakarta, IDN</option>
				<option>Surabaya, IDN</option>
			</select>
		</div>
		<a href="javascript:void(0);" class="btn btn-secondary mb-2"><i class="las la-calendar scale5 me-3"></i>Filter Periode</a>
	</div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('locale.internal_trade')}}</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example7" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>{{__('locale.internal_exchange_id')}}</th>
                                    <th>{{__('locale.internal_exchange_useremail')}}</th>
                                    <th>{{__('locale.internal_exchange_user_id')}}</th>
                                    <th>{{__('locale.internal_exchange_cronjob_list')}}</th>
                                    <th>{{__('locale.internal_exchange_user_type')}}</th>
                                    <th>{{__('locale.internal_exchange_asset_class_purchased')}}</th>
                                    <th>{{__('locale.internal_exchange_buy_amount_in_coin')}}</th>
                                    <th>{{__('locale.internal_exchange_buy_address_to_coin')}}</th>
                                    <th>{{__('locale.internal_exchange_pay_with')}}</th>
                                    <th>{{__('locale.internal_exchange_chain_stack')}}</th>
                                    <th>{{__('locale.internal_exchange_trasaction_description')}}</th>
                                    <th>{{__('locale.internal_exchange_trust_fee')}}</th>
                                    <th>{{__('locale.internal_exchange_campain_type')}}</th>
                                    <th>{{__('locale.internal_exchange_profit')}}</th>
                                    <th>{{__('locale.internal_exchange_commissions')}}</th>
                                    <th>{{__('locale.internal_exchange_free_from_exchanges')}}</th>
                                    <th>{{__('locale.internal_exchange_bank_changes')}}</th>
                                    <th>{{__('locale.internal_exchange_left_over_profit')}}</th>
                                    <th>{{__('locale.internal_exchange_total_amount_left_to_buy')}}</th>
                                    <th>{{__('locale.internal_exchange_master_load')}}</th>
                                    <th>{{__('locale.internal_exchange_address')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($result as $key => $value)
                                <tr>
									<td>{{$value['id']}}</td>
									<td>{{$value['email']}}</td>
									<td>{{$value['id']}}</td>
									<td>{{$value['cronjob_list']}}</td>
									<td>{{$value['user_type']}}</td>
									<td>{{$value['asset_class_purchase']}}</td>
									<td>{{$value['buy_amount_in_coin']}}</td>
									<td>{{$value['but_address_to_send_coin']}}</td>
									<td>{{$value['pay_with']}}</td>
									<td>{{$value['chainstack']}}</td>
									<td>{{$value['transaction_description']}}</td>
									<td>{{$value['trusted_free']}}</td>
									<td>{{$value['campain']}}</td>
									<td>{{$value['profit']}}</td>
									<td>{{$value['commission']}}</td>
									<td>{{$value['fee_from_exchange']}}</td>
									<td>{{$value['bank_change']}}</td>
									<td>{{$value['left_over_profit']}}</td>
									<td>{{$value['total_amount_left']}}</td>
									<td>{{$value['master_load']}}</td>
									<td>{{$value['address_link']}}</td>
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
			dezSettingsOptions.version = 'dark';
			setTimeout(function() {
				dezSettingsOptions.version = 'dark';
				new dezSettings(dezSettingsOptions);
			}, 1500)
		});
	</script>
@endsection	