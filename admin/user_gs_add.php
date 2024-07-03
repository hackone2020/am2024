<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
if (strpos($flag, "13")) {
} else {
    echo "<center>你没有该权限功能!</center>";
    exit;
}
if ($_GET['act'] == "add") {
    if (empty($_POST['username'])) {
        echo "<script>alert('帐号不能为空!'); window.history.go(-1);</script>";
        exit;
    }
    if (empty($_POST['pass'])) {
        echo "<script>alert('密码不能为空!'); window.history.go(-1);</script>";
        exit;
    }
    $user = $_POST['username'];
    $pass = $_POST['pass'];
    chk_user($user);
    chk_pwd($pass);
    $flag22 = $_POST['flag22'];
    $flag221 = "";
    $I = 0;
    for (; $I < count($flag22); $I += 1) {
        $flag221 = $flag221 . "," . $flag22[$I];
    }
    $pass = md5($pass);
    $sql = "INSERT INTO  web_admin set username='" . $user . "',password='" . $pass . "',look=0,adduser='" . $jxadmin . "',flag='" . $flag221 . "',CreateTime='".$utime."',Status=1";
    if (!$db1->query($sql)) {
        exit($sql);
    }
    $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $jxadmin . "',kauser='" . $jxadmin . "',lx=3,text1='管理员管理',text2='添加管理员:" . $user . "',ip='" . $userip . "'";
    $db1->query($sql);
    echo "<script>alert('添加成功!');window.location.href='main.php?action=user_gs_list&uid=" . $uid . "';</script>";
    exit;
}?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<script src="js/function.js" type="text/javascript"></script>
<script>function check_user() {
        username_value = $("username").value;
        if (username_value == '') { $("username").focus(); alert("请输入账号!!!"); return false; }
        else {
            $("check_frame").src = 'main.php?action=check&uid=<?=$uid?>&username='+username_value;}}

</script>

<body style="min-width: 1200px;width: 100%">
<div id="tit" class="tit">
        <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
        <div class="tit_center floatleft font_bold"><span class="font_g">管理员－</span><span class="font_b">添加管理员</span></div>
        <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
        <div class="biaoti_right floatright">
            <input name="button" type="button" class="btn5" onmouseover="this.className='btn5m'" onmouseout="this.className='btn5'" onclick="history.go(-1)" value="回上一页">
        </div>
    </div>
    <form name="form1" method="post" action="main.php?action=user_gs_add&uid=<?=$uid?>&act=add">

        <table width="900" align="center" border="0" cellpadding="0" cellspacing="1" class="t_list">
            <tr>
                <td height="20" colspan="2" align="center" class="t_list_caption">基本资料设定</td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" class="t_edit_caption">帐号：</td>
                <td width="84%" bgcolor="#FFFFFF" class="m_bc_ed"><input name="username" type="text" class="za_text"
                        id="username" />&nbsp;
                    <input type="button" onClick="check_user();" value="检查账号" class="btn5">
                    &nbsp;帐号必须至少1个字元长，最多12个字元长，并只能有数字(0-9)，及英文小写字母
                </td>
            </tr>
            <tr>
                <td height="30" align="right" class="t_edit_caption">密码：</td>
                <td bgcolor="#FFFFFF" class="m_bc_ed"><input name="pass" type="password" class="za_text" id="pass" />
                    &nbsp;&nbsp;密码必须至少6个字元长，最多12个字元长,数字(0-9)，及英文大小写字母</td>
            </tr>
            <tr>
                <td height="17" colspan="2" align="center" class="t_list_caption">权限</td>
            </tr>
            <tr>
                <td height="65" colspan="2" align="center" class="m_bc_ed" bgcolor="#FFFFFF">
                    <table width="808" height="57" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="99"><input name='flag22[]' type='checkbox' value='01' checked="checked" />
                                盘口管理</td>
                            <td width="137"><input name='flag22[]' type='checkbox' value='02' checked="checked" /> 赔率设置
                            </td>
                            <td width="137"><input name='flag22[]' type='checkbox' value='03' checked="checked" />
                                即时注单/走飞</td>
                            <td width="99"><input name='flag22[]' type='checkbox' value='04' checked="checked" /> 大股东
                            </td>

                            <td width="100"><input name='flag22[]' type='checkbox' value='05' checked="checked" /> 股东
                            </td>
                            <td width="77"><input name='flag22[]' type='checkbox' value='06' checked="checked" /> 总代理
                            </td>
                            <td width="88"><input name='flag22[]' type='checkbox' value='07' checked="checked" /> 代理
                            </td>
                            <td width="71"><input name='flag22[]' type='checkbox' value='08' checked="checked" /> 会员
                            </td>
                        </tr>
                        <tr>
                            <td><input name='flag22[]' type='checkbox' value='09' checked="checked" />报表</td>
                            <td><input name='flag22[]' type='checkbox' value='10' checked="checked" />系统管理</td>
                            <td>
                                <input name='flag22[]' type='checkbox' value='11' checked="checked" />注单管理
                            </td>
                            <td>
                                <input name='flag22[]' type='checkbox' value='12' checked="checked" />在线查看
                            </td>
                            <td>
                                <input name='flag22[]' type='checkbox' value='14' checked="checked" />日志
                            </td>
                            <td>
                                <input name='flag22[]' type='checkbox' value='15' checked="checked" />备份
                            </td>
                            <td colspan="2"><input name='flag22[]' type='checkbox' value='13' checked="checked" />
                                管理员管理/账号删除</td>
                        </tr>
                    </table>
                    注意：如果开启管理员管理权限，该用户即等于获得全部权限！
                   <? if ($auto_edit == 1) {
                    echo " <br> 本系统已开通自动改单功能，若开通注单管理即可以使用该功能！ ";
                    }?>
                </td>
            </tr>
            <tr>
                <td height="30" colspan="2" align="center" class="m_bc_ed" bgcolor="#FFFFFF">
                    <input class="btn1" type="submit" name="button" id="button" value="确定">
                </td>
            </tr>
        </table>
    </form>
    <iframe name="check_frame" src="" width="0" height="0" style="display:none"></iframe>
</body>