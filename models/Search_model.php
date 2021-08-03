<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Search_model extends App_Model
{
    /**
    * Controler __construct function to initialize options
    */
    protected $table;
    protected $primaryKey = 'city_id';
    public function __construct()
    {
        parent::__construct();
        $this->table = db_prefix()."city";
         
    }
    // public function autocomplete($search_data) {
    //    // echo "hello"; die();

    //     $this->db->select('name');
    //             $this->db->select('uid');
    //             $this->db->like('name', $search_data);
    //             $dt = $this->db->get('city', 10);
    //             //print_r($dt); die();
    //             return $dt->result();
    //     }

}

/* End of file Geographical_model.php */


        
       



     

