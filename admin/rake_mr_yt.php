<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
if (strpos($flag, "02")) {
} else {
    echo "<center>你没有该权限功能!</center>";
    exit;
}
$ids = "硬特";
if ($_GET['act'] == "edit") {
    $tt = 1;
    for (; $tt <= 49; ++$tt) {
        if (empty($_POST["Num_" . $tt])) {
            echo "<script>alert('赔率不能为空:" . $tt . "!');window.location.href='main.php?action=rake_mr_yt&uid={$uid}&ids=" . $ids . "';</script>";
            exit;
        }
    }
    $tt = 1;
    for (; $tt <= 49; ++$tt) {
        $num = $_POST["Num_" . $tt];
        $class3 = $_POST["class3_" . $tt];
        $db1->query("update web_bl  set mrate=" . $num . " where class1='硬特' and class2='" . $ids . "' and  class3='" . $class3 . "'");
    }
    echo "<script>alert('修改成功!');window.location.href='main.php?action=rake_mr_yt&uid={$uid}&ids=" . $ids . "';</script>";
    exit;
}
$result = $db1->query("Select mrate,class3,locked from web_bl where class1='硬特' and class2='" . $ids . "' Order By ID  LIMIT 49");
$showtable = array();
$y = 0;
while ($Image = $result->fetch_array()) {
    ++$y;
    array_push($showtable, $Image);
}
$drop_count = $y - 1;
?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<link rel="stylesheet" href="css/ball.css" type="text/css">
<script src="js/function.js" type="text/javascript"></script>
<SCRIPT language=JAVASCRIPT>
    function quick0() {
        var mm = $("money").value;
        for (var i = 1; i < 50; i++) {
            $("Num_" + i).value = mm;
        }
    }
</SCRIPT>

<body>

    <div id="tit" class="tit">
        <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
        <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;默认赔率设置－</span><span class="font_b"><?= $ids ?>&nbsp;</span></div>
        <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
    </div>
    <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tbody>
            <tr><!--left-->
                <td width="260" align="center" valign="top" style="margin-top:2px;"><? require_once "rake_mr_header.php"; ?></td>
                <td valign="top" style="margin-top:2px;">
                    <table width="100%" height="136" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
                        <form name="form1" method="post" action="main.php?action=rake_mr_yt&uid=
<?= $uid ?>&act=edit&ids=
 <?= $ids ?>">
                            <tr>


                                <td  height="18" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">号码</td>
                                <td  align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">赔率</td>
                                <td  height="18" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">号码</td>
                                <td  align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">赔率</td>
                                <td  height="18" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">号码</td>
                                <td  align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">赔率</td>
                                <td  height="18" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">号码</td>
                                <td  align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">赔率</td>
                                <td  height="18" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">号码</td>
                                <td  align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">赔率</td>
                            </tr>
                            <? $I = 1;
                            for (; $I <= 10; $I += 1) { ?>
                                <tr align="center" style="background-color: #fff;">
                                    <td height="25" align="center" bgcolor="#FFFFFF" class="No_<?= intval($I) ?>">&nbsp;</td>
                                    <td height="25" align="center" bgcolor="#FFFFFF"><input style="HEIGHT: 18px" class="za_text" maxlength="6" size="4" value="<?= $showtable[$I - 1][0] ?>" name="Num_<?= $I ?>" />

                                        <input name="class3_<?= $I ?>" value="<?= $showtable[$I - 1][1] ?>" type="hidden">
                                    </td>
                                    <td height="25" align="center" bgcolor="#FFFFFF" class="No_<?= intval($I + 10) ?>">&nbsp;</td>
                                    <td height="25" align="center" bgcolor="#FFFFFF"><input style="HEIGHT: 18px" class="za_text" maxlength="6" size="4" value="<?= $showtable[$I + 10 - 1][0] ?>" name="Num_<?= $I + 10 ?>" />

                                        <input name="class3_<?= $I + 10 ?>" value="<?= $showtable[$I + 10 - 1][1] ?>" type="hidden">
                                    </td>

                                    <td height="25" align="center" bgcolor="#FFFFFF" class="No_<?= intval($I + 20) ?>">&nbsp;</td>
                                    <td height="25" align="center" bgcolor="#FFFFFF"><input style="HEIGHT: 18px" class="za_text" maxlength="6" size="4" value="<?= $showtable[$I + 20 - 1][0] ?>" name="Num_<?= $I + 20 ?>" />


                                        <input name="class3_<?= $I + 20 ?>" value="<?= $showtable[$I + 20 - 1][1] ?>" type="hidden">
                                    </td>
                                    <td height="25" align="center" bgcolor="#FFFFFF" class="No_<?= intval($I + 30) ?>">&nbsp;</td>

                                    <td height="25" align="center" bgcolor="#FFFFFF"><input style="HEIGHT: 18px" class="za_text" maxlength="6" size="4" value="<?= $showtable[$I + 30 - 1][0] ?>" name="Num_<?= $I + 30 ?>" />

                                        <input name="class3_<?= $I + 30 ?>" value="<?= $showtable[$I + 30 - 1][1] ?>" type="hidden">
                                    </td>
                                    <? if ($I != 10) { ?>
                                        <td height="25" align="center" bgcolor="#FFFFFF" class="No_<?= intval($I) + 40 ?>">&nbsp;</td>


                                        <td height="25" align="center" bgcolor="#FFFFFF"><input style="HEIGHT: 18px" class="za_text" maxlength="6" size="4" value="<?= $showtable[$I + 40 - 1][0] ?>" name="Num_<?= $I + 40 ?>" />

                                            <input name="class3_<?= $I + 40 ?>" value="<?= $showtable[$I + 40 - 1][1] ?>" type="hidden">
                                        </td>
                                    <? } else { ?>
                                        <td height="25" colspan="2" align="center" bgcolor="#FFFFFF">
                                            <table border="0" align="center" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="88" align="center"><input class="btn1" type="submit" name="Submit2" value="提交" /></td>
                                                    <td width="88" align="center"><input class="btn2" type="reset" name="Submit3" value="重置" /></td>
                                                </tr>
                                            </table>
                                        </td>
                                    <? }
                                    ?>
                                </tr>
                            <?
                            } ?>
                            <tr>
                                <td colspan="10">
                                    <table width="100%" height="33" border="0" cellpadding="0" cellspacing="0" class="m_tab_ed">
                                        <tr>
                                            <td align="center" bgcolor="#FFFFFF">&nbsp;<font color="ff0000">统一修改</font>
                                                <input class="za_text" size="6" name="money" />&nbsp;
                                                <input name="button2" class="btn4" type="button" onClick="quick0()" value="转送" />
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </form>
                    </table>

                </td>
            </tr>
        </tbody>
    </table>


</body>