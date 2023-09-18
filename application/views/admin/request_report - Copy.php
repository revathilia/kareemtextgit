 <?php $this->load->view('admin/header');?>
 
   
   
<style>
  .swatch {
    position: relative;
    margin: 0.1rem;
    width: 30px;
    top: 10px;
    height: 30px;
    border-radius: 30px;
    line-height: 30px;
    display: inline-block;
}
.swatch > [type=radio],
.swatch > [type=checkbox] {
  position: absolute;
  width: 100%;
  height: 100%;
  left: 0;
  top: 0;
  opacity: 0;
}
.swatch > [type=radio] + label,
.swatch > [type=checkbox] + label {
  width: 30px;
  height: 30px;
  border-radius: 30px;
  border: 1px solid #00000029;
  line-height: 30px;
  text-align: center;
  position: absolute;
  transition: all 0.5s ease-in-out;
}
.swatch > [type=radio] + label i,
.swatch > [type=checkbox] + label i {
  opacity: 0;
  font-size: 1rem;
  transition: opacity 0.5s;
}
.swatch > [type=radio]:checked + label i,
.swatch > [type=checkbox]:checked + label i {
  opacity: 1;
}
 

.swatch > [type=radio]:checked + label,
.swatch > [type=checkbox]:checked + label {
  width: 36px;
  height: 36px;
  border-radius: 36px;
  line-height: 36px;
  top: -3px;
  left: -3px;
  transition: all 0.5s ease-in-out;
}
.swatch > [type=radio]:checked + label i,
.swatch > [type=checkbox]:checked + label i {
  opacity: 1;
  transition: opacity 0.5s;
}
</style>

 
<body>
<?php $this->load->view('admin/top_header');?>
<?php $this->load->view('admin/side_header');?>

<?php  $session = $this->session->userdata('superadmindet');
$logged_in_role =  $this->Admin_model->get_type_name_by_id('user_roles','id',$session['userrole'],'belongs_to')  ;
     
if($logged_in_role == 'school' || $logged_in_role == 'industry' ){
  $type = $logged_in_role ;
}
    
    ?>

<div id="wrapper">
<div class="main-content">
<div class="row small-spacing">
<div class="col-xs-12">
     <div class="box-content card white">
<div class="box-title row">
    <div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Order Report") ?></h4></div>
    <div class='col-md-6'></div>
    
</div>

 
<div class="card-content">



 
<div class="form-body">
<div class="row"> 



<div class="col-md-12">
<div class="form-group">
<label for="first_name"><?php echo $this->Admin_model->translate("Select service") ?></label>

<select class="form-control" name="service_name" id="type">
  <option value="all">All</option>
  
  <option value="school"  <?php if($type=='school'){echo 'selected' ; } ?> > <?php echo $this->Admin_model->translate("School") ?> </option>
  <option value="industry"  <?php if($type=='industry'){echo 'selected' ; } ?> ><?php echo $this->Admin_model->translate("Industry") ?></option>
   
  
</select>
 
</div>

</div>

</div>

 <div class="row">
    <div class="col-md-4">
 <div class="form-group">
  <label><?php echo $this->Admin_model->translate("From Date") ?></label><input type="date" id="fromdate" class="form-control" value="<?php if($date=='today'){ echo date('Y-m-d') ; }?>" name="">
</div>
</div>
<div class="col-md-4">
 <div class="form-group">
  <label><?php echo $this->Admin_model->translate("To Date") ?></label><input type="date" id="todate" class="form-control" value="<?php if($date=='today'){ echo date('Y-m-d') ; }?>" name="">
</div>
</div>
<div class="col-md-4">
 <div class="form-group">
  <label><?php echo $this->Admin_model->translate("Status") ?></label>
  <select class="form-control" id="status" name="status"><option value="">--Select--</option>
   <?php foreach ($statuses as  $value) {?>
    <option value="<?php echo $value['id'] ?>" <?php if($status == $value['id']) { echo 'selected' ; } ?>><?php echo $value['status_name'] ?></option>
  <?php } ?>
</select>
</div>
</div>
 </div>
 
 



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
 



<div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" id="requestid">
      
    </div>
  </div>
</div>
</body>

 <?php $this->load->view('admin/footer');?>


<script type="text/javascript">

   if( $('#type').has('option').length > 0 ) {
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

var type = document.getElementById("type").value  ;
var status = document.getElementById("status").value  ;
var fromdate = document.getElementById("fromdate").value  ;
var todate = document.getElementById("todate").value  ;


$.ajax({  
url:"<?php echo base_url() ?>admin/request_det",  
method:"POST",  
data:{type:type,status:status,fromdate:fromdate ,todate:todate   },  
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

<script>
      function statusupdate($id,$status){

 
$.ajax({ 
type: "POST",
url: "<?php echo base_url(); ?>"+'admin/change_status/',
data: {id:$id,status:$status,table:'industry_products'},
}).done(function(response){

 if(response=='false'){
   toastr.error("Access denied");
 }

location.reload();

});

}

$(document).on('click', '.status_update', function(){  
var orderid = $(this).data("orderid")  ;

 
if(orderid != '')  
{  
$.ajax({  
url:"<?php echo base_url() ?>admin/order_status",  
method:"POST",  
data:{orderid:orderid },  
success:function(data){ 

$('#requestid').html(data);  
$('#dataModal').modal('show');
}  
});  
}            
});





</script>