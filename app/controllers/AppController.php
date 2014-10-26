<?php

use \Phalcon\Mvc\Controller;

class AppController extends Controller {
	
	// Private and immutable, as you can't change the fact 
	// that the request is pjax.
	private $is_pjax = false;
	
	public function beforeExecuteRoute() {
		if($_SERVER["HTTP_X_PJAX"]) {
			$this->is_pjax = true;
			$this->prepareForPjax();
		}
	}
	
	/**
	 * Takes care of any preparation needed to respond to a pjax request.
	 * Note: I don't know if this carries over if a controller is forwarded?
	 * 
	 * @return void
	 */
	private function prepareForPjax() {
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
}
