 <?php $this->load->view('admin/header');?>
  <body>
 

<div id="single-wrapper">
<form action="admin/login" id="login-form" class="frm-single">
<div class="inside">

<div class="title">
	<img src="<?php echo base_url();?>assets/images/logo.png" alt="">
</div>
<!-- /.title -->
<div class="frm-title"><br>

<?php if($user_type == 'school'){
echo $this->Admin_model->translate("School Admin Login") ;
}else if($user_type == 'industry'){
	echo $this->Admin_model->translate("Industry Admin Login") ;
}else{
	echo $this->Admin_model->translate("Super Admin Login") ;
} ?>

</div>
<!-- /.frm-title -->
<div class="frm-input"><input type="text" name="username" placeholder="<?php echo $this->Admin_model->translate("Username") ?>" class="frm-inp"><i class="fa fa-user frm-ico"></i></div>
<!-- /.frm-input -->
<div class="frm-input"><input type="password" name="password" placeholder="<?php echo $this->Admin_model->translate("Password") ?>" class="frm-inp"><i class="fa fa-lock frm-ico"></i></div>

<input type="hidden" name="user_type" value="<?php echo $user_type ?>">

<?php if($user_type == 'school'){ ?>
	<!-- /.clearfix -->
<button type="submit"  class="btn btn-primary btn-block btn-sm"><?php echo $this->Admin_model->translate("Login") ?> <i class="fa fa-arrow-circle-right"></i></button>
 
<?php }else if($user_type == 'industry'){ ?>
	<!-- /.clearfix -->
<button type="submit"  class=" btn btn-warning btn-block btn-sm"><?php echo $this->Admin_model->translate("Login") ?> <i class="fa fa-arrow-circle-right"></i></button>
	 
<?php }else{ ?>

	<!-- /.clearfix -->
<button type="submit"  class=" btn btn-success btn-block btn-sm"><?php echo $this->Admin_model->translate("Login") ?> <i class="fa fa-arrow-circle-right"></i></button>
 
	<?php } ?>
	<br>




<!-- /.row -->
<a href="<?php echo base_url()?>main" class="a-link"><i class="fa fa-home"></i><?php echo $this->Admin_model->translate("Back to Home") ?></a>

<div class="pull-right"><a href="<?php echo base_url()	?>admin/forgotpassword"><?php echo $this->Admin_model->translate("Forgot Password ?") ?></a></div>
<div class="frm-footer"><?php echo $this->Admin_model->translate("KareemTex © 2023") ?></div>
<!-- /.footer -->
</div>
<!-- .inside -->
</form>
<!-- /.frm-single -->
</div><!--/#single-wrapper -->

 </body>
<!-- 
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url();?>assets/scripts/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/scripts/modernizr.min.js"></script>
<script src="<?php echo base_url();?>assets/plugin/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/plugin/nprogress/nprogress.js"></script>
<script src="<?php echo base_url();?>assets/plugin/waves/waves.min.js"></script>

<script src="<?php echo base_url();?>assets/scripts/main.min.js"></script>
 

<script type="text/javascript" src="<?php echo base_url();?>assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<script  type="text/javascript" src="<?php echo base_url();?>assets/vendor/libs/popper/popper.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/vendor/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/vendor/jquery/jquery-3.2.1.min.js"></script> 



<script type="text/javascript" src="<?php echo base_url();?>assets/toastr/toastr.min.js"></script> 
<script type="text/javascript">
$(document).ready(function(){
	toastr.options.closeButton = true;
	toastr.options.progressBar = true;
	toastr.options.timeOut = 3000;
	toastr.options.preventDuplicates = true;
	toastr.options.positionClass = "toast-top-center";
	var site_url = '<?php echo site_url(); ?>';
});
</script>


<script type="text/javascript">
	$(document).ready(function(){
	$("#login-form").submit(function(e){
		$('.save').prop('disabled', true);
		 
	/*Form Submit*/

//alert("hello");
	e.preventDefault();

	var obj = $(this), action = obj.attr('name'), redirect_url = obj.data('redirect'), form_table = obj.data('form-table'),  is_redirect = obj.data('is-redirect');
	
	$.ajax({
		type: "POST",
		url: e.target.action,
		data: obj.serialize()+"&is_ajax=1&form="+form_table,
		cache: false,

		
		success: function (JSON) {


			if (JSON.error != '') {
				toastr.error(JSON.error);
			 	$('.save').prop('disabled', false);
				 
				 
			} else {
				toastr.success(JSON.result);
				$('.save').prop('disabled', false);
				window.location.href="<?php echo base_url();?>admin/dashboard";
				 
			}
		}
	});
	});
});
</script>

 
</html>