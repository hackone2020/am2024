<?php
function chk_number($nz, $nd)
{
    global $urlurl;
    global $uid;
    if (count($nz) != count(array_unique($nz))) {
        echo "<script Language=Javascript>alert('号码重复，请重新选择号码!');parent.main.location.href='" . $urlurl . "';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
        exit();
    }

    for ($i = 0; $i < $nd - 1; $i++) {
        if ($nz[$i] < 1 || $nz[$i] > 49) {
            echo "<script Language=Javascript>alert('号码异常，请重新选择号码!');parent.main.location.href='" . $urlurl . "';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
            exit();
        }
    }
}

function chk_number_repeat($nz1, $nz2)
{
    global $urlurl;
    global $uid;
    $nz = array_intersect($nz1, $nz2);
    $nzc = count($nz);
    if ($nzc != 0) {
        echo "<script Language=Javascript>alert('号码" . $nzc . "个重复，请重新选择号码!');parent.main.location.href='" . $urlurl . "';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
        exit();
    }
}

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
$result = $db1->query("select count(*) from web_agent  where (kauser='" . $dai . "' or kauser='" . $zong . "' or kauser='" . $guan . "' or kauser='" . $dagu . "') and ty=1  order by id desc");
$num1 = $result->fetch_array();
$num = $num1[0];

if ($num != 0) {
    echo "<script>alert('对不起,您暂时不能下注!');window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
    exit();
}
$class2 = $_GET['class2'];
$rtype = $_POST['rtype'];
$lmlx = $_POST['lmlx'];
$sum_sum = $_POST['Num_1'];
$number1 = $_POST['number1'];
$number2 = $_POST['number2'];
$sum_count = $_POST['ioradio'];
$class1_temp = $class2_temp = $class3_temp = $text1 = "";
if ($sum_sum < 0 || $sum_sum == "" || !is_numeric($sum_sum) || $lmlx == "" || $rtype == "" || $sum_count < 0) {
    echo "<script>alert('对不起,系统异常!');window.open('index.php','_top')</script>";
    echo "</HTML>";
    exit();
}
switch ($rtype) {
    case "0":
        $XF = 15;
        $urlurl = "main.php?action=bet_lm&uid=" . $uid . "&lx=0";
        $class2 = "四全中";
        $class1_temp = "连码";
        $class2_temp = "四全中";
        $bl_dslb = "LM4QZ";
        $type_max = 10;
        $type_min = 4;
        $dan_min = 0;
        break;
    case "1":
        $XF = 15;
        $urlurl = "main.php?action=bet_lm&uid=" . $uid . "&lx=1";
        $class2 = "三全中";
        $class1_temp = "连码";
        $class2_temp = "三全中";
        $bl_dslb = "LM3QZ";
        $type_max = 10;
        $type_min = 3;
        $dan_min = 2;
        break;
    case "2":
        $XF = 15;
        $urlurl = "main.php?action=bet_lm&uid=" . $uid . "&lx=2";
        $class2 = "三中二";
        $class1_temp = "连码";
        $class2_temp = "三中二";
        $bl_dslb = "LM3Z2";
        $type_max = 10;
        $type_min = 3;
        $dan_min = 2;
        break;
    case "3":
        $XF = 15;
        $urlurl = "main.php?action=bet_lm&uid=" . $uid . "&lx=3";
        $class2 = "二全中";
        $class1_temp = "连码";
        $class2_temp = "二全中";
        $bl_dslb = "LM2QZ";
        $type_max = 10;
        $type_min = 2;
        $dan_min = 1;
        break;
    case "4":
        $XF = 15;
        $urlurl = "main.php?action=bet_lm&uid=" . $uid . "&lx=4";
        $class2 = "二中特";
        $class1_temp = "连码";
        $class2_temp = "二中特";
        $bl_dslb = "LM2ZT";
        $type_max = 10;
        $type_min = 2;
        $dan_min = 1;
        break;
    case "5":
        $XF = 15;
        $urlurl = "main.php?action=bet_lm&uid=" . $uid . "&lx=5";
        $class2 = "特串";
        $class1_temp = "连码";
        $class2_temp = "特串";
        $bl_dslb = "LMTC";
        $type_max = 10;
        $type_min = 2;
        $dan_min = 1;
        break;
    default:
        $urlurl = "main.php?action=bet_tm&uid=" . $uid . "&ids=特A";
        $XF = 11;
        echo "<script>window.open('index.php','_top')</script>";
        echo "</HTML>";
        exit();
        break;
}
if ($Current_KitheTable[29] == 0 || $Current_KitheTable[$XF] == 0) {
    echo "<script>alert('对不起,该项目已经封盘!');parent.main.location.href='main.php?action=stop&uid=" . $uid . "&lx=2';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
    exit();
}
$jianzs = 0;
switch ($lmlx) {
    case "0":
        $number1_array = explode(",", $number1);
        $number1_count = count($number1_array) - 1;
        chk_number($number1_array, $number1_count);
        $n = $number1_count;
        $class3_temp = $number1;
        $bl_lmlx = 0;
        $number = $number1;
        break;
    case "2":
        $number1_array = explode(",", $number1);
        $number1_count = count($number1_array) - 1;
        chk_number($number1_array, $number1_count);
        $n1 = $number1_count;
        $number2_array = explode(",", $number2);
        $number2_count = count($number2_array);
        chk_number($number2_array, $number2_count);
        $m1 = $number2_count;
        chk_number_repeat($number1_array, $number2_array);
        $n = $n1;
        $class3_temp = $number2 . "拖" . $number1;
        $bl_lmlx = 2;
        $number = $number1 . $number2 . ",";
        if ($dan_min != $number2_count) {
            echo "<script>alert('拖头号码必须有" . $dan_min . "个!');parent.main.location.href='" . $urlurl . "';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
            exit();
        }
        break;
    case "1":
        $number1_array = explode(",", $number1);
        $number1_count = count($number1_array);
        chk_number($number1_array, $number1_count);
        $n1 = $number1_count;
        $number2_array = explode(",", $number2);
        $number2_count = count($number2_array);
        chk_number($number2_array, $number2_count);
        $m1 = $number2_count;
        $nz = array_intersect($number1_array, $number2_array);
        $jianzs = count($nz);
        $n = $n1 + $m1;
        $class3_temp = $number2 . "碰" . $number1;
        $bl_lmlx = 1;
        $number = $number2 . "," . $number1 . ",";
        break;
    default:
        echo "<script>window.open('index.php','_top')</script>";
        echo "</HTML>";
        exit();
        break;
}
$number_array = explode(",", $number);
$number_count = count($number_array) - 1;
$number_count_temp = 0;
if ($rtype == "0") {
    $zs = $n * ($n - 1) * ($n - 2) * ($n - 3) / 24;
}
if ($rtype == "1" || $rtype == "2") {
    if ($lmlx == 2) {
        $zs = $n;
    } else {
        $zs = $n * ($n - 1) * ($n - 2) / 6;
    }
}
if ($rtype == "3" || $rtype == "4" || $rtype == "5") {
    if ($lmlx == 0) {
        $zs = $n * ($n - 1) / 2;
    }
    if ($lmlx == 2) {
        $zs = $n;
    }
    if ($lmlx == 1) {
        $zs = $n1 * $m1;
    }
}
$zs = $zs - $jianzs;
if ($zs == 0 || $sum_count != $zs) {
    echo "<script Language=Javascript>alert('号码异常，" . $sum_count . "|" . $zs . "请重新选择号码!');parent.main.location.href='" . $urlurl . "';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
    exit();
}
require_once("include/member.php");
$config_ds_temp = get_config_ds(5);
$user_ds_temp = get_member_ds($uid, $username);
$bl_temp = get_bl($class2, 0);
$bl_xx = $user_ds_temp[$bl_dslb]['xx'];
$bl_xxx = $user_ds_temp[$bl_dslb]['xxx'];
$bl_class1 = $class1_temp;
$bl_class2 = $class2_temp;
$bl_class3 = $class3_temp;
$sum_count = $zs;
$sum_m = $sum_sum;
$sum_sum = round($sum_sum / $zs, 0);
$rate_temp1 = 8888;
$rate_temp2 = 8888;
$class1_temp = $class2_temp = $class3_temp = $text1 = "";
if ($sum_sum < $xy) {
    echo "<script Language=Javascript>alert('对不起,最低限额为" . $xy . "元！');parent.main.location.href='" . $urlurl . "';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
    exit();
}


if ($ts < $sum_sum * $zs) {
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
if ($bl_xxx < $sum_m + $sum_umax) {
    echo "<script Language=Javascript>alert('对不起,下注金额超过单项" . $bl_xxx . "元！');parent.main.location.href='" . $urlurl . "';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
    exit();
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
include("ds_header.php");
$r = 1;
for (; $r <= $number_count; ++$r) {
    $temename = $number_array[$r - 1];
    if ($temename != "") {
        $bl_locked = $bl_temp[$temename]['locked'];
        $number_count_temp += 1;
        if ($bl_locked == 1) {
            echo "<script Language=Javascript>alert('对不起," . $class2 . "[" . $bl_temp[$temename]['class3'] . "]已停押！');parent.main.location.href='" . $urlurl . "';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
            exit();
        } else {
            if ($bl_temp[$temename]['rate'] < $rate_temp1) {
                $rate_temp1 = $bl_temp[$temename]['rate'];
            }
            if (($rtype == "2" || $rtype == "4") && $bl_temp[$temename + 49]['rate'] < $rate_temp2) {
                $rate_temp2 = $bl_temp[$temename + 49]['rate'];
            }
        }
        if ($rtype == "2" || $rtype == "4") {
            $text1 .= "|" . $temename . "|" . round($bl_temp[$temename]['rate'] + $blc, 3) . "/" . round($bl_temp[$temename + 49]['rate'] + $blc, 3) . "#";
        } else {
            $text1 .= "|" . $temename . "|" . round($bl_temp[$temename]['rate'] + $blc, 3) . "#";
        }
    }
}
if ($number_count_temp < $type_min) {
    echo "<script Language=Javascript>alert('最少选择" . $type_min . "个号码！');window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
    exit();
}
if ($type_max < $number_count_temp) {
    echo "<script Language=Javascript>alert('最多选择" . $type_max . "个号码！');window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
    exit();
}
$text2 = $number . "|" . $number_count;
if ($rtype == "2" || $rtype == "4") {
    $rate_temp1 = round($rate_temp1 + $blc, 3);
    $rate_temp2 = round($rate_temp2 + $blc, 3);
    $bl_rate1 = $rate_temp1;
    $bl_rate2 = $rate_temp2;
    $rate0 = $rate_temp1;
    $rate1 = $rate_temp2;
    $text3 = $rate0 . "/" . $rate1;
} else {
    $rate_temp1 = round($rate_temp1 + $blc, 3);
    $bl_rate1 = $rate_temp1;
    $bl_rate2 = $rate_temp1;
    $rate0 = $rate_temp1;
    $rate1 = $rate_temp1;
    $text3 = $rate0;
}
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
$class5 = "@" . $text1 . "@";
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
$sql_set = " set num='{$num}', username='{$username}', kithe='{$Current_Kithe_Num}', adddate='{$utime}', ds_lb='{$bl_dslb}', class1='{$bl_class1}', class2='{$bl_class2}', class3='{$bl_class3}', rate='{$rate0}', rate2='{$rate1}', sum_m='{$sum_m}', daizc='{$daizc}', zongzc='{$zongzc}', guanzc='{$guanzc}', daguzc='{$daguzc}', gszc='{$gszc}', user_ds='{$user_ds}', dai_ds='{$dai_ds}', zong_ds='{$zong_ds}', guan_ds='{$guan_ds}', dagu_ds='{$dagu_ds}', dai_rate='{$rate0}', zong_rate='{$rate0}', guan_rate='{$rate0}', dagu_rate='{$rate0}', bm=2, dai='{$dai}', zong='{$zong}', guan='{$guan}', dagu='{$dagu}', lx=0, visible=1, abcd='{$abcd}', qx=0, jx=0, lm=1, lmlx='{$bl_lmlx}', sz='{$sum_count}',win='0', class4='{$class4}', class5='{$class5}', rate3=0, rate4=0, ratelm1='{$rate0}', ratelm2='{$rate1}', lmclass3='{$text2}', ip='{$userip}' ";
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
include("ds_45.php");
?>
<script src="js/function.js" type="text/javascript"></script>
<link href="css/left.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="/member/stylesheets/left.css?t=1683715146" type="text/css">
<body>
       <? if ($sum_count != 0) { ?>
            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list" id="chenggong">
                <tbody bgcolor="#FFFFFF">
                    <tr align="center">
                        <td align="center" class="t_list_caption">
                            <b>成功的注单</b>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list" id="showtable2">
                <tbody bgcolor="#FFFFFF">
                    <tr>
                        <td width="30%" align="right">类型：</td>
                        <td width="60%" align="center"><?= $bl_class1 ?>-<?= $bl_class2 ?></td>
                    </tr>
                    <tr>
                        <td width="30%" align="right">内容：</td>
                        <td width="60%" align="center">
                            <?= $bl_class3 ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="30%" align="right">赔率：</td>
                        <td width="60%" align="center">
                            <?= $text3 ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="30%" align="right">金额：</td>
                        <td width="60%" align="center">
                            <?= $sum_sum ?>*
                            <?= $sum_count ?>
                        </td>
                    </tr>
                    <tr>
                    <td width="30%" align="right">状态：</td>
                    <td width="60%" align="center">
                            <font color='green'>成功</font>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">共 <b id="sum">
                                <?= $sum_count ?>
                            </b> 注 合计: <b id="summoney">
                                <?= $sum_m ?>
                            </b>&nbsp;&nbsp;</td>
                    </tr>
                    <tr align="center" bgcolor="#ffffff">
                        <td style="padding-top: 8px; padding-bottom: 4px; " colspan="2">
                            <input type="submit" name="btnClear1" value="返回" id="btnClear2"
                                onClick="javascript:location.href='main.php?action=mem_left&uid=<?= $uid ?>'" class="btn2" />
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 8px; padding-bottom: 4px; ">
                            <input type="submit" name="btnClear1" value="返回" id="btnClear2"
                                onClick="javascript:location.href='main.php?action=mem_left&uid=<?= $uid ?>'" class="btn2" />
                        </td>
                    </tr>
                </table> -->
        <? } ?>
        <script Language=Javascript>parent.main.qingling();</script>

</body>