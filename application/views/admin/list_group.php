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
    <div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Subheadings") ?></h4></div>
    <div class='col-md-3'></div>
    <div class='col-md-3'> 
         <a href="<?php echo base_url(); ?>admin/questions"><button class="btn btn-primary btn-block"> <?php echo $this->Admin_model->translate("All Questions") ?></button></a> 
 
    </div>

    <div class='col-md-2'> 
         <a href="<?php echo base_url(); ?>admin/newgroup"><button class="btn btn-warning"> <?php echo $this->Admin_model->translate("Add New Subheading") ?></button></a> 
 
    </div>
</div>

 
<div class="box-content">
 <div class="table-responsive">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
      <tr>
<th><?php echo $this->Admin_model->translate("No") ?></th>
<!-- <th>User Id</th> -->
<th><?php echo $this->Admin_model->translate("Subheading - English") ?></th>
 <th><?php echo $this->Admin_model->translate("Subheading - Arabic") ?></th>
 
<th><?php echo $this->Admin_model->translate("Action") ?></th>
</tr>
      
</thead>
<tbody>
<?php foreach ($groupdet as $value) {
  ?>
 <tr>
<td><?php echo $value['id'] ?></td>
<!-- <th>User Id</th> -->
<td><?php echo $value['group_name'] ?></td>
<td><?php echo $value['ar_group_name'] ?></td>
   
<td>
 
<a href="<?php echo base_url()?>admin/editgroup/<?php echo $value['id']?>">&nbsp;&nbsp;<button type="button" class="btn btn-info btn-circle btn-xs waves-effect waves-light"><i class="ico fa fa-pencil"></i></button></a>





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

 