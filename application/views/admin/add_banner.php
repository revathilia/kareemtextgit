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
<div class='col-md-4'><h4>Add Banner</h4></div>
<div class='col-md-6'></div>
<div class='col-md-2'> 
<a href="<?php echo base_url(); ?>admin/banners"><button class="btn btn-warning">Banners</button></a>
</div>
</div>




<div class="card-content">



<?php $attributes = array('name' => 'edit_driver', 'id' => 'xin-form', 'autocomplete' => 'off');?>
<?php $hidden = array('_user' => $session['user_id']);?>
<?php echo form_open('admin/add_banner', $attributes, $hidden);?>
<div class="form-body">
<div class="row"> 
<div class="col-md-6">
<div class="form-group">
<label for="first_name"><?php echo $this->Admin_model->translate("Banner Image") ; ?></label>
<input class="form-control" name="image" id="image1" type="file" value="" >
</div>
</div>

 <div class="col-md-6">
 <div class="form-group">
  
                        <img   class="img-thumb" src=""   id="img1">  
                    
                 </div> 
                </div>

                 <div class="col-md-12">
                  <div class="form-group"> 
                    <label for="first_name"><?php echo $this->Admin_model->translate("Select Page") ; ?></label>
                     <select class="form-control"   name="type" >
                   <?php foreach ($pages as $value) { ?>

                   	<option value="<?php echo $value['controller']?>"><?php echo ucwords($value['controller']) ?></option>
                   	 
                  <?php } ?>
                   	
                   </select>
                  </div>
                </div>



                <!--  <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Banner Title</label>
                   <input class="form-control"  type="text" name="banner_title" value="" >
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Banner Title - Arabic</label>
                   <input class="form-control"  type="text" name="banner_title_ar" value="" >
                  </div>
                </div> -->

                  <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name"><?php echo $this->Admin_model->translate("Banner Content") ; ?></label>
                    <textarea class="form-control"  type="text" name="banner_content"></textarea>
 
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name"><?php echo $this->Admin_model->translate("Banner Content - Arabic") ; ?></label>
                    <textarea class="form-control"  type="text" name="banner_content_ar"></textarea>
 
                  </div>
                </div>

               
           <!--      <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Banner Button Text</label>
                   <input class="form-control"  type="text" name="banner_btn_text" value="" >
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Banner Button Text - Arabic</label>
                   <input class="form-control"  type="text" name="banner_btn_text_ar" value="" >
                  </div>
                </div> -->


</div>

 


</div>
<div class="form-actions"> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => 'btn btn-primary', 'content' => '<i class="fa fa fa-check-square-o"></i>&nbsp;&nbsp;'.$this->Admin_model->translate("Save"))); ?> </div>
<?php echo form_close(); ?> </div>


</div>
</div>
</div>
</div>
</body>

<!-- ================================================== -->
<?php $this->load->view('admin/footer');?>


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
window.location.href="<?php echo base_url();?>admin/banners";
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


image1.onchange = evt => {
  const [file] = image1.files
  if (file) {
    img1.src = URL.createObjectURL(file);
      $("#img1").attr('style',"height:100px !important;width:100px !important; ") ;
 

  }
}

</script>
 