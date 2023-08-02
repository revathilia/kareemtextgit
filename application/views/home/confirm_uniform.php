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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url() ; ?>assets/home_assets/css/responsive.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/toastr/toastr.min.css">
 
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
                <div class="col-lg-10 col-md-12">
                    <div class="ltn__shop-details-inner mb-60">
 
                                    
                        <div class="tab-pane fade active show" id="liton_product_grid">
                            <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                                <div class="row">
                                   
                                    <?php foreach ($uniformdata as $uniform) { 

                                        
                                         ?>
                                      
                                          <div class="col-xl-3 col-lg-4 col-sm-6 col-6">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="<?php echo base_url() ; ?>home/uniform_details/<?php echo $uniform->id ?>"><img src="<?php echo base_url() ; ?>uploads/images/school/<?php echo $uniform->product_image ?>" alt="#" width="160px" ></a>
                                                
                                                <div class="product-action">
                                                    <ul>
                                                        <!-- <li>
                                                            <a href="#" title="Quick View" class="quick_view" data-productid="<?php echo $uniform->id ?>">
                                                                <i class="far fa-eye"></i>
                                                            </a>
                                                        </li> -->
                                                       
                                                      <!--   <li>
                                                            <a href="#" title="Wishlist"  class="add_to_wishlist" data-productid="<?php echo $uniform->id ?>" >
                                                                <i class="far fa-heart"></i></a>
                                                        </li> -->
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                
                                                <h2 class="product-title"><a href="<?php echo base_url() ; ?>home/uniform_details/<?php echo $uniform->id ?>">
                                                
                                               

                                                <?php 
                                                if($this->session->userdata('lang') == 'ar'){
                                                    echo $uniform->ar_product_name ;
                                                }else{
                                                    echo $uniform->product_name ;
                                                }
                                                    ?>

                                            
                                            </a></h2>
                                                <?php  $product_price = $this->Admin_model->get_single_data('school_product_price_size_det',array('product_id'=>$uniform->id,'status'=>'Y'));  
  ?>
                                                <div class="product-price">
<?php  if($product_price){  ?>
                                                <span><?php echo $this->Admin_model->translate("SAR") ; ?> <?php echo  ($product_price->offer_price != '0') ? $product_price->offer_price : $product_price->product_price ; ?></span>
                                         
                                                <?php echo  ($product_price->offer_price != '0') ? '<del>'.$this->Admin_model->translate("SAR") .' ' . $product_price->product_price .'</del>' :  '' ; ?> 

<?php } ?>
 
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                   <?php } ?> 
                                      
                                    
                                    
                                </div>
                            </div>
                        </div> 

                                       
                                        
                               
                    </div>
                    <!-- Shop Tab Start -->
                    <div class="ltn__shop-details-tab-inner ltn__shop-details-tab-inner-2">
                       
                        <div class="tab-content">
                             
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
            
        </div>
    </div>
    <!-- MODAL AREA END -->

    <!-- MODAL AREA START (Add To Cart Modal) -->
    
  

    <!-- MODAL AREA START (Wishlist Modal) -->
    <div class="ltn__modal-area ltn__add-to-cart-modal-area">
        <div class="modal fade" id="liton_wishlist_modal" tabindex="-1">
           
        </div>
    </div>
    <!-- MODAL AREA END -->

</div>
<!-- Body main wrapper end -->

    <!-- All JS Plugins -->
    <script src="<?php echo base_url() ; ?>assets/home_assets/js/plugins.js"></script>
    <!-- Main JS -->
    <script src="<?php echo base_url() ; ?>assets/home_assets/js/main.js"></script>
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
    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true"><?php echo $this->Admin_model->translate("Collect from Store") ; ?></button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false"><?php echo $this->Admin_model->translate("Ship") ; ?></button>
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
                <img src="<?php echo base_url() ; ?>assets/home_assets/img/product/1.png" width="80px" height="80px">
</div>
<div class="col-md-6">
    <h6>     <?php 
                                                if($this->session->userdata('lang') == 'ar'){
                                                    echo $uniform->ar_product_name ;
                                                }else{
                                                    echo $uniform->product_name ;
                                                }
                                                    ?> </h6>
    <div class="product-pricee">
<span><?php echo $this->Admin_model->translate("SAR") ; ?>  <?php echo ($product_price->offer_price != 0) ? $product_price->offer_price : $product_price->product_price ; ?></span>
</div>
</div>
<div class="col-md-12">
<a href="javascript:void(0)" class="btn btn-ori checkoutbtn"><?php echo $this->Admin_model->translate("Checkout") ; ?> </a>
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
      <input placeholder="<?php echo $this->Admin_model->translate("Location") ; ?> " type="text" tabindex="1" class="form-control" required autofocus>
    </fieldset>
       <fieldset>
      <textarea placeholder="<?php echo $this->Admin_model->translate("Add address") ; ?>" tabindex="5" required class="form-control text-ar"></textarea>
    </fieldset>

   
  </form>
</div>
<div class="col-md-6"><h6 class="forget"><?php echo $this->Admin_model->translate("Shipping cost") ; ?></h6></div>
<div class="col-md-6">
    <p class="product-pricee">
        <br>
        SAR 10
</p>
    </div>
<div class="col-md-12">
 
<a href="javascript:void(0)" class="btn btn-ori checkoutbtn"><?php echo $this->Admin_model->translate("Checkout") ; ?></a>
</div>
</div>
</div>
  </div>

</div>
      </div>
      
    </div>
  </div>
</div>

   <!-- FOOTER AREA START -->
 
   <?php $this->load->view('home/footer'); ?> 
    <!-- FOOTER AREA END -->
    
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
data:{formdata: formdata,type:'industry',pagetype: 'detail',purchase:'collect' },  
success:function(data){ 

var data = JSON.stringify(data)
var status = JSON.parse(data);  
if(status.session == false){
    window.location.href="<?php echo base_url();?>home/login";
    return false;
}
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
 


$(document).on('click', ' .quick_view', function(){  
   
var productid = $(this).data('productid') ;
 
$.ajax({  
url:"<?php echo base_url() ?>home/quick_view",  
method:"POST",  
data:{productid:productid,from:'school' },  
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
data:{productid:productid,from:'school' },  
success:function(html){ 

$('#liton_wishlist_modal').html(html);  
$('#liton_wishlist_modal').modal('show');
 
}  
}); 
} ); 

 

</script>


</html>

