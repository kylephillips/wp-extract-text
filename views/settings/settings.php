<div class="wrap">
	<h1><?php _e('Extract Plain Text', 'wp-extract-text'); ?></h1>

	<h2 class="nav-tab-wrapper">
		<a class="nav-tab <?php if ( $tab == 'general' ) echo 'nav-tab-active'; ?>" href="<?php echo admin_url('options-general.php?page=linde-dealer-search'); ?>">
			<?php _e('General Settings', 'linde-dealer-search'); ?>
		</a>
	</h2>

	<?php if ( $tab !== 'general' ) : ?>
	<form method="post" enctype="multipart/form-data" action="options.php">
		<?php include(\ExtractText\Helpers::view('settings/settings-' . $tab)); ?>
		<?php submit_button(); ?>
	</form>
	<?php 
	else :
		include(\ExtractText\Helpers::view('settings/settings-' . $tab));
	endif; 
	?>
</div>