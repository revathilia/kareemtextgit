<div class="row small-spacing">

	<div class="row">
		<div class="col-sm-12 col-lg-4 col-xs-12"> 
<a href="<?php echo base_url()?>admin/services">
<div class="box-content bg-dashboard">
<div class="statistics-box with-icon">
<img src="<?php echo base_url()?>assets/images/total_service.png" class="ico">
<div class="text-large"><a href="<?php echo base_url()?>admin/services"><span class="das_cunt"><?php $count = count($this->Admin_model->get_all_data('services')) ;
echo  $count ;
 ?></span>  </a></div>
<p class="text"><b><?php echo $this->Admin_model->translate('Total Services') ?></b> </p>
​</div>
</div>
​</a>
</div>

<div class="col-sm-12 col-lg-4 col-xs-12"> 
<a href="<?php echo base_url()?>admin/requests">
<div class="box-content bg-dashboard">
<div class="statistics-box with-icon">
<img src="<?php echo base_url()?>assets/images/tot_request.png" class="ico">
​<div class="text-large"><a href="<?php echo base_url()?>admin/requests"><span class="das_cunt"><?php 
if($fromdate){
  $conditions['created_on >='] =    $fromdate ;
}
if($todate){
  $conditions['created_on <='] =    $todate ;
}
$tcount = count($this->Admin_model->get_all_data('service_request', $conditions)) ;
echo  $tcount ;
 ?></span>  </a></div>
 <p class="text"><b><?php echo $this->Admin_model->translate('Total Requests') ?></b> </p>
​</div>
</div>
​</a>
</div>

 <div class="col-sm-12 col-lg-4 col-xs-12"> 
<a href="<?php echo base_url()?>admin/reportrequests">
<div class="box-content bg-dashboard">
<div class="statistics-box with-icon">
<img src="<?php echo base_url()?>assets/images/tot_rep_req.png" class="ico">
​<div class="text-large"><a href="<?php echo base_url()?>admin/reportrequests"><span class="das_cunt"><?php 
if($fromdate){
  $conditions['created_on >='] =    $fromdate ;
}
if($todate){
  $conditions['created_on <='] =    $todate ;
}
$tcount = count($this->Admin_model->get_all_data('report_requests', $conditions)) ;
echo  $tcount ;
 ?></span>  </a></div>
 <p class="text"><b><?php echo $this->Admin_model->translate('Total Report Requests') ?></b> </p>
​</div>
</div>
​</a>
</div>
	</div>

​
​<div class="row">
	<?php $bgcolors = array('#68BC44', '#255FAD','#FDC613','#68BC44', '#255FAD','#FDC613','#68BC44', '#255FAD','#FDC613','#68BC44', '#255FAD','#FDC613') ;

$i = 0 ; 

 

?>

<?php foreach ($services as $value) {

	?>

<?php 
$count = 0 ;

$conditions	= array();

if($fromdate){
  $conditions['created_on >='] =    $fromdate ;
}
if($todate){
  $conditions['created_on <='] =    $todate ;
}

$conditions['service_id'] = $value['id'] ;

$count = count($this->Admin_model->get_all_data('service_request',$conditions)) ;
		$conditions['status'] = 'new' ;
$newcount = count($this->Admin_model->get_all_data('service_request',$conditions)) ;
		$conditions['status'] = 'closed' ;
$closedcount = count($this->Admin_model->get_all_data('service_request',$conditions)) ;
		$conditions['status'] = 'pending' ;
$pendingcount = count($this->Admin_model->get_all_data('service_request',$conditions)) ;

?>

<div class="col-sm-12 col-lg-4 col-xs-12">
<a href="<?php echo base_url()?>admin/requests?id=<?php echo $value['id'] ?>">
<div class="row seq_row">
<div class="col-sm-12 col-lg-8 col-xs-12">
<img src="<?php echo base_url()?>uploads/images/<?php echo $value['service_icon']?>" class="seq_img">
<p class="seq_serv_name">
 
 <?php  $lan = $this->session->userdata('language'); ?>

 	<?php 
if($lan =='English'){
		echo $this->Admin_model->translate($value['service_name']) ;
	}else{
		echo $this->Admin_model->translate($value['ar_service_name']) ;
	}

  ?>
 	
 
 </p>

</div>
<div class="col-sm-12 col-lg-4 col-xs-12 seq_back" style="background: <?php echo $bgcolors[$i] ; ?>">
<div class="text-large" style="margin-bottom:5px;"><a href="<?php echo base_url()?>admin/requests?id=<?php echo $value['id'] ?>"><i class="ft-arrow-up"></i><b><?php echo $this->Admin_model->translate('Total') ?> &nbsp;:  <?php echo $count ?> </b></a></div>
<div class="text-large" style="margin-bottom:5px;"><a href="<?php echo base_url()?>admin/requests?id=<?php echo $value['id'] ?>&status=new"><i class="ft-arrow-up"></i><b><?php echo $this->Admin_model->translate('New') ?> &nbsp;:  <?php echo $newcount ?></b> </a></div>
<div class="text-large" style="margin-bottom:5px;"><a href="<?php echo base_url()?>admin/requests?id=<?php echo $value['id'] ?>&status=pending"><i class="ft-arrow-up"></i><b><?php echo $this->Admin_model->translate('Pending') ?> &nbsp;:  <?php echo $pendingcount ?></b> </a></div>
<div class="text-large" style="margin-bottom:5px;"><a href="<?php echo base_url()?>admin/requests?id=<?php echo $value['id'] ?>&status=closed"><i class="ft-arrow-up"></i><b><?php echo $this->Admin_model->translate('Closed') ?> &nbsp;:  <?php echo $closedcount ?></b> </a></div>

</div>
</div>
</a>
</div>
	 
<?php 
$i++ ;
} ?>


​</div>
</div>