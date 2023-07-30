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
    <div class='col-md-4'><h4>Contact Us</h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
          
    </div>
</div>

 



  <div class="card-content">


     
         <?php $attributes = array('name' => 'edit_driver', 'id' => 'xin-form', 'autocomplete' => 'off');?>
        <?php $hidden = array('_user' => $session['user_id']);?>
        <?php echo form_open('admin/update_contact', $attributes, $hidden);?>
        <div class="form-body">

        <div class="box-title row">
    <div class='col-md-4'><h4><b>Box 1</b></h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
          
    </div>
</div>

<div class="row">
 


<div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Box 1 - Title</label>
                    <input type="text" class="form-control"  value="<?php echo $data->box1_title ?>" type="text" name="box1_title" >
                    
                  </div>
                </div>

                  
                <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Box 1 - Title Arabic</label>
                    <input type="text" class="form-control"  value="<?php echo $data->box1_title_ar ?>" type="text" name="box1_title_ar" >
                    
                  </div>
                </div>
                             
 


                <div class="col-md-6">
 <div class="form-group">
                  
                     
                      <label for="first_name">Box 1 - Icon</label>
 
                      <input type="file" id="image1" name="box1_icon" onchange="readURL1(this);" class="form-control " >
                      <small>Select files only: gif,png,jpg,jpeg</small>

     
      <input type="hidden" name="box1_old_image" id="box1_old_image" value="<?php echo $data->box1_icon ;?>">
</div>
</div>
<div class="col-md-6">
 <div class="form-group">
  
       <?php if($data->box1_icon!='' && $data->box1_icon!='no file') {?>
                        <img   class="img-thumb" src="<?php echo base_url().'uploads/images/about/'.$data->box1_icon;?>" style="height:100px !important;width:100px !important; " id="img1">
                        
                          

                        
                        <?php } else {?>
                        <img   class="img-thumb" src=""   id="img1">  
                    
                        <?php } ?>
                 </div> 
                </div>

                <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Box 1 - Value 1</label>
                    <input type="text" class="form-control"  value="<?php echo $data->box1_value1 ?>" type="text" name="box1_value1" >
                    
                  </div>
                </div>

                  
                <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Box 1 - Value 2 </label>
                    <input type="text" class="form-control"  value="<?php echo $data->box1_value2 ?>" type="text" name="box1_value2" >
                    
                  </div>
                </div>
  

                </div>
 

                <div class="box-title row">
    <div class='col-md-4'><h4><b>Box 2</b></h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
          
    </div>
</div>

<div class="row">
 


<div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Box 2 - Title</label>
                    <input type="text" class="form-control"  value="<?php echo $data->box2_title ?>" type="text" name="box2_title" >
                    
                  </div>
                </div>

                  
                <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Box 2 - Title Arabic</label>
                    <input type="text" class="form-control"  value="<?php echo $data->box2_title_ar ?>" type="text" name="box2_title_ar" >
                    
                  </div>
                </div>
                             
 


                <div class="col-md-6">
 <div class="form-group">
                  
                     
                      <label for="first_name">Box 2 - Icon</label>
 
                      <input type="file" id="image2" name="box2_icon" onchange="readURL2(this);" class="form-control " >
                      <small>Select files only: gif,png,jpg,jpeg</small>

     
      <input type="hidden" name="box2_old_image" id="box2_old_image" value="<?php echo $data->box2_icon ;?>">
</div>
</div>
<div class="col-md-6">
 <div class="form-group">
  
       <?php if($data->box2_icon!='' && $data->box2_icon!='no file') {?>
                        <img   class="img-thumb" src="<?php echo base_url().'uploads/images/about/'.$data->box2_icon;?>" style="height:100px !important;width:100px !important; " id="img1">
                        
                          

                        
                        <?php } else {?>
                        <img   class="img-thumb" src=""   id="img2">  
                    
                        <?php } ?>
                 </div> 
                </div>

                <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Box 1 - Value 1</label>
                    <input type="text" class="form-control"  value="<?php echo $data->box2_value1 ?>" type="text" name="box2_value1" >
                    
                  </div>
                </div>

                  
                <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Box 1 - Value 2 </label>
                    <input type="text" class="form-control"  value="<?php echo $data->box2_value2 ?>" type="text" name="box2_value2" >
                    
                  </div>
                </div>
                        </div>

        
<div class="box-title row">
    <div class='col-md-4'><h4><b>Box 3</b></h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
          
    </div>
</div>

<div class="row">
 


<div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Box 3 - Title</label>
                    <input type="text" class="form-control"  value="<?php echo $data->box3_title ?>" type="text" name="box3_title" >
                    
                  </div>
                </div>

                  
                <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Box 2 - Title Arabic</label>
                    <input type="text" class="form-control"  value="<?php echo $data->box3_title_ar ?>" type="text" name="box3_title_ar" >
                    
                  </div>
                </div>
                             
 


                <div class="col-md-6">
 <div class="form-group">
                  
                     
                      <label for="first_name">Box 2 - Icon</label>
 
                      <input type="file" id="image3" name="box3_icon" onchange="readURL3(this);" class="form-control " >
                      <small>Select files only: gif,png,jpg,jpeg</small>

     
      <input type="hidden" name="box3_old_image" id="box3_old_image" value="<?php echo $data->box3_icon ;?>">
</div>
</div>
<div class="col-md-6">
 <div class="form-group">
  
       <?php if($data->box3_icon!='' && $data->box3_icon!='no file') {?>
                        <img   class="img-thumb" src="<?php echo base_url().'uploads/images/about/'.$data->box3_icon;?>" style="height:100px !important;width:100px !important; " id="img3">
                        
                          

                        
                        <?php } else {?>
                        <img   class="img-thumb" src=""   id="img3">  
                    
                        <?php } ?>
                 </div> 
                </div>

                <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Box 1 - Value 1</label>
                     

                    <textarea class="form-control"    type="text" name="box3_value"  ><?php echo $data->box3_value ?></textarea>
                    
                  </div>
                </div>

                  
              

                

  

                </div>
 
             
              
 

              <div class="form-actions"> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => 'btn btn-primary btn-block', 'content' => '<i class="fa fa fa-check-square-o"></i>'.$this->Admin_model->translate("Save"))); ?> </div>
        <?php echo form_close(); ?> 


               

               
        
            
           
        </div>
        </div>

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
      $("#img2").attr('style',"height:100px !important;width:100px !important; ") ;
 

  }
}

image3.onchange = evt => {
  const [file] = image3.files
  if (file) {
    img3.src = URL.createObjectURL(file);
      $("#img3").attr('style',"height:100px !important;width:100px !important; ") ;
 

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
 
       window.location.href="<?php echo base_url();?>admin/contact";
        

        
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

 