<?php

if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
if ($lx < 3 || $vip == 1 && !strpos($flag, "2")) {
    echo "<center>��û�и�Ȩ�޹���!</center>";
    exit;
}
$gtype = $_GET['gtype'];
$user = $_GET['user'];
$vvv = " ";
if ($user == "") {
    echo "<script>alert('�û�����Ϊ��!�����²�ѯ'); window.location.href = 'main.php?action=report&uid=" . $uid . "';</script>";
    exit;
}
if ($_GET['date_start'] != "") {
    $date_start = $_GET['date_start'];
} else {
    $date_start = date("Y-m-d");
}
if ($_GET['date_end'] != "") {
    $date_end = $_GET['date_end'];
} else {
    $date_end = date("Y-m-d");
}
$stime = $date_start . " 00:00:00";
$etime = $date_end . " 23:59:59";
if ($_GET['kithe'] != "") {
    $kithe = $_GET['kithe'];
    $vvv .= " and kithe='" . $kithe . "'";
} else {
    $kithe = "";
    $vvv .= " and adddate>='" . $stime . "' and adddate<='" . $etime . "' ";
}
$tb_name = "";
if ($Current_KitheTable[29] != 0 && $kithe == $Current_Kithe_Num) {
    $tb_name = "web_tan";
} else {
    $tb_name = "web_tans";
}
if ($kithe == "") {
    if ($Current_KitheTable[29] != 0 && $date_start == date("Y-m-d")) {
        $tb_name = "web_tan";
    } else {
        $tb_name = "web_tans";
    }
}
if ($Current_KitheTable[29] != 0 && $kplist == 1 && ($kithe != $Current_Kithe_Num || $date_start != date("Y-m-d"))) {
    echo "<script>alert('�����ڼ䣬�������鿴��ʷ����!');window.history.go(-1);</script>";
    exit;
}
if ($gtype != "") {
    $vvv .= " and ds_lb='" . $gtype . "' ";
    $result = $db1->query("select ds from web_config_ds where ds_lb='" . $gtype . "' order by id desc LIMIT 1");
    $ds_row = $result->fetch_array();
    $class2 = $ds_row['ds'];
} else {
    $class2 = "";
}
$z_zs1 = $z_zs2 = $z_zs3 = 0;
$z_sum1 = $z_sum2 = $z_sum3 = 0;
$z_guan1 = $z_guan2 = $z_guan3 = 0;
$z_dagu1 = $z_dagu2 = $z_dagu3 = 0;
$z_gs1 = $z_gs2 = $z_gs3 = 0;
$z_userds1 = $z_userds2 = $z_userds3 = 0;
$z_daguds1 = $z_daguds2 = $z_daguds3 = 0;
$z_guands1 = $z_guands2 = $z_guands3 = 0;
$z_usersf1 = $z_usersf2 = $z_usersf3 = 0;
$z_guansf1 = $z_guansf2 = $z_guansf3 = 0;
$z_dagusf1 = $z_dagusf2 = $z_dagusf3 = 0;
$z_gssf1 = $z_gssf2 = $z_gssf3 = 0;
?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<script src="js/function.js" type="text/javascript"></script>
<script src="js/report_func.js" type="text/javascript"></script>
<body style="min-width: 1200px;width: 100%">
 <div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">ע����ѯ</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright">
       <table width="874" border="0" cellspacing="0" cellpadding="0">
        <tbody>  
        <tr>
        <td height="28" style="color:#fff;">
          <?if ($kithe != "") {?>
            <?=$kithe?>��
            <?} else {?>
            �������䣺
            <?=$date_start?> ~
            <?=$date_end?>
            <?}?></span></div>
            &nbsp;&nbsp;����:
            <? if ($class2 != "") {?>
            <?=$class2?>
            <?} else {?>
            ȫ��
            <?} ?>
            &nbsp;&nbsp;(�������н����������ˮ) &nbsp;&nbsp;�ɶ�:
            <?=$user?>
            --<a href="javascript:history.go( -1 );">����һҳ</a> -- <a href="main.php?action=report&uid=<?=$uid?>&vip=<?=$vip?>">�ر�����ѯ</a>
            </td>
            </tr>
            </tbody>
            </table>
      </div>
</div>      
    <?
$result = $db1->query("SELECT zong,sum(sz) as zs,sum(sum_m) as sum_m,sum(user_sf) usersf,sum(user_sq) user_ds,sum(dai_sq) dai_ds,sum(zong_sq) zong_ds,sum(guan_sq) guan_ds,sum(guanzc) as guanzc,sum(guan_sf) as guansf,sum(daguzc) as daguzc,sum(dagu_sf) as dagusf,sum(gszc) as gszc,sum(gs_sf) as gssf FROM " . $tb_name . "  WHERE visible=1 and guan='" . $user . "' and dai!='" . $user . "' and username!='" . $user . "' " . $vvv . " group by zong order by zong DESC");
$ii = 0;
if ($result->num_rows != 0) {?>

<table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
    <tbody>
        <tr>
            <td height="18" colspan="11" align="center" nowrap="nowrap" class="t_list_caption">�¼��ܴ���ע��</td>
        </tr>
        <tr>
            <td height="18" align="center" nowrap="nowrap" class="t_list_tr_3">���</td>
            <td align="center" class="t_list_tr_3">�ܴ���</td>
            <td align="center" class="t_list_tr_3">����</td>
            <td align="center" class="t_list_tr_3">��ע��</td>
            <td align="center" class="t_list_tr_3">���</td>
            <td align="center" class="t_list_tr_3">��ˮ</td>
            <td align="center" class="t_list_tr_3">�ɶ�ռ�ɽ��</td>
            <td align="center" class="t_list_tr_3">�ɶ�׬ˮ</td>
            <td align="center" bgcolor="#CC0000" class="t_list_tr_3">�ɶ����</td>
            <td align="center" class="t_list_tr_3">���ܴ�������</td>
            <td align="center" class="t_list_tr_3">���ɶ�����</td>
        </tr>
        <?
    while ($rs = $result->fetch_array()) {
        $sum_m = $usersf = $guansf = $dagusf = $gssf = $userds = $guands = $daguds = $guanzc = $daguzc = $gszc = 0;
        ++$ii;
        $z_zs1 += $rs['zs'];
        $sum_m = $rs['sum_m'];
        $z_sum1 += $sum_m;
        $usersf = $rs['usersf'] + $rs['dai_ds'] + $rs['zong_ds'];
        $z_usersf1 += $usersf;
        $userds = $rs['user_ds'] + $rs['dai_ds'] + $rs['zong_ds'];
        $z_userds1 += $userds;
        $guanzc = $rs['guanzc'];
        $z_guan1 += $guanzc;
        $guansf = $rs['guansf'];
        $z_guansf1 += $guansf;
        $guands = $rs['guan_ds'];
        $z_guands1 += $guands;
        $daguzc = $rs['daguzc'];
        $z_dagu1 += $daguzc;
        $dagusf = $rs['dagusf'];
        $z_dagusf1 += $dagusf;
        $daguds = $rs['dagu_ds'];
        $z_daguds1 += $daguds;
        $gszc = $rs['gszc'];
        $z_gs1 += $gszc;
        $gssf = $rs['gssf'];
        $z_gssf1 += $gssf;
        $result2 = $db1->query("select * from web_agent where  kauser='" . $rs['zong'] . "' order by id LIMIT 1");
        $row11 = $result2->fetch_array();
        if ($row11 != "") {
            $xm = "<font color=#cc0000> (" . $row11['xm'] . ")</font>";
        } else {
            $xm = "";
        }?>
        <tr bgcolor="#ffffff" onmouseover="javascript:this.bgColor='#FFFFA2'" onmouseout="javascript:this.bgColor='#ffffff'">
            <td height="28" align="center" nowrap="nowrap">
                <?=$ii?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=$rs['zong'].$xm?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=$rs['zs']?>
            </td>
            <td align="center" nowrap="nowrap"><a href="main.php?action=report_m4&uid=<?=$uid?>&vip=<?=$vip?>&kithe=<?=$kithe?>&user=<?=$rs['zong']?>&date_start=<?=$date_start?>&date_end=<?=$date_end?>&gtype=<?=$gtype?>"><?=round($sum_m, 2)?></a></td>
            <td height="28" align="center" nowrap="nowrap">
                <?=round($usersf, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($userds, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($guanzc, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($guands, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($guansf, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=get_sf(round($guansf + $dagusf + $gssf, 2))?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=get_sf(round(0 - $gssf - $dagusf, 2))?>
            </td>
        </tr>
        <? }?>
        <tr class="t_list_tr_2">
            <td height="18" align="center" nowrap="nowrap">&nbsp;</td>
            <td align="center" nowrap="nowrap">�ܼ�</td>
            <td align="center" nowrap="nowrap">
                <?=$z_zs1?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=$z_sum1?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($z_usersf1, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($z_userds1, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($z_guan1, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($z_guands1, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($z_guansf1, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=get_sf(round($z_guansf1 + $z_dagusf1 + $z_gssf1, 2))?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=get_sf(round(0 - $z_gssf1 - $z_dagusf1, 2))?>
            </td>
        </tr>
    </table><br>
    <? }?>
    <? $result = $db1->query("SELECT username,sum(sz) as zs,sum(sum_m) as sum_m,sum(user_sf) usersf,sum(user_sq) user_ds,sum(dai_sq) dai_ds,sum(dagu_sq) dagu_ds,sum(guanzc) as guanzc,sum(guan_sf) as guansf,sum(daguzc) as daguzc,sum(dagu_sf) as dagusf,sum(gszc) as gszc,sum(gs_sf) as gssf FROM " . $tb_name . "  WHERE visible=1 and guan='" . $user . "' and dai='" . $user . "' and username!='" . $user . "' " . $vvv . " group by username order by username DESC");
$ii = 0;
if ($result->num_rows != 0) {?>
   <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
        <tr>
            <td height="18" colspan="11" nowrap="nowrap" class="t_list_caption">ֱ����Ա���</td>
        </tr>
        <tr>
            <td height="18" align="center" nowrap="nowrap" class="t_list_tr_3">���</td>
            <td align="center" class="t_list_tr_3">��Ա</td>
            <td align="center" class="t_list_tr_3" class="t_list_tr_3">����</td>
            <td align="center" class="t_list_tr_3">��ע���</td>
            <td align="center" class="t_list_tr_3">���</td>
            <td align="center" class="t_list_tr_3">��ˮ</td>
            <td align="center" class="t_list_tr_3">�ɶ�ռ�ɽ��</td>
            <td align="center" class="t_list_tr_3">�ɶ�׬ˮ</td>
            <td align="center" bgcolor="#CC0000" class="t_list_tr_3">�ɶ����</td>
            <td align="center" class="t_list_tr_3">���Ա����</td>
            <td align="center" class="t_list_tr_3">���ɶ�����</td>
        </tr>
        <? while ($rs = $result->fetch_array()) {
        $sum_m = $usersf = $guansf = $dagusf = $gssf = $userds = $guands = $daguds = $guanzc = $daguzc = $gszc = 0;
        ++$ii;
        $z_zs2 += $rs['zs'];
        $sum_m = $rs['sum_m'];
        $z_sum2 += $sum_m;
        $usersf = $rs['usersf'];
        $z_usersf2 += $usersf;
        $userds = $rs['user_ds'];
        $z_userds2 += $userds;
        $guanzc = $rs['guanzc'];
        $z_guan2 += $guanzc;
        $guansf = $rs['guansf'] + $rs['dai_ds'];
        $z_guansf2 += $guansf;
        $guands = $rs['dai_ds'];
        $z_guands2 += $guands;
        $daguzc = $rs['daguzc'];
        $z_dagu2 += $daguzc;
        $dagusf = $rs['dagusf'];
        $z_dagusf2 += $dagusf;
        $daguds = $rs['dagu_ds'];
        $z_daguds2 += $daguds;
        $gszc = $rs['gszc'];
        $z_gs2 += $gszc;
        $gssf = $rs['gssf'];
        $z_gssf2 += $gssf;
        $result2 = $db1->query("select * from web_member where  kauser='" . $rs['username'] . "' order by id LIMIT 1");
        $row11 = $result2->fetch_array();
        if ($row11 != "") {
            $xm = "<font color=#cc0000> (" . $row11['xm'] . ")</font>";
        } else {
            $xm = "";
        }?>
        <tr bgcolor="#ffffff" onmouseover="javascript:this.bgColor='#FFFFA2'" onmouseout="javascript:this.bgColor='#ffffff'">
            <td height="28" align="center" nowrap="nowrap">";
                <?=$ii?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=$rs['username'].$xm?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=$rs['zs']?>
            </td>
            <td align="center" nowrap="nowrap"><a href="main.php?action=report_m6&uid=<?=$uid?>&vip=<?=$vip?>&kithe=<?=$kithe?>&user=<?=$rs['username']?>&date_start=<?=$date_start?>&date_end=<?=$date_end?>&gtype=<?=$gtype?>"><?=round($sum_m, 2)?></a>
            </td>   
            <td height="28" align="center" nowrap="nowrap"><?=round($usersf, 2)?></td>
            <td align="center" nowrap="nowrap"><?=round($userds, 2)?></td>
            <td align="center" nowrap="nowrap"><?=round($guanzc, 2)?></td>
            <td align="center" nowrap="nowrap"><?=round($guands, 2)?></td>
            <td align="center" nowrap="nowrap"><?=round($guansf, 2)?></td>
            <td align="center" nowrap="nowrap"><?=get_sf(round($dagusf + $gssf + $guansf, 2))?></td>
            <td align="center" nowrap="nowrap"><?=get_sf(round(0 - $gssf - $dagusf, 2))?></td>
        </tr>
        <?} ?>
        <tr class="t_list_tr_2">
            <td height="18" align="center" nowrap="nowrap">&nbsp;</td>
            <td align="center" nowrap="nowrap">�ܼ�</td>
            <td align="center" nowrap="nowrap">
                <?=round($z_zs2, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($z_sum2, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($z_usersf2, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($z_userds2, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($z_guan2, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($z_guands2, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($z_guansf2, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=get_sf(round($z_guansf2 + $z_dagusf2 + $z_gssf2, 2))?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=get_sf(round(0 - $z_gssf2 - $z_dagusf2, 2))?>
            </td>
        </tr>
    </table><br>
    <?} 
    $result = $db1->query("SELECT username,sum(sz) as zs,sum(sum_m) as sum_m,sum(user_sf) usersf,sum(user_sq)
    user_ds,sum(dagu_sq) dagu_ds,sum(daguzc) as daguzc,sum(dagu_sf) as dagusf,sum(gszc) as gszc,sum(gs_sf) as gssf FROM
    " . $tb_name . " WHERE visible=1 and lx=3 and username='" . $user . "' " . $vvv . " group by username order by
    username DESC");
    $ii = 0;
   if ($result->num_rows != 0) {?>
    <table width="98%" border="0" align="center" cellpadding="0" bgcolor="#000000" cellspacing="1" class="t_list">
        <tr>
            <td height="18" colspan="7" nowrap="nowrap" class="t_list_caption">�ɶ������߷ɽ��</td>
        </tr>
        <tr>
            <td height="18" align="center" nowrap="nowrap" class="t_list_tr_3">���</td>
            <td align="center" class="t_list_tr_3">�ɶ�</td>
            <td align="center" class="t_list_tr_3">����</td>
            <td align="center" class="t_list_tr_3">��ע���</td>
            <td align="center" bgcolor="#CC0000" class="t_list_tr_3">�ɶ����</td>
            <td align="center" class="t_list_tr_3">��ˮ</td>
            <td align="center" class="t_list_tr_3">���ɶ�����</td>
        </tr>
        <?  while ($rs = $result->fetch_array()) {
        $sum_m = $usersf = $guansf = $dagusf = $gssf = $userds = $guands = $daguds = $daguzc = $gszc = 0;
        ++$ii;
        $z_zs3 += $rs['zs'];
        $sum_m = $rs['sum_m'];
        $z_sum3 += $sum_m;
        $usersf = $rs['usersf'];
        $z_usersf3 += $usersf;
        $userds = $rs['user_ds'];
        $z_userds3 += $userds;
        $guansf = $usersf;
        $z_guansf3 += $guansf;
        $guands = $userds;
        $daguzc = $rs['daguzc'];
        $z_dagu3 += $daguzc;
        $dagusf = $rs['dagusf'];
        $z_dagusf3 += $dagusf;
        $daguds = $rs['dagu_ds'];
        $z_daguds3 += $daguds;
        $gszc = $rs['gszc'];
        $z_gs3 += $gszc;
        $gssf = $rs['gssf'];
        $z_gssf3 += $gssf;
		?>
        <tr bgcolor="#ffffff" onmouseover="javascript:this.bgColor='#FFFFA2'" onmouseout="javascript:this.bgColor='#ffffff'">
            <td height="28" align="center" nowrap="nowrap">
                <?=$ii?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=$rs['username']?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=$rs['zs']?>
            </td>
            <td align="center" nowrap="nowrap"><a href="main.php?action=report_m6&uid=<?=$uid?>&vip=<?=$vip?>&kithe=<?=$kithe?>&user=<?=$rs['username']?>&date_start=<?=$date_start?>&date_end=<?=$date_end?>&gtype=<?=$gtype?>&lx=3"><?=round($sum_m, 2)?></a></td>
            <td height="28" align="center" nowrap="nowrap">
                <?=round($usersf, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($userds, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=get_sf(round(0 - $gssf - $dagusf, 2))?>
            </td>
        </tr>
        <?} ?>
        <tr class="t_list_tr_2">
            <td height="18" align="center" nowrap="nowrap">&nbsp;</td>
            <td align="center" nowrap="nowrap">�ܼ�</td>
            <td align="center" nowrap="nowrap">
                <?=round($z_zs3, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($z_sum3, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($z_usersf3, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($z_userds3, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=get_sf(round(0 - $z_gssf3 - $z_dagusf3, 2))?>
            </td>
        </tr>
    </table><br>
    <?} ?>
    <? if ($z_zs1 != 0 || $z_zs2 != 0 || $z_zs3 != 0) {?>
    <table width="98%" border="0" align="center" cellpadding="0" bgcolor="#000000" cellspacing="1" class="t_list">
        <tr>
            <td height="18" colspan="9" nowrap="nowrap" class="t_list_caption">�ܼ�</td>
        </tr>
        <tr>
            <td height="18" align="center" class="t_list_tr_3">����</td>
            <td align="center" class="t_list_tr_3">��ע���</td>
            <td align="center" class="t_list_tr_3">���</td>
            <td align="center" class="t_list_tr_3">��ˮ</td>
            <td align="center" class="t_list_tr_3">�ɶ�ռ��</td>
            <td align="center" class="t_list_tr_3">�ɶ�׬ˮ</td>
            <td align="center" bgcolor="#CC0000" class="t_list_tr_3">�ɶ����</td>
            <td align="center" class="t_list_tr_3">���¼�����</td>
            <td align="center" class="t_list_tr_3">���ɶ�����</td>
        </tr>
        <tr class="t_list_tr_2">
            <td height="18" align="center" nowrap="nowrap">
                <?=round($z_zs1 + $z_zs2 + $z_zs3, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($z_sum1 + $z_sum2 + $z_sum3, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($z_usersf1 + $z_usersf2 + $z_usersf3, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($z_userds1 + $z_userds2 + $z_userds3, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($z_guan1 + $z_guan2 - $z_sum3, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($z_guands1 + $z_guands2, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($z_guansf1 + $z_guansf2 + $z_guansf3, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=get_sf(round($z_guansf1 + $z_dagusf1 + $z_gssf1, 2) + round($z_guansf2 + $z_dagusf2 + $z_gssf2, 2))?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=get_sf(round(0 - $z_gssf1 - $z_dagusf1, 2) + round(0 - $z_gssf2 - $z_dagusf2, 2) + round(0 - $z_gssf3 - $z_dagusf3, 2))?>
            </td>
        </tr>
    </table>
    <?} else {?>
    <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
        <tr>
            <td align=center height="30" bgcolor="#ffffff">
                <marquee align="middle" behavior="alternate" width="200">
                    <font color="#FFFFFF">�����κ�����</font>
                </marquee>
            </td>
        </tr>
        <tr>
            <td align=center height="20" bgcolor="#FFE3EC"><a href="javascript:history.go(-1);">�뿪</a></td>
        </tr>
    </table>
    <?} ?>
    </div>