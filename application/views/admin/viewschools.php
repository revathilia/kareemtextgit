<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $this->Admin_model->get_type_name_by_id('school_products','id',$uniformid,'product_name')?></h4>



      </div>
      <div class="modal-body">

         


        <div class=" row">
 
    <div class='col-md-8'></div>
    <div class='col-md-4'> 
            <a href="javascript:void(0)">&nbsp;&nbsp;<button type="button" class="btn btn-info  btn-sm btn-block waves-effect waves-light addschool" data-uniformid="<?php echo $uniformid ?>"><i class="fa fa-plus"></i> Add School</button></a>

    </div>
    
</div>

  <br>


         <?php if($schools){ ?>
 <table id="example" class="table table-striped table-bordered" style="width:100%">

<thead> 
<th><?php echo $this->Admin_model->translate("SlNo") ?> </th>
<th><?php echo $this->Admin_model->translate("School Name") ?></th>
<th><?php echo $this->Admin_model->translate("Class Level") ?></th>
<th><?php echo $this->Admin_model->translate("Remove") ?></th>
</thead>
       <?php 

$i = 1 ;
 
foreach ($schools as $value) { ?>
 <tr>
 <td><?php echo $i ; ?></td>
  
<td><?php echo $this->Admin_model->get_type_name_by_id('school_master','id',$value['school_id'],'school_name')  ; ?></td>
<td><?php 
$levels = explode(',', $value['class_level']) ;
$c = array() ;
foreach ($levels as $lev) {
   $c[] =  $this->Admin_model->get_type_name_by_id('class_type_master','id',$lev,'class_type')  ;
}
echo implode(',', $c)  ;

 ?> </td>
 
<td>
<a onclick="removelink(<?php echo $value['id'] ?>,'0');  return false ;" href="javascript:void(0)"  class="btn btn-danger    btn-xs waves-effect waves-light"> <i class="ico fa fa-times"></i> </a>

</td></tr>

<?php 

$i++ ;

 }  ?>


 
</table>
<?php 

}else{ 

echo "No schools available for this uniform !!" ;
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