<?php
class IndexController extends Yaf_Controller_Abstract {
	public function listAction($page = 1) {
		$this->getView()->assign('page', $page);
	}
}
