<?php $this->load->view('admin/header');?>
<body>
<?php $this->load->view('admin/top_header');?>
<?php $this->load->view('admin/side_header');?>
 

<?php $session = $this->session->userdata('superadmindet');?>
 
 
 <div id="wrapper">
<div class="main-content">
<div class="row small-spacing">

  <div class="box-content card white">
<div class="box-title row">
    <div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Edit Coupon") ?></h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
            <a href="<?php echo base_url(); ?>admin/coupons"><button class="btn btn-warning"><?php echo $this->Admin_model->translate("Coupon List") ?></button></a>
    </div>
</div>




  <div class="card-content">


     
         <?php $attributes = array('name' => 'edit_driver', 'id' => 'xin-form', 'autocomplete' => 'off');?>
        <?php $hidden = array('_user' => $session['user_id']);?>
        <?php echo form_open('admin/update_coupon', $attributes, $hidden);?>
        <div class="form-body">
          <div class="row"> 

            <input type="hidden" name="couponid" value="<?php echo $coupon->id ?>">
               
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="first_name"><?php echo $this->Admin_model->translate("Coupon Name") ?></label>
                    <input class="form-control" placeholder="<?php echo $this->Admin_model->translate("School Name") ?>" name="coupon_name" type="text" value="<?php echo $coupon->coupon_name ?>">
                  </div>
                </div>
               
               <div class="col-md-6">
                  <div class="form-group">
                    <label for="first_name"><?php echo $this->Admin_model->translate("Coupon Name - Arabic") ?></label>
                    <input class="form-control" placeholder="<?php echo $this->Admin_model->translate("School Name") ?>" name="coupon_code" type="text" readonly value="<?php echo $coupon->coupon_code ?>">
                  </div>
                </div>
               
                  
               
               
               </div>
 

              
              <div class="row"> 
                <div class="col-md-6">
                      <div class="form-group">
                      <label for="first_name"><?php echo $this->Admin_model->translate("Coupon Icon") ?></label>
 
                      <input type="file" id="imgInp" name="coupon_image" onchange="readURL(this);" class="form-control " >
                      <small>Upload files only: gif,png,jpg,jpeg</small>

     
                  </div>
                </div>
                 <input type="hidden" name="iconname" id="iconname" value="<?php echo $coupon->coupon_image ;?>">

<div class="col-md-6">
        <div class='form-group'>
          <?php if($coupon->coupon_image!='' && $coupon->coupon_image!='no file') {?>
          <img   class="img-thumb" src="<?php echo base_url().'uploads/images/coupons/'.$coupon->coupon_image;?>" style="height:100px !important;width:100px !important;  " id="image">
          
           <a class="btn btn-xs btn-success" href="<?php echo site_url()?>download?type=images/coupons&filename=<?php echo $coupon->coupon_image;?>">Download</a><button class="btn btn-xs btn-warning" onclick="remove();return false;">Remove</button>
          
          <?php } else {?>
          <img   class="img-thumb" src="" style="height:100px !important;width:100px !important; " id="image">  
      
          <?php } ?> </div>
      </div>

              </div>

           
  <div class="row">

  <div class="col-md-4">
                  <div class="form-group">

                             <label for="xin_employee_password"><?php echo $this->Admin_model->translate("Applicable to") ?> </label>

                    <select class="form-control" name="applicable_for">
                    
                    <option value="percent" <?php if($coupon->applicable_for == 'industry'){echo 'selected' ;} ?>><?php echo $this->Admin_model->translate("Industry") ?> </option>              
                     <option value="amount" <?php if($coupon->applicable_for == 'school'){echo 'selected' ;} ?>><?php echo $this->Admin_model->translate("School") ?> </option>
                      <option value="both" <?php if($coupon->applicable_for == 'both'){echo 'selected' ;} ?>><?php echo $this->Admin_model->translate("Both") ?> </option>
                        
                  
                   
                    
                     </select>
                    
                  </div>
                </div>


                <div class="col-md-4">
                  <div class="form-group">

                             <label for="xin_employee_password"><?php echo $this->Admin_model->translate("Discount Type") ?> </label>

                    <select class="form-control" name="discount_type">
                    
                    <option value="percent" <?php if($coupon->discount_type == 'percent'){echo 'selected' ;} ?>>Percentage </option>              
                     <option value="amount" <?php if($coupon->discount_type == 'amount'){echo 'selected' ;} ?>>Amount </option>
                        
                  
                   
                    
                     </select>
                    
                  </div>
                </div>
                      
           

                   
  <div class="col-md-4">
  <div class="form-group">
    <label for="first_name">  Discount Value</label>
        <input type="number" class="form-control contact" name="discount_value" placeholder="Add description about school" value="<?php echo $coupon->discount_value ;?>"> 
</div>
</div>
</div>
          
             <div class="row">
  <div class="col-md-6">
  <div class="form-group">
    <label for="first_name">  Start Date</label>
        <input type="date" class="form-control contact"   name="starts_from" placeholder="Add description about school" value="<?php echo $coupon->starts_from ;?>">
</div>
</div>

   <div class="col-md-6">
  <div class="form-group">
    <label for="first_name">  Expiry Date  </label>
        <input type="date" class="form-control contact"   name="ends_on" placeholder="Add description about school" value="<?php echo $coupon->ends_on ;?>">
</div>
</div>

</div>

 <div class="row">
  <div class="col-md-6">
  <div class="form-group">
    <label for="first_name"> Unlimited Usage</label>
        <input type="checkbox"    name="unlimited_usage" placeholder="Add description about school" <?php if($coupon->unlimited_usage  == 'Y'){echo "checked" ; } ?> value="<?php echo $coupon->unlimited_usage ;?>">
</div>
</div>

   <div class="col-md-6">
  <div class="form-group">
    <label for="first_name"> Free shipping </label>
       <input type="checkbox"  name="shipping_free" placeholder="Add description about school" <?php if($coupon->shipping_free  == 'Y'){echo "checked" ; } ?> value="<?php echo $coupon->shipping_free ;?>">
</div>
</div>

</div>


        
             
          
           
        </div>
        <div class="form-actions"> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => 'btn btn-primary btn-block', 'content' => '<i class="fa fa fa-check-square-o"></i>'.$this->Admin_model->translate("Save"))); ?> </div>
        <?php echo form_close(); ?> </div>


</div>
</div>
</div>
</div>



</body>

<!-- ================================================== -->
 <?php $this->load->view('admin/footer');?>

 

 <script type="text/javascript">
  imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    image.src = URL.createObjectURL(file)
  }
}

function readURL(input) {
    if (input.files && input.files[0]) {
var reader = new FileReader();

jQuery('#image').removeAttr('src')
jQuery('#image').show();



reader.onload = function (e) {
$('#image').attr('src', e.target.result);
$('#image').attr('style', "height:200px !important;width:200px !important;");

}

reader.readAsDataURL(input.files[0]);
}
}

function remove() {
jQuery('#image').removeAttr('src'); 
document.getElementById("iconname").value = "";

}

</script>

  
<script type="text/javascript">
  /* Add data */ /*Form Submit*/

  $(document).ready(function(){
   
  
      
    
  /* Add data */ /*Form Submit*/
  $("#xin-form").submit(function(e){
    var fd = new FormData(this);
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
        if (JSON.error != '') {
        toastr.error(JSON.error);
        $('.save').prop('disabled', false);
        } else {
        toastr.success(JSON.result);
        $('.save').prop('disabled', false);
        window.location.href="<?php echo base_url();?>admin/coupons";
        }
      },
      error: function() 
      {
        toastr.error(JSON.error);
       
        $('.save').prop('disabled', false);
      }           
     });
  });

  });

 
 
</script>
