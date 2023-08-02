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
    <div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Change Password Requests") ?></h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
        
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
 
 
<th><?php echo $this->Admin_model->translate("Action") ?> </th>
</tr>
      
</thead>
<tbody>
<?php 
$i = 0 ;

foreach ($requests as $value) {

  $i++ ;
  ?>
 <tr>
<th><?php echo $i  ?></th>
<!-- <th>User Id</th> -->
<th><?php echo $this->Admin_model->get_type_name_by_id('users','id',$value['user_id'],'user_name') ?></th>
<th> <?php echo $this->Admin_model->get_type_name_by_id('users','id',$value['user_id'],'email') ?> </th>
   
<th>  

 

    <a href="<?php echo base_url()?>admin/changepassword/<?php echo $value['user_id']?>">&nbsp;&nbsp;<button type="button" class="btn btn-success  btn-xs waves-effect waves-light" title="Change Password"><i class="ico fa fa-key"></i> Change Password</button></a>

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