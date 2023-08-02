<!-- <link rel="stylesheet" href="<?php echo base_url();?>assets/tagsinput/select2.min.css"> -->
<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> <?php echo $this->Admin_model->translate("Add Uniform To School") ?>  </h4>
      </div>
      <div class="modal-body">

 
<br/>
 
<form class="order_form" id="status_form" method="POST" action="<?php echo base_url();?>admin/add_uniform_to_school">

  <input type="hidden" name="uniformid"   value="<?php echo $uniformid ?>">

			<div class="row"> 
                <div class="col-md-12">
                  <div class="form-group">

                    <label for="xin_employee_password"><?php echo $this->Admin_model->translate("Selected Uniform") ?> </label>

                    <select class="form-control" name="uniform_id">
                    <option value="">  --Select--</option>

                    <?php 

                    foreach ($uniforms as  $uniform) { 

                    	if($uniform['id'] == $uniformid) {?>
                     <option value="<?php echo $uniform['id'] ?>" selected ><?php echo $uniform['product_name'] ?></option>
                   <?php  } } ?>
                   
                    
                     </select>
                    
                  </div>
                </div>
                      
            </div>

            <div class="row"> 
                <div class="col-md-12">
                  <div class="form-group">

                    <label for="xin_employee_password"><?php echo $this->Admin_model->translate("Select School") ?> </label>

                    <select class="form-control schoolname" name="school_id" data-uniform="<?php echo $uniformid ?>">
                    <option value="">  --Select--</option>

                    <?php 

                    foreach ($schools as  $school) { 

                    	?>
                     <option value="<?php echo $school['id'] ?>"  ><?php echo $school['school_name'] ?></option>
                   <?php   } ?>
                   
                    
                     </select>
                    
                  </div>
                </div>
                      
            </div>


            <div class="row" id="class_level_division" style="display: 	none"	> 
                <div class="col-md-12">
                  <div class="form-group">

                    <label for="xin_employee_password"><?php echo $this->Admin_model->translate("Select Class Level") ?> </label>
                  

                    <select class="select2_2 form-control" multiple="" name="class_level[]" id="class_level">
                    <option value="">  --Select--</option>

                    
                    
                     </select>
                    
                  </div>
                </div>
                      
            </div>


 
 
 
 
<p class="text-center"><button type="submit" class="btn btn-block save"><?php echo $this->Admin_model->translate("Save") ?></button></p>

</form>
</div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">



<?php echo $this->Admin_model->translate("Close") ?></button>
    
      </div>

<!--        

   <script src="<?php echo base_url();?>assets/tagsinput/select2.min.js"></script>
 
   <script src="<?php echo base_url();?>assets/tagsinput/form.demo.min.js"></script> -->

 <script type="text/javascript">
/* Add data */ /*Form Submit*/
 


$(document).ready(function(){


/* Add data */ /*Form Submit*/
$("#status_form").submit(function(e){
var fd = new FormData(this);
var obj = $(this), action = obj.attr('name');
fd.append("is_ajax", 1);

fd.append("form", action);
e.preventDefault();
$('.save').prop('disabled', true);

$.ajax({
url: e.target.action,
type: "POST",
data:  fd,
contentType: false,
cache: false,
processData:false,
success: function(JSON)
{
if (JSON.error != '') {
toastr.error(JSON.error);
$('.save').prop('disabled', false);
} else{

//$('#boostrapModal-1').remove();
toastr.success(JSON.result);
$('.save').prop('disabled', false);
 
//$('#modal-container').remove();
  // $('#boostrapModal-1').modal('toggle');
    //location.reload();

localStorage.setItem("uniformId",  <?php echo $uniformid ; ?>);
localStorage.setItem("uniform",  'UniformData');
location.reload();



} 
}           
});
});

});


$(document).on('change',".schoolname", function()
   { 
    var schoolid  = $(this).val();
    var uniformId  = $(this).data('uniform');
    
    $.ajax({  
    url:"<?php echo base_url(); ?>admin/get_class_types",  
    method:"POST",  
    data:{schoolid:schoolid,uniformid:uniformId},  
    success:function(data)
    { 

      $('#class_level').html(data);
      $('#class_level_division').show();

    }
    
    });
 


   });
 

$( "#class_level" ).select2();
$( "#class_level" ).select2({ width:'100%' });
  



      </script>


