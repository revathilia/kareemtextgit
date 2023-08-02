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
<div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Add Supporting organization") ?></h4></div>
<div class='col-md-4'></div>
<div class='col-md-4'> 
<a href="<?php echo base_url(); ?>admin/sup_org"><button class="btn btn-warning"><?php echo $this->Admin_model->translate("Supporting organization List") ?></button></a>
</div>
</div>




<div class="card-content">



<?php $attributes = array('name' => 'edit_driver', 'id' => 'xin-form', 'autocomplete' => 'off');?>
<?php $hidden = array('_user' => $session['user_id']);?>
<?php echo form_open('admin/addsupp_org', $attributes, $hidden);?>
<div class="form-body">
<div class="row"> 
<div class="col-md-6">
<div class="form-group">
<label for="first_name"><?php echo $this->Admin_model->translate("Title(English)") ?></label>
<input class="form-control" type="text"  name="title" placeholder="<?php echo $this->Admin_model->translate("Title") ?>">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="first_name"><?php echo $this->Admin_model->translate("Title (Arabic)") ?></label>
<input class="form-control"  type="text" name="ar_title" placeholder="<?php echo $this->Admin_model->translate("Title") ?>">
</div>
</div>

</div>
<br>
<div class="row"> 
	<div class="col-md-12">
<div class="form-group">
 
       <div class="row"> 
    <div class="form-group">

       <div class="col-md-3">
        <label for="first_name"><?php echo $this->Admin_model->translate("Organization name - English") ?></label>
     <input type="text" class="form-control"  name="org_name[]" >

      </div>
      <div class="col-md-3">
        <label for="first_name"><?php echo $this->Admin_model->translate("Organization name - Arabic") ?></label>
      <input type="text" class="form-control"  name="ar_org_name[]" >

      </div>
      <div class="col-md-2">
        <label for="first_name"><?php echo $this->Admin_model->translate("Organization Icon") ?></label>
     <input type="file" id="imgInp"  name="files[]" onchange="readURL(this);" >

       <img   class="img-thumb"  id="image">


      </div>
     
      <div class="col-md-3">
        <label for="first_name"><?php echo $this->Admin_model->translate("Website URL") ?></label>
      <input type="text" class="form-control"  name="website_url[]" >


      </div>

     <div class="col-md-1"> 
     </div> 



    </div>
  </div>

     <br/>
                   

 <span class="images"></span><img src="<?php echo base_url();?>assets/images/add.svg" onclick="add_image(this)"  alt="" width="30px" height="30px"><span onclick="add_image(this)"  ><a href="javascript:void(0)"><b>Add New Organization</b></a> </span> 
</div>
<!--    <small>Upload files only: gif,png,jpg,jpeg</small>
 --> 
<div class="col-md-6">
        <!-- <div class='form-group'>
          
          <img   class="img-thumb" src="" style="height:100px !important;width:100px !important;background-color: blue " id="image">  
          
        </div> -->
      </div>
</div>





</div>
<div class="form-actions"> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => 'btn btn-primary btn-block', 'content' => '<i class="fa fa fa-check-square-o"></i>&nbsp;&nbsp;'.$this->Admin_model->translate("Save"))); ?> </div>
<?php echo form_close(); ?> </div>

</div>
</div>
</div>
</div>
</div>
</body>


<!-- ================================================== -->
<?php $this->load->view('admin/footer');?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


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
window.location.href="<?php echo base_url();?>admin/sup_org";
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

 function add_image(n)
    {

var span = n.parentNode.querySelectorAll('.images');

var image = "" ;
 image += '<div class="row"> <div class="form-group"> <div class="col-md-3">' ;
      image +=   '<input type="text" class="form-control"  name="org_name[]" > </div>' ;
      image +=  '<div class="col-md-3"> <input type="text" class="form-control"  name="ar_org_name[]" > </div><div class="col-md-2">' ;
    image +=  '<input type="file" id="imgInp"  name="files[]" onchange="readURL(this);" >' ;
     image +=  ' </div><div class="col-md-3">' ;
     image +=  '<input type="text" class="form-control"  name="website_url[]" ></div><div class="col-md-1">' ;
       image +=  ' <button class="btn btn-xs btn-danger" onclick="remove(this);return false;"> <i class="fa fa-times"></i>  </button></div></div></div> <br/>';

  $(image).appendTo(span);

}

 function remove(n) {
        n.parentNode.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode.parentNode);
    }
    
</script>

<script src="https://cdn.jsdelivr.net/npm/html-duration-picker/dist/html-duration-picker.min.js"></script>
