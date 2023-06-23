<?php
namespace ExtractText\Services;

class CleanText
{
	public function clean($content)
	{
		$content = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $content);
		$content = str_replace('</h3>', ' ', $content);
		$content = str_replace('</h2>', ' ', $content);
		$content = str_replace('</h1>', ' ', $content);
		$content = str_replace('</td>', ' ', $content);
		$content = str_replace('<td>', ' ', $content);
		$content = str_replace('<tr>', ' ', $content);
		$content = str_replace('</tr>', ' ', $content);
		$content = str_replace('<th>', ' ', $content);
		$content = str_replace('</th>', ' ', $content);
		$content = str_replace('<li>', ' ', $content);
		$content = strip_tags($content);
		$content = str_replace("  ", "", $content);
		$content = str_replace("\n", "", $content);
		$content = str_replace("\t", " ", $content);
		$content = preg_replace('!\s+!', ' ', $content);
		return $content;
	}
}