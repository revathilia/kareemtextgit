  <div class="col-md-12">

     <div class="form-group" >  

        <label class="control-label"> Product Images for the Selected Color</label>

          <input type="hidden" class="form-control" value="<?php echo $images?>" id="ed_img" multiple="multiple" name="edit_img">
                  <div>

                   
                       <?php $img = explode(',', $images);

                       $i = 0 ;
                    foreach ($img as $key =>$value) {

                         $i++ ;
                      ?>
                      
                            
                    <?php 
                    
                    if($value != '' && $value !=null)
                    {?>

                      <div class="col-md-3">
                        <div class="form-group" >  

                    
                <img   class="img-thumb" src="<?php echo base_url().'uploads/images/'.$folder.'/'.$value;?>" style="height:100px !important;width:100px !important;" id="file_<?php echo $i ?>">

                     

                       <button type="button" class="btn btn-danger btn-xs remove" onclick="myFunction('<?php echo $value?>','<?php echo $i ?>');  return false ;" href="javascript:void(0)"  id="btn_<?php echo $i ?>" ><i class="fa fa-trash"></i></button>
                     </div>
                   </div>
                          
                   <?php  } 
                  

                    }
                    ?>
                         
                   
                  
                  </div>
                </div>
              </div>

                <script type="text/javascript">
                   
    function myFunction($r_img,$i)
    {   


        
         var r_img = $r_img;
         var all_img = document.getElementById("ed_img").value;  

        

         var c = "";   
        
        var values = all_img.split(',');

        for(var i = 0 ; i < values.length ; i++)
        {

          if(values[i] == r_img)
          {

            values.splice(i, 1);
 
             c = values.join(',');
          }

        }   

        document.getElementById("ed_img").value = c;

     

     //$('#file_proj_16046395551.jpg').hide();
         $('#file_'+$i).hide();
         $('#btn_'+$i).hide();
    }
</script> 