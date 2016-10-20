<?php

App::uses('AppModel', 'Model');

class Card extends AppModel {

	public $useTable = 'card';
	public $hasMany = array(
		'CardContent' => array(
			'className' => 'CardContent'
		)
	);

	// // 大見出しタイトルと小見出しタイトルの取得
	// public function getLSheader() {
		
	// }
		
}