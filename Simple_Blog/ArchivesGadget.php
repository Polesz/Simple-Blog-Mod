<?php
defined('is_running') or die('Not an entry point...');

gpPlugin_incl('SimpleBlogCommon.php');

class SimpleBlogArchives{

	function __construct(){
		global $addonPathData, $blogmsg;

		SimpleBlogCommon::AddCSS();

		$content = '';
		$gadget_file = $addonPathData.'/gadget_archive.php';
		if( file_exists($gadget_file) ){
			$content = file_get_contents($gadget_file);
		}

		//fix edit links
		if( strpos($content,'simple_blog_gadget_label') ){
			new SimpleBlogCommon();
			$content = file_get_contents($gadget_file);
		}

		if( empty($content) ){
			return;
		}

		echo '<div class="simple_blog_gadget"><div>';

		echo '<span class="simple_blog_gadget_label">';
		echo $blogmsg['Archives'];
		echo '</span>';
		echo $content;
		echo '</div></div>';

	}

}
