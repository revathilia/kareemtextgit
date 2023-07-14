<?php $this->load->view('admin/header');?>
<body>
<?php $this->load->view('admin/top_header');?>
<?php $this->load->view('admin/side_header');?>
 

<?php $session = $this->session->userdata('superadmindet');?>
<!--    Must include this script FIRST  -->
  <script src="<?php echo base_url(); ?>assets/plugin/tinymce/tinymce.min.js"></script>

 
 <div id="wrapper">
<div class="main-content">
<div class="row small-spacing">

  <div class="box-content card white">
<div class="box-title row">
    <div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Edit School") ?></h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
            <a href="<?php echo base_url(); ?>admin/schools"><button class="btn btn-warning"><?php echo $this->Admin_model->translate("School List") ?></button></a>
    </div>
</div>




  <div class="card-content">


     
         <?php $attributes = array('name' => 'edit_driver', 'id' => 'xin-form', 'autocomplete' => 'off');?>
        <?php $hidden = array('_user' => $session['user_id']);?>
        <?php echo form_open('admin/update_school', $attributes, $hidden);?>
        <div class="form-body">
          <div class="row"> 

            <input type="hidden" class = "userid" name="schoolid" value="<?php echo $id ?>">
               
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="first_name"><?php echo $this->Admin_model->translate("School Name") ?></label>
                    <input class="form-control" placeholder="<?php echo $this->Admin_model->translate("School Name") ?>" name="school_name" type="text" value="<?php echo $school_name ?>">
                  </div>
                </div>
               
               <div class="col-md-6">
                  <div class="form-group">
                    <label for="first_name"><?php echo $this->Admin_model->translate("School Name - Arabic") ?></label>
                    <input class="form-control" placeholder="<?php echo $this->Admin_model->translate("School Name") ?>" name="ar_school_name" type="text" value="<?php echo $ar_school_name ?>">
                  </div>
                </div>
               
                  
               
               
               </div>

                  <fieldset>
    <legend><?php echo $this->Admin_model->translate("Add Class level - Standard Relations of this school") ?> </legend>

               <?php if(!empty( $levels_standards )) {

              $levelstandards = json_decode($levels_standards,true) ; 

               ?>
  
    <?php $c = 0; foreach ($levelstandards as $lsval) { 

      

       ?>

       
  <?php if($this->Admin_model->check_id_exists('class_type_master',$lsval['class_levels'])){ ?>

    
<div class="row existing" > 
      <div class="col-md-3">
                  <div class="form-group">


                             <label for="xin_employee_password"><?php echo $this->Admin_model->translate("Select Class levels") ?> </label>

                    <select class=" form-control selectedlevel"  name="class_levels[<?php echo $c ?>]" >
                    <option value="0">  --Select--</option>

                   <?php 



                    foreach ($levels as  $level) { ?>
                     <option value="<?php echo $level['id'] ?>" <?php if($lsval['class_levels'] == $level['id']){ echo 'selected' ;} ?> ><?php echo $level['class_type'] ?></option>
                   <?php   } ?>
                   
                    
                     </select>

 


                    
                  </div>
                </div>
                  
<div class="col-md-6">
                  <div class="form-group">

                             <label for="xin_employee_password"><?php echo $this->Admin_model->translate("Select standards") ?> </label><br>
                             <?php 

                             $dstandards = $lsval['standards']  ;

                  
                 ?>

                    <select class="select2_2 form-control inputfield selectedstandard" multiple="" name="standards[<?php echo $c ?>][]">
                    
                    <?php 

                 

                    foreach ($data_standards as  $std) { ?>
                     <option value="<?php echo $std['id'] ?>" <?php if(in_array($std['id'], $dstandards)){ echo "selected" ;} ?> ><?php echo $std['standard_name'] ?></option>
                   <?php   } ?>
                   
                    
                     </select>
                    
                  </div>
                </div>

                <div class="col-md-3">
                <div class="form-group" >  
  <button id='extraUpload' class="btn btn-danger btn-circle btn-xs removebtn" type="button" ><i class="fa fa-trash "></i></button>
</div>
                </div>

</div>
      
  <?php  $c++ ; } } }  else{ ?>

      <div class="row" > 
                <div class="col-md-3">
                  <div class="form-group">


                             <label for="xin_employee_password"><?php echo $this->Admin_model->translate("Select Class levels") ?> </label>

                    <select class=" form-control selectedlevel"  name="class_levels[0]" >
                    <option value="0">  --Select--</option>

                   <?php 

                    foreach ($levels as  $level) { ?>
                     <option value="<?php echo $level['id'] ?>"><?php echo $level['class_type'] ?></option>
                   <?php   } ?>
                   
                    
                     </select>

 


                    
                  </div>
                </div>
                  
<div class="col-md-6">
                  <div class="form-group">

                             <label for="xin_employee_password"><?php echo $this->Admin_model->translate("Select standards") ?> </label><br>

                    <select class="select2_2 form-control inputfield selectedstandard" multiple="" name="standards[0][]">
                    
                    <?php 

                    foreach ($data_standards as  $std) { ?>
                     <option value="<?php echo $std['id'] ?>"><?php echo $std['standard_name'] ?></option>
                   <?php   } ?>
                   
                    
                     </select>
                    
                  </div>
                </div>
 


<?php  } ?> 
                
 <div class="col-md-3">
                <div class="form-group" >  
  <button id='extraUpload' class="btn btn-success btn-block btn-sm addAnother" type="button" ><i class="fa fa-plus"></i> Click here to add new level</button>
</div>
                </div>

 


</div>

  

                

  
<div id="classLevels">
</div>     
</fieldset>

              
              <div class="row"> 
                <div class="col-md-6">
                      <div class="form-group">
                      <label for="first_name"><?php echo $this->Admin_model->translate("School Logo") ?></label>
 
                      <input type="file" id="imgInp" name="school_logo" onchange="readURL(this);" class="form-control " >
                      <small>Upload files only: gif,png,jpg,jpeg</small>

     
                  </div>
                </div>
                 <input type="hidden" name="iconname" id="iconname" value="<?php echo $school_logo;?>">

<div class="col-md-6">
        <div class='form-group'>
          <?php if($school_logo!='' && $school_logo!='no file') {?>
          <img   class="img-thumb" src="<?php echo base_url().'uploads/images/school/'.$school_logo;?>" style="height:100px !important;width:100px !important;  " id="image">
          
           <a class="btn btn-xs btn-success" href="<?php echo site_url()?>download?type=images/school&filename=<?php echo $school_logo;?>">Download</a><button class="btn btn-xs btn-warning" onclick="remove();return false;">Remove</button>
          
          <?php } else {?>
          <img   class="img-thumb" src="" style="height:100px !important;width:100px !important; " id="image">  
      
          <?php } ?> </div>
      </div>

              </div>

           
  <div class="row"> 
                <div class="col-md-12">
                  <div class="form-group">

                             <label for="xin_employee_password"><?php echo $this->Admin_model->translate("School Type") ?> </label>

                    <select class="form-control" name="school_type">
                    
                    <option value="girls" <?php if($school_type == 'girls'){echo 'selected' ;} ?>>Girls </option>              
                     <option value="boys" <?php if($school_type == 'boys'){echo 'selected' ;} ?>>Boys </option>
                        <option value="mixed" <?php if($school_type == 'mixed'){echo 'selected' ;} ?> >Mixed </option>
                  
                   
                    
                     </select>
                    
                  </div>
                </div>
                      
            </div>

                   <div class="row">
  <div class="col-md-12">
  <div class="form-group">
    <label for="first_name">  Description</label>
        <textarea class="form-control contact" id="content1"   name="description" placeholder="Add description about school"><?php echo $description ;?></textarea>
</div>
</div>
</div>
          
             <div class="row">
  <div class="col-md-12">
  <div class="form-group">
    <label for="first_name">  Description - Arabic</label>
        <textarea class="form-control contact" id="content2"   name="ar_description" placeholder="Add description about school"><?php echo $ar_description ;?></textarea>
</div>
</div>
</div>

        
             
          
           
        </div>
        <div class="form-actions"> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => 'btn btn-primary btn-block', 'content' => '<i class="fa fa fa-check-square-o"></i>'.$this->Admin_model->translate("Save"))); ?> </div>
        <?php echo form_close(); ?> </div>


</div>
</div>
</div>
</div>

<div id="levelcontainer" style="display: none">
   <div class="row newlevel"> 
  <div class="col-md-3">
                  <div class="form-group">


                             <label for="xin_employee_password"><?php echo $this->Admin_model->translate("Select Class levels") ?> </label>

                    <select class=" form-control extraclasslevels"   id="class_levels">
                    <option value="">  --Select--</option>

                   <?php 

                    foreach ($levels as  $level) { ?>
                     <option value="<?php echo $level['id'] ?>"><?php echo $level['class_type'] ?></option>
                   <?php   } ?>
                   
                    
                     </select>

 


                    
                  </div>
                </div>
                  
<div class="col-md-6">
                  <div class="form-group">

                             <label for="xin_employee_password"><?php echo $this->Admin_model->translate("Select Standards") ?> </label><br>

                    <select class=" form-control extrastandards select2_el " multiple="" >
                    <option value="">  --Select--</option>

                    <?php 

                    foreach ($data_standards as  $std) { ?>
                     <option value="<?php echo $std['id'] ?>"><?php echo $std['standard_name'] ?></option>
                   <?php   } ?>
                   
                    
                     </select>
                    
                  </div>
                </div>

                <div class="col-md-3">
                <div class="form-group" >  
  <button id='extraUpload' class="btn btn-danger btn-circle btn-xs removebtn" type="button" ><i class="fa fa-trash "></i></button>
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
        window.location.href="<?php echo base_url();?>admin/schools";
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


//function to initialize select2
 function initailizeSelect2(){

   $(".select2_el").each(function() {
     $(this).select2({ });
  });


    
}

$(document).on('click','.removebtn',function() {
     $(this).closest("div.newlevel").remove();
     $(this).closest("div.existing").remove();
});

 



$(document).on('click','.addAnother',function() {

 

 var levels =[];
  var standards =[];

  
 

    $(".selectedstandard option").each(function() {
      if(this.selected){

 
if(this.value != 0){
  standards.push(this.value);
}
        
      }
    });

    $(".selectedlevel option").each(function() {
      if(this.selected){
if(this.value != 0){
  levels.push(this.value);
}
        
      }
    });

 


 if (typeof levels == 'undefined' || levels.length < 1) {
toastr.error('select class levels to proceed');  
return   false  ;
 }else if(typeof standards == 'undefined' || standards.length < 1){
toastr.error('select standards to proceed');  
return   false  ;
 }


    var el  =   $('#levelcontainer').html(); 
     
  $('#classLevels').append(el);

  $('#classLevels select.extrastandards:last').select2();

  var numItems = 0 ;



  numItems = $('select.selectedstandard').length ;
   
  if(numItems > 1){
    var i = numItems ;
  }else{
    var i = 1 ;
  }
   
  

    $('#classLevels select.extraclasslevels:last').attr('name','class_levels['+i+']');

    $('#classLevels select.extraclasslevels:last').addClass('selectedlevel');


   $('#classLevels select.extrastandards:last').attr('name','standards['+i+'][]');

   $('#classLevels select.extrastandards:last').addClass('selectedstandard');




$("#classLevels select.extrastandards:last > option").each(function() {
   
   if ($.inArray(this.value, standards) != -1)
{
   $(this).prop('disabled', true) ;
}
  
});

$("#classLevels select.extraclasslevels:last > option").each(function() {
    if ($.inArray(this.value, levels) != -1)
{
   $(this).prop('disabled', true) ;
}

});


 

    return false;
   
    
});
 
</script>
