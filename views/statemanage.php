<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); 
?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <?php if(has_permission('geographical','','create')){ ?>
                        <div class="_buttons">
                     <?php// print_r($state);die();?>
                        
                            <a href="#" onclick="new_state(); return false;" class="btn btn-info pull-left display-block">
				<?php echo _l('ADD State'); ?>
			</a>

                        </div>
                        <div class="clearfix"></div>
                        <hr class="hr-panel-heading" />
                        <?php } ?>
                        <?php render_datatable(array(
                                _l('State ID'),
                                _l('Country Name'),
                                _l('State Name'),
                                _l('State Code'),
                                ),'state'); 
                           
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

                    <div class="modal" id="state" tabindex="-1" role="dialog">
                  <div class="modal-dialog w-25">
			<?php echo form_open(admin_url('geographical/state/stateadd'),  array('id'=>'')); ?>
         

			<div class="modal-content ">
				<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">
          <?php echo _l('ADD STATE'); ?>
        </h4>
        
        </div>
				<div class="modal-body">
                    <div class="row">
						<div class="col-md-12">
							<div id="additional_state"></div>  
                            
							<div class="form">
                            <div class="col-md-12">
                            <br/>  
                                   <?php   $countries= $this->Geographical_model->get();?>

                                   
                                <select name="country_id" class="selectpicker" id="countries" data-width="100%" data-none-selected-text="<?php echo _l('countries'); ?>"> 
                                  <option value="">Select Country</option> 
                                  <?php
                                   foreach($countries as $countries)
                                   { ?>
                                   <option value="<?php echo $countries->country_id;?>"><?php echo $countries->short_name;?></option> 
                                   <?php }?>
                                   </select>
                                   <br/>   <br/>   
                                    </div>
							
                                    <div class="col-md-12">
									<?php 
									echo render_input('state_name','State Name'); ?>
								</div>
                                <div class="col-md-12">
									<?php 
									echo render_input('state_code','State Code'); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
                <a href="<?= site_url('geographical/state/index'); ?>" class='btn btn-info pull-left'>Back To List</a>
					<button type="submit" class="btn btn-info"><?php echo _l('submit'); ?></button>
				</div>
			</div><!-- /.modal-content -->
            
			<?php echo form_close(); ?>
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
    
 </div>
<?php init_tail(); ?>
<script>
function new_state(){
    
        $('#additional_state').html('');

        $('#state input[name="state"]').val('');
       

        $('#state').modal('show');
        
    }
</script>



<script>
    $(function(){
        initDataTable('.table-state', window.location.href, [0], [0]);
        
        $(document).on('click','.view-state',function(){
            let id = $(this).data('state');
            $("#stateModal .modal-content").addClass('dt-loader').html('');
            $("#stateModal").modal('show');

            $.ajax({
                url: '<?= admin_url('geographical/state/stateadd') ?>'+id,
                type: 'GET',
                dataType: 'json',
                success:function(resJSON){
                    $("#stateModal .modal-content").removeClass('dt-loader').html(resJSON.html);
                    console.log(resJSON);
                }
            });
        });

       
    });


   
</script>