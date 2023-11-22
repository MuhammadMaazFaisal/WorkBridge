<?php
/**
 * Default Template Main File.
 *
 * @package VOSIO
 * @author  Themewisdom
 * @version 1.0
 */

get_header();
$data  = \VOSIO\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
$layout = ( $layout ) ? $layout : 'right';
$sidebar = ( $sidebar ) ? $sidebar : 'default-sidebar';
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-lg-8 col-md-12 col-sm-12';
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
                            
                        <?php while ( have_posts() ): the_post(); ?>
                            <?php the_content(); ?>
                        <?php endwhile; ?>
                        
                        <div class="clearfix"></div>
                        <?php
                        $defaults = array(
                            'before' => '<div class="paginate-links">' . esc_html__( 'Pages:', 'vosio' ),
                            'after'  => '</div>',
        
                        );
                        wp_link_pages( $defaults );
                        ?>
                        <?php comments_template() ?>
                     
                     </div>
                 </div>
            </div>
            <?php
				if ( $layout == 'right' ) {
					$data->set('sidebar', 'default-sidebar');
					do_action( 'vosio_sidebar', $data );
				}
            ?>        
        </div>
	</div>
</div><!-- blog section with pagination -->
<?php get_footer(); ?>
