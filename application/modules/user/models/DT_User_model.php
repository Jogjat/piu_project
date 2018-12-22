<?php


class DT_User_Model extends Datatable_Model{
	var $table = 'users';
    var $search_column = array(
    	'type',
    	'username',
    	'email'
    );
    var $select_column = array(
        'id',
   		'type',
    	'username',
    	'email');
    var $order_column = array(
        'id',
    	'type',
    	'username',
    	'email');
    var $join = array();
    var $soft_delete = false;
    var $where = '';
}