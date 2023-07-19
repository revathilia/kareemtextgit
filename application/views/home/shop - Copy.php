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
  
<!-- Body main wrapper start -->
<div class="body-wrapper">

    <!-- HEADER AREA START (header-3) -->
 <?php $this->load->view('home/header')  ?>
    <!-- HEADER AREA END -->


    <div class="ltn__utilize-overlay"></div>

    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area2 text-left "  >
        <div class="container-fluid">
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
                           <a href="" class="btn btn-white-black">Shop Now&nbsp;&nbsp;<img src="<?php echo base_url() ; ?>assets/home_assets/img/home/ios-arrow-down.svg" width="10px" height="10px"></a>
                        
                        </div>
                        
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->
    
    <!-- PRODUCT DETAILS AREA START -->
    <div class="ltn__product-area ltn__product-gutter mb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__shop-options">
                        <ul>
                        <li>
                               <div class="showing-product-number text-right">
                                   <!-- <span>Showing 9 of 20 results</span>-->
                                </div> 
                            </li>
                            <li>
                                <div class="ltn__grid-list-tab-menu ">
                                    <div class="nav">
                                        <a class="active show" data-bs-toggle="tab" href="#liton_product_grid"><i class="fas fa-th-large"></i></a>
                                        <a data-bs-toggle="tab" href="#liton_product_list"><i class="fas fa-list"></i></a>
                                    </div>
                                </div>
                            </li>
                           
                            
                        </ul>
                    </div>
                    <div class="row">
                <div class="col-md-5">
                <h3>Industrial Uniforms</h3>
</div>
<div class="col-md-1"></div>
<div class="col-md-2">
<select class="nice-select">
                                        <option> Categroy</option>
                                        <?php foreach($categories as $category){ ?>
                                            <option value="<?php echo $category['id'] ?>" ><?php echo $category['category_name'] ?></option>
                                       <?php }?>
                                       
                                         
                                    </select>
</div>
<div class="col-md-2">
<select class="nice-select">
                                        <option>Low to High</option>
                                        <option>Sort by popularity</option>
                                        <option>Sort by new arrivals</option>
                                        <option>Sort by price: low to high</option>
                                        <option>Sort by price: high to low</option>
                                    </select>


</div>
<div class="col-md-2">
    <a href="" class="btn btn-orange filter">FILTER</a>
</div>
</div>
<hr>
<hr class="li-orange">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="liton_product_grid">
                            <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                                <div class="row">
                                                                         
                             <?php foreach ($products as  $product) { ?>
                                                                         <!-- ltn__product-item -->
                                    <div class="col-xl-3 col-lg-4 col-sm-6 col-6">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="<?php echo base_url() ; ?>home/product_details/<?php echo $product['id'] ?>"><img src="<?php echo base_url() ; ?>uploads/images/industry/<?php echo $product['product_image'] ?>" alt="#" width="160px" ></a>
                                                
                                                <div class="product-action">
                                                    <ul>
                                                        <li>
                                                            <a href="#" title="Quick View" class="quick_view" data-productid="<?php echo $product['id'] ?>">
                                                                <i class="far fa-eye"></i>
                                                            </a>
                                                        </li>
                                                       
                                                        <li>
                                                            <a href="#" title="Wishlist"  class="add_to_wishlist" data-productid="<?php echo $product['id'] ?>" >
                                                                <i class="far fa-heart"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                
                                                <h2 class="product-title"><a href="<?php echo base_url() ; ?>home/product_details/<?php echo $product['id'] ?>"><?php echo $product['product_name'] ?></a></h2>
                                                <?php  $product_price = $this->Admin_model->get_single_data('industry_product_price_size_det',array('product_id'=>$product['id'],'status'=>'Y'));  
  ?>
                                                <div class="product-price">
<?php  if($product_price){  ?>
                                                <span>SAR <?php echo  ($product_price->offer_price != '0') ? $product_price->offer_price : $product_price->product_price ; ?></span>
                                         
                                                <?php echo  ($product_price->offer_price != '0') ? '<del>'.$this->Admin_model->translate("SAR").' ' .$product_price->product_price .'</del>' :  '' ; ?> 

<?php } ?>
 
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                                                         
                                                                    <?php  } ?>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="liton_product_list">
                            <div class="ltn__product-tab-content-inner ltn__product-list-view">
                                <div class="row">
                                    
                                     <?php foreach ($products as  $product) { ?>
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-3">
                                            <div class="product-img">
                                                <a href="<?php echo base_url() ; ?>home/product_details/<?php echo $product['id'] ?>"><img src="<?php echo base_url() ; ?>uploads/images/industry/<?php echo $product['product_image'] ?>" alt="#"></a>
                                                
                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="<?php echo base_url() ; ?>home/product_details/<?php echo $product['id'] ?>"><?php echo $product['product_name'] ?></a></h2>
                                             

                                              <?php  $product_price = $this->Admin_model->get_single_data('industry_product_price_size_det',array('product_id'=>$product['id'],'status'=>'Y'));  
  ?>

  
                                                <div class="product-price">
                                                   <span>SAR <?php echo  ($product_price->offer_price != '0') ? $product_price->offer_price : $product_price->product_price ; ?></span>
                                         
                                                <?php echo  ($product_price->offer_price != '0') ? '<del>'.$this->Admin_model->translate("SAR").' ' .$product_price->product_price .'</del>' :  '' ; ?> 
                                                </div>
                                                <div class="product-brief">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae asperiores sit odit nesciunt,  aliquid, deleniti non et ut dolorem!</p>
                                                </div>
                                                <div class="product-hover-action">
                                                    <ul>
                                                        <li>
                                                            <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal<?php echo $product['id'] ?>">
                                                                <i class="far fa-eye"></i>
                                                            </a>
                                                        </li>
                                                            
                                                        <li>
                                                            <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal<?php echo $product['id'] ?>">
                                                                <i class="far fa-heart"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                      <?php  } ?>
                                    <!--  -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ltn__pagination-area text-center">
                        <div class="ltn__pagination">
                         <!--   <ul>
                                <li><a href="#"><i class="fas fa-angle-double-left"></i></a></li>
                                <li><a href="#">1</a></li>
                                <li class="active"><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">...</a></li>
                                <li><a href="#">10</a></li>
                                <li><a href="#"><i class="fas fa-angle-double-right"></i></a></li>
                            </ul> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT DETAILS AREA END -->


    <!-- FOOTER AREA START -->
   <?php $this->load->view('home/footer')  ?>
    <!-- FOOTER AREA END -->

    <!-- MODAL AREA START (Quick View Modal) -->
 
    <div class="ltn__modal-area ltn__quick-view-modal-area">
        <div class="modal fade" id="quick_view_modal" tabindex="-1">
          
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
                                            <img src="<?php echo base_url() ; ?>assets/home_assets/img/product/1.png" alt="#">
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
                                                <img src="<?php echo base_url() ; ?>assets/home_assets/img/icons/payment.png" alt="#">
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
                                            <img src="<?php echo base_url() ; ?>assets/home_assets/img/product/7.png" alt="#">
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
                                                <img src="<?php echo base_url() ; ?>assets/home_assets/img/icons/payment.png" alt="#">
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
    <script src="<?php echo base_url() ; ?>assets/home_assets/js/plugins.js"></script>
    <!-- Main JS -->
    <script src="<?php echo base_url() ; ?>assets/home_assets/js/main.js"></script>

    <script type="text/javascript">
     

$(document).on('click', ' .quick_view', function(){  
   
var productid = $(this).data('productid') ;
 
$.ajax({  
url:"<?php echo base_url() ?>home/quick_view",  
method:"POST",  
data:{productid:productid,from:'industry' },  
success:function(html){ 

$('#quick_view_modal').html(html);  
$('#quick_view_modal').modal('show');
 
}  
}); 
} ); 


$(document).on('click', ' .add_to_wishlist', function(){  
   
var productid = $(this).data('productid') ;
 
$.ajax({  
url:"<?php echo base_url() ?>home/add_to_wishlist",  
method:"POST",  
data:{productid:productid,from:'industry' },  
success:function(html){ 

    if(html == false){
window.location.href="<?php echo base_url() ; ?>home/login"
    }else{
    $('#liton_wishlist_modal').html(html);  
    $('#liton_wishlist_modal').modal('show'); 
    }


 
}  
}); 
} ); 


$(document).on('click', '.add_to_cart', function () {
var formdata = $(this).attr("data-productid");
$.ajax({
    url: "<?php echo base_url() ?>home/addtocart",
    method: "POST",
    data: {
        formdata: formdata,
        type: 'industry',
        pagetype: 'home'
    },
    success: function (data) {

        var data = JSON.stringify(data)
        var status = JSON.parse(data);

        if (status.session == false) {
            window.location.href = "<?php echo base_url();?>home/login";
            return false;
        }
        if (status.result = false) {
            toastr.error("Error");
        } else {
            toastr.success("Selected Item Added to Cart");
            $("#cartitem").html(status.items);
            //$("#carttext").text(status.items+' Item(s) in Shopping Cart');

            window.location.href = "<?php echo base_url();?>home/viewcart";

        }

    }
});
})
    </script>
  
</body>

<!-- Mirrored from tunatheme.com/tf/html/vicodin-preview/vicodin/shop-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Mar 2023 08:40:23 GMT -->
</html>

