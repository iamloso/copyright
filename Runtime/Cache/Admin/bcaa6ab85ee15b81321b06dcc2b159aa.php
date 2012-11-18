<?php if (!defined('THINK_PATH')) exit();?>﻿<html>
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
<div class="right">
  <iframe id="show_upload_iframe" frameborder=0 scrolling="no" style="display:none; position:absolute;"></iframe><div id="show_upload" style="height:350px;overflow:auto">nothing...</div>
  <div id="body_loading" onClick="loaded();"><img src="__PUBLIC__/images/body_load.gif"></div>
  <div class="right_top">欢迎光临系统后台</div>
  <div class="right_main">
    <table width="98%" border="0" cellpadding="4" cellspacing="1" class="tableoutline">
      <tr class=tb_head>
        <td colspan="2" class="tbhead"><h2> 系统信息：</h2></td>
      </tr>
      <tr nowrap class="firstalt">
        <td width="25%">主机名 (IP：端口)：</td>
        <td width="75%"><?=$_SERVER['SERVER_NAME']?>(<?php echo $_SERVER['SERVER_ADDR'].":".$_SERVER['SERVER_PORT'] ?>)</td>
      </tr>
      <tr nowrap class="firstalt">
        <td width="25%">程序目录：</td>
        <td width="75%"><?php echo C("site_path");?></td>
      </tr>
      <tr nowrap class="firstalt">
        <td width="25%">Web服务器：</td>
        <td width="75%"><?=$_SERVER['SERVER_SOFTWARE']?></td>
      </tr>
      <tr nowrap class="firstalt">
        <td width="25%">PHP 运行方式：</td>
        <td width="75%"><?=PHP_SAPI?></td>
      </tr>
      <tr nowrap class="firstalt">
        <td width="25%">PHP版本：</td>
        <td width="75%"><?=PHP_VERSION?>&nbsp;&nbsp;<span style="color: #999999;">(>5.20)</span></td>
      </tr>
      <tr nowrap class="firstalt">
        <td>MySQL 版本：</td>
        <td><?=function_exists("mysql_close")?mysql_get_client_info():NO?>&nbsp;&nbsp;<span style="color: #999999;">(>4.20)</span></td>
      </tr>
      <tr nowrap class="firstalt">
        <td>GD库版本：</td>
        <td><?php
            $gd = gd_info();
			echo $gd['GD Version'] ? $gd['GD Version'] : "不支持!";
			?>
          &nbsp;&nbsp; <span style="color: #999999;">(&gt;=2.0.34 compatible)</span></td>
      </tr>
      <tr nowrap class="firstalt">
        <td width="25%">Zend Optimizer：</td>
        <td width="75%"><?=defined("OPTIMIZER_VERSION")?OPTIMIZER_VERSION:NO?></td>
      </tr>
      <tr nowrap class="firstalt">
        <td width="25%">最大上传限制：</td>
        <td width="75%"><?=ini_get('file_uploads') ? ini_get('upload_max_filesize') : '<span style="color:red">Disabled</span>';?></td>
      </tr>
      <tr nowrap class="firstalt">
        <td width="25%">最大执行时间：</td>
        <td width="75%"><?=ini_get('max_execution_time')?> seconds</td>
      </tr>
      <tr nowrap class="firstalt">
        <td width="25%">远程文件获取：</td>
        <td width="75%"><?=ini_get('allow_url_fopen') ? '<span style="color:green">支持采集</span>' : '<span style="color:red">不支持采集</span>'?></td>
      </tr>
      <tr nowrap class="firstalt">
        <td width="25%">远程图片检测：</td>
        <td width="75%"><?php if($imghttp > 0): ?>共<font color='red'><?php echo ($imghttp); ?></font>张远程图片需要[<a href="javascript:" onClick="showgetimg('index.php?s=Admin-Vod-ajaximgdown');"><font color='red'>保存到本地</font></a>]<?php else: ?>没有远程图片<?php endif; ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php if($imgfail > 0): ?>有<font color='green'><?php echo ($imgfail); ?></font>张远程图片保存失败[<a href="javascript:" onClick="showgetimg('index.php?s=Admin-Vod-ajaximgdown-id-fail');"><font color='green'>重新保存</font></a>]　<a href="index.php?s=Admin-Vod-Show-vod_pic-1">图片保存失败列表</a><?php endif; ?></td>
      </tr>      
      <tr nowrap class="firstalt">
        <td width="25%">伪静态检测：</td>
        <td width="75%"><?=function_exists('iconv_strlen') ? '支持' : '<span style="color:red">不支持</span>'?></td>
      </tr>      
    </table>
  </div>
</div>
</body>
</html>