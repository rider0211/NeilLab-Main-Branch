{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('locale.sub_load_report')}}</h4>
                    <?php
                        if($trade_type == 1){ ?>
					<a href="{!! url('/masterload_report_buy/'.$masterload_id); !!}" class="btn btn-secondary mb-2">Back</a>
                    <?php }else{ ?>
                    <a href="{!! url('/masterload_report_sell/'.$masterload_id); !!}" class="btn btn-secondary mb-2">Back</a>
                    <?php } ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example7" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>{{__('locale.time_stamp')}}</th>
                                    <th>{{__('locale.trade_type')}}</th>
                                    <th>{{__('locale.from_address')}}</th>
                                    <th>{{__('locale.delivered_address')}}</th>
                                    <th>{{__('locale.amount')}}</th>
                                    <th>{{__('locale.transaction_detail')}}</th>
                                    <th>{{__('locale.status')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($result as $key => $value)
								<tr>
                                    <td>
                                        <?php   
                                        $formatted_datetime = date("Y-m-d H:i:s", strtotime($value['updated_at']));
                                        echo $formatted_datetime?>
                                    </td>
                                    <td>
                                        <?php echo $value['trade_type'] == 1? "Buy":"Sell" ?>
                                    </td>
                                    <td>{{$value['receive_address']}}</td>
                                    <td>{{$delivered_address}}</td>
                                    <td>{{$value['amount']}}</td>
                                    <td>
                                        <?php
                                            if($value['trade_type'] == 1){ ?>
                                        <a href="https://www.blockchain.com/btc/tx/{{$value['tx_id']}}" target="_blank">{{$value['tx_id']}}</a>
                                        <?php }else{ ?>
                                        <a href="https://etherscan.io/tx/{{$value['tx_id']}}" target="_blank">{{$value['tx_id']}}</a>
                                        <?php } ?>
                                    </td>
                                    <td>
										@switch($value['status'])
                                            @case (0)
                                                <span class="badge light badge-info">Withdraw Pending</span>
                                                @break
                                            @case (1)
                                                <span class="badge light badge-success">Withdraw Complete</span>
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