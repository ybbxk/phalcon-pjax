<?php

class IndexController extends AppController {
	
	public function indexAction() {
		if($this->isPjax()) {
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
		if($this->isPjax()) {
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
		if($this->isPjax()) {
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
