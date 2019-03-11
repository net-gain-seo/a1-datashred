<?php
    get_header();
?>

<?php
while ( have_posts() ) : the_post();
    if(has_post_thumbnail()) {
    	$imageUrl = get_the_post_thumbnail_url();

        echo '<div class="mast home-mast parallax" style="background-image:url(\''.$imageUrl.'\')">';
            
            $mast_title       = get_post_meta( get_the_ID(), 'mast_title', true );
            $mast_description = get_post_meta( get_the_ID(), 'mast_description', true );

            if( !empty($mast_title) ) {
            	echo '<div class="container-fluid ">';
	                echo '<div class="container ">';
                		echo '<div class="row">';
                			echo '<div class="mast_title">';
			                    echo $mast_title;
		                    echo '</div>';
	                    echo '</div>';
                    echo '</div>';
                echo '</div>';

            	echo '<div class="container-fluid  redBg">';
	                echo '<div class="container">';
	                    echo '<div class="row">';
		                    if( !empty($mast_description) ) {
		                        echo do_shortcode(wpautop( $mast_description ));
		                    }
	                    echo '</div>';
	                echo '</div>'; // End of mast-overlay container
                echo '</div>';
            }
        echo '</div>'; // End of page-mast container
    }
 ?>

<?php

    the_content();
endwhile;

get_footer();
