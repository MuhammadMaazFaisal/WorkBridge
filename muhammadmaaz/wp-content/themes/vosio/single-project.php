<?php get_header();
$data = \VOSIO\Includes\Classes\Common::instance()->data('single-project')->get(); 

$layout = $data->get( 'layout' );
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12 col-lg-12' : 'col-xxl-9 col-xl-8 col-lg-9 col-md-8';
?>

<!-- Page Title -->
<section class="page-title" id="to-top-div">
    <div class="auto-container">
        <h1><span><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( the_title( ) ); ?></span></h1>
        <div class="bread-crumb">
            <ul class="clearfix">
                <?php echo vosio_the_breadcrumb(); ?>
            </ul>
        </div>
    </div>
</section>
<!--End Banner Section -->

<?php 
	while (have_posts()) : the_post(); 
?>

<!--
=====================================================
    Portfolio Details
=====================================================
-->
<!--Portfolio Single Section-->
<section class="project-details">
    <div class="auto-container">

        <div class="upper-content">
            <div class="row clearfix">
                <!--Text Col-->
                <div class="text-col col-lg-5 col-md-12 col-sm-12">
                    <div class="inner">
                        <h3><?php the_title(); ?></h3>
                        <div class="scope">
                            <div class="ttl"><span><?php esc_html_e('Scope', 'vosio'); ?></span><i class="fa fa-ellipsis-v"></i></div>
                            <?php 
								$features_list = get_post_meta( get_the_id(), 'features_list2', true);
								if(!empty($features_list)){
								$features_list = explode("\n", ($features_list)); 
							?>
							<ul>
								<?php foreach($features_list as $features): ?>
								<li><?php echo wp_kses($features, true); ?></li>
								<?php endforeach; ?>
							</ul>
							<?php } ?>
                        </div>
                        <div class="text">
							<?php the_content(); ?>
                        </div>
                    </div>
                </div>
				<?php if(has_post_thumbnail()){ ?>
                <!--Image Col-->
                <div class="image-col col-lg-7 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="image"><?php the_post_thumbnail('vosio_700x568'); ?></div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php $gall_images = (get_post_meta(get_the_id(), 'gallery_imgs', true));
			 $gall_images = explode(',', $gall_images);
			 if ($gall_images) :
			 foreach ($gall_images as $gall) :
		?>
		<div class="images">
			<div class="image">
				<?php echo wp_get_attachment_image($gall, 'full');  ?>
			</div>
		</div>
		<?php endforeach; endif; ?>

        <div class="post-controls">
            <ul class="clearfix">
                <?php global $post; $prev_post = get_previous_post();
					if (!empty($prev_post)):
					$post_thumbnail_id = get_post_thumbnail_id($prev_post->ID);
					$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
				?>
                <li><a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>"><?php esc_html_e('Previous Project', 'vosio'); ?></a></li>
                <?php endif; ?>                
                <?php global $post; $next_post = get_next_post();
					if (!empty($next_post)):
					$post_thumbnail_ids = get_post_thumbnail_id($next_post->ID);
					$post_thumbnail_urls = wp_get_attachment_url( $post_thumbnail_ids );
				?>
                <li><a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>"><?php esc_html_e('Next Project', 'vosio'); ?></a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</section>

<?php endwhile; ?>
<?php get_footer(); ?>