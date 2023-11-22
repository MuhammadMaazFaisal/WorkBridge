<?php
/**
 * Banner Template
 *
 * @package    WordPress
 * @subpackage Themewisdom
 * @author     Themewisdom
 * @version    1.0
 */

if ( $data->get( 'enable_banner' ) AND $data->get( 'banner_type' ) == 'e' AND ! empty( $data->get( 'banner_elementor' ) ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'banner_elementor' ) );

	return false;
}

?>
<?php if ( $data->get( 'enable_banner' ) ) : ?>

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
        
<?php endif; ?>