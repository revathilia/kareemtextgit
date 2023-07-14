 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <!--multisteps-form-->
       <div class="col-lg-12 col-md-12">
                <div class="form-wizard">
                    <form action="<?php base_url()?>home/uniform" method="post" id="uniformdata" role="form">
                        
                        <fieldset class="wizard-fieldset show">
                            
                        
<input type="hidden" name="schoolid" value="<?php echo $schoolid ; ?>" id="productid" >  <div class="radio-wrapper">

<div class="radio-container">
    <?php if($type == 'mixed' || $type == 'boys'){ ?>
    <input type="radio" name="gender" class="selected_gender"  value="male" id="male" />
    <label for="male">Male</label>
    <?php } ?>
    <?php if($type == 'mixed' || $type == 'girls'){ ?>
    <input type="radio" name="gender" value="female" id="female"  class="selected_gender"  />
    <label for="female">Female</label>
     <?php } ?>
</div>
</div>

    
                            
                            
                            <div class="form-group clearfix">
                                <a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
                            </div>
                        </fieldset> 
                        <fieldset class="wizard-fieldset">
                            
                        <div class="radio-wrapper2">

<div class="radio-container2">
<div class="row">
       <?php foreach ($classes as $class) { ?>
          <div class="col-md-6"><input type="radio" name="selected_class" class="selected_class"  value="<?php echo $class['id'] ?>" id="choice_<?php echo $class['id'] ?>" >
      <label for="choice_<?php echo $class['id'] ?>"> <?php if($class['standard_name'] == 'LKG' || $class['standard_name'] == 'UKG') { echo '' ; } else { echo 'Class' ;} ?><?php echo $class['standard_name'] ?></label></div>
     <?php  } ?>
</div>
</div>
</div>
<div class="form-group clearfix" style="margin-left:-50px;">
                                <a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
                                <a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
                            </div>
                            
                        </fieldset> 
                        
                        <fieldset class="wizard-fieldset">
                            <p class="text-center"><img src="<?php echo base_url()?>uploads/images/school/<?php echo $logo ?>" width="200px" height="200px"></p>
                            <h6 class="text-center">Selected Choices</h6>
                            <div class="row">
                                <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control2 " id="gender">
                                
                                <div class="wizard-form-error"></div>
                            </div>
</div>
<div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control2 " id="class">
        
                                <div class="wizard-form-error"></div>
                            </div>
</div>
</div>
                            <div class="form-group clearfix" style="margin-left:-50px;margin-top:-30px">
                                <a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
                                <a href="javascript:;" class="form-wizard-submit float-right">Submit</a>
                            </div>
                        </fieldset> 
                        <div class="form-wizard-header">
                            
                            <ul class="list-unstyled form-wizard-steps clearfix">
                                <li class="active"><span></span></li>
                                <li><span></span></li>
                                <li><span></span></li>
                                
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
      </div>
      
    </div>
  </div>

  <!-- Stepper JavaScript -->
<script>
jQuery(document).ready(function() {
    // click on next button
    jQuery('.form-wizard-next-btn').click(function() {
        var parentFieldset = jQuery(this).parents('.wizard-fieldset');
        var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
        var next = jQuery(this);
        var nextWizardStep = true;
        parentFieldset.find('.wizard-required').each(function(){
            var thisValue = jQuery(this).val();

            if( thisValue == "") {
                jQuery(this).siblings(".wizard-form-error").slideDown();
                nextWizardStep = false;
            }
            else {
                jQuery(this).siblings(".wizard-form-error").slideUp();
            }
        });
        if( nextWizardStep) {
            next.parents('.wizard-fieldset').removeClass("show","400");
            currentActiveStep.removeClass('active').addClass('activated').next().addClass('active',"400");
            next.parents('.wizard-fieldset').next('.wizard-fieldset').addClass("show","400");
            jQuery(document).find('.wizard-fieldset').each(function(){
                if(jQuery(this).hasClass('show')){
                    var formAtrr = jQuery(this).attr('data-tab-content');
                    jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function(){
                        if(jQuery(this).attr('data-attr') == formAtrr){
                            jQuery(this).addClass('active');
                            var innerWidth = jQuery(this).innerWidth();
                            var position = jQuery(this).position();
                            jQuery(document).find('.form-wizard-step-move').css({"left": position.left, "width": innerWidth});
                        }else{
                            jQuery(this).removeClass('active');
                        }
                    });
                }
            });
        }
    });
    //click on previous button
    jQuery('.form-wizard-previous-btn').click(function() {
        var counter = parseInt(jQuery(".wizard-counter").text());;
        var prev =jQuery(this);
        var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
        prev.parents('.wizard-fieldset').removeClass("show","400");
        prev.parents('.wizard-fieldset').prev('.wizard-fieldset').addClass("show","400");
        currentActiveStep.removeClass('active').prev().removeClass('activated').addClass('active',"400");
        jQuery(document).find('.wizard-fieldset').each(function(){
            if(jQuery(this).hasClass('show')){
                var formAtrr = jQuery(this).attr('data-tab-content');
                jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function(){
                    if(jQuery(this).attr('data-attr') == formAtrr){
                        jQuery(this).addClass('active');
                        var innerWidth = jQuery(this).innerWidth();
                        var position = jQuery(this).position();
                        jQuery(document).find('.form-wizard-step-move').css({"left": position.left, "width": innerWidth});
                    }else{
                        jQuery(this).removeClass('active');
                    }
                });
            }
        });
    });
    //click on form submit button
    jQuery(document).on("click",".form-wizard .form-wizard-submit" , function(){

         if($('#gender').val() == '' || $('#class').val() == ''){
             toastr.error('Select gender and class to proceed');
             return false;
         }
        var parentFieldset = jQuery(this).parents('.wizard-fieldset');
        var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
        parentFieldset.find('.wizard-required').each(function() {
            var thisValue = jQuery(this).val();
            if( thisValue == "" ) {
                jQuery(this).siblings(".wizard-form-error").slideDown();
            }
            else {
                jQuery(this).siblings(".wizard-form-error").slideUp();
            }
        });

var data = $('#uniformdata').serialize() ;
 
  $.ajax({  
url:"<?php echo base_url() ?>home/uniform_tosession",  
method:"POST",  
data:{uniformdata:data },  
success:function(data){ 
 if(data == 1){

    
    window.location = "<?php echo base_url(); ?>"+'home/uniform';  

 }else{
    toastr.error('No uniform available for the selection, please contact admin !');
     

    
        setInterval(function() {
            window.location = "<?php echo base_url(); ?>"+'home/school';  
                }, 3000); //3 seconds

 }
  
}  
}); 
   
  
      


    });
    // focus on input field check empty or not
    jQuery(".form-control").on('focus', function(){
        var tmpThis = jQuery(this).val();
        if(tmpThis == '' ) {
            jQuery(this).parent().addClass("focus-input");
        }
        else if(tmpThis !='' ){
            jQuery(this).parent().addClass("focus-input");
        }
    }).on('blur', function(){
        var tmpThis = jQuery(this).val();
        if(tmpThis == '' ) {
            jQuery(this).parent().removeClass("focus-input");
            jQuery(this).siblings('.wizard-form-error').slideDown("3000");
        }
        else if(tmpThis !='' ){
            jQuery(this).parent().addClass("focus-input");
            jQuery(this).siblings('.wizard-form-error').slideUp("3000");
        }
    });
});

  $('.selected_gender').change(function() {
        if(this.checked) {
                if($(this).val() == 'male'){
                    $('#gender').val('Male'); 
                }else if($(this).val() == 'female'){
                    $('#gender').val('Female'); 
                }
 
        }else{
             toastr.error('Select gender to proceed');
             return false;
                   
        }
             
               
    });

   $('.selected_class').change(function() {
        if(this.checked) {
                 $('#class').val($(this).next('label').text());
 
        }else{
             toastr.error('Select gender to proceed');
             return false;
                   
        }
             
               
    });


</script>