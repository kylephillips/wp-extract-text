<?php 
namespace ExtractText\Activation;

class Dependencies 
{
	public function __construct()
	{
		add_action( 'admin_enqueue_scripts', [$this, 'styles']);
		add_action( 'admin_enqueue_scripts', [$this, 'scripts']);
	}


	/**
	* Theme Scripts – enqueue any unminified scripts needed here
	*/
	public function scripts()
	{
		wp_enqueue_script(
			'extract-text',
			EXTRACT_TEXT_DIRECTORY . '/assets/js/admin/extract-text-admin.min.js',
			[],
			EXTRACT_TEXT_VERSION,
			true
		);
	}

	/**
	* Theme Styles – enqueue any unminified styles needed here
	*/
	public function styles()
	{
		wp_enqueue_style(
			'extract-text-styles',
			EXTRACT_TEXT_DIRECTORY . '/assets/css/admin/style.css',
			[],
			EXTRACT_TEXT_VERSION
		);
	}
}