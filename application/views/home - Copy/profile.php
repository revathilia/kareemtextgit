<!doctype html >
<html class="no-js" lang="en">



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

<div class="body-wrapper">    
    
    <!-- HEADER AREA START (header-5) -->
    <?php $this->load->view('home/header'); ?> 
    <!-- HEADER AREA END -->

   <section class="profile-ban">
    <div class="container">
        <div class="row">
        <div class="col-md-3">
            <img src="<?php echo base_url() ; ?>assets/home_assets/img/home/profile.svg">&nbsp;&nbsp;My Profile
</div>
<div class="col-md-5">
    
</div>
<div class="col-md-2">
    <a href="" class="btn btn-b">Cancel</a>
</div>
    <div class="col-md-2">
    <a href="javascript:void(0)" id="btnsubmit" class="btn btn-blue">Save</a>
</div>

</div>
<div class="row">
<form id="profileform" action="" method="post">
<div class="row">
<div class="col-md-3">
  <h6 class="forget" style="margin-left:20px">First Name</h6>
</div>
<div class="col-md-4">
<input placeholder="" class="form-control-new" type="text" name="first_name" value="<?php echo $profile->first_name ?>" tabindex="1" required autofocus>
</div>
</div>
<hr class="line">
<div class="row">
<div class="col-md-3">
  <h6 class="forget" style="margin-left:20px">Last Name</h6>
</div>
<div class="col-md-4">
<input placeholder="" class="form-control-new" type="text" name="last_name" value="<?php echo $profile->last_name ?>" tabindex="1" required autofocus>
</div>
</div>
<hr class="line">
<div class="row">
<div class="col-md-3">
  <h6 class="forget" style="margin-left:20px">Email Address</h6>
</div>
<div class="col-md-4">
<input placeholder="" class="form-control-new" type="text" tabindex="1" name="email" value="<?php echo $profile->email_address ?>" required autofocus>
</div>
</div>
<hr class="line">
<div class="row">
<div class="col-md-3">
  <h6 class="forget"style="margin-left:20px">Phone Number</h6>
</div>
<div class="col-md-4">
<input placeholder="" name="phone" value="<?php echo $profile->phone_no ?>" class="form-control-new" type="text" tabindex="1" required autofocus>
</div>
</div>
<hr class="line">
<div class="row">
<div class="col-md-3">
  <h6 class="forget" style="margin-left:20px">Address</h6>
</div>
<div class="col-md-4">
<textarea placeholder="" class="form-control-new"tabindex="5" required></textarea>
</div>
<div class="col-md-1"></div>
<div class="col-md-2">
<a href="" class="btn btn-r">+ Add</a>
</div>
<div class="col-md-2">
<a href=""  class="btn btn-b"><img src="<?php echo base_url() ; ?>assets/home_assets/img/icons/delete.png" width="10px" height="10px">&nbsp;&nbsp;Delete</a>
</div>
</div>
<hr class="line"> 
</form>
</div>
        <div class="row">
            <div class="col-md-12">
            <div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
      <img src="<?php echo base_url() ; ?>assets/home_assets/img/icons/order.png" width="20px" height="20px">&nbsp;&nbsp;My Order
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
      <div class="table-responsive">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
      <tr>
<th><?php echo $this->Admin_model->translate("No") ?></th>
<th><?php echo $this->Admin_model->translate("Created On") ?></th> 
<th><?php echo $this->Admin_model->translate("Product Name") ?></th> 
<th><?php echo $this->Admin_model->translate("Specifications") ?></th>
<th><?php echo $this->Admin_model->translate("Qty") ?></th>
<th><?php echo $this->Admin_model->translate("Total Amount") ?></th>
<th><?php echo $this->Admin_model->translate("Status") ?></th>
 
</tr>
      
</thead>
<tbody>
<?php $i=0 ; foreach ($orders as $value) {
  $i++ ;
 $color  = '' ;
  if($value['include_logo']  != 0 ){
    $color = '#fa972d' ;
  }
  ?>
 <tr style="background-color: <?php echo $color ;?>">
<td><?php echo $i  ?></td>
<td><?php echo date('d-m-Y', strtotime($value['created_on'])) ?></td>
 
<td><?php 
$details = json_decode($value['order_details'], true);
 
echo $details['name'] ?></td>



<td><?php if($details['type']== 'industry'){ ?>

  <!-- <div class="swatch" style="background:<?php echo $this->Admin_model->get_type_name_by_id('color_master','id',$details['color'],'color_code')  ?>;color:#fff;">
    <input type="radio" name="color_selected" checked id="swatch_<?php echo $details['color'] ?>" value="<?php echo $details['color'] ?>" />
    <label for="swatch_<?php echo $details['color'] ?>" title="<?php echo $this->Admin_model->get_type_name_by_id('color_master','id',$details['color'],'color_name')  ?>"></label>
  </div> -->

<?php }else{ ?>

  <!-- <div class="swatch" style="background:<?php echo $this->Admin_model->get_type_name_by_id('color_master','id',$details['color'],'color_code')  ?>;color:#fff;">
    <input type="radio" name="color_selected" checked id="swatch_<?php echo $details['color'] ?>" value="<?php echo $details['color'] ?>" />
    <label for="swatch_<?php echo $details['color'] ?>" title="<?php echo $this->Admin_model->get_type_name_by_id('color_master','id',$details['color'],'color_name')  ?>"></label>
  </div> -->

<?php } ?>

<!--   -->

</td>
<td><?php echo $details['qty'] ?></td>
<td><?php echo $details['subtotal'] ?></td>
<td><?php echo $this->Admin_model->get_type_name_by_id('order_status','id',$value['status'],'status_name') ?></td>
 
 
</tr>

  <?php
} ?>
  

</tbody>
    
    </table>
</div>
    </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
      <img src="<?php echo base_url() ; ?>assets/home_assets/img/icons/status.png" width="20px" height="20px">&nbsp;&nbsp;Order Status
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
    <br><br>
    <div class="row">

    <div class="col-md-3">
                <h6>Order ID : 12345</h6>
</div>
<div class="col-md-2"></div>
<div class="col-md-2">
<h6>Order Placed</h6>
</div>
<div class="col-md-2">
<p>07-09-2022</p>
</div>
<div class="col-md-3">
Delivery at 30-10-2023
</div>
</div>

<hr>
    <div class="row">
            <div class="col-md-3">
                <img src="<?php echo base_url() ; ?>assets/home_assets/img/home/sh.png" class="shop-car">
</div>
<div class="col-md-7">
    <h5>Boys blue striped shirt</h5>
    <p>Model: IBS03</p>
    <div class="container">
  <div class="row">
						<div class="col-12 col-md-10 hh-grayBox pt45 pb20">
							<div class="row justify-content-between">
								<div class="order-tracking completed">
									<span class="is-complete"></span>
									<p>Ordered<br><span>Mon, June 24</span></p>
								</div>
								<div class="order-tracking completed">
									<span class="is-complete"></span>
									<p>Shipped<br><span>Tue, June 25</span></p>
								</div>
								<div class="order-tracking">
									<span class="is-complete"></span>
									<p>Delivered<br><span>Fri, June 28</span></p>
								</div>
							</div>
						</div>
					</div>
</div>
</div>
<div class="col-md-2">
    <span class="or-sa">SAR 50</span>
   
  
</div>
</div>
<hr>
<div class="row">

    <div class="col-md-3">
        <h5>Total Amount</h5>
        <h6>SAR 50</h6>
</div>
<div class="col-md-5"></div>
<div class="col-md-3">
    <p class="text-right">Invoice</p>
</div>
</div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
      <img src="<?php echo base_url() ; ?>assets/home_assets/img/icons/refund.png" width="20px" height="20px">&nbsp;&nbsp; Refund
      </button>
    </h2>
    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingfour">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefour" aria-expanded="false" aria-controls="flush-collapsefour">
      <img src="<?php echo base_url() ; ?>assets/home_assets/img/icons/fav.png" width="20px" height="20px">&nbsp;&nbsp;<?php echo $this->Admin_model->translate("Favourites") ; ?>
      </button>
    </h2>
    <div id="flush-collapsefour" class="accordion-collapse collapse" aria-labelledby="flush-headingfour" data-bs-parent="#accordionFlushExample">
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="row">
            
        <div class="col-md-1"></div>
            <div class="col-md-10">
            <br><br>
    <div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
      Industrial Uniforms <span> (<?php echo count($wishlist_i) ?>)</span>
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        
      <?php  if(!empty($wishlist_i)){ foreach ($wishlist_i as $ivalue) { ?>

        <?php 
          
          $detailspage = 'product_details' ;
             $product  = $this->Admin_model->get_single_data('industry_products',array('id'=>$ivalue['product_id'])) ;
             $product_price = $this->Admin_model->get_single_data('industry_product_price_size_det',array('product_id'=>$product->id,'status'=>'Y'));  

             $stock = $this->Admin_model->get_product_stock($ivalue['type'],$ivalue['product_id'] ) ;
            ?>

<div class="row">
      <div class="col-md-3">
      <a href="<?php echo base_url() ; ?>home/<?php echo $detailspage ?>/<?php echo $product->id ?>"><img src="<?php echo base_url() ; ?>uploads/images/<?php echo $ivalue['type'] ?>/<?php echo $product->product_image ?>" alt="#"></a>
</div>
<div class="col-md-4">
<h5> <?php 
if($this->session->userdata('lang') == 'ar'){
     echo $product->ar_product_name ;
}else{
     echo $product->product_name ;
}
                                                    ?></h5>
<p> </p>
</div>
<div class="col-md-2">
<span class="or-sa"><?php echo $this->Admin_model->translate("SAR") ; ?> <?php echo  ($product_price->offer_price != '0') ? $product_price->offer_price : $product_price->product_price ; ?> </span>
<br>   <br>
<?php if($stock > 0){  ?>
<span class="add"> <a href="<?php echo base_url() ; ?>home/<?php echo $detailspage ?>/<?php echo $product->id ?>"> + Add </a></span>
<?php   } ?>
</div>
</div>

<?php } } ?>

      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
      School <span>(<?php echo count($wishlist_s) ?>)</span>
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">



      <div class="accordion-body">
      <?php  if(!empty($wishlist_s)){ foreach ($wishlist_s as $svalue) { ?>

        <?php 
          
          $detailspage = 'uniform_Det' ;
             $product  = $this->Admin_model->get_single_data('school_products',array('id'=>$svalue['product_id'])) ;
             $product_price = $this->Admin_model->get_single_data('school_product_price_size_det',array('product_id'=>$product->id,'status'=>'Y'));  
             $stock = $this->Admin_model->get_product_stock($svalue['type'],$svalue['product_id'] ) ;
           
            ?>

<div class="row">
      <div class="col-md-3">
      <a href="<?php echo base_url() ; ?>home/<?php echo $detailspage ?>/<?php echo $product->id ?>"><img src="<?php echo base_url() ; ?>uploads/images/<?php echo $svalue['type'] ?>/<?php echo $product->product_image ?>" alt="#"></a>
</div>
<div class="col-md-4">
<h5> <?php 
if($this->session->userdata('lang') == 'ar'){
     echo $product->ar_product_name ;
}else{
     echo $product->product_name ;
}
                                                    ?></h5>
<p> </p>
</div>
<div class="col-md-2">
<span class="or-sa"><?php echo $this->Admin_model->translate("SAR") ; ?> <?php echo  ($product_price->offer_price != '0') ? $product_price->offer_price : $product_price->product_price ; ?> </span>
<br>   <br>
<?php if($stock > 0){  ?>
<span class="add"> <a href="<?php echo base_url() ; ?>home/<?php echo $detailspage ?>/<?php echo $product->id ?>"> + Add </a> </span>
<?php   } ?>
</div>
</div>

   <?php } } ?>
      
      </div>
    </div>
  </div>
  <br><br>
</div>
</div>
</div>

</div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingfive">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefive" aria-expanded="false" aria-controls="flush-collapsefive">
      <img src="<?php echo base_url() ; ?>assets/home_assets/img/icons/wal.png" width="20px" height="20px">&nbsp;&nbsp; Wallet Balance
      </button>
    </h2>
    <div id="flush-collapsefive" class="accordion-collapse collapse" aria-labelledby="flush-headingfive" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
        <div class="wallet">
            <div class="row">
            <div class="col-md-3">
                <img src="<?php echo base_url() ; ?>assets/home_assets/img/home/wallet-pic.svg">
                </div>  
                <div class="col-md-3">
                <p>Wallet Amount</p>
                <span>0.00BD</span>
                </div>  
                <div class="col-md-5">
                    <a href="" class="btn btn-blue-border">ADD MONEY</a>

</div>
</div>

</div>
<br>
<h5>Transaction History</h5>
<br>
<hr>
<div class="box-r">
<div class="row">
    <div class="col-md-12">
        <h5>Order Id : 12345678 | Credit</h5>
        <div class="row">
            <div class="col-md-9">
                <hr>
</div>
<div class="col-md-3">
            <img src="<?php echo base_url() ; ?>assets/home_assets/img/home/down.svg" class="down">
</div>
</div>
        <span class="sp-100">100 BD</span>
        <p>09-09-2022,2:42pm</p>
</div>
</div>
</div>
<!-- ...last... -->
<br><br>
<div class="box-r">
<div class="row">
    <div class="col-md-12">
        <h5>Order Id : 12345678 | Credit</h5>
        <div class="row">
            <div class="col-md-9">
                <hr>
</div>
<div class="col-md-3">
            <img src="<?php echo base_url() ; ?>assets/home_assets/img/home/red-arrow.svg" class="down">
</div>
</div>
        <span class="sp-100">100 BD</span>
        <p>09-09-2022,2:42pm</p>
</div>
</div>
</div>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingsix">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsesix" aria-expanded="false" aria-controls="flush-collapsesix">
      <img src="<?php echo base_url() ; ?>assets/home_assets/img/icons/delete.png" width="20px" height="20px">&nbsp;&nbsp; Delete account
      </button>
    </h2>
    <div id="flush-collapsesix" class="accordion-collapse collapse" aria-labelledby="flush-headingsix" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</section>


 
    <!-- preloader area start -->
    <div class="preloader d-none" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    </div>
    <!-- preloader area end -->
  
    <!-- All JS Plugins -->
    <script src="<?php echo base_url() ; ?>assets/home_assets/js/plugins.js"></script>
    <!-- Main JS -->
    <script src="<?php echo base_url() ; ?>assets/home_assets/js/main.js"></script>
  
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
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
 

    <script type="text/javascript">
/* Add data */ /*Form Submit*/

$(document).ready(function(){

$("#btnsubmit").on('click',(function(e){
 
 e.preventDefault();

 var section = $(this).data('value');
 
  
 var controllerfun = '<?php echo base_url() ?>'+"home/update_customer";
 
   var formData = new FormData($('#profileform')[0]);
  
     $.ajax({
        url: controllerfun,
        type: "POST",
        data:  formData,
        contentType: false,
        cache: false,
        processData:false,
      }).done(function (response) {
      
        try{
         var objData = jQuery.parseJSON(response);
          if (objData.status === 'ERROR'){
            
             swal({
            title: objData.status,
            text: objData.message,
            icon: "error",
            button: "Ok",
            
  });


          }
          else if (objData.status === 'SUCCESS') {
            
           
        $('#profileform ').trigger("reset");
             swal({
            title: objData.status,
            text: objData.message,
            icon: "success",
            button: "Ok",
            
  });

            setTimeout(function() {
             window.location.href="<?php echo base_url() ?>home/profile"
           }, 5000);



          }
        } catch (err) {

          alert(response);

        }
        
        
    
      })
    
  }));
 
});
</script>


</body>


</html>
