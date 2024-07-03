<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
if ($vip == 1 && !strpos($flag, "1")) {
 echo   "<center>你没有该权限功能!</center>";
    exit;
}
include "check_zf.php";
$ids = "自选不中";
$class2 = $_GET['class2'];
$bl_dslb = "BZ";
require_once "../include/page.php";
$result = $db1->query("SELECT ds_lb,yg,zf_sum FROM web_user_ds WHERE username='" . $kauser . "' Order By ID");
$ds_temp = array();
$x = 0;
while ($Image = $result->fetch_assoc()) {
    $ds_temp[$Image['ds_lb']]['zf_sum'] = $Image['zf_sum'];
    $ds_temp[$Image['ds_lb']]['zf_ds'] = $Image['yg'];
    ++$x;
}
$vvv = "";
$tb_name = "";
$tb_zd = "";
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
}?>

<?=$ids?>:<?=$class2?>&nbsp;&nbsp;统计排行
<table id="tb1" border="0" cellspacing="1" cellpadding="0"  bgcolor="C2C2A6" class="m_tab" width="100%">
    <tr class="m_title_tn">    
        <td width="252">号码</td>    
        <td width="61">注单数</td>   
        <td width="112">总额</td>    
        <td width="110">彩金</td>    
        <td width="89">走飞</td>   
        <td width="108">已走</td>  </tr>
        <?
$pagesize = 10;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$result = $db1->query("SELECT count(*) FROM (SELECT DISTINCT(class3) FROM " . $tb_name . " WHERE " . $select_sql . " and qx=0 " . $vvv . " and class1='" . $ids . "' and class2='" . $class2 . "') AS temp_tan");
$num1=$result->fetch_array();
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
$nexts = $page + 1;
$first = 1;
$last = $pagecount;
if ($num == 0) {
?>      <tr bgcolor="#FFFFFF">
	  <td height="35" colspan="6" align="center">查无任何资料!</td>
	  </tr>
	  
<? } else {
    $result = $db1->query("SELECT class3,max(rate) as bl,max(rate2) as bl2,count(*) as sl,sz as sz,sum(if(username='" . $kauser . "',sum_m,0)) as sum_wai,sum(if(username='" . $kauser . "',-sum_m," . $tb_zd . ")) as sum_sum,sum(sz) as zs,sum(if(username='" . $kauser . "',-sum_m*rate," . $tb_zd . "*rate)) as win,sum(" . $tb_zd . "*Abs(" . $next . "_ds)/100) as ds FROM " . $tb_name . " WHERE " . $select_sql . " and qx=0 " . $vvv . " and class1='" . $ids . "' and class2='" . $class2 . "'  group by class3 ORDER BY sum_sum DESC limit " . $offset . "," . $pagesize);
    while ($image = $result->fetch_array()) {
        ?>
         <tr bgcolor="#FFFFFF">
		 <td height="28" align="center">
        <?=$image['class3']?>
        </td>
		<td height="28" align="center">
         <?=$image['sl']."*".$image['sz']."=".$image['zs']?>
        </td>
		<td height="28" align="center">  
       <? $strtmp = "look.html?action=list_look&uid=" . $uid . "&vip=" . $vip . "&kithe=" . $kithe . "&class2=" .$class2 . "&class3=" . $image['class3'];?>
        <button class="btn1" onmouseover="this.className='btn2';return true;" onMouseOut="this.className='btn1';return true;" onClick="ops('<?=$strtmp?>',400,750);">
        <?=round($image['sum_sum'], 2)?>
        </button>    </td>
		<td height="28" align="center">
        <?=round($image['win'], 2)?>
        </td>
		<td height="28" align="center"> 
        <?
        $zf_win = $ds_temp[$bl_dslb]['zf_sum'] - $image['sum_sum'];
        if ($zc == 0 && $zf_win < 0 && 0 < $ds_temp[$bl_dslb]['zf_sum']) {
            $list_table_zf = round(abs($zf_win), 0);
        } else {
            $list_table_zf = 0;
        }
        if ($vip == 0 && $pz_of == 0 && $Current_KitheTable[29] != 0 && $Current_KitheTable[15] != 0) {
            if ($list_table_zf == 0) {
                $zf_str = "<button class=\"btn1\"  onmouseover=\"this.className='btn2';return true;\" onMouseOut=\"this.className='btn1';return true;\" onclick=\"show_win_lm('" . $image['class3'] . "'," . $image['sz'] . ",'" . $list_table_zf . "','" . $image['bl'] . "','" . $ds_temp[$bl_dslb]['zf_ds'] . "','" . $ids . "','" . $class2 . "');\" >手补</button>";
            } else {
                $zf_str = "<button class=\"btn1\"  onmouseover=\"this.className='btn2';return true;\" onMouseOut=\"this.className='btn1';return true;\" onclick=\"show_win_lm('" . $image['class3'] . "'," . $image['sz'] . ",'" . $list_table_zf . "','" . $image['bl'] . "','" . $ds_temp[$bl_dslb]['zf_ds'] . "','" . $ids . "','" . $class2 . "');\" >手补" . $list_table_zf . "</button>";
            }
        } else {
            $zf_str = "";
        }
       ?><?=$zf_str?>
            </td><td height="28" align="center">
       <? if ($image['sum_wai'] != 0 && $image['sum_wai'] != "") {
            $strtmp = "look.html?action=list_look&uid=" . $uid . "&vip=" . $vip . "&kithe=" . $kithe . "&lx=" . $lx . "&class2=" . $class2 . "&class3=" . $image['class3'];?>
                <center><button class="btn1" onmouseover="this.className='btn2';return true;" onMouseOut="this.className='btn1';return true;" onClick="ops('<?=$strtmp?>',400,750);" ><?=round(abs($image['sum_wai']), 2)?>
            </button></center>   
       <? } else {?>
            0
      <?  }?>
            </td>  </tr>
    <?}?>
    <tr bgcolor="#FFFFFF">
	<td height="28" colspan="6" align="center">
   <?=get_page_html($pagecount, $page)?>
    </td>
	</tr>
<?}?>
</table>&nbsp;