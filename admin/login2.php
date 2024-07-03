<?php
session_start();
require ("../include/global.php");
require ("../include/function.php");
$action = $_POST["action"];
if ($action == "login") {
	$user = $_POST["user"];
	$pass = $_POST["pass"];
	if (empty($user) || empty($pass)) {
		echo "<script>alert('用户名或密码不能为空!');window.open('index.php','_top')</script>";
		exit;
	} 
	$pass = md5($pass);
	$str = time('s');
	$uid = substr(md5($str), 0, rand(14, 17)) . 'z' . rand(0, 1);
	$sql = "select id,uid from web_admin where username='$user' and password='$pass' LIMIT 1";
	$result = $db1->query($sql) or die(mysql_error());
	$row = $result->fetch_array();
	$id = $row['id'];
	$count =$result->num_rows;
	if ($count == 0) {
		echo "<script>alert('您输入的帐号或密码错误，请重新输入!');window.open('index.php','_top')</script>";
		exit;
	} 
	if ($_POST['VerifyCode'] <> $_SESSION['code'])
	{
		echo "<script>alert('您输入的验证码错误，请重新输入!');window.open('index.php','_top')</script>";
		exit;
	}
	if ($row['uid'] != ""){
	    $uid = $row['uid'];
	}
	$sql = "update web_admin set uid='$uid',LastLogin='$utime',LastLoginIP='$userip',look=look+1 where id=$id";
	$db1->query($sql);
	$sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='".$user."',kauser='".$user."',lx=0,text1='登陆',text2='管理员',ip='".$userip."'";
	$db1->query($sql);
?>
<html>
<head>
<title>管理系统</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>
<frameset rows="120,*" frameborder="NO" border="0" framespacing="0">
<frame name="topFrame" scrolling="NO" noresize src="main.php?action=header&uid=<?=$uid?>">
<frame name="main" src="main.php?action=web_kithe&uid=<?=$uid?>">
</frameset>
<noframes>
<body bgcolor="#FFFFFF" text="#000000">
</body>
</noframes>
</html>
<?

} else {

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta content='text/html; charset=UTF-8' http-equiv='Content-Type' />
        <title>
            <?=$webname?>
        </title>
        <link rel="stylesheet" href="../gray/css/style.css" type="text/css">
    </head>
    <body class="login">
        <div id="doc4" class="yui-t7">
            <div id="bd">
                <div class="yui-g">
                    <div id="adminlogin" class="module g-lo">
                        <div class="hd">
                            <h2>
                                系统登录
                            </h2>
                            <div style="background:url('../gray/pic/login_bg_back.jpg');">
                            </div>
                        </div>
                        <div class="bd">
                            
							<FORM name=form1 id="login_form" onSubmit="return CheckForm();" action=login.php 
  method=post target=_top>
                                <div class="pt">
                                    <input type="hidden" name="status" value="<?=isset($status) ? $status : 'init'?>"
                                    />
                                    <ul>
                                        <li>
                                            <label>
                                                账　号：
                                            </label>
                                            <input type="text" maxlength="12" name="user" valid="account" value=""
                                            />
                                        </li>
                                        <li class="ps">
                                            <label>
                                                密　码：
                                            </label>
                                            <input type="password" maxlength="16" name="pass" valid="password"
                                            value="" /><input type="hidden" name="action" value="login">
                                        </li>
										<li class="vimg">
              	  	<label>验证码：</label>
              	  	<input type="text" autocomplete="off" maxlength="12" name="VerifyCode" value=""/><SPAN id=img><IMG src="/yzm.php"></SPAN>
                                    </ul>
                                    <div class="btn">
                                        登 录
                                    </div>
                                    <input class="btn" type="submit" value="Login" value="登 录" name="submit"
                                    />
                                </div>
                            </form>
                        </div>
                        <div class="ft">
                            推荐使用
                            <em class="ico ie">
                            </em>
                            IE 7
                            <em class="ico ff">
                            </em>
                            Firefox 3 浏览　　提示：如果使用“世界之窗”浏览器，请关闭“页面元素黑名单过滤”功能，以避免影响页面数据更新速度。
                            <a href="#" target="_blank">
                                常见问题
                            </a>
                        </div>
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
                </div>
            </div>
        </div>
    </body>
</html>
<?  } ?>
