<?php
class IndexAction extends HomeAction{
    public function index(){
		$lock = './Public/install/install.lock';
		if (!is_file($lock)) {
			$this->assign("jumpUrl",'index.php?s=Admin-Install');
			$this->error('您还没安装本程序，请运行 install.php 进入安装!');
		}	
		$this->assign('title',C('site_name').''.C('site_by'));
		$this->assign('pplist',A("Home"));
	    $this->display('piao_index');
    }	
}?>
