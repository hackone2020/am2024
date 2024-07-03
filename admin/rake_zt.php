<?php

function get_rake_sj($i)
{
    global $rake_sj_temp;
    $rake_sj = 0.01;
    $rake_sj = $rake_sj_temp['正特'];
    return $rake_sj;
}
if (!defined("KK_VER")) {
    exit("无效的访问");
}
if (strpos($flag, "02")) {
} else {
    echo "<center>你没有该权限功能!</center>";
    exit;
}
if ($_GET['ids'] != "") {
    $ids = $_GET['ids'];
} else {
    $ids = "正1特";
}
if ($_GET['save'] == "save") {
    if (empty($_POST['bl'])) {
        echo "<script>alert('赔率不能为空!');window.location.href='main.php?action=rake_zt&uid={$uid}&ids=" . $ids . "';</script>";
        exit;
    }
    $tt = 1;
    for (; $tt <= 49; ++$tt) {
        if ($_POST['dx'] == "全部") {
            $db1->query("update web_bl set adddate='" . $utime . "',rate=" . $_POST['bl'] . ",adddate='" . $utime . "' where class2='" . $ids . "' and  class3='" . $tt . "'");
        }
        if ($_POST['dx'] == "单" && $tt % 2 == 1) {
            $db1->query("update web_bl set rate=" . $_POST['bl'] . ",adddate='" . $utime . "' where class2='" . $ids . "' and  class3='" . $tt . "'");
        }
        if ($_POST['dx'] == "双" && $tt % 2 == 0) {
            $db1->query("update web_bl set rate=" . $_POST['bl'] . ",adddate='" . $utime . "' where class2='" . $ids . "' and  class3='" . $tt . "'");
        }
        if ($_POST['dx'] == "大" && 25 <= $tt) {
            $db1->query("update web_bl set rate=" . $_POST['bl'] . ",adddate='" . $utime . "' where class2='" . $ids . "' and  class3='" . $tt . "'");
        }
        if ($_POST['dx'] == "小" && $tt <= 24) {
            $db1->query("update web_bl set rate=" . $_POST['bl'] . ",adddate='" . $utime . "' where class2='" . $ids . "' and  class3='" . $tt . "'");
        }
        if ($_POST['dx'] == "红波" && get_bs_color($tt) == "r") {
            $db1->query("update web_bl set rate=" . $_POST['bl'] . ",adddate='" . $utime . "' where class2='" . $ids . "' and  class3='" . $tt . "'");
        }
        if ($_POST['dx'] == "蓝波" && get_bs_color($tt) == "b") {
            $db1->query("update web_bl set rate=" . $_POST['bl'] . ",adddate='" . $utime . "' where class2='" . $ids . "' and  class3='" . $tt . "'");
        }
        if (!($_POST['dx'] == "绿波") && !(get_bs_color($tt) == "g")) {
            $db1->query("update web_bl set rate=" . $_POST['bl'] . ",adddate='" . $utime . "' where class2='" . $ids . "' and  class3='" . $tt . "'");
        }
    }
}
if ($_GET['act'] == "edit") {
    $tt = 1;
    for (; $tt <= 49; ++$tt) {
        if (empty($_POST["Num_" . $tt])) {
            echo "<script>alert('赔率不能为空:" . $_POST["Num_" . $tt] . "/" . $tt . "!');window.location.href='main.php?action=rake_zt&uid={$uid}&ids=" . $ids . "';</script>";
            exit;
        }
    }
    if ($ids == "正1特") {
        $class22 = "正码1";
    }
    if ($ids == "正2特") {
        $class22 = "正码2";
    }
    if ($ids == "正3特") {
        $class22 = "正码3";
    }
    if ($ids == "正4特") {
        $class22 = "正码4";
    }
    if ($ids == "正5特") {
        $class22 = "正码5";
    }
    if ($ids == "正6特") {
        $class22 = "正码6";
    }
    $tt = 1;
    for (; $tt <= 49; ++$tt) {
        $num = $_POST["Num_" . $tt];
        if (48 < $num) {
            echo "<script>alert('" . $tt . "号的赔率值不能大于48!');window.location.href='main.php?action=rake_zt&uid={$uid}&ids=" . $ids . "';</script>";
            exit;
        }
        $class3 = $_POST["class3_" . $tt];
        $db1->query("update web_bl  set rate=" . $num . ",adddate='" . $utime . "' where class2='" . $ids . "' and  class3='" . $class3 . "'");
    }
    echo "<script>alert('修改成功!');window.location.href='main.php?action=rake_zt&uid={$uid}&ids=" . $ids . "';</script>";
    exit;
}
if ($_GET['savew'] == "savew") {
    if (empty($_POST['mf'])) {
        echo "<script>alert('请选择项目!');window.location.href='main.php?action=rake_zt&uid={$uid}&ids=" . $ids . "';</script>";
        exit;
    }
    if (empty($_POST['money'])) {
        echo "<script>alert('请输入数值!');window.location.href='main.php?action=rake_zt&uid={$uid}&ids=" . $ids . "';</script>";
        exit;
    }
    $mv = $_POST['mv'];
    $money = $_POST['money'];
    $vvv = $_POST['mf'];
    $ss = count($vvv);
    $i = 0;
    for (; $i <= $ss - 1; ++$i) {
        $string .= $vvv[$i] . ",";
    }
    $pc = explode(",", $string);
    $ss1 = count($pc);
    $i = 0;
    for (; $i <= $ss1 - 2; ++$i) {
        $string1 .= intval($pc[$i]) . ",";
    }
    $pc = explode(",", $string1);
    $ss2 = count($pc);
    $i = 0;
    for (; $i <= $ss2 - 1; ++$i) {
        if ($i == 0) {
            $guolv = $pc[$i];
        } else {
            $uuu = $pc[$i];
            $pc1 = explode(",", $guolv);
            $ss3 = count($pc1);
            $ff = 0;
            $f = 0;
            for (; $f <= $ss3; ++$f) {
                if ($uuu == $pc1[$f]) {
                    $ff = 1;
                }
            }
            if ($ff == 0) {
                $guolv .= "," . $uuu;
            }
        }
    }
    $pc4 = explode(",", $guolv);
    $ss4 = count($pc4);
    $f = 0;
    for (; $f < $ss4; ++$f) {
        if ($mv == 0) {
            $db1->query("update web_bl set rate=rate-" . $money . ",adddate='" . $utime . "' where class1='正特'  and   class3='" . $pc4[$f] . "'");
        } else {
            $db1->query("update web_bl set rate=rate+" . $money . ",adddate='" . $utime . "' where class1='正特'  and   class3='" . $pc4[$f] . "'");
        }
    }
}
$result = $db1->query("Select rate,class3,locked from web_bl where class1='正特' and class2='" . $ids . "' Order By ID  LIMIT 49");
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
<Script src="js/function.js" type="text/javascript"></script>
<Script src="js/rake_zt.js" type="text/javascript"></script>

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
                        <form name="form1" method="post" action="main.php?action=rake_zt&uid=<?= $uid ?>&act=edit&ids=<?= $ids ?>">
                            <tbody>
                                <tr>
                                    <td colspan="20" align="center" class="t_list_caption">
                                        <table width="100%" height="213" border="0" cellpadding="0" cellspacing="1" align="center" bordercolordark="#FFFFFF" class="m_tab_ed">
                                            <tbody>
                                                <tr>
                                                    <td height="20" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">号码</td>
                                                    <td align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">赔率/封号</td>
                                                    <td align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">赔率</td>
                                                    <td align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">下注总额</td>
                                                    <td height="20" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">号码</td>
                                                    <td align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">赔率/封号</td>
                                                    <td align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">赔率</td>
                                                    <td align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">下注总额</td>
                                                    <td height="20" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">号码</td>
                                                    <td align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">赔率/封号</td>
                                                    <td align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">赔率</td>
                                                    <td align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">下注总额</td>
                                                    <td height="20" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">号码</td>
                                                    <td align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption"><span class="STYLE6"> 赔率</span></td>
                                                    <td align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">赔率</td>
                                                    <td align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">下注总额</td>
                                                    <td height="20" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">号码</td>
                                                    <td align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">赔率/封号</td>
                                                    <td align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">赔率</td>
                                                    <td align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">下注总额</td>
                                                </tr>
                                                <? $I = 1;
                                                for (; $I <= 10; $I += 1) { ?>
                                                    <tr>
                                                        <td height="25" align="center" bgcolor="#FFFFFF">
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                <tr align="center" bordercolordark="#FFFFFF" class="m_tab_ed">
                                                                    <td width="25" height="25" align="center" bgcolor="#FFFFFF" class="No_<?= intval($I) ?>">&nbsp;</td>
                                                                    <? if ($I != 10) { ?>

                                                                    <? } ?>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td height="25" align="center" bgcolor="#FFFFFF">
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                <td>
                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                            <tr>
                                                                                <td><a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I ?>','bl<?= $I - 1 ?>','uid=<?= $uid ?>&class1=正特&ids=<?= $ids ?>&sqq=sqq&lxlx=1&qtqt=<?= get_rake_sj($ids) ?>&class3=<?= $showtable[$I - 1][1] ?>');">
                                                                                        <img src="images/add.png" width="19" height="17" border="0"></a></td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                    <td><input style="HEIGHT: 18px" class="za_text" maxlength="6" size="4" value="<?= $showtable[$I - 1][0] ?>" name="Num_ <?= $I ?>" /></td>
                                                                    <td>
                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                           
                                                                            <tr>
                                                                                <td><a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I ?>','bl<?= $I - 1 ?>','uid=<?= $uid ?>&class1=正特&ids=<?= $ids ?>&sqq=sqq&lxlx=0&qtqt=<?= get_rake_sj($ids) ?>&class3=<?= $showtable[$I - 1][1] ?>');">
                                                                                        <img src="images/sub.png" width="19" height="17" border="0"></a></td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                    <td><input type=checkbox id="lock<?= $I - 1 ?>" style="zoom:95%" title="关闭该项" onClick="UpdateRate('LOCK','lock<?= $I - 1 ?>','','uid=<?= $uid ?>&class1=正特&ids=<?= $ids ?>&sqq=sqq&class3=<?= $showtable[$I - 1][1] ?>&lock='+this.checked);" value="TRUE" <? if ($showtable[$I - 1][2] == 1) { ?> checked <? } ?>>
                                                                        </input>
                                                                    </td>
                                                                </tr>
                                                    </tr>
                                            </tbody>
                                        </table>
                                        <input name="class3_<?= $I ?>" value="<?= $showtable[$I - 1][1] ?>" type="hidden">
                                    </td>
                                    <td height="25" align="center" bgcolor="#FFFFFF"><span id="bl<?= $I - 1 ?>"><?= $showtable[$I - 1][0] ?></span></td>
                                    <td align="center" bgcolor="#FFFFFF"><span id="gold<?= $I - 1 ?>">0</span></td>
                                    <td height="25" align="center" bgcolor="#FFFFFF">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr align="center" bordercolordark="#FFFFFF" class="m_tab_ed">
                                                <td width="25" height="25" align="center" bgcolor="#FFFFFF" class="No_<?= intval($I + 10) ?>">&nbsp;</td>
                                                <? if ($I != 10) { ?>

                                                <? } ?>
                                            </tr>
                                        </table>
                                    </td>
                                    <td height="25" align="center" bgcolor="#FFFFFF">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                            <td>
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td><a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 10 ?>','bl<?= $I + 10 - 1 ?>','uid=<?= $uid ?>&class1=正特&ids=<?= $ids ?>&sqq=sqq&lxlx=1&qtqt=<?= get_rake_sj($ids) ?>&class3=<?= $showtable[$I + 10 - 1][1] ?>');"><img src="images/add.png" width="19" height="17" border="0"></a></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td><input style="HEIGHT: 18px" class="za_text" maxlength="6" size="4" value="<?= $showtable[$I + 10 - 1][0] ?>" name="Num_<?= $I + 10 ?>" /></td>
                                                <td>
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td><a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 10 ?>','bl<?= $I + 10 - 1 ?>','uid=<?= $uid ?>&class1=正特&ids=<?= $ids ?>&sqq=sqq&lxlx=0&qtqt=<?= get_rake_sj($ids) ?>&class3=<?= $showtable[$I + 10 - 1][1] ?>');"><img src="images/sub.png" width="19" height="17" border="0"></a></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td><input type=checkbox id=lock<?= $I + 10 - 1 ?> style="zoom:95%" title="关闭该项" onClick="UpdateRate('LOCK','lock<?= $I + 10 - 1 ?>','','uid=<?= $uid ?>&class1=正特&ids=<?= $ids ?>&sqq=sqq&class3=<?= $showtable[$I + 10 - 1][1] ?>&lock='+this.checked);" <? if ($showtable[$I + 10 - 1][2] == 1) { ?> checked <? } ?>></td>
                                            </tr>
                                        </table>
                                        <input name="class3_<?= $I + 10 ?>" value="<?= $showtable[$I + 10 - 1][1] ?>" type="hidden">
                                    </td>
                                    <td height="25" align="center" bgcolor="#FFFFFF"><span id="bl<?= $I + 10 - 1 ?>"><?= $showtable[$I + 10 - 1][0] ?></span></td>
                                    <td align="center" bgcolor="#FFFFFF"><span id="gold<?= $I + 10 - 1 ?>">0</span></td>
                                    <td height="25" align="center" bgcolor="#FFFFFF">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr align="center" bordercolordark="#FFFFFF" class="m_tab_ed">
                                                <td width="25" height="25" align="center" bgcolor="#FFFFFF" class="No_<?= intval($I + 20) ?>">&nbsp;</td>
                                                <? if ($I != 10) { ?>

                                                <? } ?>
                                            </tr>
                                        </table>
                                    </td>
                                    <td height="25" align="center" bgcolor="#FFFFFF">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                            <td>
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td>

                                                                <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 20 ?>','bl<?= $I + 20 - 1 ?>','uid=<?= $uid ?>&class1=正特&ids=<?= $ids ?>&sqq=sqq&lxlx=1&qtqt=<?= get_rake_sj($ids) ?>&class3=<?= $showtable[$I + 20 - 1][1] ?>');"><img src="images/add.png" width="19" height="17" border="0"></a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td><input style="HEIGHT: 18px" class="za_text" maxlength="6" size="4" value="<?= $showtable[$I + 20 - 1][0] ?>" name="Num_<?= $I + 20 ?>" /></td>
                                                <td>
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        
                                                        <tr>
                                                            <td>
                                                                <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 20 ?>','bl<?= $I + 20 - 1 ?>','uid=<?= $uid ?>&class1=正特&ids=<?= $ids ?>&sqq=sqq&lxlx=0&qtqt=<?= get_rake_sj($ids) ?>&class3=<?= $showtable[$I + 20 - 1][1] ?>');"><img src="images/sub.png" width="19" height="17" border="0"></a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td><input type=checkbox id="lock<?= $I + 20 - 1 ?>" style="zoom:95%" title="关闭该项" onClick="UpdateRate('LOCK','lock<?= $I + 20 - 1 ?>','','uid=<?= $uid ?>&class1=正特&ids=<?= $ids ?>&sqq=sqq&class3=<?= $showtable[$I + 20 - 1][1] ?>&lock='+this.checked);" <? if ($showtable[$I + 20 - 1][2] == 1) { ?> checked <? } ?>></td>
                                            </tr>
                                        </table>


                                        <input name="class3_<?= $I + 20 ?>" value="<?= $showtable[$I + 20 - 1][1] ?>" type="hidden" </td>
                                    <td height="25" align="center" bgcolor="#FFFFFF"><span id="bl<?= $I + 20 - 1 ?>"><?= $showtable[$I + 20 - 1][0] ?></span></td>
                                    <td align="center" bgcolor="#FFFFFF"><span id="gold<?= $I + 20 - 1 ?>">0</span></td>
                                    <td height="25" align="center" bgcolor="#FFFFFF">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr align="center" bordercolordark="#FFFFFF" class="m_tab_ed">
                                                <td width="25" height="25" align="center" bgcolor="#FFFFFF" class="No_<?= intval($I + 30) ?>">&nbsp;</td>
                                                <? if ($I != 10) { ?>

                                                <? } ?>
                                            </tr>
                                        </table>
                                    </td>
                                    <td height="25" align="center" bgcolor="#FFFFFF">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                            <td>
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td><a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 30 ?>','bl<?= $I + 30 - 1 ?>','uid=<?= $uid ?>&class1=正特&ids=<?= $ids ?>&sqq=sqq&lxlx=1&qtqt=<?= get_rake_sj($ids) ?>&class3=<?= $showtable[$I + 30 - 1][1] ?>');"><img src="images/add.png" width="19" height="17" border="0"></a></td>
                                                        </tr>
                                                       
                                                    </table>
                                                </td>
                                                <td><input style="HEIGHT: 18px" class="za_text" maxlength="6" size="4" value="<?= $showtable[$I + 30 - 1][0] ?>" name="Num_<?= $I + 30 ?>" /></td>
                                                <td>
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td><a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 30 ?>','bl<?= $I + 30 - 1 ?>','uid=<?= $uid ?>&class1=正特&ids=<?= $ids ?>&sqq=sqq&lxlx=0&qtqt=<?= get_rake_sj($ids) ?>&class3=<?= $showtable[$I + 30 - 1][1] ?>');"><img src="images/sub.png" width="19" height="17" border="0"></a></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td><input type=checkbox id="lock<?= $I + 30 - 1 ?>" style="zoom:95%" title="关闭该项" onClick="UpdateRate('LOCK','lock<?= $I + 30 - 1 ?>','','uid=<?= $uid ?>&class1=正特&ids=<?= $ids ?>&sqq=sqq&class3=<?= $showtable[$I + 30 - 1][1] ?>&lock='+this.checked);" <? if ($showtable[$I + 30 - 1][2] == 1) { ?> checked <? } ?>></td>
                                            </tr>
                                        </table>
                                        <input name="class3_<?= $I + 30 ?>" value="<?= $showtable[$I + 30 - 1][1] ?>" type="hidden">
                                    </td>
                                    <td height="25" align="center" bgcolor="#FFFFFF"><span id="bl<?= $I + 30 - 1 ?>"><?= $showtable[$I + 30 - 1][0] ?></span></td>
                                    <td align="center" bgcolor="#FFFFFF"><span id="gold<?= $I + 30 - 1 ?>">0</span></td>
                                    <? if ($I != 10) { ?>
                                        <td height="25" align="center" bgcolor="#FFFFFF">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr align="center" bordercolordark="#FFFFFF" class="m_tab_ed">
                                                    <td width="25" height="25" align="center" bgcolor="#FFFFFF" class="No_<?= intval($I + 40) ?>">&nbsp;</td>
                                                    <?
                                                        if ($I != 10) { ?>

                                                    <? } ?>
                                                </tr>
                                            </table>
                                        </td>
                                        <td height="25" align="center" bgcolor="#FFFFFF">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                <td>
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td><a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 40 ?>','bl<?= $I + 39 ?>','uid=<?= $uid ?>&class1=正特&ids=<?= $ids ?>&sqq=sqq&lxlx=1&qtqt=<?= get_rake_sj($ids) ?>&class3=<?= $showtable[$I + 40 - 1][1] ?>');"><img src="images/add.png" width="19" height="17" border="0"></a></td>
                                                            </tr>
                                                           
                                                        </table>
                                                    </td>
                                                    <td><input style="HEIGHT: 18px" class="za_text" maxlength="6" size="4" value="<?= $showtable[$I + 40 - 1][0] ?>" name="Num_<?= $I + 40 ?>" /></td>
                                                    <td>
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td>
                                                                    <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 40 ?>','bl<?= $I + 39 ?>','uid=<?= $uid ?>&class1=正特&ids=<?= $ids ?>&sqq=sqq&lxlx=0&qtqt=<?= get_rake_sj($ids) ?>&class3=<?= $showtable[$I + 40 - 1][1] ?>');"><img src="images/sub.png" width="19" height="17" border="0"></a>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td><input type=checkbox id="lock<?= $I + 40 - 1 ?>" style="zoom:95%" title="关闭该项" onClick="UpdateRate('LOCK','lock<?= $I + 40 - 1 ?>','','uid=<?= $uid ?>&class1=正特&ids=<?= $ids ?>&sqq=sqq&class3=<?= $showtable[$I + 40 - 1][1] ?>&lock='+this.checked);" <? if ($showtable[$I + 40 - 1][2] == 1) { ?> checked <? } ?>></td>
                                                </tr>
                                            </table>
                                            <input name="class3_<?= $I + 40 ?>" value="<?= $showtable[$I + 40 - 1][1] ?>" type="hidden">
                                        </td>

                                        <td height="25" align="center" bgcolor="#FFFFFF"><span id="bl<?= $I + 40 - 1 ?>"><?= $showtable[$I + 40 - 1][0] ?></span></td>
                                        <td align="center" bgcolor="#FFFFFF">

                                            <span id="gold<?= $I + 40 - 1 ?>">0</span>
                                        </td>
                                    <? } else { ?>
                                        <td height="25" colspan="4" align="center" bgcolor="#FFFFFF">
                                            <table border="0" align="center" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="88" align="center"><input class="btn1" type="submit" name="Submit2" value="提交" /></td>
                                                    <td width="88" align="center"><input class="btn2" type="reset" name="Submit3" value="重置" /></td>
                                                </tr>
                                            </table>
                                        </td>

                                    <? } ?>
                                </tr>
                            <? }

                                                $I = 1;
                                                for (; $I <= 2; $I += 1) { ?>

                            <? } ?>
                        </form>
                    </table>
                    <table width="100%" height="98" border="0" cellpadding="0" cellspacing="1" align="center" bordercolordark="#FFFFFF" class="t_list">
                        <form action="main.php?action=rake_zt&uid=<?= $uid ?>&savew=savew&ids=<?= $ids ?>" name="form21" method="post">
                            <tr align="middle" bgcolor="E6E7E8">
                                <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(1) ?>">鼠</td>
                                <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(2) ?>">牛 </td>
                                <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(3) ?>">虎 </td>
                                <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(4) ?>">兔 </td>
                                <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(5) ?>">龙 </td>
                                <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(6) ?>">蛇 </td>
                                <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(7) ?>">马 </td>
                                <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(8) ?>">羊 </td>
                                <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(9) ?>">猴 </td>
                                <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(10) ?>">鸡 </td>
                                <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(11) ?>">狗 </td>
                                <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(12) ?>">猪 </td>
                                <td align="left" nowrap bgcolor="#FFFFFF">&nbsp;</td>
                                <td align="left" nowrap bgcolor="#FFFFFF">&nbsp;</td>
                                <td align="left" nowrap bgcolor="#FFFFFF">&nbsp;</td>
                            </tr>
                            <tr align="middle" bgcolor="E6E7E8">
                                <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(13) ?>"><span class="STYLE1">红单</span></td>
                                <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(14) ?>"><span class="STYLE1">红双</span></td>
                                <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(15) ?>"><span class="STYLE1">红大</span></td>
                                <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(16) ?>"><span class="STYLE1">红小</span></td>
                                <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(21) ?>"><span class="STYLE2">蓝单</span></td>
                                <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(22) ?>"><span class="STYLE2">蓝双</span></td>
                                <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(23) ?>"><span class="STYLE2">蓝大</span></td>
                                <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(24) ?>"><span class="STYLE2">蓝小</span></td>
                                <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(17) ?>,49"><span class="STYLE3">绿单</span></td>
                                <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(18) ?>"><span class="STYLE3">绿双</span></td>
                                <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(19) ?>,49"><span class="STYLE3">绿大</span></td>
                                <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(20) ?>"><span class="STYLE3">绿小</span></td>
                                <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(16) ?>" ,"<?= get_sx_m_number(15) ?>"><span class="STYLE1">红波</span></td>
                                <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(24) ?>" ,"<?= get_sx_m_number(23) ?>"><span class="STYLE2">蓝波</span></td>
                                <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(20) ?>" ,";<?= get_sx_m_number(19) ?>,49"><span class="STYLE3">绿波</span></td>
                            </tr>
                            <tr align="middle" bgcolor="E6E7E8">
                                <td align="left" nowrap bgcolor="#FFFFFF">
                                    <input name="mf[]" type="checkbox" id="mf[]" value="1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49">单号
                                </td>
                                <td align="left" nowrap bgcolor="#FFFFFF">
                                    <input name="mf[]" type="checkbox" id="mf[]" value="2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48">双号
                                </td>
                                <td align="left" nowrap bgcolor="#FFFFFF">

                                    <input name="mf[]" type="checkbox" id="mf[]" value="25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49">大号
                                </td>
                                <td align="left" nowrap bgcolor="#FFFFFF">
                                    <input name="mf[]" type="checkbox" id="mf[]" value="1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24">小号
                                </td>
                                <td align="left" nowrap bgcolor="#FFFFFF">
                                    <input name="mf[]" type="checkbox" id="mf[]" value="1,3,5,7,9,10,12,14,16,18,21,23,25,27,29,30,32,34,36,38,41,43,45,47,49">合单
                                </td>
                                <td align="left" nowrap bgcolor="#FFFFFF">
                                    <input name="mf[]" type="checkbox" id="mf[]" value="2,4,6,8,11,13,15,17,19,20,22,24,26,28,31,33,35,37,39,40,42,44,46,48">合双
                                </td>
                                <td align="left" nowrap bgcolor="#FFFFFF">&nbsp;</td>
                                <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="1,2,3,4,5,6,7,8,9">0头</td>
                                <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="10,11,12,13,14,15,16,17,18,19">1头</td>
                                <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="20,21,22,23,24,25,26,27,28,29">2头</td>
                                <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="30,31,32,33,34,35,36,37,38,39">3头</td>
                                <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="40,41,42,43,44,45,46,47,48,49">4头</td>
                                <td align="left" nowrap bgcolor="#FFFFFF">&nbsp;</td>
                                <td align="left" nowrap bgcolor="#FFFFFF">&nbsp;</td>
                                <td align="left" nowrap bgcolor="#FFFFFF">&nbsp;</td>
                            </tr>
                            <tr align="middle" bgcolor="E6E7E8">
                                <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="10,20,30,40">0尾</td>
                                <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="1,11,21,31,41">1尾</td>
                                <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="2,12,22,32,42">2尾</td>
                                <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="3,13,23,33,43">3尾</td>
                                <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="4,14,24,34,44">4尾</td>
                                <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="5,15,25,35,45">5尾</td>
                                <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="6,16,26,36,46">6尾</td>
                                <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="7,17,27,37,47">7尾</td>
                                <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="8,18,28,38,48">8尾</td>
                                <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="9,19,29,39,49">9尾</td>
                                <td align="left" nowrap bgcolor="#FFFFFF">&nbsp;</td>
                                <td colspan="4" align="left" nowrap bgcolor="#FFFFFF">
                                    <table border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td>减</td>
                                            <td><input name="mv" type="radio" value="0" checked></td>
                                            <td><INPUT name=money class="za_text" value="0.5" size=4></td>
                                            <td><input type="radio" name="mv" value="1"></td>
                                            <td>加</td>
                                            <td>&nbsp;<INPUT class="btn4" name="button2" type=submit value=送出></td>
                                            <td>&nbsp;<INPUT class="btn4" type=reset value="取消" name="reset"></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </form>
                    </table>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="t_list" bgcolor="#FFFFFF">
                        <form action="main.php?action=rake_zt&uid=<?= $uid ?>&save=save&ids=<?= $ids ?>" name="form21" method="post">
                            <tr>
                                <td nowrap bgcolor="#FFFFFF" height="25" align="center">
                                    <span class="STYLE1">统一修改：</span>
                                    <input type="radio" name="dx" value="单">单
                                    <input type="radio" name="dx" value="双">双
                                    <input type="radio" name="dx" value="大">大
                                    <input type="radio" name="dx" value="小">小
                                    <input type="radio" name="dx" value="红波">红波
                                    <input type="radio" name="dx" value="绿波">绿波
                                    <input type="radio" name="dx" value="蓝波">蓝波
                                    <input name="dx" type="radio" value="全部" checked>全部
                                    <span class="STYLE1">赔率</span>
                                    <input name="bl" class="za_text" id="bl" style="HEIGHT: 18px" value="0" size="6" />
                                    <input class="btn2" type="submit" name="Submit22" value="统一修改" />
                                </td>
                            </tr>
                        </form>
                    </table>

                    <SCRIPT language=javascript>
                        makeRequest('main.php?action=server&uid=<?= $uid ?>&class1=正特&class2=<?= $ids ?>')
                    </script>
</body>