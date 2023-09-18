 <?php $this->load->view('admin/header');?>

 
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
</style>

<body>
<?php $this->load->view('admin/top_header');?>
<?php $this->load->view('admin/side_header');?>


<div id="wrapper">
<div class="main-content">
<div class="row small-spacing">
<div class="col-xs-12">
     <div class="box-content card white">
<div class="box-title row">
    <div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Order List") ?></h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
        
 
    </div>
</div>

 
<div class="box-content">
 <div class="table-responsive">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
      <tr>
<th><?php echo $this->Admin_model->translate("No") ?></th>
<th><?php echo $this->Admin_model->translate("Created On") ?></th> 
<th><?php echo $this->Admin_model->translate("Product & Specifications") ?></th> 
<th><?php echo $this->Admin_model->translate("Customer Details") ?></th>   
<th><?php echo $this->Admin_model->translate("Total Amount") ?></th>
<th><?php echo $this->Admin_model->translate("Status") ?></th>

 
 
<th><?php echo $this->Admin_model->translate("Action") ?></th>
</tr>
      
</thead>
<tbody>
<?php $i=0 ; foreach ($orders as $value) {
  $i++ ;
 $color  = '' ;
  if($value['include_logo']  != 0 ){
    $color = '#fa972d' ;
  }
  ?>
 <tr style="background-color: <?php echo $color ;?>">
<td><?php echo $i  ?></td>
<td><?php echo date('d-m-Y', strtotime($value['created_on'])) ?></td>
 
<td><?php 

$orderdet = $this->Admin_model->get_all_data('order_details',array('order_id'=>$value['id'])) ;

foreach ($orderdet as  $ovalue) {  
   $details = json_decode($ovalue['order_details'], true);

   echo $details['name'].'<br>' ; ?>


<small><?php echo $this->Admin_model->get_type_name_by_id('size_master','id',$details['size'],'size') ?>,
<?php if($value['type']== 'industry'){ ?>

<div class="swatch" style="background:<?php echo $this->Admin_model->get_type_name_by_id('color_master','id',$details['color'],'color_code')  ?>;color:#fff;">
  <input type="radio" name="color_selected" checked id="swatch_<?php echo $details['color'] ?>" value="<?php echo $details['color'] ?>" />
  <label for="swatch_<?php echo $details['color'] ?>" title="<?php echo $this->Admin_model->get_type_name_by_id('color_master','id',$details['color'],'color_name')  ?>"></label>
</div>

<?php }else{ ?>

 

<?php } ?> <?php echo $this->Admin_model->get_type_name_by_id('genders','id',$details['gender'],'gender_name') ?></small>, <?php echo $details['qty'] ?> No.s  <hr> 


<?php }  
 
 ?></td>
<td><?php 

 

$address = json_decode($value['address_details'], true);
 
echo $address['first_name'].' '.$address['last_name'] .'<br>' ?>
<?php echo $address['phone_no'] ?></td>

 
 
<td><?php echo 'SAR '. $value['total_amount'] ?></td>
<td><?php echo $this->Admin_model->get_type_name_by_id('order_status','id',$value['order_status'],'status_name') ?></td>
<td><a href="javascript:void(0)"> <button type="button" class="btn btn-primary  btn-xs waves-effect waves-light status_update" data-orderid="<?php echo $value['id'] ?>" ><i class="fa fa-edit"></i> Status Update</button></a>

<a href="<?php echo base_url()?>admin/invoice/<?php echo $value['id'] ?>" target="_blank"> <button type="button" class="btn btn-success  btn-xs waves-effect waves-light " data-orderid="<?php echo $value['id'] ?>" ><i class="fa fa-eye"></i> Invoice</button></a>

</td>
 
</tr>

  <?php
} ?>
  

</tbody>
    
    </table>
</div>


<!-- /.box-content -->
</div>
<!-- /.col-lg-6 col-xs-12 -->
</div>
</div>


</div>
</div>
</div>

<div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" id="requestid">
      
    </div>
  </div>
</div>


</body>


 <?php $this->load->view('admin/footer');?>

<script>
      function statusupdate($id,$status){

 
$.ajax({ 
type: "POST",
url: "<?php echo base_url(); ?>"+'admin/change_status/',
data: {id:$id,status:$status,table:'industry_products'},
}).done(function(response){

 if(response=='false'){
   toastr.error("Access denied");
 }

location.reload();

});

}

$(document).on('click', '.status_update', function(){  
var orderid = $(this).data("orderid")  ;

 
if(orderid != '')  
{  
$.ajax({  
url:"<?php echo base_url() ?>admin/order_status",  
method:"POST",  
data:{orderid:orderid },  
success:function(data){ 

$('#requestid').html(data);  
$('#dataModal').modal('show');
}  
});  
}            
});


</script>