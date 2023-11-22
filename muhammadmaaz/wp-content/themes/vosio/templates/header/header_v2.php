<?php
$options = vosio_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

//Light Color Logo Settings
$light_logo = $options->get( 'light_color_logo' );
$light_logo_dimension = $options->get( 'light_color_logo_dimension' );

$logo_type = '';
$logo_text = '';
$logo_typography = ''; ?>

<div class="site-container">
   
    <div class="cursor"></div>
    
	<?php if( $options->get( 'theme_preloader' ) ):?>
    <!-- Preloader -->
    <div class="preloader"></div>
	<?php endif; ?>
    <div class="menu-backdrop"></div>
        
    <!-- Main Header Bar-->
    <header class="main-header-bar">
        <div class="line-one"></div>
        <div class="line-two"></div>
        <!--Header-Upper-->
        <div class="header-bar-inner">
            <div class="outer-box clearfix">
                
                <!--Nav Toggler-->
                <div class="nav-toggler"><button class="toggler-btn"><span class="bar bar-one"></span><span class="bar bar-two"></span><span class="bar bar-three"></span></button></div>
                <?php
					if( $options->get('show_social_share_v2') ):
					$icons = $options->get( 'header_social_share_v2' );
					if ( ! empty( $icons ) ) :
				?>
                <div class="social-links">
                    <ul class="clearfix">
                        <?php
                        foreach ( $icons as $h_icon ) :
                        $header_social_icons = json_decode( urldecode( vosio_set( $h_icon, 'data' ) ) );
                        if ( vosio_set( $header_social_icons, 'enable' ) == '' ) {
                            continue;
                        }
                        $icon_class = explode( '-', vosio_set( $header_social_icons, 'icon' ) );
                        ?>
                            <li><a href="<?php echo esc_url(vosio_set( $header_social_icons, 'url' )); ?>" <?php if( vosio_set( $header_social_icons, 'background' ) || vosio_set( $header_social_icons, 'color' ) ):?>style="background-color:<?php echo esc_attr(vosio_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(vosio_set( $header_social_icons, 'color' )); ?>"<?php endif;?>><span class="fab <?php echo esc_attr( vosio_set( $header_social_icons, 'icon' ) ); ?>"></span></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
				<?php endif; endif; ?>
                <?php if($options->get('show_copy_rights_text2')){ ?>                
                <!--Copyright Text-->
                <div class="copyright"><?php echo wp_kses($options->get('copy_rights_text_v2'), true); ?></div>
                <?php } ?>
            </div>

            <!--Alt Logo Box-->
            <div class="alt-logo-box"><?php echo vosio_logo( $logo_type, $light_logo, $light_logo_dimension, $logo_text, $logo_typography ); ?></div>
            
            <!--Nav Bg Box-->
            <div class="nav-bg-box"></div>
            
            <!--Main Nav Outer-->
            <div class="main-nav-outer">
                <div class="nav-closer"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icons/close-icon.png" alt="<?php esc_attr_e('Awesome Image', 'vosio'); ?>"></div>
                <div class="outer-nav-box">
                    <div class="top-bg"></div>
                    <div class="bottom-bg"></div>
                    <div class="main-nav-box" data-scrollbar="">
                        <!--Logo Box-->
                        <div class="main-logo-box"><?php echo vosio_logo( $logo_type, $light_logo, $light_logo_dimension, $logo_text, $logo_typography ); ?></div>
                        <div class="main-nav">
                            <ul class="navigation">
                                <?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'container_id' => 'navbar-collapse-1',
                                    'container_class'=>'navbar-collapse collapse navbar-right',
                                    'menu_class'=>'nav navbar-nav',
                                    'fallback_cb'=>false,
                                    'items_wrap' => '%3$s',
                                    'container'=>false,
                                    'depth'=>'3',
                                    'walker'=> new Bootstrap_walker()
                                ) ); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Header Upper-->
    </header>
    
    <!--End Main Header -->
    <div class="scroll-container">
        <div class="main-content-container" id="scroll-container">
            <div class="body-bg-layer" style="background-image: url(<?php echo esc_url(get_template_directory_uri());?>/assets/images/background/body-bg-1.jpg);"></div>
            