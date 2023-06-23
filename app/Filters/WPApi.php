<?php
namespace ExtractText\Filters;

use ExtractText\Services\CleanText;

class WPApi
{
	public function __construct()
	{
		add_action('rest_api_init', [$this, 'registerTextField']);
	}

	public function registerTextField()
	{
		$post_types = get_post_types([
			'public' => true,
			'publicly_queryable' => true
		]);
		$post_types[] = 'page';
		foreach ( $post_types as $type ) :
			register_rest_field( $type, 'plain-text-content', [
		        'get_callback' => [$this, 'outputText']
	    	]);
		endforeach;
	}

	public function outputText($post)
	{
		$content = $post['content']['rendered'];
		$content = (new CleanText)->clean($content);
		return $content;
	}
}