<?php


class DT_Dokumentasi_Model extends Datatable_Model{
    var $table = 'folder';

    var $search_column = array(
        'folder_name'
    );
    var $select_column = array(
        'id_folder',
        'folder_name',
        'create_date',
        'parent'
    );
    var $order_column = array(
        'folder_name',
        'create_date'
    );
    var $join = array();
    var $soft_delete = true;
    var $where = 'parent=0';
    var $primary_key = 'id_folder';
}
