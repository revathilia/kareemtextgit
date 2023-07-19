 <?php $this->load->view('admin/header');?>
<body>
<?php $this->load->view('admin/top_header');?>
<?php $this->load->view('admin/side_header');?>


<div id="wrapper">
<div class="main-content">
<div class="row small-spacing">
<div class="col-xs-12">
     <div class="box-content card white">
<div class="box-title row">
    <div class='col-md-4'><h4>News</h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
         
    </div>
</div>

 
 
<div class="box-content">

  <div class="box-title row">
    <div class='col-md-4'><h4> </h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
         <a href="<?php echo base_url(); ?>admin/new_news"><button class="btn btn-warning"> Add New</button></a> 
 
    </div>
</div>


 <div class="table-responsive">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
       <thead>
                                                              <tr>
                                                                <th width="10%">Sl.No</th>
                                                                <th width="15%">Heading</th>
                                                                <th width="10%">Content</th>
                                                                <th width="40%">Date</th>
                                                                <th width="15%">Creation Date</th>
                                                                <th width="10%">Actions</th>
                                                              </tr>
                                                              </thead>
                                                              <tbody>
                                                                <?php  
                                                                $i= 1 ;
                                                                foreach ($news as $value) { ?>
                                                                  <tr>
                                                               <td width="10%"><?php echo $i ?></td>
                                                                <td width="15%"><?php echo $value['title']?></td>
                                                                <td width="10%"><?php echo $value['content']?></td>
                                                                <td width="40%"><?php echo $value['date']?></td>
                                                                <td width="15%"><?php echo $value['created_on']?></td>
                                                                <td width="10%"><a href="<?php echo base_url()?>admin/editnews/<?php echo $value['id'] ?>">&nbsp;&nbsp;<button type="button" class="btn btn-info btn-circle btn-xs waves-effect waves-light"><i class="ico fa fa-pencil"></i></button></a><a href="javascript:void(0)">&nbsp;&nbsp;<button type="button" class="btn btn-danger btn-circle btn-xs waves-effect waves-light delete" onclick="deleteentry(<?php echo $value['id'] ?>);  return false ;" ><i class="ico fa fa-trash"></i></button></a></td>
                                                            </tr>
                                                              <?php
                                                              $i++ ;  } ?>
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
</body>


 <?php $this->load->view('admin/footer');?>

 
  <script type="text/javascript">
   function statusupdate($id,$status){

 

var xin_table = $('#xin_table').dataTable();

$.ajax({ 
type: "POST",
url: "<?php echo base_url(); ?>"+'admin/change_status/',
data: {id:$id,status:$status,table:'client_logos'},
}).done(function(response){

location.reload();
//xin_table.api().ajax.reload();

});

}


 function deleteentry($id){

var xin_table = $('#xin_table').dataTable();

$.ajax({ 
type: "POST",
url: "<?php echo base_url(); ?>"+'admin/delete_entry/',
data: {id:$id,table:'news_and_events'},
}).done(function(response){

location.reload();
//xin_table.api().ajax.reload();

});

}
 </script>