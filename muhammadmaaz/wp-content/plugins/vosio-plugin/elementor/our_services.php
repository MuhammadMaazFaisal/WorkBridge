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
class Our_Services extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'vosio_our_services';
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
		return esc_html__( 'Our Services', 'vosio' );
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
			'our_services',
			[
				'label' => esc_html__( 'Our Services', 'vosio' ),
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
            'info', 
			[
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('Web design', 'vosio')],
						['block_title' => esc_html__('Digital Marketing', 'vosio')],
						['block_title' => esc_html__('Google Seo', 'vosio')],
						['block_title' => esc_html__('Print', 'vosio')],
						['block_title' => esc_html__('Branding', 'vosio')],
						['block_title' => esc_html__('Motion Design', 'vosio')]
					],
				'fields' => 
					[
						[
							'name' => 'icons',
							'label' => esc_html__('Enter The icons', 'fundraisers'),
							'type' => \Elementor\Controls_Manager::ICONS,
							'default' => [
								'value' => 'fas fa-star',
								'library' => 'solid',
							],
						],
						[
							'name' => 'block_title',
							'label' => esc_html__('Title', 'vosio'),
							'label_block' => true,
							'type' => Controls_Manager::TEXT,
							'default' => esc_html__('', 'vosio')
						],
						[
							'name' => 'block_text',
							'label' => esc_html__('Text', 'vosio'),
							'type' => Controls_Manager::TEXTAREA,
							'default' => esc_html__('', 'vosio')
						],
						[
							'name' => 'btn_link',
							'label' => __( 'Button Link', 'vosio' ),
							'type' => Controls_Manager::URL,
							'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							'show_external' => true,
							'default' => ['url' => '','is_external' => true,'nofollow' => true,],
						],
					],
				'title_field' => '{{block_title}}',
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
	?>
		
    <!--Services Section-->
    <section class="services-section">
        <div class="auto-container">
            <?php if($settings['subtitle'] || $settings['title']) { ?>
            <div class="def-title-box">
                <div class="patt"><span></span></div>
                <?php if($settings['subtitle']) { ?><div class="subtitle"><?php echo wp_kses($settings['subtitle'], true);?></div><?php } ?>
                <?php if($settings['title']) { ?><h3><?php echo wp_kses($settings['title'], true);?></h3><?php } ?>
            </div>
            <?php } ?>
            <div class="services">
                <div class="row clearfix">
                    <?php foreach($settings['info'] as $key => $item): ?>
                    <!--Block-->
                    <div class="service-block col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="inner">
                                <div class="icon-box"><?php \Elementor\Icons_Manager::render_icon( $item['icons']); ?></div>
                                <h5><?php echo wp_kses($item['block_title'], true);?></h5>
                                <div class="text"><?php echo wp_kses($item['block_text'], true);?></div>
                                <div class="link-box"><a href="<?php echo esc_url($item['btn_link']['url']); ?>"><span class="far fa-angle-right"></span></a></div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>    
         
   	<?php 
	}

}