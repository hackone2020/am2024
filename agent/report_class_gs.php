<?php

if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
if ($lx < 4 || $vip == 1 && !strpos($flag, "2")) {
    echo "<center>��û�и�Ȩ�޹���!</center>";
    exit;
} else {
    if ($rball != 1) {
        echo "<center>��û�и�Ȩ�޹���!</center>";
        exit;
    }
}
$vvv = " ";
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
    echo "<script>alert('�����ڼ䣬������鿴��ʷ����!');window.history.go(-1);</script>";
    exit;
}
$result = $db1->query("select ds_lb,ds from  web_config_ds where lx=0 order by id");
$dstable = array();
$y = 0;
while ($row = $result-fetch_assoc()) {
    $dstable[$y] = $row;
    ++$y;
}
$ds_count = count($dstable);
$result = $db1->query("SELECT  ds_lb,sum(sum_m) as sum_m,sum(sz) as zs,sum(user_sf+dai_sq+zong_sq+guan_sq+dagu_sq) as usersf,sum(user_sq+dai_sq+zong_sq+guan_sq+dagu_sq) as user_ds,sum(gszc) as gszc,sum(gs_sf) as gssf FROM " . $tb_name . "  WHERE  visible=1 and dagu<>'���' " . $vvv . " group by ds_lb order by ds_lb DESC");
$rs1_table = array();
while ($row = $result->fetch_assoc()) {
    $rs1_table[$row['ds_lb']] = $row;
}
$rs1_count = count($rs1_table);
$result = $db1->query("SELECT  ds_lb,sum(sum_m) as sum_m,sum(sz) as zs,sum(user_sf) as usersf,sum(user_sq) as user_ds FROM " . $tb_name . "  WHERE visible=1 and dagu='���' " . $vvv . " group by ds_lb order by ds_lb DESC");
$rs2_table = array();
while ($row = $result->fetch_assoc()) {
    $rs2_table[$row['ds_lb']] = $row;
}
$rs2_count = count($rs2_table);
$z_zs1 = $z_zs2 = 0;
$z_sum1 = $z_sum2 = 0;
$z_usersf1 = $z_usersf2 = 0;
$z_userds1 = $z_userds2 = 0;
$z_gszc1 = $z_gszc2 = 0;
$z_gssf1 = $z_gssf2 = 0;
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
            <font color="#CC0000">���౨��</font>--
            <? 
            if ($kithe != "") {?>
            ��
            <?=$kithe?>��
            <?} else {?>
            �������䣺
            <?=$date_start?> ~
            <?=$date_end?>
            <?}?>&nbsp;&nbsp;(�������н����������ˮ) -- <a href="main.php?action=report&uid=<?=$uid?>&vip=<?=$vip?>">�ر����ѯ</a>
        </td>
        </tr>
        </tbody>
    </table></div></div>
    <? if (0 < $rs1_count) {?>
       <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list bet">
         <tr>
            <td height="18" colspan="8" align="center" nowrap="nowrap" class="t_list_caption">���</td>
        </tr>
         <tr>
            <td height="18" align="center" nowrap="nowrap" class="t_list_tr_3">���</td>
            <td align="center" class="t_list_tr_3">����</td>
            <td align="center" class="t_list_tr_3">����</td>
            <td align="center" class="t_list_tr_3">��ע���</td>
            <td align="center" class="t_list_tr_3">���</td>
            <td align="center" class="t_list_tr_3" class="t_list_tr_3">��ˮ</td>
            <td align="center" class="t_list_tr_3">��˾ռ��</td>
            <td align="center" bgcolor="#CC0000" class="t_list_tr_3">��˾���</td>
        </tr>
        <?
    $ii = 0;
    $i = 0;
    for (; $i < $ds_count; $i += 1) {
        $zs1 = $sum_m = $usersf = $userds = $gszc = $gssf = 0;
        $zs1 = $rs1_table[$dstable[$i]['ds_lb']]['zs'];
        $z_zs1 += $zs1;
        $sum_m = $rs1_table[$dstable[$i]['ds_lb']]['sum_m'];
        $z_sum1 += $sum_m;
        $usersf = $rs1_table[$dstable[$i]['ds_lb']]['usersf'];
        $z_usersf1 += $usersf;
        $userds = $rs1_table[$dstable[$i]['ds_lb']]['user_ds'];
        $z_userds1 += $userds;
        $gszc = $rs1_table[$dstable[$i]['ds_lb']]['gszc'];
        $z_gszc1 += $gszc;
        $gssf = $rs1_table[$dstable[$i]['ds_lb']]['gssf'];
        $z_gssf1 += $gssf;
        if ($sum_m != 0) {
        ++$ii;?>
        <tr bgcolor="#ffffff" onmouseover="javascript:this.bgColor='#FFFFA2'" onmouseout="javascript:this.bgColor='#ffffff'">
            <td height="28" align="center" nowrap="nowrap">
                <?=$ii?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=$dstable[$i]['ds']?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=$zs1?>
            </td>
            <td align="center" nowrap="nowrap"><a
                    href="main.php?action=report_m6_gs&uid=<?=$uid?>&vip=<?=$vip?>&kithe=<?=$kithe?>&date_start=<?=$date_start?>&date_end=<?=$date_end?>&gtype=<?=$dstable[$i]['ds_lb']?>">
                    <?=round($sum_m, 2)?>
                </a></td>
            <td height="28" align="center" nowrap="nowrap">
                <?=round($usersf, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($userds, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($gszc, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($gssf, 2)?>
            </td>
        </tr>
        <?  }
    }?>
        <tr class="t_list_tr_2">
            <td height="18" align="center" nowrap="nowrap">&nbsp;</td>
            <td align="center" nowrap="nowrap">�ܼ�</td>
            <td align="center" nowrap="nowrap">
                <?=$z_zs1?>
            </td>
            <td align="center" nowrap="nowrap">
                <?$z_sum1?>
            </td>
            <td align="center" nowrap="nowrap">
                <?round($z_usersf1, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?round($z_userds1, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?round($z_gszc1, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?round($z_gssf1, 2)?>
            </td>
        </tr>
    </table><br>
    <?}
 if (0 < $rs2_count) {?>
   <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list bet">
        < <tr>
            <td height="18" colspan="6" nowrap="nowrap" class="t_list_caption">��˾����߷ɽ��</td>
        </tr>
        <tr>
            <td height="18" align="center" nowrap="nowrap" class="t_list_tr_3">���</td>
            <td align="center" class="t_list_tr_3">����</td>
            <td align="center" class="t_list_tr_3">����</td>
            <td align="center" class="t_list_tr_3">��ע���</td>
            <td align="center" class="t_list_tr_3">��ˮ</td>
            <td align="center" bgcolor="#CC0000" class="t_list_tr_3">��˾���</td>
        </tr>
        <?
    $ii = 0;
    $i = 0;
    for (; $i < $ds_count; $i += 1) {
        $zs2 = $sum_m = $usersf = $userds = $gssf = 0;
        $zs2 = $rs2_table[$dstable[$i]['ds_lb']]['zs'];
        $z_zs2 += $zs2;
        $sum_m = $rs2_table[$dstable[$i]['ds_lb']]['sum_m'];
        $z_sum2 += $sum_m;
        $usersf = $rs2_table[$dstable[$i]['ds_lb']]['usersf'];
        $z_usersf2 += $usersf;
        $userds = $rs2_table[$dstable[$i]['ds_lb']]['user_ds'];
        $z_userds2 += $userds;
        $gssf = 0 - $usersf;
        $z_gssf2 += $gssf;
        if ($sum_m != 0) {
            ++$ii;
            ?>
        <tr bgcolor="#ffffff" onmouseover="javascript:this.bgColor='#FFFFA2'" onmouseout="javascript:this.bgColor='#ffffff'">
            <td height="28" align="center" nowrap="nowrap">
                <?=$ii?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=$dstable[$i]['ds']?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=$zs2?>
            </td>
            <td align="center" nowrap="nowrap">
                <a href="main.php?action=report_m6_gs&uid=<?=$uid?>&vip=<?=$vip?>&kithe=<?=$kithe?>&date_start=<?=$date_start?>&date_end=<?=$date_end?>&gtype=<?=$dstable[$i]['ds_lb']?>&lx=5"><?=round($sum_m, 2)?></a></td>
            <td align="center" nowrap="nowrap">
                <?=round($userds, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($gssf, 2)?>
            </td>
        </tr>
        <? }
    }?>
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
                <?=round($z_userds2, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($z_gssf2, 2)?>
            </td>
        </tr>
    </table><br>
    <?}
if (0 < $rs1_count || 0 < $rs2_count) {?>
    <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list bet">
        <tr>
            <td height="18" colspan="6" nowrap="nowrap" class="t_list_caption">�ܼ�</td>
        </tr>
         <tr>
            <td height="18" align="center" class="t_list_tr_3">����</td>
            <td align="center" class="t_list_tr_3">��ע���</td>
            <td align="center" class="t_list_tr_3">���</td>
            <td align="center" class="t_list_tr_3">��ˮ</td>
            <td align="center" class="t_list_tr_3">��˾ռ��</td>
            <td align="center" bgcolor="#CC0000" class="t_list_tr_3">��˾���</td>
        </tr>
        <tr class="t_list_tr_2">
            <td height="18" align="center" nowrap="nowrap">
                <?=round($z_zs1 + $z_zs2, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($z_sum1 + $z_sum2, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($z_usersf1 + $z_usersf2, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($z_userds1 + $z_userds2, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($z_gszc1 + $z_sum2, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($z_gssf1 + $z_gssf2, 2)?>
            </td>
        </tr>
    </table>
    <?} else {?>
    <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr>
            <td align=center height="30" bgcolor="#CC0000">
                <marquee align="middle" behavior="alternate" width="200">
                    <font color="#FFFFFF">�����κ�����</font>
                </marquee>
            </td>
        </tr>
        <tr>
            <td align=center height="20" bgcolor="#CCCCCC"><a href="javascript:history.go(-1);">�뿪</a></td>
        </tr>
    </table>
    <?} ?>
</div></body>