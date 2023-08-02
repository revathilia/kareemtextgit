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
<div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Edit Supporting organization") ?></h4></div>
<div class='col-md-4'></div>
<div class='col-md-4'> 
<a href="<?php echo base_url(); ?>admin/sup_org"><button class="btn btn-warning"><?php echo $this->Admin_model->translate("Supporting organization List") ?></button></a>
</div>
</div>




<div class="card-content">



<?php $attributes = array('name' => 'edit_driver', 'id' => 'xin-form', 'autocomplete' => 'off');?>
<?php $hidden = array('_user' => $session['user_id']);?>
<?php echo form_open('admin/updatesupp_org', $attributes, $hidden);?>

<input type="hidden" name="id" value="<?php echo $suppdet->id?>">
<div class="form-body">
<div class="row"> 
<div class="col-md-6">
<div class="form-group">
<label for="first_name"><?php echo $this->Admin_model->translate("Title(English)") ?></label>
<input class="form-control" type="text"  name="title" placeholder="<?php echo $this->Admin_model->translate("Title") ?>" value="<?php echo $suppdet->title?>">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="first_name"><?php echo $this->Admin_model->translate("Title (Arabic)") ?></label>
<input class="form-control"  type="text" name="ar_title" placeholder="<?php echo $this->Admin_model->translate("Title") ?>"  value="<?php echo $suppdet->ar_title?>">
</div>
</div>

</div>
<br>

 
<div class="row"> 
	<div class="col-md-12">
<div class="form-group">


<?php $organizations = $suppdet->organizations ;
$organizations = json_decode( $organizations, true) ;

if(!empty(  $organizations)){ ?>

 <div class="row"> 
    <div class="form-group">

       <div class="col-md-3">
        <label for="first_name"><?php echo $this->Admin_model->translate("Organization name - English") ?></label>
      
      </div>
      <div class="col-md-3">
        <label for="first_name"><?php echo $this->Admin_model->translate("Organization name - Arabic") ?></label>
 

      </div>
      <div class="col-md-2">
        <label for="first_name"><?php echo $this->Admin_model->translate("Organization Icon") ?></label>
      

      </div>
     
      <div class="col-md-3">
        <label for="first_name"><?php echo $this->Admin_model->translate("Website URL") ?></label>
       

      </div>

      <div class="col-md-1">
      </div>

    </div>
  </div>


<?php } 

 $i = 0 ;
if(!empty($organizations)){


foreach ($organizations as $value) { 
   $i++ ;
   ?>
  


   <div class="row"> 
    <div class="form-group">

       <div class="col-md-3">
         <input type="text" class="form-control" value="<?php echo $value['orgname'] ?>" name="org_name[]" >

      </div>
      <div class="col-md-3">
         <input type="text" class="form-control" value="<?php echo $value['ar_orgname'] ?>"  name="ar_org_name[]" >

      </div>
      <div class="col-md-2">


<?php if(!empty(  $value['orgIcon'])){ ?>


  <img  id="<?php echo 'image_'.$i ?>" class="img-thumb" src="<?php echo base_url().'uploads/images/'.$value['orgIcon'];?>" style="height:100px !important;width:100px !important;"  >
   <input type="file"   name="files[]"  onchange="readURL('<?php echo 'image_'.$i ?>');" >
 <button type="button" title="Remove image" class="btn btn-danger btn-xs remove"  href="javascript:void(0)" onclick="removeimage('<?php echo 'image_'.$i ?>');"   ><i class="fa fa-trash"></i></button>
 <a class="btn btn-xs btn-success <?php echo 'image_'.$i ?>" href="<?php echo site_url()?>download?type=images&filename=<?php echo $value['orgIcon'];?>"><i class="fa fa-download"></i></a>

  <input type="hidden"  name="filename[]" id="file_<?php echo $i ?>"  value="<?php echo $value['orgIcon'] ?>" >

<?php }  ?>


      </div>
     
      <div class="col-md-3">
 
      <input type="text" class="form-control" value="<?php echo $value['weburl'] ?>" name="website_url[]" >


      </div>

      <div class="col-md-1">
<div class="form-group">
  <button class="btn btn-xs btn-danger   " onclick="remove(this);return false;"> <i class="fa fa-times"></i>  </button>

</div>
</div>



    </div>
  </div>
  <br/>

<?php } }  ?>

 </div>
</div>

 </div>

  <span class="images"></span><img src="<?php echo base_url();?>assets/images/add.svg" onclick="add_image(this)"  alt="" width="30px" height="30px"><span onclick="add_image(this)"  ><a href="javascript:void(0)"><b>Add New Organization</b></a> </span>

 

              </div>

</div>





</div>
<div class="form-actions"> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => 'btn btn-primary btn-block', 'content' => '<i class="fa fa fa-check-square-o"></i>&nbsp;&nbsp;'.$this->Admin_model->translate("Save"))); ?> </div>
<?php echo form_close(); ?> </div>

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
 

 
</script>
<script type="text/javascript">
function removeimage(id)
    {   

 var files = id.split("_");
 
 $('#file_'+files[1]).val('');

// $("#iconname").first().attr('src','') ;
$('#'+id).first().attr('src','') ;
$('#'+id).first().attr('style','') ;
 $('#'+id).attr('style',"height:100px !important;width:100px !important;") ;
 //$(this).closest('.downloadicon').hide() ;

 $('.'+id).hide();


    }

function readURL(id) {
if ($(this).files && $(this).files[0]) {
var reader = new FileReader();

jQuery('#'+id).removeAttr('src')
jQuery('#'+id).show();



reader.onload = function (e) {
$('#'+id).attr('src', e.target.result);
$('#'+id).attr('style', "height:200px !important;width:200px !important;");

}

reader.readAsDataURL($(this).files[0]);
}
}


 function remove(n) {
        n.parentNode.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode.parentNode);
    }


</script>
 