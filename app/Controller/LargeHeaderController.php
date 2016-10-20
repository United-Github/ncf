<?php
/*
 * 大見出し
 *
 */
App::uses('AppController', 'Controller');
class LargeHeaderController extends AppController {
	public $uses = array('Header', 'LargeHeader', 'SmallHeader', 'Card');
	public function index($id) {
		var_dump($this->LargeHeader->exists(4));
		$data = $this->Header->getLSHeader(1);
		$this->set('data', $data);
	}
	public function view($id) {

	}
}
