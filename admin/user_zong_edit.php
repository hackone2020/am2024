<?php

if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
if (strpos($flag, "06")) {
} else {
    echo "<center>��û�и�Ȩ�޹���!</center>";
    exit;
}
$result = $db1->query("select * from web_agent where id=" . $_GET['id'] . " and lx=2 order by id LIMIT 1");
$row = $result->fetch_assoc();
if ($row == "") {
    exit;
}
$userid = $row['id'];
$username = $row['kauser'];
$xm = $row['xm'];
$cs = $row['cs'];
$dagu = $row['dagu'];
$guan = $row['guan'];
$dagu_zc = $row['dagu_zc'];
$guan_zc = $row['guan_zc'];
$zong_zc = $row['zong_zc'];
$stat = $row['stat'];
$pz = $row['pz'];
$ty = $row['ty'];
$zc = $row['zc'];
$minzc_user = "";
$minzc = 0;
$istar = 0;
$mincs = 0;
if ($dagu != "") {
    $result1 = $db1->query("select * from web_agent where kauser='" . $dagu . "' and lx=4 order by id LIMIT 1");
    $rows = $result1->fetch_assoc();
    if ($rows == "") {
        exit;
    }
    $report = $rows['report'];
    $zc_auto = $rows['zc_auto'];
    $zc_all = $rows['zc_all'];
    $pzall = $rows['pzall'];
}
if ($guan != "") {
    $result1 = $db1->query("select * from web_agent where kauser='" . $guan . "' and lx=3 order by id LIMIT 1");
    $rows = $result1->fetch_assoc();
    if ($rows == "") {
        exit;
    }
    $maxcs = $rows['cs'];
    $guanmaxcs = $rows['cs'];
    $guanmaxzc = $rows['guan_zc'];
    $gs_zc = $rows['gs_zc'];
    $dagu_zc = $rows['dagu_zc'];
    $iend = $rows['guan_zc'];
    $mumu = 0;
    $result1 = $db1->query("select SUM(cs) As sum_m  From web_agent Where lx=2 and   guan='" . $guan . "' order by id desc");
    $rsw = $result1->fetch_array();
    if ($rsw[0] != "") {
        $mumu = $rsw[0];
    }
    $result1 = $db1->query("select SUM(cs) As sum_m  From web_member Where zs=3 and   guan='" . $guan . "' order by id desc");
    $rsw = $result1->fetch_array();
    if ($rsw[0] != "") {
        $mumu += $rsw[0];
    }
    $mumuguan = $mumu;
    $maxcs = $maxcs - $mumu + $cs;
}
$result = $db1->query("SELECT kauser,dai_zc FROM web_agent WHERE zong = '" . $username . "' AND lx=1 ORDER BY dai_zc DESC LIMIT 1");
$numzc1 = $result->fetch_array();
if ($numzc1 != "" && $minzc < $numzc1['dai_zc']) {
    $minzc = $numzc1['dai_zc'];
    $minzc_user = "���������˺�:" . $numzc1['kauser'] . "ռ��" . $minzc . "%";
}
if ($zc_auto == 0) {
    $result = $db1->query("SELECT kauser,zong_zc FROM web_member WHERE zong = '" . $username . "' AND zs=2 ORDER BY zong_zc DESC LIMIT 1");
    $numzc2 = $result->fetch_array();
    if ($numzc2 != "" && $minzc < $numzc2['zong_zc']) {
        $minzc = $numzc2['zong_zc'];
        $minzc_user = "ֱ����Ա�˺�:" . $numzc2['kauser'] . "�ܴ���ռ��" . $minzc . "%";
    }
}
$mumu = 0;
$result1 = $db1->query("select SUM(cs) As sum_m  From web_agent Where lx=1 and   zong='" . $username . "' order by id desc");
$rsw = $result1->fetch_array();
if ($rsw[0] != "") {
    $mumu = $rsw[0];
}
$result1 = $db1->query("select SUM(cs) As sum_m  From web_member Where zs=2 and   zong='" . $username . "' order by id desc");
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
        echo "<script>alert('�ܴ������ռ�ɲ��ܵ���" . $minzc_user . "');window.history.go(-1);</script>";
        exit;
    }
    if ($zc_auto == 0) {
        if ($zc_all == 0) {
            $gs_zc = 100 - $dagu_zc - $sj - $sf;
        } else {
            $dagu_zc = 100 - $gs_zc - $sj - $sf;
        }
    } else {
        if ($sj + $sf != $iend) {
            echo "<script>alert('�Բ���,����ȷ����ռ��!'); window.history.go(-1);</script>";
            exit;
        }
    }
    if ($iend < $sj + $sf) {
        echo "<script>alert('�ɶ��������ܴ���������ܳ���" . $iend . "%��!');window.history.go(-1);</script>";
        exit;
    }
    $sql = "update  web_agent set uid='',xm='" . $xm . "',cs='" . $cs . "',ts='" . $ts . "',adddate='" . $utime . "',zong_zc='" . $sf . "',guan_zc='" . $sj . "',dagu_zc='" . $dagu_zc . "',gs_zc='" . $gs_zc . "',pz='" . $pz . "',stat='" . $stat . "',ty='" . $ty . "',zc='" . $zc . "' where id='" . $userid . "'  order by id desc";
    if (!$db1->query($sql)) {
        exit("���ݿ��޸ĳ���");
    }
    if ($_POST['sj'] != $guan_zc || $_POST['sf'] != $zong_zc) {
        $str1 = "�ܴ���ռ���޸�<br>�޸�ǰ�ɶ�ռ��:" . $guan_zc . "%,�ܴ���ռ��:" . $zong_zc . "%";
        $str2 = "�ܴ���ռ���޸�<br>�޸ĺ�ɶ�ռ��:" . $_POST['sj'] . "%,�ܴ���ռ��:" . $_POST['sf'] . "%";
        $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $jxadmin . "',kauser='" . $username . "',lx=2,text1='" . $str1 . "',text2='" . $str2 . "',ip='" . $userip . "'";
        $db1->query($sql);
        if ($zc_all == 0) {
            if ($zc_auto == 1) {
                $db1->query("update web_member set uid='',zong_zc=" . $sf . ",guan_zc=" . $sj . ",dagu_zc=" . $dagu_zc . ",gs_zc=" . $gs_zc . "  where zs=2 and zong='" . $username . "'");
                $db1->query("update web_agent set uid='',zong_zc=" . $sf . "-dai_zc,guan_zc=" . $sj . ",dagu_zc=" . $dagu_zc . ",gs_zc=" . $gs_zc . "  where zong='" . $username . "'");
                $db1->query("update web_member set uid='',zong_zc=" . $sf . "-dai_zc,guan_zc=" . $sj . ",dagu_zc=" . $dagu_zc . ",gs_zc=" . $gs_zc . "  where zs!=2 and zong='" . $username . "'");
            } else {
                $db1->query("update web_member set uid='',guan_zc=" . $sj . ",dagu_zc=" . $dagu_zc . ",gs_zc=100-dagu_zc-guan_zc-zong_zc  where zs=2 and zong='" . $username . "'");
                $result = $db1->query("select * from web_agent where lx=1 and zong='" . $username . "' and (guan_zc!=" . $sj . " or zong_zc+dai_zc>" . $sf . ")");
                $cou = $result->num_rows;
                while ($cou != 0 && ($image = $result->fetch_array())) {
                    $zong_zc_temp = $image['zong_zc'];
                    $dai_zc_temp = $image['dai_zc'];
                    $dai_name_temp = $image['kauser'];
                    if ($sf < $zong_zc_temp + $dai_zc_temp) {
                        $db1->query("update web_agent set uid='',dagu_zc=" . $dagu_zc . ",guan_zc=" . $sj . ",zong_zc=" . $sf . "-dai_zc,gs_zc=100-dagu_zc-guan_zc-zong_zc-dai_zc  where lx=1 and kauser='" . $dai_name_temp . "'");
                        $db1->query("update web_member set uid='',dagu_zc=" . $dagu_zc . ",guan_zc=" . $sj . ",zong_zc=" . $sf . "-" . $dai_zc_temp . ",gs_zc=100-dagu_zc-guan_zc-zong_zc-dai_zc  where zs!=2 and dai='" . $dai_name_temp . "' and zong='" . $username . "'");
                    } else {
                        $db1->query("update web_agent set uid='',dagu_zc=" . $dagu_zc . ",guan_zc=" . $sj . ",gs_zc=100-dagu_zc-guan_zc-zong_zc-dai_zc  where lx=1 and kauser='" . $dai_name_temp . "'");
                        $db1->query("update web_member set uid='',dagu_zc=" . $dagu_zc . ",guan_zc=" . $sj . ",gs_zc=100-dagu_zc-guan_zc-zong_zc-dai_zc  where zs!=2 and dai='" . $dai_name_temp . "' and zong='" . $username . "'");
                    }
                }
            }
        } else {
            if ($zc_auto == 1) {
                $db1->query("update web_member set uid='',zong_zc=" . $sf . ",guan_zc=" . $sj . ",dagu_zc=" . $dagu_zc . ",gs_zc=" . $gs_zc . "  where zs=2 and zong='" . $username . "'");
                $db1->query("update web_agent set uid='',zong_zc=" . $sf . "-dai_zc,guan_zc=" . $sj . ",dagu_zc=" . $dagu_zc . ",gs_zc=" . $gs_zc . "  where zong='" . $username . "'");
                $db1->query("update web_member set uid='',zong_zc=" . $sf . "-dai_zc,guan_zc=" . $sj . ",dagu_zc=" . $dagu_zc . ",gs_zc=" . $gs_zc . "  where zs!=2 and zong='" . $username . "'");
            } else {
                $db1->query("update web_member set uid='',guan_zc=" . $sj . ",gs_zc=" . $gs_zc . ",dagu_zc=100-gs_zc-guan_zc-zong_zc  where zs=2 and zong='" . $username . "'");
                $result = $db1->query("select * from web_agent where lx=1 and zong='" . $username . "' and (guan_zc!=" . $sj . " or zong_zc+dai_zc>" . $sf . ")");
                $cou = $result->num_rows;
                while ($cou != 0 && ($image = $result->fetch_array())) {
                    $zong_zc_temp = $image['zong_zc'];
                    $dai_zc_temp = $image['dai_zc'];
                    $dai_name_temp = $image['kauser'];
                    if ($sf < $zong_zc_temp + $dai_zc_temp) {
                        $db1->query("update web_agent set uid='',gs_zc=" . $gs_zc . ",guan_zc=" . $sj . ",zong_zc=" . $sf . "-dai_zc,dagu_zc=100-gs_zc-guan_zc-zong_zc-dai_zc  where lx=1 and kauser='" . $dai_name_temp . "'");
                        $db1->query("update web_member set uid='',guan_zc=" . $sj . ",zong_zc=" . $sf . "-" . $dai_zc_temp . ",gs_zc=" . $gs_zc . ",dagu_zc=100-gs_zc-guan_zc-zong_zc-dai_zc  where zs!=2 and dai='" . $dai_name_temp . "' and zong='" . $username . "'");
                    } else {
                        $db1->query("update web_agent set uid='',gs_zc=" . $gs_zc . ",guan_zc=" . $sj . ",dagu_zc=100-gs_zc-guan_zc-zong_zc-dai_zc  where lx=1 and kauser='" . $dai_name_temp . "'");
                        $db1->query("update web_member set uid='',guan_zc=" . $sj . ",gs_zc=" . $gs_zc . ",dagu_zc=100-gs_zc-guan_zc-zong_zc-dai_zc  where zs!=2 and dai='" . $dai_name_temp . "' and zong='" . $username . "'");
                    }
                }
            }
        }
    }
    del_online($username, 0);
    echo "<script>alert('�޸ĳɹ�!');window.location.href='main.php?action=user_zong_edit&uid=" . $uid . "&id=" . $userid . "';</script>";
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
        if (!confirm("�Ƿ�ȷ���޸��ܴ���?")) { return false; }
    }
</script>

<SCRIPT>
 <?   if ($zc_auto == 0) {?>
        function ChangeSelectorSJ() {
            var zzc = eval($("sf").value) + eval($("sj").value);
            if (zzc > "<?=$iend?>") {
                $("sf").value = "<?=$iend?>"-$("sj").value;
                $("sj").focus();
                alert("�ɶ�ռ����+�ܴ���ռ�������ܴ��ڿ���ռ����<?=$iend?>%��");
                return false;
            }
        }
        function ChangeSelectorSF() {
            var zzc = eval($("sf").value) + eval($("sj").value);
            if (zzc > "<?=$iend?>") {
                $("sj").value="<?=$iend?>"-$("sf").value;
                $("sf").focus();
                alert("�ɶ�ռ����+�ܴ���ռ�������ܴ��ڿ���ռ����<?=$iend?>%��");
            return false;
        }
   } 
<?} else {?>
        function ChangeSelectorSJ() 
        {
            $("sf").value = "<?=$iend?>"-$("sj").value;
             
        } 
        function ChangeSelectorSF() 
            {
                $("sj").value ="<?=$iend?>"-$("sf").value;
            }
    <?}?>
            function StopPZ() { alert("���˺ż������������̽��ر��߷ɷ���!!!"); }
            function StopTY() { alert("���˺ż���������Ա����ͣͶע����!!!"); } 
            function Ckpzall(ckid) {
                if (ckid == 1) { $("gsmsg").innerHTML = "/�����߷�ʣ����"; }
                else { $("gsmsg").innerHTML = ""; }
            }
</script>
<body style="min-width: 1200px;width: 100%">
<div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;�ܴ������</span><span class="font_b">�޸��ܴ���&nbsp;</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright">   
      <input name="button" type="button" class="btn5" onmouseover="this.className='btn5m'" onmouseout="this.className='btn5'" onclick="history.go(-1)" value="����һҳ">
</div></div>
    <? if ($guan != "") {?>
    <br>
     <table width="800"border="0" align="center" cellpadding="0" cellspacing="1" class="t_list bet">
        <tr>
            <td height="20" colspan="2" class="t_list_caption">�ɶ�(
                <?=$guan?>)���ϼ���
            </td>
        </tr>

        <tr>
            <td width="16%" height="20" align="right" class="t_edit_caption">��ע:</td>
            <td class="t_edit_td">����ռ����:<?=$guanmaxzc?>%&nbsp;&nbsp;&nbsp;�����ö�:<?=$guanmaxcs?>&nbsp;&nbsp;&nbsp;�������ö�:<?=$mumuguan?>&nbsp;&nbsp;&nbsp;ʣ�����ö�:<?=$guanmaxcs-$mumuguan?>
                
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
                <?if ($zc_auto == 0) {
       echo "����";
    } else {
       echo  "��ֹ";
    }?>
                &nbsp;&nbsp;&nbsp;ʣ���������
                <span id="gsmsg">
                    <?if ($pzall == 2 || $pzall == 3) {
      echo  "/�����߷�ʣ����";
    }?>
                </span>:
                <?if ($zc_all == 0) {
       echo "�鹫˾";
    } else {
        echo "���ɶ�";
    }?>
            </td>
        </tr>
    </table>
    <?}?>
    <form action="main.php?action=user_zong_edit&uid=<?=$uid?>&act=edit&id=<?=$_GET['id']?>" method="post" name="form1"
        id="form1" onSubmit="return SubChk()">
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
                        class="inp1" id="pass" />(���벻�޸�������)&nbsp;&nbsp;
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
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <input name="cs" type="text" class="inp1" id="cs"
                        onkeyup="value=value.replace(/[^\d\.\/]/ig,'')" value="<?=$cs?>" />������ö��:
                    <?=$maxcs?>
                    <input name="maxcs" type="hidden" id="maxcs" value="<?=$maxcs?>" />&nbsp;&nbsp;(�������ö��:
                    <?=$mincs?>
                    <input name="mincs" type="hidden" id="mincs" value="<?=$mincs?>" />&nbsp;&nbsp;ʣ�����ö��:
                    <?=$cs-$mincs?>)
                </td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�˺�״��:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <input type="radio" name="rstat" id="rstat" value="0" <? if ($stat==0) {?>
                    checked="checked"
                    <?}?>
                    />����<input type="radio" name="rstat" id="rstat" value="1" <?if ($stat==1) {?>
                    checked="checked"
                    <?}?>
                    />ͣ��
                </td>
            </tr>
            <?if ($pzall == 3) {?>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�����¼��߷�:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">

                    <select name="zc" id="zc">
                        <option value="0" <?if ($zc==0) {?>
                            selected="selected"
                            <?}?>
                            >��
                        </option>
                        <option value="1" <?if ($zc==1) {?>
                            selected="selected"
                            <?}?>
                            >��
                        </option>
                    </select>
                    <SPAN STYLE="color: rgb(255,0,0);"> �ɶ��Ƿ���ܸ��¼����߷�ע��</SPAN>
                </td>
            </tr>
            <?}?>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�߷�:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <input type="radio" name="rpz" id="rpz" value="0" <? if ($pz==0) {?>
                    checked="checked"
                    <?}?>
                    />����<input type="radio" name="rpz" id="rpz" value="1" <? if ($pz==1) {?>
                    checked="checked"
                    <?}?>
                    onClick="StopPZ()"/>��ֹ
                </td>
            </tr>

            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">Ͷע:</td>
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
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�ɶ�ռ����:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <select name="sj" id="sj" onchange="ChangeSelectorSJ();">
                        <? $bb = $istar;
for (; $bb <= $iend - $minzc; $bb += 5) {?>
                        <option value="<?=$bb?>" <?if ($guan_zc==$bb) {?>
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
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�ܴ���ռ����:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <select name="sf" id="sf" onchange="ChangeSelectorSF();">
                        <? $bb = $minzc;
for (; $bb <= $iend; $bb += 5) {?>
                        <option value="<?=$bb?>" ; <?if ($zong_zc==$bb) {?>
                            selected="selected";
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
                <td width="16%" height="17" align="right" bgcolor="#FFFFFF" class="t_edit_caption">����¼ʱ��:</td>
                <td width="32%" height="17" bgcolor="#FFFFFF">
                    <?=$row['zlogin']?>
                </td>

                <td width="16%" height="17" align="right" bgcolor="#FFFFFF" class="t_edit_caption">����¼IP:</td>
                <td width="36%" height="17" bgcolor="#FFFFFF">
                    <?=$row['zip']?>
                </td>
            </tr>

            <tr>
                <td height="17" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�������ϸ���ʱ��:</td>
                <td height="17" bgcolor="#FFFFFF">
                    <?=$row['adddate']?>
                </td>
                <td height="17" align="right" bgcolor="#FFFFFF" class="t_edit_caption">��¼����:</td>
                <td height="17" bgcolor="#FFFFFF">
                    <?=$row['look']?>��
                </td>
            </tr>
            <tr>
                <td width="16%" height="17" align="right" bgcolor="#FFFFFF" class="t_edit_caption">����ʱ��:</td>
                <td height="17" bgcolor="#FFFFFF">
                    <?=$row['slogin']?>
                </td>
                <td width="16%" height="17" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�˺������:</td>
                <td height="17" bgcolor="#FFFFFF">
                    <?=$row['adduser']?>
                </td>
            </tr>
            <tr>
                <td height="30" colspan="4" align="center" bgcolor="#FFFFFF" class="m_bc_ed">
                    <input type="submit" class="btn1" name="button" id="button" value="ȷ��" />
                </td>
            </tr>
        </table>
    </form>
</body>