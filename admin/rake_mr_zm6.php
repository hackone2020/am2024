<?php

if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
if (strpos($flag, "02")) {
} else {
    echo "<center>��û�и�Ȩ�޹���!</center>";
    exit;
}
$ids = "����1-6";
if ($_GET['act'] == "edit") {
    $tt = 1;
    for (; $tt <= 66; ++$tt) {
        if (empty($_POST["Num_" . $tt])) {
            echo "<script>alert('���ʲ���Ϊ��:" . $_POST["Num_" . $tt] . "/" . $tt . "!');window.location.href='main.php?action=rake_mr_zm6&uid={$uid}&ids=" . $ids . "';</script>";
            exit;
        }
    }
    $tt = 1;
    for (; $tt <= 66; ++$tt) {
        $num = $_POST["Num_" . $tt];
        $class3 = $_POST["class3_" . $tt];
        $class2 = $_POST["class2_" . $tt];
        $db1->query("update web_bl  set mrate=" . $num . " where class1='����1-6' and class2='" . $class2 . "' and  class3='" . $class3 . "'");
        if ($class3 != "�ϵ�" && $class3 != "��˫" && $class3 != "�ϴ�" && $class3 != "��С") {
            $db1->query("update web_bl  set mrate=" . $num . " where class1='����' and class2='" . $class2 . "' and  class3='" . $class3 . "'");
        }
    }
    echo "<script>alert('�޸ĳɹ�!');window.location.href='main.php?action=rake_mr_zm6&uid={$uid}&ids=" . $ids . "';</script>";
    exit;
}
$result = $db1->query("select mrate,class3,class2 from web_bl where class1='����1-6'   Order By ID");
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
<body>
<div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;Ĭ���������ã�</span><span class="font_b"><?=$ids?>&nbsp;</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
</div>      
<table width="100%" border="0" cellspacing="1" cellpadding="0">
    <tbody>
        <tr><!--left-->
            <td width="260" align="center" valign="top" style="margin-top:2px;"><?require_once "rake_mr_header.php";?></td>
<td valign="top" style="margin-top:2px;">
  <table width="100%" height="136" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list" >
    <form name="form1" method="post" action="main.php?action=rake_mr_zm6&uid=<?=$uid?>&act=edit&ids=<?=$ids?>">
        <tbody>
            <? $B = 1;
for (; $B <= 2; $B += 1) {
    if ($B == 1) {?>
            <tr>
                <td height="17" colspan="3" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">����1
                </td>
                <td height="17" colspan="3" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">����2
                </td>
                <td height="17" colspan="3" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">����3
                </td>
            </tr>
            <tr>
                <td width="4%" height="28" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_tr_3"> ����</td>
                <td width="4%" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_tr_3"> Ĭ������</td>
                <td width="4%" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_tr_3"> �޸�</td>
                <td width="4%" height="28" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_tr_3"> ����</td>
                <td width="4%" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_tr_3"> Ĭ������</td>
                <td width="4%" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_tr_3"> �޸�</td>
                <td width="4%" height="28" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_tr_3"> ����</td>
                <td width="4%" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_tr_3"> Ĭ������</td>
                <td width="4%" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_tr_3"> �޸�</td>
            </tr>
            <? $I = 1;
        for (; $I <= 11; $I += 1) {?>
            <tr>
                <td height="25" align="center" bgcolor="#FFFFFF">
                    <font color="<?=get_bs_css($showtable[$I - 1][1])?>"> <?=$showtable[$I - 1][1]?></font> <input name="class2_<?=$I?>" value="<?=$showtable[$I - 1][2]?>" type="hidden">
                </td>
                <td height="25" align="center" bgcolor="#FFFFFF"><?=$showtable[$I - 1][0]?></td>
                <td height="25" align="center" bgcolor="#FFFFFF"><input style="HEIGHT: 18px" class="za_text"
                        maxlength="6" size="4" value="<?=$showtable[$I - 1][0]?>" name="Num_<?=$I?>" />

                    <input name="class3_<?=$I?>" value="<?=$showtable[$I - 1][1]?>" type="hidden">
                </td>

                <td height="25" align="center" bgcolor="#FFFFFF">
                    <font color="<?=get_bs_css($showtable[$I + 11 - 1][1])?>"><?=$showtable[$I + 11 - 1][1]?>
                    </font>

                    <input name="class2_<?=$I + 11?>" value="<?=$showtable[$I + 11 - 1][2]?>" type="hidden">
                </td>

                <td height="25" align="center" bgcolor="#FFFFFF"><?=$showtable[$I + 11 - 1][0]?></td>
                <td height="25" align="center" bgcolor="#FFFFFF"><input style="HEIGHT: 18px" class="za_text"
                        maxlength="6" size="4" value="<?=$showtable[$I + 11 - 1][0]?>" name="Num_<?=$I + 11?>" /> <input name="class3_<?=$I + 11?>" value="<?=$showtable[$I + 11 - 1][1]?>" type="hidden"></td>

                <td height="25" align="center" bgcolor="#FFFFFF">
                    <font color="<?=get_bs_css($showtable[$I + 22 - 1][1])?>"><?=$showtable[$I + 22 - 1][1]?>
                    </font>

                    <input name="class2_<?=$I + 22?>" value="<?=$showtable[$I + 22 - 1][2]?>" type="hidden">
                </td>
                <td height="25" align="center" bgcolor="#FFFFFF"><?=$showtable[$I + 22 - 1][0]?></td>
                <td height="25" align="center" bgcolor="#FFFFFF"><input style="HEIGHT: 18px" class="za_text"
                        maxlength="6" size="4" value="<?=$showtable[$I + 22 - 1][0]?>" name="Num_<?=$I + 22?>" /><input name="class3_<?=$I + 22?>" value="<?=$showtable[$I + 22 - 1][1]?>" type="hidden"></td>
            </tr>
            <?}?>
            <?} else {?>
            <tr>
                <td height="18" colspan="3" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">����4
                </td>
                <td height="18" colspan="3" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">����5
                </td>
                <td height="18" colspan="3" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">����6
                </td>
            </tr>
            <tr>
                <td width="4%" height="28" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_tr_3"> ����</td>
                <td width="4%" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_tr_3"> Ĭ������</td>
                <td width="4%" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_tr_3"> �޸�</td>
                <td width="4%" height="28" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_tr_3"> ����</td>
                <td width="4%" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_tr_3"> Ĭ������</td>
                <td width="4%" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_tr_3"> �޸�</td>
                <td width="4%" height="28" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_tr_3"> ����</td>
                <td width="4%" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_tr_3"> Ĭ������</td>
                <td width="4%" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_tr_3"> �޸�</td>
            </tr>
            <?  $I = 1;
        for (; $I <= 11; $I += 1) {?>
            <tr>
                <td height="25" align="center" bgcolor="#FFFFFF">
                    <font color="<?=get_bs_css($showtable[$I + 33 - 1][1])?>">
                        <?=$showtable[$I + 33 - 1][1]?>
                    </font> <input name="class2_<?=$I + 33?>" value="<?=$showtable[$I + 33 - 1][2]?>" type="hidden">
                </td>

                <td height="25" align="center" bgcolor="#FFFFFF"><?=$showtable[$I + 33 - 1][0]?></td>
                <td height="25" align="center" bgcolor="#FFFFFF"><input style="HEIGHT: 18px" class="za_text"
                        maxlength="6" size="4" value="<?=$showtable[$I + 33 - 1][0]?>" name="Num_<?=$I + 33?>" />


                    <input name="class3_<?=$I + 33?>" value="<?=$showtable[$I + 33 - 1][1]?>" type="hidden">
                </td>

                <td height="25" align="center" bgcolor="#FFFFFF">
                    <font color="<?=get_bs_css($showtable[$I + 44 - 1][1])?>">
                        <?=$showtable[$I + 44 - 1][1]?>
                    </font> <input name="class2_<?=$I + 44?>" value="<?=$showtable[$I + 44 - 1][2]?>" type="hidden">
                </td>

                <td height="25" align="center" bgcolor="#FFFFFF"><?=$showtable[$I + 44 - 1][0]?></td>
                <td height="25" align="center" bgcolor="#FFFFFF"><input style="HEIGHT: 18px" class="za_text"
                        maxlength="6" size="4" value="<?=$showtable[$I + 44 - 1][0]?>" name="Num_<?=$I + 44?>" /> 
                <input name="class3_<?=$I + 44?>" value="<?=$showtable[$I + 44 - 1][1]?>" type="hidden"></td>

                <td height="25" align="center" bgcolor="#FFFFFF">
                    <font color="<?=get_bs_css($showtable[$I + 55 - 1][1])?>"><?=$showtable[$I + 55 - 1][1]?>
                    </font>
                    <input name="class2_<?=$I + 55?>" value="<?=$showtable[$I + 55 - 1][2]?>" type="hidden">
                </td>
                <td height="25" align="center" bgcolor="#FFFFFF"><?=$showtable[$I + 55 - 1][0]?></td>
                <td height="25" align="center" bgcolor="#FFFFFF"><input style="HEIGHT: 18px" class="za_text"
                        maxlength="6" size="4" value="<?=$showtable[$I + 55 - 1][0]?>" name="Num_<?=$I + 55?>" /><input name="class3_<?=$I + 55?>" value="<?=$showtable[$I + 55 - 1][1]?>" type="hidden"></td>
            </tr>
            <? }
    }
}?>
            <tr>
                <td height="25" colspan="9" align="center" bgcolor="#FFFFFF">
                            <input type="submit"  class="btn1" name="Submit2" value="�ύ" />&nbsp;<input type="reset" class="btn2" name="Submit3" value="����" /></td>
                        </tr>
        </form>
    </table>
        </td>
    </tr>
    </tbody>
    </table>
</body>