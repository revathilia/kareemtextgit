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
    <div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Psychiatric Corner") ?></h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
         
    </div>
</div>

 
<div class="box-content">

<div class="row">
  <div class='col-md-3'> <ul class="list-group" id="servicelist">
  <li class="list-group-item active" onclick="getresult('all')"> 


    <?php $psyroles = explode(',', $psyroles) ; ?>
 
    All Requests (<?php echo count($requestdet) ?>) </li>
   <?php foreach ($symptoms as $value) { 


    $result = array_intersect($psyroles, explode(',', $value['group_name']));
if( $result ){
  

  ?>


 <li class="list-group-item" onclick="getresult(<?php echo $value['id'] ?>);return false ;"> <?php echo  $value['symptom_name']  ?>  </li>


 
  <?php }  } ?>
</ul>
  </div>
  <div class='col-md-9'>
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
   function getresult(symptomid){
   
$('#servicelist li').click(function(e) {
    $(this).addClass('active').siblings().removeClass('active');
});




    $.ajax({  
url:"<?php echo base_url() ?>admin/initialassessment_requests",  
method:"POST",  
data:{symptomid:symptomid  },  
success:function(data){ 

$('#response').html(data);  
 
}  
});  

   }


getresult('all');

 </script>