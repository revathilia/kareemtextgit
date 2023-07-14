 <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                         <div class="ltn__quick-view-modal-inner">
                             <div class="modal-product-item">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="modal-product-img">
                                            <img src="<?php echo base_url()?>uploads/images/<?php echo $folder ?>/<?php echo $product->product_image ?>" alt="#">
                                        </div>
                                         <div class="modal-product-info">
                                            <h5><a href="product-details.html">
                                                 <?php 
if($this->session->userdata('lang') == 'ar'){
     echo  $product->ar_product_name ;
}else{
     echo $product->product_name ;
}
                                                    ?>
                                                    </a></h5>
                                             <p class="added-cart"><i class="fa fa-check-circle"></i>  <?php echo $this->Admin_model->translate("Successfully added to your Wishlist") ?>
                                        </p>
                                            <div class="btn-wrapper">
                                                <a href="<?php echo base_url()?>home/wishlist" class="theme-btn-1 btn btn-effect-1"><?php echo $this->Admin_model->translate("View Wishlist") ?></a>
                                            </div>
                                         </div>
                                         <!-- additional-info -->
                                         <div class="additional-info d-none">
                                            <p>We want to give you <b>10% discount</b> for your first order, <br>  Use discount code at checkout</p>
                                            <div class="payment-method">
                                                <img src="<?php echo base_url()?>assets/home_assets/img/icons/payment.png" alt="#">
                                            </div>
                                         </div>
                                    </div>
                                </div>
                             </div>
                         </div>
                    </div>
                </div>
            </div>