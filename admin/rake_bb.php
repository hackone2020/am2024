<?php


function get_rake_sj($i)
{
    global $rake_sj_temp;
    $rake_sj = 0.01;
    $rake_sj = $rake_sj_temp['特码半波'];
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
$ids = "半波";
if ($_GET['act'] == "edit") {
    $tt = 1;
    for (; $tt <= 18; ++$tt) {
        if (empty($_POST["lm" . $tt])) {
            echo "<script>alert('赔率不能为空:" . $_POST["Num_" . $tt] . "/" . $tt . "!');window.location.href='main.php?action=rake_bb&uid={$uid}&ids=" . $ids . "';</script>";
            exit();
        }
    }
    $tt = 1;
    for (; $tt <= 18; ++$tt) {
        $num = $_POST["lm" . $tt];
        $class3 = $_POST["class3_" . $tt];
        $class2 = $_POST["class2_" . $tt];
        $db1->query("update web_bl  set adddate='" . $utime . "',rate=" . $num . " where class1='半波' and class2='" . $class2 . "' and  class3='" . $class3 . "'");
    }
    echo "<script>alert('修改成功!');window.location.href='main.php?action=rake_bb&uid={$uid}&ids=" . $ids . "';</script>";
    exit();
}
$result = $db1->query("Select rate,class3,class2,locked from web_bl where class1='半波'   Order By ID");
$showtable = array();
$y = 0;
while ($Image = $result->fetch_array()) {
    ++$y;
    array_push($showtable, $Image);
}
$drop_count = $y - 1;
$result = $db1->query("SELECT sx,m_number FROM web_sxnumber WHERE (ID>=13 AND ID<=24) or (ID>=30 AND ID<=35) Order By ID");
$sxtable_temp = array();
$x = 0;
while ($Image = $result->fetch_array()) {
    $sxtable_temp[$Image['sx']] = $Image['m_number'];
    ++$x;
}
$sx_count = $x - 1;
$result = $db1->query("SELECT ds,rake_sj FROM web_config_ds WHERE class='特码' Order By ID");
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
<script src="js/rake_bb.js" type="text/javascript"></script>
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
                <table width="60%" border="0" cellpadding="0" cellspacing="1" class="t_list bet">
                    <form name="form1" method="post" action="main.php?action=rake_bb&uid=<?= $uid ?>&act=edit&ids=<?= $ids ?>">
                        <tbody>
                            <tr>
                                <td colspan="20" align="center" class="t_list_caption">
                                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
                                        <tbody>
                                            <tr>
                                                <td align="center" class="t_list_caption" colspan="2">类型</TD>
                                                <td align="center" class="t_list_caption">号码</TD>
                                                <td align="center" class="t_list_caption">赔率/封号</TD>
                                                <td align="center" class="t_list_caption">当前赔率</TD>
                                                <td align="center" class="t_list_caption">下注金额</TD>
                                            </tr>
                                            <?
                                            $ii = 0;
                                            $I = 0;
                                            for (; $I <= 17; $I += 1) {
                                            ?>
                                                <TR>
                                                    <td height="20" align="center" class="t_list_tr_3" bgcolor="#FFFFFF"><?= $showtable[$I][2] ?></TD>
                                                    <td align="center" class="t_list_tr_3" bgcolor="#FFFFFF">
                                                        <font color=<? if ($ii < 4) {
                                                                        echo "ff0000";
                                                                    } else if ($ii < 8) {
                                                                        echo "green";
                                                                    } else if ($ii < 12) {
                                                                        echo "0000ff";
                                                                    } else if ($ii < 14) {
                                                                        echo "ff0000";
                                                                    } else if ($ii < 16) {
                                                                        echo "green";
                                                                    } else if ($ii < 18) {
                                                                        echo "0000ff";
                                                                    }
                                                                    ?>><?= $showtable[$I][1] ?></font>
                                                    </TD>
                                                    <TD align="center" bgcolor="#FFFFFF" style="display: flex;">
                                                                <?
                                                                $xxm = explode(",", $sxtable_temp[$showtable[$I][1]]);
                                                                $ssc = count($xxm);
                                                                $j = 0;
                                                                for (; $j < $ssc; $j += 1) {
                                                                    if ($xxm[$j] != 49) {
                                                                        if ($xxm[$j] < 10) {
                                                                            $xxm[$j] = $xxm[$j];
                                                                        }
                                                                ?>
                                                                        <span style="margin-left: 2px;" align="middle" height="25" width="25" class="No_<?= intval($xxm[$j]) ?>"></span>
                                                                <?     }
                                                                }
                                                                ?>
                                                    </TD>
                                                    <TD align="center" bgcolor="#FFFFFF">
                                                        <table border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td>
                                                                    <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','lm<?= $I + 1 ?>','bl<?= $I ?>','uid=<?= $uid ?>&class1=半波&ids=<?= $ids ?>&sqq=sqq&lxlx=1&qtqt=<?= get_rake_sj($ids) ?>&class3=<?= $showtable[$I][1] ?>');"><img src="images/add.png" width="19" height="17" border="0"></a>
                                                                </td>
                                                                <td><INPUT style="HEIGHT: 18px" class="za_text" size=10 value='<?= $showtable[$I][0] ?>' name=lm<?= $I + 1 ?>>
                                                                    <input name="class3_<?= $I + 1 ?>" value="<?= $showtable[$I][1] ?>" type="hidden">
                                                                    <input name="class2_<?= $I + 1 ?>" value="<?= $showtable[$I][2] ?>" type="hidden">
                                                                </td>
                                                                <td>
                                                                    <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','lm<?= $I + 1 ?>','bl<?= $I ?>','uid=<?= $uid ?>&class1=半波&ids=<?= $ids ?>&sqq=sqq&lxlx=0&qtqt=<?= get_rake_sj($ids) ?>&class3=<?= $showtable[$I][1] ?>');"><img src="images/sub.png" width="19" height="17" border="0"></a>
                                                                </td>
                                                                <td><input name="checkbox" type=checkbox id=lock<?= $I ?> style="zoom:95%" title="关闭该项" onClick="UpdateRate('LOCK','lock<?= $I ?>','','uid=<?= $uid ?>&class1=半波&ids=<?= $ids ?>&sqq=sqq&class3=<?= $showtable[$I][1] ?>&lock='+this.checked);" value="TRUE" <?
                                                                                                                                                                                                                                                                                                                                if ($showtable[$I][3] == 1) {
                                                                                                                                                                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                                                                                ?>></td>
                                                            </tr>
                                                        </table>
                                                    </TD>
                                                    <TD align="center" bgcolor="#FFFFFF"><span id=bl<?= $I ?>><?= $showtable[$I][0] ?></span></TD>
                                                    <TD align="center" bgcolor="#FFFFFF"><span id=gold<?= $I ?>>0</span></TD>
                                                </TR><?
                                                        ++$ii;
                                                    }
                                                        ?><TR>
                                                <TD colspan="6" align="center" bgcolor="#FFFFFF">
                                                    <table width="160" border="0" align="center" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                            <td width="80" align="center"><input type="submit" class="btn1" name="Submit2" value="提交" /></td>
                                                            <td width="80" align="center"><input type="reset" class="btn2" name="Submit3" value="重置" /></td>
                                                        </tr>
                                                    </table>
                                                </TD>
                                            </TR>
                                        </TBODY>
                    </form>
                </TABLE>
                <SCRIPT language=javascript>
                    makeRequest('main.php?action=server&uid=<?= $uid ?>&class1=半波&class2=<?= $ids ?>')
                </script>
                </body>