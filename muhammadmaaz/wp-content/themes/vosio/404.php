<?php
/**
 * 404 page file
 *
 * @package    WordPress
 * @subpackage Vosio
 * @author     Template Path <admin@template_path.com>
 * @version    1.0
 */

$allowed_html = wp_kses_allowed_html( 'post' );
?>
<?php get_header();
$data = \VOSIO\Includes\Classes\Common::instance()->data( '404' )->get();
$options = vosio_WSH()->option();
if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'tpl-type' ) == 'e' AND $data->get( 'tpl-elementor' ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'tpl-elementor' ) );
} else {
?>

<?php if ( $data->get( 'enable_banner' ) ) : ?>
	<?php do_action( 'vosio_banner', $data );?>
<?php else:?>
<?php endif;?>    
    
    
    <!-- Error Section -->
    <div class="error-section">
    	<div class="auto-container">
        	<div class="content">
				<h1>
                	<?php if( $options->get( '404_page_sub_title' ) ):?>
							<?php echo wp_kses( $options->get( '404_page_sub_title' ), true );?>
                    <?php else:?>
                            <?php esc_html_e( '404', 'vosio' );?>
                    <?php endif;?>
                </h1>
				<h2>
                	<?php if( $options->get( '404_page_title' ) ):?>
							<?php echo wp_kses( $options->get( '404_page_title' ), true );?>
                    <?php else:?>
                            <?php esc_html_e( 'Oops... It looks like you ‘re lost !', 'vosio' );?>
                    <?php endif;?>
                </h2>
				<div class="text">
                	<?php if( $options->get( '404_page_text' ) ):?>
							<?php echo wp_kses( $options->get( '404_page_text' ), true );?>
                    <?php else:?>
                            <?php esc_html_e( 'Oops! The page you are looking for does not exist. It might have been moved or deleted.', 'vosio' );?>
                    <?php endif;?>
                </div>
				<!-- Button Box -->
                <?php if ( $options->get( 'back_home_btn', true ) ) : ?>
                <div class="button-box text-center">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="theme-btn btn-style-one">
                    	<span class="btn-wrap">
							<span class="text-one">
								<?php 
                                    if( $options->get( 'back_home_btn_label' ) ){
                                        echo wp_kses( $options->get( 'back_home_btn_label' ), true );
                                    }else{
                                        esc_html_e( 'Back to Home', 'vosio' );
                                    }
                                ?>
                            </span>
                        </span>
                    </a>
 				</div>
                <?php endif; ?>
			</div>
		</div>
	</div>
	<!-- End Error Section -->
    
        
<?php
}
get_footer('coming-soon-3'); ?>
