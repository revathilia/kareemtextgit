 <?php $this->load->view('admin/header');?>
  <body>
 

<div id="single-wrapper">
<form action="<?php echo base_url();?>admin/reset_password" id="login-form" class="frm-single">
<div class="inside">

<div class="title">
	<img src="<?php echo base_url();?>assets/images/logo.png" alt="">
</div>
<!-- /.title -->
<div class="frm-title"><br>Forgot Password</div>
 
 <div class="col-md-12">
                  <div class="form-group">
                    <label for="email" class="control-label">Enter your Email ID</label>
                    <input class="form-control emails" placeholder="Email" name="email" type="email"  value=" ">
                  </div>
                  
                   
                </div>   

<!-- /.clearfix -->
<button type="submit"  class="frm-submit">Submit<i class="fa fa-arrow-circle-right"></i></button>


<!-- /.row -->
<a href="#" class="a-link"><i class="fa fa-key"></i>KareemTex</a>

<div class="pull-right"><a href="<?php echo base_url()	?>admin">Login</a></div>
<div class="frm-footer">KareemTex © 2023</div>
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
				setInterval(function() {
					window.location.href="<?php echo base_url();?>main";
				}, 3000); //3 seconds

	 	
				 
			}
		}
	});
	});
});
</script>
 
</html>