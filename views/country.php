<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="panel_s">
                    <div class="panel-body">
                      <?php echo form_open($this->uri->uri_string()); ?>
                 
				               <div class="modal-header">

                        <h4 class="modal-title" id="myModalLabel">
                          <?php echo _l('EDIT COUNTRY'); ?>
                        </h4>
                    
                        </div>
                        <div class="col-md-6">
                        <br/>
                        <?php echo render_input('iso2',_l('Country Code'),(isset($countries) ? $countries->iso2: '')); ?>
                         </div>
                        <div class="col-md-6">
                        <br/>
                         <?php echo render_input('short_name',_l('Country Name'),(isset($countries) ? $countries->short_name : '')); ?>

                        </div>
                     
                        <div class="modal-footer">
                        <a href="<?= site_url('geographical/index'); ?>" class='btn btn-info pull-left'>Back To List</a>
                          <button type="submit" class="btn btn-info"><?php echo _l('submit'); ?></button>
                        </div>
                      <?php echo form_close(); ?>
				            </div>
                 </div>
              </div>
	      	</div>
      </div>
 </div>
			
    
 

<?php init_tail(); ?>




        


