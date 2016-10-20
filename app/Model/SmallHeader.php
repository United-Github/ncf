<?php

App::uses('AppModel', 'Model');

class SmallHeader extends AppModel {
	public $actsAs = array('Containable');
	public $useTable = 'small_header';
	public $hasMany = array(
		'Card' => array(
			'className' => 'Card',
			'foreignKey' => 'small_header_id'
		)
	);
}