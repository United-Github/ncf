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
	public function updateThxPoint($cardId, $add) {
			$data = $this->findById($cardId);

			if (!empty($data)) {
				$thxPoint = $data['Card']['thx_point'];
				$thxPoint += (!$add) ? -1 : 1;
				if ($this->save(array(
					'id' => $cardId,
					'thx_point' => $thxPoint
				))) {
					return $thxPoint;
				} else {
					return false;
				}
			} else {
				return false;
			}

	}
		
}