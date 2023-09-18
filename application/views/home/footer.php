<?php $footer = $this->Admin_model->get_single_data('footer_page',array('id'=>'1')) ;
$social = $this->Admin_model->get_single_data('social_media_links',array('id'=>'1')) ;
$paymenticons = $this->Admin_model->get_all_data('payment_icons',array('status'=>'Y')) ;
$session = $this->session->userdata('lang'); 
 ?>
      
 
<footer class="ltn__footer-area  ">
        <div class="footer-top-area  section-bg-1 plr--5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-4 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-about-widget">
                            <div class="footer-logo">
                                <div class="site-logo">
                                    <img src="<?php echo base_url() ; ?>uploads/images/<?php echo $footer->logo ?>" alt="Logo" style="margin-top:-15px;">
                                    
                                </div>
                            </div>

                            
                          
                            <p style="margin-top:10px">
                            <?php 
                            if($session =='eng') { 
                                echo $footer->footer_text ; 
                            }else{
                                echo $footer->footer_text_ar ;
                                } ?>
                          </p>
                           
                            <div class="ltn__social-media mt-20">
                                <ul>
                                    <li><a href="<?php echo $social->facebook ; ?>" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="<?php echo $social->twitter ; ?>" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="<?php echo $social->linkedin ; ?>" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                                    <li><a href="<?php echo $social->youtube ; ?>" title="Youtube"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-menu-widget clearfix">
                            <h4 class="footer-title"> <?php 
                            if($session =='eng') { 
                                echo $footer->links_title ; 
                            }else{
                                echo $footer->links_title_ar ;
                                } ?></h4>
                            <div class="footer-menu">
                                <ul>
                                    <li><a href="<?php echo base_url() ; ?>home/about"><?php echo $this->Admin_model->translate("About Us") ; ?></a></li>
                                    <li><a href="<?php echo base_url() ; ?>home/privacy"><?php echo $this->Admin_model->translate("Privacy Policy") ; ?></a></li>
                                    <li><a href="<?php echo base_url() ; ?>home/terms"><?php echo $this->Admin_model->translate("Terms & Condition") ; ?></a></li>
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-menu-widget clearfix">
                            <h4 class="footer-title"> <?php 
                            if($session =='eng') { 
                                echo $footer->services_title ; 
                            }else{
                                echo $footer->services_title_ar ;
                                } ?></h4>
                            <div class="footer-menu">
                                <ul>
                                    <li><a href="<?php echo base_url() ; ?>home/industry"><?php echo $this->Admin_model->translate("Industrial Uniforms") ; ?></a></li>
                                    <li><a href="<?php echo base_url() ; ?>home/school"><?php echo $this->Admin_model->translate("School Uniforms") ; ?></a></li>
                                                                     
                                </ul>
                            </div>
                        </div>
                    </div>
                   
                   
                    <div class="col-xl-4 col-md-6 col-sm-12 col-12">
                        <div class="footer-widget footer-newsletter-widget">
                            <h4 class="footer-title"><?php 
                            if($session =='eng') { 
                                echo $footer->contactus_title ; 
                            }else{
                                echo $footer->contactus_title_ar ;
                                } ?></h4>
                            <div class="footer-address">
                                <ul>
                                    <li>
                                        <div class="footer-address-icon">
                                            <i class="icon-placeholder"></i>
                                        </div>
                                        <div class="footer-address-info">
                                            <p><?php 
                            if($session =='eng') { 
                                echo $footer->address ; 
                            }else{
                                echo $footer->address_ar ;
                                } ?></p>
                                        </div>
                                         <li>
                                        <div class="footer-address-icon">
                                            <i class="icon-call"></i>
                                        </div>
                                        <div class="footer-address-info">
                                            <p><a href="tel:+<?php echo $footer->phone ?>">+<?php echo $footer->phone ?></a></p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="footer-address-icon">
                                            <i class="icon-mail"></i>
                                        </div>
                                        <div class="footer-address-info">
                                            <p><a href="mailto:<?php echo $footer->email ?>"><?php echo $footer->email ?></a></p>
                                        </div>
                                    </li>
                                    </li>
                                   
                                </ul>
                            </div>
                            <br>
                            <p class="accept">
                            <?php 
                            if($session =='eng') { 
                                echo $footer->follow_us ; 
                            }else{
                                echo $footer->follow_us_ar ;
                                } ?> : 
                                </p >
                            <ul class="visa">

                                <?php if(!empty($paymenticons)){
                                    foreach ($paymenticons as  $pvalue) { ?>
                                        <li><img src="<?php echo base_url() ; ?>uploads/images/icons/<?php echo $pvalue['image'] ?>"></li>  
                                  <?php  }
                                } ?>
                             
                             
</ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </footer>
 
 
                     

</div>
<!-- Body main wrapper end -->

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
    <script>
  function langAjax($lang){
    // alert($lang);
    // $('#alerts').hide();
    var lang = $lang;
    
    $.ajax({
    
    type: "POST",
    url: 'session_ajax.php',
    data: "lang="+lang, 
    success: function(response) {
      location.reload(); 
    }
    
      
    });
    // }
    }
    
  </script>
    <!-- All JS Plugins -->
    <script src="<?php echo base_url() ; ?>assets/home_assets/js/plugins.js"></script>
    <!-- Main JS -->
    <script src="<?php echo base_url() ; ?>assets/home_assets/js/main.js"></script>


<script type="text/javascript" src="<?php echo base_url();?>assets/toastr/toastr.min.js"></script> 
<script type="text/javascript">
$(document).ready(function(){
    toastr.options.closeButton = true;
    toastr.options.progressBar = true;
    toastr.options.timeOut = 3000;
    toastr.options.preventDuplicates = true;
    toastr.options.positionClass = "toast-top-center";
    var site_url = '<?php echo site_url(); ?>';
});
</script>


<script type="text/javascript">
$(document).ready(function(){


cartupdate();

});

function cartupdate(){
    $.ajax(
{
type: "GET",
url: '<?php echo base_url(); ?>'+'home/loadcartqty',
success: function (data) {
  
$("#cartitem").html(data) ;
$("#cartitem2").html(data) ;

 

},

});
}

function itemremove($id){

$rowid = $id ;
    

$.ajax({ 
type: "POST",
url: "<?php echo base_url(); ?>"+'home/remove/'+$rowid,
data: {rowid:$rowid,viewname:'viewcart'},
}).done(function(response){

    console.log(response);
 
$("#cartdata").html(response);
cartupdate();
 
});

}


function itemremove_modal($id){

$rowid = $id ;
    

$.ajax({ 
type: "POST",
url: "<?php echo base_url(); ?>"+'home/remove/'+$rowid,
data: {rowid:$rowid,viewname:'removemodal'},
}).done(function(response){
 

 
  //$("#ltn__utilize-cart-menu").addClass('ltn__utilize-open');

  

// //$("#cart").html(response);
//  $("#ltn__utilize-cart-menu").load(location.href + " #ltn__utilize-cart-menu");

//   $('#ltn__utilize-cart-menu').toggle(); 
// $('#ltn__utilize-cart-menu').show(); 
  // $("#myModal").reload();

cartupdate();
 $("#ltn__utilize-cart-menu").html(response); 

//location.reload();


 //window.location.href="<?php echo base_url();?>home/viewcart#ltn__utilize-cart-menu";
 
});

}





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
