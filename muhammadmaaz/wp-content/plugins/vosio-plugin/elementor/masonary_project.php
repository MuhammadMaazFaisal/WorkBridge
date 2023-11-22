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
class Masonary_Project extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'vosio_masonary_project';
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
		return esc_html__( 'Masonary Projects', 'vosio' );
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
			'masonary_project',
			[
				'label' => esc_html__( 'Masonary Projects', 'vosio' ),
			]
		);
		$this->add_control(
			'number',
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
			'cat_exclude',
			[
				'label'       => esc_html__( 'Exclude', 'vosio' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Exclude categories, etc. by ID with comma separated.', 'vosio' ),
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
		$this->add_render_attribute( 'wrapper', 'class', 'themeexpo-vosio' );
		$args = array(
			'post_type'      => 'project',
			'posts_per_page' => vosio_set( $settings, 'number' ),
			'orderby'        => vosio_set( $settings, 'query_orderby' ),
			'order'          => vosio_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		$terms_array = explode(",",vosio_set( $settings, 'cat_exclude' ));
		if(vosio_set( $settings, 'cat_exclude' )) $args['tax_query'] = array(array('taxonomy' => 'project_cat','field' => 'id','terms' => $terms_array,'operator' => 'NOT IN',));
		$allowed_tags = wp_kses_allowed_html('post');
		$query = new \WP_Query( $args );
		$t = '';
		$data_filtration = '';
		$data_posts = '';
		if ( $query->have_posts() ) 
		{
		ob_start();
		?>
  
		<?php 
            $count = 0; 
            $fliteration = array();
            while( $query->have_posts() ): $query->the_post();
            global  $post;
            $meta = ''; //printr($meta);
            $meta1 = ''; //_WSH()->get_meta();
            $post_terms = get_the_terms( get_the_id(), 'project_cat');// printr($post_terms); exit();
            foreach( (array)$post_terms as $pos_term ) $fliteration[$pos_term->term_id] = $pos_term;
            $temp_category = get_the_term_list(get_the_id(), 'project_cat', '', ', ');
            
            $post_terms = wp_get_post_terms( get_the_id(), 'project_cat'); 
            $term_slug = '';
            if( $post_terms ) foreach( $post_terms as $p_term ) $term_slug .= $p_term->slug.' ';
        	
			$term_list = wp_get_post_terms(get_the_id(), 'project_cat', array("fields" => "names"));
			$post_thumbnail_id = get_post_thumbnail_id($post->ID);
			$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
			
            ?>
            
            <!--Portfolio Block-->
            <div class="portfolio-block mix all <?php echo esc_attr($term_slug); ?> col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                    <div class="image"><?php the_post_thumbnail('vosio_373x400'); ?></div>
                    <div class="overlay">
                        <div class="more-link"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>" class="theme-btn"><i class="fa-solid fa-bars-staggered"></i></a></div>
                        <div class="inner">
                            <div class="cat"><span><?php echo implode( ', ', (array)$term_list );?></span></div>
                            <h5><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h5>
                        </div>
                    </div>
                </div>
            </div>
            <!--Portfolio Block-->
			   
			<?php endwhile;?>

            <?php wp_reset_postdata();
            $data_posts = ob_get_contents();
            ob_end_clean();
            
            ob_start();?>
            
            <?php $terms = get_terms(array('project_cat')); ?>
			
            <!--Portfolio Section-->
            <section class="portfolio-section">
                <div class="auto-container">

                    <div class="mixitup-gallery">

                        <!--Filter-->
                        <div class="gallery-filters centered clearfix">
                            <ul class="filter-tabs filter-btns clearfix">
                                <li class="active filter" data-role="button" data-filter="all"><?php esc_attr_e('Show All', 'vosio');?></li>
                                <?php foreach( $fliteration as $t ): ?>
                                <li class="filter" data-role="button" data-filter=".<?php echo esc_attr(vosio_set( $t, 'slug' )); ?>"><?php echo vosio_set( $t, 'name'); ?></li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                        <div class="filter-list row clearfix">
                            <?php echo wp_kses($data_posts, true); ?>
                        </div>
                    </div>
                </div>
            </section>

        <?php }
		wp_reset_postdata();
	}

}
