<?php

class IndexController extends AppController {
	
	public function indexAction() {
		if($this->isPjax()) {
			$this->view->setVar('loaded_by', 'PJAX Request');
		}
		else {
			$this->view->setVar('loaded_by', 'Normal Request');
		}
		
		// Uncommenting this will force a hard reload in this action.
		// $this->render_pjax = false;
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
