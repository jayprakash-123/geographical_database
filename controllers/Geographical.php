<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Geographical extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Geographical_model');
        if(!is_staff_logged_in()) {
                redirect(admin_url(''));
            }
    }

  


    /* List all announcements */
        public function index(){
         if(!is_staff_logged_in()) {
            access_denied('geographical');
         }
         if ($this->input->is_ajax_request()) {
             $this->app->get_table_data(module_views_path('geographical', 'countrytable'));
         }
         $data['title']                 = _l('Geographical');
         $data['countries']          = $this->Geographical_model->get();
        //  echo '<pre>';
        //  print_r($data);
        // echo '</pre>';
        // die();
         $this->load->view('geographical/countrymanage', $data);
    }



     
     public function countryadd($id = ''){

        /* Add announcement from database */
        if ($this->input->post())
         { 
            if ($id == '') {
                if (!has_permission('geographical', '', 'create')) {
                    access_denied('geographical');
                }
                $id = $this->Geographical_model->add($this->input->post());
                    set_alert('success', _l('added_successfully', _l('country')));
                    redirect('geographical/index');

                    /* Update announcement from database */
            } else {
                    if (!has_permission('geographical', '', 'edit')) {
                        access_denied('geographical');
                    }
                    $success = $this->Geographical_model->update($this->input->post(), $id);
                    set_alert('success', _l('updated_successfully', _l('country')));
                redirect('geographical/index');
            }
                }
                   if ($id == '') {
                    $title = _l('add_new', _l(geographical_MODULE_NAME.'country'));
                } else {     
                    $data['countries']        = $this->Geographical_model->get($id);
                    $title = _l('edit', _l(geographical_MODULE_NAME.'country'));
                    $this->load->view('country', $data);
                   
                }
                    $data['title']                 = $title;
                    $data['countries']          = $this->Geographical_model->get();
                    $this->load->view('country', $data);
                    
    }

    public function view($id = ''){
        $data['countries']        = $this->Geographical_model->get($id);
        $title = _l('view', _l(geographical_MODULE_NAME.'geographical'));
        
        $this->load->view('countryview', $data);
       
    }
     

    
            /* Delete announcement from database */
            public function delete($id=''){
            $this->Geographical_model->delete($id);
        
              set_alert('success',_l('deleted',  _l('country')));    
            
             redirect('geographical/index');
        }



        
}



