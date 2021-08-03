<?php

defined('BASEPATH') or exit('No direct script access allowed');
$CI = & get_instance();



if (!$CI->db->table_exists(db_prefix() . 'state')) {
        $CI->db->query('CREATE TABLE `' . db_prefix() . "state` (
            `state_id` int(11) NOT NULL AUTO_INCREMENT,
            `state_name` varchar(20) NOT NULL,
            `state_code` varchar(20) NOT NULL,
            `country_id` int(11),
            `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
            `updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
            PRIMARY KEY (`state_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=" . $CI->db->char_set . ';');
    }

   
if (!$CI->db->table_exists(db_prefix() . 'city')) {
        $CI->db->query('CREATE TABLE `' . db_prefix() . "city` (
            `city_id` int(11) NOT NULL AUTO_INCREMENT,
            `city_name` varchar(20) NOT NULL,
            `city_pincode` int(11) NOT NULL,
            `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
            `updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
            `state_id` int(11),
            `country_id` int(11),
            PRIMARY KEY (`city_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=" . $CI->db->char_set . ';');
    }


    




  





   

 



 













