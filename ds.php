<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
@set_time_limit(0);
$vvv = "";
if ($dssum == 0) {
    $ds_sum_m = $sum_m;
} else {
    $ds_sum_m = $gszc;
}
if (0 < $drop_value && 0 < $drop_unit && $lock_drop == 0) {
    $drop = intval(($bl_blgold + $ds_sum_m) / $drop_value) * $drop_unit;
    $num1 = ($bl_blgold + $ds_sum_m) % $drop_value;
    if ($low_drop < $bl_rate - $drop) {
        $vvv = ",rate=rate-" . $drop . ",blgold=" . $num1;
    } else {
        $vvv = ",rate='" . $low_drop . "',blgold=0";
    }
    switch ($bl_class2) {
        case "特A":
            $abblc = get_config("tm");
            $rateb = round($bl_rate + $abblc - $drop, 3);
            $sql1 = "update web_bl set adddate='" . $utime . "',gold=gold+" . $ds_sum_m . $vvv . " where class1='" . $bl_class1 . "' and class2='特A' and  class3='" . $bl_class3 . "'";
            $db1->query($sql1);
            $sql2 = "update web_bl set adddate='" . $utime . "',gold=gold+" . $ds_sum_m . ",rate='" . $rateb . "'" . " where class1='" . $bl_class1 . "' and class2='特B' and  class3='" . $bl_class3 . "'";
            $db1->query($sql2);
            break;
        case "特B":
            $abblc = get_config("tm");
            $rateb = round($bl_rate - $abblc - $drop, 3);
            $sql1 = "update web_bl set adddate='" . $utime . "',gold=gold+" . $ds_sum_m . $vvv . " where class1='" . $bl_class1 . "' and class2='特B' and  class3='" . $bl_class3 . "'";
            $db1->query($sql1);
            $sql2 = "update web_bl set adddate='" . $utime . "',gold=gold+" . $ds_sum_m . ",rate='" . $rateb . "'" . " where class1='" . $bl_class1 . "' and class2='特A' and  class3='" . $bl_class3 . "'";
            $db1->query($sql2);
            break;
        case "正A":
            $abblc = get_config("zm");
            $rateb = round($bl_rate + $abblc - $drop, 3);
            $sql1 = "update web_bl set adddate='" . $utime . "',gold=gold+" . $ds_sum_m . $vvv . " where class1='" . $bl_class1 . "' and class2='正A' and class3='" . $bl_class3 . "'";
            $db1->query($sql1);
            $sql2 = "update web_bl set adddate='" . $utime . "',gold=gold+" . $ds_sum_m . ",rate='" . $rateb . "'" . " where class1='" . $bl_class1 . "' and class2='正B' and  class3='" . $bl_class3 . "'";
            $db1->query($sql2);
            break;
        case "正B":
            $abblc = get_config("zm");
            $rateb = round($bl_rate - $abblc - $drop, 3);
            $sql1 = "update web_bl set adddate='" . $utime . "',gold=gold+" . $ds_sum_m . $vvv . " where class1='" . $bl_class1 . "' and class2='正B' and class3='" . $bl_class3 . "'";
            $db1->query($sql1);
            $sql2 = "update web_bl set adddate='" . $utime . "',gold=gold+" . $ds_sum_m . ",rate='" . $rateb . "'" . " where class1='" . $bl_class1 . "' and class2='正A' and  class3='" . $bl_class3 . "'";
            $db1->query($sql2);
            break;
        default:
            $sql = "update web_bl set adddate='" . $utime . "',gold=gold+" . $ds_sum_m . $vvv . " where class1='" . $bl_class1 . "' and class2='" . $bl_class2 . "' and class3='" . $bl_class3 . "'";
            $db1->query($sql);
            break;
    }
} else {
    if ($bl_class2 == "特A" || $bl_class2 == "特B") {
        $sql = "update web_bl set adddate='" . $utime . "',gold=gold+" . $ds_sum_m . " where class1='" . $bl_class1 . "' and class3='" . $bl_class3 . "'";
        $db1->query($sql);
    }
}
if ($pz == 0) {
    if ($dai != $zong && $guan_temp['pz'] == 0 && $zong_temp['pz'] == 0 && $dai_temp['pz'] == 0 && $dai_ds_temp[$bl_dslb]['pz'] == 1 && 0 <= $dai_ds_temp[$bl_dslb]['pz_sum']) {
        $result5 = $db1->query("select sum(if(username<>'" . $dai . "',daizc,-sum_m)) as sum_m from web_tan  where kithe='" . $Current_Kithe_Num . "' and  dai='" . $dai . "' and  class1='" . $bl_class1 . "'  and class2='" . $bl_class2 . "' and class3='" . $bl_class3 . "'  and  qx=0");
        $Rs5 = $result5->fetch_array();
        if ($Rs5['sum_m'] != "") {
            $sum_dai = $Rs5['sum_m'];
        } else {
            $sum_dai = 0;
        }
        $dai_zf_sum = round($sum_dai - $dai_ds_temp[$bl_dslb]['pz_sum'], 0);
        if (1 <= $dai_zf_sum) {
            switch ($pzall) {
                case "0":
                    $dai_zf_daizc = 0;
                    $dai_zf_zongzc = 0;
                    $dai_zf_guanzc = 0;
                    $dai_zf_daguzc = 0;
                    $dai_zf_gszc = $dai_zf_sum;
                    break;
                case "1":
                    $dai_zf_daizc = 0;
                    $dai_zf_zongzc = 0;
                    $dai_zf_guanzc = 0;
                    $dai_zf_daguzc = $dai_zf_sum;
                    $dai_zf_gszc = 0;
                    break;
                case "2":
                    $dai_zf_daizc = 0;
                    $zf_sum_sum = round($dai_zf_sum * $dai_zc / 100, 3);
                    $dai_zf_zongzc = round($dai_zf_sum * $zong_zc / 100, 3);
                    $dai_zf_guanzc = round($dai_zf_sum * $guan_zc / 100, 3);
                    if ($zc_all == 0) {
                        $dai_zf_daguzc = round($dai_zf_sum * $dagu_zc / 100, 3);
                        $dai_zf_gszc = round($dai_zf_sum * $gs_zc / 100, 3) + $zf_sum_sum;
                    } else {
                        $dai_zf_daguzc = round($dai_zf_sum * $dagu_zc / 100, 3) + $zf_sum_sum;
                        $dai_zf_gszc = round($dai_zf_sum * $gs_zc / 100, 3);
                    }
                    break;
                case "3":
                    $dai_zf_daizc = 0;
                    $zf_sum_sum = round($dai_zf_sum * $dai_zc / 100, 3);
                    if ($zong_zf_zc == 0) {
                        $dai_zf_zongzc = round($dai_zf_sum * $zong_zc / 100, 3);
                    } else {
                        $dai_zf_zongzc = 0;
                        $zf_sum_sum += round($dai_zf_sum * $zong_zc / 100, 3);
                    }
                    if ($guan_zf_zc == 0) {
                        $dai_zf_guanzc = round($dai_zf_sum * $guan_zc / 100, 3);
                    } else {
                        $dai_zf_guanzc = 0;
                        $zf_sum_sum += round($dai_zf_sum * $guan_zc / 100, 3);
                    }
                    if ($dagu_zf_zc == 0) {
                        $dai_zf_daguzc = round($dai_zf_sum * $dagu_zc / 100, 3);
                    } else {
                        $dai_zf_daguzc = 0;
                        $zf_sum_sum += round($dai_zf_sum * $dagu_zc / 100, 3);
                    }
                    $dai_zf_gszc = round($dai_zf_sum * $gs_zc / 100, 3);
                    if ($zc_all == 0) {
                        $dai_zf_gszc += $zf_sum_sum;
                    } else {
                        $dai_zf_daguzc += $zf_sum_sum;
                        break;
                    }
                default:
                    break;
            }
            $dai_zf_user_ds = $dai_ds_temp[$bl_dslb][$yg_lx];
            $dai_zf_dai_ds = $dai_ds_temp[$bl_dslb][$yg_lx];
            $dai_zf_zong_ds = $zong_ds_temp[$bl_dslb][$yg_lx];
            $dai_zf_guan_ds = $guan_ds_temp[$bl_dslb][$yg_lx];
            $dai_zf_dagu_ds = $dagu_ds_temp[$bl_dslb][$yg_lx];
            $dai_zf_gs_ds = $config_ds_temp[$bl_dslb][$yg_lx];
            $num = randstr();
            $sql_set = " set num='{$num}', username='{$dai}', kithe='{$Current_Kithe_Num}', adddate='{$utime}',ds_lb='{$bl_dslb}', class1='{$bl_class1}', class2='{$bl_class2}', class3='{$bl_class3}', rate='{$rate0}', rate2='{$rate0}', sum_m='{$dai_zf_sum}', daizc='{$dai_zf_daizc}', zongzc='{$dai_zf_zongzc}', guanzc='{$dai_zf_guanzc}', daguzc='{$dai_zf_daguzc}', gszc='{$dai_zf_gszc}', user_ds='{$dai_zf_user_ds}', dai_ds='{$dai_zf_dai_ds}', zong_ds='{$dai_zf_zong_ds}', guan_ds='{$dai_zf_guan_ds}', dagu_ds='{$dai_zf_dagu_ds}',dai_rate='{$rate0}', zong_rate='{$rate0}', guan_rate='{$rate0}', dagu_rate='{$rate0}', bm=2, dai='{$dai}', zong='{$zong}', guan='{$guan}', dagu='{$dagu}', lx=1, visible=1, abcd='{$abcd}', qx=0, jx=0, lm=0, lmlx=0, sz=1,win='0', class4='{$class4}', class5='{$class5}', rate3=0, rate4=0, ratelm1=0, ratelm2=0, lmclass3=0, ip='0.0.0.0' ";
            $sql1 = "INSERT INTO  web_tan " . $sql_set;
            $sql2 = "INSERT INTO  web_tans " . $sql_set;
            if (!$db1->query($sql1)) {
                exit("数据库修改出错1");
            }
            if (!$db1->query($sql2)) {
                exit("数据库修改出错2");
            }
        }
    }
    if ($zong != $guan && $guan_temp['pz'] == 0 && $zong_temp['pz'] == 0 && $zong_ds_temp[$bl_dslb]['pz'] == 1 && 0 <= $zong_ds_temp[$bl_dslb]['pz_sum']) {
        $result5 = $db1->query("select sum(if(username<>'" . $zong . "',zongzc,-sum_m)) as sum_m from web_tan  where kithe='" . $Current_Kithe_Num . "' and  zong='" . $zong . "' and  class1='" . $bl_class1 . "'  and class2='" . $bl_class2 . "' and class3='" . $bl_class3 . "'  and  qx=0");
        $Rs5 = $result5->fetch_array();
        if ($Rs5['sum_m'] != "") {
            $sum_zong = $Rs5['sum_m'];
        } else {
            $sum_zong = 0;
        }
        $zong_zf_sum = round($sum_zong - $zong_ds_temp[$bl_dslb]['pz_sum'], 0);
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
            $zong_zf_user_ds = $zong_ds_temp[$bl_dslb][$yg_lx];
            $zong_zf_zong_ds = $zong_ds_temp[$bl_dslb][$yg_lx];
            $zong_zf_zong_ds = $zong_ds_temp[$bl_dslb][$yg_lx];
            $zong_zf_guan_ds = $guan_ds_temp[$bl_dslb][$yg_lx];
            $zong_zf_dagu_ds = $dagu_ds_temp[$bl_dslb][$yg_lx];
            $zong_zf_gs_ds = $config_ds_temp[$bl_dslb][$yg_lx];
            $num = randstr();
            $sql_set = " set num='{$num}', username='{$zong}', kithe='{$Current_Kithe_Num}', adddate='{$utime}', ds_lb='{$bl_dslb}', class1='{$bl_class1}', class2='{$bl_class2}', class3='{$bl_class3}', rate='{$rate0}', rate2='{$rate0}', sum_m='{$zong_zf_sum}', daizc='{$zong_zf_daizc}', zongzc='{$zong_zf_zongzc}', guanzc='{$zong_zf_guanzc}', daguzc='{$zong_zf_daguzc}', gszc='{$zong_zf_gszc}', user_ds='{$zong_zf_user_ds}', dai_ds='{$zong_zf_zong_ds}', zong_ds='{$zong_zf_zong_ds}', guan_ds='{$zong_zf_guan_ds}', dagu_ds='{$zong_zf_dagu_ds}',dai_rate='{$rate0}', zong_rate='{$rate0}', guan_rate='{$rate0}', dagu_rate='{$rate0}', bm=2, dai='{$zong}', zong='{$zong}', guan='{$guan}', dagu='{$dagu}', lx=2, visible=1, abcd='{$abcd}', qx=0, jx=0, lm=0, lmlx=0, sz=1,win='0', class4='{$class4}', class5='{$class5}', rate3=0, rate4=0, ratelm1=0, ratelm2=0, lmclass3=0, ip='0.0.0.0' ";
            $sql1 = "INSERT INTO  web_tan " . $sql_set;
            $sql2 = "INSERT INTO  web_tans " . $sql_set;
            if (!$db1->query($sql1)) {
                exit("数据库修改出错1");
            }
            if (!$db1->query($sql2)) {
                exit("数据库修改出错2");
            }
        }
    }
    if ($guan != $dagu && $guan_temp['pz'] == 0 && $guan_ds_temp[$bl_dslb]['pz'] == 1 && 0 <= $guan_ds_temp[$bl_dslb]['pz_sum']) {
        $result5 = $db1->query("select sum(if(username<>'" . $guan . "',guanzc,-sum_m)) as sum_m from web_tan  where kithe='" . $Current_Kithe_Num . "' and  guan='" . $guan . "' and  class1='" . $bl_class1 . "'  and class2='" . $bl_class2 . "' and class3='" . $bl_class3 . "'  and  qx=0");
        $Rs5 = $result5->fetch_array();
        if ($Rs5['sum_m'] != "") {
            $sum_guan = $Rs5['sum_m'];
        } else {
            $sum_guan = 0;
        }
        $guan_zf_sum = round($sum_guan - $guan_ds_temp[$bl_dslb]['pz_sum'], 0);
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
            $guan_zf_user_ds = $guan_ds_temp[$bl_dslb][$yg_lx];
            $guan_zf_zong_ds = $guan_ds_temp[$bl_dslb][$yg_lx];
            $guan_zf_zong_ds = $guan_ds_temp[$bl_dslb][$yg_lx];
            $guan_zf_guan_ds = $guan_ds_temp[$bl_dslb][$yg_lx];
            $guan_zf_dagu_ds = $dagu_ds_temp[$bl_dslb][$yg_lx];
            $guan_zf_gs_ds = $config_ds_temp[$bl_dslb][$yg_lx];
            $num = randstr();
            $sql_set = " set num='{$num}', username='{$guan}', kithe='{$Current_Kithe_Num}', adddate='{$utime}', ds_lb='{$bl_dslb}', class1='{$bl_class1}', class2='{$bl_class2}', class3='{$bl_class3}', rate='{$rate0}', rate2='{$rate0}', sum_m='{$guan_zf_sum}', daizc='{$guan_zf_daizc}', zongzc='{$guan_zf_zongzc}', guanzc='{$guan_zf_guanzc}', daguzc='{$guan_zf_daguzc}', gszc='{$guan_zf_gszc}', user_ds='{$guan_zf_user_ds}', dai_ds='{$guan_zf_zong_ds}', zong_ds='{$guan_zf_zong_ds}', guan_ds='{$guan_zf_guan_ds}', dagu_ds='{$guan_zf_dagu_ds}',dai_rate='{$rate0}', zong_rate='{$rate0}', guan_rate='{$rate0}', dagu_rate='{$rate0}', bm=2, dai='{$guan}', zong='{$guan}', guan='{$guan}', dagu='{$dagu}', lx=3, visible=1, abcd='{$abcd}', qx=0, jx=0, lm=0, lmlx=0, sz=1,win='0', class4='{$class4}', class5='{$class5}', rate3=0, rate4=0, ratelm1=0, ratelm2=0, lmclass3=0, ip='0.0.0.0' ";
            $sql1 = "INSERT INTO  web_tan " . $sql_set;
            $sql2 = "INSERT INTO  web_tans " . $sql_set;
            if (!$db1->query($sql1)) {
                exit("数据库修改出错1");
            }
            if (!$db1->query($sql2)) {
                exit("数据库修改出错2");
            }
        }
    }
    if ($dagu_temp['zc'] == 0 && $dagu_ds_temp[$bl_dslb]['pz'] == 1 && 0 <= $dagu_ds_temp[$bl_dslb]['pz_sum']) {
        $result5 = $db1->query("select sum(if(username<>'" . $dagu . "',daguzc,-sum_m)) as sum_m from web_tan  where kithe='" . $Current_Kithe_Num . "' and  dagu='" . $dagu . "' and  class1='" . $bl_class1 . "'  and class2='" . $bl_class2 . "' and class3='" . $bl_class3 . "'  and  qx=0");
        $Rs5 = $result5->fetch_array();
        if ($Rs5['sum_m'] != "") {
            $sum_dagu = $Rs5['sum_m'];
        } else {
            $sum_dagu = 0;
        }
        $dagu_zf_sum = round($sum_dagu - $dagu_ds_temp[$bl_dslb]['pz_sum'], 0);
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
                    $dagu_zf_daguzc = 0;
                    $dagu_zf_gszc = $dagu_zf_sum;
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
            $dagu_zf_user_ds = $dagu_ds_temp[$bl_dslb][$yg_lx];
            $dagu_zf_zong_ds = $dagu_ds_temp[$bl_dslb][$yg_lx];
            $dagu_zf_zong_ds = $dagu_ds_temp[$bl_dslb][$yg_lx];
            $dagu_zf_guan_ds = $dagu_ds_temp[$bl_dslb][$yg_lx];
            $dagu_zf_dagu_ds = $dagu_ds_temp[$bl_dslb][$yg_lx];
            $dagu_zf_gs_ds = $config_ds_temp[$bl_dslb][$yg_lx];
            $num = randstr();
            $sql_set = " set num='{$num}', username='{$dagu}', kithe='{$Current_Kithe_Num}', adddate='{$utime}', ds_lb='{$bl_dslb}', class1='{$bl_class1}', class2='{$bl_class2}', class3='{$bl_class3}', rate='{$rate0}', rate2='{$rate0}', sum_m='{$dagu_zf_sum}', daizc='{$dagu_zf_daizc}', zongzc='{$dagu_zf_zongzc}', guanzc='{$dagu_zf_guanzc}', daguzc='{$dagu_zf_daguzc}', gszc='{$dagu_zf_gszc}', user_ds='{$dagu_zf_user_ds}', dai_ds='{$dagu_zf_zong_ds}', zong_ds='{$dagu_zf_zong_ds}', guan_ds='{$dagu_zf_guan_ds}', dagu_ds='{$dagu_zf_dagu_ds}',dai_rate='{$rate0}', zong_rate='{$rate0}', guan_rate='{$rate0}', dagu_rate='{$rate0}', bm=2, dai='{$dagu}', zong='{$dagu}', guan='{$dagu}', dagu='{$dagu}', lx=4, visible=1, abcd='{$abcd}', qx=0, jx=0, lm=0, lmlx=0, sz=1,win='0', class4='{$class4}', class5='{$class5}', rate3=0, rate4=0, ratelm1=0, ratelm2=0, lmclass3=0, ip='0.0.0.0' ";
            $sql1 = "INSERT INTO  web_tan " . $sql_set;
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