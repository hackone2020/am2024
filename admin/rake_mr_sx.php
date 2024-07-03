<?php

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
    $ids = "一肖";
}
if ($ids != "一肖" && $ids != "一肖不中" && $ids != "特肖" && $ids != "六肖" && $ids != "二肖连中" && $ids != "二肖连不中" && $ids != "三肖连中" && $ids != "三肖连不中" && $ids != "四肖连中" && $ids != "四肖连不中" && $ids != "五肖连中" && $ids != "五肖连不中") {
    $ids = "一肖";
}
if ($_GET['act'] == "edit") {
    $tt = 1;
    for (; $tt <= 12; ++$tt) {
        if (empty($_POST["lm" . $tt])) {
            echo "<script>alert('赔率不能为空:" . $_POST["Num_" . $tt] . "/" . $tt . "!');window.location.href='main.php?action=rake_mr_sx&uid={$uid}&ids=" . $ids . "';</script>";
            exit;
        }
    }
    $tt = 1;
    for (; $tt <= 12; ++$tt) {
        $num = $_POST["lm" . $tt];
        $class3 = $_POST["class3_" . $tt];
        $class2 = $_POST["class2_" . $tt];
        $db1->query("update web_bl  set mrate=" . $num . " where (class1='生肖' or class1='生肖连') and class2='" . $class2 . "' and  class3='" . $class3 . "'");
    }
    echo "<script>alert('修改成功!');window.location.href='main.php?action=rake_mr_sx&uid={$uid}&ids=" . $ids . "';</script>";
    exit;
}
$result = $db1->query("Select mrate,class3,class2 from web_bl where (class1='生肖' or class1='生肖连') and class2='" . $ids . "' Order By ID");
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
<script language=JAVASCRIPT>function quick0() { var mm = $("money").value; for (var i = 1; i < 13; i++) { $("lm" + i).value = mm; } }</script>
<body>
<div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;默认赔率设置－</span><span class="font_b"><?=$ids?>&nbsp;</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
</div> 
 <table width="100%" border="0" cellspacing="1" cellpadding="0">
    <tbody>
        <tr><!--left-->
            <td width="260" align="center" valign="top" style="margin-top:2px;"><?require_once "rake_mr_header.php";?></td>
<td valign="top" style="margin-top:2px;">
  <table width="100%" height="136" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list" >
        <form name="form1" method="post" action="main.php?action=rake_mr_sx&uid=<?=$uid?>&act=edit&ids=<?=$ids?>">
            <tbody>
                <tr>
                    <TD height=19 colSpan=2 bgcolor="#FFFFFF" class="t_list_caption">类型</TD>
                    <TD width="22%" bgcolor="#FFFFFF" class="t_list_caption">默认赔率</TD>
                    <TD width="22%" bgcolor="#FFFFFF" class="t_list_caption">修改</TD>
                </TR>
                <?$ii = 0;
$I = 0;
for (; $I <= 11; $I += 1) {?>
                <TR>
                    <TD width="15%" height="30" align="center" bgcolor="#FFFFFF">
                        <?=$showtable[$I][2]?>
                    </TD>
                    <TD width="15%" height="30" align="center" bgcolor="#FFFFFF">
                        <?=$showtable[$I][1]?>
                    </TD>
                    <td height="25" align="center" bgcolor="#FFFFFF"><?=$showtable[$I][0]?></td>
                    <TD align="center" bgcolor="#FFFFFF">
                        <table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td><INPUT style="HEIGHT: 18px" class="za_text" size=10 value='<?=$showtable[$I][0]?>' name="lm<?=$I + 1?>">

                                    <input name="class3_<?=$I + 1?>" value="<?=$showtable[$I][1]?>" type="hidden">

                                    <input name="class2_<?=$I + 1?>" value="<?=$showtable[$I][2]?>" type="hidden">
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                        </table>
                    </TD>
                </TR>
                <? ++$ii;
}?>
                <TR>
                    <TD colspan="4" align="center" bgcolor="#FFFFFF">
                        <font color="ff0000">统一修改</font>
                        <input class="za_text" size="6" name="money" />&nbsp;
                        <input name="button2" class="btn4" type="button" onClick="quick0()" value="转送" />
                        <input type="submit" class="btn1" name="Submit2"  value="提交" />
                        <input type="reset" class="btn2" name="Submit3" value="重置" />
                    </td>
                </TR>
            </TBODY>
        </form>
    </TABLE>
    </td>
    </tr>
    </tbody>
    </table>
</body>