<div class="fixed-navbar">
<div class="pull-left">
<button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
<!-- <h1 class="page-title">Home</h1> -->
<!-- /.page-title -->
</div>
<!-- /.pull-left -->
<div class="pull-right">
<div class="ico-item "><a href="javascript:void(0)"  >
 <?php  $session = $this->session->userdata('superadmindet');
if(!empty($session)){
	echo "Logged in as ".$session['username'];
}
 	  ?> </a>
 	 
 	
 </div>
<?php 


$sql= "SELECT count(id) as ct FROM notification ";

$query= $this->db->query($sql)->row();
?>
<input type="hidden" name="currentorder" id="currentorder" value="<?php echo  $query->ct?>">

 

<!--   <a href="#" class="ico-item" ><span class="ico-item fa fa-bell notice-alarm js__toggle_open" data-target="#notification-popup"   ></span><span id = "neworder" class="badge"><?php echo $query->ct?></span></a> -->


  
  <a href="#" class="ico-item"><span class="ico-item fa fa-bell js__toggle_open" data-target="#notification-popup" onclick="notifications()" style="font-size: 20px;color: #A5A5A5;"></span><span id = "neworder" class="badge"><?php echo $query->ct?></span></a>


<?php $session = $this->session->userdata('lang');
if(!empty($session)){
	 if($session == 'eng'){
    $change = 'ar' ;
   }else{
    $change = 'eng' ;
   }
}
 	  ?>


 <div class="ico-item "><a href="javascript:void(0)" data-change="<?php echo $change ; ?>" class = "language" id="language"><i class="fa fa-language"></i></a>
 	
 	
 </div>



<!-- /.ico-item -->
<!-- <div class="ico-item fa fa-arrows-alt js__full_screen"></div> -->
<!-- /.ico-item fa fa-fa-arrows-alt -->

<!-- /.ico-item -->

<div class="ico-item "><i class="ico mdi mdi-logout"></i>
<!-- <img src="assets/images/logout.png" alt="" class="ico-img"> -->
<ul class="sub-ico-item">

<li><a  href="<?php echo base_url()?>admin/logout"><?php echo $this->Admin_model->translate("Log Out") ?></a></li>
</ul>
<!-- /.sub-ico-item -->
</div>
<!-- /.ico-item -->
</div>
<!-- /.pull-right -->
</div>
<!-- /.fixed-navbar -->

<div id="notification-popup" class="notice-popup js__toggle" data-space="50">
 
</div>
<!-- /#notification-popup -->


<script type="text/javascript">
	 /* The data param is in case you want to pass some param */
var mySynFunc = () => {
 


    $.ajax({ 
        type: "POST",
          url : '<?php echo base_url() ?>'+"admin/checkorder",
           
    }).done(function(data){
    //  alert(data)

     if(data == 0)    
     {
     
     } else   
     {
      	$.ajax({ 
                type: "POST",
                url : '<?php echo base_url() ?>'+"admin/listnofy",
                data: {},
                 }).done(function(response){

                 $( "#notification-popup" ).html(response);
  
            });
     }

    });
}

/* This id must be used to stop your function interval */
setInterval(mySynFunc, 10000);


function notifications(){

   // alert("hello");
$.ajax(
{
type: "GET",
url: '<?php echo base_url(); ?>'+'admin/listnofy',
success: function (data) {
//$("#catitem").text(data);
$("#notification-popup").html(data);

},

});
}



</script>