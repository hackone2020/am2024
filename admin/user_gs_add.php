<?php

if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
if (strpos($flag, "13")) {
} else {
    echo "<center>��û�и�Ȩ�޹���!</center>";
    exit;
}
if ($_GET['act'] == "add") {
    if (empty($_POST['username'])) {
        echo "<script>alert('�ʺŲ���Ϊ��!'); window.history.go(-1);</script>";
        exit;
    }
    if (empty($_POST['pass'])) {
        echo "<script>alert('���벻��Ϊ��!'); window.history.go(-1);</script>";
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
    $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $jxadmin . "',kauser='" . $jxadmin . "',lx=3,text1='����Ա����',text2='��ӹ���Ա:" . $user . "',ip='" . $userip . "'";
    $db1->query($sql);
    echo "<script>alert('��ӳɹ�!');window.location.href='main.php?action=user_gs_list&uid=" . $uid . "';</script>";
    exit;
}?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<script src="js/function.js" type="text/javascript"></script>
<script>function check_user() {
        username_value = $("username").value;
        if (username_value == '') { $("username").focus(); alert("�������˺�!!!"); return false; }
        else {
            $("check_frame").src = 'main.php?action=check&uid=<?=$uid?>&username='+username_value;}}

</script>

<body style="min-width: 1200px;width: 100%">
<div id="tit" class="tit">
        <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
        <div class="tit_center floatleft font_bold"><span class="font_g">����Ա��</span><span class="font_b">��ӹ���Ա</span></div>
        <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
        <div class="biaoti_right floatright">
            <input name="button" type="button" class="btn5" onmouseover="this.className='btn5m'" onmouseout="this.className='btn5'" onclick="history.go(-1)" value="����һҳ">
        </div>
    </div>
    <form name="form1" method="post" action="main.php?action=user_gs_add&uid=<?=$uid?>&act=add">

        <table width="900" align="center" border="0" cellpadding="0" cellspacing="1" class="t_list">
            <tr>
                <td height="20" colspan="2" align="center" class="t_list_caption">���������趨</td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" class="t_edit_caption">�ʺţ�</td>
                <td width="84%" bgcolor="#FFFFFF" class="m_bc_ed"><input name="username" type="text" class="za_text"
                        id="username" />&nbsp;
                    <input type="button" onClick="check_user();" value="����˺�" class="btn5">
                    &nbsp;�ʺű�������1����Ԫ�������12����Ԫ������ֻ��������(0-9)����Ӣ��Сд��ĸ
                </td>
            </tr>
            <tr>
                <td height="30" align="right" class="t_edit_caption">���룺</td>
                <td bgcolor="#FFFFFF" class="m_bc_ed"><input name="pass" type="password" class="za_text" id="pass" />
                    &nbsp;&nbsp;�����������6����Ԫ�������12����Ԫ��,����(0-9)����Ӣ�Ĵ�Сд��ĸ</td>
            </tr>
            <tr>
                <td height="17" colspan="2" align="center" class="t_list_caption">Ȩ��</td>
            </tr>
            <tr>
                <td height="65" colspan="2" align="center" class="m_bc_ed" bgcolor="#FFFFFF">
                    <table width="808" height="57" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="99"><input name='flag22[]' type='checkbox' value='01' checked="checked" />
                                �̿ڹ���</td>
                            <td width="137"><input name='flag22[]' type='checkbox' value='02' checked="checked" /> ��������
                            </td>
                            <td width="137"><input name='flag22[]' type='checkbox' value='03' checked="checked" />
                                ��ʱע��/�߷�</td>
                            <td width="99"><input name='flag22[]' type='checkbox' value='04' checked="checked" /> ��ɶ�
                            </td>

                            <td width="100"><input name='flag22[]' type='checkbox' value='05' checked="checked" /> �ɶ�
                            </td>
                            <td width="77"><input name='flag22[]' type='checkbox' value='06' checked="checked" /> �ܴ���
                            </td>
                            <td width="88"><input name='flag22[]' type='checkbox' value='07' checked="checked" /> ����
                            </td>
                            <td width="71"><input name='flag22[]' type='checkbox' value='08' checked="checked" /> ��Ա
                            </td>
                        </tr>
                        <tr>
                            <td><input name='flag22[]' type='checkbox' value='09' checked="checked" />����</td>
                            <td><input name='flag22[]' type='checkbox' value='10' checked="checked" />ϵͳ����</td>
                            <td>
                                <input name='flag22[]' type='checkbox' value='11' checked="checked" />ע������
                            </td>
                            <td>
                                <input name='flag22[]' type='checkbox' value='12' checked="checked" />���߲鿴
                            </td>
                            <td>
                                <input name='flag22[]' type='checkbox' value='14' checked="checked" />��־
                            </td>
                            <td>
                                <input name='flag22[]' type='checkbox' value='15' checked="checked" />����
                            </td>
                            <td colspan="2"><input name='flag22[]' type='checkbox' value='13' checked="checked" />
                                ����Ա����/�˺�ɾ��</td>
                        </tr>
                    </table>
                    ע�⣺�����������Ա����Ȩ�ޣ����û������ڻ��ȫ��Ȩ�ޣ�
                   <? if ($auto_edit == 1) {
                    echo " <br> ��ϵͳ�ѿ�ͨ�Զ��ĵ����ܣ�����ͨע����������ʹ�øù��ܣ� ";
                    }?>
                </td>
            </tr>
            <tr>
                <td height="30" colspan="2" align="center" class="m_bc_ed" bgcolor="#FFFFFF">
                    <input class="btn1" type="submit" name="button" id="button" value="ȷ��">
                </td>
            </tr>
        </table>
    </form>
    <iframe name="check_frame" src="" width="0" height="0" style="display:none"></iframe>
</body>