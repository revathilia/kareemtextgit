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
    <link rel="stylesheet" href="<?php echo base_url() ; ?>assets/home_assets/css/responsive.css">
    <?php if($this->session->userdata('lang') !='eng') {?>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css"
		integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
	<?php } ?>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/toastr/toastr.min.css">
</head>
<style>
    input[type="search"] {
  -webkit-appearance: none !important;
  background-clip: padding-box;
  background-color: white;
  vertical-align: middle;
  border-radius: 0.25rem;
  border: 1px solid #e0e0e5;
  font-size: 1rem;
  position: relative;
  top:-20px;
  
  width: 100%;
  height:40px;
  line-height: 2;
  padding: 0.375rem 1.25rem;
  -webkit-transition: border-color 0.2s;
  -moz-transition: border-color 0.2s;
  transition: border-color 0.2s;
}


form.search-form {
  display: flex;
  justify-content: center;
}

label {
  flex-grow: 1;
  flex-shrink: 0;
  flex-basis: auto;
  align-self: center;
  margin-bottom: 0;
}

input.search-field {
  margin-bottom: 0;
  flex-grow: 1;
  flex-shrink: 0;
  flex-basis: auto;
  align-self: center;
  height: 51px;
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
}

input.search-submit {
  height: 41px;
  margin: 0;
  padding: 1rem 1.3rem;
  text-transform: capitalize !important;
  text-align:center;
  border-top-left-radius: 0;
  border-bottom-left-radius: 0;
  border-top-right-radius: 0.25rem;
  border-bottom-right-radius: 0.25rem;
  font-family: "Font Awesome 5 Free";
  font-size: 1rem;
}

.screen-reader-text {
  clip: rect(1px, 1px, 1px, 1px);
  position: absolute !important;
  height: 1px;
  width: 1px;
  overflow: hidden;
}

.button {
  display: inline-block;
  font-weight: 600;
  width:40%;
  font-size: 0.8rem;
  line-height: 1.15;
  letter-spacing: 0.1rem;
  text-transform: uppercase;
  background: #f9d342;
  color: #292826;
  border: 1px solid transparent;
  vertical-align: middle;
  text-shadow: none;
  -webkit-transition: all 0.2s;
  -moz-transition: all 0.2s;
  transition: all 0.2s;
}


button[type="submit"]{
  background-color: var(--primary-color);
  border: 2px solid;
  border-color: var(--border-color-9);
  height: 50px;
  margin-left:20px;
    -webkit-box-shadow: none;
  box-shadow: none;
  padding-left: 20px;
  position: relative;
  top:-6px;
  font-size: 16px;
  color: var(--color-white) !important;
  width: 30% !important;
  margin-bottom: 30px;
  border-radius: 0;
  padding-right: 40px; }
    </style>
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
            
                  <?php if(!empty($banner)){ 

  $imageexists = true ;

  } ?> 

                <div class="col-lg-6 align-self-center">
                    <div class="blue-back" style="margin-left:-40px">
                        <div class="section-title-area ltn__section-title-2--- mb-30">
                            <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color d-none"><?php echo $this->Admin_model->translate("About Us") ; ?> </h6>
                            <h4 class="section-title-in"><?php echo $this->Admin_model->translate("School") ; ?>  <br><?php echo $this->Admin_model->translate("Uniforms") ; ?> </h4>
                           <p class="sec-ab-or">
                           <?php 
                                              if( $imageexists){

                                                if($this->session->userdata('lang') == 'ar'){
     echo $banner->banner_content_ar  ;
}else{
     echo  $banner->banner_content ;
}

                                              }

                                                    ?>
                                                      
                                                    </p>
                           <a href="" class="btn btn-white-black"><?php echo $this->Admin_model->translate("Shop Now") ; ?></a>
                        
                        </div>
                        
                       
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="about-us-img-wrap about-img-left">
                       
                           <?php if($imageexists){ ?> 
 <img src="<?php echo base_url() ; ?>uploads/images/banners/<?php echo $banner->image ?>" alt="About Us Image" class="img-fluid" width="370px" height="370px">
                      <?php } ?>

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
                        <div class="row">
                               <div class="col-md-4">
                               <a href="<?php echo base_url() ; ?>home/alluniforms" class="btn-blue2" style="width:40%;padding:20px;">
                               <?php echo $this->Admin_model->translate("All products") ; ?> 
                                        
            </a>
                                </div> 
                                
                                <div class="col-md-6"> 
                                
       <label>
            <span class="screen-reader-text">Search for...</span>
            <input type="search" class="search-field" placeholder="<?php echo $this->Admin_model->translate("Type here to search..") ; ?>" value=""  title="<?php echo $this->Admin_model->translate("Type here to search..") ; ?>" id="searchtext" />
        </label>
        <button  type="submit" class="search-submit button"><?php echo $this->Admin_model->translate("Search") ; ?>  </button>
      
                            </div>
<div class="col-md-2">
                                <div class="ltn__grid-list-tab-menu" style="margin-left:40px;margin-top:-10px">
                                    <div class="nav">
                                        <a class="active show" data-bs-toggle="tab" href="#liton_product_grid"><i class="fas fa-th-large"></i></a>
                                        <a data-bs-toggle="tab" href="#liton_product_list"><i class="fas fa-list"></i></a>
                                    </div>
                                </div>
</div>
                           
                            
                        
                    </div>
</div>
                    <div class="row">
                <div class="col-md-5">
                <h3 style="margin-left:14px;"><?php echo $this->Admin_model->translate("School") ; ?></h3>
</div>

</div>
<hr>
<hr class="li-blue">
                    <div  id="postList">

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
                                            <img src="<?php echo base_url() ; ?>assets/home_assets/img/product/4.png" alt="#">
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
                                                    <li><?php echo $this->Admin_model->translate("Share") ; ?>:</li>
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
           
        </div>
    </div>
    <!-- MODAL AREA END -->

    <!-- MODAL AREA START (Wishlist Modal) -->
    <div class="ltn__modal-area ltn__add-to-cart-modal-area">
        <div class="modal fade" id="liton_wishlist_modal" tabindex="-1">
           
        </div>
    </div>
    <!-- MODAL AREA END -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
 
</div>
</div>
<!-- Body main wrapper end -->

   

    <!-- All JS Plugins -->
    <script src="<?php echo base_url() ; ?>assets/home_assets/js/plugins.js"></script>
    <!-- Main JS -->
    <script src="<?php echo base_url() ; ?>assets/home_assets/js/main.js"></script>

    <script type="text/javascript">
      $(document).on('click', ' .addtocart', function(){  
   
   var schoolid = $(this).data('productid') ;
 
 $.ajax({  
url:"<?php echo base_url() ?>home/getschooldet",  
method:"POST",  
data:{schoolid:schoolid },  
success:function(html){ 
    if(html == 0){

        toastr.error("No uniform available for the selection, please contact admin !");
        // setInterval(function() {
        //     window.location = "<?php echo base_url(); ?>"+'home/school';  
        //         }, 3000); //3 seconds



    }else{
        
$('#exampleModal').html(html);  
$('#exampleModal').modal('show');
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



$( document ).ready(function() {

searchFilter();

});


$(".button").on('click', function(e){

searchFilter();
})

$('input[type=search]').on('search', function () {
    searchFilter();
});
$("#searchtext").on('keyup change', function(e){

searchFilter();
})


function searchFilter(page_num) {
page_num = page_num?page_num:0;
 
 
var sortby = $('#sortby').val();

var searchtext = $('#searchtext').val(); 

$.ajax({
type: 'POST',
url: '<?php echo base_url(); ?>home/schoollistajax/'+page_num,
data:'page='+page_num+'&searchtext='+searchtext+'&sortby='+sortby,
beforeSend: function () {
$('.loading').show();
},
success: function (html) {
$('#postList').html(html);
$('.loading').fadeOut("slow");
}
});

 

 
}

</script>
  
</body>


</html>

