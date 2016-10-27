<?php
/*
 * 大見出し
 *
 */
App::uses('AppController', 'Controller');
class TagListController extends AppController {
	public $uses = array('Tag');
	public function index() {
		$data = $this->Tag->getAllTag();
		$this->set('data', $data);
	}
}
