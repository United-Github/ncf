<?php

App::uses('AppModel', 'Model');

class SmallHeader extends AppModel {
	public $actsAs = array('Containable');
	public $useTable = 'small_header';

	public function getSHSum($param = array()) {
		$this->virtualFields = array(
			'sum' => 'sum(card.thx_point)'
		);

		if (!isset($param['conditions'])) {
			$param['conditions'] = array();
		}

		if (isset($param['fields'])) {
			$fields = array_merge(array('sum'), $param['fields']); 
		} else {
			$fields = array();
		}

		$data = $this->find('all' ,array(
				'conditions' => $param['conditions'],
				'fields' => $fields,
				'joins' => array(
					array(
					'type' => 'RIGHT',
					'table' => 'card',
					'conditions' =>  'small_header.id = card.small_header_id and row'
					)
				),
				'group' => array(
					'small_header.id'
				),
				'limit' => 10
			)
			);
			shuffle($data);
		return $data;
	}
	
}