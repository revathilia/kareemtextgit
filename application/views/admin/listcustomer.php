 <?php $this->load->view('admin/header');?>
  <head>
   
  </head>
<body>
<?php $this->load->view('admin/top_header');?>
<?php $this->load->view('admin/side_header');?>


<div id="wrapper">
<div class="main-content">
<div class="row small-spacing">
<div class="col-xs-12">
     <div class="box-content card white">
<div class="box-title row">
    <div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Customer List") ?> </h4></div>
    <div class='col-md-6'></div>
    
</div>

 
 

<div class="box-content">
 <div class="table-responsive">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
      <tr>
<th><?php echo $this->Admin_model->translate("No") ?>No</th>
<th><?php echo $this->Admin_model->translate("Registration Date") ?></th>
<!-- <th>User Id</th> -->
<th><?php echo $this->Admin_model->translate("Name") ?></th>
<th><?php echo $this->Admin_model->translate("Phone No.") ?></th>


 <th><?php echo $this->Admin_model->translate("No. of orders") ?></th>

</tr>
      
</thead>
<tbody>
<?php 
$i=0;
foreach ($custdet as $value) {
  $i++;
  ?>
 <tr>
<th><?php echo $i ?></th>
<!-- <th>User Id</th> -->
<th><?php echo date("d-m-Y", strtotime($value['created_on'])) ?></th>
<th><?php echo $value['first_name'].' '.$value['last_name']  ?></th>
<th><?php echo $value['phone_no']   ?></th>

<th><?php if(count($this->Admin_model->get_all_data('order_master',array('customer_id'=>$value['id'])))){
  echo count($this->Admin_model->get_all_data('order_master',array('customer_id'=>$value['id']))) ;
}   ?></th>
  

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

 