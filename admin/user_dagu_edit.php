<?php

if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
if (strpos($flag, "04")) {
} else {
    echo "<center>��û�и�Ȩ�޹���!</center>";
    exit;
}
$result = $db1->query("select * from web_agent where id=" . $_GET['id'] . " and lx=4 order by id LIMIT 1");
$row = $result->fetch_assoc();
if ($row == "") {
    exit;
}
$userid = $row['id'];
$username = $row['kauser'];
$xm = $row['xm'];
$cs = $row['cs'];
$gs_zc = $row['gs_zc'];
$dagu_zc = $row['dagu_zc'];
$stat = $row['stat'];
$pz = $row['pz'];
$ty = $row['ty'];
$report = $row['report'];
$zc_auto = $row['zc_auto'];
$zc_all = $row['zc_all'];
$pzall = $row['pzall'];
$online = $row['online'];
$zc = $row['zc'];
$maxcs = 888888888;
$mincs = 0;
$minzc = 0;
$minzc_user = "";
$istar = 0;
$iend = 100;
$result = $db1->query("SELECT kauser,guan_zc FROM web_agent WHERE dagu = '" . $username . "' AND lx=3 ORDER BY guan_zc DESC LIMIT 1");
$numzc1 = $result->fetch_array();
if ($numzc1 != "" && $minzc < $numzc1['guan_zc']) {
    $minzc = $numzc1['guan_zc'];
    $minzc_user = "�����ɶ��˺�:" . $numzc1['kauser'] . "ռ��" . $minzc . "%";
}
if ($zc_auto == 0) {
    $result = $db1->query("SELECT kauser,dagu_zc FROM web_member WHERE dagu = '" . $username . "' AND zs=4 ORDER BY dagu_zc DESC LIMIT 1");
    $numzc2 = $result->fetch_array();
    if ($numzc2 != "" && $minzc < $numzc2['dagu_zc']) {
        $minzc = $numzc2['dagu_zc'];
        $minzc_user = "ֱ����Ա�˺�:" . $numzc2['kauser'] . "�ֹ�˾ռ��" . $minzc . "%";
    }
}
$mumu = 0;
$result1 = $db1->query("select SUM(cs) As sum_m  From web_agent Where lx=3 and   dagu='" . $username . "' order by id desc");
$rsw = $result1->fetch_array();
if ($rsw[0] != "") {
    $mumu = $rsw[0];
}
$result1 = $db1->query("select SUM(cs) As sum_m  From web_member Where zs=4 and   dagu='" . $username . "' order by id desc");
$rsw = $result1->fetch_array();
if ($rsw[0] != "") {
    $mumu += $rsw[0];
}
$mincs += $mumu;
if ($_GET['act'] == "edit") {
    $pass = $_POST['pass'];
    if ($pass != "") {
        chk_pwd($pass);
        $pass = md5($pass);
        $sql = "update  web_agent set uid='',adddate='" . $utime . "',kapassword='" . $pass . "' where id='" . $userid . "' order by id desc";
        if (!$db1->query($sql)) {
            exit("���ݿ��޸ĳ���");
        }
    }
    $xm = isset($_POST['xm']) ? safe_convert($_POST['xm']) : $username;
    $cs = isset($_POST['cs']) ? intval($_POST['cs']) : 0;
    $ts = $cs - $mincs;
    $sj = isset($_POST['sj']) ? intval($_POST['sj']) : $iend;
    $sf = isset($_POST['sf']) ? intval($_POST['sf']) : 0;
    if ($_POST['rstat'] == 1) {
        $stat = 1;
    } else {
        $stat = 0;
    }
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
    if ($maxcs < $cs) {
        echo "<script>alert('�����ö��������ö�!');window.history.go(-1);</script>";
        exit;
    }
    if ($cs < $mincs) {
        echo "<script>alert('�����ö�ܵ����������ö�:" . $mincs . "!');window.history.go(-1);</script>";
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
    if ($sf < $minzc) {
        echo "<script>alert('�ֹ�˾���ռ�ɲ��ܵ���" . $minzc_user . "');window.history.go(-1);</script>";
        exit;
    }
    if ($iend < $sj + $sf) {
        echo "<script>alert('��˾�����ӷֹ�˾�������ܳ���" . $iend . "%��!');window.history.go(-1);</script>";
        exit;
    }
    $sql = "update  web_agent set uid='',xm='" . $xm . "',cs='" . $cs . "',ts='" . $ts . "',adddate='" . $utime . "',dagu_zc='" . $sf . "',gs_zc='" . $sj . "',pz='" . $pz . "',zc='" . $zc . "',stat='" . $stat . "',ty='" . $ty . "',pzall='" . $pzall . "',online='" . $online . "',report='" . $report . "' where id='" . $userid . "'  order by id desc";
    if (!$db1->query($sql)) {
        exit("���ݿ��޸ĳ���");
    }
    if ($_POST['sj'] != $gs_zc || $_POST['sf'] != $dagu_zc) {
        $str1 = "�ֹ�˾ռ���޸�<br>�޸�ǰ��˾ռ��:" . $gs_zc . "%,�ֹ�˾ռ��:" . $dagu_zc . "%";
        $str2 = "�ֹ�˾ռ���޸�<br>�޸ĺ�˾ռ��:" . $_POST['sj'] . "%,�ֹ�˾ռ��:" . $_POST['sf'] . "%";
        $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $jxadmin . "',kauser='" . $username . "',lx=2,text1='" . $str1 . "',text2='" . $str2 . "',ip='" . $userip . "'";
        $db1->query($sql);
        if ($zc_all == 0) {
            if ($zc_auto == 1) {
                $db1->query("update web_member set uid='',dagu_zc=" . $sf . ",gs_zc=" . $sj . "  where zs=4 and dagu='" . $username . "'");
                $db1->query("update web_agent set uid='',gs_zc=" . $sj . ",dagu_zc=100-gs_zc-guan_zc-zong_zc-dai_zc  where dagu='" . $username . "'");
                $db1->query("update web_member set uid='',dagu_zc=" . $sf . "-guan_zc-zong_zc-dai_zc,gs_zc=" . $sj . "  where zs!=4 and dagu='" . $username . "'");
            } else {
                $result = $db1->query("select * from web_agent where lx=3 and dagu='" . $username . "' and dagu_zc+guan_zc>" . $sf);
                $cou = mysql_num_rows($result);
                while ($cou != 0 && ($image = mysql_fetch_array($result))) {
                    $guan_zc_temp = $image['guan_zc'];
                    $guan_name_temp = $image['kauser'];
                    $db1->query("update web_agent set uid='',dagu_zc=" . $sf . "-guan_zc,gs_zc=100-dagu_zc-guan_zc  where lx=3 and kauser='" . $guan_name_temp . "'");
                    $db1->query("update web_agent set uid='',dagu_zc=" . $sf . "-" . $guan_zc_temp . ",gs_zc=100-dagu_zc-guan_zc-zong_zc-dai_zc  where lx<3 and guan='" . $guan_name_temp . "' and dagu='" . $username . "'");
                    $db1->query("update web_member set uid='',dagu_zc=" . $sf . "-" . $guan_zc_temp . ",gs_zc=100-dagu_zc-guan_zc-zong_zc-dai_zc  where zs!=4 and guan='" . $guan_name_temp . "' and dagu='" . $username . "'");
                }
            }
        } else {
            $db1->query("update web_agent set uid='',gs_zc=" . $sj . ",dagu_zc=100-gs_zc-guan_zc-zong_zc-dai_zc  where dagu='" . $username . "'");
            $db1->query("update web_member set uid='',gs_zc=" . $sj . ",dagu_zc=100-gs_zc-guan_zc-zong_zc-dai_zc  where zs!=4 and dagu='" . $username . "'");
            if ($zc_auto == 1) {
                $db1->query("update web_member set uid='',dagu_zc=" . $sf . ",gs_zc=" . $sj . "  where zs=4 and dagu='" . $username . "'");
            }
        }
    }
    del_online($username, 0);
    echo "<script>alert('�޸ĳɹ�!');window.location.href='main.php?action=user_dagu_edit&uid=" . $uid . "&id=" . $userid . "';</script>";
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
    if (isNaN($("cs").value)) { alert('�����ö��ֻ����������'); $("cs").focus(""); return false;}
    if ($("cs").value > eval($("maxcs").value)) { $("cs").focus(); alert("���ö�Ȳ��ܴ���������ö��!!!"); return false; }
    if ($("cs").value < eval($("mincs").value)) { $("cs").focus(); alert("���ö�Ȳ���С���������ö��!!!"); return false; }
    if (!confirm("�Ƿ�ȷ���޸ķֹ�˾?")) { return false; }}
</script>

<script>
function ChangeSelectorSJ() { $("sf").value = "<?=$iend?>" - $("sj").value; }
    function ChangeSelectorSF() {
        $("sj").value = "<?=$iend?>"-$("sf").value;}
        function StopPZ() { alert("���˺ż������������̽��ر��߷ɷ���!!!"); } function StopTY() { alert("���˺ż���������Ա����ͣͶע����!!!"); }
        function CkZC(ckid) { if (ckid == 1) { $("zctr").style.display = 'none'; } else { $("zctr").style.display = ''; } }
        function Ckpzall(ckid) {
            if (ckid == 1) {
                $("gsmsg").innerHTML = "/�����߷�ʣ����";
            } else {
                $("gsmsg").innerHTML = "";
            }
        }
</script>
<body style="min-width: 1200px;width: 100%">
<div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;�ֹ�˾����</span><span class="font_b">�޸ķֹ�˾&nbsp;</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright">   
      <input name="button" type="button" class="btn5" onmouseover="this.className='btn5m'" onmouseout="this.className='btn5'" onclick="history.go(-1)" value="����һҳ">
</div></div> 
    <form action="main.php?action=user_dagu_edit&uid=<?=$uid?>&act=edit&id=<?=$_GET['id']?>" method="post" name="form1" id="form1" onSubmit="return SubChk()">
        <table width="800"border="0" align="center" cellpadding="0" cellspacing="1" class="t_list bet">
            <tr>
                <td height="20" colspan="4" align="center" bgcolor="#FFFFFF" class="t_list_caption">���������趨</td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�˺�:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <?=$username?>
                </td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">����:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td"><input name="pass" type="password"
                        class="inp1" id="pass" />(���벻�޸�������)
                </td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">ȷ������:</td>
                <td colspan="3" nowrap="nowrap" bgcolor="#FFFFFF" class="t_edit_td">
                    <input name="pass2" type="password" class="inp1" id="pass2" />
                </td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">����:</td>
                <td colspan="3" nowrap="nowrap" bgcolor="#FFFFFF" class="t_edit_td">
                    <input name="xm" type="text" class="inp1" id="xm" value="<?=$xm?>" />
                </td>
            </tr>

            <tr>
                <td height="17" colspan="4" align="right" bgcolor="#FFFFFF" class="t_list_caption">��ע�����趨</td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�����ö�:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td"><input name="cs" type="text"
                        class="inp1" id="cs" onkeyup="value=value.replace(/[^\d\.\/]/ig,'')"
                        value="<?=$row['cs']?>" />������ö��:
                    <?=$maxcs?>

                    <input name="maxcs" type="hidden" id="maxcs" value="<?=$maxcs?>" />&nbsp;&nbsp;(�������ö��:<?=$mincs?> />&nbsp;&nbsp;ʣ�����ö��:<?=$row['cs']-$mincs?>)
                </td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�˺�״��:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <input type="radio" name="rstat" id="rstat" value="0" <? if ($stat==0) {?>
                    checked="checked"
                  <?  }?>
                    />����<input type="radio" name="rstat" id="rstat" value="1" <?if ($stat==1) {?>
                    checked="checked"
                    <?}?>
                    />ͣ��
                </td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�߷�:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <input type="radio" name="rpz" id="rpz" value="0" <?if ($pz==0) {?>
                    checked="checked"
                    <?}?>
                    onClick="CkZC(0)"/>����<input type="radio" name="rpz" id="rpz" value="1" <?if ($pz==1) {?>
                    checked="checked"
                    <?}?>
                    onClick="StopPZ();CkZC(1);"/>��ֹ
                </td>
            </tr>
            <tr id='zctr' <?if ($pz==1) {?>
                style="display:none"
                <?}?>
                >
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�ֹ�˾�߷ɵ�������:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <input type="radio" name="rzc" id="rzc" value="0" <?if ($zc==0) {?>
                    checked="checked"
                    <?}?>
                    />����<input type="radio" name="rzc" id="rzc" value="1" <?if ($zc==1) {?>
                    checked="checked"
                    <?}?>
                    />��ֹ&nbsp;&nbsp;

                    <font color="gray">���÷ֹ�˾ȫ�߿����߷�ʱ,��˾���Ե������Ʒֹ�˾�߷ɹ���</font>
                </td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">Ͷע:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <input type="radio" name="rty" id="rty" value="0" <? if ($ty==0) {?>
                    checked="checked"
                    <?}?>
                    />����Ͷע<input type="radio" name="rty" id="rty" value="1" <?if ($ty==1) {?>
                    checked="checked"
                    <?}?>
                    onClick="StopTY()" />��ͣͶע
                </td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">
                    <span class="STYLE4">��˾ռ����:</span>
                </td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <select name="sj" id="sj" onchange=ChangeSelectorSJ()>
                        <? $bb = $istar;
for (; $bb <= $iend - $minzc; $bb += 5) {?>
                        <option value="<?=$bb?>" <? if ($gs_zc==$bb) {?>
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
                </td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">
                    <span class="STYLE4">�ֹ�˾ռ</span>����
                </td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <select name="sf" id="sf" onchange=ChangeSelectorSF()>
                        <? $bb = $minzc;
for (; $bb <= $iend; $bb += 5) {?>
                        <option value="<?=$bb?>" <? if ($dagu_zc==$bb) {?>
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
                </td>
            </tr>


            <tr>
                <td height="17" colspan="4" align="right" bgcolor="#FFFFFF" class="t_list_caption">�û�����</td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">����ͳ��:</td>
                <td colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <input type="radio" name="ronline" id="ronline" value="0" <? if($online==0) {?>
                    checked="checked"
                  <?  }?>/>������鿴<input type="radio" name="ronline" id="ronline" value="1" <? if ($online==1) {?>
                    checked="checked"
                    <?}?>
                    />����鿴
                </td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">������ʾ:</td>
                <td colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <input type="radio" name="rreport" id="rreport" value="0" <?if ($report==0) {?>
                    checked="checked"
                    <?}?>
                    />��ʾ�ֹ�˾����<input type="radio" name="rreport" id="rreport" value="1" <?if ($report==1) {?>
                    checked="checked"
                    <?}?>
                    />��ʾ�ܹ�˾
                </td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�¼��߷ɹ���:</td>
                <td colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <input type="radio" name="rpzall" id="rpzall" value="0" onClick="Ckpzall(0)"
<?if ($pzall == 0) {?>
    checked="checked" <?}?>/>ȫ�鹫˾<input type="radio" name="rpzall" id="rpzall" value="1" onClick="Ckpzall(0)" 
<?if ($pzall == 1) {?>
    checked="checked" <?}?>
                    />ȫ��ֹ�˾<input type="radio" name="rpzall" id="rpzall" value="2" onClick="Ckpzall(1)" 
<?if ($pzall == 2) {?>
    checked="checked" <?}?>
                    />��������������<input type="radio" name="rpzall" id="rpzall" value="3" onClick="Ckpzall(1)" 
<?if ($pzall == 3) {?>
    checked="checked" <?}?>
                    />���¼�����ѡ��
                </td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">����ʣ�����:</td>
                <td colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <? if ($zc_auto == 0) {?>
                    ����
                    <?} else {?>
                    ��ֹ
                    <?}?>
                </td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">ʣ���������
                    <span id="gsmsg">
                        <? if ($pzall == 2 || $pzall == 3) {?>
                        /�����߷�ʣ����
                        <?}?>
                    </span>:
                </td>
                <td colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <? if ($zc_all == 0) {?>
                    �鹫˾
                    <?} else {?>
                    ��ֹ�˾
                    <?}?>
                </td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">����¼ʱ��:</td>
                <td width="32%" height="30" bgcolor="#FFFFFF">
                    <?=$row['zlogin']?>
                </td>

                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption" >����¼IP:</td>
                <td width="36%" height="30" bgcolor="#FFFFFF"><?=$row['zip']?>
                </td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�������ϸ���ʱ��:</td>
                <td height="30" bgcolor="#FFFFFF"><?=$row['adddate']?>
                </td>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">��¼����:</td>

                <td height="30" bgcolor="#FFFFFF"><?=$row['look']?>��
                </td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">����ʱ��:</td>
                <td height="30" bgcolor="#FFFFFF"><?=$row['slogin']?>
                </td>

                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�˺������:</td>
                <td height="30" bgcolor="#FFFFFF"><?=$row['adduser']?>
                </td>
            </tr>
            <tr>
                <td height="30" colspan="4" align="center" bgcolor="#FFFFFF" >
                    <input type="submit" class="btn1" name="button" id="button" value="ȷ��" />
                </td>
            </tr>
        </table>
    </form>
</body>