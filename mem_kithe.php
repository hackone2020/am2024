<?php

function get_tm_ds_css($a)
{
    $css = "&nbsp;";
    if ($a == 0 || $a == "") {
        return $css;
    }
    if ($a == 49) {
        $css = "<font color='red' style='font-size:13px;'>�;�</font>";
        return $css;
    }
    if ($a % 2) {
        $css = "<font color='blue' style='font-size:13px;'>�ص�</font> ";
    } else {
        $css = "<font color='green' style='font-size:13px;'>��˫</font> ";
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
        $css = "<font color='red' style='font-size:13px;'>�;�</font>";
        return $css;
    }
    if (25 <= $a) {
        $css = "<font color='blue' style='font-size:13px;'>�ش�</font> ";
    } else {
        $css = "<font color='green' style='font-size:13px;'>��С</font> ";
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
        $css = "<font color='red' style='font-size:13px;'>�;�</font>";
        return $css;
    }
    if ($a % 2) {
        $css = "<font color='blue' style='font-size:13px;'>�ܵ�</font> ";
    } else {
        $css = "<font color='green' style='font-size:13px;'>��˫</font> ";
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
        $css = "<font color='red' style='font-size:13px;'>�;�</font>";
        return $css;
    }
    if (175 <= $a) {
        $css = "<font color='blue' style='font-size:13px;'>�ܴ�</font> ";
    } else {
        $css = "<font color='green' style='font-size:13px;'>��С</font> ";
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
        $css = "<font color='red' style='font-size:13px;'>�;�</font>";
        return $css;
    }
    if (($a % 10 + intval($a) / 10) % 2 == 1) {
        $css = "<font color='blue' style='font-size:13px;'>�ϵ�</font> ";
    } else {
        $css = "<font color='green' style='font-size:13px;'>��˫</font> ";
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
        $css = "<font color='red' style='font-size:13px;'>�;�</font>";
        return $css;
    }
    if (7 <= $a % 10 + intval($a) / 10) {
        $css = "<font color='blue' style='font-size:13px;'>�ϴ�</font> ";
    } else {
        $css = "<font color='green' style='font-size:13px;'>��С</font> ";
    }
    return $css;
}
if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
require_once "include/page.php"
?>
<script src="js/function.js" type="text/javascript"></script>
<script>
	var url = "main.php?action=mem_kithe&uid=<?=$uid?>";
</script>
<link rel="stylesheet" href="/member/stylesheets/main.css?t=1683715146" type="text/css">
<link rel="stylesheet" href="/member/stylesheets/ball.css?t=1683715146" type="text/css">

<body>
<table width="800" cellpadding="0" cellspacing="1" class="t_list">
    <tr>
                <td class="t_list_caption" >����</td>
                <td class="t_list_caption" >ʱ��</td>
                <td class="t_list_caption">��1</td>
                <td class="t_list_caption">&nbsp;</td>
                <td class="t_list_caption">��2</td>
                <td class="t_list_caption">&nbsp;</td>
                <td class="t_list_caption">��3</td>
                <td class="t_list_caption">&nbsp;</td>
                <td class="t_list_caption">��4</td>
                <td class="t_list_caption">&nbsp;</td>
                <td class="t_list_caption">��5</td>
                <td class="t_list_caption">&nbsp;</td>
                <td class="t_list_caption">��6</td>
                <td class="t_list_caption">&nbsp;</td>
                <td class="t_list_caption">����</td>
                <td class="t_list_caption">&nbsp;</td>
                <td class="t_list_caption" colspan='2'></td>
                <td class="t_list_caption" colspan='3'>�ܷ�</td>
                <td class="t_list_caption" colspan='3'>����</td>
            </tr>
            <?
$pagesize = 10;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$result = $db1->query("select count(*) from web_kithe   order by id desc");
$num = $result->fetch_array()[0];
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
while ($image = $result->fetch_array()) {
    $zh = $image['na'] + $image['n1'] + $image['n2'] + $image['n3'] + $image['n4'] + $image['n5'] + $image['n6'];
    $n1 = $image['n1'];
    $n2 = $image['n2'];
    $n3 = $image['n3'];
    $n4 = $image['n4'];
    $n5 = $image['n5'];
    $n6 = $image['n6'];
    $na = $image['na'];
    $sx = $image['sx'];
    $sx1 = $image['sx1'];
    $sx2 = $image['sx2'];
    $sx3 = $image['sx3'];
    $sx4 = $image['sx4'];
    $sx5 = $image['sx5'];
    $sx6 = $image['sx6'];
        
?>

           <tr bgColor="#ffffff" onMouseOver="javascript:this.bgColor='#FFFFA2'"onMouseOut="javascript:this.bgColor='#ffffff'">
                 <td height="27" align="center">
                    <?=$image['nn']?>
                </td>
                <td align="center"><?=substr($image['nd'], 0, 10)?></td>
                <td align="center">
                    <div class='No_<?=$n1?>'>
                    </div>
                </td>
               <td align="center">
                    <?=$sx1?>
                </td>
                <td align="center">
                    <div class='No_<?=$n2?>'></div>
                </td>

                <td align="center">
                    <?=$sx2?>
                </td>
                <td align="center">
                    <div class='No_<?=$n3?>'>
                    </div>
                </td>

                <td align="center">
                    <?=$sx3?>
                </td>
                <td align="center">
                    <div class='No_<?=$n4?>'></div>
                </td>
                <td align="center">
                    <?=$sx4?>
                </td>
                <td align="center">


                    <div class='No_<?=$n5?>'></div>
                </td>
                <td align="center">
                    <?=$sx5?>
                </td>

               <td align="center">
                    <div class='No_<?=$n6?>'>
                    </div>
                </td>

               <td align="center">
                    <?=$sx6?>
                </td>

                <td align="center">
                    <div class='No_<?=$na?>'></div>
                </td>

                <td align="center">
                    <?=$sx?>
                </td>
                <td class="tabletd1" style=''><?=get_tm_ds_css($na)?>
                </td>

                <td class="tabletd1" style=''><?=get_tm_dx_css($na)?>
                </td>

                <td class="tabletd1" style=''><?=get_zh($zh)?>
                </td>

                <td class="tabletd1" style=''><?=get_zf_ds_css($zh, $na)?>
                </td>

                <td class="tabletd1" style=''><?=get_zf_dx_css($zh, $na)?>
                </td>

                <td class="tabletd1" style=''><?=get_hs_ds_css($na)?>
                </td>
                <td class="tabletd1" style=''><?=get_hs_dx_css($na)?>
                </td>
            </tr>
           <? }?>
            <tr class="t_list_bottom">
                <td height="28" colspan="25" align="center" bgcolor="#FFFFFF">��&nbsp;
                        <?=$total?>&nbsp;�� | ��
                        <?=$pagecount?>
                        &nbsp;ҳ&nbsp;
                    <font class="font_bold font_b">
                        <?=get_page_html($pagecount, $page)?>
                    </font>
                </td>
            </tr>
            </tbody>
        </table>
</body>