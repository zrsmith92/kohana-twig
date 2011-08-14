<?php defined('SYSPATH') or die('No direct script access.');

class Kohana_Kotwig_Extension_URL extends Twig_Extension {

	public function getName() {
		return 'I18n';
	}
	
	
	public function getGlobals() {
		return array(
			'URL'	=> $this
		);
	}
	
	public function getFilters() {
		return array(
			'site_url'	=> new Twig_Filter_Method($this, 'site'),
			'title_url'	=> new Twig_Filter_Method($this, 'title')
		);
	}

	public function __call($name, $args) {
		if ( method_exists('URL', $name) )
		{
			return call_user_func_array(array('URL', $name), $args);
		}
	}
	
}