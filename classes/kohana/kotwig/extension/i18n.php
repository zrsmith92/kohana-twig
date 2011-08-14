<?php defined('SYSPATH') or die('No direct script access.');

class Kohana_Kotwig_Extension_I18n extends Twig_Extension {

	public function __construct()
	{
		//Kohana::auto_load('I18n');
	}
	
	public function getName() {
		return 'I18n';
	}
	
	public function getGlobals() {
		return array(
			'I18n' => $this,
			'__' => new Twig_Function_Function('I18n::get')
		);
	}
	
	public function getFilters() {
		return array(
			'__' => new Twig_Filter_Function('__')
		);
	}
	
	public function __call($name, $args) {
		if ( method_exists('I18n', $name) )
		{
			return call_user_func_array(array('I18n', $name), $args);
		}
	}
	
}