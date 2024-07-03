<?php

function get_tm_ds_css($a)
{
    $css = "&nbsp;";
    if ($a == 0 || $a == "") {
        return $css;
    }
    if ($a == 49) {
        $css = "<font color='red' style='font-size:13px;'>和局</font>";
        return $css;
    }
    if ($a % 2) {
        $css = "<font color='blue' style='font-size:13px;'>特单</font> ";
    } else {
        $css = "<font color='green' style='font-size:13px;'>特双</font> ";
    }
    return $css;
}
function get_tm_dx_css($a)
{
    $css = "&nbsp;";
    if ($a == 0 || $a == "") {
        return $css;
    }
    if ($a == 49) {
        $css = "<font color='red' style='font-size:13px;'>和局</font>";
        return $css;
    }
    if (25 <= $a) {
        $css = "<font color='blue' style='font-size:13px;'>特大</font> ";
    } else {
        $css = "<font color='green' style='font-size:13px;'>特小</font> ";
    }
    return $css;
}
function get_zf_ds_css($a, $b)
{
    $css = "&nbsp;";
    if ($a == 0 || $a == "") {
        return $css;
    }
    if ($b == 49) {
        $css = "<font color='red' style='font-size:13px;'>和局</font>";
        return $css;
    }
    if ($a % 2) {
        $css = "<font color='blue' style='font-size:13px;'>总单</font> ";
    } else {
        $css = "<font color='green' style='font-size:13px;'>总双</font> ";
    }
    return $css;
}
function get_zh($a)
{
    $css = "&nbsp;";
    if ($a == 0 || $a == "") {
        return $css;
    }
    return $a;
}
function get_zf_dx_css($a, $b)
{
    $css = "&nbsp;";
    if ($a == 0 || $a == "") {
        return $css;
    }
    if ($b == 49) {
        $css = "<font color='red' style='font-size:13px;'>和局</font>";
        return $css;
    }
    if (175 <= $a) {
        $css = "<font color='blue' style='font-size:13px;'>总大</font> ";
    } else {
        $css = "<font color='green' style='font-size:13px;'>总小</font> ";
    }
    return $css;
}
function get_hs_ds_css($a)
{
    $css = "&nbsp;";
    if ($a == 0 || $a == "") {
        return $css;
    }
    if ($a == 49) {
        $css = "<font color='red' style='font-size:13px;'>和局</font>";
        return $css;
    }
    if (($a % 10 + intval($a) / 10) % 2 == 1) {
        $css = "<font color='blue' style='font-size:13px;'>合单</font> ";
    } else {
        $css = "<font color='green' style='font-size:13px;'>合双</font> ";
    }
    return $css;
}
function get_hs_dx_css($a)
{
    $css = "&nbsp;";
    if ($a == 0 || $a == "") {
        return $css;
    }
    if ($a == 49) {
        $css = "<font color='red' style='font-size:13px;'>和局</font>";
        return $css;
    }
    if (7 <= $a % 10 + intval($a) / 10) {
        $css = "<font color='blue' style='font-size:13px;'>合大</font> ";
    } else {
        $css = "<font color='green' style='font-size:13px;'>合小</font> ";
    }
    return $css;
}
if (!defined("KK_VER")) {
    exit("无效的访问");
}?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<link rel="stylesheet" href="css/ball.css" type="text/css">
<script src="js/function.js" type="text/javascript"></script>
<body>
<div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;开奖结果</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright">
        </div></div>
   <table width="80%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list bet">
       <tbody>
        <tr>
            <td width="90" height="20" nowrap class="t_list_caption">期数</td>
            <td width="120" height="20" align="center" nowrap class="t_list_caption">开奖时间</td>
            <td width="41" height="20" align="center" nowrap class="t_list_caption">正1</td>
            <td width="41" height="20" align="center" nowrap class="t_list_caption">&nbsp;</td>
            <td width="41" height="20" align="center" nowrap class="t_list_caption">正2</td>
            <td width="41" height="20" align="center" nowrap class="t_list_caption">&nbsp;</td>
            <td width="41" height="20" align="center" nowrap class="t_list_caption">正3</td>
            <td width="41" height="20" align="center" nowrap class="t_list_caption">&nbsp;</td>
            <td width="41" height="20" align="center" nowrap class="t_list_caption">正4</td>
            <td width="41" height="20" align="center" nowrap class="t_list_caption">&nbsp;</td>
            <td width="41" height="20" align="center" nowrap class="t_list_caption">正5</td>
            <td width="41" height="20" align="center" nowrap class="t_list_caption">&nbsp;</td>
            <td width="41" height="20" align="center" nowrap class="t_list_caption">正6</td>
            <td width="41" height="20" align="center" nowrap class="t_list_caption">&nbsp;</td>
            <td width="41" height="20" align="center" nowrap class="t_list_caption">特码</td>
            <td width="41" height="20" align="center" nowrap="nowrap" class="t_list_caption">生肖</td>
            <td colspan="2" align="center" nowrap="nowrap" class="t_list_caption">特码</td>
            <td colspan="3" align="center" nowrap="nowrap" class="t_list_caption">总分</td>
            <td colspan="2" align="center" nowrap="nowrap" class="t_list_caption">合数</td>
        </tr>
        <?$pagesize = 10;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$result = $db1->query("select count(*) from web_kithe   order by id desc");
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
$next = $page + 1;
$first = 1;
$last = $pagecount;
$result = $db1->query("select * from web_kithe   order by id desc limit " . $offset . "," . $pagesize);
$nn = 1;
?>
        <? while ($image = $result->fetch_array()) {
    $zh = $image['na'] + $image['n1'] + $image['n2'] + $image['n3'] + $image['n4'] + $image['n5'] + $image['n6'];
    $n1 = $image['n1'];
    $n2 = $image['n2'];
    $n3 = $image['n3'];
    $n4 = $image['n4'];
    $n5 = $image['n5'];
    $n6 = $image['n6'];
    $na = $image['na'];
    $sx = $image['sx'];	
	?>
        <tr>
            <td height="28" align="center" nowrap bgcolor="#FFFFFF">
                <?=$image['nn']?>
            </td>
            <td height="28" align="center" nowrap bgcolor="#FFFFFF">
                <span class="tabletd1" style="width:120px;">
                    <?=substr($image['nd'], 0, 10)?>
                </span>
            </td>
            <td width="41" height="28" align="center" nowrap bgcolor="#FFFFFF" class="No_<?=$n1?>"></td>
            <td width="41" height="28" align="center" nowrap bgcolor="#FFFFFF"><?=$image['sx1']?></td>
            <td width="41" height="28" align="center" nowrap bgcolor="#FFFFFF" class="No_<?=$n2?>"></td>
            <td width="41" height="28" align="center" nowrap bgcolor="#FFFFFF"><?=$image['sx2']?>
            </td>
            <td width="41" height="28" align="center" nowrap bgcolor="#FFFFFF" class="No_<?=$n3?>"></td>
            <td width="41" height="28" align="center" nowrap bgcolor="#FFFFFF"><?=$image['sx3']?></td>
            <td width="41" height="28" align="center" nowrap bgcolor="#FFFFFF" class="No_<?=$n4?>"></td>
            <td width="41" height="28" align="center" nowrap bgcolor="#FFFFFF"><?=$image['sx4']?> </td>
            <td width="41" height="28" align="center" nowrap bgcolor="#FFFFFF" class="No_<?=$n5?>"></td>
            <td width="41" height="28" align="center" nowrap bgcolor="#FFFFFF"><?=$image['sx5']?></td>
            <td width="41" height="28" align="center" nowrap bgcolor="#FFFFFF" class="No_<?=$n6?>"></td>
            <td width="41" height="28" align="center" nowrap bgcolor="#FFFFFF"><?=$image['sx6']?>
            <td width="41" height="28" align="center" nowrap bgcolor="#FFFFFF" class="No_<?=$na?>"></td>
            <td width="41" height="28" align="center" nowrap bgcolor="#FFFFFF"><?=$image['sx']?></td>
            <td width="36" align="center" nowrap bgcolor="#FFFFFF"><span class="tabletd1"><?=get_tm_ds_css($na)?></span></td>
            <td width="36" align="center" nowrap bgcolor="#FFFFFF"><span class="tabletd1"><?=get_tm_dx_css($na)?></span></td>
            <td width="36" align="center" nowrap bgcolor="#FFFFFF"><span class="tabletd1"><?=get_zh($zh)?></span> </td>
            <td width="36" align="center" nowrap bgcolor="#FFFFFF"><span class="tabletd1"><?=get_zf_ds_css($zh, $na)?></span></td>
            <td width="36" align="center" nowrap bgcolor="#FFFFFF"><span class="tabletd1"><?=get_zf_dx_css($zh, $na)?></span></td>
            <td width="36" align="center" nowrap bgcolor="#FFFFFF"><span class="tabletd1"><?=get_hs_ds_css($na)?></span></td>
            <td width="36" align="center" nowrap bgcolor="#FFFFFF"><span class="tabletd1"><?=get_hs_dx_css($na)?></span></td>
        </tr>
        <?}?>

        <tr>
            <td height="26" colspan="23" nowrap bordercolor="cccccc" bgcolor="#FFFFFF">
                <table width="900" border="0" align="center" cellpadding="0" cellspacing="0" bordercolordark="#FFFFFF">
                    <tr>
                        <td height="26" align="center">当前为第<?=$page?>页&nbsp;总<?=$pagecount?>页&nbsp;共<?=$total?>记录&nbsp;
                            <a href="main.php?action=web_kithe_list&uid=<?=$uid?>&vip=<?=$vip?>&page=1">首页</a>
                            <a href="main.php?action=web_kithe_list&uid=<?=$uid?>&vip=<?=$vip?>&page=<?=$pre?>">上一页</a>
                            <a href="main.php?action=web_kithe_list&uid=<?=$uid?>&vip=<?=$vip?>&page=<?=$next?>">下一页</a>
                            <a href="main.php?action=web_kithe_list&uid=<?=$uid?>&vip=<?=$vip?>&page=<?=$last?>">末页</a>
                            <select name="page2" onChange="location.href='main.php?action=web_kithe_list&uid=<?=$uid?>&vip=<?=$vip?>&page='+this.options[selectedIndex].value">
                                <? $i = 1;
                              for (;$i <= $pagecount; ++$i) {?>
                                <option value="<?=$i?>" <?if ($page==$i) {?>selected<?}?>>第<?=$i?>页</option>
                                <?}?>
                            </select>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>