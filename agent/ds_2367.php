<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
@set_time_limit(0);
require_once "../include/agent.php";
$config_ds_temp = get_config_ds(5);
if ($lx == 4) {
    $select_sql = " dagu='" . $kauser . "' ";
    $vv = "dagu";
    $dai_ds_temp = get_agent_ds($uid, $kauser);
    $zong_ds_temp = get_agent_ds($uid, $kauser);
    $guan_ds_temp = get_agent_ds($uid, $kauser);
    $dagu_ds_temp = get_agent_ds($uid, $kauser);
    $dai_temp = get_agent($uid, $kauser);
    $zong_temp = get_agent($uid, $kauser);
    $guan_temp = get_agent($uid, $kauser);
    $dagu_temp = get_agent($uid, $kauser);
    $dai_zc = 0;
    $zong_zc = 0;
    $guan_zc = 0;
    $dagu_zc = $dagu_temp['dagu_zc'];
    $gs_zc = $dagu_temp['gs_zc'];
    $dai = $kauser;
    $zong = $kauser;
    $guan = $kauser;
    $dagu = $kauser;
}
if ($lx == 3) {
    $select_sql = " guan='" . $kauser . "' ";
    $vv = "guan";
    $dai_ds_temp = get_agent_ds($uid, $kauser);
    $zong_ds_temp = get_agent_ds($uid, $kauser);
    $guan_ds_temp = get_agent_ds($uid, $kauser);
    $dagu_ds_temp = get_agent_ds($uid, $dagu);
    $dai_temp = get_agent($uid, $kauser);
    $zong_temp = get_agent($uid, $kauser);
    $guan_temp = get_agent($uid, $kauser);
    $dagu_temp = get_agent($uid, $dagu);
    $dai_zc = 0;
    $zong_zc = 0;
    $guan_zc = $guan_temp['guan_zc'];
    $dagu_zc = $guan_temp['dagu_zc'];
    $gs_zc = $guan_temp['gs_zc'];
    $dai = $kauser;
    $zong = $kauser;
    $guan = $kauser;
    $dagu = $dagu;
}
if ($lx == 2) {
    $select_sql = " zong='" . $kauser . "' ";
    $vv = "zong";
    $dai_ds_temp = get_agent_ds($uid, $kauser);
    $zong_ds_temp = get_agent_ds($uid, $kauser);
    $guan_ds_temp = get_agent_ds($uid, $guan);
    $dagu_ds_temp = get_agent_ds($uid, $dagu);
    $dai_temp = get_agent($uid, $kauser);
    $zong_temp = get_agent($uid, $kauser);
    $guan_temp = get_agent($uid, $guan);
    $dagu_temp = get_agent($uid, $dagu);
    $dai_zc = 0;
    $zong_zc = $zong_temp['zong_zc'];
    $guan_zc = $zong_temp['guan_zc'];
    $dagu_zc = $zong_temp['dagu_zc'];
    $gs_zc = $zong_temp['gs_zc'];
    $dai = $kauser;
    $zong = $kauser;
    $guan = $guan;
    $dagu = $dagu;
}
if ($lx == 1) {
    $select_sql = " dai='" . $kauser . "' ";
    $vv = "dai";
    $dai_ds_temp = get_agent_ds($uid, $kauser);
    $zong_ds_temp = get_agent_ds($uid, $zong);
    $guan_ds_temp = get_agent_ds($uid, $guan);
    $dagu_ds_temp = get_agent_ds($uid, $dagu);
    $dai_temp = get_agent($uid, $kauser);
    $zong_temp = get_agent($uid, $zong);
    $guan_temp = get_agent($uid, $guan);
    $dagu_temp = get_agent($uid, $dagu);
    $dai_zc = $dai_temp['dai_zc'];
    $zong_zc = $dai_temp['zong_zc'];
    $guan_zc = $dai_temp['guan_zc'];
    $dagu_zc = $dai_temp['dagu_zc'];
    $gs_zc = $dai_temp['gs_zc'];
    $dai = $kauser;
    $zong = $zong;
    $guan = $guan;
    $dagu = $dagu;
}
$tb_zd = $vv . "zc";
$pzall = $dagu_temp['pzall'];
if ($pzall == 3) {
    $zong_zf_zc = $dai_temp['zc'];
    $guan_zf_zc = $zong_temp['zc'];
    $dagu_zf_zc = $guan_temp['zc'];
} else {
    $zong_zf_zc = 0;
    $guan_zf_zc = 0;
    $dagu_zf_zc = 0;
}
$zc_all = $dagu_temp['zc_all'];
$sum_m = 0;
$result1 = $db1->query("select sum(if(username='" . $kauser . "',-sum_m," . $tb_zd . ")) as sum_sum from web_tan where kithe='" . $kithe . "' and class1='" . $zf_class1 . "' and class2='" . $zf_class2 . "' and class3='" . $zf_class3 . "' and " . $select_sql . "  and qx=0");
$Rs5 = $result1->fetch_array();
$sum_m = (int) $Rs5['sum_sum'];
if ($sum_m < $zf_sum) {
    echo "<script>alert('对不起,(" . $zf_class2 . "-" . $zf_class3 . ")您" . $kithe . "期单组占成金额：" . $sum_m . ",没有达到走飞金额：" . $zf_sum . "!');window.history.go(-1);</script>";
    exit;
}
switch ($pzall) {
    case "0":
        $zf_daizc = 0;
        $zf_zongzc = 0;
        $zf_guanzc = 0;
        $zf_daguzc = 0;
        $zf_gszc = $zf_sum;
        break;
    case "1":
        if ($lx == 4) {
            $zf_daizc = 0;
            $zf_zongzc = 0;
            $zf_guanzc = 0;
            $zf_daguzc = 0;
            $zf_gszc = $zf_sum;
        } else {
            $zf_daizc = 0;
            $zf_zongzc = 0;
            $zf_guanzc = 0;
            $zf_daguzc = $zf_sum;
            $zf_gszc = 0;
        }
        break;
    case "2":
        $zf_daizc = 0;
        $zf_sum_sum = round($zf_sum * $dai_zc / 100, 3);
        if ($lx == 1) {
            $zf_zongzc = round($zf_sum * $zong_zc / 100, 3);
        } else {
            $zf_zongzc = 0;
            $zf_sum_sum += round($zf_sum * $zong_zc / 100, 3);
        }
        if ($lx == 1 || $lx == 2) {
            $zf_guanzc = round($zf_sum * $guan_zc / 100, 3);
        } else {
            $zf_guanzc = 0;
            $zf_sum_sum += round($zf_sum * $guan_zc / 100, 3);
        }
        if ($lx == 1 || $lx == 2 || $lx == 3) {
            $zf_daguzc = round($zf_sum * $dagu_zc / 100, 3);
            $zf_gszc = round($zf_sum * $gs_zc / 100, 3);
            if ($zc_all == 0) {
                $zf_gszc += $zf_sum_sum;
            } else {
                $zf_daguzc += $zf_sum_sum;
            }
        } else {
            $zf_daguzc = 0;
            $zf_gszc = round($zf_sum * $gs_zc / 100, 3);
            $zf_sum_sum += round($zf_sum * $dagu_zc / 100, 3);
            $zf_gszc += $zf_sum_sum;
        }
        break;
    case "3":
        $zf_daizc = 0;
        $zf_sum_sum = round($zf_sum * $dai_zc / 100, 3);
        if ($lx == 1 && $zong_zf_zc == 0) {
            $zf_zongzc = round($zf_sum * $zong_zc / 100, 3);
        } else {
            $zf_zongzc = 0;
            $zf_sum_sum += round($zf_sum * $zong_zc / 100, 3);
        }
        if (($lx == 1 || $lx == 2) && $guan_zf_zc == 0) {
            $zf_guanzc = round($zf_sum * $guan_zc / 100, 3);
        } else {
            $zf_guanzc = 0;
            $zf_sum_sum += round($zf_sum * $guan_zc / 100, 3);
        }
        if (($lx == 1 || $lx == 2 || $lx == 3) && $dagu_zf_zc == 0) {
            $zf_daguzc = round($zf_sum * $dagu_zc / 100, 3);
        } else {
            $zf_daguzc = 0;
            $zf_sum_sum += round($zf_sum * $dagu_zc / 100, 3);
        }
        $zf_gszc = round($zf_sum * $gs_zc / 100, 3);
        if ($lx == 4 || $zc_all == 0) {
            $zf_gszc += $zf_sum_sum;
        } else {
            $zf_daguzc += $zf_sum_sum;
            break;
        }
    default:
        break;
}
$zf_user_ds = $dai_ds_temp[$zf_dslb]['yg'];
$zf_dai_ds = $dai_ds_temp[$zf_dslb]['yg'];
$zf_zong_ds = $zong_ds_temp[$zf_dslb]['yg'];
$zf_guan_ds = $guan_ds_temp[$zf_dslb]['yg'];
$zf_dagu_ds = $dagu_ds_temp[$zf_dslb]['yg'];
$zf_gs_ds = $config_ds_temp[$zf_dslb]['yg'];
$sql_set = " set num='{$num}', username='{$kauser}', kithe='{$kithe}', adddate='{$utime}', ds_lb='{$zf_dslb}', class1='{$zf_class1}', class2='{$zf_class2}', class3='{$zf_class3}', rate='{$rate0}', rate2='{$rate0}', sum_m='{$zf_sum}', daizc='{$zf_daizc}', zongzc='{$zf_zongzc}', guanzc='{$zf_guanzc}', daguzc='{$zf_daguzc}', gszc='{$zf_gszc}', user_ds='{$zf_user_ds}', dai_ds='{$zf_dai_ds}', zong_ds='{$zf_zong_ds}', guan_ds='{$zf_guan_ds}', dagu_ds='{$zf_dagu_ds}', dai_rate='{$zf_rate}', zong_rate='{$zf_rate}', guan_rate='{$zf_rate}', dagu_rate='{$zf_rate}', visible=1, bm=2, dai='{$dai}', zong='{$zong}', guan='{$guan}', dagu='{$dagu}', lx='{$lx}', abcd='{$abcd}', qx=0, jx=0, lm=0, lmlx=0, sz=1,win='0', class4='{$class4}', class5='{$class5}', rate3=0, rate4=0, ratelm1='0', ratelm2='0', lmclass3='0', ip='{$userip}' ";
$sql1 = "INSERT INTO  web_tan " . $sql_set;
$sql2 = "INSERT INTO  web_tans " . $sql_set;
if (!$db1->query($sql1)) {
    exit("数据库修改出错1");
}
if (!$db1->query($sql2)) {
    exit("数据库修改出错2");
}
if ($pzall == 1 || $pzall == 2 || $pzall == 3) {
    if ($lx == 1 && $guan_temp['pz'] == 0 && $zong_temp['pz'] == 0 && $zong_ds_temp[$zf_dslb]['pz'] == 1 && 0 <= $zong_ds_temp[$zf_dslb]['pz_sum']) {
        $result1 = $db1->query("select sum(if(username='" . $zong . "',-sum_m,zongzc)) as sum_sum from web_tan where kithe='" . $kithe . "' and class1='" . $zf_class1 . "' and class2='" . $zf_class2 . "' and class3='" . $zf_class3 . "' and zong='" . $zong . "'  and qx=0");
        $Rs5 = $result1->fetch_array();
        if ($Rs5['sum_sum'] != "") {
            $sum_zong = $Rs5['sum_sum'];
        } else {
            $sum_zong = 0;
        }
        $zong_zf_sum = round($sum_zong - $zong_ds_temp[$zf_dslb]['pz_sum'], 0);
        if (1 <= $zong_zf_sum) {
            switch ($pzall) {
                case "0":
                    $zong_zf_daizc = 0;
                    $zong_zf_zongzc = 0;
                    $zong_zf_guanzc = 0;
                    $zong_zf_daguzc = 0;
                    $zong_zf_gszc = $zong_zf_sum;
                    break;
                case "1":
                    $zong_zf_daizc = 0;
                    $zong_zf_zongzc = 0;
                    $zong_zf_guanzc = 0;
                    $zong_zf_daguzc = $zong_zf_sum;
                    $zong_zf_gszc = 0;
                    break;
                case "2":
                    $zong_zf_daizc = 0;
                    $zong_zf_zongzc = 0;
                    $zf_sum_sum = round($zong_zf_sum * $dai_zc / 100, 3) + round($zong_zf_sum * $zong_zc / 100, 3);
                    $zong_zf_guanzc = round($zong_zf_sum * $guan_zc / 100, 3);
                    if ($zc_all == 0) {
                        $zong_zf_daguzc = round($zong_zf_sum * $dagu_zc / 100, 3);
                        $zong_zf_gszc = round($zong_zf_sum * $gs_zc / 100, 3) + $zf_sum_sum;
                    } else {
                        $zong_zf_daguzc = round($zong_zf_sum * $dagu_zc / 100, 3) + $zf_sum_sum;
                        $zong_zf_gszc = round($zong_zf_sum * $gs_zc / 100, 3);
                    }
                    break;
                case "3":
                    $zong_zf_daizc = 0;
                    $zong_zf_zongzc = 0;
                    $zf_sum_sum = round($zong_zf_sum * $dai_zc / 100, 3) + round($zong_zf_sum * $zong_zc / 100, 3);
                    if ($guan_zf_zc == 0) {
                        $zong_zf_guanzc = round($zong_zf_sum * $guan_zc / 100, 3);
                    } else {
                        $zong_zf_guanzc = 0;
                        $zf_sum_sum += round($zong_zf_sum * $guan_zc / 100, 3);
                    }
                    if ($dagu_zf_zc == 0) {
                        $zong_zf_daguzc = round($zong_zf_sum * $dagu_zc / 100, 3);
                    } else {
                        $zong_zf_daguzc = 0;
                        $zf_sum_sum += round($zong_zf_sum * $dagu_zc / 100, 3);
                    }
                    $zong_zf_gszc = round($zong_zf_sum * $gs_zc / 100, 3);
                    if ($zc_all == 0) {
                        $zong_zf_gszc += $zf_sum_sum;
                    } else {
                        $zong_zf_daguzc += $zf_sum_sum;
                        break;
                    }
                default:
                    break;
            }
            $zong_zf_user_ds = $zong_ds_temp[$zf_dslb]['yg'];
            $zong_zf_zong_ds = $zong_ds_temp[$zf_dslb]['yg'];
            $zong_zf_zong_ds = $zong_ds_temp[$zf_dslb]['yg'];
            $zong_zf_guan_ds = $guan_ds_temp[$zf_dslb]['yg'];
            $zong_zf_dagu_ds = $dagu_ds_temp[$zf_dslb]['yg'];
            $zong_zf_gs_ds = $config_ds_temp[$zf_dslb]['yg'];
            $num = randstr();
            $sql_set = " set num='{$num}', username='{$zong}', kithe='{$kithe}', adddate='{$utime}', ds_lb='{$zf_dslb}', class1='{$zf_class1}', class2='{$zf_class2}', class3='{$zf_class3}', rate='{$rate0}', rate2='{$rate0}', sum_m='{$zong_zf_sum}', daizc='{$zong_zf_daizc}', zongzc='{$zong_zf_zongzc}', guanzc='{$zong_zf_guanzc}', daguzc='{$zong_zf_daguzc}', gszc='{$zong_zf_gszc}', user_ds='{$zong_zf_user_ds}', dai_ds='{$zong_zf_zong_ds}', zong_ds='{$zong_zf_zong_ds}', guan_ds='{$zong_zf_guan_ds}', dagu_ds='{$zong_zf_dagu_ds}', dai_rate='{$zf_rate}', zong_rate='{$zf_rate}', guan_rate='{$zf_rate}', dagu_rate='{$zf_rate}', visible=1, bm=2, dai='{$zong}', zong='{$zong}', guan='{$guan}', dagu='{$dagu}', lx=2, abcd='{$abcd}', qx=0, jx=0, lm=0, lmlx=0, sz=1,win='0', class4='{$class4}', class5='{$class5}', rate3=0, rate4=0, ratelm1='0', ratelm2='0', lmclass3='0', ip='0.0.0.0' ";
            $sql1 = "INSERT INTO  web_tan  " . $sql_set;
            $sql2 = "INSERT INTO  web_tans " . $sql_set;
            if (!$db1->query($sql1)) {
                exit("数据库修改出错1");
            }
            if (!$db1->query($sql2)) {
                exit("数据库修改出错2");
            }
        }
    }
    if (($lx == 1 || $lx == 2) && $guan_temp['pz'] == 0 && $guan_ds_temp[$zf_dslb]['pz'] == 1 && 0 <= $guan_ds_temp[$zf_dslb]['pz_sum']) {
        $result1 = $db1->query("select sum(if(username='" . $guan . "',-sum_m,guanzc)) as sum_sum from web_tan where kithe='" . $kithe . "' and class1='" . $zf_class1 . "' and class2='" . $zf_class2 . "' and class3='" . $zf_class3 . "' and guan='" . $guan . "'  and qx=0");
        $Rs5 = $result1->fetch_array();
        if ($Rs5['sum_sum'] != "") {
            $sum_guan = $Rs5['sum_sum'];
        } else {
            $sum_guan = 0;
        }
        $guan_zf_sum = round($sum_guan - $guan_ds_temp[$zf_dslb]['pz_sum'], 0);
        if (1 <= $guan_zf_sum) {
            switch ($pzall) {
                case "0":
                    $guan_zf_daizc = 0;
                    $guan_zf_zongzc = 0;
                    $guan_zf_guanzc = 0;
                    $guan_zf_daguzc = 0;
                    $guan_zf_gszc = $guan_zf_sum;
                    break;
                case "1":
                    $guan_zf_daizc = 0;
                    $guan_zf_zongzc = 0;
                    $guan_zf_guanzc = 0;
                    $guan_zf_daguzc = $guan_zf_sum;
                    $guan_zf_gszc = 0;
                    break;
                case "2":
                    $guan_zf_daizc = 0;
                    $zong_zf_zongzc = 0;
                    $guan_zf_guanzc = 0;
                    $zf_sum_sum = round($guan_zf_sum * $dai_zc / 100, 3) + round($guan_zf_sum * $zong_zc / 100, 3) + round($guan_zf_sum * $guan_zc / 100, 3);
                    if ($zc_all == 0) {
                        $guan_zf_daguzc = round($guan_zf_sum * $dagu_zc / 100, 3);
                        $guan_zf_gszc = round($guan_zf_sum * $gs_zc / 100, 3) + $zf_sum_sum;
                    } else {
                        $guan_zf_daguzc = round($guan_zf_sum * $dagu_zc / 100, 3) + $zf_sum_sum;
                        $guan_zf_gszc = round($guan_zf_sum * $gs_zc / 100, 3);
                    }
                    break;
                case "3":
                    $guan_zf_daizc = 0;
                    $guan_zf_zongzc = 0;
                    $guan_zf_guanzc = 0;
                    $zf_sum_sum = round($guan_zf_sum * $dai_zc / 100, 3) + round($guan_zf_sum * $zong_zc / 100, 3) + round($guan_zf_sum * $guan_zc / 100, 3);
                    if ($dagu_zf_zc == 0) {
                        $guan_zf_daguzc = round($guan_zf_sum * $dagu_zc / 100, 3);
                    } else {
                        $guan_zf_daguzc = 0;
                        $zf_sum_sum += round($guan_zf_sum * $dagu_zc / 100, 3);
                    }
                    $guan_zf_gszc = round($guan_zf_sum * $gs_zc / 100, 3);
                    if ($zc_all == 0) {
                        $guan_zf_gszc += $zf_sum_sum;
                    } else {
                        $guan_zf_daguzc += $zf_sum_sum;
                        break;
                    }
                default:
                    break;
            }
            $guan_zf_user_ds = $guan_ds_temp[$zf_dslb]['yg'];
            $guan_zf_zong_ds = $guan_ds_temp[$zf_dslb]['yg'];
            $guan_zf_zong_ds = $guan_ds_temp[$zf_dslb]['yg'];
            $guan_zf_guan_ds = $guan_ds_temp[$zf_dslb]['yg'];
            $guan_zf_dagu_ds = $dagu_ds_temp[$zf_dslb]['yg'];
            $guan_zf_gs_ds = $config_ds_temp[$zf_dslb]['yg'];
            $num = randstr();
            $sql_set = " set num='{$num}', username='{$guan}', kithe='{$kithe}', adddate='{$utime}', ds_lb='{$zf_dslb}', class1='{$zf_class1}', class2='{$zf_class2}', class3='{$zf_class3}', rate='{$rate0}', rate2='{$rate0}', sum_m='{$guan_zf_sum}', daizc='{$guan_zf_daizc}', zongzc='{$guan_zf_zongzc}', guanzc='{$guan_zf_guanzc}', daguzc='{$guan_zf_daguzc}', gszc='{$guan_zf_gszc}', user_ds='{$guan_zf_user_ds}', dai_ds='{$guan_zf_zong_ds}', zong_ds='{$guan_zf_zong_ds}', guan_ds='{$guan_zf_guan_ds}', dagu_ds='{$guan_zf_dagu_ds}', dai_rate='{$zf_rate}', zong_rate='{$zf_rate}', guan_rate='{$zf_rate}', dagu_rate='{$zf_rate}', visible=1, bm=2, dai='{$guan}', zong='{$guan}', guan='{$guan}', dagu='{$dagu}', lx=3, abcd='{$abcd}', qx=0, jx=0, lm=0, lmlx=0, sz=1,win='0', class4='{$class4}', class5='{$class5}', rate3=0, rate4=0, ratelm1='0', ratelm2='0', lmclass3='0', ip='0.0.0.0' ";
            $sql1 = "INSERT INTO  web_tan  " . $sql_set;
            $sql2 = "INSERT INTO  web_tans " . $sql_set;
            if (!$db1->query($sql1)) {
                exit("数据库修改出错1");
            }
            if (!$db1->query($sql2)) {
                exit("数据库修改出错2");
            }
        }
    }
    if (($lx == 1 || $lx == 2 || $lx == 3) && $dagu_temp['zc'] == 0 && $dagu_ds_temp[$zf_dslb]['pz'] == 1 && 0 <= $dagu_ds_temp[$zf_dslb]['pz_sum']) {
        $result1 = $db1->query("select sum(if(username='" . $dagu . "',-sum_m,daguzc)) as sum_sum from web_tan where kithe='" . $kithe . "' and class1='" . $zf_class1 . "' and class2='" . $zf_class2 . "' and class3='" . $zf_class3 . "' and dagu='" . $dagu . "'  and qx=0");
        $Rs5 = $result1->fetch_array();
        if ($Rs5['sum_sum'] != "") {
            $sum_dagu = $Rs5['sum_sum'];
        } else {
            $sum_dagu = 0;
        }
        $dagu_zf_sum = round($sum_dagu - $dagu_ds_temp[$zf_dslb]['pz_sum'], 0);
        if (1 <= $dagu_zf_sum) {
            switch ($pzall) {
                case "0":
                    $dagu_zf_daizc = 0;
                    $dagu_zf_zongzc = 0;
                    $dagu_zf_guanzc = 0;
                    $dagu_zf_daguzc = 0;
                    $dagu_zf_gszc = $dagu_zf_sum;
                    break;
                case "1":
                    $dagu_zf_daizc = 0;
                    $dagu_zf_zongzc = 0;
                    $dagu_zf_guanzc = 0;
                    $dagu_zf_daguzc = $dagu_zf_sum;
                    $dagu_zf_gszc = 0;
                    break;
                case "2":
                    $dagu_zf_daizc = 0;
                    $dagu_zf_zongzc = 0;
                    $dagu_zf_guanzc = 0;
                    $dagu_zf_daguzc = 0;
                    $dagu_zf_gszc = $dagu_zf_sum;
                    break;
                case "3":
                    $dagu_zf_daizc = 0;
                    $dagu_zf_zongzc = 0;
                    $dagu_zf_guanzc = 0;
                    $dagu_zf_daguzc = 0;
                    $dagu_zf_gszc = $dagu_zf_sum;
                    break;
                default:
                    break;
            }
            $dagu_zf_user_ds = $dagu_ds_temp[$zf_dslb]['yg'];
            $dagu_zf_zong_ds = $dagu_ds_temp[$zf_dslb]['yg'];
            $dagu_zf_zong_ds = $dagu_ds_temp[$zf_dslb]['yg'];
            $dagu_zf_guan_ds = $dagu_ds_temp[$zf_dslb]['yg'];
            $dagu_zf_dagu_ds = $dagu_ds_temp[$zf_dslb]['yg'];
            $dagu_zf_gs_ds = $config_ds_temp[$zf_dslb]['yg'];
            $num = randstr();
            $sql_set = " set num='{$num}', username='{$dagu}', kithe='{$kithe}', adddate='{$utime}', ds_lb='{$zf_dslb}', class1='{$zf_class1}', class2='{$zf_class2}', class3='{$zf_class3}', rate='{$rate0}', rate2='{$rate0}', sum_m='{$dagu_zf_sum}', daizc='{$dagu_zf_daizc}', zongzc='{$dagu_zf_zongzc}', guanzc='{$dagu_zf_guanzc}', daguzc='{$dagu_zf_daguzc}', gszc='{$dagu_zf_gszc}', user_ds='{$dagu_zf_user_ds}', dai_ds='{$dagu_zf_zong_ds}', zong_ds='{$dagu_zf_zong_ds}', guan_ds='{$dagu_zf_guan_ds}', dagu_ds='{$dagu_zf_dagu_ds}', dai_rate='{$zf_rate}', zong_rate='{$zf_rate}', guan_rate='{$zf_rate}', dagu_rate='{$zf_rate}', visible=1, bm=2, dai='{$dagu}', zong='{$dagu}', guan='{$dagu}', dagu='{$dagu}', lx=4, abcd='{$abcd}', qx=0, jx=0, lm=0, lmlx=0, sz=1,win='0', class4='{$class4}', class5='{$class5}', rate3=0, rate4=0, ratelm1='0', ratelm2='0', lmclass3='0', ip='0.0.0.0' ";
            $sql1 = "INSERT INTO  web_tan  " . $sql_set;
            $sql2 = "INSERT INTO  web_tans " . $sql_set;
            if (!$db1->query($sql1)) {
                exit("数据库修改出错1");
            }
            if (!$db1->query($sql2)) {
                exit("数据库修改出错2");
            }
        }
    }
}
$abcd = "";