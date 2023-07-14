 

<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">  Update Order Status</h4>
      </div>


 <div class="modal-body"> 
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
    <option value="<?php echo $value['id'] ?>" <?php if($order->status == $value['id']) { echo 'selected' ; } ?>><?php echo $value['status_name'] ?></option>
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