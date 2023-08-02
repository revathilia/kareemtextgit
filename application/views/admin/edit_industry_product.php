 <?php $this->load->view('admin/header');?>
<body>
<?php $this->load->view('admin/top_header');?>
<?php $this->load->view('admin/side_header');?>

<?php $session = $this->session->userdata('superadmindet');?>

<!--  TinyMCE   -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugin/tinymce/skins/lightgray/skin.min.css">
<!--    Must include this script FIRST  -->
  <script src="<?php echo base_url(); ?>assets/plugin/tinymce/tinymce.min.js"></script>
 
 <div id="wrapper">
<div class="main-content">
<div class="row small-spacing">

  <div class="box-content card white">
<div class="box-title row">
    <div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Edit Product") ?></h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
            <a href="<?php echo base_url(); ?>admin/industry_products"><button class="btn btn-warning"><?php echo $this->Admin_model->translate("Product List") ?></button></a>
    </div>
</div>

   <div class="card-content">

      <?php $attributes = array('name' => 'edit_driver', 'id' => 'xin-form', 'autocomplete' => 'off');?>
        <?php $hidden = array('_user' => $session['user_id']);?>
        <?php echo form_open('admin/update_industry_product', $attributes, $hidden);?>
        <div class="form-body">
          <div class="row"> 
            <input type="hidden" class = "userid" name="productid" value="<?php echo $product['id'] ?>">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="first_name"><?php echo $this->Admin_model->translate("Product Name") ?></label>
                    <input class="form-control" placeholder="<?php echo $this->Admin_model->translate("Product name") ?>" name="product_name" type="text" value="<?php echo $product['product_name'] ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="first_name"><?php echo $this->Admin_model->translate("Product Name - Arabic") ?></label>
                    <input class="form-control" placeholder="<?php echo $this->Admin_model->translate("Product name") ?>" name="ar_product_name" type="text" value="<?php echo $product['ar_product_name'] ?>">
                  </div>
                </div>

                <div class="col-md-12">
<div class="form-group">
<label for="first_name"><?php echo $this->Admin_model->translate("SKU") ?></label>
<input class="form-control" placeholder="<?php echo $this->Admin_model->translate("SKU") ?>" name="product_code" type="text" value="<?php echo $product['product_code'] ?>">
</div>
</div>

            </div>
 
       
   <div class="row"> 
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="first_name"><?php echo $this->Admin_model->translate("Category") ?> </label>
                    
               
<?php echo $this->Admin_model->select_html('categories','id', 'category_name', 'category_name', 'edit', 'demo-chosen-select form-control required category_name',  $product['category']  , '', '', ''); ?>

   
                  </div>
                </div>
            </div>

            <div class="row" > 
                <div class="col-md-4">
                  <div class="form-group">

                             <label for="xin_employee_password"><?php echo $this->Admin_model->translate("Select Available Colors") ?> </label>

                  


                             <select class="select2_2 form-control inputfield" multiple="" name="colors[]">
 

  <?php 

  
   $colors_available = explode(',',$product['colors_available']);


foreach ($colors as  $color) { ?>

 

  <option value="<?php echo $color['id'] ?>"  <?php if(in_array($color['id'], $colors_available)){echo "selected" ; } ?> ><?php echo $color['color_name'] ?></option>
              

<?php   } ?>
 


   
</select>


                    
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">

                             <label for="xin_employee_password"><?php echo $this->Admin_model->translate("Select Available Sizes") ?> </label>

                    <select class="select2_2 form-control inputfield" multiple="" name="sizes[]">
                    <option value="">  --Select--</option>

                    <?php 
                    $sizes_available = explode(',',$product['sizes_available']);

                    foreach ($sizes as  $size) { ?>
                     <option value="<?php echo $size['id'] ?>"  <?php if(in_array($size['id'], $sizes_available)){echo "selected" ; } ?> ><?php echo $size['size'] ?></option>
                   <?php   } ?>
                   
                    
                     </select>
                    
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">

                             <label for="xin_employee_password"><?php echo $this->Admin_model->translate("Select Genders") ?> </label>

                    <select class="select2_2 form-control inputfield" multiple="" name="genders[]">
                    <option value="">  --Select--</option>

                    <?php 

$gendervalues  = explode(',',$product['genders']);

                    foreach ($genders as  $gender) { ?>
                     <option value="<?php echo $gender['id'] ?>" <?php if(in_array($gender['id'], $gendervalues)){echo "selected" ; } ?> ><?php echo $gender['gender_name'] ?></option>
                   <?php   } ?>
                   
                    
                     </select>
                    
                  </div>
                </div>
            </div>
            
           
            <div class="row">
   <div class="col-md-12">
                  <div class="form-group">

                             <label for="xin_employee_password"><?php echo $this->Admin_model->translate("Select Measurements") ?> </label>

                    <select class="select2_2 form-control inputfield" multiple="" name="measurements[]">
                    <option value="">  --Select--</option>

                    <?php 
$measures  = explode(',',$product['measurements']);

foreach ($measurements as  $measurement) { ?>

<option value="<?php echo $measurement['id'] ?>"  <?php if(in_array($measurement['id'], $measures)){echo "selected" ; } ?> ><?php echo $measurement['name'] ?></option>


<?php   } ?>
                    
                     </select>

                  </div>
                </div>
</div>
           

            <div class="row"> 
                <div class="col-md-6">
                      <div class="form-group">
                      <label for="first_name"><?php echo $this->Admin_model->translate("Product Image") ?></label>
 
                      <input type="file" id="imgInp" name="product_image" onchange="readURL(this);" class="form-control " >
                      <small>Upload files only: gif,png,jpg,jpeg</small>

     
                  </div>
                </div>
                 <input type="hidden" name="iconname" id="iconname" value="<?php echo $product['product_image'];?>">

<div class="col-md-6">
        <div class='form-group'>
          <?php if($product['product_image']!='' && $product['product_image']!='no file') {?>
          <img   class="img-thumb" src="<?php echo base_url().'uploads/images/industry/'.$product['product_image'];?>" style="height:100px !important;width:100px !important;  " id="image">
          
           <a class="btn btn-xs btn-success" href="<?php echo site_url  ()?>download?type=images/industry&filename=<?php echo $product['product_image'];?>">Download</a><button class="btn btn-xs btn-warning" onclick="remove();return false;">Remove</button>
          
          <?php } else {?>
          <img   class="img-thumb" src="" style="height:100px !important;width:100px !important; " id="image">  
      
          <?php } ?> </div>
      </div>

              </div>

              <div class="row">
  <div class="col-md-12">
  <div class="form-group">
    <label for="first_name">Short  Description</label>
        <textarea class="form-control contact" id="content1"   name="description" placeholder=" Add size description"><?php echo $product['description'] ?></textarea>
</div>
</div>
</div>


       <div class="row">
  <div class="col-md-12">
  <div class="form-group">
    <label for="first_name">Short  Description - Arabic</label>
        <textarea class="form-control contact" id="content2"   name="ar_description" placeholder=" Add size description"><?php echo $product['ar_description'] ?></textarea>
</div>
</div>
</div>

<div class="row">
  <div class="col-md-12">
  <div class="form-group">
    <label for="first_name">Long  Description</label>
        <textarea class="form-control contact" id="content3"   name="long_description" placeholder=" Add long description"><?php echo $product['long_description'] ?></textarea>
</div>
</div>
</div>

<div class="row">
  <div class="col-md-12">
  <div class="form-group">
    <label for="first_name">Long  Description - Arabic</label>
        <textarea class="form-control contact" id="content4"   name="ar_long_description" placeholder=" Add long description"><?php echo $product['ar_long_description'] ?></textarea>
</div>
</div>
</div>

              <div class="row"> 
                <div class="col-md-12">
                  <div class="form-group">

                             <label for="xin_employee_password"><?php echo $this->Admin_model->translate("Select Related Products") ?> </label>

                    <select class="select2_2 form-control inputfield" multiple="" name="related_products[]">
                    <option value="">--Select--</option>

                    <?php 
                    $related_products = explode(',',$product['related_products']);

                    foreach ($products as  $prod) { ?>
                     <option value="<?php echo $prod['id'] ?>"  <?php if(in_array($prod['id'], $related_products)){echo "selected" ; } ?>><?php echo $prod['product_name'] ?></option>
                   <?php   } ?>
                   
                    
                     </select>
                    
                  </div>
                </div>
                      
            </div>


            <div class="row"> 
                <div class="col-md-12">
                  <div class="form-group">
 

                    <label for="xin_employee_password"><?php echo $this->Admin_model->translate("Tags") ?> </label>

                    <select class="select2_2 form-control inputfield" multiple="" name="tags[]">
                    <option value="">--Select--</option>

                    <?php 
                    $tags = explode(',',$product['tags']);

                   

                    foreach ($tags as  $tag) { ?>
                     <option value="<?php echo $tag ?>" selected ><?php echo $tag ?></option>
                   <?php   } ?>
                   
                    
                     </select>
                    
                  </div>
                </div>
                      
            </div>

  
          
           
        </div>
        <div class="form-actions"> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => 'btn btn-primary', 'content' => '<i class="fa fa fa-check-square-o"></i>'.$this->Admin_model->translate("Save"))); ?> </div>
        <?php echo form_close(); ?> </div>

</div>
</div>
</div>
</div>
</body>


<!-- ================================================== -->
 <?php $this->load->view('admin/footer');?>



<!-- TinyMCE -->
  <!-- Plugin Files DON'T INCLUDES THESES FILES IF YOU USE IN THE HOST -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugin/tinymce/skins/lightgray/skin.min.css">
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/advlist/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/anchor/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/autolink/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/autoresize/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/autosave/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/bbcode/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/charmap/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/code/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/codesample/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/colorpicker/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/contextmenu/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/directionality/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/emoticons/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/example/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/example_dependency/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/fullpage/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/fullscreen/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/hr/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/image/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/imagetools/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/importcss/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/insertdatetime/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/layer/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/legacyoutput/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/link/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/lists/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/media/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/nonbreaking/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/noneditable/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/pagebreak/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/paste/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/preview/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/print/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/save/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/searchreplace/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/spellchecker/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/tabfocus/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/table/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/template/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/textcolor/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/textpattern/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/visualblocks/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/visualchars/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/wordcount/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/themes/modern/theme.min.js"></script>
  <!-- Plugin Files DON'T INCLUDES THESES FILES IF YOU USE IN THE HOST -->

  <script src="<?php echo base_url() ?>assets/scripts/tinymce.init.min.js"></script>

  <script type="text/javascript">

function initMCEexact(e){
  tinyMCE.init({
    mode : "exact",
    elements : e,
    plugins: "textcolor",
    toolbar: "forecolor backcolor",
    toolbar:
    "undo redo | styleselect | fontselect | fontsizeselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist",
    textcolor_map: [
    "000000", "Black",
    "993300", "Burnt orange",
    "333300", "Dark olive",
    "003300", "Dark green",
    "003366", "Dark azure",
    "000080", "Navy Blue",
    "333399", "Indigo",
    "333333", "Very dark gray",
    "800000", "Maroon",
    "FF6600", "Orange",
    "808000", "Olive",
    "008000", "Green",
    "008080", "Teal",
    "0000FF", "Blue",
    "666699", "Grayish blue",
    "808080", "Gray",
    "FF0000", "Red",
    "FF9900", "Amber",
    "99CC00", "Yellow green",
    "339966", "Sea green",
    "33CCCC", "Turquoise",
    "3366FF", "Royal blue",
    "800080", "Purple",
    "999999", "Medium gray",
    "FF00FF", "Magenta",
    "FFCC00", "Gold",
    "FFFF00", "Yellow",
    "00FF00", "Lime",
    "00FFFF", "Aqua",
    "00CCFF", "Sky blue",
    "993366", "Red violet",
    "FFFFFF", "White",
    "FF99CC", "Pink",
    "FFCC99", "Peach",
    "FFFF99", "Light yellow",
    "CCFFCC", "Pale green",
    "CCFFFF", "Pale cyan",
    "99CCFF", "Light sky blue",
    "CC99FF", "Plum",
    "707070",'gray'
  ]
     
  })
}

      $(document).ready(function(){

initMCEexact("content1"); 
initMCEexact("content2");
initMCEexact("content3");
initMCEexact("content4"); 

});

  </script>


 <script type="text/javascript">
  imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    image.src = URL.createObjectURL(file)
  }
}

function readURL(input) {
    if (input.files && input.files[0]) {
var reader = new FileReader();

jQuery('#image').removeAttr('src')
jQuery('#image').show();



reader.onload = function (e) {
$('#image').attr('src', e.target.result);
$('#image').attr('style', "height:200px !important;width:200px !important;");

}

reader.readAsDataURL(input.files[0]);
}
}

function remove() {
jQuery('#image').removeAttr('src'); 
document.getElementById("iconname").value = "";

}

</script>


<script type="text/javascript">
  /* Add data */ /*Form Submit*/

  $(document).ready(function(){
   

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
        } else {
        toastr.success(JSON.result);
        $('.save').prop('disabled', false);
      window.location.href="<?php echo base_url();?>admin/industry_products";
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
 