<?php

if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
if ($vip == 1 || $lx < 1) {
    echo "<center>��û�и�Ȩ�޹���!</center>";
    exit;
}
if ($lx == 4) {
    $select_sql = " and dagu='" . $kauser . "' ";
    $dai = $_GET['dai'];
}
if ($lx == 3) {
    $select_sql = " and guan='" . $kauser . "' ";
    $dai = $_GET['dai'];
}
if ($lx == 2) {
    $select_sql = " and zong='" . $kauser . "' ";
    $dai = $_GET['dai'];
}
if ($lx == 1) {
    $select_sql = " and dai='" . $kauser . "' ";
    $dai = $kauser;
}
$result = $db1->query("select * from web_member where id=" . $_GET['id'] . " and zs=1 " . $select_sql . " order by id LIMIT 1");
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
$dai_zc = $row['dai_zc'];
$dagu = $row['dagu'];
$dai = $row['dai'];
$maxcs = 0;
$istar = 0;
$iend = 100;
if ($dai != "") {
    $result = $db1->query("select * from web_agent where kauser='" . $dai . "' and lx=1 order by id LIMIT 1");
    $rows = $result->fetch_assoc();
    if ($rows == "") {
        exit;
    }
    $iend = $rows['dai_zc'];
    $maxcs = $rows['cs'];
    $daimaxcs = $rows['cs'];
    $daimaxzc = $rows['dai_zc'];
    $mumu = 0;
    $result1 = $db1->query("select SUM(cs) As sum_m  From web_member Where zs=1 and   dai='" . $dai . "' order by id desc");
    $rsw = $result1->fetch_array();
    if ($rsw[0] != "") {
        $mumu += $rsw[0];
    }
    $maxcs = $maxcs - $mumu + $cs;
}
if ($dagu != "") {
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
    if ($cs < $mincs) {
        echo "<script>alert('�����ö�ܵ��ڸû�Ա���ý��!');window.history.go(-1);</script>";
        exit;
    } else {
        $sql = "update  web_member set uid='',cs='" . $cs . "',ts=" . ($cs - $mincs) . ",adddate='" . $utime . "' where id='" . $userid . "' order by id desc";
        if (!$db1->query($sql)) {
            exit("���ݿ��޸ĳ���");
        }
    }
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
    if ($Current_KitheTable[29] != 0) {
        if ($zc_auto == 0 && $dai_zc != $_POST['sj']) {
            echo "<script>alert('�����ڼ䲻�����޸�ռ��!'); window.history.go(-1);</script>";
            exit;
        }
    } else {
        if ($zc_auto == 0 && $dai_zc != $_POST['sj']) {
            $str1 = "��Ա����ռ���޸�<br>�޸�ǰ����ռ��:" . $dai_zc . "%";
            $str2 = "��Ա����ռ���޸�<br>�޸ĺ����ռ��:" . $_POST['sj'] . "%";
            $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $kauser . "',kauser='" . $username . "',lx=2,text1='" . $str1 . "',text2='" . $str2 . "',ip='" . $userip . "'";
            $db1->query($sql);
        }
    }
    if ($zc_auto == 0) {
        $dai_zc = isset($_POST['sj']) ? intval($_POST['sj']) : $iend;
        if ($zc_all == 0) {
            $sql = "update web_member  set uid='',xm='" . $xm . "',adddate='" . $utime . "',stat='" . $stat . "',ty='" . $ty . "',xy='" . $xy . "',abcd='" . $abcd . "',dai_zc='" . $dai_zc . "',gs_zc=100-dagu_zc-guan_zc-zong_zc-dai_zc  where kauser='" . $username . "'";
        } else {
            $sql = "update web_member  set uid='',xm='" . $xm . "',adddate='" . $utime . "',stat='" . $stat . "',ty='" . $ty . "',xy='" . $xy . "',abcd='" . $abcd . "',dai_zc='" . $dai_zc . "',dagu_zc=100-gs_zc-guan_zc-zong_zc-dai_zc  where kauser='" . $username . "'";
        }
    } else {
        $sql = "update web_member  set uid='',xm='" . $xm . "',adddate='" . $utime . "',stat='" . $stat . "',ty='" . $ty . "',xy='" . $xy . "',abcd='" . $abcd . "' where kauser='" . $username . "'";
    }
    if (!$db1->query($sql)) {
        exit("���ݿ��޸ĳ���");
    }
    echo "<script>alert('�޸ĳɹ�!'); window.location.href = 'main.php?action=user_mem_list&uid=" . $uid . "&vip=" . $vip . "';</script>";
    exit;
}?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<style type="text/css">
    <!--
    .m_suag_ed {  background-color: #D3C9CB; text-align: right}
    -->
</style>
<script src="js/function.js" type="text/javascript"></script>
<script>function SubChk() {
        if ($("pass").value != '' && $("pass2").value == '') { $("pass2").focus(); alert("������ȷ������!!!"); return false }
        if ($("pass").value != $("pass2").value) { $("pass2").focus(); alert("ȷ�����������벻һ��!!!"); return false; }
        if ($("xm").value == '') { $("xm").focus(); alert("����������!!!"); return false; }
        if ($("cs").value == '') { $("cs").focus(); alert("�����������ö��!!!"); return false; }
        if (isNaN($("cs").value)) {alert('�����ö��ֻ����������');$("cs").focus(); return false; }
        if ($("cs").value > eval($("maxcs").value)) { $("cs").focus(); alert("���ö�Ȳ��ܴ���������ö��!!!"); return false; }
        if ($("cs").value < eval($("mincs").value)) {$("cs").focus(); alert("�Բ���,�û�Ա���ö��Ϊ" + $("mincs").value + ",���ö�Ȳ���С�����ö��!!!");return false;}
        if ($("xy").value == '') { $("xy").focus(); alert("�����뵥ע���Ͷע��!!!"); return false; }
        if (isNaN($("xy").value)) {alert('��ע���Ͷע��ֻ����������');$("xy").focus(); return false;}
        if (!confirm("�Ƿ�ȷ���޸Ļ�Ա?")) { return false; }} 
        function StopTY() { alert("�û�Ա����ͣͶע����!!!"); }
</script>
<body style="min-width: 1200px;width: 100%">
<div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;��Ա����</span><span class="font_b">�޸Ļ�Ա&nbsp; </span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright">
          <a  href="main.php?action=user_mem_list&uid=<?=$uid?>&vip=<?=$vip?>">����һҳ</a>
      </div>
</div>  
    <? if ($dai != "") {?>
     <table width="900" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
    <tbody><tr>
            <td height="20" colspan="2" align="center" class="t_list_caption">����(<?=$dai?>)���ϼ���
            </td>
        </tr>
        <tr>
            <td width="16%" height="20" align="right" class="t_edit_caption">��ע:</td>
            <td class="t_edit_td">����ռ����:
                <?=$daimaxzc?>%&nbsp;&nbsp;&nbsp;�����ö�:
                <?=$daimaxcs?>&nbsp;&nbsp;&nbsp;�������ö�:
                <?=$mumu?>&nbsp;&nbsp;&nbsp;ʣ�����ö�:
                <?=$daimaxcs -$mumu?>
            </td>
        </tr>
    </table>
    <?} ?>
    <form name="form1" onSubmit="return SubChk()" method="post" action="main.php?action=user_mem_edit&uid=<?=$uid?>&vip=<?=$vip?>&act=edit&id=<?=$userid?>">
        <table width="900" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
            <tr>
                <td height="20" colspan="2" align="center" bgcolor="#FFFFFF" class="t_list_caption"><font class="font_r">���������趨</font></td>
            </tr>
            <tr>
                 <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�ϼ�����:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td"><?=$dai?></td>
            </tr>
            <tr>
                 <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�˺�:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td"><?=$username?></td>

            </tr>
            <tr>
                 <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">����:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td"><input name="pass" type="password"
                        class="inp1" id="pass" />(���벻�޸�������)&nbsp;&nbsp;�����������8����Ԫ�������12����Ԫ������ֻ��������(0-9)����Ӣ�Ĵ�Сд��ĸ
                </td>

            </tr>
            <tr>
                 <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">ȷ������:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <input name="pass2" type="password" class="inp1" id="pass2" />
                </td>
            </tr>
            <tr>
                 <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">����:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td"><input name="xm" type="text"
                        class="inp1" id="xm" value="<?=$xm?>" /></td>
            </tr>

            <tr>
                <td height="17" colspan="4" align="right" bgcolor="#FFFFFF" class="t_list_caption">��ע�����趨</td>
            </tr>
            <tr>
                 <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�����ö�:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <input name="cs" type="text" class="inp1" id="cs"
                        onkeyup="value=value.replace(/[^\d\.\/]/ig,'')" value=<?=$cs?> />������ö��:<?=$maxcs?>
                    <input name="maxcs" type="hidden" id="maxcs" value="<?=$maxcs?>" />

                    <input name="mincs" type="hidden" id="mincs" value=<?=$mincs?> &nbsp;&nbsp;(����:<?=$mincs?>&nbsp;�������:<?=$cs - $mincs?>);
                </td>
            </tr>
            <tr>
                 <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�̿�:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">

                    <select name="abcd" id="abcd">
                        <option value="A" <? if ($abcd=="A" ) {?>selected="selected"<?}?>>A��
                        </option>
                        <option value="B" <? if ($abcd=="B" ) {?>selected="selected"<?}?>>B��
                        </option>
                        <option value="C" <? if ($abcd=="C" ) {?>selected="selected"<?}?>>C��
                        </option>
                        <option value="D" <? if ($abcd=="D" ) {?>selected="selected"<?}?>>D��
                        </option>

                    </select>
                </td>
            </tr>

            <tr>
                 <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�˺�״��:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <input type="radio" name="rstat" id="rstat" value="0" <? if ($stat==0) {?>checked="checked" <?}?> />����
                    <input type="radio" name="rstat" id="rstat" value="1" <? if ($stat==1) {?>checked="checked"<?}?> />ͣ��
                </td>
            </tr>

            <tr>
                 <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">Ͷע:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <input type="radio" name="rty" id="rty" value="0" <? if ($ty==0) {?> checked="checked"<? }?> />����Ͷע
                    <input type="radio" name="rty" id="rty" value="1" <? if ($ty==1) { ?>checked="checked" <?}?> onClick="StopTY()" />��ͣͶע</td>
            </tr>

            <tr>
                 <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">��ע���Ͷע��:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">

                    <input name="xy" type="text" class="inp1" id="xy" onkeyup="value=value.replace(/[^\d\.\/]/ig,'')" value=<?=$xy?> size="10" />
                </td>
            </tr>


            <tr>
                 <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">����ռ��:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <? if ($zc_auto == 0) {?>
                    <select class="za_select_02" name="sj" id="zc">
                    <? $bb = $istar;
                        for (; $bb <= $iend; $bb +=5) { ?> <option value="<?=$bb?>" <?if ($bb == $dai_zc) {?> selected="selected"<? }?>> 
                            <? 
                            switch ($bb) {
                            case 0:
                            print "��ռ��";
                            break;
                            default:
                            print $bb . "%";
                            break;
                         }?>
                            </option>
                         <?   }?>
                         
                    </select>
                    <? } else { ?><?=$dai_zc . "%"?><?}?>
                   
                </td>
            </tr>
            <?if ($auto_edit != 1) {?>

            <tr>
                <td width="16%" height="17" align="right" bgcolor="#FFFFFF">����¼ʱ��:</td>
                <td width="33%" height="17" bgcolor="#FFFFFF">
                    <?=$row['zlogin']?>
                </td>
                <td width="17%" height="17" align="right" bgcolor="#FFFFFF">����¼IP:</td>
                <td width="34%" height="17" bgcolor="#FFFFFF">
                    <?=$row['zip']?>
                </td>
            </tr>
            <tr>
                <td width="16%" height="17" align="right" bgcolor="#FFFFFF">�������ϸ���ʱ��:</td>
                <td width="33%" height="17" bgcolor="#FFFFFF">
                    <?=$row['adddate']?>
                </td>
                <td width="17%" height="17" align="right" bgcolor="#FFFFFF">��¼����:</td>
                <td width="34%" height="17" bgcolor="#FFFFFF">
                    <?=$row['look']?>��
                </td>
            </tr>
            <tr>
                <td width="16%" height="17" align="right" bgcolor="#FFFFFF">����ʱ��:</td>
                <td width="33%" height="17" bgcolor="#FFFFFF">
                    <?$row['slogin']?>
                </td>
                <td width="17%" height="17" align="right" bgcolor="#FFFFFF">�˺������:</td>
                <td width="34%" height="17" bgcolor="#FFFFFF">
                    <?=$row['adduser']?>
                </td>
            </tr>
            <?}?>
            <tr>
                <td height="30" colspan="4" align="center" bgcolor="#FFFFFF" class="">
                    <input type="submit" class="btn1" name="Submit" value="ȷ��" />
                </td>
            </tr>
        </table>
    </form>
</body>