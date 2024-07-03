<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
if ($vip == 1 && !strpos($flag, "1")) {
    echo "<center>你没有该权限功能!</center>";
    exit;
}
include "check_zf.php";
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
$result = $db1->query("select ds,ds_lb  from  web_config_ds where class='连码' order by id");
$ii = 1;
$list_table = array();
$z_zs = $z_sum = $z_zfsum = 0;
while ($rs = $result->fetch_assoc()) {
    $result5 = $db1->query("SELECT sum(if(username='" . $kauser . "',sum_m,0)) as sum_wai,sum(if(username='" . $kauser . "',-sum_m," . $tb_zd . ")) as sum_sum,sum(sz) as zs,sum(if(username='" . $kauser . "',-sum_m*rate," . $tb_zd . "*rate)) as win FROM " . $tb_name . " WHERE " . $select_sql . " and qx=0 " . $vvv . " and class1='连码' and ds_lb='" . $rs['ds_lb'] . "'");
    $row = $result5->fetch_assoc();
    $sum_m = 0;
    $sum_m = round($row['sum_sum'], 2);
    $z_zs += $row['zs'];
    $z_sum += $sum_m;
    $list_table[$ii]['num'] = $rs['ds'];
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
    $zf_str = "<button class=btn1  onmouseover=this.className='btn2';return true; onMouseOut=this.className='btn1';return true; onclick=show_lm('" . $list_table[$k]['num'] . "');show_lm_win(); >查看</button>";
    $blbl .= $num_str . "@@@" . $list_table[$k]['num'] . "@@@" . $list_table[$k]['zs'] . "@@@" . $list_table[$k]['sum'] . "@@@" . $list_table[$k]['win'] . "@@@" . $list_table[$k]['zzf'] . "@@@" . $zf_str . "###";
}
$blbl .= "&nbsp;@@@&nbsp;@@@<font color=ff0000>" . $z_zs . "注</font>@@@<font color=ff0000>" . $z_sum . "</font>@@@&nbsp;@@@<font color=ff0000>" . $z_zfsum . "@@@&nbsp;</font>###";
echo $blbl;?>