<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Status Update History</h4>
      </div>
      <div class="modal-body">

         <?php if($history){ ?>
 <table id="example" class="table table-striped table-bordered" style="width:100%">

  <thead> 
<th>SlNo</th>
<th>Date</th>
<th>Remarks</th>
<th>Status</th>
<th>Updated By</th>
  </thead>
       <?php 

$i = 1 ;
 
       foreach ($history as $value) { ?>
 <tr>
 <td><?php echo $i ; ?></td>
  <td>  <?php echo date("d-m-Y", strtotime($value['created_date'])) ?>
 </td> 
 <td><?php echo $value['remarks'] ; ?></td>
 <td>
   <?php 
if($value['status']=='new'){
echo $this->Admin_model->translate('New') ;
}elseif($value['status']=='pending'){
echo $this->Admin_model->translate('Pending') ;
}elseif($value['status']=='closed'){
  echo $this->Admin_model->translate('Closed') ;
}elseif($value['status']=='contacted'){
  echo $this->Admin_model->translate('Contacted') ;
}

 ?>
 </td>
 <td><?php echo $this->Admin_model->get_type_name_by_id('users','id', $value['updated_by'],'user_name') ?></td>
</tr>

<?php 

$i++ ;

 }  ?>


 
</table>
<?php 

}else{ 

echo "No history available for this request !!" ;
}

?>
 
 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">



<?php echo $this->Admin_model->translate("Close") ?></button>
    
      </div>
 
    