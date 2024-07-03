<?php

function get_rake_sj($i)
{
    global $rake_sj_temp;
    $rake_sj = 0.01;
    switch ($i) {
        case "特A":
            $rake_sj = $rake_sj_temp['特A'];
            break;
        case "特B":
            $rake_sj = $rake_sj_temp['特B'];
            break;
        case "特单":
            $rake_sj = $rake_sj_temp['特码单双'];
            break;
        case "特双":
            $rake_sj = $rake_sj_temp['特码单双'];
            break;
        case "特大":
            $rake_sj = $rake_sj_temp['特码大小'];
            break;
        case "特小":
            $rake_sj = $rake_sj_temp['特码大小'];
            break;
        case "合单":
            $rake_sj = $rake_sj_temp['特码合数单双'];
            break;
        case "合双":
            $rake_sj = $rake_sj_temp['特码合数单双'];
            break;
        case "合大":
            $rake_sj = $rake_sj_temp['特码合数大小'];
            break;
        case "合小":
            $rake_sj = $rake_sj_temp['特码合数大小'];
            break;
        case "尾大":
            $rake_sj = $rake_sj_temp['特码尾大尾小'];
            break;
        case "尾小":
            $rake_sj = $rake_sj_temp['特码尾大尾小'];
            break;
        case "家禽":
            $rake_sj = $rake_sj_temp['特码家禽野兽'];
            break;
        case "野兽":
            $rake_sj = $rake_sj_temp['特码家禽野兽'];
            break;
        case "红波":
            $rake_sj = $rake_sj_temp['特码色波'];
            break;
        case "绿波":
            $rake_sj = $rake_sj_temp['特码色波'];
            break;
        case "蓝波":
            $rake_sj = $rake_sj_temp['特码色波'];
            break;
        default:
            $rake_sj = $rake_sj_temp['特A'];
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
    exit;
}
if ($_GET['fen'] == "fen") {
    $locked = $_GET['fid'];
    $db1->query("update web_bl set locked=" . $locked . ",adddate='" . $utime . "' where class1='特码' ");
}
if ($_GET['ids'] != "") {
    $ids = $_GET['ids'];
} else {
    $ids = "特A";
}
$abblc = get_config("tm");
if ($_GET['save'] == "save") {
    if (empty($_POST['bl'])) {
        echo "<script>alert('赔率不能为空!'); window.location.href = 'main.php?action=rake_tm&uid={$uid}&ids=" . $ids . "';</script>";
        exit;
    }
    $tt = 1;
    for (; $tt <= 49; ++$tt) {
        $num = $_POST['bl'] + $abblc;
        $num1 = $_POST['bl'] - $abblc;
        if ($_POST['dx'] == "全部") {
            if ($ids == "特A") {
                $db1->query("update web_bl set rate=" . $_POST['bl'] . ",adddate='" . $utime . "' where class2='" . $ids . "' and  class3='" . $tt . "'");
                $db1->query("update web_bl set rate=" . $num . ",blrate=" . $num . ",adddate='" . $utime . "' where class2='特B' and  class3='" . $tt . "'");
            } else {
                $db1->query("update web_bl set rate=" . $_POST['bl'] . ",adddate='" . $utime . "' where class2='" . $ids . "' and  class3='" . $tt . "'");
                $db1->query("update web_bl set rate=" . $num1 . ",adddate='" . $utime . "' where class2='特A' and  class3='" . $tt . "'");
            }
        }
        if ($_POST['dx'] == "单" && $tt % 2 == 1) {
            if ($ids == "特A") {
                $db1->query("update web_bl set rate=" . $_POST['bl'] . ",adddate='" . $utime . "' where class2='" . $ids . "' and  class3='" . $tt . "'");
                $db1->query("update web_bl set rate=" . $num . ",adddate='" . $utime . "' where class2='特B' and  class3='" . $tt . "'");
            } else {
                $db1->query("update web_bl set rate=" . $_POST['bl'] . ",adddate='" . $utime . "' where class2='" . $ids . "' and  class3='" . $tt . "'");
                $db1->query("update web_bl set rate=" . $num1 . ",adddate='" . $utime . "' where class2='特A' and  class3='" . $tt . "'");
            }
        }
        if ($_POST['dx'] == "双" && $tt % 2 == 0) {
            if ($ids == "特A") {
                $db1->query("update web_bl set rate=" . $_POST['bl'] . "adddate='" . $utime . "' where class2='" . $ids . "' and  class3='" . $tt . "'");
                $db1->query("update web_bl set rate=" . $num . ",adddate='" . $utime . "' where class2='特B' and  class3='" . $tt . "'");
            } else {
                $db1->query("update web_bl set rate=" . $_POST['bl'] . ",adddate='" . $utime . "' where class2='" . $ids . "' and  class3='" . $tt . "'");
                $db1->query("update web_bl set rate=" . $num1 . ",adddate='" . $utime . "' where class2='特A' and  class3='" . $tt . "'");
            }
        }
        if ($_POST['dx'] == "大" && 25 <= $tt) {
            if ($ids == "特A") {
                $db1->query("update web_bl set rate=" . $_POST['bl'] . ",adddate='" . $utime . "' where class2='" . $ids . "' and  class3='" . $tt . "'");
                $db1->query("update web_bl set rate=" . $num . ",adddate='" . $utime . "' where class2='特B' and  class3='" . $tt . "'");
            } else {
                $db1->query("update web_bl set rate=" . $_POST['bl'] . ",adddate='" . $utime . "' where class2='" . $ids . "' and  class3='" . $tt . "'");
                $db1->query("update web_bl set rate=" . $num1 . ",adddate='" . $utime . "' where class2='特A' and  class3='" . $tt . "'");
            }
        }
        if ($_POST['dx'] == "小" && $tt <= 24) {
            if ($ids == "特A") {
                $db1->query("update web_bl set rate=" . $_POST['bl'] . ",adddate='" . $utime . "' where class2='" . $ids . "' and  class3='" . $tt . "'");
                $db1->query("update web_bl set rate=" . $num . ",adddate='" . $utime . "' where class2='特B' and  class3='" . $tt . "'");
            } else {
                $db1->query("update web_bl set rate=" . $_POST['bl'] . ",adddate='" . $utime . "' where class2='" . $ids . "' and  class3='" . $tt . "'");
                $db1->query("update web_bl set rate=" . $num1 . ",adddate='" . $utime . "' where class2='特A' and  class3='" . $tt . "'");
            }
        }
        if ($_POST['dx'] == "红波" && get_bs_color($tt) == "r") {
            if ($ids == "特A") {
                $db1->query("update web_bl set rate=" . $_POST['bl'] . ",adddate='" . $utime . "' where class2='" . $ids . "' and  class3='" . $tt . "'");
                $db1->query("update web_bl set rate=" . $num . ",adddate='" . $utime . "' where class2='特B' and  class3='" . $tt . "'");
            } else {
                $db1->query("update web_bl set rate=" . $_POST['bl'] . ",adddate='" . $utime . "' where class2='" . $ids . "' and  class3='" . $tt . "'");
                $db1->query("update web_bl set rate=" . $num1 . ",adddate='" . $utime . "' where class2='特A' and  class3='" . $tt . "'");
            }
        }
        if ($_POST['dx'] == "蓝波" && get_bs_color($tt) == "b") {
            if ($ids == "特A") {
                $db1->query("update web_bl set rate=" . $_POST['bl'] . ",adddate='" . $utime . "' where class2='" . $ids . "' and  class3='" . $tt . "'");
                $db1->query("update web_bl set rate=" . $num . ",adddate='" . $utime . "' where class2='特B' and  class3='" . $tt . "'");
            } else {
                $db1->query("update web_bl set rate=" . $_POST['bl'] . ",adddate='" . $utime . "' where class2='" . $ids . "' and  class3='" . $tt . "'");
                $db1->query("update web_bl set rate=" . $num1 . ",adddate='" . $utime . "' where class2='特A' and  class3='" . $tt . "'");
            }
        }
        if (!($_POST['dx'] == "绿波") && !(get_bs_color($tt) == "g")) {
            if ($ids == "特A") {
                $db1->query("update web_bl set rate=" . $_POST['bl'] . ",adddate='" . $utime . "' where class2='" . $ids . "' and  class3='" . $tt . "'");
                $db1->query("update web_bl set rate=" . $num . ",adddate='" . $utime . "' where class2='特B' and  class3='" . $tt . "'");
            } else {
                $db1->query("update web_bl set rate=" . $_POST['bl'] . ",adddate='" . $utime . "' where class2='" . $ids . "' and  class3='" . $tt . "'");
                $db1->query("update web_bl set rate=" . $num1 . ",adddate='" . $utime . "' where class2='特A' and  class3='" . $tt . "'");
            }
        }
    }
}
if ($_GET['act'] == "edit") {
    $tt = 1;
    for (; $tt <= 62; ++$tt) {
        if (empty($_POST["Num_" . $tt])) {
            echo "<script>alert('赔率不能为空:" . $_POST["Num_" . $tt] . "/" . $tt . "!');window.location.href='main.php?action=rake_tm&uid={$uid}&ids=" . $ids . "';</script>";
            exit;
        }
    }
    $tt = 1;
    for (; $tt <= 62; ++$tt) {
        $num = $_POST["Num_" . $tt];
        $num1 = $num + $abblc;
        $num2 = $num - $abblc;
        $class3 = $_POST["class3_" . $tt];
        $db1->query("update web_bl  set rate=" . $num . ",adddate='" . $utime . "' where class2='" . $ids . "' and  class3='" . $class3 . "'");
        if ($ids == "特A") {
            if ($tt <= 49) {
                $db1->query("update web_bl set rate=" . $num1 . ",adddate='" . $utime . "' where class2='特B' and  class3='" . $_POST["class3_" . $tt] . "'");
            } else {
                $db1->query("update web_bl set rate=" . $num . ",adddate='" . $utime . "' where class2='特码' and  class3='" . $_POST["class3_" . $tt] . "'");
            }
        } else {
            if ($tt <= 49) {
                $db1->query("update web_bl set rate=" . $num2 . ",adddate='" . $utime . "' where class2='特A' and  class3='" . $_POST["class3_" . $tt] . "'");
            } else {
                $db1->query("update web_bl set rate=" . $num . ",adddate='" . $utime . "' where class2='特码' and  class3='" . $_POST["class3_" . $tt] . "'");
            }
        }
    }
    echo "<script>alert('修改成功!');window.location.href='main.php?action=rake_tm&uid={$uid}&ids=" . $ids . "';</script>";
    exit;
}
if ($_GET['savew'] == "savew") {
    if (empty($_POST['mf'])) {
        echo "<script>alert('请选择项目!'); window.location.href = 'main.php?action=rake_tm&uid={$uid}&ids=" . $ids . "';</script>";
        exit;
    }
    if (empty($_POST['money'])) {
        echo "<script>alert('请输入数值!'); window.location.href = 'main.php?action=rake_tm&uid={$uid}&ids=" . $ids . "';</script>";
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
            $db1->query("update web_bl set rate=rate-" . $money . ",adddate='" . $utime . "' where class1='特码'  and   class3='" . $pc4[$f] . "'");
        } else {
            $db1->query("update web_bl set rate=rate+" . $money . ",adddate='" . $utime . "' where class1='特码'  and   class3='" . $pc4[$f] . "'");
        }
    }
}
$result = $db1->query("Select rate,class3,locked from web_bl where class2='" . $ids . "' or class2='特码' Order By ID  LIMIT 62");
$showtable = array();
$y = 0;
while ($Image = $result->fetch_array()) {
    ++$y;
    array_push($showtable, $Image);
}
$drop_count = $y - 1;
$result = $db1->query("SELECT ds,rake_sj FROM web_config_ds WHERE class='特码' Order By ID");
$rake_sj_temp = array();
$x = 0;
while ($Image = $result->fetch_assoc()) {
    $rake_sj_temp[$Image['ds']] = $Image['rake_sj'];
    ++$x;
}
$rake_sj_count = $x - 1;
?>
<style>
    .bet {
        margin-top: 2px;
    }
</style>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<link rel="stylesheet" href="css/ball.css" type="text/css">

<script language="JavaScript">
    var uid = "<?= $uid ?>";
    var ids = "<?= $ids ?>";
    var autotime = "<?= $autotime ?>";
</script>
<script src="js/function.js" type="text/javascript"></script>
<script src="js/rake_tm.js" type="text/javascript"></script>

<body style="min-width: 1350px;width:100%">
    <div id="tit" class="tit">
        <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
        <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;赔率设置－</span><span class="font_b"><?= $ids ?>&nbsp;</span></div>
        <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
        <div class="biaoti_right floatright"><input class="btn5" type="button" name="fen1" value="全部封号" onClick="javascript:location.href='main.php?action=rake_tm&uid=<?= $uid ?>&ids=<?= $ids ?>&fen=fen&fid=1'" />&nbsp;<input class="btn5" type="button" name="fen2" value="全部开号" onClick="javascript:location.href='main.php?action=rake_tm&uid=<?= $uid ?>&ids=<?= $ids ?>&fen=fen&fid=0'" /></div>
    </div>
    <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tbody>
            <tr><!--left-->
                <td width="260" align="center" valign="top"><? require_once "rake_header.php"; ?></td>
                <!--right-->
                <td valign="top" style="margin-top:2px;">
                    <table width="100%" border="0" cellspacing="1" cellpadding="0" class="t_list">
                        <form name="form1" method="post" action="main.php?action=rake_tm&uid=<?= $uid ?>&act=edit&ids=<?= $ids ?>">
                            <tbody>
                                <tr>
                                    <td colspan="20" align="center" class="t_list_caption">
                                        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
                                            <tbody>
                                                <!--第一个tr-->
                                                <tr bgcolor="#FFFFFF">
                                                    <td class="t_list_caption">号码</td>
                                                    <td class="t_list_caption"> 赔率/封号</td>
                                                    <td class="t_list_caption">赔率</td>
                                                    <td class="t_list_caption"> 下注总额</td>
                                                    <td class="t_list_caption"> 号码</td>
                                                    <td class="t_list_caption"> 赔率/封号</td>
                                                    <td class="t_list_caption">赔率</td>
                                                    <td class="t_list_caption">下注总额</td>
                                                    <td class="t_list_caption">号码</td>
                                                    <td class="t_list_caption">赔率/封号</td>
                                                    <td class="t_list_caption">赔率</td>
                                                    <td class="t_list_caption"> 下注总额</td>
                                                    <td class="t_list_caption">号码</td>
                                                    <td class="t_list_caption"> 赔率</td>
                                                    <td class="t_list_caption">赔率</td>
                                                    <td class="t_list_caption"> 下注总额</td>
                                                    <td class="t_list_caption"> 号码</td>
                                                    <td class="t_list_caption"> 赔率/封号</td>
                                                    <td class="t_list_caption">赔率</td>
                                                    <td class="t_list_caption"> 下注总额</td>
                                                </tr>
                                                <!--第二个tr-->
                                                <? $I = 1;
                                                for (; $I <= 10; $I += 1) { ?>
                                                    <tr><!--td1-->
                                                        <td height="25" align="center" bgcolor="#FFFFFF">
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                <tr align="center" bordercolordark="#FFFFFF" class="m_tab_ed">
                                                                    <td width="25" height="25" align="center" bgcolor="#FFFFFF" class="No_<?= intval($I) ?>">&nbsp;</td>
                                                                    <? if ($I != 10) {
                                                                    } ?>
                                                                </tr>
                                                            </table>
                                                        </td><!--td1 end-->
                                                        <td height="25" align="center" bgcolor="#FFFFFF"><!--td2-->
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td>
                                                                        <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I ?>','bl<?= $I - 1 ?>','uid=<?= $uid ?>&class1=特码&ids=<?= $ids ?>&sqq=sqq&lxlx=1&qtqt=<?= get_rake_sj($ids) ?>&class3=<?= $showtable[$I - 1][1] ?>');">
                                                                            <img src="images/add.png" class="add" width="19" height="17" border="0">
                                                                        </a>
                                                                    </td>
                                                                    <td><input style="HEIGHT: 18px" class="za_text" maxlength="6" size="4" value="<?= $showtable[$I - 1][0] ?>" name="Num_<?= $I ?>" /></td>
                                                                    <td>
                                                                        <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I ?>','bl<?= $I - 1 ?>','uid=<?= $uid ?>&class1=特码&ids=<?= $ids ?>&sqq=sqq&lxlx=0&qtqt=<?= get_rake_sj($ids) ?>&class3=<?= $showtable[$I - 1][1] ?>');">
                                                                            <img src="images/sub.png" class="minus" width="19" height="17" border="0">
                                                                        </a>
                                                                    </td>

                                                                    <td><input type=checkbox id="lock<?= $I - 1 ?>" style="zoom:95%" title="关闭该项" onClick="UpdateRate('LOCK','lock<?= $I - 1 ?>','','uid=<?= $uid ?>&class1=特码&ids=<?= $ids ?>&sqq=sqq&class3=<?= $showtable[$I - 1][1] ?>&lock='+this.checked);" value="TRUE" <? if ($showtable[$I - 1][2] == 1) { ?> checked <? } ?>></input>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <input name="class3_<?= $I ?>" value="<?= $showtable[$I - 1][1] ?>" type="hidden">
                                                        </td><!--td2 end-->
                                                        <td height="25" align="center" bgcolor="#FFFFFF"><!--td3-->

                                                            <span id=bl<?= $I - 1 ?>>
                                                                <?= $showtable[$I - 1][0] ?>
                                                            </span>
                                                        </td><!--td3 end-->
                                                        <td width="4%" align="center" bgcolor="#FFFFFF"><!--td4-->

                                                            <span id="gold<?= $I - 1 ?>">0</span>
                                                        </td><!--td4 end-->
                                                        <td height="25" align="center" bgcolor="#FFFFFF"><!--td5-->
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                <tr align="center" bordercolordark="#FFFFFF" class="m_tab_ed">
                                                                    <td width="25" height="25" align="center" bgcolor="#FFFFFF" class="No_<?= intval($I + 10) ?>">&nbsp;</td>
                                                                    <? if ($I != 10) {
                                                                    } ?>
                                                                </tr>
                                                            </table>
                                                        </td><!--td5 end-->




                                                        <td height="25" align="center" bgcolor="#FFFFFF">
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td>
                                                                        <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 10 ?>','bl<?= $I + 10 - 1 ?>','uid=<?= $uid ?>&class1=特码&ids=<?= $ids ?>&sqq=sqq&lxlx=1&qtqt=<?= get_rake_sj($ids) ?>&class3=<?= $showtable[$I + 10 - 1][1] ?>');"><img src="images/add.png" width="19" height="17" border="0"></a>
                                                                    </td>
                                                                    <td><input style="HEIGHT: 18px" class="za_text" maxlength="6" size="4" value="<?= $showtable[$I + 10 - 1][0] ?>" name="Num_<?= $I + 10 ?>" />
                                                                    </td>
                                                                    <td>
                                                                        <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 10 ?>','bl<?= $I + 10 - 1 ?>','uid=<?= $uid ?>&class1=特码&ids=<?= $ids ?>&sqq=sqq&lxlx=0&qtqt=<?= get_rake_sj($ids) ?>&class3=<?= $showtable[$I + 10 - 1][1] ?>');"><img src="images/sub.png" width="19" height="17" border="0"></a>
                                                                    </td>
                                                                    <td><input type=checkbox id="lock<?= $I + 10 - 1 ?>" style="zoom:95%" title="关闭该项" onClick="UpdateRate('LOCK','lock<?= $I + 10 - 1 ?>','','uid=<?= $uid ?>&class1=特码&ids=<?= $ids ?>&sqq=sqq&class3=<?= $showtable[$I + 10 - 1][1] ?>&lock='+this.checked);" <? if ($showtable[$I + 10 - 1][2] == 1) { ?> checked <? } ?>></td>
                                                                </tr>
                                                            </table>
                                                            <input name="class3_<?= $I + 10 ?>" value="<?= $showtable[$I + 10 - 1][1] ?>" type="hidden">
                                                        </td>
                                                        <td height="25" align="center" bgcolor="#FFFFFF">
                                                            <span id="bl<?= $I + 10 - 1 ?>">
                                                                <?= $showtable[$I + 10 - 1][0] ?>
                                                            </span>
                                                        </td>

                                                        <td width="4%" align="center" bgcolor="#FFFFFF">
                                                            <span id="gold<?= $I + 10 - 1 ?>">0</span>
                                                        </td>
                                                        <!--talbe2-->




                                                        <td height="25" align="center" bgcolor="#FFFFFF">
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                <tr align="center" bordercolordark="#FFFFFF" class="m_tab_ed">

                                                                    <td width="25" height="25" align="center" bgcolor="#FFFFFF" class="No_<?= intval($I + 20) ?>">&nbsp;</td>
                                                                    <? if ($I != 10) {
                                                                    } ?>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td height="25" align="center" bgcolor="#FFFFFF">
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td>
                                                                        <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 20 ?>','bl<?= $I + 20 - 1 ?>','uid=<?= $uid ?>&class1=特码&ids=<?= $ids ?>&sqq=sqq&lxlx=1&qtqt=<?= get_rake_sj($ids) ?>&class3=<?= $showtable[$I + 20 - 1][1] ?>');"><img src="images/add.png" width="19" height="17" border="0"></a>
                                                                    </td>
                                                                    <td><input style="HEIGHT: 18px" class="za_text" maxlength="6" size="4" value="<?= $showtable[$I + 20 - 1][0] ?>" name="Num_<?= $I + 20 ?>" /></td>
                                                                    <td>
                                                                        <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 20 ?>','bl<?= $I + 20 - 1 ?>','uid=<?= $uid ?>&class1=特码&ids=<?= $ids ?>&sqq=sqq&lxlx=0&qtqt=<?= get_rake_sj($ids) ?>&class3=<?= $showtable[$I + 20 - 1][1] ?>');"><img src="images/sub.png" width="19" height="17" border="0"></a>
                                                                    </td>
                                                                    <td><input type=checkbox id="lock<?= $I + 20 - 1 ?>" style="zoom:95%" title="关闭该项" onClick="UpdateRate('LOCK','lock<?= $I + 20 - 1 ?>','','uid=<?= $uid ?>&class1=特码&ids=<?= $ids ?>&sqq=sqq&class3=<?= $showtable[$I + 20 - 1][1] ?>&lock='+this.checked);" <? if ($showtable[$I + 20 - 1][2] == 1) { ?> checked <? } ?>></td>
                                                                </tr>
                                                            </table>
                                                            <input name="class3_<?= $I + 20 ?>" value="<?= $showtable[$I + 20 - 1][1] ?>" type="hidden">
                                                        </td>
                                                        <td height="25" align="center" bgcolor="#FFFFFF">

                                                            <span id="bl<?= $I + 20 - 1 ?>"><?= $showtable[$I + 20 - 1][0] ?></span>
                                                        </td>


                                                        <td width="4%" align="center" bgcolor="#FFFFFF"><span id="gold<?= $I + 20 - 1 ?>">0</span>
                                                        </td>

                                                        <!--talbe2 end-->

                                                        <td height="25" align="center" bgcolor="#FFFFFF">
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                <tr align="center" bordercolordark="#FFFFFF" class="m_tab_ed">

                                                                    <td width="25" height="25" align="center" bgcolor="#FFFFFF" class="No_<?= intval($I + 30) ?>">&nbsp;</td>
                                                                    <? if ($I != 10) {
                                                                    } ?>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <!--table3-->
                                                        <td height="25" align="center" bgcolor="#FFFFFF">
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td>
                                                                        <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 30 ?>','bl<?= $I + 30 - 1 ?>','uid=<?= $uid ?>&class1=特码&ids=<?= $ids ?>&sqq=sqq&lxlx=1&qtqt=<?= get_rake_sj($ids) ?>&class3=<?= $showtable[$I + 30 - 1][1] ?>');"><img src="images/add.png" width="19" height="17" border="0"></a>
                                                                    </td>
                                                                    <td><input style="HEIGHT: 18px" class="za_text" maxlength="6" size="4" value="<?= $showtable[$I + 30 - 1][0] ?>" name="Num_<?= $I + 30 ?>" /></td>
                                                                    <td>
                                                                        <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 30 ?>','bl<?= $I + 30 - 1 ?>','uid=<?= $uid ?>&class1=特码&ids=<?= $ids ?>&sqq=sqq&lxlx=0&qtqt=<?= get_rake_sj($ids) ?>&class3=<?= $showtable[$I + 30 - 1][1] ?>');"><img src="images/sub.png" width="19" height="17" border="0">
                                                                        </a>
                                                                    </td>

                                                                    <td><input type=checkbox id="lock<?= $I + 30 - 1 ?>" style="zoom:95%" title="关闭该项" onClick="UpdateRate('LOCK','lock<?= $I + 30 - 1 ?>','','uid=<?= $uid ?>&class1=特码&ids=<?= $ids ?>&sqq=sqq&class3=<?= $showtable[$I + 30 - 1][1] ?>&lock='+this.checked);" <? if ($showtable[$I + 30 - 1][2] == 1) { ?> checked <? } ?>>
                                                                    </td>
                                                                </tr>
                                                            </table>

                                                            <input name="class3_<?= $I + 30 ?>" value="<?= $showtable[$I + 30 - 1][1] ?>" type="hidden">
                                                        </td>

                                                        <td height="25" align="center" bgcolor="#FFFFFF">
                                                            <span id="bl<?= $I + 30 - 1 ?>"><?= $showtable[$I + 30 - 1][0] ?></span>
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
                                                                            <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 40 ?>','bl<?= $I + 39 ?>','uid=<?= $uid ?>&class1=特码&ids=<?= $ids ?>&sqq=sqq&lxlx=1&qtqt=<?= get_rake_sj($ids) ?>&class3=<?= $showtable[$I + 40 - 1][1] ?>');"><img src="images/add.png" width="19" height="17" border="0"></a>
                                                                        </td>
                                                                        <td><input style="HEIGHT: 18px" class="za_text" maxlength="6" size="4" value="<?= $showtable[$I + 40 - 1][0] ?>" name="Num_<?= $I + 40 ?>" /></td>

                                                                        <td>
                                                                            <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 40 ?>','bl<?= $I + 39 ?>','uid=<?= $uid ?>&class1=特码&ids=<?= $ids ?>&sqq=sqq&lxlx=0&qtqt=<?= get_rake_sj($ids) ?>&class3=<?= $showtable[$I + 40 - 1][1] ?>');"><img src="images/sub.png" width="19" height="17" border="0"></a>
                                                                        </td>

                                                                        <td><input type=checkbox id="lock<?= $I + 40 - 1 ?>" style="zoom:95%" title="关闭该项" onClick="UpdateRate('LOCK','lock?=$I+40-1?>','','uid=<?= $uid ?>&class1=特码&ids=<?= $ids ?>&sqq=sqq&class3=<?= $showtable[$I + 40 - 1][1] ?>&lock='+this.checked);" <? if ($showtable[$I + 40 - 1][2] == 1) { ?> checked <? } ?>></td>
                                                                    </tr>
                                                                </table>

                                                                <input name="class3_<?= $I + 40 ?>" value="<?= $showtable[$I + 40 - 1][1] ?>" type="hidden">
                                                            </td>

                                                            <td height="25" align="center" bgcolor="#FFFFFF">

                                                                <span id="bl<?= $I + 40 - 1 ?>"><?= $showtable[$I + 40 - 1][0] ?>
                                                                </span>
                                                            </td>


                                                            <td width="4%" align="center" bgcolor="#FFFFFF">
                                                                <span id="gold<?= $I + 40 - 1 ?>">0</span>
                                                            </td>
                                                            <!--table3 end-->
                                                        <? } else { ?>
                                                            <td height="25" align="center" bgcolor="#FFFFFF">&nbsp;</td>
                                                            <td height="25" align="center" bgcolor="#FFFFFF">&nbsp;</td>
                                                            <td height="25" align="center" bgcolor="#FFFFFF">&nbsp;</td>
                                                            <td align="center" bgcolor="#FFFFFF">&nbsp;</td>

                                                        <? } ?>
                                                    </tr>
                                                <? } ?>

                                                <? $I = 1;
                                                for (; $I <= 2; $I += 1) { ?>
                                                    <tr>
                                                        <td height="25" align="center" bgcolor="#FFFFFF">
                                                            <?= $showtable[$I + 48][1] ?>
                                                        </td>
                                                        <td height="25" align="center" bgcolor="#FFFFFF">
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td>
                                                                        <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 49 ?>','bl<?= $I + 48 ?>','uid=<?= $uid ?>&class1=特码&ids=特码&sqq=sqq&lxlx=1&qtqt=<?= get_rake_sj($showtable[$I + 48][1]) ?>&class3=<?= $showtable[$I + 48][1] ?>');"><img src="images/add.png" width="19" height="17" border="0"></a>
                                                                    </td>
                                                                    <td><input style="HEIGHT: 18px" class="za_text" maxlength="6" size="4" value="<?= $showtable[$I + 48][0] ?>" name="Num_<?= $I + 49 ?>" /></td>
                                                                    <td>
                                                                        <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 49 ?>','bl<?= $I + 48 ?>','uid=<?= $uid ?>&class1=特码&ids=特码&sqq=sqq&lxlx=0&qtqt=<?= get_rake_sj($showtable[$I + 48][1]) ?>&class3=<?= $showtable[$I + 48][1] ?>');"><img src="images/sub.png" width="19" height="17" border="0"></a>
                                                                    </td>


                                                                    <td><input type=checkbox id="lock<?= $I + 48 ?>" style="zoom:95%" title="关闭该项" onClick="UpdateRate('LOCK','lock<?= $I + 48 ?>','','uid=<?= $uid ?>&class1=特码&ids=特码&sqq=sqq&class3=<?= $showtable[$I + 48][1] ?>&lock='+this.checked);" <? if ($showtable[$I + 48][2] == 1) { ?> checked<? } ?>></td>
                                                                </tr>
                                                            </table>
                                                            <input name="class3_<?= $I + 49 ?>" value="<?= $showtable[$I + 48][1] ?>" type="hidden">
                                                        </td>

                                                        <td height="25" align="center" bgcolor="#FFFFFF">

                                                            <span id="bl<?= $I + 48 ?>"><?= $showtable[$I + 48][0] ?></span>
                                                        </td>
                                                        <td width="4%" align="center" bgcolor="#FFFFFF">

                                                            <span id="gold<?= $I + 48 ?>">0</span>
                                                        </td>
                                                        <td height="25" align="center" bgcolor="#FFFFFF">
                                                            <?= $showtable[$I + 50][1] ?>
                                                        </td>
                                                        <td height="25" align="center" bgcolor="#FFFFFF">
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td>
                                                                        <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 51 ?>','bl<?= $I + 50 ?>','uid=<?= $uid ?>&class1=特码&ids=特码&sqq=sqq&lxlx=1&qtqt=<?= get_rake_sj($showtable[$I + 50][1]) ?>&class3=<?= $showtable[$I + 50][1] ?>');"><img src="images/add.png" width="19" height="17" border="0"></a>
                                                                    </td>
                                                                    <td><input style="HEIGHT: 18px" class="za_text" maxlength="6" size="4" value="<?= $showtable[$I + 50][0] ?>" name="Num_<?= $I + 51 ?>" /></td>


                                                                    <td>
                                                                        <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 51 ?>','bl<?= $I + 50 ?>','uid=<?= $uid ?>&class1=特码&ids=特码&sqq=sqq&lxlx=0&qtqt=<?= get_rake_sj($showtable[$I + 50][1]) ?>&class3=<?= $showtable[$I + 50][1] ?>');"><img src="images/sub.png" width="19" height="17" border="0"></a>
                                                                    </td>


                                                                    <td><input type=checkbox id="lock<?= $I + 50 ?>" style="zoom:95%" title="关闭该项" onClick="UpdateRate('LOCK','lock<?= $I + 50 ?>','','uid=<?= $uid ?>&class1=特码&ids=特码&sqq=sqq&class3=<?= $showtable[$I + 50][1] ?>&lock='+this.checked);" <? if ($showtable[$I + 50][2] == 1) { ?> checked <? } ?>></td>
                                                                </tr>
                                                            </table>
                                                            <input name="class3_<?= $I + 51 ?>" value="<?= $showtable[$I + 50][1] ?>" type="hidden">
                                                        </td>
                                                        <td height="25" align="center" bgcolor="#FFFFFF">

                                                            <span id="bl<?= $I + 50 ?>"> <?= $showtable[$I + 50][0] ?>
                                                            </span>
                                                        </td>
                                                        <td width="4%" align="center" bgcolor="#FFFFFF">

                                                            <span id="gold<?= $I + 50 ?>">0</span>
                                                        </td>

                                                        <td height="25" align="center" bgcolor="#FFFFFF">
                                                            <?= $showtable[$I + 52][1] ?>
                                                        </td>


                                                        <td height="25" align="center" bgcolor="#FFFFFF">
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>

                                                                    <td>
                                                                        <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 53 ?>','bl<?= $I + 52 ?>','uid=<?= $uid ?>&class1=特码&ids=特码&sqq=sqq&lxlx=1&qtqt=<?= get_rake_sj($showtable[$I + 52][1]) ?>&class3=<?= $showtable[$I + 52][1] ?>');"><img src="images/add.png" width="19" height="17" border="0"></a>
                                                                    </td>
                                                                    <td><input style="HEIGHT: 18px" class="za_text" maxlength="6" size="4" value="<?= $showtable[$I + 52][0] ?>" name="Num_<?= $I + 53 ?>" /></td>

                                                                    <td>
                                                                        <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 53 ?>','bl<?= $I + 52 ?>','uid=<?= $uid ?>&class1=特码&ids=特码&sqq=sqq&lxlx=0&qtqt=<?= get_rake_sj($showtable[$I + 52][1]) ?>&class3=<?= $showtable[$I + 52][1] ?>');"><img src="images/sub.png" width="19" height="17" border="0"></a>
                                                                    </td>


                                                                    <td><input type=checkbox id="lock<?= $I + 52 ?>" style="zoom:95%" title="关闭该项" onClick="UpdateRate('LOCK','lock<?= $I + 52 ?>','','uid=<?= $uid ?>&class1=特码&ids=特码&sqq=sqq&class3=<?= $showtable[$I + 52][1] ?>&lock='+this.checked);" <? if ($showtable[$I + 52][2] == 1) { ?> checked <? } ?>>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <input name="class3_<?= $I + 53 ?>" value="<?= $showtable[$I + 52][1] ?>" type="hidden">
                                                        </td>

                                                        <td height="25" align="center" bgcolor="#FFFFFF">
                                                            <span id="bl<?= $I + 52 ?>"><?= $showtable[$I + 52][0] ?>
                                                            </span>
                                                        </td>

                                                        <td width="4%" align="center" bgcolor="#FFFFFF"><span id="gold<?= $I + 52 ?>">0</span></td>

                                                        <td height="25" align="center" bgcolor="#FFFFFF">
                                                            <?= $showtable[$I + 54][1] ?>
                                                        </td>


                                                        <td height="25" align="center" bgcolor="#FFFFFF">
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td>
                                                                        <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 55 ?>','bl<?= $I + 54 ?>','uid=<?= $uid ?>&class1=特码&ids=特码&sqq=sqq&lxlx=1&qtqt=<?= get_rake_sj($showtable[$I + 54][1]) ?>&class3=<?= $showtable[$I + 54][1] ?>');"><img src="images/add.png" width="19" height="17" border="0"></a>
                                                                    </td>
                                                                    <td><input style="HEIGHT: 18px" class="za_text" maxlength="6" size="4" value="<?= $showtable[$I + 54][0] ?>" name="Num_<?= $I + 55 ?>" /></td>


                                                                    <td>
                                                                        <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 55 ?>','bl<?= $I + 54 ?>','uid=<?= $uid ?>&class1=特码&ids=特码&sqq=sqq&lxlx=0&qtqt=<?= get_rake_sj($showtable[$I + 54][1]) ?>&class3=<?= $showtable[$I + 54][1] ?>');"><img src="images/sub.png" width="19" height="17" border="0"></a>
                                                                    </td>


                                                                    <td><input type=checkbox id="lock<?= $I + 54 ?>" style="zoom:95%" title="关闭该项" onClick="UpdateRate('LOCK','lock<?= $I + 54 ?>','','uid=<?= $uid ?>&class1=特码&ids=特码&sqq=sqq&class3=<?= $showtable[$I + 54][1] ?>&lock='+this.checked);" <? if ($showtable[$I + 54][2] == 1) { ?> checked <? } ?>></td>
                                                                </tr>
                                                            </table>

                                                            <input name="class3_<?= $I + 55 ?>" value="<?= $showtable[$I + 54][1] ?>" type="hidden">
                                                        </td>

                                                        <td height="25" align="center" bgcolor="#FFFFFF">
                                                            <span id="bl<?= $I + 54 ?>"><?= $showtable[$I + 54][1] ?>
                                                            </span>
                                                        </td>


                                                        <td width="4%" align="center" bgcolor="#FFFFFF">
                                                            <span id="gold<?= $I + 54 ?>">0</span>
                                                        </td>
                                                        <? if ($I == 1) { ?>
                                                            <td height="25" align="center" bgcolor="#FFFFFF">
                                                                <?= $showtable[$I + 56][1] ?>
                                                            </td>
                                                            <td height="25" align="center" bgcolor="#FFFFFF">
                                                                <table border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td>
                                                                            <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 57 ?>','bl<?= $I + 56 ?>','uid=<?= $uid ?>&class1=特码&ids=特码&sqq=sqq&lxlx=1&qtqt=<?= get_rake_sj($showtable[$I + 56][1]) ?>&class3=<?= $showtable[$I + 56][1] ?>');"><img src="images/add.png" width="19" height="17" border="0"></a>
                                                                        </td>
                                                                        <td><input style="HEIGHT: 18px" class="za_text" maxlength="6" size="4" value="<?= $showtable[$I + 56][0] ?>" name="Num_<?= $I + 57 ?>" /></td>

                                                                        <td>
                                                                            <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?= $I + 57 ?>','bl<?= $I + 56 ?>','uid=<?= $uid ?>&class1=特码&ids=特码&sqq=sqq&lxlx=0&qtqt=<?= get_rake_sj($showtable[$I + 56][1]) ?>&class3=<?= $showtable[$I + 56][1] ?>');"><img src="images/sub.png" width="19" height="17" border="0"></a>
                                                                        </td>


                                                                        <td><input type=checkbox id="lock<?= $I + 56 ?>" style="zoom:95%" title="关闭该项" onClick="UpdateRate('LOCK','lock<?= $I + 56 ?>','','uid=<?= $uid ?>&class1=特码&ids=特码&sqq=sqq&class3=<?= $showtable[$I + 56][1] ?>&lock='+this.checked);" <? if ($showtable[$I + 56][2] == 1) { ?> checked <? } ?>>
                                                                        </td>
                                                                    </tr>
                                                                </table>


                                                                <input name="class3_<?= $I + 57 ?>" value="<?= $showtable[$I + 56][1] ?>" type="hidden">
                                                            </td>

                                                            <td height="25" align="center" bgcolor="#FFFFFF">

                                                                <span id="bl<?= $I + 56 ?>">
                                                                    <?= $showtable[$I + 56][0] ?>
                                                                </span>
                                                            </td>
                                                            <td width="4%" align="center" bgcolor="#FFFFFF">
                                                                <span id="gold<?= $I + 56 ?>">0</span>
                                                            </td>
                                                        <? } else { ?>

                                                            <td colspan="4" align="center" bgcolor="#FFFFFF">
                                                                <table border="0" align="center" cellpadding="0" cellspacing="0">
                                                                    <tr>
                                                                        <td width="88" align="center"><input type="submit" class="btn1" name="Submit2" value="提交" /></td>
                                                                        <td width="88" align="center"><input type="reset" class="btn2" name="Submit3" value="重置" /></td>
                                                                        <td>&nbsp;</td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        <? } ?>
                                                    </tr>
                                                <? } ?>
                                                <tr bgcolor="#FFFFFF">
                                                    <td height="25" align="center">
                                                        <?= $showtable[58][1] ?>
                                                    </td>
                                                    <td height="25" align="center">
                                                        <table border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td>
                                                                    <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_59','bl58','uid=<?= $uid ?>&class1=特码&ids=特码&sqq=sqq&lxlx=1&qtqt=<?= get_rake_sj($showtable[58][1]) ?>&class3=<?= $showtable[58][1] ?>');"><img src="images/add.png" width="19" height="17" border="0"></a>
                                                                </td>
                                                                <td><input style="HEIGHT: 18px" class="za_text" maxlength="6" size="4" value="<?= $showtable[58][0] ?>" name="Num_59" /></td>

                                                                <td>
                                                                    <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_59','bl58','uid=<?= $uid ?>&class1=特码&ids=特码&sqq=sqq&lxlx=0&qtqt=<?= get_rake_sj($showtable[58][1]) ?>&class3=<?= $showtable[58][1] ?>');"><img src="images/sub.png" width="19" height="17" border="0"></a>

                                                                </td>


                                                                <td><input type=checkbox id="lock58" style="zoom:95%" title="关闭该项" onClick="UpdateRate('LOCK','lock','58','uid=<?= $uid ?>&class1=特码&ids=特码&sqq=sqq&class3=<?= $showtable[58][1] ?>&lock='+this.checked);" <? if ($showtable[58][2] == 1) { ?> checked <? } ?>></td>
                                                            </tr>
                                                        </table>

                                                        <input name="class3_59" value="<?= $showtable[58][1] ?>" type="hidden">
                                                    </td>

                                                    <td height="25" align="center">
                                                        <span id="bl58">
                                                            <?= $showtable[58][0] ?>
                                                        </span>
                                                    </td>

                                                    <td align="center">
                                                        <span id="gold58">0</span>
                                                    </td>
                                                    <td height="25" align="center">
                                                        <font color=<? if ($showtable[59][1] == "红波") { ?> "ff0000" <? } else { ?> <? if ($showtable[59][1] == "蓝波") { ?> "0000ff" <? } else { ?> <? if ($showtable[59][1] == "绿波") { ?> "green" <? } ?> <? } ?> <? } ?>>
                                                            <?= $showtable[59][1] ?>
                                                        </font>
                                                    </td>

                                                    <td height="25" align="center">
                                                        <table border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td>
                                                                    <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_60','bl59','uid=<?= $uid ?>&class1=特码&ids=特码&sqq=sqq&lxlx=1&qtqt=<?= get_rake_sj($showtable[59][1]) ?>&class3=<?= $showtable[59][1] ?>');"><img src="images/add.png" width="19" height="17" border="0"></a>
                                                                </td>
                                                                <td><input style="HEIGHT: 18px" class="za_text" maxlength="6" size="4" value="<?= $showtable[59][0] ?>" name="Num_60" /></td>

                                                                <td>
                                                                    <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_60','bl59','uid=<?= $uid ?>&class1=特码&ids=特码&sqq=sqq&lxlx=0&qtqt=<?= get_rake_sj($showtable[59][1]) ?>&class3=<?= $showtable[59][1] ?>');"><img src="images/sub.png" width="19" height="17" border="0"></a>
                                                                </td>

                                                                <td><input type=checkbox id="lock59" style="zoom:95%" title="关闭该项" onClick="UpdateRate('LOCK','lock59','','uid=<?= $uid ?>&class1=特码&ids=特码&sqq=sqq&class3=<?= $showtable[59][1] ?>&lock='+this.checked);" <? if ($showtable[59][2] == 1) { ?> checked <? } ?>></td>
                                                            </tr>
                                                        </table>

                                                        <input name="class3_60" value="<?= $showtable[59][1] ?>" type="hidden">
                                                    </td>
                                                    <td height="25" align="center">
                                                        <span id="bl59">
                                                            <?= $showtable[59][0] ?>
                                                        </span>
                                                    </td>

                                                    <td align="center">

                                                        <span id="gold59">0</span>
                                                    </td>
                                                    <td height="25" align="center">
                                                        <font color=<? if ($showtable[60][1] == " 红波") { ?> "ff0000" <? } else { ?> <? if ($showtable[60][1] == "蓝波") { ?> "0000ff" <? } else { ?> <? if ($showtable[60][1] == "绿波") { ?> "green" <? } ?> <? } ?> <? } ?>>
                                                            <?= $showtable[60][1] ?>
                                                        </font>
                                                    </td>
                                                    <td height="25" align="center">
                                                        <table border="0" cellspacing="0" cellpadding="0">

                                                            <tr>
                                                                <td>
                                                                    <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_61','bl60','uid=<?= $uid ?>&class1=特码&ids=特码&sqq=sqq&lxlx=1&qtqt=<?= get_rake_sj($showtable[60][1]) ?>&class3=<?= $showtable[60][1] ?>');"><img src="images/add.png" width="19" height="17" border="0"></a>
                                                                </td>
                                                                <td><input style="HEIGHT: 18px" class="za_text" maxlength="6" size="4" value="<?= $showtable[60][0] ?>" name="Num_61" /></td>

                                                                <td>
                                                                    <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_61','bl60','uid=<?= $uid ?>&class1=特码&ids=特码&sqq=sqq&lxlx=0&qtqt=<?= get_rake_sj($showtable[60][1]) ?>&class3=<?= $showtable[60][1] ?>');"><img src="images/sub.png" width="19" height="17" border="0"></a>
                                                                </td>

                                                                <td><input type=checkbox id="lock60" style="zoom:95%" title="关闭该项" onClick="UpdateRate('LOCK','lock60','','uid=<?= $uid ?>&class1=特码&ids=特码&sqq=sqq&class3=<?= $showtable[60][1] ?>&lock='+this.checked);" <? if ($showtable[60][2] == 1) { ?> checked <? } ?>></td>
                                                            </tr>
                                                        </table>

                                                        <input name="class3_61" value="<?= $showtable[60][1] ?>" type="hidden">
                                                    </td>
                                                    <td height="25" align="center">

                                                        <span id="bl60">
                                                            <?= $showtable[60][0] ?>
                                                        </span>
                                                    </td>

                                                    <td align="center">
                                                        <span id="gold60">0</span>
                                                    </td>

                                                    <td height="25" align="center">
                                                        <font color=<? if ($showtable[61][1] == "红波") { ?> "ff0000" <? } else { ?> <? if ($showtable[61][1] == "蓝波") { ?> "0000ff" <? } else { ?> <? if ($showtable[61][1] == "绿波") { ?> "green" <? } ?> <? } ?> <? } ?>>
                                                            <?= $showtable[61][1] ?>
                                                        </font>
                                                    </td>

                                                    <td height="25" align="center">
                                                        <table border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td>
                                                                    <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_62','bl61','uid=<?= $uid ?>&class1=特码&ids=特码&sqq=sqq&lxlx=1&qtqt=<?= get_rake_sj($showtable[61][1]) ?>&class3=<?= $showtable[61][1] ?>');"><img src="images/add.png" width="19" height="17" border="0"></a>
                                                                <td><input style="HEIGHT: 18px" class="za_text" maxlength="6" size="4" value="<?= $showtable[61][0] ?>" name="Num_62" /></td>

                                                                <td>
                                                                    <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_62','bl61','uid=<?= $uid ?>&class1=特码&ids=特码&sqq=sqq&lxlx=0&qtqt=<?= get_rake_sj($showtable[61][1]) ?>&class3=<?= $showtable[61][1] ?>');"><img src="images/sub.png" width="19" height="17" border="0"></a>
                                                                </td>

                                                                <td><input type=checkbox id="lock61" style="zoom:95%" title="关闭该项" onClick="UpdateRate('LOCK','lock61','','uid=<?= $uid ?>&class1=特码&ids=特码&sqq=sqq&class3=<?= $showtable[61][1] ?>&lock='+this.checked);" <? if ($showtable[61][2] == 1) { ?> checked <? } ?>></td>
                                                            </tr>
                                                        </table>



                                                        <input name="class3_62" value="<?= $showtable[61][1] ?>" type="hidden">
                                                    </td>

                                                    <td height="25" align="center">
                                                        <span id="bl61">
                                                            <?= $showtable[61][0] ?>
                                                        </span>
                                                    </td>


                                                    <td align="center"><span id="gold61">0</span></td>
                                                    <td height="25" align="center">&nbsp;</td>
                                                    <td height="25" align="center">&nbsp;</td>
                                                    <td height="25" align="center">&nbsp;</td>
                                                    <td align="center">&nbsp;</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <form action="main.php?action=rake_tm&uid=<?= $uid ?>&savew=savew&ids=<?= $ids ?>" name="form21" method="post">
                                        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
                                            <tbody>
                                                <tr>
                                                    <td height="28" colspan="15" bgcolor="#FFFFFF" class="t_list_caption">
                                                        <font class="font_r">快速设置(传送后需按上方"修改"按钮进行保存!)</font>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="22" align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(1) ?>">鼠</td>
                                                    <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(2) ?>">牛</td>

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
                                                <tr>

                                                    <td height="26" align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(13) ?>">
                                                        <span class="STYLE1">红单</span>
                                                    </td>
                                                    <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(14) ?>">
                                                        <span class="STYLE1">红双</span>
                                                    </td>
                                                    <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(15) ?>">
                                                        <span class="STYLE1">红大</span>
                                                    </td>
                                                    <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(16) ?>">
                                                        <span class="STYLE1">红小</span>
                                                    </td>
                                                    <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(21) ?>">
                                                        <span class="STYLE2">蓝单</span>
                                                    </td>
                                                    <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(22) ?>">
                                                        <span class="STYLE2">蓝双</span>
                                                    </td>
                                                    <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(23) ?>">
                                                        <span class="STYLE2">蓝大</span>
                                                    </td>
                                                    <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(24) ?>">
                                                        <span class="STYLE2">蓝小</span>
                                                    </td>
                                                    <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(17) ?>" ,"49">
                                                        <span class="STYLE3">绿单</span>
                                                    </td>
                                                    <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(18) ?>">
                                                        <span class="STYLE3">绿双</span>
                                                    </td>
                                                    <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(19) ?>" ,"49">
                                                        <span class="STYLE3">绿大</span>
                                                    </td>
                                                    <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(20) ?>">
                                                        <span class="STYLE3">绿小</span>
                                                    </td>
                                                    <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(16) ?>" ," <?= get_sx_m_number(15) ?>">
                                                        <span class="STYLE1">红波</span>
                                                    </td>
                                                    <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(24) ?>" ," <?= get_sx_m_number(23) ?>">
                                                        <span class="STYLE2">蓝波</span>
                                                    </td>
                                                    <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="<?= get_sx_m_number(20) ?>" ," <?= get_sx_m_number(19) ?>","49">
                                                        <span class="STYLE3">绿波</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="22" align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49">单号</td>

                                                    <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48">双号</td>

                                                    <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49">大号</td>

                                                    <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24">小号</td>

                                                    <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="1,3,5,7,9,10,12,14,16,18,21,23,25,27,29,30,32,34,36,38,41,43,45,47,49">合单</td>

                                                    <td align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="2,4,6,8,11,13,15,17,19,20,22,24,26,28,31,33,35,37,39,40,42,44,46,48">合双</td>

                                                    <td align="left" nowrap bgcolor="#FFFFFF">&nbsp;</td>
                                                    <td align="left" nowrap bgcolor="#FFFFFF">
                                                        <input name="mf[]" type="checkbox" id="mf[]" value="1,2,3,4,5,6,7,8,9">0头
                                                    </td>
                                                    <td align="left" nowrap bgcolor="#FFFFFF">
                                                        <input name="mf[]" type="checkbox" id="mf[]" value="10,11,12,13,14,15,16,17,18,19">1头
                                                    </td>
                                                    <td align="left" nowrap bgcolor="#FFFFFF">
                                                        <input name="mf[]" type="checkbox" id="mf[]" value="20,21,22,23,24,25,26,27,28,29">2头
                                                    </td>
                                                    <td align="left" nowrap bgcolor="#FFFFFF">
                                                        <input name="mf[]" type="checkbox" id="mf[]" value="30,31,32,33,34,35,36,37,38,39">3头
                                                    </td>
                                                    <td align="left" nowrap bgcolor="#FFFFFF">
                                                        <input name="mf[]" type="checkbox" id="mf[]" value="40,41,42,43,44,45,46,47,48,49">4头
                                                    </td>

                                                    <td align="left" nowrap bgcolor="#FFFFFF">&nbsp;</td>
                                                    <td align="left" nowrap bgcolor="#FFFFFF">&nbsp;</td>
                                                    <td align="left" nowrap bgcolor="#FFFFFF">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="21" align="left" nowrap bgcolor="#FFFFFF"><input name="mf[]" type="checkbox" id="mf[]" value="10,20,30,40">0尾</td>
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
                                                    <td align="left" nowrap bgcolor="#FFFFFF">&nbsp;</td>
                                                    <td align="left" nowrap bgcolor="#FFFFFF">&nbsp;</td>
                                                    <td align="left" nowrap bgcolor="#FFFFFF">&nbsp;</td>
                                                    <td align="left" nowrap bgcolor="#FFFFFF">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="30" colspan="15" align="center" bgcolor="#FFFFFF">
                                                        <span>号码1~49:</span>
                                                        <span>统一减</span>
                                                        <input name="mv" type="radio" value="0" checked>
                                                        <INPUT name=money class="za_text" value="0.5" size=4>
                                                        <input type="radio" name="mv" value="1">
                                                        <span>统一加</span>
                                                        &nbsp;<INPUT name="button2" type=submit value=送出 class="btn4">
                                                        &nbsp;<INPUT type=reset value="取消" name="reset" class="btn4">
                                                    </td>
                                                </tr>

                                                <form action="main.php?action=rake_tm&uid=<?= $uid ?>&save=save&ids=<?= $ids ?>" name="form21" method="post">
                                                    <tr>
                                                        <td height="30" colspan="15" align="center" bgcolor="#FFFFFF">
                                                            <span class="STYLE1">统一修改：</span>
                                                            <input type="radio" name="dx" value="单">单
                                                            <input type="radio" name="dx" value="双">双
                                                            <input type="radio" name="dx" value="大">大
                                                            <input type="radio" name="dx" value="小">小
                                                            <input type="radio" name="dx" value="红波">红波
                                                            <input type="radio" name="dx" value="绿波">绿波
                                                            <input type="radio" name="dx" value="蓝波">蓝波
                                                            <input name="dx" type="radio" value="全部" checked>全部 赔率
                                                            <input name="bl" class="za_text" id="bl" style="HEIGHT: 18px" value="0" size="6" />
                                                            <input type="submit" name="Submit22" value="统一修改" class="btn2" />
                                                        </td>
                                                    </tr>
                                                </form>


                                </tr>
                            </tbody>
                    </table>
                    </form>




        </tbody>
        </form>
    </table>
    </td>
    </tr>



    <!--end-->
    </tr>
    </tbody>
    </table>

    <SCRIPT language=javascript>
        makeRequest('main.php?action=server&uid=<?= $uid ?>&class1=特码&class2=<?= $ids ?>');
    </script>
</body>