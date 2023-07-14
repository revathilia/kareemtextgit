
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
                                   
                                    <?php if(!empty($schools)){ foreach ($schools as $school) { ?>
                                     <!-- ltn__product-item -->
                                   <div class="col-xl-3 col-lg-4 col-sm-6 col-6">
                                        <div class="ltn__product-item ltn__product-item-3 text-center" >
                                            <div class="product-img">
                                                <a  href="javascript:void(0)" class="addtocart" data-productid="<?php echo $school['id'] ; ?>"  ><img src="<?php echo base_url()?>uploads/images/school/<?php echo $school['school_logo'] ?>" alt="#" width="160px" ></a>
                                                
                                               
                                            </div>
                                            <div class="product-info">
                                                <br><br>
                                                <h2 class="product-title"><a href="<?php echo base_url()  ?>home/uniforms/<?php echo  $school['id'] ?>">

                                                 
                                                    
                                                    <?php 
if($this->session->userdata('lang') == 'ar'){
     echo $school['ar_school_name'] ;
}else{
     echo $school['school_name'] ;
}
                                                    ?>


                                                  </a></h2>
                                               
                                            </div>
                                        </div>
                                    </div>
                                   <?php } } else{ ?>
 <div class="ltn__shop-options">
                        <ul>
                            <li>
                                 No Result Found !!
                            </li>
                        </ul>
                    </div>
                                  <?php } ?> 
                                      
                                    
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="liton_product_list">
                            <div class="ltn__product-tab-content-inner ltn__product-list-view">
                                <div class="row">
                                  
                                <?php foreach ($schools as $school) { ?>
                                   <!-- ltn__product-item -->
                                   <div class="col-lg-12" >
                                        <div class="ltn__product-item ltn__product-item-3">
                                            <div class="product-img" >
                                                <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal" ><img src="<?php echo base_url()?>uploads/images/school/<?php echo $school['school_logo'] ?>" alt="#"></a>
                                                
                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="<?php echo base_url()  ?>home/uniforms/<?php echo  $school['id'] ?>">

                                                    <?php 
if($this->session->userdata('lang') == 'ar'){
     echo $school['ar_school_name'] ;
}else{
     echo $school['school_name'] ;
}
                                                    ?>


                                                   </a></h2>
                                              
                                               
                                                <div class="product-brief">
                                                    <p>

                                                        <?php 
if($this->session->userdata('lang') == 'ar'){
     echo $school['ar_description'] ;
}else{
     echo $school['description'] ;
}
                                                    ?>

                                                   </p>
                                                </div>
                                                 
                                            </div>
                                        </div>
                                    </div>

                                  <?php } ?>
                                    <!--  -->
                                </div>
                            </div>
                        </div>
                    </div>
 

                
                    <div class="ltn__pagination-area text-center">
                        <div class="ltn__pagination">

                            <?php echo $this->ajax_pagination->create_links(); ?>


                        </div>
                    </div>
                