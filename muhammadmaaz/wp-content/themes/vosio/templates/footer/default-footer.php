<?php
/**
 * Footer Template  File
 *
 * @package VOSIO
 * @author  Template Path
 * @version 1.0
 */

$options = vosio_WSH()->option();

$footer_logo_img_v1 = $options->get( 'footer_logo_img_v1' );
$footer_logo_img_v1 = vosio_set( $footer_logo_img_v1, 'url', VOSIO_URI . 'assets/images/logo.png' );

$allowed_html = wp_kses_allowed_html( 'post' );

?>

<!--Main Footer-->
<footer class="main-footer">
    <button class="scroll-top scroll-to-target" data-target="html" id="scroll-to-top"><span class="icon fa fa-arrow-alt-circle-up"></span></button>
    <div class="footer-inner">
        <div class="auto-container">
            <div class="footer-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($footer_logo_img_v1); ?>" alt="<?php esc_attr_e('Awesome Image', 'vosio'); ?>"></a></div>
            <?php if($options->get( 'footer_v1_address_title') || $options->get( 'footer_v1_address') || $options->get( 'footer_v1_contact_title') || $options->get( 'footer_v1_phone_no') || $options->get( 'footer_v1_email_address')) {?>
            <div class="info">
                <div class="row clearfix">
                    <!--Block-->
                    <div class="info-block col-lg-6 col-md-6 col-sm-12">
                        <?php if($options->get( 'footer_v1_address_title' )){?><div class="i-title"><?php echo wp_kses( $options->get( 'footer_v1_address_title'), $allowed_html ); ?></div><?php } ?>
                        <?php if($options->get( 'footer_v1_address' )){?><div class="text"><?php echo wp_kses( $options->get( 'footer_v1_address'), $allowed_html ); ?></div><?php } ?>
                    </div>
                    <!--Block-->
                    <div class="info-block col-lg-6 col-md-6 col-sm-12">
                        <?php if($options->get( 'footer_v1_contact_title' )){?><div class="i-title"><?php echo wp_kses( $options->get( 'footer_v1_contact_title'), $allowed_html ); ?></div><?php } ?>
                        <div class="text"><a href="tel:<?php echo esc_attr($options->get('footer_v1_phone_no'));?>"><?php echo wp_kses( $options->get( 'footer_v1_phone_no'), $allowed_html ); ?></a> <br> <a href="mailto:<?php echo esc_attr($options->get('footer_v1_email_address'));?>"><?php echo wp_kses( $options->get( 'footer_v1_email_address'), $allowed_html ); ?></a></div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php if($options->get( 'footer_v1_direction')) {?>
            <div class="loc-info"><a href="<?php echo esc_url($options->get('footer_v1_direction_link'));?>"><?php echo wp_kses( $options->get( 'footer_v1_direction'), $allowed_html ); ?></a></div>
        	<?php } ?>
        </div>
    </div>
</footer>
