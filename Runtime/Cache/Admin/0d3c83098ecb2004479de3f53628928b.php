<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<title><?php echo C("admin_name");?> 管理面版 v<?php echo C("admin_var");?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="<?php echo C("admin_keywords");?>">
<meta name="description" content="<?php echo C("admin_description");?>">
<link rel='stylesheet' type='text/css' href='__PUBLIC__/css/admin.css'>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="__PUBLIC__/js/admin.js"></script>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="__PUBLIC__/js/jquery.js"></script>
</head>
<body>
<div class="right">
    <div class="right_top"><?php echo C("admin_welcome");?></div>
    <div class="right_main">
    <table width="98%" border="0" cellpadding="4" cellspacing="1" class="tableoutline">
      <tr class="tb_head" ><td><h2>操作导航：</h2></td></tr>
      <tr class="firstalt"><td><ul class="do_nav"><li><a href="index.php?s=Admin-Index-Show">用户列表</a></li><li><a href="index.php?s=Admin-Index-Add">添加用户</a></li></ul></td></tr>
    </table>
<?php if(strtolower(ACTION_NAME) == show ): ?><table width="98%" border="0" cellpadding="4" cellspacing="1" class="tableoutline">
        <tr class="tb_head" ><td colspan="7"><h2>用户列表：</h2></td></tr>
        <tr align="center" class="tb_title" >
          <td width="50">ID</td>
          <td >用户名</td>
          <td nowrap >E-mail</td>
          <td nowrap >上次登录时间</td>
          <td nowrap >上次登录IP</td>
          <td nowrap >登录次数</td>
          <td nowrap >操 作</td>
        </tr>  
        <form action="index.php?s=Admin-Index-Delall" method="post" name="myform">    
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$admin): ++$i;$mod = ($i % 2 )?><tr class="firstalt">
          <td><input name='admin_id[<?php echo ($admin["admin_id"]); ?>]' type='checkbox' value='<?php echo ($admin["admin_id"]); ?>' style='border:none' checked><?php echo ($admin["admin_id"]); ?></td>
          <td align="center" nowrap><?php echo ($admin["admin_name"]); ?></td>
          <td align="center" nowrap><?php echo ($admin["admin_email"]); ?></td>
          <td align="center" nowrap><font color="red"><?php echo (date('Y-m-d H:i:s',$admin["admin_logintime"])); ?></font></td>
          <td align="center" nowrap><?php echo ($admin["admin_ip"]); ?></td>
          <td align="center" nowrap><?php echo ($admin["admin_count"]); ?></td>
          <td align="center" nowrap><a href="index.php?s=Admin-Index-Add-admin_id-<?php echo ($admin["admin_id"]); ?>"><img src="__PUBLIC__/images/edit.gif" alt="编辑" width="14" height="14" border="0" align="absmiddle" title="编辑"></a> <a href="index.php?s=Admin-Index-Del-admin_id-<?php echo ($admin["admin_id"]); ?>" onClick="return confirm('确定删除?')"><img src="__PUBLIC__/images/del.gif" alt="删除" width="14" height="14" border="0" align="absmiddle" title="删除"></a>
          </td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        <tr class=firstalt>
          <td colspan="7"><input type="button" value="全/反选" onClick="CheckAll(this.form)" /> <select name="list_type" id="list_type" onChange="ChangeAction(this.value)"><option value="index.php?s=Admin-Index-Delall">批量删除</option></select> <input class="mininput" type="submit" value="提交操作"> <?php echo ($page); ?></td>
         </tr>
        </form>
      </table>
<?php elseif(strtolower(ACTION_NAME) == add): ?>
      <?php if(($admin_id)  >  "0"): ?><form name="update" action="index.php?s=Admin-Index-Update" method="post">
      <input type="hidden" name="admin_id" value="<?php echo ($admin_id); ?>">
      <input type="hidden" name="admin_pwd2" value="<?php echo ($admin_pwd); ?>">
      <?php else: ?>
      <form name="add" action="index.php?s=Admin-Index-Insert" method="post"><?php endif; ?>  
      <table width="98%" border="0" cellpadding="4" cellspacing="1" class="tableoutline">
        <tr class="tb_head">
          <td colspan="2"><h2>添加/修改后台用户：</h2></td>
        </tr>
        <tr class=firstalt>
          <td width="15%">用户名称：</td>
          <td ><input name="admin_name"  type="text" value="<?php echo ($admin_name); ?>" size="35" >
          </td>
        </tr>
        <tr class=firstalt>
          <td>用户密码：</td>
          <td><input name="admin_pwd"  type="text" size="35" maxlength="50"> 不修改密码请留空</td>
        </tr>
        <tr class=firstalt>
          <td>联系邮箱：</td>
          <td><input name="admin_email"  type="text" value="<?php echo ($admin_email); ?>" size="35" maxlength="50"></td>
        </tr>
        <tr class=firstalt>
          <td>用户权限：</td>
          <td>
          <input name="admin_ok[0]" type="checkbox" value="1" class="noborder" <?php if(($admin["0"])  ==  "1"): ?>checked<?php endif; ?>>后台用户
          <input name="admin_ok[1]" type="checkbox" value="1" class="noborder" <?php if(($admin["1"])  ==  "1"): ?>checked<?php endif; ?>>分类管理
          <input name="admin_ok[2]" type="checkbox" value="1" class="noborder" <?php if(($admin["2"])  ==  "1"): ?>checked<?php endif; ?>>视频管理
          <input name="admin_ok[3]" type="checkbox" value="1" class="noborder" <?php if(($admin["3"])  ==  "1"): ?>checked<?php endif; ?>>新闻管理
          <input name="admin_ok[4]" type="checkbox" value="1" class="noborder" <?php if(($admin["4"])  ==  "1"): ?>checked<?php endif; ?>>用户管理
          <input name="admin_ok[5]" type="checkbox" value="1" class="noborder" <?php if(($admin["5"])  ==  "1"): ?>checked<?php endif; ?>>采集管理
          <input name="admin_ok[6]" type="checkbox" value="1" class="noborder" <?php if(($admin["6"])  ==  "1"): ?>checked<?php endif; ?>>数据备份
          <input name="admin_ok[7]" type="checkbox" value="1" class="noborder" <?php if(($admin["7"])  ==  "1"): ?>checked<?php endif; ?>>上传管理<br>
          <input name="admin_ok[8]" type="checkbox" value="1" class="noborder" <?php if(($admin["8"])  ==  "1"): ?>checked<?php endif; ?>>友链管理
          <input name="admin_ok[9]" type="checkbox" value="1" class="noborder" <?php if(($admin["9"])  ==  "1"): ?>checked<?php endif; ?>>广告管理
          <input name="admin_ok[10]" type="checkbox" value="1" class="noborder" <?php if(($admin["10"])  ==  "1"): ?>checked<?php endif; ?>>缓存管理
          <input name="admin_ok[11]" type="checkbox" value="1" class="noborder" <?php if(($admin["11"])  ==  "1"): ?>checked<?php endif; ?>>生成管理
          <input name="admin_ok[12]" type="checkbox" value="1" class="noborder" <?php if(($admin["12"])  ==  "1"): ?>checked<?php endif; ?>>模板管理
          <input name="admin_ok[13]" type="checkbox" value="1" class="noborder" <?php if(($admin["13"])  ==  "1"): ?>checked<?php endif; ?>>评论管理
          <input name="admin_ok[14]" type="checkbox" value="1" class="noborder" <?php if(($admin["14"])  ==  "1"): ?>checked<?php endif; ?>>留言管理
          <input name="admin_ok[15]" type="checkbox" value="1" class="noborder" <?php if(($admin["15"])  ==  "1"): ?>checked<?php endif; ?>>TAG管理
          </td>
        </tr> 
        <tr class="firstalt">
          <td colspan="2" align="center"><input class="bginput" type="submit" name="submit" value=" 提交 " > <input class="bginput" type="reset" name="Input" value=" 重置 " >
          </td>
        </tr>
      </table>
    </form><?php endif; ?>
    </div>
    </div>
</div>
<br /><center>Powered by： <a href="<?php echo C("admin_url");?>" target="_blank"><?php echo C("admin_name");?></a> v<?php echo C("admin_var");?></center>
</body>
</html>