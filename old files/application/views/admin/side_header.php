<style type="text/css">	
.navigation .menu .menu-icon {
    
    top: 15px !important ;
    left: 15px !important ;
    width: 25px !important ;
    font-size: 12px !important ;
    
}

.navigation .menu>li>a {
     
    padding: 14px 30px 14px 50px !important ;
   
}


.navigation .menu>li.active>a {
    background: #1c1d8a !important;
     color: 	white !important	;

}
 



.navigation  li .active a {
      
    background-color: #3889eb !important;
    border-color: #ffff !important;
    color: 	white !important	;
   
}


.main-content {
padding-top: 70px !important ;
}


</style>

<?php  $session = $this->session->userdata('superadmindet');
$logged_in_role =  $this->Admin_model->get_type_name_by_id('user_roles','id',$session['userrole'],'belongs_to')  ;
     
    
    ?>

<div class="main-menu">
<header class="header">
<!-- <img src="assets/images/logo.png"> -->
<button type="button" class="button-close fa fa-times js__menu_close"></button>
</header>
<!-- /.header -->
<div class="content">

<div class="navigation">
<ul class="menu js__accordion">
<li class="logo_sec text-center">
 <img src="<?php echo base_url() ?>assets/images/logo.png" alt="" class="ico-img">
</li>
<li id="home">
<a class="waves-effect" href="<?php echo base_url() ?>admin/dashboard"><img class="menu-icon " src="<?php echo base_url()?>assets/images/sideheader_icons/dashboard.png">
<span> <?php echo $this->Admin_model->translate("Dashboard") ?>  </span></a></li>

 


<li id="1"><a class="waves-effect parent-item" href="<?php echo base_url()?>admin/roles"><img class="menu-icon " src="<?php echo base_url()?>assets/images/sideheader_icons/roles.png"><span> <?php echo $this->Admin_model->translate("Roles & Permissions") ?> </span> </a>
</li>
 
<li id="2">
<a class="waves-effect" href="<?php echo base_url() ?>admin/users"><img class="menu-icon " src="<?php echo base_url()?>assets/images/sideheader_icons/users.png">
<span> <?php echo $this->Admin_model->translate("Users") ?> </span></a></li>


<li id="3">
<a class="waves-effect" href="<?php echo base_url() ?>admin/measurements"><img class="menu-icon " src="<?php echo base_url()?>assets/images/sideheader_icons/users.png">
<span> <?php echo $this->Admin_model->translate("Measurements") ?> </span></a></li>

<?php if ($logged_in_role == 'admin' || $logged_in_role == 'industry' ){ ?>
 
 <li id="4"><a class="waves-effect parent-item js__control" href="#"><img class="menu-icon " src="<?php echo base_url()?>assets/images/sideheader_icons/settings.png"><span><?php echo $this->Admin_model->translate("Industry") ?></span><span class="menu-arrow fa fa-angle-down"></span></a>

<ul class="sub-menu js__content" id="s3">
 

<li   id="s4_6"><a href="<?php echo base_url()?>admin/colors_i"><?php echo $this->Admin_model->translate("Colors") ?></a></li>
<li   id="s4_7"><a href="<?php echo base_url()?>admin/sizes_i"><?php echo $this->Admin_model->translate("Sizes") ?></a></li>



 <li   id="s4_1"><a href="<?php echo base_url()?>admin/categories"><?php echo $this->Admin_model->translate("Categories") ?></a></li>
 <li   id="s4_2" ><a href="<?php echo base_url()?>admin/industry_products"><?php echo $this->Admin_model->translate("Products") ?> </a></li>
  <li   id="s4_3"><a href="<?php echo base_url()?>admin/industry_inventory"><?php echo $this->Admin_model->translate("Inventory") ?></a></li>
  <li   id="s4_4"><a href="<?php echo base_url()?>admin/industry_orders"><?php echo $this->Admin_model->translate("Orders") ?></a></li>
  <li   id="s4_5"><a href="<?php echo base_url()?>admin/industry_report"><?php echo $this->Admin_model->translate("Report") ?></a></li>


</ul>

</li>

<?php } ?>

 <?php if ($logged_in_role == 'admin' || $logged_in_role == 'school' ){ ?>

 
<li id="5"><a class="waves-effect parent-item js__control" href="#"><img class="menu-icon " src="<?php echo base_url()?>assets/images/sideheader_icons/settings.png"><span><?php echo $this->Admin_model->translate("School") ?></span><span class="menu-arrow fa fa-angle-down"></span></a>

<ul class="sub-menu js__content" id="s3">
  <li   id="s5_11" ><a href="<?php echo base_url()?>admin/classTypes"><?php echo $this->Admin_model->translate("Levels") ?> </a></li>

  <li   id="s5_1" ><a href="<?php echo base_url()?>admin/standards"><?php echo $this->Admin_model->translate("Standards") ?> </a></li>
  <li   id="s5_2"><a href="<?php echo base_url()?>admin/schools"><?php echo $this->Admin_model->translate("School List") ?></a></li>
  <li   id="s5_3"><a href="<?php echo base_url()?>admin/uniform_categories"><?php echo $this->Admin_model->translate("Uniform Categories") ?></a></li>
 
  
<li   id="s5_4"><a href="<?php echo base_url()?>admin/colors_s"><?php echo $this->Admin_model->translate("Colors") ?></a></li>
<li   id="s5_5"><a href="<?php echo base_url()?>admin/sizes_s"><?php echo $this->Admin_model->translate("Sizes") ?></a></li>


  <li   id="s5_6"><a href="<?php echo base_url()?>admin/school_products"><?php echo $this->Admin_model->translate("Uniforms") ?></a></li>
  <li   id="s5_7"><a href="<?php echo base_url()?>admin/uniform_school_relation"><?php echo $this->Admin_model->translate("Uniform - School Relations") ?></a></li>
  
  <li   id="s5_8"><a href="<?php echo base_url()?>admin/school_inventory"><?php echo $this->Admin_model->translate("Inventory") ?></a></li>
  <li   id="s5_9"><a href="<?php echo base_url()?>admin/uniform_orders"><?php echo $this->Admin_model->translate("Orders") ?></a></li>
  <li   id="s5_10"><a href="<?php echo base_url()?>admin/school_report"><?php echo $this->Admin_model->translate("Report") ?></a></li>


</ul>

</li>

<?php } ?>


<li id="6"><a class="waves-effect parent-item js__control" href="#"><img class="menu-icon " src="<?php echo base_url()?>assets/images/sideheader_icons/settings.png"><span><?php echo $this->Admin_model->translate("Website CMS") ?></span><span class="menu-arrow fa fa-angle-down"></span></a>
<ul class="sub-menu js__content">

<li id="6_1"><a href="<?php echo base_url()?>admin/users"> <?php echo $this->Admin_model->translate("Home") ?>  </a></li>
<li id="6_2"><a href="<?php echo base_url()?>admin/changepassword"> <?php echo $this->Admin_model->translate("About Us") ?> </a></li>
<li id="6_3"><a href="<?php echo base_url()?>admin/changepassword"> <?php echo $this->Admin_model->translate("Industry") ?> </a></li>
<li id="6_4"><a href="<?php echo base_url()?>admin/changepassword"> <?php echo $this->Admin_model->translate("School") ?> </a></li>
<li id="6_5"><a href="<?php echo base_url()?>admin/changepassword"> <?php echo $this->Admin_model->translate("Contact Us") ?> </a></li>

</ul>

</li>


 <li id="7">
<a class="waves-effect" href="<?php echo base_url() ?>admin/enquiries"><img class="menu-icon " src="<?php echo base_url()?>assets/images/sideheader_icons/dashboard.png">
<span> <?php echo $this->Admin_model->translate("Enquiries") ?>   </span></a></li>



 <li id="8">
<a class="waves-effect" href="<?php echo base_url() ?>admin/translation"><img class="menu-icon " src="<?php echo base_url()?>assets/images/sideheader_icons/dashboard.png">
<span> <?php echo $this->Admin_model->translate("Translation") ?>   </span></a></li>

<li >
<a class="waves-effect" href="<?php echo base_url() ?>admin/logout"><img class="menu-icon " src="<?php echo base_url()?>assets/images/sideheader_icons/logout.png">
<span> <?php echo $this->Admin_model->translate("Logout") ?>   </span></a></li>
</ul>
 
</div>

</div>
<!-- /.content -->
</div>
<!-- /.main-menu -->
