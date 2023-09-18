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
     background-color: #0063b0 !important ;
        color:  #fff !important ;
}



.ltn__tagcloud-widget ul li .classselected {
     background-color: #0063b0 !important ;
        color:  #fff !important ;
}

</style>

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
  background-color:  #0063b0;
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


.nice-select {
   width: 250px !important;
   aut
 }



      </style>




</head>

<body>
    

<!-- Body main wrapper start -->
<div class="body-wrapper">

   
 <?php $this->load->view('home/header'); ?> 

    <div class="ltn__utilize-overlay"></div>
 <!-- BREADCRUMB AREA START -->
 <div class="ltn__breadcrumb-area2 text-left "  >
        <div class="container-fluid" style="padding-left:0px;">
            <div class="row g-0">
            
                <div class="col-lg-6 align-self-center blue-back">
                    <div class="" style="margin-left:-40px">
                        <div class="section-title-area ltn__section-title-2--- mb-30">
                            <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color d-none"><?php echo $this->Admin_model->translate("About Us") ; ?></h6>
                            <h4 class="section-title-in"><?php echo $this->Admin_model->translate("School") ; ?>  <br><?php echo $this->Admin_model->translate("Uniforms") ; ?> </h4>
                           <p class="sec-ab-or">      
  <?php if(!empty($banner)){ 

  $imageexists = true ;

  } ?> 
  <?php 
                                              if( $imageexists){

                                                if($this->session->userdata('lang') == 'ar'){
     echo $banner->banner_content_ar  ;
}else{
     echo  $banner->banner_content ;
}

                                              }

                                                    ?></p>
                           <a href="" class="btn btn-white-black"><?php echo $this->Admin_model->translate("Shop Now") ; ?></a>
                        
                        </div>
                        
                       
                    </div>
                </div>
                <div class="col-lg-6 align-self-center" style="background:url(<?php echo base_url() ; ?>uploads/images/banners/<?php echo $banner->image ?>);background-size:cover;height:410px;">
                    <div class="about-us-img-wrap about-img-left">
                    
                       
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
<select class="nice-select " id="sortby">
<option><?php echo $this->Admin_model->translate("Sort By") ; ?></option>
                                       
                                       <option value="popularity"><?php echo $this->Admin_model->translate("Popularity") ; ?></option>
                                       <option value="latest"><?php echo $this->Admin_model->translate("New arrivals") ; ?></option>
                                       <option value="low_high"><?php echo $this->Admin_model->translate("Price: low to high") ; ?> </option>
                                       <option value="high_low"><?php echo $this->Admin_model->translate("Price: high to low") ; ?></option>
                                    </select>


</div>


 <div class="col-md-6"> 
                               
        <label>
            <span class="screen-reader-text">Search for...</span>
            <input type="search" class="search-field" placeholder="<?php echo $this->Admin_model->translate("Type here to search..") ; ?>" value=""  title="<?php echo $this->Admin_model->translate("Type here to search..") ; ?>" id="searchtext" />
        </label>
        <button  type="submit" class="search-submit btn-blue2 button"> <?php echo $this->Admin_model->translate("Search") ; ?> </button>
          
       
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
<div class="row">
<div class="col-md-3">
                <h3 style="margin-left:14px;"><?php echo $this->Admin_model->translate("School") ; ?></h3>
</div>
</div>
<hr>
<hr class="li-blue">
                </div>
                <div class="col-lg-8 order-lg-2 mb-120">
                        <div  id="postList">
                        </div>
                    
                </div>
                <div class="col-lg-4  mb-120">
                    <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar">
                        <!-- Category Widget -->
                        <div class="widget ltn__menu-widget">
                            <h4 class="ltn__widget-title"><?php echo $this->Admin_model->translate("School List") ; ?></h4>

 <div class="form-check">
                              <select class="nice-select2 btn-blue2 schools" name="selectsch" >

                                  <option value ='' ><?php echo $this->Admin_model->translate("All Schools") ; ?></option>

                                          <?php foreach ($schools as $svalue) { ?>

                                              <option value ="<?php echo $svalue['id'] ?>" >
                                               <?php 
  if($this->session->userdata('lang') == 'ar'){
       echo  $svalue['ar_school_name'] ;
  }else{
       echo  $svalue['school_name'] ;
  }
  ?>
                                                      
                                                    </option>
                                      
                                      <?php } ?>
                                    </select>
</div>

 
 

                        </div>
                        <!-- Price Filter Widget -->
                         <div class="widget ltn__price-filter-widget">
                            <h4 class="ltn__widget-title"><?php echo $this->Admin_model->translate("Price") ; ?></h4>
                            <div class="price_filter">
                                <div class="price_slider_amount">
                                    <input type="submit"  value="<?php echo $this->Admin_model->translate("Your range") ; ?>"/> 
                                    <input type="text" class="amount" name="price"  placeholder="Add Your Price" /> 
                                </div>
                                <div class="slider-range"></div>
                            </div>
                        </div>
                        <!-- Top Rated Product Widget -->
                         <div class="widget ltn__top-rated-product-widget">
                        <h4 class="ltn__widget-title "><?php echo $this->Admin_model->translate("Gender") ; ?></h4>
                        <div class="form-check">
  <input class="form-check-input selectgender" type="checkbox" value="1" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
  <?php echo $this->Admin_model->translate("Male") ; ?>
  </label>
</div>
<div class="form-check">
  <input class="form-check-input selectgender" type="checkbox" value="2" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
  <?php echo $this->Admin_model->translate("Female") ; ?>
  </label>
</div>

                        </div>
                        <!-- Search Widget -->
                        <div class="widget ltn__tagcloud-widget ltn__size-widget">
                            <h4 class="ltn__widget-title"><?php echo $this->Admin_model->translate("Class") ; ?></h4>
                            <ul>
                                <?php if(!empty($standards)){
                                    foreach ($standards as $stds) { ?>

                                <li class="standards" data-id="<?php echo $stds['id'] ?>"><a href="javascript:void(0)"><?php echo $stds['standard_name'] ?></a></li>
                                 
                                
                                  <?php  }
                                } ?> 
                            </ul>
                        </div>
                       
                        
                       <!-- Color Widget -->
                        <div class="widget ltn__color-widget">
                            <h4 class="ltn__widget-title "><?php echo $this->Admin_model->translate("Product Color") ; ?></h4>
                            

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
                       <!--  <div class="widget ltn__tagcloud-widget ltn__size-widget">
                            <h4 class="ltn__widget-title"><?php echo $this->Admin_model->translate("Size") ; ?></h4>
                            <ul>
                                <?php if(!empty($sizes)){
                                    foreach ($sizes as $svalue) { ?>

                                <li class="size" data-id="<?php echo $svalue['id'] ?>"><a href="javascript:void(0)"><?php echo $svalue['size'] ?></a></li>
                                 
                                
                                  <?php  }
                                } ?> 
                            </ul>
                        </div> -->

                    </aside>
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

        <script type="text/javascript">

     

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
        type: 'school',
        pagetype: 'home'
        ,purchase:'collect'
    },
    success: function (data) {

        var data = JSON.stringify(data)
        var status = JSON.parse(data);

        if (status.session == false) {
            window.location.href = "<?php echo base_url();?>home/login";
            return false;
        }

        if (status.error !='') {
            toastr.error(status.error);
            return false ;
        }


        if (status.result = false) {
            toastr.error("Error");
        } else {
            toastr.success("Selected Item Added to Cart");
            $("#cartitem").html(status.items);
            //$("#carttext").text(status.items+' Item(s) in Shopping Cart');

        //    window.location.href = "<?php echo base_url();?>home/viewcart";

        }

    }
});
})




$( document ).ready(function() {

searchFilter();

});

 
$(".schools").change(function(e){

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


var school = []
 

$('.schools option').each(function() {
    if($(this).is(':selected')){
school.push($(this).val());

    }
    })
 

var standards = []
 
$(".standards a").each(function(){

    if($(this).hasClass("classselected")){

       standards.push( $(this).parent().data('id'));
      
    }
   
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
url: '<?php echo base_url(); ?>home/uniformajaxlisted/'+page_num,
data:'page='+page_num+'&school='+school+'&standards='+standards+'&colors='+colors+'&sizes='+sizes+'&gender='+gender+'&price='+price+'&sortby='+sortby+'&searchtext='+searchtext,
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


$(".standards a").click(function(){

    if($(this).hasClass("classselected")){
      $(this).removeClass("classselected");   
    }else{
    $(this).addClass("classselected");
    }

    searchFilter();
});
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
  
</body>


</html>

