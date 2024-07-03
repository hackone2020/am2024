<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
if (strpos($flag, "03")) {
} else {
    exit;
}
require_once "../include/page.php";
$result = mysql_query("SELECT ds_lb,yg,rake_sj,zf_sum FROM web_config_ds WHERE class='生肖' Order By ID");
$ds_temp = array();
$x = 0;
while ($Image = mysql_fetch_assoc($result)) {
    $ds_temp[$Image['ds_lb']]['zf_sum'] = $Image['zf_sum'];
    $ds_temp[$Image['ds_lb']]['rake_sj'] = $Image['rake_sj'];
    $ds_temp[$Image['ds_lb']]['zf_ds'] = $Image['yg'];
    ++$x;
}
$vvv = "";
$tb_name = "";
$tb_zd = "";
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
echo "<table id=\"tb1\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\"  bgcolor=\"C2C2A6\" class=\"m_tab\" width=\"800\">\r\n  <tr class=\"m_title_ft_future\">\r\n    <td width=\"252\">号码</td>\r\n    <td width=\"61\">注单数</td>\r\n    <td width=\"112\">总额</td>\r\n    <td width=\"110\">彩金</td>\r\n    <td width=\"89\">走飞</td>\r\n    <td width=\"108\">已走</td>\r\n  </tr>\r\n";
$pagesize = 50;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$result = mysql_query("SELECT count(*) FROM (SELECT DISTINCT(class3) FROM " . $tb_name . " WHERE qx=0 " . $vvv . " and class1='生肖' and class2='六肖') AS temp_tan");
$num = @mysql_result($result, "0");
$total = $num;
$pagecount = ceil($total / $pagesize);
if ($pagecount < $page) {
    $page = $pagecount;
}
if ($page <= 0) {
    $page = 1;
}
$offset = ($page - 1) * $pagesize;
$pre = $page - 1;
$next = $page + 1;
$first = 1;
$last = $pagecount;
if ($num == 0) {
    echo "  <tr bgcolor=\"#FFFFFF\">\r\n    <td height=\"35\" colspan=\"6\" align=\"center\">查无任何资料!</td>\r\n  </tr>\r\n";
} else {
    $result = mysql_query("SELECT class3,max(rate) as bl,sum(if(lx=5 and dagu='外调',sum_m,0)) as sum_wai,sum(" . $tb_zd . ") as sum_sum,sum(sz) as zs,sum(" . $tb_zd . "*rate) as win,sum(" . $tb_zd . "*Abs(dagu_ds)/100) as ds FROM " . $tb_name . " WHERE qx=0 " . $vvv . " and class1='生肖' and class2='六肖'  group by class3 ORDER BY sum_sum DESC limit " . $offset . "," . $pagesize);
    while ($image = mysql_fetch_array($result)) {
        echo "  <tr bgcolor=\"#FFFFFF\">\r\n    <td height=\"28\" align=\"center\"><font size=\"3px\" color=\"#CC0000\"><b>";
        echo $image['class3'];
        echo "</b></font></td>\r\n    <td height=\"28\" align=\"center\">";
        echo $image['zs'];
        echo "</td>\r\n    <td height=\"28\" align=\"center\">\r\n    ";
        $strtmp = "look.html?action=list_look&uid=" . $uid . "&kithe=" . $kithe . "&class2=六肖&class3=" . $image['class3'];
        echo "    <center><button class=btn1 onmouseover=this.className='btn2';return true; onMouseOut=this.className='btn1';return true; onClick=ops('";
        echo $strtmp;
        echo "',400,750) >";
        echo round($image['sum_sum'], 2);
        echo "</button></center>\r\n    </td>\r\n    <td height=\"28\" align=\"center\">";
        echo round($image['win'], 2);
        echo "</td>\r\n    <td height=\"28\" align=\"center\">\r\n    ";
        $zf_win = $ds_temp['SX6']['zf_sum'] - $image['sum_sum'];
        if ($zc == 0 && $zf_win < 0 && 0 < $ds_temp['SX6']['zf_sum']) {
            $list_table_zf = round(abs($zf_win), 0);
        } else {
            $list_table_zf = 0;
        }
        if ($list_table_zf == 0) {
            $zf_str = "<button class=btn1  onmouseover=this.className='btn2';return true; onMouseOut=this.className='btn1';return true; onclick=show_win('" . $image['class3'] . "','" . $list_table_zf . "','" . $image['bl'] . "','" . $ds_temp['SX6']['zf_ds'] . "','生肖','六肖') >手补</button>";
        } else {
            $zf_str = "<button class=btn1  onmouseover=this.className='btn2';return true; onMouseOut=this.className='btn1';return true; onclick=show_win('" . $image['class3'] . "','" . $list_table_zf . "','" . $image['bl'] . "','" . $ds_temp['SX6']['zf_ds'] . "','生肖','六肖') >手补 " . $list_table_zf . "</button>";
        }
        if ($kithe != $Current_Kithe_Num) {
            $zf_str = "";
        }
        echo "    ";
        echo $zf_str;
        echo "    </td>\r\n    <td height=\"28\" align=\"center\">\r\n    ";
        if ($image['sum_wai'] != 0 && $image['sum_wai'] != "") {
            $strtmp = "look.html?action=list_look&uid=" . $uid . "&kithe=" . $kithe . "&lx=5&class2=六肖&class3=" . $image['class3'];
            echo "    <center><button class=btn1 onmouseover=this.className='btn2';return true; onMouseOut=this.className='btn1';return true; onClick=ops('";
            echo $strtmp;
            echo "',400,750) >";
            echo round(abs($image['sum_wai']), 2);
            echo "</button></center>\r\n    ";
        } else {
            echo "0";
        }
        echo "    </td>\r\n  </tr>\r\n";
    }
    echo "  <tr bgcolor=\"#FFFFFF\">\r\n    <td height=\"28\" colspan=\"6\" align=\"center\">";
    echo get_page_html($pagecount, $page);
    echo "</td>\r\n  </tr>\r\n";
}
echo "</table>\r\n";