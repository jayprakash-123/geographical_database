<?php

defined('BASEPATH') or exit('No direct script access allowed');

$aColumns = [
    'city_id',
    'short_name',
    'state_name',
    'state_code',
    'city_name',
    'city_pincode',
 ];
$primaryKey     = 'city_id';
$sIndexColumn   = 'city_id';

$sTable         = db_prefix() . 'city';
$join = [
    'LEFT JOIN ' . db_prefix() . 'countries ON ' . db_prefix() . 'city.country_id = ' . db_prefix() . 'countries.country_id',
    'LEFT JOIN ' . db_prefix() . 'state ON ' . db_prefix() . 'city.state_id = ' . db_prefix() . 'state.state_id',
];

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
        if ($aColumns[$i] == 'city_id') {

            $_data .= '<div class="row-options">';

            
            
            $_data .= '</div>';
        } 
        $row[] = $_data;
    }
    $row['DT_RowClass'] = 'has-row-options';
    $output['aaData'][] = $row;
}





