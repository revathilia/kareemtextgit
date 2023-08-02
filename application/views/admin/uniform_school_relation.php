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
    <div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Uniform List") ?></h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
         <a href="<?php echo base_url(); ?>admin/new_school_product"><button class="btn btn-warning"> <?php echo $this->Admin_model->translate("Add New") ?></button></a> 
 
    </div>
</div>

 
<div class="box-content">
 <div class="table-responsive">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
      <tr>
<th><?php echo $this->Admin_model->translate("No") ?></th>
<!-- <th>User Id</th> -->
<th><?php echo $this->Admin_model->translate("Uniform Name") ?></th> 
<th><?php echo $this->Admin_model->translate("View Linked Schools") ?></th>
 
<!--  
<th><?php echo $this->Admin_model->translate("Link School") ?></th> -->
</tr>
      
</thead>
<tbody>
<?php $i=0 ; foreach ($products as $value) {
  $i++ ;
  ?>
 <tr>
<td><?php echo $i  ?></td>
<!-- <th>User Id</th> -->
<td><?php echo $value['product_name'] ?></td>
<td><a href="javascript:void(0)"> <button type="button" class="btn btn-success  btn-xs waves-effect waves-light viewschools" data-uniformid="<?php echo $value['id'] ?>" ><i class="fa fa-eye"></i> View Linked Schools</button></a>

</td> 
   
<!-- <td>
 
<a href="javascript:void(0)">&nbsp;&nbsp;<button type="button" class="btn btn-info  btn-xs waves-effect waves-light addschool" data-uniformid="<?php echo $value['id'] ?>"><i class="fa fa-plus"></i> Add School</button></a>





    </td> -->
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



<div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" id="requestid">
      
    </div>
  </div>
</div>


 <?php $this->load->view('admin/footer');?>

 
 <script type="text/javascript">
$(document).on('click', '.addschool', function(){  
var uniformid = $(this).data("uniformid")  ;
localStorage.setItem("uniformId",  'blank');
 
if(uniformid != '')  
{  
$.ajax({  
url:"<?php echo base_url() ?>admin/adduniformtoschool",  
method:"POST",  
data:{uniformid:uniformid },  
success:function(data){ 

$('#requestid').html(data);  
$('#dataModal').modal('show');
 
}  
});  
}            
});

$(document).on('click', '.viewschools', function(){  
var uniformid = $(this).data("uniformid")  ;
localStorage.setItem("uniformId",  'blank');
if(uniformid != '')  
{  
$.ajax({  
url:"<?php echo base_url() ?>admin/viewschools",  
method:"POST",  
data:{uniformid:uniformid },  
success:function(data){ 

$('#requestid').html(data);  
$('#dataModal').modal('show');
}  
});  
}            
});

$(document).ready(function(){

var uniform = localStorage.getItem("uniformId") ;//<default
var data = localStorage.getItem("uniform") ;//<default



if((uniform != null && uniform !='' && uniform !='null' && uniform !='blank' ) && data === 'UniformData' )  
{ 
 
 
$.ajax({  
url:"<?php echo base_url() ?>admin/viewschools",  
method:"POST",  
data:{uniformid:uniform },  
success:function(data){ 

$('#requestid').html(data);  
$('#dataModal').modal('show');
}  
});
}

});


 

 </script>