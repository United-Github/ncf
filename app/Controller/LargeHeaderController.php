<?php
/*
 * 大見出し
 *
 */
App::uses('AppController', 'Controller');
class LargeHeaderController extends AppController {
	public $uses = array('Header', 'LargeHeader', 'SmallHeader', 'Card', 'Tag');
	public function biforeFIlter() {
		$this->Header->setModel($this);	
	}
	public function index($id = null) {
		$this->dump($this->Card->getBySHId(1));
		// var_dump($this->LargeHeader->exists(4));
		// $data = $this->Header->getLSHeader(1);
		// $this->set('data', $data);
	}
	public function view($id) {
		$this->Header->setModel($this);
		$data = $this->Header->getTopLargeHeader();
		$data = $this->Header->getLHById();
		$data = 
		$this->set('data', $data);	
	}

}
