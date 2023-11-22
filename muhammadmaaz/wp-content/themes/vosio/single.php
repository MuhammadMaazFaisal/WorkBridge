<?php
/**
 * Blog Post Main File.
 *
 * @package VOSIO
 * @author  Themewisdom
 * @version 1.0
 */

get_header();
$options = vosio_WSH()->option();

$data    = \VOSIO\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12 col-lg-12' : 'col-lg-8 col-md-12 col-sm-12';


if ( class_exists( '\Elementor\Plugin' ) && $data->get( 'tpl-type' ) == 'e') {
	
	while(have_posts()) {
	   the_post();
	   the_content();
    }

} else {
?>

<?php if ( $data->get( 'enable_banner' ) ) : ?>
	<?php do_action( 'vosio_banner', $data );?>
<?php else:?>
<!-- Page Title -->
<section class="page-title" id="to-top-div">
    <div class="auto-container">
        <h1><span><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( the_title( ) ); ?></span></h1>
        <div class="bread-crumb">
            <ul class="clearfix">
                <?php echo vosio_the_breadcrumb(); ?>
            </ul>
        </div>
    </div>
</section>
<!--End Banner Section -->
<?php endif;?>

<!--Sidebar Page-->
<div class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">   	
        	<?php
				if ( $data->get( 'layout' ) == 'left' ) {
					do_action( 'vosio_sidebar', $data );
				}
			?>
            <div class="content-side <?php echo esc_attr( $class ); ?>">            	
				<?php while ( have_posts() ) : the_post(); ?>
                <div class="content-inner">
                    <div class="blog-details">
                        <div class="image-box"><?php the_post_thumbnail('vosio_1170x395'); ?></div>
                		<div class="lower">                            
                            <div class="info"><div class="cat i-block"><i class="far fa-folder"></i> <?php the_category(' '); ?></div><div class="time i-block"><i class="far fa-clock"></i> <?php echo get_the_date(); ?></div></div>
                            <div class="text-content text">
                                <div class="text"><?php the_content(); ?></div>
                                <div class="clearfix"></div>
                                <?php wp_link_pages(array('before'=>'<div class="paginate-links m-t30">'.esc_html__('Pages: ', 'vosio'), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>
                            </div>
                            <?php if(has_tag()){ ?>
                            <div class="post-tags">
                            	<span class="ttl"><?php esc_html_e('Tags:', 'vosio'); ?></span> 
                                <?php the_tags( '', ' ', '' ); ?>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php if( $options->get( 'single_post_author' ) ):?>
                    <div class="post-author">
                        <div class="inner-box">
                            <div class="inner">
                                <div class="image"><?php echo get_avatar(get_the_author_meta('ID'), 140); ?></div>
                                <h5><?php esc_html_e('About', 'vosio'); ?> <?php the_author(); ?></h5>
                                <div class="text"><?php the_author_meta( 'description', get_the_author_meta('ID') ); ?></div>
                            </div>
                        </div>
                    </div>
                    <?php endif;?>
                    
                    <!--End post-details-->
                    <?php comments_template(); ?>
                    
                </div>
                <!--End thm-unit-test-->
                <?php endwhile; ?>               
            </div>
        	<?php
				if ( $data->get( 'layout' ) == 'right' ) {
					do_action( 'vosio_sidebar', $data );
				}
			?>
        </div>
    </div>
</div>
<!--End blog area--> 

<?php
}
get_footer();
