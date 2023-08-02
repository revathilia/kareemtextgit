 <?php $this->load->view('admin/header');?>
<body>
<?php $this->load->view('admin/top_header');?>
<?php $this->load->view('admin/side_header');?>

<style type="text/css">

.list-group-item.active, .list-group-item.active:focus, .list-group-item.active:hover  {
    z-index: 2;
    color: #fff !important;
    background-color: #304ffe !important;;
    border-color: #304ffe !important;;
}
 
 


</style>
<div id="wrapper">
<div class="main-content">
<div class="row small-spacing">
<div class="col-xs-12">
     <div class="box-content card white">
<div class="box-title row">
    <div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Open Issues") ?></h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
         
    </div>
</div>

 
<div class="box-content">

<div class="row">
  <div class='col-md-3'> <ul class="list-group" id="servicelist">
  <li class="list-group-item active" data-service ="all" onclick="getresult('new','all')"> 
 
    Open Requests - All <span class="right_badg pull-right btn btn-success btn-xs btn-circle"><b><?php echo $totalRequest ?></b></span> </li>
   <?php foreach ($request_det as $value) { 

$servicename = $this->Admin_model->get_type_name_by_id('services','id',$value['service_id'],'service_name') ;

if($servicename){ ?>


 <li class="list-group-item" data-service ="<?php echo $value['service_id'] ?>" onclick="getresult('new',<?php echo $value['service_id'] ?>);return false ;"> <?php echo  $servicename .' <span class="right_badg pull-right btn btn-success btn-xs btn-circle"><b>'.$value['count'].'</b></span>' ?>  </li>


<?php }
    ?>
  <?php   } ?>
</ul>
  </div>
  <div class="col-md-9">
<input type="hidden" name="service"  id="service" value="">
<button class="btn btn-primary btn-sm" onclick="excelexport();return false ;"   >Export Excel Report  </button>


   <div id="response">
     
   </div>

</div>
  
</div>
</div>



<!-- /.box-content -->
</div>
<!-- /.col-lg-6 col-xs-12 -->
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
   function getresult(status,serviceid){

  
    $('#service').val(serviceid);

   
$('#servicelist li').click(function(e) {
    $(this).addClass('active').siblings().removeClass('active');
});




    $.ajax({  
url:"<?php echo base_url() ?>admin/open_requests",  
method:"POST",  
data:{serviceid:serviceid,status:status },  
success:function(data){ 

$('#response').html(data);  
 
}  
});  

   }


getresult('new','all');

  
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

var serviceid = $('#service').val()  ;
 
var status = 'new'  ;
 

$.ajax({  
url:"<?php echo base_url() ?>admin/createExcel",  
method:"POST",  
data:{serviceid:serviceid,status:status   },  
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