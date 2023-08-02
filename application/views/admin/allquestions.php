

<?php if($initial == 1){ ?>
<?php



//$grparray = array('all','Basic','A','B','C') ;


 
$grparray = $this->db->get('symptoms')->result_array();


// foreach ($grparray as $gvalue) {

//   if($gvalue == 'all'){
//     $disabilities = $this->db->get_where('disabilities')->result_array() ;
//   }else {
//     $disabilities = $this->db->get_where('disabilities',array('disability_group'=>$gvalue))->result_array() ;
//   }


// $disname = array();
// foreach ($disabilities as $value) {
//   $disname[] =  $value['disability_name'] ;
// }
 
// $groupnames["".$gvalue.""]=  implode(', ', $disname);


  
// }
 
  // print_r($groupnames); 

 
?>

 

 
 <div class="btn-group" id="grpbuttons" role="group" aria-label="Basic example">

 


 <?php 
$color = array('#DFA1B2','#908FD8','Orange','Tomato','#6BCB1F','#80B5E4');

$key = array_rand($color); ?>

<button type="button" data-qgroup = "all"  data-toggle="tooltip" data-placement="top" title="All" style="background-color:<?php echo $color[$key] ; ?> " class="btn group">All</button>
<?php $key = array_rand($color); ?>
<button type="button" data-qgroup = "basic"  data-toggle="tooltip" data-placement="top" title="Basic" style="background-color:<?php echo $color[$key] ; ?> " class="btn group">Basic</button>


<?php foreach ($grparray as $gvalue) { ?>

<?php 
$key = array_rand($color);
 
// Display the random array element
 
 
//$color =  '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6); ?>

  <button type="button" data-qgroup = "<?php echo $gvalue['group_name'] ?>"  data-toggle="tooltip" data-placement="top" title="<?php echo $gvalue['symptom_name'] ?>" style="background-color:<?php echo $color[$key] ; ?> " class="btn group">Group <?php echo $gvalue['group_name'] ?></button>
   
 <?php } ?>
  
  <!-- <button type="button" data-qgroup = "basic"  data-toggle="tooltip" data-placement="top" title="<?php echo $groupnames['Basic']  ?>" class="btn btn-default group">Basic</button>
  <button type="button" data-qgroup = "A"  data-toggle="tooltip" data-placement="top" title="<?php echo $groupnames['A']  ?>" class="btn btn-primary group">Group A</button>
  <button type="button" data-qgroup = "B"  data-toggle="tooltip" data-placement="top" title="<?php echo $groupnames['B']  ?>" class="btn btn-danger group">Group B</button>
  <button type="button" data-qgroup = "C"  data-toggle="tooltip" data-placement="top" title="<?php echo $groupnames['C']  ?>" class="btn btn-info group ">Group C</button> -->
</div>

 
<?php } ?>


<input type="hidden" name="" id="selectedgroup" value="all">

<div id="allquestions">
 <?php 
  $data['questions'] = $questions  ;
  $data['initial'] = $initial ;
 $this->load->view('admin/viewallquestions',$data) ;

 ?>


</div>

 

<script>

 
jQuery(document).ready(function () {
  jQuery('[data-toggle="tooltip"]').tooltip();
});

 $('.group').click(function(){
    
//alert( $(this).data('qgroup') );
var groupname = $(this).data('qgroup') ;

if($('#grpbuttons').find('.group').hasClass('selected')) { 
$('#grpbuttons').find('.group').removeClass('selected');
} 

$(this).addClass('selected');


document.getElementById('selectedgroup').value =  groupname ;

var serviceid = document.getElementById("service").value  ;

$.ajax({  
url:"<?php echo base_url() ?>admin/allquestions",  
method:"POST",  
data:{serviceid:serviceid,groupname:groupname },  
success:function(data){ 

$('#questionlist').html(data);  
 
}  
});  


});



     </script>

<script type="text/javascript">
   $(document).ready( function() {
  $( '#example' ).dataTable( {
            lengthChange: false,
            buttons: [ 'copy', 'excel', 'csv', 'pdf' ],
            "bDestroy": true,
            "paging":   true,
            "ordering": false,
            stateSave: true
 } );
 } );
 </script>