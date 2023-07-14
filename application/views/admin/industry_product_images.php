 <?php $this->load->view('admin/header');?>
<body>
<?php $this->load->view('admin/top_header');?>
<?php $this->load->view('admin/side_header');?>

<?php $session = $this->session->userdata('superadmindet');?>

<div id="wrapper">
<div class="main-content">
<div class="row small-spacing">
<div class="col-xs-12">
     <div class="box-content card white">
<div class="box-title row">
    <div class='col-md-4'><h4><?php echo $products->product_name ?> - Images</h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
         <a href="<?php echo base_url(); ?>admin/industry_products"><button class="btn btn-warning"><?php echo $this->Admin_model->translate("Industry Products") ?></button></a>
    </div>
</div>

 
<div class="box-content">


<div class="card-content">



<?php $attributes = array('name' => 'edit_driver', 'id' => 'xin-form', 'autocomplete' => 'off');?>
<?php $hidden = array('_user' => $session['user_id']);?>
<?php echo form_open('admin/add_industry_product_images', $attributes, $hidden);?>
<div class="form-body"> 

  <input type="hidden" name="product_id" value="<?php echo  $products->id ?>">

 
<div class="row" > 
                <div class="col-md-4">
                  <div class="form-group">

                             <label for="xin_employee_password"><?php echo $this->Admin_model->translate("Select Available Colors") ?> </label>

                    <select class=" form-control "  name="colors" id="color_available">
                    <option value="">  --Select--</option>

                    <?php 

foreach ($colors as  $color) { ?>

  <?php if($this->Admin_model->check_id_exists('color_master',$color)){ ?>


<option value="<?php echo $color  ?>"><?php echo $this->Admin_model->get_type_name_by_id('color_master','id',$color,'color_name') ?></option>


<?php  } } ?>
                    
                     </select>

 


                    
                  </div>
                </div>
                <div class="col-md-3" id='Uploadcontainer'>
  <label class="control-label">Add Product Images</label>
<input type='file' name='image[]' class='uploadfile form-control'>
</div>
<br>
                <div class="col-md-4">
                <div class="form-group" >  
  <button id='extraUpload' class="btn btn-success btn-block btn-xs" onclick="return addAnother('Uploadcontainer')"><i class="fa fa-plus"></i> Click here to add more images</button>
</div>
                </div>
              </div>
   
 <div class="row">

 <div class="form-group">

<div id="addedimages">

</div>

</div>
  
  
 </div>
               

<br>
<div class="form-actions"> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => 'btn btn-primary btn-block', 'content' => '<i class="fa fa fa-check-square-o"></i>&nbsp;&nbsp;'.$this->Admin_model->translate("Save"))); ?> </div>
<?php echo form_close(); ?> </div>

<!-- /.box-content -->
</div>
</div>
<!-- /.col-lg-6 col-xs-12 -->
</div>
</div>


</div>
</div>
</div>
</body>


 <?php $this->load->view('admin/footer');?>

 
 <script type="text/javascript">

  function addAnother(hookID)
{

  if($('#color_available').val()  != ''){
    var hook = document.getElementById(hookID);
    var el      =   document.createElement('input');
    el.className    =   'uploadfile form-control';
    el.setAttribute('type','file');
    el.setAttribute('name','image[]');
    hook.appendChild(el);
    return false;
  }else{
    toastr.error('Select Color to proceed');
 
  }
    
}


    $(document).on('change',"#color_available", function()
   { 
    var product_id  = '<?php echo $products->id ?>';
    var color_id  = $(this).val();
    
    $.ajax({  
    url:"<?php echo base_url(); ?>admin/get_product_images",  
    method:"POST",  
    data:{product_id:product_id,color_id:color_id,type:'industry'},  
    success:function(data)
    { 

      $('#addedimages').html(data);
    }
    
    });


     


   });
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
location.reload();
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
 