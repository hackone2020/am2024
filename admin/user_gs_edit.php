<?php

if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
if (strpos($flag, "13")) {
} else {
    echo "<center>��û�и�Ȩ�޹���!</center>";
    exit;
}
if ($_GET['id'] == "") {
    echo "<script>alert('�Ƿ�����!'); window.history.go(-1);</script>";
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
            exit("���ݿ��޸ĳ���");
        }
    }
    $sql = "update  web_admin set flag='" . $flag221 . "',uid='' where id=" . $_GET['id'];
    if (!$db1->query($sql)) {
        exit("���ݿ��޸ĳ���");
    }
    $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $jxadmin . "',kauser='" . $jxadmin . "',lx=3,text1='����Ա����',text2='�޸Ĺ���Ա:" . $user . "����',ip='" . $userip . "'";
    $db1->query($sql);
    echo "<script>alert('�޸ĳɹ�!');window.location.href='main.php?action=user_gs_list&uid=" . $uid . "';</script>";
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
      <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;����Ա��</span><span class="font_b">�޸�����&nbsp;</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright">   
      <input name="button" type="button" class="btn5" onMouseOver="this.className='btn5m'" onMouseOut="this.className='btn5'" onClick="history.go(-1)" value="����һҳ" />&nbsp;&nbsp;
</div></div>    
    <form name="form1" method="post" action="main.php?action=user_gs_edit&act=edit&uid=<?=$uid?>&id=<?=$_GET['id']?>">
    <table width="600" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list bet">
        <tbody>
             <tr>
                <td height="20" colspan="2" align="center" class="t_list_caption">���������趨</td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�ʺţ�</td>
                <td height="30" bgcolor="#FFFFFF" class="t_edit_td"><input name="username" class="inp1" readOnly type="text"
                        id="username" value="<?=$row['username']?>" /></td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">���룺</td>
                <td height="30" bgcolor="#FFFFFF" class="t_edit_td"><input name="pass" class="inp1" type="password" id="pass" />
                    (���벻�޸�������)&nbsp;&nbsp;</td>
            </tr>
            <tr>
                <td height="18" colspan="2" align="center" class="t_list_caption">Ȩ��</td>
            </tr>
            <tr>
                <td height="30" colspan="2" align="center" class="t_list_tr_3">
                    <table width="808" height="54" border="0" cellpadding="0" cellspacing="1">
                        <tr>
                            <td width="99"><input name='flag22[]' type='checkbox' value='01' <? if
                                    (strpos($row['flag'], "01" )) {?>
                                checked=checked
                                <?}?>
                                />�̿ڹ���
                            </td>
                            <td width="137"><input name='flag22[]' type='checkbox' value='02' <? if
                                    (strpos($row['flag'], "02" )) {?>
                                checked=checked
                                <?}?>
                                />��������
                            </td>
                            <td width="137"><input name='flag22[]' type='checkbox' value='03' <?if
                                    (strpos($row['flag'], "03" )) {?>
                                checked=checked
                                <?}?>
                                />��ʱע��/�߷�
                            </td>
                            <td width="99"><input name='flag22[]' type='checkbox' value='04' <?if
                                    (strpos($row['flag'], "04" )) {?>
                                checked=checked
                                <?}?>
                                />��ɶ�
                            </td>
                            <td width="98"><input name='flag22[]' type='checkbox' value='05' <?if
                                    (strpos($row['flag'], "05" )) {?>
                                checked=checked
                                <?}?>
                                />�ɶ�
                            </td>
                            <td width="85"><input name='flag22[]' type='checkbox' value='06' <?if
                                    (strpos($row['flag'], "06" )) { ?> checked=checked <?}?>
                                />�ܴ���</td>
                            <td width="73"><input name='flag22[]' type='checkbox' value='07' <?if
                                    (strpos($row['flag'], "07" )) {?>
                                checked=checked
                                <?}?>
                                />����
                            </td>
                            <td width="80"><input name='flag22[]' type='checkbox' value='08' <?if
                                    (strpos($row['flag'], "08" )) {?>
                                checked=checked
                                <?}?>
                                />��Ա
                            </td>
                        </tr>
                        <tr>
                            <td><input name='flag22[]' type='checkbox' value='09' <?if (strpos($row['flag'], "09" )) {?>
                                checked=checked
                                <?}?>
                                />����
                            </td>
                            <td><input name='flag22[]' type='checkbox' value='10' <?if (strpos($row['flag'], "10" )) {?>
                                checked=checked
                                <?}?>
                                />ϵͳ����
                            </td>
                            <td><input name='flag22[]' type='checkbox' value='11' <?if (strpos($row['flag'], "11" )) {?>
                                checked=checked
                                <?}?>
                                />ע������
                            </td>
                            <td><input name='flag22[]' type='checkbox' value='12' <?if (strpos($row['flag'], "12" )) {?>
                                checked=checked
                                <?}?>
                                />���߲鿴
                            </td>
                            <td><input name='flag22[]' type='checkbox' value='14' <?if (strpos($row['flag'], "14" )) {?>
                                checked=checked
                                <?}?>
                                />��־
                            </td>
                            <td><input name='flag22[]' type='checkbox' value='15' <?if (strpos($row['flag'], "15" )) {?>
                                checked=checked
                                <?}?>
                                />����
                            </td>
                            <td colspan="2"><input name='flag22[]' type='checkbox' value='13' <?if
                                    (strpos($row['flag'], "13" )) {?>
                                checked=checked
                                <?}?>
                                />
                                ����Ա����/�˺�ɾ��
                            </td>
                        </tr>
                    </table> ע�⣺�����������Ա����Ȩ�ޣ����û������ڻ��ȫ��Ȩ�ޣ�
                </td>
            </tr>
            <tr>
                <td height="46" colspan="2" align="center" bgcolor="#ffffff">
                    <label>
                        <input type="submit" class="btn2" name="button" id="button" value="ȷ��">
                    </label>
                </td>
            </tr>
        </table>
    </form>
</body>