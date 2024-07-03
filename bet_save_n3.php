<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
if ($_GET['class2'] == "") {
    echo "<script>alert('非法进入!');parent.main.location.href='main.php?action=bet_tm&uid=" . $uid . "';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
    exit();
}
if ($ty != 0) {
    echo "<script>alert('对不起,您暂时不能下注!');window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
    exit();
}
$result = $db1->query("select count(*) from web_agent  where ( kauser='" . $dai . "' or kauser='" . $zong . "' or kauser='" . $guan . "' or kauser='" . $dagu . "') and ty=1  order by id desc");
$num1 = $result->fetch_array();
$num = $num1[0];
if ($num != 0) {
    echo "<script>alert('对不起,您暂时不能下注!');window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
    exit();
}
$ggwinsum = get_config("ggwinsum");
$XF = 15;
$class2 = "过关";
$bl_dslb = "GG";
$urlurl = "main.php?action=bet_gg&uid=" . $uid . "&ids=过关";
$numm = 42;
$sum_sum = $_POST['Num_1'];
if ($Current_KitheTable[29] == 0 || $Current_KitheTable[$XF] == 0) {
    echo "<script>alert('对不起,该项目已经封盘!');parent.main.location.href='main.php?action=stop&uid=" . $uid . "&lx=2';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
    exit();
}
if ($sum_sum < 0 || $sum_sum == "" || !is_numeric($sum_sum)) {
    echo "<script>alert('对不起,系统异常!');window.open('index.php','_top')</script>";
    echo "</HTML>";
    exit();
}
require_once("include/member.php");
$config_ds_temp = get_config_ds(5);
$user_ds_temp = get_member_ds($uid, $username);
$bl_temp = get_bl($class2, 0);
$bl_xx = $user_ds_temp[$bl_dslb]['xx'];
$bl_xxx = $user_ds_temp[$bl_dslb]['xxx'];
$rate_temp = 0;
$class2_temp = $class3_temp = $text1 = "";
if ($sum_sum < $xy) {
    echo "<script Language=Javascript>alert('对不起,最低限额为" . $xy . "元！');parent.main.location.href='" . $urlurl . "';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
    exit();
}
if ($ts < $sum_sum) {
    echo "<script Language=Javascript>alert('对不起,余额不足！');parent.main.location.href='" . $urlurl . "';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
    exit();
}
if ($bl_xx < $sum_sum) {
    echo "<script Language=Javascript>alert('对不起,下注金额超过单注" . $bl_xx . "元！');parent.main.location.href='" . $urlurl . "';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
    exit();
}
$result2 = $db1->query("select SUM(sum_m) As sum_umax from web_tan where Kithe='" . $Current_Kithe_Num . "' and  class2='" . $class2 . "' and username='" . $username . "'");
$rs5 = $result2->fetch_assoc();
if ($rs5['sum_umax'] == "") {
    $sum_umax = 0;
} else {
    $sum_umax = $rs5['sum_umax'];
}
if ($bl_xxx < $sum_sum + $sum_umax) {
    echo "<script Language=Javascript>alert('对不起,下注金额超过单项" . $bl_xxx . "元！');parent.main.location.href='" . $urlurl . "';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
    exit();
}
include("ds_header.php");
$z = 0;
$bl_rate = 1;
$t = 1;

for (; $t <= 18; $t += 1) {
    $temename = $_POST["game_" . $t];

    if (isset($temename) && $temename != "" && 1 <= $temename && $temename <= $numm && $z < 9) {
        $z += 1;
        $class2_temp .= $bl_temp[$temename]['class2'] . ",";
        $rate_temp = $bl_temp[$temename]['rate'];
        switch ($abcd) {
            case "A":
                $blc = 0;
                $yg_lx = "yg";
                $rate_temp = round($rate_temp + $blc, 3);
                $class3_temp .= $bl_temp[$temename]['class3'] . "," . $rate_temp . ",";
                $text1 .= $bl_temp[$temename]['class2'] . "(" . $bl_temp[$temename]['class3'] . "@" . $rate_temp . ")<br>";
                $bl_rate = round($bl_rate * $rate_temp, 3);
                break;
            case "B":
                $blc = $config_ds_temp[$bl_dslb]['blcb'];
                $yg_lx = "ygb";
                break;
            case "C":
                $blc = $config_ds_temp[$bl_dslb]['blcc'];
                $yg_lx = "ygc";
                break;
            case "D":
                $blc = $config_ds_temp[$bl_dslb]['blcd'];
                $yg_lx = "ygd";
                break;
            case "E":
                $blc = $config_ds_temp[$bl_dslb]['blce'];
                $yg_lx = "yge";
                break;
            case "F":
                $blc = $config_ds_temp[$bl_dslb]['blcf'];
                $yg_lx = "ygf";
                break;
            case "G":
                $blc = $config_ds_temp[$bl_dslb]['blcg'];
                $yg_lx = "ygg";
                break;
            case "H":
                $blc = $config_ds_temp[$bl_dslb]['blch'];
                $yg_lx = "ygh";
                break;
            default:
                $blc = 0;
                $yg_lx = "yg";
                $rate_temp = round($rate_temp + $blc, 3);
                $class3_temp .= $bl_temp[$temename]['class3'] . "," . $rate_temp . ",";
                $text1 .= $bl_temp[$temename]['class2'] . "(" . $bl_temp[$temename]['class3'] . "@" . $rate_temp . ")<br>";
                $bl_rate = round($bl_rate * $rate_temp, 3);
                break;
        }
    }
}
if ($z < 1) {
    echo "<script Language=Javascript>alert('最少选择2组!！');parent.main.location.href='" . $urlurl . "';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
    exit();
}
if (9 < $z) {
    echo "<script Language=Javascript>alert('最多选择9组!！');parent.main.location.href='" . $urlurl . "';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
    exit();
}
$sum_count = 1;
$sum_m = $sum_sum;
$bl_class1 = $class2;
$bl_class2 = $class2_temp;
$bl_class3 = $class3_temp;
$rate0 = $bl_rate;
$dai_ds_temp = get_agent_ds($uid, $dai);
$zong_ds_temp = get_agent_ds($uid, $zong);
$guan_ds_temp = get_agent_ds($uid, $guan);
$dagu_ds_temp = get_agent_ds($uid, $dagu);
$user_num = count($user_ds_temp);
$dai_num = count($dai_ds_temp);
$zong_num = count($zong_ds_temp);
$guan_num = count($guan_ds_temp);
$dagu_num = count($dagu_ds_temp);
$config_num = count($config_ds_temp);
$chk_num = $user_num + $dai_num + $zong_num - $guan_num - $dagu_num - $config_num;
if ($chk_num != 0) {
    echo "<script Language=Javascript>alert('对不起账号异常,请联系您的上级！');parent.main.location.href='" . $urlurl . "';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
    exit();
}
$sql = "select dai_zc,zong_zc,guan_zc,dagu_zc,gs_zc from web_member where uid='{$uid}' LIMIT 1";
$resultmem = $db1->query($sql);
$rowm = $resultmem->fetch_assoc();
$dai_zc = $rowm['dai_zc'];
$zong_zc = $rowm['zong_zc'];
$guan_zc = $rowm['guan_zc'];
$dagu_zc = $rowm['dagu_zc'];
$gs_zc = $rowm['gs_zc'];
$num = randstr();
$class4 = md5($bl_class1 . "@" . $bl_class2 . "@" . $bl_class3 . "\$" . $sum_m);
$class5 = "@|" . $bl_class3 . "|@";
$daizc = round($sum_m * $dai_zc / 100, 3);
$zongzc = round($sum_m * $zong_zc / 100, 3);
$guanzc = round($sum_m * $guan_zc / 100, 3);
$daguzc = round($sum_m * $dagu_zc / 100, 3);
$gszc = round($sum_m * $gs_zc / 100, 3);
$user_ds = $user_ds_temp[$bl_dslb][$yg_lx];
$dai_ds = $dai_ds_temp[$bl_dslb][$yg_lx];
$zong_ds = $zong_ds_temp[$bl_dslb][$yg_lx];
$guan_ds = $guan_ds_temp[$bl_dslb][$yg_lx];
$dagu_ds = $dagu_ds_temp[$bl_dslb][$yg_lx];
$gs_ds = $config_ds_temp[$bl_dslb][$yg_lx];
$sql_set = " set num='{$num}', username='{$username}', kithe='{$Current_Kithe_Num}', adddate='{$utime}', ds_lb='{$bl_dslb}', class1='{$bl_class1}', class2='{$bl_class2}', class3='{$bl_class3}', rate='{$rate0}', rate2='{$rate0}', sum_m='{$sum_m}', daizc='{$daizc}', zongzc='{$zongzc}', guanzc='{$guanzc}', daguzc='{$daguzc}', gszc='{$gszc}', user_ds='{$user_ds}', dai_ds='{$dai_ds}', zong_ds='{$zong_ds}', guan_ds='{$guan_ds}', dagu_ds='{$dagu_ds}', dai_rate='{$rate0}', zong_rate='{$rate0}', guan_rate='{$rate0}', dagu_rate='{$rate0}', bm=2, dai='{$dai}', zong='{$zong}', guan='{$guan}', dagu='{$dagu}', lx=0, visible=1, abcd='{$abcd}', qx=0, jx=0, lm=0, lmlx=0, sz=1,win='0', class4='{$class4}', class5='{$class5}', rate3=0, rate4=0, ratelm1=0, ratelm2=0, lmclass3=0, ip='{$userip}' ";
$sql1 = "INSERT INTO  web_tan " . $sql_set;
$sql2 = "INSERT INTO  web_tans " . $sql_set;
if (!$db1->query($sql1)) {
    exit("数据库修改出错1");
}
if (!$db1->query($sql2)) {
    exit("数据库修改出错2");
}
$sql3 = "update web_member set ts=ts-" . $sum_m . " where kauser='" . $username . "'";
if (!$db1->query($sql3)) {
    exit("数据库修改出错3");
}
include("ds_2367.php");
?>
<script src="js/function.js" type="text/javascript"></script>
<link rel="stylesheet" href="/member/stylesheets/left.css?t=1683715146" type="text/css">

<body>
    <div align="center" class="lefttopmargin">
      <? if ($sum_count != 0) { ?>
            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list"
                style="text-align: center;" id="chenggong">
                <tr>
                    <td align="center" class="t_list_caption"> <b>成功的注单</b>
                    </td>
                </tr>
            </table>
            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list" id="showtable2">
                <tbody bgcolor="#ffffff">
                    <tr align="center">
                        <td>类型</td>
                        <td>内容</td>
                        <td>赔率</td>
                        <td>金额</td>
                    </tr>
                    <tr>
                        <td>
                            <?= $bl_class1 ?>:<?= $z ?>串1
                        </td>
                        <td><?= $text1 ?>
                        </td>
                        <td>
                            <font color='green'>
                                <?= $rate0 ?>
                            </font>
                        </td>
                        <td>
                            <font color='green'>
                                <?= $sum_m ?>
                            </font>
                        </td>
                    <tr>
                        <td colspan="4" align="center">共 <b id="sum">
                                <?= $sum_count ?>
                            </b> 注 合计: <b id="summoney">
                                <?= $sum_sum ?>
                            </b>&nbsp;&nbsp;</td>
    
                    </tr>
    
                    <tr>
                        <td style="padding-top: 8px; padding-bottom: 4px; " colspan="4" bgcolor="#ffffff" align="center">
                            <input type="submit" name="btnClear1" value="返回" id="btnClear2"
                                onClick="javascript:location.href='main.php?action=mem_left&uid=<?= $uid ?>'" class="btn2" />
                        </td>
                    </tr>
      </tbody>
            </table>
  <? } ?>
        <script Language=Javascript>parent.main.qingling();</script>
    </div>
</body>