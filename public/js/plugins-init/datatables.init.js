(function ($) {
    "use strict"

	let dataSet = [
		[ "Tiger Nixon", "System Architect", "Edinburgh", "5421", "2011/04/25", "$320,800" ],
		[ "Garrett Winters", "Accountant", "Tokyo", "8422", "2011/07/25", "$170,750" ],
		[ "Ashton Cox", "Junior Technical Author", "San Francisco", "1562", "2009/01/12", "$86,000" ],
		[ "Cedric Kelly", "Senior Javascript Developer", "Edinburgh", "6224", "2012/03/29", "$433,060" ],
		[ "Airi Satou", "Accountant", "Tokyo", "5407", "2008/11/28", "$162,700" ],
		[ "Brielle Williamson", "Integration Specialist", "New York", "4804", "2012/12/02", "$372,000" ],
		[ "Herrod Chandler", "Sales Assistant", "San Francisco", "9608", "2012/08/06", "$137,500" ],
		[ "Rhona Davidson", "Integration Specialist", "Tokyo", "6200", "2010/10/14", "$327,900" ],
		[ "Colleen Hurst", "Javascript Developer", "San Francisco", "2360", "2009/09/15", "$205,500" ],
		[ "Sonya Frost", "Software Engineer", "Edinburgh", "1667", "2008/12/13", "$103,600" ],
		[ "Jena Gaines", "Office Manager", "London", "3814", "2008/12/19", "$90,560" ],
		[ "Quinn Flynn", "Support Lead", "Edinburgh", "9497", "2013/03/03", "$342,000" ],
		[ "Charde Marshall", "Regional Director", "San Francisco", "6741", "2008/10/16", "$470,600" ],
		[ "Haley Kennedy", "Senior Marketing Designer", "London", "3597", "2012/12/18", "$313,500" ],
		[ "Tatyana Fitzpatrick", "Regional Director", "London", "1965", "2010/03/17", "$385,750" ],
		[ "Michael Silva", "Marketing Designer", "London", "1581", "2012/11/27", "$198,500" ],
		[ "Paul Byrd", "Chief Financial Officer (CFO)", "New York", "3059", "2010/06/09", "$725,000" ],
		[ "Gloria Little", "Systems Administrator", "New York", "1721", "2009/04/10", "$237,500" ],
		[ "Bradley Greer", "Software Engineer", "London", "2558", "2012/10/13", "$132,000" ],
		[ "Dai Rios", "Personnel Lead", "Edinburgh", "2290", "2012/09/26", "$217,500" ],
		[ "Jenette Caldwell", "Development Lead", "New York", "1937", "2011/09/03", "$345,000" ],
		[ "Yuri Berry", "Chief Marketing Officer (CMO)", "New York", "6154", "2009/06/25", "$675,000" ],
		[ "Caesar Vance", "Pre-Sales Support", "New York", "8330", "2011/12/12", "$106,450" ],
		[ "Doris Wilder", "Sales Assistant", "Sidney", "3023", "2010/09/20", "$85,600" ],
		[ "Angelica Ramos", "Chief Executive Officer (CEO)", "London", "5797", "2009/10/09", "$1,200,000" ],
		[ "Gavin Joyce", "Developer", "Edinburgh", "8822", "2010/12/22", "$92,575" ],
		[ "Jennifer Chang", "Regional Director", "Singapore", "9239", "2010/11/14", "$357,650" ],
		[ "Brenden Wagner", "Software Engineer", "San Francisco", "1314", "2011/06/07", "$206,850" ],
		[ "Fiona Green", "Chief Operating Officer (COO)", "San Francisco", "2947", "2010/03/11", "$850,000" ],
		[ "Shou Itou", "Regional Marketing", "Tokyo", "8899", "2011/08/14", "$163,000" ],
		[ "Michelle House", "Integration Specialist", "Sidney", "2769", "2011/06/02", "$95,400" ],
		[ "Suki Burks", "Developer", "London", "6832", "2009/10/22", "$114,500" ],
		[ "Prescott Bartlett", "Technical Author", "London", "3606", "2011/05/07", "$145,000" ],
		[ "Gavin Cortez", "Team Leader", "San Francisco", "2860", "2008/10/26", "$235,500" ],
		[ "Martena Mccray", "Post-Sales support", "Edinburgh", "8240", "2011/03/09", "$324,050" ],
		[ "Unity Butler", "Marketing Designer", "San Francisco", "5384", "2009/12/09", "$85,675" ]
	];

})(jQuery);


(function($) {
    "use strict"
    //example 1
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var base_url = $('meta[name="base-url"]').attr('content');
    var table = $('#example').DataTable({
        createdRow: function ( row, data, index ) {
           $(row).addClass('selected')
        } ,
		language: {
			paginate: {
			  next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
			  previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
			}
		}
    });

    table.on('click', 'tbody tr', function() {
    var $row = table.row(this).nodes().to$();
    var hasClass = $row.hasClass('selected');
    if (hasClass) {
        $row.removeClass('selected')
    } else {
        $row.addClass('selected')
    }
    })

    table.rows().every(function() {
    this.nodes().to$().removeClass('selected')
    });



    //example 2
    var table2 = $('#example2').DataTable( {
        createdRow: function ( row, data, index ) {
            $(row).addClass('selected')
        },

        "scrollY":        "42vh",
        "scrollCollapse": true,
        "paging":         false
    });


    table2.on('click', 'tbody tr', function() {
        var $row = table2.row(this).nodes().to$();
        var hasClass = $row.hasClass('selected');
        if (hasClass) {
            $row.removeClass('selected')
        } else {
            $row.addClass('selected')
        }
    })

    table2.rows().every(function() {
        this.nodes().to$().removeClass('selected')
    });

	 //example 5
	var table = $('#example5').DataTable({
		searching: false,
		paging:true,
		select: false,
		//info: false,
		lengthChange:false ,
		language: {
			paginate: {
			  next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
			  previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
			}
		}

	});
    var table = $('#example7').DataTable({
		searching: false,
		paging:true,
		select: false,
		//info: false,
		lengthChange:false ,
		language: {
			paginate: {
			  next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
			  previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
			}
		}

	});

	var table = $('#dashboard_table').DataTable({
        lengthMenu: [ [5, 10, 20, -1], [5, 10, 20, "All"] ],
        searching: false,
		paging:true,
		select: false,
		lengthChange:true ,
        serverSide: true,
        processing:true,
        ajax: {
            url : base_url + '/admin/getAllExchanges',
            dataFilter: function(data){
                var json = jQuery.parseJSON( data );
                json.recordsTotal = json.total;
                json.recordsFiltered = json.total;
                json.data = json.list;
                return JSON.stringify( json ); // return JSON string
            },
            type: 'POST',
        },
        columns: [
            {
                data: 'id',
                render: function ( data, type, row, meta) {
                    return meta.settings._iDisplayStart + meta.row + 1;
                }
            },
            {
                data: 'ex_name',
                render: function ( data, type, row, meta) {
                    switch (data) {
                        case 'binance':
                            return "Binance";
                            break;
                        case 'FTX':
                            return "FTX";
                            break;
                        case 'okx':
                            return "OKX";
                            break;
                        case 'huobi':
                            return "Huobi";
                            break;
                        case 'kucoin':
                            return "Kucoin";
                            break;
                        case 'gateio':
                            return "GateIO";
                            break;
                        case 'mexc':
                            return "MEXC";
                            break;
                        case 'bitget':
                            return "Bitget";
                            break;
                        case 'bitfinex':
                            return "Bitfinex";
                            break;
                        default:
                            break;
                    }
                    return ++meta.row;
                }
            },
            {
                data: 'ex_login',
                render: function ( data, type, row, meta) {
                    return data;
                }
            },
            {
                data: 'wallet_address',
                render: function ( data, type, row, meta) {
                    return data;
                }
            },
            {
                data: 'connect_status',
                render: function ( data, type, row, meta) {
                    if(data == false){
                        var return_data = '<span class="badge light badge-danger"><i class="fa fa-circle text-danger me-1"></i>Disconnected</span>'
                    }else{
                        var return_data = '<span class="badge light badge-success"><i class="fa fa-circle text-success me-1"></i>Connected</span>'
                    }
                    return return_data;
                }
            },
            {
                data: null,
                render: function ( data, type, row, meta) {
                    return "Certified";
                }
            },
        ],
		language: {
			paginate: {
			  next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
			  previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>',
			},
            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
		},
	});

    var table = $('#exchange_list_table').DataTable({
        lengthMenu: [ [5, 10, 20, -1], [5, 10, 20, "All"] ],
        searching: false,
		paging:true,
		select: false,
		lengthChange:true ,
        serverSide: true,
        processing:true,
        searching:true,
        ajax: {
            url : base_url + '/admin/getAllExchanges',
            dataFilter: function(data){
                var json = jQuery.parseJSON( data );
                json.recordsTotal = json.total;
                json.recordsFiltered = json.filtered;
                json.data = json.list;
                return JSON.stringify( json ); // return JSON string
            },
            type: 'POST',
        },
        columns: [
            {
                data: 'id',
                render: function ( data, type, row, meta) {
                    return meta.settings._iDisplayStart + meta.row + 1;
                }
            },
            {
                data: 'ex_name',
                render: function ( data, type, row, meta) {
                    switch (data) {
                        case 'binance':
                            return "Binance";
                            break;
                        case 'FTX':
                            return "FTX";
                            break;
                        case 'okx':
                            return "OKX";
                            break;
                        case 'huobi':
                            return "Huobi";
                            break;
                        case 'kucoin':
                            return "Kucoin";
                            break;
                        case 'gateio':
                            return "GateIO";
                            break;
                        case 'mexc':
                            return "MEXC";
                            break;
                        case 'bitget':
                            return "Bitget";
                            break;
                        case 'bitfinex':
                            return "Bitfinex";
                            break;
                        default:
                            break;
                    }
                    return ++meta.row;
                }
            },
            {
                data: 'ex_login',
                render: function ( data, type, row, meta) {
                    return data;
                }
            },
            {
                data: 'wallet_address',
                render: function ( data, type, row, meta) {
                    return data;
                }
            },
            {
                data: 'connect_status',
                render: function ( data, type, row, meta) {
                    if(data == false){
                        var return_data = '<span class="badge light badge-danger"><i class="fa fa-circle text-danger me-1"></i>Disconnected</span>'
                    }else{
                        var return_data = '<span class="badge light badge-success"><i class="fa fa-circle text-success me-1"></i>Connected</span>'
                    }
                    return return_data;
                }
            },
            {
                data: null,
                render: function ( data, type, row, meta) {
                    return "Certified";
                }
            },
            {
                data: 'state',
                render: function ( data, type, row, meta) {
                    if(data){
                        return '<select id="exchange_state_'+row.id+'" data-id="'+row.id+'" name="exchange_state_'+row.id+'" onchange="updateExchangeState(this);">'+
                            '<option value="1" selected>Enabled</option>'+
                            '<option value="0" >Disabled</option>'+
                            '</select>';
                    }else{
                        return '<select id="exchange_state_'+row.id+'" data-id="'+row.id+'" name="exchange_state_'+row.id+'" onchange="updateExchangeState(this);">'+
                            '<option value="1" >Enabled</option>'+
                            '<option value="0" selected>Disabled</option>'+
                            '</select>';

                    }
                }
            },
            {
                data: 'id',
                render: function ( data, type, row, meta) {
                    return '<div class="dropdown ms-auto text-right">'+
                                '<div class="btn-link" data-bs-toggle="dropdown">'+
                                    '<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>'+
                                '</div>'+
                                '<div class="dropdown-menu dropdown-menu-end">'+
                                    '<a class="dropdown-item" href="' + base_url + '/admin/new_exchange_list/'+data+'">Edit</a>'+
                                    '<a class="dropdown-item" href="' + base_url + '/admin/delete_exchange_list/'+data+'">Delete</a>'+
                                '</div>'+
                            '</div>';
                }
            },

        ],
		language: {
			paginate: {
			  next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
			  previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>',
			},
            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
		},
	});
	//example 6
	var table = $('#example6').DataTable({
		searching: false,
		paging:true,
		select: false,
		//info: false,
		lengthChange:false,
		language: {
			paginate: {
			  next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
			  previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
			}
		}

	});

	//ListDatatableView
	var table = $('#ListDatatableView').DataTable({
		searching: false,
		paging:true,
		select: false,
		//info: false,
		lengthChange:false ,
		language: {
			paginate: {
			  next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
			  previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
			}
		}

	});


    $('.dataTables_filter input[type="search"]').unbind();
    $('.dataTables_filter input[type="search"]').bind('keyup', function(e) {
        if(e.keyCode == 13) {
            var that = $('.datatable-for-select').DataTable();
            console.log(this.value);
            that.search( this.value ).draw();
        }
    });

	// var table = $('#example3, #example4,').DataTable({
	// 	language: {
	// 		paginate: {
	// 		  next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
	// 		  previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
	// 		}
	// 	}
	// });
	$('#example tbody').on('click', 'tr', function () {
		var data = table.row( this ).data();
	});
	jQuery('.dataTables_wrapper select').selectpicker();

})(jQuery);
