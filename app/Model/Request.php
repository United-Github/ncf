<?php

App::uses('AppModel', 'Model');

class Request extends AppModel {

	public $useTable = 'request';

	public function getTopRequest() {
		return $this->find('all', array(
			'conditions' => array(
				'parent_request_id' => 0
			),
			'order' => array(
				'Request.created DESC'
			),
			'limit' => 5
		));
	}
		
}