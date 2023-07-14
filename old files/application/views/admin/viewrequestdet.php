<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Request Details</h4>
      </div>
      <div class="modal-body">

<input type="hidden" name="" id="requestid" value="<?php echo $requestId ?>">
          <?php 
 $quearray = array() ;
 $answers = array() ;
 
$json = preg_replace('/[[:cntrl:]]/', '', $reqdata->que_det );
$output = json_decode($json ,true);

// $answers[]['customer'] = $value['cust_id'] ;
// $answers[]['remarks']= $value['remarks'] ;
// $answers[]['status'] = $value['status'] ;

//print_r($output);

$answers[0]  = array('customer' => $reqdata->cust_id  ,'status'=>$reqdata->status ,'remarks'=>$reqdata->remarks ,'date'=>$reqdata->created_on,'symptoms'=>$reqdata->symptom_id );  

// print_r($answers) ;
foreach ($output as $opvalue) {

 // echo $opvalue['answer'];
    if(!in_array( $opvalue['question'], $quearray)){
        $quearray[]=$opvalue['question'];
        }
        $answers[0][$opvalue['question']] = $opvalue['value'];


     //  $answers[][$opvalue['question']] = $opvalue['answer'];
}




          ?> 
  
 <table id="example" class="table table-striped table-bordered" style="width:100%">
       <?php foreach ($answers as $answer) { ?>
 <tr>
 
<th>Customer Name</th> <td><?php echo  $this->Admin_model->get_type_name_by_id('customers','id',$answer['customer'],'username') ?> </td> 
</tr>
<tr>
  <th>Date</th>
 <td>  <?php echo date("d-m-Y", strtotime($answer['date'])) ?></td>

</tr>

 <?php if(!empty($answer['symptoms'])){ ?>

<tr>
  <th>Symptoms</th>
 <td>  

   <?php $symptoms = $answer['symptoms'] ;
  $symptoms = explode(',', $symptoms) ;
foreach ($symptoms as $symptom) {
  $names[] = $this->Admin_model->get_type_name_by_id('symptoms','id',$symptom,'symptom_name') ;
}


echo implode(',', $names);
  ?>
    
    
    
  </td>

</tr>


 <?php }  ?>

<?php 

foreach ($quearray as $que) {
  echo  '<tr><th>'.  $que  .'</th>' ;


if(!empty(  $answer[$que])){
 echo  '<td>'.$answer[$que].'</td>' ;

}else{
   echo  '<td></td>' ;

}
 echo  '</tr>' ;


 }

  ?> 

 <tr><th>Status</th> <td><?php echo $answer['status'] ?></td> </tr>
 <tr><th>Remarks</th><td><?php echo $answer['remarks'] ?> </td> </tr>
<?php } ?>

    </table>


 

<div id="updatestatus">
  
</div>
 
 
 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">



<?php echo $this->Admin_model->translate("Close") ?></button>
    
      </div>
 
   <script type="text/javascript">

   
$(document).ready(function(){
var requestid = $('#requestid').val() ;


 
if(requestid != '')  
{  
$.ajax({  
url:"<?php echo base_url() ?>admin/requeststatus",  
method:"POST",  
data:{requestid:requestid },  
success:function(data){ 

    $('#updatestatus').html(data);  
//$('#dataModal').modal('show');
 
}  
});  
}            
});


 </script>