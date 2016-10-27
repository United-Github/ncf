<?php

App::uses('AppModel', 'Model');
class LargeHeaderTag extends AppModel {

	public $useTable = 'large_header_tag';

// TagにマッチしたHeaderIDと、Tagに一致した数を表示
	public function getTagMatchHeader($TagNum) {
		$OR = array();
		foreach($TagNum as $value) {
			$OR[] = array('LargeHeaderTag.tag_id' => $value);
		}
		$this->virtualFields['count'] = 'count(LargeHeaderTag.large_header_id)';

		return  $this->find('all', array(
			'conditions' => array(
							'OR' => $OR
						),
			'fields' => array(
				'LargeHeaderTag.large_header_id',
				'LargeHeaderTag.count'
				),
			'group' => array(
				'LargeHeaderTag.large_header_id'
				),
			'order' => array(
				'LargeHeaderTag.count DESC'
				)
			)
		);
	}
		
		
}