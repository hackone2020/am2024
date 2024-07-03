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
if ($gtype != "") {
    $vvv .= " and ds_lb='" . $gtype . "' ";
    $result = $db1->query("select ds from web_config_ds where ds_lb='" . $gtype . "' order by id desc LIMIT 1");
    $ds_row = $result->fetch_array();
    $class2 = $ds_row['ds'];
} else {
    $class2 = "";
}
$z_zs1 = $z_zs2 = 0;
$z_sum1 = $z_sum2 = 0;
$z_userds1 = $z_userds2 = 0;
$z_usersf1 = $z_usersf2 = 0;
$z_gs1 = $z_gs2 = 0;
$z_gssf1 = $z_gssf2 = 0;
?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<script src="js/function.js" type="text/javascript"></script>
<script src="js/report_func.js" type="text/javascript"></script>
<body style="min-width: 1200px;width: 100%">
<div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;报表查询</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright">
     <table border="0" align="right" cellpadding="0" cellspacing="0">
        <tbody>
         <tr>
           <td height="28" style="color:#fff;">
            <? if ($kithe != "") {?>第<?=$kithe?>期<?} else {?>日期区间： <?=$date_start?> ~<?=$date_end?><?}?> &nbsp;&nbsp;类型:
            <?if ($class2 != "") { echo $class2;} else { echo "全部";}?>
            &nbsp;&nbsp;(以下所有结果均包含退水) --<a href="javascript:history.go(-1);"><font color="#ffffff">回上一页</font></a>
        </td>
        </tr>
     </tbody>
    </table>
  </div>
</div>  
    <? 
    $result4 = $db1->query("select sum(gszc) as gszc from " . $tb_name . " WHERE dagu!='外调' " . $vvv . " LIMIT 1");
$Rs8 = $result4->fetch_array();
$z_gszc = $Rs8['gszc'];
$result = $db1->query("SELECT dagu,sum(sz) as zs,sum(sum_m) as sum_m,sum(user_sf) usersf,sum(user_sq) user_ds,sum(dai_sq) dai_ds,sum(zong_sq) zong_ds,sum(guan_sq) guan_ds,sum(dagu_sq) dagu_ds,sum(gszc) as gszc,sum(gs_sf) as gssf FROM " . $tb_name . "  WHERE dagu!='外调' " . $vvv . " group by dagu order by dagu DESC");
$ii = 0;
if ($result->num_rows != 0) {?>
   <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
        <tr>
            <td height="18" colspan="10" align="center" nowrap="nowrap" class="t_list_caption">下级大股东注单</td>
        </tr>
        <tr>
            <td align="center"  class="t_list_tr_3">序号</td>
            <td align="center" class="t_list_tr_3">大股东</td>
            <td align="center" class="t_list_tr_3">组数</td>
            <td align="center" class="t_list_tr_3">下注金</td>
            <td align="center" class="t_list_tr_3">结果</td>
            <td align="center" class="t_list_tr_3">退水</td>
            <td align="center" class="t_list_tr_3">公司占成金额</td>
            <td align="center" class="t_list_tr_3">比例</td>
            <td align="center" class="t_list_tr_3">公司结果</td>
            <td align="center" class="t_list_tr_3">与大股东交收</td>
        </tr>
        <? while ($rs = $result->fetch_array()) {
        $sum_m = $usersf = $userds = $gszc = $gssf = 0;
        ++$ii;
        $z_zs1 += $rs['zs'];
        $sum_m = $rs['sum_m'];
        $z_sum1 += $sum_m;
        $usersf = $rs['usersf'] + $rs['dai_ds'] + $rs['zong_ds'] + $rs['guan_ds'] + $rs['dagu_ds'];
        $z_usersf1 += $usersf;
        $userds = $rs['user_ds'] + $rs['dai_ds'] + $rs['zong_ds'] + $rs['guan_ds'] + $rs['dagu_ds'];
        $z_userds1 += $userds;
        $gszc = $rs['gszc'];
        $z_gs1 += $gszc;
        $gssf = $rs['gssf'];
        $z_gssf1 += $gssf;
        $result2 = $db1->query("select * from web_agent where  kauser='" . $rs['dagu'] . "' order by id LIMIT 1");
        $row11 = $result2->fetch_array();
        if ($row11 != "") {
            $xm = "<font color=#cc0000> (" . $row11['xm'] . ")</font>";
        } else {
            $xm = "";
        }?>
            <tr bgcolor="#ffffff" onmouseover="javascript:this.bgColor='#FFFFA2'" onmouseout="javascript:this.bgColor='#ffffff'">
            <td height="30" align="center" nowrap="nowrap">
                <?=$ii?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=$rs['dagu']?>
                <?=$xm?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=$rs['zs']?>
            </td>
            <td align="center" nowrap="nowrap"><a href='main.php?action=report_m2&uid=<?=$uid?>&kithe=<?=$kithe?>&user=<?=$rs['dagu']?>&date_start=<?=$date_start?>&date_end=<?=$date_end?>&gtype=<?=$gtype?>'><?=round($sum_m, 2)?>
                </a> </td>
            <td height="28" align="center" nowrap="nowrap">
                <?=round($usersf, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($userds, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($gszc,2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=@round($gszc/$z_gszc,4) * 100?>
                %
            </td>
            <td align="center" nowrap="nowrap">
                <?=round($gssf, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=get_sf(round($gssf, 2))?>
            </td>
        </tr>
        <?}?>
        <tr class="t_list_tr_2">
            <td height="22" align="center" nowrap="nowrap">&nbsp;</td>
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
                <?=round($z_gs1, 2)?>
            </td>
            <td align="center" nowrap="nowrap">100%</td>
            <td align="center" nowrap="nowrap">
                <?=round($z_gssf1, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
                <?=get_sf(round($z_gssf1, 2))?>
            </td>
        </tr>
    </table><br>
    <? }
$result = $db1->query("SELECT  username,sum(sz) as zs,sum(sum_m) as sum_m,sum(user_sf) usersf,sum(user_sq) user_ds FROM " . $tb_name . " where lx=5 and dagu='外调' " . $vvv . " group by username order by username DESC");
$ii = 0;
if ($result->num_rows!= 0) {?>
       <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
        <tr>
            <td height="18" colspan="8" nowrap="nowrap" class="t_list_caption">公司外调走飞结果</td>
        </tr>
        <tr>
            <td height="18" align="center" nowrap="nowrap" class="t_list_tr_3">序号</td>
            <td align="center" class="t_list_tr_3">公司</td>
            <td align="center" class="t_list_tr_3">组数</td>
            <td align="center" class="t_list_tr_3">下注金额</td>
            <td align="center" class="t_list_tr_3">结果</td>
            <td align="center" class="t_list_tr_3">退水</td>
            <td align="center" class="t_list_tr_3">公司结果</td>
            <td align="center" class="t_list_tr_3">外调交收</td>
        </tr>
        <?
        while ($rs = $result->fetch_array()) {
        $sum_m = $usersf = $userds = $gssf = $gszc = 0;
        ++$ii;
        $z_zs2 += $rs['zs'];
        $sum_m = $rs['sum_m'];
        $z_sum2 += $sum_m;
        $usersf = $rs['usersf'];
        $z_usersf2 += $usersf;
        $userds = $rs['user_ds'];
        $z_userds2 += $userds;
        $gssf = 0 - $usersf;
        $z_gssf2 += $gssf;
?>
 <tr bgcolor="#ffffff" onmouseover="javascript:this.bgColor='#FFFFA2'" onmouseout="javascript:this.bgColor='#ffffff'">
            <td height="30" align="center" nowrap="nowrap"><?=$ii?></td>
            <td align="center" nowrap="nowrap"><?=$rs['username']?></td>
            <td align="center" nowrap="nowrap"><?=$rs['zs']?></td>
            <td align="center" nowrap="nowrap"><a href='main.php?action=report_m6&uid=<?=$uid?>&kithe=<?=$kithe?>&user=<?=$rs['username']?>&date_start=<?=$date_start?>&date_end=<?=$date_end?>&gtype=<?=$gtype?>&lx=5' ><?=round($sum_m, 2)?></a></td>
            <td height=" 28" align="center" nowrap="nowrap"><?=round($usersf, 2)?></td>
            <td align="center" nowrap="nowrap"><?=round($userds, 2)?></td>
            <td align="center" nowrap="nowrap"><?=round($gssf, 2);?></td>
            <td align="center" nowrap="nowrap"><?=get_sf(round($gssf, 2))?></td>
        </tr>
        <?}?>
      <tr class="t_list_tr_2">
            <td height="22" align="center" nowrap="nowrap">&nbsp;</td>
            <td align="center" nowrap="nowrap">总计</td>
            <td align="center" nowrap="nowrap"><?=round($z_zs2, 2)?></td>
            <td align="center" nowrap="nowrap"><?=round($z_sum2, 2)?></td>
            <td align="center" nowrap="nowrap"><?=round($z_usersf2, 2)?></td>
            <td align="center" nowrap="nowrap"><?=round($z_userds2, 2)?></td>
            <td align="center" nowrap="nowrap"><?=round($z_gssf2, 2)?></td>
            <td align="center" nowrap="nowrap"><?=get_sf(round($z_gssf2, 2))?></td>
        </tr>
    </table><br>
    <? }
    if ($z_zs1 != 0 || $z_zs2 != 0) {?>
     <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
        <tr class="t_list_tr_2">
            <td height="18" colspan="6" nowrap="nowrap" align="center" class="t_list_caption">总计</td>
        </tr>
        <tr class="t_list_tr_2">
            <td height="18" align="center" class="t_list_tr_3">组数</td>
            <td align="center" class="t_list_tr_3">下注金额</td>
            <td align="center" class="t_list_tr_3">结果</td>
            <td align="center" class="t_list_tr_3">退水</td>
            <td align="center" class="t_list_tr_3">公司占成</td>
           <td align="center" bgcolor="#CC0000" class="t_list_tr_3">公司结果</td>
        </tr>
        <tr class="t_list_tr_2">
            <td height="18" align="center" nowrap="nowrap">
              <?=round($z_zs1 + $z_zs2, 2)?></td>
            <td align="center" nowrap="nowrap">
               <?=round($z_sum1 + $z_sum2, 2)?>
            </td>
            <td align="center" nowrap="nowrap">
               <?=round($z_usersf1 + $z_usersf2, 2)?></td>
            <td align="center" nowrap="nowrap">
               <?=round($z_userds1 + $z_userds2, 2)?> </td>
            <td align="center" nowrap="nowrap">
                <?=round($z_gs1 + $z_gs2, 2)?></td>
            <td align="center" nowrap="nowrap">
                <?=round($z_gssf1 + $z_gssf2, 2)?></td>
        </tr>
    </table>
   <? } else {
?><table width="100%" border="0" cellspacing="1" cellpadding="0">
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
   <? }?></div>