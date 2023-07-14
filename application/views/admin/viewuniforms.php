<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $this->Admin_model->get_type_name_by_id('school_master','id',$schoolId,'school_name')?></h4>
      </div>
      <div class="modal-body">

         <?php if($uniforms){ ?>
 <table id="example" class="table table-striped table-bordered" style="width:100%">

<thead> 
<th>SlNo</th>
<th>Class Level</th>
<th>Added Uniforms</th>
<th>Image</th>
 
</thead>
       <?php 

$i = 1 ;
 
foreach ($uniforms as $value) { 

?>
 <tr>
 <td><?php echo $i ; ?></td>
  
<td><?php 

if(!empty($value['class_level'])){
  $levels = explode(',', $value['class_level']) ;
}

$levels = array_unique($levels)  ;

 
 $names = array() ;

foreach ($levels as $lev) {
   $names[] = $this->Admin_model->get_type_name_by_id('class_type_master','id',$lev,'class_type') ;
}
echo implode(', ', $names)  ;


 ?></td>
<td><?php echo $this->Admin_model->get_type_name_by_id('school_products','id',$value['unformId'],'product_name') .'<br>' ; ?>
<?php $genders = explode(',', $this->Admin_model->get_type_name_by_id('school_products','id',$value['unformId'],'genders'))   ;
$g = array() ;
if(is_array($genders)){
	if(in_array(1, $genders)){

	$g[] = 'Male';
}
if(in_array(2, $genders)){
	$g[] = 'Female';
}
}else{
	if($genders == 1){
$g[] = 'Male' ;
	}else{
$g[] = 'Female';
	}
}


echo '<b>'.implode(',', $g).'</b>' ;
 ?>
  </td>
 
<td><img  style="height:150px !important;width:150px !important;" class="img-thumb" src="<?php echo base_url().'uploads/images/school/'. $this->Admin_model->get_type_name_by_id('school_products','id',$value['unformId'],'product_image')  ; ?>"  ></td>
 
 </tr>

<?php 

$i++ ;

 }  ?>


 
</table>
<?php 

}else{ 

echo "No uniforms available for this school !!" ;
}

?>
 
 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">



<?php echo $this->Admin_model->translate("Close") ?></button>
    
      </div>
 
    
      <script>
$(document).ready(function(){
      localStorage.setItem("uniformId",  '');
});
function removelink($id,$status){

$.ajax({ 
type: "POST",
url: "<?php echo base_url(); ?>"+'admin/change_status/',
data: {id:$id,status:$status,table:'uniform_school_relation'},
}).done(function(response){

 if(response=='false'){
   toastr.error("Access denied");
 }

localStorage.setItem("uniformId",  <?php echo $uniformid ; ?>);
localStorage.setItem("uniform",  'UniformData');
location.reload();

});

}
      </script>