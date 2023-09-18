<?php $this->load->view('admin/header');?>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<body>
<?php $this->load->view('admin/top_header');?>
<?php $this->load->view('admin/side_header');?>
 
 <?php 
 $session = $this->session->userdata('superadmindet');
 $logged_in_role =  $this->Admin_model->get_type_name_by_id('user_roles','id',$session['userrole'],'belongs_to')  ;
    ?>
 
 
<div id="wrapper">
<div class="main-content">

 	<!-- .row -->
     <div class="row small-spacing">

	 <?php if($session['usertype'] == 'admin'){ ?>
		 
		 <a href="<?php echo base_url()?>admin/customers">
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-info text-white">
					<div class="statistics-box with-icon">
						<i class="ico small fa fa-users"></i>
						<p class="text text-white"><?php echo $this->Admin_model->translate('Total Customers')?></p>
						<h2 class="counter"><?php echo count($totalCustomers) ?></h2>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
</a>
			<?php } ?>
			 
			<!-- /.col-lg-3 col-md-6 col-xs-12 -->
			 <a href="<?php echo base_url()?>admin/order_report">
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-warning text-white">
					<div class="statistics-box with-icon">
					<i class="ico small fa fa-money"></i>
						<p class="text text-white"><?php echo $this->Admin_model->translate('Overall Sales')?></p>
						<h2 class="counter"><?php echo  $totalSales->totalAmount ?></h2>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
		</a>
			<!-- /.col-lg-3 col-md-6 col-xs-12 -->
			<a href="<?php echo base_url()?>admin/order_report">
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-danger text-white">
					<div class="statistics-box with-icon">
						<i class="ico small fa fa-cart-arrow-down"></i>
						<p class="text text-white"><?php echo $this->Admin_model->translate('Overall Orders')?></p>
						<h2 class="counter"><?php echo  $totalOrders->totalCount ?></h2>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
		</a>
			<?php if( $session['usertype'] == 'admin' ){ ?>
			 <a href="<?php echo base_url()?>admin/enquiries">
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-success text-white">
					<div class="statistics-box with-icon">
						<i class="ico small fa fa-comments"></i>
						<p class="text text-white"><?php echo $this->Admin_model->translate('Overall Enquiries')?></p>
						<h2 class="counter"><?php echo count($totalenquiries) ?></h2>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
		</a>
			<?php } ?>

			<?php if(  $session['usertype'] == 'admin' ){ ?>

				 <a href="<?php echo base_url()?>admin/order_report?type=industry&date=today">
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-warning text-white">
					<div class="statistics-box with-icon">
						<i class="ico small fa fa-cart-arrow-down"></i>
						<p class="text text-white"><?php echo $this->Admin_model->translate('Industry Orders - Today')?></p>
						<h2 class="counter"><?php echo  $industryOrdersToday->totalCount ?></h2>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
		</a>
			<?php } ?>

			<?php if(  $session['usertype'] == 'admin' ){ ?>
				<a href="<?php echo base_url()?>admin/order_report?type=school&date=today">
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-danger text-white">
					<div class="statistics-box with-icon">
						<i class="ico small fa fa-cart-arrow-down"></i>
						<p class="text text-white"><?php echo $this->Admin_model->translate('School Orders - Today')?></p>
						<h2 class="counter"><?php echo  $schoolOrdersToday->totalCount ?></h2>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
		</a>
			<?php } ?>

			
<a href="<?php echo base_url()?>admin/order_report?date=today">
	
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-success text-white">
					<div class="statistics-box with-icon">
						<i class="ico small fa fa-money"></i>
						<p class="text text-white"><?php echo $this->Admin_model->translate('Sales - Today')?></p>
						<h2 class="counter"><?php echo $totalSalesToday->totalAmount ?></h2>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
		</a>
		<a href="<?php echo base_url()?>admin/order_report?date=today">
	
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-info text-white">
					<div class="statistics-box with-icon">
						<i class="ico small fa fa-cart-arrow-down"></i>
						<p class="text text-white"><?php echo $this->Admin_model->translate('Orders - Today')?></p>
						<h2 class="counter"><?php echo $totalOrdersToday->totalCount ?></h2>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
		</a>

			<?php if( $session['usertype'] == 'admin' ){ ?>
				<a href="<?php echo base_url()?>admin/enquiries?date=today">
	
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-success text-white">
					<div class="statistics-box with-icon">
						<i class="ico small fa fa-comments"></i>
						<p class="text text-white"><?php echo $this->Admin_model->translate('Enquiries - Today')?></p>
						<h2 class="counter"><?php echo count($totalenquiriesToday) ?></h2>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
		</a>

			<?php } ?>


			

			<?php if($session['usertype'] == 'school' || $session['usertype'] == 'admin' ){ ?>

		<a href="<?php echo base_url()?>admin/order_report?type=school&status=1">
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-info text-white">
					<div class="statistics-box with-icon">
						<i class="ico small fa fa-first-order"></i>
						<p class="text text-white"><?php echo $this->Admin_model->translate('School Orders - Pending')?></p>
						<h2 class="counter"><?php echo count($pendingschoolOrders) ?></h2>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
		</a>

			<?php } ?>

			<?php if($session['usertype'] == 'industry' || $session['usertype'] == 'admin' ){ ?>
				<a href="<?php echo base_url()?>admin/order_report?type=industry&status=1">
		
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-danger text-white">
					<div class="statistics-box with-icon">
						<i class="ico small fa fa-first-order"></i>
						<p class="text text-white"><?php echo $this->Admin_model->translate('Industry Orders - Pending')?></p>
						<h2 class="counter"><?php echo count($pendingindustryOrders) ?></h2>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
</a>
			<?php } ?>

			<?php if( $session['usertype'] == 'admin' ){ ?>
				<a href="<?php echo base_url()?>admin/enquiries?status=1">
		
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-warning text-white">
					<div class="statistics-box with-icon">
						<i class="ico small fa fa-comments"></i>
						<p class="text text-white"><?php echo $this->Admin_model->translate('Enquiries - Pending')?></p>
						<h2 class="counter"><?php echo count($pendingEnquiries) ?></h2>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
		</a>

			<?php } ?>

			


			
			 
			<!-- /.col-lg-3 col-md-6 col-xs-12 -->
		</div>
		<!-- .row -->


		

		 <?php    
 


 //$this->db->where('YEAR(STR_TO_DATE(created_on,"%Y-%m-%d"))', date('Y'));
$this->db->where('STR_TO_DATE(created_on,"%Y-%m-%d") >', date("Y-m-d", strtotime("-6 months")));
 $service_requests =  $this->db->get('order_master')->result_array();




//echo 'this is month query '.$this->db->last_query();
$months = array();
$services = array();

 

 
  foreach ( $service_requests as $reqvalue) {
  $month = date('F', strtotime($reqvalue['created_on']));
  if(!in_array( $month , $months)){
        $months[]=$month;
        }

       
}
$resultarray = array();
foreach ($months as $mvalue) {
  $services = array();
  foreach ( $service_requests as $reqvalue) {
  $month = date('F', strtotime($reqvalue['created_on']));
  if($month==$mvalue){
    $services[] = $reqvalue['type'] ;
     }
  }
  $resultarray[] = array('Month'=>$mvalue,'Services'=>$services);
}

 //print_r($resultarray);

$finalarray = array() ; 
$ykeys = array();
$arr = array();
$arr2 = array();
foreach ($resultarray as  $value) {
$array = array();
$servarray = array();
  $servarray = array_count_values($value['Services']) ;

  foreach ($servarray as $key => $svalue) {
    $servicename = $key;

$array[$servicename] = $svalue;

    //$array .= "{ serviceName:'".$servicename."',count:".$svalue."}, ";
 if(!in_array("'".$servicename."'", $ykeys)){
      $ykeys[]="'".$servicename."'" ;
    }

  }

$arr[]=  array('month'=>$value['Month'], 'value' => $array);
  
 
 
}
 if(!empty($arr)){
  $arr = array_slice($arr, -6, 6, true);
 }


  
//print_r($resultarray);
// print_r($arr );

 $chart_data1 = '' ;
  
 foreach ($arr as $finalvalue) {

  $chart_data1 .= "{mnth : '".$finalvalue['month']."',";

  foreach ($ykeys as $keyvalue) {
     if (!array_key_exists(str_replace ("'","\'",$keyvalue), $finalvalue['value'])) {
   $finalvalue['value'][str_replace ("'","\'",$keyvalue)] = 0;

   

}
  }
  // echo $finalvalue['month']; 
  foreach ($finalvalue['value'] as $key => $value) {
     
  //  echo $key .' - '. $value;
    $chart_data1 .=  " '".$key."' : ". $value .',' ;
  }

  $chart_data1 .= '},';
 }



 //echo $chart_data1 ;
// print_r($xkeys);

  // $chart_data1 = "{mnth : 'June',totalReqs : 200,otherReqs : 200,xReqs : 200},{'mnth' : 'July',totalReqs : 100,otherReqs : 200,xReqs : 200}," ;
$chart_data1 = substr($chart_data1, 0, -1);

$ykeys   = implode(',', $ykeys);



 ?>


 <?php  
 // $service_requests = $this->Admin_model->get_all_data('service_request', array('YEAR(STR_TO_DATE(created_on,"%Y-%m-%d"))' => date('Y'), 'STR_TO_DATE(created_on,"%Y-%m-%d") >'  => date("Y-m-d", strtotime("-1 year")) ));


$this->db->where('YEAR(STR_TO_DATE(created_on,"%Y-%m-%d"))', date('Y'));
$this->db->or_where('STR_TO_DATE(created_on,"%Y-%m-%d") >', date("Y-m-d", strtotime("-1 year")));
 $service_requests =  $this->db->get('order_master')->result_array();

 



 //echo $this->db->last_query();
$years = array();
$services = array();

 

 
  foreach ( $service_requests as $reqvalue) {
	$year = date('Y', strtotime($reqvalue['created_on']));
	if(!in_array(	$year , $years)){
        $years[]=$year;
        }

       
}
$resultarray = array();
foreach ($years as $mvalue) {
	$services = array();
  foreach ( $service_requests as $reqvalue) {
	$year = date('Y', strtotime($reqvalue['created_on']));
	if($year==$mvalue){
		$services[] = $reqvalue['type'] ;
     }
  }
  $resultarray[] = array('Year'=>$mvalue,'Services'=>$services);
}

 //print_r($resultarray);

$finalarray = array() ; 
$ykeys2 = array();

foreach ($resultarray as  $value) {
$array = array();
$servarray = array();
 	$servarray = array_count_values($value['Services']) ;

	foreach ($servarray as $key => $svalue) {
		$servicename = strtoupper($key);

$array[$servicename] = $svalue;

		//$array .= "{ serviceName:'".$servicename."',count:".$svalue."}, ";
 if(!in_array("'".$servicename."'", $ykeys2)){
  		$ykeys2[]="'".$servicename."'" ;
  	}

	}

$arr2[]=  array('year'=>$value['Year'], 'value' => $array);
  
 
 
}
 


  
//print_r($resultarray);
// print_r($arr );

 $chart_data2 = '' ;
  
 foreach ($arr2 as $finalvalue) {

 	$chart_data2 .= "{year : '".$finalvalue['year']."',";

 	foreach ($ykeys2 as $keyvalue) {
 		 if (!array_key_exists(str_replace ("'","\'",$keyvalue), $finalvalue['value'])) {
   $finalvalue['value'][str_replace ("'","\'",$keyvalue)] = 0;

   

}
 	}
 	// echo $finalvalue['month']; 
  foreach ($finalvalue['value'] as $key => $value) {
  	 
  //	echo $key .' - '. $value;
  	$chart_data2 .=  " '".$key."' : ". $value .',' ;
  }

  $chart_data2 .= '},';
 }



 //echo $chart_data1 ;
// print_r($xkeys);

  // $chart_data1 = "{mnth : 'June',totalReqs : 200,otherReqs : 200,xReqs : 200},{'mnth' : 'July',totalReqs : 100,otherReqs : 200,xReqs : 200}," ;
$chart_data2 = substr($chart_data2, 0, -1);

$ykeys2	 = implode(',', $ykeys2);



 ?>


<section class="offer_section">
<div class="row">
<div class="col-md-12 offer_graph">
<h6><?php echo $this->Admin_model->translate("Total Orders")?></h6>
<div class="panel-wrapper collapse in">
<div class="panel-body">
<div  class="pills-struct">

<ul role="tablist" class="nav nav-pills nav-pills-rounded" id="myTabs_11">
<li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_11" href="#month">





<?php echo $this->Admin_model->translate("Month") ?>

</a></li>

<li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_12" role="tab" href="#year">Year</a></li>
</ul>


<div class="tab-content" id="myTabContent_11">

<div  id="month" class="tab-pane fade active in" role="tabpanel">
<!-- <p><?php echo $this->Admin_model->translate("Last 6 months result")?></p> -->
<div id="monthlychart" class="flot-chart" style="height: 320px">
</div>
</div>

<div  id="year" class="tab-pane fade active " role="tabpanel">
<!-- <p><?php echo $this->Admin_model->translate("Last 2 year result")?></p> -->
<div id="yearlychart" class="flot-chart" style="height: 320px">
</div>
</div>

</div>
</div>
</div>
</div>
</div>
</div>

</section>  

 
</div>
</div>


<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>


<script type="text/javascript">
$(document).ready(function() {
  getdashboard() ;
//  $('#yearlychart').fadeOut();
$("#yearlychart").hide();

});

$("#profile_tab_12").click(function(){
$("#yearlychart").show();
});

</script>

<script type="text/javascript">

var data1 = [
<?php echo $chart_data1; 
// console.log($chart_data1);?>
],
config1 = {
data: data1,
xkey: 'mnth',
ykeys: [<?php echo $ykeys ; ?>],
labels: [<?php echo $ykeys ; ?>],
fillOpacity: 0.6,
hideHover: 'auto',
behaveLikeLine: true,
resize: true,
// pointFillColors:['#000000'],
// pointStrokeColors: ['black'],
barColors:['#0218a7'],
};
config1.element = 'monthlychart';
Morris.Bar(config1);


</script>


<script type="text/javascript">

var data2 = [
<?php echo $chart_data2; 
// console.log($chart_data1);?>
],
config2 = {
data: data2,
xkey: 'year',
ykeys: [<?php echo $ykeys2 ; ?>],
labels: [<?php echo $ykeys2 ; ?>],
fillOpacity: 0.6,
hideHover: 'auto',
behaveLikeLine: true,
resize: true,
// pointFillColors:['#000000'],
// pointStrokeColors: ['black'],
barColors:['#0218a7'],
};
config2.element = 'yearlychart';
Morris.Bar(config2);


</script>

<!-- ================================================== -->
 <?php $this->load->view('admin/footer');?>

