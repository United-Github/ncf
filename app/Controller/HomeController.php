<?php
/*
 * 大見出し
 *
 */
App::uses('AppController', 'Controller');
class HomeController extends AppController {
	public $uses = array('Header', 'LargeHeader', 'SmallHeader', 'Content', 'Request');
	public function beforeFilter() {
		$this->Header->setModel($this);
	}
	public function index() {
		$data['largeHeader'] = $this->Header->getTopLargeHeader();
		$data['request'] = $this->Request->getTopRequest();
		$this->set('data', $data);
	}
}
