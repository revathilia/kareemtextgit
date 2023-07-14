<!doctype html>
<html class="no-js" dir="<?php echo $this->session->userdata('dir')?>" lang="<?php echo $this->session->userdata('lang')?>">


<!-- Mirrored from tunatheme.com/tf/html/vicodin-preview/vicodin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Mar 2023 08:39:14 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kareemtex</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Place favicon.png in the root directory -->
    <link rel="shortcut icon"href="<?php echo base_url()?>assets/home_assets/img/favicon.png" type="image/x-icon" />
    <!-- Font Icons css -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/home_assets/css/font-icons.css">
    <!-- plugins css -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/home_assets/css/plugins.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/home_assets/css/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/home_assets/css/responsive.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/toastr/toastr.min.css">
</head>

<body>

<!-- HEADER AREA START (header-5) -->
 
 <?php $this->load->view('home/header'); ?> 
    <!-- HEADER AREA END -->
<br><br><br><br>
<section class="log">
    <div class="container">
        <div class="row ">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="log2">
            <div class="row ">
        <div class="col-md-1"></div>
        <div class="col-md-8">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
       
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Social Media</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Login</button>
  </li>
  </ul>
  </div>
</div>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

  <div class="row">
    <div class="col-md-10">
      
            <p class="text-left in-box"><img src="<?php echo base_url()?>assets/home_assets/img/icons/fb.png" width="30px" height="30px">&nbsp;&nbsp;Continue with Facebook</p>

            <p class="text-left in-box"><img src="<?php echo base_url()?>assets/home_assets/img/icons/goo.png" width="30px" height="30px">&nbsp;&nbsp;Continue with Google</p>
            <p class="text-left in-box"><img src="<?php echo base_url()?>assets/home_assets/img/icons/app.png" width="30px" height="30px">&nbsp;&nbsp;Continue with Apple</p>
            <p class="text-left in-box"><img src="<?php echo base_url()?>assets/home_assets/img/icons/ph.png" width="30px" height="30px">&nbsp;&nbsp;Continue with Mobile Number</p>
          

</div>
</div>
  </div>
  <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  
    <form id="login-form" action="<?php echo base_url() ?>home/sentotp" method="post">
    
     <fieldset>
     <label class="forget">PHONE NUMBER</label>
     <br>
      <input placeholder="" type="tel" tabindex="3" name="phone" id="phone" class="form-control" required>
    </fieldset>
    
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending" class="btn-ori">Proceed</button>
    </fieldset>
    <div class="row">
      <div class="col-md-6">
         
</div>
<div class="col-md-6">
        <a href="<?php echo base_url()?>home/signup" style="float: right" class="forget">Create an Account</a>
</div>
</div>
  </form>
  </div>
 
</div>
</div>
</div>
</div>
</div>
</section>


 <!-- preloader area start -->
 <div class="preloader d-none" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    </div>
    <!-- preloader area end -->

    <!-- All JS Plugins -->
    <script src="<?php echo base_url()?>assets/home_assets/js/plugins.js"></script>
    <!-- Main JS -->
    <script src="<?php echo base_url()?>assets/home_assets/js/main.js"></script>
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

	$(document).ready(function () {
		$("#login-form").submit(function (e) {

      localStorage.phone = $('#phone').val();


			var fd = new FormData(this);
			var obj = $(this),
				action = obj.attr('name');
			fd.append("is_ajax", 1);

			fd.append("form", action);
			e.preventDefault();
			$('.save').prop('disabled', true);

			$.ajax({
				url: e.target.action,
				type: "POST",
				data: fd,
				contentType: false,
				cache: false,
				processData: false,
				success: function (JSON) {
					if (JSON.error != '') {
						toastr.error(JSON.error);
						$('.save').prop('disabled', false);
					} else {
						// toastr.success(JSON.result);
						$('.save').prop('disabled', false);
            localStorage.phone = JSON.result;
						window.location.href = "<?php echo base_url();?>home/otp";
					}
				},
				error: function () {
					toastr.error(JSON.error);

					$('.save').prop('disabled', false);
				}
			});
		});

	});
</script>

  <script type="text/javascript">
function langAjax($lang){
 
 
    $.ajax({ 
        type: "POST",
          url : "<?php echo base_url(); ?>admin/changelanguage",
            data : {lang:$lang},
 
    }).done(function(response){
 location.reload() ;
       
    });

}

</script>