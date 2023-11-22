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
class Banner_V3 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'vosio_banner_v3';
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
        return esc_html__( 'Banner V3', 'vosio' );
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
            'banner_v3',
            [
                'label' => esc_html__( 'Banner V3', 'vosio' ),
            ]
        );
		$this->add_control(
            'slides', 
			[
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['title' => esc_html__('The concept for better living', 'vosio')],
						['title' => esc_html__('Modern Architecture', 'vosio')],
						['title' => esc_html__('Creative Interior Design', 'vosio')],
						['title' => esc_html__('Exterior Collection 2021', 'vosio')],
						['title' => esc_html__('Materials', 'vosio')],
						['title' => esc_html__('Models', 'vosio')],
						['title' => esc_html__('Best Interior Designs', 'vosio')]
					],
				'fields' => 
				[
					[
						'name' => 'bg_image',
						'label' => esc_html__('Slide BG Image', 'vosio'),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'title',
						'label' => esc_html__('Title', 'vosio'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'vosio')
					],
					[
						'name' => 'category',
						'label' => esc_html__('Text', 'vosio'),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'default' => esc_html__('', 'vosio')
					],
					[
						'name' => 'btn_link',
						'label' => __( 'External Link', 'vosio' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
				],
				'title_field' => '{{title}}',
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
	
    <!-- Banner Section -->
    <section class="banner-four">
        <div class="banner-container">
            <div class="banner-slider-outer">
                <div class="auto-container">
                    <div class="banner-content">
                        <div class="slider-box">
                            <div class="banner-slider-three">
                                <?php $i = 1; foreach($settings['slides'] as $key => $item): ?>
                                <div class="slide-item">
                                    <div class="image-box">
                                        <div class="image"><a href="<?php echo esc_url($item['btn_link']['url']); ?>"><img src="<?php echo esc_url(wp_get_attachment_url($item['bg_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'vosio'); ?>"></a></div>
                                        <div class="slide-count"><span><?php $i = sprintf('%02d', $i); echo $i; ?></span></div>
                                        <div class="cat"><span><?php echo wp_kses($item['category'], true); ?></span></div>
                                    </div>
                                </div>
                                <?php $i++; endforeach; ?>
                            </div>
                        </div>
                        <div class="pager-outer">
                            <div class="pager-box">
                                <div class="pager-one">
                                    <?php $count = 1; foreach($settings['slides'] as $key => $item): ?>
                                    <a href="" class="pager-item <?php if($count == 1) echo 'active'; ?>" data-slide-index="<?php echo esc_attr($count);?>"><div class="inner"><span class="icon"><i class="fa-light fa-plus"></i></span><span class="text"><?php echo wp_kses($item['title'], true); ?></span></div></a>
                                    <?php $count++; endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Banner Section -->
    
	<?php 
    }
}
