<div id="text"> 
<?php  $cart_check = $this->cart->contents();

// If cart is empty, this will show below message.
if(empty($cart_check)) {
echo 'Your cart is empty !!!'; 
}  ?> </div>

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
                                        <td class="cart-product-remove"><a href="javascript:void(0)"  onclick="itemremove('<?php echo $item['rowid'] ; ?>');  return false ;">x</a></td>
                                        <td class="cart-product-image">
                                            <?php $productID = $item['id'] ;
                                           if($item['type']=='industry'){
 $productImage = $this->Admin_model->get_type_name_by_id('industry_products','id',$item['id'],'product_image') ;
                                           }else{
 $productImage = $this->Admin_model->get_type_name_by_id('school_products','id',$item['id'],'product_image') ;
                                           }

                                             ?>
                                            <a href="product-details.php"><img src="<?php echo base_url()?>uploads/images/<?php echo $item['type']?>/<?php echo $productImage ?>" alt="#"></a>
                                        </td>
                                        <td class="cart-product-info">
                                            <h4><a href="product-details.php">
                                                <?php echo $item['name']; ?></a></h4>
                                                <small><?php echo  $this->Admin_model->get_type_name_by_id('size_master','id',$item['size'],'size') ;?>,
<?php if(!empty($item['color'])){ ?>
<div class="swatch" style="background:<?php echo $this->Admin_model->get_type_name_by_id('color_master','id',$item['color'],'color_code')  ?>;color:#fff;">
    <input type="radio" name="color_selected" checked id="swatch_<?php echo $item['color'] ?>" value="<?php echo $item['color'] ?>" />
    <label title="<?php echo $this->Admin_model->get_type_name_by_id('color_master','id',$item['color'],'color_name')  ?>" for="swatch_<?php echo $item['color'] ?>"></label>
  </div>,
<?php } ?>
                                                


                                               
                                                <?php echo $this->Admin_model->get_type_name_by_id('genders','id',$item['gender'],'gender_name') ;?></small>
                                        </td>
                                        <td class="cart-product-price">SAR <?php echo $item['price']; ?></td>
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

 


 <div class="cart-plus-minus loadqty" data-id="btn_<?php echo $i ;?>">
    <input type="text" id = "qty_<?php echo $i ;?>" data-id = "qty_<?php echo $i ;?>" class = "qty  cart-plus-minus-box" data-product ="<?php echo 'tocart'.$item['id'] ?>" data-rowid = "<?php echo $item['rowid'] ;?>"  data-price = "<?php echo $item['price'] ;?>"  name="cart[<?php echo $item['id'] ?>][qty]"  value="<?php echo $item['qty'] ?>" >
</div>
                                         


 

<!--   <button type="submit" data-prod_name="'<?php echo 'tocart'.$item['id'] ?>'" class="updatecart btn btn-success btn-xs"><i class="fa fa-refresh"></i></button> -->
<?php
echo form_close();
?>


                                          <!--   <div class="cart-plus-minus">
                                                <input type="text" value=" <?php echo $item['qty']; ?>" name="qtybutton" class="cart-plus-minus-box">
                                            </div> -->
                                        </td>
                                        <td class="cart-product-subtotal">SAR <?php echo $item['subtotal']; ?></td>
                                    </tr>

                                     <?php $sutotal = $item['subtotal'] + $sutotal ;
                                        $shipping = 0 ;
                                        $vat = 0 ;?>


                                   <?php }  ?>
                                    
                                   
                                    <tr class="cart-coupon-row">
                                        <td colspan="6">
                                            <div class="cart-coupon">
                                                <input type="text" name="cart-coupon" placeholder="Coupon code">
                                                <button type="submit" class="btn theme-btn-2 btn-effect-2">Apply Coupon</button>
                                            </div>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn theme-btn-2 btn-effect-2-- disabled">Update Cart</button>
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
                                       
                                        <td>Cart Subtotal</td>
                                        <td>SAR <?php echo  $sutotal  ;?></td>
                                    </tr>
                                    <tr>
                                        <td>Shipping and Handing</td>
                                        <td>SAR <?php echo $shipping ; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Vat</td>
                                        <td>SAR <?php echo $vat ; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Order Total</strong></td>

                                         <?php $total =  $sutotal + $shipping+ $vat  ;
                                       ?>

                                        <td><strong>SAR <?php echo  $total ; ?></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="btn-wrapper text-right">
                                <a href="<?php echo base_url()?>home/checkout" class="theme-btn-1 btn btn-effect-1">Proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                 
                   