<footer class="ltn__footer-area  ">
        <div class="footer-top-area  section-bg-1 plr--5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-4 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-about-widget">
                            <div class="footer-logo">
                                <div class="site-logo">
                                    <img src="<?php echo base_url() ; ?>assets/home_assets/img/foo-logo.png" alt="Logo" style="margin-top:-15px;">
                                    
                                </div>
                            </div>
                          
                                                       <p style="margin-top:10px">Lorem Ipsum is simply dummy text of the and typesetting industry. Lorem Ipsum is dummy text of the printing.</p>
                           
                            <div class="ltn__social-media mt-20">
                                <ul>
                                    <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                                    <li><a href="#" title="Youtube"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-menu-widget clearfix">
                            <h4 class="footer-title">Home</h4>
                            <div class="footer-menu">
                                <ul>
                                    <li><a href="<?php echo base_url() ; ?>home/about"><?php echo $this->Admin_model->translate("About Us") ; ?></a></li>
                                    <li><a href="#"><?php echo $this->Admin_model->translate("Privacy Policy") ; ?></a></li>
                                    <li><a href="#"><?php echo $this->Admin_model->translate("Terms & Condition") ; ?></a></li>
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-menu-widget clearfix">
                            <h4 class="footer-title"><?php echo $this->Admin_model->translate("Categories") ; ?></h4>
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
                            <h4 class="footer-title"><?php echo $this->Admin_model->translate("Support") ; ?></h4>
                            <div class="footer-address">
                                <ul>
                                    <li>
                                        <div class="footer-address-icon">
                                            <i class="icon-placeholder"></i>
                                        </div>
                                        <div class="footer-address-info">
                                            <p>Brooklyn, New York, United States</p>
                                        </div>
                                         <li>
                                        <div class="footer-address-icon">
                                            <i class="icon-call"></i>
                                        </div>
                                        <div class="footer-address-info">
                                            <p><a href="tel:+0123-456789">+0123-456789</a></p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="footer-address-icon">
                                            <i class="icon-mail"></i>
                                        </div>
                                        <div class="footer-address-info">
                                            <p><a href="mailto:example@example.com">example@example.com</a></p>
                                        </div>
                                    </li>
                                    </li>
                                   
                                </ul>
                            </div>
                            <br>
                            <p class="accept"><?php echo $this->Admin_model->translate("We accept : ") ; ?></p >
                            <ul class="visa">
                              <li><img src="<?php echo base_url() ; ?>assets/home_assets/img/home/master1.svg"></li>  
                              <li><img src="<?php echo base_url() ; ?>assets/home_assets/img/home/visa.svg"></li> 
                              <li><img src="<?php echo base_url() ; ?>assets/home_assets/img/home/master1.svg"></li>  
                              <li><img src="<?php echo base_url() ; ?>assets/home_assets/img/home/visa.svg"></li> 
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
