<?php
class IndexAction extends HomeAction{
    public function index(){
		$lock = './Public/install/install.lock';
		if (!is_file($lock)) {
			$this->assign("jumpUrl",'index.php?s=Admin-Install');
			$this->error('您还没安装本程序，请运行 install.php 进入安装!');
		}	
		$sql = " select * from pp_vod where vod_mhot=1 and vod_del=0 order by vod_id desc limit 5";
		$mhot_data = M()->query($sql);
		$this->assign('title',C('site_name').''.C('site_by'));
		$this->assign('pplist',A("Home"));
		$this->assign('mhot_data', $mhot_data);
		$menu_data = F('_ppvod/listtree');
		foreach($menu_data as $key => &$value)
		{
			 $un_array = array(21, 22);
			 $temp_array = array();
	         if(in_array($value['list_id'], $un_array))
			 {
			     continue; 
			 }	
			 else
			 {
			     foreach($value['son'] as $k => $v)
				 {
				    $temp_array[] = $v['list_id']; 
				 }
				 $list_ids = implode(',', $temp_array);
                 $sql = " select * from pp_vod where vod_hot=1 and vod_cid in ('{$list_ids}') and vod_del=0";
				 $vod_data = M()->query($sql);
			     $value['son'] = $vod_data; 
			 }
		}
		$this->assign('hot_data', $menu_data);
	    $this->display('piao_index');
    }	

	public function ajax_menu()
	{
		 $menu_data = F('_ppvod/listtree');
		 foreach($menu_data as $key => $value)
		 {
			 if($_POST['is_two']==1)
			 {	 
				 foreach($value['son'] as $k => $v)
				 {
					 if($v['list_id']==$_POST['list_id'])
					 {
					     $three_menu = $v['son']; 
		                 exit(json_encode($three_menu));
					 }
					 else
					 {
					     continue;
					 }
				 }
				
			 } 	 
			 else
			 {
			     if($value['list_id']==$_POST['list_id']) 
				 {
					 $two_menu = $value['son'];		 
					 exit(json_encode($two_menu));
				 }
				 else
				 {
					 continue;
				 }		 
			 
			 }
		 }	
	}

	public function order()
	{
		  $vod_ids = implode(',',$_SESSION['vod_ids']);

		  $sql = " select a.*, b.list_name from pp_vod as a left join pp_list as b on a.vod_cid=b.list_id where vod_id in({$vod_ids})";
		  $order_data = M()->query($sql);
		  $this->assign('order_data', $order_data);
	      $this->display('piao_ddzx');
	}

	public function orderajax()
	{
	    $id  = $_POST['vod_id'];
		$key = $_POST['key'];
		$vod_ids = $_SESSION['vod_ids'];
		if(!$vod_ids)
		{
		   unset($vod_ids);
		   $vod_ids = array();
		}
			//$vod_ids = unserialize($vod_ids);
			if($key==1)
			{
			    array_push($vod_ids, $id);
			   $str = "加入成功！";
			}
		    elseif($key==0)
			{
				unset($vod_ids[array_search($id , $vod_ids)]);//利用unset删除这个元素
			    $str = "删除成功！";
			}	
			$vod_ids = array_unique($vod_ids);
			//$vod_ids = serialize($vod_ids);
			$_SESSION['vod_ids'] = $vod_ids;
        exit($str);
	}

	public function order_list()
	{
	     $vod_ids = $_SESSION['vod_ids'];
		 $people  = $_POST['people']; 
		 $way     = $_POST['way'];
		 $content = $_POST['content'];
		 $time    = time();
         $passwd  = md5('123456');
		 $ip      =  $_SERVER["REMOTE_ADDR"];
		 $sql = " insert into pp_member set username='{$people}', password='{$passwd}', regtime='{$time}', regip='{$ip}'";
		 M()->query($sql);
         
		 foreach($vod_ids as $val)
		 {	 
	         $sql = " insert into pp_order set people='{$people}', way='{$way}', content='{$content}', vod_id=$val";
	          M()->query($sql);	 
		 }	 
		 echo "<script>alert('提交成功！'); history.go(-1);</script>";
	}
}?>
