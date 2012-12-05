<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<title>管理面版</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="<?php echo C("admin_keywords");?>">
<meta name="description" content="<?php echo C("admin_description");?>">
<link rel='stylesheet' type='text/css' href='__PUBLIC__/css/admin.css'>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="__PUBLIC__/js/admin.js"></script>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="__PUBLIC__/js/jquery.js"></script>
</head>
<body>
<script language="javascript">
// 设置审核状态
function setisok(id){
 	var isok = 0;
	if($('#isok_'+id).attr('title')=='已审核'){
		isok = 1;
	}
	var html = $.ajax({
		url: "index.php?s=Admin-Vod-Ajaxdel-id-"+id+"-isok-"+isok,
		//data: "id="+id+"&isok="+isok,
		//cache: false,
		async: false
	}).responseText;
	if(html){
		if(isok==1){
			$('#isok_'+id).attr({src:'__PUBLIC__/images/no.gif', title:'未审核'});
		} else{
			$('#isok_'+id).attr({src:'__PUBLIC__/images/yes.gif', title:'已审核'});
		}
	}
}
//设置权重
function sethot(id, hot){
	var html = $.ajax({
		url: 'index.php?s=Admin-Vod-Ajaxhot-id-'+id+'-hot-'+hot,
		//data: "id="+id+"&hot="+hot,
		//cache: false,
		async: false
	}).responseText;
	if(html){
		for(i=0; i<6; i++){
			$('#hot_'+id+'_'+i).removeClass('hot_on');
		}
		$('#hot_'+id+'_'+hot).addClass('hot_on');
	}
}
// 图片预览
function showpic(event,imgsrc){	
	var left = event.clientX+document.body.scrollLeft+20;
	var top = event.clientY+document.body.scrollTop+20;
	$("#preview").css({left:left,top:top,display:""});
	$("#pic_a1").attr("src",imgsrc);
}
// 取消预览
function hiddenpic(){
	$("#preview").css({display:"none"});
}
// 显示标签框
function showtags(){
	var offset = $("#vod_tag").offset();
	var left = offset.left;
	var top = offset.top+21;
	var html = $.ajax({
		url: "index.php?s=Admin-Tag-Show-id-ajax",
		async: false
	}).responseText;
	$("#showtags").html(html);
	$("#showtags").css({left:left,top:top,display:""});
}
// 添加标签
function addtag(tag){
	var val = $('#vod_tag').val();
	if(val!=''){
		val = val+','+tag;
	}else{
		val = tag;
	}
	$('#vod_tag').val(val);
	tb_close();
}
// 关闭标签框
function tb_close(){
	$("#showtags").css('display','none');
}
//弹出生成网页框
function showhtml(vodid){
	loading();
	var o=$('#show_upload');
	var f=$('#show_upload_iframe');
	var top = 250;	
	$.ajax({
		url: 'index.php?s=Admin-Html-readvodid-id-'+vodid+'',
		//cache: false,
		success: function(res){
			loaded();
			o.html(res);
			o.css("left",(($(document).width())/2-(parseInt(o.width())/2))+"px");
			if($(document).scrollTop()>250){
				top = ($(document).height()+$(document).scrollTop())/2-(parseInt(o.height())/2);
			}
     		o.css("top",top+"px");
			f.css({'width':o.width(),'height':o.height(),'left':o.css('left'),'top':o.css('top')});
	 		f.show();
			o.show();
			setTimeout("hideupload()",1000);
		}
	});
}
</script>
<div class="right">
  <div class="right_top">欢迎光临系统后台</div>
  <div class="right_main">
  <!--图片预览框-->
  <div id="preview" style="position:absolute;display:none;width:75;height:75;" class="showpic"><img name="pic_a1" id="pic_a1" width="75" height="75"></div>
  <!--消息框遮罩层-->
  <iframe id="show_upload_iframe" frameborder=0 scrolling="no" style="display:none; position:absolute;"></iframe><div id="show_upload">nothing...</div>
  <!--页面加载中-->
  <div id="body_loading" onClick="loaded();"><img src="__PUBLIC__/images/body_load.gif"></div>
  <!--标签选择框-->
  <div id="showtags" style="position:absolute;display:none;" class="showtags">标签加载中...<br><a href="javascript:tb_close()">关闭</a></div> 
  <!--缩略图上传-->
  <iframe name="iframeUpload" src="" width="350" height="35" frameborder=0  scrolling="no" style="display:none"></iframe>
<?php if(strtolower(ACTION_NAME) == show ): ?><form action="index.php?s=Admin-Vod-Show" method="post">{__NOTOKEN__}
      <table width="98%" border="0" cellpadding="4" cellspacing="1" class="tableoutline">
        <tr class="tb_head">
        </tr>
        <tr class="firstalt">
			<td colspan="5" style="line-height:30px;">
				<!--
			 	筛选内容：
            <select name="vod_cid" id="vod_cid" ><option value='<?php if(($vod_cid)  ==  "0"): ?>0<?php endif; ?>'>全部分类</option>
              <?php if(is_array($listvod)): $i = 0; $__LIST__ = $listvod;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pp): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($pp["list_id"]); ?>" <?php if(($pp["list_id"])  ==  $vod_cid): ?>selected<?php endif; ?>><?php echo ($pp["list_name"]); ?></option>
                <?php if(is_array($pp['son'])): $i = 0; $__LIST__ = $pp['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pp): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($pp["list_id"]); ?>" <?php if(($pp["list_id"])  ==  $vod_cid): ?>selected<?php endif; ?>>├ <?php echo ($pp["list_name"]); ?></option>
					<?php if(is_array($pp['son'])): $i = 0; $__LIST__ = $pp['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pp): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($pp["list_id"]); ?>" <?php if(($pp["list_id"])  ==  $vod_cid): ?>selected<?php endif; ?>>├ <?php echo ($pp["list_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?><?php endforeach; endif; else: echo "" ;endif; ?><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
            &nbsp;&nbsp;
            <select name="vod_play"><option value="0">服务器组</option><?php if(is_array($playtree)): $i = 0; $__LIST__ = $playtree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><option value='<?php echo ($key); ?>' <?php if(($key)  ==  $vod_play): ?>selected<?php endif; ?>><?php echo ($ppvod); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></select>
			  &nbsp;&nbsp;
            <select name="vod_stars" id="vod_stars" class="select">
              <option value="0" <?php if(($vod_stars)  ==  "0"): ?>selected<?php endif; ?>>所有星级</option>
              <option value="1" <?php if(($vod_stars)  ==  "1"): ?>selected<?php endif; ?>>一星内容</option>
              <option value="2" <?php if(($vod_stars)  ==  "2"): ?>selected<?php endif; ?>>二星内容</option>
              <option value="3" <?php if(($vod_stars)  ==  "3"): ?>selected<?php endif; ?>>三星内容</option>
              <option value="4" <?php if(($vod_stars)  ==  "4"): ?>selected<?php endif; ?>>四星内容</option>
              <option value="5" <?php if(($vod_stars)  ==  "5"): ?>selected<?php endif; ?>>五星内容</option>
		  </select>-->
            &nbsp;&nbsp;
            <select name="vod_del" id="vod_del" class="select">
              <option value="0">全部状态</option>
              <option value="2" <?php if(($vod_del)  ==  "2"): ?>selected<?php endif; ?>>已审核</option>
              <option value="1" <?php if(($vod_del)  ==  "1"): ?>selected<?php endif; ?>>未审核</option>
            </select>
            &nbsp;&nbsp;
			<!--
            <select name="vod_continu" id="vod_continu" class="select">
              <option value="0">连载状态</option>
              <option value="2" <?php if(($vod_continu)  ==  "2"): ?>selected<?php endif; ?>>已完结</option>
              <option value="1" <?php if(($vod_continu)  ==  "1"): ?>selected<?php endif; ?>>连载中</option>
            </select>            
			&nbsp;&nbsp;-->
            <select name="vod_type" id="vod_type" class="select">
              <option value="0">排序方式</option>
              <option value="vod_addtime" <?php if(($vod_type)  ==  "vod_addtime"): ?>selected<?php endif; ?>>时间</option>
              <option value="vod_id" <?php if(($vod_type)  ==  "vod_id"): ?>selected<?php endif; ?>>ID</option>
            </select>            
            &nbsp;&nbsp;
            <select name="vod_order" id="vod_order" class="select">
              <option value="desc">降序</option>
              <option value="asc" <?php if(($vod_order)  ==  "asc"): ?>selected<?php endif; ?>>升序</option>
            </select>
            &nbsp;&nbsp;关键字：
            <input name="vod_name" type="text" id="vod_name" value="<?php echo (urldecode($vod_name)); ?>" size="10" maxlength="20">
            <input name="vod_submit" type="submit" value=" 显示 " class="mininput"></td>
        </tr>
      </table>
    </form>
    <form action="index.php?s=Admin-Vod-Show" method="post" name="myform">
      <table width="98%" border="0" cellpadding="4" cellspacing="1" class="tableoutline">
        <tr align="center" class="tb_title" >
          <td width="2%" nowrap >ID</td>
          <td width="5%" nowrap>序号</td>
          <td >影片分类 标题 </td>
          <td width="5%" nowrap >报价</td>
          <td width="5%" nowrap >出品公司</td>
          <td width="4%" nowrap >导演</td>
          <td width="13%" nowrap >公映时间</td>
          <td width="3%" nowrap >状态</td>
          <td width="5%" nowrap >编辑</td>
        </tr>
        <?php if(is_array($list)): $key = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppcms): ++$key;$mod = ($key % 2 )?><?php if($ppcms["vod_del"]==0){
            $isok_img = 'yes.gif';
            $isok_title= '已审核';
        }else{
            $isok_img = 'no.gif';
            $isok_title= '未审核';
        }
        $hot = array();
        $hot[$ppcms["vod_stars"]] = 'class="hot_on"'; ?>
          <tr class="firstalt">
            <td ><input name='vod_id[<?php echo ($ppcms["vod_id"]); ?>]' type='checkbox' value='<?php echo ($ppcms["vod_id"]); ?>' style='border:none' checked></td>
           <td align="center"><input type="text" value="<?php echo ($key); ?>" style="border:#CCC 1px solid;width:98%;text-align:center;color:green"></td>
            <td><span style="float:right;color:#666"><?php echo (str_replace('$$$',' ',$ppcms["vod_play"])); ?></span><?php if(c('url_html') > 0): ?><a href="javascript:showhtml(<?php echo ($ppcms["vod_id"]); ?>);"><font color="green">生成</font></a><?php endif; ?><span class="conlist_cate"><a href="<?php echo ($ppcms["vod_showid"]); ?>">『<?php echo getlistname($ppcms["vod_cid"]);?>』</a></span><a href="#" onMouseOver="showpic(event, '<?php echo (getpicurl($ppcms["vod_pic"])); ?>');" target="_blank" onMouseOut="hiddenpic();"><?php echo ($ppcms["vod_name"]); ?> <?php echo ($ppcms["vod_title"]); ?></a></td>
            <td align="center"><?php echo ($ppcms["vod_money"]); ?></td>
            <td align="center" style="color:#666"><?php echo ($ppcms["vod_reurl"]); ?></td>
            <td align="center"><?php echo ($ppcms["vod_director"]); ?></td>
            <td align="center"><?php echo (date('Y-m-d H:i:s',$ppcms["vod_addtime"])); ?></td>
            <td align="center" nowrap><a href="javascript:setisok('<?php echo ($ppcms["vod_id"]); ?>')"><img id="isok_<?php echo ($ppcms["vod_id"]); ?>" src="__PUBLIC__/images/<?php echo ($isok_img); ?>" title="<?php echo ($isok_title); ?>"></a></td>
            <td width="5%" colspan="2" align="center" nowrap ><a href="index.php?s=Admin-Vod-Add-vod_id-<?php echo ($ppcms["vod_id"]); ?>"><img src="__PUBLIC__/images/edit.gif" alt="编辑" width="14" height="14" border="0" align="absmiddle" title="编辑"></a><a href="index.php?s=Admin-Vod-Del-vod_id-<?php echo ($ppcms["vod_id"]); ?>" onClick="return confirm('确定删除?')"><img src="__PUBLIC__/images/del.gif" alt="删除" width="14" height="14" border="0" align="absmiddle" title="删除"></a></td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        <tr class="firstalt">
          <td colspan="10" style=" padding:10px;"><div style="background:#CFF; padding:5px;"><input type="button" class="mininput" value="全/反选" onClick="CheckAll(this.form)" /> <?php if(c('url_html') == 1): ?><input type="submit" class="mininput" value="生成静态" onClick="ChangeAction('index.php?s=Admin-Vod-ishtml')"/><?php endif; ?> <input type="submit" class="mininput" value="已审核" onClick="ChangeAction('index.php?s=Admin-Vod-isok')"/> <input type="submit" class="mininput" value="未审核" onClick="ChangeAction('index.php?s=Admin-Vod-notok')"/> <input type="submit" class="mininput" value="删除影片" onClick="ChangeAction('index.php?s=Admin-Vod-delall');return confirm('确定删除?')"/>&nbsp;</div></td>
        </tr>
        <tr class=firstalt>
          <td colspan="10"><div class="pages"><?php echo ($page); ?></div></td>
        </tr>
      </table>
    </form>
<?php elseif(strtolower(ACTION_NAME) == add): ?>
	<script type="text/javascript" charset="utf-8" src="__PUBLIC__/js/editor/kindeditor.js"></script>
    <script type="text/javascript"> KE.show({
	id : 'content',
	resizeMode : 1,
	allowPreviewEmoticons : false,
	allowUpload : false,
	items : [
	'source', '|', 'fontsize', 'textcolor', 'bgcolor', 'bold', 'italic', 'underline',
	'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
	'insertunorderedlist', '|', 'image', 'link', 'unlink']
	});	</script>
      <?php if(($vod_id)  >  "0"): ?><form name="update" action="index.php?s=Admin-Vod-Update" method="post">
      <input type="hidden" name="vod_id" value="<?php echo ($vod_id); ?>">
      <?php else: ?>
      <form name="add" action="index.php?s=Admin-Vod-Insert" method="post"><?php endif; ?>        
      <table width="98%" border="0" cellpadding="4" cellspacing="1" class="tableoutline">
		<tr><td><B>基本情况:</B></td></tr>
        <tr class="firstalt">
			<td align="right">题材分类：</td><td><select name="vod_cid" id="select_type">
          <?php if(is_array($listvod)): $i = 0; $__LIST__ = $listvod;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pp): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($pp["list_id"]); ?>" <?php if(($pp["list_id"])  ==  $vod_cid): ?>selected<?php endif; ?>><?php echo ($pp["list_name"]); ?></option>
              <?php if(is_array($pp['son'])): $i = 0; $__LIST__ = $pp['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pp): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($pp["list_id"]); ?>" <?php if(($pp["list_id"])  ==  $vod_cid): ?>selected<?php endif; ?>>├ <?php echo ($pp["list_name"]); ?></option>
				  <?php if(is_array($pp['son'])): $i = 0; $__LIST__ = $pp['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pp): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($pp["list_id"]); ?>" <?php if(($pp["list_id"])  ==  $vod_cid): ?>selected<?php endif; ?>>&nbsp;&nbsp;├ <?php echo ($pp["list_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?><?php endforeach; endif; else: echo "" ;endif; ?><?php endforeach; endif; else: echo "" ;endif; ?></select></td>
		</tr> 
		<tr class="firstalt">
          <td align="right">标题：</td>
		  <td><input name="vod_name" type="text" size="60" maxlength="255" value="<?php echo ($vod_name); ?>"></td>
	    </tr>
		<tr class="firstalt">
		  <td align="right">英名称：</td>
		  <td><input name="vod_title" type="text" size="60"  maxlength="255" value="<?php echo ($vod_title); ?>"></td>
        </tr>
		<tr class="firstalt">
			<td align="right">标签：</td>
			<td><input name="vod_tag" id="vod_tag" type="text" size="27" value="<?php echo ($vod_tag); ?>"> <a href="javascript:showtags()"><img src="__PUBLIC__/images/tag.gif" alt="选择标签" width="26" height="26" border="0" align="absmiddle"></a></td>
		</tr>	
		<tr class="firstalt">
			<td align="right" id="gytime">公映时间：</td><td><input name="vod_addtime" type="text" size="27" value="<?php echo (date('Y-m-d H:i:s',$vod_addtime)); ?>"></td>
        </tr>
		<tr class="firstalt" id="director" >
			 <td align="right" id="vod_dir">导演：</td>
			 <td><input name="vod_director" type="text" size="60" value="<?php echo ($vod_director); ?>"></td>
		</tr>
		<tr class="firstalt" id="actor">
			<td align="right" id="vod_ac">演员：</td><td><input name="vod_actor" type="text" size="60" maxlength="255" value="<?php echo ($vod_actor); ?>"></td>
        </tr>
		<tr class="firstalt">
			<td align="right" id="jishu">集数： </td><td><input name="vod_skin" size="60" type="text" value="<?php echo ($vod_skin); ?>"></td>	
		</tr>
		<tr class="firstalt">
			<td align="right">出品公司：</td><td><input name="vod_reurl" type="text" size="60" value="<?php echo ($vod_reurl); ?>"></td>
		</tr>	
        <tr class="firstalt">
          <td align="right" id="upload_file">上传海报：</td>
          <td><span style="float:left; margin-top:5px"><input name="vod_pic" id="vod_pic" type="hidden" size="60" maxlength="255" value="<?php echo ($vod_pic); ?>" onMouseOver="if(this.value)showpic(event, '<?php echo C("upload_path");?>/'+this.value);" onMouseOut="hiddenpic();" style="height:22px"></span><span style="float:left;margin-top:5px"><iframe src="?s=Admin-Upload-Show-sid-video-fileback-vod_pic" scrolling="no" topmargin="0" width="300" height="28" marginwidth="0" marginheight="0" frameborder="0" align="left"></iframe></span></td>
		  <td><img src="<?php echo ($http_root); ?><?php echo ($vod_pic); ?>"></img></td>
	  </tr>      
        <tr class="firstalt">
			<td align="right">国家地区：</td><td> <select name="vod_area" style="width:60px;">
          <option value=''>地区</option>
          <?php if(is_array($vod_area_list)): $i = 0; $__LIST__ = $vod_area_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($val); ?>" <?php if(($val)  ==  $vod_area): ?>selected<?php endif; ?>><?php echo ($val); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></td>
		</tr> 
        <tr class="firstalt">
			<td align="right" id="fzmj">分钟/集：</td><td><input name="vod_continu" type="text" size="60" value="<?php echo ($vod_continu); ?>"></td>
		</tr>
		<tr class="firstalt">
			<td align="right" id="zongshichang">总时长：</td><td><input name="vod_keywords" type="text" size="60" value="<?php echo ($vod_keywords); ?>">&nbsp;&nbsp;</td>
		</tr>	
		<tr class="firstalt" id="yuyan" >
		   <td align="right" >语言：</td><td><select name="vod_language">
          <option value=''>语言</option>
          <?php if(is_array($vod_language_list)): $i = 0; $__LIST__ = $vod_language_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($val); ?>" <?php if(($val)  ==  $vod_language): ?>selected<?php endif; ?>><?php echo ($val); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></td>
		</tr>
		<tr class="firstalt">
		     <td align="right" id="scjz">素材介质：</td><td><input name="vod_gold" type="text" size="60" value="<?php echo ($vod_gold); ?>"></td>
		</tr>
		<tr class="firstalt">
		     <td align="right" id="vod_sort">作品排序：</td><td><input name="vod_sort" type="text" size="60" value="<?php echo ($vod_sort); ?>"></td>
		</tr>
		<tr><td><B>版权证明文件:</B></td></tr>
		<tr class="firstalt">
			<?php $file_arr = explode('|', $vod_file) ?>
			<td align="right">授权文件：</td><td><input name="vod_file[]" value="1" type="checkbox"  <?php if(in_array(1, $file_arr)) echo "checked=1" ?> />电影公映许可证 <input name="vod_file[]" value="2" type="checkbox"  <?php if(in_array(2, $file_arr)) echo "checked=1" ?> />音像发行许可证  
				<input name="vod_file[]" value="3" type="checkbox"  <?php if(in_array(3, $file_arr)) echo "checked=1" ?> />引进作品批文  <input name="vod_file[]" value="4" type="checkbox"  <?php if(in_array(4, $file_arr)) echo "checked=1" ?> />中国版权保护中心登记证明
				<input name="vod_file[]" value="5" type="checkbox"  <?php if(in_array(5, $file_arr)) echo "checked=1" ?>/>音像发行许可证  
		 </tr>	
		<tr><td><B>授权情况:</B></td></tr>
		<tr class="firstalt">
		     <td align="right">授权期限：</td><td><select name="vod_color">
          <option value=''>请选择！</option>                                            
          <option value='1'  <?php if(($vod_color)  ==  "1"): ?>selected<?php endif; ?>>1-3年</option>
          <option value='2'  <?php if(($vod_color)  ==  "2"): ?>selected<?php endif; ?>>3-5年</option>
          <option value='3'  <?php if(($vod_color)  ==  "3"): ?>selected<?php endif; ?>>5-10年</option>
          <option value='4'  <?php if(($vod_color)  ==  "4"): ?>selected<?php endif; ?>>10年以上</option>
          </select></td>
		</tr>
		<tr class="firstalt">
			<?php $ditch_arr = explode('|', $vod_ditch) ?>
			<td align="right">授权渠道：</td><td><input name="vod_ditch[]" value="0" type="checkbox" <?php if(in_array(0, $ditch_arr)) echo "checked=1" ?>/>互联网 <input name="vod_ditch[]" value="1" type="checkbox"  <?php if(in_array(1, $ditch_arr)) echo "checked=1" ?>/>无线网  
				<input name="vod_ditch[]" value="2" type="checkbox"  <?php if(in_array(2, $ditch_arr)) echo "checked=1" ?> />电视台  <input name="vod_ditch[]" value="3" type="checkbox"  <?php if(in_array(3, $ditch_arr)) echo "checked=1" ?> />院线
				<input name="vod_ditch[]" value="4" type="checkbox"  <?php if(in_array(4, $ditch_arr)) echo "checked=1" ?>/>音像  <input name="vod_ditch[]" value="5" type="checkbox"  <?php if(in_array(5, $ditch_arr)) echo "checked=1" ?> />其他
				<input name="vod_ditch[]" value="0|1|2|3|4|5" type="checkbox" id='allditch'/>全部</td>
		 </tr>			 
		 <tr class="firstalt">
			 <?php $way_arr = explode('|', $vod_way) ?>
		     <td align="right">授权方式：</td><td><input name="vod_way[]" value="0" type="checkbox"  <?php if(in_array(0, $way_arr)) echo "checked=1" ?>/>独家 <input name="vod_way[]" value="1" type="checkbox"  <?php if(in_array(1, $way_arr)) echo "checked=1" ?> />非独家</td> 
		 </tr>
		 <tr class="firstalt">
			<td align="right">授权地区：</td><td> <select name="vod_stars">
          <option value="0" <?php if(($vod_stars)  ==  "0"): ?>selected<?php endif; ?>>请选择！</option>
          <option value="1" <?php if(($vod_stars)  ==  "1"): ?>selected<?php endif; ?>>国内</option>
          <option value="2" <?php if(($vod_stars)  ==  "2"): ?>selected<?php endif; ?>>国外</option>
          <option value="3" <?php if(($vod_stars)  ==  "3"): ?>selected<?php endif; ?>>国内外</option>
          </select>&nbsp;&nbsp;</td>
		</tr>		  
        <tr class="firstalt">
			<td align="right">授权方公司名称：</td>
			<td><input name="vod_company" value="<?php echo ($vod_company); ?>" type="text" size="60"/> </td>
		</tr>	
        <tr class="firstalt">
			<td align="right">联系人：</td>
			<td><input name="vod_people" value="<?php echo ($vod_people); ?>" type="text" size="60"/> </td>
		</tr>	
		 <tr class="firstalt">
			<td align="right">手机：</td>
			<td><input name="vod_phone" value="<?php echo ($vod_phone); ?>" type="text" size="60"/> </td>
		</tr>	
		 <tr class="firstalt">
			<td align="right">电话：</td>
			<td><input name="vod_tele" value="<?php echo ($vod_tele); ?>" type="text" size="60"/> </td>
		</tr>
		 <tr class="firstalt">
			<td align="right">邮箱：</td>
			<td><input name="vod_email" value="<?php echo ($vod_email); ?>" type="text" size="60"/> </td>
		</tr>
<tr><td><B>销售情况:</B></td></tr>
		 <tr class="firstalt">
			<td align="right">版权报价：</td>
			<td><input name="vod_money" value="<?php echo ($vod_money); ?>" type="text" size="60"/> </td>
		</tr>
		<!--
		 <tr class="firstalt">
			<td align="right">授权渠道：</td>
			<td><input name="vod_ditch" value="0" type="checkbox" />互联网 <input name="vod_ditch" value="1" type="checkbox" />无线网  
				<input name="vod_ditch" value="2" type="checkbox"/>电视台  <input name="vod_ditch" value="3" type="checkbox"/>院线
				<input name="vod_ditch" value="4" type="checkbox"/>音像  <input name="vod_ditch" value="5" type="checkbox"/>其他
				<input name="vod_ditch" value="0|1|2|3|4|5" type="checkbox"/>全部
			</td>
		</tr>

		<tr class="firstalt">
			<td align="right">授权方式：</td>
			<td><input name="vod_way" value="0" type="checkbox" <?php if(($vod_way)  ==  "0"): ?>checked<?php endif; ?>/>独家 <input name="vod_way" value="1" type="checkbox" <?php if(($vod_way)  ==  "1"): ?>checked<?php endif; ?>/>非独家  
			</td>
		</tr>
		-->
		<tr class="firstalt">
			<td align="right">热门推荐：</td>
			<td><input name="vod_hot" value="0" type="radio" <?php if(($vod_hot)  ==  "0"): ?>checked<?php endif; ?> />否 <input name="vod_hot" value="1" type="radio" <?php if(($vod_hot)  ==  "1"): ?>checked<?php endif; ?> />是  
			</td>
		</tr>
		<tr class="firstalt">
			<td align="right">当月推荐：</td>
			<td><input name="vod_mhot" value="0" type="radio" <?php if(($vod_mhot)  ==  "0"): ?>checked="true"<?php endif; ?>/>否 <input name="vod_mhot" value="1" type="radio" <?php if(($vod_mhot)  ==  "1"): ?>checked="true"<?php endif; ?> />是  
			</td>
		</tr>
		<!--
        <tbody id="urlmoban" style="display:none;">
        <tr class="firstalt">
          <td align="right">数据地址：</td>
          <td><select name="vod_server[]" style="color:#666666;"><option value="">共享前缀</option><?php if(is_array($vod_server_list)): $i = 0; $__LIST__ = $vod_server_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$server): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($key); ?>"><?php echo ($i); ?>.<?php echo ($key); ?>.<?php echo ($server); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></select> <select name="vod_play[]" style="color:#003300;"><?php if(is_array($vod_play_list)): $i = 0; $__LIST__ = $vod_play_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$play): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($key); ?>"><?php echo ($i); ?>.<?php echo ($key); ?>.<?php echo ($play); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></select><br><textarea name='vod_url[]' style="width:715px;" rows="8"><?php echo ($url); ?></textarea></td>
        </tr>
        </tbody>
		<script language="javascript">
		var $urln=<?php echo count($vod_url);?>;
        function addurl(){
            var $old=$("#urlmoban").html();
			$urln=$urln+1;
			$old=$old.replace("数据地址","数据地址"+$urln);
            $("#urllist tr:last-child").after($old); 
        }
        </script>
        <tbody id="urllist">
        <?php if(is_array($vod_url)): $u = 0; $__LIST__ = $vod_url;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$url): ++$u;$mod = ($u % 2 )?><?php $sid=$vod_server[($u-1)];$pid=$vod_play[($u-1)]; ?>    
        <tr class="firstalt">
          <td align="right">数据地址<?php echo ($u); ?>：</td>
          <td><select name="vod_server[]" style="color:#666666;"><option value="">共享前缀</option><?php if(is_array($vod_server_list)): $i = 0; $__LIST__ = $vod_server_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$server): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($key); ?>" <?php if($key == $sid): ?>selected<?php endif; ?>><?php echo ($i); ?>.<?php echo ($key); ?>.<?php echo ($server); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></select> <select name="vod_play[]" style="color:#003300;"><?php if(is_array($vod_play_list)): $i = 0; $__LIST__ = $vod_play_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$play): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($key); ?>" <?php if(($key)  ==  $pid): ?>selected<?php endif; ?>><?php echo ($i); ?>.<?php echo ($key); ?>.<?php echo ($play); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></select><br/><textarea name='vod_url[]' style="width:715px;" rows="8"><?php echo ($url); ?></textarea></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
        <tr class="firstalt">
          <td align="right">新加地址：</td>
          <td><a onClick="addurl();" class="serverlist"><img src="__PUBLIC__/images/add.gif" alt="添加新播放器" border="0"> 点击新加一组播放器</a></td>
	  </tr>--> 
        <tr class="firstalt">
          <td align="right">简介：</td>
          <td><textarea id="content" name="vod_content" style="width:715px;height:300px;"><?php echo ($vod_content); ?></textarea></td>
        </tr>
        <tr class="firstalt">
          <td colspan="2" align="center"><p><input class="bginput" type="submit" name="submit" value=" 提交 " > <input class="bginput" type="reset" name="Input" value=" 重置 " ></p></td>
        </tr>
      </table>
    </form><?php endif; ?>
    </div>
</div>
<script type="text/javascript">
	$("#allditch").click(function(){
	      var $ditch_obj = this;
		  $('[name=vod_ditch[]]:checkbox').each(function(){
			//此处用JQ写法颇显啰嗦。体现不出JQ飘逸的感觉。
			//$(this).attr("checked", !$(this).attr("checked"));
			//$(this).prop("checked", !$(this).prop("checked"));
			
			//直接使用JS原生代码，简单实用
			if($ditch_obj.checked)
			{
				this.checked= 1;
			}
			else
			{
			   this.checked= 0;
			}
		  });
		  $ditch_obj.checked= 0;
 });
	$("#select_type").change
	(
		function()
		{
		   var type_id = $('#select_type').val();
		   if(type_id==6)
		   {
				 $("#gytime").text('首映时间：');
				 $("#vod_dir").text('栏目名称：');
				 $("#actor").hide();
		   }
		   else if(type_id==7)
		   {
		         $("#gytime").text('创作时间：'); 
		         $("#upload_file").text('作品封面：'); 
				 $("#vod_dir").text('作品类别：');
				 $("#vod_ac").text('总页数：');
				 $("#jishu").text('创作进程：');
				 $("#fzmj").text('作品署名：');
				 $("#zhongshichang").text('发布状态：');
				 $("#yuyan").hide();
                 $("#scjz").text('图文作者：');
		   }
	       else if(type_id==7)
		   {
				 $("#gytime").text('首映时间：');
				 $("#vod_dir").text('栏目名称：');
		   }
	    }
    );

</script>
</body>
</html>