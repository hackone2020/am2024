<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
if (strpos($flag, "11")) {
} else {
    echo "<center>你没有该权限功能!</center>";
    exit;
}
$vvv = "";
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
$gtype = $_GET['gtype'];
$wtype = $_GET['wtype'];
$user = $_GET['user'];
if ($user == "") {
    echo "<script>alert('用户不能为空!请重新查询'); window.location.href = 'main.php?action=real_list_manage&uid=" . $uid . "';</script>";
    exit;
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
if ($kithe == $Current_Kithe_Num) {
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
if ($gtype != "") {
    $vvv .= " and ds_lb='" . $gtype . "' ";
    $result = $db1->query("select ds from web_config_ds where ds_lb='" . $gtype . "' order by id desc LIMIT 1");
    $ds_row = $result->fetch_array();
    $class2 = $ds_row['ds'];
} else {
    $class2 = "";
}
if ($wtype != "") {
    if ($wtype == 1) {
        $qx = 1;
    } else {
        $qx = 0;
    }
    $vvv .= " and qx='" . $qx . "' ";
}
$z_zs1 = $z_zs2 = $z_zs3 = 0;
$z_st1 = $z_st2 = $z_st3 = 0;
$z_sum1 = $z_sum2 = $z_sum3 = 0;
$z_gs1 = $z_gs2 = $z_gs3 = 0;
$z_dagu1 = $z_dagu2 = $z_dagu3 = 0;
$z_guan1 = $z_guan2 = $z_guan3 = 0;
$z_zong1 = $z_zong2 = $z_zong3 = 0;
$z_dai1 = $z_dai2 = $z_dai3 = 0;
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
            <font color="#CC0000">当前查询</font>--<?if ($kithe != "") {?>第<?=$kithe?>期<? } else {?>日期区间：<?=$date_start?> ~<?=$date_end?>

            <?}?>
            &nbsp;&nbsp;类型:<? if ($class2 != "") {?><?=$class2?><?} else {?>
            全部
            <?}?>
            &nbsp;&nbsp;注单状态:
            <? if ($wtype != "") {?>
            <?  if ($wtype == 1) {
     echo   "注销";
    } else {
    echo   "有效";
    }} else {
 echo   "全部";
}?>
            &nbsp;&nbsp;股东:<?=$user?>--<a href="javascript:history.go( -1 );"><font color="ffffff">回上一页</font>
        </td>
        </tr>
        </tbody>
    </table>
    </div></div>
    <? $result = $db1->query("SELECT  zong,sum(sum_m) as sum_m,sum(sz) as zs,sum(gszc) as gszc,sum(daguzc) as daguzc,sum(guanzc) as guanzc,sum(zongzc) as zongzc,sum(daizc) as daizc,sum(sum_m-sum_m*zong_ds/100) as sum_st FROM " . $tb_name . "  WHERE guan='" . $user . "' and dai!='" . $user . "' and username!='" . $user . "' " . $vvv . " group by zong order by zong DESC");
$ii = 0;
if ($result->num_rows!= 0) {?>
     <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list bet">
        <tr>
            <td colspan="10" align="center" nowrap="nowrap" class="t_list_caption">下级总代理注单</td>
        </tr>
        <tr>
            <td align="center" nowrap="nowrap" class="t_list_tr_3">序号</td>
            <td align="center" class="t_list_tr_3">总代理</td>
            <td align="center" class="t_list_tr_3">组数</td>
            <td align="center" class="t_list_tr_3">下注金额</td>
            <td align="center" class="t_list_tr_3">实投</td>
            <td align="center" class="t_list_tr_3">公司占成</td>
            <td align="center" class="t_list_tr_3">大股东占成</td>
            <td align="center" class="t_list_tr_3">股东占成</td>
            <td align="center" class="t_list_tr_3">总代理占成</td>
            <td align="center" class="t_list_tr_3">代理占成</td>
        </tr>
        <? while ($rs = $result->fetch_array()) {
        ++$ii;
        $zs1 = $rs['zs'];
        $z_st1 += $rs['sum_st'];
        $z_zs1 += $rs['zs'];
        $z_sum1 += $rs['sum_m'];
        $z_gs1 += $rs['gszc'];
        $z_dagu1 += $rs['daguzc'];
        $z_guan1 += $rs['guanzc'];
        $z_zong1 += $rs['zongzc'];
        $z_dai1 += $rs['daizc'];
        $result2 = $db1->query("select * from web_agent where  kauser='" . $rs['zong'] . "' order by id LIMIT 1");
        $row11 = $result2->fetch_array();
        if ($row11 != "") {
            $xm = "<font color=#cc0000> (" . $row11['xm'] . ")</font>";
        } else {
            $xm = "";
        }?>
        <tr bgcolor="#ffffff" onmouseover="javascript:this.bgColor='#FFFFA2'" onmouseout="javascript:this.bgColor='#ffffff'">
            <td align="center" nowrap="nowrap">
                <?=$ii?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=$rs['zong']?>
                <?=$xm?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=$rs['zs']?>
            </td>
    <td align="center" nowrap="nowrap"><a href='main.php?action=real_list_m4&uid=<?=$uid?>&kithe=<?=$kithe?>&user=<?=$rs['zong']?>&date_start=<?=$date_start?>&date_end=<?=$date_end?>&gtype=<?=$gtype?>&wtype=<?=$wtype?>' ><?=round($rs['sum_m'], 2)?></a></td>
            <td align="center" nowrap="nowrap"><?=round($rs['sum_st'], 2)?></td>
            <td align="center" nowrap="nowrap"><?=round($rs['gszc'], 2)?></td>
            <td align="center" nowrap="nowrap"><?=round($rs['daguzc'], 2)?></td>
            <td align="center" nowrap="nowrap"><?=round($rs['guanzc'], 2)?></td>
            <td align="center" nowrap="nowrap"><?=round($rs['zongzc'], 2)?></td>
            <td align="center" nowrap="nowrap"><?=round($rs['daizc'], 2)?></td>
        </tr>
        <?}?>
        <tr class="t_list_tr_2">
            <td align="center" nowrap="nowrap">&nbsp;</td>
            <td align="center" nowrap="nowrap">总计</td>
            <td align="center" nowrap="nowrap"><?=$z_zs1?></td>
            <td align="center" nowrap="nowrap"><?=round($z_sum1, 2)?></td>
            <td align="center" nowrap="nowrap"><?=round($z_st1, 2)?></td>
            <td align="center" nowrap="nowrap"><?=round($z_gs1, 2)?></td>
            <td align="center" nowrap="nowrap"><?=round($z_dagu1, 2)?></td>
            <td align="center" nowrap="nowrap"><?=round($z_guan1, 2)?></td>
            <td align="center" nowrap="nowrap"><?=round($z_zong1, 2)?></td>
            <td align="center" nowrap="nowrap"><?=round($z_dai1, 2)?></td>
        </tr>
    </table><br>
    <? }
$result = $db1->query("SELECT  username,sum(sum_m) as sum_m,sum(sz) as zs,sum(gszc) as gszc,sum(daguzc) as daguzc,sum(guanzc) as guanzc,sum(zongzc) as zongzc,sum(daizc) as daizc,sum(sum_m-sum_m*user_ds/100) as sum_st FROM " . $tb_name . "  WHERE guan='" . $user . "' and dai='" . $user . "' and username!='" . $user . "' " . $vvv . " group by username order by username DESC");
$ii = 0;
if ($result->num_rows != 0) {?>
     <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list bet">
        <tr>
            <td colspan="10" align="center" nowrap="nowrap" class="t_list_caption">直属会员注单</td>
        </tr>
        <tr>
            <td align="center" nowrap="nowrap" class="t_list_tr_3">序号</td>
            <td align="center" class="t_list_tr_3">会员</td>
            <td align="center" class="t_list_tr_3">组数</td>
            <td align="center" class="t_list_tr_3">下注金额</td>
            <td align="center" class="t_list_tr_3">实投</td>
            <td align="center" class="t_list_tr_3">公司占成</td>
            <td align="center" class="t_list_tr_3">大股东占成</td>
            <td align="center" class="t_list_tr_3">股东占成</td>
            <td align="center" class="t_list_tr_3">总代理占成</td>
            <td align="center" class="t_list_tr_3">代理占成</td>
        </tr>
        <?  while ($rs = $result->fetch_array()) {
        ++$ii;
        $zs2 = $rs['zs'];
        $z_st2 += $rs['sum_st'];
        $z_zs2 += $rs['zs'];
        $z_sum2 += $rs['sum_m'];
        $z_gs2 += $rs['gszc'];
        $z_dagu2 += $rs['daguzc'];
        $z_guan2 += $rs['guanzc'];
        $z_zong2 += $rs['zongzc'];
        $z_dai2 += $rs['daizc'];
        $result2 = $db1->query("select * from web_member where  kauser='" . $rs['username'] . "' order by id LIMIT 1");
        $row11 = $result2->fetch_array();
        if ($row11 != "") {
            $xm = "<font color=#cc0000> (" . $row11['xm'] . ")</font>";
        } else {
            $xm = "";
        }?>
        <tr bgcolor="#ffffff" onmouseover="javascript:this.bgColor='#FFFFA2'" onmouseout="javascript:this.bgColor='#ffffff'">
            <td align="center" nowrap="nowrap"><?=$ii?></td>
            <td align="center" nowrap="nowrap"><?=$rs['username']?><?=$xm?></td>
            <td align="center" nowrap="nowrap"><?=$rs['zs']?></td>
            <td align="center" nowrap="nowrap"><a href='main.php?action=real_list_m6&uid=<?=$uid?>&kithe=<?=$kithe?>&user=<?=$rs['username']?>&date_start=<?=$date_start?>&date_end=<?=$gtype?>&wtype=<?=$wtype?>' ><?=round($rs['sum_m'], 2)?>
                </a> </td>
            <td align="center" nowrap="nowrap"><?=round($rs['sum_st'], 2)?></td>
            <td align="center" nowrap="nowrap"><?=round($rs['gszc'], 2)?></td>
            <td align="center" nowrap="nowrap"><?=round($rs['daguzc'], 2)?></td>
            <td align="center" nowrap="nowrap"><?=round($rs['guanzc'], 2)?></td>
            <td align="center" nowrap="nowrap"><?=round($rs['zongzc'], 2)?></td>
            <td align="center" nowrap="nowrap"><?= round($rs['daizc'], 2)?></td>
        </tr>
        <?}?>
        <tr class="t_list_tr_2">
            <td align="center" nowrap="nowrap">&nbsp;</td>
            <td align="center" nowrap="nowrap">总计</td>
            <td align="center" nowrap="nowrap"><?=$z_zs2?></td>
            <td align="center" nowrap="nowrap"><?=round($z_sum2, 2)?></td>
            <td align="center" nowrap="nowrap"><?=round($z_st2, 2)?></td>
            <td align="center" nowrap="nowrap"><?=round($z_gs2, 2)?></td>
            <td align="center" nowrap="nowrap"><?=round($z_dagu2, 2)?></td>
            <td align="center" nowrap="nowrap"><?=round($z_guan2, 2)?></td>
            <td align="center" nowrap="nowrap"><?=round($z_zong2, 2)?></td>
            <td align="center" nowrap="nowrap"><?=round($z_dai2, 2)?></td>
        </tr>
    </table><br>
    <? }
$result = $db1->query("SELECT  username,sum(sum_m) as sum_m,sum(sz) as zs,sum(gszc) as gszc,sum(daguzc) as daguzc,sum(guanzc) as guanzc,sum(zongzc) as zongzc,sum(daizc) as daizc,sum(sum_m-sum_m*user_ds/100) as sum_st FROM " . $tb_name . "  WHERE lx=3 and username='" . $user . "' " . $vvv . " group by username order by username DESC");
$ii = 0;
if ($result->num_rows != 0) {?>
    <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list bet">
        <tr>
            <td colspan="7" align="center" nowrap="nowrap" class="t_list_caption">股东走飞补货注单</td>
        </tr>
        <tr>
            <td width="54" align="center" nowrap="nowrap" class="t_list_tr_3">序号</td>
            <td width="133" align="center" class="t_list_tr_3">股东</td>
            <td width="73" align="center" class="t_list_tr_3">组数</td>
            <td width="222" align="center" class="t_list_tr_3">下注金额</td>
            <td width="220" align="center" class="t_list_tr_3">实投</td>
            <td width="251" align="center" class="t_list_tr_3">大股东占成</td>
            <td width="251" align="center" class="t_list_tr_3">公司占成</td>
        </tr>";
        <?  while ($rs = $result->fetch_array()) {
        ++$ii;
        $zs3 = $rs['zs'];
        $z_st3 += $rs['sum_st'];
        $z_zs3 += $rs['zs'];
        $z_sum3 += $rs['sum_m'];
        $z_gs3 += $rs['gszc'];
        $z_dagu3 += $rs['daguzc'];
        $z_guan3 += $rs['guanzc'];
        $z_zong3 += $rs['zongzc'];
        $z_dai3 += $rs['daizc'];
		?>
        <tr bgcolor="#ffffff" onmouseover="javascript:this.bgColor='#FFFFA2'" onmouseout="javascript:this.bgColor='#ffffff'">
            <td align="center" nowrap="nowrap">
                <?=$ii?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=$rs['username']?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=$rs['zs']?>
            </td>
            <td align="center" nowrap="nowrap"><a href='main.php?action=real_list_m6&uid=<?=$uid?>&kithe=<?=$kithe?>&user=<?=$rs['username']?>&date_start=<?=$date_start?>&date_end=<?=$date_end?>&gtype=&wtype=<?=$wtype?>' ><?=round($rs['sum_m'], 2)?></a></td>
            <td align="center" nowrap="nowrap"><?=round($rs['sum_st'], 2)?></td>
            <td align="center" nowrap="nowrap"><?=round($rs['daguzc'], 2)?></td>
            <td align="center" nowrap="nowrap"><?=round($rs['gszc'], 2)?></td>
        </tr>
        <? }?>
        <tr class="t_list_tr_2">
            <td align="center" nowrap="nowrap">&nbsp;</td>
            <td align="center" nowrap="nowrap">总计</td>
            <td align="center" nowrap="nowrap"><?=$z_zs3?></td>
            <td align="center" nowrap="nowrap"><?=round($z_sum3, 2)?></td>
            <td align="center" nowrap="nowrap"><?=round($z_st3, 2)?></td>
            <td align="center" nowrap="nowrap"><?=round($z_dagu3, 2)?></td>
            <td align="center" nowrap="nowrap"><?=round($z_gs3, 2)?></td>
        </tr>
    </table><br>
    <?}
if ($z_zs1 != 0 || $z_zs2 != 0 || $z_zs3 != 0) {?>
     <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list bet">
        <tr>
            <td colspan="8" align="center" nowrap="nowrap" class="t_list_caption">总计</td>
        </tr>
        <tr>
            <td align="center"  class="t_list_tr_3">组数</td>
            <td align="center"  class="t_list_tr_3">下注金额</td>
            <td align="center"  class="t_list_tr_3">实投</td>
            <td align="center"  class="t_list_tr_3">公司占成</td>
            <td align="center"  class="t_list_tr_3">大股东占成</td>

            <td align="center"  class="t_list_tr_3">股东占成</td>
            <td align="center"  class="t_list_tr_3">总代理占成</td>
            <td align="center"  class="t_list_tr_3">代理占成</td>
        </tr>
        <tr class="t_list_tr2">
            <td align="center" nowrap="nowrap"><?=$z_zs1 + $z_zs2 + $z_zs3?></td>
            <td align="center" nowrap="nowrap"><?=round($z_sum1 + $z_sum2 + $z_sum3, 2)?>
            </td>
            <td align="center" nowrap="nowrap"><?=round($z_st1 + $z_st2 + $z_st3, 2)?></td>
            <td align="center" nowrap="nowrap"><?=round($z_gs1 + $z_gs2 + $z_gs3, 2)?></td>
            <td align="center" nowrap="nowrap"><?=round($z_dagu1 + $z_dagu2 + $z_dagu3, 2)?></td>
            <td align="center" nowrap="nowrap"><?=round($z_guan1 + $z_guan2 - $z_sum3, 2)?></td>
            <td align="center" nowrap="nowrap"><?=round($z_zong1 + $z_zong2 + $z_zong3, 2)?></td>
            <td align="center" nowrap="nowrap"></td>
        </tr>
    </table>
    <?} else {?>
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
    <?}?>
</body>