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
    <div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Product List") ?></h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
         <a href="<?php echo base_url(); ?>admin/new_industry_product"><button class="btn btn-warning"> <?php echo $this->Admin_model->translate("Add New") ?></button></a> 
 
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
<th><?php echo $this->Admin_model->translate("Specifications") ?></th>
<th><?php echo $this->Admin_model->translate("Status") ?></th>

 
 
<th><?php echo $this->Admin_model->translate("Action") ?></th>
</tr>
      
</thead>
<tbody>
<?php foreach ($products as $value) {
  ?>
 <tr>
<td><?php echo $value['id'] ?></td>
<!-- <th>User Id</th> -->
<td><?php echo $value['product_name'].' / '.$value['ar_product_name'] ?></td>
<td>
<a href="<?php echo base_url()?>admin/industry_product_images/<?php echo $value['id']?>">&nbsp;&nbsp;<button type="button" class="btn btn-primary  btn-xs waves-effect waves-light">Product Images</button></a>
<a href="<?php echo base_url()?>admin/industry_product_price/<?php echo $value['id']?>">&nbsp;&nbsp;<button type="button" class="btn btn-default  btn-xs waves-effect waves-light">Product Price Details</button></a>

</td>
<td>  <?php if($value['status']=='Y'){ ?>

<a onclick="statusupdate(<?php echo $value['id'] ?>,'N');  return false ;" href="javascript:void(0)"  class="btn btn-success btn-xs"><?php echo $this->Admin_model->translate('Enabled') ?> </a>



<?php } else if($value['status']=='N'){ ?>
 
<a onclick="statusupdate(<?php echo $value['id'] ?>,'Y');  return false ;" href="javascript:void(0)"  class="btn btn-danger btn-xs"><?php echo $this->Admin_model->translate('Disabled') ?> </a>



<?php } ?>
</td> 
   
<td>
<a href="<?php echo base_url()?>admin/edit_industry_product/<?php echo $value['id']?>">&nbsp;&nbsp;<button type="button" class="btn btn-info btn-circle btn-xs waves-effect waves-light"><i class="ico fa fa-pencil"></i></button></a>

<a onclick="change_status(<?php echo $value['id'] ?>,'D','industry_products');  return false ;" href="javascript:void(0)"  class="btn btn-danger    btn-xs waves-effect waves-light"> <i class="ico fa fa-trash"></i> </a>

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

</script>