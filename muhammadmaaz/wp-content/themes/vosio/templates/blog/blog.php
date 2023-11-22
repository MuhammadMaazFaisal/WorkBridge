<?php

/**
 * Blog Content Template
 *
 * @package    WordPress
 * @subpackage VOSIO
 * @author     Themewisdom
 * @version    1.0
 */

if (class_exists('Vosio_Resizer')) {
    $img_obj = new Vosio_Resizer();
} else {
    $img_obj = array();
}
$options = vosio_WSH()->option();
$allowed_tags = wp_kses_allowed_html('post');

global $post;
$post_thumbnail_id = get_post_thumbnail_id($post->ID);
$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);

?>


<div <?php post_class(); ?>>
	
    <div class="content-inner">
        <div class="blog-details">
            <div class="image-box"><?php the_post_thumbnail('vosio_1170x395'); ?></div>
            <div class="lower">
                <h3><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h3>
                <div class="info"><div class="cat i-block"><i class="far fa-folder"></i> <?php the_category(' '); ?></div><div class="time i-block"><i class="far fa-clock"></i> <?php echo get_the_date(); ?></div></div>
                <div class="text-content text">
                    <?php the_excerpt(); ?>
                </div>
                <div class="link-box"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>" class="theme-btn"><?php esc_html_e('Read More', 'vosio'); ?> <i class="far fa-long-arrow-alt-right"></i></a></div>
            </div>
        </div>
	</div>	 
    
</div>