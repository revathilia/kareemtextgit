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
    <div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Measurements") ?></h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
         <a href="<?php echo base_url(); ?>admin/newMeasurement"><button class="btn btn-warning"> <?php echo $this->Admin_model->translate("Add New") ?></button></a> 
 
    </div>
</div>

 
<div class="box-content">
 <div class="table-responsive">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
      <tr>
<th><?php echo $this->Admin_model->translate("Sl.No") ?></th>
<!-- <th>User Id</th> -->
<th><?php echo $this->Admin_model->translate("Name") ?></th> 
 <th><?php echo $this->Admin_model->translate("Name - Arabic") ?></th> 
 
<th><?php echo $this->Admin_model->translate("Action") ?></th>
</tr>
      
</thead>
<tbody>
<?php $i = 0;  foreach ($measurements as $value) {
  $i++ ;
  ?>
 <tr>
<td><?php echo $i ?></td>
<!-- <th>User Id</th> -->
<td><?php echo $value['name'] ?></td>
   <td><?php echo $value['ar_name'] ?></td>
<td>
 
<a href="<?php echo base_url()?>admin/editmeasurement/<?php echo $value['id']?>">&nbsp;&nbsp;<button type="button" class="btn btn-info btn-circle btn-xs waves-effect waves-light"><i class="ico fa fa-pencil"></i></button></a>

 <a onclick="deleteentry(<?php echo $value['id'] ?>,'measurements');  return false ;" href="javascript:void(0)"  class="btn btn-danger    btn-xs waves-effect waves-light"> <i class="ico fa fa-trash"></i> </a>



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

 