<?php

function get_rake_sj($i)
{
    global $rake_sj_temp;
    $rake_sj = 0.01;
    $rake_sj = $rake_sj_temp['自选不中'];
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
    $ids = "五不中";
}
if ($ids != "五不中" && $ids != "六不中" && $ids != "七不中" && $ids != "八不中" && $ids != "九不中" && $ids != "十不中" && $ids != "十一不中" && $ids != "十二不中") {
    $ids = "五不中";
}
if ($_GET['act'] == "edit") {
    $tt = 1;
    for (; $tt <= 49; ++$tt) {
        if (empty($_POST["Num_" . $tt])) {
            echo "<script>alert('赔率不能为空:" . $_POST["Num_" . $tt] . "/" . $tt . "!');window.location.href='main.php?action=rake_bz&uid={$uid}&ids=" . $ids . "';</script>";
            exit;
        }
    }
    $tt = 1;
    for (; $tt <= 49; ++$tt) {
        $num = $_POST["Num_" . $tt];
        $class3 = $_POST["class3_" . $tt];
        $db1->query("update web_bl  set rate=" . $num . ",adddate='" . $utime . "' where class1='自选不中'  and  class2='" . $ids . "' and  class3='" . $class3 . "'");
    }
    echo "<script>alert('修改成功!');window.location.href='main.php?action=rake_bz&uid={$uid}&ids=" . $ids . "';</script>";
    exit;
}
$result = $db1->query("Select rate,class3,locked from web_bl where class1='自选不中' and class2='" . $ids . "' Order By ID  LIMIT 49");
$showtable = array();
$y = 0;
while ($Image = $result->fetch_array()) {
    ++$y;
    array_push($showtable, $Image);
}
$drop_count = $y - 1;
$result = $db1->query("SELECT ds,rake_sj FROM web_config_ds WHERE class='不中' Order By ID");
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
<script src="js/rake_bz.js" type="text/javascript"></script>
<script language=JAVASCRIPT>
    function quick0() {
        var mm = $("money").value;
        for (var i = 1; i < 50; i++) {
            $("Num_" + i).value = mm;
        }
    }
</script>

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
                        <form name="form1" method="post" action="main.php?action=rake_bz&uid=<?= $uid ?>&act=edit&ids=<?= $ids ?>">
                            <tbody>
                                <tr>
                                    <td colspan="20" align="center" class="t_list_caption">
                                        <table width="100%" height="213" border="0" cellpadding="0" cellspacing="1" align="center" bordercolordark="#FFFFFF" class="m_tab_ed">
                                            <tbody>
                                                <tr>
                                                    <td width="4%" height="16" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">号码</td>
                                                    <td width="4%" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">赔率/封号</td>
                                                    <td width="4%" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">赔率</td>
                                                    <td width="4%" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">下注总额</td>
                                                    <td width="4%" height="16" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">号码</td>
                                                    <td width="4%" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">赔率/封号</td>
                                                    <td width="4%" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">赔率</td>
                                                    <td width="4%" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">下注总额</td>
                                                    <td width="4%" height="16" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">号码</td>
                                                    <td width="4%" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">赔率/封号</td>
                                                    <td width="4%" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">赔率</td>
                                                    <td width="4%" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">下注总额</td>
                                                    <td width="4%" height="16" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">号码</td>
                                                    <td width="4%" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">
                                                        <span class="STYLE6"> 赔率</span>
                                                    </td>
                                                    <td width="4%" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">赔率</td>
                                                    <td width="4%" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">下注总额</td>
                                                    <td width="4%" height="16" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">号码</td>
                                                    <td width="4%" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">赔率/封号</td>
                                                    <td width="4%" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">赔率</td>
                                                    <td width="4%" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">下注总额</td>
                                                </tr>
                                                <? $I = 1;
                                                for ($showtable; $I <= 10; $I += 1) { ?>

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
                                                                                <td><a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I ?>','bl<?= $I - 1 ?>','uid=<?= $uid ?>&class1=自选不中&ids=<?= $ids ?>&sqq=sqq&lxlx=1&qtqt=<?= get_rake_sj($ids) ?>&class3=<?= $showtable[$I - 1][1] ?>');"><img src="images/add.png" width="19" height="17" border="0"></a></td>
                                                                            </tr>

                                                                        </table>
                                                                    </td>
                                                                    <td><input style="HEIGHT: 18px" class="za_text" maxlength="6" size="4" value=" <?= $showtable[$I - 1][0] ?>" name="Num_<?= $I ?>" /></td>

                                                                    <td>
                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">

                                                                            <tr>

                                                                                <td><a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I ?>','bl<?= $I - 1 ?>','uid=<?= $uid ?>&class1=自选不中&ids=<?= $ids ?>&sqq=sqq&lxlx=0&qtqt=<?= get_rake_sj($ids) ?>&class3=<?= $showtable[$I - 1][1] ?>');"><img src="images/sub.png" width="19" height="17" border="0"></a></td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>



                                                                    <td><input type=checkbox id="lock<?= $I - 1 ?>" style="zoom:95%" title="关闭该项" onClick="UpdateRate('LOCK','lock<?= $I - 1 ?>','','uid=<?= $uid ?>&class1=自选不中&ids=<?= $ids ?>&sqq=sqq&class3=<?= $showtable[$I - 1][1] ?>&lock='+this.checked);" value="TRUE" <? if ($showtable[$I - 1][2] == 1) { ?> checked <? } ?>></input></td>
                                                                </tr>
                                                            </table>

                                                            <input name="class3_ <?= $I ?>" value="<?= $showtable[$I - 1][1] ?>" type="hidden">
                                                        </td>
                                                        <td height="25" align="center" bgcolor="#FFFFFF">
                                                            <span id="bl<?= $I - 1 ?>"><?= $showtable[$I - 1][0] ?></span>
                                                        </td>
                                                        <td width="4%" align="center" bgcolor="#FFFFFF"><span id="gold<?= $I - 1 ?>">0</span>
                                                        </td>
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
                                                                                <td><a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 10 ?>','bl<?= $I + 10 - 1 ?>','uid=<?= $uid ?>&class1=自选不中&ids=<?= $ids ?>&sqq=sqq&lxlx=1&qtqt=<?= get_rake_sj($ids) ?>&class3=<?= $showtable[$I + 10 - 1][1] ?>');"><img src="images/add.png" width="19" height="17" border="0"></a></td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                    <td><input style="HEIGHT: 18px" class="za_text" maxlength="6" size="4" value="<?= $showtable[$I + 10 - 1][0] ?>" name="Num_<?= $I + 10 ?>" /></td>

                                                                    <td>
                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">

                                                                            <tr>


                                                                                <td><a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 10 ?>','bl<?= $I + 10 - 1 ?>','uid=<?= $uid ?>&class1=自选不中&ids=<?= $ids ?>&sqq=sqq&lxlx=0&qtqt=<?= get_rake_sj($ids) ?>&class3=<?= $showtable[$I + 10 - 1][1] ?>');"><img src="images/sub.png" width="19" height="17" border="0"></a></td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>


                                                                    <td><input type=checkbox id="lock<?= $I + 10 - 1 ?>" style=" zoom:95%" title="关闭该项" onClick="UpdateRate('LOCK','lock<?= $I + 10 - 1 ?>','','uid=<?= $uid ?>&class1=自选不中&ids=<?= $ids ?>&sqq=sqq&class3=<?= $showtable[$I + 10 - 1][1] ?>&lock='+this.checked);" <? if ($showtable[$I + 10 - 1][2] == 1) { ?> checked <? } ?>></td>
                                                                </tr>
                                                            </table>

                                                            <input name="class3_<?= $I + 10 ?>" value="<?= $showtable[$I + 10 - 1][1] ?>" type="hidden">
                                                        </td>

                                                        <td height="25" align="center" bgcolor="#FFFFFF"><span id="bl<?= $I + 10 - 1 ?>"><?= $showtable[$I + 10 - 1][0] ?></span>
                                                        </td>

                                                        <td width="4%" align="center" bgcolor="#FFFFFF">
                                                            <span id="gold<?= $I + 10 - 1 ?>">0</span>
                                                        </td>

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
                                                                                <td><a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 20 ?>','bl<?= $I + 20 - 1 ?>','uid=<?= $uid ?>&class1=自选不中&ids=<?= $ids ?>&sqq=sqq&lxlx=1&qtqt=<?= get_rake_sj($ids) ?>&class3=<?= $showtable[$I + 20 - 1][1] ?>');"><img src="images/add.png" width="19" height="17" border="0"></a></td>
                                                                            </tr>

                                                                        </table>
                                                                    </td>
                                                                    <td><input style="HEIGHT: 18px" class="za_text" maxlength="6" size="4" value="<?= $showtable[$I + 20 - 1][0] ?>" name="Num_<?= $I + 20 ?>" /></td>
                                                                    <td>
                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">

                                                                            <tr>
                                                                                <td><a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 20 ?>','bl<?= $I + 20 - 1 ?>','uid=<?= $uid ?>&class1=自选不中&ids=<?= $ids ?>&sqq=sqq&lxlx=0&qtqt=<?= get_rake_sj($ids) ?>&class3=<?= $showtable[$I + 20 - 1][1] ?>');"><img src="images/sub.png" width="19" height="17" border="0"></a></td>

                                                                            </tr>
                                                                        </table>
                                                                    </td>

                                                                    <td><input type=checkbox id="lock<?= $I + 20 - 1 ?>" style="zoom:95%" title="关闭该项" onClick="UpdateRate('LOCK','lock<?= $I + 20 - 1 ?>','','uid=<?= $uid ?>&class1=自选不中&ids=<?= $ids ?>&sqq=sqq&class3=<?= $showtable[$I + 20 - 1][1] ?>&lock='+this.checked);" <? if ($showtable[$I + 20 - 1][2] == 1) { ?> checked <? } ?>></td>
                                                                </tr>
                                                            </table>

                                                            <input name="class3_<?= $I + 20 ?>" value="<?= $showtable[$I + 20 - 1][1] ?>" type="hidden">
                                                        </td>
                                                        <td height="25" align="center" bgcolor="#FFFFFF">
                                                            <span id="bl<?= $I + 20 - 1 ?>"><?= $showtable[$I + 20 - 1][0] ?> </span>
                                                        </td>


                                                        <td width="4%" align="center" bgcolor="#FFFFFF">
                                                            <span id="gold<?= $I + 20 - 1 ?>">0</span>
                                                        </td>


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
                                                                                <td><a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 30 ?>','bl<?= $I + 30 - 1 ?>','uid=<?= $uid ?>&class1=自选不中&ids=<?= $ids ?>&sqq=sqq&lxlx=1&qtqt=<?= get_rake_sj($ids) ?>&class3=<?= $showtable[$I + 30 - 1][1] ?>');"><img src="images/add.png" width="19" height="17" border="0"></a></td>
                                                                            </tr>

                                                                        </table>
                                                                    </td>
                                                                    <td><input style="HEIGHT: 18px" class="za_text" maxlength="6" size="4" value="<?= $showtable[$I + 30 - 1][0] ?>" name="Num_<?= $I + 30 ?>" /></td>

                                                                    <td>
                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">

                                                                            <tr>
                                                                                <td><a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 30 ?>','bl<?= $I + 30 - 1 ?>','uid=<?= $uid ?>&class1=自选不中&ids=<?= $ids ?>&sqq=sqq&lxlx=0&qtqt=<?= get_rake_sj($ids) ?>&class3=<?= $showtable[$I + 30 - 1][1] ?>');"><img src="images/sub.png" width="19" height="17" border="0"></a></td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                    <td><input type=checkbox id="lock<?= $I + 30 - 1 ?>" style="zoom:95%" title="关闭该项" onClick="UpdateRate('LOCK','lock<?= $I + 30 - 1 ?>','','uid=<?= $uid ?>&class1=自选不中&ids=<?= $ids ?>&sqq=sqq&class3=<?= $showtable[$I + 30 - 1][1] ?>&lock='+this.checked);" <? if ($showtable[$I + 30 - 1][2] == 1) { ?> checked <? } ?>>
                                                                    </td>
                                                                </tr>
                                                            </table>


                                                            <input name="class3_<?= $I + 30 ?>" value="<?= $showtable[$I + 30 - 1][1] ?>" type="hidden">
                                                        </td>

                                                        <td height="25" align="center" bgcolor="#FFFFFF">
                                                            <span id="bl<?= $I + 30 - 1 ?>"> <?= $showtable[$I + 30 - 1][0] ?>
                                                            </span>
                                                        </td>
                                                        <td width="4%" align="center" bgcolor="#FFFFFF">
                                                            <span id="gold<?= $I + 30 - 1 ?>">0</span>
                                                        </td>
                                                        <? if ($I != 10) { ?>
                                                            <td height="25" align="center" bgcolor="#FFFFFF">
                                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                    <tr align="center" bordercolordark="#FFFFFF" class="m_tab_ed">
                                                                        <td width="25" height="25" align="center" bgcolor="#FFFFFF" class="No_<?= intval($I + 40) ?>">&nbsp;</td>
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
                                                                                    <td><a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 40 ?>','bl<?= $I + 39 ?>','uid=<?= $uid ?>&class1=自选不中&ids=<?= $ids ?>&sqq=sqq&lxlx=1&qtqt=<?= get_rake_sj($ids) ?>&class3=<?= $showtable[$I + 40 - 1][1] ?>');"><img src="images/add.png" width="19" height="17" border="0"></a>
                                                                                    </td>
                                                                                </tr>

                                                                            </table>
                                                                        </td>
                                                                        <td><input style="HEIGHT: 18px" class="za_text" maxlength="6" size="4" value="<?= $showtable[$I + 40 - 1][0] ?>" name="Num_<?= $I + 40 ?>" /></td>
                                                                        <td>


                                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">

                                                                                <tr>
                                                                                    <td><a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 40 ?>','bl<?= $I + 39 ?>','uid=<?= $uid ?>&class1=自选不中&ids=<?= $ids ?>&sqq=sqq&lxlx=0&qtqt=<?= get_rake_sj($ids) ?>&class3=<?= $showtable[$I + 40 - 1][1] ?>');"><img src="images/sub.png" width="19" height="17" border="0"></a></td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>

                                                                        <td><input type=checkbox id=lock <?= $I + 40 - 1 ?>style="zoom:95%" title="关闭该项" onClick="UpdateRate('LOCK','lock<?= $I + 40 - 1 ?>','','uid=<?= $uid ?>&class1=自选不中&ids=<?= $ids ?>&sqq=sqq&class3=<?= $showtable[$I + 40 - 1][1] ?>&lock='+this.checked);" <? if ($showtable[$I + 40 - 1][2] == 1) { ?> checked <? } ?>>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <input name="class3_<?= $I + 40 ?>" value="<?= $showtable[$I + 40 - 1][1] ?>" type="hidden">
                                                            </td>

                                                            <td height="25" align="center" bgcolor="#FFFFFF">
                                                                <span id="bl<?= $I + 40 - 1 ?>"><?= $showtable[$I + 40 - 1][0] ?> </span>
                                                            </td>
                                                            <td width="4%" align="center" bgcolor="#FFFFFF">
                                                                <span id="gold<?= $I + 40 - 1 ?>">0</span>
                                                            </td>
                                                        <? } else { ?>
                                                            <td height="25" colspan="4" align="center" bgcolor="#FFFFFF">
                                                                <table border="0" align="center" cellpadding="0" cellspacing="0">
                                                                    <tr>
                                                                        <td width="88" align="center"><input type="submit" class="btn1" name="Submit2" value="提交" /></td>
                                                                        <td width="88" align="center"><input type="reset" class="btn2" name="Submit3" value="重置" /></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        <? } ?>
                                                    </tr>
                                                <? } ?>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </form>
                    </table>
                    <table width="100%" height="33" border="0" cellpadding="0" cellspacing="0" class="m_tab_ed">
                        <tr>
                            <td align="center" bgcolor="#FFFFFF">此类玩法下注总额仅供操盘参考&nbsp;&nbsp;&nbsp;&nbsp;
                                <font color="ff0000">统一修改</font>
                                <input class="za_text" size="6" name="money" />&nbsp;
                                <input class="btn4" name="button2" type="button" onClick="quick0()" value="转送" />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>

    <SCRIPT language=javascript>
        makeRequest('main.php?action=server&uid=<?= $uid ?>&class1=自选不中&class2=<?= $ids ?>')
    </script>
</body>