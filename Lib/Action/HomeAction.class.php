<?php
class HomeAction extends AllAction{
    //前台公用文件
    public function _initialize(){
	    $style=array();
        header("Content-Type:text/html; charset=".C(DEFAULT_CHARSET));	
		$style['tpl']=C('site_path').TEMPLATE_PATH.'/';
		$style['css']='<link rel="stylesheet" type="text/css" href="'.C('site_path').TEMPLATE_PATH.'/style.css">'."\n";
		$style['root']=C('site_path');//APP_PATH.'/'
		$style['sitename']=C('site_name');
		$style['siteurl']=C('site_url');
		$style['keywords']=C('site_keywords');
		$style['description']=C('site_description');
		$style['email']=C('site_email');
		$style['copyright']=C('site_copyright');
		$style['tongji']=C('site_tongji');
		$style['icp']=C('site_icp');
		$style['model'] =strtolower(MODULE_NAME);
		$style['action']=strtolower(ACTION_NAME);
		C('TOKEN_NAME','__ppvod__');	
        $this->assign($style);
		$this->assign('pplink',F('_ppvod/link'));
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
                 $sql = " select count(*) as count from pp_vod where vod_hot=1 and vod_cid in ('{$list_ids}') and vod_del=0";
				 $vod_data = M()->query($sql);
			     $value['count'] = $vod_data[0]['count']; 
			 }
		}
		$this->assign('ppmenu', $menu_data);
    }	
	public function showmenu(){
	    return F('_ppvod/listtree');
	}
}
?>
