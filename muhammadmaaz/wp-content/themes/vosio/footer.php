<?php
/**
 * Footer Main File.
 *
 * @package VOSIO
 * @author  Themewisdom
 * @version 1.0
 */
 $options = vosio_WSH()->option(); 
global $wp_query;
$page_id = ( $wp_query->is_posts_page ) ? $wp_query->queried_object->ID : get_the_ID();
$layout_switcher = $options->get( 'layout_switcher' );
?>
			<div class="clearfix"></div>

			<?php vosio_template_load( 'templates/footer/footer.php', compact( 'page_id' ) );?>
		</div>
    </div>    

</div>
<!--End Page Wrapper-->

<?php wp_footer(); ?>
</body>
</html>
