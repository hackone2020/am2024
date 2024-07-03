<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
if (strpos($flag, "03")) {
} else {
    echo "<center>你没有该权限功能!</center>";
    exit;
}
$ids = "特码";
$abcd = "";
$zc = 0;
$tj = 0;
$sort = 0;
if ($_GET['kithe'] != "") {
    $kithe = $_GET['kithe'];
} else {
    $kithe = $Current_Kithe_Num;
}
if ($_GET['abcd'] != "") {
    $abcd = $_GET['abcd'];
}
if ($_GET['zc'] != "") {
    $zc = $_GET['zc'];
}
if ($_GET['tj'] != "") {
    $tj = $_GET['tj'];
}
if ($_GET['sort'] != "") {
    $sort = $_GET['sort'];
}
if ($_GET['act'] == "save") {
    if ($_POST['ds'] == "") {
        echo "<script>alert('退水有误，请输入数字!'); window.history.go(-1);</script>";
        exit;
    }
    if (empty($_POST['rate'])) {
        echo "<script>alert('赔率有误，请输入数字！'); window.history.go(-1);</script>";
        exit;
    }
    if (empty($_POST['sum_m'])) {
        echo "<script>alert('金额有误，请输入数字!'); window.history.go(-1);</script>";
        exit;
    }
    if ($_POST['classname'] != "") {
        $zf_username = $_POST['classname'];
    } else {
        $zf_username = "外调";
    }
    $num = randstr();
    $zf_class1 = $_POST['class1'];
    $zf_class2 = $_POST['class2'];
    $zf_class3 = $_POST['class3'];
    $zf_rate = $_POST['rate'];
    $zf_ds = $_POST['ds'];
    $zf_sum = $_POST['sum_m'];
    $result = $db1->query("select ds_lb from web_bl where class1='" . $zf_class1 . "' and  class2='" . $zf_class2 . "' and class3='" . $zf_class3 . "' order by id LIMIT 1");
    $row = mysql_fetch_array($result);
    if ($row == "") {
        echo "<script>alert('补货失败，请重新操作!'); window.history.go(-1);</script>";
        exit;
    }
    $zf_dslb = $row['ds_lb'];
    $zf_class4 = md5($zf_class1 . "@" . $zf_class2 . "@" . $zf_class3 . "\$-" . $zf_sum);
    $zf_class5 = "@|" . $_POST['class3'] . "|@";
    $sql_set = " set num='{$num}', username='{$zf_username}', kithe='{$kithe}', adddate='{$utime}', ds_lb='{$zf_dslb}', class1='" . $zf_class1 . "', class2='" . $zf_class2 . "', class3='" . $zf_class3 . "', rate='" . $zf_rate . "', rate2='" . $zf_rate . "', sum_m='-" . $zf_sum . "', daizc='0', zongzc='0', guanzc='0', daguzc='0', gszc='-" . $zf_sum . "', user_ds='" . $zf_ds . "', dai_ds='" . $zf_ds . "', zong_ds='" . $zf_ds . "', guan_ds='" . $zf_ds . "', dagu_ds='" . $zf_ds . "', dai_rate='{$zf_rate}', zong_rate='{$zf_rate}', guan_rate='{$zf_rate}', dagu_rate='{$zf_rate}', bm=2, dai='外调', zong='外调', guan='外调', dagu='外调', lx=5, visible=1, abcd='A', qx=0, jx=0, lm=0, lmlx=0, sz=1,win='0', class4='{$zf_class4}', class5='{$zf_class5}', rate3=0, rate4=0, ratelm1=0, ratelm2=0, lmclass3=0, ip='{$userip}' ";
    $sql1 = "INSERT INTO  web_tan " . $sql_set;
    $sql2 = "INSERT INTO  web_tans " . $sql_set;
    if (!$db1->query($sql1)) {
        exit("数据库修改出错1");
    }
    if (!$db1->query($sql2)) {
        exit("数据库修改出错2");
    }
    echo "<script>alert('补货成功!');</script>";
} ?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<link rel="stylesheet" href="css/ball.css" type="text/css">
<script language="JavaScript">
    var uid = "<?= $uid ?>";
    var ids = "<?= $ids ?>";
    var kithe = "<?= $kithe ?>";
    var kithe_num = "<?= $Current_Kithe_Num ?>";
    var autotime = "<?= $autotime ?>";
    var lj_time = 1;
    var dq_time = "<?= date("F d, Y H: i: s", strtotime($utime)) ?>";
    var fp_time = "<?= date("F d, Y H: i: s", strtotime($Current_KitheTable[30])) ?>";
</script>
<script src="js/function.js" type="text/javascript"></script>
<script src="js/list_tm.js" type="text/javascript"></script>
<script language="JavaScript">
    function onLoad() {
        var obj_kithe = $("kithe");
        obj_kithe.value = "<?= $kithe ?>";
        var obj_abcd = $("abcd");
        obj_abcd.value = "<?= $abcd ?>";
        var obj_zc = $("zc");
        obj_zc.value = "<?= $zc ?>";
        var obj_tj = $("tj");
        obj_tj.value = "<?= $tj ?>";
        var obj_sort = $("sort");
        obj_sort.value = "<?= $sort ?>";
    }
</script>

<body style="min-width: 1200px;width: 100%">
    <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tbody>
            <tr>
                <!--left-->
                <td width="260" align="center" valign="top">
                    <? require_once "list_header.php"; ?>
                </td>
                <!--right-->
                <td valign="top">
                    <!--top talbe 外层--        !-->
                    <table width="100%" border="0" cellpadding="0" cellspacing="1" class="t_list">
                        <form action="main.php" method="get" name="myFORM" id="myFORM">
                            <tbody>
                                <tr class="t_list_caption">
                                    <!--外层td start-->
                                    <td colspan="16">
                                        <span style="float: left;" class="font_b">
                                            &nbsp;<?= $ids ?>&nbsp;
                                            <select id="kithe" name="kithe" onChange="document.myFORM.submit();" class="za_select">
                                                <?
                                                $result = $db1->query("select * from web_kithe order by nn desc limit 30");
                                                while ($image = $result->fetch_array()) { ?>
                                                    <option <? if ($kithe == $image['nn']) echo "selected"; ?> value='<?= $image['nn'] ?>'>第<?= $image['nn'] ?>期</OPTION>
                                                <? } ?>
                                            </select>
                                        </span>
                                        <span>
                                            距离封盘时间:
                                            <? if ($Current_KitheTable[29] != 0 && $Current_KitheTable[15] != 0 && $kithe == $Current_Kithe_Num) { ?>
                                                <span class="font_r" style="font-size: 12px; font-weight: bold;" id="daojishi"></span>
                                            <? } else { ?>
                                                <span class="font_r" style="font-size: 12px; font-weight: bold;">已封盘</span>
                                            <? } ?>
                                        </span>
                                        <span style="float: right;">
                                            &nbsp;盘口:&nbsp;
                                            <select id="abcd" name="abcd" onChange="document.myFORM.submit();" class="za_select">
                                                <option value="" <? if ($abcd == "") echo "selected"; ?>>全部</option>
                                                <option value="A" <? if ($abcd == "A") echo "selected"; ?>>A</option>
                                                <option value="B" <? if ($abcd == "B") echo "selected"; ?>>B</option>
                                                <option value="C" <? if ($abcd == "C") echo "selected"; ?>>C</option>
                                                <option value="D" <? if ($abcd == "D") echo "selected"; ?>>D</option>
                                                <option value="E" <? if ($abcd == "E") echo "selected"; ?>>E</option>
                                                <option value="F" <? if ($abcd == "F") echo "selected"; ?>>F</option>
                                                <option value="G" <? if ($abcd == "G") echo "selected"; ?>>G</option>
                                                <option value="H" <? if ($abcd == "H") echo "selected"; ?>>H</option>
                                            </select><input name="action" type="hidden" id="action" value="list_tm" />
                                            <input name="uid" type="hidden" id="uid" value="<?= $uid ?>" />
                                            &nbsp;类型:&nbsp;
                                            <select id="zc" name="zc" onChange="document.myFORM.submit();" class="za_select">
                                                <option value="0" <? if ($zc == "0") echo "selected"; ?>>实货</option>
                                                <option value="1" <? if ($zc == "1") echo "selected"; ?>>虚货</option>
                                            </select>
                                            &nbsp;
                                            <span>&nbsp;统计:&nbsp;</span>

                                            <select id="tj" name="tj" onChange="document.myFORM.submit();" class="za_select">
                                                <option value="0">特码</option>
                                                <option value="1">特码+双面</option>
                                            </select>
                                            <span>&nbsp;排序:&nbsp;</< /span>

                                                <select id="sort" name="sort" onChange="document.myFORM.submit();" class="za_select">
                                                    <option value="0">预计盈利</option>
                                                    <option value="1">下注总额</option>
                                                    <option value="2">1-49</option>
                                                </select>
                                                &nbsp;
                                            </span>

                                    </td>
                                </tr>
                                <tr bgColor="#FFFFFF">
                                    <td width="30%" valign="top">
                                        <table id="tb10" border="0" cellspacing="1" cellpadding="0" bgcolor="C2C2A6" class="m_tab" width="100%">
                                            <tr>
                                                <td height="28" align="center" class="t_list_tr_3">号码</td>
                                                <td align="center" class="t_list_tr_3">赔率</td>
                                                <td align="center" class="t_list_tr_3">注单数</td>
                                                <td align="center" class="t_list_tr_3">总额</td>
                                                <td align="center" class="t_list_tr_3">双面</td>
                                                <td align="center" class="t_list_tr_3">预计盈利</td>
                                                <td align="center" class="t_list_tr_3">补货</td>
                                                <td align="center" class="t_list_tr_3">已补</td>
                                            </tr>
                                            <tr bgcolor="#FFFFFF">
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                        </table>
                                        <!-- <table id="tb20" border="0" cellspacing="1" cellpadding="0" bgcolor="C2C2A6" class="m_tab" width="100%">
                                            <tr>
                                                <td height="20" align="center" class="t_list_tr_3">号码</td>
                                                <td align="center" class="t_list_tr_3">赔率</td>
                                                <td align="center" class="t_list_tr_3">注单数</td>
                                                <td align="center" class="t_list_tr_3">总额</td>
                                                <td align="center" class="t_list_tr_3">双面</td>
                                                <td align="center" class="t_list_tr_3">预计盈利</td>
                                                <td align="center" class="t_list_tr_3">补货</td>
                                                <td align="center" class="t_list_tr_3">已补</td>
                                            </tr>
                                            <tr bgcolor="#FFFFFF">
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                        </table> -->
                                    </td>
                                    <td width="30%" valign="top">
                                        <table id="tb30" border="0" cellspacing="1" cellpadding="0" bgcolor="C2C2A6" class="m_tab" width="100%">
                                            <tr>
                                                <td height="28" align="center" class="t_list_tr_3">号码</td>
                                                <td align="center" class="t_list_tr_3">赔率</td>
                                                <td align="center" class="t_list_tr_3">注单数</td>
                                                <td align="center" class="t_list_tr_3">总额</td>
                                                <td align="center" class="t_list_tr_3">双面</td>
                                                <td align="center" class="t_list_tr_3">预计盈利</td>
                                                <td align="center" class="t_list_tr_3">补货</td>
                                                <td align="center" class="t_list_tr_3">已补</td>
                                            </tr>
                                            <tr>
                                                <td height="20" align="center" bgcolor="#FFFFFF">&nbsp;</td>
                                                <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
                                                <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
                                                <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
                                                <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
                                                <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
                                                <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
                                                <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
                                            </tr>
                                        </table>
                                        <!-- <table id="tb40" border="0" cellspacing="1" cellpadding="0" bgcolor="C2C2A6" class="m_tab" width="100%">
                                            <tr>
                                                <td height="20" align="center" class="t_list_tr_3">号码</td>
                                                <td align="center" class="t_list_tr_3">赔率</td>
                                                <td align="center" class="t_list_tr_3">注单数</td>
                                                <td align="center" class="t_list_tr_3">总额</td>
                                                <td align="center" class="t_list_tr_3">双面</td>
                                                <td align="center" class="t_list_tr_3">预计盈利</td>
                                                <td align="center" class="t_list_tr_3">补货</td>
                                                <td align="center" class="t_list_tr_3">已补</td>
                                            </tr>
                                            <tr>
                                                <td height="20" align="center" bgcolor="#FFFFFF">&nbsp;</td>
                                                <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
                                                <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
                                                <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
                                                <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
                                                <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
                                                <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
                                                <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
                                            </tr>
                                        </table> -->
                                    </td>
                                    <td width="30%" valign="top">
                                        <table id="tb50" border="0" cellspacing="1" cellpadding="0" bgcolor="C2C2A6" class="m_tab" width="100%">
                                            <tr>
                                                <td height="28" align="center" class="t_list_tr_3">号码</td>
                                                <td align="center" class="t_list_tr_3">赔率</td>
                                                <td align="center" class="t_list_tr_3">注单数</td>
                                                <td align="center" class="t_list_tr_3">总额</td>
                                                <td align="center" class="t_list_tr_3">双面</td>
                                                <td align="center" class="t_list_tr_3">预计盈利</td>
                                                <td align="center" class="t_list_tr_3">补货</td>
                                                <td align="center" class="t_list_tr_3">已补</td>
                                            </tr>
                                            <tr>
                                                <td height="20" align="center" bgcolor="#FFFFFF">&nbsp;</td>
                                                <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
                                                <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
                                                <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
                                                <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
                                                <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
                                                <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
                                                <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
                                            </tr>
                                        </table>
                                        <table id="tb2" border="0" cellspacing="1" cellpadding="0" bgcolor="C2C2A6" class="m_tab" width="100%">
                                            <tr>
                                                <td height="23" align="center" class="t_list_tr_3">号码</td>
                                                <td align="center" class="t_list_tr_3">赔率</td>
                                                <td align="center" class="t_list_tr_3">注单数</td>
                                                <td align="center" class="t_list_tr_3">总额</td>
                                                <td align="center" class="t_list_tr_3">彩金</td>
                                                <td align="center" class="t_list_tr_3">补货</td>
                                                <td align="center" class="t_list_tr_3">已补</td>
                                            </tr>
                                            <tr>
                                                <td height="20" align="center" bgcolor="#FFFFFF">&nbsp;</td>
                                                <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
                                                <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
                                                <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
                                                <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
                                                <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
                                                <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
                                            </tr>
                                        </table>
                                    </td> <!-- 最后一个table  td-->
                                </tr>
                        </form>
                    </table>
                </td> <!--外层td end-->
            </tr>
        </tbody>
    </table>
    <table id="tb3" border="0" cellspacing="1" cellpadding="0" bgcolor="C2C2A6" class="m_tab" width="450" align="center">
        <tr>
            <td height="20" class="t_list_tr_3">&nbsp;</td>
            <td align="center" bgcolor="#FFFFFF">注单数</td>
            <td align="center" bgcolor="#FFFFFF">总额</td>
            <td align="center" bgcolor="#FFFFFF">已补</td>
        </tr>
        <tr>
            <td height="20" align="center" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
    </table>
    <DIV id=rs_window style="DISPLAY: none; POSITION: absolute">
        <form action="main.php?action=list_tm&uid=<?= $uid ?>&act=save&kithe=<?= $kithe ?>" method="post" name="form1">
            <? include "zf.php"; ?>
        </form>
    </div>

    <SCRIPT language=javascript>
        makeRequest('main.php?action=server_tm&uid=<?= $uid ?>&kithe=<?= $kithe ?>&abcd=<?= $abcd ?>&zc=<?= $zc ?>&tj=<?= $tj ?>&sort=<?= $sort ?>')
    </script>
    <? if ($Current_KitheTable[29] != 0 && $Current_KitheTable[11] != 0 && $kithe == $Current_Kithe_Num) { ?>

        <script src="js/daojishi.js" type="text/javascript"></script>
    <? } ?>