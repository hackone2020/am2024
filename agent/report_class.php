<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
if ($vip == 1 && !strpos($flag, "2")) {
    echo "<center>你没有该权限功能!</center>";
    exit;
}
if ($lx == 4) {
    $select_sql1 = " visible=1 and dagu='" . $kauser . "' and username!='" . $kauser . "' ";
    $select_sql2 = " visible=1 and dagu='" . $kauser . "' and username='" . $kauser . "' ";
}
if ($lx == 3) {
    $select_sql1 = " visible=1 and guan='" . $kauser . "' and username!='" . $kauser . "' ";
    $select_sql2 = " visible=1 and guan='" . $kauser . "' and username='" . $kauser . "' ";
}
if ($lx == 2) {
    $select_sql1 = " visible=1 and zong='" . $kauser . "' and username!='" . $kauser . "' ";
    $select_sql2 = " visible=1 and zong='" . $kauser . "' and username='" . $kauser . "' ";
}
if ($lx == 1) {
    $select_sql1 = " visible=1 and dai='" . $kauser . "' and username!='" . $kauser . "' ";
    $select_sql2 = " visible=1 and dai='" . $kauser . "' and username='" . $kauser . "' ";
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
    echo "<script>alert('开盘期间，不允许查看历史报表!');window.history.go(-1);</script>";
    exit;
}
$result = $db1->query("select ds_lb,ds from  web_config_ds where lx=0 order by id");
$dstable = array();
$y = 0;
while ($row = $result->fetch_assoc()) {
    $dstable[$y] = $row;
    ++$y;
}
$ds_count = count($dstable);
switch ($lx) {
    case "4":
        $re_sql1 = "SELECT  ds_lb,sum(sum_m) as sum_m,sum(sz) as zs,sum(user_sf+dai_sq+zong_sq+guan_sq) as usersf,sum(user_sq+dai_sq+zong_sq+guan_sq) as user_ds,sum(if(dai='" . $kauser . "',dai_sq,dagu_sq)) as you_ds,sum(daguzc) as youzc,sum(if(dai='" . $kauser . "',dagu_sf+dai_sq,dagu_sf)) as yousf FROM " . $tb_name . "  WHERE  " . $select_sql1 . " " . $vvv . " group by ds_lb order by ds_lb DESC";
        $re_sql2 = "SELECT  ds_lb,sum(sum_m) as sum_m,sum(sz) as zs,sum(user_sf) as usersf,sum(user_sq) as user_ds FROM " . $tb_name . "  WHERE  " . $select_sql2 . " " . $vvv . " group by ds_lb order by ds_lb DESC";
        break;
    case "3":
        $re_sql1 = "SELECT  ds_lb,sum(sum_m) as sum_m,sum(sz) as zs,sum(user_sf+dai_sq+zong_sq) as usersf,sum(user_sq+dai_sq+zong_sq) as user_ds,sum(if(dai='" . $kauser . "',dai_sq,guan_sq)) as you_ds,sum(guanzc) as youzc,sum(if(dai='" . $kauser . "',guan_sf+dai_sq,guan_sf)) as yousf FROM " . $tb_name . "  WHERE  " . $select_sql1 . " " . $vvv . " group by ds_lb order by ds_lb DESC";
        $re_sql2 = "SELECT  ds_lb,sum(sum_m) as sum_m,sum(sz) as zs,sum(user_sf) as usersf,sum(user_sq) as user_ds FROM " . $tb_name . "  WHERE  " . $select_sql2 . " " . $vvv . " group by ds_lb order by ds_lb DESC";
        break;
    case "2":
        $re_sql1 = "SELECT  ds_lb,sum(sum_m) as sum_m,sum(sz) as zs,sum(user_sf+dai_sq) as usersf,sum(user_sq+dai_sq) as user_ds,sum(if(dai='" . $kauser . "',dai_sq,zong_sq)) as you_ds,sum(zongzc) as youzc,sum(if(dai='" . $kauser . "',zong_sf+dai_sq,zong_sf)) as yousf FROM " . $tb_name . "  WHERE  " . $select_sql1 . " " . $vvv . " group by ds_lb order by ds_lb DESC";
        $re_sql2 = "SELECT  ds_lb,sum(sum_m) as sum_m,sum(sz) as zs,sum(user_sf) as usersf,sum(user_sq) as user_ds FROM " . $tb_name . "  WHERE  " . $select_sql2 . " " . $vvv . " group by ds_lb order by ds_lb DESC";
        break;
    case "1":
        $re_sql1 = "SELECT  ds_lb,sum(sum_m) as sum_m,sum(sz) as zs,sum(user_sf) as usersf,sum(user_sq) as user_ds,sum(dai_sq) as you_ds,sum(daizc) as youzc,sum(dai_sf) as yousf FROM " . $tb_name . "  WHERE  " . $select_sql1 . " " . $vvv . " group by ds_lb order by ds_lb DESC";
        $re_sql2 = "SELECT  ds_lb,sum(sum_m) as sum_m,sum(sz) as zs,sum(user_sf) as usersf,sum(user_sq) as user_ds FROM " . $tb_name . "  WHERE  " . $select_sql2 . " " . $vvv . " group by ds_lb order by ds_lb DESC";
        break;
    default:
        echo "<center>你没有该权限功能!</center>";
        exit;
}
$result = $db1->query($re_sql1);
$rs1_table = array();
while ($row = $result->fetch_assoc()) {
    $rs1_table[$row['ds_lb']] = $row;
}
$rs1_count = count($rs1_table);
$result = $db1->query($re_sql2);
$rs2_table = array();
while ($row = $result->fetch_assoc()) {
    $rs2_table[$row['ds_lb']] = $row;
}
$rs2_count = count($rs2_table);
$z_zs1 = $z_zs2 = 0;
$z_sum1 = $z_sum2 = 0;
$z_usersf1 = $z_usersf2 = 0;
$z_userds1 = $z_userds2 = 0;
$z_you_zc1 = $z_you_zc2 = 0;
$z_you_ds1 = $z_you_ds2 = 0;
$z_you_sf1 = $z_you_sf2 = 0;
?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<script src="js/function.js" type="text/javascript"></script>
<script src="js/report_func.js" type="text/javascript"></script>
<body style="min-width: 1200px;width: 100%">
 <div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">注单查询</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright">
     <table width="874" border="0" cellspacing="0" cellpadding="0">
        <tbody>  
        <tr>
        <td height="28" style="color:#fff;">
            <font color="#CC0000">分类报表</font>--
            <?
if($kithe!= "")
	{?>
            第
            <?=$kithe?>期
            <? } else { ?>
            日期区间：
            <?=$date_start?>~
            <?=$date_end?>

            <? }?> &nbsp;&nbsp;(以下所有结果均包含退水) -- <a href="main.php?action=report&uid=<?=$uid?>&vip=<?=$vip?>">回报表查询</a>
        </td>
        </tr>
        </tbody>
    </table>
    </div></div>
    <?
if (0 < $rs1_count) {?>
   <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list bet">
         <tr>
            <td height="18" colspan="9" align="center" nowrap="nowrap" class="t_list_caption">结果</td>
        </tr>
         <tr>
            <td height="18" align="center" nowrap="nowrap" class="t_list_tr_3">序号</td>
            <td align="center" class="t_list_tr_3">类型</td>
            <td align="center" class="t_list_tr_3">组数</td>
            <td align="center" class="t_list_tr_3">下注金额</td>
            <td align="center" class="t_list_tr_3">结果</td>
            <td align="center" class="t_list_tr_3">退水</td>
            <td align="center" class="t_list_tr_3">您占成</td>
            <td align="center" class="t_list_tr_3">您赚水</td>
            <td align="center" bgcolor="#CC0000" class="t_list_tr_3">您的结果</td>
        </tr>
        <?
    $ii = 0;
    $i = 0;
    for (; $i < $ds_count; $i += 1) {
        $zs1 = $sum_m = $usersf = $userds = $youzc = $youds = $yousf = 0;
        $zs1 = $rs1_table[$dstable[$i]['ds_lb']]['zs'];
        $z_zs1 += $zs1;
        $sum_m = $rs1_table[$dstable[$i]['ds_lb']]['sum_m'];
        $z_sum1 += $sum_m;
        $usersf = $rs1_table[$dstable[$i]['ds_lb']]['usersf'];
        $z_usersf1 += $usersf;
        $userds = $rs1_table[$dstable[$i]['ds_lb']]['user_ds'];
        $z_userds1 += $userds;
        $youzc = $rs1_table[$dstable[$i]['ds_lb']]['youzc'];
        $z_you_zc1 += $youzc;
        $youds = $rs1_table[$dstable[$i]['ds_lb']]['you_ds'];
        $z_you_ds1 += $youds;
        $yousf = $rs1_table[$dstable[$i]['ds_lb']]['yousf'];
        $z_you_sf1 += $yousf;
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
                <?=$zs1?>
            </td>
            <td align="center" nowrap="nowrap"><a href="main.php?action=report_m6&uid=<?=$uid?>&vip=<?=$vip?>&kithe=<?=$kithe?>&date_start=<?=$date_start?>&date_end=<?$date_end?>&gtype=<?$dstable[$i]['ds_lb']?>"><?=round($sum_m, 2)?></a>
            </td>
            <td height="28" align="center" nowrap="nowrap">
                <?=round($usersf, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($userds, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($youzc, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($youds, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($yousf, 2)?>
            </td>
        </tr>
        <?       }
    }
?>
        <tr class="t_list_tr_2">
            <td height="18" align="center" nowrap="nowrap">&nbsp;</td>
            <td align="center" nowrap="nowrap">总计</td>
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
                <?=round($z_you_zc1, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($z_you_ds1, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($z_you_sf1, 2)?>
            </td>
        </tr>
    </table><br>
    <?}
if (0 < $rs2_count) { ?>
    <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list bet">
         <tr>
            <td height="18" colspan="6" nowrap="nowrap" class="t_list_caption">外调走飞结果</td>
        </tr>
         <tr>
            <td height="18" align="center" nowrap="nowrap" class="t_list_tr_3">序号</td>
            <td align="center" class="t_list_tr_3">类型</td>
            <td align="center" class="t_list_tr_3">组数</td>
            <td align="center" class="t_list_tr_3">下注金额</td>
            <td align="center" class="t_list_tr_3">退水</td>
            <td align="center" bgcolor="#CC0000" class="t_list_tr_3">结果</td>
        </tr>
        <?
    $ii = 0;
    $i = 0;
    for (; $i < $ds_count; $i += 1) {
        $zs2 = $sum_m = $usersf = $userds = $yousf = 0;
        $zs2 = $rs2_table[$dstable[$i]['ds_lb']]['zs'];
        $z_zs2 += $zs2;
        $sum_m = $rs2_table[$dstable[$i]['ds_lb']]['sum_m'];
        $z_sum2 += $sum_m;
        $usersf = $rs2_table[$dstable[$i]['ds_lb']]['usersf'];
        $z_usersf2 += $usersf;
        $userds = $rs2_table[$dstable[$i]['ds_lb']]['user_ds'];
        $z_userds2 += $userds;
        $yousf = $usersf;
        $z_you_sf2 += $yousf;
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
            <td align="center" nowrap="nowrap"><a href="main.php?action=report_m6&uid=<?=$uid?>&vip=<?=$vip?>&kithe=<?=$kithe?>&date_start=<?=$date_start?>&date_end=<?=$date_end?>&gtype=<?=$dstable[$i]['ds_lb']?>&lx=<?=$lx?>">
                    <?=round($sum_m, 2)?>
                </a></td>
            <td align="center" nowrap="nowrap">
                <?=round($userds, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($yousf, 2)?>
            </td>
        </tr>
        <?   }
    }?>



        <tr class="t_list_tr_2">
            <td height="18" align="center" nowrap="nowrap">&nbsp;</td>
            <td align="center" nowrap="nowrap">总计</td>
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
                <?=round($z_you_sf2, 2)?>
            </td>
        </tr>
    </table><br>
    <? }
if (0 < $rs1_count || 0 < $rs2_count) {
	?>
    <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list bet">
         <tr>
            <td height="18" colspan="7" nowrap="nowrap" class="t_list_caption">总计</td>
        </tr>
         <tr>
            <td height="18" align="center" class="t_list_tr_3">组数</td>
            <td align="center" class="t_list_tr_3">下注金额</td>
            <td align="center" class="t_list_tr_3">结果</td>
            <td align="center" class="t_list_tr_3">退水</td>
            <td align="center" class="t_list_tr_3">您占成</td>
            <td align="center" class="t_list_tr_3">您赚水</td>
            <td align="center" bgcolor="#CC0000" class="t_list_tr_3">您的结果</td>
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
                <?=round($z_you_zc1 - $z_sum2, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($z_you_ds1, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($z_you_sf1 + $z_you_sf2, 2)?>
            </td>
        </tr>
    </table>
    <? } else {
   ?>
    <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr>
            <td align=center height="30" bgcolor="#CC0000">
                <marquee align="middle" behavior="alternate" width="200">
                    <font color="#FFFFFF">查无任何资料</font>
                </marquee>
            </td>
        </tr>
        <tr>
            <td align=center height="20" bgcolor="#CCCCCC"><a href="javascript:history.go(-1);">离开</a></td>
        </tr>
    </table>
    <? }?>
    </div>
</body>