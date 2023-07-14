   <!-- HEADER AREA START (header-5) -->

   <header class="ltn__header-area ltn__header-mi ltn__header-logo-and-mobile-menu-in-mobile--- ltn__header-logo-and-mobile-menu--- ltn__header-transparent gradient-color-4---">
      
        <!-- ltn__header-middle-area start -->
        <div class="ltn__header-middle-area2 ltn__logo-right-menu-option ltn__header-row-bg-white ltn__header-padding ltn__header-sticky ltn__sticky-bg-white">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="site-logo-wrap">
                            <div class="site-logo">
                                <a href="index.html"><img src="<?php echo base_url()?>assets/home_assets/img/logo.png" alt="Logo"></a>
                            </div>
                            <div class="get-support clearfix d-none">
                                <div class="get-support-icon">
                                    <i class="icon-call"></i>
                                </div>
                                <div class="get-support-info">
                                    <h6>Get Support</h6>
                                    <h4><a href="tel:+123456789">123-456-789-10</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col header-menu-column menu-color-white---">
                        <div class="header-menu d-none  d-xl-block">
                            <nav>
                                <div class="ltn__main-menu menu-header2">
                                    <ul>
                                        <li><a href="<?php echo base_url()?>home">Home</a>
                            
                                        </li>
                                        <li ><a href="<?php echo base_url()?>home/about"> About Us</a>
                                          
                                        </li>
                                        
                                        <li><a href="<?php echo base_url()?>home/contact">Contact Us</a></li>
                                       
                                        <li> 
                                            <div class=" switch_sec">
            <!-- <a href="">AR</a> -->
        <?php 
 $session = $this->session->userdata('lang'); 
 if($session =='eng') {?>
       <a class=" nav-link lang_switch" onclick="langAjax('ar')">AR</a>
    <?php } else {?>

      <a class=" nav-link lang_switch" onclick="langAjax('eng')">  EN</a>
    <?php } ?>
        </div>
      
      </li>
                                        
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="col--- ltn__header-options ltn__header-options-2 mb-sm-20">
                        <!-- header-search-1 -->
                        <div class="header-search-wrap search-whi">
                            <div class="header-search-1">
                                <div class="search-icon">
                                    <i class="icon-search for-search-show"></i>
                                    <i class="icon-cancel  for-search-close"></i>
                                </div>
                            </div>
                            <div class="header-search-1-form">
                                <form id="#" method="get"  action="#">
                                    <input type="text" name="search" value="" placeholder="Search here..."/>
                                    <button type="submit">
                                        <span style="color:#fff"><i class="icon-search"></i></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <!-- user-menu -->
                        <div class="ltn__drop-menu user-menu">
                            <ul>
                                <li>
                                    <a href="#"><i class="icon-user" style="color:#fff"></i></a>
                                   <ul>
                                        <?php if(empty($this->session->userdata('customerdet'))){ ?>
                                        <li><a href="<?php echo base_url()?>home/login">Sign in</a></li>
                                        <?php } else {?>
                                        <li><a href="<?php echo base_url()?>home/wishlist">Wishlist</a></li>
                                        <li><a href="<?php echo base_url()?>home/profile">Profile</a></li>
                                        <li><a href="<?php echo base_url()?>home/logout">Sign out</a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- mini-cart -->
                        <div class="mini-cart-icon">
                            <a href="#ltn__utilize-cart-menu" class="ltn__utilize-toggle">
                                <i class="icon-shopping-cart"  style="color:#fff"></i>
                                 <sup id="cartitem"></sup>
                            </a>
                        </div>
                        <!-- mini-cart -->
                        <!-- Mobile Menu Button -->
                        <div class="mobile-menu-toggle d-xl-none">
                            <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                                <svg viewBox="0 0 800 600">
                                    <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                                    <path d="M300,320 L540,320" id="middle"></path>
                                    <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ltn__header-middle-area end -->
    </header>
    <!-- HEADER AREA END -->

    <!-- Utilize Cart Menu Start -->
     <div id="ltn__utilize-cart-menu" class="ltn__utilize ltn__utilize-cart-menu">
        <div class="ltn__utilize-menu-inner ltn__scrollbar">
            <div class="ltn__utilize-menu-head">
                <span class="ltn__utilize-menu-title">Cart</span>
                <button class="ltn__utilize-close">×</button>
            </div>


            <?php  $cart_check = $this->cart->contents();

// If cart is empty, this will show below message.
if(empty($cart_check)) {
echo 'Your cart is empty !!!'; 
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
                        <a href="#"><img src="<?php echo base_url()?>assets/home_assets/img/product/1.png" alt="Image"></a>

                        


                        <span class="mini-cart-item-delete" onclick="itemremove('<?php echo $item['rowid'] ; ?>');  return false ;" ><i class="icon-cancel"></i></span>
                    </div>
                    <div class="mini-cart-info">
                    
                        <h6><a href="#"><?php echo $item['name'] ;?></a></h6>
                        <span class="mini-cart-quantity"><?php echo $item['qty'] ;?> x SAR <?php echo $item['price'] ;?> </span>
                    </div>
                </div>
                 
                
            </div>

              <?php $subtotal = $item['subtotal'] + $subtotal ;
                                        $shipping = 0 ;
                                        $vat = 0 ;?>

        <?php } ?>
            <div class="mini-cart-footer">
                <div class="mini-cart-sub-total">
                    <h5>Subtotal: <span>SAR <?php echo  $subtotal ;?> </span></h5>
                </div>
                <div class="btn-wrapper">
                    <a href="<?php echo base_url()?>home/viewcart" class="theme-btn-1 btn btn-effect-1">View Cart</a>
                    <a href="<?php echo base_url()?>home/checkout" class="theme-btn-2 btn btn-effect-2">Checkout</a>
                </div>
                <p>Free Shipping on All Orders Over $100!</p>
            </div>

        <?php endif; ?>

        </div>
    </div>
    <!-- Utilize Cart Menu End -->

    <!-- Utilize Mobile Menu Start -->
    <div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
        <div class="ltn__utilize-menu-inner ltn__scrollbar">
            <div class="ltn__utilize-menu-head">
                <div class="site-logo">
                    <a href="index.html"><img src="<?php echo base_url()?>assets/home_assets/img/logo.png" alt="Logo"></a>
                </div>
                <button class="ltn__utilize-close">×</button>
            </div>
            <div class="ltn__utilize-menu-search-form">
                <form action="#">
                    <input type="text" placeholder="Search...">
                    <button><i class="fas fa-search"></i></button>
                </form>
            </div>
            <div class="ltn__utilize-menu">
                <ul>
                    <li><a href="home.php">Home</a>
                      
                    </li>
                    <li><a href="#about">About</a>
                       
                    </li>
                   
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
            <div class="ltn__utilize-buttons ltn__utilize-buttons-2">
                <ul>
                   
                    <li>
                        <a href="wishlist.php" title="Wishlist">
                            <span class="utilize-btn-icon">
                                <i class="far fa-heart"></i>
                                <sup>3</sup>
                            </span>
                            Wishlist
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>home/viewcart" title="Shoping Cart">
                            <span class="utilize-btn-icon">
                                <i class="fas fa-shopping-cart"></i>
                                <sup>5</sup>
                            </span>
                            Shoping Cart
                        </a>
                    </li>
                </ul>
            </div>
            <div class="ltn__social-media-2">
                <ul>
                    <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                    <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Utilize Mobile Menu End -->