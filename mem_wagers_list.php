<?php

class RunTime
{
    public function Rstartime()
    {
        $nowtime = explode(" ", microtime());
        $starttime = $nowtime[1] + $nowtime[0];
        return $starttime;
    }
    public function Rendtime()
    {
        global $starttime;
        $nowtime = explode(" ", microtime());
        $endtime = $nowtime[1] + $nowtime[0];
        $totaltime = $endtime - $starttime;
        return number_format($totaltime, 6);
    }
}
function get_tbnum($c, $b)
{
    if ($b == 1) {
        return 3;
    }
    if ($c % 2) {
        return 2;
    } else {
        return 1;
    }
}
function get_html($cnum, $c1, $c2, $c3, $c4, $c5)
{
    global $kithe;
    global $uid;
    $html = "";
    switch ($c1) {
        case "过关":
            $number_array = explode(",", $c2);
            $c3_array = explode(",", $c3);
            $number_count = count($number_array) - 1;
            $html = "过关:" . $number_count . "串1" . "<br>";
            $t = 0;
            for (; $t < $number_count; $t += 1) {
                $y = $t * 2;
                $html .= "<font color='red' class='fontsize'>" . $number_array[$t] . "</font>-<font color='green' class='fontsize'>" . $c3_array[$y] . "</font>@<font color='blue' class='fontsize'>" . $c3_array[$y + 1] . "</font><br>";
               
            }
             break;
        case "连码":
            $url = "main.php?action=men_wagers_list_more&uid=".$uid."&kithe=".$kithe."&num=" . $cnum;
            $html = "<a  href='#' onclick=\"OpenDiv(500,300,'" . $url . "');\" >" . $c2 . "：<font color='red' class='fontsize'>" . $c3 . "</font>";
            $html .= "<br>共 " . $c4 . " 组 每组: <font color='green' class='fontsize'>" . $c5 / $c4 . "</font></a>";
            break;
        case "自选不中":
            $url = "main.php?action=men_wagers_list_more&uid=" . $uid . "&kithe=" . $kithe . "&num=" . $cnum;
            $html = "<a  href='#' onclick=\"OpenDiv(500,300,'" . $url . "');\" >" . $c2 . "：<font color='red' class='fontsize'>" . $c3 . "</font>";
            $html .= "<br>共 " . $c4 . " 组 每组: <font color='green' class='fontsize'>" . $c5 / $c4 . "</font></a>";
            break;
        default:
            $html = $c2 . "：<font color='red' class='fontsize'>" . $c3 . "</font>";
            break;
    }
    return $html;
}
if (!defined("KK_VER")) {
    exit("无效的访问");
}
require_once "include/page.php";
$kithe = $_GET['kithe'];
if ($kithe == "") {
    exit("无效的访问");
}
$time = new RunTime();
$starttime = $time->Rstartime();
$pagesize = 25;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$result = $db1->query("select count(*) as num,sum(sz) as sz,sum(sum_m) as sum_m,sum(sum_m*user_ds/100) as ds from web_tans where  username='" . $username . "' and kithe='" . $kithe . "' and visible=1  order by id desc");
$rs = $result->fetch_array();
$num = $rs['num'];
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
$all_sz = $rs['sz'];
$all_sum_m = $rs['sum_m'];
$result = $db1->query("select * from web_tans  where  kithe='" . $kithe . "' and username='" . $username . "' and visible=1  order by id desc limit " . $offset . "," . $pagesize);
?>
<script src="js/function.js" type="text/javascript"></script>
<script src="js/form.js" type="text/javascript"></script>
<script>
var url = "main.php?action=mem_wagers_list&uid=<?=$uid?>&kithe=<?=$kithe?>";
</script>
<link rel="stylesheet" href="/member/stylesheets/main.css?t=1683715146" type="text/css">
<body marginwidth="0" marginheight="0">
<table width="800" cellpadding="0" cellspacing="0">
  <tbody>
      <tr>
               <td height="22">
                    <?=$kithe?>期下注明细【共&nbsp;:<?=$all_sz?>总额&nbsp;:<?=$all_sum_m?>】
                </td>
            </tr>
        </table>
        <table width="800" border="0" cellpadding="0" cellspacing="1" class="t_list">
            <tbody><tr>
                <td width="10" nowrap="" class="t_list_caption">序号</td>
                <td width="140" nowrap="" class="t_list_caption">单号/时间</td>
                <td width="60" nowrap="" class="t_list_caption">退水/盘口</td>
                <td class="t_list_caption">下注内容</td>
                <td width="90" nowrap="" class="t_list_caption">赔率</td>
                <td width="90" nowrap="" class="t_list_caption">下注金额</td>
                <td width="60" nowrap="" class="t_list_caption">结果</td>
                <td width="60" nowrap="" class="t_list_caption">退水</td>
                <td width="90" nowrap="" class="t_list_caption">退水后结果</td>
            </tr>
            <?php
$ii = 0;
$z_sum = 0;
$z_zs = 0;
$z_user = 0;
$z_user_temp = 0;
$z_userds = 0;
$z_userds_temp = 0;
if ($result->num_rows == 0) {?>
    <tr class='bianse bgcolorohter2'>
	<td class="tabletd1" colspan=9>暂无下注记录！</td></tr>
    <? exit;
} else {
    while ($rs = $result->fetch_array()) {
        ++$ii;
        $z_sum += $rs['sum_m'];
        $z_zs += $rs['sz'];
        if ($rs['qx'] == 0) {
            switch ($rs['bm']) {
                case "0":
                    $z_userds += $rs['user_sq'];
                    $z_userds_temp = $rs['user_sq'];
                    $z_user += $rs['user_sf'];
                    $z_user_temp = $rs['user_sf'];
                    break;
                case "1":
                    $z_userds += $rs['user_sq'];
                    $z_userds_temp = $rs['user_sq'];
                    $z_user += $rs['user_sf'];
                    $z_user_temp = $rs['user_sf'];
                    break;
                case "2":
                    $z_userds_temp = 0;
                    $z_user_temp = 0;
                    break;
                default:
                    break;
            }
        } else {
            $z_userds_temp = 0;
            $z_user_temp = 0;
        }?>
		<tr bgcolor="#ffffff" onmouseover="javascript:this.bgColor='#FFFFA2'" onmouseout="javascript:this.bgColor='#ffffff'"> 
            <td align="center">
                <?=$ii?>
            </td>
            <td align="center">
                <?=$rs['num']?>
                <br />
                <font color="green" style="line-height: 14px;">
                    <?=$rs['adddate']?>
                </font>
            </td>
            <td align="center">
                <?=$rs['user_ds']?>%
                <br />
                <?=$rs['abcd']?>盘
            </td>

            <td align="center" class="bet">
                <?=get_html($rs['num'], $rs['class1'], $rs['class2'], $rs['class3'], $rs['sz'], $rs['sum_m'])?></td>
            <td align="center">
                <?php
        if ($rs['class1'] == "连码" || $rs['class1'] == "自选不中") {
            if ($rs['class1'] == "自选不中") {
               echo  $rs['ratelm1'];
            } else {
                if ($rs['class2'] == "三中二" || $rs['class2'] == "二中特") {
                  echo   $rs['ratelm1'] . "/" . $rs['ratelm2'];
                } else {
                  echo   $rs['ratelm1'];
                }
            }
        } else {
           echo  $rs['rate'];
        }?>
            </td>
            <td align="center"><?=round($rs['sum_m'], 2)?></td>
            <td align="center"><?=round($z_user_temp - $z_userds_temp, 2)?></td>
            <td align="center"><?=round($z_userds_temp, 2)?> </td>
            <td align="center">
               <? if ($z_user_temp <= 0) { $code_temp="#000000" ; } else { $code_temp="red" ; } ?>
               <font color="<?=$code_temp?>" class='font_r font_bold'><?=$z_user_temp?></font>
            </td>
            </tr>
           <? }
            }
?>

            <tr >
                <td height="22" colspan="3" align="center" bgcolor="#FFFFFF" class="t_list_tr_2">总计:
                    <span id="bishu" class="formtongji1">
                        <?=$z_zs?>
                    </span> 笔&nbsp;
                </td>
               <td height="22" align="center" bgcolor="#FFFFFF" class="t_list_tr_2">
                <td height="22" align="center" bgcolor="#FFFFFF" class="t_list_tr_2">
                    <span id="jine" class="formtongji1">
                        <?=round($z_sum, 2)?>
                    </span>
                </td>
               <td height="22" align="center" bgcolor="#FFFFFF" class="t_list_tr_2">
                    <?=round($z_user - $z_userds, 2)?></td>

                <td height="22" align="center" bgcolor="#FFFFFF" class="t_list_tr_2">
                    <span id="tuishui" class="formtongji1"><?=round($z_userds, 2)?>
                    </span>
                </td>
                <td height="22" align="center" bgcolor="#FFFFFF" class="t_list_tr_2">
                    <span id="keying" class="formtongji1"><?=round($z_user, 2)?></span>
                </td>
            </tr>
        </table>
        <table style="width: 96%; margin-top: 10px;" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td style="font-size:12px;">
                    <?=$kithe?>期下注明细【已派彩】
                </td>
                <td align="right">
                    <table>
                        <tr>
                            <td style="font-size:12px;">
                                <div id="Pager2" class="paginator"><?=get_page_html($pagecount, $page)?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <?
        $time = $time->Rendtime();
$htmlstr = "页面执行" . $time . " 秒<br>";
 echo $htmlstr;
 ?>
    </div>
</body>