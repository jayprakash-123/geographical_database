<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
    <div class="content">
       
                        <?php if(has_permission('geographical','','create')){ ?>

                       

                        </div>
                        <div class="clearfix"></div>
                        <hr class="hr-panel-heading" />
                        <?php } ?>
                        <?php render_datatable(array(
                                _l('City ID'),
                                _l('Country Name'),
                                _l('State Name'),
                                _l('State Code'),
                                _l('City Name'),
                                _l('City Pin code'),
                                ),'city'); 
                        ?>
                    </div>
    </div>

                    <div class="modal" id="search" tabindex="-1" role="dialog">
                  <div class="modal-dialog w-25">
			<?php echo form_open(admin_url('geographical/search/index'),  array('id'=>'')); ?>
           

			<div class="modal-content ">
				<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">
          <?php echo _l('SEARCH'); ?>
        </h4>
   
					
				</div>
				<div class="modal-body">
              
					<div class="row">
						<div class="col-md-12">
							<div id="additional_country"></div>  
                            
							<div class="form">
                          
								<div class="col-md-12">
                                     <?php echo render_input('country_code',''); ?>
								</div>
                               
								
								
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
              
				<button type="submit" class="btn btn-info"><?php echo _l('search'); ?></button>
				</div>
			</div><!-- /.modal-content -->
            
			<?php echo form_close(); ?>
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
    
 </div>
<?php init_tail(); ?>
<script>
function new_show(){
    
        $('#additional_search').html('');

        $('#search input[name="search"]').val('');
       

        $('#search').modal('show');
        
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
                url: '<?= admin_url('geographical/search/index') ?>'+id,
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

