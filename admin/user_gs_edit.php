<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
if (strpos($flag, "13")) {
} else {
    echo "<center>你没有该权限功能!</center>";
    exit;
}
if ($_GET['id'] == "") {
    echo "<script>alert('非法进入!'); window.history.go(-1);</script>";
    exit;
}
if ($_GET['act'] == "edit") {
    $flag22 = $_POST['flag22'];
    $flag221 = "";
    $I = 0;
    for (; $I < count($flag22); $I += 1) {
        $flag221 = $flag221 . "," . $flag22[$I];
    }
    $user = $_POST['username'];
    $pass = $_POST['pass'];
    if ($pass != "") {
        chk_pwd($pass);
        $pass = md5($pass);
        $sql = "update  web_admin set password='" . $pass . "' where id=" . $_GET['id'];
        if (!$db1->query($sql)) {
            exit("数据库修改出错");
        }
    }
    $sql = "update  web_admin set flag='" . $flag221 . "',uid='' where id=" . $_GET['id'];
    if (!$db1->query($sql)) {
        exit("数据库修改出错");
    }
    $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $jxadmin . "',kauser='" . $jxadmin . "',lx=3,text1='管理员管理',text2='修改管理员:" . $user . "资料',ip='" . $userip . "'";
    $db1->query($sql);
    echo "<script>alert('修改成功!');window.location.href='main.php?action=user_gs_list&uid=" . $uid . "';</script>";
    exit;
}
$result = $db1->query("select * from web_admin where id=" . $_GET['id'] . " order by id desc LIMIT 1");
$row = $result->fetch_array();
?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<script src="js/function.js" type="text/javascript"></script>
<body style="min-width: 1200px;width: 100%">
  <div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;管理员－</span><span class="font_b">修改资料&nbsp;</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright">   
      <input name="button" type="button" class="btn5" onMouseOver="this.className='btn5m'" onMouseOut="this.className='btn5'" onClick="history.go(-1)" value="回上一页" />&nbsp;&nbsp;
</div></div>    
    <form name="form1" method="post" action="main.php?action=user_gs_edit&act=edit&uid=<?=$uid?>&id=<?=$_GET['id']?>">
    <table width="600" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list bet">
        <tbody>
             <tr>
                <td height="20" colspan="2" align="center" class="t_list_caption">基本资料设定</td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">帐号：</td>
                <td height="30" bgcolor="#FFFFFF" class="t_edit_td"><input name="username" class="inp1" readOnly type="text"
                        id="username" value="<?=$row['username']?>" /></td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">密码：</td>
                <td height="30" bgcolor="#FFFFFF" class="t_edit_td"><input name="pass" class="inp1" type="password" id="pass" />
                    (密码不修改请留空)&nbsp;&nbsp;</td>
            </tr>
            <tr>
                <td height="18" colspan="2" align="center" class="t_list_caption">权限</td>
            </tr>
            <tr>
                <td height="30" colspan="2" align="center" class="t_list_tr_3">
                    <table width="808" height="54" border="0" cellpadding="0" cellspacing="1">
                        <tr>
                            <td width="99"><input name='flag22[]' type='checkbox' value='01' <? if
                                    (strpos($row['flag'], "01" )) {?>
                                checked=checked
                                <?}?>
                                />盘口管理
                            </td>
                            <td width="137"><input name='flag22[]' type='checkbox' value='02' <? if
                                    (strpos($row['flag'], "02" )) {?>
                                checked=checked
                                <?}?>
                                />赔率设置
                            </td>
                            <td width="137"><input name='flag22[]' type='checkbox' value='03' <?if
                                    (strpos($row['flag'], "03" )) {?>
                                checked=checked
                                <?}?>
                                />即时注单/走飞
                            </td>
                            <td width="99"><input name='flag22[]' type='checkbox' value='04' <?if
                                    (strpos($row['flag'], "04" )) {?>
                                checked=checked
                                <?}?>
                                />大股东
                            </td>
                            <td width="98"><input name='flag22[]' type='checkbox' value='05' <?if
                                    (strpos($row['flag'], "05" )) {?>
                                checked=checked
                                <?}?>
                                />股东
                            </td>
                            <td width="85"><input name='flag22[]' type='checkbox' value='06' <?if
                                    (strpos($row['flag'], "06" )) { ?> checked=checked <?}?>
                                />总代理</td>
                            <td width="73"><input name='flag22[]' type='checkbox' value='07' <?if
                                    (strpos($row['flag'], "07" )) {?>
                                checked=checked
                                <?}?>
                                />代理
                            </td>
                            <td width="80"><input name='flag22[]' type='checkbox' value='08' <?if
                                    (strpos($row['flag'], "08" )) {?>
                                checked=checked
                                <?}?>
                                />会员
                            </td>
                        </tr>
                        <tr>
                            <td><input name='flag22[]' type='checkbox' value='09' <?if (strpos($row['flag'], "09" )) {?>
                                checked=checked
                                <?}?>
                                />报表
                            </td>
                            <td><input name='flag22[]' type='checkbox' value='10' <?if (strpos($row['flag'], "10" )) {?>
                                checked=checked
                                <?}?>
                                />系统管理
                            </td>
                            <td><input name='flag22[]' type='checkbox' value='11' <?if (strpos($row['flag'], "11" )) {?>
                                checked=checked
                                <?}?>
                                />注单管理
                            </td>
                            <td><input name='flag22[]' type='checkbox' value='12' <?if (strpos($row['flag'], "12" )) {?>
                                checked=checked
                                <?}?>
                                />在线查看
                            </td>
                            <td><input name='flag22[]' type='checkbox' value='14' <?if (strpos($row['flag'], "14" )) {?>
                                checked=checked
                                <?}?>
                                />日志
                            </td>
                            <td><input name='flag22[]' type='checkbox' value='15' <?if (strpos($row['flag'], "15" )) {?>
                                checked=checked
                                <?}?>
                                />备份
                            </td>
                            <td colspan="2"><input name='flag22[]' type='checkbox' value='13' <?if
                                    (strpos($row['flag'], "13" )) {?>
                                checked=checked
                                <?}?>
                                />
                                管理员管理/账号删除
                            </td>
                        </tr>
                    </table> 注意：如果开启管理员管理权限，该用户即等于获得全部权限！
                </td>
            </tr>
            <tr>
                <td height="46" colspan="2" align="center" bgcolor="#ffffff">
                    <label>
                        <input type="submit" class="btn2" name="button" id="button" value="确定">
                    </label>
                </td>
            </tr>
        </table>
    </form>
</body>