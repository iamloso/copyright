<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<title><?php echo C("admin_name");?> 管理面版 v<?php echo C("admin_var");?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="<?php echo C("admin_keywords");?>">
<meta name="description" content="<?php echo C("admin_description");?>">
<link rel='stylesheet' type='text/css' href='__PUBLIC__/css/admin.css'>
<script type="text/javascript">
	function reloadcode(){
	var verify=document.getElementById('safecode');
	verify.setAttribute('src','index.php?s=Admin-Login-Vcode-time='+new Date());
}
</script>
</head>
<body>
<script language="JavaScript1.2">if(self!=top){top.location=self.location;}</script>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center"><table width="502" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="134" align="center" background="__PUBLIC__/images/top2.gif" bgcolor="#F2FFD1">
    <form method='post' action='index.php?s=Admin-Login-Check' name="form1">
        <table width="400" border="0" align="right" cellpadding="0" cellspacing="4">
          <tr>
            <td width="74" height="25" align="center">用户名称：</td>
            <td width="314"><input class='in_p' type='text' name='user_name' id="user_name"></td>
          </tr>
          <tr>
            <td height="25" align="center">用户密码：</td>
            <td><input class='in_p' type='password' name='user_pwd' id="user_pwd"></td>
          </tr>
          <tr>
            <td height="25" align="center">验证密码：</td>
            <?php if(!function_exists('gd_info')): ?><td>不支持GD库 不需要输入验证码</td>
            <?php else: ?>
            <td><input class='in_p' type='text' name='verify' id="user_vcode" style="width:126px;"> <a href="javascript:reloadcode()" ><img src="index.php?s=Admin-Login-Vcode" alt='更换' name="safecode" border="0" align="absbottom" id="safecode"></a>
            </td><?php endif; ?>
          </tr>
          <tr>
            <td height="25" align="center">&nbsp;</td>
            <td><input name="submit" type='image' src="__PUBLIC__/images/top4.gif" x=10 y=10 id="submit" class="noborder"></td>
          </tr>
        </table>
      </form></td>
  </tr>
</table></td>
  </tr>
</table>
</body>
</html>