<?php
namespace ExtractText\Handlers;

use ExtractText\Services\CleanText;

class ExportText
{
	/**
	* Text Cleaner 
	* @var obj
	*/
	private $cleaner;

	/**
	* Post Objects
	* @var array of post objects
	*/
	private $posts = [];

	/**
	* Plain Text Export
	* @var str
	*/
	private $text = '';

	public function __construct()
	{
		$this->cleaner = new CleanText;
		$this->loopTypes();
		$this->formatExport();
		$this->exportFile();
	}

	private function loopTypes()
	{
		$post_type = sanitize_text_field($_POST['post_type']);
		if ( $post_type !== 'all' ) :
			$this->getPosts($post_type);
			return;
		endif;
		$post_types = get_post_types(['public' => true]);
		foreach ( $post_types as $type ) :
			$this->getPosts($type);
		endforeach;
	}

	private function getPosts($post_type)
	{
		$args = [
			'posts_per_page' => -1,
			'post_type' => $post_type
		];
		$q = new \WP_Query($args);
		if ( $q->have_posts() ) $this->posts = array_merge($this->posts, $q->posts);
		wp_reset_postdata();
	}

	private function formatExport()
	{
		foreach ( $this->posts as $post ) :
			$this->text .= "\r" . $post->post_title;
			$this->text .= "\r\r" . apply_filters('extract_text_post', $this->cleaner->clean($post->post_content), $post);
		endforeach;
	}

	private function exportFile()
	{
		$file = get_bloginfo('name') . '-export-' . date('Y-m-d-G-i-s') . '.txt';
		$txt = fopen($file, "w") or die("Unable to open file!");
		fwrite($txt, $this->text);
		fclose($txt);

		header('Content-Description: File Transfer');
		header('Content-Disposition: attachment; filename='.basename($file));
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($file));
		header("Content-Type: text/plain");
		readfile($file);
	}
}
