  <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <!-- <i class="fas fa-times"></i> -->
                        </button>
                    </div>
                    <div class="modal-body">
                         <div class="ltn__quick-view-modal-inner">
                             <div class="modal-product-item">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="modal-product-img">
                                            <img src="<?php echo base_url() ; ?>uploads/images/<?php echo $folder ?>/<?php echo $product->product_image ?>" alt="#">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="modal-product-info">
                                            <div class="product-ratting">
                                                <ul>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                                    <li class="review-total"> <a href="#"> ( 95 Reviews )</a></li>
                                                </ul>
                                            </div>
                                            <h3> 

                                            <?php 
if($this->session->userdata('lang') == 'ar'){
     echo $product->ar_product_name ;
}else{
     echo $product->product_name ;
}
                                                    ?>

                                        
                                        </h3>
                                            <div class="product-price">
                                                 <span><?php echo $this->Admin_model->translate("SAR") ; ?> <?php echo  ($product_price->offer_price != '0') ? $product_price->offer_price : $product_price->product_price ; ?></span>
                                         
                                                <?php echo  ($product_price->offer_price != '0') ? '<del>'.$this->Admin_model->translate("SAR").' ' . $product_price->product_price .'</del>' :  '' ; ?>
                                            </div>
                                            <div class="modal-product-meta ltn__product-details-menu-1">
                                                <ul>
                                                    <li>
                                                        <strong>Category:</strong> 
                                                        <span>
                                                            <a href="#"><?php echo $this->Admin_model->get_type_name_by_id('categories','id', $product->category,'category_name') ?></a>
                                                            
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="ltn__product-details-menu-2">
                                                <ul>
                                                    
                                                    <li>
                                                        <a href="<?php echo base_url() ; ?>home/product_details/<?php echo $product->id ?>" class="theme-btn-1 btn btn-effect-1" title="View Details">
                                                            <i class="fas fa-eye"></i>
                                                            <span>VIEW PRODUCT</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="ltn__product-details-menu-3">
                                                <ul>
                                                    <li>
                                                       

                                                         <a href="#" title="Wishlist"  class="add_to_wishlist" data-productid="<?php echo $product->id ?>" >
                                                                <i class="far fa-heart"></i> <span>Add to Wishlist</span></a>

                                                    </li>
                                                     
                                                </ul>
                                            </div>
                                            <hr>
                                            <div class="ltn__social-media">
                                                <ul>
                                                    <li>Share:</li>
                                                    <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                                                    <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             </div>
                         </div>
                    </div>
                </div>
            </div>