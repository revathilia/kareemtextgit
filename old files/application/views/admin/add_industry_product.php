<?php $this->load->view('admin/header');?>
<body>
<?php $this->load->view('admin/top_header');?>
<?php $this->load->view('admin/side_header');?>

<!--  TinyMCE   -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugin/tinymce/skins/lightgray/skin.min.css">
<!--    Must include this script FIRST  -->
  <script src="<?php echo base_url(); ?>assets/plugin/tinymce/tinymce.min.js"></script>


<?php $session = $this->session->userdata('superadmindet');?>

<div id="wrapper">
<div class="main-content">
<div class="row small-spacing">

<div class="box-content card white">
<div class="box-title row">
<div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Add Product") ?></h4></div>
<div class='col-md-6'></div>
<div class='col-md-2'> 
<a href="<?php echo base_url(); ?>admin/industry_products"><button class="btn btn-warning"><?php echo $this->Admin_model->translate("Product List") ?></button></a>
</div>
</div>




<div class="card-content">



<?php $attributes = array('name' => 'edit_driver', 'id' => 'xin-form', 'autocomplete' => 'off');?>
<?php $hidden = array('_user' => $session['user_id']);?>
<?php echo form_open('admin/add_industry_product', $attributes, $hidden);?>
<div class="form-body">
<div class="row"> 
<div class="col-md-6">
<div class="form-group">
<label for="first_name"><?php echo $this->Admin_model->translate("Product name") ?></label>
<input class="form-control" placeholder="<?php echo $this->Admin_model->translate("Product name") ?>" name="product_name" type="text" value="">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="first_name"><?php echo $this->Admin_model->translate("Product name - Arabic") ?></label>
<input class="form-control" placeholder="<?php echo $this->Admin_model->translate("Product name") ?>" name="ar_product_name" type="text" value="">
</div>
</div>


</div>

  
  <div class="row"> 
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="first_name"><?php echo $this->Admin_model->translate("Product Category") ?> </label>
                    
<?php echo $this->Admin_model->select_html('categories','id', 'category_name', 'category_name', 'add', 'demo-chosen-select form-control required category_name', '', '', '', ''); ?>
   
                  </div>
                </div>
            </div>

            <div class="row" > 
                <div class="col-md-4">
                  <div class="form-group">

                             <label for="xin_employee_password"><?php echo $this->Admin_model->translate("Select Available Colors") ?> </label>

                    <select class="select2_2 form-control inputfield" multiple="" name="colors[]">
                    <option value="">  --Select--</option>

                    <?php 

foreach ($colors as  $color) { ?>

<option value="<?php echo $color['id'] ?>"><?php echo $color['color_name'] ?></option>


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

                    foreach ($sizes as  $size) { ?>
                     <option value="<?php echo $size['id'] ?>"><?php echo $size['size'] ?></option>
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

                    foreach ($genders as  $gender) { ?>
                     <option value="<?php echo $gender['id'] ?>"><?php echo $gender['gender_name'] ?></option>
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

foreach ($measurements as  $measurement) { ?>

<option value="<?php echo $measurement['id'] ?>"><?php echo $measurement['name'] ?></option>


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

 
<div class="col-md-6">
        <div class='form-group'>
          
          <img   class="img-thumb" src="" style="height:100px !important;width:100px !important; " id="image">  
          
        </div>
      </div>


</div>

            
<div class="row">
  <div class="col-md-12">
  <div class="form-group">
    <label for="first_name">  Description</label>
        <textarea class="form-control contact" id="content1"   name="description" placeholder=" Add size description"></textarea>
</div>
</div>
</div>

<div class="row">
  <div class="col-md-12">
  <div class="form-group">
    <label for="first_name">  Description - Arabic</label>
        <textarea class="form-control contact" id="content2"   name="ar_description" placeholder=" Add description"></textarea>
</div>
</div>
</div>
 
<div class="row">
  <div class="col-md-12">
  <div class="form-group">
    <label for="first_name">Long  Description</label>
        <textarea class="form-control contact" id="content3"   name="long_description" placeholder=" Add long description"></textarea>
</div>
</div>
</div>

<div class="row">
  <div class="col-md-12">
  <div class="form-group">
    <label for="first_name">Long  Description - Arabic</label>
        <textarea class="form-control contact" id="content4"   name="ar_long_description" placeholder=" Add long description"></textarea>
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

                    foreach ($products as  $product) { ?>
                     <option value="<?php echo $product['id'] ?>"><?php echo $product['product_name'] ?></option>
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
                   
                   
                    
                     </select>
                    
                  </div>
                </div>
                      
            </div>


</div>
<div class="form-actions"> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => 'btn btn-primary btn-block', 'content' => '<i class="fa fa fa-check-square-o"></i>&nbsp;&nbsp;'.$this->Admin_model->translate("Save"))); ?> </div>
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
 
 

 <script type="text/javascript">


imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    image.src = URL.createObjectURL(file)
  }
}
</script>