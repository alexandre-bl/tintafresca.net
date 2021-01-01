<?php

/*Display custom meta description or the post excerpt */
function add_custom_meta_des(){

    #Homepage Meta Description
    if( is_home() || is_front_page() ){
        $meta_des = "Enter your homepage meta description here"; #Edit here
        echo '<meta name="description" content="' . $meta_des . '" />';
    }
    
    #Single Page Meta Description
    if( is_single() ){
        $des = get_post_meta( get_the_id(), 'description', true);
        if( ! empty( $des )  ){
            $meta_des = esc_html($des);
            echo '<meta name="description" content="' . $meta_des . '" />';
        }
    }}
    add_action( 'wp_head', 'add_custom_meta_des', 4 );

add_theme_support( 'custom-logo' );
add_theme_support( 'post-thumbnails' );

//require_once "admin_front/adds.php";