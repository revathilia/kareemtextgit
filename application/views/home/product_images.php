
                                       <div class="ltn__shop-details-large-img">


                                          <?php if(!empty($product_images)){ foreach ($product_images as $images) { 
                                            if(!empty($images)){ ?>
                                       
                                        

                                         <div class="single-large-img" dir="rtl">
                                            <div class="row single-bg">
                                            <div class="col-md-6">
                                                <div class="btn_bg">
                                        <a href="#" title="Wishlist" 
                                        class="add_to_wishlist" data-productid="<?php echo $product_id ?>" >
                                            <i class="far fa-heart"></i><?php echo $this->Admin_model->translate("Favourites") ; ?></a>
</div>
</div>
<div class="col-md-6">
                                            <div class="btn_wrap">
        <span><?php echo $this->Admin_model->translate("Share") ; ?></span>
        <div class="container">
            <i class="fab fa-facebook-f"></i>
            <i class="fab fa-twitter"></i>
            <i class="fab fa-instagram"></i>
            <i class="fab fa-github"></i>
        </div>
    </div>
</div>
</div>

                                            <a href="<?php echo base_url() ; ?>uploads/images/industry/<?php echo $images ?>" data-rel="lightcase:myCollection">
                                                <img src="<?php echo base_url() ; ?>uploads/images/industry/<?php echo $images ?>" alt="Image">
                                            </a>
                                        </div>


                                                 
                                       <?php } }} ?>  

                                         
                                    </div>
                                    <div class="ltn__shop-details-small-img slick-arrow-2" >

                                          <?php 
 
                                         if(!empty($product_images)){ foreach ($product_images as $images) { 
                                            if(!empty($images)){ ?>
                                      

                                          

                                         <div class="single-small-img">
                                            <img src="<?php echo base_url() ; ?>uploads/images/industry/<?php echo $images ?>" alt="Image">
                                        </div>


                                                 
                                       <?php } }} ?>    

                                       
                                        
                                    </div>
                <!-- All JS Plugins -->
    <script src="<?php echo base_url() ; ?>assets/home_assets/js/plugins.js"></script>
    <!-- Main JS -->
    <script src="<?php echo base_url() ; ?>assets/home_assets/js/main.js"></script>