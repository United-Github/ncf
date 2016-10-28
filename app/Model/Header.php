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
		$this->_Card = $controller->Card;
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

	public function getSHList($id) {
		$data = array();
			$small_header = $this->_SmallHeader->find('all' ,array(
					'fields' => array(
						'SmallHeader.id',
						'SmallHeader.title',
					),
					'conditions' => array(
						'SmallHeader.large_header_id' => $id
					)
				)
			);
			foreach($small_header as $key => $value) {
				$small_header[$key]['SmallHeader']['Card'] = $this->_Card->find('all', array(
					'conditions' => array(
						'Card.small_header_id' => $value['SmallHeader']['id']
					),
					'order' => 'Card.thx_point DESC',
					'limit' => 3
				));
			}
			$data['SmallHeader'] = $small_header;
			$data += $this->_LargeHeader->find('first', array(
				'conditions' => array(
					'LargeHeader.id' => $id
				),
				'fields' => array(
					'LargeHeader.id',
					'LargeHeader.title'
				)
			));
		return $data;
	}

}