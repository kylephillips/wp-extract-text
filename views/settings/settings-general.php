<?php
$post_types = get_post_types(['public' => true]); 
?>
<div class="extract-text-settings wysiwyg">
	<div class="row">
		<div class="title align-top">
			<h4><?php _e('Export Text', 'wp-extract-text'); ?></h4>
			<p><?php _e('Export a plain-text file of site content.', 'wp-extract-text'); ?></p>
		</div>
		<div class="field align-top">
			<form class="extract-text-content-form" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
				<input type="hidden" name="action" value="extract_text_export">
				<label for="post_type"><?php _e('Post Type', 'wp-extract-text'); ?></label>
				<select name="post_type">
					<option value="all"><?php _e('All Types', 'wp-extract-text'); ?></option>
					<?php 
					foreach ( $post_types as $type ) :
						echo '<option value="' . $type . '">' . $type . '</option>';
					endforeach;
					?>
				</select>
				<input type="submit" value="Export" class="button">
			</form>
		</div><!-- .field -->
	</div><!-- .row -->
</div><!-- .extract-text-settings -->