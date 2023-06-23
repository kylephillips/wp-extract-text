<?php
namespace ExtractText\Services;

class CleanText
{
	public function clean($content)
	{
		// var_dump($content);
		$content = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $content);
		$content = preg_replace('#<p(.*?)>(.*?)</p>#is', "$2<br>", $content);
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
		$content = str_replace("<br>", "\r\n", $content);
		$content = strip_tags($content, ["<br>"]);
		$content = str_replace("\t", " ", $content);
		$content = str_replace("&amp;", "&", $content);
		$content = str_replace("&nbsp;", " ", $content);
		$content = preg_replace('!\s+!', ' ', $content);
		return ltrim($content);
	}
}