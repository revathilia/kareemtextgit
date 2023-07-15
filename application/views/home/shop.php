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
    <title>kareemtex</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Place favicon.png in the root directory -->
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/home_assets/img/favicon.png" type="image/x-icon" />
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
     <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat:200,300,400,600,700'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css'> 
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
    border: 1px solid #00000029;
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

 

.ltn__tagcloud-widget ul li .sizeselected {
     background-color: #fc9200 !important ;
        color:  #fff !important ;
}
.nice-select {
    -webkit-tap-highlight-color: transparent;
    background-color: #fff;
    border-radius: 5px;
    border: solid 1px #e8e8e8;
    box-sizing: border-box;
    clear: both;
    cursor: pointer;
    display: block;
    float: left;
    font-family: inherit;
    font-size: 14px;
    font-weight: 400;
    height: 42px;
    line-height: 40px;
    outline: 0;
    width: 200px !important;
    padding-left: 18px;
    padding-right: 30px;
    position: relative;
    text-align: left!important;
    -webkit-transition: all .2s ease-in-out;
    transition: all .2s ease-in-out;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    white-space: nowrap;
    width: auto;
}
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
  left:10px;
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
  background-color:  #fc9200;
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
</head>

<body>
    

<!-- Body main wrapper start -->
<div class="body-wrapper">

   
<?php $this->load->view('home/header')  ?>

    <div class="ltn__utilize-overlay"></div>
 <!-- BREADCRUMB AREA START -->
 <div class="ltn__breadcrumb-area2 text-left">
        <div class="container-fluid">
            <div class="row">
            
               
                <div class="col-lg-6 align-self-center">
                    <div class="about-us-img-wrap about-img-left">
                        <img src="<?php echo base_url()?>assets/home_assets/img/home/f1.png" alt="About Us Image" class="img-fluid" width="540px" height="550px">
                    </div>
                </div>
                <div class="col-lg-6 align-self-center orange-back">
                    <div class="">
                        <div class="section-title-area ltn__section-title-2--- mb-30">
                            <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color d-none">About Us</h6>
                            <h4 class="section-title-in">Industrial <br> Uniforms</h4>
                           <p class="sec-ab-or">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod </p>
                           <a href="" class="btn btn-white-black">Shop Now&nbsp;&nbsp;<img src="<?php echo base_url()?>assets/home_assets/img/home/ios-arrow-down.svg" width="10px" height="10px"></a>
                        
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
                <div class="col-md-12">
                
                    <div class="row">
                <div class="col-md-3">
                <h3>Industrial Uniforms</h3>
</div>
 
 
<div class="col-md-2">
<select class="nice-select " id="sortby">
     <option>Sort By</option>
                                       
                                        <option value="popularity">Popularity</option>
                                        <option value="latest">New arrivals</option>
                                        <option value="low_high">Price: low to high</option>
                                        <option value="high_low">Price: high to low</option>
                                    </select>


</div>

 <div class="col-md-5"> 
                               
        <label>
            <span class="screen-reader-text">Search for...</span>
            <input type="search" class="search-field" placeholder="Type here to search.." value=""  title="Type here to search.." id="searchtext" />
        </label>
        <button  type="submit" class="search-submit button"> Search </button>
          
       
                            </div>


<div class="col-md-2">
     <div class="ltn__grid-list-tab-menu2 ">
                                    <div class="nav">
                                        <a class="active show" data-bs-toggle="tab" href="#liton_product_grid"><i class="fas fa-th-large"></i></a>
                                        <a data-bs-toggle="tab" href="#liton_product_list"><i class="fas fa-list"></i></a>
                                    </div>
                                </div>
</div>
</div>
<hr>
<hr class="li-orange">
                </div>
                <div class="col-lg-8 order-lg-2 mb-120">
                    <div  id="postList">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="liton_product_grid">
                            <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                                <div class="row">

                                    <!-- ltn__product-item -->
                                <?php if(!empty($products)) { foreach ($products as  $product) { ?>
                                    <div class="col-xl-4 col-sm-6 col-6">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="<?php echo base_url()?>home/product_details/<?php echo $product['id'] ?>"><img src="<?php echo base_url()?>uploads/images/industry/<?php echo $product['product_image'] ?>" alt="#" width="160px" ></a>
                                                
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
                                               
                                                <h2 class="product-title"><a href="<?php echo base_url()?>home/product_details/<?php echo $product['id'] ?>">

                                                    <?php 
if($this->session->userdata('lang') == 'ar'){
     echo $product['ar_product_name'] ;
}else{
     echo $product['product_name'] ;
}
                                                    ?>
                                                        


                                                    </a></h2>
                                                <?php  $product_price = $this->Admin_model->get_single_data('industry_product_price_size_det',array('product_id'=>$product['id'],'status'=>'Y'),'product_price asc');  
  ?>
                                                <div class="product-price">
<?php  if($product_price){  ?>
                                                <span>SAR <?php echo  ($product_price->offer_price != '0') ? $product_price->offer_price : $product_price->product_price ; ?></span>
                                         
                                                <?php echo  ($product_price->offer_price != '0') ? '<del>SAR ' . $product_price->product_price .'</del>' :  '' ; ?> 

<?php } ?>
 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     <?php  } } ?>
                                                                       
                                    <!--  -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="liton_product_list">
                            <div class="ltn__product-tab-content-inner ltn__product-list-view">
                                <div class="row">
                                              <?php if(!empty($products )) { foreach ($products as  $product) { ?>                            
                                       <!-- ltn__product-item -->
                                       <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-3">
                                             <div class="product-img">
                                                <a href="<?php echo base_url()?>home/product_details/<?php echo $product['id'] ?>"><img src="<?php echo base_url()?>uploads/images/industry/<?php echo $product['product_image'] ?>" alt="#"></a>
                                                
                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="<?php echo base_url()?>home/product_details/<?php echo $product['id'] ?>">

                                                  <?php 
if($this->session->userdata('lang') == 'ar'){
     echo $product['ar_product_name'] ;
}else{
     echo $product['product_name'] ;
}
                                                    ?>
                                                        

                                                    </a></h2>
                                             

                                              <?php  $product_price = $this->Admin_model->get_single_data('industry_product_price_size_det',array('product_id'=>$product['id'],'status'=>'Y'),'product_price asc');  
  ?>

  
                                                <div class="product-price">
                                                   <span>SAR <?php echo  ($product_price->offer_price != '0') ? $product_price->offer_price : $product_price->product_price ; ?></span>
                                         
                                                <?php echo  ($product_price->offer_price != '0') ? '<del>SAR ' . $product_price->product_price .'</del>' :  '' ; ?> 
                                                </div>
                                                <div class="product-brief">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae asperiores sit odit nesciunt,  aliquid, deleniti non et ut dolorem!</p>
                                                </div>
                                                <div class="product-hover-action">
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
                                        </div>
                                    </div>
                                <?php } }else{
                                    echo 'No Result found !!' ; 
                                }  ?>
                                    <!--  -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ltn__pagination-area text-center">
                        <div class="ltn__pagination">

                            <?php echo $this->ajax_pagination->create_links(); ?>  


                        </div>
                    </div>
                     </div>
                </div>
                 <div class="col-lg-3  mb-120">
                    <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar">
                        <!-- Category Widget -->
                        <div class="widget ltn__menu-widget">
                            <h4 class="ltn__widget-title">Categories</h4>
                            <?php foreach ($categories as $cvalue) { ?>
                                <div class="form-check">
  <input class="form-check-input category" type="checkbox" name="selectcat" value="<?php echo $cvalue['id'] ?>" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
 
 <?php 
if($this->session->userdata('lang') == 'ar'){
     echo  $cvalue['ar_category_name'] ;
}else{
     echo  $cvalue['category_name'] ;
}
                                                    ?>
                                                        


  </label>
</div>

                               
                          <?php  } ?>
 

                        </div>
                        <!-- Price Filter Widget -->
                        <div class="widget ltn__price-filter-widget">
                            <h4 class="ltn__widget-title">Price</h4>
                            <div class="price_filter">
                                <div class="price_slider_amount">
                                    <input type="submit"  value="Your range:"/> 
                                    <input type="text" class="amount" name="price"  placeholder="Add Your Price" /> 
                                </div>
                                <div class="slider-range"></div>
                            </div>
                        </div>
                        <!-- Top Rated Product Widget -->
                        <div class="widget ltn__top-rated-product-widget">
                        <h4 class="ltn__widget-title ">Gender</h4>
                        <div class="form-check">
  <input class="form-check-input selectgender" type="checkbox" value="1" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
  Male
  </label>
</div>
<div class="form-check">
  <input class="form-check-input selectgender" type="checkbox" value="2" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
  Female
  </label>
</div>

                        </div>
                       
                        <!-- Color Widget -->
                        <div class="widget ltn__color-widget">
                            <h4 class="ltn__widget-title ">Product Color</h4>
                            

                            <?php if(!empty($colors)){
                                    foreach ($colors as $cval) { ?>

                                        <div class="swatch" style="background:<?php echo $cval['color_code'] ?>;color:#fff;">
            <input type="checkbox" name="swatch_demo" id="swatch_<?php echo $cval['id'] ?>" value="<?php echo $cval['id'] ?>" class="colors" />
            <label for="swatch_<?php echo $cval['id'] ?>"><i class="fa fa-check" title="<?php echo $cval['color_name'] ?>"></i></label>
          </div>
        <?php  } 
        
        } ?>
                    </div>
                        <!-- Size Widget -->
                        <div class="widget ltn__tagcloud-widget ltn__size-widget">
                            <h4 class="ltn__widget-title">Size</h4>
                            <ul>
                                <?php if(!empty($sizes)){
                                    foreach ($sizes as $svalue) { ?>

                                <li class="size" data-id="<?php echo $svalue['id'] ?>"><a href="javascript:void(0)"><?php echo $svalue['size'] ?></a></li>
                                 
                                
                                  <?php  }
                                } ?> 
                            </ul>
                        </div>

                    </aside>
                </div>
            </div>
        </div>
    </div>
 

<div class="loading" style="display: none;"><div class="content"><img src="<?php echo base_url().'assets/loading.gif'; ?>"/></div></div>

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
 

    <!-- MODAL AREA START (Wishlist Modal) -->
    <div class="ltn__modal-area ltn__add-to-cart-modal-area">
        <div class="modal fade" id="liton_wishlist_modal" tabindex="-1">
        
        </div>
    </div>
    <!-- MODAL AREA END -->

</div>
<!-- Body main wrapper end -->
 
   
   <!-- All JS Plugins -->
    <script src="<?php echo base_url()?>assets/home_assets/js/plugins.js"></script>
    <!-- Main JS -->
    <script src="<?php echo base_url()?>assets/home_assets/js/main.js"></script>

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
window.location.href="<?php echo base_url()?>home/login"
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




$( document ).ready(function() {

searchFilter();

});

$(".category").on('click', function(e){

searchFilter();
})

$(".button").on('click', function(e){

searchFilter();
})

$("#searchtext").on('keyup', function(e){

searchFilter();
})


$('input[type=search]').on('search', function () {
    searchFilter();
});

$("#sortby").change(function(e){

searchFilter();
})

 $('.selectgender').change(function() {
    
    searchFilter();
 })

 
 $('.colors').change(function() {
    
    searchFilter();
 })
 

$( ".slider-range" ).slider({
  change: function( event, ui ) {
searchFilter()

  }
});



function searchFilter(page_num) {
page_num = page_num?page_num:0;
 
 
var sortby = $('#sortby').val();

var searchtext = $('#searchtext').val();


var category = []
 
$(".category:checkbox:checked").each(function(){
    category.push($(this).val());
});


var colors = []
 
$(".colors:checkbox:checked").each(function(){
    colors.push($(this).val());
});

var gender = []
 
$(".selectgender:checkbox:checked").each(function(){
    gender.push($(this).val());
});

var sizes = []
 
$(".size a").each(function(){

    if($(this).hasClass("sizeselected")){

       sizes.push( $(this).parent().data('id'));
      
    }
   
});


var price = $('.amount').val();

$.ajax({
type: 'POST',
url: '<?php echo base_url(); ?>home/ajaxlisted/'+page_num,
data:'page='+page_num+'&category='+category+'&colors='+colors+'&sizes='+sizes+'&gender='+gender+'&price='+price+'&sortby='+sortby+'&searchtext='+searchtext,
beforeSend: function () {
$('.loading').show();
},
success: function (html) {
$('#postList').html(html);
$('.loading').fadeOut("slow");
}
});

 

 
}



$(".size a").click(function(){

    if($(this).hasClass("sizeselected")){
      $(this).removeClass("sizeselected");   
    }else{
    $(this).addClass("sizeselected");
    }

    searchFilter();
});

    </script>
  
</body>


</html>

