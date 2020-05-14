<?php
class IndexController extends Yaf_Controller_Abstract {
	public function showAction($userId) {
		$this->getView()->assign('userId', $userId);
	}
}
