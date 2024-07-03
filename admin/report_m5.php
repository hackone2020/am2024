<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
if (strpos($flag, "09")) {
} else {
    echo "<center>你没有该权限功能!</center>";
    exit;
}
$gtype = $_GET['gtype'];
$user = $_GET['user'];
$vvv = " ";
if ($user == "") {
    echo "<script>alert('用户不能为空!请重新查询'); window.location.href = 'main.php?action=report&uid=" . $uid . "';</script>";
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
if ($gtype != "") {
    $vvv .= " and ds_lb='" . $gtype . "' ";
    $result = $db1->query("select ds from web_config_ds where ds_lb='" . $gtype . "' order by id desc LIMIT 1");
    $ds_row = $result->fetch_array();
    $class2 = $ds_row['ds'];
} else {
    $class2 = "";
}
$z_zs1 = $z_zs2 = 0;
$z_st1 = $z_st2 = 0;
$z_sum1 = $z_sum2 = 0;
$z_gs1 = $z_gs2 = 0;
$z_dagu1 = $z_dagu2 = 0;
$z_guan1 = $z_guan2 = 0;
$z_zong1 = $z_zong2 = 0;
$z_dai1 = $z_dai2 = 0;
$z_userds1 = $z_userds2 = 0;
$z_daids1 = $z_daids2 = 0;
$z_zongds1 = $z_zongds2 = 0;
$z_guands1 = $z_guands2 = 0;
$z_daguds1 = $z_daguds2 = 0;
$z_usersf1 = $z_usersf2 = 0;
$z_daisf1 = $z_daisf2 = 0;
$z_zongsf1 = $z_zongsf2 = 0;
$z_guansf1 = $z_guansf2 = 0;
$z_dagusf1 = $z_dagusf2 = 0;
$z_gssf1 = $z_gssf2 = 0;
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
            <font color="#CC0000">当前查询</font>--
            <? if ($kithe != "") {?>
            第
            <?=$kithe?>期
            <?} else {?>
            日期区间：
            <?=$date_start?> ~
            <?=$date_end?>

            <?}?>
            &nbsp;&nbsp;类型:
            <? if ($class2 != "") {?>
            <?=$class2?>
            <?} else {?>
            全部
            <?}?>
            &nbsp;&nbsp;(以下所有结果均包含退水) &nbsp;&nbsp;代理:
            <?=$user?>
            --<a href="javascript:history.go( -1 );"><font color="ffffff"></font>回上一页</a> 
        </td>
        </tr>
        </tbody>
    </table>
</div></div>    
    <? $result = $db1->query("SELECT username,sum(sz) as zs,sum(sum_m) as sum_m,sum(user_sf) usersf,sum(user_sq) user_ds,sum(dai_sq) dai_ds,sum(zong_sq) zong_ds,sum(guan_sq) guan_ds,sum(dagu_sq) dagu_ds,sum(daizc) as daizc,sum(dai_sf) as daisf,sum(zongzc) as zongzc,sum(zong_sf) as zongsf,sum(guanzc) as guanzc,sum(guan_sf) as guansf,sum(daguzc) as daguzc,sum(dagu_sf) as dagusf,sum(gszc) as gszc,sum(gs_sf) as gssf FROM " . $tb_name . "  WHERE dai='" . $user . "' and username!='" . $user . "' " . $vvv . " group by username order by username DESC");
$ii = 0;
if ($result->num_rows != 0) {?>
    <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list bet">
        <tr>
            <td height="18" colspan="11" align="center" nowrap="nowrap"  class="t_list_caption">下级会员注单</td>
        </tr>
        <tr>
            <td height="18" align="center" nowrap="nowrap"  class="t_list_tr_3">序号</td>
            <td align="center"  class="t_list_tr_3">会员</td>
            <td align="center"  class="t_list_tr_3">组数</td>
            <td align="center"  class="t_list_tr_3">下注金额</td>
            <td align="center"  class="t_list_tr_3">结果</td>
            <td align="center"  class="t_list_tr_3">退水</td>
            <td align="center"  class="t_list_tr_3">代理占成金额</td>
            <td align="center"  class="t_list_tr_3">代理赚水</td>
            <td align="center" bgcolor="#CC0000"  class="t_list_tr_3">代理结果</td>
            <td align="center"  class="t_list_tr_3">与会员交收</td>
            <td align="center"  class="t_list_tr_3">与总代理交收</td>
        </tr>
        <? while ($rs = $result->fetch_array()) {
        $sum_m = $usersf = $daisf = $zongsf = $guansf = $dagusf = $gssf = $userds = $daids = $zongds = $guands = $daguds = $daizc = $zongzc = $guanzc = $daguzc = $gszc = 0;
        ++$ii;
        $z_zs1 += $rs['zs'];
        $sum_m = $rs['sum_m'];
        $z_sum1 += $sum_m;
        $usersf = $rs['usersf'];
        $z_usersf1 += $usersf;
        $userds = $rs['user_ds'];
        $z_userds1 += $userds;
        $daizc = $rs['daizc'];
        $z_dai1 += $daizc;
        $daisf = $rs['daisf'];
        $z_daisf1 += $daisf;
        $daids = $rs['dai_ds'];
        $z_daids1 += $daids;
        $zongzc = $rs['zongzc'];
        $z_zong1 += $zongzc;
        $zongsf = $rs['zongsf'];
        $z_zongsf1 += $zongsf;
        $zongds = $rs['zong_ds'];
        $z_zongds1 += $zongds;
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
        $result2 = $db1->query("select * from web_member where  kauser='" . $rs['username'] . "' order by id LIMIT 1");
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
                <?=$rs['username']?>
                <?=$xm?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=$rs['zs']?>
            </td>
            <td align="center" nowrap="nowrap"><a href='main.php?action=report_m6&uid=<?=$uid?>&kithe=<?=$kithe?>&user=<?=$rs['username']?>&date_start=<?=$date_start?>&date_end=<?=$date_end?>&gtype=<?=$gtype?>' >
                    <?=round($sum_m, 2)?>
                </a>
            </td>
            <td height="28" align="center" nowrap="nowrap">
                <?=round($usersf, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($userds, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($daizc, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($daids, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($daisf, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=get_sf(round(0 - $usersf, 2))?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=get_sf(round($usersf + $daisf, 2))?>
            </td>
        </tr>
        <?}?>
        <tr  class="t_list_tr_2">
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
                <?=round($z_dai1, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($z_daids1, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($z_daisf1, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=get_sf(round(0 - $z_usersf1, 2))?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=get_sf(round($z_usersf1 + $z_daisf1, 2))?>
            </td>
        </tr>
    </table><br>
    <?}
$result = $db1->query("SELECT username,sum(sz) as zs,sum(sum_m) as sum_m,sum(user_sf) usersf,sum(user_sq) user_ds,sum(zong_sq) zong_ds,sum(guan_sq) guan_ds,sum(dagu_sq) dagu_ds,sum(zongzc) as zongzc,sum(zong_sf) as zongsf,sum(guanzc) as guanzc,sum(guan_sf) as guansf,sum(daguzc) as daguzc,sum(dagu_sf) as dagusf,sum(gszc) as gszc,sum(gs_sf) as gssf FROM " . $tb_name . "  WHERE lx=1 and username='" . $user . "' " . $vvv . " group by username order by username DESC");
$ii = 0;
if ($result->num_rows != 0) {?>
   <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list bet">
        <tr>
            <td height="18" colspan="7" nowrap="nowrap"  class="t_list_caption"代理补货走飞结果</td>
        </tr>
        <tr>
            <td height="18" align="center" nowrap="nowrap"  class="t_list_tr_3">序号</td>
            <td align="center"  class="t_list_tr_3">代理</td>
            <td align="center"  class="t_list_tr_3">组数</td>
            <td align="center"  class="t_list_tr_3">下注金额</td>
            <td align="center" bgcolor="#CC0000"  class="t_list_tr_3">代理结果</td>
            <td align="center"  class="t_list_tr_3">退水</td>
            <td align="center"  class="t_list_tr_3">与总代理交收</td>
        </tr>
        <? while ($rs = $result->fetch_array()) {
        $sum_m = $usersf = $daisf = $zongsf = $guansf = $dagusf = $gssf = $userds = $daids = $zongds = $guands = $daguds = $daizc = $zongzc = $guanzc = $daguzc = $gszc = 0;
        ++$ii;
        $z_zs2 += $rs['zs'];
        $sum_m = $rs['sum_m'];
        $z_sum2 += $sum_m;
        $usersf = $rs['usersf'];
        $z_usersf2 += $usersf;
        $userds = $rs['user_ds'];
        $z_userds2 += $userds;
        $daisf = $usersf;
        $z_daisf2 += $daisf;
        $daids = $userds;
        $zongzc = $rs['zongzc'];
        $z_zong2 += $zongzc;
        $zongsf = $rs['zongsf'];
        $z_zongsf2 += $zongsf;
        $zongds = $rs['zong_ds'];
        $z_zongds2 += $zongds;
        $guanzc = $rs['guanzc'];
        $z_guan2 += $guanzc;
        $guansf = $rs['guansf'];
        $z_guansf2 += $guansf;
        $guands = $rs['guan_ds'];
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
            <td align="center" nowrap="nowrap"><a href='main.php?action=report_m6&uid=<?=$uid?>&kithe=<?=$kithe?>&user=<?=$rs['username']?>&date_start=<?=$date_start?>&date_end=<?=$date_end?>&gtype=<?=$gtype?>&lx=1' ><?=round($sum_m, 2)?>
                </a></td>
            <td height="28" align="center" nowrap="nowrap"><?=round($usersf, 2)?>
            </td>
            <td align="center" nowrap="nowrap"><?=round($userds, 2)?>
            </td>
            <td align="center" nowrap="nowrap"><?=get_sf(round($usersf, 2))?>
            </td>
        </tr>
        <?}?>
        <tr  class="t_list_tr_2">
            <td height="18" align="center" nowrap="nowrap">&nbsp;</td>
            <td align="center" nowrap="nowrap">总计</td>
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
                <?=get_sf(round($z_usersf2, 2))?>
            </td>
        </tr>
    </table><br>
    <?}?>
    <? if ($z_zs1 != 0 || $z_zs2 != 0) {?>
    <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list bet">
        <tr>
            <td height="18" colspan="9" nowrap="nowrap" class="t_list_caption">总计</td>
        </tr>
        <tr>
            <td height="18" align="center"  class="t_list_tr_3">组数</td>
            <td align="center"  class="t_list_tr_3">下注金额</td>
            <td align="center"  class="t_list_tr_3">结果</td>
            <td align="center"  class="t_list_tr_3">退水</td>
            <td align="center"  class="t_list_tr_3">代理占成</td>
            <td align="center"  class="t_list_tr_3">代理赚水</td>
            <td align="center" bgcolor="#CC0000"  class="t_list_tr_3">代理结果</td>
            <td align="center"  class="t_list_tr_3">与会员交收</td>
            <td align="center"  class="t_list_tr_3">与总代理交收</td>
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
                <?=round($z_userds1, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($z_dai1 - $z_sum2, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($z_daids1, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($z_daisf1 + $z_daisf2, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=get_sf(round(0 - $z_usersf1, 2))?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=get_sf(round($z_usersf1 + $z_daisf1, 2) + round($z_usersf2, 2))?>
            </td>
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
    </div>