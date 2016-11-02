<?php
/*
 * 大見出し
 *
 */
App::uses('AppController', 'Controller');
class CardController extends AppController {
	public $uses = array('Card', 'SmallHeader');
	public function view($id) {
		$data['Card'] = $this->Card->getBySHId($id);
		$data += $this->SmallHeader->findById($id);
		$this->set('data', $data);
	}
}
