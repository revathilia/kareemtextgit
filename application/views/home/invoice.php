
<!DOCTYPE html>
<html lang="en" >
<head>
<meta charset="UTF-8">
<title>Invoice</title>



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<link rel="stylesheet" href="assets/css/table.css">


<style>
  @font-face {
  font-family: 'DroidKufi-Regular';
  src: url(assets/DroidKufi-Regular.ttf);
}
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap');

@page {
  bleed: 1cm;
  size: A4 portrait;
      size:  auto ! important;   /* auto is the initial value */
      margin-left: 0mm ! important;  /* this affects the margin in the printer settings */
      margin-bottom: 0mm ! important;
      margin-top: 0mm ! important;
 
}

@media print {
  .page {
    margin: 0 ! important;
    border: initial ! important;
    border-radius: initial ! important;
    width: initial ! important;
    min-height: initial ! important;
    box-shadow: initial ! important;
    background: initial ! important;
    page-break-after: always ! important;
  }
  .table thead.thead th{
   background: #EFC106 ! important;
   border-top: none ! important;

  }
  .sp{
  padding-right: 1rem ! important;
  }
  h5{
  font-size: 14px ! important;
}

h2{
  font-size: 20px ! important;
}

.tax_box{
  border: 1px solid #b1b1b1 ! important;
}
.letter-title2{
border: 1px solid #b1b1b1 ! important;
}
div.letter-title2 .inn{
  border-bottom: 2px solid #b1b1b1 ! important;
}
.sum_box{
  border: 1px solid #b1b1b1 ! important;
    border-right: 0 ! important;
}
}

.arabic_font{
  font-family: 'DroidKufi-Regular' ! important;
  font-size: 14px ! important;
}

.arabic1_font{
  font-family: 'DroidKufi-Regular' ! important;
  font-size: 16px ! important;
}

body {
   /*background: #eee;*/
   font-family: 'Open Sans', sans-serif;
   -webkit-print-color-adjust: exact !important;
}
html[dir="rtl"] body{
    /*background: #eee;*/
    font-family: 'regular';
}
h2{
  font-size: 20px ! important;
  line-height: 1.6 ! important;
  letter-spacing: 0.9px ! important;
  font-weight: 600 ! important;
}

h6{
   font-size: 14px ! important;
  line-height: 1.6 ! important;
  letter-spacing: 0.9px ! important;
  font-weight: 600 ! important;
}

h5{
  font-size: 16px ! important;
  line-height: 1.6 ! important;
  letter-spacing: 0.9px ! important;
  font-weight: 600 ! important;
}
.image{
  max-width: 300px ! important;
}
div.container {
   border-radius: 15px ! important;
   background: white ! important;
   /*box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2) ! important;*/
}

div.invoice-letter{
   width: auto ! important;
   position: relative ! important;
  /* min-height: 150px;*/
   /* background-color: #fff ! important; */
   /*margin-right: -48px;
   margin-left: -48px;*/
   /*box-shadow: 0 4px 3px rgba(0,0,0,0.4);*/
}

div.letter-title{
   margin-top: 5px ! important;
   /*height: 130px;*/
   /*border-right: 2px solid #eee;*/
}
div.letter-title1{
   margin-top: 5px ! important;
  /* height: 130px;*/
   /*border-right: 2px solid #eee;*/
   text-align: right ! important;
}

div.letter-title1 .inn{
  border-bottom: 2px solid #000 ! important;
  margin-top: 5px ! important;
}

div.letter-title1 .inn2{
  border-bottom: 2px solid #000 ! important;
  margin-top: 0 !important;
  background-color: #E0E0E0 ! important;
}

div.letter-title1 .inn2 .lis{
  background-color: #fff ! important;
  text-align: center ! important;
  margin-bottom: 0 ! important;
}
/*
div.letter-title1 .inn h5 span{
  text-align: center;
  padding-left: 80px;
  padding-right: 30px;
}*/

div.bank{
  border: 2px solid #000 ! important;
  padding-left: 5px ! important;
  padding-right: 0 ! important;
}

div.letter-content{
   margin-top: 10px ! important;
}

.table thead.thead th{
   background: #EFC106 ! important;
   border-top: none ! important;
    font-size: 16px ! important;
}
.table>tbody>tr>td{
    font-size: 16px ! important;
}

.table thead th{
  border-bottom: none ! important;
}


/*table.invoice thead tr:first-child th:first-child{
    border-top-left-radius: 25px;
}

table.invoice thead tr:first-child th:last-child{
   border-top-right-radius: 25px;
}*/

/*tr.last-row{
   background-color: rgba(4, 97, 123, 0.2);

}

tr.last-row th{
   border-bottom-left-radius: 25px;
   width: 30px;
}

tr.last-row td{
   border-bottom-right-radius: 25px;
}

div.row div.to{
   height: 260px;
   padding-right: 25px;
   border-right: 2px solid rgba(4, 97, 123, 0.2);
}*/
.table{
  margin-bottom: 5px ! important;
}
.table th,tr{
  text-align: center;
}
.sp{
  padding-right: 1rem ! important;
  }
  .table th{
    padding: 5px 0 5px 0 ! important;
  }

.tax_box{
  border: 1px solid #b1b1b1 ! important;
  padding: 10px 0 5px 0;
  margin: 10px 0;
}
.letter-title2{
  margin-top: 20px !important;
text-align: right !important;
border: 1px solid #b1b1b1 ! important;
}
div.letter-title2 .inn{
  border-bottom: 2px solid #b1b1b1 ! important;
  margin-top: 5px ! important;
}
.sum_box{
  border: 1px solid #b1b1b1 ! important;
  border-right: 0 ! important;
   text-align: center;
  padding: 40px 0;
}

</style>


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
  border: 1px solid #00000029;
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

.shop-car {
    background: #EFEFEF 0% 0% no-repeat padding-box;
    border-radius: 9px;
    opacity: 1;
    padding: 20px;
    width: 100px;
    height: 100px;
}

</style>

</head>
<body>


   <?php 
 
function convert_number($number) 
    {
        if (($number < 0) || ($number > 999999999)) 
        {
            throw new Exception('Number is out of range');
        }
        $giga = floor($number / 1000000);
        // Millions (giga)
        $number -= $giga * 1000000;
        $kilo = floor($number / 1000);
        // Thousands (kilo)
        $number -= $kilo * 1000;
        $hecto = floor($number / 100);
        // Hundreds (hecto)
        $number -= $hecto * 100;
        $deca = floor($number / 10);
        // Tens (deca)
        $n = $number % 10;
        // Ones
        $result = '';
        if ($giga) 
        {
            $result .= $this->convert_number($giga) .  'Million';
        }
        if ($kilo) 
        {
            $result .= (empty($result) ? '' : ' ') .$this->convert_number($kilo) . ' Thousand';
        }
        if ($hecto) 
        {
            $result .= (empty($result) ? '' : ' ') .$this->convert_number($hecto) . ' Hundred';
        }
        $ones = array('', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten', 'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eightteen', 'Nineteen');
        $tens = array('', '', 'Twenty', 'Thirty', 'Fourty', 'Fifty', 'Sixty', 'Seventy', 'Eigthy', 'Ninety');
        if ($deca || $n) {
            if (!empty($result)) 
            {
                $result .= ' and ';
            }
            if ($deca < 2) 
            {
                $result .= $ones[$deca * 10 + $n];
            } else {
                $result .= $tens[$deca];
                if ($n) 
                {
                    $result .= '-' . $ones[$n];
                }
            }
        }
        if (empty($result)) 
        {
            $result = 'zero';
        }
        return $result;
    }
 

?>

<!-- /.main-menu -->

<div id="wrapper">
<div class="main-content">


<div class="container">
  <div class="row" style="margin-top: 20px;">
  <div class="col-md-1">
     <img src="<?php echo base_url()?>assets/home_assets/img/logo.png" class="image" />
  </div>
<!--   <div class="col-md-11" style="text-align:right">
 <img src='<?php echo base_url()?>assets/invoice_assets/lo.png'>  </div> -->
  <div class="col-md-4 offset-8">
    <h2 class="text-center">INVOICE /<span class="arabic_font">فاتورة  </span></h2>
  </div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 pl-5 py-2 letter-title" style="margin-top: 0;">
  <div class="row">
    <div class="col-2"><h5>From</h5></div>
    <div class="col-10"><h5>
    KareemTex <br>   
   <?php echo $address ; ?></h5></div>
  </div>
</div>
<div class="col-6 letter-title1">
<!-- <div class="row">
    <div class="col-10"><h5 class="arabic_font">موسسة الحزمة الصفراء للإتصالات وتقنية المعلومات<br>المملكة العربية السعودية - المنطقة الشرقية -الخبر الشمالية - شارع الملك خالد تقاطع ٨- مبنى رجال الأعمال - الدور الأول - مكتب قم 19</h5></div>
    <div class="col-2"><h5 class="arabic_font">من</h5></div>
  </div> -->
</div>
</div>
</div>

<div class="container-fluid invoice-letter" style="margin-top: -1rem;">
<div class="row">
<div class="col-6 pl-5 py-2 letter-title">
  <div class="row">
    <div class="col-2"><h5>To</h5></div>
    <div class="col-10"><h5>

      <?php $address = json_decode($order->address_details , true); ?>

     <?php echo $address['first_name'] .' '. $address['last_name']  ?> 

     <br>

<?php 


 
echo $address['address_line1'] .' ,'.$address['address_line2'] .'<br>'. 
$address['city'].' ,'. $address['state']   ; ?>
     </h5></div>
 
  </div>
</div>
<div class="col-6 letter-title1">
<!-- <div class="row">
    <div class="col-10"><h5 class="arabic_font">
      شركة ميرك العربية السعودية<br>الخبر ، الشرقية 31952المملكة العربية السعودية      </h5></div>
    <div class="col-2"><h5 class="arabic_font">إلى</h5></div>
  </div> -->
</div>
</div>
</div>
 

 

<div class="container-fluid invoice-letter" style="padding-right:0;">
  <div class="row tax_box">

    <?php  
  
 $prefix = strtoupper( substr($order->type, 0, 2));

 $orderid = str_pad($order->id , 5, "0", STR_PAD_LEFT) ;
  
  ?>

    <div class="col-3"><h5>Order No : </h5></div>
    <div class="col-9"><h5 style="text-align: left;">KT<?php echo $prefix. $orderid ?></h5></div>
  </div>
</div>
<div class="container-fluid invoice-letter" style="padding-right:0;">
  <div class="row tax_box">
    <div class="col-3"><h5>Order Date : </h5></div>
    <div class="col-9"><h5 style="text-align: left;"><?php echo date('d-m-Y', strtotime($order->created_on)) ?></h5></div>
  </div>
</div>

<!-- <div class="row table"> -->
<table class="table table-hover"style="padding:0px; margin-left: 1.5rem" >
<thead class="thead" >
<tr>
<th scope="col">S.No</th>
<th scope="col">ITEM</th>
<th scope="col">DESCRIPTION</th> 
<th scope="col">QTY</th>
 
<th scope="col">PRICE</th>
 
<th scope="col">TOTAL</th>
</tr>
</thead>
<thead class="arabic_font">
<tr>
<th scope="col">الرقم التسلسلي</th>
<th scope="col">القطعة</th>
<th scope="col">الوصف</th>
 
<th scope="col">الكمية</th> 
<th scope="col">السعر</th> 
<th scope="col">الإجمالي </th>
</tr>
</thead>
<tbody>

  <?php 

$orderdet = $this->Admin_model->get_all_data('order_details',array('order_id'=>$order->id)) ;
$c = 0 ;
foreach ($orderdet as  $ovalue) { 
$c++ ; 
   

    $details = json_decode($ovalue['order_details'] , true);
if($order->type  == 'industry'){
  $product = $this->Admin_model->get_single_data('industry_products',array('id'=>$details['id'])) ;


}else{
  $product = $this->Admin_model->get_single_data('school_products',array('id'=>$details['id'])) ;

}

$orderstatus = $this->Admin_model->get_all_data('status_update_history',array('order_id'=>$order->id)) ;

?>

<tr>
<th scope="row"><?php echo $c ;?></th>
<td>
 <img src="<?php echo base_url() ; ?>uploads/images/<?php echo $order->type ?>/<?php echo $product->product_image ?>" class="shop-car">



  </td>
<td >

<h5><?php 
if($this->session->userdata('lang') == 'ar'){
     echo $product->ar_product_name ;
}else{
     echo $product->product_name ;
}  ?>
                                                    </h5>
<p><?php echo $this->Admin_model->translate("Model") ; ?>: <?php echo $product->product_code ; ?></p>

 <?php echo $this->Admin_model->get_type_name_by_id('size_master','id',$details['size'],'size') ?>,
<?php if($order->type == 'industry'){ ?>

<div class="swatch" style="background:<?php echo $this->Admin_model->get_type_name_by_id('color_master','id',$details['color'],'color_code')  ?>;color:#fff;">
  <input type="radio" name="color_selected" checked id="swatch_<?php echo $details['color'] ?>" value="<?php echo $details['color'] ?>" />
  <label for="swatch_<?php echo $details['color'] ?>" title="<?php echo $this->Admin_model->get_type_name_by_id('color_master','id',$details['color'],'color_name')  ?>"></label>
</div>

<?php }else{ ?>

 

<?php } ?> <?php echo $this->Admin_model->get_type_name_by_id('genders','id',$details['gender'],'gender_name') ?> 

  </td>
 
<td><?php echo $details['qty'] ?></td>
 
<td><?php echo $details['price'] ?><span class="arabic_font">﷼</span> </td>
 
<td><?php


 echo $details['subtotal'] ?><span class="arabic_font">﷼</span> </td>
</tr>


 <?php } ?> 

 
</tbody>
</table>
<!-- </div> -->
 

<table class="table">
                                <tbody>
                                    <tr>


                                      


                                       
                                        <td> Subtotal</td>
                                        <td>SAR  <?php echo $order->sub_total ?> </td>
                                    </tr>
                                    <tr>
                                        <td>Shipping and Handling </td>
                                        <td>SAR  <?php echo $order->shipping_charge ?></td>
                                    </tr>

                                    

                                    <tr>
                                        <td>VAT </td>
                                        <td>SAR  <?php echo $order->vat_amount ?></td>
                                    </tr>

                                     <tr>
                                        <td>Discount </td>
                                        <td>SAR  <?php echo $order->discount ?></td>
                                    </tr>

                                                                        <tr>
                                        <td><strong>Order Total </strong></td>

                                         
                                        <td><strong>SAR  <?php echo $order->total_amount ?></strong></td>
                                    </tr>
                                </tbody>
                            </table>


<div class="container-fluid invoice-letter" style="margin-left: 2rem;">
<div class="row">
<div class="col-3 pl-5 letter-title">
</div>
<div class="col-9 letter-title1">
 <div class="row">
    <div class="col-3"><h5>Total Amount:</h5></div>
        <div class="col-6"><h5>
         
          <strong>SAR  <?php echo $order->total_amount   ?></strong>

        </h5></div>
  </div>
</div>
</div>
</div>


<div class="container-fluid invoice-letter pt-3" style="margin-left: 2rem;">
 

<p class="text-center mt-3">This is System Generated Report. No signature required.</p>

</div>
<!-- /.row small-spacing -->   
</div>
</div>
<!-- /.main-content -->
</div>
<script src="assets/scripts/jquery.min.js"></script>






</body>

</html>

