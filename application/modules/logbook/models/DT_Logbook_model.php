<?php


class DT_Logbook_Model extends Datatable_Model{
	var $table = 'logbook';
    var $search_column = array(
        'logbook_name'

    );
    var $select_column = array(
        'id_logbook',
        'logbook_name',
        'access_date'
    );
    var $order_column = array(
        'id_logbook',
        'logbook_name',
        'access_date'
    );
    var $join = array();
    var $soft_delete = false;
    var $where = '';
    var $primary_key = 'id_logbook';
}