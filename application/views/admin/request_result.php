<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.bootstrap4.min.css">


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
<td><a href="javascript:void(0)"> <button type="button" class="btn btn-primary  btn-xs waves-effect waves-light status_update" data-orderid="<?php echo $value['id'] ?>" ><i class="fa fa-edit"></i> Status Update</button></a></td>
 
</tr>

  <?php
} ?>
  

</tbody>
    
    </table>
</div>



 
<!--  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script> -->



    
<script>
    // $(document).ready(function() {
    //     var table = $('#example').DataTable( {
    //         dom:  "<<'col-sm-12'B>>"+"<'row'<'col-sm-4 pull-right'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-5'i><'col-sm-7'p>>",
    // "buttons": ['csv', 'excel', 'pdf', 'print']

    //       //  buttons: [ 'copy', 'excel', 'csv', 'pdf' ]
    //     } );
     
    //     table.buttons().container()
    //         .appendTo( '#example_wrapper .col-md-6:eq(0)' );
    // });
     </script>

     <script type="text/javascript">
    $(document).ready( function() {
    $( '#example' ).DataTable( {
            lengthChange: false,
            buttons: [ 'copy', 'excel', 'csv', 'pdf' ],
            "bDestroy": true,
            "paging":   true,
            "ordering": false,
            stateSave: true
 } );

    $( '#example' ).buttons().container()
              .appendTo( '#example_wrapper .col-md-6:eq(0)' );
      });

 
 </script>
 
 



 




