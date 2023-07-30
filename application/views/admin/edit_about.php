 <?php $this->load->view('admin/header');?>
<body>
<?php $this->load->view('admin/top_header');?>
<?php $this->load->view('admin/side_header');?>

<!--  TinyMCE   -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugin/tinymce/skins/lightgray/skin.min.css">
<!--    Must include this script FIRST  -->
  <script src="<?php echo base_url(); ?>assets/plugin/tinymce/tinymce.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />

<?php $session = $this->session->userdata('userdet');?>


 
 <div id="wrapper">
<div class="main-content">
<div class="row small-spacing">

  <div class="box-content card white">
<div class="box-title row">
    <div class='col-md-4'><h4>About Page</h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
          
    </div>
</div>




  <div class="card-content">


     
         <?php $attributes = array('name' => 'edit_driver', 'id' => 'xin-form', 'autocomplete' => 'off');?>
        <?php $hidden = array('_user' => $session['user_id']);?>
        <?php echo form_open('admin/update_about', $attributes, $hidden);?>
        <div class="form-body">


        <div class="col-md-12">

<div class="box-title row">
    <div class='col-md-4'><h4><b>Section 1 - Content</b></h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
          
    </div>
</div>


 <div class="table-responsive">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
      <tr>
<th>No.</th>
<!-- <th>User Id</th> -->
<th> Logo</th>
<th> Title</th>
<th> Title - arabic</th>
   
 
<th> Action </th>
</tr>
      
</thead>
<tbody>
<?php 

foreach ($corporate as $value) {
  ?>
 <tr>
<td><?php echo $value['id'] ?></td>
<!-- <th>User Id</th> -->
<td> 
  <img   class="img-thumb" src="<?php echo base_url()?>uploads/images/<?php echo $value['logo'] ?>" style="height:50px !important;width:50px !important;"  >  

</td>
<td><?php echo $value['title'] ;  ?></td>
<td><?php echo $value['title_ar'] ;  ?></td>
    
<td> 
<a href="<?php echo base_url()?>admin/edit_value/<?php echo $value['id']?>">&nbsp;&nbsp;<button type="button" class="btn btn-info btn-circle btn-xs waves-effect waves-light"><i class="ico fa fa-pencil"></i></button></a>
</td>
</tr>

  <?php
} ?>
  

</tbody>
    
    </table>
</div>
</div>
 
 

  
<div class="box-title row">
    <div class='col-md-4'><h4><b>Section 2</b></h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
          
    </div>
</div>

<div class="row">
 


<div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Section 2 - Title</label>
                    <input type="text" class="form-control"  value="<?php echo $data->sec2_title ?>" type="text" name="sec2_title" >
                    
                  </div>
                </div>

                   <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Section 2 - Title - Arabic</label>
                    <input type="text" class="form-control"  value="<?php echo $data->sec2_title_ar ?>" type="text" name="sec2_title_ar" >
                   </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Section 2 - Content</label>
                    <textarea class="form-control"  type="text" name="sec2_content"><?php echo $data->sec2_content1 ?></textarea>
                  </div>
                </div>

                   <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Section 2 - Content - Arabic</label>
                    <textarea class="form-control"  type="text" name="sec2_content_ar"><?php echo $data->sec2_content1_ar ?></textarea>
                  </div>
                </div>

                


                <div class="col-md-6">
 <div class="form-group">
                  
                     
                      <label for="first_name">Section 2 - Image</label>
 
                      <input type="file" id="image1" name="sec2_image" onchange="readURL1(this);" class="form-control " >
                      <small>Select files only: gif,png,jpg,jpeg</small>

     
      <input type="hidden" name="sec2_old_image" id="sec2_old_image" value="<?php echo $data->sec2_image ;?>">
</div>
</div>
<div class="col-md-6">
 <div class="form-group">
  
       <?php if($data->sec2_image!='' && $data->sec2_image!='no file') {?>
                        <img   class="img-thumb" src="<?php echo base_url().'uploads/images/about/'.$data->sec2_image;?>" style="height:100px !important;width:100px !important; " id="img1">
                        
                          

                        
                        <?php } else {?>
                        <img   class="img-thumb" src=""   id="img1">  
                    
                        <?php } ?>
                 </div> 
                </div>
  

                </div>
                <div class="row">

<div class="box-title row">
    <div class='col-md-4'><h4><b> Section 3 </b></h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
          
    </div>
</div>

                <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Section 3 - Title 1</label>
                   <input class="form-control"  type="text" name="sec3_title1" value="<?php echo $data->sec3_title1 ?>" >
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Section 3 Title 1 - Arabic</label>
                   <input class="form-control"  type="text" name="sec3_title1_ar" value="<?php echo $data->sec3_title1_ar ?>" >
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Section 3 - Title 2</label>
                   <input class="form-control"  type="text" name="sec3_title2" value="<?php echo $data->sec3_title2 ?>" >
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Section 3 Title 2 - Arabic</label>
                   <input class="form-control"  type="text" name="sec3_title2_ar" value="<?php echo $data->sec3_title2_ar ?>" >
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Section 3 - Content 1</label>
                    <textarea class="form-control"  type="text" name="sec3_content1"><?php echo $data->sec3_content1 ?></textarea>
                  </div>
                </div>

                   <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Section 3 -  Content 1- Arabic</label>
                    <textarea class="form-control"  type="text" name="sec3_content1_ar"><?php echo $data->sec3_content1_ar ?></textarea>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Section 3 - Content 2</label>
                    <textarea class="form-control"  type="text" name="sec3_content2"><?php echo $data->sec3_content2 ?></textarea>
                  </div>
                </div>

                   <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Section 3 -  Content 2- Arabic</label>
                    <textarea class="form-control"  type="text" name="sec3_content2_ar"><?php echo $data->sec3_content2_ar ?></textarea>
                  </div>
                </div>

                

                 

                    

                 <div class="col-md-6">
 <div class="form-group">
                  
                     
                      <label for="first_name">Section 3 - Image</label>
 
                      <input type="file" id="image2" name="sec3_image" onchange="readURL1(this);" class="form-control " >
                      <small>Select files only: gif,png,jpg,jpeg</small>

     
      <input type="hidden" name="sec3_old_image" id="sec3_old_image" value="<?php echo $data->sec3_image ;?>">
</div>
</div>
<div class="col-md-6">
 <div class="form-group">
  
       <?php if($data->sec3_image!='' && $data->sec3_image!='no file') {?>
                        <img   class="img-thumb" src="<?php echo base_url().'uploads/images/about/'.$data->sec3_image;?>" style="height:100px !important;width:100px !important; " id="img1">
                        
                          

                        
                        <?php } else {?>
                        <img   class="img-thumb" src=""   id="img2">  
                    
                        <?php } ?>
                 </div> 
                </div>

 
      


</div>
                <div class="row">

<div class="box-title row">
    <div class='col-md-4'><h4><b> Section 4 </b></h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
          
    </div>
</div>

    <div class="col-md-6">
 <div class="form-group">
                  
                     
                      <label for="first_name">Section 4 - Image</label>
 
                      <input type="file" id="image3" name="sec4_image" onchange="readURL1(this);" class="form-control " >
                      <small>Select files only: gif,png,jpg,jpeg</small>

     
      <input type="hidden" name="sec4_old_image" id="sec4_old_image" value="<?php echo $data->sec4_image ;?>">
</div>
</div>
<div class="col-md-6">
 <div class="form-group">
  
       <?php if($data->sec4_image!='' && $data->sec4_image!='no file') {?>
                        <img   class="img-thumb" src="<?php echo base_url().'uploads/images/about/'.$data->sec4_image;?>" style="height:100px !important;width:100px !important; " id="img2">
                        
                          

                        
                        <?php } else {?>
                        <img   class="img-thumb" src=""   id="img3">  
                    
                        <?php } ?>
                 </div> 
                </div>


 
 

                </div>
                <div class="row">

<div class="box-title row">
    <div class='col-md-4'><h4><b> Section 5 </b></h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
          
    </div>
</div>



<div class="col-md-6">
 <div class="form-group">
                  
                     
                      <label for="first_name">Section 5 - Image</label>
 
                      <input type="file" id="image4" name="sec5_image" onchange="readURL4(this);" class="form-control " >
                      <small>Select files only: gif,png,jpg,jpeg</small>

     
      <input type="hidden" name="sec5_old_image" id="sec5_old_image" value="<?php echo $data->sec5_image ;?>">
</div>
</div>
<div class="col-md-6">
 <div class="form-group">
  
       <?php if($data->sec5_image!='' && $data->sec5_image!='no file') {?>
                        <img   class="img-thumb" src="<?php echo base_url().'uploads/images/about/'.$data->sec5_image;?>" style="height:100px !important;width:100px !important; " id="img2">
                        
                          

                        
                        <?php } else {?>
                        <img   class="img-thumb" src=""   id="img4">  
                    
                        <?php } ?>
                 </div> 
                </div>



                
                


            </div>

                </div>
                
                  
        
                
        
            
           
        </div>
        <div class="form-actions"> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => 'btn btn-primary btn-block', 'content' => '<i class="fa fa fa-check-square-o"></i>'.$this->Admin_model->translate("Save"))); ?> </div>
        <?php echo form_close(); ?> </div>

</div>
</div>
</div>
</body>


<!-- ================================================== -->
 <?php $this->load->view('admin/footer');?>




 <script type="text/javascript">
   
 image1.onchange = evt => {
  const [file] = image1.files
  if (file) {
    img1.src = URL.createObjectURL(file);
      $("#img1").attr('style',"height:100px !important;width:100px !important; ") ;
 

  }
}

image2.onchange = evt => {
  const [file] = image2.files
  if (file) {
    img2.src = URL.createObjectURL(file);
      $("#img2").attr('style',"height:100px !important;width:100px !important;  ") ;
  

  }
}

 image3.onchange = evt => {
  const [file] = image3.files
  if (file) {
    img3.src = URL.createObjectURL(file);
      $("#img3").attr('style',"height:100px !important;width:100px !important;  ") ;
  

  }
}

</script>
 


<script type="text/javascript">
  /* Add data */ /*Form Submit*/



  $(document).ready(function(){

  
   tinyMCE.triggerSave();

  /* Add data */ /*Form Submit*/
  $("#xin-form").submit(function(e){
    var fd = new FormData(this);
    var obj = $(this), action = obj.attr('name');
    fd.append("is_ajax", 1);
   
    fd.append("form", action);
    e.preventDefault();
    $('.save').prop('disabled', true);
    
    $.ajax({
      url: e.target.action,
      type: "POST",
      data:  fd,
      contentType: false,
      cache: false,
      processData:false,
      success: function(JSON)
      {
        if (JSON.error != '') {
        toastr.error(JSON.error);
        $('.save').prop('disabled', false);
 
          window.location.href="<?php echo base_url();?>admin/about";
        

        
        } else {
        toastr.success(JSON.result);
        $('.save').prop('disabled', false);
       location.reload();
        }
      },
      error: function() 
      {
        toastr.error(JSON.error);
       
        $('.save').prop('disabled', false);
      }           
     });
  });

  });
 
</script>

 