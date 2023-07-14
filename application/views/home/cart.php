<!doctype html>
<html class="no-js" dir="<?php echo $this->session->userdata('dir')?>" lang="<?php echo $this->session->userdata('lang')?>"> 



<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kareemtex</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Place favicon.png in the root directory -->
    <link rel="shortcut icon"href="<?php echo base_url()?>assets/home_assets/img/favicon.png" type="image/x-icon" />
    <!-- Font Icons css -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/home_assets/css/font-icons.css">
    <!-- plugins css -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/home_assets/css/plugins.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/home_assets/css/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/home_assets/css/responsive.css">

    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat:200,300,400,600,700'>
 
<style>
  .swatch {
    position: relative;
    margin: 0.1rem;
    width: 30px;
    top: 10px;
    height: 30px;
    border-radius: 30px;
    line-height: 30px;
    display: inline-block;
}
.swatch > [type=radio],
.swatch > [type=checkbox] {
  position: absolute;
  width: 100%;
  height: 100%;
  left: 0;
  top: 0;
  opacity: 0;
}
.swatch > [type=radio] + label,
.swatch > [type=checkbox] + label {
  width: 30px;
  height: 30px;
  border-radius: 30px;
  line-height: 30px;
  text-align: center;
  position: absolute;
  transition: all 0.5s ease-in-out;
}
.swatch > [type=radio] + label i,
.swatch > [type=checkbox] + label i {
  opacity: 0;
  font-size: 1rem;
  transition: opacity 0.5s;
}
.swatch > [type=radio]:checked + label i,
.swatch > [type=checkbox]:checked + label i {
  opacity: 1;
}
 

.swatch > [type=radio]:checked + label,
.swatch > [type=checkbox]:checked + label {
  width: 36px;
  height: 36px;
  border-radius: 36px;
  line-height: 36px;
  top: -3px;
  left: -3px;
  transition: all 0.5s ease-in-out;
}
.swatch > [type=radio]:checked + label i,
.swatch > [type=checkbox]:checked + label i {
  opacity: 1;
  transition: opacity 0.5s;
}
</style>
</head>

<body>

<div class="body-wrapper">

 
 <?php $this->load->view('home/header'); ?> 
<br><br><br><br>
    <!-- SHOPING CART AREA START -->
    <div class="liton__shoping-cart-area mb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
<div id="cart">

 <?php $this->load->view('home/loadcart'); ?> 

</div>


                    
                </div>
            </div>
        </div>
    </div>
    <!-- SHOPING CART AREA END -->

    <!-- FOOTER AREA START -->
     <?php $this->load->view('home/footer'); ?> 
    <!-- FOOTER AREA END -->

</div>
<!-- Body main wrapper end -->

    <!-- All JS Plugins -->
    <script src="<?php echo base_url()?>assets/home_assets/js/plugins.js"></script>
    <!-- Main JS -->
    <script src="<?php echo base_url()?>assets/home_assets/js/main.js"></script>

       <script type="text/javascript">
                        
        
// $(document).on('input propertychange paste', '.loadqty', function(){
     
 $(document).ready(function(){

     $('.loadqty .qtybutton').click(function(e) {  

        
  
  var id=$(this).closest('.loadqty').attr('data-id');;
  var res = id.split("_")[1];
    
//var res = $id ;
$quantity = $('#qty_'+res).val() ;
$rowid = $('#qty_'+res).data('rowid');
$price = $('#qty_'+res).data('price');

 
 $.ajax({ 
type: "POST",
url: "<?php echo base_url(); ?>"+'home/update_cart',
data: {qty:$quantity,rowid:$rowid,price:$price,viewname:'viewcart'},
}).done(function(response){
 
 $("#cart").html(response); 
 cartupdate();
});     

});
     });
    </script>
  
</body>


</html>

