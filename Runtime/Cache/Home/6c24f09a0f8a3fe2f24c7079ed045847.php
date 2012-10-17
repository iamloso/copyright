<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($title); ?></title>
<meta name="keywords" content="<?php echo (($list_keywords)?($list_keywords):''.$keywords.''); ?>">
<meta name="description" content="<?php echo ($description); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<?php echo ($css); ?>
<script type="text/javascript" src="<?php echo ($tpl); ?>js/ajax.js" charset="utf-8"></script>
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
<div class="bd960 clear"><?php echo getadsurl('top960');?></div>
<div class="datal">
	<dl class="tit clear"><span><?php $tag_list=$pplist->pptag('id:'.$vod_id.';sid:1;'); ?><?php if(is_array($tag_list)): $i = 0; $__LIST__ = $tag_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><?php if(($i)  ==  "1"): ?>标签：<?php endif; ?><a href="<?php echo ($ppvod["tag_url"]); ?>" target="_blank"><?php echo (msubstr($ppvod["tag_name"],0,4)); ?></a>&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?></span><dt>当前位置：<a href="<?php echo ($root); ?>">首页</a> &raquo; <?php echo ($list_name); ?> &raquo; <?php echo ($vod_name); ?></dt></dl>
    <div class="vmain">
	<div class="vpic"><img src="<?php echo (getpicurl($vod_pic)); ?>" alt="<?php echo ($vod_name); ?>" border="0"/></div>
	<div class="vshow">
    <h2><?php echo getcolor($vod_name.$vod_title,$vod_color);?><span id="plus_gold"><?php for($i=1;$i<=10;$i++){echo '<img src="'.$tpl.'images/x2.png" onmouseover="plus_gold_img('.$i.');" onmouseout="plus_gold_show();" onclick="plus_gold('.$i.');" />';} ?></span></h2>
    <p>主要演员：<?php echo (getactorurl($vod_actor)); ?></p>
    <p>所属分类：<?php echo ($list_name); ?> <?php echo ($vod_area); ?></p>
    <p>更新时间：<?php echo (date('Y-m-d H:i:s',$vod_addtime)); ?></p>
    <p>连载状态：<?php if(($vod_continu)  !=  "0"): ?><font color="red">连载至<?php echo ($vod_continu); ?>集</font><?php else: ?>完结<?php endif; ?></p>
    <p>影片热度：<span id="view_hits"><script type="text/javascript" src="<?php echo ($root); ?>index.php?s=vod-ajaxhot-id-<?php echo ($vod_id); ?>-t-1"></script></span>℃</p>
    <p>影片映像：<a href="javascript:" onclick="plus_vod_ud(<?php echo ($vod_id); ?>,1,'<?php echo ($root); ?>');" class="vup">顶/<span id="s1"><?php echo ($vod_up); ?></span></a> <a href="javascript:" onclick="plus_vod_ud(<?php echo ($vod_id); ?>,2,'<?php echo ($root); ?>');" class="vdown">踩/<span id="s2"><?php echo ($vod_down); ?></span></a>&nbsp;&nbsp;共<span id="golder"><?php echo ($vod_golder); ?></span>人评分/平均得分<span id="gold"><?php echo ($vod_gold); ?></span>/总得分<span id="goldall"><?php echo ($vod_gold); ?></span></p>
    <p class="input"><script language="javascript" src="<?php echo ($tpl); ?>js/copy.js"></script></p>
	</div>
    <div class="vbanner"><?php echo getadsurl('right300250');?></div>
    </div>
</div>
<?php if(is_array($ppplay)): $i = 0; $__LIST__ = $ppplay;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><?php if(($ppvod["playname"])  ==  "down"): ?><script src="http://pstatic.xunlei.com/js/webThunderDetect.js"></script>
<div class="datal clear">
    <dl class="tit clear"><dt>影片来源：<?php echo ($ppvod["playname"]); ?>迅雷下载</dt></dl>
    <div class="vmain"><div class="vpl"><ul>
        <?php if(is_array($ppvod['son'])): $i = 0; $__LIST__ = $ppvod['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvodson): ++$i;$mod = ($i % 2 )?><a oncontextmenu=ThunderNetwork_SetHref(this) onclick="return OnDownloadClick_Simple(this,2,4)" href="#" thunderResTitle="222" thunderType="" thunderPid="03682" thunderHref="thunder://<?php echo base64_encode('AA'.$ppvodson['playpath'].'ZZ');?>"><?php echo ($ppvodson["playname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?> 
    </ul></div></div>
</div>
<?php else: ?>
<div class="datal clear">
    <dl class="tit clear"><dt>影片来源：<?php echo ($ppvod["playername"]); ?></dt></dl>
    <div class="vmain"><div class="vpl"><ul>
        <?php if(is_array($ppvod['son'])): $i = 0; $__LIST__ = $ppvod['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvodson): ++$i;$mod = ($i % 2 )?><a href="<?php echo ($ppvodson["playurl"]); ?>" target="_blank"><?php echo ($ppvodson["playname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul></div></div>
</div><?php endif; ?><?php endforeach; endif; else: echo "" ;endif; ?>
<div class="datal clear"><a name="juqing"></a>
	<dl class="tit"><dt style="float:left">有关《<?php echo ($vod_name); ?>》的剧情</dt></dl>
	<div class="vmain"><div class="vcs">
	<ul><?php echo ($vod_content); ?></ul>
	</div></div>
</div>
<div class="datal clear">
	<dl class="tit"><dt style="float:left">有关《<?php echo ($vod_name); ?>》的评论</dt></dl>
    <div id="ajax_vod_cm"></div><script type="text/javascript">plus_vod_ud(<?php echo ($vod_id); ?>,0,'<?php echo ($root); ?>');var gold_id=<?php echo ($vod_id); ?>;var gold_root='<?php echo ($root); ?>';var gold_model='vod';plus_gold(0);plus_cm_list('vod','<?php echo ($root); ?>',<?php echo ($vod_id); ?>);</script>
</div>
<div class="footer">
  <ul>
    <li>Copyright&copy;2008-2009 <a href="<?php echo ($siteurl); ?>"><?php echo ($siteurl); ?></a>. all rights reserved. <?php echo ($copyright); ?> <a href="http://www.miibeian.gov.cn/" target="_blank"><?php echo ($icp); ?></a> <?php echo ($tongji); ?></li>
  </ul>
</div>

</div>
</body>
</html>