<?php

use \Phalcon\Mvc\Controller;
use \Phalcon\Mvc\View;

class AppController extends Controller {
	
	// Private and immutable, as you can't change the fact 
	// that the request is pjax.
	private $is_pjax = false;
	protected $render_pjax = false;
	
	public function beforeExecuteRoute() {
		// It's a pjax request, set the defaults.
		if(isset($_SERVER["HTTP_X_PJAX"])) {
			$this->is_pjax = true;
			$this->render_pjax = true;
		}
	}
	
	/**
	 * Returns if the current request is PJAX or not.
	 * 
	 * @return bool
	 */
	public function isPjax() {
		return $this->is_pjax;
	}
	
	// The only downside to using this is that child classes
	// MUST remember to call the parent method.
	public function afterExecuteRoute() {
		// If it's a pjax request, and the action didn't overwrite the render 
		// flag, then we only display the action view.
		if($this->isPjax() && $this->render_pjax === true) {
			$this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
		}
	}
}
