<?php
return array(
	'title'      => 'Vosio Setting',
	'id'         => 'vosio_meta',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'page', 'post', 'team', 'project' ),
	'sections'   => array(
		require_once VOSIOPLUGIN_PLUGIN_PATH . '/metabox/header.php',
		require_once VOSIOPLUGIN_PLUGIN_PATH . '/metabox/banner.php',
		require_once VOSIOPLUGIN_PLUGIN_PATH . '/metabox/sidebar.php',
		require_once VOSIOPLUGIN_PLUGIN_PATH . '/metabox/footer.php',
	),
);