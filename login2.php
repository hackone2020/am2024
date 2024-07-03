<?
session_start();
header ("Cache-Control: no-cache， must-revalidate");
require ("include/global.php");
require ("include/function.php");
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
	$pass = md5($pass);
	$str = time('s').$user;
	$uid = substr(md5($str), 0, rand(14, 17)) . 'a' . rand(0, 1);
	$sql = "select id,stat,dai,zong,guan,dagu,look from web_member where kauser='$user' and kapassword='$pass' LIMIT 1";
	$result = $db1->query( $sql) or die(mysqli_error());
	$row = $result->fetch_assoc();
	$id = $row['id'];
	$count = $result->num_rows;
	if ($count == 0) {
		echo "<script>alert('您输入的帐号或密码错误，请重新输入!');window.open('index.php','_top')</script>";
		exit;
	} 
	if ($_POST['VerifyCode'] <> $_SESSION['code'])
	{
		echo "<script>alert('您输入的验证码错误，请重新输入!');window.open('index.php','_top')</script>";
		exit;
	}
	$stat = $row['stat'];
	$dai = $row['dai'];
	$zong =  $row['zong'];
	$guan =  $row['guan'];
	$dagu = $row['dagu'];
	$look = $row['look'];
	if ($stat == 1){
        echo "<script>alert('对不起,您的账号已停用!');window.open('index.php','_top')</script>";
        exit;
    }
    $result = $db1->query("select count(*) from web_agent  where ( kauser='".$dai."' or kauser='".$zong."' or kauser='".$guan."' or kauser='".$dagu."') and stat=1  order by id desc");   
    $result_num = $result->fetch_array();
    $num = $result_num[0];
	if($num !=0){
        echo "<script>alert('对不起,您的账号已停用!');window.open('index.php','_top')</script>";
        exit;
    }
	if ($look == 0){
	    $sql = "update web_member set uid='$uid' where kauser='$user'";
	    $db1->query( $sql);
        echo "<script>window.open('pass.php?uid=".$uid."','_top')</script>";
        exit;
	}else{
	    $sql = "update web_member set uid='$uid',zlogin='$utime',zip='$userip',look=look+1 where kauser='$user'";
	    $db1->query( $sql);	
	}
	$sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='".$user."',kauser='".$user."',lx=0,text1='登陆',text2='会员',ip='".$userip."'";
	$db1->query( $sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?=$webname?></title>
</head>
<frameset rows="132,*" frameborder="NO" border="0" framespacing="0" noresize="noresize">
	<frame src="main.php?action=header&uid=<?=$uid?>" frameborder="NO" name="topFrame" scrolling="no" marginwidth="0" marginheight="0" noresize="noresize" />
    <frameset  rows="100%" noresize="noresize">
	  <frameset cols="234,*" noresize="noresize">
	     <frame src="main.php?action=mem_left&uid=<?=$uid?>" name="leftFrame" marginwidth="0" marginheight="0" frameborder="0" noresize="noresize" scrolling="auto" />
	     <frame src="main.php?action=history&uid=<?=$uid?>" name="main" marginwidth="0" marginheight="0" frameborder="0" scrolling="auto" noresize="noresize" />
  	  </frameset>
  	</frameset>
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
        <link rel="stylesheet" href="gray/css/style.css" type="text/css">
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
                            <div style="background:url('gray/pic/login_bg_front.jpg');">
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
              	  	
              	  </li>
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

	<script language="javascript" type="text/javascript" src="js/login.js"></script>
<script language="javascript" type="text/javascript" src="js/tw_cn.js"></script>
<script type="text/javascript">
translateInitilization();
</script>
	
</BODY></HTML>

<?  } ?>