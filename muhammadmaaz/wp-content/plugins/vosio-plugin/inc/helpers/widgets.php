<?php
///----Blog widgets---
//Recent Posts
class Vosio_Recent_Posts extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Vosio_Recent_Posts', /* Name */esc_html__('Vosio Recent Posts','vosio'), array( 'description' => esc_html__('Show the Recent Posts', 'vosio' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo wp_kses_post($before_widget); ?>
        <div class="recent-post">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <div class="posts">
				<?php $query_string = array('showposts'=>$instance['number']);
				if ($instance['cat']) {
					$query_string['tax_query'] = array(array('taxonomy' => 'category','field' => 'id','terms' => (array)$instance['cat']));
				}
				$this->posts($query_string); ?>			
            </div>
        </div>
        
		<?php echo wp_kses_post($after_widget);
	}
 
 
	/* @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/* @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Latest Posts', 'vosio');
		$number = ( $instance ) ? esc_attr($instance['number']) : 3;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'vosio'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'vosio'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('categories')); ?>"><?php esc_html_e('Category', 'vosio'); ?></label>
            <?php wp_dropdown_categories(array('show_option_all'=>esc_html__('All Categories', 'vosio'), 'taxonomy' => 'category', 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('cat'))); ?>
        </p>
            
		<?php 
	}
	
	function posts($query_string)
	{
		
		$query = new WP_Query($query_string);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
			<?php 
				global $post;
				while ( $query->have_posts() ) : $query->the_post();
			?>
            <div class="post">
                <div class="inner">
                    <div class="image"><a href="<?php echo esc_url(get_the_permalink(get_the_id()));?>"><?php the_post_thumbnail('vosio_87x87'); ?></a></div>
                    <div class="date"><span><?php echo get_the_date();?></span></div>
                    <div class="text"><a href="<?php echo esc_url(get_the_permalink(get_the_id()));?>"><?php echo wp_trim_words( get_the_title(), 7, '...' );?></a></div>
                </div>
            </div>
            <?php endwhile; ?>
            
        <?php endif;
		wp_reset_postdata();
    }
}

//Gallery Posts
class Vosio_Gallery_Posts extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Vosio_Gallery_Posts', /* Name */esc_html__('Vosio Gallery Posts','vosio'), array( 'description' => esc_html__('Show the Gallery Posts', 'vosio' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo wp_kses_post($before_widget); ?>
        <div class="gallery-widget">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <div class="images clearfix">
                <?php 
					$args = array('post_type' => 'project', 'showposts'=>$instance['number']);
					if( $instance['cat'] ) $args['tax_query'] = array(array('taxonomy' => 'project_cat','field' => 'id','terms' => (array)$instance['cat']));
					$this->posts($args);
				?>                                
            </div>
        </div>
        
		<?php echo wp_kses_post($after_widget);
	}
 
 
	/* @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/* @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Gallery', 'vosio');
		$number = ( $instance ) ? esc_attr($instance['number']) : 6;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'vosio'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'vosio'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'vosio'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'vosio'), 'selected'=>$cat, 'taxonomy' => 'project_cat', 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($query_string)
	{
		
		$query = new WP_Query($query_string);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
			<?php 
				global $post;
				while ( $query->have_posts() ) : $query->the_post(); 
				$post_thumbnail_id = get_post_thumbnail_id($post->ID);
				$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);				
			?>
            <div class="image">
                <div class="image-box">
                    <?php the_post_thumbnail('vosio_524x349'); ?>
                    <a href="<?php echo esc_url($post_thumbnail_url);?>" class="lightbox-image overlink" data-fancybox="gallery"><i class="icon fab fa-instagram"></i></a>
                </div>
            </div>
            <?php endwhile; ?>
            
        <?php endif;
		wp_reset_postdata();
    }
}

