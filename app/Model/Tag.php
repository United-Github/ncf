<?php

App::uses('AppModel', 'Model');
class Tag extends AppModel {

	public $useTable = 'tag';

	public function getAllTag() {
		$this->virtualFields = array(
			'count' => 'count(LargeHeaderTag.tag_id)'
		);
		return $this->find('all', array(
			'joins' => array(
				array(
					'type' => 'LEFT',
					'table' => 'large_header_tag',
					'alias' => 'LargeHeaderTag',
					'conditions' => 'LargeHeaderTag.tag_id = Tag.id' 
				)
			),
			'fields' => array(
				'Tag.id',
				'Tag.name',
				'count'
			),
			'group' => 'Tag.id',
			'order' => 'count DESC'
		));
	}
	public function getByList($array) {
		return $this->find('all', array(
			'conditions' => array(
				'OR' => array(
					'Tag.id' => $array
				)
			),
			'fields' => array(
				'Tag.name'
			)
		));
		
	}
		
		
}