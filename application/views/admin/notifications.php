  <?php   
   $session = $this->session->userdata('superadmindet');


  $this->db->select('id,request_id,service_id,n.title,n.message');
$this->db->from('notification n');

$data = $this->db->get()->result_array();
//echo $this->db->last_query();
  ?>



  
  <h2 class="popup-title">Your Notifications <a href="javascript:void(0)" onclick="delete_notifications();">
          <span class="pull-right" >Clear</span>

         </a> </h2> 
  <!-- /.popup-title -->
  <div class="content">
    <ul class="notice-list">
       
      <?php 
      foreach ($data as  $value) { ?>
        <li onclick="deleteeach(<?php echo $value['id'] ?>,<?php echo $value['service_id'] ?>)" >


<a href="javascript:void(0)">

<?php if($value['service_id'] == 0){ ?>

  
          <span class="name" > <?php echo $value['title'] ?> <i class="fa fa-times-circle" onclick="deleteeach(<?php echo $value['id'] ?>,<?php echo $value['service_id'] ?>)"></i></span>
          <span class="desc" onclick="deleteeach(<?php echo $value['id'] ?>,<?php echo $value['service_id'] ?>)" ><?php echo $value['message'] ?></span>
        
        
<?php }else{ ?>

      
          <span class="name"> <?php echo $value['title'] ?> <i class="fa fa-times-circle" onclick="deleteeach(<?php echo $value['id'] ?>,<?php echo $value['service_id'] ?>)"></i></span>
          <span class="desc" onclick="deleteeach(<?php echo $value['id'] ?>,<?php echo $value['service_id'] ?>)" ><?php echo $value['message'] ?></span>
        
      

<?php } ?>
         
        </a> 
      </li>
   <?php   } ?>
      
       
    
    </ul>
    
  </div>




  <script type="text/javascript"> 

function delete_notifications(){
$.ajax({
type: "POST",
url: "<?php echo base_url(); ?>"+'admin/delete_notifications',

}).done(function(response){

 location.reload();


});
}

function deleteeach(id, serviceid){
 
var id = id;

$.ajax({
type: "POST",
url: "<?php echo base_url(); ?>"+'admin/delete_eachnotifications',
data: {'id': id},
}).done(function(response){

//location.reload();
if(serviceid == 0){

   window.location.href =  '<?php echo base_url()?>admin/reportrequests' ;

}else{
  window.location.href =  '<?php echo base_url()?>admin/requests?id='+serviceid+'&status=new' ;

}


});
}

 

</script>