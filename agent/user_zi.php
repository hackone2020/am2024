<?php

if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
if ($vip == 1) {
    echo "<center>��û�и�Ȩ�޹���!</center>";
    exit;
}
if ($_GET['sdel'] != "") {
    $db1->query("Delete from web_agent_zi where id='" . $_GET['sdel'] . "' and guan='" . $kauser . "'");
    echo "<script type='text/javascript'>alert('ɾ���ɹ���');window.location.href='main.php?action=user_zi&uid=" . $uid . "&vip=" . $vip . "';</script>";
}
if ($_GET['act'] == "edit") {
    $username = $_POST['user'];
    $pass = $_POST['pass'];
    if ($pass != "") {
        chk_pwd($pass);
        $pass = md5($pass);
        $sql = "update web_agent_zi set uid='',kapassword='" . $pass . "' where id='" . $_POST['id'] . "' and kauser='" . $username . "' and guan='" . $kauser . "'";
        $db1->query($sql);
    }
    $flag22 = $_POST['flag22'];
    $flag221 = "";
    $I = 0;
    for (; $I < count($flag22); $I += 1) {
        $flag221 = $flag221 . "," . $flag22[$I];
    }
    $sql = "update web_agent_zi set uid='',flag='" . $flag221 . "' where id='" . $_POST['id'] . "' and kauser='" . $username . "' and guan='" . $kauser . "'";
    $db1->query($sql);
    echo "<script>alert('�޸ĳɹ�!');window.location.href='main.php?action=user_zi&uid=" . $uid . "&vip=" . $vip . "';</script>";
    exit;
}
if ($_GET['act'] == "add") {
    $username = $_POST['user'];
    $pass = $_POST['pass'];
    $flag22 = $_POST['flag22'];
    $flag221 = "";
    $I = 0;
    for (; $I < count($flag22); $I += 1) {
        $flag221 = $flag221 . "," . $flag22[$I];
    }
    chk_user($username);
    chk_pwd($pass);
    $pass = md5($pass);
    $sql = "INSERT INTO  web_agent_zi set guan='" . $kauser . "',kauser='" . $username . "',kapassword='" . $pass . "',adddate='" . $utime . "',flag='" . $flag221 . "',lx='" . $lx . "'";
    if (!$db1->query($sql)) {
        exit("��Ӵ���");
    }
    echo "<script>alert('��ӳɹ�!');window.location.href='main.php?action=user_zi&uid=" . $uid . "&vip=" . $vip . "';</script>";
    exit;
}?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<body style="min-width: 1200px;width: 100%">
 <div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;���˺Ź���</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright">
</div></div>
<form name="form1" method="post" action="main.php?action=user_zi&act=add&uid=<?=$uid?>&vip=<?=$vip?>">
<table width="874" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
    <tr>
         <td bgcolor="#FFFFFF" height="30" class="t_list_caption" colspan="3"></td>
    </tr>
    <tr>
        <td bgcolor="#FFFFFF" height="30" class="t_edit_caption">�û���:
         <input name="user" type="text" class="za_text" id="user" value="" size="20" >
        </td>    
        <td bgcolor="#FFFFFF" height="30" class="t_edit_caption">����:
        <input name="pass" type="text" class="za_text"  id="pass" size="20" >
        </td>
        <td bgcolor="#FFFFFF"  height="30" class="t_edit_caption" align="center" >
        <input name='flag22[]' type='checkbox' value='01' checked="checked" />��ʱע��
        <input name='flag22[]' type='checkbox' id="flag22[]" value='02' checked="checked" />����&nbsp;
        <input type="submit" name="button" id="button" value="���">
    </td>
    </tr>
</table>
</form>

<table width="874" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
    <tr>
        <td bgcolor="#FFFFFF" height="30" colspan="6" class="t_list_caption"></td>
    </tr>
<tr>
    <td width="50" align="center" bgcolor="6EC13E" class="t_list_tr_3">���</td>
    <td width="151" align="center" bgcolor="6EC13E" class="t_list_tr_3">��������</td>
    <td width="105" align="center" bgcolor="6EC13E" class="t_list_tr_3">�û���</td>
    <td width="186" align="center" bgcolor="6EC13E" class="t_list_tr_3">����</td>
    <td width="198" align="center" bgcolor="6EC13E" class="t_list_tr_3">Ȩ��</td>
<td bgcolor="6EC13E">
<div align="center">����</div></td></tr>
<?$i = 0;
$result = $db1->query("select * from web_agent_zi where guan='" . $kauser . "' order by id desc");
while ($image = $result->fetch_array()) {
    $i += 1;?>
    <form name="form" <?=$i?> method="post" action="main.php?action=user_zi&act=edit&uid=<?=$uid?>&vip=<?=$vip?>">
	<tr bgcolor="#edf2f7">
	<td height="25" bgcolor="#FFFFFF" ><div align="center"><?=$i?><input name="id" type="hidden" id="id" value="<?=$image['id']?>" /></div></td>
	<td align="center" bgcolor="#FFFFFF" ><?=date("Y-m-d / H:i", strtotime($image['adddate']))?></td>
	<td height="25" align="center" bgcolor="#FFFFFF" ><input name="user" type="hidden" id="user" value="<?=$image['kauser']?>" size="20" /><?=$image['kauser']?></td>
	<td height="25" align="center" bgcolor="#FFFFFF" ><input name="pass" type="text" class="za_text"  id="pass" value="" size="35"></td>
	<td align="center" bgcolor="#FFFFFF" >
	    <input name='flag22[]' type='checkbox' value='01' <?if(strpos($image['flag'], "01")) {?>checked=checked<?}?> />��ʱע��&nbsp;
        <input name='flag22[]' type='checkbox' value='02' <?if(strpos($image['flag'], "02")) {?>checked=checked<?}?>/>����</td>
	<td width="175" bgcolor="#FFFFFF" ><div align="center"><button type="button" onClick="submit()" >�޸�</button>&nbsp;<button type="button" onClick="if(confirm('ȷ��ɾ�������˺�?'))location.href='main.php?action=user_zi&act=del&uid=<?=$uid?>&vip=<?=$vip?>&id=<?=$image['id']?>&sdel=<?=$image['id']?>'">ɾ��</button></div> </td>
	</tr>
	</form>
<?}?>
</table></body>