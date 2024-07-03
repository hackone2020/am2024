<?php

function get_st($i)
{
    $st = "";
    switch ($i) {
        case "总单":
            $st = "总分单双";
            break;
        case "总双":
            $st = "总分单双";
            break;
        case "总大":
            $st = "总分大小";
            break;
        case "总小":
            $st = "总分大小";
            break;
        default:
            $st = "正A";
            break;
    }
    return $st;
}
if (!defined("KK_VER")) {
    exit("无效的访问");
}
if (strpos($flag, "03")) {
} else {
    exit;
}
$result = $db1->query("SELECT ds,yg,rake_sj,zf_sum FROM web_config_ds WHERE class='正码' Order By ID");
$ds_temp = array();
$x = 0;
while ($Image = ($result->fetch_assoc())) {
    $ds_temp[$Image['ds']]['rake_sj'] = $Image['rake_sj'];
    $ds_temp[$Image['ds']]['zf_sum'] = $Image['zf_sum'];
    $ds_temp[$Image['ds']]['zf_ds'] = $Image['yg'];
    ++$x;
}
$vvv = "";
$tb_name = "";
$tb_zd = "";
$blbl = "";
$sort = 1;
if ($_GET['kithe'] != "") {
    $kithe = $_GET['kithe'];
    if ($kithe == $Current_Kithe_Num) {
        $tb_name = "web_tan";
    } else {
        $tb_name = "web_tans";
    }
} else {
    $kithe = $Current_Kithe_Num;
    $tb_name = "web_tan";
}
if ($_GET['zc'] == 1) {
    $tb_zd = "sum_m";
} else {
    $tb_zd = "gszc";
}
if ($_GET['sort'] != "") {
    $sort = $_GET['sort'];
}
$vvv .= " and kithe='" . $kithe . "'";
$resultbb = $db1->query("select * from web_kithe where nn=" . $kithe . " order by id desc LIMIT 1");
$row = $resultbb->fetch_array();
$n1 = $row['n1'];
$n2 = $row['n2'];
$n3 = $row['n3'];
$n4 = $row['n4'];
$n5 = $row['n5'];
$n6 = $row['n6'];
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
$result = $db1->query("select class3,class1,class2,rate,blrate   from  web_bl where  class2='正A' or class2='总分' order by id");
$ii = 1;
$list_table = array();
$Rs4 = array();
$Rs5 = array();
$result5 = $db1->query("SELECT class3,sum(if(lx=5 and dagu='外调',sum_m,0)) as sum_wai,sum(" . $tb_zd . ") as sum_sum,sum(sz) as zs,sum(" . $tb_zd . "*rate) as win,sum(" . $tb_zd . "*Abs(dagu_ds)/100) as ds FROM " . $tb_name . " WHERE qx=0 " . $vvv . " and (class1='正码' or class2='总分') group by class3 order by class3 DESC");
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
    $list_table[$ii]['class1'] = $rs['class1'];
    $list_table[$ii]['class2'] = $rs['class2'];
    $list_table[$ii]['num'] = $rs['class3'];
    $list_table[$ii]['bl'] = $rs['rate'];
    $list_table[$ii]['blrate'] = $rs['blrate'];
    $list_table[$ii]['zs'] = $Rs5[$rs['class3']]['zs'];
    $list_table[$ii]['sum'] = $sum_m;
    $list_table[$ii]['ds'] = $Rs5[$rs['class3']]['ds'];
    $list_table[$ii]['win'] = round($Rs5[$rs['class3']]['win'], 2);
    $list_table[$ii]['zf'] = 0;
    if ($Rs4[$rs['class3']]['sum_sum'] != "") {
        $list_table[$ii]['zzf'] = abs($Rs4[$rs['class3']]['sum_sum']);
        $z_zfsum += abs($Rs4[$rs['class3']]['sum_sum']);
    } else {
        $list_table[$ii]['zzf'] = 0;
    }
    ++$ii;
}
$list_table_count = count($list_table);
$k = 1;
for (; $k <= $list_table_count; $k += 1) {
    $zf_win = $ds_temp[get_st($list_table[$k]['num'])]['zf_sum'] - $list_table[$k]['sum'];
    if ($_GET['zc'] == 0 && $zf_win < 0 && 0 < $ds_temp[get_st($list_table[$k]['num'])]['zf_sum']) {
        $list_table[$k]['zf'] = round(abs($zf_win), 0);
    } else {
        $list_table[$k]['zf'] = "";
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
        $num_color = "#CC0000";
    }
    if ($list_table[$k]['num'] == $n1 || $list_table[$k]['num'] == $n2 || $list_table[$k]['num'] == $n3 || $list_table[$k]['num'] == $n4 || $list_table[$k]['num'] == $n5 || $list_table[$k]['num'] == $n6) {
        $num_str = "<SPAN STYLE='background-color:ffff00;WIDTH: 100%;height:25px;vertical-align:middle;' ><span style='display:inline-block;height:100%;vertical-align:middle;'></span><font color=ff0000><b><font size=\"3px\" color=\"" . $num_color . "\">" . $list_table[$k]['num'] . "</font>" . "</b></font></span>";
    } else {
        $num_str = "<font size=\"3px\" color=\"" . $num_color . "\">" . $list_table[$k]['num'] . "</font>";
    }
    $bl_str = $list_table[$k]['bl'];
    $bl_str = "<a style=\"cursor:pointer\" onClick=\"UpdateRate('MODIFYRATE','bl" . $k . "','bl" . $k . "','uid=" . $uid . "&class1=" . $list_table[$k]['class1'] . "&ids=" . $list_table[$k]['class2'] . "&sqq=sqq&lxlx=0&qtqt=" . $ds_temp[get_st($list_table[$k]['num'])]['rake_sj'] . "&class3=" . $list_table[$k]['num'] . "');\"><img src=\"images/sub.png\" width=\"19\" height=\"17\" border=\"0\" ></a>" . $bl_str . "<a style=\"cursor:pointer\" onClick=\"UpdateRate('MODIFYRATE','bl" . $k . "','bl" . $k . "','uid=" . $uid . "&class1=" . $list_table[$k]['class1'] . "&ids=" . $list_table[$k]['class2'] . "&sqq=sqq&lxlx=1&qtqt=" . $ds_temp[get_st($list_table[$k]['num'])]['rake_sj'] . "&class3=" . $list_table[$k]['num'] . "');\"><img src=\"images/add.png\" width=\"19\" height=\"17\" border=\"0\" ></a>";
    if ($list_table[$k]['bl'] != $list_table[$k]['blrate']) {
        $bl_str = "<SPAN STYLE='background-color:ffff00;WIDTH: 100%;height:25px;vertical-align:middle;' ><span style='display:inline-block;height:100%;vertical-align:middle;'></span><font color=ff0000><b>" . $bl_str . "</b></font></span>";
    } else {
        $bl_str = "<b>" . $bl_str . "</b>";
    }
    if ($list_table[$k]['zf'] == 0) {
        $zf_str = "<button class=btn4  onmouseover=this.className='btn4';return true; onMouseOut=this.className='btn4';return true; onclick=show_win('" . $list_table[$k]['num'] . "','" . $list_table[$k]['zf'] . "','" . $list_table[$k]['bl'] . "','" . $ds_temp[get_st($list_table[$k]['num'])]['zf_ds'] . "','" . $list_table[$k]['class1'] . "','" . $list_table[$k]['class2'] . "') >手补</button>";
    } else {
        $zf_str = "<button class=btn4  onmouseover=this.className='btn4';return true; onMouseOut=this.className='btn4';return true; onclick=show_win('" . $list_table[$k]['num'] . "','" . $list_table[$k]['zf'] . "','" . $list_table[$k]['bl'] . "','" . $ds_temp[get_st($list_table[$k]['num'])]['zf_ds'] . "','" . $list_table[$k]['class1'] . "','" . $list_table[$k]['class2'] . "') >手补 " . $list_table[$k]['zf'] . "</button>";
    }
    $blbl .= $num_str . "@@@" . $list_table[$k]['num'] . "@@@" . $bl_str . "@@@" . $list_table[$k]['zs'] . "@@@" . $list_table[$k]['sum'] . "@@@" . $list_table[$k]['win'] . "@@@" . $zf_str . "@@@" . $list_table[$k]['zzf'] . "###";
}
$blbl .= "&nbsp;@@@&nbsp;@@@&nbsp;@@@<font color=ff0000>" . $z_zs . "注</font>@@@<font color=ff0000>" . $z_sum . "</font>@@@&nbsp;@@@&nbsp;@@@<font color=ff0000>" . $z_zfsum . "</font>###";
echo $blbl;