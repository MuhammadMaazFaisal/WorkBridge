<?php namespace VOSIOPLUGIN\Element;

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
class Contact_Us extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'vosio_contact_us';
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
        return esc_html__( 'Contact Us', 'vosio' );
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
            'contact_us',
            [
                'label' => esc_html__( 'Contact Us', 'vosio' ),
            ]
        );		
		$this->add_control(
			'sub_title',
			[
				'label'       => __( 'Sub Title', 'vosio' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Sub Title', 'vosio' ),
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
			'show_contact_info',
			[
				'label'       => __( 'Enable/Disable Contact Info', 'vosio' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'vosio' ),
				'label_off' => __( 'Hide', 'vosio' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
            'info', 
			[
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'condition' => [
					'show_contact_info'      => 'yes',
				],
				'default' => 
					[
						['block_title' => esc_html__('Reception Desk', '')],
						['block_title' => esc_html__('Working Hours', 'vosio')],
						['block_title' => esc_html__('Address', 'vosio')]
					],
				'fields' => 
					[
						[
							'name' => 'icons',
							'label' => esc_html__('Enter The icons', 'vosio'),
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
							'name' => 'block_contact',
							'label' => esc_html__('Contact Details', 'vosio'),
							'label_block' => true,
							'type' => Controls_Manager::TEXT,
							'default' => esc_html__('', 'vosio')
						],
						[
							'name' => 'style_two',
							'label'   => esc_html__( 'Choose Different Style', 'vosio' ),
							'label_block' => true,
							'type'    => Controls_Manager::SELECT,
							'default' => 'one',
							'options' => array(
								'one' => esc_html__( 'Choose Style Phone Number', 'vosio' ),
								'two' => esc_html__( 'Choose Style Working Hours & Address', 'vosio' ),
							),
						],
					],
				'title_field' => '{{block_title}}',
			 ]
        );
		$this->add_control(
			'show_form_and_map',
			[
				'label'       => __( 'Enable/Disable Contact Form And Google Map', 'vosio' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'vosio' ),
				'label_off' => __( 'Hide', 'vosio' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);		
		$this->add_control(
			'form_title',
			[
				'label'       => __( 'Form Title', 'vosio' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'condition' => [
					'show_form_and_map'	=> 'yes',
				],
				'placeholder' => __( 'Enter your Form Title', 'vosio' ),
			]
		);
		$this->add_control(
			'contact_form_url',
			[
				'label'       => __( 'Contact Form Url', 'vosio' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'condition' => [
					'show_form_and_map'	=> 'yes',
				],
				'placeholder' => __( 'Enter your Contact Form Url', 'vosio' ),
			]
		);
		$this->add_control(
			'google_map_code',
			[
				'label'       => __( 'Google Map Iframe Code', 'vosio' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'condition' => [
					'show_form_and_map'	=> 'yes',
				],
				'placeholder' => __( 'Enter your Google Map Iframe Code', 'vosio' ),
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
    ?>
	
    <!--Contact Section-->
    <section class="contact-section">
        <div class="auto-container">
            <?php if($settings['sub_title'] || $settings['title']) { ?>
            <div class="def-title-box">
                <div class="patt"><span></span></div>
                <?php if($settings['sub_title']) { ?><div class="subtitle"><?php echo wp_kses($settings['sub_title'], true);?></div><?php } ?>
                <?php if($settings['title']) { ?><h3><?php echo wp_kses($settings['title'], true);?></h3><?php } ?>
            </div>
            <?php } ?>
            <?php if($settings['show_contact_info']):?>
            <div class="info-box">
                <div class="row clearfix">
                    <?php foreach($settings['info'] as $key => $item): ?>
                    <!--Block-->
                    <div class="info-block col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="inner">
                                <div class="icon-box"><?php \Elementor\Icons_Manager::render_icon( $item['icons']); ?></div>
                                <h5><?php echo wp_kses($item['block_title'], true);?></h5>
                                <?php if($item['style_two'] == 'two'): ?>
                                <div class="info"><?php echo wp_kses($item['block_contact'], true);?></a></div>
                                <?php else : ?>
                                <div class="info"><a href="tel:<?php echo esc_attr($item['block_contact']); ?>"><?php echo wp_kses($item['block_contact'], true);?></a></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
			<?php if($settings['show_form_and_map']):?>
            <div class="contact-box">
                <div class="row clearfix">
                    <div class="form-col col-xl-8 col-lg-12 col-md-12 col-sm-12">
                        <?php if($settings['form_title']) { ?><h5><?php echo wp_kses($settings['form_title'], true);?></h5><?php } ?>
                        <?php if($settings['contact_form_url']) { ?>
                        <div class="contact-form">
                            <?php echo do_shortcode($settings['contact_form_url']);?>
                        </div>
                        <?php } ?>
                    </div>
					<?php if($settings['google_map_code']) { ?>
                    <div class="map-col col-xl-4 col-lg-12 col-md-12 col-sm-12">
                        <div class="inner">
                            <div class="map-box"><?php echo do_shortcode($settings['google_map_code']);?></div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>
                     
        <?php
    }
}


