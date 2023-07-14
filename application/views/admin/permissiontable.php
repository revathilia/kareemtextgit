<div class="row"> 

	<input type="hidden" name="role" value="<?php echo $role?>">
<div class="col-md-12">
<div class="form-group">

<div class="table-responsive">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
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
$readaccess = array();
$writeaccess = array();

if(!empty($permissions)){
	$readaccess = explode(	',', $permissions->read );
$writeaccess = explode(	',', $permissions->write );
}



$i= 0 ;

foreach ($modules as  $mvalue) {

$i++ ; ?>

 

	<tr>
		<td> <?php echo $i ;?></td>
		<td><?php echo  $mvalue['module_name'] ;?></td>
		<input type="hidden" name="module[]" value="<?php echo  $mvalue['id'] ?>">
		<td> <input type="checkbox"   name="read[]" class="readcheck" <?php if(in_array($mvalue['id'], $readaccess )){ echo 'checked'; } ?>  value="<?php echo $mvalue['id'] ?>"> </td>
		<td> <input type="checkbox"  name="write[]" <?php if(in_array($mvalue['id'], $writeaccess )){ echo 'checked'; } ?> class="writecheck" value="<?php echo $mvalue['id'] ?>"> </td>
	</tr>
	 
<?php } ?>
</tbody>
<tr><td></td><td></td><td>Select All &nbsp;&nbsp;

	<input type="checkbox" name="readall"  id="readall"    >
 

 
</td><td>Select All &nbsp;&nbsp;<input type="checkbox" name="writeall"  id="writeall" value="writeall"  ></td></tr>
</table>
 
</div>


</div>
</div>
</div>


<script>
    $(document).ready(function() {
        var table = $('#example').DataTable( {
            lengthChange: false,
            buttons: [ 'copy', 'excel', 'csv', 'pdf' ]
        } );
     
        table.buttons().container()
            .appendTo( '#example_wrapper .col-md-6:eq(0)' );
    } );



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
