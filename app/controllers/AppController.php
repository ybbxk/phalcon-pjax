<?php

use \Phalcon\Mvc\Controller;
use \Phalcon\Mvc\View;

class AppController extends Controller {
	
	// Private and immutable, as you can't change the fact 
	// that the request is pjax.
	private $is_pjax = false;
	protected $render_pjax = false;
	
	/**
	 * Sets default values on pjax requests.
	 * 
	 * Executes before the controller action, setting defaults that 
	 * allow the controller to check if the request is pjax or manually 
	 * override the automatic change is what's rendered for a pjax response. 
	 * This allows forcing of a hard refresh by the action if needed.
	 * 
	 * @return void
	 */
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
	
	/**
	 * Changes render level by default if request is pjax.
	 * 
	 * After the controller action has finished, if the $render_pjax flag has 
	 * not been manually set to false, this method will run and change the 
	 * render level, causing the response to include only the content for the 
	 * action view, and non of the layout markup.
	 * 
	 * @return void
	 */
	public function afterExecuteRoute() {
		// If it's a pjax request, and the action didn't overwrite the render 
		// flag, then we only display the action view.
		if($this->isPjax() && $this->render_pjax === true) {
			$this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
		}
	}
}
