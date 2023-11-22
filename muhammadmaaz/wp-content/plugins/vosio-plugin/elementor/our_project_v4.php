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
class Our_Project_V4 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'vosio_our_project_v4';
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
		return esc_html__( 'Our Projects V4', 'vosio' );
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
			'our_project_v4',
			[
				'label' => esc_html__( 'Our Projects V4', 'vosio' ),
			]
		);
		$this->add_control(
			'query_number',
			[
				'label'   => esc_html__( 'Number of post', 'vosio' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
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
				'options' => get_project_categories()
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
		
        $paged = vosio_set($_POST, 'paged') ? esc_attr($_POST['paged']) : 1;

		$this->add_render_attribute( 'wrapper', 'class', 'templatepath-vosio' );
		$args = array(
			'post_type'      => 'project',
			'posts_per_page' => vosio_set( $settings, 'query_number' ),
			'orderby'        => vosio_set( $settings, 'query_orderby' ),
			'order'          => vosio_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if( vosio_set( $settings, 'query_category' ) ) $args['project_cat'] = vosio_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
		{ ?>
		 
        <!-- Banner Section -->
        <section class="banner-six">            
            <div class="banner-container">
                <div class="auto-container">
                    <div class="banner-slider-four owl-theme owl-carousel">
                        <?php 
							$count = 1;
							$i = 1;
							while ( $query->have_posts() ) : $query->the_post(); 
							$term_list = wp_get_post_terms(get_the_id(), 'project_cat', array("fields" => "names"));
							$post_thumbnail_id = get_post_thumbnail_id($post->ID);
							$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
						?>
                        <!--Slide Item-->
                        <div class="<?php if($i % 2) echo 'slide-item'; else echo 'slide-item alt'; ?>">
                            <div class="content-box">
                                <div class="content">
                                    <div class="slide-count"><span><?php $count = sprintf('%02d', $count); echo $count; ?></span></div>
                                    <div class="image-box">
                                        <div class="image-layer" style="background-image: url('<?php echo esc_url($post_thumbnail_url);?>');"></div>
                                        <div class="inner">
                                            <h3><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h3>
                                            <div class="cat"><span><?php echo implode( ', ', (array)$term_list );?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<?php $i++; $count++; endwhile; ?>						
                    </div>
                </div>
            </div>
        </section>
        <!--End Banner Section -->

        <?php }
		wp_reset_postdata();
	}

}
