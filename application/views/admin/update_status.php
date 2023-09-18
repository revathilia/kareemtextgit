 

<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> Order Details </h4>
      </div>


 <div class="modal-body"> 

 <div class="table-responsive">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
     
<tbody>
<?php  if(!empty($order)) {
 
 $color  = '' ;
  
  ?>
 <tr style="background-color: <?php echo $color ;?>">
 
<th><?php echo $this->Admin_model->translate("Created On") ?></th> <td><?php echo date('d-m-Y', strtotime($order->created_on)) ?></td>
</tr><tr>
<th><?php echo $this->Admin_model->translate("Product & Specifications") ?></th> <td>

<?php 

$orderdet = $this->Admin_model->get_all_data('order_details',array('order_id'=>$order->id)) ;

foreach ($orderdet as  $ovalue) {  
   $details = json_decode($ovalue['order_details'], true);

   echo $details['name'].'<br>' ; ?>


<small><?php echo $this->Admin_model->get_type_name_by_id('size_master','id',$details['size'],'size') ?>,
<?php if($order->type== 'industry'){ ?>

<div class="swatch" style="background:<?php echo $this->Admin_model->get_type_name_by_id('color_master','id',$details['color'],'color_code')  ?>;color:#fff;">
  <input type="radio" name="color_selected" checked id="swatch_<?php echo $details['color'] ?>" value="<?php echo $details['color'] ?>" />
  <label for="swatch_<?php echo $details['color'] ?>" title="<?php echo $this->Admin_model->get_type_name_by_id('color_master','id',$details['color'],'color_name')  ?>"></label>
</div>

<?php }else{ ?>

 

<?php } ?> <?php echo $this->Admin_model->get_type_name_by_id('genders','id',$details['gender'],'gender_name') ?></small>, <?php echo $details['qty'] ?> No.s  <hr> 


<?php }  
 
 ?>
 </td></tr>

<tr><th><?php echo $this->Admin_model->translate("Customer Details") ?></th> <td><?php 

 $address = json_decode($order->address_details, true);
 
echo $address['first_name'].' '.$address['last_name'] .'<br>' ?>
<?php echo $address['phone_no'] ?></td></tr>



<?php if($order->type== 'school'){ ?>

  <tr><th><?php echo $this->Admin_model->translate("School Name") ?></th> 
  
  <td> 

  <?php echo ($details['school']) ?  $this->Admin_model->get_type_name_by_id('school_master','id',$details['school'],'school_name') : ''  ;  ?>

</td></tr>
  
<?php } ?>

<?php if($order->include_logo  != 0 ){ ?>
   


<tr><th><?php echo $this->Admin_model->translate("Include Logo") ?></th> <td> 

<a class="btn btn-xs btn-success downloadicon" href="<?php echo site_url()?>download?type=images/industry&filename=<?php echo $order->identity_card ;?>"><?php echo $this->Admin_model->translate("Click here to download Identity Card") ?> <i class="fa fa-download"></i></a>


</td></tr>

<?php } ?>


 <tr>
<th><?php echo $this->Admin_model->translate("Total Amount") ?></th><td><?php echo $details['subtotal'] ?></td></tr><tr>
<th><?php echo $this->Admin_model->translate("Status") ?></th><td><?php echo $this->Admin_model->get_type_name_by_id('order_status','id',$order->order_status,'status_name') ?></td></tr><tr>
 
 
 

  <?php
} ?>
  

</tbody>
    
    </table>
</div>


<div class="modal-header">
       
        <h4 class="modal-title" id="myModalLabel">  Update Order Status </h4>
      </div>
 

<form class="order_form" id="status_form" method="POST" action="<?php echo base_url();?>admin/order_status_update">

  <input type="hidden" name="orderid" id="service" value="<?php echo $orderid ?>">

<div class="form-group">
<label class="control-label mb-10 text-left"><?php echo $this->Admin_model->translate("Remarks") ?> </label>
 
<textarea placeholder="Add remarks here...." name="remarks" class="form-control" > <?php echo $order->notes ?></textarea>
</div>

 

<div class="row">

<div class="col-md-12">
<div class="form-group">
<label class="control-label mb-10 text-left"><?php echo $this->Admin_model->translate("Status") ?> </label>
<select class="form-control" id="field_type" name="status"><option value="">--Select--</option>
   <?php foreach ($statuses as  $value) {?>
    <option value="<?php echo $value['id'] ?>" <?php if($order->order_status == $value['id']) { echo 'selected' ; } ?>><?php echo $value['status_name'] ?></option>
  <?php } ?>
</select>
</div>
</div>
 
</div>
 
<p class="text-center"><button type="submit" class="btn btn-block save"><?php echo $this->Admin_model->translate("Save") ?></button></p>

</form>
       

 </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">



<?php echo $this->Admin_model->translate("Close") ?></button>
    
      </div>

 <script type="text/javascript">
/* Add data */ /*Form Submit*/
 


$(document).ready(function(){


/* Add data */ /*Form Submit*/
$("#status_form").submit(function(e){
var fd = new FormData(this);
var obj = $(this), action = obj.attr('name');
fd.append("is_ajax", 1);

fd.append("form", action);
e.preventDefault();
$('.save').prop('disabled', true);

$.ajax({
url: e.target.action,
type: "POST",
data:  fd,
contentType: false,
cache: false,
processData:false,
success: function(JSON)
{
if (JSON.error != '') {
toastr.error(JSON.error);
$('.save').prop('disabled', false);
} else{

//$('#boostrapModal-1').remove();
toastr.success(JSON.result);
$('.save').prop('disabled', false);
 
//$('#modal-container').remove();
   $('#dataModal').modal('toggle');
    location.reload();
} 
}           
});
});

});
      </script>