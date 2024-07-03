<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
$vvv = "";
$tb_name = "";
$tb_zd = "";
$blbl = "";
$tj = $sort = 0;
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
$vvv .= " and kithe='" . $kithe . "'";
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
$result = $db1->query("SELECT ds_lb,class1,class2 FROM `web_bl` WHERE class1='多中一' group by class1,class2 order by id ASC");
$ii = 1;
$list_table = array();
$z_zs = $z_sum = $z_zfsum = 0;
while ($rs = $result->fetch_assoc()) {
    $result5 = $db1->query("SELECT sum(if(lx=5 and dagu='外调',sum_m,0)) as sum_wai,sum(" . $tb_zd . ") as sum_sum,sum(sz) as zs,sum(" . $tb_zd . "*rate) as win FROM " . $tb_name . " WHERE qx=0 " . $vvv . " and class1='多中一' and class2='" . $rs['class2'] . "'");
    $row = $result5->fetch_assoc();
    $sum_m = 0;
    $sum_m = round($row['sum_sum'], 2);
    $z_zs += $row['zs'];
    $z_sum += $sum_m;
    $list_table[$ii]['num'] = $rs['class2'];
    $list_table[$ii]['ds_lb'] = $rs['ds_lb'];
    $list_table[$ii]['zs'] = (int) $row['zs'];
    $list_table[$ii]['sum'] = $sum_m;
    $list_table[$ii]['win'] = round($row['win'], 2);
    if ($row['sum_wai'] != "") {
        $list_table[$ii]['zzf'] = abs($row['sum_wai']);
        $z_zfsum += abs($row['sum_wai']);
    } else {
        $list_table[$ii]['zzf'] = 0;
    }
    ++$ii;
}
$list_table_count = count($list_table);
$k = 1;
for (; $k <= $list_table_count; $k += 1) {
    $num_str = $num_color = $bl_str = $zf_str = "";
    $num_color = "#CC0000";
    $num_str = "<font size=\"3px\" color=\"" . $num_color . "\">" . $list_table[$k]['num'] . "</font>";
    $zf_str = "<button class=btn4  onmouseover=this.className='btn4';return true; onMouseOut=this.className='btn4';return true; onclick=show_lm('" . $list_table[$k]['num'] . "');show_lm_win(); >查看</button>";
    $blbl .= $num_str . "@@@" . $list_table[$k]['num'] . "@@@" . $list_table[$k]['zs'] . "@@@" . $list_table[$k]['sum'] . "@@@" . $list_table[$k]['win'] . "@@@" . $list_table[$k]['zzf'] . "@@@" . $zf_str . "###";
}
$blbl .= "&nbsp;@@@&nbsp;@@@<font color=ff0000>" . $z_zs . "注</font>@@@<font color=ff0000>" . $z_sum . "</font>@@@&nbsp;@@@<font color=ff0000>" . $z_zfsum . "@@@&nbsp;</font>###";
echo $blbl;