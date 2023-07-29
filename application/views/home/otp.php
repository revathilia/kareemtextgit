<!doctype html>
<html class="no-js"  lang="<?php echo $this->session->userdata('lang') ; ?>">


<!-- Mirrored from tunatheme.com/tf/html/vicodin-preview/vicodin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Mar 2023 08:39:14 GMT -->
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

<!-- HEADER AREA START (header-5) -->
 <?php $this->load->view('home/header'); ?> 
    <!-- HEADER AREA END -->
<br><br><br><br>
<section class="log">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h5 class="text-center"><?php echo $this->Admin_model->translate("Account") ; ?></h5>
                
                <hr>
</div>
</div>

    <div class="row justify-content-md-center">
      <div class="col-md-4 text-center">
        <br>
        <div class="row bg-grey">
            <h6><?php echo $this->Admin_model->translate("OTP") ; ?></h6>
            <hr class="li-orangees">
          <div class="col-sm-12  bgWhite">
        
            <p class="text-left enter"><?php echo $this->Admin_model->translate("ENTER OTP") ; ?></p>
            <form action="">
            <input id="otp-first" type="number" min="0" max="9" step="1" aria-label="first digit" value="" />
  <input id="otp-second" type="number" min="0" max="9" step="1" aria-label="second digit" value=""/>
  <input id="otp-third" type="number" min="0" max="9" step="1" aria-label="third digit" value=""/>
  <input id="otp-fourth" type="number" min="0" max="9" step="1" aria-label="fourth digit" value=""/>

            </form>
            <br>
            <button class='btn btn-orange' id="submitotp"><?php echo $this->Admin_model->translate("Proceed") ; ?></button>
            <br>   <br> 
            <a style="cursor:pointer" id="resendotp"><p> <?php echo $this->Admin_model->translate("Didn’t rececive OTP ?") ; ?> <span><?php echo $this->Admin_model->translate("RESEND") ; ?></span></p></a>
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
<script>
    console.clear();
let inputs = document.querySelectorAll("input");
let values = Array(4);
let clipData;
inputs[0].focus();

inputs.forEach((tag, index) => {
  tag.addEventListener('keyup', (event) => {
    if(event.code === "Backspace" && hasNoValue(index)) {
      if(index > 0) inputs[index - 1].focus();
    }
    
    //else if any input move focus to next or out
    else if (tag.value !== "") {
      (index < inputs.length - 1) ? inputs[index + 1].focus() : tag.blur();
    }
    
    //add val to array to track prev vals
    values[index] = event.target.value;
  });
  
  tag.addEventListener('input', () => {
    //replace digit if already exists
    if(tag.value > 10) {
      tag.value = tag.value % 10;
    }
  });
  
  tag.addEventListener('paste', (event) => {
    event.preventDefault();
    clipData = event.clipboardData.getData("text/plain").split('');
    filldata(index);
  })
})

function filldata(index) {
  for(let i = index; i < inputs.length; i++) {
    inputs[i].value = clipData.shift();
  }
}

function hasNoValue(index) {
  if(values[index] || values[index] === 0) 
    return false;
  
  return true;
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


    $('#submitotp').click(function(){
			$('.save').prop('disabled', true);
      var d1 = $('#otp-first').val();
      var d2 = $('#otp-second').val();
      var d3 = $('#otp-third').val();
      var d4 = $('#otp-fourth').val();
      var phone = localStorage.phone
        if(d1 != "" && d2 != "" && d3 != "" && d4 != ""  && phone != undefined) {
          var otp = d1+d2+d3+d4
          $.ajax( {
                  url:'<?php echo  base_url() ; ?>home/verifyotp',
                  type: "POST",
                  data:{phone:phone,otp:otp},
                  success:function(JSON) {
                    if (JSON.error != '') {
                        toastr.error(JSON.error);
                        $('.save').prop('disabled', false);
                      } else {
                        // toastr.success(JSON.result);
                        $('.save').prop('disabled', false);
                         window.location.href = "<?php echo base_url();?>home/redirect";
                      }
                  }
               });
        }
    });

    //resentotp
    $('#resendotp').click(function(){
      var phone = localStorage.phone
      $.ajax( {
                  url:'<?php echo  base_url() ; ?>home/sentotp',
                  type: "POST",
                  data:{phone:phone},
                  success:function(JSON) {
                    if (JSON.error != '') {
                        toastr.error(JSON.error);
                        $('.save').prop('disabled', false);
                      } else {
                        toastr.success("Otp sent");
                        $('.save').prop('disabled', false);
                      }
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