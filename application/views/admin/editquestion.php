<style type="text/css">
  textarea.form-control  {
    height: 50px !important ;
 
}

</style>

<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $this->Admin_model->translate("Edit Question") ?></h4>
      </div>
      <div class="modal-body">
          
 
<form class="order_form" id="supplier_form" method="POST" action="<?php echo base_url();?>admin/updatequestion">

  <input type="hidden" name="serviceid" value="<?php echo $serviceid ?>">
  <input type="hidden" name="questionid" value="<?php echo $question_det->id ?>">

   
     <div class="row">

<div class="col-md-12">
<div class="form-group">
  <label class="control-label mb-10 text-left"><?php echo $this->Admin_model->translate("Sub Heading") ?> </label>

<select class="form-control" name="groupid"><option value="">--Select--</option>

  <?php foreach ($group as $value) { ?>
  <option value="<?php echo $value['id'] ?>" <?php if($value['id']==$question_det->group_id){ echo 'selected' ;} ?>><?php echo $value['group_name'] ?> </option>  
  <?php } ?>
 </select>
</div>
</div>
</div>


<div class="form-group">
<label class="control-label mb-10 text-left"><?php echo $this->Admin_model->translate("Question(English)") ?> </label>
 
<textarea placeholder="type question here...." name="question" class="form-control" >
<?php echo $this->Admin_model->translate($question_det->question) ?>
 </textarea>
</div>

<div class="form-group">
<label class="control-label mb-10 text-left"><?php echo $this->Admin_model->translate("Question(Arabic)") ?> </label>
 
<textarea placeholder="type question here...." name="ar_question" class="form-control" >
<?php echo $this->Admin_model->translate($question_det->ar_question) ?>
 </textarea>
</div>


<?php if($initial == 1){?>

<div class="row">
   <div class="col-md-12">

<div class="form-group">
  <label class="control-label mb-10 text-left"><?php echo $this->Admin_model->translate("Question Type") ?> </label>
 
<select name="question_type" id="symptom" class="form-control select2_2" multiple>
 <optgroup label="Basic Questions">
<option value="basic" <?php if ($question_det->group_name=='basic'){ echo 'selected' ;}?> >Basic</option>
</optgroup>
<optgroup label="Disability Based">
 


<?php foreach ($symptoms as $disability) { ?>
    <option value="<?php echo $disability['id'] ?>" <?php if ($question_det->symptom==$disability['id']){ echo 'selected' ;}?> ><?php echo $disability['symptom_name'] ?></option>
   <?php } ?>



</optgroup>
 
 
</select>
 

  </div>
</div>
 
</div>


<div class="row">
   <div class="col-md-12">

<div class="form-group">
  <label class="control-label mb-10 text-left"><?php echo $this->Admin_model->translate("Question Group") ?> </label>
 
<select name="question_type[]" id="symptom" multiple="multiple" class="select2_2 form-control">
 <optgroup label="<?php echo $this->Admin_model->translate("Basic Questions") ?>">
<option value="basic" <?php if ($question_det->group_name=='basic'){ echo 'selected' ;}?> ><?php echo $this->Admin_model->translate("Basic") ?></option>
</optgroup>
<optgroup label="<?php echo $this->Admin_model->translate("Symptom Based") ?>">
 


<?php foreach ($symptoms as $symptom) { ?>
    <option value="<?php echo $symptom['id'] ?>" <?php if (in_array($symptom['id'], explode(',', $question_det->symptom)) ){ echo 'selected' ;}?> ><?php echo $symptom['symptom_name'] ?></option>
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
 
<select name="input_type" disabled class="form-control">
<option value="">--Select-- </option>
<option value="text" <?php if($question_det->input_type=='text'){ echo "selected" ;} ?>>Text</option>
<option value="numeric" <?php if($question_det->input_type=='numeric'){ echo "selected" ;} ?>>Numeric</option>
<option value="phone" <?php if($question_det->input_type=='phone'){ echo "selected" ;} ?> >Phone</option>

<option value="email" <?php if($question_det->input_type=='email'){ echo "selected" ;} ?>>Email</option>
<option value="date" <?php if($question_det->input_type=='date'){ echo "selected" ;} ?>>Date</option>
 <option value="date" <?php if($question_det->input_type=='nationality'){ echo "selected" ;} ?>>Nationality</option>
</select>
 

  </div>
</div>

  <div class="col-md-6">

<div class="form-group">

<label class="control-label mb-10 text-left">  </label>
  
<div class="checkbox primary"><input type="checkbox" <?php if($question_det->mandatory=='on'){echo "checked" ;} ?>  id="checkbox-2" name="mandatory" ><label for="checkbox-2">Mandatory</label></div>

  </div>
</div>
</div>

<div class="row">

<div class="col-md-6">
<div class="form-group">
<label class="control-label mb-10 text-left"><?php echo $this->Admin_model->translate("Answer field type") ?> </label>
<select class="form-control" id="field_type" onchange="var el = document.getElementById('no_of_fields');el.value = 1;document.getElementById('no_of_fields').focus();  " name="field_type"><option value="">--Select--</option>
<option value="textbox" <?php if($question_det->field_type =='textbox'){ echo 'selected' ; } ?> >Text Box</option>
<option value="dropdown" <?php if($question_det->field_type =='dropdown'){ echo 'selected' ; } ?>>Dropdown</option>
<option value="checkbox" <?php if($question_det->field_type =='checkbox'){ echo 'selected' ; } ?>>Multi Select Checkbox</option>
<option value="radio" <?php if($question_det->field_type =='radio'){ echo 'selected' ; } ?>>Radio Button</option>
<option value="textarea" <?php if($question_det->field_type =='textarea'){ echo 'selected' ; } ?>>Text Area</option>

<option value="file" <?php if($question_det->field_type =='file'){ echo 'selected' ; } ?>>File upload</option>
 



</select>


</select>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label class="control-label mb-10 text-left"><?php echo $this->Admin_model->translate("No. of fields") ?> </label>
<input type="number" id="no_of_fields" <?php 

$field = $question_det->field_type ;
if($field == 'dropdown' || $field == 'radio' || $field == 'checkbox' ) { }
  else {echo 'readonly' ; }
  ?>  class="form-control number" placeholder=""  min="1" value="<?php echo $this->Admin_model->translate($question_det->no_of_fields) ?>" name="no_of_fields" >
</div>

</div>
</div>


 <?php if($question_det->field_type =='dropdown') {
  ?>
  <div class="row" id="descriptionbox">
   <div class="col-md-6">

<div class="form-group">
 
  <label class="control-label mb-10 text-left">  </label>
 
<div class="checkbox primary"><input type="checkbox" <?php if($question_det->description=='all'){ echo "checked" ;}?> id="checkbox-3" name="desriptionforall" ><label for="checkbox-3">Description required for all</label></div>


  </div>
</div>

  <div class="col-md-6">

<div class="form-group">
    <label class="control-label mb-10 text-left">  </label>
 
<div class="checkbox primary"><input type="checkbox" <?php if($question_det->description=='other'){ echo "checked" ;}?> id="checkbox-4" name="desriptionforothers" ><label for="checkbox-4">Description required for others</label></div>

  </div>
</div>
</div>

<?php } ?>


 <div id="inputfields">
<?php 

$field = $question_det->field_type ;
if($field == 'dropdown' || $field == 'radio' || $field == 'checkbox' ) { 
  ?>

 <?php $data =  json_decode($question_det->answer_fields) ;

   if(!empty($data)){ ?>

 <div class="row"> 
 <div class="col-md-4"> 
<div class="form-group"> 
<label class="control-label mb-10 text-left">Display Name(English)</label> 
</div> 
</div> 
 <div class="col-md-4"> 
<div class="form-group"> 
<label class="control-label mb-10 text-left">Display Name(Arabic)</label> 
</div> 
</div> 
<div class="col-md-4">
<div class="form-group">
<label class="control-label mb-10 text-left">Value Name </label>
</div> 
</div> 
</div>



   <?php 
    foreach ($data as $value) {

  ?>

     
<div class="row"><div class="col-md-4"><div class="form-group">
   <input type="text" class="form-control" placeholder="display name" value="<?php echo $value->display ?>" name="display_name[]" > </div></div>
   <div class="col-md-4"><div class="form-group">
   <input type="text" class="form-control" placeholder="arabic display name" value="<?php  if(!empty($value->ar_display)){  echo $value->ar_display ;} ?>" name="ar_display_name[]" > </div></div>
   <div class="col-md-4"><div class="form-group">
   <input type="text" class="form-control" placeholder="value name" value="<?php echo $value->value ?>" name="value_name[]" > </div></div></div>





<?php  } ?>

<?php }   ?>
 

 <?php }   ?>
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
'</div><div class="col-md-4">'+
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
}
else{
 $('#no_of_fields').attr("readonly","true");
 }

 $('#inputfields').html(input_field);

});





 



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
 
//window.location.href="<?php echo base_url();?>buyer/supplierlist";
 // $( "#supplierlist" ).load(window.location.href + " #supplierlist" );

var serviceid = document.getElementById("serviceid").value  ;

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