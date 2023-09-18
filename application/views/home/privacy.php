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
      <?php if($_SESSION["lang"]!='eng') {?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
        <?php } ?>
    <link rel="stylesheet" href="<?php echo base_url() ; ?>assets/home_assets/css/responsive.css">
</head>

<body>

<div class="body-wrapper">    
    
    <!-- HEADER AREA START (header-5) -->
    <?php $this->load->view('home/header'); ?> 
    <!-- HEADER AREA END -->

   

    <div class="ltn__utilize-overlay"></div>

 
    <!-- FEATURE AREA START ( Feature - 3) -->
    
    <!-- FEATURE AREA END -->
   

    <!-- ABOUT US AREA START -->
    <div class="ltn__about-us-area pt-25 pb-120 " id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 align-self-center">
                     <?php if($session =='eng'){
  echo $privacy->privacy_policy ;
 }else{
  echo $privacy->privacy_policy_ar ;
 } ?>
                </div>
                 
            </div>
        </div>
    </div>
    <!-- ABOUT US AREA END -->
 

     <!-- ABOUT US AREA START -->
     
 

 
 

    <!-- FOOTER AREA START -->
 <?php $this->load->view('home/footer')  ?>
   <!-- FOOTER AREA END -->