<div class="row small-spacing">
<div class="col-xs-12">
     <div class="box-content card white">
<div class="box-title row">
    
<?php 
if($group <> 'all'){
$disabilities = $this->db->get_where('disabilities',array('disability_group'=>$group))->result_array() ;
}else{
	$disabilities = $this->db->get_where('disabilities')->result_array() ;
}



 

$disname = array();
foreach ($disabilities as $value) {
	$disname[] =  $value['disability_name'] ;
}

 
$disname = implode(', ', $disname);
?>
 

     
</div>
 
 <div class='col-md-10'><b>Disabilites Included in Group <?php if($group == 'A'){ echo "A" ; }
    			else if($group == 'B'){ echo "B" ; }
    			else if($group == 'C'){ echo "C" ; }
    			else if($group == 'Basic'){ echo "Basic" ; }
    			else { echo "All" ; }
    			 ?> : <i><?php echo $disname ;?></i></b> </div>
 
<!-- /.col-lg-6 col-xs-12 -->
</div>
</div>

</div>