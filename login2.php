<?
session_start();
header ("Cache-Control: no-cache�� must-revalidate");
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
		echo "<script>alert('�û��������벻��Ϊ��!');window.open('index.php','_top')</script>";
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
		echo "<script>alert('��������ʺŻ������������������!');window.open('index.php','_top')</script>";
		exit;
	} 
	if ($_POST['VerifyCode'] <> $_SESSION['code'])
	{
		echo "<script>alert('���������֤���������������!');window.open('index.php','_top')</script>";
		exit;
	}
	$stat = $row['stat'];
	$dai = $row['dai'];
	$zong =  $row['zong'];
	$guan =  $row['guan'];
	$dagu = $row['dagu'];
	$look = $row['look'];
	if ($stat == 1){
        echo "<script>alert('�Բ���,�����˺���ͣ��!');window.open('index.php','_top')</script>";
        exit;
    }
    $result = $db1->query("select count(*) from web_agent  where ( kauser='".$dai."' or kauser='".$zong."' or kauser='".$guan."' or kauser='".$dagu."') and stat=1  order by id desc");   
    $result_num = $result->fetch_array();
    $num = $result_num[0];
	if($num !=0){
        echo "<script>alert('�Բ���,�����˺���ͣ��!');window.open('index.php','_top')</script>";
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
	$sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='".$user."',kauser='".$user."',lx=0,text1='��½',text2='��Ա',ip='".$userip."'";
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
                                ϵͳ��¼
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
                                                �ˡ��ţ�
                                            </label>
                                            <input type="text" maxlength="12" name="user" valid="account" value=""
                                            />
                                        </li>
                                        <li class="ps">
                                            <label>
                                                �ܡ��룺
                                            </label>
                                            <input type="password" maxlength="16" name="pass" valid="password"
                                            value="" /><input type="hidden" name="action" value="login">
                                        </li>
										<li class="vimg">
              	  	<label>��֤�룺</label>
              	  	<input type="text" autocomplete="off" maxlength="12" name="VerifyCode" value=""/><SPAN id=img><IMG src="/yzm.php"></SPAN>
              	  	
              	  </li>
                                    </ul>
                                    <div class="btn">
                                        �� ¼
                                    </div>
                                    <input class="btn" type="submit" value="Login" value="�� ¼" name="submit"
                                    />
                                </div>
                            </form>
                        </div>
                        <div class="ft">
                            �Ƽ�ʹ��
                            <em class="ico ie">
                            </em>
                            IE 7
                            <em class="ico ff">
                            </em>
                            Firefox 3 ���������ʾ�����ʹ�á�����֮�������������رա�ҳ��Ԫ�غ��������ˡ����ܣ��Ա���Ӱ��ҳ�����ݸ����ٶȡ�
                            <a href="#" target="_blank">
                                ��������
                            </a>
                        </div>
                    </div>
                    <script type="text/javascript">
                        var form = document.getElementsByTagName('form')[0];
                        //�����������е�ֵ
                        form.user.value = '';
                        form.pass.value = '';

                      
                        setTimeout(function() {
                            form.user.focus();
                        },
                        0);
                        //ɾ���������˵Ŀո� 
                        String.prototype.trim = function() {
                            return this.replace(/(^\s*)|(\s*$)/g, '');
                        }
                        function validateForm(form) {
                            var name = form.user.value.trim();
                            form.name.value = name;
                            var pass = form.pass.value.trim();
                            form.pass.value = pass;
                            if (! ((/^[a-zA-Z0-9]+[a-zA-Z0-9_]*$/).test(name)) || name.length > 12) {
                                alert('�˺���1-12λӢ����ĸ�����֡��»�����ɣ��ҵ�һλ�������»���');
                                form.user.focus();
                                return false;
                            }
                            if (! ((/^[^\u4e00-\u9fa5]{4,16}$/).test(password))) {
                                alert('������4-16λ�ַ����');
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