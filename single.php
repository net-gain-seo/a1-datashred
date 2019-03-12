<?php get_header(); ?>


<?php
$blogPageId = 68;
if(has_post_thumbnail($blogPageId)) {
    $imageUrl = get_the_post_thumbnail_url($blogPageId);

    echo '<div class="mast innerPage" style="background-image:url(\''.$imageUrl.'\')">';
        
        $mast_title       = get_post_meta( $blogPageId, 'mast_title', true );
        $mast_description = get_post_meta( $blogPageId, 'mast_description', true );

        if( !empty($mast_title) ) { 
            echo '<div class="container-fluid ">';
                echo '<div class="container ">';
                    echo '<div class="row">';
                        echo '<div class="col col-6 mast_content">';
                            echo $mast_title;
                            if( !empty($mast_description) ) {
                                echo do_shortcode(wpautop( $mast_description ));
                            }
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }
    echo '</div>'; // End of page-mast container
}
 ?>


<div class="container-fluid" style="background-color:#ffffff;">
    <div class="container" style="">
        <?php while ( have_posts() ) : the_post(); ?>
        <div class="row">
            <div class="col col-12 ">
                <?php
                    if ( has_post_thumbnail() ) {
                        echo '<div style="margin-bottom:30px;">';
                            the_post_thumbnail();
                        echo '</div>';
                    } 

                    echo '<h2>'.get_the_title().'</h2>';
                    the_content();

                    echo '<p class="date">'.get_the_date().'</p>';

                ?>
            </div>
        </div>

        <?php endwhile; ?>
    </div>
</div>
<?php
get_footer();
