<?php
$session = $this->session->userdata('lang');
if (empty($session)) {
	# code...
$this->session->set_userdata('lang', 'eng');
$this->session->set_userdata('dir', 'ltr');
}
?>
<!DOCTYPE html>
<html lang="<?php echo $this->session->userdata('lang') ?>" dir="<?php echo $this->session->userdata('dir') ?>">



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
<?php if($this->session->userdata('lang') !='eng') {?>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css"
		integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
	<?php } ?>
</head>

<body>

<div class="body-wrapper">    
<div class="<?php if($session == 'eng'){ echo "header-blue" ;} else{ echo "blue-header" ;}?>">
    <!-- HEADER AREA START (header-5) -->
  <?php $this->load->view('home/header2')  ?>
    <!-- HEADER AREA END -->

   <section class="ban-sec">
    <div class="container hero">
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="le-text">
                      <h6 class="abk">About Kareemtex</h6>
                      <h5 class="ind">Industrial</h5>
                      <h3 class="uni">Uniforms</h3>
                      <a href="<?php echo base_url()?>home/industry" class="btn btn-orange">Shop Now &nbsp;&nbsp;<img src="<?php echo base_url()?>assets/home_assets/img/home/ar-ri.png" width="7px" height="7px"></a>
</div>
                    </div>
                    <div class="col-md-4 col-lg-4 ">
                                      </div>
                    <div class="col-md-4 col-lg-4 ">
                    <div class="ri-text">
                  
                      <h5 class="ind">School</h5>
                      <h3 class="uni"> Uniforms</h3>
                      <a href="<?php echo base_url()?>home/school" class="btn btn-blue">Shop Now &nbsp;&nbsp;<img src="<?php echo base_url()?>assets/home_assets/img/home/ar-ri.png" width="7px" height="7px"></a>
                        </div>
</div>  
                    </div>
                </div>
            </div>
             <div class="iphone-mockup">
             <?php if($_SESSION["lang"]!='eng') {?>
              <img src="<?php echo base_url()?>assets/home_assets/img/peo.png" class="im-dd">
    <?php } ?>
    <?php if($_SESSION["lang"]=='eng') {?>
      <img src="<?php echo base_url()?>assets/home_assets/img/home/m1.png" class="im-dd">
    <?php } ?>
						
                          <!--  <div class="screen">
							</div>
							
							-->
                        </div>
     
             <div class="box-header">
          <div class="box-header-title">
            <h1>OUR EXPERIENCE IS THE BEST</h1>
          </div>
        </div>
</div>
</section>
    
    <!-- All JS Plugins -->
    <script src="<?php echo base_url()?>assets/home_assets/js/plugins.js"></script>
    <!-- Main JS -->
    <script src="<?php echo base_url()?>assets/home_assets/js/main.js"></script>
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
</body>


</html>



