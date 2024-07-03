<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
if ($_GET['act'] == "edit") {
    $pass = md5($_POST['pass']);
    if ($_POST['pass'] != "") {
        if ($vip == 1) {
            $sql = "update  web_agent_zi set kapassword='" . $pass . "' where uid='" . $uid . "'";
        } else {
            $sql = "update  web_agent set kapassword='" . $pass . "' where uid='" . $uid . "'";
        }
        mysql_query($sql);
    }
    echo "<script>alert('用户修改成功!');window.location.href='main.php?action=passwd&uid={$uid}&vip={$vip}';</script>";
    exit;
}?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<style type="text/css">
    <!--
    .STYLE1 {color: #FFFFFF}
    -->
</style>
<body style="min-width: 1200px;width: 100%">
<div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;<?=get_agent_lx_name($lx)?><?if ($vip == 1) { echo "子账号";}?> －</span><span class="font_b">修改密码</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright"></div>
</div> 
<form name="form1" method="post" action="main.php?action=passwd&uid=<?=$uid?>&vip=<?=$vip?>&act=edit" >
<table width="500" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
        <tbody><tr>
            <td height="26" colspan="2" align="center" class="t_list_caption">修改<?=get_agent_lx_name($lx)?><?if ($vip == 1) {echo "子账号";}?>密码</td>
        </tr>
           
         <tr>
                <td width="184" align="center" bgcolor="#FFFFFF" class="t_edit_caption">用户名：</td>
                <td width="313" align="center" bgcolor="#FFFFFF" class="t_edit_td">
                    <?if ($vip == 1) {echo $kazi;} else {echo $kauser;}?>
                </td>
            </tr>
            <tr>
               <td width="184" align="center" bgcolor="#FFFFFF" class="t_edit_caption">密码：</td>
               <td width="313" align="center" bgcolor="#FFFFFF" class="t_edit_td">
                   <input name="pass" class="za_text" type="password" id="pass" /></td>
            </tr>
            <tr>
                <td height="30" colspan="2" align="center" bgcolor="#FFFFFF" class="ok">
                    <button class="btn1" onClick="submit();">修改</button>
                </td>
            </tr>
            </tbody>
        </table>
    </form>
          