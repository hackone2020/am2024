<?php

if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
if (strpos($flag, "07")) {
} else {
    echo "<center>��û�и�Ȩ�޹���!</center>";
    exit;
}
$maxcs = 888888888;
$istar = 0;
$iend = 100;
if ($_GET['zong'] != "") {
    $zong = $_GET['zong'];
    $result = $db1->query("select * from web_agent where kauser='" . $zong . "' and lx=2 order by id LIMIT 1");
    $row = $result->fetch_assoc();
    if ($row == "") {
        exit;
    }
    $iend = $row['zong_zc'];
    $maxcs = $row['cs'];
    $zongmaxcs = $row['cs'];
    $zongmaxzc = $row['zong_zc'];
    $gs_zc = $row['gs_zc'];
    $report = $row['report'];
    $dagu_zc = $row['dagu_zc'];
    $guan_zc = $row['guan_zc'];
    $dagu = $row['dagu'];
    $guan = $row['guan'];
    $kabcd = $row['abcd'];
    $abcd = explode(",", $kabcd);
    $zc = 0;
    $result1 = $db1->query("select * from web_agent where kauser='" . $dagu . "' and lx=4 order by id LIMIT 1");
    $rows = $result1->fetch_assoc();
    if ($rows == "") {
        exit;
    }
    $zc_auto = $rows['zc_auto'];
    $zc_all = $rows['zc_all'];
    $pzall = $rows['pzall'];
    $mumu = 0;
    $result1 = $db1->query("select SUM(cs) As sum_m  From web_agent Where lx=1 and   zong='" . $zong . "' order by id desc");
    $rsw = $result1->fetch_array();
    if ($rsw[0] != "") {
        $mumu = $rsw[0];
    }
    $result1 = $db1->query("select SUM(cs) As sum_m  From web_member Where zs=2 and   zong='" . $zong . "' order by id desc");
    $rsw = $result1->fetch_array();
    if ($rsw[0] != "") {
        $mumu += $rsw[0];
    }
    $maxcs -= $mumu;
} else {
    $zong = "";
}
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
    $kxabcd = $_POST['kabcd'];
    $xabcd = implode(",", $kxabcd);
    $stat = 0;
    if ($_POST['rpz'] == 1) {
        $pz = 1;
    } else {
        $pz = 0;
    }
    if ($_POST['rty'] == 1) {
        $ty = 1;
    } else {
        $ty = 0;
    }
    if ($pzall == 3) {
        if ($_POST['zc'] == "1") {
            $zc = 1;
        } else {
            $zc = 0;
        }
    } else {
        $zc = 0;
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
    if ($zc_auto == 0) {
        if ($zc_all == 0) {
            $gs_zc = 100 - $dagu_zc - $guan_zc - $sj - $sf;
        } else {
            $dagu_zc = 100 - $gs_zc - $guan_zc - $sj - $sf;
        }
    } else {
        if ($sj + $sf != $iend) {
            echo "<script>alert('�Բ���,����ȷ����ռ��!'); window.history.go(-1);</script>";
            exit;
        }
    }
    if ($iend < $sj + $sf) {
        echo "<script>alert('�ܴ�������Ӵ���������ܳ���" . $iend . "%��!');window.history.go(-1);</script>";
        exit;
    }
    $sql = "INSERT INTO  web_agent set uid='',kauser='{$username}',kapassword='{$pass}',xm='{$xm}',slogin='{$utime}',sip='{$userip}',zlogin='{$utime}',zip='{$userip}',adduser='{$jxadmin}',look='0',lx='1',dagu='{$dagu}',guan='{$guan}',zong='{$zong}',cs='{$cs}',ts='{$cs}',adddate='{$utime}',stat='{$stat}',ty='{$ty}',pz='{$pz}',pzall='{$pzall}',abcd='{$xabcd}',zc='{$zc}',zc_all='{$zc_all}',zc_auto='{$zc_auto}',report='{$report}',gs_zc='{$gs_zc}',dagu_zc='{$dagu_zc}',guan_zc='{$guan_zc}',zong_zc='{$sj}',dai_zc='{$sf}'";
    if (!$db1->query($sql)) {
        exit("���ݿ��޸ĳ���");
    }
    $result = $db1->query("select * from web_agent where  kauser='" . $username . "'  order by id desc LIMIT 1");
    $row = $result->fetch_array();
    $userid = $row['id'];
    $result = $db1->query("select id,class,ds_lb,ds_id,ds,yg,ygb,ygc,ygd,yge,ygf,ygg,ygh,xx,xxx,ds_lock from  web_user_ds where lx=2 and username='" . $zong . "' order by id");
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
        $db1->query("INSERT INTO web_user_ds set username='{$username}',userid='{$userid}',class='" . $image['class'] . "',ds_lb='" . $image['ds_lb'] . "',ds_id='" . $image['ds_id'] . "',ds='" . $image['ds'] . "',yg='" . $yg . "',ygb='" . $ygb . "',ygc='" . $ygc . "',ygd='" . $ygd . "',yge='" . $yge . "',ygf='" . $ygf . "',ygg='" . $ygg . "',ygh='" . $ygh . "',xx='" . $image['xx'] . "',xxx='" . $image['xxx'] . "',ds_lock='" . $image['ds_lock'] . "',lx='1',pz='0',pz_sum='0',zf_sum='500000',dagu='" . $dagu . "',guan='" . $guan . "',zong='" . $zong . "',dai=''");
    }
    echo "<script>alert('��ӳɹ�!');window.location.href='main.php?action=user_dai_list&uid=" . $uid . "';</script>";
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
            $("check_frame").src = 'main.php?action=check&uid="<?= $uid ?>"&username=' + username_value;
        }
    }
</script>

<script>
    function SubChk() {
        if ($("agent").value == '') {
            $("zong").focus();
            alert("��ѡ���ϼ�!!");
            return false;
        }
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
            alert("ȷ�����������벻��?!!");
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
        if (!confirm("�Ƿ�ȷ����Ӵ���?")) {
            return false;
        }
    }
</script>
<script>
    <? if ($zc_auto == 0) { ?>

        function ChangeSelectorSJ() {
            var zzc = eval($("sf").value) + eval($("sj").value);
            if (zzc > "<?= $iend ?>") {
                $("sf").value = "<?= $iend ?>" - $("sj").value;
                $("sj").focus();
                alert("�ܴ���ռ����+����ռ�������ܴ��ڿ���ռ����<?= $iend ?>%��");
                return false;
            }
        }

        function ChangeSelectorSF() {
            var zzc = eval($("sf").value) + eval($("sj").value);
            if (zzc > "<?= $iend ?>") {
                $("sj").value = "<?= $iend ?>" - $("sf").value;
                $("sf").focus();
                alert("�ܴ���ռ����+����ռ�������ܴ��ڿ���ռ����<?= $iend ?>%��");
                return false;
            }
        }
    <?
    } else { ?>

        function ChangeSelectorSJ() {
            $("sf").value = "<?= $iend ?>" - $("sj").value;

        }

        function ChangeSelectorSF() {
            $("sj").value = "<?= $iend ?>" - $("sf").value;

        }
    <?   } ?>

    function StopPZ() {
        alert("���˺ż������������̽��ر��߷ɷ���!!!");
    }

    function StopTY() {
        alert("���˺ż���������Ա����ͣͶע����!!!");
    }
</script>

<body style="min-width: 1200px;width: 100%">
    <div id="tit" class="tit">
        <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
        <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;�������</span><span class="font_b">��Ӵ���&nbsp;</span></div>
        <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
        <div class="biaoti_right floatright">
            <div align="right">
                <input name="button" type="button" class="btn5" onmouseover="this.className='btn5m'" onmouseout="this.className='btn5'" onclick="history.go(-1)" value="����һҳ">
            </div>
        </div>
    </div>

    <? if ($zong != "") { ?>
        <br>
        <table width="800" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
            <tr>
                <td height="20" colspan="2" class="t_list_caption">�ܴ���(<?= $zong ?>)���ϼ���
                </td>
            </tr>
            <tr>
                <td width="16%" height="20" align="right" class="t_edit_caption">��ע:</td>
                <td class="t_edit_td">����ռ����:<?= $zongmaxzc ?>%&nbsp;&nbsp;&nbsp;�����ö�:<?= $zongmaxcs ?>&nbsp;&nbsp;&nbsp;�������ö�:<?= $mumu ?>&nbsp;&nbsp;&nbsp;ʣ�����ö�:
                    <?= $maxcs ?>
                </td>
            </tr>
            <tr>
                <td height="20" align="right" class="t_edit_caption">����:</td>
                <td class="t_edit_td">�¼��߷ɹ���:
                    <? switch ($pzall) {
                        case "0":
                            echo "ȫ�鹫˾";
                            break;
                        case "1":
                            echo "ȫ���ɶ�";
                            break;
                        case "2":
                            echo "��������������";
                            break;
                        case "3":
                            echo "���¼�����ѡ��";
                            break;
                        default:
                            echo "ȫ�鹫˾";
                            break;
                    } ?>
                    &nbsp;&nbsp;&nbsp; ����ʣ�����:
                    <? if ($zc_auto == 0) { ?>
                        ����
                    <? } else { ?>
                        ��ֹ
                    <? } ?>
                    &nbsp;&nbsp;&nbsp;ʣ���������
                    <span id="gsmsg">
                        <? if ($pzall == 2 || $pzall == 3) { ?>
                            /�����߷�ʣ����
                        <? } ?>
                    </span>:
                    <? if ($zc_all == 0) { ?>
                        �鹫˾
                    <? } else { ?>
                        ���ɶ�
                    <? } ?>
                </td>
            </tr>
        </table>
    <? } ?>
    <form name="form1" onSubmit="return SubChk()" method="post" action="main.php?action=user_dai_add&uid=<?= $uid ?>&act=add&zong=<?= $zong ?>">

        <table width="800" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
            <tr>
                <td height="20" colspan="2" align="center" bgcolor="#FFFFFF" class="t_list_caption">���������趨
                </td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�ϼ��ܴ���:</td>
                <td height="30" bgcolor="#FFFFFF" class="t_edit_td"><input name="agent" type="hidden" id="agent" value="<? if ($zong != "") { ?><?= $zong ?><? } ?>" />
                    <select id="zong" name="zong" onChange="var jmpURL='main.php?action=user_dai_add&uid=<?= $uid ?>&zong='+this.options[this.selectedIndex].value ; if(jmpURL!='') {window.location=jmpURL;} else {this.selectedIndex=0 ;}">

                        <option value="">��ѡ���ϼ��˺�</option>
                        <? $result = $db1->query("select * from web_agent where lx=2  order by id desc");
                        while ($image = $result->fetch_array()) { ?>
                            <option value="<?= $image['kauser'] ?>" <? if ($zong == $image['kauser']) { ?>selected="selected" <? } ?>><?= $image['kauser'] ?>
                            </option>
                        <? } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�˺�:</td>
                <td height="30" bgcolor="#FFFFFF" class="t_edit_td">
                    <input name="username" type="text" class="inp1" id="username">&nbsp;
                    <input type="button" onClick="check_user();" value="����˺�" class="za_button" />&nbsp;�ʺű�������1����Ԫ�������12���֤��ֻ�����?0-9)����Ӣ��Сд��ĸ
                </td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">����:</td>
                <td height="30" bgcolor="#FFFFFF" class="t_edit_td">
                    <input name="pass" type="password" class="inp1" id="pass" />&nbsp;�����������6����Ԫ�������12����Ԫ������ֻ��������(0-9)����Ӣ�Ĵ�Сд��ĸ
                </td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">ȷ������:</td>
                <td bgcolor="#FFFFFF" class="t_edit_td">
                    <input name="pass2" type="password" class="inp1" id="pass2" />
                </td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">����:</td>
                <td bgcolor="#FFFFFF" class="t_edit_td">
                    <input name="xm" type="text" class="inp1" id="xm" />
                </td>
            </tr>
            <tr>
                <td height="17" colspan="2" align="right" bgcolor="#FFFFFF" class="t_list_caption">��ע�����趨</td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�����ö�:</td>
                <td bgcolor="#FFFFFF" class="t_edit_td">
                    <input name="cs" type="text" class="inp1" id="cs" onkeyup="value=value.replace(/[^\d\.\/]/ig,'')" value="0" />������ö��:
                    <?= $maxcs ?>

                    <input name="maxcs" type="hidden" id="maxcs" value="<?= $maxcs ?>" />
                </td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�̿�:</td>
                <td height="30" bgcolor="#FFFFFF" class="m_bc_ed">
                    <? if ($dagu != "") {
                        foreach ($abcd as $item) {
                    ?>
                            <input type="checkbox" name="kabcd[]" id="kabcd[]" value="<?= $item ?>" checked="checked" /><?= $item ?>
                    <?
                        }
                    } ?>
                </td>
            </tr>
            <? if ($pzall == 3) { ?>
                <tr>
                    <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�����¼��߷�:</td>
                    <td height="30" bgcolor="#FFFFFF" class="t_edit_td">
                        <select name="zc" id="zc">
                            <option value="0" selected="selected">��</option>
                            <option value="1">��</option>
                        </select>
                        <SPAN STYLE="color: rgb(255,0,0);"> �ܴ����Ƿ���ܸ��¼����߷�ע��</SPAN>
                    </td>
                </tr>
            <? } ?>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�߷�:</td>
                <td height="30" bgcolor="#FFFFFF" class="t_edit_td">
                    <input type="radio" name="rpz" id="rpz" value="0" checked="checked" />����
                    <input type="radio" name="rpz" id="rpz" value="1" onClick="StopPZ()" />��ֹ
                </td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">Ͷע:</td>
                <td height="30" bordercolor="#CCCCCC" bgcolor="#FFFFFF" class="t_edit_td"> <input type="radio" name="rty" id="rty" value="0" checked="checked" />����Ͷע
                    <input type="radio" name="rty" id="rty" value="1" onClick="StopTY()" />��ͣͶע
                </td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�ܴ���ռ����:</td>
                <td height="30" bordercolor="#CCCCCC" bgcolor="#FFFFFF" class="t_edit_td">
                    <select name="sj" id="sj" onchange=ChangeSelectorSJ()>
                        <? $bb = $istar;
                        for (; $bb <= $iend; $bb += 5) { ?>
                            <option value="<?= $bb ?>" ; <? if ($bb == $iend) { ?> selected="selected" <? } ?>>
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
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">����ռ����:</td>
                <td height="30" bordercolor="#CCCCCC" bgcolor="#FFFFFF" class="t_edit_td">
                    <select name="sf" id="sf" onchange=ChangeSelectorSF()>
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
                <td height="30" bordercolor="#CCCCCC" bgcolor="#FFFFFF" class="t_edit_td">
                    <input type="radio" name="rds" id="rds" value="0" checked="checked" />ȫ��
                    <input type="radio" name="rds" id="rds" value="1" />׬0.1"
                    <input type="radio" name="rds" id="rds" value="2" />׬0.5
                    <input type="radio" name="rds" id="rds" value="3" />׬1
                    <input type="radio" name="rds" id="rds" value="4" />׬1.5
                    <input type="radio" name="rds" id="rds" value="5" />׬2
                    <input type="radio" name="rds" id="rds" value="6" />׬2.5
                    <input type="radio" name="rds" id="rds" value="7" />ȫ����
                </td>
            </tr>
            <tr>
                <td height="30" colspan="2" align="center" bgcolor="#FFFFFF" class="">
                    <input type="submit" class="btn1" name="button" id="button" value="ȷ��" />
                </td>
            </tr>
        </table>
    </form>
    <iframe name="check_frame" src="" width="0" height="0" style="display:none"></iframe>
</body>