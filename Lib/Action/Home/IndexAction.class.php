<?php
class IndexAction extends HomeAction{
    public function index(){
		$lock = './Public/install/install.lock';
		if (!is_file($lock)) {
			$this->assign("jumpUrl",'index.php?s=Admin-Install');
			$this->error('您还没安装本程序，请运行 install.php 进入安装!');
		}	
		$sql = " select * from pp_vod where vod_mhot=1 and vod_del=0";
		$mhot_data = M()->query($sql);
		$this->assign('title',C('site_name').''.C('site_by'));
		$this->assign('pplist',A("Home"));
		$this->assign('mhot_data', $mhot_data);
	    $this->display('piao_index');
    }	
}?>
