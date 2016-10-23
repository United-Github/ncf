<?php
/*
 * 大見出し
 *
 */
App::uses('AppController', 'Controller');
class ApiThxPointController extends AppController {
	public $components = array('RequestHandler');
	public $uses = array('Card');
	public function view($cardId) {
		$this->viewClass = 'Json';
		$result = false;
		if (isset($this->request->query['add'])){
			$result = $this->Card->updateThxPoint($cardId, ($this->request->query['add'] === '0')? false : true);
		}
		$this->set(array(
			'result' => $result,
			'_serialize' => array('result')
		));
	}

}
