


<script src="<?php echo base_url() ?>assets/scripts/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/scripts/modernizr.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugin/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugin/nprogress/nprogress.js"></script>
<script src="<?php echo base_url() ?>assets/plugin/sweet-alert/sweetalert.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugin/waves/waves.min.js"></script>
<!-- Full Screen Plugin -->
<script src="<?php echo base_url() ?>assets/plugin/fullscreen/jquery.fullscreen-min.js"></script>

<!-- Google Chart -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<!-- chart.js Chart -->
<script src="<?php echo base_url() ?>assets/plugin/chart/chartjs/Chart.bundle.min.js"></script>
<script src="<?php echo base_url() ?>assets/scripts/chart.chartjs.init.min.js"></script>

<!-- FullCalendar -->
<script src="<?php echo base_url() ?>assets/plugin/moment/moment.js"></script>
<script src="<?php echo base_url() ?>assets/plugin/fullcalendar/fullcalendar.min.js"></script>
<script src="<?php echo base_url() ?>assets/scripts/fullcalendar.init.js"></script>

<!-- Sparkline Chart -->
<script src="<?php echo base_url() ?>assets/plugin/chart/sparkline/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url() ?>assets/scripts/chart.sparkline.init.min.js"></script>

<script src="<?php echo base_url() ?>assets/scripts/main.min.js"></script>
<script src="<?php echo base_url() ?>assets/color-switcher/color-switcher.min.js"></script>

<script src="<?php echo base_url();?>assets/plugin/select2/js/select2.min.js"></script>

<script src="<?php echo base_url();?>assets/plugin/multiselect/multiselect.min.js"></script>
<script src="<?php echo base_url();?>assets/scripts/form.demo.min.js"></script>


<!-- Data Tables -->
<script type="text/javascript" src="<?php echo base_url();?>assets/plugin/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/plugin/datatables/media/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/plugin/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url();?>assets/plugin/datatables/extensions/Responsive/js/responsive.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/datatables.demo.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/toastr/toastr.min.js"></script> 
<script type="text/javascript">
$(document).ready(function(){
    toastr.options.closeButton = true;
    toastr.options.progressBar = true;
    toastr.options.timeOut = 3000;
    toastr.options.preventDuplicates = true;
    toastr.options.positionClass = "toast-top-center";
    var site_url = '<?php echo site_url(); ?>';
});
</script>

 
<script type="text/javascript">
 $('#language').on("click",function(){

    $.ajax({ 
        type: "POST",
          url : "<?php echo base_url(); ?>admin/changelanguage",
            
 
    }).done(function(response){
location.reload() ;
       
    });

})

     </script>


     <script type="text/javascript">
          $(document).ready(function() 
 { 
$(".navigation .menu li a").click(function(){


if($(this).hasClass("parent-item")){
       // alert('yes parent');
        localStorage.setItem("clicked",  $(this).parent().attr("id"));


    }else  {

         localStorage.setItem("clicked",  'sub_'+ $(this).parent().attr("id"));

  
        }

     

});
var active = localStorage.getItem("clicked") || "home";//<default


var element = active.split('_');

var eId1 = element[1];
var eId2 = element[2];
 
if (typeof eId2 !== 'undefined'){

$(".navigation .menu li").each(function(){
$("this").removeClass("active");
});
//$('#'+eId1+'_'+eId2).parent().parent().addClass("active");
var elemid = $('#'+eId1+'_'+eId2).parent().parent().attr("id");
$('#'+eId1+'_'+eId2).addClass("active");

$("#"+elemid).addClass("active");

$('#'+eId1+'_'+eId2).parent().css('display','block');
 
}else if (typeof eId1 !== 'undefined'){

     
var elemid = $('#'+eId1).attr("id");

$(".navigation .menu li").each(function(){
$("this").removeClass("active");
});
$("#"+elemid).addClass("active");
$("#"+elemid).find('ul').css('display','block');


}else{

  //  active = eId1 ;
$(".navigation .menu li").each(function(){
$("this").removeClass("active");
});
$("#"+active).addClass("active");
$("#"+active).find('ul').css('display','block');
}


 
 });
</script> 


<script type="text/javascript">

function deleteentry($id,$table){

$.ajax({ 
type: "POST",
url: "<?php echo base_url(); ?>"+'admin/delete_entry/',
data: {id:$id,table:$table},
}).done(function(response){

location.reload();

});

}

 
function change_status($id,$status,$table){
 
$.ajax({ 
type: "POST",
url: "<?php echo base_url(); ?>"+'admin/change_status/',
data: {id:$id,status:$status,table:$table},
}).done(function(response){

location.reload();

});

}

</script>

</html>