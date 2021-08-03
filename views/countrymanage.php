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
                            
                       
                            <a href="#" onclick="new_country(); return false;" class="btn btn-info pull-left display-block">
				<?php echo _l('ADD Country'); ?>
			</a>
             </div>
                        <div class="clearfix"></div>
                        <hr class="hr-panel-heading" />
                        <?php } ?>
                        <?php render_datatable(array(
                                _l('Country ID'),
                                _l('Country Name'),
                                _l('Country Code'),
                            
                            ),'country'); 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

                    <div class="modal" id="country" tabindex="-1" role="dialog">
                  <div class="modal-dialog w-25">
			<?php echo form_open(admin_url('geographical/countryadd'),  array('id'=>'')); ?>
           

			<div class="modal-content ">
				<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">
          <?php echo _l('ADD COUNTRY'); ?>
        </h4>
   
					
				</div>
				<div class="modal-body">
              
					<div class="row">
						<div class="col-md-12">
							<div id="additional_country"></div>  
                            
							<div class="form">
                          
								<div class="col-md-12">
                                   <?php 
									echo render_input('iso2','Country Code'); ?>
								</div>
                                <div class="col-md-12">
									<?php 
									echo render_input('short_name','Country Name'); ?>
								</div>
								
								
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
                <a href="<?= site_url('geographical/index'); ?>" class='btn btn-info pull-left'>Back To List</a>
				<button type="submit" class="btn btn-info"><?php echo _l('submit'); ?></button>
				</div>
			</div><!-- /.modal-content -->
            
			<?php echo form_close(); ?>
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
    
 </div>
<?php init_tail(); ?>
<script>
function new_country(){
    
        $('#additional_country').html('');

        $('#country input[name="country"]').val('');
       

        $('#country').modal('show');
        
    }
</script>



<script>
    $(function(){
        initDataTable('.table-country', window.location.href, [0], [0]);
        
        $(document).on('click','.view-country',function(){
            let id = $(this).data('country');
            $("#countryModal .modal-content").addClass('dt-loader').html('');
            $("#countryModal").modal('show');

            $.ajax({
                url: '<?= admin_url('geographical/countryadd') ?>'+id,
                type: 'GET',
                dataType: 'json',
                success:function(resJSON){
                    $("#countryModal .modal-content").removeClass('dt-loader').html(resJSON.html);
                    console.log(resJSON);
                }
            });
        });

       
    });


   
</script>