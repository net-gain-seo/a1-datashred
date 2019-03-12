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

<!----- FEATURED BLOGS ------> 
<?php 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
// are we on page one?
if(1 == $paged) {
?>

<div class="container-fluid" style="background-color:#E8E9EC;">
	<div class="container" style="">
		<div class="row">
			<div class="col col-12 ">
				<h2>FEATURED BLOGS</h2>
			</div>
		</div>
		<div class="row">
			<div class="featuredBlogCards">

				<?php 
			 	// WP_Query arguments
			    $args = array(
			        'post_type'   => 'post',
			        'post_status' => 'publish',
			        'posts_per_page' => 5,
			        'meta_query' => array(
			            array(
			                'key' 		=> 'is_featured',
			                'value'    	=> '1',
			                'compare'   => "=",
			            ),
			        )
			    );

			    // The Query
			    $query = new WP_Query( $args );

			    if(count($query->posts) > 0){
			    	$count = 0;
					while ( $query->have_posts() ) : $query->the_post(); 
						$count ++;

					

						if($count == 1){
							?>
							<div class="blogCardStyle1">
								<?php $imageUrl = get_the_post_thumbnail_url(get_the_ID(),'featuredBlogImage2'); ?>
								<div style="background-image: url('<?php echo $imageUrl; ?>');background-size: cover;"></div>
								<div class="blogCardPadding">
									<span class="date"><?php echo get_the_date(); ?></span>
									<h4><a href="<?php echo the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
									<p><?php echo substr(strip_tags(get_the_content()),0,100); ?></p>
								</div>
							</div>
							<?php 
						}elseif($count == 2){
							?>
							<div class="blogCardStyle2">
								<?php $imageUrl = get_the_post_thumbnail_url(get_the_ID(),'featuredBlogImage'); ?>
								<div class="blogCardPadding whiteText" style="background-image: url('<?php echo $imageUrl; ?>');background-size: cover;">
									<span class="date"><?php echo get_the_date(); ?></span>
									<h4><a href="<?php echo the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
									<p><?php echo substr(strip_tags(get_the_content()),0,100); ?></p>
								</div>
							</div>
							<?php
						}elseif($count === 3){
							?>
							<div class="blogCardStyle3">
								<div class="blogCardPadding">
									<span class="date"><?php echo get_the_date(); ?></span>
									<h4><a href="<?php echo the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
									<p><?php echo substr(strip_tags(get_the_content()),0,100); ?></p>
								</div>
							</div>
							<?php 
						}elseif($count === 4){
							?>
							<div class="blogCardFlexCol blogCardStyle4">
								<div>
									<span class="date"><?php echo get_the_date(); ?></span>
									<?php $imageUrl = get_the_post_thumbnail_url(get_the_ID(),'featuredBlogImage2'); ?>
									<img src="<?php echo $imageUrl; ?>" alt="<?php echo get_the_title(); ?>"  />
								</div>
								<div class="blogCardPadding">
									<h4><a href="<?php echo the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
								</div>
							</div>
							<?php 
						}elseif($count === 5){
							?>
							<div>
								<div class="blogCardStyle5 blogCardPadding whiteText blueBg">
									<span class="date"><?php echo get_the_date(); ?></span>
									<h4><a href="<?php echo the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
									<p><?php echo substr(strip_tags(get_the_content()),0,100); ?></p>
								</div>
							</div>
							<?php 
						}
				        
					endwhile; 
	       			wp_reset_postdata(); // Reset loop data
       			}
				?>
				
				
				
				
			</div>
		</div>
		
	</div>
</div>
<?php 
}
?>


<div class="container-fluid" style="background-color:#ffffff;">
	<div class="container" style="">
		<?php 
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post(); 
				//
				// Post Content here
				//

				?>
				<div class="row blogPost pb-0">
					<div class="col col-12">
						<p class="date"><?php echo get_the_date(); ?></p>
						<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
						<p><?php echo substr(strip_tags(get_the_content()),0,200); ?></p>
					</div>
				</div>
				<?php 

			} // end while
		} // end if
		?>
		

		<div class="row">
			<div class="col col-12">
				<div class="next-prev">
					<?php echo paginate_links(); ?>
	            </div>
			</div>
		</div>

	</div>
</div>







<?php get_footer();