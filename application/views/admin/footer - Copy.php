


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

    var change = $(this).data('change');

    $.ajax({ 
        type: "POST",
          url : "<?php echo base_url(); ?>admin/changelanguage",
          data : {lang:change},
            
 
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

<!-- <script type="text/javascript">
   $(document).ready( function() {
  $( '#example' ).dataTable( {
            lengthChange: false,
            buttons: [ 'copy', 'excel', 'csv', 'pdf' ],
            "bDestroy": true,
            "paging":   true,
            "ordering": false,
            stateSave: true
 } );
 } );
 </script> -->

<!--  
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
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
    //     var table = $('#example3').DataTable( {
    //           dom:  "<<'col-sm-12'B>>"+"<'row'<'col-sm-4 pull-right'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	// 	"buttons": ['csv', 'excel', 'pdf', 'print'],
    //     stateSave: true

    //       //  buttons: [ 'copy', 'excel', 'csv', 'pdf' ]
    //     } );
     
    //     table.buttons().container()
    //         .appendTo( '#example3_wrapper .col-md-6:eq(0)' );
    // });
     </script>
<!-- <script>
 

   $(document).ready( function() {
  $( '#example' ).dataTable( {
            lengthChange: false,
            buttons: [ 'copy', 'excel', 'csv', 'pdf' ],
            "bDestroy": true,
            "paging":   true,
            "ordering": false,
            stateSave: true
 } );
 } );

</script> -->


</html>