<?php

if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
if (strpos($flag, "04")) {
} else {
    echo "<center>��û�и�Ȩ�޹���!</center>";
    exit;
}
$maxcs = 888888888;
$istar = 0;
$iend = 100;
if ($_GET['act'] == "add") {
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    chk_user($username);
    chk_pwd($pass);
    $pass = md5($pass);
    $xm = isset($_POST['xm']) ? safe_convert($_POST['xm']) : $username;
    $cs = isset($_POST['cs']) ? intval($_POST['cs']) : 0;
    $sj = isset($_POST['sj']) ? intval($_POST['sj']) : $iend;
    $sf = isset($_POST['sf']) ? intval($_POST['sf']) : 0;
    $kabcd = $_POST['kabcd'];
    $abcd = implode(",",$kabcd);
    $stat = 0;
    if ($_POST['rpz'] == 1) {
        $pz = 1;
    } else {
        $pz = 0;
    }
    if ($_POST['rzc'] == "1") {
        $zc = 1;
    } else {
        $zc = 0;
    }
    if ($_POST['rty'] == 1) {
        $ty = 1;
    } else {
        $ty = 0;
    }
    if ($_POST['ronline'] == 1) {
        $online = 1;
    } else {
        $online = 0;
    }
    if ($_POST['rreport'] == 1) {
        $report = 1;
    } else {
        $report = 0;
    }
    if ($_POST['rzcauto'] == 1) {
        $zc_auto = 1;
    } else {
        $zc_auto = 0;
    }
    if ($_POST['rzcall'] == 1) {
        $zc_all = 1;
    } else {
        $zc_all = 0;
    }
    $rpzall = $_POST['rpzall'];
    switch ($rpzall) {
        case "0":
            $pzall = 0;
            break;
        case "1":
            $pzall = 1;
            break;
        case "2":
            $pzall = 2;
            break;
        case "3":
            $pzall = 3;
            break;
        default:
            $pzall = 0;
            break;
    }
    $rds = $_POST['rds'];
    switch ($rds) {
        case "0":
            $dsc = 0;
            break;
        case "1":
            $dsc = 0.1;
            break;
        case "2":
            $dsc = 0.5;
            break;
        case "3":
            $dsc = 1;
            break;
        case "4":
            $dsc = 1.5;
            break;
        case "5":
            $dsc = 2;
            break;
        case "6":
            $dsc = 2.5;
            break;
        case "7":
            $dsc = -1;
            break;
        default:
            $dsc = 0;
            break;
    }
    if (empty($username)) {
        echo "<script>alert('�ʺŲ���Ϊ��!'); window.history.go(-1);</script>";
        exit;
    }
    if (empty($pass)) {
        echo "<script>alert('���벻��Ϊ��!'); window.history.go(-1);</script>";
        exit;
    }
    if ($maxcs < $cs) {
        echo "<script>alert('�����ö��������ö�!');window.history.go(-1);</script>";
        exit;
    }
    if ($iend < $sj) {
        echo "<script>alert('�Բ���,����ȷ����ռ��!');window.history.go(-1);</script>";
        exit;
    }
    if ($iend < $sf) {
        echo "<script>alert('�Բ���,����ȷ����ռ��!');window.history.go(-1);</script>";
        exit;
    }
    if ($sj + $sf != $iend) {
        echo "<script>alert('�Բ���,����ȷ����ռ��!'); window.history.go(-1);</script>";
        exit;
    }
    if ($iend < $sj + $sf) {
        echo "<script>alert('��˾�����ӷֹ�˾�������ܳ���" . $iend . "%��!');window.history.go(-1);</script>";
        exit;
    }
    $sql = "INSERT INTO  web_agent set uid='',kauser='{$username}',kapassword='{$pass}',xm='{$xm}',slogin='{$utime}',sip='{$userip}',zlogin='{$utime}',zip='{$userip}',adduser='{$jxadmin}',look='0',lx='4',dagu='',guan='',zong='',cs='{$cs}',ts='{$cs}',adddate='{$utime}',stat='{$stat}',ty='{$ty}',pz='{$pz}',pzall='{$pzall}',abcd='{$abcd}',zc='{$zc}',zc_all='{$zc_all}',zc_auto='{$zc_auto}',online='{$online}',report='{$report}',gs_zc='{$sj}',dagu_zc='{$sf}',guan_zc='0',zong_zc='0',dai_zc='0'";
    if (!$db1->query($sql)) {
        exit("���ݿ��޸ĳ���");
    }
    $result = $db1->query("select * from web_agent where  kauser='" . $username . "'  order by id desc LIMIT 1");
    $row = $result->fetch_array();
    $userid = $row['id'];
    if ($userid != "") {
        $result = $db1->query("select id,class,ds_lb,ds,yg,ygb,ygc,ygd,yge,ygf,ygg,ygh,xx,xxx from  web_config_ds where lx=0 order by id");
        while ($image = $result->fetch_array()) {
            if (0 <= $dsc) {
                $yg = round($image['yg'] - $dsc, 2);
                $ygb = round($image['ygb'] - $dsc, 2);
                $ygc = round($image['ygc'] - $dsc, 2);
                $ygd = round($image['ygd'] - $dsc, 2);
                $yge = round($image['yge'] - $dsc, 2);
                $ygf = round($image['ygf'] - $dsc, 2);
                $ygg = round($image['ygg'] - $dsc, 2);
                $ygh = round($image['ygh'] - $dsc, 2);
            } else {
                $yg = $ygb = $ygc = $ygd = $yge = $ygf = $ygg = $ygh = 0;
            }
            $db1->query("INSERT INTO web_user_ds set username='{$username}',userid='{$userid}',class='" . $image['class'] . "',ds_lb='" . $image['ds_lb'] . "',ds_id='" . $image['id'] . "',ds='" . $image['ds'] . "',yg='" . $yg . "',ygb='" . $ygb . "',ygc='" . $ygc . "',ygd='" . $ygd . "',yge='" . $yge . "',ygf='" . $ygf . "',ygg='" . $ygg . "',ygh='" . $ygh . "',xx='" . $image['xx'] . "',xxx='" . $image['xxx'] . "',ds_lock='0',lx='4',pz='0',pz_sum='0',zf_sum='500000',dagu='',guan='',zong='',dai=''");
        }
    }
    echo "<script>alert('��ӳɹ�!');window.location.href='main.php?action=user_dagu_list&uid=" . $uid . "';</script>";
    exit;
} ?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<script src="js/function.js" type="text/javascript"></script>
<script>
    function check_user() {
        username_value = $("username").value;
        if (username_value == '') {
            $("username").focus();
            alert("�������˺�!!!");
            return false;
        } else {
            $("check_frame").src = 'main.php?action=check&uid=<?= $uid ?>&username=' + username_value;
        }
    }
</script>
<script>
    function SubChk() {
        if ($("username").value == '') {
            $("username").focus();
            alert("�������˺�!!!");
            return false;
        }
        if ($("pass").value == '') {
            $("pass").focus();
            alert("����������!!!");
            return false;
        }
        if ($("pass2").value == '') {
            $("pass2").focus();
            alert("������ȷ������!!!");
            return false;
        }
        if ($("pass").value != $("pass2").value) {
            $("pass2").focus();
            alert("ȷ�����������벻һ��!!!");
            return false;
        }
        if ($("xm").value == '') {
            $("xm").focus();
            alert("����������!!!");
            return false;
        }
        if ($("cs").value == '') {
            $("cs").focus();
            alert("�����������ö��!!!");
            return false;
        }
        if (isNaN($("cs").value)) {
            alert('�����ö��ֻ����������');
            $("cs").focus();
            return false;
        }
        if ($("cs").value > eval($("maxcs").value)) {
            $("cs").focus();
            alert("���ö�Ȳ��ܴ���������ö��!!!");
            return false;
        }
        if (!confirm("�Ƿ�ȷ����ӷֹ�˾?")) {
            return false;
        }
    }
</script>
<script>
    function ChangeSelectorSJ() {

        $("sf").value = "<?= $iend ?>" - $("sj").value;
    }

    function ChangeSelectorSF() {
        $("sj").value = "<?= $iend ?>" - $("sf").value;
    }
</script>

<body style="min-width: 1200px;width: 100%">
    <div id="tit" class="tit">
        <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
        <div class="tit_center floatleft font_bold"><span class="font_g">�ֹ�˾����</span><span class="font_b">��ӷֹ�˾</span></div>
        <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
        <div class="biaoti_right floatright">
            <!--<div align="right"><a href="main.php?action=user_dagu_list&uid=<?= $uid ?>">����һҳ</a></div>-->

            <input name="button" type="button" class="btn5" onmouseover="this.className='btn5m'" onmouseout="this.className='btn5'" onclick="history.go(-1)" value="����һҳ">
        </div>
    </div>
    <form name="form1" onSubmit="return SubChk()" method="post" action="main.php?action=user_dagu_add&uid=<?= $uid ?>&act=add">

        <table width="900" align="center" border="0" cellpadding="0" cellspacing="1" class="t_list">
            <tr>
                <td height="20" colspan="2" align="center" bgcolor="#FFFFFF" class="t_list_caption">���������趨</td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�˺�:</td>
                <td height="30" bgcolor="#FFFFFF" class="m_bc_ed"><input name="username" type="text" class="za_text" id="username">&nbsp;
                    <input type="button" onClick="check_user();" value="����˺�" class="za_button" />&nbsp;�ʺű�������1����Ԫ�������12����Ԫ������ֻ��������(0-9)����Ӣ��Сд��ĸ
                </td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">����:</td>
                <td height="30" bgcolor="#FFFFFF" class="m_bc_ed"><input name="pass" type="password" class="za_text" id="pass" />&nbsp;�����������6����Ԫ�������12����Ԫ������ֻ��������(0-9)����Ӣ�Ĵ�Сд��ĸ </td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">ȷ������:</td>
                <td bgcolor="#FFFFFF" class="m_bc_ed"><input name="pass2" type="password" class="za_text" id="pass2" />
                </td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">����:</td>
                <td bgcolor="#FFFFFF" class="m_bc_ed"><input name="xm" type="text" class="za_text" id="xm" /></td>
            </tr>
            <tr>
                <td height="17" colspan="2" align="center" bgcolor="#FFFFFF" class="t_list_caption">��ע�����趨</td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�����ö�:</td>
                <td bgcolor="#FFFFFF" class="m_bc_ed">
                    <input name="cs" type="text" class="za_text" id="cs" onkeyup="value=value.replace(/[^\d\.\/]/ig,'')" value="0" />������ö��:
                    <?= $maxcs ?>
                    <input name="maxcs" type="hidden" id="maxcs" value="<?= $maxcs ?>" />
                </td>
            </tr>
            <tr>
                <td height="30" align="center" bgcolor="#FFFFFF" class="t_edit_caption">�̿�:</td>
                <td height="30" bgcolor="#FFFFFF" class="m_bc_ed">
                    <? if ($pannums >= 1) { ?><input type="checkbox" name="kabcd[]" id="kabcd[]" value="A" checked="checked" />A<? } ?>
                        <? if ($pannums >= 2) { ?><input type="checkbox" name="kabcd[]" id="kabcd[]" value="B" checked="checked" />B<? } ?>
                            <? if ($pannums >= 3) { ?><input type="checkbox" name="kabcd[]" id="kabcd[]" value="C" checked="checked" />C<? } ?>
                                <? if ($pannums >= 4) { ?><input type="checkbox" name="kabcd[]" id="kabcd[]" value="D" checked="checked" />D<? } ?>
                                    <? if ($pannums >= 5) { ?><input type="checkbox" name="kabcd[]" id="kabcd[]" value="E" checked="checked" />E<? } ?>
                                        <? if ($pannums >= 6) { ?><input type="checkbox" name="kabcd[]" id="kabcd[]" value="F" checked="checked" />F<? } ?>
                                            <? if ($pannums >= 7) { ?><input type="checkbox" name="kabcd[]" id="kabcd[]" value="G" checked="checked" />G<? } ?>
                                                <? if ($pannums >= 8) { ?><input type="checkbox" name="kabcd[]" id="kabcd[]" value="H" checked="checked" />H<? } ?>

                </td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�߷�:</td>
                <td height="30" bgcolor="#FFFFFF" class="m_bc_ed">
                    <input type="radio" name="rpz" id="rpz" value="0" checked="checked" onClick="CkZC(0)" />����
                    <input type="radio" name="rpz" id="rpz" value="1" onClick="StopPZ();CkZC(1);" />��ֹ
                </td>
            </tr>
            <tr id='zctr'>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�ֹ�˾�߷ɵ�������:</td>
                <td height="30" bgcolor="#FFFFFF" class="m_bc_ed">
                    <input type="radio" name="rzc" id="rzc" value="0" checked="checked" />����
                    <input type="radio" name="rzc" id="rzc" value="1" />��ֹ&nbsp;&nbsp;<font color="gray">
                        ���÷ֹ�˾ȫ�߿����߷�ʱ,��˾���Ե������Ʒֹ�˾�߷ɹ���</font>
                </td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">Ͷע:</td>
                <td height="30" bordercolor="#CCCCCC" bgcolor="#FFFFFF" class="m_bc_ed"> <input type="radio" name="rty" id="rty" value="0" checked="checked" />����Ͷע
                    <input type="radio" name="rty" id="rty" value="1" onClick="StopTY()" />��ͣͶע
                </td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">��˾ռ����:</td>
                <td height="30" bordercolor="#CCCCCC" bgcolor="#FFFFFF" class="m_bc_ed">

                    <select name="sj" id="sj" onchange="ChangeSelectorSJ();">
                        <? $bb = $istar;
                        for (; $bb <= $iend; $bb += 5) { ?>
                            <option value="<?= $bb ?>" <? if ($bb == 100) { ?> selected="selected" <? } ?>>
                                <? switch ($bb) {
                                    case 0:
                                        print "��ռ��";
                                        break;
                                    default:
                                        print $bb . "%";
                                        break;
                                } ?>
                            </option>
                        <? } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�ֹ�˾ռ����:</td>
                <td height="30" bordercolor="#CCCCCC" bgcolor="#FFFFFF" class="m_bc_ed">
                    <select name="sf" id="sf" onchange="ChangeSelectorSF();">
                        <? $bb = $istar;
                        for (; $bb <= $iend; $bb += 5) { ?>
                            <option value="<?= $bb ?>">
                                <? switch ($bb) {
                                    case 0:
                                        print "��ռ��";
                                        break;
                                    default:
                                        print $bb . "%";
                                        break;
                                } ?>
                            </option>
                        <? } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">��ˮ�趨:</td>
                <td height="30" bordercolor="#CCCCCC" bgcolor="#FFFFFF" class="m_bc_ed">
                    <input type="radio" name="rds" id="rds" value="0" checked="checked" />ȫ��
                    <input type="radio" name="rds" id="rds" value="1" />׬0.1
                    <input type="radio" name="rds" id="rds" value="2" />׬0.5
                    <input type="radio" name="rds" id="rds" value="3" />׬1
                    <input type="radio" name="rds" id="rds" value="4" />׬1.5
                    <input type="radio" name="rds" id="rds" value="5" />׬2
                    <input type="radio" name="rds" id="rds" value="6" />׬2.5
                    <input type="radio" name="rds" id="rds" value="7" />ȫ����
                </td>
            </tr>
            <tr>
                <td height="17" colspan="2" bgcolor="#FFFFFF" class="t_list_caption">�û�����</td>
            </tr>

            <tr>
                <td height="30" align="center" bgcolor="#FFFFFF" class="t_edit_caption">����ͳ��:</td>
                <td height="30" bgcolor="#FFFFFF" class="m_bc_ed">
                    <input type="radio" name="ronline" id="ronline" value="0" checked="checked" />������鿴
                    <input type="radio" name="ronline" id="ronline" value="1" />����鿴
                </td>
            </tr>
            <tr>
                <td height="30" align="center" bgcolor="#FFFFFF" class="t_edit_caption">������ʾ:</td>
                <td height="30" bgcolor="#FFFFFF" class="m_bc_ed">
                    <input type="radio" name="rreport" id="rreport" value="0" checked="checked" />��ʾ�ֹ�˾���� <input type="radio" name="rreport" id="rreport" value="1" />��ʾ�ܹ�˾
                </td>
            </tr>
            <tr>
                <td height="30" align="center" bgcolor="#FFFFFF" class="t_edit_caption">�¼��߷ɹ���:</td>
                <td height="30" bgcolor="#FFFFFF" class="m_bc_ed">
                    <input type="radio" name="rpzall" id="rpzall" value="0" onClick="Ckpzall(0)" checked="checked" />ȫ�鹫˾
                    <input type="radio" name="rpzall" id="rpzall" value="1" onClick="Ckpzall(0)" />ȫ��ֹ�˾
                    <input type="radio" name="rpzall" id="rpzall" value="2" onClick="Ckpzall(1)" />��������������
                    <input type="radio" name="rpzall" id="rpzall" value="3" onClick="Ckpzall(1)" />���¼�����ѡ��
                </td>
            </tr>
            <tr>
                <td height="30" align="center" bgcolor="#FFFFFF" class="t_edit_caption">����ʣ�����:</td>
                <td height="30" bgcolor="#FFFFFF" class="m_bc_ed">
                    <input type="radio" name="rzcauto" id="rzcauto" value="0" checked="checked" />����
                    <input type="radio" name="rzcauto" id="rzcauto" value="1" />
                    ��ֹ&nbsp;&nbsp;<font color="gray">����һ���趨�����޸�!</font>
                </td>
            </tr>
            <tr>
                <td height="30" align="center" bgcolor="#FFFFFF" class="t_edit_caption">ʣ���������
                    <span id="gsmsg"></span>:
                </td>
                <td height="30" bgcolor="#FFFFFF" class="m_bc_ed">
                    <input type="radio" name="rzcall" id="rzcall" value="0" checked="checked" />�鹫˾
                    <input type="radio" name="rzcall" id="rzcall" value="1" />��ֹ�˾ &nbsp;&nbsp;<font color="gray">
                        ����һ���趨�����޸�!</font>
                </td>
            </tr>
            <tr>
                <td height="30" colspan="2" align="center" bgcolor="#FFFFFF" class="m_bc_ed">
                    <input class="btn1" type="submit" name="button" id="button" value="ȷ��" />
                </td>
            </tr>
        </table>
    </form>
    <iframe name="check_frame" src="" width="0" height="0" style="display:none"></iframe>
</body>