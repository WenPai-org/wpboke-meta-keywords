<?php
	/*
		Plugin Name: WPboke Meta Keywords
		Plugin URI: https://wpzhanqun.com/plugins/meta-keywords
		Description: WPboke Meta Keywords is a simple but useful WordPress add-on that allows you to easily add the keyword insertion field removed from many Search Engine Optimization (SEO) enhancements for WordPress to all your content again.
		Author: WPboke
		Text Domain: wpboke-meta-keywords
		Version: 1.4.0
		Author URI: https://wpboke.com
		License: GNU
	*/


	require 'wpmk_functions.php';
	require 'wpmk_options.php';

	function wpmk_head() {
		$postMetaKeywords = get_post_meta(get_the_ID(), '_wpmk', true);
		$categoryMetaKeywords = get_term_meta(get_query_var('cat'), 'wpmk_field', true);


		if (!empty($postMetaKeywords) && !is_category()) {
			?>
			<meta name="keywords" content="<?= $postMetaKeywords ?>">
			<?php
		}

		if (!empty($categoryMetaKeywords) && is_category()) {
			?>
			<meta name="keywords" content="<?= $categoryMetaKeywords ?>">
			<?php
		}
	}

	add_action('wp_head', 'wpmk_head');
?>
