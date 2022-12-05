{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('locale.masterload_report')}}</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example7" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>{{__('locale.time_stamp')}}</th>
                                    <th>{{__('locale.trade_type')}}</th>
                                    <th>{{__('locale.sender_address')}}</th>
                                    <th>{{__('locale.to_address')}}</th>
                                    <th>{{__('locale.amount')}}</th>
                                    <th>{{__('locale.transaction_detail')}}</th>
                                    <th>{{__('locale.superload_view')}}</th>
                                    <th>{{__('locale.subload_view')}}</th>
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
                                        <?php echo $value->trade_type == 1? "Buy":"Sell" ?>
                                    </td>
                                    <td>{{$value->sending_address}}</td>
                                    <td>{{$value->wallet_address}}</td>
                                    <td>{{$value->amount}}</td>
                                    <td>
                                        <?php
                                            if($value->trade_type == 1){ ?>
                                        <a href="https://etherscan.io/tx/{{$value->tx_id}}" target="_blank">{{$value->tx_id}}</a>
                                        <?php }else{ ?>
                                        <a href="https://www.blockchain.com/btc/tx/{{$value->tx_id}}" target="_blank">{{$value->tx_id}}</a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php
                                            if($value->trade_type == 1){ ?>
                                        <a href="{!! url('/subload_report_buy/'.$value->id); !!}">View Sub Load</a>
                                        <?php }else{ ?>
                                            <a href="{!! url('/subload_report_sell/'.$value->id); !!}">View Sub Load</a>
                                        <?php } ?>
                                    </td>
                                    <td >
                                        <?php
                                            if($value->trade_type == 1){ ?>
                                        <a href="{!! url('/superload_report_buy/'.$value->id); !!}">View Super Load</a>
                                        <?php }else{ ?>
                                            <a href="{!! url('/superload_report_sell/'.$value->id); !!}">View Super Load</a>
                                        <?php } ?>
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