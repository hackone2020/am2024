<?php

function get_html($cnum, $c1, $c2, $c3, $c4, $c5)
{
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
                break;
            }
        case "连码":
            $html = $c2 . "：<font color='red' class='fontsize'>" . $c3 . "</font>";
            $html .= "<br>共 " . $c4 . " 组 每组: <font color='green' class='fontsize'>" . $c5 / $c4 . "</font>";
            break;
        case "自选不中":
            $html = $c2 . "：<font color='red' class='fontsize'>" . $c3 . "</font>";
            $html .= "<br>共 " . $c4 . " 组 每组: <font color='green' class='fontsize'>" . $c5 / $c4 . "</font>";
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
if ($lx < 1 || $vip == 1 && !strpos($flag, "2")) {
    echo "<center>你没有该权限功能!</center>";
    exit;
}
switch ($lx) {
    case "4":
        if ($rball == 1) {
            $select_sql = " 1=1 ";
        } else {
            $select_sql = " dagu='" . $kauser . "' ";
        }
        break;
    case "3":
        $select_sql = " guan='" . $kauser . "' ";
        break;
    case "2":
        $select_sql = " zong='" . $kauser . "' ";
        break;
    case "1":
        $select_sql = " dai='" . $kauser . "' ";
        break;
    default:
        echo "<center>你没有该权限功能!</center>";
        exit;
}
$vvv = "";
$vvv .= $select_sql;
$gtype = $_GET['gtype'];
$user = $_GET['user'];
$lx = $_GET['lx'];
if ($_GET['date_start'] != "") {
    $date_start = $_GET['date_start'];
} else {
    $date_start = date("Y-m-d");
}
if ($_GET['date_end'] != "") {
    $date_end = $_GET['date_end'];
} else {
    $date_end = date("Y-m-d");
}
$stime = $date_start . " 00:00:00";
$etime = $date_end . " 23:59:59";
if ($_GET['kithe'] != "") {
    $kithe = $_GET['kithe'];
    $vvv .= " and kithe='" . $kithe . "'";
} else {
    $kithe = "";
    $vvv .= " and adddate>='" . $stime . "' and adddate<='" . $etime . "' ";
}
$tb_name = "";
if ($Current_KitheTable[29] != 0 && $kithe == $Current_Kithe_Num) {
    $tb_name = "web_tan";
} else {
    $tb_name = "web_tans";
}
if ($kithe == "") {
    if ($Current_KitheTable[29] != 0 && $date_start == date("Y-m-d")) {
        $tb_name = "web_tan";
    } else {
        $tb_name = "web_tans";
    }
}
if ($Current_KitheTable[29] != 0 && $kplist == 1 && ($kithe != $Current_Kithe_Num || $date_start != date("Y-m-d"))) {
    echo "<script>alert('开盘期间，不允许查看历史报表!');window.history.go(-1);</script>";
    exit;
}
if ($gtype != "") {
    $vvv .= " and ds_lb='" . $gtype . "' ";
    $result = $db1->query("select ds from web_config_ds where ds_lb='" . $gtype . "' order by id desc LIMIT 1");
    $ds_row = $result->fetch_array();
    $class2 = $ds_row['ds'];
} else {
    $class2 = "";
}
if ($user != "") {
    $vvv .= " and username='" . $user . "' ";
}
if ($lx != "") {
    $vvv .= " and lx='" . $lx . "' ";
}
$z_zs1 = $z_zs2 = 0;
$z_st1 = $z_st2 = 0;
$z_sum1 = $z_sum2 = 0;
$z_gs1 = $z_gs2 = 0;
$z_dagu1 = $z_dagu2 = 0;
$z_guan1 = $z_guan2 = 0;
$z_zong1 = $z_zong2 = 0;
$z_dai1 = $z_dai2 = 0;
$pagesize = 25;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$result = $db1->query("select count(*) from " . $tb_name . "  where " . $vvv . " and visible=1 order by adddate desc");
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
?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<script src="js/function.js" type="text/javascript"></script>
<script src="js/report_func.js" type="text/javascript"></script>
<script>
function ks(user, num, adddate, qx) 
    {
        $("check_frame").src = 'main.php?action=report_m6&uid=<?=$uid?>&vip=<?=$vip?>&act=edit&user='+user+'&num='+num+'&adddate='+adddate+'&qx='+qx;
        
    }
</script>
<body style="min-width: 1200px;width: 100%">
 <div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">注单查询</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright">
        <table width="874" border="0" cellspacing="0" cellpadding="0">
        <tbody>  
        <tr>
        <td height="28" style="color:#fff;">
            <font color="#CC0000">当前查询</font>--<?if ($kithe != "") {?>第<?=$kithe?>期<?} else {?>日期区间：<?=$date_start?> ~<?=$date_end?><?} ?>&nbsp;&nbsp;类型:<? if ($class2 != "") {?><?=$class2?><?} else {?>全部<?}?><?if ($user != "") {?>&nbsp;&nbsp;会员:<?=$user?><?}?>
            --<a href="javascript:history.go( -1 );">回上一页</a> -- <a href="main.php?action=report&uid=<?=$uid?>&vip=<?=$vip?>">回报表查询
            </a>
        </td>
        </tr>
        </tbody>
    </table></div></div>&nbsp;
    <?
$z_sum = $z_zs = $z_ds = $z_sum_sum = $z_gs = $z_dagu = $z_guan = $z_zong = $z_dai = 0;
$result = $db1->query("select * from " . $tb_name . "  where " . $vvv . " and visible=1 order by adddate desc limit " . $offset . "," . $pagesize);
if ($result->num_rows != 0) {?>
    <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
        <tr>
            <td width="154" height="20" align="center" class="t_list_caption_4">单号/时间</td>
            <td width="74" class="t_list_caption_4">期数/盘口</td>
            <td width="75" align="center" class="t_list_caption_4">用户</td>
            <td width="206" align="center" nowrap="nowrap" class="t_list_caption_4">下注内容</td>
            <td width="76" align="center" nowrap="nowrap" class="t_list_caption_4">赔率</td>
            <td width="88" align="center" nowrap="nowrap" class="t_list_caption_4">下注金额</td>
            <td width="71" align="center" class="t_list_caption_4">退水金额</td>
            <td width="97" align="center" class="t_list_caption_4">会员结果</td>
        </tr>
        <?
    while ($image = $result->fetch_array()) {
        $z_sum += $image['sum_m'];
        $z_zs += $image['sz'];
        $z_gs += $image['gszc'];
        $z_dagu += $image['daguzc'];
        $z_guan += $image['guanzc'];
        $z_zong += $image['zongzc'];
        $z_dai += $image['daizc'];
         ?>
    <tr class="m_rig " <?if ($image['qx']==1) { echo "delete" ; } ?>  onMouseOver="setPointer(this, 0, 'over', '#FFFFFF', '#FFCC66', '#FFCC99');" onMouseOut="setPointer(this, 0, 'out', '#FFFFFF', '#FFCC66', '#FFCC99');">
        <td align="center" bordercolor="cccccc" bgcolor="#FFFFFF"><?=$image['num']?><br /><font color="green" style="line-height: 14px;"><?=$image['adddate']?></font></td>
        <td height="35" align="center" bordercolor="cccccc" bgcolor="#FFFFFF"><?=$image['kithe']?><br /><font color="red"><?=$image['abcd']?>盘<?=$image['user_ds']?></font></td>
        <td height="35" align="center" bordercolor="cccccc" bgcolor="#FFFFFF"><?=$image['username']?></td>
        <td height="35" align="center" bordercolor="cccccc" bgcolor="#FFFFFF"><?=get_html($image['num'], $image['class1'], $image['class2'], $image['class3'], $image['sz'], $image['sum_m'])?><? if ($image['lm'] == 1) {?><br>中奖组数:<?=$image['win']?><?}?></td>
        <td align="center" nowrap="nowrap" bordercolor="cccccc" bgcolor="#FFFFFF"><?if ($image['class1'] == "连码" || $image['class1'] == "自选不中") {
            if ($image['class1'] == "自选不中") {
                echo $image['ratelm1'];
            } else {
                if ($image['class2'] == "三中二" || $image['class2'] == "二中特") {
                    echo $image['ratelm1'] . "/" . $image['ratelm2'];
                } else {
                    echo $image['ratelm1'];
                }
            }
        } else {
            echo $image['rate'];
        }?>
            </td>
            <td align="center" nowrap="nowrap" bordercolor="cccccc" bgcolor="#FFFFFF">
                <font color="#cc0000">
                    <?=round($image['sum_m'], 2)?>
                </font>
            </td>
            <td width="71" align="center" bordercolor="cccccc" bgcolor="#FFFFFF">
                <?=round($image['user_sq'], 2)?>
            </td>
            <td width="97" align="center" bordercolor="cccccc" bgcolor="#FFFFFF">
                <? if ($image['user_sf'] < 0) {  echo round($image['user_sf'], 2);$z_ds += $image['user_sq']; $z_sum_sum += $image['user_sf'];}
        if (0 < $image['user_sf']) {?><font color="red"><?=round($image['user_sf'], 2)?></font>
            <? $z_ds += $image['user_sq'];
            $z_sum_sum += $image['user_sf'];
        }
        if ($image['user_sf'] == 0) {
            echo round($image['user_sf'], 2);
            $z_ds += $image['user_sq'];
            $z_sum_sum += $image['user_sf'];
        }
   ?></td>  </tr>
   <? }?>
        <tr class="t_list_tr_2">
            <td height="18" colspan="5" align="center" nowrap bordercolor="cccccc" bgcolor="#FFFFFF">本页总计&nbsp;共&nbsp;
                <?=$z_zs?> &nbsp;组
            </td>
            <td align="center" nowrap bordercolor="cccccc" bgcolor="#dcdcdc">
                <?=round($z_sum, 2)?>
            </td>
            <td align="center" nowrap bordercolor="cccccc" bgcolor="#dcdcdc">
                <?=round($z_ds, 2)?>
            </td>
            <td align="center" nowrap bordercolor="cccccc" bgcolor="#990000">
                <font color="#FFFFFF">
                    <?=round($z_sum_sum, 2)?>
                </font>
            </td>
        </tr>
        <tr>
            <td height="25" colspan="8" bordercolor="cccccc" bgcolor="#FFFFFF">
                <table width="98%" border="0" align="center" cellpadding="2" cellspacing="0" bordercolordark="#FFFFFF"
                    bordercolor="888888">
                    <tr>
                        <td height="26" align="center">

                            <span class="STYLE9">当前为第<?=$page?>页&nbsp;总<?=$pagecount?>页&nbsp;共<?=$total?>记录</span>&nbsp;
                            <a href="main.php?action=report_m6&uid=<?=$uid?>&vip=<?=$vip?>&kithe=<?=$kithe?>&user=<?=$user?>&date_start=<?=$date_start?>&date_end=<?=$date_end?>&gtype=<?=$gtype?>&lx=<?=$lx?>&page=1">首页</a>
                            <a href="main.php?action=report_m6&uid=<?=$uid?>&vip=<?=$vip?>&kithe=<?=$kithe?>&user=<?=$user?>&date_start=<?=$date_start?>&date_end=<?=$date_end?>&gtype=<?=$gtype?>&lx=<?=$lx?>&page=<?=$pre?>">上一页
                            </a>
                            <a href="main.php?action=report_m6&uid=<?=$uid?>&vip=<?=$vip?>&kithe=<?=$kithe?>&user=<?=$user?>&date_start=<?=$date_start?>&date_end=<?=$date_end?>
                                &gtype=<?=$gtype?>&lx=<?=$lx?>&page=<?=$next?>">下一页
                            </a>
                            <a href="main.php?action=report_m6&uid=<?=$uid?>&vip=<?=$vip?>&kithe=<?=$kithe?>&user=<?=$user?>&date_start=<?=$date_start?>&date_end=<?=$date_end?>&gtype=<?=$gtype?>&lx=<?=$lx?>&page=<?=$last?>">末页
                            </a>
                            <select name="page2" onChange="location.href='main.php?action=report_m6&uid=<?=$uid?>&vip=<?=$vip?>&kithe=<?=$kithe?>&user=<?=$user?>&date_start=<?=$date_start?>&date_end=<?=$date_end?>&gtype=<?=$gtype?>&lx=<?=$lx?>&page='+this.options[selectedIndex].value">
                                <?
                                $i = 1;
    for (; $i <= $pagecount; ++$i) {?>
                                <option value="<?=$i?>"  <? if ($page == $i) {?> selected <?} ?>>第<?=$i?>页</option>
   <? }?>
                            </select>&nbsp;
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table><br>
    <?
    $result = $db1->query("select sum(sum_m) as sum_m,sum(sz) as zs,sum(user_sf) as usersf from " . $tb_name . "  where " . $vvv . " order by adddate desc");
    $row = $result->fetch_array();
    ?>
   <table width="50%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
   <tr align="center">
   <td width="101" class="t_list_tr_3">本次查询总计</td>
   <td width="122" class="t_list_tr_3">组数</td>
   <td width="218" class="t_list_tr_3">下注金额</td>
   <td width="124" class="t_list_tr_3">结果</td>
   </tr> 
   <tr class="t_list_tr_2">
   <td>分<?=$pagecount?>页显示</td>      <td>
    <?=$row['zs']?>
    </td>
    <td>
        <?=round($row['sum_m'], 2)?>
    </td>
    <td>
        <?=round($row['usersf'], 2)?>
    </td>
    </tr>
    </table><br>
    <?} else {?>
    <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr>
            <td align=center height="30" bgcolor="#CC0000">
                <marquee align="middle" behavior="alternate" width="200">
                    <font color="#FFFFFF">查无任何资料</font>
                </marquee>
            </td>
        </tr>
        <tr>
            <td align=center height="20" bgcolor="#CCCCCC"><a href="javascript:history.go(-1);">离开</a></td>
        </tr>
    </table>
    <?}?>
    <iframe name="check_frame" src="" width="0" height="0" style="display:none"></iframe>
</body>