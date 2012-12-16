<?php
class VodAction extends HomeAction{
    //影视列表
    public function show(){
		$cid= is_numeric($_REQUEST['id']) ? $_REQUEST['id'] : 1;
		$subid= is_numeric($_REQUEST['subid']) ? $_REQUEST['subid'] : 0;
		$vod_id = $_REQUEST['vod_id'];
		$search_key = $_REQUEST['search_key'];
		$name = $_GET['name'];
		$subname = $_GET['subname'];
		$this->assign('name', $name);
		$this->assign('subname', $subname);
		$this->assign('subid', $subid);
		$this->assign('cid', $cid);
		$pageSize = 20;
    	$menu_data = F('_ppvod/listtree');
		$ditch = array('互联网', '无线网', ' 电视台', ' 院线', '音像', '其他');
		$this->assign('ditch', $ditch);
		$cid = $subid ? $subid : $cid;
		if($vod_id)
		{
		     $sql = " select * from pp_vod where vod_id={$vod_id}";
			 $sanji_data = M()->query($sql);
			 $this->assign('vod_list', $sanji_data[0]);
			 $this->display('piao_xiangqing');
			 exit;
		}
		$sql = " select list_pid from pp_list where list_id={$cid}";
		$list_cat = M()->query($sql);
		if($list_cat[0]['list_pid']==0)
		{	
			foreach($menu_data as $key => &$value)
			{
				 $temp_array = array();
				 if($value['list_id']==$cid)
				 {
					 foreach($value['son'] as $k => $v)
					 {
						$temp_array[] = $v['list_id']; 
					 }
					 $list_ids = implode(',', $temp_array);
					 break;
				 }
				 else
				 {
					 continue;
				 }
			}
			$sql = " select count(*) as count from pp_vod where vod_cid in ({$list_ids}) and vod_del=0";
		    $sql1 = " select * from pp_vod where vod_cid in ({$list_ids}) and vod_del=0";
		}	
		else
		{
		    $sql = " select count(*) as count from pp_vod where vod_cid = {$cid} and vod_del=0";
		    $sql1 = " select * from pp_vod where vod_cid = {$cid} and vod_del=0";
		}
	    if($search_key)
		{
	        $sql .= " and vod_name like '%{$search_key}%' ";	
			$sql1 .= " and vod_name like '%{$search_key}%' ";
		}	

		$sql1 .= " order by vod_id desc";
		$vod_count = M()->query($sql);
        $p = new Page($vod_count[0]['count'], $pageSize);
		$sql1 .= " limit {$p->firstRow}, {$pageSize}";
		$vod_data = M()->query($sql1);
		$this->assign('pagehtml', $p->show());
		$this->assign('counts', $vod_count[0]['count']);
		$this->assign('totalPages',	$p->totalPages);
		$this->assign('totalRows', $p->totalRows);
		$this->assign('nowPage', $p->nowPage);
		$this->assign('vod_list', $vod_data);
		if($_GET['type'])
		{
		   $this->display('piao_erjitoo');
		}
		else
		{	
		   $this->display('piao_erji');
		}   
    }
}
?>
