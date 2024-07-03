<?php
session_start();
header ("Cache-Control: no-cache， must-revalidate");
require ("../include/global.php");
require ("../include/function.php");
require ("../class/captcha.class.php"); //先把类包含进来，实际路径根据实际情况进行修改。  
$vcode = new Secoder();   //实例化一个对象  
if ($opwww==1){
   echo "<script>window.open('close.php','_top')</script>";
   exit;
}
$action = $_POST["action"];
if ($action == "login") {
	$user = $_POST["user"];
	$pass = $_POST["pass"];
	if (empty($user) || empty($pass)) {
		echo "<script>alert('用户名或密码不能为空!');window.open('index.php','_top')</script>";
		exit;
	} 
	$result = $db1->query("select count(*) from web_agent  where kauser='".$user."'  order by id desc");   
    $num1 = $result->fetch_array();
    $num=$num1[0];
    if($num!=0){
        $vip=0;
    }else{
        $vip=1;
    }
	$pass = md5($pass);
	$str = time('s').$user;
	$uid = substr(md5($str), 0, rand(14, 17)) . 'z' . rand(0, 1);
	if ($vip==0) {
		//代理
		$sql = "select id,kauser,stat,lx,look,dagu,guan,zong from web_agent where kauser='$user' and kapassword='$pass' LIMIT 1";
		$result = $db1->query( $sql) or die("error!!");
		$row = $result->fetch_array();
		$count = $result->num_rows;
		if ($count == 0) {
			echo "<script>alert('您输入的帐号或密码错误，请重新输入!');window.open('index.php','_top')</script>";
			exit;
		} 
	//	if (!$vcode->check($_POST['VerifyCode']))
	//{
	//	echo "<script>alert('您输入的验证码错误，请重新输入!');window.open('index.php','_top')</script>";
	//	exit;
//	}
	    $kauser   =  $user;
		$kauserid =  $row['id'];
		$stat =  $row['stat'];
		$lx   =  $row['lx'];
		$look =  $row['look'];
	    $zong =  $row['zong'];
	    $guan =  $row['guan'];
	    $dagu =  $row['dagu'];
		$vvv  =  " 1=2 ";
		if ( $zong != ""){
			$vvv .= " or kauser='".$zong."'";
		}
		if ( $guan != ""){
			$vvv .= " or kauser='".$guan."'";
		}
		if ( $dagu != ""){
			$vvv .= " or kauser='".$dagu."'";
		}
		if ($stat == 1){
			echo "<script>alert('对不起,您的账号已停用!');window.open('index.php','_top')</script>";
			exit;
		}
		$result = $db1->query("select count(*) from web_agent  where (".$vvv.") and stat=1  order by id desc");   
		$num1   = $result->fetch_array();
		$num=$num1[0];
		if($num!=0){
			echo "<script>alert('对不起,您的账号已停用!');window.open('index.php','_top')</script>";
			exit;
		}
		if ($look == 0){
			$sql = "update web_agent set uid='$uid' where id=$kauserid";
			$db1->query( $sql);
			echo "<script>window.open('pass.php?uid=".$uid."','_top')</script>";
			exit;
		}else{
			$sql = "update web_agent set uid='$uid',zlogin='$utime',zip='$userip',look=look+1  where id=$kauserid";
			$db1->query( $sql);
		}
		$sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='".$user."',kauser='".$user."',lx=0,text1='登陆',text2='".get_agent_lx_name($lx)."',ip='".$userip."'";
		$db1->query( $sql);
	}else{
	    //子账号
		$sql = "select id,kauser,guan,flag from web_agent_zi where kauser='$user' and kapassword='$pass' LIMIT 1";
		$result = $db1->query( $sql) or die(mysqli_error());
		$row = $result->fetch_array();
		$count = $result->num_rows;
		if ($count == 0) {
			echo "<script>alert('您输入的帐号或密码错误，请重新输入!');window.open('index.php','_top')</script>";
			exit;
		} 
        $kazi     = $user;
        $kaziid   = $row['id'];
	    $kauser   = $row['guan'];
		//验证主账号
		$result = $db1->query("select id,kauser,stat,lx,dagu,guan,zong from web_agent  where kauser='".$kauser."' order by id desc LIMIT 1");   
		$row = $result->fetch_array();
		$cou = $result->num_rows;
		if ($cou == 0) {
			echo "<script>window.open('index.php','_top')</script>";
			echo "</HTML>";
			exit;
		} 
		$kauserid =  $row['id'];
		$stat =  $row['stat'];
		$lx   =  $row['lx'];
	    $zong =  $row['zong'];
	    $guan =  $row['guan'];
	    $dagu =  $row['dagu'];
		$vvv  =  " 1=2 ";
		if ( $zong != ""){
			$vvv .= " or kauser='".$zong."'";
		}
		if ( $guan != ""){
			$vvv .= " or kauser='".$guan."'";
		}
		if ( $dagu != ""){
			$vvv .= " or kauser='".$dagu."'";
		}
		if ($stat == 1){
			echo "<script>alert('对不起,您的主账号已停用!');window.open('index.php','_top')</script>";
			exit;
		}
		$result = $db1->query("select count(*) from web_agent  where (".$vvv.") and stat=1  order by id desc");   
		$num1    = $result->fetch_array();
		$num=$num1[0];
		if($num!=0){
			echo "<script>alert('对不起,您的主账号已停用!');window.open('index.php','_top')</script>";
			exit;
		}
		$sql = "update web_agent_zi set uid='$uid'  where id=$kaziid";
		$db1->query( $sql);
		$sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='".$user."',kauser='".$user."',lx=0,text1='登陆',text2='".get_agent_lx_name($lx)."子账号',ip='".$userip."'";
		$db1->query( $sql);
	}

?>
<html>
<head>
<title>代理登录</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>
<frameset rows="120,*" frameborder="NO" border="0" framespacing="0">
<frame name="topFrame" scrolling="NO" noresize src="main.php?action=header&uid=<?=$uid?>&vip=<?=$vip?>">
<frame name="main" src="main.php?action=history&uid=<?=$uid?>&vip=<?=$vip?>">
</frameset>
<noframes>
<body bgcolor="#FFFFFF" text="#000000">
</body>
</noframes>
</html>
<?

} else {

?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7"/>
    <title><?=$webname?>&nbsp;&nbsp;Admin</title>
</head>
    <style type="text/css">
        a,body,div,form,h1,h2,h3,h4,input,li,p,span,table,td,textarea,tr,ul{margin:0;padding:0;list-style:none}
        img{border:0}
        body{font-family:Tahoma,Arial,Geneva,sans-serif;font-size:12px;color:#BDE5FE;background-color:#102004;}
        .main{width:892px;margin:0 auto}
        .btn{background:url(/images/btn.jpg) no-repeat 0 0;display:block;width:71px;height:59px;cursor:pointer}
        .btn:hover{background-position:0 -59px}
    </style>
    <script>
    var date = new Date().getTime();
    function onFocus(){
        var now = new Date().getTime();
        if((now - date)/(1000*60) > 5 ){
            date = now;
            document.getElementById("captcha").src= './captcha.php?'+Math.random();
        }
    }
</script>
    </head>	
    <body>
<div class="main">
    <table border="0" align="center" cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td height="270" colspan="3" background="images/login_01.jpg"></td>
            </tr>
            <tr>    	
            	<td width="130" height="267" background="images/login_03.jpg"></td>
                <td width="632" height="267" align="center" background="images/login_02.jpg">
        		<form name="form1" id="login_form" onsubmit="return CheckForm();" action="login.php" method="post" target="_top">
                        <table width="495" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
        						    <td width="154" rowspan="5">
        						    	 <input type="hidden" name="status" value="<?=isset($status) ? $status : 'init'?>"/>
                                    </td>
                                    <td height="15" colspan="4"></td>
                                </tr>
                                <tr>
                                    <td width="90" height="27" align="right">账号：</td>
                                    <td height="27" colspan="2" align="left"><input type="text" name="user" ivalid="account"  value=""  style="width:170px; height:24px; line-height:24px; font-size:20px; font-family:sans-serif; font-weight:bold; color:#010a15"></td>
        							
                                    <td width="89" rowspan="3" align="center" valign="top"><input class="btn" type="submit"value="" name="submit"</td>
                                </tr>
                                <tr>
                                    <td height="50" align="right">密码：</td>
                                    <td height="50" colspan="2" align="left"><input type="password" name="pass" valid="password" value=""  style="width:170px; height:24px; line-height:24px; font-size:20px; font-family:sans-serif;font-weight:bold; color:#010a15"><input type="hidden" name="action" value="login"></td>
                                </tr>
                                <tr>
                                    <td height="27" align="right" width="90">验证码：</td>
                                    <td width="90" height="27" align="left">
                                        <input type="text" name="VerifyCode"   value="" style="width:80px; height:24px; line-height:24px; font-size:20px; font-family:sans-serif;font-weight:bold; color:#010a15">
                                    </td>
                                    <td width="90" height="27" align="left">
                                        <script type="text/javascript">
                                            document.write('<img id="captcha" src="/captcha.php?' + Math.random() + '" width="85" height="27" align="middle" style="cursor:pointer;" title="点击更换验证码" onclick="this.src=\'/captcha.php?\'+Math.random()">');
                                        </script>
                                        </script>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="15" colspan="4"></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </td>
                <td width="130" height="267" background="images/login_04.jpg"></td>
             </tr>
            <tr>
                <td height="40" colspan="3" align="center">版权所有：移动办公系统 2023 All rights reserved.</td>
            </tr>
        </tbody>
    </table>
</div>        

<script type="text/javascript">
    var form = document.getElementsByTagName('form')[0];
    //清空输入框所有的值
    form.user.value = '';
    form.pass.value = '';

  
    setTimeout(function() {
        form.user.focus();
    },
    0);
    //删除左右两端的空格 
    String.prototype.trim = function() {
        return this.replace(/(^\s*)|(\s*$)/g, '');
    }
    function validateForm(form) {
        var name = form.user.value.trim();
        form.name.value = name;
        var pass = form.pass.value.trim();
        form.pass.value = pass;
        if (! ((/^[a-zA-Z0-9]+[a-zA-Z0-9_]*$/).test(name)) || name.length > 12) {
            alert('账号由1-12位英文字母、数字、下划线组成，且第一位不能是下划线');
            form.user.focus();
            return false;
        }
        if (! ((/^[^\u4e00-\u9fa5]{4,16}$/).test(password))) {
            alert('密码由4-16位字符组成');
            form.pass.focus();
            return false;
        }
        return true;
    }
    form.onsubmit = function() {
        if (!validateForm(this)) {
            return false;
        }
    };
</script>
</body>
</html><?  } ?>
