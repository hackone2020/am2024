<?php

function get_st($i)
{
    $st = "";
    switch ($i) {
        case "特单":
            $st = "特码单双";
            break;
        case "特双":
            $st = "特码单双";
            break;
        case "特大":
            $st = "特码大小";
            break;
        case "特小":
            $st = "特码大小";
            break;
        case "合单":
            $st = "特码合数单双";
            break;
        case "合双":
            $st = "特码合数单双";
            break;
        case "合大":
            $st = "特码合数大小";
            break;
        case "合小":
            $st = "特码合数大小";
            break;
        case "尾大":
            $st = "特码尾大尾小";
            break;
        case "尾小":
            $st = "特码尾大尾小";
            break;
        case "家禽":
            $st = "特码家禽野兽";
            break;
        case "野兽":
            $st = "特码家禽野兽";
            break;
        case "红波":
            $st = "特码色波";
            break;
        case "绿波":
            $st = "特码色波";
            break;
        case "蓝波":
            $st = "特码色波";
            break;
        default:
            $st = "特A";
            break;
    }
    return $st;
}
if (!defined("KK_VER")) {
    exit("无效的访问");
}
if ($vip == 1 && !strpos($flag, "1")) {
    echo "<center>你没有该权限功能!</center>";
    exit;
}
include "check_zf.php";
$tmp_num = array();
$tmp_num['特单'] = "1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47";
$tmp_num['特双'] = "2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48";
$tmp_num['特大'] = "25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48";
$tmp_num['特小'] = "1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24";
$tmp_num['合单'] = "1,3,5,7,9,10,12,14,16,18,21,23,25,27,29,30,32,34,36,38,41,43,45,47";
$tmp_num['合双'] = "2,4,6,8,11,13,15,17,19,20,22,24,26,28,31,33,35,37,39,40,42,44,46,48";
$tmp_num['合大'] = "7,8,9,16,17,18,19,25,26,27,28,29,34,35,36,37,38,39,43,44,45,46,47,48";
$tmp_num['合小'] = "1,2,3,4,5,6,10,11,12,13,14,15,20,21,22,23,24,30,31,32,33,40,41,42";
$tmp_num['尾大'] = "7,8,9,16,17,18,19,25,26,27,28,29,34,35,36,37,38,39,43,44,45,46,47,48";
$tmp_num['尾小'] = "1,2,3,4,5,6,10,11,12,13,14,15,20,21,22,23,24,30,31,32,33,40,41,42";
$tmp_num['红波'] = "1,2,7,8,12,13,18,19,23,24,29,30,34,35,40,45,46";
$tmp_num['绿波'] = "5,6,11,16,17,21,22,27,28,32,33,38,39,43,44,49";
$tmp_num['蓝波'] = "3,4,9,10,14,15,20,25,26,31,36,37,41,42,47,48";
$result = $db1->query("SELECT ds,yg,zf_sum FROM web_user_ds WHERE username='" . $kauser . "' Order By ID");
$ds_temp = array();
$x = 0;
while ($Image = $result->fetch_assoc()) {
    $ds_temp[$Image['ds']]['zf_sum'] = $Image['zf_sum'];
    $ds_temp[$Image['ds']]['zf_ds'] = $Image['yg'];
    ++$x;
}
$vvv = "";
$tb_name = "";
$tb_zd = "";
$blbl = "";
$tj = $sort = 0;
$kithe = $Current_Kithe_Num;
$tb_name = "web_tan";
if ($lx == 4) {
    $select_sql = " dagu='" . $kauser . "' ";
    $vv = "dagu";
    $next = "guan";
}
if ($lx == 3) {
    $select_sql = " guan='" . $kauser . "' ";
    $vv = "guan";
    $next = "zong";
}
if ($lx == 2) {
    $select_sql = " zong='" . $kauser . "' ";
    $vv = "zong";
    $next = "dai";
}
if ($lx == 1) {
    $select_sql = " dai='" . $kauser . "' ";
    $vv = "dai";
    $next = "user";
}
if ($_GET['zc'] == 1) {
    $tb_zd = "sum_m";
} else {
    $tb_zd = $vv . "zc";
}
if ($_GET['tj'] != "") {
    $tj = $_GET['tj'];
}
if ($_GET['sort'] != "") {
    $sort = $_GET['sort'];
}
$vvv .= " and kithe='" . $kithe . "'";
$resultbb = $db1->query("select * from web_kithe where nn=" . $kithe . " order by id desc LIMIT 1");
$row = $resultbb->fetch_array();
$na = $row['na'];
$wsws0 = $na % 10;
$wsws1 = $n1 % 10;
$wsws2 = $n2 % 10;
$wsws3 = $n3 % 10;
$wsws4 = $n4 % 10;
$wsws5 = $n5 % 10;
$wsws6 = $n6 % 10;
$abcd = $_GET['abcd'];
switch ($abcd) {
    case "A":
        $vvv .= " and abcd='A' ";
        break;
    case "B":
        $vvv .= " and abcd='B' ";
        break;
    case "C":
        $vvv .= " and abcd='C' ";
        break;
    case "D":
        $vvv .= " and abcd='D' ";
        break;
    default:
        break;
}
$result = $db1->query("select class3,class1,class2,rate,blrate   from  web_bl where   class1='特码' and (class2='特A' or class2='特码') order by id");
$ii = 1;
$list_table = array();
$Rs4 = array();
$Rs5 = array();
$result5 = $db1->query("SELECT class3,sum(if(username='" . $kauser . "',sum_m,0)) as sum_wai,sum(if(username='" . $kauser . "',-sum_m," . $tb_zd . ")) as sum_sum,sum(sz) as zs,sum(if(username='" . $kauser . "',-sum_m*rate," . $tb_zd . "*rate)) as win,sum(if(username='" . $kauser . "',-sum_m*Abs(user_ds)/100," . $tb_zd . "*Abs(" . $next . "_ds)/100)) as ds FROM " . $tb_name . " WHERE " . $select_sql . " and qx=0 " . $vvv . " and class1='特码' and (class2='特A' or class2='特B' or class2='特码') group by class3 order by class3 DESC");
while ($row = $result5->fetch_assoc()) {
    $Rs5[$row['class3']] = $row;
    $Rs4[$row['class3']]['sum_sum'] = $row['sum_wai'];
}
$Rs5_count = count($Rs5) - 1;
$Rs4_count = count($Rs4) - 1;
$z_zs = $z_sum = $z_49sum = $z_ddsum = $z_49ds = $z_ddds = $z_49dd = $z_zfsum = 0;
while ($rs = $result->fetch_assoc()) {
    $sum_m = 0;
    $sum_m = round($Rs5[$rs['class3']]['sum_sum'], 2);
    $z_zs += $Rs5[$rs['class3']]['zs'];
    $z_sum += $sum_m;
    if ($ii <= 49) {
        $z_49ds += $Rs5[$rs['class3']]['ds'];
        $z_49sum += $Rs5[$rs['class3']]['sum_sum'];
    } else {
        $z_ddds += $Rs5[$rs['class3']]['ds'];
        $z_ddsum += $Rs5[$rs['class3']]['sum_sum'];
    }
    $list_table[$ii]['class1'] = $rs['class1'];
    $list_table[$ii]['class2'] = $rs['class2'];
    $list_table[$ii]['num'] = $rs['class3'];
    $list_table[$ii]['bl'] = $rs['rate'];
    $list_table[$ii]['blrate'] = $rs['blrate'];
    $list_table[$ii]['zs'] = $Rs5[$rs['class3']]['zs'];
    $list_table[$ii]['sum'] = $sum_m;
    $list_table[$ii]['ds'] = $Rs5[$rs['class3']]['ds'];
    $list_table[$ii]['dd'] = 0;
    $list_table[$ii]['win'] = round($Rs5[$rs['class3']]['win'], 2);
    $list_table[$ii]['zf'] = 0;
    if ($Rs4[$rs['class3']]['sum_sum'] != "") {
        $list_table[$ii]['zzf'] = abs($Rs4[$rs['class3']]['sum_sum']);
        $z_zfsum += abs($Rs4[$rs['class3']]['sum_sum']);
    } else {
        $list_table[$ii]['zzf'] = 0;
    }
    if (49 < $ii && $tj == 1) {
        if ($rs['class3'] == "红波" || $rs['class3'] == "绿波" || $rs['class3'] == "蓝波") {
            $z_49dd += $list_table[$ii]['sum'] - $list_table[$ii]['ds'];
        }
        $number_array = explode(",", $tmp_num[$rs['class3']]);
        $number_count = count($number_array);
        $j = 0;
        for (; $j < $number_count; $j += 1) {
            $list_table[$number_array[$j]]['dd'] = $list_table[$number_array[$j]]['dd'] + round($sum_m / $number_count / $list_table[$number_array[$j]]['bl'], 2);
            $list_table[$number_array[$j]]['win'] = $list_table[$number_array[$j]]['win'] + $list_table[$ii]['win'];
        }
    }
    ++$ii;
}
$list_table_count = count($list_table);
$k = 1;
for (; $k <= $list_table_count; $k += 1) {
    if ($k <= 49) {
        if ($tj == 0) {
            $list_table[$k]['win'] = round(0 - ($list_table[$k]['win'] - $z_49sum + $z_49ds), 2);
        }
        if ($tj == 1) {
            if ($k == 49) {
                $list_table[$k]['win'] = round(0 - ($list_table[$k]['win'] - $z_49sum + $z_49ds), 2) + round($z_49dd, 2);
            } else {
                $list_table[$k]['win'] = round(0 - ($list_table[$k]['win'] - $z_49sum + $z_49ds - $z_ddsum + $z_ddds), 2);
            }
        }
        $zf_win = $ds_temp[get_st($list_table[$k]['num'])]['zf_sum'] + $list_table[$k]['win'];
        if ($_GET['zc'] == 0 && $zf_win < 0 && 0 < $ds_temp[get_st($list_table[$k]['num'])]['zf_sum']) {
            $zftmp1 = $ds_temp[get_st($list_table[$k]['num'])]['zf_ds'] / 100;
            $zftmp2 = $zf_win / ($list_table[$k]['bl'] + $zftmp1 - 1);
            $list_table[$k]['zf'] = round(abs($zftmp2), 0);
        } else {
            $list_table[$k]['zf'] = "";
        }
    }
    if (49 < $k) {
        $list_table[$k]['win'] = $list_table[$k]['win'];
        $zf_win = $ds_temp[get_st($list_table[$k]['num'])]['zf_sum'] - $list_table[$k]['sum'];
        if ($_GET['zc'] == 0 && $zf_win < 0 && 0 < $ds_temp[get_st($list_table[$k]['num'])]['zf_sum']) {
            $list_table[$k]['zf'] = round(abs($zf_win), 0);
        } else {
            $list_table[$k]['zf'] = "";
        }
    }
}
$list_table_1 = array_slice($list_table, 0, 49);
$list_table_2 = array_slice($list_table, 49, 13);
if ($sort == 0) {
    foreach ($list_table_1 as $t_k => $t_v) {
        $win[] = $t_v['win'];
        $nums[] = $t_v['num'];
    }
    array_multisort($win, SORT_ASC, $nums, SORT_ASC, $list_table_1);
}
if ($sort == 1) {
    foreach ($list_table_1 as $t_k => $t_v) {
        $sums[] = $t_v['sum'];
        $nums[] = $t_v['num'];
    }
    array_multisort($sums, SORT_DESC, $nums, SORT_DESC, $list_table_1);
}
if ($sort == 2) {
    foreach ($list_table_1 as $t_k => $t_v) {
        $nums[] = $t_v['num'];
        $sums[] = $t_v['sum'];
    }
    array_multisort($nums, SORT_ASC, $sums, SORT_ASC, $list_table_1);
}
$list_table = array_merge_recursive($list_table_1, $list_table_2);
$k = 0;
for (; $k < $list_table_count; $k += 1) {
    $num_str = $num_color = $bl_str = $zf_str = "";
    if (1 <= $list_table[$k]['num'] && $list_table[$k]['num'] <= 49) {
        if (get_bs_color($list_table[$k]['num']) == "r") {
            $num_color = "red";
        } else {
            if (get_bs_color($list_table[$k]['num']) == "b") {
                $num_color = "blue";
            } else {
                if (get_bs_color($list_table[$k]['num']) == "g") {
                    $num_color = "green";
                }
            }
        }
    } else {
        if ($list_table[$k]['num'] == "红波") {
            $num_color = "red";
        } else {
            if ($list_table[$k]['num'] == "蓝波") {
                $num_color = "blue";
            } else {
                if ($list_table[$k]['num'] == "绿波") {
                    $num_color = "green";
                } else {
                    $num_color = "#CC0000";
                }
            }
        }
    }
    if ($na != 0 && $list_table[$k]['num'] == $na) {
        $num_str = "<SPAN STYLE='background-color:ffff00;WIDTH: 100%;height:25px;vertical-align:middle;' ><span style='display:inline-block;height:100%;vertical-align:middle;'></span><font color=ff0000><b><font size=\"3px\" color=\"" . $num_color . "\">" . $list_table[$k]['num'] . "</font>" . "</b></font></span>";
    } else {
        $num_str = "<font size=\"3px\" color=\"" . $num_color . "\">" . $list_table[$k]['num'] . "</font>";
    }
    $bl_str = $list_table[$k]['bl'];
    if ($list_table[$k]['bl'] != $list_table[$k]['blrate']) {
        $bl_str = "<SPAN STYLE='background-color:ffff00;WIDTH: 100%;height:25px;vertical-align:middle;' ><span style='display:inline-block;height:100%;vertical-align:middle;'></span><font color=ff0000><b>" . $bl_str . "</b></font></span>";
    } else {
        $bl_str = "<b>" . $bl_str . "</b>";
    }
    if ($vip == 0 && $pz_of == 0 && $Current_KitheTable[29] != 0 && $Current_KitheTable[11] != 0) {
        if ($list_table[$k]['zf'] == 0) {
            $zf_str = "<button class=btn1  onmouseover=this.className='btn2';return true; onMouseOut=this.className='btn1';return true; onclick=show_win('" . $list_table[$k]['num'] . "','" . $list_table[$k]['zf'] . "','" . $list_table[$k]['bl'] . "','" . $ds_temp[get_st($list_table[$k]['num'])]['zf_ds'] . "','" . $list_table[$k]['class1'] . "','" . $list_table[$k]['class2'] . "') >手补</button>";
        } else {
            $zf_str = "<button class=btn1  onmouseover=this.className='btn2';return true; onMouseOut=this.className='btn1';return true; onclick=show_win('" . $list_table[$k]['num'] . "','" . $list_table[$k]['zf'] . "','" . $list_table[$k]['bl'] . "','" . $ds_temp[get_st($list_table[$k]['num'])]['zf_ds'] . "','" . $list_table[$k]['class1'] . "','" . $list_table[$k]['class2'] . "') >手补 " . $list_table[$k]['zf'] . "</button>";
        }
    } else {
        $zf_str = "";
    }
    $blbl .= $num_str . "@@@" . $list_table[$k]['num'] . "@@@" . $bl_str . "@@@" . $list_table[$k]['zs'] . "@@@" . $list_table[$k]['sum'] . "@@@" . $list_table[$k]['dd'] . "@@@" . $list_table[$k]['win'] . "@@@" . $zf_str . "@@@" . $list_table[$k]['zzf'] . "###";
}
$blbl .= "&nbsp;@@@&nbsp;@@@&nbsp;@@@<font color=ff0000>" . $z_zs . "注</font>@@@<font color=ff0000>" . $z_sum . "</font>@@@&nbsp;@@@&nbsp;@@@&nbsp;@@@<font color=ff0000>" . $z_zfsum . "</font>###";
?>
<?=$blbl?>