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
    <div class='col-md-4'><h4>Client Logos </h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
         
    </div>
</div>

 
 
<div class="box-content">

  <div class="box-title row">
    <div class='col-md-4'><h4> </h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
         <a href="<?php echo base_url(); ?>admin/new_client"><button class="btn btn-warning"> Add New</button></a> 
 
    </div>
</div>


 <div class="table-responsive">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
      <tr>
<th>No.</th>
<!-- <th>User Id</th> -->
<th> Image</th>
<th>Status</th>
  
 
<th> Action </th>
</tr>
      
</thead>
<tbody>
<?php foreach ($data as $value) {
  ?>
 <tr>
<td><?php echo $value['id'] ?></td>
<!-- <th>User Id</th> -->
<td> 
  <img   class="img-thumb" src="<?php echo base_url()?>uploads/images/clients/<?php echo $value['image'] ?>" style="height:100px !important;width:100px !important;"  id="img1">  

</td>
<td><?php  if($value['status']=='Y'){ ?>

<a onclick="statusupdate(<?php echo $value['id'] ?>,'N');  return false ;" href="javascript:void(0)"  class="btn btn-success btn-xs">Active</a> 


<?php } else if($value['status']=='N'){ ?>

  <a onclick="statusupdate(<?php echo $value['id'] ?>,'Y');  return false ;" href="javascript:void(0)"  class="btn btn-danger btn-xs">Inactive</a>

<?php }   ?></td>

    
<td>
 
<a href="<?php echo base_url()?>admin/edit_client/<?php echo $value['id']?>">&nbsp;&nbsp;<button type="button" class="btn btn-info btn-circle btn-xs waves-effect waves-light"><i class="ico fa fa-pencil"></i></button></a>
<a href="javascript:void(0)">&nbsp;&nbsp;<button type="button" class="btn btn-danger btn-circle btn-xs waves-effect waves-light delete" onclick="deleteentry(<?php echo $value['id'] ?>);  return false ;" ><i class="ico fa fa-trash"></i></button></a>




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

 
  <script type="text/javascript">
   function statusupdate($id,$status){

 

var xin_table = $('#xin_table').dataTable();

$.ajax({ 
type: "POST",
url: "<?php echo base_url(); ?>"+'admin/change_status/',
data: {id:$id,status:$status,table:'client_logos'},
}).done(function(response){

location.reload();
//xin_table.api().ajax.reload();

});

}


 function deleteentry($id){

var xin_table = $('#xin_table').dataTable();

$.ajax({ 
type: "POST",
url: "<?php echo base_url(); ?>"+'admin/delete_entry/',
data: {id:$id,table:'client_logos'},
}).done(function(response){

location.reload();
//xin_table.api().ajax.reload();

});

}
 </script>