<?php
/*
 * 大見出し
 *
 */
App::uses('AppController', 'Controller');
class HomeController extends AppController {
	public $uses = array('Header', 'LargeHeader', 'SmallHeader', 'Content');
	public function beforeFilter() {
		$this->Header->setModel($this);
	}
	public function index() {
		$data['largeHeader'] = $this->Header->getTopLargeHeader();
		// $this->dump($data['largeHeader']);
		// die();
		$this->set('data', $data);
	}
}
