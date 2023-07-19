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
    <style type="text/css">
      .pac-container {
    z-index: 10000 !important;
}

    </style>

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
                           <form action="<?php echo base_url() ?>home/addtocart" id="productpage"    >
                        <div class="row">
                            <div class="col-md-6">
                                <div class="ltn__shop-details-img-gallery">
                                    
                                    
                                    <div class="ltn__shop-details-large-img">


                                      <?php   array_unshift($product_images,$uniformdata->product_image);
  ?>
                                      <?php if(!empty($product_images)){ foreach ($product_images as $images) { 
                                            if(!empty($images)){ ?>
                                       
                                        

                                         <div class="single-large-img" dir="rtl">
                                            <div class="row single-bg">
                                            <div class="col-md-6">
                                                <div class="btn_bg">
                                        <a href="#" title="Wishlist" 
                                        class="add_to_wishlist" data-productid="<?php echo $uniformdata->id  ?>" >
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

                                            <a href="<?php echo base_url() ; ?>uploads/images/school/<?php echo $images ?>" data-rel="lightcase:myCollection">
                                                <img src="<?php echo base_url() ; ?>uploads/images/school/<?php echo $images ?>" alt="Image">
                                            </a>
                                        </div>


                                                 
                                       <?php } }} ?>  

                                         
                                    </div>
                                    <div class="ltn__shop-details-small-img slick-arrow-2" >

                                          <?php 
 
                                         if(!empty($product_images)){ foreach ($product_images as $images) { 
                                            if(!empty($images)){ ?>
                                      

                                          

                                         <div class="single-small-img">
                                            <img src="<?php echo base_url() ; ?>uploads/images/school/<?php echo $images ?>" alt="Image">
                                        </div>


                                                 
                                       <?php } }} ?>    

                                       
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="modal-product-info shop-details-info pl-0">
                                   
                                    <input type="hidden" name="product_id" value="<?php echo $uniformdata->id ; ?>">

                                    <h3> 
                                      
                                        <?php 
if($this->session->userdata('lang') == 'ar'){
     echo $uniformdata->ar_product_name ;
}else{
     echo $uniformdata->product_name ;
}
                                                    ?>



                                    </h3>
                                    <div class="product-price" id="price_det1">
                                    <?php if($product_price){ ?>
                                        <span class="blue"><?php echo $this->Admin_model->translate("SAR") ; ?> <?php echo 
                                        ($product_price->offer_price != '0') ? $product_price->offer_price : $product_price->product_price ; ?></span>
                                        <input type="hidden" name="product_price" value="<?php echo  $product_price->offer_price ? $product_price->offer_price : $product_price->product_price ; ?>">

                                         <?php echo  ($product_price->offer_price != '0') ? '<del>'.$this->Admin_model->translate("SAR").' ' .$product_price->product_price .'</del>' :  '' ; ?> 
<?php } ?>
                                    </div>
                                    <p><?php echo $uniformdata->description ;?></p>
                                    <div class="modal-product-meta ltn__product-details-menu-1">
                                     
                                      <div class="box-cat">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>School</p>
</div>
<div class="col-md-6">
    

     <select  name="school_selected" id="school_selected" class="size-select selectschool">
      <option value=''><?php echo $this->Admin_model->translate("Select") ; ?></option>
                       <?php  


 
                       foreach ($schools as $sch) { ?>

                         <?php if($this->Admin_model->check_id_exists('school_master',$sch['school_id'])){ ?>


                        <option value="<?php echo $sch['school_id'] ?>" >
                         

                          <?php 
if($this->session->userdata('lang') == 'ar'){
     echo $this->Admin_model->get_type_name_by_id('school_master','id',$sch['school_id'],'ar_school_name') ;
}else{
     echo $this->Admin_model->get_type_name_by_id('school_master','id',$sch['school_id'],'school_name') ;

}
                                                    ?>

                            
                          </option>
                           
                      <?php }  } ?>
                    </select>

                                               
</div>
<div class="col-md-6">
                                                <p><?php echo $this->Admin_model->translate("Gender") ; ?></p>
</div>
<div class="col-md-6">
                                               <p>
                                                 <select id="gender_selected"  name="gender_selected" class="size-select ">
                       <?php  


 
$genders = $uniformdata->genders ;
$genders = explode( ',', $genders) ;
                       foreach ($genders as $gender) { ?>
                        <option value="<?php echo $gender ?>" <?php if(sizeof($genders)==1 ) { echo "selected" ;}?>><?php echo $this->Admin_model->get_type_name_by_id('genders','id',$gender,'gender_name')  ?></option>
                           
                      <?php   } ?>
                    </select>
                </p>
</div>
 
<div class="col-md-6">
                                                <p><?php echo $this->Admin_model->translate("Size") ; ?></p>
</div>
<div class="col-md-6">
                                               
  

<p>
                                               <select id="size_selected" name="size_selected"   class="size-select sizeval ">
                       <?php  


$sizes = $uniformdata->sizes_available ;
$sizes = explode( ',', $sizes) ;
                       foreach ($sizes as $size) { ?>
                        <option value="<?php echo $size ?>"><?php echo $this->Admin_model->get_type_name_by_id('size_master','id',$size,'size')  ?></option>
                           
                      <?php   } ?>
                    </select>   </p>

                                                
</div>
<div class="col-md-6">
                                                <p><?php echo $this->Admin_model->translate("check school emblem") ; ?></p>
</div>
<div class="col-md-6">
                                                <p class="input-box text-center"><img id="school_logo" width="150px" height="150px"></p>
</div>
</div>

<div class="row">
                                    <div class="col-md-6">
 

<button type ="button" class="btn-blue-pro single addtocart"> <?php echo $this->Admin_model->translate("Single product purchase") ; ?>  </button>

<!-- Button trigger modal -->



                                    </div>
                                    <div class="col-md-6">
                                        <p class="btn-bl">
                                         <a href="javascript:void()" onclick="window.location='<?php echo base_url() ; ?>home/contact#getQuote'"><?php echo $this->Admin_model->translate("Bulk Purchase") ; ?>
                                         </a> 
                                     </p>


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
                                    <h4 class="title-2"><?php echo $this->Admin_model->translate("Description") ; ?></h4>
                                    <p>
                                    <?php 
if($this->session->userdata('lang') == 'ar'){
     echo $uniformdata->ar_product_name ;
}else{
     echo $uniformdata->product_name ;
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

    <!-- PRODUCT SLIDER AREA START -->
    <div class="ltn__product-slider-area ltn__product-gutter pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2">
                        <h4 class="title-2"><?php echo $this->Admin_model->translate("Related Products") ; ?><span>.</span></h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__related-product-slider-one-active slick-arrow-1">
                 <?php if( !empty($uniformdata->related_products)  ){

                    $relatedProducts = explode(',', $uniformdata->related_products);

                    foreach ($relatedProducts as  $products) { 

                        $uniform = $this->Admin_model->get_single_data('school_products',array('id'=>$products)) ;
if(!empty(   $uniform)){


                        ?>

                         <!-- ltn__product-item -->
                 <div class="col-lg-12">
                    <div class="ltn__product-item ltn__product-item-3 text-center">
                        <div class="product-img">
                        <a href="<?php echo base_url() ; ?>home/uniform_details/<?php echo $uniform->id ?>"><img src="<?php echo base_url() ; ?>uploads/images/school/<?php echo $uniform->product_image ?>" alt="#" width="160px" ></a>
                            
                            
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
                                                <?php  $product_price = $this->Admin_model->get_single_data('school_product_price_size_det',array('product_id'=>$uniform->id,'status'=>'Y'),'product_price asc');  
  ?>
                                                <div class="product-price">
<?php  if($product_price){  ?>
                                                <span><?php echo $this->Admin_model->translate("SAR") ; ?> <?php echo  ($product_price->offer_price != '0') ? $product_price->offer_price : $product_price->product_price ; ?></span>
                                         
                                                <?php echo  ($product_price->offer_price != '0') ? '<del>'.$this->Admin_model->translate("SAR").' ' .$product_price->product_price .'</del>' :  '' ; ?> 

<?php } ?>
 
                                                </div>
                                            </div>
                    </div>
                </div>
                       
                  <?php    } 
                  }

                 } ?>
               
                 
                <!--  -->
            </div>
        </div>
    </div>
    <!-- PRODUCT SLIDER AREA END -->

 

   <?php $this->load->view('home/footer')  ?>

    <!-- MODAL AREA START (Quick View Modal) -->
    
    <!-- MODAL AREA END -->

    <!-- MODAL AREA START (Add To Cart Modal) -->
    
    <!-- MODAL AREA END -->

    <!-- MODAL AREA START (Wishlist Modal) -->
    
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
        <div class="row value2">
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
              <?php
               $imagename = $this->Admin_model->get_type_name_by_id('school_products','id',$uniformdata->id,'product_image') ;
                ?>

                        
                        <img src="<?php echo base_url() ; ?>uploads/images/school/<?php echo $imagename  ?>">
 
</div>
<div class="col-md-6">

   <?php  $product_price = $this->Admin_model->get_single_data('school_product_price_size_det',array('product_id'=>$uniformdata->id,'status'=>'Y'),'product_price asc');  
  
   
  ?>


    <h6> 
  
    <?php 
if($this->session->userdata('lang') == 'ar'){
     echo $uniformdata->ar_product_name ;
}else{
     echo $uniformdata->product_name ;
}
                                                    ?>
                                                    
                                                  </h6>
    <div class="product-pricee" id="price_det2">
<span><?php echo $this->Admin_model->translate("SAR") ; ?> <?php echo  ($product_price->offer_price != 0) ? $product_price->offer_price : $product_price->product_price ; ?></span>
</div>
</div>
<div class="col-md-12">
 
<a href="javascript:void(0)" class="btn btn-orib checkoutbtn"><?php echo $this->Admin_model->translate("Checkout") ; ?></a>
 
</div>
</div>
</div>

  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  <div class="box-sha">
        <div class="row">
           
<div class="col-md-12">
<form id="shipping" action="" method="post">
   
   

 <fieldset>
      
      <input id="autocomplete_search" name="autocomplete_search" type="text" class="form-control" placeholder="<?php echo $this->Admin_model->translate("Search location") ; ?>" />

                    <input type="hidden" name="lat" id="lat">

                    <input type="hidden" name="long" id="long">

  </fieldset>
       <fieldset>
      <textarea placeholder="<?php echo $this->Admin_model->translate("Add address") ; ?>" id="address" name="address" tabindex="5" required class="form-control text-ar"></textarea>
</fieldset>

   
  </form>
</div>
<div class="col-md-6"><h6 class="forget">Shipping cost</h6></div>
<div class="col-md-6">
    <p class="product-pricee">
        <br>
        <?php echo $this->Admin_model->translate("SAR") ; ?> <?php echo  $shipping = $this->Admin_model->get_type_name_by_id('site_settings','id','1','shipping_charge') ; ?>
</p>
    </div>
<div class="col-md-12">
<a href="javascript:void(0)" class="btn btn-orib shippingbtn">Checkout</a>
</div>
</div>
</div>
  </div>

</div>
      </div>
      
    </div>
  </div>
</div>

<script type="text/javascript">
    
$(document).on('click', ' .addtocart', function(){ 

if( !$('#school_selected').val() ) {    
toastr.error("Please select school");
return false ;
}

if( !$('#gender_selected').val() ) {
toastr.error("Select gender");
return false ;
}

if( !$('#size_selected').val() ) {
toastr.error("Select size");
return false ;
}

   
 
var data = $('#productpage').serialize() ;

$('#formdata').val(data);  
$('#exampleModal').modal('show');
} ); 


$(document).on('click', '.checkoutbtn', function(){  





var formdata = $('#formdata').val() ;
$.ajax({  
url:"<?php echo base_url() ?>home/addtocart",  
method:"POST",  
data:{formdata: formdata,type:'school',pagetype: 'detail',purchase:'collect' },  
success:function(data){ 

var data = JSON.stringify(data)
var status = JSON.parse(data);  
if(status.session == false){
    window.location.href="<?php echo base_url();?>home/login";
    return false;
}
if (status.error != '') {
            toastr.error(status.error);
           
               setInterval(function() {
                   window.location.href="<?php echo base_url();?>home/viewcart";
                }, 3000); //3 seconds

 return false ;

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
         

$(document).on('click', '.shippingbtn', function(){  


 
if( !$('#autocomplete_search').val() ) {
    
toastr.error("Please select your shipping address");
return false ;
}

 if( !$('#address').val() ) {
toastr.error("Add your address");

return false ;
}


var formdata = $('#productpage,#shipping').serialize();

 




$.ajax({  
url:"<?php echo base_url() ?>home/addtocart",  
method:"POST",  
data:{formdata: formdata,type:'school',pagetype: 'detail',purchase:'shipping' },  
success:function(data){ 

var data = JSON.stringify(data)
var status = JSON.parse(data);  
if(status.session == false){
    window.location.href="<?php echo base_url();?>home/login";
    return false;
}


if (status.error != '') {
            toastr.error(status.error);
           
               setInterval(function() {
                   window.location.href="<?php echo base_url();?>home/viewcart";
                }, 3000); //3 seconds

 return false ;

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
 

 
 $(document).on('change',".sizeval", function()
   { 
    var size  = $(this).val();
    var product  = <?php echo $uniformdata->id ?>;

    
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


 $(document).on('change',".selectschool", function()
   { 
    var school  = $(this).val();
 

    
    $.ajax({  
    url:"<?php echo base_url(); ?>home/get_school_logo",  
    method:"POST",  
    data:{school:school},  
    success:function(data)
    { 

      $('#school_logo').attr('src', '<?php echo base_url() ; ?>uploads/images/school/'+data);

 


    }
    
    });
 


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

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDdN3jFlH_QSn5f3JaHzDYaEoVifCWMsto&libraries=places"></script>

<script>

  google.maps.event.addDomListener(window, 'load', initialize);

    function initialize() {

      var input = document.getElementById('autocomplete_search');

      var autocomplete = new google.maps.places.Autocomplete(input);

      autocomplete.addListener('place_changed', function () {

      var place = autocomplete.getPlace();

      // place variable will have all the information you are looking for.

      $('#lat').val(place.geometry['location'].lat());

      $('#long').val(place.geometry['location'].lng());


      var lat =  $('#lat').val() ;
      var long = $('#long').val() ;

     

      $.ajax({
        url: 'https://maps.googleapis.com/maps/api/geocode/json?latlng='+lat+','+long+'&key=AIzaSyDdN3jFlH_QSn5f3JaHzDYaEoVifCWMsto',
         success: function(data){

          var response = data.results;
          $('#address').val(response[0].formatted_address);
            
        }
})



    });

  }

</script>
</body>


</html>

