<?php
/**
 * Tag Main File.
 *
 * @package VOSIO
 * @author  Themewisdom
 * @version 1.0
 */

get_header();
global $wp_query;
$data  = \VOSIO\Includes\Classes\Common::instance()->data( 'tag' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
$layout = ( $layout ) ? $layout : 'right';
$sidebar = ( $sidebar ) ? $sidebar : 'default-sidebar';
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-lg-8 col-md-12 col-sm-12';
if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'tpl-type' ) == 'e' AND $data->get( 'tpl-elementor' ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'tpl-elementor' ) );
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
                <div class="blog__list">
                    <div class="thm-unit-test">
                        
                        <?php
                            while ( have_posts() ) :
                                the_post();
                                vosio_template_load( 'templates/blog/blog.php', compact( 'data' ) );
                            endwhile;
                            wp_reset_postdata();
                        ?>
                            
                    </div>
                    
                    <!--Pagination-->
                    <div class="blog__pagination wow wcfadeUp">
                    	<?php vosio_the_pagination( $wp_query->max_num_pages );?>
                    </div>
                </div>
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
