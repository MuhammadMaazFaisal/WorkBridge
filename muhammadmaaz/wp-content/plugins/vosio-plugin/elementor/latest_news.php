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
class Latest_News extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'vosio_latest_news';
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
		return esc_html__( 'Latest News', 'vosio' );
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
			'latest_news',
			[
				'label' => esc_html__( 'Latest News', 'vosio' ),
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
			  'options' => get_blog_categories()
			]
		);	
		$this->add_control(
			'show_pagination',
			[
				'label'       => __( 'Enable/Disable Pagination', 'vosio' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'vosio' ),
				'label_off' => __( 'Hide', 'vosio' ),
				'return_value' => 'yes',
				'default' => 'no',
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
			'post_type'      => 'post',
			'posts_per_page' => vosio_set( $settings, 'query_number' ),
			'orderby'        => vosio_set( $settings, 'query_orderby' ),
			'order'          => vosio_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if( vosio_set( $settings, 'query_category' ) ) $args['category_name'] = vosio_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
		{ ?>
		
        <!--News Section-->
        <section class="news-section">
            <div class="auto-container">
                <div class="news">
                    <div class="row clearfix">
                        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                        <!--Block-->
                        <div class="news-block col-xl-4 col-lg-6 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="image-box"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_post_thumbnail('vosio_376x266'); ?></a></div>
                                <div class="lower">
                                    <h4><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h4>
                                    <div class="info"><div class="cat i-block"><i class="far fa-folder"></i> <?php the_category(' '); ?></div><div class="time i-block"><i class="far fa-clock"></i> <?php echo time_ago(); ?></div></div>
                                    <div class="link-box"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>" class="theme-btn"><?php esc_html_e('continue reading', 'vosio'); ?> <i class="far fa-long-arrow-alt-right"></i></a></div>
                                </div>
                            </div>
                        </div>
                        <!--Block-->
                        <?php endwhile; ?>
                    </div>
                </div>
				<?php if($settings['show_pagination']):?>
                <div class="styled-pagination">
                	<?php vosio_the_pagination2(array('total'=>$query->max_num_pages, 'next_text' => '<i class="fa-solid fa-angle-right"></i>', 'prev_text' => '<i class="fa-solid fa-angle-left"></i>')); ?>
                </div>
                <?php endif; ?>
            </div>
        </section>
                
        <?php }
		wp_reset_postdata();
	}

}
