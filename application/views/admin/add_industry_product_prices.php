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
<div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Create Industry Stock") ?></h4></div>
<div class='col-md-6'></div>
<div class='col-md-2'> 
<a href="<?php echo base_url(); ?>admin/industry_inventory"><button class="btn btn-warning"><?php echo $this->Admin_model->translate("Industry Stock List") ?></button></a>
</div>
</div>




<div class="card-content">



<?php $attributes = array('name' => 'edit_driver', 'id' => 'xin-form', 'autocomplete' => 'off');?>
<?php $hidden = array('_user' => $session['user_id']);?>
<?php echo form_open('admin/add_industry_stock', $attributes, $hidden);?>
<div class="form-body"> 
  <div class="row"> 
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="first_name"><?php echo $this->Admin_model->translate("Product") ?> </label>
                      
  <?php echo $this->Admin_model->select_html('industry_products','id', 'product_id', 'product_name', 'add', 'demo-chosen-select form-control required product_name', '', '', '', ''); ?>
     
                    </div>
                  </div>
              </div>

              <div class="row" > 
                  <div class="col-md-6">
                    <div class="form-group"  >   

                                   <label for="xin_employee_password"><?php echo $this->Admin_model->translate("Select Available Colors") ?> </label>
                                  

                                   <select class=" form-control  " id="colors_available"  name="colors[]">
                    <option value="">  --Select--</option>

                    
                    
                     </select>   

                    </div>
                  </div>                
              
                  <div class="col-md-6">
                    <div class="form-group" >       
                    <label for="xin_employee_password"><?php echo $this->Admin_model->translate("Select Available Sizes") ?> </label>

                    <select class=" form-control " id="sizes_available"  name="sizes[]">
                    <option value="">  --Select--</option>

                    
                    
                     </select>        

                    </div>
                  </div>                
              </div>
               

               <div class="row" > 
                  <div class="col-md-4">
                    <div class="form-group"  >   

                                   <label for="xin_employee_password"><?php echo $this->Admin_model->translate("Stock Entry Type") ?> </label>
                                 <select class="form-control" name="entry_type">
                                   <option value="add">Add</option>
                                    <option value="deduct">Deduct</option>
                                 </select>

                    </div>
                  </div>                
              
                  <div class="col-md-4">
                    <div class="form-group" >       
                    <label for="xin_employee_password"><?php echo $this->Admin_model->translate("Quantity") ?> </label>

                  
                 <input class="form-control" placeholder="<?php echo $this->Admin_model->translate("Product Quantity") ?>" name="quantity" type="number" value="">       

                    </div>
                  </div>   
                  <div class="col-md-4">
                    <div class="form-group" >       
                    <label for="xin_employee_password"><?php echo $this->Admin_model->translate("Unit Price") ?> </label>

                   
                     <input class="form-control" placeholder="<?php echo $this->Admin_model->translate("Unit Price") ?>" name="unit_price" type="text" value="">     

                    </div>
                  </div>              
              </div>
               


<div class="row">
 
<div class="col-md-3" id='Uploadcontainer'>
  <label class="control-label">Add Product Images</label>
<input type='file' name='image[]' class='uploadfile form-control'>

</div>

<div class="col-md-2">
  <label class="control-label">Add multiple images</label>
  <button id='extraUpload' class="btn btn-success btn-xs" onclick="return addAnother('Uploadcontainer')">click Here</button>

</div>

</div>



</div>
<br/>
<div class="form-actions"> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => 'btn btn-primary btn-block', 'content' => '<i class="fa fa fa-check-square-o"></i>&nbsp;&nbsp;'.$this->Admin_model->translate("Save"))); ?> </div>
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
window.location.href="<?php echo base_url();?>admin/school_inventory";
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
 
 

 <script type="text/javascript">


imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    image.src = URL.createObjectURL(file)
  }
}
</script>

<script type='text/javascript'>

function addAnother(hookID)
{
    var hook = document.getElementById(hookID);
    var el      =   document.createElement('input');
    el.className    =   'uploadfile form-control';
    el.setAttribute('type','file');
    el.setAttribute('name','image[]');
    hook.appendChild(el);
    return false;
}


 $(document).on('change',".product_name", function()
   { 
    var product_id  = $(this).val();
    
    $.ajax({  
    url:"<?php echo base_url(); ?>admin/get_colors",  
    method:"POST",  
    data:{product_id:product_id,type:'industry'},  
    success:function(data)
    { 

      $('#colors_available').html(data);
    }
    
    });


    $.ajax({  
    url:"<?php echo base_url(); ?>admin/get_sizes",  
    method:"POST",  
    data:{product_id:product_id,type:'industry'},  
    success:function(data)
    { 
      $('#sizes_available').html(data);
    }
    
    });


   });

 

</script>