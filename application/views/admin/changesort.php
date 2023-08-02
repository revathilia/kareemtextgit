<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $this->Admin_model->translate("Change Order") ?></h4>
      </div>

      <input type="hidden" id="service" value="<?php echo $serviceid  ?>">
      <div class="modal-body" id="questions">
           
             
  <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
      <tr>
<th>Question (English)
</th>
<th>Question (Arabic)
</th>
<th>Display Order
</th>
 
</tr>

</thead><tbody>
<?php foreach ($questions as $value) { ?>
 <tr>
 <td>  
   <?php echo $value['question']  ?>

 </td>

 <td>  
   <?php echo $value['ar_question'] ?>

 </td>
 <td>  


  <input type="hidden" class="questions" name="questions[]"  value="<?php echo $value['id'] ?>">
  <a href="#" class="up btn btn-xs btn-primary">Up</a>
  <a href="#" class="down btn btn-xs btn-warning">Down</a>
 
 </td>

 

  </tr>
<?php } ?></tbody></table> 


 <button class="btn btn-block btn-success" onclick="savesorting();return false ;"> Save new sort order</button>

  
      </div>



      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">



<?php echo $this->Admin_model->translate("Close") ?></button>
    
      </div>


 <script type="text/javascript">
/* Add data */ /*Form Submit*/


$(document).ready(function(){
    $(".up,.down").click(function(){
        var row = $(this).parents("tr:first");
        if ($(this).is(".up")) {
            row.insertBefore(row.prev());
        } else {
            row.insertAfter(row.next());
        }
    });
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


function  savesorting(){



    var arr= [] ;
   $("#questions").find("input").each(function() {
      
   arr.push($(this).val());

    })
if(arr){
  $.ajax({ 
        type: "POST",
          url : '<?php echo base_url() ?>'+"admin/updatesort",
            
            data: {question:arr},
    }).done(function(response){

    //alert(response);

    var serviceid = document.getElementById("service").value  ;

$.ajax({  
url:"<?php echo base_url() ?>admin/allquestions",  
method:"POST",  
data:{serviceid:serviceid },  
success:function(data){ 

$('#questionlist').html(data);  
 
}  
});


 $('#boostrapModal-1').modal('toggle');
        
    });
}

}
      </script>



 
