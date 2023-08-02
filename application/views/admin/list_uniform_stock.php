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
    <div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Uniform Stock List") ?></h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
         <!-- <a href="<?php echo base_url(); ?>admin/new_uniform_stock"><button class="btn btn-warning"> <?php echo $this->Admin_model->translate("Add New") ?></button></a>  -->
 
    </div>
</div>

 
<div class="box-content">
 <div class="table-responsive">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
      <tr>
<th><?php echo $this->Admin_model->translate("No") ?></th>
<!-- <th>User Id</th> -->
<th><?php echo $this->Admin_model->translate("Product Name") ?></th> 
 
<th><?php echo $this->Admin_model->translate("Total Qty") ?></th>
<th><?php echo $this->Admin_model->translate("Action") ?></th>
<th><?php echo $this->Admin_model->translate("Last Modified On") ?></th> 
</tr>
      
</thead>
<tbody>
<?php
 
 $i=0; foreach ($products as $value) {
  $i++ ;
  ?>
 <tr>
<td><?php echo $i ?></td>
<!-- <th>User Id</th> -->
<td><?php echo  $value['name'].' / '.$value['ar_name']  ?></td>
<td><?php echo $value['qty'] ?></td> 
<td>
 <a onclick="addstock(<?php echo $value['pid'] ?>);  return false ;" href="javascript:void(0)"  class="btn btn-success btn-xs"><i class="fa fa-plus"></i> <?php echo $this->Admin_model->translate('Add Stock') ?> </a>
  <a onclick="deductstock(<?php echo $value['pid'] ?>);  return false ;" href="javascript:void(0)"  class="btn btn-danger btn-xs"><i class="fa fa-minus"></i> <?php echo $this->Admin_model->translate('Remove Stock') ?> </a>

   <a onclick="viewstock(<?php echo $value['pid'] ?>);  return false ;" href="javascript:void(0)"  class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> <?php echo $this->Admin_model->translate('View Stock') ?> </a>
</td> 
<td><?php echo date("d-m-Y", strtotime($value['updated'])); ?></td> 
  
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

<script type="text/javascript">
  
function addstock(id){  
 
$.ajax({  
url:"<?php echo base_url() ?>admin/new_uniform_stock",  
method:"POST",  
data:{id:id,type:'add' },  
success:function(data){ 

$('#requestid').html(data);  
$('#dataModal').modal('show');
}  
});  
             
};


function deductstock(id){  
 
$.ajax({  
url:"<?php echo base_url() ?>admin/new_uniform_stock",  
method:"POST",  
data:{id:id,type:'deduct' },  
success:function(data){ 

$('#requestid').html(data);  
$('#dataModal').modal('show');
}  
});  
             
};

function viewstock(id){  
 
$.ajax({  
url:"<?php echo base_url() ?>admin/view_uniform_stock",  
method:"POST",  
data:{id:id },  
success:function(data){ 

$('#requestid').html(data);  
$('#dataModal').modal('show');
}  
});  
             
};


</script>


 <?php $this->load->view('admin/footer');?>

 