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
$num = $num[0];
if ($num != 0) {
    echo "<script>alert('对不起,您暂时不能下注!');window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
    exit();
}
$class2 = $_GET['class2'];
$rtype = $_POST['rtype'];
$sum_sum = $_POST['Num_dan'];
$number = $_POST['number1'];
$sum_count = $_POST['ioradio'];
if ($sum_sum < 0 || $sum_sum == "" || !is_numeric($sum_sum) || $number == "" || $rtype == "" || 0 < !$sum_count) {
    echo "<script>alert('对不起,系统异常!');window.open('index.php','_top')</script>";
    echo "</HTML>";
    exit();
}
switch ($rtype) {
    case "1":
        $XF = 15;
        $urlurl = "main.php?action=bet_dzy&uid=" . $uid . "&lx=1";
        $class2 = "四中一";
        $class1_temp = "多中一";
        $class2_temp = "四中一";
        $bl_dslb = "DZY";
        $type_max = 8;
        $type_min = 4;
        break;
    case "2":
        $XF = 15;
        $urlurl = "main.php?action=bet_dzy&uid=" . $uid . "&lx=2";
        $class2 = "五中一";
        $class1_temp = "多中一";
        $class2_temp = "五中一";
        $bl_dslb = "DZY";
        $type_max = 8;
        $type_min = 5;
        break;
    case "3":
        $XF = 15;
        $urlurl = "main.php?action=bet_dzy&uid=" . $uid . "&lx=3";
        $class2 = "六中一";
        $class1_temp = "多中一";
        $class2_temp = "六中一";
        $bl_dslb = "DZY";
        $type_max = 10;
        $type_min = 6;
        break;
    case "4":
        $XF = 15;
        $urlurl = "main.php?action=bet_dzy&uid=" . $uid . "&lx=4";
        $class2 = "七中一";
        $class1_temp = "多中一";
        $class2_temp = "七中一";
        $bl_dslb = "DZY";
        $type_max = 10;
        $type_min = 7;
        break;
    case "5":
        $XF = 15;
        $urlurl = "main.php?action=bet_dzy&uid=" . $uid . "&lx=5";
        $class2 = "八中一";
        $class1_temp = "多中一";
        $class2_temp = "八中一";
        $bl_dslb = "DZY";
        $type_max = 10;
        $type_min = 8;
        break;
    case "6":
        $XF = 15;
        $urlurl = "main.php?action=bet_dzy&uid=" . $uid . "&lx=6";
        $class2 = "九中一";
        $class1_temp = "多中一";
        $class2_temp = "九中一";
        $bl_dslb = "DZY";
        $type_max = 10;
        $type_min = 9;
        break;
    case "7":
        $XF = 15;
        $urlurl = "main.php?action=bet_dzy&uid=" . $uid . "&lx=7";
        $class2 = "十中一";
        $class1_temp = "多中一";
        $class2_temp = "十中一";
        $bl_dslb = "DZY";
        $type_max = 10;
        $type_min = 10;
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
$number_array = explode(",", $number);
$number_count = count($number_array) - 1;
if ($number_count < $type_min) {
    echo "<script Language=Javascript>alert('最少选择" . $type_min . "个号码!！');parent.main.location.href='" . $urlurl . "';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
    exit();
}
if ($type_max < $number_count) {
    echo "<script Language=Javascript>alert('最多选择" . $type_max . "个号码!！');parent.main.location.href='" . $urlurl . "';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
    exit();
}
if (count($number_array) != count(array_unique($number_array))) {
    echo "<script>alert('对不起,系统异常!');window.open('index.php','_top')</script>";
    echo "</HTML>";
    exit();
}
require_once("include/member.php");
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
$sql = "select dai_zc,zong_zc,guan_zc,dagu_zc,gs_zc from web_member where uid='{$uid}' LIMIT 1";
$resultmem = $db1->query($sql);
$rowm = $resultmem->fetch_assoc();
$dai_zc = $rowm['dai_zc'];
$zong_zc = $rowm['zong_zc'];
$guan_zc = $rowm['guan_zc'];
$dagu_zc = $rowm['dagu_zc'];
$gs_zc = $rowm['gs_zc'];
$bl_temp = get_bl($class2, 0);
$bl_xx = $user_ds_temp[$bl_dslb]['xx'];
$bl_xxx = $user_ds_temp[$bl_dslb]['xxx'];
$class3_temp = array();
$rate_temp = array();
$number1 = array();
$text1_temp = array();
$bl_rate_temp = array();
include("ds_header.php");
$bl_class1 = $class1_temp;
$bl_class2 = $class2_temp;
$sum_m = $sum_sum;
$text1 = "";
$text2 = "";
$zs = 0;
$r = 0;
for (; $r < $number_count; ++$r) {
    $temename = $number_array[$r];
    if (is_numeric($temename) && 1 <= $temename && $temename <= 49) {
        $bl_locked = $bl_temp[$temename]['locked'];
        if ($bl_locked == 1) {
            echo "<script Language=Javascript>alert('对不起," . $class2 . "[" . $bl_temp[$temename]['class3'] . "]已停押！');parent.main.location.href='" . $urlurl . "';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
            exit();
        } else {
            $class3_temp[$r] = $bl_temp[$temename]['class3'];
            $rate_temp[$r] = $bl_temp[$temename]['rate'];
        }
    } else {
        echo "<script>alert('对不起,系统异常!');window.open('index.php','_top')</script>";
        echo "</HTML>";
        exit();
    }
}
if ($rtype == "1") {
    $i = 0;
    for (; $i < $number_count - 3; ++$i) {
        $j = $i + 1;
        for (; $j < $number_count - 2; ++$j) {
            $k = $j + 1;
            for (; $k < $number_count - 1; ++$k) {
                $l = $k + 1;
                for (; $l < $number_count; ++$l) {
                    $number1[$zs] = $class3_temp[$i] . "," . $class3_temp[$j] . "," . $class3_temp[$k] . "," . $class3_temp[$l] . ",";
                    $text1_temp[$zs] = "@|" . $class3_temp[$i] . "||" . $class3_temp[$j] . "||" . $class3_temp[$k] . "||" . $class3_temp[$l] . "|@";
                    $bl_rate_temp[$zs] = min($rate_temp[$i], $rate_temp[$j], $rate_temp[$k], $rate_temp[$l]);
                    $zs += 1;
                }
            }
        }
    }
}
if ($rtype == "2") {
    $i = 0;
    for (; $i < $number_count - 4; ++$i) {
        $j = $i + 1;
        for (; $j < $number_count - 3; ++$j) {
            $k = $j + 1;
            for (; $k < $number_count - 2; ++$k) {
                $l = $k + 1;
                for (; $l < $number_count - 1; ++$l) {
                    $m = $l + 1;
                    for (; $m < $number_count; ++$m) {
                        $number1[$zs] = $class3_temp[$i] . "," . $class3_temp[$j] . "," . $class3_temp[$k] . "," . $class3_temp[$l] . "," . $class3_temp[$m] . ",";
                        $text1_temp[$zs] = "@|" . $class3_temp[$i] . "||" . $class3_temp[$j] . "||" . $class3_temp[$k] . "||" . $class3_temp[$l] . "||" . $class3_temp[$m] . "|@";
                        $bl_rate_temp[$zs] = min($rate_temp[$i], $rate_temp[$j], $rate_temp[$k], $rate_temp[$l], $rate_temp[$m]);
                        $zs += 1;
                    }
                }
            }
        }
    }
}
if ($rtype == "3") {
    $i = 0;
    for (; $i < $number_count - 5; ++$i) {
        $j = $i + 1;
        for (; $j < $number_count - 4; ++$j) {
            $k = $j + 1;
            for (; $k < $number_count - 3; ++$k) {
                $l = $k + 1;
                for (; $l < $number_count - 2; ++$l) {
                    $m = $l + 1;
                    for (; $m < $number_count - 1; ++$m) {
                        $n = $m + 1;
                        for (; $n < $number_count; ++$n) {
                            $number1[$zs] = $class3_temp[$i] . "," . $class3_temp[$j] . "," . $class3_temp[$k] . "," . $class3_temp[$l] . "," . $class3_temp[$m] . "," . $class3_temp[$n] . ",";
                            $text1_temp[$zs] = "@|" . $class3_temp[$i] . "||" . $class3_temp[$j] . "||" . $class3_temp[$k] . "||" . $class3_temp[$l] . "||" . $class3_temp[$m] . "||" . $class3_temp[$n] . "|@";
                            $bl_rate_temp[$zs] = min($rate_temp[$i], $rate_temp[$j], $rate_temp[$k], $rate_temp[$l], $rate_temp[$m], $rate_temp[$n]);
                            $zs += 1;
                        }
                    }
                }
            }
        }
    }
}
if ($rtype == "4") {
    $i = 0;
    for (; $i < $number_count - 6; ++$i) {
        $j = $i + 1;
        for (; $j < $number_count - 5; ++$j) {
            $k = $j + 1;
            for (; $k < $number_count - 4; ++$k) {
                $l = $k + 1;
                for (; $l < $number_count - 3; ++$l) {
                    $m = $l + 1;
                    for (; $m < $number_count - 2; ++$m) {
                        $n = $m + 1;
                        for (; $n < $number_count - 1; ++$n) {
                            $o = $n + 1;
                            for (; $o < $number_count; ++$o) {
                                $number1[$zs] = $class3_temp[$i] . "," . $class3_temp[$j] . "," . $class3_temp[$k] . "," . $class3_temp[$l] . "," . $class3_temp[$m] . "," . $class3_temp[$n] . "," . $class3_temp[$o] . ",";
                                $text1_temp[$zs] = "@|" . $class3_temp[$i] . "||" . $class3_temp[$j] . "||" . $class3_temp[$k] . "||" . $class3_temp[$l] . "||" . $class3_temp[$m] . "||" . $class3_temp[$n] . "||" . $class3_temp[$o] . "|@";
                                $bl_rate_temp[$zs] = min($rate_temp[$i], $rate_temp[$j], $rate_temp[$k], $rate_temp[$l], $rate_temp[$m], $rate_temp[$n], $rate_temp[$o]);
                                $zs += 1;
                            }
                        }
                    }
                }
            }
        }
    }
}
if ($rtype == "5") {
    $i = 0;
    for (; $i < $number_count - 7; ++$i) {
        $j = $i + 1;
        for (; $j < $number_count - 6; ++$j) {
            $k = $j + 1;
            for (; $k < $number_count - 5; ++$k) {
                $l = $k + 1;
                for (; $l < $number_count - 4; ++$l) {
                    $m = $l + 1;
                    for (; $m < $number_count - 3; ++$m) {
                        $n = $m + 1;
                        for (; $n < $number_count - 2; ++$n) {
                            $o = $n + 1;
                            for (; $o < $number_count - 1; ++$o) {
                                $p = $o + 1;
                                for (; $p < $number_count; ++$p) {
                                    $number1[$zs] = $class3_temp[$i] . "," . $class3_temp[$j] . "," . $class3_temp[$k] . "," . $class3_temp[$l] . "," . $class3_temp[$m] . "," . $class3_temp[$n] . "," . $class3_temp[$o] . "," . $class3_temp[$p] . ",";
                                    $text1_temp[$zs] = "@|" . $class3_temp[$i] . "||" . $class3_temp[$j] . "||" . $class3_temp[$k] . "||" . $class3_temp[$l] . "||" . $class3_temp[$m] . "||" . $class3_temp[$n] . "||" . $class3_temp[$o] . "||" . $class3_temp[$p] . "|@";
                                    $bl_rate_temp[$zs] = min($rate_temp[$i], $rate_temp[$j], $rate_temp[$k], $rate_temp[$l], $rate_temp[$m], $rate_temp[$n], $rate_temp[$o], $rate_temp[$p]);
                                    $zs += 1;
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
if ($rtype == "6") {
    $i = 0;
    for (; $i < $number_count - 8; ++$i) {
        $j = $i + 1;
        for (; $j < $number_count - 7; ++$j) {
            $k = $j + 1;
            for (; $k < $number_count - 6; ++$k) {
                $l = $k + 1;
                for (; $l < $number_count - 5; ++$l) {
                    $m = $l + 1;
                    for (; $m < $number_count - 4; ++$m) {
                        $n = $m + 1;
                        for (; $n < $number_count - 3; ++$n) {
                            $o = $n + 1;
                            for (; $o < $number_count - 2; ++$o) {
                                $p = $o + 1;
                                for (; $p < $number_count - 1; ++$p) {
                                    $r = $p + 1;
                                    for (; $r < $number_count; ++$r) {
                                        $number1[$zs] = $class3_temp[$i] . "," . $class3_temp[$j] . "," . $class3_temp[$k] . "," . $class3_temp[$l] . "," . $class3_temp[$m] . "," . $class3_temp[$n] . "," . $class3_temp[$o] . "," . $class3_temp[$p] . "," . $class3_temp[$r] . ",";
                                        $text1_temp[$zs] = "@|" . $class3_temp[$i] . "||" . $class3_temp[$j] . "||" . $class3_temp[$k] . "||" . $class3_temp[$l] . "||" . $class3_temp[$m] . "||" . $class3_temp[$n] . "||" . $class3_temp[$o] . "||" . $class3_temp[$p] . "||" . $class3_temp[$r] . "|@";
                                        $bl_rate_temp[$zs] = min($rate_temp[$i], $rate_temp[$j], $rate_temp[$k], $rate_temp[$l], $rate_temp[$m], $rate_temp[$n], $rate_temp[$o], $rate_temp[$p], $rate_temp[$r]);
                                        $zs += 1;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
if ($rtype == "7") {
    $i = 0;
    for (; $i < $number_count - 9; ++$i) {
        $j = $i + 1;
        for (; $j < $number_count - 8; ++$j) {
            $k = $j + 1;
            for (; $k < $number_count - 7; ++$k) {
                $l = $k + 1;
                for (; $l < $number_count - 6; ++$l) {
                    $m = $l + 1;
                    for (; $m < $number_count - 5; ++$m) {
                        $n = $m + 1;
                        for (; $n < $number_count - 4; ++$n) {
                            $o = $n + 1;
                            for (; $o < $number_count - 3; ++$o) {
                                $p = $o + 1;
                                for (; $p < $number_count - 2; ++$p) {
                                    $r = $p + 1;
                                    for (; $r < $number_count - 1; ++$r) {
                                        $s = $r + 1;
                                        for (; $s < $number_count; ++$s) {
                                            $number1[$zs] = $class3_temp[$i] . "," . $class3_temp[$j] . "," . $class3_temp[$k] . "," . $class3_temp[$l] . "," . $class3_temp[$m] . "," . $class3_temp[$n] . "," . $class3_temp[$o] . "," . $class3_temp[$p] . "," . $class3_temp[$r] . "," . $class3_temp[$s] . ",";
                                            $text1_temp[$zs] = "@|" . $class3_temp[$i] . "||" . $class3_temp[$j] . "||" . $class3_temp[$k] . "||" . $class3_temp[$l] . "||" . $class3_temp[$m] . "||" . $class3_temp[$n] . "||" . $class3_temp[$o] . "||" . $class3_temp[$p] . "||" . $class3_temp[$r] . "||" . $class3_temp[$s] . "|@";
                                            $bl_rate_temp[$zs] = min($rate_temp[$i], $rate_temp[$j], $rate_temp[$k], $rate_temp[$l], $rate_temp[$m], $rate_temp[$n], $rate_temp[$o], $rate_temp[$p], $rate_temp[$r], $rate_temp[$s]);
                                            $zs += 1;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}

if ($zs == 0 || $sum_count != $zs) {
    echo "<script Language=Javascript>alert('号码异常，请重新选择号码!');parent.main.location.href='" . $urlurl . "';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
    exit();
}
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
if ($bl_xxx < $sum_sum * $zs + $sum_umax) {
    echo "<script Language=Javascript>alert('对不起,下注金额超过单项" . $bl_xxx . "元！');parent.main.location.href='" . $urlurl . "';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
    exit();
}
$sum_count = 0;
$z = 0;
for (; $z <= $zs; ++$z) {
    $bl_class3 = $number1[$z];
    $bl_rate = $bl_rate_temp[$z];
    $text1 = $text1_temp[$z];
    if ($bl_class3 != "" && $bl_rate != "" && $text1 != "") {
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
        $sum_count += 1;
        $text2 .= "<tr align='center'><td>" . $bl_class2 . "</td><td>" . $bl_class3 . "</td><td><font color='green'>" . $rate0 . "</font></td><td><font color='green'>" . $sum_m . "</font></td>";
        $num = randstr();
        $class4 = md5($bl_class1 . "@" . $bl_class2 . "@" . $bl_class3 . "\$" . $sum_m);
        $class5 = $text1;
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
    }
}
?>
<script src="js/function.js" type="text/javascript"></script>
<link rel="stylesheet" href="/member/stylesheets/left.css?t=1683715146" type="text/css">

<body>
    <?
    if ($sum_count != 0) {
        ?>
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
                <tr align="center">
                    <td>类型</td>
                    <td>内容</td>
                    <td>赔率</td>
                    <td>金额</td>
                </tr>
                <?= $text2 ?>
                <tr>
                    <td colspan="4" align="center">共 <b id="sum"><?= $sum_count ?></b> 注 合计: <b
                            id="summoney"><?= $sum_sum * $sum_count ?></b>&nbsp;&nbsp;</td>
                </tr>
                <tr>
                    <td style="padding-top: 8px; padding-bottom: 4px; " colspan="4" bgcolor="#ffffff" align="center">
                    <input type="submit" name="btnClear1" value="返回" id="btnClear2" onClick="javascript:location.href='main.php?action=mem_left&uid=<?= $uid ?>'" class="btn2" />
                    </td>
                </tr>
            </tbody>
        </table>

    <? } ?>
    <script Language=Javascript>
        parent.main.qingling();
    </script>
    </div>
</body>