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
<div class="right">
  <div class="right_top">欢迎光临系统后台</div>
  <div class="right_main">
<?php if(strtolower(ACTION_NAME) == show ): ?><form action="index.php?s=Admin-List-Editall" method="post" name="myform">
    <table width="98%" border="0" cellpadding="5" cellspacing="1" class="tableoutline">
      <tr class="tb_head">
        <td colspan="7"><h2>分类列表：排序ID如果设为0 将在导航栏中隐藏该分类</h2></td>
      </tr>
      <tr align="center" class="tb_title">
        <td width="50">选中</td>
        <td width="180">分类名称</td>
        <td width="100">排序ID</td>
        <td width="150">英文名称</td>
        <td width="100">编辑</td>
      </tr>
      <?php if(is_array($listtree)): $i = 0; $__LIST__ = $listtree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pp): ++$i;$mod = ($i % 2 )?><tr class="firstalt">
        <td align="center"><input name='list_id[<?php echo ($pp["list_id"]); ?>]' type='checkbox' value='<?php echo ($pp["list_id"]); ?>' style='border:none' checked><font color="blue">(<?php echo ($pp["list_id"]); ?>)</font></td>
        <td align="center"><input type='text' name='list_name[<?php echo ($pp["list_id"]); ?>]' value='<?php echo ($pp["list_name"]); ?>' class="tbpinput" size=25></td>
        <td align="center"><input type='text' name='list_oid[<?php echo ($pp["list_id"]); ?>]' value='<?php echo ($pp["list_oid"]); ?>' class="tbpinput" size=10></td>
        <td align="center"><input type='text' name='list_skin[<?php echo ($pp["list_id"]); ?>]' value='<?php echo ($pp["list_skin"]); ?>' class="tbpinput" size=20></td>
        <td align="center"><a href="index.php?s=Admin-List-Add-list_id-<?php echo ($pp["list_id"]); ?>"><img src="__PUBLIC__/images/edit.gif" alt="编辑" width="14" height="14" border="0" title="编辑"></a> <a href="index.php?s=Admin-List-Del-list_id-<?php echo ($pp["list_id"]); ?>" onClick="return confirm('确定删除?')"><img src="__PUBLIC__/images/del.gif" alt="删除" width="14" height="14" border="0" title="删除"></a> <a href="index.php?s=Admin-List-Add-list_pid-<?php echo ($pp["list_id"]); ?>" ><img src="__PUBLIC__/images/add.gif" alt="添加二级分类" width="14" height="14" border="0" title="添加二级分类"></a></td>
      </tr>
      <?php if(is_array($pp['son'])): $i = 0; $__LIST__ = $pp['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pp): ++$i;$mod = ($i % 2 )?><tr class="firstalt">
        <td align="center"><input name='list_id[<?php echo ($pp["list_id"]); ?>]' type='checkbox' value='<?php echo ($pp["list_id"]); ?>' style='border:none' checked>(<?php echo ($pp["list_id"]); ?>)</td>
        <td align="center"><input type='text' name='list_name[<?php echo ($pp["list_id"]); ?>]' value='<?php echo ($pp["list_name"]); ?>' class="tbsinput" size=25></td>
        <td align="center"><input type='text' name='list_oid[<?php echo ($pp["list_id"]); ?>]' value='<?php echo ($pp["list_oid"]); ?>' class="tbsinput" size=10></td>
        <td align="center"><input type='text' name='list_skin[<?php echo ($pp["list_id"]); ?>]' value='<?php echo ($pp["list_skin"]); ?>' class="tbsinput" size=20></td>
        <td align="center"><a href="index.php?s=Admin-List-Add-list_id-<?php echo ($pp["list_id"]); ?>"><img src="__PUBLIC__/images/edit.gif" alt="编辑" width="14" height="14" border="0" title="编辑"></a> <a href="index.php?s=Admin-List-Del-list_id-<?php echo ($pp["list_id"]); ?>" onClick="return confirm('确定删除?')"><img src="__PUBLIC__/images/del.gif" alt="删除" width="14" height="14" border="0" title="删除"></a></td>
      </tr><?php endforeach; endif; else: echo "" ;endif; ?><?php endforeach; endif; else: echo "" ;endif; ?>
      <tr>
        <td colspan="7"><input type="button" value="全/反选" onClick="CheckAll(this.form)" /> <select name="list_type" id="list_type" onChange="ChangeAction(this.value)"><option value="index.php?s=Admin-List-Editall" >批量修改</option><option value="index.php?s=Admin-List-Delall">批量删除</option></select> <input class="mininput" type="submit" value="提交操作"> 注：删除分类将删除该分类下面的所有影片</td>
      </tr>
    </table>
    </form>     
<?php elseif(strtolower(ACTION_NAME) == add): ?>
	<script language="javascript">
		function ChangeModel(str){
			if(str==1){
				$('#list_skin').val('pp_vodlist');
				$('#listseo').css({display:"block"});
			}else if(str==2){
				$('#list_skin').val('pp_newslist');
				$('#listseo').css({display:"block"});	
			}else{
				$('#listseo').css({display:"none"});
			}	
		}		
    </script>
    <?php if(($list_id)  >  "0"): ?><form name="form1" action="index.php?s=Admin-List-Update" method="post"><?php else: ?><form name="form1" action="index.php?s=Admin-List-Insert" method="post"><?php endif; ?>
      <table width="98%" border="0" cellpadding="5" cellspacing="1" class="tableoutline">
        <tr class="tb_head"><td colspan="2"><h2>添加/修改分类：</h2></td></tr>
        <tr class="firstalt"><td width="12%" style="text-align:right">分类级别：</td><td ><select name="list_pid" onChange="ChangeModel(this.value)" style="width:132px">
          <option value="0">作为一级分类</option>
          <?php if(is_array($ppmenu)): $i = 0; $__LIST__ = $ppmenu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$admin): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($admin["list_id"]); ?>" <?php if(($admin["list_id"])  ==  $list_pid): ?>selected<?php endif; ?>><?php echo ($admin["list_name"]); ?></option>
		       <?php if(is_array($admin['son'])): $i = 0; $__LIST__ = $admin['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pp): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($pp["list_id"]); ?>" <?php if(($pp["list_id"])  ==  $list_pid): ?>selected<?php endif; ?>>|-<?php echo ($pp["list_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?><?php endforeach; endif; else: echo "" ;endif; ?>
          <?php if(is_array($listnews)): $i = 0; $__LIST__ = $listnews;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$admin): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($admin["list_id"]); ?>" <?php if(($admin["list_id"])  ==  $list_pid): ?>selected<?php endif; ?>><?php echo ($admin["list_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></select></td></tr>
        <tr class="firstalt"><td style="text-align:right">分类名称与排序：</td><td ><input type="text" name="list_name" id="list_name" value="<?php echo ($list_name); ?>" size="35" maxlength="35"> <input type="text" name="list_oid"  id="list_oid" value="<?php echo ($list_oid); ?>" size="5" maxlength="5" style="text-align:center"></td></tr>
            <tr class="firstalt"><td style="text-align:right">英文名称：</td>
            <td><input type="text" name="list_skin" id="list_skin" value="<?php echo ($list_skin); ?>" maxlength="100" style="width:400px"></td>
            </tr>       
        <tr class="firstalt">
          <td colspan="2" align="center"><input type="hidden" name="list_id" id="list_id" value="<?php echo ($list_id); ?>">
            <input class="bginput" type="submit" name="submit" value=" 提交 " >
            <input class="bginput" type="reset" name="Input" value=" 重置 " >
          </td>
        </tr>
      </table>
    </form><?php endif; ?>
  </div>
</div>
</body>
</html>