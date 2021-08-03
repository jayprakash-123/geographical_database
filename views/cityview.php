<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="panel_s">
                    <div class="panel-body">
                      <?php echo form_open($this->uri->uri_string()); ?>
                      <div class="col-md-13">  
				               <div class="modal-header">

                        <h4 class="modal-title" id="">
                          <?php echo _l('VIEW DATA'); ?>
                        </h4>
                        </div>
                        </div>
                              <div class="col-md-12">  
                               <br/>   
                                 <?php   $countries= $this->Geographical_model->get();?>
                                <h5>Select Country </h5>
                               <select name="country_id" class="selectpicker" id="countries" data-width="100%" data-none-selected-text="<?php echo _l('countries'); ?>">
                
                                 <option value="">Select Country</option> 
                                 <?php
                                  foreach($countries as $countries)
                                  { ?>
                                  <option value="<?php echo $countries->country_id;?>" <?php if($countries->country_id == $city->country_id){ echo "selected"; } ?>><?php echo $countries->short_name;?></option> 
                                  <?php }?>
                                 </select>
                                 
                                 </div> 

                                 <div class="col-md-12">
                                <br/> 
                                   <?php   $state= $this->State_model->get();?>
                                   <h5>Select State </h5>

                                   <select name="state_id" class="selectpicker" id="state_id" data-width="100%" data-none-selected-text="<?php echo _l('state'); ?>"> 
                                 
                                  <option value="">Select State</option> 
                               
                                  <?php
                                   foreach($state as $state)
                                   { ?>
                                   <option value="<?php echo $state->state_id;?>" <?php if($state->state_id == $city->state_id){ echo "selected"; } ?>><?php echo $state->state_name;?></option> 
                              
                                   <?php }?>
                                  </select>
                                   <br/>   <br/> 
                                   </div>
				   
           
                                
                                  <div class="col-md-12">
                                  <?php echo render_input('city_name',_l('City Name'),(isset($city) ? $city->city_name : '')); ?>
                                  </div>
                                  <div class="col-md-12">
                                  <?php echo render_input('city_pincode',_l('City Pincode'),(isset($city) ? $city->city_pincode : '')); ?>
                                  </div>
                          <div class="modal-footer">
                                <a href="<?= site_url('geographical/city/index'); ?>" class='btn btn-info'>Back To List</a>
    
                        </div>
                      <?php echo form_close(); ?>
				            </div>
                 </div>
              </div>
	      	</div>
      </div>
 </div>
			
    
 

<?php init_tail(); ?>




        


