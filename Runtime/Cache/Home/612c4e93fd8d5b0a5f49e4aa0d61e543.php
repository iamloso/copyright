<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($title); ?></title>
<meta name="keywords" content="<?php echo ($keywords); ?>">
<meta name="description" content="<?php echo ($description); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<?php echo ($css); ?>
</head>
<body>
<div class="top">
<div class="header">
	<div class="logo"><a href="<?php echo ($root); ?>" title="首页"></a></div>
	<div class="banner"><?php echo getadsurl('top46860');?></div>
</div>
<div class="search">
    <div class="nav">
        <dl><a onClick="var strHref=window.location.href;this.style.behavior='url(#default#homepage)';this.setHomePage('<?php echo ($siteurl); ?>');" href="#">设为主页</a> <a href="javascript:window.external.AddFavorite('<?php echo ($siteurl); ?>', '<?php echo ($sitename); ?>');">收藏本站</a></dl><ul>
        <li class="no_bg <?php if(($model)  ==  "index"): ?>on<?php endif; ?>"><a href="<?php echo ($root); ?>" title="<?php echo ($sitename); ?>">首 页</a></li>
        <?php if(is_array($ppmenu)): $i = 0; $__LIST__ = $ppmenu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><li class="<?php if(($ppvod["list_id"])  ==  $list_id): ?>no_bg on<?php endif; ?><?php if(($ppvod["list_id"])  ==  $list_pid): ?>no_bg on<?php endif; ?>"><a href="<?php echo ($ppvod["list_url"]); ?>"><?php echo ($ppvod["list_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul>
    </div>
    <div class="form"><?php if(($list_id)  ==  "20"): ?><form name="form1" method="post" action="<?php echo ($root); ?>index.php?s=news-search"><?php else: ?><form name="form1" method="post" action="<?php echo ($root); ?>index.php?s=vod-search"><?php endif; ?>
    	<input type="text" name="id" value="请在此处输入关键字" onclick="this.value = ''" maxLength="26" />
    	<button type="submit" id="searchbutton" name="Submit" >全站搜索</button></form>
    </div>
    <div class="up"><ul><?php $tag_list=$pplist->pptag('sid:1;num:8;'); ?>
    	<?php if(is_array($ppmenu)): $i = 0; $__LIST__ = $ppmenu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><?php if($ppvod["list_id"] == 1): ?><li>电　影：<?php if(is_array($ppvod["son"])): $i = 0; $__LIST__ = $ppvod["son"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$son): ++$i;$mod = ($i % 2 )?><a href="<?php echo ($son["list_url"]); ?>"><?php echo ($son["list_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></li>
        <?php elseif($ppvod["list_id"] == 2): ?>
        <li>电视剧：<?php if(is_array($ppvod["son"])): $i = 0; $__LIST__ = $ppvod["son"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$son): ++$i;$mod = ($i % 2 )?><a href="<?php echo ($son["list_url"]); ?>"><?php echo ($son["list_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></li><?php endif; ?><?php endforeach; endif; else: echo "" ;endif; ?>
        <li>标　签：<a href="<?php echo ppvodurl('ajax/show',false,false,false,true);?>">最近更新</a><?php if(is_array($tag_list)): $i = 0; $__LIST__ = $tag_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><a href="<?php echo ($ppvod["tag_url"]); ?>"><?php echo (msubstr($ppvod["tag_name"],0,4)); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></li>
    </ul></div>
</div>
</div>
<div class="main">
<?php $lz_list=$pplist->ppvod('pid:'.$list_id.';lz:1;order:vod_addtime desc'); ?><?php if(!empty($lz_list)): ?><div class="hsae lzmar">
	<div class="hsae1">
    <div class="hbae11 ssv lzing"><ul><?php if(is_array($lz_list)): $i = 0; $__LIST__ = $lz_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><li><a href="<?php echo ($ppvod["vod_url"]); ?>" title="<?php echo ($ppvod["vod_name"]); ?>" target="_blank"><?php echo ($ppvod["list_name"]); ?> <?php echo (msubstr($ppvod["vod_name"],0,10)); ?></a> <?php echo ($ppvod["vod_continu"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div>
	</div>
</div><?php endif; ?>
<div class="bd960 clear"><?php echo getadsurl('top960');?></div>
<?php $cidarr=getlistarr($list_id); ?>
<?php if(is_array($cidarr)): $k = 0; $__LIST__ = $cidarr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppcid): ++$k;$mod = ($k % 2 )?><?php $hits=$pplist->ppvod('cid:'.$ppcid.';num:12;order:vod_gold desc,vod_hits desc'); ?><?php if(!empty($hits)): ?><div class="list lzmar clear">
    <div class="listri">
    	<dl class="tit clear"><dt><?php echo getlistname($ppcid);?>排行榜</dt><dd class="f14"><a href="<?php echo getlistname($ppcid,'list_url');?>" target="_blank">更多>></a></dd></dl>
   		<ul><?php if(is_array($hits)): $i = 0; $__LIST__ = $hits;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><li><span><?php echo ($ppvod["vod_golder"]); ?></span><a href="<?php echo ($ppvod["vod_url"]); ?>" target="_blank"><?php echo ($ppvod["list_name"]); ?> <?php echo (msubstr($ppvod["vod_name"],0,12)); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul>
    </div><?php endif; ?>
<?php $list=$pplist->ppvod('cid:'.$ppcid.';num:12;order:vod_addtime desc'); ?><?php if(!empty($list)): ?><div class="listlf">
        <dl class="tit clear"><dt><?php echo getlistname($ppcid);?>最近更新</dt><dd class="f14"><a href="<?php echo getlistname($ppcid,'list_url');?>" target="_blank">更多>></a></dd></dl>
        <ul class="channel"><?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><dl><a href="<?php echo ($ppvod["vod_url"]); ?>" target="_blank"> <img src="<?php echo (getpicurl($ppvod["vod_pic"])); ?>" alt="<?php echo ($ppvod["vod_name"]); ?>" onerror="javascript:this.src='__PUBLIC__/images/nophoto.jpg';" width="93" height="125" border="0"/></a><br /><a href="<?php echo ($ppvod["vod_url"]); ?>" title="<?php echo ($ppvod["vod_name"]); ?>" target="_blank"><?php echo (msubstr($ppvod["vod_name"],0,6)); ?></a></dl><?php endforeach; endif; else: echo "" ;endif; ?></ul>
    </div>
</div><?php endif; ?>
<?php if(($k)  ==  "2"): ?><div class="bd960 clear"><?php echo getadsurl('top960');?></div><?php endif; ?><?php endforeach; endif; else: echo "" ;endif; ?>
<div class="footer">
  <ul>
    <li>Copyright&copy;2008-2009 <a href="<?php echo ($siteurl); ?>"><?php echo ($siteurl); ?></a>. all rights reserved. <?php echo ($copyright); ?> <a href="http://www.miibeian.gov.cn/" target="_blank"><?php echo ($icp); ?></a> <?php echo ($tongji); ?></li>
  </ul>
</div>

</div>
</body>
</html>