 <?php $this->load->view('admin/header');?>
<body>
<?php $this->load->view('admin/top_header');?>
<?php $this->load->view('admin/side_header');?>

<?php $session = $this->session->userdata('superadmindet');?>
 
 <div id="wrapper">
<div class="main-content">
<div class="row small-spacing">

  <div class="box-content card white">
<div class="box-title row">
    <div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Edit Symptom Name") ?></h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
            <a href="<?php echo base_url(); ?>admin/symptoms"><button class="btn btn-warning"><?php echo $this->Admin_model->translate("Symptom List") ?></button></a>
    </div>
</div>




  <div class="card-content">


     
         <?php $attributes = array('name' => 'edit_driver', 'id' => 'xin-form', 'autocomplete' => 'off');?>
        <?php $hidden = array('_user' => $session['user_id']);?>
        <?php echo form_open('admin/update_symptom', $attributes, $hidden);?>
        <div class="form-body">
          <div class="row"> 
            <input type="hidden" class = "userid" name="symptomid" value="<?php echo $id ?>">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="first_name"><?php echo $this->Admin_model->translate("Symptom Name") ?></label>
                    <input class="form-control" placeholder="<?php echo $this->Admin_model->translate("Symptom name") ?>" name="symptom_name" type="text" value="<?php echo $symptom_name ?>">
                  </div>
                </div>
            </div>
              
              <div class="row"> 
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="first_name"><?php echo $this->Admin_model->translate("Symptom Name (Arabic)") ?></label>
                    <input class="form-control" placeholder="<?php echo $this->Admin_model->translate("Symptom name (Arabic)") ?>" name="ar_symptom_name" type="text" value="<?php echo $ar_symptom_name ?>">
                  </div>
                </div>
            </div>
              
			 

			  <div class="row"> 
                <div class="col-md-12">
                  <div class="form-group">

                             <label for="xin_employee_password"><?php echo $this->Admin_model->translate("Group name") ?> </label>

                            

                              <input class="form-control" placeholder="<?php echo $this->Admin_model->translate("Group") ?>" name="dis_group" type="text" value="<?php echo $dis_group ?>">


                    <!-- <select class="form-control inputfield select2_2" multiple="" name="dis_group[]">
                    <option value="">  --Select--</option>
                    <option value="A" <?php if(in_array('A', $psy_roles)){ echo 'selected' ; } ?>> Group A</option>
                    <option value="B" <?php if(in_array('B', $psy_roles)){ echo 'selected' ; } ?> > Group B</option>
                    <option value="C" <?php if(in_array('C', $psy_roles)){ echo 'selected' ; } ?> > Group C</option>
                     </select> -->
                    
                  </div>
                </div>
                      
            </div>
             
          
           
        </div>
        <div class="form-actions"> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => 'btn btn-primary', 'content' => '<i class="fa fa fa-check-square-o"></i>'.$this->Admin_model->translate("Save"))); ?> </div>
        <?php echo form_close(); ?> </div>

</div>
</div>
</div>
</div>
</body>


<!-- ================================================== -->
 <?php $this->load->view('admin/footer');?>


<script type="text/javascript">
	/* Add data */ /*Form Submit*/

	$(document).ready(function(){
	 

	/* Add data */ /*Form Submit*/
	$("#xin-form").submit(function(e){
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
				} else {
				toastr.success(JSON.result);
				$('.save').prop('disabled', false);
		 	window.location.href="<?php echo base_url();?>admin/symptoms";
				}
			},
			error: function() 
			{
				toastr.error(JSON.error);
			 
				$('.save').prop('disabled', false);
			} 	        
	   });
	});

	});
 
</script>
 