<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
   <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />
    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

   <header class="site-header">
      <div class="container-fluid logoContainer">
        <div class="container">
           <div class="row">
              <div>
                <a id="logo" href="<?php bloginfo('url') ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/a1-data-shred-logo.png" /></a>
              </div>
              <div class="reviewSection">
                <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/review-us-on-google.png" /></a>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/1-888-95-shred.png" />
              </div>
           </div>
        </div>
      </div>
      <div class="container-fluid menuContainer">
        <div class="container">
           <div class="row"> 
              <nav id="mainNav">
                <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container' => '' ) ); ?>
              </nav>
           </div>
         </div>
        </div>
      </div>
   </header>

   

<main>