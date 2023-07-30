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
    <div class='col-md-4'><h4>Footer Section</h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
          
    </div>
</div>




  <div class="card-content">


     
         <?php $attributes = array('name' => 'edit_driver', 'id' => 'xin-form', 'autocomplete' => 'off');?>
        <?php $hidden = array('_user' => $session['user_id']);?>
        <?php echo form_open('admin/update_footer', $attributes, $hidden);?>
        <div class="form-body">

 
 
              <div class="row">

                 <div class="col-md-6">
 <div class="form-group">
                  
                     
                      <label for="first_name">Logo</label>
 
                      <input type="file" id="image1" name="image"   class="form-control " >
                      <small>Select files only: gif,png,jpg,jpeg</small>

     
      <input type="hidden" name="old_image" id="sec1_old_image" value="<?php echo $data->logo ;?>">
</div>
</div>
<div class="col-md-6">
 <div class="form-group">
  
       <?php if($data->logo!='' && $data->logo!='no file') {?>
                        <img   class="img-thumb" src="<?php echo base_url().'uploads/images/'.$data->logo;?>" style="height:100px !important;width:100px !important; " id="img1">
                        
                          

                        
                        <?php } else {?>
                        <img   class="img-thumb" src=""   id="img1">  
                    
                        <?php } ?>
                 </div> 
                </div>


              <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Footer Text</label>
                 
                   <textarea class="form-control"  type="text" name="footer_text" ><?php echo $data->footer_text ?></textarea>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Footer Text - Arabic</label>
                 
                   <textarea class="form-control"  type="text" name="footer_text_ar" ><?php echo $data->footer_text_ar ?></textarea>
                  </div>
                </div>

                 <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Links Title</label>
                   <input class="form-control"  type="text" name="links_title" value="<?php echo $data->links_title ?>" >
                  </div>
                </div>

                  <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Links Title - Arabic</label>
                   <input class="form-control"  type="text" name="links_title_ar" value="<?php echo $data->links_title_ar ?>" >
                  </div>
                </div>

                  <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Contact us Title</label>
                   <input class="form-control"  type="text" name="contactus_title" value="<?php echo $data->contactus_title ?>" >
                  </div>
                </div>

                  <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Contact us Title - Arabic</label>
                   <input class="form-control"  type="text" name="contactus_title_ar" value="<?php echo $data->contactus_title_ar ?>" >
                  </div>
                </div>



                  <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Category Title</label>
                   <input class="form-control"  type="text" name="services_title" value="<?php echo $data->services_title ?>" >
                  </div>
                </div>

                  <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Category Title - Arabic</label>
                   <input class="form-control"  type="text" name="services_title_ar" value="<?php echo $data->services_title_ar ?>" >
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Address</label>
                 
                   <textarea class="form-control"  type="text" name="address" ><?php echo $data->address ?></textarea>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Address - Arabic</label>
                 
                   <textarea class="form-control"  type="text" name="address_ar" ><?php echo $data->address_ar ?></textarea>
                  </div>
                </div>
                

                 <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Email</label>
                   <input class="form-control"  type="text" name="email" value="<?php echo $data->email ?>" >
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Phone</label>
                   <input class="form-control"  type="text" name="phone" value="<?php echo $data->phone ?>" >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Follow Us Button text</label>
                   <input class="form-control"  type="text" name="follow_us" value="<?php echo $data->follow_us ?>" >
                  </div>
                </div>

                 <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Follow Us Button text - Arabic</label>
                   <input class="form-control"  type="text" name="follow_us_ar" value="<?php echo $data->follow_us_ar ?>" >
                  </div>
                </div>
 
              </div>

              <div class="box-title row">
    <div class='col-md-4'><h4><b>Social Media Links</b></h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
          
    </div>
</div>



               <div class="row">



                <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Facebook</label>
                   <input class="form-control"  type="text" name="facebook" value="<?php echo $social->facebook ?>" >
                  </div>
                </div>

                 <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Twitter</label>
                   <input class="form-control"  type="text" name="twitter" value="<?php echo $social->twitter ?>" >
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Instagram</label>
                   <input class="form-control"  type="text" name="instagram" value="<?php echo $social->instagram ?>" >
                  </div>
                </div>

                 <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">YouTube</label>
                   <input class="form-control"  type="text" name="youtube" value="<?php echo $social->youtube ?>" >
                  </div>
                </div>

                 <div class="col-md-6">
                  <div class="form-group"> 
                    <label for="first_name">Whatsapp</label>
                   <input class="form-control"  type="text" name="whatsapp" value="<?php echo $social->whatsapp ?>" >
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
 
        window.location.href="<?php echo base_url();?>admin/footer";
        

        
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

 