<?php
return array (
  'db_type' => 'mysql',
  'db_host' => 'localhost',
  'db_name' => 'copyright',
  'db_user' => 'root',
  'db_pwd' => '123456',
  'db_port' => '3306',
  'db_prefix' => 'pp_',
  'db_charset' => 'utf8',
  'site_name' => '舟舟影视系统',
  'site_path' => '/copyright/',
  'site_url' => 'http://www.haiyaotuan.com/',
  'default_theme' => 'default',
  'site_keywords' => '舟舟影视系统PHP版,php电影程序',
  'site_description' => '努力打造舟舟影视系统为最好的PHP视频程序!',
  'site_email' => '110119@qq.com',
  'site_copyright' => '视频行业站点我选舟舟影视系统!',
  'site_tongji' => '<script language="javascript" type="text/javascript" src="http://js.users.51.la/5425689.js"></script>',
  'site_icp' => 'ICP备2010111号',
  'site_by' => '-www.haiyaotuan.com',
  'url_model' => '3',
  'url_html_suffix' => '.html',
  'url_num_admin' => '15',
  'admin_time_edit' => true,
  'admin_time_limit' => '300',
  'admin_order_type' => 'addtime',
  'upload_path' => 'Upload',
  'upload_style' => 'Y-m',

  'upload_class' => 'jpg,gif,png,jpeg.bmp',
  'upload_thumb' => true,
  'upload_thumb_w' => '120',
  'upload_thumb_h' => '140',
  'upload_water' => false,
  'upload_water_img' => 'Public/images/watermark.gif',
  'upload_water_pct' => '75',
  'upload_water_pos' => '5',
  'upload_http' => false,
  'upload_http_down' => '10',
  'upload_http_prefix' => '',
  'upload_ftp' => false,
  'upload_ftp_del' => '0',
  'upload_ftp_host' => '',
  'upload_ftp_user' => '',
  'upload_ftp_pass' => '',
  'upload_ftp_port' => '21',
  'upload_ftp_dir' => '/',
  'play_show' => '0',
  'play_width' => '950',
  'play_height' => '460',
  'play_qvod' => 'http://www.haiyaotuan.com/ads/vod/player.php?id=qvod',
  'play_gvod' => 'http://www.haiyaotuan.com/ads/vod/player.php?id=gvod',
  'play_pvod' => 'http://www.haiyaotuan.com/ads/vod/player.php?id=pvod',
  'play_web9' => 'http://www.haiyaotuan.com/ads/vod/player.php?id=web9',
  'play_bdhd' => 'http://www.haiyaotuan.com/ads/vod/player.php?id=bdhd',
  'play_baofeng' => 'http://www.haiyaotuan.com/ads/vod/player.php?id=baofeng',
  'play_playad' => 'http://www.haiyaotuan.com/ads/loading.html',
  'play_language' => '粤语,台语,国语,韩语,日语,英语',
  'play_area' => '香港,台湾,大陆,日韩,欧美,海外',
  'play_year' => '2012,2011,2010,2009,2008,2007,2006,2005,2004,2003,2002,2001,2000,1999',
  'play_server' => 
  array (
    'down_a' => 'http://www.haiyaituan.com/',
    'down_b' => 'http://bbs.haiyaotuan.com/',
  ),
  'play_collect_time' => '3',
  'play_collect_name' => '0',
  'play_second' => '8',
  'play_collect' => false,
  'play_collect_content' => 
  array (
    0 => '<a href="http://www.haiyaotuan.com" target="_blank"><font color="red">舟舟影视系统</font></a>',
    1 => '<font color="blue">舟舟影视系统</font>',
    2 => '<font color="green">舟舟影视系统</font>',
  ),
  'tmpl_cache_on' => false,
  'html_cache_on' => false,
  'html_cache_time' => 0,
  'html_read_type' => 0,
  'html_file_suffix' => '.html',
  'html_home_suffix' => '.html',
  'html_cache_index' => '1',
  'html_cache_list' => '1.5',
  'html_cache_content' => '12',
  'html_cache_play' => '12',
  'html_cache_ajax' => '12',
  '_htmls_' => 
  array (
    'home:index:index' => 
    array (
      0 => '{:action}',
      1 => 3600,
    ),
    'home:vod:show' => 
    array (
      0 => '{:module}_{:action}/{$_SERVER.REQUEST_URI|md5}',
      1 => 5400,
    ),
    'home:news:show' => 
    array (
      0 => '{:module}_{:action}/{$_SERVER.REQUEST_URI|md5}',
      1 => 5400,
    ),
    'home:vod:read' => 
    array (
      0 => '{:module}_{:action}/{id|md5}',
      1 => 43200,
    ),
    'home:news:read' => 
    array (
      0 => '{:module}_{:action}/{$_SERVER.REQUEST_URI|md5}',
      1 => 43200,
    ),
    'home:vod:play' => 
    array (
      0 => '{:module}_{:action}/{id|md5}',
      1 => 43200,
    ),
    'home:ajax:show' => 
    array (
      0 => '{:module}_{:action}/{$_SERVER.REQUEST_URI|md5}',
      1 => 43200,
    ),
  ),
  'url_html' => '0',
  'url_dir_a' => '1',
  'url_dir_b' => '1',
  'url_time' => '2',
  'url_number' => '100',
  'url_vodlist' => 'vodlist/',
  'url_voddata' => 'vod/',
  'url_vodplay' => 'play/',
  'url_newslist' => 'newslist/',
  'url_newsdata' => 'news/',
  'url_map' => 'map/',
  'home_pagenum' => '3',
  'home_pagego' => 'pagego',
  'user_gbcm' => true,
  'user_second' => '60',
  'user_gbnum' => '8',
  'user_cmnum' => '5',
  'user_replace' => '她妈|它妈|他妈|你妈|去死|贱人',
);
?>
