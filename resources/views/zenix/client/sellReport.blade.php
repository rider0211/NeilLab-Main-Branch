{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('locale.sell_report')}}</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example7" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>{{__('locale.time_stamp')}}</th>
                                    <th>{{__('locale.asset_class_purchase_sold')}}</th>
                                    <th>{{__('locale.sell_amount_in_coins')}}</th>
                                    <th>{{__('locale.sell_address_to_send_coin_to')}}</th>
                                    <th>{{__('locale.address_to_pay_to')}}</th>
                                    <th>{{__('locale.chain_stack')}}</th>
                                    <th>{{__('locale.transaction_description')}}</th>
                                    <th>{{__('locale.status')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($result as $value)
								<tr>
                                    <td>
                                        <?php
                                        $new_datetime = DateTime::createFromFormat ( "Y-m-d H:i:s", $value->updated_at);
                                        echo $new_datetime->format('Y-m-d, H:i:s');  ?>
                                    </td>
                                    <td>
                                        <?php echo $value->asset_purchased == 1? "BTC":"USDT" ?>
                                    </td>
                                    <td>{{$value->sell_amount}}</td>
                                    <td>{{$value->delivered_address}}</td>
                                    <td>
                                        <a href="https://www.blockchain.com/btc/address/{{$value->internal_treasury_wallet_address}}" target="_blank">{{$value->internal_treasury_wallet_address}}</a>
                                    </td>
                                    <td>BTC</td>
                                    <td>{{$value->transaction_description}}</td>
                                    <!-- <td>
										<a href="{!! url('/masterload_report_sell/'.$value->masterload_id); !!}">View Masterload</a>
                                    </td> -->
                                    <td>
										@switch($value->state)
                                            @case (0)
                                                    <span class="badge light badge-secondary">in progress</span>
                                                @break
                                            @case (1)
                                                    <span class="badge light badge-secondary">in progress</span>
                                                @break
                                            @case (2)
                                                    <span class="badge light badge-secondary">in progress</span>
                                                @break
                                            @case (3)
                                                <span class="badge light badge-success">Complete</span>
                                                @break
                                        @endswitch
                                    </td>
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
