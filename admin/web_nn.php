<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
if (strpos($flag, "10")) {
} else {
    echo "<center>你没有该权限功能!</center>";
    exit;
}
if ($_GET['save'] == "save") {
    $i = 1;
    for (; $i <= 49; $i += 1) {
        $xr = $_POST["Num_" . $i];
        $class3 = $_POST["class3_" . $i];
      
        $db1->query("update web_bl set xr=".$xr." where class2='特A' and  class3='".$class3."'");
        $db1->query("update web_bl set xr=".$xr." where class2='特B' and  class3='".$class3."'");
    }
    echo "<script language='javascript'>alert('设置成功！');window.location.href='main.php?action=web_nn&uid={$uid}';</script>";
    exit;
}?>


<SCRIPT language=JAVASCRIPT>
    function quick0() {
        var mm = document.all.money.value;
        for (var i = 1; i < 50; i++) { document.all["Num_" + i].value = mm; }
    }
</script>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<link rel="stylesheet" href="css/ball.css" type="text/css">
<body>
<div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;系统管理－</span><span class="font_b">单期限额设置&nbsp;</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright">
          <input name="button" type="button" class="za_button" onClick="javascript:location.reload();" value="更新" />
      </div>
</div> 

    <table width="900" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td>&nbsp;</td>
        </tr>
    </table>
    <?
    $result = $db1->query("select xr, class3 from web_bl where class2='特A' order by ID");
$drop_table = array();
$y = 0;
while ($image = $result->fetch_array()) {
    ++$y;
    array_push($drop_table, $image);
}
?>
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
        <form name=form1 action="main.php?action=web_nn&uid=<?=$uid?>&save=save" method=post>
            <tbody>
                <td colspan="10" align="center" class="t_list_caption">单期限额设置</td>
            <tr>
               <td height="30" width="40" align="center"  class="t_list_tr_3">号码</span>
                </td>
                <td align="center" class="t_list_tr_3">限额</span>
                </td>
                 <td height="30" width="40" align="center"  class="t_list_tr_3">号码</span>
                </td>
                 <td align="center" class="t_list_tr_3">限额</span>
                </td>
                 <td height="30" width="40" align="center"  class="t_list_tr_3">号码</span>
                </td>
                 <td align="center" class="t_list_tr_3">限额</span>
                </td>
                 <td height="30" width="40" align="center"  class="t_list_tr_3">号码</span>
                </td>
                 <td align="center" class="t_list_tr_3">限额</span>
                </td>
                 <td height="30" width="40" align="center"  class="t_list_tr_3">号码</span>
                </td>
                 <td align="center" class="t_list_tr_3">限额</span>
                </td>
            </tr>
            <?$I = 1;
for (; $I <= 10; $I += 1) {?>
            <tr height="27" align="center" bgcolor="#FFFFFF">
                <td width="27" height="27" align="center" bordercolor="#dcdcdc" bgcolor="#FFFFFF" class="No_<?=$I?>"></td>
                <td width="153" height="27" align="center" bordercolor="#dcdcdc" bgcolor="#FFFFFF"><input name="Num_<?=$I?>" class="za_text" value="<?=$drop_table[$I - 1][0]?>" size="10" maxlength="8" />
                <input name="class3_<?=$I?>" value="<?=$drop_table[$I - 1][1]?>" type="hidden"></td>
                <td width="27" height="27" align="center" bordercolor="#dcdcdc" bgcolor="#FFFFFF" class="No_<?=$I + 10?>"></td>
                <td width="153" height="27" align="center" bordercolor="#dcdcdc" bgcolor="#FFFFFF"><input
                        name="Num_<?=$I + 10?>" class="za_text" value="<?=$drop_table[$I + 10 - 1][0]?>
    " size="10" maxlength="8" />

                    <input name="class3_<?=$I + 10?>" value="<?=$drop_table[$I + 10 - 1][1]?>" type="hidden">
                </td>

                <td width="27" height="27" align="center" bordercolor="#dcdcdc" bgcolor="#FFFFFF"
                    class="No_<?=$I + 20?>"></td>

                <td width="153" height="27" align="center" bordercolor="#dcdcdc" bgcolor="#FFFFFF"><input
                        name="Num_<?=$I + 20?>" class="za_text" value="<?=$drop_table[$I + 20 - 1][0]?>" size="10"
                        maxlength="8" />

                    <input name="class3_<?=$I + 20?>" value="<?=$drop_table[$I + 20 - 1][1]?>" type="hidden">
                </td>

                <td width="27" height="27" align="center" bordercolor="#dcdcdc" bgcolor="#FFFFFF"
                    class="No_<?=$I + 30?>"></td>

                <td width="153" height="27" align="center" bordercolor="#dcdcdc" bgcolor="#FFFFFF"><input
                        name="Num_<?=$I + 30?>" class="za_text" value="
    <?=$drop_table[$I + 30 - 1][0]?>" size="10" maxlength="8" />

                    <input name="class3_<?=$I + 30?>" value="<?=$drop_table[$I + 30 - 1][1]?>" type="hidden">
                </td>
                <? if ($I != 10) {?>
                <td width="27" height="27" align="center" bordercolor="#dcdcdc" bgcolor="#FFFFFF"
                    class="No_<?=$I + 40?>"></td>

                <td width="153" height="27" align="center" bordercolor="#dcdcdc" bgcolor="#FFFFFF"><input
                        name="Num_<?=$I + 40?>" class="za_text" value="
        <?=$drop_table[$I + 40 - 1][0]?>" size="10" maxlength="8" />

                    <input name="class3_<?=$I + 40?>" value="<?=$drop_table[$I + 40 - 1][1]?>" type="hidden">
                </td>
                <?} else {?>
                <td width="27" height="27" align="center" bordercolor="#dcdcdc" bgcolor="#FFFFFF">&nbsp;</td>
                <td width="27" height="27" align="center" bordercolor="#dcdcdc" bgcolor="#FFFFFF">&nbsp;</td>
                <?}?>
     </tr>   
<?}?>
            <tr>
                <td colspan="12" align="center" bordercolor="#dcdcdc" bgcolor="#FFFFFF">&nbsp;<font color="ff0000">统一修改
                    </font>
                    <input class="za_text" size="6"  name="money" />&nbsp;
                    <input name="button2" class="btn2" type="button" onClick="quick0()"
                        value="转送" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn1" onClick="submit()">确认修改</button>
                </td>
            </tr>
            </tbody>
        </form>
    </table>
</body>