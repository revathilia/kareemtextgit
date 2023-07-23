
                                 

                                    <?php if(!empty($product_images)){ foreach ($product_images as $primages) { 
                                            if(!empty($primages)){ ?>
                                       
                                       <?php 
                                       
                                    if(strpos($primages, "_color_") !== false){
                                        $imagename =  explode("_color_",$primages) ;
                                        $images = $imagename[0] ;
                                        $colorid = $imagename[1] ;

                                    } else{
                                        $images = $primages ;
                                        $colorid = 0 ;
                                    }


                                    
                                       ?>
                                      

                                          

                                         <div class="single-small-img colorimage color_<?php echo $colorid ; ?>">


                                            <img src="<?php echo base_url() ; ?>uploads/images/industry/<?php echo $images ?>"   alt="Image">
                                        </div>


                                                 
                                       <?php } }} ?>    

                                        