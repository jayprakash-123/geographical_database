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
                           

                            <a href="#" onclick="new_city(); return false;" class="btn btn-info pull-left display-block">
				<?php echo _l('ADD City'); ?>
			</a>

                        </div>
                        <div class="clearfix"></div>
                        <hr class="hr-panel-heading" />
                        <?php } ?>
                        <?php render_datatable(array(
                                _l('City ID'),
                                _l('Country Name'),
                                _l('State Name'),
                                _l('City Name'),
                                _l('City Pin code'),
                                ),'city'); 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <div class="modal" id="city" tabindex="-1" role="dialog">
       <div class="modal-dialog w-25">
<?php echo form_open(admin_url('geographical/city/cityadd'),  array('id'=>'')); ?>
           

			<div class="modal-content ">
				<div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">
                         <?php echo _l('ADD CITY'); ?>
                    </h4>
   
					
				</div>
				<div class="modal-body">
              
					<div class="row">
						<div class="col-md-12">
							 
                            
							<div class="form">
                           
								<div class="col-md-12">
                                 <br/> 
                                 <?php   $countries= $this->Geographical_model->get();?>
                                   <select name="country_id" onchange="showstate(this.value)" class="selectpicker" id="countries" data-width="100%" data-none-selected-text="<?php echo _l('countries'); ?>">
                                    
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
                                <br/> 
                                   <select name="state_id" id="state" style="width: 540px;height: 35px;" class="form-contorl"> 
                                 
                                  <option value="">Select State</option> 
                                  </select>
                                  <br/> <br/> 

                                </div>


                              
                                <div class="col-md-12">
                                    <?php 
									echo render_input('city_name','City Name'); ?>
								</div>
                                <div class="col-md-12">	
								  <div class="form-group" app-field-wrapper="city_pincode">
									   <label for="city_pincode" class="control-label">City Pin Code</label>
										<input type="text" id="city_pincode" name="city_pincode" class="form-control" onkeypress="javascript:return isNumber(event)" minlength="6" maxlength="6">
								   </div> 
								
							   </div>
                                
							</div>
						</div>
					</div>
				</div>
			<div class="modal-footer">
                <a href="<?= site_url('geographical/city/index'); ?>" class='btn btn-info pull-left'>Back To List</a>
			     <button type="submit" class="btn btn-info"><?php echo _l('submit'); ?></button>
			</div>
	</div><!-- /.modal-content -->
            
<?php echo form_close(); ?>
</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
    
 </div>
<?php init_tail(); ?>

<script>
	function isNumber(evt) {
	var iKeyCode = (evt.which) ? evt.which : evt.keyCode
	if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
	return false;

	return true;
	}   
</script>



   
   
	
	<script>
	//getting city acc. to state
	function showstate(value) {
      $.ajax({
	 	type: "POST",
         url:  '<?php echo base_url('admin/geographical/city/show_state')?>',
	 	data:{country_id: value},
	 	success: function(data){
             //alert(data);
			$("#state").html(data);
	 	}
	 	});
	}
	</script>
 


<script>
function new_city(){
    
        $('#additional_city').html('');

        $('#city input[name="city"]').val('');
       

        $('#city').modal('show');
        
    }
</script>



<script>
    $(function(){
        initDataTable('.table-city', window.location.href, [0], [0]);
        
        $(document).on('click','.view-city',function(){
            let id = $(this).data('city');
            $("#cityModal .modal-content").addClass('dt-loader').html('');
            $("#cityModal").modal('show');

            $.ajax({
                url: '<?= admin_url('geographical/city/cityadd') ?>'+id,
                type: 'GET',
                dataType: 'json',
                success:function(resJSON){
                    $("#cityModal .modal-content").removeClass('dt-loader').html(resJSON.html);
                    console.log(resJSON);
                }
            });
        });

       
    });


   
</script>



