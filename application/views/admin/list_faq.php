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
    <div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Faq List") ?></h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
         <a href="<?php echo base_url(); ?>admin/newfaq"><button class="btn btn-warning"> <?php echo $this->Admin_model->translate("Add New") ?></button></a> 
 
    </div>
</div>

 
<div class="box-content">
 <div class="table-responsive">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
      <tr>
<th><?php echo $this->Admin_model->translate("No") ?></th>
<!-- <th>User Id</th> -->
<th><?php echo $this->Admin_model->translate("Question(English)") ?></th>
 <th><?php echo $this->Admin_model->translate("Question(Arabic)") ?></th>
<th><?php echo $this->Admin_model->translate("Answer (English)") ?></th>
 <th><?php echo $this->Admin_model->translate("Answer (Arabic)") ?></th>

 <th><?php echo $this->Admin_model->translate("status") ?></th>

<th><?php echo $this->Admin_model->translate("Action") ?></th>
</tr>
      
</thead>
<tbody>
<?php foreach ($faqdet as $value) {
  ?>
 <tr>
<td><?php echo $value['id'] ?></td>
<!-- <th>User Id</th> -->
<td><?php echo  $this->Admin_model->translate($value['question']) ?></td>
<td><?php echo $this->Admin_model->translate($value['ar_question']) ?></td>
<td><?php echo  $this->Admin_model->translate($value['answer']) ?></td>
<td><?php echo $this->Admin_model->translate($value['ar_answer']) ?></td>

 <td>
  <?php if($value['status']=='Y'){ ?>

    <a onclick="statusupdate(<?php echo $value['id'] ?>,'N');  return false ;" href="javascript:void(0)"  class="btn btn-success btn-xs"><?php echo $this->Admin_model->translate('Enabled') ?> </a>

    

  <?php } else { ?>
     
    <a onclick="statusupdate(<?php echo $value['id'] ?>,'Y');  return false ;" href="javascript:void(0)"  class="btn btn-danger btn-xs"><?php echo $this->Admin_model->translate('Disabled') ?> </a>

   
    
  <?php } ?>

     </td>

   
<td>
 
<a href="<?php echo base_url()?>admin/editfaq/<?php echo $value['id']?>"><button type="button" class="btn btn-info   btn-xs waves-effect waves-light"><i class="ico fa fa-pencil"></i></button></a>

<a href="javascript:void(0)" ><button type="button" class="btn btn-danger   btn-xs waves-effect waves-light deletequestion " data-faqid = "<?php echo $value['id'] ?>" ><i class="ico fa fa-trash"></i></button></a>

 


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

 <script>
    function statusupdate($id,$status){

 
$.ajax({ 
type: "POST",
url: "<?php echo base_url(); ?>"+'admin/faq_status/',
data: {id:$id,status:$status},
}).done(function(response){

 if(response=='false'){
   toastr.error("Access denied");
 }

location.reload();

});

}


$(document).on('click', '.deletequestion', function(){  


 
 
var faqid = $(this).data('faqid') ; 

 
$.ajax({  
url:"<?php echo base_url() ?>admin/deletefaq",  
method:"POST",  
data:{faqid:faqid },
success:function(data){ 

 location.reload() ;    

}  
});  
            
});



</script>