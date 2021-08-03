<?php

defined('BASEPATH') or exit('No direct script access allowed');

/*
Module Name: Geographical 
Description: Geographical Database
Version: 1.0.1
Author: Jay Prakash Singh
Requires at least: 2.3.2
*/

define('GEOGRAPHICAL_MODULE_NAME', 'geographical');
 //define('GEOGRAPHICAL_MASTER_DATA_TABLE',db_prefix() .'geographical_master_data');
/**
 * Register mailbox language files
 */
//register_language_files(GEOGRAPHICAL_MODULE_NAME, [geographical_MODULE_NAME]);

hooks()->add_action('admin_init', 'geographical_init_menu_items');

function geographical_init_menu_items(){
    
            $CI = & get_instance();
            if (has_permission('geographical', '', 'view')) {
            $CI->app_menu->add_sidebar_menu_item(GEOGRAPHICAl_MODULE_NAME.'_geographical_menu', [
             'name'     => 'Geographical', // The name if the item
             'position' => 10, // The menu position, see below for default positions.
             'icon'     => 'fa fa-circle', // Font awesome icon
           ]);

            // The first paremeter is the parent menu ID/Slug
            $CI->app_menu->add_sidebar_children_item(GEOGRAPHICAl_MODULE_NAME.'_geographical_menu', [
                'slug'     => 'child-to-custom-menu-item', 
                'name'     => 'Country', 
                'href'     => admin_url('geographical/index'),
                'position' => 1, // The menu position
                'icon'     => 'fa fa-circle', 
            ]);


            $CI->app_menu->add_sidebar_children_item(GEOGRAPHICAl_MODULE_NAME.'_geographical_menu', [
                'slug'     => 'child-to-custom-menu-item', 
                'name'     => 'State', // The name if the item
                'href'     => admin_url('geographical/state/index'),
                'position' => 2, // The menu position
                'icon'     => 'fa fa-circle', // Font awesome icon
            ]);



            $CI->app_menu->add_sidebar_children_item(GEOGRAPHICAl_MODULE_NAME.'_geographical_menu', [
                'slug'     => 'child-to-custom-menu-item', // Required ID/slug UNIQUE for the child menu
                'name'     => 'City', // The name if the item
                'href'     =>  admin_url('geographical/city/index'), // URL of the item
                'position' => 3, // The menu position
                'icon'     => 'fa fa-circle', // Font awesome icon
            ]);


            $CI->app_menu->add_sidebar_children_item(GEOGRAPHICAl_MODULE_NAME.'_geographical_menu', [
                'slug'     => 'child-to-custom-menu-item', // Required ID/slug UNIQUE for the child menu
                'name'     => 'Search', // The name if the item
                'href'     => admin_url('geographical/search/index'), // URL of the item
                'position' => 4, // The menu position
                'icon'     => 'fa fa-search', // Font awesome icon
            ]);

          
      }
}
     /*
     * Defining Permissions
    */
     hooks()->add_action('admin_init', 'geographical_module_permissions');

            function geographical_module_permissions()
            {
                $capabilities = [];

                $capabilities['capabilities'] = [
                        'view'   => _l('permission_view') . '(' . _l('permission_global') . ')',
                        'create' => _l('permission_create'),
                        'edit'   => _l('permission_edit'),
                        'delete' => _l('permission_delete'),
                ];

                register_staff_capabilities('geographical', $capabilities, _l('Geographical'));
            }
            


        


          
 /**
    * Register activation module hook
    */

    register_activation_hook(GEOGRAPHICAL_MODULE_NAME, 'geographical_module_activation_hook');

      function geographical_module_activation_hook()
     {
     
        $CI = &get_instance();
        require_once(__DIR__ . '/install.php');
     }
  


// hooks()->add_filter('migration_tables_to_replace_old_links', 'geographical_migration_tables_to_replace_old_links');

//             function geographical_migration_tables_to_replace_old_links($tables)
// {
//     $tables[] = [
//                 'table' => db_prefix() . 'state',
//                 'field' => 'description',
//             ];

//     return $tables;
// }



          

   






   