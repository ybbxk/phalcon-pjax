<?php

use \Phalcon\Mvc\Controller;

class AppController extends Controller {
	
	// Private and immutable, as you can't change the fact 
	// that the request is pjax.
	private $is_pjax = false;
	public $render_pjax = false;
	
	public function beforeExecuteRoute() {
		
		// Is this the best place for this check?
		// What if the controller wants to prevent preparation for
		// a pjax response?
		// I could have a flag, prepare_for_pjax = true;.
		// Then, offer a method to change that flag and use the event manager
		// to do any view disabling and such right before the view takes over...
		// This would allow more flexibility??
		if(isset($_SERVER["HTTP_X_PJAX"])) {
			$this->is_pjax = true;
			$this->render_pjax = true;
		}
	}
	
	/**
	 * Takes care of any preparation needed to respond to a pjax request.
	 * Note: I don't know if this carries over if a controller is forwarded?
	 * 
	 * @return void
	 */
	public function prepareForPjax() {
		$this->view->disableLevel([
			\Phalcon\Mvc\View::LEVEL_LAYOUT => true,
			\Phalcon\Mvc\View::LEVEL_MAIN_LAYOUT => true
		]);
	}
	
	/**
	 * Returns if the current request is PJAX or not.
	 * 
	 * @return bool
	 */
	public function isPjax() {
		return $this->is_pjax;
	}
	
	public function moo() {
		echo 'MOOOOOOOO';
	}
}
