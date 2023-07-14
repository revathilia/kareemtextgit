<style type="text/css">
  textarea.form-control  {
    height: 50px !important ;
 
}

</style>

<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> <?php echo $message ?></h4>
      </div>
      <div class="modal-body">
          
 
<form class="order_form" id="supplier_form" method="POST" action="<?php echo base_url();?>admin/confirmdelete">

  <input type="hidden" name="serviceid" value="<?php echo $serviceid ?>">
  <input type="hidden" name="questionid" value="<?php echo $questionid ?>">
 
<p class="text-center"><button type="submit" class="btn btn-success btn-sm waves-effect waves-light" ><?php echo $this->Admin_model->translate("Confirm") ?><button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">



<?php echo $this->Admin_model->translate("Close") ?></button></p>

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
$("#supplier_form").submit(function(e){
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
} else {

//$('#boostrapModal-1').remove();
toastr.success(JSON.result);
$('.save').prop('disabled', false);
 
 
reloadpage() ;
  
//$('#modal-container').remove();
  $('#boostrapModal-1').modal('toggle');
}
},
error: function() 
{
toastr.error(JSON.error);

$('.save').prop('disabled', false);
}           
});
});

});
      </script>