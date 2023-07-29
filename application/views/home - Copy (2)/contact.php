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
</head>

<body>
  
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

    <div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image " <?php if($imageexists){ ?> data-bs-bg="<?php echo base_url() ; ?>uploads/images/banners/<?php echo $banner->image ?>" <?php } ?>>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner">
                        <h1 class="page-title"><?php echo $this->Admin_model->translate("Contact Us") ?></h1>
                        
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

    <!-- CONTACT ADDRESS AREA START -->
    <div class="ltn__contact-address-area mb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                        <div class="ltn__contact-address-icon">
                            <img src="<?php echo base_url() ; ?>assets/home_assets/img/icons/10.svg" alt="Icon Image">
                        </div>
                        <h3><?php echo $this->Admin_model->translate("Email Address") ; ?></h3>
                        <p>Kareemtex@webmail.com <br>
                        Kareemtex@webexample.com</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                        <div class="ltn__contact-address-icon">
                            <img src="<?php echo base_url() ; ?>assets/home_assets/img/icons/11.svg" alt="Icon Image">
                        </div>
                        <h3><?php echo $this->Admin_model->translate("Phone Number") ; ?></h3>
                        <p>+0123-456789 <br> +987-6543210</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                        <div class="ltn__contact-address-icon">
                            <img src="<?php echo base_url() ; ?>assets/home_assets/img/icons/12.svg" alt="Icon Image">
                        </div>
                        <h3><?php echo $this->Admin_model->translate("Office Address") ; ?></h3>
                        <p>18/A, New Born Town Hall <br>
                        Kareemtex, US</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTACT ADDRESS AREA END -->
    
    <!-- CONTACT MESSAGE AREA START -->
    <div class="ltn__contact-message-area mb-120 mb--100" id="getQuote">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__form-box contact-form-box box-shadow white-bg">
                        <h4 class="title-2"><?php echo $this->Admin_model->translate("Get A Quote") ; ?></h4>
                        <form id="contact-form" method="post" >
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-item input-item-name ltn__custom-icon">
                                        <input type="text" name="name" placeholder="<?php echo $this->Admin_model->translate("Enter your name") ; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-item input-item-email ltn__custom-icon">
                                        <input type="email" name="email" placeholder="<?php echo $this->Admin_model->translate("Enter email address") ; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-item input-item-subject ltn__custom-icon">
                                        <input type="text" name="subject" placeholder="<?php echo $this->Admin_model->translate("Enter the subject") ; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-item input-item-phone ltn__custom-icon">
                                        <input type="text" name="phone" placeholder="<?php echo $this->Admin_model->translate("Enter phone number") ; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="input-item input-item-textarea ltn__custom-icon">
                                <textarea name="message" placeholder="<?php echo $this->Admin_model->translate("Enter message") ; ?>" rows="9" cols="70"></textarea>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-item  ">
                                        <h5 class="title-1"><?php echo $this->Admin_model->translate("Add attachment, if any") ; ?></h5>
                                        <input type="file" name="attachment" >
                                    </div>
                                </div>
                            </div>
                            
                            <br>
                              

                            <p><label class="input-info-save mb-0"><input type="checkbox" name="agree"> <?php echo $this->Admin_model->translate("Save my name, email, and website in this browser for the next time I comment.") ; ?></label></p>
                            <div class="btn-wrapper mt-0">
                                <button class="btn theme-btn-1 btn-effect-1 text-uppercase save" id="btnsubmit" type="submit"><?php echo $this->Admin_model->translate("Get a free service") ; ?></button>
                            </div>
                            <p class="form-messege mb-0 mt-20"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTACT MESSAGE AREA END -->

    <!-- GOOGLE MAP AREA START -->
    <section style="margin-top:50px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
    
    <div class="google-map mb-120">
    <br><br><br><br>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9334.271551495209!2d-73.97198251485975!3d40.668170674982946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25b0456b5a2e7%3A0x68bdf865dda0b669!2sBrooklyn%20Botanic%20Garden%20Shop!5e0!3m2!1sen!2sbd!4v1590597267201!5m2!1sen!2sbd" width="100%" height="100%" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

    </div>
    </div>
    </div>
        </div>
    </section>
    <!-- GOOGLE MAP AREA END -->

   

    <!-- FOOTER AREA START -->
    <?php $this->load->view('home/footer'); ?> 
    <!-- FOOTER AREA END -->
</div>
<!-- Body main wrapper end -->

    <!-- All JS Plugins -->
    <script src="<?php echo base_url() ; ?>assets/home_assets/js/plugins.js"></script>
    <!-- Contact Form -->
    <script src="<?php echo base_url() ; ?>assets/home_assets/js/contact.js"></script>
    <!-- Main JS -->
    <script src="<?php echo base_url() ; ?>assets/home_assets/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
 

    <script type="text/javascript">
/* Add data */ /*Form Submit*/

$(document).ready(function(){

    $("#btnsubmit").on('click',(function(e){
 
  
 e.preventDefault();

 var section = $(this).data('value');
 
  
 var controllerfun = '<?php echo base_url() ?>'+"home/send_enquiry";
 
   var formData = new FormData($('#contact-form')[0]);
  
 

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
            
           
        $('#contact-form ').trigger("reset");
             swal({
            title: objData.status,
            text: objData.message,
            icon: "success",
            button: "Ok",
            
  });

            setTimeout(function() {
             window.location.href="<?php echo base_url() ?>home"
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

