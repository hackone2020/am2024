<?php

function get_html($cnum, $c1, $c2, $c3, $c4, $c5)
{
    global $uid;
    $html = "";
    switch ($c1) {
        case "����":
            $number_array = explode(",", $c2);
            $c3_array = explode(",", $c3);
            $number_count = count($number_array) - 1;
            $html = "����:" . $number_count . "��1" . "<br>";
            $t = 0;
            for (; $t < $number_count; $t += 1) {
                $y = $t * 2;
                $html .= "<font color='red' class='fontsize'>" . $number_array[$t] . "</font>-<font color='green' class='fontsize'>" . $c3_array[$y] . "</font>@<font color='blue' class='fontsize'>" . $c3_array[$y + 1] . "</font><br>";
                break;
            }
        case "����":
            $html = $c2 . "��<font color='red' class='fontsize'>" . $c3 . "</font>";
            $html .= "<br>�� " . $c4 . " �� ÿ��: <font color='green' class='fontsize'>" . $c5 / $c4 . "</font>";
            break;
        case "��ѡ����":
            $html = $c2 . "��<font color='red' class='fontsize'>" . $c3 . "</font>";
            $html .= "<br>�� " . $c4 . " �� ÿ��: <font color='green' class='fontsize'>" . $c5 / $c4 . "</font>";
            break;
        default:
            $html = $c2 . "��<font color='red' class='fontsize'>" . $c3 . "</font>";
            break;
    }
    return $html;
}
if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
if ($lx < 4 || $vip == 1 && !strpos($flag, "2")) {
    echo "<center>��û�и�Ȩ�޹���!</center>";
    exit;
} else {
    if ($rball != 1) {
        echo "<center>��û�и�Ȩ�޹���!</center>";
        exit;
    }
}
$vvv = " 1=1 ";
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
    echo "<script>alert('�����ڼ䣬������鿴��ʷ����!');window.history.go(-1);</script>";
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
<link rel="stylesheet" href="css/control_main.css" type="text/css">
<style type="text/css">
    <!--
    .m_title_reall {  background-color: #687780; text-align: center; color: #FFFFFF}
    .m_title_reag { background-color: #687780; text-align: center; color: #FFFFFF}
    .m_title_2 { background-color: #CC0000; text-align: center; color: #FFFFFF}
    -->
</style>

<script src="js/function.js" type="text/javascript"></script>
<script src="js/report_func.js" type="text/javascript"></script>
<script>
function ks(user, num, adddate, qx) {
        $("check_frame").src = 'main.php?action=report_m6_gs&uid=<?=$uid?>&vip=<?=$vip?>&act=edit&user='+user+'&num='+num+'&adddate='+adddate+'&qx='+qx;
    
}

</script>

<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0" vlink="#0000FF" alink="#0000FF">
    <table width="900" height="24" border="0" cellpadding="0" cellspacing="0">
        <td width="54" height="24" class="m_tline">�����ѯ</td>
        <td width="775" class="m_tline"><font color="#CC0000">��ǰ��ѯ</font>--<?if ($kithe != "") {?>��<?=$kithe?>��<?} else {?>�������䣺<?=$date_start?> ~<?=$date_end?><?} ?>
            &nbsp;&nbsp;����:<?if ($class2 != "") {?><?=$class2?><?} else {?>ȫ��<?}?><?if ($user != "") {?>&nbsp;&nbsp;��Ա:<?=$user?><?}?>
           --<a href="javascript:history.go( -1 );">����һҳ</a> -- <a href="main.php?action=report&uid=<?=$uid?>&vip=<?=$vip?>">�ر����ѯ</a>
        </td>
        <td width="40"><img src="images/top_04.gif" width="30" height="24" /></td>
        </tr>
    </table>&nbsp;
    <?
$z_sum = $z_zs = $z_ds = $z_sum_sum = $z_gs = $z_dagu = $z_guan = $z_zong = $z_dai = 0;
$result = $db1->query("select * from " . $tb_name . "  where " . $vvv . " and visible=1 order by adddate desc limit " . $offset . "," . $pagesize);
if ($result->num_rows != 0) {?>
    <table width="900" border="0" cellpadding="0" cellspacing="1" bgcolor="#000000">
        <tr>
            <td width="154" height="20" align="center" class="m_title_reall">����/ʱ��</td>
            <td width="74" class="m_title_reall">����/�̿�</td>
            <td width="75" align="center" class="m_title_reall">�û�</td>
            <td width="206" align="center" nowrap="nowrap" class="m_title_reall">��ע����</td>
            <td width="76" align="center" nowrap="nowrap" class="m_title_reall">����</td>
            <td width="88" align="center" nowrap="nowrap" class="m_title_reall">��ע���</td>
            <td width="71" align="center" class="m_title_reall">��ˮ���</td>
            <td width="97" align="center" class="m_title_reall">��Ա���</td>
        </tr>
        <?while ($image = $result->fetch_array()) {
        $z_sum += $image['sum_m'];
        $z_zs += $image['sz'];
        $z_gs += $image['gszc'];
        $z_dagu += $image['daguzc'];
        $z_guan += $image['guanzc'];
        $z_zong += $image['zongzc'];
        $z_dai += $image['daizc'];?>
        <tr class="m_rig<? if ($image['qx'] == 1) { echo "delete";}?>" onMouseOver="setPointer(this, 0, 'over', '#FFFFFF', '#FFCC66', '#FFCC99');"
        onMouseOut="setPointer(this, 0, 'out', '#FFFFFF', '#FFCC66', '#FFCC99');">
        <td align="center" bordercolor="cccccc" bgcolor="#FFFFFF">
            <?=$image['num']?>
            <br />
            <font color="green" style="line-height: 14px;"><?=$image['adddate']?></font>
        </td>
        <td height="35" align="center" bordercolor="cccccc" bgcolor="#FFFFFF">
            <?=$image['kithe']?>
            <br />
            <font color="red">
                <?=$image['abcd']?>
                ��
                <?=$image['user_ds']?>
            </font>
        </td>
        <td height="35" align="center" bordercolor="cccccc" bgcolor="#FFFFFF">
            <?=$image['username']?>
        </td>
        <td height="35" align="center" bordercolor="cccccc" bgcolor="#FFFFFF">
            <?=get_html($image['num'], $image['class1'], $image['class2'], $image['class3'], $image['sz'], $image['sum_m'])?>

            <?if ($image['lm'] == 1) {?>
            <br>�н�����:<?=$image['win']?>
            <?}?>
        </td>
        <td align="center" nowrap="nowrap" bordercolor="cccccc" bgcolor="#FFFFFF">
            <? if ($image['class1'] == "����" || $image['class1'] == "��ѡ����") {
            if ($image['class1'] == "��ѡ����") {
                echo $image['ratelm1'];
            } else {
                if ($image['class2'] == "���ж�" || $image['class2'] == "������") {
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
            <?if ($image['user_sf'] < 0) {
            echo round($image['user_sf'], 2);
            $z_ds += $image['user_sq'];
            $z_sum_sum += $image['user_sf'];
        }
        if (0 < $image['user_sf']) {?>
        <font color="red"><?=round($image['user_sf'], 2)?></font>
        <?
            $z_ds += $image['user_sq'];
            $z_sum_sum += $image['user_sf'];
        }
        if ($image['user_sf'] == 0) {
            echo round($image['user_sf'], 2);
            $z_ds += $image['user_sq'];
            $z_sum_sum += $image['user_sf'];
       }?>
           </td>  </tr>
   <? }?>
            <tr class="m_rig">
                <td height="18" colspan="5" align="center" nowrap bordercolor="cccccc" bgcolor="#FFFFFF">
                    ��ҳ�ܼ�&nbsp;��&nbsp;
                    <?=$z_zs?>
                    &nbsp;��
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
                    <table width="98%" border="0" align="center" cellpadding="2" cellspacing="0"
                        bordercolordark="#FFFFFF" bordercolor="888888">
                        <tr>
                            <td height="26" align="center">
                                <span class="STYLE9">��ǰΪ��<?=$page?>ҳ&nbsp;��<?=$pagecount?>ҳ&nbsp;��<?=$total?>��¼</span>&nbsp; 
<a href="main.php?action=report_m6_gs&uid=<?=$uid?>&vip=<?=$vip?>&kithe=<?=$kithe?>&user=<?=$user?>&date_start=<?=$date_start?>&date_end=<?=$date_end?>?gtype=<?=$gtype?>&lx=<?=$lx?>&page=1">��ҳ</a>
<a href="main.php?action=report_m6_gs&uid=<?=$uid?>&vip=<?=$vip?>&kithe=<?=$kithe?>&user=<?=$user?>&date_start=<?=$date_start?>&date_end=<?=$date_end?>&gtype=<?=$gtype?>&lx=<?=$lx?>&page=<?=$pre?>">��һҳ</a>
<a href="main.php?action=report_m6_gs&uid=<?=$uid?>&vip=<?=$vip?>&kithe=<?=$kithe?>&user=<?=$user?>&date_start=<?=$date_start?>&date_end=<?=$date_end?>&gtype=<?=$gtype?>&lx=<?=$lx?>&page=<?=$next?>">��һҳ</a>
<a href="main.php?action=report_m6_gs&uid=<?=$uid?>&vip=<?=$vip?>&kithe=<?=$kithe?>&user=<?=$user?>&date_start=<?=$date_start?>&date_end=<?=$date_end?>&gtype=<?=$gtype?>&lx=<?=$lx?>?page=<?=$last?>">ĩҳ</a>
                                <select name="page2" onChange="location.href='main.php?action=report_m6_gs&uid=<?=$uid?>&vip=<?=$vip?>&kithe=<?=$kithe?>&user=<?=$user?>&date_start=<?=$date_start?>&date_end=<?=$date_end?>&gtype=<?=$gtype?>&lx=<?=$lx?>&page='+this.options[selectedIndex].value">
                                    <? $i = 1;
    for (;$i <= $pagecount; ++$i) {?>
                                    <option value="<?=$i?>" <?if ($page == $i) {?>selected<?}?>>��<?=$i?>ҳ</option>
                                    <?}?>
                                </select>&nbsp;
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
    </table><br>
    <? $result = $db1->query("select sum(sum_m) as sum_m,sum(sz) as zs,sum(user_sf) as usersf from " . 	$tb_name . "  where " . $vvv . " order by adddate desc");
    $row = $result->fetch_array();
	?>
    <table width="900" border="0" cellspacing="1" cellpadding="0" class="m_tab" bgcolor="#000000">
        <tr class="m_title_2">
            <td width="101">���β�ѯ�ܼ�</td>
            <td width="122">����</td>
            <td width="218">��ע���</td>
            <td width="124">���</td>
        </tr>
        <tr class="m_rig">
            <td>��
                <?=$pagecount?>ҳ��ʾ
            </td>
            <td>
                <?=$row['zs']?>
            </td>
            <td>
                <?=round($row['sum_m'], 2)?>
            </td>
            <td>";
                <?=round($row['usersf'], 2)?>
            </td>
        </tr>
    </table>

    <?} else {?>
  <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr>
            <td align=center height="30" bgcolor="#CC0000">
                <marquee align="middle" behavior="alternate" width="200">
                    <font color="#FFFFFF">�����κ�����</font>
                </marquee>
            </td>
        </tr>
        <tr>
            <td align=center height="20" bgcolor="#CCCCCC"><a href="javascript:history.go(-1);">�뿪</a></td>
        </tr>
    </table>
    <?} ?>
    <iframe name="check_frame" src="" width="0" height="0" style="display:none"></iframe>
</body>