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
    <div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Questions") ?> </h4></div>
    <div class='col-md-6'></div>

    <div class='col-md-2'> 
         <a href="<?php echo base_url(); ?>admin/que_group"><button class="btn btn-success btn-block "> <?php echo $this->Admin_model->translate("Subheadings") ?></button></a> 
 
    </div> 
    
</div>

 
<div class="card-content">



 
<div class="form-body">

   
<div class="row"> 



<div class="col-md-12">
<div class="form-group">
<label for="first_name"><?php echo $this->Admin_model->translate("Select service") ?></label>

<select class="form-control" name="service_name" id="service">
  <option value="">--Select--</option>
  <?php 
 
  foreach ($servicedet as $value) { ?>
     <option value="<?php echo $value['id'] ?>"><?php echo $value['service_name'] ?> / <?php echo $value['ar_service_name'] ?></option>
  <?php  }  ?>
  
</select>
 
</div>
</div>


</div>
 
<div class="row">
  <div class="col-md-6">
<div class="form-group">
  <button type="button" class="btn btn_app btn-sm newquestion" data-toggle="modal"  data-target="#boostrapModal-1"   ><?php echo $this->Admin_model->translate("Add New Field")?></button>

</div>
</div>

<div class="col-md-6">
<div class="form-group">
  <button type="button" class="btn btn-primary btn-sm btn-block changesort" data-toggle="modal"  data-target="#boostrapModal-1"   ><?php echo $this->Admin_model->translate("Change Question Order")?></button>

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
 


<div class="modal fade" id="boostrapModal-1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="serviceid">
      
    </div>
  </div>
</div>

</body>


 <?php $this->load->view('admin/footer');?>


<script type="text/javascript">

  $( document ).ready(function() {
    $('.newquestion').hide();
    $('.changesort').hide();
});

  $('select').on('change', function() {
 // alert( this.value );

  if(this.value ==""){
    $('.newquestion').hide();
     $('.changesort').hide();
  }else{
     $('.newquestion').show();
      $('.changesort').show();
  }

var serviceid = document.getElementById("service").value  ;
  

$.ajax({  
url:"<?php echo base_url() ?>admin/allquestions",  
method:"POST",  
data:{serviceid:serviceid },  
success:function(data){ 

$('#questionlist').html(data);  
 
}  
});  


});






$(document).on('click', '.newquestion', function(){  


var serviceid = document.getElementById("service").value  ;
 


if(serviceid != '')  
{  
$.ajax({  
url:"<?php echo base_url() ?>admin/newquestion",  
method:"POST",  
data:{serviceid:serviceid },  
success:function(data){ 

$('#serviceid').html(data);  
$('#dataModal').modal('show');
    

}  
});  
}            
});


$(document).on('click', '.editquestion', function(){  


var serviceid = document.getElementById("service").value  ;
 
var questionid = $(this).data('questionid') ;

if(serviceid != '')  
{  
$.ajax({  
url:"<?php echo base_url() ?>admin/editquestion",  
method:"POST",  
data:{serviceid:serviceid,qid:questionid },
success:function(data){ 

$('#serviceid').html(data);  
$('#boostrapModal-1').modal('show');
    

}  
});  
}            
});


$(document).on('click', '.deletequestion', function(){  


var serviceid = document.getElementById("service").value  ;
 
var questionid = $(this).data('questionid') ;

if(serviceid != '')  
{  
$.ajax({  
url:"<?php echo base_url() ?>admin/deletequestion",  
method:"POST",  
data:{serviceid:serviceid,qid:questionid },
success:function(data){ 

$('#serviceid').html(data);  
$('#boostrapModal-1').modal('show');
    

}  
});  
}            
});


$(document).on('click', '.changesort', function(){  


var serviceid = document.getElementById("service").value  ;
 
var questionid = $(this).data('questionid') ;

if(serviceid != '')  
{  
$.ajax({  
url:"<?php echo base_url() ?>admin/changesort",  
method:"POST",  
data:{serviceid:serviceid,qid:questionid },
success:function(data){ 

$('#serviceid').html(data);  
$('#boostrapModal-1').modal('show');
    

}  
});  
} 

});


function statusupdate($id,$status){

$.ajax({ 
type: "POST",
url: "<?php echo base_url(); ?>"+'admin/question_status/',
data: {id:$id,status:$status},
}).done(function(response){


 if(response=='false'){
   toastr.error("Access denied");
 } else{
  reloadpage() ;
 }
});

}


function reloadpage(){

var serviceid = document.getElementById("service").value  ;
var group = document.getElementById('selectedgroup').value  ;
 

$.ajax({  
url:"<?php echo base_url() ?>admin/allquestions",  
method:"POST",  
data:{serviceid:serviceid,groupname:group },  
success:function(data){ 

$('#questionlist').html(data);  
 
}  
});
}



</script>