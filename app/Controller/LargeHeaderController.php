<?php
/*
 * 大見出し
 *
 */
App::uses('AppController', 'Controller');
class LargeHeaderController extends AppController {
	public $uses = array('Header', 'LargeHeader', 'SmallHeader', 'Card', 'Tag', 'LargeHeaderTag');
	public function beforeFilter() {
		$this->Header->setModel($this);	
	}

	public function index() {
		if (isset($this->request->data['tag'])){
			$idList = $this->request->data['tag'];
		} else {
			$this->redirect(array('controller' => 'TagList', 'action' => 'index'));
		}
		$data['Tag'] = $this->Tag->getByList($idList);
		$matchList = $this->LargeHeaderTag->getTagMatchHeader($idList);
		$data['count'] = count($matchList);
		
		$data['LargeHeader'] = (!empty($matchList)) ? $this->LargeHeader->getMatchList($matchList) : array();
		$this->set('data', $data);
	}

	public function view($id) {
		$data = $this->Header->getSHList($id);
		$this->set('data', $data);	
	}

}
