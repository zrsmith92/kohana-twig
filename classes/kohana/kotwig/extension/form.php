<?php defined('SYSPATH') or die('No direct script access.');

class Kohana_Kotwig_Extension_Form extends Twig_Extension {
	
	public function getName() {
		return 'Form';
	}
	
	public function getGlobals()
	{
		return array(
			'Form' => $this
		);
	}
	
	public function __call($name, $args) {
		if ( method_exists('Form', $name) )
		{
			return call_user_func_array(array('Form', $name), $args);
		}
	}
}