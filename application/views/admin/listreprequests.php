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
    <div class='col-md-4'><h4>Report Request List</h4></div>
    <div class='col-md-6'></div>
    
</div>

 
 

<div class="box-content">
 <div class="table-responsive">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
      <tr>
<th>No</th>
<th>Request Date</th>
<!-- <th>User Id</th> -->
<th>Requested By</th>

 <th>Report Name</th>
  <th>Status</th>

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
<th><?php echo $this->Admin_model->get_type_name_by_id('customers','id',$value['user_id'],'username') ; ?></th>

<th><?php echo $value['report_name'] ;  ?></th>
  
<th><?php if($value['status']=='new'){ ?>

<button class="btn btn-xs btn-success" onclick="statusupdate(<?php echo $value['id'] ?>,'<?php echo $value['status'] ?>');  return false ;" >New</button>

<?php } else{ ?>

<button class="btn btn-xs btn-default"  >Processed</button>

<?php }    ?></th>
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

 <script type="text/javascript">

   function statusupdate($id,$status){
 
$.ajax({ 
type: "POST",
url: "<?php echo base_url(); ?>"+'admin/reportprocessed',
data: {id:$id,status:$status},
}).done(function(response){

location.reload();
//xin_table.api().ajax.reload();

});

}
 </script>