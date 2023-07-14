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
    <div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Add user") ?></h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
            <a href="<?php echo base_url(); ?>admin/users"><button class="btn btn-warning"><?php echo $this->Admin_model->translate("User List") ?></button></a>
    </div>
</div>




  <div class="card-content">
         <?php $attributes = array('name' => 'add_staff', 'id' => 'xin-form', 'autocomplete' => 'off');?>
        <?php $hidden = array('_user' => $session['user_id']);?>
        <?php echo form_open('admin/adduser', $attributes, $hidden);?>
        <div class="form-body">
          <div class="row"> 
               
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="first_name"> <?php echo $this->Admin_model->translate("Userame") ?></label>
                    <input class="form-control inputfield" placeholder="username" name="user_name" type="text" value="">
                  </div>
                </div>
               
               
               </div>
              
          <div class="row"> 
              
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="email" class="control-label"><?php echo $this->Admin_model->translate("Email") ?></label>
                    <input class="form-control emails inputfield" placeholder="Email" name="email" type="text" value="">
                  </div>
                  <div id='email_note' ></div>
                   
                </div>
              
              
                <div class="col-md-6">

                <div class="form-group">

<label for="xin_employee_password"><?php echo $this->Admin_model->translate("Select Role") ?> </label>

<select class="form-control inputfield"  name="role">
<option value="">  --Select--</option>

<?php foreach ($roles as  $value) { ?>
<option value="<?php echo $value['id'] ?>"><?php echo $this->Admin_model->translate($value['role_name']) ?> - <?php echo ucfirst($this->Admin_model->translate($value['belongs_to'])) ?></option>



<?php } ?>  </select>

</div>
                   
                </div>
              </div>
              
               <div class="row"> 
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="xin_employee_password"><?php echo $this->Admin_model->translate("Password") ?></label>
                    <input class="form-control inputfield" placeholder="Password" name="password" type="password" value="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="confirm_password" class="control-label"> <?php echo $this->Admin_model->translate("Confirm Password") ?></label>
                    <input class="form-control inputfield" placeholder="Confirm Password" name="ucpassword" type="password" value="">
                  </div>
                </div>
              
            </div>
 
          


             
              
               
        </div>
        <div class="form-actions"> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => 'btn btn-primary btn-block save', 'content' => '<i class="fa fa fa-check-square-o"></i>Save')); ?> </div>
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
    fd.append('submit','true');
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
				window.location.href="<?php echo base_url();?>admin/users";
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

// jQuery(".emails").blur(function(){
// var email = jQuery(".emails").val();
// jQuery.post("<?php echo base_url(); ?>admin/checkemail",
// {
// email: email
// },
// function(JSON){
//    if (JSON.error != '') {
//         toastr.error(JSON.error);
//         $('.save').prop('disabled', true);
//         }  else{
//           $('.save').prop('disabled', false);
//         }
//  });
// });

// $(".inputfield").on("keyup change", function(e) {


// var form = $("#xin-form")[0];
// var formData = new FormData(form);

// formData.append('submit','false');
//    //alert(this);
//       $.ajax({
//             url: '<?php echo base_url()?>'+'admin/adduser',
//             type: "POST",
//             data:   formData,
//             dataType: "JSON",
//             processData: false ,
//             contentType: false,
//             success: function(JSON)
//       {
//         if (JSON.error != '') {
//         toastr.error(JSON.error);
//         $('.save').prop('disabled', true);
//         } else {
         
//         $('.save').prop('disabled', false);
        
//         }
//       }
 
//     })
// }) ;


</script>
 