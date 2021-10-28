<?php
	function wpmk_html($post) {
		$postMetaKeywords = get_post_meta($post->ID, '_wpmk', true);
		?>
		<style type="text/css">
			input#wpmk_field {
				width: 100%;
			}
		</style>
		<p><?php _e('Please add comma separated meta keywords to show for this content.', 'wpboke-meta-keywords'); ?></p>
		<input name="wpmk_field" id="wpmk_field" type="text" value="<?= $postMetaKeywords ?>">
		<?php
	}

	add_action('add_meta_boxes', 'wpmk_add_custom_box');

	function wpmk_add_custom_box() {
		$post_type = trim(get_option('post_type'));
		$post_type = explode("\n", $post_type);
		$post_type = array_filter($post_type, 'trim');

		$screens = ['post', 'page', 'category', 'tag', 'taxonomy', 'attachment', 'term', 'taxonomies'];

		foreach ($post_type as $line) {
			array_push($screens, $line);
		}

		foreach ($screens as $screen) {
			add_meta_box('wpmk_box_id', __('Meta Keywords', 'wpboke-meta-keywords'), 'wpmk_html', $screen);
		}

	}

	add_action('save_post', 'wpmk_save_postdata');

	function wpmk_save_postdata($post_id) {
		if (array_key_exists('wpmk_field', $_POST)) {
			update_post_meta($post_id, '_wpmk', sanitize_text_field($_POST['wpmk_field']));
		}
	}

	require 'wpmk_category_functions.php';
?>
