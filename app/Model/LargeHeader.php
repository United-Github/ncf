<?php

App::uses('AppModel', 'Model');

class LargeHeader extends AppModel {

	public $useTable = 'large_header';
	public $hasMany = array(
		'SmallHeader' => array(
			'className' => 'SmallHeader',	
		)
	);
	// // 大見出しタイトルと小見出しタイトルの取得
	// public function getLSheader() {
		
	// }
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
}