<?php

App::uses('AppModel', 'Model');

class Card extends AppModel {

	public $useTable = 'card';
	public $hasMany = array(
		'CardContent' => array(
			'className' => 'CardContent'
		)
	);

	public function getBySHId($id) {
		return $this->find('all', array(
			'conditions' => array(
				'Card.small_header_id' => $id
			)
		));
	}

	// // 大見出しタイトルと小見出しタイトルの取得
	// public function getLSheader() {
		
	// }
		
}