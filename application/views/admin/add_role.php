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
<div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Add Roles") ?></h4></div>
<div class='col-md-6'></div>
<div class='col-md-2'> 
<a href="<?php echo base_url(); ?>admin/roles"><button class="btn btn-warning"><?php echo $this->Admin_model->translate("Role List") ?></button></a>
</div>
</div>




<div class="card-content">



<?php $attributes = array('name' => 'edit_driver', 'id' => 'xin-form', 'autocomplete' => 'off');?>
<?php $hidden = array('_user' => $session['user_id']);?>
<?php echo form_open('admin/addrole', $attributes, $hidden);?>
<div class="form-body">
<div class="row"> 



<div class="col-md-12">
<div class="form-group">
<label for="first_name"><?php echo $this->Admin_model->translate("Role name") ?></label>
<input class="form-control" placeholder="<?php echo $this->Admin_model->translate("Role name") ?>" name="role_name" type="text" value="">
</div>
</div>


</div>


<div class="row"> 
                <div class="col-md-12">
                  <div class="form-group">

                             <label for="xin_employee_password"><?php echo $this->Admin_model->translate("Role Belong to") ?> </label>

                    <select class="form-control" name="belongs_to">
                    <option value="">  --Select--</option>
					<!-- <option value="admin">Super Admin</option>   -->
                    <option value="industry">Industry </option>              
                     <option value="school">School </option>
                  
                   
                    
                     </select>
                    
                  </div>
                </div>
                      
            </div>

 
<div class="table-responsive">
  <table   class="table table-striped table-bordered" style="width:100%">
        <thead>
      <tr>
<th>No</th>
<!-- <th>User Id</th> -->
<th>Module Name</th>
<th>Read </th>
<th>Write</th>
 
 
</tr>
      
</thead>
<tbody>


<?php 
 



$i= 0 ;

foreach ($modules as  $mvalue) {

$i++ ; ?>

 

	<tr>
		<td> <?php echo $i ;?></td>
		<td><?php echo  $mvalue['module_name'] ;?></td>
		<input type="hidden" name="module[]" value="<?php echo  $mvalue['id'] ?>">
		<td> <input type="checkbox"   name="read[]" class="readcheck"   value="<?php echo $mvalue['id'] ?>"> </td>
		<td> <input type="checkbox"  name="write[]"   class="writecheck" value="<?php echo $mvalue['id'] ?>"> </td>
	</tr>
	 
<?php } ?>
</tbody>
<tr><td></td><td></td><td>Select All &nbsp;&nbsp;

	<input type="checkbox" name="readall"  id="readall"    >
 

 
</td><td>Select All &nbsp;&nbsp;<input type="checkbox" name="writeall"  id="writeall" value="writeall"  ></td></tr>
</table>
 
</div>


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
window.location.href="<?php echo base_url();?>admin/roles";
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

 $("#readall").change(function() {

	if($(this).prop('checked')==true){
	 $('input:checkbox.readcheck').prop('checked', true);
	}else{
		 $('input:checkbox.readcheck').prop('checked', false);
	} 
});

     $("#writeall").change(function() {

	if($(this).prop('checked')==true){
	 $('input:checkbox.writecheck').prop('checked', true);
	}else{
		 $('input:checkbox.writecheck').prop('checked', false);
	} 
});


</script>
 