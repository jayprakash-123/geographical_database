<?php

defined('BASEPATH') or exit('No direct script access allowed');
$aColumns = [
    'state_id',
    'short_name',
    'state_name',
    'state_code',
    
];

$primaryKey     = 'state_id';
$sIndexColumn   = 'state_id';

$sTable         = db_prefix() . 'state';
$join = ['LEFT JOIN ' . db_prefix() . 'countries ON ' . db_prefix() . 'state.country_id = ' . db_prefix() . 'countries.country_id'];


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
            $_data = '<a href="' . admin_url('geographical/state/index/' . $aRow[$primaryKey]) . '">' . $_data . '</a>';
            $_data .= '<div class="row-options">';
            $_data .= '<a class="view-state" data-state="'.$aRow[$primaryKey].'" href="' . ('view/' . $aRow[$primaryKey]) . '">' . _l('view') . '</a>';

            if($can_edit){

           $_data .= '  <a class="edit-stateadd" href="' . admin_url('geographical/state/stateadd/' . $aRow[$primaryKey]) . '">' . _l('edit') . '</a>';
        
                 
            }
            if ($can_delete) {
                $_data .= ' | <a href="' . admin_url('geographical/state/delete/' . $aRow[$primaryKey]) . '" class="text-danger _delete">' . _l('delete') . '</a>';
            }
            $_data .= '</div>';
        } elseif ($aColumns[$i] == 'policy_valid_from' || $aColumns[$i] == 'policy_valid_till') {
            $_data = _d($_data);
        } elseif ($aColumns[$i] == 'goal_type') {
            $_data = format_goal_type($_data);
        }
        $row[] = $_data;
    }
    $row['DT_RowClass'] = 'has-row-options';
    $output['aaData'][] = $row;
}





