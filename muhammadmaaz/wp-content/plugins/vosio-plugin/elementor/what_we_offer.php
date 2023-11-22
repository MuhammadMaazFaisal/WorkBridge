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
class What_We_Offer extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'vosio_what_we_offer';
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
        return esc_html__( 'What We Offer', 'vosio' );
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
    protected function _register_controls() {
        $this->start_controls_section(
            'what_we_offer',
            [
                'label' => esc_html__( 'What We Offer', 'vosio' ),
				'tab' => Controls_Manager::TAB_LAYOUT,
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
				'placeholder' => __( 'Enter your Sub title', 'vosio' ),
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'vosio' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your title', 'vosio' ),
			]
		);
		$this->end_controls_section();
		
		//Tab Content
		$this->start_controls_section(
            'grid_view',
            [
                'label' => esc_html__( 'Our Feature Tabs', 'vosio' ),
				'tab' => Controls_Manager::TAB_LAYOUT,
            ]
        );
		$this->add_control(
			'features', 
			[
				'type' => Controls_Manager::REPEATER,					
				'seperator' => 'before',					
				'default' => 
					[
						['block_title' => esc_html__('Tab1', 'vosio')],							
						['block_title' => esc_html__('Tab2', 'vosio')],
						['block_title' => esc_html__('Tab3', 'vosio')]					
					],
				'fields' =>  
				[
					[
						'name' => 'block_img',							
						'label' => esc_html__('Image ', 'vosio'),							
						'type' => Controls_Manager::MEDIA,							
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'block_title',
						'label' => esc_html__('Tab Title', 'vosio'),
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
				],
				'title_field' => '{{block_title}}',
			]	
        );
		$this->end_controls_section();
		
		//Faqs
		$this->start_controls_section(
            'list_view',
            [
                'label' => esc_html__( 'Our Faqs', 'vosio' ),
				'tab' => Controls_Manager::TAB_LAYOUT,
            ]
        );
		$this->add_control(
			'faqs', 
			[
				'type' => Controls_Manager::REPEATER,					
				'seperator' => 'before',					
				'default' => 
					[
						['block_title2' => esc_html__('For the trust, you have on us ', 'vosio')],							
						['block_title2' => esc_html__('Modern designs served with quality ', 'vosio')],
						['block_title2' => esc_html__('Designs too original to be copied ', 'vosio')]					
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
						'name' => 'block_title2',
						'label' => esc_html__('Text', 'vosio'),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'default' => esc_html__('', 'vosio')
					],
					[
						'name' => 'block_text2',
						'label' => esc_html__('Text', 'vosio'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'vosio')
					],
				],
				'title_field' => '{{block_title2}}',
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
    <section class="services-two">
        <div class="auto-container">
            <?php if($settings['subtitle'] || $settings['title']) { ?>
            <div class="def-title-box">
                <div class="patt"><span></span></div>
                <?php if($settings['subtitle']) { ?><div class="subtitle"><?php echo wp_kses($settings['subtitle'], true);?></div><?php } ?>
                <?php if($settings['title']) { ?><h3><?php echo wp_kses($settings['title'], true);?></h3><?php } ?>
            </div>
            <?php } ?>
            <div class="row parent-row clearfix">
                <div class="tabs-col col-xl-6 col-lg-12 col-md-12 col-sm-12">
                    <div class="tabs-box def-tabs-box">
                        <ul class="tab-buttons clearfix">
                            <?php $i= 1; foreach($settings['features'] as $key => $item):?>
                            <li class="tab-btn <?php if($i==1) echo 'active-btn';?>" data-tab="#tab-<?php echo esc_attr($i);?>"><span><?php echo wp_kses($item['block_title'], true) ;?></span></li>
                            <?php $i++; endforeach;?>
                        </ul>
                        <div class="tabs-content">
                            <?php $i= 1; foreach($settings['features'] as $key => $item):?>
                            <!--Tab-->
                            <div class="tab <?php if($i==1) echo 'active-tab';?>" id="tab-<?php echo esc_attr($i);?>">
                                <div class="row clearfix">
                                    <div class="image-col col-lg-5 col-md-5 col-sm-6">
                                        <div class="image"><img src="<?php echo esc_url(wp_get_attachment_url($item['block_img']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','vosio');?>"></div>
                                    </div>
                                    <div class="text-col col-lg-7 col-md-7 col-sm-6">
                                        <div class="text">
                                            <?php echo wp_kses($item['block_text'], true) ;?>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<?php $i++; endforeach;?>
                        </div>
                    </div>
                </div>

                <div class="accordions-col col-xl-6 col-lg-12 col-md-12 col-sm-12">
                    <div class="accordion-box clearfix">                    	
                        <?php $count= 1; foreach($settings['faqs'] as $key => $item):?>
                        <!--Block-->
                        <div class="accordion block <?php if($count==1) echo 'active-block';?>">
                            <div class="acc-btn <?php if($count==1) echo 'active';?>"><?php echo wp_kses($item['block_title2'], true) ;?> <?php \Elementor\Icons_Manager::render_icon( $item['icons']); ?></div>
                            <div class="acc-content">
                                <div class="content">
                                    <div class="text"><?php echo wp_kses($item['block_text2'], true) ;?></div>
                                </div>
                            </div>
                        </div>
                        <?php $count++; endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </section>       
                         
        <?php
    }
}
