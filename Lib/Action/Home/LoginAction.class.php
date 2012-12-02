<?php
class LoginAction extends HomeAction
{
     public function register()
	 {
		 if(@$_GET['rid'])
		 {
		      if(empty($_POST['u_name']) || empty($_POST['u_passwd']) || empty($_POST['u_email']))
			  {
			     $this->assign('alert_info',"<script>alert('用户名或密码为空！')</script>"); 
			  }
			  else
			  {

				 $ip  = $_SERVER["REMOTE_ADDR"];
				 $time= time(); 
                 $password = md5($_POST['u_passwd']);

			     $sql = " insert into pp_member set username='{$_POST['u_name']}', password='{$password}', email='{$_POST['u_email']}', regtime='{$time}', regip='{$ip}' ";
				 M()->query($sql);
				 Session::set('u_name', $_POST['u_name']);
			     $this->assign('alert_info',"<script>alert('恭喜，用户注册成功！')</script>"); 
				 //$this->success("恭喜，用户注册成功！");
				 echo "<script>alert('恭喜，用户注册成功！')</script>";
			     redirect("index.php?s=Index-index"); 
				 
			  }
		 }
	     $this->display('piao_zhuce'); 
	 
	 }

	 public function login()
	 {
		 $u_name = $_POST['u_name'];
		 $u_passwd = $_POST['u_passwd'];
		 if(empty($u_name) || empty($u_passwd))
		 {
		      echo "<script>alert('用户名或密码错误！')</script>";
			  redirect("index.php?s=Index-index");  
		 }
		 $u_passwd = md5($u_passwd);
		 $sql = " select * from pp_member where username='{$u_name}' and password='{$u_passwd}'";
		 $user_data = M()->query($sql);
		 Session::set('u_name', $user_data[0]['username']);
		  echo "<script>alert('登陆成功！')</script>";
		  redirect("index.php?s=Index-index");  
	 }



}




