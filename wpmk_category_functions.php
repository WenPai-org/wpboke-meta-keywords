<?php
	add_action('category_add_form_fields', 'category_metabox_add', 10, 1);
	add_action('category_edit_form_fields', 'category_metabox_edit', 10, 1);

	function category_metabox_add($tag) {
		$categoryMetaKeywords = get_term_meta($tag->term_id, 'wpmk_field', true);
		?>
		<style type="text/css">
			#wpmk_box_id { width: 95%; }
			input#wpmk_field { width: 100%; }
			h2.hndle { font-size: 14px; padding: 8px 12px; margin: 0; line-height: 1.4; }
			.inside { padding-bottom: 0 !important; }
		</style>
		<div id="wpmk_box_id" class="postbox ">
			<h2 class="hndle ui-sortable-handle"><span><?php esc_html_e('Meta Keywords', 'wpboke-meta-keywords'); ?></span></h2>

			<div class="inside">
				<p><?php _e('Please add comma separated meta keywords to show for this content.', 'wpboke-meta-keywords'); ?></p>
				<input name="wpmk_field" id="wpmk_field" type="text" value="<?= $categoryMetaKeywords ?>">
			</div>
		</div>
		<?php
	}

	function category_metabox_edit($tag) {
		$categoryMetaKeywords = get_term_meta($tag->term_id, 'wpmk_field', true);
		?>
		<style type="text/css">
			#wpmk_box_id { width: 95%; }
			input#wpmk_field { width: 100%; }
			h2.hndle { font-size: 14px; padding: 8px 12px; margin: 0; line-height: 1.4; }
			.inside { padding-bottom: 0 !important; }
		</style>
		<div id="wpmk_box_id" class="postbox ">
			<h2 class="hndle ui-sortable-handle"><span>WPboke Meta Keywords</span></h2>

			<div class="inside">
				<p><?php _e('Please add comma separated meta keywords to show for this content.', 'wpboke-meta-keywords'); ?></p>
				<input name="wpmk_field" id="wpmk_field" type="text" value="<?= $categoryMetaKeywords ?>">
			</div>
		</div>
		<?php
	}

	add_action('created_category', 'save_category_metadata', 10, 1);
	add_action('edited_category', 'save_category_metadata', 10, 1);

	function save_category_metadata($term_id) {
		if (array_key_exists('wpmk_field', $_POST)) {
			update_term_meta($term_id, 'wpmk_field', sanitize_text_field($_POST['wpmk_field']));
		}
	}

?>
