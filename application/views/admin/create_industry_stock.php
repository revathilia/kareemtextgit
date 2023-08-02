  
<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">  Create Stock</h4>
      </div>
      <div class="modal-body">

 
<br/>

 <form class="order_form" id="xin-form" method="POST" action="<?php echo base_url();?>admin/add_industry_stock">
 
<div class="form-body"> 
  <div class="row"> 
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="first_name"><?php echo $this->Admin_model->translate("Product") ?> </label>
                      

                      <input type="hidden" name="product_id" value="<?php echo $pId ?>">
                       <input type="hidden" name="entry_type" value="<?php echo $type ?>">
<input type="text" name="product_name" class="form-control" value="<?php echo $this->Admin_model->get_type_name_by_id('industry_products','id', $pId ,'product_name') ?>" readonly>


     
                    </div>
                  </div>
              </div>

              <div class="row" > 
                  <div class="col-md-6">
                    <div class="form-group"  >   

                                   <label for="xin_employee_password"><?php echo $this->Admin_model->translate("Select Available Colors") ?> </label>
                                  

                                   <select class=" form-control  " id="colors_available"  name="colors[]">
                    <option value="">  --Select--</option>

                    
                    
                     </select>   

                    </div>
                  </div>                
              
                  <div class="col-md-6">
                    <div class="form-group" >       
                    <label for="xin_employee_password"><?php echo $this->Admin_model->translate("Select Available Sizes") ?> </label>

                    <select class=" form-control " id="sizes_available"  name="sizes[]">
                    <option value="">  --Select--</option>

                    
                    
                     </select>        

                    </div>
                  </div>                
              </div>
               

               <div class="row" > 
                  <div class="col-md-6">
                    <div class="form-group"  >   

                                   <label for="xin_employee_password"><?php echo $this->Admin_model->translate("Stock Entry Type") ?> </label>
                                <!--  <select class="form-control" name="entry_type">
                                   <option value="add">Add</option>
                                    <option value="deduct">Deduct</option>
                                 </select> -->

                                 <input type="text"   class="form-control" value="<?php echo ($type=='add' ? 'Add':'Deduct') ?>" readonly>

                    </div>
                  </div>                
              
                  <div class="col-md-6">
                    <div class="form-group" >       
                    <label for="xin_employee_password"><?php echo $this->Admin_model->translate("Quantity") ?> </label>

                  
                 <input class="form-control" placeholder="<?php echo $this->Admin_model->translate("Product Quantity") ?>" name="quantity" type="number" value="">       

                    </div>
                  </div>   
                  <!-- <div class="col-md-4">
                    <div class="form-group" >       
                    <label for="xin_employee_password"><?php echo $this->Admin_model->translate("Unit Price") ?> </label>

                   
                     <input class="form-control" placeholder="<?php echo $this->Admin_model->translate("Unit Price") ?>" name="unit_price" type="text" value="">     

                    </div>
                  </div>  -->             
              </div>
               

 


</div>

<p class="text-center"><button type="submit" class="btn btn-block btn-success save"><?php echo $this->Admin_model->translate("Save") ?></button></p>


 </form>
</div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">



<?php echo $this->Admin_model->translate("Close") ?></button>
    
      </div>

       


<script type="text/javascript">
/* Add data */ /*Form Submit*/

$(document).ready(function(){



 
    var product_id  = <?php echo  $pId ?>;
    
    $.ajax({  
    url:"<?php echo base_url(); ?>admin/get_colors",  
    method:"POST",  
    data:{product_id:product_id,type:'industry'},  
    success:function(data)
    { 

      $('#colors_available').html(data);
    }
    
    });


    $.ajax({  
    url:"<?php echo base_url(); ?>admin/get_sizes",  
    method:"POST",  
    data:{product_id:product_id,type:'industry'},  
    success:function(data)
    { 
      $('#sizes_available').html(data);
    }
    
    });



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
window.location.href="<?php echo base_url();?>admin/industry_inventory";
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
 
 
<script type='text/javascript'>

 

 
 

</script>