<?php

defined('BASEPATH') or exit('No direct script access allowed');

class State extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('State_model');
        $this->load->model('Geographical_model');
        if(!is_staff_logged_in()) {
                redirect(admin_url(''));
            }
    }

  



    public function index(){
         if(!is_staff_logged_in()) {
            access_denied('geographical');
         }
         if ($this->input->is_ajax_request()) {
             $this->app->get_table_data(module_views_path('geographical', 'statetable'));
         }
         $data['title']                 = _l('Geographical');
         $data['state']          = $this->State_model->get();
         
         $this->load->view('geographical/statemanage', $data);
    }



     
     public function stateadd($id = ''){
        if ($this->input->post())
         { 
            
            if ($id == '') {
                if (!has_permission('geographical', '', 'create')) {
                    access_denied('geographical');
                }
                $id = $this->State_model->add($this->input->post());
               
               
                    set_alert('success', _l('added_successfully', _l('state')));
                    redirect('geographical/state/index');
            } else {
                    if (!has_permission('geographical', '', 'edit')) {
                        access_denied('geographical');
                    }
                    
                    $success = $this->State_model->update($this->input->post(), $id);
                    set_alert('success', _l('updated_successfully', _l('state')));
                    redirect('geographical/state/index');
                  }
                }
                   if ($id == '') {
                    $title = _l('add_new', _l(geographical_MODULE_NAME.'state'));
                } else {     
                    $data['state']        = $this->State_model->get($id);
                    $title = _l('edit', _l(geographical_MODULE_NAME.'state'));
               
                    
                    $this->load->view('state', $data);     
                }
                    $data['title']                 = $title;
                   if($data['state']){
                    $data['state'] = json_decode(json_encode($data['state']), true);
                    }
                    
                    
    }


    public function view($id = ''){
        
        $data['state']        = $this->State_model->get($id);
        $title = _l('view', _l(geographical_MODULE_NAME.'geographical'));
        
        $this->load->view('stateview', $data);
       
    }
           
        
        public function delete($id=''){
            $this->State_model->delete($id);
        
              set_alert('success',_l('deleted',  _l('state')));    
            
              redirect('geographical/state/index');
            }

    
            
        
        
        
       
                




}



