<div class="table-responsive">
<table id="example" class="table table-striped table-bordered" style="width:100%">
<thead>




<tr>
<th style="width: 5%" ><?php echo $this->Admin_model->translate("No") ?></th>
<th style="width: 15%"><?php echo $this->Admin_model->translate("Date") ?></th>
<th style="width: 25%"><?php echo $this->Admin_model->translate("Service Name") ?></th>
<th style="width: 20%"><?php echo $this->Admin_model->translate("Customer Name") ?> </th>
<th style="width: 10%"><?php echo $this->Admin_model->translate("Status") ?></th>
<th style="width: 15%"><?php echo $this->Admin_model->translate("Remarks") ?></th>
<th style="width: 10%"><?php echo $this->Admin_model->translate("Action") ?></th>
</tr>
</thead>
<tbody>
<?php foreach ($requests as $value) { ?>
<tr>
<td><?php echo $value['id'] ?></td>
<td> 
  <?php echo date("d-m-Y", strtotime($value['created_on'])) ?>

</td>

<td>

<?php  $lan = $this->session->userdata('language'); ?>

 	<?php 
if($lan =='English'){
	echo $this->Admin_model->translate($this->Admin_model->get_type_name_by_id('services','id', $value['service_id'],'service_name')) ;
	}else{
		echo $this->Admin_model->translate($this->Admin_model->get_type_name_by_id('services','id', $value['service_id'],'ar_service_name')) ;
	}

  ?>



</td>
<td><?php echo $this->Admin_model->translate($this->Admin_model->get_type_name_by_id('customers','id', $value['cust_id'],'username')) ?></td>
<td><?php 
if($value['status']=='new'){
echo $this->Admin_model->translate('New') ;
}elseif($value['status']=='pending'){
echo $this->Admin_model->translate('Pending') ;
}elseif($value['status']=='closed'){
  echo $this->Admin_model->translate('Closed') ;
}elseif($value['status']=='contacted'){
  echo $this->Admin_model->translate('Contacted') ;
}

 ?></td>
<td><?php echo $this->Admin_model->translate($value['remarks']) ?></td>
<td>

  

  <button type="button" class="btn btn-primary btn-xs viewdet" data-requestid = "<?php echo $value['id']  ?>" data-toggle="modal"  data-target="#boostrapModal-1"   ><?php echo $this->Admin_model->translate("View Details")?></button>

  <button type="button" class="btn btn-success btn-xs statushistory" data-requestid = "<?php echo $value['id']  ?>" data-toggle="modal"  data-target="#boostrapModal-1"   ><?php echo $this->Admin_model->translate("View Status History")?></button>


</td>
</tr>

  <?php
} ?>
  

</tbody>
    
    </table>
</div>


<script>
   


   

$(document).ready( function() {
  $( '#example' ).dataTable( {
            lengthChange: false,
            buttons: [ 'copy', 'excel', 'csv', 'pdf' ],
            "bDestroy": true,
            "paging":   true,
            "ordering": false,
            stateSave: true
 } );
 } );



  </script>
 



 




