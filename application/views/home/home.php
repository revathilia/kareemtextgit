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


    <!-- SLIDER AREA START (slider-3) -->
    <div class="ltn__slider-area ltn__slider-3  section-bg-1">
        <div class="ltn__slide-one-active slick-slide-arrow-1 slick-slide-dots-1">
            <?php if(!empty($banner)){

             ?>
 
<?php foreach ($banner as  $bvalue) {

?> 
            <!-- ltn__slide-item -->
            <div class="ltn__slide-item ltn__slide-item-2  ltn__slide-item-3-normal--- ltn__slide-item-3 bg-image bg-overlay-theme-black-60---" data-bs-bg="<?php echo base_url() ; ?>uploads/images/banners/<?php echo $bvalue['image'] ?>" style="height:600px">
                <div class="ltn__slide-item-inner  text-left hero2">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 align-self-center">
                                <div class="slide-item-info">
                                    <div class="slide-item-info-inner ltn__slide-animation">
                                        <h5 class="ab"><?php echo $this->Admin_model->translate("About Kareemtex") ; ?></h5>
                                        <h4 class="ab2"> 
                                              <?php 
if($this->session->userdata('lang') == 'ar'){
     echo $bvalue['banner_content_ar'] ;
}else{
     echo  $bvalue['banner_content'];
}
                                                    ?>

                                                     </h4>
                                        <div class="btn-wrapper animated">
                                            <a href="<?php echo base_url()?>home/contact" class=" btn btn-orange btn-h" ><?php echo $this->Admin_model->translate("Contact Us") ; ?></a>
                                          
                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php } }  ?>
         
         
           
        </div>
    </div>
    <!-- SLIDER AREA END -->
    <!-- FEATURE AREA START ( Feature - 3) -->
    <div class="ltn__feature-area section-bg-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <?php foreach($values as $offers){ ?>

                            <div class="col-md-3">
                            <div class="ltn__feature-icon">
                              <p class="text-center">  <img src="<?php echo base_url() ; ?>uploads/images/<?php echo $offers['logo'] ?>" alt="#"></p>
                            </div>
                            <div class="ltn__feature-info">
                                <h4  class="text-center"> <?php 
if($this->session->userdata('lang') == 'ar'){
     echo $offers['title_ar'] ;
}else{
     echo $offers['title'] ;
}
                                                    ?></h4>
                                <p  class="text-center"> <?php 
if($this->session->userdata('lang') == 'ar'){
     echo $offers['content_ar'] ;
}else{
     echo $offers['content'] ;
}
                                                    ?></p>
                            </div>
                         </div>

                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FEATURE AREA END -->
   

    <!-- ABOUT US AREA START -->
    <div class="ltn__about-us-area pt-25 pb-120 " id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="about-us-img-wrap about-img-left">
                        <img src="<?php echo base_url() ; ?>uploads/images/about/<?php echo $sec2_image ?>" alt="About Us Image" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="about-us-info-wrap">
                        <div class="section-title-area ltn__section-title-2--- mb-30">
                            <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color d-none"><?php echo $this->Admin_model->translate("About Us") ; ?></h6>
                            <h4 class="section-title"><?php echo $sec2_title ?></h4>
                           <p><?php echo $sec2_content ?></p>
                        </div>
                        
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ABOUT US AREA END -->

    <section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="row hit">
                    <div class="col-md-11">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true"><?php echo $sec3_title1 ?></button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false"><?php echo $sec3_title2 ?></button>
  </li>
</ul>
</div>
</div>

<div class="tab-content" id="pills-tabContent">

  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
  <div class="row">
  <div class="col-md-12"> 
   <p><?php echo $sec3_content1 ?></p>
</div>
</div>
  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  <div class="row">
  <div class="col-md-12"> 
   <p><?php echo $sec3_content2 ?></p>
</div>
</div>
</div>

</div>
</div>

<div class="col-md-6">

        <img src="<?php echo base_url() ; ?>uploads/images/about/<?php echo $sec2_image ?>">

<br><br>

</div>
</div>
</div>

</section>
   
 <!-- ABOUT US AREA START -->
    <div class="ltn__about-us-area pt-25  ">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="about-us-img-wrap about-img-left">
                        <img src="<?php echo base_url() ; ?>assets/home_assets/img/home/f1.png" alt="About Us Image" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="orange-back">
                        <div class="section-title-area ltn__section-title-2--- mb-30">
                            <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color d-none">About Us</h6>
                            <h4 class="section-title-in">Industrial <br> Uniforms</h4>
                           <p class="sec-ab-or">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod </p>
                           <a href="" class="btn btn-white-black"><?php echo $this->Admin_model->translate("Shop Now") ; ?></a>
                        
                        </div>
                        
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
 

     <!-- ABOUT US AREA START -->
     <div class="ltn__about-us-area pt-25 " style="margin-bottom:30px">
        <div class="container">
            <div class="row">
            <div class="col-lg-6 align-self-center">
                    <div class="blue-back">
                        <div class="section-title-area ltn__section-title-2--- mb-30">
                            <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color d-none">About Us</h6>
                            <h4 class="section-title-in">School  <br> Uniforms</h4>
                           <p class="sec-ab-or">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod </p>
                           <a href="" class="btn btn-white-black"><?php echo $this->Admin_model->translate("Shop Now") ; ?></a>
                        
                        </div>
                        
                       
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="about-us-img-wrap about-img-left">
                        <img src="<?php echo base_url() ; ?>assets/home_assets/img/home/m2.png" alt="About Us Image" class="img-fluid" width="350px" height="350px">
                    </div>
                </div>
               
            </div>
        </div>
    </div>
<section class="section-bg">
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="subscribe">
                    <h5 class="text-center"><?php echo $this->Admin_model->translate("Let's stay in touch") ?></h5>
            <p class="text-center"><?php echo $this->Admin_model->translate("Keep up to date with our latest news and special offers.") ?></p>
                            <div class="footer-newsletter">
                                <div class="row">
                                <div class="col-md-3"></div>
                                    <div class="col-md-7">
                                <form action="#">
                                    <input type="email" name="email" placeholder="<?php echo $this->Admin_model->translate("Enter your email address*") ?>">
                                    <div class="btn-wrapper">
                                        <button class="theme-btn-1 btn" type="submit"><?php echo $this->Admin_model->translate("Subscribe") ?></button>
                                    </div>
                                                                </form>
</div>
</div>
                            </div>
                           
</div>
</div>
</div>
</div>
</section>

 

  

    

    <!-- BLOG AREA START (blog-3) -->
   
    <!-- ABOUT US AREA END -->
    <div class="ltn__blog-area pt-115 pb-45">
        <div class="container">
            <!-- <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center">
                        <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color d-none"><?php echo $this->Admin_model->translate("News & Blogs") ?></h6>
                       
                   
                <h3 class="text-center"><?php echo $this->Admin_model->translate("News and Events") ?></h3>

<hr>
<hr class="li-orangee">
                    </div>
                </div>
            </div> -->
            
                <!--  -->
            </div>
        </div>
    </div>
    <!-- BLOG AREA END -->

    <!-- BRAND LOGO AREA START -->
    <div class="ltn__brand-logo-area ltn__brand-logo-1 section-bg-1--- pt-110--- pb-95 plr--9--- d-none---">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                <h3><?php echo $this->Admin_model->translate("Our Clients") ?> </h3>
</div>
</div>
<hr>
<hr class="li-orange">
            <div class="row ltn__brand-logo-active"  dir="rtl">
                <?php foreach($clients as $client){ ?>

                    <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="<?php echo base_url() ; ?>uploads/images/clients/<?php echo $client['image']   ?>" alt="Brand Logo">
                    </div>
                </div>

                <?php } ?> 
                
                 
                
            </div>
        </div>
    </div>
    <!-- BRAND LOGO AREA END -->

    <!-- PRODUCT AREA START (product-item-3) -->
    <div class="ltn__product-area ltn__product-gutter pt-85 pb-70 d-none">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2 text-center">
                        <h1 class="section-title">Featured Products</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ltn__banner-item">
                                <div class="ltn__banner-img">
                                    <a href="shop.html"><img src="<?php echo base_url() ; ?>assets/home_assets/img/banner/13.jpg" alt="Banner Image"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="ltn__banner-item">
                                <div class="ltn__banner-img">
                                    <a href="shop.html"><img src="<?php echo base_url() ; ?>assets/home_assets/img/banner/12.jpg" alt="Banner Image"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row ltn__tab-product-slider-one-active--- slick-arrow-1">
                        <!-- ltn__product-item -->
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="ltn__product-item ltn__product-item-2 text-left">
                                <div class="product-img">
                                    <a href="product-details.html"><img src="<?php echo base_url() ; ?>assets/home_assets/img/product/1.png" alt="#"></a>
                                    <div class="product-badge">
                                        <ul>
                                            <li class="sale-badge">New</li>
                                        </ul>
                                    </div>
                                    <div class="product-hover-action">
                                        <ul>
                                            <li>
                                                <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                                    <i class="far fa-heart"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <div class="product-ratting">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <h2 class="product-title"><a href="product-details.html">Antiseptic Spray</a></h2>
                                    <div class="product-price">
                                        <span>$32.00</span>
                                        <del>$46.00</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ltn__product-item -->
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="ltn__product-item ltn__product-item-2 text-left">
                                <div class="product-img">
                                    <a href="product-details.html"><img src="<?php echo base_url() ; ?>assets/home_assets/img/product/2.png" alt="#"></a>
                                    <div class="product-hover-action">
                                        <ul>
                                            <li>
                                                <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                                    <i class="far fa-heart"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <div class="product-ratting">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <h2 class="product-title"><a href="product-details.html">Digital Stethoscope</a></h2>
                                    <div class="product-price">
                                        <span>$25.00</span>
                                        <del>$35.00</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ltn__product-item -->
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="ltn__product-item ltn__product-item-2 text-left">
                                <div class="product-img">
                                    <a href="product-details.html"><img src="<?php echo base_url() ; ?>assets/home_assets/img/product/3.png" alt="#"></a>
                                    <div class="product-badge">
                                        <ul>
                                            <li class="sale-badge">New</li>
                                        </ul>
                                    </div>
                                    <div class="product-hover-action">
                                        <ul>
                                            <li>
                                                <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                                    <i class="far fa-heart"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <div class="product-ratting">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <h2 class="product-title"><a href="product-details.html">Cosmetic Containers</a></h2>
                                    <div class="product-price">
                                        <span>$75.00</span>
                                        <del>$92.00</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ltn__product-item -->
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="ltn__product-item ltn__product-item-2 text-left">
                                <div class="product-img">
                                    <a href="product-details.html"><img src="<?php echo base_url() ; ?>assets/home_assets/img/product/4.png" alt="#"></a>
                                    <div class="product-badge">
                                        <ul>
                                            <li class="sale-badge">New</li>
                                        </ul>
                                    </div>
                                    <div class="product-hover-action">
                                        <ul>
                                            <li>
                                                <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                                    <i class="far fa-heart"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <div class="product-ratting">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <h2 class="product-title"><a href="product-details.html">Cosmetic Containers</a></h2>
                                    <div class="product-price">
                                        <span>$78.00</span>
                                        <del>$85.00</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ltn__product-item -->
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="ltn__product-item ltn__product-item-2 text-left">
                                <div class="product-img">
                                    <a href="product-details.html"><img src="<?php echo base_url() ; ?>assets/home_assets/img/product/5.png" alt="#"></a>
                                    <div class="product-badge">
                                        <ul>
                                            <li class="sale-badge">New</li>
                                        </ul>
                                    </div>
                                    <div class="product-hover-action">
                                        <ul>
                                            <li>
                                                <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                                    <i class="far fa-heart"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <div class="product-ratting">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <h2 class="product-title"><a href="product-details.html">Blue Hand Gloves</a></h2>
                                    <div class="product-price">
                                        <span>$150.00</span>
                                        <del>$180.00</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ltn__product-item -->
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="ltn__product-item ltn__product-item-2 text-left">
                                <div class="product-img">
                                    <a href="product-details.html"><img src="<?php echo base_url() ; ?>assets/home_assets/img/product/6.png" alt="#"></a>
                                    <div class="product-badge">
                                        <ul>
                                            <li class="sale-badge">New</li>
                                        </ul>
                                    </div>
                                    <div class="product-hover-action">
                                        <ul>
                                            <li>
                                                <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                                    <i class="far fa-heart"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <div class="product-ratting">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <h2 class="product-title"><a href="product-details.html">Thermometer Gun</a></h2>
                                    <div class="product-price">
                                        <span>$150.00</span>
                                        <del>$180.00</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ltn__product-item -->
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="ltn__product-item ltn__product-item-2 text-left">
                                <div class="product-img">
                                    <a href="product-details.html"><img src="<?php echo base_url() ; ?>assets/home_assets/img/product/7.png" alt="#"></a>
                                    <div class="product-badge">
                                        <ul>
                                            <li class="sale-badge">New</li>
                                        </ul>
                                    </div>
                                    <div class="product-hover-action">
                                        <ul>
                                            <li>
                                                <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                                    <i class="far fa-heart"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <div class="product-ratting">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <h2 class="product-title"><a href="product-details.html">Cosmetic Containers</a></h2>
                                    <div class="product-price">
                                        <span>$75.00</span>
                                        <del>$92.00</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ltn__product-item -->
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="ltn__product-item ltn__product-item-2 text-left">
                                <div class="product-img">
                                    <a href="product-details.html"><img src="<?php echo base_url() ; ?>assets/home_assets/img/product/8.png" alt="#"></a>
                                    <div class="product-badge">
                                        <ul>
                                            <li class="sale-badge">New</li>
                                        </ul>
                                    </div>
                                    <div class="product-hover-action">
                                        <ul>
                                            <li>
                                                <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                                    <i class="far fa-heart"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <div class="product-ratting">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <h2 class="product-title"><a href="product-details.html">Cosmetic Containers</a></h2>
                                    <div class="product-price">
                                        <span>$78.00</span>
                                        <del>$85.00</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT AREA END -->

    <!-- PRODUCT AREA START (product-item-3) -->
    <div class="ltn__product-area ltn__product-gutter pt-85 pb-70 d-none">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2 text-center">
                        <h1 class="section-title">Featured Products</h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__tab-product-slider-one-active--- slick-arrow-1">
                <!-- ltn__product-item -->
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="ltn__product-item ltn__product-item-3 text-center">
                        <div class="product-img">
                            <a href="product-details.html"><img src="<?php echo base_url() ; ?>assets/home_assets/img/product/1.png" alt="#"></a>
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badge">New</li>
                                </ul>
                            </div>
                            <div class="product-hover-action">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                            <i class="fas fa-shopping-cart"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                            <i class="far fa-heart"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-ratting">
                                <ul>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                </ul>
                            </div>
                            <h2 class="product-title"><a href="product-details.html">Antiseptic Spray</a></h2>
                            <div class="product-price">
                                <span>$32.00</span>
                                <del>$46.00</del>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ltn__product-item -->
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="ltn__product-item ltn__product-item-3 text-center">
                        <div class="product-img">
                            <a href="product-details.html"><img src="<?php echo base_url() ; ?>assets/home_assets/img/product/2.png" alt="#"></a>
                            <div class="product-hover-action">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                            <i class="fas fa-shopping-cart"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                            <i class="far fa-heart"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-ratting">
                                <ul>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                </ul>
                            </div>
                            <h2 class="product-title"><a href="product-details.html">Digital Stethoscope</a></h2>
                            <div class="product-price">
                                <span>$25.00</span>
                                <del>$35.00</del>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ltn__product-item -->
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="ltn__product-item ltn__product-item-3 text-center">
                        <div class="product-img">
                            <a href="product-details.html"><img src="<?php echo base_url() ; ?>assets/home_assets/img/product/3.png" alt="#"></a>
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badge">New</li>
                                </ul>
                            </div>
                            <div class="product-hover-action">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                            <i class="fas fa-shopping-cart"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                            <i class="far fa-heart"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-ratting">
                                <ul>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                </ul>
                            </div>
                            <h2 class="product-title"><a href="product-details.html">Cosmetic Containers</a></h2>
                            <div class="product-price">
                                <span>$75.00</span>
                                <del>$92.00</del>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ltn__product-item -->
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="ltn__product-item ltn__product-item-3 text-center">
                        <div class="product-img">
                            <a href="product-details.html"><img src="<?php echo base_url() ; ?>assets/home_assets/img/product/4.png" alt="#"></a>
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badge">New</li>
                                </ul>
                            </div>
                            <div class="product-hover-action">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                            <i class="fas fa-shopping-cart"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                            <i class="far fa-heart"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-ratting">
                                <ul>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                </ul>
                            </div>
                            <h2 class="product-title"><a href="product-details.html">Cosmetic Containers</a></h2>
                            <div class="product-price">
                                <span>$78.00</span>
                                <del>$85.00</del>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ltn__product-item -->
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="ltn__product-item ltn__product-item-3 text-center">
                        <div class="product-img">
                            <a href="product-details.html"><img src="<?php echo base_url() ; ?>assets/home_assets/img/product/5.png" alt="#"></a>
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badge">New</li>
                                </ul>
                            </div>
                            <div class="product-hover-action">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                            <i class="fas fa-shopping-cart"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                            <i class="far fa-heart"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-ratting">
                                <ul>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                </ul>
                            </div>
                            <h2 class="product-title"><a href="product-details.html">Blue Hand Gloves</a></h2>
                            <div class="product-price">
                                <span>$150.00</span>
                                <del>$180.00</del>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ltn__product-item -->
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="ltn__product-item ltn__product-item-3 text-center">
                        <div class="product-img">
                            <a href="product-details.html"><img src="<?php echo base_url() ; ?>assets/home_assets/img/product/6.png" alt="#"></a>
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badge">New</li>
                                </ul>
                            </div>
                            <div class="product-hover-action">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                            <i class="fas fa-shopping-cart"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                            <i class="far fa-heart"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-ratting">
                                <ul>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                </ul>
                            </div>
                            <h2 class="product-title"><a href="product-details.html">Thermometer Gun</a></h2>
                            <div class="product-price">
                                <span>$150.00</span>
                                <del>$180.00</del>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ltn__product-item -->
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="ltn__product-item ltn__product-item-3 text-center">
                        <div class="product-img">
                            <a href="product-details.html"><img src="<?php echo base_url() ; ?>assets/home_assets/img/product/7.png" alt="#"></a>
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badge">New</li>
                                </ul>
                            </div>
                            <div class="product-hover-action">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                            <i class="fas fa-shopping-cart"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                            <i class="far fa-heart"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-ratting">
                                <ul>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                </ul>
                            </div>
                            <h2 class="product-title"><a href="product-details.html">Cosmetic Containers</a></h2>
                            <div class="product-price">
                                <span>$75.00</span>
                                <del>$92.00</del>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ltn__product-item -->
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="ltn__product-item ltn__product-item-3 text-center">
                        <div class="product-img">
                            <a href="product-details.html"><img src="<?php echo base_url() ; ?>assets/home_assets/img/product/8.png" alt="#"></a>
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badge">New</li>
                                </ul>
                            </div>
                            <div class="product-hover-action">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                            <i class="fas fa-shopping-cart"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                            <i class="far fa-heart"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-ratting">
                                <ul>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                </ul>
                            </div>
                            <h2 class="product-title"><a href="product-details.html">Cosmetic Containers</a></h2>
                            <div class="product-price">
                                <span>$78.00</span>
                                <del>$85.00</del>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->
            </div>
        </div>
    </div>
    <!-- PRODUCT AREA END -->

 

    <!-- FOOTER AREA START -->
 <?php $this->load->view('home/footer')  ?>
   <!-- FOOTER AREA END -->