<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
if (strpos($flag, "03")) {
} else {
    exit;
}
require_once "../include/page.php";
$result = mysql_query("SELECT ds_lb,yg,rake_sj,zf_sum FROM web_config_ds WHERE class='硬特' Order By ID");
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
}?>
<table id="tb1" border="0" cellspacing="1" cellpadding="0" bgcolor="C2C2A6" class="m_tab" width="800">
    <tr class="m_title_ft_future">
        <td width="252">号码</td>
        <td width="61">注单数</td>
        <td width="112">总额</td>
        <td width="110">彩金</td>
        <td width="89">走飞</td>
        <td width="108">已走</td>
    </tr>
    <? $pagesize = 50;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$result = mysql_query("SELECT count(*) FROM (SELECT DISTINCT(class3) FROM " . $tb_name . " WHERE qx=0 " . $vvv . " and class1='硬特' and class2='硬特') AS temp_tan");
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
if ($num == 0) {?>
    <tr bgcolor="#FFFFFF">
        <td height="35" colspan="6" align="center">查无任何资料!</td>
    </tr>
    <?} else {?>
    <? $result = mysql_query("SELECT class3,max(rate) as bl,sum(if(lx=5 and dagu='外调',sum_m,0)) as sum_wai,sum(" . $tb_zd . ") as sum_sum,sum(sz) as zs,sum(" . $tb_zd . "*rate) as win,sum(" . $tb_zd . "*Abs(dagu_ds)/100) as ds FROM " . $tb_name . " WHERE qx=0 " . $vvv . " and class1='硬特' and class2='硬特'  group by class3 ORDER BY sum_sum DESC limit " . $offset . "," . $pagesize);
    while ($image = mysql_fetch_array($result)) {?>
    <tr bgcolor="#FFFFFF">
        <td height="28" align="center">
            <font size="3px" color="#CC0000"><b>
                    <?=$image['class3']?>
                </b></font>
        </td>
        <td height="28" align="center">
            <?=$image['zs']?>
        </td>
        <td height="28" align="center">
            <?=$strtmp?> = "look.html?action=list_look&uid=" .
            <?=$uid?> . "&kithe=" .
            <?=$kithe?> . "&class2=硬特&class3=" .
            <?=$image['class3']?>;
            <center><button class=btn1 onmouseover=this.className='btn2' ;return true; onMouseOut=this.className='btn1'
                    ;return true; onClick=ops('"; <?=$strtmp?>',400,750) >
                    <?=round($image['sum_sum'], 2)?>
                </button></center>
        </td>
        <td height="28" align="center">
            <?=round($image['win'], 2)?>
        </td>
        <td height="28" align="center">
            <?=$zf_win = $ds_temp['YT']['zf_sum'] - $image['sum_sum']?>
            <?if ($zc == 0 && $zf_win < 0 && 0 < $ds_temp['YT']['zf_sum']) {?>
            <?    $list_table_zf = round(abs($zf_win), 0);
        } else {
            $list_table_zf = 0;
        }?>
            <? if ($list_table_zf == 0) {
            $zf_str = "<button class=btn1  onmouseover=this.className='btn2';return true; onMouseOut=this.className='btn1';return true; onclick=show_win('" . $image['class3'] . "','" . $list_table_zf . "','" . $image['bl'] . "','" . $ds_temp['YT']['zf_ds'] . "','硬特','硬特') >手补</button>";
        } else {
            $zf_str = "<button class=btn1  onmouseover=this.className='btn2';return true; onMouseOut=this.className='btn1';return true; onclick=show_win('" . $image['class3'] . "','" . $list_table_zf . "','" . $image['bl'] . "','" . $ds_temp['YT']['zf_ds'] . "','硬特','硬特') >手补 " . $list_table_zf . "</button>";
        }?>
            <?if ($kithe != $Current_Kithe_Num) {
            $zf_str = "";
        }?>
            <?=$zf_str?>
        </td>
        <td height="28" align="center">
            <? if ($image['sum_wai'] != 0 && $image['sum_wai'] != "") {?>
            <?=$strtmp?> = "look.html?action=list_look&uid=" .
            <?=$uid?> . "&kithe=" .
            <?=$kithe?> . "&lx=5&class2=硬特&class3=" .
            <?=$image['class3']?>
            <center><button class=btn1 onmouseover=this.className='btn2' ;return true; onMouseOut=this.className='btn1'
                    ;return true; onClick=ops('"; <?=$strtmp?>',400,750) >
                    <?=round(abs($image['sum_wai']), 2)?>
                </button></center>
            <?} else {
            echo "0";
        }?>
        </td>
    </tr>
    <?}?>
    <tr bgcolor="#FFFFFF">
        <td height="28" colspan="6" align="center">
            <?=get_page_html($pagecount, $page)?>
        </td>
    </tr>
    <?}?>
</table>