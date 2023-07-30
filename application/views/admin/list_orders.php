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
    <div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Order List") ?></h4></div>
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
<th><?php echo $this->Admin_model->translate("Created On") ?></th> 
<th><?php echo $this->Admin_model->translate("Product Name") ?></th> 
<th><?php echo $this->Admin_model->translate("Specifications") ?></th>
<th><?php echo $this->Admin_model->translate("Qty") ?></th>
<th><?php echo $this->Admin_model->translate("Total Amount") ?></th>
<th><?php echo $this->Admin_model->translate("Status") ?></th>

 
 
<th><?php echo $this->Admin_model->translate("Action") ?></th>
</tr>
      
</thead>
<tbody>
<?php $i=0 ; foreach ($orders as $value) {
  $i++ ;
 $color  = '' ;
  if($value['include_logo']  != 0 ){
    $color = '#fa972d' ;
  }
  ?>
 <tr style="background-color: <?php echo $color ;?>">
<td><?php echo $i  ?></td>
<td><?php echo date('d-m-Y', strtotime($value['created_on'])) ?></td>
 
<td><?php 
$details = json_decode($value['order_details'], true);
 
echo $details['name'] ?></td>

<td><?php echo $details['id'] ?></td>
<td><?php echo $details['qty'] ?></td>
<td><?php echo $details['subtotal'] ?></td>
<td><?php echo $this->Admin_model->get_type_name_by_id('order_status','id',$value['order_status'],'status_name') ?></td>
<td><a href="javascript:void(0)"> <button type="button" class="btn btn-primary  btn-xs waves-effect waves-light status_update" data-orderid="<?php echo $value['id'] ?>" ><i class="fa fa-edit"></i> Status Update</button></a></td>
 
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

<div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" id="requestid">
      
    </div>
  </div>
</div>


</body>


 <?php $this->load->view('admin/footer');?>

<script>
      function statusupdate($id,$status){

 
$.ajax({ 
type: "POST",
url: "<?php echo base_url(); ?>"+'admin/change_status/',
data: {id:$id,status:$status,table:'industry_products'},
}).done(function(response){

 if(response=='false'){
   toastr.error("Access denied");
 }

location.reload();

});

}

$(document).on('click', '.status_update', function(){  
var orderid = $(this).data("orderid")  ;

 
if(orderid != '')  
{  
$.ajax({  
url:"<?php echo base_url() ?>admin/order_status",  
method:"POST",  
data:{orderid:orderid },  
success:function(data){ 

$('#requestid').html(data);  
$('#dataModal').modal('show');
}  
});  
}            
});


</script>