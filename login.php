<?
session_start();
header ("Cache-Control: no-cache， must-revalidate");
require ("include/global.php");
require ("include/function.php");
require ("class/captcha.class.php"); //先把类包含进来，实际路径根据实际情况进行修改。  
$vcode = new Secoder();   //实例化一个对象  
if ($opwww==1){
   echo "<script>window.open('close.php','_top')</script>";
   exit;
}
if ($fmzt==1){
    echo "<script>window.open('fm.php','_top')</script>";
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
    if (!$vcode->check($_POST['VerifyCode']))
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
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7"/>
    <title><?=$webname?>&nbsp;&nbsp;</title>
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
}else {
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7"/>
    <title><?=$webname?>&nbsp;&nbsp;</title>
</head>
    <link rel="stylesheet" href="gray/css/style.css" type="text/css">
    <style type="text/css">
        a,body,div,form,h1,h2,h3,h4,input,li,p,span,table,td,textarea,tr,ul{margin:0;padding:0;list-style:none}
        img{border:0}
        body{font-family:Tahoma,Arial,Geneva,sans-serif;font-size:12px;color:#BDE5FE;background-color:#051725;}
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
            	<td width="130" height="267" background="/images/login_03.jpg"></td>
                <td width="632" height="267" align="center" background="/images/login_02.jpg">
        			<form name="form1" id="login_form" onsubmit="return CheckForm();" action="login.php" method="post" target="_top">
                            <table width="495" border="0" cellspacing="0" cellpadding="0">
                                <tbody>
                                <tr>
        						  <td width="154" rowspan="5">
        							<input type="hidden" name="status" value="<?=isset($status) ? $status : 'init'?>"
                                    />
                                    </td>
                                    <td height="15" colspan="4"></td>
                                 </tr>
                                <tr>
                                    <td width="90" height="27" align="right">账号：</td>
                                    <td height="27" colspan="2" align="left"><input type="text" name="user" ivalid="account"  value=""  style="width:170px; height:24px; line-height:24px; font-size:20px; font-family:sans-serif; font-weight:bold; color:#010a15"></td>
        							
                                    <td width="89" rowspan="3" align="center" valign="top">
                                        <!--<a onclick="javascript:fsubmit(document.form1);" class="btn" title="登陆"></a>-->
                                         <input class="btn" type="submit" value=""  name="submit">
                                        </td>
                                </tr>
                                <tr>
                                    <td height="50" align="right">密码：</td>
                                    <td height="50" colspan="2" align="left"><input type="password" name="pass" valid="password" value=""  style="width:170px; height:24px; line-height:24px; font-size:20px; font-family:sans-serif;font-weight:bold; color:#010a15"><input type="hidden" name="action" value="login"></td>
                                </tr>
                                <tr>
                                    <td height="27" align="right" width="90">验证码：</td>
                                    <td width="90" height="27" align="left">
                                        <input type="text" name="VerifyCode"  onfocus="onFocus()"  value="" style="width:85px; height:24px; line-height:24px; font-size:20px; font-family:sans-serif;font-weight:bold; color:#010a15">
                                    </td>
                                    <td width="90" height="27" align="left">
                                        <script type="text/javascript">
                                            document.write('<img id="captcha" src="./captcha.php?' + Math.random() + '" width="85" height="27" align="middle" style="cursor:pointer;" title="点击更换验证码" onclick="this.src=\'./captcha.php?\'+Math.random()">');
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
                <td width="130" height="267" background="/images/login_04.jpg"></td>
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
function fsubmit(obj){
    if ( CheckForm() == true){
        $('username').value = $('username').value.replace(/\s/g, "");
        obj.submit();
    }
}
//判断是否按了回车
function CheckKey(e){
    if(window.event) {
        //IE
        keynum = e.keyCode
    }else{
        if(e.which) {
            // Netscape/Firefox/Opera
            keynum = e.which
        }else{
            return false;
        }
    }
    if(keynum == 13){
        fsubmit(document.form_login);
    }else{
        return false;
    }
}    
</script>
</body>
</html>
<?  } ?>