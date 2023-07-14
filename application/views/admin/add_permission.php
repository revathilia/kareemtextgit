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
<div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Add Permission") ?></h4></div>
<div class='col-md-6'></div>
<div class='col-md-2'> 
 
</div>
</div>




<div class="card-content">



<?php $attributes = array('name' => 'edit_driver', 'id' => 'xin-form', 'autocomplete' => 'off');?>
<?php $hidden = array('_user' => $session['user_id']);?>
<?php echo form_open('admin/addpermission', $attributes, $hidden);?>
<div class="form-body">
<div class="row"> 



<div class="col-md-12">
<div class="form-group">
<label for="first_name"><?php echo $this->Admin_model->translate("Role name") ?></label>
<select class="form-control" id="role" name="role_name" onchange="myFunction()">

	<option value="">--Select--</option>
		<?php foreach ($roles as  $value) { ?>

			<option value="<?php echo $value['id'] ?>" > <?php echo $value['role_name'] ?> </option>
			 
		<?php } ?>
		
	
</select>

 
</div>
</div>


</div>


 <div id="nxtrow"></div>



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
//window.location.href="<?php echo base_url();?>admin/modules";
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




function myFunction() {

var role = document.getElementById("role").value;


  jQuery.ajax({
type: 'POST',
url: '<?php echo base_url(); ?>admin/permissiontable',
data:{role:role},
beforeSend: function () {
jQuery('.loading').show();
},
success: function (html) {
 // alert(html);
jQuery('#nxtrow').html(html);
jQuery('.loading').fadeOut("slow");

}
});


}
</script>
 