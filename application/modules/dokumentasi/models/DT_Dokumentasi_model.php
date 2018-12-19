<?php


class DT_Dokumentasi_Model extends Datatable_Model{
    var $table = 'piu.folder';

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
    var $soft_delete = false;
    var $where = '';
}
