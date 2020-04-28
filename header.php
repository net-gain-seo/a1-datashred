<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <nav id="mobileNav">
    <a href="#" class="btn mobileMenuToggle">Close</a>
    <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container' => '' ) ); ?>
  </nav>

   <header class="site-header">
      <div class="container-fluid logoContainer">
        <div class="container">
           <div class="row">
              <div>
                <a id="logo" href="<?php bloginfo('url') ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/a1-data-shred-logo.png" /></a>
              </div>
              <div class="reviewSection">
                <a href="https://www.google.com/search?q=a1+datashred+boston&oq=a1+datashred+boston&aqs=chrome..69i57.3087j1j7&sourceid=chrome&ie=UTF-8#lrd=0x89e371c55da4250d:0x445a24481af83378,1,,," target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/review-us-on-google.png" alt="Review us on Google" /></a>
                <a href="tel:19788580200" class="nav-phone"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/1-888-95-shred.png"/></a>
              </div>
           </div>
        </div>
      </div>
      <div class="menuContainer">
        
        <div class="container-fluid callContainer">
          <div class="container">
             <div class="row"> 
              <div class="col col-12 text-center">
                <a href="tel:19788580200" class="nav-phone"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/1-888-95-shred.png" /></a>
              </div>
             </div>
           </div>
        </div>

        <div class="container-fluid menuSection">
          <div class="container">
             <div class="row"> 
                <nav id="mainNav">
                  <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container' => '' ) ); ?>
                </nav>

                <div id="mobileNavButtons">
                  <a href="javascript:void(0);" class="mobileMenuToggle">
                    <i class="fa fa-bars"></i>
                    <span>MENU</span>
                  </a>
                  <a href="tel:19788580200" class="nav-phone">
                    <i class="fa fa-phone"></i>
                    <span>CALL</span>
                  </a>

                  <a href="<?php echo bloginfo('url'); ?>/contact-us/" class="nav-contact">
                    <i class="fa fa-envelope"></i>
                    <span>CONTACT</span>
                  </a>
                </div>
             </div>
           </div>
          </div>
        </div>
      </div>
   </header>


<div class="modal" id="quotePop" style="margin-top:20px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <span class="h1 largeHeading" style="display:block;margin-left: 10px;margin-top: 20px; margin-bottom: 0">Get Quote</span>
        <?php echo do_shortcode('[contact-form-7 id="402" title="Contact form 1"]'); ?>
      </div>
    </div>
  </div>
</div>
   

<main>