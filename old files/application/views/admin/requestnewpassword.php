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
    <div class='col-md-4'><h4>Request New Password</h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
          
    </div>

	 <?php if($requested){  ?>

		 <button class="btn btn-danger btn-block"> <?php echo $requested ?> </button>
		 
		 <?php }else{  ?>
</div>




  <div class="card-content">


     
         <?php $attributes = array('name' => 'edit_user', 'id' => 'xin-form', 'autocomplete' => 'off');?>
        <?php $hidden = array('_user' => $session['user_id']);?>
        <?php echo form_open('admin/request_password', $attributes, $hidden);?>
        <div class="form-body">
          <div class="row"> 

            <input type="hidden" name="userid" value="<?php echo $id ?>">
             <div class="col-md-12">
                  <div class="form-group">
                    <label for="email" class="control-label">Enter your Email ID</label>
                    <input class="form-control emails" placeholder="Email" name="email" type="email"  value=" ">
                  </div>
                  <div id='email_note' ></div>
                   
                </div>          
               
               </div>
              
        

 
        <div class="form-actions"> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => 'btn btn-primary btn-block save', 'content' => '<i class="fa fa fa-check-square-o"></i>Send Request')); ?> </div>
        <?php echo form_close(); ?> </div>

</div>
 <?php }?>

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
     window.location.href="<?php echo base_url();?>admin/changerequest";
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


jQuery(".emails").blur(function(){
var email = jQuery(".emails").val();
jQuery.post("<?php echo base_url(); ?>admin/emailexists",
{
email: email
},
function(JSON){
   if (JSON.error != '') {
        toastr.error(JSON.error);
        $('.save').prop('disabled', true);
        }  else{
          $('.save').prop('disabled', false);
        }
 });
});
</script>
 