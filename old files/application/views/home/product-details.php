<!doctype html>
<html class="no-js" dir="<?php echo $this->session->userdata('dir')?>" lang="<?php echo $this->session->userdata('lang')?>">

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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/home_assets/css/responsive.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/toastr/toastr.min.css">
 
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat:200,300,400,600,700'>
 
<style>
  .swatch {
  position: relative;
  margin: 0.1rem;
  width: 30px;
  height: 30px;
  border-radius: 30px;
  line-height: 30px;
  display: inline-block;
}
.swatch > [type=radio],
.swatch > [type=checkbox] {
  position: absolute;
  width: 100%;
  height: 100%;
  left: 0;
  top: 0;
  opacity: 0;
}
.swatch > [type=radio] + label,
.swatch > [type=checkbox] + label {
  width: 30px;
  height: 30px;
  border-radius: 30px;
  line-height: 30px;
  text-align: center;
  position: absolute;
  transition: all 0.5s ease-in-out;
}
.swatch > [type=radio] + label i,
.swatch > [type=checkbox] + label i {
  opacity: 0;
  font-size: 1rem;
  transition: opacity 0.5s;
}
.swatch > [type=radio]:checked + label i,
.swatch > [type=checkbox]:checked + label i {
  opacity: 1;
}
 

.swatch > [type=radio]:checked + label,
.swatch > [type=checkbox]:checked + label {
  width: 36px;
  height: 36px;
  border-radius: 36px;
  line-height: 36px;
  top: -3px;
  left: -3px;
  transition: all 0.5s ease-in-out;
}
.swatch > [type=radio]:checked + label i,
.swatch > [type=checkbox]:checked + label i {
  opacity: 1;
  transition: opacity 0.5s;
}
</style>
</head>

<body>
  

<!-- Body main wrapper start -->
<div class="body-wrapper">

    <!-- HEADER AREA START (header-3) -->
 <?php $this->load->view('home/header')  ?>
    <!-- HEADER AREA END -->

<section class="sec">
    <!-- SHOP DETAILS AREA START -->
    <div class="ltn__shop-details-area pb-85">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="ltn__shop-details-inner mb-60">

                        <form action="<?php echo base_url() ?>home/addtocart" id="productpage"    >
                        <div class="row">
                              <div class="col-md-5">
                                <div class="ltn__shop-details-img-gallery">
                                    <div class="ltn__shop-details-large-img">


                                      <?php   array_unshift($product_images,$product->product_image);
  ?>
                                      <?php if(!empty($product_images)){ foreach ($product_images as $images) { 
                                            if(!empty($images)){ ?>
                                       
                                        

                                         <div class="single-large-img">
                                            <div class="row single-bg">
                                            <div class="col-md-6">
                                                <div class="btn_bg">
                                        <a href="#" title="Wishlist" 
                                        class="add_to_wishlist" data-productid="<?php echo $product->id  ?>" >
                                            <i class="far fa-heart"></i>Favourites</a>
</div>
</div>
<div class="col-md-6">
                                            <div class="btn_wrap">
        <span>Share</span>
        <div class="container">
            <i class="fab fa-facebook-f"></i>
            <i class="fab fa-twitter"></i>
            <i class="fab fa-instagram"></i>
            <i class="fab fa-github"></i>
        </div>
    </div>
</div>
</div>

                                            <a href="<?php echo base_url()?>uploads/images/industry/<?php echo $images ?>" data-rel="lightcase:myCollection">
                                                <img src="<?php echo base_url()?>uploads/images/industry/<?php echo $images ?>" alt="Image">
                                            </a>
                                        </div>


                                                 
                                       <?php } }} ?>  

                                         
                                    </div>
                                    <div class="ltn__shop-details-small-img slick-arrow-2">
                                        

                                           <?php if(!empty($product_images)){ foreach ($product_images as $images) { 
                                            if(!empty($images)){ ?>
                                       
                                         <div class="single-small-img">
                                            <img src="<?php echo base_url()?>uploads/images/industry/<?php echo $images ?>" alt="Image">
                                        </div>

                                        
                                                 
                                       <?php } }} ?>  

 
                                        
                                    </div>
                                  </div>
                                   
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="modal-product-info shop-details-info pl-0">
                                    <input type="hidden" name="product_id" value="<?php echo $product->id ; ?> ">
                                   
                                    <h3> 
                                        
                                        <?php 
if($this->session->userdata('lang') == 'ar'){
     echo $product->ar_product_name ;
}else{
     echo $product->product_name ;
}
                                                    ?>


                                    </h3>
                                    <div class="product-price" id="price_det1">
                                        <span>SAR <?php echo  ($product_price->offer_price != '0') ? $product_price->offer_price : $product_price->product_price ; ?></span>
                                         
                                         <input type="hidden" name="product_price" value="<?php echo  $product_price->offer_price ? $product_price->offer_price : $product_price->product_price ; ?>">

                                         <?php echo  ($product_price->offer_price != '0') ? '<del>SAR ' . $product_price->product_price .'</del>' :  '' ; ?> 


                                    </div>
                                    <p>

                                        
                                              <?php 
if($this->session->userdata('lang') == 'ar'){
     echo $product->ar_description ;
}else{
     echo $product->description ;
}
                                                    ?>


                                        </p>
                                    <div class="modal-product-meta ltn__product-details-menu-1">
                                      <div class="box-cat">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>PRODUCT TYPE</p>
</div>
<div class="col-md-6">
                                                <p class="input-box"><?php echo $this->Admin_model->get_type_name_by_id('categories','id',$product->category,'category_name')?></p>
</div>
<div class="col-md-6">
                                                <p>Gender</p>
</div>
<div class="col-md-6">
                                           <p>
                                               <select  name="gender_selected" class="size-select">
                       <?php  


                    $genders = $product->genders ;
                    $genders = explode( ',', $genders) ;
                    if(!empty($genders)){

                       foreach ($genders as $gender) { ?>
                        <option value="<?php echo $gender ?>"><?php echo $this->Admin_model->get_type_name_by_id('genders','id',$gender,'gender_name')  ?></option>
                           
                      <?php   } }  ?>
                    </select>   </p>
</div>
<div class="col-md-6">
                                                <p>Color</p>
</div>
<div class="col-md-6">

     <p>
                       <?php  


$colors = $product->colors_available ;
$colors = explode( ',', $colors) ;
                       foreach ($colors as $color) { ?>

                     

 <div class="swatch" style="background:<?php echo $this->Admin_model->get_type_name_by_id('color_master','id',$color,'color_code')  ?>;color:#fff;">
    <input type="radio" name="color_selected" checked id="swatch_<?php echo $color ?>" value="<?php echo $color ?>" />
    <label for="swatch_<?php echo $color ?>"><i class=" fa fa-check" title="<?php echo $this->Admin_model->get_type_name_by_id('color_master','id',$color,'color_name')  ?>"></i></label>
  </div>
                           
                      <?php   } ?>
                  
         </p>                                    
</div>
<div class="col-md-6">
                                                <p>Size</p>
</div>
<div class="col-md-6"><p>
                                               <select name="size_selected" class="size-select sizeval">
                       <?php  


$sizes = $product->sizes_available ;
$sizes = explode( ',', $sizes) ;
                       foreach ($sizes as $size) { ?>
                        <option value="<?php echo $size ?>"><?php echo $this->Admin_model->get_type_name_by_id('size_master','id',$size,'size')  ?></option>
                           
                      <?php   } ?>
                    </select>   </p>
</div>
</div>
<div class="row">
                                  <div class="col-md-6">
                              <div class="form-group">  
 
<button type ="button" class="btn-orange single addtocart">  Single product purchase </button>
<!-- Button trigger modal -->

</div>

                                    </div>
                                    <div class="col-md-6">
                                         <div class="form-group">  
                                        <p class="btn-or" >
                                         <a href="javascript:void()" onclick="window.location='<?php echo base_url()?>home/contact#getQuote'">Bulk Purchase</a> 
                                     </p>

                                      
                                    </div>
                                </div>
                                    <div class="col-md-12">
                                        <p class="input-box con">
                                         <a href="javascript:void()" onclick="window.location='<?php echo base_url()?>home/contact#getQuote'">
                                         Contact Customer Service for Customized Logo</a></p>
</div>
</div>
</div>

                                    </div>
                                  
                                   
                                
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                    <!-- Shop Tab Start -->
                    <div class="ltn__shop-details-tab-inner ltn__shop-details-tab-inner-2">
                       
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="liton_tab_details_1_1">
                                <div class="ltn__shop-details-tab-content-inner">
                                    <h4 class="title-2">Description.</h4>
                                    <p>
                                        <?php 
if($this->session->userdata('lang') == 'ar'){
     echo $product->ar_long_description ;
}else{
     echo $product->long_description ;
}
                                                    ?>
                                                    </p>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    <!-- Shop Tab End -->
                </div>
                
            </div>
        </div>
    </div>
</section>
    <!-- SHOP DETAILS AREA END -->


 

   <?php $this->load->view('home/footer')  ?>

    <!-- MODAL AREA START (Quick View Modal) -->
    <div class="ltn__modal-area ltn__quick-view-modal-area">
        <div class="modal fade" id="quick_view_modal" tabindex="-1">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <!-- <i class="fas fa-times"></i> -->
                        </button>
                    </div>
                    <div class="modal-body">
                         <div class="ltn__quick-view-modal-inner">
                             <div class="modal-product-item">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="modal-product-img">
                                            <img src="<?php echo base_url()?>assets/home_assets/img/product/4.png" alt="#">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="modal-product-info">
                                            <div class="product-ratting">
                                                <ul>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                                    <li class="review-total"> <a href="#"> ( 95 Reviews )</a></li>
                                                </ul>
                                            </div>
                                            <h3>Digital Stethoscope</h3>
                                            <div class="product-price">
                                                <span>$149.00</span>
                                                <del>$165.00</del>
                                            </div>
                                            <div class="modal-product-meta ltn__product-details-menu-1">
                                                <ul>
                                                    <li>
                                                        <strong>Categories:</strong> 
                                                        <span>
                                                            <a href="#">Parts</a>
                                                            <a href="#">Car</a>
                                                            <a href="#">Seat</a>
                                                            <a href="#">Cover</a>
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="ltn__product-details-menu-2">
                                                <ul>
                                                    <li>
                                                        <div class="cart-plus-minus">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="theme-btn-1 btn btn-effect-1" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                                            <i class="fas fa-shopping-cart"></i>
                                                            <span>ADD TO CART</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="ltn__product-details-menu-3">
                                                <ul>
                                                    <li>
                                                        <a href="#" class="" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                                            <i class="far fa-heart"></i>
                                                            <span>Add to Wishlist</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="" title="Compare" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                                            <i class="fas fa-exchange-alt"></i>
                                                            <span>Compare</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <hr>
                                            <div class="ltn__social-media">
                                                <ul>
                                                    <li>Share:</li>
                                                    <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                                                    <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL AREA END -->

    <!-- MODAL AREA START (Add To Cart Modal) -->
    <div class="ltn__modal-area ltn__add-to-cart-modal-area">
        <div class="modal fade" id="add_to_cart_modal" tabindex="-1">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                         <div class="ltn__quick-view-modal-inner">
                             <div class="modal-product-item">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="modal-product-img">
                                            <img src="<?php echo base_url()?>assets/home_assets/img/product/1.png" alt="#">
                                        </div>
                                         <div class="modal-product-info">
                                            <h5><a href="product-details.html">Digital Stethoscope</a></h5>
                                            <p class="added-cart"><i class="fa fa-check-circle"></i>  Successfully added to your Cart</p>
                                            <div class="btn-wrapper">
                                                <a href="cart.html" class="theme-btn-1 btn btn-effect-1">View Cart</a>
                                                <a href="checkout.html" class="theme-btn-2 btn btn-effect-2">Checkout</a>
                                            </div>
                                         </div>
                                         <!-- additional-info -->
                                         <div class="additional-info d-none">
                                            <p>We want to give you <b>10% discount</b> for your first order, <br>  Use discount code at checkout</p>
                                            <div class="payment-method">
                                                <img src="<?php echo base_url()?>assets/home_assets/img/icons/payment.png" alt="#">
                                            </div>
                                         </div>
                                    </div>
                                </div>
                             </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL AREA END -->

    <!-- MODAL AREA START (Wishlist Modal) -->
    <div class="ltn__modal-area ltn__add-to-cart-modal-area">
        <div class="modal fade" id="liton_wishlist_modal" tabindex="-1">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                         <div class="ltn__quick-view-modal-inner">
                             <div class="modal-product-item">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="modal-product-img">
                                            <img src="<?php echo base_url()?>assets/home_assets/img/product/7.png" alt="#">
                                        </div>
                                         <div class="modal-product-info">
                                            <h5><a href="product-details.html">Digital Stethoscope</a></h5>
                                            <p class="added-cart"><i class="fa fa-check-circle"></i>  Successfully added to your Wishlist</p>
                                            <div class="btn-wrapper">
                                                <a href="wishlist.html" class="theme-btn-1 btn btn-effect-1">View Wishlist</a>
                                            </div>
                                         </div>
                                         <!-- additional-info -->
                                         <div class="additional-info d-none">
                                            <p>We want to give you <b>10% discount</b> for your first order, <br>  Use discount code at checkout</p>
                                            <div class="payment-method">
                                                <img src="<?php echo base_url()?>assets/home_assets/img/icons/payment.png" alt="#">
                                            </div>
                                         </div>
                                    </div>
                                </div>
                             </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL AREA END -->

</div>
<!-- Body main wrapper end -->

    <!-- All JS Plugins -->
    <script src="<?php echo base_url()?>assets/home_assets/js/plugins.js"></script>
    <!-- Main JS -->
    <script src="<?php echo base_url()?>assets/home_assets/js/main.js"></script>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <input type="hidden" name="formdata" id="formdata" >
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body single-pro">
        <div class="row value">
            <div class="col-lg-12">
      <ul class="nav nav-pills" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Collect from Store</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Ship</button>
  </li>
</ul>
</div>
</div>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
  <br>
  <div class="box-sha">
        <div class="row">
            <div class="col-md-3">
                <img src="<?php echo base_url()?>assets/home_assets/img/product/1.png" width="80px" height="80px">
</div>
<div class="col-md-6">
    <h6>
    <?php 
if($this->session->userdata('lang') == 'ar'){
     echo $product->ar_product_name ;
}else{
     echo $product->product_name ;
}
                                                    ?>
                                                     </h6>
<div class="product-pricee" id="price_det2">
<span>SAR  <?php echo ($product_price->offer_price != 0) ? $product_price->offer_price : $product_price->product_price ; ?></span>
</div>
</div>
<div class="col-md-12">
<a href="javascript:void(0)" class="btn btn-ori checkoutbtn">Checkout</a>
</div>
</div>
</div>

  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  <div class="box-sha">
        <div class="row">
           
<div class="col-md-12">
<form id="contact" action="" method="post">
   
    <fieldset>
      <input placeholder="location" type="text" tabindex="1" class="form-control" required autofocus>
    </fieldset>
       <fieldset>
      <textarea placeholder="add address" tabindex="5" required class="form-control text-ar"></textarea>
    </fieldset>

   
  </form>
</div>
<div class="col-md-6"><h6 class="forget">Shipping cost</h6></div>
<div class="col-md-6">
    <p class="product-pricee">
        <br>
        SAR 10
</p>
    </div>
<div class="col-md-12">
 
<a href="javascript:void(0)" class="btn btn-ori checkoutbtn">Checkout</a>
</div>
</div>
</div>
  </div>

</div>
      </div>
      
    </div>
  </div>
</div>
</body>

<script type="text/javascript">
    
$(document).on('click', ' .addtocart', function(){  
   
 
var data = $('#productpage').serialize() ;

$('#formdata').val(data);  
$('#exampleModal').modal('show');
} ); 
         

$(document).on('click', '.checkoutbtn', function(){  

var formdata = $('#formdata').val() ;
$.ajax({  
url:"<?php echo base_url() ?>home/addtocart",  
method:"POST",  
data:{formdata: formdata,type:'industry',pagetype: 'detail' },  
success:function(data){ 

var data = JSON.stringify(data)
var status = JSON.parse(data);  
// if(status.session == false){
//     window.location.href="<?php echo base_url();?>home/login";
//     return false;
// }
if (status.result = false) {
toastr.error("Error");
} else {
toastr.success("Selected Item Added to Cart"); 
$("#cartitem").html( status.items) ;
//$("#carttext").text(status.items+' Item(s) in Shopping Cart');

  window.location.href="<?php echo base_url();?>home/viewcart";

}

}  
});  
}  )          
 

$(document).on('change',".sizeval", function()
   { 
    var size  = $(this).val();
    var product  = <?php echo $product->id ?>;
    
    $.ajax({  
    url:"<?php echo base_url(); ?>home/get_price_with_size",  
    method:"POST",  
    data:{size:size,product:product,type:'school'},  
    success:function(JSON)
    { 

      $('#price_det1').html(JSON.price_det1);
      $('#price_det2').html(JSON.price_det2);
    }
    
    });
 


   });
 

 $(document).on('click', ' .add_to_wishlist', function(){  
   
var productid = $(this).data('productid') ;
 
$.ajax({  
url:"<?php echo base_url() ?>home/add_to_wishlist",  
method:"POST",  
data:{productid:productid,from:'industry' },  
success:function(html){ 

    if(html == false){
window.location.href="<?php echo base_url()?>home/login"
    }else{
    $('#liton_wishlist_modal').html(html);  
    $('#liton_wishlist_modal').modal('show'); 
    }


 
}  
}); 
} ); 


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
</html>

