<?php
App::uses('AppModel', 'Model');

class Header extends AppModel {
	public $actsAs = array('Containable');
	public $useTable = false;
	// public $hasMany = array(
	// 	'SmallHeader' => array(
	// 		'className' => 'SmallHeader',	
	// 	)
	// );

	private $_LargeHeader;
	private $_SmallHeader;
	private $_Card;
	private $_controller;
// モデルのセット
	public function setModel(AppController $controller){
		$this->_LargeHeader = $controller->LargeHeader;
		$this->_SmallHeader = $controller->SmallHeader;
		$this->_Card = $controller->_Card;
		$this->_controller = $controller;
	}
	// 大見出しと小見出しを取得
	
	// ランダムを取得
	public function getTopLargeHeader() {
		$this->_LargeHeader->virtualFields = array(
			'sum' => 'sum(card.thx_point)'
		);

		$data = $this->_LargeHeader->find('all' ,array(
				'fields' => array(
					'LargeHeader.id',
					'LargeHeader.title',
					'LargeHeader.sum'
				),
				'joins' => array(
					array(
					'type' => 'RIGHT',
					'table' => 'small_header',
					'conditions' =>  '`LargeHeader`.`id`= small_header.large_header_id'
					),
					array(
					'type' => 'RIGHT',
					'table' => 'card',
					'conditions' =>  'small_header.id = card.small_header_id'
					)
				),
				'group' => array(
					'LargeHeader.id'
				),
				'order' => array(
					'LargeHeader.sum DESC'
				),
				'limit' => 10
			)
			);
			shuffle($data);
		return $data;
	}

	public function getLHById(){



		$data = $this->_LargeHeader->find('all' ,array(
				'fields' => array(
					'LargeHeader.id',
					'LargeHeader.title',
					'SmallHeader.id',
					'SmallHeader.title',
					'Card.title'
				),
				'joins' => array(
					array(
					'type' => 'RIGHT',
					'table' => 'small_header',
					'alias' => 'SmallHeader',
					'conditions' =>  'LargeHeader.id = SmallHeader.large_header_id'
					),
					array(
					'type' => 'RIGHT',
					'table' => 'card',
					'alias' => 'Card',
					'conditions' =>  'SmallHeader.id = Card.small_header_id'
					)
				)
			)
			);
			$this->_controller->dump($data);
			die();
		return $data;
	}

}