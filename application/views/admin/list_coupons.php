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
    <div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Coupon List") ?></h4></div>
    <div class='col-md-4'></div>
    <div class='col-md-2'> 
         <a href="<?php echo base_url(); ?>admin/newcoupon"><button class="btn btn-warning btn-block"> <?php echo $this->Admin_model->translate("Add New") ?></button></a> 
 
    </div>
  <!--   <div class="col-md-2 ">
      <button type="button" class="btn btn-primary btn-sm btn-block changesort" data-toggle="modal"  data-target="#boostrapModal-1"   ><?php echo $this->Admin_model->translate("Change Service Order")?></button>
    </div> -->

</div>

 
<div class="box-content">
 <div class="table-responsive">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
      <tr>
<th><?php echo $this->Admin_model->translate("No") ?></th>
<!-- <th>User Id</th> -->
<th><?php echo $this->Admin_model->translate("Coupon Name") ?></th>
 <th><?php echo $this->Admin_model->translate("Coupon Code") ?></th>
<th><?php echo $this->Admin_model->translate("Coupon Image") ?></th>
<th><?php echo $this->Admin_model->translate("Expiry Date") ?></th>

<th><?php echo $this->Admin_model->translate("Applicable To") ?></th>

 <th><?php echo $this->Admin_model->translate("status") ?></th>
 

<th><?php echo $this->Admin_model->translate("Action") ?></th>
</tr>
      
</thead>
<tbody>
<?php $i=0 ;foreach ($coupondet as $value) {
  $i++ ;
  ?>
 <tr>
<td><?php echo $i ?></td>
<!-- <th>User Id</th> -->
<td><?php echo  $value['coupon_name']  ?></td>
<td><?php echo  $value['coupon_code']  ?></td>
<td>

    <?php if(!empty($value['coupon_image'])){ ?>
<img  style="height:100px !important;width:100px !important;" class="img-thumb" src="<?php echo base_url().'uploads/images/coupons/'. $value['coupon_image']  ; ?>"  >

  <?php } ?>

</td> 
<td><?php echo  date("d-m-Y",strtotime( $value['ends_on']))  ?></td>
<td><?php echo  ucfirst($value['applicable_for'])  ?></td>

 <td>
  <?php if($value['status']=='Y'){ ?>

    <a onclick="statusupdate(<?php echo $value['id'] ?>,'N');  return false ;" href="javascript:void(0)"  class="btn btn-success btn-xs"><?php echo $this->Admin_model->translate('Enabled') ?> </a>

    

  <?php } else if($value['status']=='N'){ ?>
     
    <a onclick="statusupdate(<?php echo $value['id'] ?>,'Y');  return false ;" href="javascript:void(0)"  class="btn btn-danger btn-xs"><?php echo $this->Admin_model->translate('Disabled') ?> </a>

   
    
  <?php } ?>
   
 

     </td> 
   
<td>
 
<a href="<?php echo base_url()?>admin/editcoupon/<?php echo $value['id']?>">&nbsp;&nbsp;<button type="button" class="btn btn-info   btn-xs waves-effect waves-light"><i class="ico fa fa-pencil"></i></button></a><br/>


 <a onclick="statusupdate(<?php echo $value['id'] ?>,'D');  return false ;" href="javascript:void(0)"  class="btn btn-danger    btn-xs waves-effect waves-light"> <i class="ico fa fa-trash"></i> </a>


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

<div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" id="requestid">
      
    </div>
  </div>
</div>


 <?php $this->load->view('admin/footer');?>

 <script>
    function statusupdate($id,$status){

 
$.ajax({ 
type: "POST",
url: "<?php echo base_url(); ?>"+'admin/change_status/',
data: {id:$id,status:$status,table:'coupons'},
}).done(function(response){

 if(response=='false'){
   toastr.error("Access denied");
 }

location.reload();

});

}

 


</script>