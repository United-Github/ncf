<?php

App::uses('AppModel', 'Model');

class LargeHeader extends AppModel {

	public $useTable = 'large_header';


	// 小見出しモデルをバインド
	public function setBindSmallHeader() {
		$this->bindModel(
			array('hasMany' => array(
					'SmallHeader' => array(
						'className' => 'SmallHeader'
					)
				)
			)
		);
	}

	public function getLHSum($param = array()) {
		$this->virtualFields = array(
			'sum' => 'sum(card.thx_point)'
		);

		if (!isset($param['conditions'])) {
			$param['conditions'] = array();
		}

		$fields = array('sum');
		if (isset($param['fields'])) {
			$fields = array_merge(array('sum'), $param['fields']); 
		}

		$data = $this->find('all' ,array(
				'conditions' => $param['conditions'],
				'fields' => $fields,
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
				'limit' => 10
			)
			);
			shuffle($data);
		return $data;
	}

	
}