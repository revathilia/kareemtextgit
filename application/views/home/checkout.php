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
    <link rel="stylesheet" href="<?php echo base_url();?>assets/toastr/toastr.min.css">
</head>

<body>
   
<div class="body-wrapper">

 


 <?php $this->load->view('home/header'); ?> 


    <!-- WISHLIST AREA START -->
    <div class="ltn__checkout-area mb-105">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__checkout-inner">
                        <div class="ltn__checkout-single-content ltn__returning-customer-wrap">
                            <h5><?php echo $this->Admin_model->translate("Returning customer?") ; ?> <a class="ltn__secondary-color" href="#ltn__returning-customer-login" data-bs-toggle="collapse"><?php echo $this->Admin_model->translate("Click here to login") ; ?></a></h5>
                            <div id="ltn__returning-customer-login" class="collapse ltn__checkout-single-content-info">
                                <div class="ltn_coupon-code-form ltn__form-box">
                                    <p><?php echo $this->Admin_model->translate("Please login your accont.") ; ?> </p>
                                    <form action="<?php echo base_url()   ?>home/place_order" >
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-item input-item-name ltn__custom-icon">
                                                    <input type="text" name="ltn__name" placeholder="<?php echo $this->Admin_model->translate("Enter your name") ; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-item input-item-email ltn__custom-icon">
                                                    <input type="email" name="ltn__email" placeholder="<?php echo $this->Admin_model->translate("Enter email address") ; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn theme-btn-1 btn-effect-1 text-uppercase">Login</button>
                                        <label class="input-info-save mb-0"><input type="checkbox" name="agree"><?php echo $this->Admin_model->translate("Remember me") ; ?>   </label>
                                        <p class="mt-30"><a href="register.html"><title><?php echo $this->Admin_model->translate("Lost your password?") ; ?></title> </a></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="ltn__checkout-single-content ltn__coupon-code-wrap">
                            <h5>Have a coupon? <a class="ltn__secondary-color" href="#ltn__coupon-code" data-bs-toggle="collapse"><?php echo $this->Admin_model->translate("Click here to enter your code") ; ?> </a></h5>
                            <div id="ltn__coupon-code" class="collapse ltn__checkout-single-content-info">
                                <div class="ltn__coupon-code-form">
                                    <p><?php echo $this->Admin_model->translate("If you have a coupon code, please apply it below.") ; ?> </p>
                                    <form action="#" >
                                        <input type="text" name="coupon-code" placeholder="Coupon code">
                                        <button class="btn theme-btn-2 btn-effect-2 text-uppercase"><?php echo $this->Admin_model->translate("Apply Coupon") ; ?> </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="ltn__checkout-single-content mt-50">
                            <h4 class="title-2"><?php echo $this->Admin_model->translate("Billing Details") ; ?> </h4>
                            <div class="ltn__checkout-single-content-info">
                                <form action="<?php echo base_url() ?>home/place_order" method="POST" id="frmcheckout" >

                                    <h6><?php echo $this->Admin_model->translate(" Personal Information") ; ?></h6>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-item input-item-name ltn__custom-icon">
                                                <input type="text" name="ltn__name" value="<?php echo $profile->first_name ?>" placeholder="<?php echo $this->Admin_model->translate("First name") ; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-item input-item-name ltn__custom-icon">
                                                <input type="text" name="ltn__lastname" value="<?php echo $profile->last_name ?>" placeholder="<?php echo $this->Admin_model->translate("Last name") ; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-item input-item-email ltn__custom-icon">
                                                <input type="email" value="<?php echo $profile->email_address ?>" name="ltn__email" placeholder="<?php echo $this->Admin_model->translate("Email address") ; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-item input-item-phone ltn__custom-icon">
                                                <input type="text" value="<?php echo $profile->phone_no ?>" name="ltn__phone" placeholder="<?php echo $this->Admin_model->translate("Phone number") ; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-item input-item-website ltn__custom-icon">
                                                <input type="text" name="ltn__company" placeholder="<?php echo $this->Admin_model->translate("Company name (optional)") ; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-item input-item-website ltn__custom-icon">
                                                <input type="text" name="ltn__company_address" placeholder="<?php echo $this->Admin_model->translate("Company address (optional)") ; ?>">
                                            </div>
                                        </div>
										<div class="col-md-6">
                                            <div class="input-item">
                                               

                                                <p> <label class="input-info-save mb-0"> <input type="checkbox" name="include_logo" class="checkbox" placeholder="Company name (optional)"> <?php echo $this->Admin_model->translate("Check if you want Company Logo with the uniform.") ; ?> </label></p>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6 ">
                                            <div class="input-item input-item-website" >
												<label  class="input-info-save mb-0 id_upload"> <?php echo $this->Admin_model->translate("Upload Your Company ID card") ; ?> </label>
                                                <input type="file" name="identity_card" class="form-control id_upload" placeholder="Company address (optional)">
                                            	 
                                            	
                                            </div>
                                        </div>
                                         

                                    </div>

                                      <?php  

                                       $cart = $this->cart->contents() ;
                                        $address = '' ;
                                         foreach($cart as $cartdata){
                                            $address = $cartdata['address'] ;
                                         }

                                         $cntry = array()  ;
                                         $state  = '' ;
                                         $zip = '' ;
                                         $town = array() ;
                                         $addressline1 = array() ;
                                           $addressline2 = array() ;



                                         if(!empty( $address)){
                                            $address = explode(', ', $address) ;

                                          

                                              $cntry = array_slice($address, -1, 1);   ;
                                         $stzip = array_slice($address, -2, 1); ;

                                         
if(!empty(  $stzip)){

    $stzip = explode(' ', $stzip[0]) ;
    $state = array_slice($stzip, 0, -1) ; ;
    $zip =  array_slice($stzip, -1, 1) ;



}

$town = array_slice($address, -3, 1);;

$addressline = array_slice($address, 0, -4); 

$addressline1 = array_slice($address, 0, 2); 
$addressline2 = array_slice($address, 2, -4); 

                                         }

                                       

                                         ?>


                                    
                                    <div class="row">
                                       <!--  <div class="col-lg-4 col-md-6">
                                            <h6>Country</h6>
                                            <div class="input-item">
                                                <select class="nice-select" name="country">
                                                    <?php foreach ($countries as $cvalue) { ?>
                                                         <option value="<?php $cvalue['country'] ?>" <?php if(!empty($cntry)){ if($cntry[0] ==$cvalue['country'] ){ echo 'selected' ;}}    ?>  ><?php echo $cvalue['country'] .' / '.$cvalue['ar_country'] ?></option>
                                                   <?php } ?>
                                                    
                                                </select>
                                            </div>
                                        </div>
 -->

                                        <div class="col-lg-12 col-md-12">
                                            <h6><?php echo $this->Admin_model->translate("Address") ; ?> </h6>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-item">
                                                        <input type="text" name="address_line1" placeholder="<?php echo $this->Admin_model->translate("House number and street name") ; ?> " value="<?php echo (!empty($addressline1)) ? implode(', ', $addressline1)  : '' ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-item">
                                                        <input type="text" name="address_line2" placeholder="<?php echo $this->Admin_model->translate("Apartment, suite, unit etc. (optional)") ; ?>" value="<?php echo (!empty($addressline2)) ? implode(', ', $addressline2)  : '' ?>" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <h6><?php echo $this->Admin_model->translate("Town / City") ; ?> </h6>
                                            <div class="input-item">
                                                <input type="text" placeholder="<?php echo $this->Admin_model->translate("City") ; ?>" value="<?php echo (!empty($town)) ? $town[0] : '' ?>" name="city">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <h6><?php echo $this->Admin_model->translate("State") ; ?> </h6>
                                            <div class="input-item">
                                                <input type="text" placeholder="<?php echo $this->Admin_model->translate("State") ; ?>" value="<?php echo (!empty($state)) ? implode(' ', $state) : '' ?>" name="state">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                           

                                             <h6><?php echo $this->Admin_model->translate("Country") ; ?></h6>
                                            <div class="input-item">
                                                <select class="nice-select" name="country">
                                                    <?php foreach ($countries as $cvalue) { ?>
                                                         <option value="<?php $cvalue['country'] ?>" <?php if(!empty($cntry)){ if($cntry[0] ==$cvalue['country'] ){ echo 'selected' ;}}    ?>  ><?php echo $cvalue['country'] .' / '.$cvalue['ar_country'] ?></option>
                                                   <?php } ?>
                                                    
                                                </select>
                                            </div>


                                           <!--  <div class="input-item">
                                                <input type="text" placeholder="<?php echo $this->Admin_model->translate("Zip") ; ?>" value="<?php echo (!empty($zip)) ? $zip[0] : '' ?>" name="zip_code">
                                            </div> -->
                                        </div>
                                    </div>
                                   <!--  <p><label class="input-info-save mb-0"><input type="checkbox" name="agree"> <?php echo $this->Admin_model->translate("Create an account?") ; ?></label></p> -->
                                    <h6><?php echo $this->Admin_model->translate("Order Notes (optional)") ; ?></h6>
                                    <div class="input-item input-item-textarea ltn__custom-icon">
                                        <textarea name="ltn__message" placeholder="<?php echo $this->Admin_model->translate("Notes about your order, e.g. special notes for delivery.") ; ?>"></textarea>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ltn__checkout-payment-method mt-50">
                        <h4 class="title-2"><?php echo $this->Admin_model->translate("Payment Method") ; ?></h4>
                        <div id="checkout_accordion_1">
                            <!-- card -->
                            <div class="card">
                                <h5 class="collapsed ltn__card-title" data-bs-toggle="collapse" data-bs-target="#faq-item-2-1" data-payment="check" aria-expanded="false">
                                <?php echo $this->Admin_model->translate("Check payments") ; ?> 
                                </h5>
                                <div id="faq-item-2-1" class="collapse" data-bs-parent="#checkout_accordion_1">
                                    <div class="card-body">
                                        <p><?php echo $this->Admin_model->translate("Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.") ; ?> </p>
                                    </div>
                                </div>
                            </div>
                            <!-- card -->
                                                
                            <!-- card -->
                            <div class="card">
                                <h5 class="collapsed ltn__card-title" data-bs-toggle="collapse" data-bs-target="#faq-item-2-3" data-payment="card" aria-expanded="false" >
                                <?php echo $this->Admin_model->translate("PayPal") ; ?>  <img src="<?php echo base_url() ; ?>assets/home_assets/img/icons/payment-3.png" alt="#">
                                </h5>
                                <div id="faq-item-2-3" class="collapse" data-bs-parent="#checkout_accordion_1">
                                    <div class="card-body">
                                        <p><?php echo $this->Admin_model->translate("Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.") ; ?>  </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ltn__payment-note mt-30 mb-30">
                            <p><?php echo $this->Admin_model->translate("Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.") ; ?> </p>
                        </div>
                        <button class="btn theme-btn-1 btn-effect-1 text-uppercase save" onclick="placeorder(); return false ;"  type="button"><?php echo $this->Admin_model->translate("Place order") ; ?></button>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping-cart-total mt-50">
                        <?php
// All values of cart store in "$cart". 
if ($cart = $this->cart->contents()):

$total = 0;
$subtotal = 0 ; ?>

  <h4 class="title-2">Cart Totals</h4>
                        <table class="table">
                            <tbody>
 
<?php foreach ($cart as $item){ ?>


                                <tr>
                                    <td> <?php echo $item['name']; ?>  <strong>×  <?php echo $item['qty']; ?> </strong></td>
                                    <td><?php echo $this->Admin_model->translate("SAR") ; ?>  <?php echo $item['subtotal']; ?> </td>
                                </tr>


 
                                     <?php $subtotal = $item['subtotal'] + $subtotal ;
                                        

                                        $shipping = $this->Admin_model->get_type_name_by_id('site_settings','id','1','shipping_charge') ;
                                        $vat_percentage = $this->Admin_model->get_type_name_by_id('site_settings','id','1','vat_val') ;
                                        $vat = 0 ;

                                        if(!empty($vat_percentage) && $vat_percentage != 0 ){
                                            $vat = $subtotal * $vat_percentage /100 ;
                                        }
                                        ?>


                                   <?php }  ?>

                      
                               
                                <tr>
                                    <td><?php echo $this->Admin_model->translate("Shipping") ; ?></td>
                                    <td><?php echo $this->Admin_model->translate("SAR") ; ?> <?php echo $shipping ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo $this->Admin_model->translate("VAT") ; ?></td>
                                    <td><?php echo $this->Admin_model->translate("SAR") ; ?> <?php echo $vat ?></td>
                                </tr>
                                <tr>
                                    <td><strong><?php echo $this->Admin_model->translate("Order Total") ; ?></strong></td>

                                    <?php $total =  $subtotal + $shipping+ $vat  ;
                                       ?>

                                    <td><strong><?php echo $this->Admin_model->translate("SAR") ; ?> <?php echo $total ;?></strong></td>
                                </tr>
                            </tbody>
                        </table>
                         <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- WISHLIST AREA START -->

<!-- payment form start -->

<form action="https://gate2play.docs.oppwa.com/tutorials/integration-guide" class="paymentWidgets" data-brands="VISA MASTER AMEX"></form>



<!-- payment for end -->

    <!-- FOOTER AREA START -->
 
   <?php $this->load->view('home/footer'); ?> 
    <!-- FOOTER AREA END -->
</div>
<!-- Body main wrapper end -->

    <!-- All JS Plugins -->
    <script src="<?php echo base_url() ; ?>assets/home_assets/js/plugins.js"></script>
    <!-- Main JS -->
    <script src="<?php echo base_url() ; ?>assets/home_assets/js/main.js"></script>



    <script type="text/javascript">

$(".ltn__card-title").click(function(e) {

     $('.save').prop('disabled', false  );

  var menuItem = $(this);

  if (menuItem.attr("aria-expanded") === "true") {
    $(".ltn__card-title").addClass('paymentselected');
  }
  else if (menuItem.attr("aria-expanded") === "false") {
    $(".ltn__card-title").removeClass('paymentselected');
  }

});




       function placeorder(){


  var paymentType = '' ;
         

if($(".ltn__card-title").hasClass('paymentselected')){
 var paymentType = $('.paymentselected').data('payment') ;
} 

        if(paymentType == ''){

             toastr.error('Select Payment Type to proceed');
             $('.save').prop('disabled', false);     

        } else{
             $('form#frmcheckout').submit();
        }




        
     }

        $("form#frmcheckout").submit(function(e){  

        console.log('inside submit');

         $('.save').prop('disabled', true);


        var fd = new FormData(this);


        var paymentType = $('.paymentselected').data('payment') ;
        fd.append("paymentType", paymentType);



        var obj = $(this), action = obj.attr('name');
        fd.append("is_ajax", 1);

         
        fd.append("form", action);
        e.preventDefault();
        $('.save').prop('disabled', true);
   
        
        $.ajax({
            url: e.target.action,
            type: "POST",
            data:  fd,
            contentType: false,
            cache: false,
            processData:false,
            success: function(JSON)
            {

              //   alert(JSON);
                if (JSON.error != '') {
                    toastr.error(JSON.error);
                   
                } else {

if(JSON.result == 'payment'){

  

  window.location.href= '<?php echo base_url() ; ?>home/hyperpay?id='+JSON.checkoutId ;


}else{

                    toastr.success(JSON.result) ;
                    
                    

                    setInterval(function() {
                  onplacingorder('all');
                }, 3000); //3 seconds
 
}
                

                  
               }
            },
            error: function() 
            {
                toastr.error(JSON.error);
                 
                $('.save').prop('disabled', false);
            }           
       });
    });
        

function onplacingorder($id){

$rowid = $id ;
      

$.ajax({ 
type: "POST",
url: "<?php echo base_url(); ?>"+'home/remove/'+$rowid,
data: {rowid:$rowid,viewname:'cart'},
}).done(function(response){


 
//$("#cart").html(response);
cartupdate();
window.location = "<?php echo base_url(); ?>"+'home/viewcart';

 
});
}



$(document).ready(function(){

	$('.id_upload').hide();

   $(".checkbox").change(function() {
	 
    if(this.checked) {
    	$('.id_upload').show();
        
    }else{
    	$('.id_upload').hide();
    }
});
});





    </script>
  
</body>


</html>

