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
if (strpos($flag, "09")) {
} else {
    echo "<center>你没有该权限功能!</center>";
    exit;
}
if ($_GET['act'] == "edit") {
    $user = $_GET['user'];
    $tan_num = $_GET['num'];
    $adddate = $_GET['adddate'];
    $qx = $_GET['qx'];
    if ($user != "" && $tan_num != "" && $adddate != "" && $qx != "") {
        if ($qx == 1) {
            $qx = 0;
        } else {
            $qx = 1;
        }
        $db1->query("update web_tan set qx='" . $qx . "' where username='" . $user . "' and num='" . $tan_num . "' and adddate='" . $adddate . "'");
        $db1->query("update web_tans set qx='" . $qx . "' where username='" . $user . "' and num='" . $tan_num . "' and adddate='" . $adddate . "'");
        echo "<script>parent.location.replace(parent.location.href);</script>";
        exit;
    }
}
$vvv = "";
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
$result = $db1->query("select count(*) from " . $tb_name . "  where 1=1 " . $vvv . " order by adddate desc");
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
<style type="text/css">
    <!--
    .t_list_caption {  background-color: #687780; text-align: center; color: #FFFFFF}
    .m_title_reag { background-color: #687780; text-align: center; color: #FFFFFF}
    .m_title_2 { background-color: #CC0000; text-align: center; color: #FFFFFF}
    -->
</style>

<script src="js/function.js" type="text/javascript"></script>
<script src="js/report_func.js" type="text/javascript"></script>
<script>
function ks(user, num, adddate, qx) { 
    $("check_frame").src = 'main.php?action=report_m6&uid=<?=$uid?>&act=edit&user=' + user + '&num=' + num + '&adddate=' + adddate + '&qx=' + qx; }
</script>

<body style="min-width: 1200px;width: 100%">
<div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;报表查询</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright">
     <table border="0" align="right" cellpadding="0" cellspacing="0">
        <tbody>
         <tr>
           <td height="28" style="color:#fff;"
            <font color="#CC0000">当前查询</font>--

            <? if ($kithe != "") {?>
            第
            <?=$kithe?>期
            <?} else {?>
            日期区间：
            <?=$date_start?> ~
            <?=$date_end?>
            <?}?>
            &nbsp;&nbsp;类型:
            <? if ($class2 != "") {?>
            <?=$class2?>
            <?} else {?>
            全部
            <?}?>

            <? if ($user != "") {?>
            &nbsp;&nbsp;会员:
            <?$user?>

            <?}?>

            --<a href="javascript:history.go(-1);">回上一页</a> -- <a href="main.php?action=report&uid=<?=$uid?>">回报表查询</a>
        </td>
        </tr>
    </table>
    </div></div>
    <? $z_sum = $z_zs = $z_ds = $z_sum_sum = $z_gs = $z_dagu = $z_guan = $z_zong = $z_dai = 0;
$result = $db1->query("select * from " . $tb_name . "  where 1=1 " . $vvv . " order by adddate desc limit " . $offset . "," . $pagesize);
if ($result->num_rows != 0) {?>
       <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
        <tbody>
        <tr>
            <td width="" height="20" align="center" class="t_list_caption_4">单号/时间</td>
            <td width="" class="t_list_caption_4">期数/盘口</td>
            <td width="" align="center" class="t_list_caption_4">用户</td>
            <td width="" align="center" nowrap="nowrap" class="t_list_caption_4">下注内容</td>
            <td width="5%" align="center" nowrap="nowrap" class="t_list_caption_4">赔率</td>
            <td width="5%" align="center" nowrap="nowrap" class="t_list_caption_4">下注金额</td>
            <td width="5%" align="center" class="t_list_caption_4">退水金额</td>
            <td width="5%" align="center" class="t_list_caption_4">会员结果</td>
            <td width="7%" align="center" class="t_list_caption_4">代理(占成)退水%</td>
            <td width="7%" align="center" class="t_list_caption_4">总代理(占成退水%</td>
            <td width="7%" align="center" class="t_list_caption_4">股东(占成)退水%</td>
            <td width="7%" align="center" class="t_list_caption_4">大股东(占成)退水%</td>
            <td width="" align="center" nowrap="nowrap" class="t_list_caption_4">公司(占成)</td>
            <td width="" align="center" nowrap="nowrap" class="t_list_caption_4">下注IP</td>
            <td width="" align="center" nowrap="nowrap" class="t_list_caption_4">操作</td>
        </tr>
        <? while ($image = $result->fetch_array()) {
        $z_sum += $image['sum_m'];
        $z_zs += $image['sz'];
        $z_gs += $image['gszc'];
        $z_dagu += $image['daguzc'];
        $z_guan += $image['guanzc'];
        $z_zong += $image['zongzc'];
        $z_dai += $image['daizc'];
		?>
        <tr class="m_rig <? if ($image['qx']==1) {?> delete<?}?>"
            onMouseOver="setPointer(this, 0, 'over', '#FFFFFF', '#FFCC66', '#FFCC99');" onMouseOut="setPointer(this, 0,
            'out', '#FFFFFF', '#FFCC66', '#FFCC99');"> <td align="center" bordercolor="cccccc" bgcolor="#FFFFFF">
                <?=$image['num']?>
                <br />
                <font color="green" style="line-height: 14px;">
                    <?=$image['adddate']?>
                </font>
            </td>
            <td height="35" align="center" bordercolor="cccccc" bgcolor="#FFFFFF">
                <?=$image['kithe']?>
                <br />
                <font color="red">
                    <?=$image['abcd']?>
                    盘
                    <?=$image['user_ds']?>
                </font>
            </td>
            <td height="35" align="center" bordercolor="cccccc" bgcolor="#FFFFFF">
                <?=$image['username']?>
            </td>
            <td height="35" align="center" bordercolor="cccccc" bgcolor="#FFFFFF">
                <?=get_html($image['num'], $image['class1'], $image['class2'], $image['class3'], $image['sz'], $image['sum_m'])?>

                <?if ($image['lm'] == 1) {?>
                <br>中奖组数:<?=$image['win']?>
                <?}?>
            </td>
            <td align="center" nowrap="nowrap" bordercolor="cccccc" bgcolor="#FFFFFF">
                <? if ($image['class1'] == "连码" || $image['class1'] == "自选不中") {
            if ($image['class1'] == "自选不中") {?>
                <?=$image['ratelm1']?>
                <?} else {?>
                <? if ($image['class2'] == "三中二" || $image['class2'] == "二中特") {?>
                <?=$image['ratelm1']?>/<?$image['ratelm2']?>
                <?} else {?>
                <?=$image['ratelm1']?>
                <?}
            }?>
                <?} else {?>
                <?=$image['rate']?>
                <?}?>
            </td>
            <td align="center" nowrap="nowrap" bordercolor="cccccc" bgcolor="#FFFFFF">
                <font color="#cc0000">
                    <?=round($image['sum_m'], 2)?>
                </font>
            </td>
            <td width="53" align="center" bordercolor="cccccc" bgcolor="#FFFFFF">
                <?=round($image['user_sq'], 2)?>
            </td>
            <td width="53" align="center" bordercolor="cccccc" bgcolor="#FFFFFF">
                <? if ($image['user_sf'] < 0) {
            echo round($image['user_sf'], 2);
            $z_ds += $image['user_sq'];
            $z_sum_sum += $image['user_sf'];
        }
        if (0 < $image['user_sf']) {
          ?><font color="red"><?=round($image['user_sf'], 2)?></font>
          <?
            $z_ds += $image['user_sq'];
            $z_sum_sum += $image['user_sf'];
        }
        if ($image['user_sf'] == 0) {
            echo round($image['user_sf'], 2);
            $z_ds += $image['user_sq'];
            $z_sum_sum += $image['user_sf'];
        }?>
            </td>
            <td width="67" align="center" bordercolor="cccccc" bgcolor="#FFFFFF">
                <?=$image['dai']?>
                <br>(<?=$image['daizc']?>)<br>
                <?=$image['dai_ds']?>
            </td>
            <td width="68" align="center" bordercolor="cccccc" bgcolor="#FFFFFF">
                <?=$image['zong']?>
                <br>(<?=$image['zongzc']?>)<br>
                <?=$image['zong_ds']?>
            </td>
            <td width="62" align="center" bordercolor="cccccc" bgcolor="#FFFFFF">
                <?=$image['guan']?><br>(
                <?=$image['guanzc']?>)<br>
                <?=$image['guan_ds']?>
            </td>
            <td width="72" align="center" bordercolor="cccccc" bgcolor="#FFFFFF">
                <?=$image['dagu']?>
                <br>(<?=$image['daguzc']?>)<br>
                <?=$image['dagu_ds']?>
            </td>
            <td align="center" nowrap="nowrap" bordercolor="cccccc" bgcolor="#FFFFFF"> 公司<br>(<?=$image['gszc']?>)
            </td>
            <td align="center" nowrap="nowrap" bordercolor="cccccc" bgcolor="#FFFFFF"><b>
                    <font color=blue>
                        <?=$image['ip']?>
                    </font>
                </b></td>
            <td align="center" nowrap="nowrap" bordercolor="cccccc" bgcolor="#FFFFFF">
                <? if ($image['qx'] == 1) { $str1 = "<font color=red>有效</font>"?>
                <?} else {
            $str1 = "注销";
        }?>
                <b><a href="javascript:///" onClick="ks('<?=$image['username']?>','<?=$image['num']?>','<?=$image['adddate']?>','<?=$image['qx']?>')" style="cursor:pointer;">
                        <?=$str1?>
                    </a></b>
            </td>
        </tr>
        <?}?>
        <tr class="m_rig">
            <td height="18" colspan="5" align="center" nowrap bordercolor="cccccc" bgcolor="#FFFFFF">本页总计&nbsp;共&nbsp;
                <?=$z_zs?>
                &nbsp;组
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
            <td align="center" nowrap bordercolor="cccccc" bgcolor="#dcdcdc">
                <?=round($z_dai, 2)?>
            </td>
            <td align="center" nowrap bordercolor="cccccc" bgcolor="#dcdcdc">
                <?=round($z_zong, 2)?>
            </td>
            <td align="center" nowrap bordercolor="cccccc" bgcolor="#dcdcdc">
                <?=round($z_guan, 2)?>
            </td>
            <td align="center" nowrap bordercolor="cccccc" bgcolor="#dcdcdc">
                <?=round($z_dagu, 2)?>
            </td>
            <td align="center" nowrap bordercolor="cccccc" bgcolor="#dcdcdc">
                <?=round($z_gs, 2)?>
            </td>
            <td nowrap bordercolor="cccccc" bgcolor="#dcdcdc">&nbsp;</td>
            <td nowrap bordercolor="cccccc" bgcolor="#dcdcdc">&nbsp;</td>
        </tr>
        <tr>
            <td height="25" colspan="15" bordercolor="cccccc" bgcolor="#FFFFFF" align="center">
                <table width="98%" border="0" align="center" cellpadding="2" cellspacing="0" bordercolordark="#FFFFFF"
                    bordercolor="888888" >
                    <tr>

                        <span class="STYLE9" >
                            当前为第<?=$page?>页&nbsp;总<?=$pagecount?>页&nbsp;共<?=$total?>记录</span>&nbsp;
                        <a href="main.php?action=report_m6&uid=<?=$uid?>&kithe=<?=$kithe?>&user=<?=$user?>&date_start=<?=$date_start?>&date_end=<?=$date_end?>&gtype=<?=$gtype?>&lx=<?=$lx?>&page=1">首页</a>
                        <a href="main.php?action=report_m6&uid=<?=$uid?>&kithe=<?=$kithe?>&user=<?=$user?>&date_start=<?=$date_start?>&date_end=<?=$date_end?>&gtype=<?=$gtype?>&lx=<?=$lx?>&page=<?=$pre?>">上一页</a>
                        <a
                            href="main.php?action=report_m6&uid=<?=$uid?>&kithe=<?=$kithe?>&user=<?=$user?>&date_start= <?=$date_start?>&date_end= <?=$date_end?>&gtype=<?=$gtype?>&lx=<?=$lx?>&page=<?=$next?>">下一页</a>
                        <a href="main.php?action=report_m6&uid=<?=$uid?>&kithe=<?=$kithe?>&user=<?=$user?>&date_start=<?=$date_start?>&date_end=<?=$date_end?>&gtype=<?=$gtype?>&lx=<?=$lx?>&page=<?=$last?>">末页</a>
                        <select name="page2" onChange="location.href='main.php?action=report_m6&uid=<?=$uid?>&kithe=<?=$kithe?>&user=<?=$user?>&date_start=<?=$date_start?>&date_end=<?=$date_end?>&gtype=<?=$gtype?>&lx=<?=$lx?>&page='+this.options[selectedIndex].value">
                            <?$i = 1;
    for (; $i <= $pagecount; ++$i) {?>
                            <option value="<?=$i?>" <? if ($page==$i) {?>
                                selected
                                <?}?>
                                >第
                                <?=$i?>页
                            </option>
                            <? }?>
                        </select>&nbsp;
            </td>
        </tr>
    </table>
    </td>
    </tr>
    </table><br>
    <? $result = $db1->query("select sum(sum_m) as sum_m,sum(sz) as zs,sum(user_sf) as usersf from " . $tb_name . "  where 1=1 " . $vvv . " order by adddate desc");
    $row = $result->fetch_array();?>
    <table width="900" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
        <tr align="center">
            <td width="101" classs="t_list_tr_3">本次查询总计</td>
            <td width="122" classs="t_list_tr_3">组数</td>
            <td width="218" classs="t_list_tr_3">下注金额</td>
            <td width="124" classs="t_list_tr_3">结果</td>
        </tr>
        <tr class="t_list_tr_2" align="center">
            <td>分
                <?=$pagecount?>
                页显示
            </td>
            <td>
                <?=$row['zs']?>
            </td>
            <td>
                <?=round($row['sum_m'], 2)?>
            </td>
            <td>
                <?=round($row['usersf'], 2)?>
            </td>
        </tr>
    </table>
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
            <td align=center height="20" bgcolor="#CCCCCC">
                <a href="javascript:history.go(-1);">离开</a>
            </td>
        </tr>
    </table>
    <?} ?>
    <iframe name="check_frame" src="" width="0" height="0" style="display:none"></iframe>
</body>