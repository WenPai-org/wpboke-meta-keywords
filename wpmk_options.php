<?php
	function wpmk_reg_set() {
		add_option( 'post_type', '' );
		register_setting( 'wpmk_group', 'post_type', 'wpmk_callback' );
	}

	add_action( 'admin_init', 'wpmk_reg_set' );

	function wpmk_register_options_page() {
		add_menu_page( 'WPboke Meta Keywords',__('Meta Keywords', 'wpboke-meta-keywords'),'manage_options', 'wpboke-meta-keywords', 'wpmk_options_page', 'dashicons-tag' );
	}

	add_action( 'admin_menu', 'wpmk_register_options_page' );

	function wpmk_options_page() {
		wp_enqueue_style( 'wpmk', plugins_url( '/css/wpmk.css', __FILE__ ), false, 1, 'all' );
		?>

		<div class="admin-panel clearfix">
			<div class="slidebar">
				<div class="logo">
					<a href=""></a>
				</div>
				<ul>
					<li class="active-menu"><?php _e( 'General Settings', 'wpboke-meta-keywords' ); ?></li>
				</ul>
			</div>
			<div class="main">
				<ul class="topbar clearfix">
					<li><?php _e( 'Release', 'wpboke-meta-keywords' ); ?>: 1.4.0</li>
				</ul>
				<div class="mainContent clearfix">
					<form method="post" action="options.php">
						<?php settings_fields( 'wpmk_group' ); ?>
						<div id="general-settings">
							<h2 class="header"><?php _e( 'General Settings', 'wpboke-meta-keywords' ); ?></h2>
							<p><?php _e( 'On this page, you can manage all settings for WPboke Meta Keywords (wpmk) plugin.', 'wpboke-meta-keywords' ); ?></p>
							<div class="widget-box">
								<h4><?php _e( 'Allow "Post Type"', 'wpboke-meta-keywords' ); ?></h4>
								<p style="margin-left:0;"><?php _e( 'In some themes, there might be custom "Post Type"s created by theme developers. wpmk plugin might not shown on those custom post type pages. In this case you have to add post types to the textbox below. You can write one "Post Type" per line.', 'wpboke-meta-keywords' ); ?></p>
								<textarea style="padding:15px;" name="post_type" id="post_type" cols="30" placeholder="<?php _e( 'Ex: services', 'wpboke-meta-keywords' ); ?>" rows="10"><?= get_option( 'post_type' ) ?></textarea>
								<button type="submit" id="submit" class="submit" name="submit"><?php _e( 'Save Settings', 'wpboke-meta-keywords' ); ?></button>
							</div>
						</div>
					</form>
				</div>
				<ul class="statusbar">
					<li class="logout">
						<a href="https://wpboke.com" target="_blank"><?php _e( 'Developer', 'wpboke-meta-keywords' ); ?></a>
					</li>
					<li class="profiles-setting">
						<a href="https://wpzhanqun.com/plugins/meta-keywords" target="_blank"><?php _e( 'About', 'wpboke-meta-keywords' ); ?></a>
					</li>
				</ul>
			</div>
		</div>
		<?php
	}

?>
