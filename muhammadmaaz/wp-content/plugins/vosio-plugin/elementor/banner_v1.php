<?php namespace VOSIOPLUGIN\Element;

use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Utils;
use Elementor\Widget_Base;

/**
 * Elementor button widget.
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */
class Banner_V1 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @return string Widget name.
	 * @since  1.0.0
	 * @access public
	 */
	public function get_name() {
		return 'vosio_banner_v1';
	}

	/**
	 * Get widget title.
	 * Retrieve button widget title.
	 *
	 * @return string Widget title.
	 * @since  1.0.0
	 * @access public
	 */
	public function get_title() {
		return esc_html__( 'Banner V1', 'vosio' );
	}

	/**
	 * Get widget icon.
	 * Retrieve button widget icon.
	 *
	 * @return string Widget icon.
	 * @since  1.0.0
	 * @access public
	 */
	public function get_icon() {
		return 'eicon-library-open';
	}

	/**
	 * Get widget categories.
	 * Retrieve the list of categories the button widget belongs to.
	 * Used to determine where to display the widget in the editor.
	 *
	 * @return array Widget categories.
	 * @since  2.0.0
	 * @access public
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
			'banner_v1',
			[
				'label' => esc_html__( 'Banner V1', 'vosio' ),
			]
		);
		$this->add_control(
			'slides',
			[
				'type'        => Controls_Manager::REPEATER,
				'separator'   => 'before',
				'default'     =>
					[
						[ 'title' => esc_html__( 'Creativity in Space', 'vosio' ) ],
						[ 'title' => esc_html__( 'Creativity in Space', 'vosio' ) ],
						[ 'title' => esc_html__( 'Creativity in Space', 'vosio' ) ]
					],
				'fields'      =>
					[
						[
							'name'        => 'bg_image',
							'label'       => esc_html__( 'Slide Background', 'vosio' ),
							'description' => esc_html__( 'Upload image or video mp4 format background here', 'vosio' ),
							'type'        => Controls_Manager::MEDIA,
							'default'     => [ 'url' => Utils::get_placeholder_image_src(), ],
						],
						[
							'name'        => 'title',
							'label'       => esc_html__( 'Title', 'vosio' ),
							'label_block' => true,
							'type'        => Controls_Manager::TEXT,
							'default'     => esc_html__( '', 'vosio' )
						],
						[
							'name'    => 'text',
							'label'   => esc_html__( 'Text', 'vosio' ),
							'type'    => Controls_Manager::TEXTAREA,
							'default' => esc_html__( '', 'vosio' )
						],
						[
							'name'        => 'btn_title',
							'label'       => esc_html__( 'Button Title', 'vosio' ),
							'label_block' => true,
							'type'        => Controls_Manager::TEXT,
							'default'     => esc_html__( 'Read More', 'vosio' )
						],
						[
							'name'          => 'btn_link',
							'label'         => __( 'Button Link', 'vosio' ),
							'type'          => Controls_Manager::URL,
							'placeholder'   => __( 'https://your-link.com', 'plugin-domain' ),
							'show_external' => true,
							'default'       => [ 'url' => '', 'is_external' => true, 'nofollow' => true, ],
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
		$settings     = $this->get_settings_for_display();
		$allowed_tags = wp_kses_allowed_html( 'post' );
		?>

		<!-- Banner Section -->
		<section class="banner-section">

			<div class="banner-container">
				<div class="banner-slider owl-theme owl-carousel">
					<?php $i = 1;
					foreach ( $settings['slides'] as $key => $item ): ?>
						<!--Slide Item-->
						<div class="slide-item">


							<?php
							$current_file_type = get_post_mime_type( $item['bg_image']['id'] );
							if ( $current_file_type === 'video/mp4' && ! empty( $item['bg_image']['url'] ) ) {
								?>
								<video class="video-layer" autoplay loop muted>
									<source src="<?php echo esc_attr( $item['bg_image']['url'] ); ?>"
									        type="video/mp4">
								</video>
								<?php
							} else { ?>
								<div
									class="image-layer" <?php if ( $item['bg_image']['id'] ) { ?> style="background-image: url(<?php echo esc_url( wp_get_attachment_url( $item['bg_image']['id'] ) ); ?>);"<?php } ?>></div>
							<?php } ?>

							<div class="slide-bar"></div>
							<div class="slide-count"><span><?php $i = sprintf( '%02d', $i );
									echo $i; ?></span></div>
							<div class="auto-container">
								<div class="content-box">
									<div class="content">
										<div class="inner">
											<h1><span><?php echo wp_kses( $item['title'], true ); ?></span></h1>
											<div class="text"><?php echo wp_kses( $item['text'], true ); ?></div>
											<?php if ( $item['btn_link']['url'] ) { ?>
												<div class="links-box clearfix">
													<div class="link"><a
															href="<?php echo esc_url( $item['btn_link']['url'] ); ?>"
															class="theme-btn btn-style-one"><span><?php echo wp_kses( $item['btn_title'], true ); ?><i
																	class="icon fa fa-arrow-right"></i></span></a></div>
												</div>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php $i ++; endforeach; ?>
				</div>
			</div>
		</section>
		<!--End Banner Section -->

		<?php
	}
}
