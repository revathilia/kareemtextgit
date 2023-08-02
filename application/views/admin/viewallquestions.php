<div class="table-responsive">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
      <tr>
<th><?php echo $this->Admin_model->translate("SlNo") ?>
</th>
<th><?php echo $this->Admin_model->translate("Question(English)") ?>
</th>
<th><?php echo $this->Admin_model->translate("Question(Arabic)") ?>
</th>

<?php if($initial == 1){ ?>

<th><?php echo $this->Admin_model->translate("Symptom") ?>
</th>
<th><?php echo $this->Admin_model->translate("Question Group") ?>
</th>
<?php } ?>
<th><?php echo $this->Admin_model->translate("Display Order") ?>
</th>
<th><?php echo $this->Admin_model->translate("Status") ?></th>
<th><?php echo $this->Admin_model->translate("Action") ?></th>
</tr>

</thead><tbody>
<?php

 $i = 0 ;

//print_r(  $questions);
 foreach ($questions as $value) { 

  $i++ ; ?>
 <tr>
  <td>  
   <?php echo $i  ?>

 </td>
 <td>  
   <?php echo $value['question']  ?>

 </td>

 <td>  
   <?php echo $value['ar_question'] ?>

 </td>


 <?php if($initial == 1){ ?>



<td><?php 
$symptoms = explode(',', $value['symptom']);
$syms = array();
foreach ($symptoms as $svalue) {

  $syms[] =  $this->Admin_model->get_type_name_by_id('symptoms','id',$svalue,'symptom_name') ;
   
}
echo  implode(', ', $syms); ?> </td>
 


<td><?php 
 if($value['group_name']=='basic'){
  echo 'Basic';
 }else {
  echo $value['group_name'] ;

 }

 ?>
</td>

<?php } ?>


 <td>  
   

  <button type="button" class="btn btn-xs btn-default"  data-questionid = "<?php echo $value['id'] ?>"   ><?php echo $value['sorting_order']  ?></button>

 </td>

 <td>
  <?php if($value['status']=='A'){ ?>

    <a onclick="statusupdate(<?php echo $value['id'] ?>,'D');  return false ;" href="javascript:void(0)"  class="btn btn-success btn-xs"><?php echo $this->Admin_model->translate('Enabled') ?> </a>

    

  <?php } else { ?>
     
    <a onclick="statusupdate(<?php echo $value['id'] ?>,'A');  return false ;" href="javascript:void(0)"  class="btn btn-danger btn-xs"><?php echo $this->Admin_model->translate('Disabled') ?> </a>

   
    
  <?php } ?>

     </td>



  
  <td style="text-align: center"> <button type="button" class="btn btn-xs btn-info editquestion"  data-questionid = "<?php echo $value['id'] ?>"   ><i class="fa fa-pencil"></i></button> <button type="button" class="btn btn-xs btn-danger deletequestion"  data-questionid = "<?php echo $value['id'] ?>"   ><i class="fa fa-trash"></i></button></td>

  </tr>
<?php }   ?></tbody></table></div>

 