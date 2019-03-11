<?php
function my_theme_enqueue_styles() {

    $parent_style = 'ns_main';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/main.css' );
    wp_enqueue_style( 'child_main',
        get_stylesheet_directory_uri() . '/main.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
    wp_enqueue_style( 'Lato', 'https://fonts.googleapis.com/css?family=Lato' );
    wp_enqueue_style('Roboto', 'https://fonts.googleapis.com/css?family=Roboto+Condensed');


}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function ns_child_scripts() {

    //wp_enqueue_script( 'child-custom', get_bloginfo('template_url') . '/js/custom.js', 'jquery', '1.6.0', true );

}
add_action( 'wp_enqueue_scripts', 'ns_child_scripts' );








/**
 * SHORTCODES
 *
 */


function latest_news() {
    extract( shortcode_atts( array(
        'class' => '',
        'title' => '',
        'link' => '',
        'category' => ''
      ), $atts )
    );
    if(isset($category) && $category != '') {
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 4,
            'orderby' => 'date',
            'order' => 'DESC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'post',
                    'terms' => $category,
                    'field' => 'name'
                )
            )
        );
    }
    else {
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 3,
            'orderby' => 'date',
            'order' => 'DESC'
        );
    }

    $posts = new WP_Query($args);
    $return = '';

     $return .= '<div class="recentPosts">';
    while($posts->have_posts()) : $posts->the_post();
        $terms = wp_get_post_terms(get_the_ID(),'category');
        $parentCategory = get_the_terms(get_the_ID(),"category");
        $postTags = get_the_tags();

        $return .= '<div class="recentPost">';
            $return .= '<span class="date">'.get_the_date().'</span>';
            $return .= '<h3 class="postTitle"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3>';
            $return .= '<p>'.substr(strip_tags(get_the_content()),0,100).'...</p>';
        $return .= '</div>';
    endwhile;
    $return .= '</div>';

    return $return;
}
add_shortcode('latest_news','latest_news');




function a1_testimonial_slider($atts) {
    extract( shortcode_atts( array(
        'class' => '',
        'category' => ''
      ), $atts ) );

    // WP_Query arguments
    if($category != '') {
        $args = array(
            'post_type'   => 'testimonials',
            'post_status' => 'published',
            'tax_query' => array(
                array(
                    'taxonomy' => 'testimonial_category',
                    'field'    => 'slug',
                    'terms'    => $category,
                ),
            )
        );
    }
    else {
        $args = array(
            'post_type'   => 'testimonials',
            'post_status' => 'published',
        );
    }


    // The Query
    $query = new WP_Query( $args );

    $content = do_shortcode( shortcode_unautop( $content ) );
    $content = stripParagraphs($content);

    $return = '';

    $return .= '<div id="testimonials" class="testimonials-slider">';
        foreach( $query->posts as $post ) {
            $return .= '<div class="testimonial">';
                $excerpt = str_replace('"', '', $post->post_content);
                $return .= '<div>';
                    $return .= do_shortcode($excerpt);
                $return .= '</div>';

                 

            $return .= '</div>';
        }
    $return .= '</div>';
    
    return $return;
}
add_shortcode('a1_testimonial_slider','a1_testimonial_slider');





function service_item($atts) {
    extract( shortcode_atts( array(
        'class' => '',
        'link' => '#',
        'title' => '',
        'content' => ''
      ), $atts ) );

       $return = '';

    $return .= '<a href="'.$link.'" class="service_item">';
        $return .= '<img src="'.get_stylesheet_directory_uri().'/assets/images/icons/check-mark.png" />';
        $return .= '<h5>'.$title.'</h5>';
        $return .= '<p>'.$content.'</p>';
    $return .= '</a>';
    
    return $return;
}
add_shortcode('service_item','service_item');