<?php

if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
if (strpos($flag, "08")) {
} else {
    echo "<center>��û�и�Ȩ�޹���!</center>";
    exit;
}
$result = $db1->query("select * from web_member where id=" . $_GET['id'] . " and zs>1 order by id LIMIT 1");
$row = $result->fetch_assoc();
if ($row == "") {
    exit;
}
$userid = $row['id'];
$username = $row['kauser'];
$xm = $row['xm'];
$xy = $row['xy'];
$abcd = $row['abcd'];
$cs = $row['cs'];
$ts = $row['ts'];
$mincs = $cs - $ts;
$stat = $row['stat'];
$ty = $row['ty'];
$lx = $row['zs'];
$dagu = $row['dagu'];
$guan = $row['guan'];
$zong = $row['zong'];
$dai = $row['dai'];
$maxcs = 0;
$istar = 0;
$iend = 100;
if ($dai != "") {
    $result = $db1->query("select * from web_agent where kauser='" . $dai . "' and lx=" . $lx . " order by id LIMIT 1");
    $rows = $result->fetch_assoc();
    if ($rows == "") {
        exit;
    }
    $maxcs = $rows['cs'];
    $daimaxcs = $rows['cs'];
    switch ($lx) {
        case "4":
            $zslx = "dagu";
            $zslabel = "��ɶ�ֱ��";
            $daimaxzc = $rows['dagu_zc'];
            $iend = $rows['dagu_zc'];
            $dai_zc = $row['dagu_zc'];
            $zc_auto = $rows['zc_auto'];
            $zc_all = $rows['zc_all'];
            break;
        case "3":
            $zslx = "guan";
            $zslabel = "�ɶ�ֱ��";
            $daimaxzc = $rows['guan_zc'];
            $iend = $rows['guan_zc'];
            $dai_zc = $row['guan_zc'];
            break;
        case "2":
            $zslx = "zong";
            $zslabel = "�ܴ���ֱ��";
            $daimaxzc = $rows['zong_zc'];
            $iend = $rows['zong_zc'];
            $dai_zc = $row['zong_zc'];
            break;
        default:
            break;
    }
    $mumu = 0;
    $result1 = $db1->query("select SUM(cs) As sum_m  From web_agent Where lx=" . ($lx - 1) . " and   " . $zslx . "='" . $dai . "' order by id desc");
    $rsw = $result1->fetch_array();
    if ($rsw[0] != "") {
        $mumu = $rsw[0];
    }
    $result1 = $db1->query("select SUM(cs) As sum_m  From web_member Where zs=" . $lx . " and   dai='" . $dai . "' order by id desc");
    $rsw = $result1->fetch_array();
    if ($rsw[0] != "") {
        $mumu += $rsw[0];
    }
    $maxcs = $maxcs - $mumu + $cs;
}
if ($lx == 3 || $lx == 2) {
    $result1 = $db1->query("select * from web_agent where kauser='" . $dagu . "' and lx=4 order by id");
    $rows = $result1->fetch_assoc();
    if ($rows == "") {
        exit;
    }
    $zc_auto = $rows['zc_auto'];
    $zc_all = $rows['zc_all'];
}
if ($_GET['act'] == "edit") {
    $pass = $_POST['pass'];
    if ($pass != "") {
        chk_pwd($pass);
        $pass = md5($pass);
        $sql = "update  web_member set uid='',adddate='" . $utime . "',kapassword='" . $pass . "' where id='" . $userid . "' order by id desc";
        if (!$db1->query($sql)) {
            exit("���ݿ��޸ĳ���");
        }
    }
    $xm = isset($_POST['xm']) ? safe_convert($_POST['xm']) : $username;
    $cs = isset($_POST['cs']) ? intval($_POST['cs']) : 0;
    if ($_POST['rstat'] == 1) {
        $stat = 1;
    } else {
        $stat = 0;
    }
    if ($_POST['rty'] == 1) {
        $ty = 1;
    } else {
        $ty = 0;
    }
    $xy = isset($_POST['xy']) ? intval($_POST['xy']) : 1;
    $abcd = $_POST['abcd'];
    switch ($abcd) {
        case "A":
            $abcd = "A";
            break;
        case "B":
            $abcd = "B";
            break;
        case "C":
            $abcd = "C";
            break;
        case "D":
            $abcd = "D";
            break;
        default:
            $abcd = "A";
            break;
    }
    if (empty($_POST['xy'])) {
        echo "<script>alert('��ע���Ͷע���Ϊ��!'); window.history.go(-1);</script>";
        exit;
    }
    if ($maxcs < $_POST['cs']) {
        echo "<script>alert('�����ö��������ö�!');window.history.go(-1);</script>";
        exit;
    }
    if ($zc_auto == 0 && $dai_zc != $_POST['sj']) {
        $str1 = "ֱ����Առ���޸�<br>�޸�ǰ�ϼ�ռ��:" . $dai_zc . "%";
        $str2 = "ֱ����Առ���޸�<br>�޸ĺ��ϼ�ռ��:" . $_POST['sj'] . "%";
        $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $jxadmin . "',kauser='" . $username . "',lx=2,text1='" . $str1 . "',text2='" . $str2 . "',ip='" . $userip . "'";
        $db1->query($sql);
    }
    if ($zc_auto == 0) {
        $dai_zc = isset($_POST['sj']) ? intval($_POST['sj']) : $iend;
        if ($zc_all == 0) {
            switch ($lx) {
                case "4":
                    $sql = "update web_member  set uid='',xm='" . $xm . "',cs='" . $cs . "',ts=" . ($cs - $mincs) . ",adddate='" . $utime . "',stat='" . $stat . "',ty='" . $ty . "',xy='" . $xy . "',abcd='" . $abcd . "',dagu_zc='" . $dai_zc . "',gs_zc=100-dagu_zc-guan_zc-zong_zc-dai_zc  where kauser='" . $username . "'";
                    break;
                case "3":
                    $sql = "update web_member  set uid='',xm='" . $xm . "',cs='" . $cs . "',ts=" . ($cs - $mincs) . ",adddate='" . $utime . "',stat='" . $stat . "',ty='" . $ty . "',xy='" . $xy . "',abcd='" . $abcd . "',guan_zc='" . $dai_zc . "',gs_zc=100-dagu_zc-guan_zc-zong_zc-dai_zc  where kauser='" . $username . "'";
                    break;
                case "2":
                    $sql = "update web_member  set uid='',xm='" . $xm . "',cs='" . $cs . "',ts=" . ($cs - $mincs) . ",adddate='" . $utime . "',stat='" . $stat . "',ty='" . $ty . "',xy='" . $xy . "',abcd='" . $abcd . "',zong_zc='" . $dai_zc . "',gs_zc=100-dagu_zc-guan_zc-zong_zc-dai_zc  where kauser='" . $username . "'";
                    break;
                default:
                    break;
            }
        } else {
            switch ($lx) {
                case "4":
                    $sql = "update web_member  set uid='',xm='" . $xm . "',cs='" . $cs . "',ts=" . ($cs - $mincs) . ",adddate='" . $utime . "',stat='" . $stat . "',ty='" . $ty . "',xy='" . $xy . "',abcd='" . $abcd . "',dagu_zc=100-gs_zc-guan_zc-zong_zc-dai_zc  where kauser='" . $username . "'";
                    break;
                case "3":
                    $sql = "update web_member  set uid='',xm='" . $xm . "',cs='" . $cs . "',ts=" . ($cs - $mincs) . ",adddate='" . $utime . "',stat='" . $stat . "',ty='" . $ty . "',xy='" . $xy . "',abcd='" . $abcd . "',guan_zc='" . $dai_zc . "',dagu_zc=100-gs_zc-guan_zc-zong_zc-dai_zc  where kauser='" . $username . "'";
                    break;
                case "2":
                    $sql = "update web_member  set uid='',xm='" . $xm . "',cs='" . $cs . "',ts=" . ($cs - $mincs) . ",adddate='" . $utime . "',stat='" . $stat . "',ty='" . $ty . "',xy='" . $xy . "',abcd='" . $abcd . "',zong_zc='" . $dai_zc . "',dagu_zc=100-gs_zc-guan_zc-zong_zc-dai_zc  where kauser='" . $username . "'";
                    break;
                default:
                    break;
            }
        }
    } else {
        $sql = "update web_member  set uid='',xm='" . $xm . "',cs='" . $cs . "',ts=" . ($cs - $mincs) . ",adddate='" . $utime . "',stat='" . $stat . "',ty='" . $ty . "',xy='" . $xy . "',abcd='" . $abcd . "' where kauser='" . $username . "'";
    }
    if (!$db1->query($sql)) {
        exit("���ݿ��޸ĳ���");
    }
    echo "<script>alert('�޸ĳɹ�!'); window.location.href = 'main.php?action=user_mem_zs_list&uid=" . $uid . "';</script>";
    exit;
}?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<script src="js/function.js" type="text/javascript"></script>
<script>
    function SubChk() {
        if ($("pass").value != '' && $("pass2").value == '') { $("pass2").focus(); alert("������ȷ������!!!"); return false; }
        if ($("pass").value != $("pass2").value) { $("pass2").focus(); alert("ȷ�����������벻һ��!!!"); return false; }
        if ($("xm").value == '') { $("xm").focus(); alert("����������!!!"); return false; }
        if ($("cs").value == '') { $("cs").focus(); alert("�����������ö��!!!"); return false; }
        if (isNaN($("cs").value)) { alert('�����ö��ֻ����������'); $("cs").focus(); return false; }
        if ($("cs").value > eval($("maxcs").value)) { $("cs").focus(); alert("���ö�Ȳ��ܴ���������ö��!!!"); return false; }
        if ($("cs").value < eval($("mincs").value)) { $("cs").focus(); alert("���ö�Ȳ���С���������ö��!!!"); return false; }
        if ($("xy").value == '') { $("xy").focus(); alert("�����뵥ע���Ͷע��!!!"); return false; }
        if (isNaN($("xy").value)) { alert('��ע���Ͷע��ֻ����������'); $("xy").focus(); return false; }
        if (!confirm("�Ƿ�ȷ���޸�ֱ����Ա?")) { return false; }
    }
    function StopTY() { alert("��ֱ����Ա����ͣͶע����!!!"); }
</script>
<body style="min-width: 1200px;width: 100%">
<div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;ֱ����Ա����</span><span class="font_b">�޸�ֱ����Ա&nbsp;</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright">   
      <input name="button" type="button" class="btn5" onmouseover="this.className='btn5m'" onmouseout="this.className='btn5'" onclick="history.go(-1)" value="����һҳ">
</div></div>
    <? if ($dai != "") {?>
    <br>
     <table width="800"border="0" align="center" cellpadding="0" cellspacing="1" class="t_list bet">
        <tr>
            <td height="20" colspan="2" class="t_list_caption">�ϼ�(
                <?=$dai?>)���ϼ���
            </td>
        </tr>
        <tr>
            <td width="16%" height="20" align="right" class="t_edit_caption">��ע:</td>
            <td class="t_edit_td">����ռ����:<?=$daimaxzc?>%&nbsp;&nbsp;&nbsp;�����ö�:<?=$daimaxcs?>&nbsp;&nbsp;&nbsp;�������ö�:<?=$mumu?>&nbsp;&nbsp;&nbsp;ʣ�����ö�:
                <?=$daimaxcs -$mumu?>
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
    }?>
                &nbsp;&nbsp;&nbsp;����ʣ�����:
                <? if ($zc_auto == 0) {?>
                ����
                <?} else {?>
                ��ֹ
                <?}?>
                &nbsp;&nbsp;&nbsp;ʣ���������";
                <span id="gsmsg">
                    <? if ($pzall == 2 || $pzall == 3) {?>
                    /�����߷�ʣ����";
                    <?}?>
                </span>:
                <? if ($zc_all == 0) {?>
                �鹫˾
                <?} else {?>
                ���ɶ�
                <?}?>
    </td></tr></table>
<?}?>
                <form name="form1" onSubmit="return SubChk()" method="post"
                    action="main.php?action=user_mem_zs_edit&uid=<?=$uid?>&act=edit&id=<?=$userid?>">

                    <table width="800"border="0" align="center" cellpadding="0" cellspacing="1" class="t_list bet">
                        <tr>
                            <td height="20" colspan="4" align="right" bgcolor="#FFFFFF" class="t_list_caption">���������趨</td>
                        </tr>
                        <tr>
                            <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�ϼ�:</td>
                            <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                                <?=$dai?>&nbsp;&nbsp;&nbsp;&nbsp;ֱ������:<?=$zslabel?>
                            </td>
                        </tr>

                        <tr>
                            <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�˺�:</td>
                            <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td"><?=$username?></td>
                        </tr>

                        <tr>
                            <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">����:</td>
                            <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td"><input name="pass" type="password" class="inp1" id="pass" />
                                (���벻�޸�������)&nbsp;&nbsp;�����������6����Ԫ�������12����Ԫ������ֻ��������(0-9)����Ӣ�Ĵ�Сд��ĸ </td>
                        </tr>
                        <tr>
                            <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">ȷ������:</td>
                            <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td"><input name="pass2" type="password" class="inp1" id="pass2" /></td>
                        </tr>
                        <tr>
                            <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">����:</td>
                            <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td"><input name="xm" type="text" class="inp1" id="xm" value="<?=$xm?>" /></td>
                        </tr>
                        <tr>
                            <td height="17" colspan="4" align="right" bgcolor="#FFFFFF" class="t_list_caption">��ע�����趨</td>
                        </tr>
                        <tr>
                            <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�����ö�:</td>
                            <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td"><input name="cs" type="text"
                                    class="inp1" id="cs" onkeyup="value=value.replace(/[^\d\.\/]/ig,'')" value="<?=$cs?>" />������ö��:
                                <?=$maxcs?>
                                <input name="maxcs" type="hidden" id="maxcs" value="<?=$maxcs?>" />&nbsp;(�������ö��:<?=$mincs?>
                                <input name="mincs" type="hidden" id="mincs" value="<?=$mincs?>" />&nbsp;&nbsp;(ʣ�����ö��: <?=$cs -$mincs?> )
                            </td>
                        </tr>
                        <tr>
                            <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�̿�:</td>
                            <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                                <select name="abcd" id="abcd">
                                    <option value="A" <?if ($abcd=="A" ) {?>selected="selected"<?}?>>A��</option>
                                    <option value="B" <?if ($abcd=="B" ) {?>selected="selected"<?}?>>B��</option>
                                    <option value="C" <?if ($abcd=="C" ) {?>selected="selected"<?}?>>C��</option>
                                    <option value="D" <?if ($abcd=="D" ) {?>selected="selected"<?}?>>D��</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="16%" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�˺�״��:</td>
                            <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td"><input type="radio"
                                    name="rstat" id="rstat" value="0" <? if ($stat==0) {?>checked="checked"
                                <?}?>
                                />����<input type="radio" name="rstat" id="rstat" value="1" <?if ($stat==1) {?>
                                checked="checked"
                                <?}?>
                                />ͣ��
                            </td>
                        </tr>

                        <tr>
                            <td width="16%" align="right" bgcolor="#FFFFFF" class="t_edit_caption">Ͷע:</td>
                            <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                                <input type="radio" name="rty" id="rty" value="0" <? if ($ty==0) {?>
                                checked="checked"
                                <?}?>
                                />����Ͷע<input type="radio" name="rty" id="rty" value="1" <? if ($ty==1) {?>
                                checked="checked"
                                <?}?>
                                onClick="StopTY()"/>��ͣͶע
                            </td>
                        </tr>
                        <tr>
                            <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">��ע���Ͷע��:</td>
                            <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td"><input name="xy" type="text"
                                    class="inp1" id="xy" onkeyup="value=value.replace(/[^\d\.\/]/ig,'')" value="<?=$xy?>" size="10" /></td>
                        </tr>
                        <tr>
                            <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�ϼ�ռ��:</td>
                            <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                                <? if ($zc_auto == 0) {?>
                                <select class="za_select_02" name="sj" id="zc">
                                    <? $bb = $istar;
    for (; $bb <= $iend; $bb += 5) {?>
                                    <option value="<?=$bb?>" <? if ($bb==$dai_zc) {?>
                                        selected="selected"
                                        <?}?>
                                        >
                                        <? switch ($bb) {
            case 0:
                print "��ռ��";
                break;
            default:
                print $bb . "%";
                break;
        }?>
                                    </option>
                                    <?}?>
                                </select>
                                <?} else {?>
                                <?=$dai_zc?> . "%"
                                <?}?>
                            </td>
                        </tr>
                        <tr>
                            <td width="16%" height="17" align="right" bgcolor="#FFFFFF" class="t_edit_caption">����¼ʱ��:</td>
                            <td width="33%" height="17" bgcolor="#FFFFFF">
                                <?=$row['zlogin']?>
                            </td>
                            <td width="17%" height="17" align="right" bgcolor="#FFFFFF" class="t_edit_caption">����¼IP:</td>
                            <td width="34%" height="17" bgcolor="#FFFFFF">
                                <?=$row['zip']?>
                            </td>
                        </tr>
                        <tr>
                            <td width="16%" height="17" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�������ϸ���ʱ��:</td>
                            <td width="33%" height="17" bgcolor="#FFFFFF">
                                <?=$row['adddate']?>
                            </td>
                            <td width="17%" height="17" align="right" bgcolor="#FFFFFF" class="t_edit_caption">��¼����:</td>
                            <td width="34%" height="17" bgcolor="#FFFFFF">
                                <?=$row['look']?>��
                            </td>
                        </tr>
                        <tr>
                            <td width="16%" height="17" align="right" bgcolor="#FFFFFF" class="t_edit_caption">����ʱ��:</td>
                            <td width="33%" height="17" bgcolor="#FFFFFF">
                                <?=$row['slogin']?>
                            </td>
                            <td width="17%" height="17" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�˺������:</td>
                            <td width="34%" height="17" bgcolor="#FFFFFF">
                                <?=$row['adduser']?>
                            </td>
                        </tr>
                        <tr>
                            <td height="30" colspan="4" align="center" bgcolor="#FFFFFF" class="m_bc_ed">
                                <input type="submit" class="btn1" name="Submit" value="ȷ��" />
                            </td>
                        </tr>
                    </table>
                </form>
</body>