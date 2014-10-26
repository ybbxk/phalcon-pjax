<?php

use \Phalcon\Mvc\Controller;

class AppController extends Controller {
	
	// Private and immutable, as you can't change the fact 
	// that the request is pjax.
	private $is_pjax = false;
	
	public function beforeExecuteRoute() {
		if($_SERVER["HTTP_X_PJAX"]) {
			$this->is_pjax = true;
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
}
