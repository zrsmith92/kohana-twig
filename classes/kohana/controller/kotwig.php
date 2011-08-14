<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Twig template controller
 *
 * @package    Kotwig
 * @author     John Heathco <jheathco@gmail.com>
 */
abstract class Kohana_Controller_Kotwig extends Controller {

	/**
	 * @var boolean  Auto-render template after controller method returns
	 */
	public $auto_render = TRUE;
	
	protected $_data = array();

	/**
	 * @var Kotwig_View  Kohana twig template
	 */
	public $template = NULL;
	
	public function before()
	{
		if ($this->auto_render && $this->template === NULL)
		{
			$this->template = $this->request->controller().'/'.$this->request->action();

			if ($directory = $this->request->directory())
			{
				// Prepend directory if needed
				$this->template = $directory . '/' . $this->template;
			}
		}
	}
	
	public function after()
	{		
		if ($this->auto_render)
		{
			$template = Kotwig_View::factory($this->template, $this->_data);
			
			// Auto-render the template
			$this->response->body($template->render());
		}
	}

} // End Controller_Kotwig
