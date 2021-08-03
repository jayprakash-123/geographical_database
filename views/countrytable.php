<?php

defined('BASEPATH') or exit('No direct script access allowed');

$aColumns = [
    'country_id',
    'short_name',
    'iso2',
 ];
$primaryKey     = 'country_id';
$sIndexColumn   = 'country_id';

$sTable         = db_prefix() . 'countries';


$where = [];
$can_view = has_permission('geographical','','view');
$can_edit = has_permission('geographical','','edit');
$can_delete = has_permission('geographical','','delete');

$result = data_tables_init($aColumns, $sIndexColumn, $sTable, $join, $where, [$primaryKey]);


$output  = $result['output'];
$rResult = $result['rResult'];

foreach ($rResult as $aRow) {
    $row = [];
    for ($i = 0; $i < count($aColumns); $i++) {
        $_data = $aRow[$aColumns[$i]];
        if ($aColumns[$i] == 'short_name') {
            $_data = '<a href="' . admin_url('geographical/index/' . $aRow[$primaryKey]) . '">' . $_data . '</a>';
            $_data .= '<div class="row-options">';
            $_data .= '<a class="view-country" data-country="'.$aRow[$primaryKey].'" href="' . ('view/' . $aRow[$primaryKey]) . '">' . _l('view') . '</a>';
            if($can_edit){

           $_data .= '  <a class="edit-countryadd" href="' . admin_url('geographical/countryadd/' . $aRow[$primaryKey]) . '">' . _l('edit') . '</a>';
        
                 
            }
            if ($can_delete) {
                $_data .= ' | <a href="' . admin_url('geographical/delete/' . $aRow[$primaryKey]) . '" class="text-danger _delete">' . _l('delete') . '</a>';
            }
            $_data .= '</div>';
        } 
        $row[] = $_data;
    }
    $row['DT_RowClass'] = 'has-row-options';
    $output['aaData'][] = $row;
}





