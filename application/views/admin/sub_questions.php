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
    <div class='col-md-4'><h4>Sub Questions</h4></div>
    <div class='col-md-6'></div>
    
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
     <option value="<?php echo $value['id'] ?>"><?php echo $value['service_name'] ?></option>
  <?php  }  ?>
  
</select>
 
</div>
</div>

<div class="col-md-12">
<div class="form-group">
<label for="first_name"><?php echo $this->Admin_model->translate("Select question") ?></label>

<select class="form-control" name="question" id="questions">
  
  
</select>
 
</div>
</div>


</div>
 


 



</div>
 
  </div>


 

 
<!-- /.col-lg-6 col-xs-12 -->
</div>
</div>
 

</div>
</div>
</div>
 
 

 <?php $this->load->view('admin/footer');?>


<script type="text/javascript">

 

  $('select').on('change', function() {
 // alert( this.value );

 
var serviceid = document.getElementById("service").value  ;

$.ajax({  
url:"<?php echo base_url() ?>admin/getquestions",  
method:"POST",  
data:{serviceid:serviceid },  
success:function(data){ 

$('#questions').html(data);  
 
}  
});  


});

 



</script>