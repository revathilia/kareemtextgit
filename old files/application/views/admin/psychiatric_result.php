<div class="table-responsive">
<table id="example" class="table table-striped table-bordered" style="width:100%">
<thead>
<tr>
<th style="width: 5%"><?php echo $this->Admin_model->translate("No") ?></th>
<th style="width: 15%"><?php echo $this->Admin_model->translate("Date") ?></th>
<th style="width: 30%"><?php echo $this->Admin_model->translate("Symptoms") ?></th>
 
<th style="width: 15%"><?php echo $this->Admin_model->translate("Status") ?></th>
<th style="width: 20%"><?php echo $this->Admin_model->translate("Remarks") ?></th>
<th style="width: 15%"><?php echo $this->Admin_model->translate("Action") ?></th>
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

  <?php $symptoms = $value['symptom_id'] ;
  $symptoms = explode(',', $symptoms) ;
foreach ($symptoms as $symptom) {
  $names[] = $this->Admin_model->get_type_name_by_id('symptoms','id',$symptom,'symptom_name') ;
}


echo implode(',', $names);
  ?>
    

  </td>


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
   

   $(document).on('click', '.statushistory', function(){  
var requestid = $(this).data("requestid")  ;
if(requestid != '')  
{  
$.ajax({  
url:"<?php echo base_url() ?>admin/statushistory",  
method:"POST",  
data:{requestid:requestid },  
success:function(data){ 

$('#serviceid').html(data);  
$('#dataModal').modal('show');
}  
});  
}            
});


    $(document).on('click', '.viewdet', function(){  
var requestid = $(this).data("requestid")  ;
if(requestid != '')  
{  
$.ajax({  
url:"<?php echo base_url() ?>admin/viewdet",  
method:"POST",  
data:{requestid:requestid },  
success:function(data){ 

$('#serviceid').html(data);  
$('#dataModal').modal('show');
}  
});  
}            
});

   

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
 



 




