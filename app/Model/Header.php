<?php

App::uses('AppModel', 'Model');

class Header extends AppModel {
	public $actsAs = array('Containable');
	public $useTable = 'large_header';
	public $hasMany = array(
		'SmallHeader' => array(
			'className' => 'SmallHeader',	
		)
	);

	private $_LargeHeader;
	private $_SmallHeader;
	private $_Card;

// モデルのセット
	public function setModel(AppController $controller){
		$this->_LargeHeader = $controller->LargeHeader;
		// $this->_SmallHeader = $controller->SmallHeader;
		// $this->_Card = $controller->Card;

		// $this->_Largeheader->hasMany['SmallHeader']['fields'] = array('SmallHeader.id');
		$this->contain('SmallHeader');
		$data = $this->find('first', array(
			'conditions' => array(
				'Header.id' => 1
			),
			'fields' => array(
				'Header.id',
				'Header.title'
			),
			'contain' => array(
				'SmallHeader' => array(
					'fields' => array(
						'SmallHeader.id',
						'SmallHeader.large_header_id',
						'SmallHeader.title'
					),
					'Card' => array(
						'fields' => array(
							'Card.id',
							'Card.small_header_id',
							'Card.title',
							'Card.content'
						)
					)
				)
			),
			'recursive' => 4
		));
		echo '<pre>';
		// var_dump($this->_LargeHeader->hasMany['SmallHeader']['fields']);
		var_dump($data);
		echo '</pre>';
		die();		
	}

	// 大見出しタイトルと小見出しタイトルの取得
	public function getLSHeader($id) {

		$result = $this->find('all', array(
						'conditions' => array(
							'Header.id' => $id
						)
					));
		return $result;
	}

	public function getLargeHeaderData($id) {
		$this->_LargeHeader->hasMany['SmallHeader']['fields'] = array(
			'SmallHeader.id',
			'SmallHeader.title'
			);
		$this->_SmallHeader->hasMany['Card']['fields'] = array(
			'Card.id',
			'Card.title',
			'Card.thx_point',
			'Card.content'
		);
	}
	
}