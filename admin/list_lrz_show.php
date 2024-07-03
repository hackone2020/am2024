<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
if (strpos($flag, "03")) {
} else {
    exit();
}
$arr_typeflip = array_flip($arr_type);
$ids = "粒任中";
$class2 = $_GET['class2'];
switch ($class2) {
    case "一粒任中":
        $bl_dslb = "1LRZ";
        break;
    case "二粒任中":
        $bl_dslb = "2LRZ";
        break;
    case "三粒任中":
        $bl_dslb = "3LRZ";
        break;
    case "四粒任中":
        $bl_dslb = "4LRZ";
        break;
    case "五粒任中":
        $bl_dslb = "5LRZ";
        break;
    default:
        echo "<script>window.open('index.php','_top')</script>";
        exit();
        break;
}
require_once("../include/page.php");
$result = $db1->query("SELECT ds_lb,yg,rake_sj,zf_sum FROM web_config_ds WHERE class='粒任中' Order By ID");
$ds_temp = array();
$x = 0;
while ($Image = $result->fetch_assoc()) {
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
    case "E":
        $vvv .= " and abcd='E' ";
        break;
    case "F":
        $vvv .= " and abcd='F' ";
        break;
    case "G":
        $vvv .= " and abcd='G' ";
        break;
    case "H":
        $vvv .= " and abcd='H' ";
        break;
    default:
        break;
}
?>
<table id="tb1" border="0" cellspacing="1" cellpadding="0" bgcolor="C2C2A6" width="100%">
    <tr>
        <td width="252" height="28" align="center" class="t_list_tr_3">号码</td>
        <td width="112" align="center" class="t_list_tr_3">总额</td>
        <td width="110" align="center" class="t_list_tr_3">预计</td>
        <td width="89" align="center" class="t_list_tr_3">补货</td>
        <td width="108" align="center" class="t_list_tr_3">已补</td>
    </tr>
    <?
    $pagesize = 10;
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $result = $db1->query("SELECT count(*) FROM (SELECT DISTINCT(class3) FROM " . $tb_name . " WHERE qx=0 " . $vvv . " and class1='" . $ids . "' and class2='" . $class2 . "') AS temp_tan");
    $num1 = @$result->fetch_array();
    $num = $num1[0];
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
    ?>
        <tr bgcolor="#FFFFFF">
            <td height="35" colspan="6" align="center">查无任何资料!</td>
        </tr>
        <? } else {
        $result = $db1->query("SELECT class3,max(rate) as bl,max(rate2) as bl2,count(*) as sl,sz as sz,sum(if(lx=5 and dagu='外调',sum_m,0)) as sum_wai,sum(" . $tb_zd . ") as sum_sum,sum(sz) as zs,sum(" . $tb_zd . "*rate) as win,sum(" . $tb_zd . "*Abs(dagu_ds)/100) as ds FROM " . $tb_name . " WHERE qx=0 " . $vvv . " and class1='" . $ids . "' and class2='" . $class2 . "'  group by class3 ORDER BY sum_sum DESC limit " . $offset . "," . $pagesize);
        while ($image = $result->fetch_array()) {
        ?>
            <tr bgcolor="#FFFFFF">
                <td height="28" align="center"><?= $image['class3'] ?></td>
                <td height="28" align="center">
                    <?
                    $strtmp = "look.html?action=list_look&uid=" . $uid . "&kithe=" . $kithe . "&class2=" . $arr_typeflip[$class2] . "&class3=" . $image['class3'];
                    ?>
                    <p class="font_g" onClick="ops('<?= $strtmp ?>',400,750);"><?= round($image['sum_sum'], 2) ?></p>
                </td>
                <td height="28" align="center"><?= round($image['win'], 2) ?></td>
                <td height="28" align="center">
                    <?
                    $zf_win = $ds_temp[$bl_dslb]['zf_sum'] - $image['sum_sum'];
                    if ($zc == 0 && $zf_win < 0 && 0 < $ds_temp[$bl_dslb]['zf_sum']) {
                        $list_table_zf = round(abs($zf_win), 0);
                    } else {
                        $list_table_zf = 0;
                    }
                    if ($list_table_zf == 0) {
                        $zf_str = "<button class=\"btn1\"  onmouseover=\"this.className='btn2';return true;\" onMouseOut=\"this.className='btn1';return true;\" onclick=\"show_win('" . $image['class3'] . "'," . $image['sz'] . ",'" . $list_table_zf . "','" . $image['bl'] . "','" . $image['bl2'] . "','" . $ds_temp[$bl_dslb]['zf_ds'] . "','" . $ids . "','" . $class2 . "');\" >手补</button>";
                    } else {
                        $zf_str = "<button class=\"btn1\"  onmouseover=\"this.className='btn2';return true;\" onMouseOut=\"this.className='btn1';return true;\" onclick=\"show_win('" . $image['class3'] . "'," . $image['sz'] . ",'" . $list_table_zf . "','" . $image['bl'] . "','" . $image['bl2'] . "','" . $ds_temp[$bl_dslb]['zf_ds'] . "','" . $ids . "','" . $class2 . "');\" >手补 " . $list_table_zf . "</button>";
                    }
                    if ($kithe != $Current_Kithe_Num) {
                        $zf_str = "";
                    }
                    echo "    ";
                    echo $zf_str;
                    ?> </td>
                <td height="28" align="center">
                    <?
                    if ($image['sum_wai'] != 0 && $image['sum_wai'] != "") {
                        $strtmp = "look.html?action=list_look&uid=" . $uid . "&kithe=" . $kithe . "&lx=5&class2=" . $arr_typeflip[$class2] . "&class3=" . $image['class3'];
                    ?> <center><button class="btn1" onmouseover="this.className='btn2';return true;" onMouseOut="this.className='btn1';return true;" onClick="ops('<?= $strtmp ?>',400,750);"><?= round(abs($image['sum_wai']), 2) ?></button></center>
                    <?     } else {
                        echo "0";
                    }
                    ?> </td>
            </tr>

        <? } ?>
        <tr bgcolor="#FFFFFF">
            <td height="28" colspan="6" align="center"><?= get_page_html($pagecount, $page) ?></td>
        </tr>
    <? } ?>
</table>&nbsp;