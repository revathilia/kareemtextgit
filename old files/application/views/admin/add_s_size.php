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
<div class='col-md-4'><h4>Add Size </h4></div>
<div class='col-md-6'></div>
<div class='col-md-2'> 
<a href="<?php echo base_url(); ?>admin/sizes_s"><button class="btn btn-warning">All Sizes</button></a>
</div>
</div>




<div class="card-content">



<?php $attributes = array('name' => 'edit_driver', 'id' => 'xin-form', 'autocomplete' => 'off');?>
<?php $hidden = array('_user' => $session['user_id']);?>
<?php echo form_open('admin/add_s_size', $attributes, $hidden);?>
<div class="form-body">
    

      <div class="row"> 
<div class="col-md-12">
<div class="form-group">
<label for="first_name"><?php echo $this->Admin_model->translate("Size") ?></label>
<input class="form-control contact" placeholder="size"  id="bgcolorcode"  name="size_name" type="text"  value="">
     
</div>
</div>
</div>


<div class="row">
  <div class="col-md-12">
  <div class="form-group">
    <label for="first_name">  Description</label>
        <textarea class="form-control contact" placeholder="size description"  name="description" placeholder=" Add size description"></textarea>
</div>
</div>
</div>

<table class="table table-bordered">  
    <thead>
     <th>Available Measurements</th> 
     <th>Value</th>
      
    </thead>

    <?php foreach ($measurements as $value) {?>

<input type="hidden" name="measurement[]" value="<?php echo $value['id'] ?>">
      
<tr><td> <?php echo  $this->Admin_model->get_type_name_by_id('measurements','id',$value['id']  ,'name') ?></td>
  <td><input type="text" class="form-control" required  name="value[]" value=""></td>
</tr>
      
   <?php } ?>
    
</table>
 
 
</div>
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
window.location.href="<?php echo base_url();?>admin/sizes_s";
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

image2.onchange = evt => {
  const [file] = image2.files
  if (file) {
    img2.src = URL.createObjectURL(file);
      $("#img2").attr('style',"height:100px !important;width:100px !important; ") ;
 

  }
}
</script>
 

<script type='text/javascript'>

 function add_image(n)
    {

var span = n.parentNode.querySelectorAll('.images');

var image = "" ;
 image += '<div class="row"> <div class="col-md-2">' ;
    image +=  '<input type="file" id="imgInp"  name="files[]" onchange="readURL(this);" >' ;
     image +=  ' </div><div class="col-md-1">' ;
       image +=  ' <button class="btn btn-xs btn-danger" onclick="remove(this);return false;"> <i class="fa fa-times"></i>  </button></div></div><br/>';

  $(image).appendTo(span);

}

 function remove(n) {
        n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
    }

</script>


 <script type="text/javascript">
function getcolorcode(colorcode) {

$('#bgcolorcode').val(colorcode);
 
  
}
 
 function getcolor(colorcode) {

$('#bgcolor').val(colorcode);
 
  
}
</script>