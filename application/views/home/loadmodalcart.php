 <div class="ltn__utilize-menu-head">
                <span class="ltn__utilize-menu-title">Cart</span>
                <button class="ltn__utilize-close">×</button>
            </div>

 
            <?php  $cart_check = $this->cart->contents();

// If cart is empty, this will show below message.
if(empty($cart_check)) {
echo  $this->Admin_model->translate("Your cart is empty !") ;
}  ?>

<?php
 $subtotal = 0 ;
// All values of cart store in "$cart". 
if ($cart = $this->cart->contents()): 
    foreach ($cart as $item){
        ?>

            <div class="mini-cart-product-area ltn__scrollbar">
                <div class="mini-cart-item clearfix">
                    <div class="mini-cart-img">
                        


                           <?php if($item['type'] == 'industry'){
                              $detailspage = 'product_details' ;
                           $imagename = $this->Admin_model->get_type_name_by_id('industry_products','id',$item['id'],'product_image') ;
                           }else{
                              $detailspage = 'uniform_det' ;
 $imagename = $this->Admin_model->get_type_name_by_id('school_products','id',$item['id'],'product_image') ;
                           } ?>

                        
                       <a href="<?php echo base_url() ; ?>home/<?php echo $detailspage ?>/<?php echo $item['id'] ?>">  <img src="<?php echo base_url() ; ?>uploads/images/<?php echo $item['type']?>/<?php echo $imagename  ?>"></a>



                        <span class="mini-cart-item-delete" onclick="itemremove('<?php echo $item['rowid'] ; ?>');  return false ;" ><i class="icon-cancel"></i></span>
                    </div>
                    <div class="mini-cart-info">
                        <h6><a href="<?php echo base_url() ; ?>home/<?php echo $detailspage ?>/<?php echo $item['id'] ?>"><?php echo $item['name'] ;?></a></h6>
                        <span class="mini-cart-quantity"><?php echo $item['qty'] ;?> x <?php echo $this->Admin_model->translate("SAR") ; ?> <?php echo $item['price'] ;?> </span>
                    </div>
                </div>
                 
                
            </div>

              <?php $subtotal = $item['subtotal'] + $subtotal ;
                                        $shipping = 0 ;
                                        $vat = 0 ;?>

        <?php } ?>
            <div class="mini-cart-footer">
                <div class="mini-cart-sub-total">
                    <h5>Subtotal: <span><?php echo $this->Admin_model->translate("SAR") ; ?> <?php echo  $subtotal ;?> </span></h5>
                </div>
                <div class="btn-wrapper">
                    <a href="<?php echo base_url() ; ?>home/viewcart" class="theme-btn-1 btn btn-effect-1">View Cart</a>
                    <a href="<?php echo base_url() ; ?>home/checkout" class="theme-btn-2 btn btn-effect-2">Checkout</a>
                </div>
                 
            </div>

        <?php endif; ?>