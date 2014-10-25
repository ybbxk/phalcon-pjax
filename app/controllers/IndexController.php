<?php

class IndexController extends AppController {
	
	public function indexAction() {
		if($_SERVER["HTTP_X_PJAX"]) {
			$this->view->setVar('loaded_by', 'PJAX Request');
			$this->view->disableLevel(array(
				\Phalcon\Mvc\View::LEVEL_LAYOUT => true,
				\Phalcon\Mvc\View::LEVEL_MAIN_LAYOUT => true
			));
		}
		else {
			$this->view->setVar('loaded_by', 'Normal Request');
		}
	}
	
	public function page2Action() {
		if($_SERVER["HTTP_X_PJAX"]) {
			$this->view->setVar('loaded_by', 'PJAX Request');
			$this->view->disableLevel(array(
				\Phalcon\Mvc\View::LEVEL_LAYOUT => true,
				\Phalcon\Mvc\View::LEVEL_MAIN_LAYOUT => true
			));
		}
		else {
			$this->view->setVar('loaded_by', 'Normal Request');
		}
	}
	
	public function page3Action() {
		if($_SERVER["HTTP_X_PJAX"]) {
			$this->view->setVar('loaded_by', 'PJAX Request');
			$this->view->disableLevel(array(
				\Phalcon\Mvc\View::LEVEL_LAYOUT => true,
				\Phalcon\Mvc\View::LEVEL_MAIN_LAYOUT => true
			));
		}
		else {
			$this->view->setVar('loaded_by', 'Normal Request');
		}
	}
	
}
