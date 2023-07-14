<style type="text/css">
  textarea.form-control  {
    height: 50px !important ;
 
}

</style>

 <link rel="stylesheet" href="<?php echo base_url();?>assets/plugin/select2/css/select2.min.css">

<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Question</h4>
      </div>
      <div class="modal-body">
          
 
<form class="order_form" id="supplier_form" method="POST" action="<?php echo base_url();?>admin/addquestion">

  <input type="hidden" name="serviceid" id="service" value="<?php echo $serviceid ?>">



<div class="row">

<div class="col-md-12">
<div class="form-group">
  <label class="control-label mb-10 text-left"><?php echo $this->Admin_model->translate("Sub Heading") ?> </label>

<select class="form-control" name="groupid"><option value="">--Select--</option>

  <?php foreach ($group as $value) { ?>
  <option value="<?php echo $value['id'] ?>"><?php echo $value['group_name'] ?> </option>  
  <?php } ?>
 </select>
</div>
</div>
</div>

<div class="form-group">
<label class="control-label mb-10 text-left"><?php echo $this->Admin_model->translate("Question(English)") ?> </label>
 
<textarea rows="2" placeholder="type question here...." name="question"  class="form-control question" ></textarea>
</div>

<div class="form-group">
<label class="control-label mb-10 text-left"><?php echo $this->Admin_model->translate("Question(Arabic)") ?> </label>
 
<textarea rows="2" placeholder="type question here...." name="ar_question"  class="form-control question" ></textarea>
</div>


<input type="hidden" name="initial" value="<?php echo $initial ; ?>">

<?php if($initial == 1){?>


<div class="row">
   <div class="col-md-12">

<div class="form-group">
  <label class="control-label mb-10 text-left"><?php echo $this->Admin_model->translate("Question Group") ?> </label>
 
<select name="question_type[]" id="symptom" multiple="multiple" class="select2_2 form-control">
 <optgroup label="<?php echo $this->Admin_model->translate("Basic Questions") ?>">
<option value="basic"><?php echo $this->Admin_model->translate("Basic") ?> </option>
</optgroup>
<optgroup label="<?php echo $this->Admin_model->translate("Symptom Based") ?>">


  <?php
 

   foreach ($symptoms as $symptom) { ?>
    <option value="<?php echo $symptom['id'] ?>"><?php echo $symptom['symptom_name'] ?> / <?php echo $symptom['ar_symptom_name'] ?></option>
   <?php } ?>
 

</optgroup>
 
 
</select>
 

  </div>
</div>
 
</div>


<?php } ?>

<div class="row">
   <div class="col-md-6">

<div class="form-group">
  <label class="control-label mb-10 text-left"><?php echo $this->Admin_model->translate("Input Type") ?> </label>
 
<select name="input_type" class="form-control">
<option value="">--Select-- </option>
<option value="text">Text</option>
<option value="numeric">Numeric</option>
<option value="phone">Phone</option>
<option value="email">Email</option>
<option value="date">Date</option>
 
</select>
 

  </div>
</div>

  <div class="col-md-6">

<div class="form-group">
    <label class="control-label mb-10 text-left">  </label>
 
<div class="checkbox primary"><input type="checkbox" checked id="checkbox-2" name="mandatory" ><label for="checkbox-2">Mandatory</label></div>

  </div>
</div>
</div>



<div class="row">

<div class="col-md-6">
<div class="form-group">
<label class="control-label mb-10 text-left"><?php echo $this->Admin_model->translate("Answer field type") ?> </label>
<select class="form-control" id="field_type" onchange="var el = document.getElementById('no_of_fields');el.value = 1;document.getElementById('no_of_fields').focus();  " name="field_type"><option value="">--Select--</option>
<option value="textbox">Text Box</option>
<option value="dropdown" >Dropdown</option>
<option value="checkbox">Checkbox</option>
<option value="radio">Radio Button</option>
<option value="textarea">Text Area</option> 
<option value="file">File upload</option>
 

</select>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label class="control-label mb-10 text-left"><?php echo $this->Admin_model->translate("No. of fields") ?> </label>
<input type="number" class="form-control number" id="no_of_fields" min="1" placeholder="" name="no_of_fields" >
</div>

</div>
</div>
  

  <div class="row" id="descriptionbox">
   <div class="col-md-6">

<div class="form-group">
 
  <label class="control-label mb-10 text-left">  </label>
 
<div class="checkbox primary"><input type="checkbox"  id="checkbox-3" name="desriptionforall" ><label for="checkbox-3">Description required for all</label></div>


  </div>
</div>

  <div class="col-md-6">

<div class="form-group">
    <label class="control-label mb-10 text-left">  </label>
 
<div class="checkbox primary"><input type="checkbox" checked id="checkbox-4" name="desriptionforothers" ><label for="checkbox-4">Description required for others</label></div>

  </div>
</div>
</div>



 <div id="inputfields"></div>

 



<p class="text-center"><button type="submit" class="btn btn-block save"><?php echo $this->Admin_model->translate("Save") ?></button></p>

</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">



<?php echo $this->Admin_model->translate("Close") ?></button>
    
      </div>


 <script type="text/javascript">
/* Add data */ /*Form Submit*/

$(".number").bind('keyup mouseup focus', function () {

  var input_field = "";
  var field_type =  document.getElementById("field_type").value  ;
if(field_type=='dropdown'){
  $('#descriptionbox').show() ;

}else{
  $('#descriptionbox').hide() ;

}
 

 if(field_type=='dropdown' || field_type=='radio' || field_type=='checkbox' ){

 if(this.value > 0){

  input_field = '<div class="row">'+
'<div class="col-md-4">'+
'<div class="form-group">'+
'<label class="control-label mb-10 text-left">Display Name(English)</label>'+
'</div>'+
'</div>'+
'<div class="col-md-4">'+
'<div class="form-group">'+
'<label class="control-label mb-10 text-left">Display Name(Arabic)</label>'+
'</div>'+
'</div>'+
'<div class="col-md-4">'+
'<div class="form-group">'+
'<label class="control-label mb-10 text-left">Value Name </label>'+
'</div>'+
'</div>'+
'</div>' ;
  for (let i = 0; i < this.value; i++) {
   input_field += '<div class="row"><div class="col-md-4"><div class="form-group">'+
   '<input type="text" class="form-control" placeholder="display name" name="display_name[]" > </div></div><div class="col-md-4"><div class="form-group">'+
   '<input type="text" class="form-control" placeholder="arabic display name" name="ar_display_name[]" > </div></div>'+
   '<div class="col-md-4"><div class="form-group">'+
   '<input type="text" class="form-control" placeholder="value name" name="value_name[]" > </div></div></div>' ;
}


 }  
$('#no_of_fields').removeAttr("readonly");

 }else{
 $('#no_of_fields').attr("readonly","true");
 }




$('#inputfields').html(input_field);
});



$(document).ready(function(){

 $('#descriptionbox').hide() ;

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
 
//window.location.href="<?php echo base_url();?>buyer/supplierlist";
 // $( "#questionlist" ).load(window.location.href + " #supplierlist" );

var serviceid = document.getElementById("service").value  ;

$.ajax({  
url:"<?php echo base_url() ?>admin/allquestions",  
method:"POST",  
data:{serviceid:serviceid },  
success:function(data){ 

$('#questionlist').html(data);  
 
}  
}); 


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


<script src="<?php echo base_url();?>assets/plugin/select2/js/select2.min.js"></script>

<script src="<?php echo base_url();?>assets/plugin/multiselect/multiselect.min.js"></script>