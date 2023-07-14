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
    <div class='col-md-4'><h4><?php echo $this->Admin_model->translate("User List") ?></h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
         <a href="<?php echo base_url(); ?>admin/newuser"><button class="btn btn-warning"> <?php echo $this->Admin_model->translate("Add New") ?></button></a> 
 
    </div>
</div>

 
<div class="box-content">
 <div class="table-responsive">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
      <tr>
<th><?php echo $this->Admin_model->translate("No") ?> </th>
<!-- <th>User Id</th> -->
<th><?php echo $this->Admin_model->translate("Name") ?>  </th>
<th><?php echo $this->Admin_model->translate("Email") ?>   </th>
<th><?php echo $this->Admin_model->translate("Role") ?> - <?php echo $this->Admin_model->translate("Belongs to") ?></th>
<th><?php echo $this->Admin_model->translate("Action") ?> </th>
</tr>
      
</thead>
<tbody>
<?php 
$i = 0 ;

foreach ($superadmindet as $value) {

  $i++ ;
  ?>
 <tr>
<th><?php echo $i  ?></th>
<!-- <th>User Id</th> -->
<th><?php echo $value['user_name'] ?></th>
<th> <?php echo $value['user_email'] ?> </th>
<th><?php echo $this->Admin_model->get_type_name_by_id('user_roles','id',$value['user_role'],'role_name') ?> - <?php echo ucfirst($this->Admin_model->get_type_name_by_id('user_roles','id',$value['user_role'],'belongs_to')) ?></th>
  
<th> <a href="<?php echo base_url()?>admin/edituser/<?php echo $value['id']?>">&nbsp;&nbsp;<button type="button" class="btn btn-info btn-circle btn-xs waves-effect waves-light"><i class="ico fa fa-pencil"></i></button></a> 

   <a onclick="deleteentry(<?php echo $value['id'] ?>,'users');  return false ;" href="javascript:void(0)"  class="btn btn-danger    btn-xs waves-effect waves-light"> <i class="ico fa fa-trash"></i> </a>

  </th>
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