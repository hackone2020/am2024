<?php
header("Content-Type: text/html;charset=gb2312");
if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
if (strpos($flag, "10")) {
} else {
    echo "<center>��û�и�Ȩ�޹���!</center>";
    exit;
}
if ($_GET['save'] == "save") {
    $sxnum1 = "01,13,25,37,49";
    $sxnum2 = "02,14,26,38";
    $sxnum3 = "03,15,27,39";
    $sxnum4 = "04,16,28,40";
    $sxnum5 = "05,17,29,41";
    $sxnum6 = "06,18,30,42";
    $sxnum7 = "07,19,31,43";
    $sxnum8 = "08,20,32,44";
    $sxnum9 = "09,21,33,45";
    $sxnum10 = "10,22,34,46";
    $sxnum11 = "11,23,35,47";
    $sxnum12 = "12,24,36,48";
    switch ($_POST['sanimal']) {
        case 0:
            $db1->query("update web_sxnumber set m_number='{$sxnum1}' where id=1");
            $db1->query("update web_sxnumber set m_number='{$sxnum12}' where id=2");
            $db1->query("update web_sxnumber set m_number='{$sxnum11}' where id=3");
            $db1->query("update web_sxnumber set m_number='{$sxnum10}' where id=4");
            $db1->query("update web_sxnumber set m_number='{$sxnum9}' where id=5");
            $db1->query("update web_sxnumber set m_number='{$sxnum8}' where id=6");
            $db1->query("update web_sxnumber set m_number='{$sxnum7}' where id=7");
            $db1->query("update web_sxnumber set m_number='{$sxnum6}' where id=8");
            $db1->query("update web_sxnumber set m_number='{$sxnum5}' where id=9");
            $db1->query("update web_sxnumber set m_number='{$sxnum4}' where id=10");
            $db1->query("update web_sxnumber set m_number='{$sxnum3}' where id=11");
            $db1->query("update web_sxnumber set m_number='{$sxnum2}' where id=12");
            break;
        case 1:
            $db1->query("update web_sxnumber set m_number='{$sxnum2}' where id=1");
            $db1->query("update web_sxnumber set m_number='{$sxnum1}' where id=2");
            $db1->query("update web_sxnumber set m_number='{$sxnum12}' where id=3");
            $db1->query("update web_sxnumber set m_number='{$sxnum11}' where id=4");
            $db1->query("update web_sxnumber set m_number='{$sxnum10}' where id=5");
            $db1->query("update web_sxnumber set m_number='{$sxnum9}' where id=6");
            $db1->query("update web_sxnumber set m_number='{$sxnum8}' where id=7");
            $db1->query("update web_sxnumber set m_number='{$sxnum7}' where id=8");
            $db1->query("update web_sxnumber set m_number='{$sxnum6}' where id=9");
            $db1->query("update web_sxnumber set m_number='{$sxnum5}' where id=10");
            $db1->query("update web_sxnumber set m_number='{$sxnum4}' where id=11");
            $db1->query("update web_sxnumber set m_number='{$sxnum3}' where id=12");
            break;
        case 2:
            $db1->query("update web_sxnumber set m_number='{$sxnum3}' where id=1");
            $db1->query("update web_sxnumber set m_number='{$sxnum2}' where id=2");
            $db1->query("update web_sxnumber set m_number='{$sxnum1}' where id=3");
            $db1->query("update web_sxnumber set m_number='{$sxnum12}' where id=4");
            $db1->query("update web_sxnumber set m_number='{$sxnum11}' where id=5");
            $db1->query("update web_sxnumber set m_number='{$sxnum10}' where id=6");
            $db1->query("update web_sxnumber set m_number='{$sxnum9}' where id=7");
            $db1->query("update web_sxnumber set m_number='{$sxnum8}' where id=8");
            $db1->query("update web_sxnumber set m_number='{$sxnum7}' where id=9");
            $db1->query("update web_sxnumber set m_number='{$sxnum6}' where id=10");
            $db1->query("update web_sxnumber set m_number='{$sxnum5}' where id=11");
            $db1->query("update web_sxnumber set m_number='{$sxnum4}' where id=12");
            break;
        case 3:
            $db1->query("update web_sxnumber set m_number='{$sxnum4}' where id=1");
            $db1->query("update web_sxnumber set m_number='{$sxnum3}' where id=2");
            $db1->query("update web_sxnumber set m_number='{$sxnum2}' where id=3");
            $db1->query("update web_sxnumber set m_number='{$sxnum1}' where id=4");
            $db1->query("update web_sxnumber set m_number='{$sxnum12}' where id=5");
            $db1->query("update web_sxnumber set m_number='{$sxnum11}' where id=6");
            $db1->query("update web_sxnumber set m_number='{$sxnum10}' where id=7");
            $db1->query("update web_sxnumber set m_number='{$sxnum9}' where id=8");
            $db1->query("update web_sxnumber set m_number='{$sxnum8}' where id=9");
            $db1->query("update web_sxnumber set m_number='{$sxnum7}' where id=10");
            $db1->query("update web_sxnumber set m_number='{$sxnum6}' where id=11");
            $db1->query("update web_sxnumber set m_number='{$sxnum5}' where id=12");
            break;
        case 4:
            $db1->query("update web_sxnumber set m_number='{$sxnum5}' where id=1");
            $db1->query("update web_sxnumber set m_number='{$sxnum4}' where id=2");
            $db1->query("update web_sxnumber set m_number='{$sxnum3}' where id=3");
            $db1->query("update web_sxnumber set m_number='{$sxnum2}' where id=4");
            $db1->query("update web_sxnumber set m_number='{$sxnum1}' where id=5");
            $db1->query("update web_sxnumber set m_number='{$sxnum12}' where id=6");
            $db1->query("update web_sxnumber set m_number='{$sxnum11}' where id=7");
            $db1->query("update web_sxnumber set m_number='{$sxnum10}' where id=8");
            $db1->query("update web_sxnumber set m_number='{$sxnum9}' where id=9");
            $db1->query("update web_sxnumber set m_number='{$sxnum8}' where id=10");
            $db1->query("update web_sxnumber set m_number='{$sxnum7}' where id=11");
            $db1->query("update web_sxnumber set m_number='{$sxnum6}' where id=12");
            break;
        case 5:
            $db1->query("update web_sxnumber set m_number='{$sxnum6}' where id=1");
            $db1->query("update web_sxnumber set m_number='{$sxnum5}' where id=2");
            $db1->query("update web_sxnumber set m_number='{$sxnum4}' where id=3");
            $db1->query("update web_sxnumber set m_number='{$sxnum3}' where id=4");
            $db1->query("update web_sxnumber set m_number='{$sxnum2}' where id=5");
            $db1->query("update web_sxnumber set m_number='{$sxnum1}' where id=6");
            $db1->query("update web_sxnumber set m_number='{$sxnum12}' where id=7");
            $db1->query("update web_sxnumber set m_number='{$sxnum11}' where id=8");
            $db1->query("update web_sxnumber set m_number='{$sxnum10}' where id=9");
            $db1->query("update web_sxnumber set m_number='{$sxnum9}' where id=10");
            $db1->query("update web_sxnumber set m_number='{$sxnum8}' where id=11");
            $db1->query("update web_sxnumber set m_number='{$sxnum7}' where id=12");
            break;
        case 6:
            $db1->query("update web_sxnumber set m_number='{$sxnum7}' where id=1");
            $db1->query("update web_sxnumber set m_number='{$sxnum6}' where id=2");
            $db1->query("update web_sxnumber set m_number='{$sxnum5}' where id=3");
            $db1->query("update web_sxnumber set m_number='{$sxnum4}' where id=4");
            $db1->query("update web_sxnumber set m_number='{$sxnum3}' where id=5");
            $db1->query("update web_sxnumber set m_number='{$sxnum2}' where id=6");
            $db1->query("update web_sxnumber set m_number='{$sxnum1}' where id=7");
            $db1->query("update web_sxnumber set m_number='{$sxnum12}' where id=8");
            $db1->query("update web_sxnumber set m_number='{$sxnum11}' where id=9");
            $db1->query("update web_sxnumber set m_number='{$sxnum10}' where id=10");
            $db1->query("update web_sxnumber set m_number='{$sxnum9}' where id=11");
            $db1->query("update web_sxnumber set m_number='{$sxnum8}' where id=12");
            break;
        case 7:
            $db1->query("update web_sxnumber set m_number='{$sxnum8}' where id=1");
            $db1->query("update web_sxnumber set m_number='{$sxnum7}' where id=2");
            $db1->query("update web_sxnumber set m_number='{$sxnum6}' where id=3");
            $db1->query("update web_sxnumber set m_number='{$sxnum5}' where id=4");
            $db1->query("update web_sxnumber set m_number='{$sxnum4}' where id=5");
            $db1->query("update web_sxnumber set m_number='{$sxnum3}' where id=6");
            $db1->query("update web_sxnumber set m_number='{$sxnum2}' where id=7");
            $db1->query("update web_sxnumber set m_number='{$sxnum1}' where id=8");
            $db1->query("update web_sxnumber set m_number='{$sxnum12}' where id=9");
            $db1->query("update web_sxnumber set m_number='{$sxnum11}' where id=10");
            $db1->query("update web_sxnumber set m_number='{$sxnum10}' where id=11");
            $db1->query("update web_sxnumber set m_number='{$sxnum9}' where id=12");
            break;
        case 8:
            $db1->query("update web_sxnumber set m_number='{$sxnum9}' where id=1");
            $db1->query("update web_sxnumber set m_number='{$sxnum8}' where id=2");
            $db1->query("update web_sxnumber set m_number='{$sxnum7}' where id=3");
            $db1->query("update web_sxnumber set m_number='{$sxnum6}' where id=4");
            $db1->query("update web_sxnumber set m_number='{$sxnum5}' where id=5");
            $db1->query("update web_sxnumber set m_number='{$sxnum4}' where id=6");
            $db1->query("update web_sxnumber set m_number='{$sxnum3}' where id=7");
            $db1->query("update web_sxnumber set m_number='{$sxnum2}' where id=8");
            $db1->query("update web_sxnumber set m_number='{$sxnum1}' where id=9");
            $db1->query("update web_sxnumber set m_number='{$sxnum12}' where id=10");
            $db1->query("update web_sxnumber set m_number='{$sxnum11}' where id=11");
            $db1->query("update web_sxnumber set m_number='{$sxnum10}' where id=12");
            break;
        case 9:
            $db1->query("update web_sxnumber set m_number='{$sxnum10}' where id=1");
            $db1->query("update web_sxnumber set m_number='{$sxnum9}' where id=2");
            $db1->query("update web_sxnumber set m_number='{$sxnum8}' where id=3");
            $db1->query("update web_sxnumber set m_number='{$sxnum7}' where id=4");
            $db1->query("update web_sxnumber set m_number='{$sxnum6}' where id=5");
            $db1->query("update web_sxnumber set m_number='{$sxnum5}' where id=6");
            $db1->query("update web_sxnumber set m_number='{$sxnum4}' where id=7");
            $db1->query("update web_sxnumber set m_number='{$sxnum3}' where id=8");
            $db1->query("update web_sxnumber set m_number='{$sxnum2}' where id=9");
            $db1->query("update web_sxnumber set m_number='{$sxnum1}' where id=10");
            $db1->query("update web_sxnumber set m_number='{$sxnum12}' where id=11");
            $db1->query("update web_sxnumber set m_number='{$sxnum11}' where id=12");
            break;
        case 10:
            $db1->query("update web_sxnumber set m_number='{$sxnum11}' where id=1");
            $db1->query("update web_sxnumber set m_number='{$sxnum10}' where id=2");
            $db1->query("update web_sxnumber set m_number='{$sxnum9}' where id=3");
            $db1->query("update web_sxnumber set m_number='{$sxnum8}' where id=4");
            $db1->query("update web_sxnumber set m_number='{$sxnum7}' where id=5");
            $db1->query("update web_sxnumber set m_number='{$sxnum6}' where id=6");
            $db1->query("update web_sxnumber set m_number='{$sxnum5}' where id=7");
            $db1->query("update web_sxnumber set m_number='{$sxnum4}' where id=8");
            $db1->query("update web_sxnumber set m_number='{$sxnum3}' where id=9");
            $db1->query("update web_sxnumber set m_number='{$sxnum2}' where id=10");
            $db1->query("update web_sxnumber set m_number='{$sxnum1}' where id=11");
            $db1->query("update web_sxnumber set m_number='{$sxnum12}' where id=12");
            break;
        case 11:
            $db1->query("update web_sxnumber set m_number='{$sxnum12}' where id=1");
            $db1->query("update web_sxnumber set m_number='{$sxnum11}' where id=2");
            $db1->query("update web_sxnumber set m_number='{$sxnum10}' where id=3");
            $db1->query("update web_sxnumber set m_number='{$sxnum9}' where id=4");
            $db1->query("update web_sxnumber set m_number='{$sxnum8}' where id=5");
            $db1->query("update web_sxnumber set m_number='{$sxnum7}' where id=6");
            $db1->query("update web_sxnumber set m_number='{$sxnum6}' where id=7");
            $db1->query("update web_sxnumber set m_number='{$sxnum5}' where id=8");
            $db1->query("update web_sxnumber set m_number='{$sxnum4}' where id=9");
            $db1->query("update web_sxnumber set m_number='{$sxnum3}' where id=10");
            $db1->query("update web_sxnumber set m_number='{$sxnum2}' where id=11");
            $db1->query("update web_sxnumber set m_number='{$sxnum1}' where id=12");
            break;
    }
    $I = 1;
    for (; $I <= 49; $I += 1) {
        $result = $db1->query("select * from web_bl where  class2='��A' and class3='" . $I . "'   order by id desc");
        $row = $result->fetch_array();
        if ($row != "") {
            $zu = $row['rate'];
            $zu += $_POST['tmzz'];
            $db1->query("update web_bl set rate='" . $zu . "',blrate='" . $zu . "',mrate='" . $zu . "' where class2='��B' and class3='" . $I . "'");
        }
        $result = $db1->query("select * from web_bl where  class2='��A' and class3='" . $I . "'   order by id desc");
        $row = $result->fetch_array();
        if ($row != "") {
            $zu1 = $row['rate'];
            $zu1 += $_POST['zmzz'];
            $db1->query("update web_bl set rate='" . $zu1 . "',blrate='" . $zu1 . "',mrate='" . $zu1 . "' where class2='��B' and class3='" . $I . "'");
        }
    }
    $db1->query("update web_config set a10='" . $_POST['a10'] . "',report_of='" . $_POST['report_of'] . "',dssum='" . (int)$_POST['dssum'] . "',ggwinsum='" . (int)$_POST['ggwinsum'] . "',mrab='" . $_POST['mrab'] . "',sx49='" . $_POST['sx49'] . "',kplist='" . $_POST['kplist'] . "',opwww='" . $_POST['opwww'] . "',affice='" . $_POST['affice'] . "',a8='" . $_POST['a8'] . "',webname='" . $_POST['webname'] . "',sanimal='" . $_POST['sanimal'] . "',a7='" . $_POST['a7'] . "',a6='" . $_POST['a6'] . "',a5='" . $_POST['a5'] . "',a4='" . $_POST['a4'] . "',weburl='" . $_POST['weburl'] . "',tm='" . $_POST['tmzz'] . "',zm='" . $_POST['zmzz'] . "' where id=1");
    $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $jxadmin . "',kauser='" . $jxadmin . "',lx=3,text1='ϵͳ����',text2='��������',ip='" . $userip . "'";
    $db1->query($sql);
    echo "<script language='javascript'>alert('���óɹ�!');window.location.href='main.php?action=web_config&uid=" . $uid . "';</script>";
    exit;
}

$result = $db1->query("select * from web_config order by id LIMIT 1");
$row = $result->fetch_array();
?>

<link rel="stylesheet" href="css/control_main.css" type="text/css">

<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0" vlink="#0000FF" alink="#0000FF">
    <table width="874" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td class="m_tline" width="834">&nbsp;ϵͳ����<font color="#CC0000">��������</font>&nbsp;&nbsp;&nbsp;
                <input name="button" type="button" class="za_button" onClick="javascript:location.reload();"
                    value="����" />
            </td>

            <td width="40"><img src="images/top_04.gif" width="30" height="24" /></td>
        </tr>
    </table>
    <table width="900" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td>&nbsp;</td>
        </tr>
    </table>

    <table width="900" border="0" cellpadding="0" cellspacing="1" bordercolordark="#FFFFFF" class="m_tab_ed"
        id="listTable">

        <form name='form1' action='main.php?action=web_config&uid=<?=$uid?>&save=save' method=post>
            <tr>
                <td width="26%" height="25" align="center" bgcolor="6EC13E">��Ŀ</td>
                <td width="74%" align="center" bgcolor="6EC13E">����</td>
            </tr>
            <tr>
                <td height="28" align="center" class="m_bc_ed">��վ��Ϣ</td>
                <td class="m_bc_ed">��վ����:
                    <input name="webname" type="text" class="za_text" id="webname"
                        value="<?=$row['webname']?>" />��ַ:http://<input name="weburl" type="text" class="za_text"
                        id="weburl" value="<?=$row['weburl']?>" />
                </td>
            </tr>
            <tr>
                <td height="28" align="center" class="m_bc_ed">
                    <span>ũ����Ф����</span>
                </td>
                <td class="m_bc_ed">��ѡ���뵱ǰ�����Ӧ����Ф
                    <select name="sanimal" class="za_select" id="sanimal">
                        <option value="0" <? if ($row['sanimal'] == 0) {echo " selected"; }?>>��</option>
                        <option value="1" <? if ($row['sanimal'] == 1) {echo " selected"; }?>>ţ</option>
                        <option value="2" <? if ($row['sanimal'] == 2) {echo " selected"; }?>>��</option>
                        <option value="3" <? if ($row['sanimal'] == 3) {echo " selected"; }?>>��</option>
                        <option value="4" <?if ($row['sanimal'] == 4)  {echo " selected"; }?>>��</option>
                        <option value="5" <? if ($row['sanimal'] == 5) {echo " selected"; }?>>��</option>
                        <option value="6" <?if ($row['sanimal'] == 6) {echo " selected";  }?>>��</option>
                        <option value="7" <?if ($row['sanimal'] == 7) {echo " selected"; }?>>��</option>
                        <option value="8" <? if ($row['sanimal'] == 8) {echo " selected"; }?>>��</option>
                        <option value="9" <?if ($row['sanimal'] == 9) {echo " selected"; }?>>��</option>
                        <option value="10" <? if ($row['sanimal'] == 10) {echo " selected"; }?>>��</option>
                        <option value="11" <?if ($row['sanimal'] == 11) { echo " selected"; }?>>��</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td height="28" align="center" class="m_bc_ed">B��Ĭ������</td>

                <td bordercolor="cccccc" class="m_bc_ed">����B ��
                    <input name="tmzz" class="za_text_ed" id="tmzz" value="<?=$row['tm']?>"
                        size="3" />&nbsp;&nbsp;&nbsp;<br />
                    ����B ��<input name="zmzz" class="za_text_ed" id="zmzz" value="<?=$row['zm']?>"
                        size="3" />&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
            </tr>
            <tr>
                <td height="28" align="center" class="m_bc_ed">������߲ʽ�����</td>
                <td bordercolor="cccccc" class="m_bc_ed"><input name="ggwinsum" class="za_text_ed" id="ggwinsum"
                        value="<?=$row['ggwinsum']?>" /></td>
            </tr>

            <tr>
                <td height="25" align="center" class="m_bc_ed">���� ����Ĭ����ʾA�̻�B��</td>
                <td bordercolor="cccccc" class="m_bc_ed">

                    <select name="mrab" class="za_select" id="mrab">
                        <option value="0" <? if ($row['mrab'] == 0) {echo " selected=selected";}?>>A��</option>
                        <option value="1" <?if ($row['mrab'] == 1) {echo " selected=selected";}?>>B��</option>
                    </select>
                </td>
            </tr>
            <tr>

                <td height="25" align="center" class="m_bc_ed">49��Ф�Ƿ���</td>
                <td bordercolor="cccccc" class="m_bc_ed">
                    <select name="sx49" class="za_select" id="sx49">
                        <option value="0" <?if ($row['sx49']==0) {echo "selected=selected";}?>>���</option>
                        <option value="1" <?if ($row['sx49']==1) {echo "selected=selected";}?>>�����</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td height="25" align="center" class="m_bc_ed">�������Ƿ��������ʷ��</td>

                <td bordercolor="cccccc" class="m_bc_ed">

                    <select name="kplist" class="za_select" id="kplist">
                        <option value="0" <? if ($row['kplist']==0) { echo "selected=selected";}?>>����</option>
                        <option value="1" <?  if ($row['kplist']==1) {echo "selected=selected";}?>>������</option>
                    </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ע��:��ϵͳ��ʷע����Ŵ�������ʱ���������á�������
                </td>
            </tr>
            <tr>
                <td height="25" align="center" class="m_bc_ed">�Զ���ˮ����</td>
                <td bordercolor="cccccc" class="m_bc_ed">

                    <select name="dssum" class="za_select" id="dssum">
                        <option value="0" <? if ($row['dssum']==0) { echo "selected=selected";}?>>����ע�ܶ�</option>
                        <option value="1" <? if ($row['dssum']==1) {echo "selected=selected";}?>>����˾ռ��</option>
                    </select>&nbsp;&nbsp;ע��:�������ڿ���ǰ����
                </td>
            </tr>

            <tr>
                <td height="25" align="center" class="m_bc_ed">ϵͳ����ƹ���</td>

                <td bordercolor="cccccc" class="m_bc_ed">
                    <textarea id="Content" name="affice" rows="6" cols="50"><?=$row['affice']?>
</textarea><br>@webname@ �Զ���Ϊ��վ����,@webnn@ �Զ���Ϊ��������<br> @web_date_start@ �Զ���Ϊ����ʱ��, @web_date_end@ �Զ���Ϊ����ʱ��<br>
                </td>
            </tr>

            <tr>
                <td height="25" align="center" class="m_bc_ed">��Ա��������</td>
                <td bordercolor="cccccc" class="m_bc_ed"><textarea id="Content" name="a8" rows="6"
                        cols="50"><?=$row['a8']?></textarea></td>
            </tr>
            <tr>
                <td height="25" align="center" class="m_bc_ed">����������</td>
                <td bordercolor="cccccc" class="m_bc_ed"><textarea id="a7" name="a7" rows="6" cols="50">
<?=$row['a7']?></textarea></td>
            </tr>
            <tr>
                <td height="25" align="center" class="m_bc_ed">֪ͨ����1<br>(����������)</td>
                <td bordercolor="cccccc" class="m_bc_ed"><textarea id="a4" name="a4" rows="6"
                        cols="50"><?=$row['a4']?></textarea></td>
            </tr>


            <tr>
                <td height="25" align="center" class="m_bc_ed">֪ͨ����2<br>(����������)</td>

                <td bordercolor="cccccc" class="m_bc_ed"><textarea id="a5" name="a5" rows="6" cols="50">
<?=$row['a5']?></textarea></td>
            </tr>
            <tr>
                <td height="25" align="center" class="m_bc_ed">֪ͨ����3<br>(����������)</td>
                <td bordercolor="cccccc" class="m_bc_ed"><textarea id="a6" name="a6" rows="6" cols="50">
<?=$row['a6']?></textarea></td>
            </tr>

            <tr>
                <td height="25" align="center" class="m_bc_ed">";

                    <span>ϵͳά��</span>
                </td>

                <td bordercolor="cccccc" class="m_bc_ed">
                    <select name="opwww" class="za_select" id="opwww">
                        <option value="0" <?if (get_config("opwww")==0) {?>
                            selected="selected"
                            <?}?>
                            >������վ
                        </option>
                        <option value="1" <? if (get_config("opwww")==1) {?>
                            selected="selected"
                            <?}?>
                            >�ر���վ
                        </option>
                    </select>
                </td>
            </tr>
            <tr>
                <td height="25" align="center" class="m_bc_ed">Ͷע+��ʱע��+����</td>
                <td bordercolor="cccccc" class="m_bc_ed">

                    <select name="report_of" class="za_select" id="report_of">
                        <option value="0" <? if ($row['report_of']==0) {?>
                            selected="selected"
                            <?}?>
                            >����
                        </option>
                        <option value="1" <?if ($row['report_of']==1) {?>
                            selected="selected"
                            <?}?>
                            >�ر�
                        </option>
                    </select>
                </td>
            </tr>
            <tr>
                <td height="25" align="center" class="m_bc_ed">
                    <span>ϵͳά������</span>
                </td>

                <td bordercolor="cccccc" class="m_bc_ed"><textarea id="a10" name="a10" rows="6"
                        cols="50"><?=get_config("a10")?></textarea></td>
            </tr>

            <tr>
                <td height="25" colspan="2" align="center" class="m_bc_ed"><button onClick="submit()">�޸�</button></td>
            </tr>
        </form>
    </table>
</body>