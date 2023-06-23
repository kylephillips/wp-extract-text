<?php
namespace ExtractText\Events;

use ExtractText\Handlers\ExportText;

class RegisterAdminEvents
{
	public function __construct()
	{
		add_action('admin_post_extract_text_export', [$this, 'exportText']);
	}

	public function exportText()
	{
		new ExportText;
	}
}