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
    <div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Edit Disability Name") ?></h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
            <a href="<?php echo base_url(); ?>admin/disabilities"><button class="btn btn-warning"><?php echo $this->Admin_model->translate("Disability List") ?></button></a>
    </div>
</div>




  <div class="card-content">


     
         <?php $attributes = array('name' => 'edit_driver', 'id' => 'xin-form', 'autocomplete' => 'off');?>
        <?php $hidden = array('_user' => $session['user_id']);?>
        <?php echo form_open('admin/update_disability', $attributes, $hidden);?>
        <div class="form-body">
          <div class="row"> 
            <input type="hidden" class = "userid" name="disabilityid" value="<?php echo $id ?>">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="first_name"><?php echo $this->Admin_model->translate("Disability Name") ?></label>
                    <input class="form-control" placeholder="<?php echo $this->Admin_model->translate("Disability name") ?>" name="disability_name" type="text" value="<?php echo $disability_name ?>">
                  </div>
                </div>
            </div>

            <div class="row"> 
           
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="first_name"><?php echo $this->Admin_model->translate("Disability Name") ?></label>
                    <input class="form-control" placeholder="<?php echo $this->Admin_model->translate("Disability name (Arabic)") ?>" name="ar_disability_name" type="text" value="<?php echo $ar_disability_name ?>">
                  </div>
                </div>
            </div>
              
			 

			  <div class="row"> 
                <div class="col-md-12">
                  <div class="form-group">

                             <label for="xin_employee_password"><?php echo $this->Admin_model->translate("Disability Group") ?> </label>

                             <?php $psy_roles = explode( ',', $dis_group)  ?>

                    <select class="form-control inputfield"  name="dis_group">
                    <option value="">  --Select--</option>
                    <option value="A" <?php if($dis_group == 'A'){ echo 'selected' ; } ?>> Group A</option>
                    <option value="B" <?php if($dis_group == 'B'){ echo 'selected' ; } ?> > Group B</option>
                    <option value="C" <?php if($dis_group == 'C'){ echo 'selected' ; } ?> > Group C</option>
                     </select>
                    
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
		 	window.location.href="<?php echo base_url();?>admin/disabilities";
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
 