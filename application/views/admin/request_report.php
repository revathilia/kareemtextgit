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
    <div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Request Report") ?></h4></div>
    <div class='col-md-6'></div>
    
</div>

 
<div class="card-content">



 
<div class="form-body">
<div class="row"> 



<div class="col-md-12">
<div class="form-group">
<label for="first_name"><?php echo $this->Admin_model->translate("Select service") ?></label>

<select class="form-control" name="service_name" id="service">
  <option value="all">All</option>
  <?php 
 
  foreach ($servicedet as $value) { ?>
     <option value="<?php echo $value['id'] ?>"  <?php if($serviceid==$value['id']){echo 'selected' ; } ?> ><?php echo $value['service_name'] ?> / <?php echo $value['ar_service_name'] ?></option>
  <?php  }  ?>
  
</select>
 
</div>

</div>

</div>

 <div class="row">
    <div class="col-md-4">
 <div class="form-group">
  <label><?php echo $this->Admin_model->translate("From Date") ?></label><input type="date" id="fromdate" class="form-control" name="">
</div>
</div>
<div class="col-md-4">
 <div class="form-group">
  <label><?php echo $this->Admin_model->translate("To Date") ?></label><input type="date" id="todate" class="form-control" name="">
</div>
</div>
<div class="col-md-4">
 <div class="form-group">
  <label><?php echo $this->Admin_model->translate("Status") ?></label>
  <select class="form-control" id="status" name="status"><option value="">--Select--</option>
  <option value="new" <?php if($status == 'new'){ echo 'selected' ; } ?>>New</option>
<option value="pending" <?php if($status == 'pending'){ echo 'selected' ; } ?>>Pending</option>
<option value="contacted" <?php if($status == 'contacted'){ echo 'selected' ; } ?>>Contacted</option>
<option value="closed" <?php if($status == 'closed'){ echo 'selected' ; } ?>>Closed</option>
<option value="new" <?php if($status == 'new'){ echo 'selected' ; } ?>>New</option></select>
</div>
</div>
 </div>
 
 

 



<button class="btn btn-primary btn-sm" onclick="excelexport();return false ;"   >Export Excel Report  </button>


<div id="questionlist">
  
</div>

 


</div>
 
  </div>


 

 
<!-- /.col-lg-6 col-xs-12 -->
</div>
</div>
 

</div>
</div>
</div>
 


<div class="modal fade" id="boostrapModal-1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" id="serviceid">
      
    </div>
  </div>
</div>
</body>

 <?php $this->load->view('admin/footer');?>


<script type="text/javascript">

   if( $('#service').has('option').length > 0 ) {
      filterdata() ;
   }

if( $('#status').has('option').length > 0 ) {
      filterdata() ;
   }

 
  $('select').on('change', function() {
 // alert( this.value );

filterdata() ;
});

   $('#fromdate').on('change', function() {
 // alert( this.value );

filterdata() ;
});

    $('#todate').on('change', function() {
 // alert( this.value );

filterdata() ;
});


  function filterdata(){

var serviceid = document.getElementById("service").value  ;
var status = document.getElementById("status").value  ;
var fromdate = document.getElementById("fromdate").value  ;
var todate = document.getElementById("todate").value  ;


$.ajax({  
url:"<?php echo base_url() ?>admin/request_det",  
method:"POST",  
data:{serviceid:serviceid,status:status,fromdate:fromdate ,todate:todate   },  
success:function(data){ 

$('#questionlist').html(data);  
 
}  
});  

  }
 

$( document ).ready(function() {
    filterdata();
});


$(document).on('click', '.statushistory', function(){  
var requestid = $(this).data("requestid")  ;
if(requestid != '')  
{  
$.ajax({  
url:"<?php echo base_url() ?>admin/statushistory",  
method:"POST",  
data:{requestid:requestid },  
success:function(data){ 

$('#serviceid').html(data);  
$('#dataModal').modal('show');
}  
});  
}            
});


$(document).on('click', '.viewdet', function(){  
var requestid = $(this).data("requestid")  ;
if(requestid != '')  
{  
$.ajax({  
url:"<?php echo base_url() ?>admin/viewdet",  
method:"POST",  
data:{requestid:requestid },  
success:function(data){ 

$('#serviceid').html(data);  
$('#dataModal').modal('show');
}  
});  
}            
});



function excelexport(){

var serviceid = document.getElementById("service").value  ;
var status = document.getElementById("status").value  ;
var fromdate = document.getElementById("fromdate").value  ;
var todate = document.getElementById("todate").value  ;


$.ajax({  
url:"<?php echo base_url() ?>admin/createExcel",  
method:"POST",  
data:{serviceid:serviceid,status:status,fromdate:fromdate ,todate:todate   },  
success:function(JSON){ 

        if (JSON.error != '') {
        toastr.error(JSON.error);
         
        } else {
        toastr.success(JSON.result);
        $('.save').prop('disabled', false);

        window.location.href="<?php echo site_url()?>download?type=excel&filename="+JSON.filename  ;
        }
 
}  
});  

  }

</script>