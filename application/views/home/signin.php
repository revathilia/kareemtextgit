<!doctype html>
<html class="no-js" dir="<?php echo $this->session->userdata('dir') ; ?>" lang="<?php echo $this->session->userdata('lang') ; ?>">


<!-- Mirrored from tunatheme.com/tf/html/vicodin-preview/vicodin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Mar 2023 08:39:14 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $this->Admin_model->translate("KareemTex") ; ?></title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Place favicon.png in the root directory -->
    <link rel="shortcut icon"href="<?php echo base_url() ; ?>assets/home_assets/img/favicon.png" type="image/x-icon" />
    <!-- Font Icons css -->
    <link rel="stylesheet" href="<?php echo base_url() ; ?>assets/home_assets/css/font-icons.css">
    <!-- plugins css -->
    <link rel="stylesheet" href="<?php echo base_url() ; ?>assets/home_assets/css/plugins.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url() ; ?>assets/home_assets/css/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="<?php echo base_url() ; ?>assets/home_assets/css/responsive.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/toastr/toastr.min.css">

</head>

<body>

<!-- HEADER AREA START (header-5) -->
 <?php $this->load->view('home/header'); ?> 
    <!-- HEADER AREA END -->
<br><br><br><br><br><br>
<section class="log">
    <div class="container">
        <div class="row ">
        
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="log2">
                <br>
            <h6 class="text-center">Sign-Up</h6>
            <hr class="li-orangees">
            <br>
            <form id="signin-form" action="<?php echo base_url() ?>home/submitsignup" method="post" class="signin">
                               <fieldset>
     <label class="forget"><?php echo $this->Admin_model->translate("PHONE NUMBER") ; ?></label>
     <br>
     <div class="row g-0 r-ph">
      <div class="col-md-3">
        <p class="de-phone"><img src="<?php echo base_url() ; ?>assets/home_assets/img/sa.png" width="20px" height="20px">&nbsp;&nbsp;+966</p></div>
      <div class="col-md-9 ph-s">
    <input placeholder="" type="tel" tabindex="3" name="phone" id="phone" class="form-control" required>
    </div>
    </div> 
 
    </fieldset>
    
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending" class="btn-ori">Sign-Up</button>
    </fieldset>
    <div class="row">
      <div class="col-md-6">
         
</div>
<div class="col-md-6">
        <a href="<?php echo base_url() ; ?>home/login" style="float: right" class="forget">
        <?php echo $this->Admin_model->translate(" Already Registered ? Login") ; ?>
       </a>
</div>
</div>
                        </form>

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
    <script src="<?php echo base_url() ; ?>assets/home_assets/js/plugins.js"></script>
    <!-- Main JS -->
    <script src="<?php echo base_url() ; ?>assets/home_assets/js/main.js"></script>
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
		$("#signin-form").submit(function (e) {
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
						toastr.success(JSON.result);
						$('.save').prop('disabled', false);
						


                        setInterval(function() {
                  window.location.href = "<?php echo base_url();?>home/login";
                }, 3000); //3 seconds

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