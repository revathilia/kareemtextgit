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
    <div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Shop Addresses") ?></h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
         <a href="<?php echo base_url(); ?>admin/new_address"><button class="btn btn-warning"> <?php echo $this->Admin_model->translate("Add New") ?></button></a> 
 
    </div>
</div>

 
<div class="box-content">
 <div class="table-responsive">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
      <tr>
<th><?php echo $this->Admin_model->translate("Sl.No") ?></th>
<!-- <th>User Id</th> -->
<th><?php echo $this->Admin_model->translate("Address") ?></th>  
 
<th><?php echo $this->Admin_model->translate("Action") ?></th>
</tr>
      
</thead>
<tbody>
<?php $i = 0 ; foreach ($addresses as $value) {
	$i++ ;
  ?>
 <tr>
<td><?php echo $i ?></td>
<!-- <th>User Id</th> -->
<td><?php echo $value['address'] ?></td> 
   
<td>
 
<a href="<?php echo base_url()?>admin/edit_address/<?php echo $value['id']?>">&nbsp;&nbsp;<button type="button" class="btn btn-info btn-circle btn-xs waves-effect waves-light"><i class="ico fa fa-pencil"></i></button></a>

 

<?php  if($value['status']=='Y'){ ?>

<a onclick="change_status(<?php echo $value['id'] ?>,'N','shop_addresses');  return false ;" href="javascript:void(0)"  class="btn btn-success btn-xs">Active</a> 


<?php } else if($value['status']=='N'){ ?>

  <a onclick="change_status(<?php echo $value['id'] ?>,'Y','shop_addresses');  return false ;" href="javascript:void(0)"  class="btn btn-danger btn-xs">Inactive</a>

<?php }   ?>





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
</body>


 <?php $this->load->view('admin/footer');?>

 