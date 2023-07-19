<DOCTYPE html>
<html dir="<?php echo $this->session->userdata('dir')?>" lang="<?php echo $this->session->userdata('lang')?>"> >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="<?php echo base_url() ?>assets/images/favicon.png">
<title>KareemTex - Super Admin</title>

<!-- Main Styles -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/styles/style.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/styles/custom.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/styles/style-rtl.min.css">
<!-- Material Design Icon -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/fonts/material-design/css/materialdesignicons.css">

<!-- mCustomScrollbar -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css">

<!-- Waves Effect -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugin/waves/waves.min.css">

<!-- Sweet Alert -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugin/sweet-alert/sweetalert.css">

<!-- Percent Circle -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugin/percircle/css/percircle.css">

<!-- Chartist Chart -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugin/chart/chartist/chartist.min.css">

<!-- FullCalendar -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugin/fullcalendar/fullcalendar.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugin/fullcalendar/fullcalendar.print.css" media='print'>

<!-- Color Picker -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/color-switcher/color-switcher.min.css">

 <link rel="stylesheet" href="<?php echo base_url();?>assets/toastr/toastr.min.css">
 <link rel="stylesheet" href="<?php echo base_url();?>assets/plugin/select2/css/select2.min.css">

 <link rel="stylesheet" href="<?php echo base_url();?>assets/plugin/datatables/media/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugin/datatables/extensions/Responsive/css/responsive.bootstrap.min.css">

<style type="text/css">
	fieldset {
  background-color: #eeeeee;
}

legend {
  background-color: gray;
  color: white;
  padding: 5px 10px;
}
</style>
</head>

<?php echo 'direction here' . $this->session->userdata('dir')?>