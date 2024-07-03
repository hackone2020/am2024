<?php

header("Cache-Control: no-cache， must-revalidate");
require_once "../include/global.php";
require_once "../include/function.php";
if ($opwww == 1) {
    echo "<script>window.open('close.php','_top')</script>";
    exit;
}
?>
<HTML>
    <HEAD>
        <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>LOGIN</title>
<style type="text/css">
    <!--
    .STYLE1 {color: #FFFFFF}
    -->
</style>
</HEAD>
<?
$uid = $_GET['uid'];
if ($uid) {
    $sql = "select id from web_agent where uid='{$uid}' and stat=0 LIMIT 1";
    $result = $db1->query($sql);
    $row = $result->fetch_array();
    $cou = $result->num_rows;
    if ($cou == 0) {
        echo "<script>window.open('index.php', '_top')</script>";
        echo "</HTML>";
        exit;
    }
    if ($_GET['act'] == "edit") {
        $ypass = $_POST['ypass'];
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];
        if ($ypass == $pass1) {
            echo "<script>alert('新密码不能与原密码一致!!!'); window.history.go(-1);</script>";
            exit;
        }
        if ($pass1 != $pass2) {
            echo "<script>alert('确认密码与新密码不一致!!!'); window.history.go(-1);</script>";
            exit;
        }
        chk_pwd($pass1);
        $ypass = md5($ypass);
        $sql = "select count(*) from web_agent where uid='{$uid}' and kapassword='{$ypass}' order by id desc";
        $result = $db1->query($sql);
        $num1=$result->fetch_array();
        $num = $num1[0];
        if ($num == 0) {
            echo "<script>alert('对不起，您的原密码错误!!!'); window.history.go(-1);</script>";
            exit;
        }
        $pass1 = md5($pass1);
        $sql = "update web_agent set kapassword='" . $pass1 . "',zlogin='{$utime}',zip='{$userip}',look=look+1  where uid='{$uid}' order by id desc";
        if (!$db1->query($sql)) {
            exit("修改出错!");
        }
        echo "<script>alert('修改成功!请使用新密码重新登录!'); window.open('index.php', '_top');</script>";
        exit;
    }
} else {
    echo "<script>window.open('index.php', '_top')</script>";
    echo "</HTML>";
    exit;
}?>
<script src="js/function.js" type="text/javascript"></script>
<script src="js/pass.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/control_main.css" type="text/css">

<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0" vlink="#0000FF" alink="#0000FF">
    <form name="form1" onSubmit="return SubChk()" method="post" action="pass.php?act=edit&uid=<?=$uid?>">
        <table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#98B3C2">
            <tr>
                <td height="24" colspan="2" align="center" bgcolor="#004080" class="STYLE1"> 第一次登陆或长期没有更改密码,请先修改密码</td>
            </tr>
            <tr>
                <td align="center" bgcolor="#C2E1E7" style="line-height: 28px;">原密码</td>
                <td align="center" bgcolor="#C2E1E7" style="line-height: 28px;">
                    <input name="ypass" type="password" id="ypass" />
                </td>
            </tr>
            <tr>
                <td align="center" bgcolor="#C2E1E7" style="line-height: 28px;">新密码
                </td>
                <td align="center" bgcolor="#C2E1E7">
                    <input name="pass1" type="password" id="pass1" />
                </td>
            </tr>
            <tr>
                <td align="center" bgcolor="#C2E1E7" style="line-height: 28px;">确认密码</td>
                <td align="center" bgcolor="#C2E1E7">
                    <input name="pass2" type="password" id="pass2" />
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center" bgcolor="#C2E1E7" style="line-height: 28px;">
                    密码必须至少6个字符，最多12个字符<br>并只能有数字(0-9)，及英文大小写字母</td>
            </tr>
            <tr>
                <td align="center" bgcolor="#C2E1E7" style="line-height: 28px;">操作</td>
                <td align="center" bgcolor="#C2E1E7">
                    <input type="submit" name="btn" value="修改密码" id="btn" />&nbsp;
                </td>
            </tr>
        </table>
    </form>
</body>