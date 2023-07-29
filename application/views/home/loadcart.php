<div id="text"> 
<?php  $cart_check = $this->cart->contents();

// If cart is empty, this will show below message.
if(empty($cart_check)) { ?>


    <div class="container-fluid">
        <div class="col-md-12">
<?php  echo  $this->Admin_model->translate("Your cart is empty !") ; ?>

</div>
</div>

<?php }  ?> 

</div>

<?php
// All values of cart store in "$cart". 
if ($cart = $this->cart->contents()): ?>

<div class="shoping-cart-inner">
                        <div class="shoping-cart-table table-responsive">
                            <table class="table">
                                
                                <tbody>

                                    <?php
// Create form and send all values in "shopping/update_cart" function.

$total = 0;
 $sutotal = 0 ;
$i = 1;
 
foreach ($cart as $item){

 $i++;
  ?>

                                    <tr>
                                        <td class="cart-product-remove"><a href="javascript:void(0)"  onclick="itemremove('<?php echo $item['rowid'] ; ?>');  return false ;"><i class="fa fa-times"></i></a></td>
                                        <td class="cart-product-image">
                                            <?php $productID = $item['id'] ;
                                           if($item['type']=='industry'){
                                             $detailspage = 'product_details' ;
                                             $prod = $this->Admin_model->get_single_data('industry_products',array('id'=>$item['id'])) ;
                                             $productImage = $prod->product_image ;
                                             $prod_name = $prod->product_name ;
                                             $ar_prod_name  = $prod->ar_product_name ;
                  
                                             }else{
                                              $detailspage = 'uniform_det' ;
                                              $prod = $this->Admin_model->get_single_data('school_products' ,array('id'=>$item['id'])) ;
                                              $productImage = $prod->product_image ;
                                              $prod_name = $prod->product_name ;
                                              $ar_prod_name  = $prod->ar_product_name ;
                                            }                              

                                             ?>
                                            <a href="<?php echo base_url() ; ?>home/<?php echo $detailspage ?>/<?php echo $item['id'] ?>"><img src="<?php echo base_url() ; ?>uploads/images/<?php echo $item['type']?>/<?php echo $productImage ?>" alt="#"></a>
                                        </td>
                                        <td class="cart-product-info">
                                            <h4><a href="<?php echo base_url() ; ?>home/<?php echo $detailspage ?>/<?php echo $item['id'] ?>">
                                                
                                            <?php 
if($this->session->userdata('lang') == 'ar'){
     echo $ar_prod_name ;
}else{
     echo $prod_name ;
}
                                                    ?>
                                                    </a></h4>
                                                <small><?php echo  $this->Admin_model->get_type_name_by_id('size_master','id',$item['size'],'size') ;?>,
<?php if(!empty($item['color'])){ ?>
<div class="swatch" style="background:<?php echo $this->Admin_model->get_type_name_by_id('color_master','id',$item['color'],'color_code')  ?>;color:#fff;">
    <input type="radio" name="color_selected" checked id="swatch_<?php echo $item['color'] ?>" value="<?php echo $item['color'] ?>" />
    <label for="swatch_<?php echo $item['color'] ?>" title="<?php echo $this->Admin_model->get_type_name_by_id('color_master','id',$item['color'],'color_name')  ?>"></label>
  </div>,
<?php } ?>
                                                


                                               
                                                <?php echo $this->Admin_model->translate($this->Admin_model->get_type_name_by_id('genders','id',$item['gender'],'gender_name'))
                                                 ;?></small>
                                        </td>
                                        <td class="cart-product-price"><?php echo $this->Admin_model->translate("SAR") ; ?> <?php echo $item['price']; ?></td>
                                        <td class="cart-product-quantity">

                                             <?php
$attributes = array('id' => 'tocart'.$item['id'],'name' =>'action');

// Create form and send values in 'shopping/add' function.
echo form_open('user/update_cart',$attributes);
echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
?>

 

 
                                         
<div class="container">
<input type="button" onclick="decrementValue(<?php echo $i ;?>)" value="-" />
<input type="text" class="cart-plus-minus-box" id = "qty_<?php echo $i ;?>" data-id = "qty_<?php echo $i ;?>" class = "qty  cart-plus-minus-box" data-product ="<?php echo 'tocart'.$item['id'] ?>" data-rowid = "<?php echo $item['rowid'] ;?>"  data-price = "<?php echo $item['price'] ;?>"  name="cart[<?php echo $item['id'] ?>][qty]"  value="<?php echo $item['qty'] ?>" />
<input type="button" onclick="incrementValue(<?php echo $i ;?>)" value="+" />
</div>

  
<?php
echo form_close();
?>


 </td>
                                        <td class="cart-product-subtotal"><?php echo $this->Admin_model->translate("SAR") ; ?> <?php echo $item['subtotal']; ?></td>
                                    </tr>

                                     <?php $sutotal = $item['subtotal'] + $sutotal ;
                                        $shipping = $this->Admin_model->get_type_name_by_id('site_settings','id','1','shipping_charge') ;
                                        $vat_percentage = $this->Admin_model->get_type_name_by_id('site_settings','id','1','vat_val') ;
                                        $vat = 0 ;
                                        $discount =  0 ;
                                        $cname = '' ;
                                        $couponcode  = $this->session->userdata('coupon_code');

                                        if(!empty($couponcode)){
                                            
                                            $coupon = $this->Admin_model->get_single_data('coupons',array('coupon_code'=>$couponcode)) ;

                                           $dtype = $coupon->discount_type ;
                                           $dval  =  $coupon->discount_value ;

                                           $cname = $coupon->coupon_name ;
                                        
if($dtype == 'percent'){

    $discount =  $sutotal * $dval/100 ;

}elseif($dtype=='amount'){
    $discount = $dval ;
}
                                        }

                                        if(!empty($vat_percentage) && $vat_percentage != 0 ){
                                            $vat = $sutotal * $vat_percentage /100 ;
                                        }
                                        ?>

                                       


                                   <?php }  ?>
                                    

                                   
                                   
                                    <tr class="cart-coupon-row">
                                        <td colspan="6">
                                            <div class="cart-coupon">
                                                <input type="text" name="cart-coupon" id="coupon_code" placeholder="<?php echo $this->Admin_model->translate("Coupon Code") ; ?>">
                                                <button type="button" class="btn theme-btn-2 btn-effect-2 applycoupon"><?php echo $this->Admin_model->translate("Apply Coupon") ; ?></button>
                                            </div>
                                        </td>
                                        <td>
                                            <?php  $prodType = $this->session->userdata('prouctType'); ?>
                                           <a href="<?php echo base_url() ; ?>home/<?php echo $prodType ;?>" class="theme-btn-1 btn btn-effect-1"><?php echo $this->Admin_model->translate("Continue Shopping") ; ?></a>
                                        </td>
                                     
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="shoping-cart-total mt-50">
                            <h4>Cart Totals</h4>
                            <table class="table">
                                <tbody>
                                    <tr>
                                       
                                        <td><?php echo $this->Admin_model->translate("Cart Subtotal") ; ?></td>
                                        <td><?php echo $this->Admin_model->translate("SAR") ; ?> <?php echo  $sutotal  ;?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $this->Admin_model->translate("Shipping and Handing") ; ?></td>
                                        <td><?php echo $this->Admin_model->translate("SAR") ; ?> <?php echo $shipping ; ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $this->Admin_model->translate("VAT") ; ?></td>
                                        <td><?php echo $this->Admin_model->translate("SAR") ; ?> <?php echo $vat ; ?></td>
                                    </tr>

                                    <?php if($discount >0){ ?>

                                        <tr>
                                        <td><?php echo $this->Admin_model->translate("Discount") ; ?> <small style="color:green"> <i class="fa fa-check" aria-hidden="true" ></i> <?php echo $cname ?> applied </small> </td>
                                        <td><?php echo $this->Admin_model->translate("SAR") ; ?> <?php echo $discount ; ?></td>
                                    </tr>

                                   <?php } ?>
                                    <tr>
                                        <td><strong><?php echo $this->Admin_model->translate("Order Total") ; ?></strong></td>

                                         <?php $total =  ($sutotal + $shipping+ $vat) - $discount ;
                                       ?>

                                        <td><strong><?php echo $this->Admin_model->translate("SAR") ; ?> <?php echo  $total ; ?></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="btn-wrapper text-right">
                                <a href="<?php echo base_url() ; ?>home/checkout" class="theme-btn-1 btn btn-effect-1"><?php echo $this->Admin_model->translate("Proceed to checkout") ; ?></a>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                 
                   