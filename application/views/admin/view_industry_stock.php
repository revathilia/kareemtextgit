  
<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">  View Stock History</h4>
      </div>
      <div class="modal-body">

  <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
      <tr>
<th><?php echo $this->Admin_model->translate("No") ?></th>
<!-- <th>User Id</th> -->
<th><?php echo $this->Admin_model->translate("Product Name") ?></th> 
<th><?php echo $this->Admin_model->translate("Type") ?></th>
<th><?php echo $this->Admin_model->translate("Qty") ?></th>
<th><?php echo $this->Admin_model->translate("Created On") ?></th> 
</tr>
      
</thead>
<tbody>
<?php $i = 0 ; foreach ($products as $value) {
  $i++ ;
  ?>
 <tr>
<td><?php echo $i ?></td>
<!-- <th>User Id</th> -->
<td><?php echo $this->Admin_model->get_type_name_by_id('industry_products','id',$value['product_id'],'product_name') ?>  (<?php echo $this->Admin_model->get_type_name_by_id('size_master','id',$value['size'],'size') ?>, <?php echo $this->Admin_model->get_type_name_by_id('color_master','id',$value['color'],'color_name') ?>)</td>
<td><?php echo ucfirst($value['type']) ?></td> 
<td><?php echo $value['quantity'] ?></td> 
<td><?php echo date("d-m-Y", strtotime($value['created_on'])); ?></td> 
  
</tr>

  <?php
} ?>
  

</tbody>
    
    </table>
</div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">



<?php echo $this->Admin_model->translate("Close") ?></button>
    
      </div>

        
 