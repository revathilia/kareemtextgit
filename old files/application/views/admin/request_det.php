<?php 
 $quearray = array() ;
 $answers = array() ;
$i=0 ;
foreach ($requests as $value) {  

$json = preg_replace('/[[:cntrl:]]/', '', $value['que_det']);
$output = json_decode($json ,true);

// $answers[]['customer'] = $value['cust_id'] ;
// $answers[]['remarks']= $value['remarks'] ;
// $answers[]['status'] = $value['status'] ;

$answers[$i] = array('customer' => $value['cust_id'] ,'status'=>$value['status'],'remarks'=>$value['remarks'],'date'=>$value['created_on']);  

// print_r($answers) ;
foreach ($output as $opvalue) {

 // echo $opvalue['answer'];
    if(!in_array( $opvalue['question'], $quearray)){
        $quearray[]=$opvalue['question'];
        }
        $answers[$i][$opvalue['question']] = $opvalue['value'];


     //  $answers[][$opvalue['question']] = $opvalue['answer'];
}

$i++ ;

  } ?>


  <div class="table-responsive">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
      <tr>
<th>Customer Name </th>

<th>Date</th>
<?php foreach ($quearray as $qvalue) { ?>
  <th><?php echo  $qvalue ;  ?> </th>
<?php } ?>

<th>Status</th>
<th>Remarks</th>

</tr>

</thead>
<tbody>
  
  <?php foreach ($answers as $answer) { ?>
 <tr>
 
 <td><?php echo  $this->Admin_model->get_type_name_by_id('customers','id',$answer['customer'],'username') ?> </td> 

 <td>  <?php echo date("d-m-Y", strtotime($answer['date'])) ?></td>


<?php 

foreach ($quearray as $que) {
if(!empty(  $answer[$que])){
 echo  '<td>'.$answer[$que].'</td>' ;

}else{
   echo  '<td></td>' ;

}



 }

  ?> 

  <td><?php echo $answer['status'] ?></td> 
 <td><?php echo $answer['remarks'] ?> </td> 


  </tr>
<?php } ?>

</tbody>
</table>



<script>
    $(document).ready(function() {
        var table = $('#example').DataTable( {
            lengthChange: false,
            buttons: [ 'copy', 'excel', 'csv', 'pdf' ]
        } );
     
        table.buttons().container()
            .appendTo( '#example_wrapper .col-md-6:eq(0)' );
    } );
  </script>
 



 




