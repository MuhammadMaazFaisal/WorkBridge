<?php
/**
 * Search Form template
 *
 * @package VOSIO
 * @author Themewisdom
 * @version 1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}
?>

<div class="widget__search wcfadeUp2">
    <form action="<?php echo esc_url( home_url( '/' ) ); ?>">
    	<input type="text" name="s" value="<?php echo get_search_query(); ?>" id="search" placeholder="<?php echo esc_attr__( 'Search', 'vosio' ); ?>">
        <button type="submit" class="wp-block-search__button wp-element-button">Search</button>
    </form>
</div>