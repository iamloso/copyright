<?php
class NewsAction extends BaseAction{	
    public function show(){

		$sql = "select A.*, B.*, C.list_name from pp_order as A left join pp_vod as B on A.vod_id=B.vod_id left join pp_list as C on B.vod_cid=C.list_id ";
		$order_list = M()->query($sql);
		$this->assign('order_list', $order_list);
        $this->display(APP_PATH.'/Public/admin/news.html');
    }
}
?>
