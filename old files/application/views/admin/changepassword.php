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
    <div class='col-md-4'><h4><?php echo $this->Admin_model->translate('Change Password') ?></h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
            <a href="<?php echo base_url(); ?>admin/users"><button class="btn btn-warning"><?php echo $this->Admin_model->translate('Users List') ?></button></a>
    </div>
</div>




  <div class="card-content">


     
         <?php $attributes = array('name' => 'edit_user', 'id' => 'xin-form', 'autocomplete' => 'off');?>
        <?php $hidden = array('_user' => $session['user_id']);?>
        <?php echo form_open('admin/update_password', $attributes, $hidden);?>
        <div class="form-body">
          <div class="row"> 

            <input type="hidden" name="userid" value="<?php echo $id ?>">
               
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="first_name"> <?php echo $this->Admin_model->translate('Username') ?></label>
                    <input class="form-control" placeholder="username" name="uname" type="text" readonly value="<?php echo $user_name ?>">
                  </div>
                </div>
               

               <div class="col-md-6">

                  <div class="form-group">
                    <label for="email" class="control-label"><?php echo $this->Admin_model->translate('Contact No') ?></label>
                    <input class="form-control emails" placeholder="Contact No" name="contactno" readonly type="text" value="<?php echo $phone ?>">
                  </div>
                   
                   
                </div>
               
               </div>
              
          <div class="row"> 
              
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="email" class="control-label"><?php echo $this->Admin_model->translate('Email') ?></label>
                    <input class="form-control emails" placeholder="Email" name="email" type="text" readonly value="<?php echo $email ?>">
                  </div>
                  <div id='email_note' ></div>
                   
                </div>
                
              
                
              </div>


                 <div class="row"> 
                <div class="col-md-6">

                  <div class="form-group">
                    <label for="" class="control-label"><?php echo $this->Admin_model->translate('Password') ?></label>
                    <input class="form-control" placeholder="New password" name="newpass" type="password" value="">
                  </div>
              
                </div>
                 
                <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label"><?php echo $this->Admin_model->translate('Confirm Password') ?></label>
                    <input class="form-control" placeholder="confirm password" name="repass" type="password" value="">
                  </div>
              </div>
             
          
           
        </div>
        <div class="form-actions"> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => 'btn btn-primary', 'content' => '<i class="fa fa fa-check-square-o"></i>Save')); ?> </div>
        <?php echo form_close(); ?> </div>


</div>
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
     window.location.href="<?php echo base_url();?>admin/dashboard";
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
 