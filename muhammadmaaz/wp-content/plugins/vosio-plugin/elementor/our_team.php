<?php
namespace VOSIOPLUGIN\Element;

use Elementor\Controls_Manager;
use Elementor\Controls_Stack;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Border;
use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Utils;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Plugin;
/**
 * Elementor button widget.
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */
class Our_Team extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'vosio_our_team';
	}
	/**
	 * Get widget title.
	 * Retrieve button widget title.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Our Team', 'vosio' );
	}
	/**
	 * Get widget icon.
	 * Retrieve button widget icon.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-library-open';
	}
	/**
	 * Get widget categories.
	 * Retrieve the list of categories the button widget belongs to.
	 * Used to determine where to display the widget in the editor.
	 *
	 * @since  2.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'vosio' ];
	}
	
	/**
	 * Register button widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'our_team',
			[
				'label' => esc_html__( 'Our Team', 'vosio' ),
			]
		);
		$this->add_control(
			'subtitle',
			[
				'label'       => __( 'Sub Title', 'vosio' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'vosio' ),
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'vosio' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'vosio' ),
			]
		);
		$this->add_control(
			'query_number',
			[
				'label'   => esc_html__( 'Number of post', 'vosio' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 4,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);
		$this->add_control(
			'query_orderby',
			[
				'label'   => esc_html__( 'Order By', 'vosio' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => array(
					'date'       => esc_html__( 'Date', 'vosio' ),
					'title'      => esc_html__( 'Title', 'vosio' ),
					'menu_order' => esc_html__( 'Menu Order', 'vosio' ),
					'rand'       => esc_html__( 'Random', 'vosio' ),
				),
			]
		);
		$this->add_control(
			'query_order',
			[
				'label'   => esc_html__( 'Order', 'vosio' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => array(
					'DESC' => esc_html__( 'DESC', 'vosio' ),
					'ASC'  => esc_html__( 'ASC', 'vosio' ),
				),
			]
		);
		$this->add_control(
            'query_category', 
			[
			  'type' => Controls_Manager::SELECT,
			  'label' => esc_html__('Category', 'vosio'),
			  'label_block' => true,
			  'options' => get_team_categories()
			]
		);
		$this->end_controls_section();
	}
	/**
	 * Render button widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
        $allowed_tags = wp_kses_allowed_html('post');
		
        $paged = get_query_var('paged');
		$paged = vosio_set($_REQUEST, 'paged') ? esc_attr($_REQUEST['paged']) : $paged;
		
		$this->add_render_attribute( 'wrapper', 'class', 'templatepath-vosio' );
		$args = array(
			'post_type'      =>  'team',
			'posts_per_page' => vosio_set( $settings, 'query_number' ),
			'orderby'        => vosio_set( $settings, 'query_orderby' ),
			'order'          => vosio_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		
		if( vosio_set( $settings, 'query_category' ) ) $args['team_cat'] = vosio_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );
		if ( $query->have_posts() ) 
		{ ?>
        
        <!--Team Section-->
        <section class="team-section">
            <div class="auto-container">
                <?php if($settings['subtitle'] || $settings['title']) { ?>
                <div class="def-title-box">
                    <div class="patt"><span></span></div>
                    <?php if($settings['subtitle']) { ?><div class="subtitle"><?php echo wp_kses($settings['subtitle'], true);?></div><?php } ?>
                    <?php if($settings['title']) { ?><h3><?php echo wp_kses($settings['title'], true);?></h3><?php } ?>
                </div>
				<?php } ?>
                <div class="team">
                    <div class="row clearfix">
                        <?php 
							while ( $query->have_posts() ) : $query->the_post();
							$term_list = wp_get_post_terms(get_the_id(), 'team_cat', array("fields" => "names"));
						?>
                        <!--Block-->
                        <div class="team-block col-xl-4 col-lg-6 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="image-box"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_post_thumbnail('vosio_373x400'); ?></a></div>
                                <div class="cat"><span><?php echo implode( ', ', (array)$term_list );?></span></div>
                                <?php
									$icons = get_post_meta( get_the_id(), 'social_profile', true );
									if ( ! empty( $icons ) ) :
								?>
								<div class="social">		
									<?php
										foreach ( $icons as $h_icon ) :
										$header_social_icons = json_decode( urldecode( vosio_set( $h_icon, 'data' ) ) );
										if ( vosio_set( $header_social_icons, 'enable' ) == '' ) {
											continue;
										}
										$icon_class = explode( '-', vosio_set( $header_social_icons, 'icon' ) );
										?>
										<a href="<?php echo esc_url(vosio_set( $header_social_icons, 'url' )); ?>" <?php if( vosio_set( $header_social_icons, 'background' ) || vosio_set( $header_social_icons, 'color' ) ):?>style="background-color:<?php echo esc_attr(vosio_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(vosio_set( $header_social_icons, 'color' )); ?>"<?php endif;?>><i class="fab <?php echo esc_attr( vosio_set( $header_social_icons, 'icon' ) ); ?>"></i></a>
									<?php endforeach; ?>							
								</div>
								<?php endif; ?>
                                <div class="name"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></div>
                            </div>
                        </div>
						<?php endwhile; ?>
                    </div>
                </div>

            </div>
        </section>
              	
		<?php }
		wp_reset_postdata();
	}
}