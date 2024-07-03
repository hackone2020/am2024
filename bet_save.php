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
$num = $result->fetch_array();
$num = $num[0];
if ($num != 0) {
    echo    "<script>alert('对不起,您暂时不能下注!'); window.location.href = 'main.php?action=mem_left&uid=" . $uid . "';</script>";
    exit;
}
$class2 = $_GET['class2'];
switch ($class2) {
    case "特A":
        $XF = 11;
        $urlurl = "main.php?action=bet_tm&uid=" . $uid . "&ids=特A";
        $numm = 62;
        break;
    case "特B":
        $XF = 11;
        $numm = 62;
        $urlurl = "main.php?action=bet_tm&uid=" . $uid . "&ids=特B";
        break;
    case "正A":
        $XF = 15;
        $urlurl = "main.php?action=bet_zm&uid=" . $uid . "&ids=正A";
        $numm = 53;
        break;
    case "正B":
        $XF = 15;
        $numm = 53;
        $urlurl = "main.php?action=bet_zm&uid=" . $uid . "&ids=正B";
        break;
    case "正1特":
        $XF = 15;
        $urlurl = "main.php?action=bet_zt&uid=" . $uid . "&ids=正1特";
        $numm = 49;
        break;
    case "正2特":
        $XF = 15;
        $urlurl = "main.php?action=bet_zt&uid=" . $uid . "&ids=正2特";
        $numm = 49;
        break;
    case "正3特":
        $XF = 15;
        $urlurl = "main.php?action=bet_zt&uid=" . $uid . "&ids=正3特";
        $numm = 49;
        break;
    case "正4特":
        $XF = 15;
        $urlurl = "main.php?action=bet_zt&uid=" . $uid . "&ids=正4特";
        $numm = 49;
        break;
    case "正5特":
        $XF = 15;
        $urlurl = "main.php?action=bet_zt&uid=" . $uid . "&ids=正5特";
        $numm = 49;
        break;
    case "正6特":
        $XF = 15;
        $urlurl = "main.php?action=bet_zt&uid=" . $uid . "&ids=正6特";
        $numm = 49;
        break;
    case "正码1-6":
        $XF = 15;
        $urlurl = "main.php?action=bet_zm6&uid=" . $uid . "&ids=正码1-6";
        $numm = 66;
        break;
    case "半波":
        $XF = 15;
        $urlurl = "main.php?action=bet_bb&uid=" . $uid . "&ids=半波";
        $numm = 18;
        break;
    case "尾数":
        $XF = 15;
        $urlurl = "main.php?action=bet_ws&uid=" . $uid . "&ids=尾数";
        $numm = 10;
        break;
    case "尾数不中":
        $XF = 15;
        $urlurl = "main.php?action=bet_wsbz&uid=" . $uid . "&ids=尾数不中";
        $numm = 10;
        break;
    case "尾数量":
        $XF = 15;
        $urlurl = "main.php?action=bet_wszl&uid=" . $uid . "&ids=尾数量";
        $numm = 10;
        break;
    case "特肖":
        $XF = 15;
        $urlurl = "main.php?action=bet_tmsx&uid=" . $uid . "&ids=特肖";
        $numm = 12;
        break;
    case "一肖":
        $XF = 15;
        $urlurl = "main.php?action=bet_sx&uid=" . $uid . "&ids=一肖";
        $numm = 12;
        break;
    case "一肖不中":
        $XF = 15;
        $urlurl = "main.php?action=bet_sxbz&uid=" . $uid . "&ids=一肖不中";
        $numm = 12;
        break;
    case "一肖量":
    case "二肖量":
    case "三肖量":
    case "四肖量":
    case "五肖量":
        $XF = 15;
        $urlurl = "main.php?action=bet_sxzl&uid=" . $uid . "&lx=" . $class2;
        $numm = 12;
        break;
    default:
        $numm = 0;
        $urlurl = "main.php?action=bet_tm&uid=" . $uid . "&ids=特A";
        $XF = 11;
        break;
}
if ($Current_KitheTable[29] == 0 || $Current_KitheTable[$XF] == 0) {
    echo "<script>alert('对不起,该项目已经封盘!');parent.main.location.href='main.php?action=stop&uid=" . $uid . "&lx=2';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
    exit();
}
require_once "include/member.php";
$config_ds_temp = get_config_ds(5);
$user_ds_temp = get_member_ds($uid, $username);
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
$bl_temp = get_bl($class2, 0);
$sql = "select dai_zc,zong_zc,guan_zc,dagu_zc,gs_zc from web_member where uid='{$uid}' LIMIT 1";
$resultmem = $db1->query($sql);
$rowm = $resultmem->fetch_assoc();
$dai_zc = $rowm['dai_zc'];
$zong_zc = $rowm['zong_zc'];
$guan_zc = $rowm['guan_zc'];
$dagu_zc = $rowm['dagu_zc'];
$gs_zc = $rowm['gs_zc'];
include "ds_header.php";
$sum_sum1 = 0;
$sum_count1 = 0;
$text1 = "";
$sum_sum2 = 0;
$sum_count2 = 0;
$text2 = "";
$r = 1;
for (; $r <= $numm; ++$r) {
    if ($_POST["Num_" . $r] != "" && 0 < $_POST["Num_" . $r]) {
        $sum_m = $_POST["Num_" . $r];
        $bl_class1 = $bl_temp[$r]['class1'];
        $bl_class2 = $bl_temp[$r]['class2'];
        $bl_class3 = $bl_temp[$r]['class3'];
        $bl_dslb = $bl_temp[$r]['ds_lb'];
        $bl_gold = $bl_temp[$r]['gold'];
        $bl_blgold = $bl_temp[$r]['blgold'];
        $bl_xr = $bl_temp[$r]['xr'];
        $bl_rate = $bl_temp[$r]['rate'];
        $bl_locked = $bl_temp[$r]['locked'];
        $drop_value = $config_ds_temp[$bl_dslb]['drop_value'];
        $drop_unit = $config_ds_temp[$bl_dslb]['drop_unit'];
        $low_drop = $config_ds_temp[$bl_dslb]['low_drop'];
        $lock_drop = $config_ds_temp[$bl_dslb]['lock_drop'];
        if ($sum_m < $xy) {
            $sum_count1 += 1;
            $sum_sum1 += $sum_m;
            $text1 .= "<tr align='center'><td>" . $bl_class2 . "</td><td>" . $bl_class3 . "</td><td><font color='red'>0</font></td><td><font color='red'>低于限额</font></td>";
            continue;
        }
        if ($ts < $sum_m) {
            $sum_count1 += 1;
            $sum_sum1 += $sum_m;
            $text1 .= "<tr align='center'><td>" . $bl_class2 . "</td><td>" . $bl_class3 . "</td><td><font color='red'>0</font></td><td><font color='red'>余额不足</font></td>";
            continue;
        }
        if ($bl_locked == 1) {
            $sum_count1 += 1;
            $sum_sum1 += $sum_m;
            $text1 .= "<tr align='center'><td>" . $bl_class2 . "</td><td>" . $bl_class3 . "</td><td><font color='red'>0</font></td><td><font color='red'>此号停押</font></td>";
            continue;
        }
        if (($bl_class2 == "特A" || $bl_class2 == "特B") && $bl_xr < $bl_gold + $sum_m) {
            $sum_count1 += 1;
            $sum_sum1 += $sum_m;
            $text1 .= "<tr align='center'><td>" . $bl_class2 . "</td><td>" . $bl_class3 . "</td><td><font color='red'>0</font></td><td><font color='red'>此号停押</font></td>";
            continue;
        }
        $result2 = $db1->query("select SUM(sum_m) As sum_umax from web_tan where Kithe='" . $Current_Kithe_Num . "' and class1='" . $bl_class1 . "' and  class2='" . $bl_class2 . "' and class3='" . $bl_class3 . "' and username='" . $username . "'");
        $rs5 = $result2->fetch_assoc();
        if ($rs5['sum_umax'] == "") {
            $sum_umax = 0;
        } else {
            $sum_umax = $rs5['sum_umax'];
        }
        if ($user_ds_temp[$bl_dslb]['xxx'] < $sum_umax + $sum_m) {
            $sum_count1 += 1;
            $sum_sum1 += $sum_m;
            $text1 .= "<tr align='center'><td>" . $bl_class2 . "</td><td>" . $bl_class3 . "</td><td><font color='red'>0</font></td><td><font color='red'>超过单项</font></td>";
            continue;
        }
        if ($user_ds_temp[$bl_dslb]['xx'] < $sum_m) {
            $sum_count1 += 1;
            $sum_sum1 += $sum_m;
            $text1 .= "<tr align='center'><td>" . $bl_class2 . "</td><td>" . $bl_class3 . "</td><td><font color='red'>0</font></td><td><font color='red'>超过单注</font></td>";
            continue;
        }
        switch ($abcd) {
            case "A":
                $blc = 0;
                $yg_lx = "yg";
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
                break;
        }
        $rate0 = round($bl_rate + $blc, 3);
        if ($_POST["rate_" . $r] != $rate0) {
            $sum_count1 += 1;
            $sum_sum1 += $sum_m;
            $text1 .= "<tr align='center'><td>" . $bl_class2 . "</td><td>" . $bl_class3 . "</td><td><font color='red'>0</font></td><td><font color='red'>赔率已变</font></td>";
            continue;
        }
        $sum_count2 += 1;
        $sum_sum2 += $sum_m;
        $ts -= $sum_m;
        $text2 .= "<tr align='center'><td>" . $bl_class2 . "</td><td>" . $bl_class3 . "</td><td><font color='green'>" . $rate0 . "</font></td><td><font color='green'>" . $sum_m . "</font></td>";
        $num = randstr();
        $class4 = md5($bl_class1 . "@" . $bl_class2 . "@" . $bl_class3 . "$" . $sum_m);
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
        include "ds.php";
    }
}

?>
<script src="js/function.js" type="text/javascript"></script>
<link rel="stylesheet" href="/member/stylesheets/left.css?t=1683715146" type="text/css">
<body>
        <? if ($sum_count1 != 0) { ?>
            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list" id="shibai">
                 <tbody bgcolor="#FFFFFF">
                    <tr align="center">
                        <td align="center" class="t_list_caption">
                            <b>失败的注单</b>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list" id="showtable1" >
                <tbody bgcolor="#FFFFFF">
                    <tr align="center">
                        <td bgcolor="#FFFFFF">类型</td>
                        <td bgcolor="#FFFFFF">内容</td>
                        <td bgcolor="#FFFFFF">金额</td>
                        <td bgcolor="#FFFFFF">原因</td>
                    </tr>
                    <?= $text1 ?>
                    <tr align="center">
                        <td colspan="4" align="right" bgcolor="#FFFFFF">共 <b id="sum">"
                                <?= $sum_count1 ?>
            
                            </b> 注 合计: <b id="summoney">"
                                <?= $sum_sum1 ?>
            
                            </b>&nbsp;&nbsp;</td>
                    </tr>
                    <tr align="center">
                        <td style="padding-top: 8px; padding-bottom: 4px; " bgcolor="#FFFFFF">
                            <input type="submit" name="btnClear1" value="返回" id="btnClear1"
                                onClick="javascript:location.href='main.php?action=mem_left&uid=<?= $uid ?>" class="btn2" />
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <? }
        if ($sum_count2 != 0) { ?>
            
            
            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list" id="chenggong">
                <tbody bgcolor="#FFFFFF">
                    <tr  align="center">
                        <td align="center" class="t_list_caption"><b>成功的注单</b></td>
                    </tr>
                </tbody>
            </table>
            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list" id="showtable2">
                <tbody bgcolor="#FFFFFF">
                    <tr align="center">
                        <td bgcolor="#FFFFFF">类型</td>
                        <td bgcolor="#FFFFFF">内容</td>
                        <td bgcolor="#FFFFFF">赔率</td>
                        <td bgcolor="#FFFFFF">金额</td>
                    </tr>
            
                    <?= $text2 ?>
                    <tr align="center">
                        <td colspan="4" align="center" bgcolor="#FFFFFF">共<b id="sum"><?= $sum_count2 ?></b> 注 合计: <b id="summoney">
                                <?= $sum_sum2 ?></b>&nbsp;&nbsp;
                        </td>
                    </tr>
                </tbody>
</Table>
    <? } ?>
<script Language=Javascript>parent.main.qingling();</script>
</body>









