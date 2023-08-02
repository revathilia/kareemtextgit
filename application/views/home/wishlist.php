<!doctype html>
<html class="no-js" dir="<?php echo $this->session->userdata('dir') ; ?>" lang="<?php echo $this->session->userdata('lang') ; ?>">



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
</head>

<body>
    <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

    <!-- Add your site or application content here -->

<!-- Body main wrapper start -->
<div class="body-wrapper">

    <!-- HEADER AREA START (header-3) -->
   <?php $this->load->view('home/header'); ?> 
    <!-- HEADER AREA END -->

    
    <div class="ltn__utilize-overlay"></div>

    <!-- BREADCRUMB AREA START -->
     <?php if(!empty($banner)){ 

  $imageexists = true ;

  } ?> 

    <div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image "  <?php if($imageexists){ ?> data-bs-bg="<?php echo base_url() ; ?>uploads/images/banners/<?php echo $banner->image ?>" <?php } ?>>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner">
                        <h1 class="page-title"><?php echo $this->Admin_model->translate("Wishlist") ?></h1>
                        
                         <h4> 
                                              <?php 
                                              if( $imageexists){

                                                if($this->session->userdata('lang') == 'ar'){
     echo $banner->banner_content_ar  ;
}else{
     echo  $banner->banner_content ;
}

                                              }

                                                    ?>

                                                     </h4>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- WISHLIST AREA START -->
    <div class="liton__wishlist-area mb-105">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping-cart-inner">
                        <div class="shoping-cart-table table-responsive">
                            <table class="table">
                               
                                <tbody>


                                    <?php  if(!empty($wishlist)){ foreach ($wishlist as $value) { ?>

                                    <?php 



if($value['type'] == 'school'){

$detailspage = 'uniform_det' ;
  $product  = $this->Admin_model->get_single_data('school_products',array('id'=>$value['product_id'])) ;
  $product_price = $this->Admin_model->get_single_data('school_product_price_size_det',array('product_id'=>$product->id,'status'=>'Y'));  
}else{

    $detailspage = 'product_details' ;
 $product  = $this->Admin_model->get_single_data('industry_products',array('id'=>$value['product_id'])) ;
 $product_price = $this->Admin_model->get_single_data('industry_product_price_size_det',array('product_id'=>$product->id,'status'=>'Y'));  
}

$stock = $this->Admin_model->get_product_stock($value['type'],$value['product_id'] ) ;
                                   ?>   

                                    
                                    
                                    <tr>
                                        <td class="cart-product-remove wishlistremove" >
                                        <a onclick="deleteentry(<?php echo $value['id'] ?>,'wishlist');  return false ;" href="javascript:void(0)"> <i class="ico fa fa-times"></i>

                                         </a>
                                    </td>
                                        <td class="cart-product-image">
                                            <a href="<?php echo base_url() ; ?>home/<?php echo $detailspage ?>/<?php echo $product->id ?>"><img src="<?php echo base_url() ; ?>uploads/images/<?php echo $value['type'] ?>/<?php echo $product->product_image ?>" alt="#"></a>
                                        </td>
                                        <td class="cart-product-info">
                                            <h4><a href="<?php echo base_url() ; ?>home/<?php echo $detailspage ?>/<?php echo $product->id ?>">

                                               

                                                  <?php 
if($this->session->userdata('lang') == 'ar'){
     echo $product->ar_product_name ;
}else{
     echo $product->product_name ;
}
                                                    ?>

                                                    

                                                </a></h4>
                                        </td>
                                        <td class="cart-product-price"><?php echo $this->Admin_model->translate("SAR") ; ?> <?php echo  ($product_price->offer_price != '0') ? $product_price->offer_price : $product_price->product_price ; ?></td>
                                        <td class="cart-product-stock"><?php if($stock > 0){  ?>
                                              <a class="submit-button-1" href="<?php echo base_url() ; ?>home/<?php echo $detailspage ?>/<?php echo $product->id ?>" title="Add to Cart" ><?php echo $this->Admin_model->translate("Add to Cart") ?></a>

                                     <?php   } else {
                                        echo $this->Admin_model->translate("Out of Stock")  ;
                                     } ?></td>
                                         
                                    </tr>
                                    <?php } } else{
                                      echo $this->Admin_model->translate("Your wishlist is empty !!") ;
                                    } ?> 
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- WISHLIST AREA START -->


    <!-- FOOTER AREA START -->
   <?php $this->load->view('home/footer')  ?>
    <!-- FOOTER AREA END -->

</div>
<!-- Body main wrapper end -->

    <!-- All JS Plugins -->
    <script src="<?php echo base_url() ; ?>assets/home_assets/js/plugins.js"></script>
    <!-- Main JS -->
    <script src="<?php echo base_url() ; ?>assets/home_assets/js/main.js"></script>

    <script type="text/javascript">

function deleteentry($id,$table){

$.ajax({ 
type: "POST",
url: "<?php echo base_url(); ?>"+'home/delete_entry/',
data: {id:$id,table:$table},
}).done(function(response){

location.reload();

});

}

    </script>
  
</body>


</html>

