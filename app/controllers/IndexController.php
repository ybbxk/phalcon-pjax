<?php

class IndexController extends AppController {
	
	public function indexAction() {
		if($this->isPjax()) {
			$this->view->setVar('loaded_by', 'PJAX Request');
		}
		else {
			$this->view->setVar('loaded_by', 'Normal Request');
		}
	}
	
	public function page2Action() {
		if($this->isPjax()) {
			$this->view->setVar('loaded_by', 'PJAX Request');
		}
		else {
			$this->view->setVar('loaded_by', 'Normal Request');
		}
	}
	
	public function page3Action() {
		if($this->isPjax()) {
			$this->view->setVar('loaded_by', 'PJAX Request');
		}
		else {
			$this->view->setVar('loaded_by', 'Normal Request');
		}
	}
	
}
