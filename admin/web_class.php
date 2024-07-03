<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
if (strpos($flag, "10")) {
} else {
    echo "<center>你没有该权限功能!</center>";
    exit;
}
if ($_GET['sdel'] != "") {
    $db1->query("Delete from web_config_class  where id='" . $_GET['sdel'] . "'");
    echo "<script type='text/javascript'>alert('删除成功！'); window.location.href = 'main.php?action=web_class&uid=" . $uid . "';</script>";
}
if ($_GET['act'] == "edit") {
    if (empty($_POST['classname'])) {
        echo "<script>alert('用户不能为空!'); window.history.go(-1);</script>";
        exit;
    }
    $classname = $_POST['classname'];
    $sql = "update web_config_class set classname='" . $classname . "',classtext='" . $_POST['classtext'] . "' where id=" . $_POST['id'];
    if (!$db1->query($sql)) {
        exit("数据库修改出错");
    }
    echo "<script>alert('修改成功!'); window.location.href = 'main.php?action=web_class&uid=" . $uid . "';</script>";
    exit;
}
if ($_GET['act'] == "add") {
    if (empty($_POST['classname'])) {
        echo "<script>alert('用户不能为空!'); window.history.go(-1);</script>";
        exit;
    }
    if (empty($_POST['classtext'])) {
        echo "<script>alert('网址不能为空!'); window.history.go(-1);</script>";
        exit;
    }
    $result1 = $db1->query("Select Count(ID) As memnum2 From web_config_class  Where classname='" . $_POST['classname'] . "' order by id desc");
    $rsw = $result1->fetch_array();
    if ($rsw[0] != 0) {
        echo "<script>alert('这一用户名称已被占用，请得新输入！!'); window.history.go(-1);</script>";
        exit;
    }
    $result1 = $db1->query("Select Count(ID) As memnum2 From web_agent Where kauser='" . $_POST['classname'] . "' order by id desc");
    $rsw = $result1->fetch_array();
    if ($rsw[0] != 0) {
        echo "<script>alert('这一用户名称已被占用，请得新输入！!'); window.history.go(-1);</script>";
        exit;
    }
    $result1 = $db1->query("Select Count(ID) As memnum2 From web_member Where kauser='" . $_POST['classname'] . "' order by id desc");
    $rsw = $result1->fetch_array();
    if ($rsw[0] != 0) {
        echo "<script>alert('这一用户名称已被占用，请得新输入！!'); window.history.go(-1);</script>";
        exit;
    }
    $text = date("Y-m-d H:i:s");
    $classname = $_POST['classname'];
    $sql = "INSERT INTO  web_config_class set class='gszf',classname='" . $classname . "',classtext='" . $_POST['classtext'] . "'";
    if (!$db1->query($sql)) {
        exit("添加错误");
    }
    echo "<script>alert('添加成功!'); window.location.href = 'main.php?action=web_class&uid=" . $uid . "';</script>";
    exit;
}?>


<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<body style="min-width: 1200px;width: 100%">
 <div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">系统管理－&nbsp;&nbsp;</span><span class="font_b">公司走飞账号管理&nbsp;</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright">
          <input name="button" type="button" class="za_button" onClick="javascript:location.reload();"
                    value="更新" />
    </div></div>
    <table width="60%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list bet" bgcolor="#FFFFFF">
        <form name="form1" method="post" action="main.php?action=web_class&act=add&uid=<?=$uid?>">
            <tr>
                <td align="center" bgcolor="#FFFFFF">用户名：</td>
                <td align="left" bgcolor="#FFFFFF"><input name="classname" type="text" class="inp1" id="classname" value="" size="20">网址：
                <input name="classtext" type="text" class="inp1" id="classtext" size="35">&nbsp;</td>
                <td align="center" bgcolor="#FFFFFF"> <button onClick="submit()">添加</button></td>
            </tr>
        </form>
    </table>    
   <table width="60%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list bet">
     <tbody>
        <tr>
            <td width="97" height="28" class="t_list_caption">编号</td>
            <td width="270" class="t_list_caption">用户名</td>
            <td width="401" align="center"  class="t_list_caption">网址</td>
            <td align="center"  class="t_list_caption">操作</td>
        </tr>
        <?$i = 0;
$result = $db1->query("select * From web_config_class  order by id desc");
while ($image = $result->fetch_array()) {?>
        <? $i += 1;?>
        <form name="form1" method="post" action="main.php?action=web_class&act=edit&uid=<?=$uid?>">
            <tr>
                <td height="25" bgcolor="#FFFFFF" class="m_bc_ed">
                    <div align="center">
                        <?=$i?>
                        <input name="id" type="hidden" id="id" value="<?=$image['id']?>" />
                    </div>
                </td>
                <td height="25" bgcolor="#FFFFFF" class="m_bc_ed"><input name="classname" type="text" class="inp1"
                        id="classname" value="<?=$image['classname']?>" size="20" /></td>

                <td height="25" align="center" bgcolor="#FFFFFF" class="m_bc_ed"><input name="classtext" type="text"
                        class="inp1" id="classtext" value="<?=$image['classtext']?>" size="35"></td>

                <td width="341" bgcolor="#FFFFFF" class="m_bc_ed">
                    <div align="center"><button class="btn2" onClick="submit()">修改</button>&nbsp;<a  href='main.php?action=web_class&act=del&uid=<?=$uid?>&sdel=<?=$image['id']?>'>删除</a>
                    </div>
                </td>
            </tr>
        </form>
        <?} ?>
        </tbody>    
    </table>