<?php

defined('BASEPATH') or exit('No direct script access allowed');

class City extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('City_model');
        $this->load->model('State_model');
        $this->load->model('Geographical_model');
        if(!is_staff_logged_in()) {
                redirect(admin_url(''));
            }
    }
    public function show_state()
    {
      
        $country_id=$this->input->post('country_id');
    
        if($this->input->post('country_id')!='')
        {
          
            $query_state = $this->db->query('select * from tblstate where country_id = "'.$country_id.'"');
            $state =  $query_state->result();
            ?>
           <option value="">Select State</option> 
            <?php 
            foreach($state as $state){
               
            
            echo "<option value='". $state->state_id."'>".ucwords($state->state_name)."</option>";
            
            }
        }
    }
  



    public function index(){
         if(!is_staff_logged_in()) {
            access_denied('geographical');
         }
         if ($this->input->is_ajax_request()) {
             $this->app->get_table_data(module_views_path('geographical', 'citytable'));
         }
         $data['title']                 = _l('Geographical');
         $data['city']                  = $this->City_model->get();
        //  print_r($data);
        //  die();
         $this->load->view('geographical/citymanage',$data);
    }



     
     public function cityadd($id = ''){
        if ($this->input->post())
         { 
            
            if ($id == '') {
                if (!has_permission('geographical', '', 'create')) {
                    access_denied('geographical');
                }
                
                $id = $this->City_model->add($this->input->post());
                // echo $this->db->last_query();
                // die();
               
                    set_alert('success', _l('added_successfully', _l('city')));
                    redirect('geographical/city/index');
            } else {
                    if (!has_permission('geographical', '', 'edit')) {
                        access_denied('geographical');
                    }
                    $success = $this->City_model->update($this->input->post(), $id);
                    set_alert('success', _l('updated_successfully', _l('city')));
                    redirect('geographical/city/index');
                  }
                }
                   if ($id == '') {
                    $title = _l('add_new', _l(geographical_MODULE_NAME.'city'));
                } else {     
                    $data['city']        = $this->City_model->get($id);
                    $title = _l('edit', _l(geographical_MODULE_NAME.'city'));
                    $this->load->view('city', $data);     
                }
                    $data['title']                 = $title;
                   if($data['city']){
                    $data['city'] = json_decode(json_encode($data['city']), true);
                    }
                  
                    
    }



    public function view($id = ''){
        $data['city']        = $this->City_model->get($id);
        $title = _l('view', _l(geographical_MODULE_NAME.'geographical'));
      
        $this->load->view('cityview', $data);
       
    }


           
            public function delete($id=''){
            
                $this->City_model->delete($id);
        
              set_alert('success',_l('deleted',  _l('city')));    
            
              redirect('geographical/city/index');
        }

    
            
        
        
        
        // public function state(){
             
        //         $this->load->view('statemanage', $data);
        //     }
                




}



