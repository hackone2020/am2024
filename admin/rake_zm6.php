<?php

function get_rake_sj($i)
{
    global $rake_sj_temp;
    $rake_sj = 0.01;
    switch ($i) {
        case "单":
            $rake_sj = $rake_sj_temp['正码1-6单双'];
            break;
        case "双":
            $rake_sj = $rake_sj_temp['正码1-6单双'];
            break;
        case "大":
            $rake_sj = $rake_sj_temp['正码1-6大小'];
            break;
        case "小":
            $rake_sj = $rake_sj_temp['正码1-6大小'];
            break;
        case "合单":
            $rake_sj = $rake_sj_temp['正码1-6合数单双'];
            break;
        case "合双":
            $rake_sj = $rake_sj_temp['正码1-6合数单双'];
            break;
        case "合大":
            $rake_sj = $rake_sj_temp['正码1-6合数大小'];
            break;
        case "合小":
            $rake_sj = $rake_sj_temp['正码1-6合数大小'];
            break;
        case "红波":
            $rake_sj = $rake_sj_temp['正码1-6色波'];
            break;
        case "绿波":
            $rake_sj = $rake_sj_temp['正码1-6色波'];
            break;
        case "绿波":
            $rake_sj = $rake_sj_temp['正码1-6色波'];
            break;
        default:
            $rake_sj = $rake_sj_temp['正码1-6单双'];
            break;
    }
    return $rake_sj;
}

if (!defined("KK_VER")) {
    exit("无效的访问");
}
if (strpos($flag, "02")) {
} else {
    echo "<center>你没有该权限功能!</center>";
    exit();
}
$ids = "正码1-6";
if ($_GET['act'] == "edit") {
    $tt = 1;
    for (; $tt <= 66; ++$tt) {
        if (empty($_POST["Num_" . $tt])) {
            echo "<script>alert('赔率不能为空:" . $_POST["Num_" . $tt] . "/" . $tt . "!');window.location.href='main.php?action=rake_zm6&uid={$uid}&ids=" . $ids . "';</script>";
            exit();
        }
    }
    $tt = 1;
    for (; $tt <= 66; ++$tt) {
        $num = $_POST["Num_" . $tt];
        $class3 = $_POST["class3_" . $tt];
        $class2 = $_POST["class2_" . $tt];
        $db1->query("update web_bl  set adddate='" . $utime . "',rate=" . $num . " where class1='正码1-6' and class2='" . $class2 . "' and  class3='" . $class3 . "'");
        if ($class3 != "合单" && $class3 != "合双" && $class3 != "合大" && $class3 != "合小") {
            $db1->query("update web_bl  set adddate='" . $utime . "',rate=" . $num . " where class1='过关' and class2='" . $class2 . "' and  class3='" . $class3 . "'");
        }
    }
    echo "<script>alert('修改成功!');window.location.href='main.php?action=rake_zm6&uid={$uid}&ids=" . $ids . "';</script>";
    exit();
}
$result = $db1->query("Select rate,class3,class2,locked from web_bl where class1='正码1-6'   Order By ID");
$showtable = array();
$y = 0;
while ($Image = $result->fetch_array()) {
    ++$y;
    array_push($showtable, $Image);
}
$drop_count = $y - 1;
$result = $db1->query("SELECT ds,rake_sj FROM web_config_ds WHERE class='正码1-6' Order By ID");
$rake_sj_temp = array();
$x = 0;
while ($Image = $result->fetch_array()) {
    $rake_sj_temp[$Image['ds']] = $Image['rake_sj'];
    ++$x;
}
$rake_sj_count = $x - 1;
?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<link rel="stylesheet" href="css/ball.css" type="text/css">
<script language="JavaScript">
    var uid = "<?= $uid ?>";
    var ids = "<?= $ids ?>";
    var autotime = "<?= $autotime ?>";
</script>
<script src="js/function.js" type="text/javascript"></script>
<script src="js/rake_zm6.js" type="text/javascript"></script>

<body style="min-width: 1200px;width: 100%">
    <div id="tit" class="tit">
        <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
        <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;赔率设置－</span><span class="font_b"><?= $ids ?>&nbsp;</span></div>
        <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
        <div class="biaoti_right floatright"></div>
    </div>

    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list" bgcolor="#ffffff">
        <tbody>
            <tr><!--left-->
                <td width="260" align="center" valign="top"><? require_once "rake_header.php"; ?></td>
                <!--right-->
                <td valign="top" style="margin-top:2px;">
                    <table width="100%" border="0" cellpadding="0" cellspacing="1" class="t_list bet">
                        <form name="form1" method="post" action="main.php?action=rake_zm6&uid=<?= $uid ?>&act=edit&ids=<?= $ids ?>">
                            <tbody>
                                <tr>
                                    <td colspan="20" align="center" class="t_list_caption">
                                        <table width="100%" height="213" border="0" cellpadding="0" cellspacing="1" bordercolordark="#FFFFFF" class="m_tab_ed">
                                            <tbody>
                                                <tr>
                                                    <?
                                                    $B = 1;
                                                    for (; $B <= 2; $B += 1) {
                                                        if ($B == 1) {
                                                    ?>
                                                <tr>
                                                    <td colspan="7" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">正码1</td>
                                                    <td colspan="7" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">正码2</td>
                                                    <td colspan="7" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">正码3</td>
                                                </tr>
                                                <tr>
                                                    <td height="20" class="t_list_tr_3" align="center">号码</td>
                                                    <td colspan="4" align="center" class="t_list_tr_3" align="center">赔率/封号</td>
                                                    <td align="center" class="t_list_tr_3">当前赔率</td>
                                                    <td align="center" class="t_list_tr_3">下注总额</td>
                                                    <td height="20" class="t_list_tr_3" align="center">号码</td>
                                                    <td colspan="4" align="center" class="t_list_tr_3" align="center">赔率/封号</td>
                                                    <td align="center" class="t_list_tr_3">当前赔率</td>
                                                    <td align="center" class="t_list_tr_3">下注总额</td>
                                                    <td height="20" class="t_list_tr_3" align="center">号码</td>
                                                    <td colspan="4" align="center" class="t_list_tr_3" align="center">赔率/封号</td>
                                                    <td align="center" class="t_list_tr_3">当前赔率</td>
                                                    <td align="center" class="t_list_tr_3">下注总额</td>
                                                </tr><?
                                                            $I = 1;
                                                            for (; $I <= 11; $I += 1) {
                                                        ?><tr>
                                                        <td height="38" align="center" bgcolor="#FFFFFF">
                                                            <font color="<?= get_bs_css($showtable[$I - 1][1]) ?>"><?= $showtable[$I - 1][1]; ?></font>
                                                            <input name="class2_<?= $I ?>" value="<?= $showtable[$I - 1][2] ?>" type="hidden">
                                                        </td>
                                                        <td width="32" height="38" align="center" bgcolor="#FFFFFF">
                                                            <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I ?>','bl<?= $I - 1 ?>','uid=<?= $uid ?>&class1=正码1-6&ids=正码1&sqq=sqq&lxlx=1&qtqt=<?= get_rake_sj($showtable[$I - 1][1]) ?>&class3=<?= $showtable[$I - 1][1] ?>');"><img src="images/add.png" width="19" height="17" border="0"></a>
                                                        </td>
                                                        <td width="63" height="38" align="center" bgcolor="#FFFFFF">
                                                            <input style="HEIGHT: 18px" class="za_text" maxlength="6" size="4" value="<?= $showtable[$I - 1][0]; ?>" name="Num_<?= $I ?>" />
                                                            <input name="class3_<?= $I ?>" value="<?= $showtable[$I - 1][1] ?>" type="hidden">
                                                        </td>
                                                        <td width="32" height="38" align="center" bgcolor="#FFFFFF">
                                                            <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I ?>','bl<?= $I - 1 ?>','uid=<?= $uid ?>&class1=正码1-6&ids=正码1&sqq=sqq&lxlx=0&qtqt=<?= get_rake_sj($showtable[$I - 1][1]) ?>&class3=<?= $showtable[$I - 1][1] ?>');"><img src="images/sub.png" width="19" height="17" border="0"></a>
                                                        </td>
                                                        <td width="34" height="38" align="center" bgcolor="#FFFFFF">
                                                            <input type=checkbox id=lock<?= $I ?> style="zoom:95%" title="关闭该项" onClick="UpdateRate('LOCK','lock<?= $I ?>','','uid=<?= $uid ?>&class1=正码1-6&ids=正码1&sqq=sqq&class3=<?= $showtable[$I - 1][1] ?>&lock='+this.checked);" <?
                                                                                                                                                                                                                                                                                        if ($showtable[$I - 1][3] == 1) {
                                                                                                                                                                                                                                                                                            echo "checked";
                                                                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                                                                        ?>>
                                                        </td>
                                                        <td height="38" align="center" bgcolor="#FFFFFF"><span id=bl<?= $I - 1 ?>><?= $showtable[$I - 1][0] ?></span></td>
                                                        <td width="54" align="center" bgcolor="#FFFFFF"><span id=gold<?= $I - 1 ?>>0</span></td>
                                                        <td height="38" align="center" bgcolor="#FFFFFF">
                                                            <font color="<?= get_bs_css($showtable[$I + 11 - 1][1]) ?>"><?= $showtable[$I + 11 - 1][1] ?></font>
                                                            <input name="class2_<?= $I + 11 ?>" value="<?= $showtable[$I + 11 - 1][2] ?>" type="hidden">
                                                        </td>
                                                        <td width="33" align="center" bgcolor="#FFFFFF">
                                                            <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 11 ?>','bl<?= $I + 11 - 1 ?>','uid=<?= $uid ?>&class1=正码1-6&ids=正码2&sqq=sqq&lxlx=1&qtqt=<?= get_rake_sj($showtable[$I + 11 - 1][1]) ?>&class3=<?= $showtable[$I + 11 - 1][1] ?>');"><img src="images/add.png" width="19" height="17" border="0"></a>
                                                        </td>
                                                        <td width="78" height="38" align="center" bgcolor="#FFFFFF"><input style="HEIGHT: 18px" class="za_text" maxlength="6" size="4" value="<?= $showtable[$I + 11 - 1][0] ?>" name="Num_<?= $I + 11 ?>" />
                                                            <input name="class3_<?= $I + 11 ?>" value="<?= $showtable[$I + 11 - 1][1] ?>" type="hidden">
                                                        </td>
                                                        <td width="33" align="center" bgcolor="#FFFFFF">
                                                           
                                                            <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 11 ?>','bl<?= $I + 11 - 1 ?>','uid=<?= $uid ?>&class1=正码1-6&ids=正码2&sqq=sqq&lxlx=0&qtqt=<?= get_rake_sj($showtable[$I + 11 - 1][1]) ?>&class3=<?= $showtable[$I + 11 - 1][1] ?>');"><img src="images/sub.png" width="19" height="17" border="0"></a>
                                                        </td>
                                                        <td width="20" align="center" bgcolor="#FFFFFF">
                                                            <input type=checkbox id=lock<?= $I + 11 ?> style="zoom:95%" title="关闭该项" onClick="UpdateRate('LOCK','lock<?= $I + 11 ?>','','uid=<?= $uid ?>&class1=正码1-6&ids=正码2&sqq=sqq&class3=<?= $showtable[$I + 11 - 1][1] ?>&lock='+this.checked);" <? if ($showtable[$I + 11 - 1][3] == 1) {
                                                                                                                                                                                                                                                                                                            echo "checked";
                                                                                                                                                                                                                                                                                                        } ?>>
                                                        </td>
                                                        <td height="38" align="center" bgcolor="#FFFFFF"><span id=bl<?= $I + 11 - 1 ?>><?= $showtable[$I + 11 - 1][0] ?></span></td>
                                                        <td align="center" bgcolor="#FFFFFF"><span id=gold<?= $I + 11 - 1 ?>>0</span></td>
                                                        <td height="38" align="center" bgcolor="#FFFFFF">
                                                            <font color="<?= get_bs_css($showtable[$I + 22 - 1][1]) ?>"><?= $showtable[$I + 22 - 1][1] ?></font>
                                                            <input name="class2_<?= $I + 22 ?>" value="<?= $showtable[$I + 22 - 1][2] ?>" type="hidden">
                                                        </td>
                                                        <td width="19" align="center" bgcolor="#FFFFFF">
                                                            <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 22 ?>','bl<?= $I + 22 - 1 ?>','uid=<?= $uid ?>&class1=正码1-6&ids=正码3&sqq=sqq&lxlx=1&qtqt=<?= get_rake_sj($showtable[$I + 22 - 1][1]) ?>&class3=<?= $showtable[$I + 22 - 1][1] ?>');">
                                                                <img src="images/add.png" width="19" height="17" border="0"></a>
                                                        </td>
                                                        <td width="47" height="38" align="center" bgcolor="#FFFFFF">
                                                            <input style="HEIGHT: 18px" class="za_text" maxlength="6" size="4" value="<?= $showtable[$I + 22 - 1][0] ?>" name="Num_<?= $I + 22 ?>" />
                                                            <input name="class3_<?= $I + 22 ?>" value="<?= $showtable[$I + 22 - 1][1] ?>" type="hidden">
                                                        </td>
                                                        <td width="19" align="center" bgcolor="#FFFFFF">
                                                           
                                                            <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 22 ?>','bl<?= $I + 22 - 1 ?>','uid=<?= $uid ?>&class1=正码1-6&ids=正码3&sqq=sqq&lxlx=0&qtqt=<?= get_rake_sj($showtable[$I + 22 - 1][1]) ?>&class3=<?= $showtable[$I + 22 - 1][1] ?>');">
                                                                <img src="images/sub.png" width="19" height="17" border="0"></a>
                                                        </td>
                                                        <td width="20" align="center" bgcolor="#FFFFFF">
                                                            <input type=checkbox id=lock<?= $I + 22 ?> style="zoom:95%" title="关闭该项" onClick="UpdateRate('LOCK','lock<?= $I + 22 ?>','','uid=<?= $uid ?>&class1=正码1-6&ids=正码3&sqq=sqq&class3=<?= $showtable[$I + 22 - 1][1] ?>&lock='+this.checked);" <?
                                                                                                                                                                                                                                                                                                        if ($showtable[$I + 22 - 1][3] == 1) {
                                                                                                                                                                                                                                                                                                            echo "checked";
                                                                                                                                                                                                                                                                                                        } ?>>
                                                        </td>
                                                        <td height="38" align="center" bgcolor="#FFFFFF"><span id=bl<?= $I + 22 - 1 ?>><?= $showtable[$I + 22 - 1][0] ?></span></td>
                                                        <td align="center" bgcolor="#FFFFFF"><span id=gold<?= $I + 22 - 1 ?>>0</span></td>
                                                    </tr>
                                                <?
                                                                continue;
                                                            }
                                                        } else {
                                                ?><tr>
                                                    <td colspan="7" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">正码4</td>
                                                    <td colspan="7" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">正码5</td>
                                                    <td colspan="7" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">正码6</td>
                                                </tr>
                                                <tr>
                                                    <td height="20" class="t_list_tr_3" align="center">号码</td>
                                                    <td colspan="4" align="center" class="t_list_tr_3">赔率/封号</td>
                                                    <td align="center" class="t_list_tr_3">当前赔率</td>
                                                    <td align="center" class="t_list_tr_3">下注总额</td>
                                                    <td height="20" class="t_list_tr_3" align="center">号码</td>
                                                    <td colspan="4" align="center" class="t_list_tr_3">赔率/封号</td>
                                                    <td align="center" class="t_list_tr_3">当前赔率</td>
                                                    <td align="center" class="t_list_tr_3">下注总额</td>
                                                    <td height="20" class="t_list_tr_3" align="center">号码</td>
                                                    <td colspan="4" align="center" class="t_list_tr_3">赔率/封号</td>
                                                    <td align="center" class="t_list_tr_3">当前赔率</td>
                                                    <td align="center" class="t_list_tr_3">下注总额</td>
                                                </tr>
                                                <?
                                                            $I = 1;
                                                            for (; $I <= 11; $I += 1) {
                                                ?> <tr>
                                                        <td height="25" align="center" bgcolor="#FFFFFF">
                                                            <font color="<?= get_bs_css($showtable[$I + 33 - 1][1]) ?>"><?= $showtable[$I + 33 - 1][1] ?></font>
                                                            <input name="class2_<?= $I + 33 ?>" value="<?= $showtable[$I + 33 - 1][2] ?>" type="hidden">
                                                        </td>
                                                        <td height="38" align="center" bgcolor="#FFFFFF">
                                                            <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 33 ?>','bl<?= $I + 33 - 1 ?>','uid=<?= $uid ?>&class1=正码1-6&ids=正码4&sqq=sqq&lxlx=1&qtqt=<?= get_rake_sj($showtable[$I + 33 - 1][1]) ?>&class3=<?= $showtable[$I + 33 - 1][1] ?>');"><img src="images/add.png" width="19" height="17" border="0"></a>
                                                        </td>
                                                        <td height="25" align="center" bgcolor="#FFFFFF"><input style="HEIGHT: 18px" class="za_text" maxlength="6" size="4" value="<?= $showtable[$I + 33 - 1][0] ?>" name="Num_<?= $I + 33 ?>" />
                                                            <input name="class3_<?= $I + 33 ?>" value="<?= $showtable[$I + 33 - 1][1] ?>" type="hidden">
                                                        </td>
                                                        <td height="38" align="center" bgcolor="#FFFFFF">
                                                            
                                                            <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 33 ?>','bl<?= $I + 33 - 1 ?>','uid=<?= $uid ?>&class1=正码1-6&ids=正码4&sqq=sqq&lxlx=0&qtqt=<?= get_rake_sj($showtable[$I + 33 - 1][1]) ?>&class3=<?= $showtable[$I + 33 - 1][1] ?>');"><img src="images/sub.png" width="19" height="17" border="0"></a>
                                                        </td>
                                                        <td height="38" align="center" bgcolor="#FFFFFF"><input type=checkbox id=lock<?= $I + 33 ?> style="zoom:95%" title="关闭该项" onClick="UpdateRate('LOCK','lock<?= $I + 33 ?>','','uid=<?= $uid ?>&class1=正码1-6&ids=正码4&sqq=sqq&class3=<?= $showtable[$I + 33 - 1][1] ?>&lock='+this.checked);" <?
                                                                                                                                                                                                                                                                                                                                                    if ($showtable[$I + 33 - 1][3] == 1) {
                                                                                                                                                                                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                                                                                                    ?>></td>
                                                        <td height="25" align="center" bgcolor="#FFFFFF"><span id=bl<?= $I + 33 - 1 ?>><?= $showtable[$I + 33 - 1][0] ?></span></td>
                                                        <td width="54" align="center" bgcolor="#FFFFFF"><span id=gold<?= $I + 33 - 1 ?>>0</span></td>
                                                        <td height="25" align="center" bgcolor="#FFFFFF">
                                                            <font color="<?= get_bs_css($showtable[$I + 44 - 1][1]) ?>"><?= $showtable[$I + 44 - 1][1] ?></font><input name="class2_<?= $I + 44 ?>" value="<?= $showtable[$I + 44 - 1][2] ?>" type="hidden">
                                                        </td>
                                                        <td height="38" align="center" bgcolor="#FFFFFF">
                                                            <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 44 ?>','bl<?= $I + 44 - 1 ?>','uid=<?= $uid ?>&class1=正码1-6&ids=正码5&sqq=sqq&lxlx=1&qtqt=<?= get_rake_sj($showtable[$I + 44 - 1][1]) ?>&class3=<?= $showtable[$I + 44 - 1][1] ?>');"><img src="images/add.png" width="19" height="17" border="0"></a>
                                                        </td>
                                                        <td height="25" align="center" bgcolor="#FFFFFF"><input style="HEIGHT: 18px" class="za_text" maxlength="6" size="4" value="<?= $showtable[$I + 44 - 1][0] ?>" name="Num_<?= $I + 44 ?>" /><input name="class3_<?= $I + 44 ?>" value="<?= $showtable[$I + 44 - 1][1] ?>" type="hidden"></td>
                                                        <td height="38" align="center" bgcolor="#FFFFFF">
                                                           
                                                            <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 44 ?>','bl<?= $I + 44 - 1 ?>','uid=<?= $uid ?>&class1=正码1-6&ids=正码5&sqq=sqq&lxlx=0&qtqt=<?= get_rake_sj($showtable[$I + 44 - 1][1]) ?>&class3=<?= $showtable[$I + 44 - 1][1] ?>');"><img src="images/sub.png" width="19" height="17" border="0"></a>
                                                        </td>
                                                        <td height="38" align="center" bgcolor="#FFFFFF"><input type=checkbox id=lock<?= $I + 44 ?> style="zoom:95%" title="关闭该项" onClick="UpdateRate('LOCK','lock<?= $I + 44 ?>','','uid=<?= $uid ?>&class1=正码1-6&ids=正码5&sqq=sqq&class3=<?= $showtable[$I + 44 - 1][1] ?>&lock='+this.checked);" <?
                                                                                                                                                                                                                                                                                                                                                    if ($showtable[$I + 44 - 1][3] == 1) {
                                                                                                                                                                                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                                                                                                    ?>>
                                                        </td>
                                                        <td height="25" align="center" bgcolor="#FFFFFF"><span id=bl<?= $I + 44 - 1 ?>><?= $showtable[$I + 44 - 1][0] ?></span></td>
                                                        <td width="67" align="center" bgcolor="#FFFFFF"><span id=gold<?= $I + 44 - 1 ?>>0</span></td>
                                                        <td height="25" align="center" bgcolor="#FFFFFF">
                                                            <font color="<?= get_bs_css($showtable[$I + 55 - 1][1]) ?>"><?= $showtable[$I + 55 - 1][1] ?></font><input name="class2_<?= $I + 55 ?>" value="<?= $showtable[$I + 55 - 1][2] ?>" type="hidden">
                                                        </td>
                                                        <td height="38" align="center" bgcolor="#FFFFFF">
                                                            <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 55 ?>','bl<?= $I + 55 - 1 ?>','uid=<?= $uid ?>&class1=正码1-6&ids=正码6&sqq=sqq&lxlx=1&qtqt=<?= get_rake_sj($showtable[$I + 55 - 1][1]) ?>&class3=<?= $showtable[$I + 55 - 1][1] ?>');"><img src="images/add.png" width="19" height="17" border="0"></a>
                                                        </td>
                                                        <td height="25" align="center" bgcolor="#FFFFFF"><input style="HEIGHT: 18px" class="za_text" maxlength="6" size="4" value="<?= $showtable[$I + 55 - 1][0] ?>" name="Num_<?= $I + 55 ?>" /><input name="class3_<?= $I + 55 ?>" value="<?= $showtable[$I + 55 - 1][1] ?>" type="hidden"></td>
                                                        <td height="38" align="center" bgcolor="#FFFFFF">
                                                            
                                                            <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 55 ?>','bl<?= $I + 55 - 1 ?>','uid=<?= $uid ?>&class1=正码1-6&ids=正码6&sqq=sqq&lxlx=0&qtqt=<?= get_rake_sj($showtable[$I + 55 - 1][1]) ?>&class3=<?= $showtable[$I + 55 - 1][1] ?>');"><img src="images/sub.png" width="19" height="17" border="0"></a>
                                                        </td>
                                                        <td height="38" align="center" bgcolor="#FFFFFF"><input type=checkbox id=lock<?= $I + 55 ?> style="zoom:95%" title="关闭该项" onClick="UpdateRate('LOCK','lock<?= $I + 55 ?>','','uid=<?= $uid ?>&class1=正码1-6&ids=正码6&sqq=sqq&class3=<?= $showtable[$I + 55 - 1][1] ?>&lock='+this.checked);" <?
                                                                                                                                                                                                                                                                                                                                                    if ($showtable[$I + 55 - 1][3] == 1) {
                                                                                                                                                                                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                                                                                                    ?>>
                                                        </td>
                                                        <td height="25" align="center" bgcolor="#FFFFFF"><span id=bl<?= $I + 55 - 1 ?>><?= $showtable[$I + 55 - 1][0] ?></span></td>
                                                        <td width="68" align="center" bgcolor="#FFFFFF"><span id=gold<?= $I + 55 - 1 ?>>0</span></td>
                                                    </tr>
                                        <?
                                                            }
                                                        }
                                                        //}
                                                    } ?>
                                        <tr>
                                            <td height="25" colspan="21" align="center" bordercolor="cccccc" bgcolor="#FFFFFF">&nbsp;&nbsp;
                                                <input type="submit" class="btn1" name="Submit2" value="提交" />&nbsp;<input type="reset" class="btn2" name="Submit3" value="重置" />
                                            </td>
                                        </tr>
                        </form>
                    </table>
                    <SCRIPT language=javascript>
                        makeRequest('main.php?action=server&uid=<?= $uid ?>&class1=正码1-6&class2=<?= $ids ?>')
                    </script>
</body>