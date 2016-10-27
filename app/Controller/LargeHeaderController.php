<?php
/*
 * 大見出し
 *
 */
App::uses('AppController', 'Controller');
class LargeHeaderController extends AppController {
	public $uses = array('Header', 'LargeHeader', 'SmallHeader', 'Card', 'Tag', 'LargeHeaderTag');
	public function biforeFIlter() {
		$this->Header->setModel($this);	
	}
	public function index() {
		$this->request->data['tag'] = array(1,2);
		$data['Tag'] = $this->Tag->getByList($this->request->data['tag']);
		$data['LargeHeader'] = $this->LargeHeader->getMatchList($this->LargeHeaderTag->getTagMatchHeader($this->request->data['tag'] ));
		$this->set('data', $data);
	}
	public function view($id) {
		$this->Header->setModel($this);
		$data = $this->Header->getTopLargeHeader();
		$data = $this->Header->getLHById();
		$data = 
		$this->set('data', $data);	
	}

}
