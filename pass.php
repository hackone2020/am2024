<?php

header("Cache-Control: no-cache�� must-revalidate");
require_once "include/global.php";
require_once "include/function.php";
if ($opwww == 1) {
    echo "<script>window.open('close.php','_top')</script>";
    exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=$webname?></title>
</head>
<?
$uid = $_GET['uid'];
if ($uid) {
    $sql = "select id,kauser from web_member where uid='{$uid}' and stat=0 LIMIT 1";
    $result = $db1->query($sql);
    $row = $result->fetch_assoc();
    $cou = $result->num_rows;
    if ($cou == 0) {
       echo "<script>window.open('index.php', '_top')</script>
        </HTML>";
        exit;
    }
    if ($_GET['act'] == "edit") {
        $ypass = $_POST['ypass'];
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];
        if ($ypass == $pass1) {
          echo  "<script>alert('�����벻����ԭ����һ��!!!'); window.history.go(-1);</script>";
            exit;
        }
        if ($pass1 != $pass2) {
            echo "<script>alert('ȷ�������������벻һ��!!!'); window.history.go(-1);</script>";
            exit;
        }
        chk_pwd($pass1);
        $ypass = md5($ypass);
        $sql = "select count(*) from web_member where uid='{$uid}' and kapassword='{$ypass}' order by id desc";
        $result = $db1->query($sql);
        $num1 = $result->fetch_array();
        $num =$num1[0];
        if ($num == 0) {
           echo  "<script>alert('�Բ�������ԭ�������!!!'); window.history.go(-1);</script>";
           exit;
        }
        $pass1 = md5($pass1);
        $sql = "update web_member set kapassword='" . $pass1 . "',zlogin='{$utime}',zip='{$userip}',look=look+1  where uid='{$uid}' order by id desc";
        if (!$db1->query($sql)) {
            exit("�޸ĳ���!");
        }
       echo  "<script>alert('�޸ĳɹ�!��ʹ�����������µ�¼!'); window.open('index.php', '_top');</script>";
        exit;
    }
} else {
   echo "<script>window.open('index.php', '_top')</script>
    </HTML>";
    exit;
}?>

<script src="js/function.js" type="text/javascript"></script>
<script src="js/mem_info.js" type="text/javascript"></script>
<link href="css/main.css" type="text/css" rel="stylesheet" />

<body style="width: 98%;" class="bgcoloruserx">
    <div style="width:98%;" class="lefttopmargin">
        <table width="393" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td align="center" style="padding-left: 10px;">
                    <form name="form1" onSubmit="return SubChk()" method="post" action="pass.php?act=edit&uid=<?=$uid?>">
                        <table class="zhudantable1" style="width: 300px; margin-top:0px;">
                            <tr class="tr1">
                                <td class="tabletd1" colspan="2">����һ�ε�½�������޸�����</td>
                            </tr>
                            <tr>
                                <td class="tabletd1" style="line-height: 28px;">ԭ����
                                </td>

                                <td class="tabletd1" style="line-height: 28px;">
                                    <input name="ypass" type="password" id="ypass" class="upuserinput" />
                                </td>
                            </tr>

                            <tr>
                                <td class="tabletd1" style="line-height: 28px;">������</td>
                                <td class="tabletd1">
                                    <input name="pass1" type="password" id="pass1" class="upuserinput" />
                                </td>
                            </tr>

                            <tr>
                                <td class="tabletd1" style="line-height: 28px;">ȷ������</td>
                                <td class="tabletd1">
                                    <input name="pass2" type="password" id="pass2" class="upuserinput" />
                                </td>
                            </tr>


                            <tr>
                                <td colspan="2" class="tabletd1" style="line-height: 28px;">
                                    �����������6���ַ������12���ַ�<br>��ֻ��������(0-9)����Ӣ�Ĵ�Сд��ĸ</td>
                            </tr>
                            <tr>
                                <td class="tabletd1" style="line-height: 28px;">����</td>
                                <td class="tabletd1">
                                    <input type="submit" name="btn" value="�޸�����" id="btn" class="btn1" /> &nbsp;
                                </td>
                            </tr>
                        </table>
                    </form>
                </td>
            </tr>
        </table>
    </div>
</body>