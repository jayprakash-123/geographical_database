<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Search extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Search_model');
        $this->load->model('City_model');
        $this->load->model('Geographical_model');
        $this->load->model('State_model');
        if(!is_staff_logged_in()) {
                redirect(admin_url(''));
            }
    }



    public function index(){
        if(!is_staff_logged_in()) {
           access_denied('geographical');
        }
        if ($this->input->is_ajax_request()) {
            $this->app->get_table_data(module_views_path('geographical', 'searchtable'));
        }
        $data['title']                 = _l('Geographical');
        $data['city']          = $this->City_model->get();
       //  print_r($data);
       //  die();
        $this->load->view('geographical/searchmanage',$data);
   }


    // public function auto_search() {
    //     //echo "hello"; die();
    //     $search_data = $this->input->post('search_data');
    //     //print_r($search_data);  die();
    //     $query = $this->city_model->autocomplete($search_data);
    //     // print_r($query);  die();

    //     foreach ($query->result() as $row):
    //         echo $row->uid  ;
    //         echo  $row->name ;
    //     endforeach;
    // }

    

    


   
        


 

}
