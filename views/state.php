<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="panel_s">
                    <div class="panel-body">
                      <?php echo form_open($this->uri->uri_string()); ?>
                 
                      <div class="col-md-12"> 
                      <div class="modal-header">
                     
                          <h4 class="modal-title" id="">
                           <?php echo _l('EDIT STATE'); ?>
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
                                   <option value="<?php echo $countries->country_id;?>" <?php if($countries->country_id == $state->country_id){ echo "selected"; } ?>><?php echo $countries->short_name;?></option> 
                                   <?php }?>
                                  </select>
                                  <br/>   <br/>   
                                  <?php echo render_input('state_name',_l('State Name'),(isset($state) ? $state->state_name : '')); ?>
                                  <?php echo render_input('state_code',_l('State Code'),(isset($state) ? $state->state_code : '')); ?>
                                  
                                  <div class="modal-footer">
                                  <a href="<?= site_url('geographical/state/index'); ?>" class='btn btn-info pull-left'>Back To List</a>
                                  <button type="submit" class="btn btn-info pull-right"><?php echo _l('submit'); ?></button>
                                  </div>
                                  </div>
                      <?php echo form_close(); ?>
				            </div>
                 </div>
              </div>
	      	</div>
      </div>
 </div>
			
    
 

<?php init_tail(); ?>




        


