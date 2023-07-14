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
    <div class='col-md-4'><h4><?php echo $products->product_name ?> - Price based On Size</h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
         <a href="<?php echo base_url(); ?>admin/school_products"><button class="btn btn-warning"><?php echo $this->Admin_model->translate("School Products") ?></button></a>
    </div>
</div>

 
<div class="box-content">


<div class="card-content">



<?php $attributes = array('name' => 'edit_driver', 'id' => 'xin-form', 'autocomplete' => 'off');?>
<?php $hidden = array('_user' => $session['user_id']);?>
<?php echo form_open('admin/add_school_product_price', $attributes, $hidden);?>
<div class="form-body"> 

  <input type="hidden" name="product_id" value="<?php echo  $products->id ?>">

 <table class="table table-bordered">  
    <thead>
     <th>Available Sizes</th> 
     <th>Price</th>
     <th>Offer Price</th> 
    </thead>

    <?php foreach ($sizes as $value) {?>

      <input type="hidden" name="size[]" value="<?php echo $value ?>">
        
         <?php $priceDet = $this->Admin_model->get_single_data('school_product_price_size_det',array('product_id'=>$products->id,'size_id' => $value , 'status' => 'Y'));



        $price = 0 ;
        $offerprice = 0 ;
        $sizechart = '' ;
         if(!empty( $priceDet)){

          $price = $priceDet->product_price ;
          $offerprice = $priceDet->offer_price ;

          $sizechart = $priceDet->size_chart ;
         } ?>


 <input type="hidden" name="sizechart" value="<?php echo $sizechart ?>">


<tr><td> <?php echo  $this->Admin_model->get_type_name_by_id('size_master','id',$value  ,'size') ?></td>
  <td><input type="text" class="form-control" required  name="price[]" value="<?php echo $price ?>"></td>
  <td> <input type="text" name="offerprice[]"  class="form-control"  value="<?php echo $offerprice ?>"></td>
</tr>
      
   <?php } ?>
    
</table>
   
        
 <div class="row">
<div class="col-md-6">
        <div class='form-group'>
  <label class="control-label">Add Size Chart</label>
<input type='file' id="imgInp" name='image' class=' form-control'>
</div>
        </div>

      <input type="hidden" name="sizechart" id="iconname" value="<?php echo $sizechart ;?>">

<div class="col-md-6">
        <div class='form-group'>
          <?php if( $sizechart!='' && $sizechart !='no file') {?>
          <img   class="img-thumb" src="<?php echo base_url().'uploads/images/school/'. $sizechart;?>" style="height:200px !important;width:200px !important;  " id="image">
          
           <a class="btn btn-xs btn-success" href="<?php echo site_url()?>download?type=images/school&filename=<?php echo  $sizechart ;?>">Download</a><button class="btn btn-xs btn-warning" onclick="remove();return false;">Remove</button>
          
          <?php } else {?>
            <img   class="img-thumb" src="" style="height:200px !important;width:200px !important; " id="image">  
       
          <?php } ?> </div>
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

imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    image.src = URL.createObjectURL(file)
  }
}

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
    data:{product_id:product_id,color_id:color_id,type:'school'},  
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
window.location.href="<?php echo base_url();?>admin/school_products";
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

function remove() {
jQuery('#image').removeAttr('src'); 
document.getElementById("iconname").value = "";

}

</script>
 