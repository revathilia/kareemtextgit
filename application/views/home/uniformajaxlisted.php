
                      <div class="ltn__shop-options">
                        <ul>
                            <li>
                                <div class="showing-product-number text-right">
                                   <?php echo $this->ajax_pagination->show_links(); ?>
                                </div>
                            </li>
                        </ul>
                    </div>




                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="liton_product_grid">
                            <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                                <div class="row">

                                    <!-- ltn__product-item -->
                                <?php if(!empty($products)){ foreach ($products as  $product) { ?>
                                    <div class="col-xl-4 col-sm-6 col-6">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="<?php echo base_url() ; ?>home/uniform_det/<?php echo $product['id'] ?>"><img src="<?php echo base_url() ; ?>uploads/images/school/<?php echo $product['product_image'] ?>" alt="#" width="160px" ></a>
                                                
                                                <div class="product-action">
                                                    <ul>
                                                        <li>
                                                            <a href="#" title="Quick View" class="quick_view" data-productid="<?php echo $product['id'] ?>">
                                                                <i class="far fa-eye"></i>
                                                            </a>
                                                        </li>
                                                       
                                                        <li>
                                                            <a href="#" title="Wishlist"  class="add_to_wishlist" data-productid="<?php echo $product['id'] ?>" >
                                                                <i class="far fa-heart"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                               
                                                <h2 class="product-title"><a href="<?php echo base_url() ; ?>home/uniform_det/<?php echo $product['id'] ?>">
                                                
                                               
                                            
                                                <?php 
if($this->session->userdata('lang') == 'ar'){
     echo $product->ar_product_name ;
}else{
     echo $product->product_name ;
}
                                                    ?>
                                                    
                                                </a></h2>
                                                <?php  $product_price = $this->Admin_model->get_single_data('school_product_price_size_det',array('product_id'=>$product['id'],'status'=>'Y'));  
  ?>
                                                <div class="product-price">
<?php  if($product_price){  ?>
                                                <span><?php echo $this->Admin_model->translate("SAR") ; ?> <?php echo  ($product_price->offer_price != '0') ? $product_price->offer_price : $product_price->product_price ; ?></span>
                                         
                                                <?php echo  ($product_price->offer_price != '0') ? '<del>'.$this->Admin_model->translate("SAR").' ' .$product_price->product_price .'</del>' :  '' ; ?> 

<?php } ?>
 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     <?php  } } else{ ?>
                                     <div class="ltn__shop-options">
                        <ul>
                            <li>
                                <?php echo $this->Admin_model->translate("No Result Found !!") ; ?>
                            </li>
                        </ul>
                    </div>
                               <?php  }  ?>                       
                                    <!--  -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="liton_product_list">
                            <div class="ltn__product-tab-content-inner ltn__product-list-view">
                                <div class="row">
                                              <?php if(!empty($products)) { foreach ($products as  $product) { ?>                            
                                       <!-- ltn__product-item -->
                                       <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-3">
                                             <div class="product-img">
                                                <a href="<?php echo base_url() ; ?>home/uniform_det/<?php echo $product['id'] ?>"><img src="<?php echo base_url() ; ?>uploads/images/school/<?php echo $product['product_image'] ?>" alt="#"></a>
                                                
                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="<?php echo base_url() ; ?>home/uniform_det/<?php echo $product['id'] ?>">
                                               
                                                <?php 
if($this->session->userdata('lang') == 'ar'){
     echo $product->ar_product_name ;
}else{
     echo $product->product_name ;
}
                                                    ?>
                                                    </a></h2>
                                             

                                              <?php  $product_price = $this->Admin_model->get_single_data('school_product_price_size_det',array('product_id'=>$product['id'],'status'=>'Y'));  
  ?>

  
                                                <div class="product-price">
                                                   <span><?php echo $this->Admin_model->translate("SAR") ; ?> <?php echo  ($product_price->offer_price != '0') ? $product_price->offer_price : $product_price->product_price ; ?></span>
                                         
                                                <?php echo  ($product_price->offer_price != '0') ? '<del>'.$this->Admin_model->translate("SAR").' ' .$product_price->product_price .'</del>' :  '' ; ?> 
                                                </div>
                                                <div class="product-brief">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae asperiores sit odit nesciunt,  aliquid, deleniti non et ut dolorem!</p>
                                                </div>
                                                <div class="product-hover-action">
                                                    <ul>
                                                        <li>
                                                            <a href="#" title="Quick View" class="quick_view" data-productid="<?php echo $product['id'] ?>">
                                                                <i class="far fa-eye"></i>
                                                            </a>
                                                        </li>
                                                       
                                                        <li>
                                                            <a href="#" title="Wishlist"  class="add_to_wishlist" data-productid="<?php echo $product['id'] ?>" >
                                                                <i class="far fa-heart"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } } else{ ?>
                                     <div class="ltn__shop-options">
                        <ul>
                            <li>
                                 <?php echo $this->Admin_model->translate("No Result Found !!") ; ?>
                            </li>
                        </ul>
                    </div>
                               <?php  }  ?> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ltn__pagination-area text-center">
                        <div class="ltn__pagination">

                            <?php echo $this->ajax_pagination->create_links(); ?>


                        </div>
                    </div>
                