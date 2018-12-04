<?php
if ( ! function_exists( 'datatable' ) ) {
	function datatable( $title = null, $uri, $id = 'jq-datatables-example' ) {
		return '<script>pxInit.push(function () {
        $("#' . $id . '").dataTable({
            "language" : {
	            "url" : "' . base_url( 'assets/admin_lte/plugins/datatables/language/Indonesian.json' ) . '",
	            "searchPlaceholder": "Cari.."
            },
             "ordering": false,
            "processing" : true,
            "serverSide" : true,
            "order" : [],
            "ajax" : {
            url : "' . site_url( $uri ) . '",
                type : "POST"
            },
            "columnDefs":[
                {
                    "target" : [0,3,4],
                    "orderable" : false
                }
            ]
        });
        $("#' . $id . ' .table-caption").text("' . $title . '");
        $("#' . $id . ' .dataTables_filter input").attr("placeholder", "Cari...");
    });
</script>';
	}
}
if ( ! function_exists( 'make_query' ) ) {
	function make_query( $table, $select_column = array(), $search_column = array(), $order_column = array(), $join_table = array() ) {
		$ci =& get_instance();
		$ci->db->select( $select_column )->from( $table );
		if ( count( $join_table ) > 0 ) {
			foreach ( $join_table as $item ) {
				$ci->db->join( $item[0], $item[1] );
			}
		}
		if ( isset( $_POST['search']['value'] ) ) {
			$where = $search_column[0] . ' LIKE "%' . $_POST['search']['value'] . '%"';
			if ( count( $search_column ) > 1 ) {
				for ( $i = 1; $i <= ( count( $search_column ) - 1 ); $i ++ ) {
					$where .= ' OR ' . $search_column[ $i ] . ' LIKE "%' . $_POST['search']['value'] . '%"';
				}
			}
			$ci->db->where( "(" . $where . ")" );
		}
		if ( isset( $_POST['order'] ) ) {
			$ci->db->order_by( $order_column[ $_POST['order']['0']['column'] ], $_POST['order']['0']['dir'] );
		}
		else {
			$ci->db->order_by( $table . '.id', 'desc' );
		}

	}
}


if ( ! function_exists( 'datepicker' ) ) {
	function datepicker( $id = 'datepicker' ) {
		return '<script>pxInit.push(function () {$("#' . $id . '").datepicker({"autoclose": true,"format": "dd-mm-yyyy"});});</script>';
	}
}

if ( ! function_exists( 'select2' ) ) {
	function select2( $id, $api, $api_value, $placeholder = '' ) {
		return '<script>pxInit.push(function () {$("#' . $id . '").select2({
            placeholder: "' . $placeholder . '",
            minimumInputLength: 1,
            ajax: {
            url: "' . $api . '",
                type: "GET",
                dataType: "json",
                delay: 250,
                cache: true,
                data: function (params) {
                return {q: params};
                },
                results: function (data, page ) {
                var results = [];
                $.each(data, function (index, item) {
                    results.push({id: item.id, text: item.' . $api_value . '});
                        });
                return {results: results};
                }
            }
        }); }); </script>';
	}
}

if ( ! function_exists( 'nav_menu' ) ) {
	function nav_menu( $nama, $uri = '#', $active = null, $icon = 'fa-circle-o', $array_submenu = array() ) {
		if ( $array_submenu == null ) {

			return '<li class="px-nav-item ' . $active . '"><a href="' . base_url( $uri ) . '"><i class="fa ' . $icon . '"></i> <span> &nbsp;' . $nama . '</span></a></li>';
		}
		else {
			$submenu = '<li class="px-nav-item ' . $array_submenu[0]['active'] . '"><a href="' . base_url( $array_submenu[0]['uri'] ) . '"><i class="fa fa-circle-o"></i> &nbsp;' . $array_submenu[0]['nama'] . '</a></li>';
			for ( $i = 1; $i < count( $array_submenu ); $i ++ ) {
				$submenu .= '<li class="px-nav-item ' . $array_submenu[ $i ]['active'] . '"><a href="' . base_url( $array_submenu[ $i ]['uri'] ) . '"><i class="fa fa-circle-o"></i> &nbsp;' . $array_submenu[ $i ]['nama'] . '</a></li>';
			}
		}

		return '<li class="px-nav-item px-nav-dropdown"> <a href = "' . base_url( $uri ) . '" ><i class="fa fa-envelope" ></i > <span > &nbsp;' . $nama . '</span ></span></a><ul class="px-nav-dropdown-menu" >' . $submenu . '</ul></li > ';
	}
}

if ( ! function_exists( 'edit_button' ) ) {
	function edit_button( $uri ) {
		return '<a href="' . base_url( $uri ) . '" class="btn btn-xs btn-warning"><span class="fa fa-pencil"></span> Edit</a>';
	}
}

if ( ! function_exists( 'print_button' ) ) {
	function print_button( $uri ) {
		return '<a href="' . base_url( $uri ) . '" class="btn btn-xs btn-default"><span class="fa fa-print"></span>&nbsp; Cetak</a>';
	}
}

if ( ! function_exists( 'cancel_button' ) ) {
	function cancel_button( $uri ) {
		return '<a href="' . base_url( $uri ) . '" class="btn btn-xs btn-default"><span class="fa fa-times"></span>&nbsp; Batal Terbit</a>';
	}
}