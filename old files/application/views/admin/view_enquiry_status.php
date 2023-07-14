<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Enquiry Details </h4>
      </div>
      <div class="modal-body">

        <?php if(!empty($enquiry)){ ?>

          <table id="example" class="table table-striped table-bordered" style="width:100%">

  <tr>
    <th>Name</th>
    <td><?php echo $enquiry->name ;?></td>
  </tr>

<tr>
    <th>Email</th>
    <td><?php echo $enquiry->email ;?></td>
  </tr>
<tr>
    <th>Phone</th>
    <td><?php echo $enquiry->phone ;?></td>
  </tr>
<tr>
    <th>Subject</th>
    <td><?php echo $enquiry->subject ;?></td>
  </tr>
<tr>
    <th>Message</th>
    <td><?php echo $enquiry->message ;?></td>
  </tr>
<tr>
    <th>Attachment</th>
    <td> <?php if(!empty($enquiry->attachment)){ ?>

      <a href="<?php echo site_url()?>download?type=images/enquiry&filename=<?php echo  $enquiry->attachment ;?>">Download Attachment <i class="fa fa-download"></i></a>

   <?php } ?></td>
  </tr>
<tr>
    <th>Created Date</th>
    <td><?php echo date('d-m-Y H:i', strtotime($enquiry->created_on)) ;?></td>
  </tr>
  
</table>

         
<?php } ?>


         <?php if($history){ ?>

           <h4 class="modal-title" id="myModalLabel">Status Update History</h4>

 <table id="example" class="table table-striped table-bordered" style="width:100%">

  <thead> 
<th>SlNo</th>
<th>Date</th>
<th>Remarks</th>
<th>Status</th>
<th>Updated By</th>
  </thead>
       <?php 

$i = 1 ;
 
       foreach ($history as $value) { ?>
 <tr>
 <td><?php echo $i ; ?></td>
  <td>  <?php echo date("d-m-Y", strtotime($value['created_date'])) ?>
 </td> 
 <td><?php echo $value['remarks'] ; ?></td>
 <td> <?php echo  $this->Admin_model->get_type_name_by_id('enquiry_status','id',$value['status'],'status') ?>
 </td>
 <td><?php echo $this->Admin_model->get_type_name_by_id('users','id', $value['updated_by'],'user_name') ?></td>
</tr>

<?php 

$i++ ;

 }  ?>


 
</table>
<?php 

}else{ 

echo "No history available for this request !!" ;
}

?>
 
 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">



<?php echo $this->Admin_model->translate("Close") ?></button>
    
      </div>
 
    