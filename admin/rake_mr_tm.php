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
    $ids = "特A";
}
$abblc = get_config("tm");
if ($_GET['act'] == "edit") {
    $tt = 1;
    for (; $tt <= 62; ++$tt) {
        if (empty($_POST["Num_" . $tt])) {
            echo "<script>alert('赔率不能为空:" . $tt . "!');window.location.href='main.php?action=rake_mr_tm&uid={$uid}&ids=" . $ids . "';</script>";
            exit;
        }
    }
    $tt = 1;
    for (; $tt <= 62; ++$tt) {
        $num = $_POST["Num_" . $tt];
        $num1 = $num + $abblc;
        $num2 = $num - $abblc;
        $class3 = $_POST["class3_" . $tt];
        $db1->query("update web_bl  set mrate=" . $num . " where class2='" . $ids . "' and  class3='" . $class3 . "'");
        if ($ids == "特A") {
            if ($tt <= 49) {
                $db1->query("update web_bl set mrate=" . $num1 . " where class2='特B' and  class3='" . $_POST["class3_" . $tt] . "'");
            } else {
                $db1->query("update web_bl set mrate=" . $num . " where class2='特码' and  class3='" . $_POST["class3_" . $tt] . "'");
            }
        } else {
            if ($tt <= 49) {
                $db1->query("update web_bl set mrate=" . $num2 . " where class2='特A' and  class3='" . $_POST["class3_" . $tt] . "'");
            } else {
                $db1->query("update web_bl set mrate=" . $num . " where class2='特码' and  class3='" . $_POST["class3_" . $tt] . "'");
            }
        }
    }
    echo "<script>alert('修改成功!');window.location.href='main.php?action=rake_mr_tm&uid={$uid}&ids=" . $ids . "';</script>";
    exit;
}
$result = $db1->query("Select mrate,class3,locked from web_bl where class2='" . $ids . "' or class2='特码' Order By ID  LIMIT 62");
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
<script language=JAVASCRIPT>function quick0() { var mm = $("money").value; for (var i = 1; i < 50; i++) { $("Num_" + i).value = mm; } }</script>
<body>
<div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;赔率设置&nbsp;</span><span class="font_b">默认赔率 &nbsp;</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
</div>
<table width="100%" border="0" cellspacing="1" cellpadding="0">
    <tbody>
        <tr><!--left-->
            <td width="260" align="center" valign="top" style="margin-top:2px;"><?require_once "rake_mr_header.php";?></td>
<td valign="top" style="margin-top:2px;">
    <table width="100%" height="136" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list" >
        <form name="form1" method="post" action="main.php?action=rake_mr_tm&uid=<?=$uid?>&act=edit&ids=<?=$ids?>">
            <tbody>
            <tr>
                <td width="6.6%" height="17" align="center" nowrap="nowrap" class="t_list_caption"> 号码</td>
                <td width="6.6%" align="center" nowrap="nowrap" class="t_list_caption"> 默认赔率</td>
                <td width="6.6%" align="center" nowrap="nowrap" class="t_list_caption"> 修改</td>
                <td width="6.6%" height="17" align="center" nowrap="nowrap" class="t_list_caption"> 号码</td>
                <td width="6.6%" align="center" nowrap="nowrap" class="t_list_caption"> 默认赔率</td>
                <td width="6.6%" align="center" nowrap="nowrap" class="t_list_caption"> 修改</td>
                <td width="6.6%" height="17" align="center" nowrap="nowrap" class="t_list_caption"> 号码</td>
                <td width="6.6%" align="center" nowrap="nowrap" class="t_list_caption"> 默认赔率</td>
                <td width="6.6%" align="center" nowrap="nowrap" class="t_list_caption"> 修改</td>
                <td width="6.6%" height="17" align="center" nowrap="nowrap" class="t_list_caption"> 号码</td>
                <td width="6.6%" align="center" nowrap="nowrap" class="t_list_caption"> 默认赔率</td>
                <td width="6.6%" align="center" nowrap="nowrap" class="t_list_caption"> 修改</td>
                <td width="6.6%" height="17" align="center" nowrap="nowrap" class="t_list_caption"> 号码</td>
                <td width="6.6%" align="center" nowrap="nowrap" class="t_list_caption"> 默认赔率</td>
                <td width="6.6%" align="center" nowrap="nowrap" class="t_list_caption"> 修改</td>
            </tr>
            <? $I = 1;
for (; $I <= 10; $I += 1) {?>
            <tr bgcolor="#FFFFFF">
                <td height="30" align="center" bgcolor="#FFFFFF">
                    <div class="No_<?=intval($I)?>"></div>
                </td>

                <td height="25" align="center" bgcolor="#FFFFFF"><?=$showtable[$I - 1][0]?></td>
                
                <td height="25" align="center" bgcolor="#FFFFFF"><input style="HEIGHT: 18px" class="za_text"
                        maxlength="6" size="4" value="<?=$showtable[$I - 1][0]?>" name="Num_<?=$I?>" />

                    <input name="class3_<?=$I?>" value="<?=$showtable[$I - 1][1]?>" type="hidden">
                </td>
                <td height="30" align="center" bgcolor="#FFFFFF">
                    <div class="No_<?=intval($I + 10)?>"></div>
                </td>
                <td height="25" align="center" bgcolor="#FFFFFF"><?=$showtable[$I + 10 - 1][0]?></td>
                <td height="25" align="center" bgcolor="#FFFFFF"><input style="HEIGHT: 18px" class="za_text"
                        maxlength="6" size="4" value="<?=$showtable[$I + 10 - 1][0]?>" name="Num_<?=$I + 10?>" />

                    <input name="class3_<?=$I + 10?>" value="<?=$showtable[$I + 10 - 1][1]?>" type="hidden">
                </td>

                <td height="30" align="center" bgcolor="#FFFFFF">
                    <div class="No_<?=intval($I + 20)?>"></div>
                </td>
                <td height="25" align="center" bgcolor="#FFFFFF"><?=$showtable[$I + 20 - 1][0]?></td>
                <td height="25" align="center" bgcolor="#FFFFFF"><input style="HEIGHT: 18px" class="za_text"
                        maxlength="6" size="4" value="<?=$showtable[$I + 20 - 1][0]?>" name="Num_<?=$I + 20?>" />

                    <input name="class3_<?=$I + 20?>" value="<?=$showtable[$I + 20 - 1][1]?>" type="hidden">
                </td>

                <td height="30" align="center" bgcolor="#FFFFFF">
                    <div class="No_<?=intval($I + 30)?>"></div>
                </td>
                <td height="25" align="center" bgcolor="#FFFFFF"><?=$showtable[$I + 30 - 1][0]?></td>
                <td height="25" align="center" bgcolor="#FFFFFF"><input style="HEIGHT: 18px" class="za_text"
                        maxlength="6" size="4" value="<?=$showtable[$I + 30 - 1][0]?>" name="Num_<?=$I + 30?>" />
                    <input name="class3_<?=$I + 30?>" value="<?=$showtable[$I + 30 - 1][1]?>" type="hidden">
                </td>
                
                <?  if ($I != 10) {?>
                <td height="30" align="center" bgcolor="#FFFFFF">
                    <div class="No_<?=intval($I + 40)?>"></div>
                </td>
                <td height="25" align="center" bgcolor="#FFFFFF"><?=$showtable[$I + 40 - 1][0]?></td>
                <td height="25" align="center" bgcolor="#FFFFFF"><input style="HEIGHT: 18px" class="za_text"
                        maxlength="6" size="4" value="<?=$showtable[$I + 40 - 1][0]?>" name="Num_<?=$I + 40?>" />

                    <input name="class3_<?=$I + 40?>" value="<?=$showtable[$I + 40 - 1][1]?>" type="hidden">
                </td>
                <? } else {?>
                <td height="21" align="center" bgcolor="#FFFFFF">&nbsp;</td>
                <td height="21" align="center" bgcolor="#FFFFFF">&nbsp;</td>
                <td height="21" align="center" bgcolor="#FFFFFF">&nbsp;</td>
                <?}?>
    </tr>
<?}?>
                <?
$I = 1;
for (; $I <= 2; $I += 1) {?>
            <tr bgcolor="#FFFFFF">
                <td height="30" align="center" bgcolor="#FFFFFF" class="font_bold">
                    <?=$showtable[$I + 48][1]?>
                </td>
                <td height="25" align="center" bgcolor="#FFFFFF"><?=$showtable[$I + 48][0]?></td>
                <td height="25" align="center" bgcolor="#FFFFFF"><input style="HEIGHT: 18px" class="za_text"
                        maxlength="6" size="4" value="<?=$showtable[$I + 48][0]?>" name="Num_<?=$I + 49?>" /> <input name="class3_<?=$I + 49?>" value="<?=$showtable[$I + 48][1]?>" type="hidden"></td>

                <td height="30" align="center" bgcolor="#FFFFFF" class="font_bold">
                    <?=$showtable[$I + 50][1]?>
                </td>
                <td height="25" align="center" bgcolor="#FFFFFF"><?=$showtable[$I + 50][0]?></td>
                <td height="25" align="center" bgcolor="#FFFFFF"><input style="HEIGHT: 18px" class="za_text"
                        maxlength="6" size="4" value="<?=$showtable[$I + 50][0]?>" name="Num_<?=$I + 51?>" /> <input name="class3_<?=$I + 51?>" value="<?=$showtable[$I + 50][1]?>" type="hidden"></td>

                <td height="30" align="center" bgcolor="#FFFFFF" class="font_bold"><?=$showtable[$I + 52][1]?></td>
                <td height="25" align="center" bgcolor="#FFFFFF"><?=$showtable[$I + 52][0]?></td>
                <td height="25" align="center" bgcolor="#FFFFFF"><input style="HEIGHT: 18px" class="za_text"
                        maxlength="6" size="4" value="<?=$showtable[$I + 52][0]?>" name="Num_<?=$I + 53?>" />

                    <input name="class3_<?=$I + 53?>" value="<?=$showtable[$I + 52][1]?>" type="hidden">
                </td>
                <td height="30" align="center" bgcolor="#FFFFFF" class="font_bold">
                    <?=$showtable[$I + 54][1]?>
                </td>
                <td height="25" align="center" bgcolor="#FFFFFF"><?=$showtable[$I + 54][0]?></td>
                <td height="25" align="center" bgcolor="#FFFFFF"><input style="HEIGHT: 18px" class="za_text"  maxlength="6" size="4" value="<?=$showtable[$I + 54][0]?>" name="Num_<?=$I + 55?>" />

                    <input name="class3_<?=$I + 55?>" value="<?=$showtable[$I + 54][1]?>" type="hidden">
                </td>
                <td height="30" align="center" bgcolor="#FFFFFF" class="font_bold">
                    <?=$showtable[$I + 56][1]?>
                </td>
                <td height="25" align="center" bgcolor="#FFFFFF"><?=$showtable[$I + 56][0]?></td>
                <td height="25" align="center" bgcolor="#FFFFFF"><input style="HEIGHT: 18px" class="za_text"
                        maxlength="6" size="4" value="<?=$showtable[$I + 56][0]?>" name="Num_<?=$I + 57?>" />
                    <input name="class3_<?=$I + 57?>" value="<?=$showtable[$I + 56][1]?>" type="hidden">
                </td>
            </tr>
            <? }?>
            <tr>
                <td height="30" align="center" bgcolor="#FFFFFF" class="font_bold">
                    <font color=red>
                        <?=$showtable[59][1]?>
                    </font>
                </td>
                <td height="25" align="center" bgcolor="#FFFFFF"><?=$showtable[59][0]?></td>
                <td height="25" align="center" bgcolor="#FFFFFF"><input style="HEIGHT: 18px" class="za_text"
                        maxlength="6" size="4" value="<?=$showtable[59][0]?>" name="Num_60" />

                    <input name="class3_60" value="<?=$showtable[59][1]?>" type="hidden">
                </td>

                <td height="25" align="center" bgcolor="#FFFFFF" class="font_bold">
                    <font color=
<?if ($showtable[60][1] == "红波") {?>
                        "red"
                        <?} else {?>
                        <? if ($showtable[60][1] == "蓝波") {?>
                        "0000ff"
                        <?} else {?>
                        <?  if ($showtable[60][1] == "绿波") {?>
                        "green"
                        <?}?>
                        <?}?>
                        <?}?>
                        >
                        <?=$showtable[60][1]?>
                    </font>
                </td>
                <td height="25" align="center" bgcolor="#FFFFFF"><?=$showtable[60][0]?></td>
                <td height="25" align="center" bgcolor="#FFFFFF">
                    <input style="HEIGHT: 18px" class="za_text" maxlength="6" size="4" value="<?=$showtable[60][0]?>" name="Num_61" />

                    <input name="class3_61" value="<?=$showtable[60][1]?>" type="hidden">
                </td>
                <td height="25" align="center" bgcolor="#FFFFFF" class="font_bold">
                    <font color=
<?if ($showtable[61][1] == "红波") {?>
                        "red"
                        <?} else {?>
                        <? if ($showtable[61][1] == "蓝波") {?>
                        "0000ff"
                        <?} else {
        if ($showtable[61][1] == "绿波") {?>
                        "green"
                        <?}?>
                        <?}?>
                        <?}?>
                        >
                        <?=$showtable[61][1]?>
                    </font>
                </td>
                <td height="25" align="center" bgcolor="#FFFFFF"><?=$showtable[61][0]?></td>
                <td height="25" align="center" bgcolor="#FFFFFF">
                    <input style="HEIGHT: 18px" class="za_text" maxlength="6" size="4" value="<?=$showtable[61][0]?>" name="Num_62" />

                    <input name="class3_62" value="<?=$showtable[61][1]?>" type="hidden">
                </td>
                <td height="25" align="center" bgcolor="#FFFFFF">&nbsp;</td>
                <td height="25" align="center" bgcolor="#FFFFFF">&nbsp;</td>
                <td height="25" align="center" bgcolor="#FFFFFF">&nbsp;</td>
                <td height="25" align="center" bgcolor="#FFFFFF">&nbsp;</td>
                <td height="25" align="center" bgcolor="#FFFFFF">&nbsp;</td>
                <td height="25" align="center" bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
            <tr>
                <td height="30" colspan="15" align="center" bgcolor="#FFFFFF">
                <input type="submit" class="btn1" name="Submit2" value="修改" />&nbsp;<input type="reset"  class="btn2" name="Submit3"  value="重置" />
                </td>
            </tr>
            
            <tr>
                <td height="30" colspan="15" align="center" bgcolor="#FFFFFF">
                <font color="ff0000">快速设置:</font>&nbsp;号码1~49
                <input class="za_text" name="money" size="6"/>&nbsp;<input name="button2" type="button" class="btn4" onClick="quick0()" value="传送" />
                &nbsp;&nbsp;双面:
                <input class="za_text" name="money" size="6"/>&nbsp;<input name="button2" type="button" class="btn4" onClick="quick0()" value="传送" />
                </td>
                
            </tr>
        </form>
        </tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
</body>