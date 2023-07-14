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
         <a href="<?php echo base_url(); ?>admin/new_uniform_stock"><button class="btn btn-warning"> <?php echo $this->Admin_model->translate("Add New") ?></button></a> 
 
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
<th><?php echo $this->Admin_model->translate("Type") ?></th>
<th><?php echo $this->Admin_model->translate("Qty") ?></th>
<th><?php echo $this->Admin_model->translate("Created On") ?></th> 
</tr>
      
</thead>
<tbody>
<?php foreach ($products as $value) {
  ?>
 <tr>
<td><?php echo $value['id'] ?></td>
<!-- <th>User Id</th> -->
<td><?php echo $this->Admin_model->get_type_name_by_id('school_products','id',$value['product_id'],'product_name') ?>  (<?php echo $this->Admin_model->get_type_name_by_id('size_master','id',$value['size'],'size') ?>, <?php echo $this->Admin_model->get_type_name_by_id('color_master','id',$value['color'],'color_name') ?>)</td>
<td><?php echo ucfirst($value['type']) ?></td> 
<td><?php echo $value['quantity'] ?></td> 
<td><?php echo date("d-m-Y", strtotime($value['created_on'])); ?></td> 
  
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

 