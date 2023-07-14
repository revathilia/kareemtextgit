 <?php $this->load->view('admin/header');?>
<body>
<?php $this->load->view('admin/top_header');?>
<?php $this->load->view('admin/side_header');?>


<div id="wrapper">
<div class="main-content">
<div class="row small-spacing">
<div class="col-xs-12">
     <div class="box-content card white">
<div class="box-title row">
    <div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Enquiries") ?></h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
    </div>
</div>

 
<div class="box-content">
 <div class="table-responsive">
<table id="example" class="table table-striped table-bordered" style="width:100%">
<thead>
<tr>
<th><?php echo $this->Admin_model->translate("No") ?></th>
<th><?php echo $this->Admin_model->translate("Date") ?></th>
<th><?php echo $this->Admin_model->translate("Subject") ?></th>
<th><?php echo $this->Admin_model->translate("Message") ?> </th>
<th><?php echo $this->Admin_model->translate("Status") ?></th>
<th><?php echo $this->Admin_model->translate("Action") ?></th>
</tr>
</thead>
<tbody>
<?php $i = 0 ; foreach ($enquiries as $value) { 
  $i++ ; ?>
<tr>
<td><?php echo $i ?></td>
<td> 
  <?php echo date("d-m-Y", strtotime($value['created_on'])) ?>

</td>




<td><?php echo  $value['subject'] ?> </td>
<td><?php echo  $value['message'] ?></td>
<td><?php echo  $this->Admin_model->get_type_name_by_id('enquiry_status','id',$value['status'],'status') ?></td>
<td>
 


<button type="button" class="btn btn-success btn-xs updatestatus" data-requestid = "<?php echo $value['id']  ?>" data-toggle="modal"  data-target="#boostrapModal-1"   ><?php echo $this->Admin_model->translate("Update Status")?></button>

<button type="button" class="btn btn-primary btn-xs viewdet" data-requestid = "<?php echo $value['id']  ?>" data-toggle="modal"  data-target="#boostrapModal-1"   ><?php echo $this->Admin_model->translate("View Details")?></button>


 

 


</td>
</tr>

  <?php
} ?>
  

</tbody>
    
    </table>
</div>


<!-- /.box-content -->
</div>
<!-- /.col-lg-6 col-xs-12 -->
</div>
</div>

</div>
</div>
</div>


<div class="modal fade" id="boostrapModal-1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="serviceid">
      
    </div>
  </div>
</div>

</body>

 <?php $this->load->view('admin/footer');?>

 <script type="text/javascript">
$(document).on('click', '.updatestatus', function(){  
var requestid = $(this).data("requestid")  ;
if(requestid != '')  
{  
$.ajax({  
url:"<?php echo base_url() ?>admin/enquirystatus",  
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
url:"<?php echo base_url() ?>admin/view_enquiry_status",  
method:"POST",  
data:{enquiryid:requestid },  
success:function(data){ 

$('#serviceid').html(data);  
$('#dataModal').modal('show');
}  
});  
}            
});

 </script>