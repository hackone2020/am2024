<?
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
	$result = mysql_query( $sql) or die(mysql_error());
	$row = mysql_fetch_assoc($result);
	$id = $row['id'];
	$count = mysql_num_rows($result);
	if ($count == 0) {
		echo "<script>alert('您输入的帐号或密码错误，请重新输入!');window.open('index.php','_top')</script>";
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
    $result = mysql_query("select count(*) from web_agent  where ( kauser='".$dai."' or kauser='".$zong."' or kauser='".$guan."' or kauser='".$dagu."') and stat=1  order by id desc");   
    $num    = mysql_result($result,"0");
	if($num!=0){
        echo "<script>alert('对不起,您的账号已停用!');window.open('index.php','_top')</script>";
        exit;
    }
	if ($look == 0){
	    $sql = "update web_member set uid='$uid' where kauser='$user'";
	    mysql_query( $sql);
        echo "<script>window.open('pass.php?uid=".$uid."','_top')</script>";
        exit;
	}else{
	    $sql = "update web_member set uid='$uid',zlogin='$utime',zip='$userip',look=look+1 where kauser='$user'";
	    mysql_query( $sql);	
	}
	$sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='".$user."',kauser='".$user."',lx=0,text1='登陆',text2='会员',ip='".$userip."'";
	mysql_query( $sql);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta content='text/html; charset=UTF-8' http-equiv='Content-Type' />
        <title>
            系统登录
        </title>
        <link rel="stylesheet" href="css/style.css" type="text/css">
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
                            <div style="background:url('pic/login_bg_back.jpg');">
                            </div>
                        </div>
                        <div class="bd">
                            <form method="post" id="login_form" action="">
                                <div class="pt">
                                    <input type="hidden" name="status" value="<?=isset($status) ? $status : 'init'?>"
                                    />
                                    <ul>
                                        <li>
                                            <label>
                                                账　号：
                                            </label>
                                            <input type="text" maxlength="12" name="account" valid="account" value=""
                                            />
                                        </li>
                                        <li class="ps">
                                            <label>
                                                密　码：
                                            </label>
                                            <input type="password" maxlength="16" name="password" valid="password"
                                            value="" />
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
                        form.account.value = '';
                        form.password.value = '';

                        if (form.status.value != "init") {
                            var st = parseInt(form.status.value, 10);
                            if (st == 1) {
                                alert("账号或密码有误");
                            } else if (st == 2) {
                                alert("账号已经被停用，请联系管理员.");
                            } else if (st == 3) {
                                alert("您输入的验证码不正确。");
                            }
                        }
                        setTimeout(function() {
                            form.account.focus();
                        },
                        0);
                        //删除左右两端的空格 
                        String.prototype.trim = function() {
                            return this.replace(/(^\s*)|(\s*$)/g, '');
                        }
                        function validateForm(form) {
                            var name = form.account.value.trim();
                            form.name.value = name;
                            var password = form.password.value.trim();
                            form.password.value = password;
                            if (! ((/^[a-zA-Z0-9]+[a-zA-Z0-9_]*$/).test(name)) || name.length > 12) {
                                alert('账号由1-12位英文字母、数字、下划线组成，且第一位不能是下划线');
                                form.account.focus();
                                return false;
                            }
                            if (! ((/^[^\u4e00-\u9fa5]{4,16}$/).test(password))) {
                                alert('密码由4-16位字符组成');
                                form.password.focus();
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