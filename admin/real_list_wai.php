<?php

function get_html($cnum, $c1, $c2, $c3, $c4, $c5)
{
    global $uid;
    $html = "";
    switch ($c1) {
        case "����":
            $number_array = explode(",", $c2);
            $c3_array = explode(",", $c3);
            $number_count = count($number_array) - 1;
            $html = "����:" . $number_count . "��1" . "<br>";
            $t = 0;
            for (; $t < $number_count; $t += 1) {
                $y = $t * 2;
                $html .= "<font color='red' class='fontsize'>" . $number_array[$t] . "</font>-<font color='green' class='fontsize'>" . $c3_array[$y] . "</font>@<font color='blue' class='fontsize'>" . $c3_array[$y + 1] . "</font><br>";
                break;
            }
        case "����":
            $html = $c2 . "��<font color='red' class='fontsize'>" . $c3 . "</font>";
            $html .= "<br>�� " . $c4 . " �� ÿ��: <font color='green' class='fontsize'>" . $c5 / $c4 . "</font>";
            break;
        case "��ѡ����":
            $html = $c2 . "��<font color='red' class='fontsize'>" . $c3 . "</font>";
            $html .= "<br>�� " . $c4 . " �� ÿ��: <font color='green' class='fontsize'>" . $c5 / $c4 . "</font>";
            break;
        default:
            $html = $c2 . "��<font color='red' class='fontsize'>" . $c3 . "</font>";
            break;
    }
    return $html;
}
if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
if (strpos($flag, "11")) {
} else {
    echo "<center>��û�и�Ȩ�޹���!</center>";
    exit;
}
$sort = $_GET['sort'];
$orderby = $_GET['orderby'];
$username = $_GET['username'];
switch ($sort) {
    case "adddate":
        $vvv = "adddate";
        break;
    case "sum_m":
        $vvv = "sum_m";
        break;
    default:
        $vvv = "adddate";
        $sort = "adddate";
        break;
}
switch ($orderby) {
    case "desc":
        $vvv2 = "desc";
        break;
    case "asc":
        $vvv2 = "asc";
        break;
    default:
        $vvv2 = "desc";
        $orderby = "desc";
        break;
}
if ($username != "") {
    $term = "and username='" . $username . "' ";
} else {
    $term = "";
}
$pagesize = 25;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$result = $db1->query("select count(*) from web_tan  where dagu='���' and kithe='" . $Current_Kithe_Num . "' " . $term . "  order by id desc");
$num1=$result->fetch_array();
$num = $num1[0];
$total = $num;
$pagecount = ceil($total / $pagesize);
if ($pagecount < $page) {
    $page = $pagecount;
}
if ($page <= 0) {
    $page = 1;
}
$offset = ($page - 1) * $pagesize;
$pre = $page - 1;
$next = $page + 1;
$first = 1;
$last = $pagecount;
?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<script src="js/function.js" type="text/javascript"></script>
<script src="js/report_func.js" type="text/javascript"></script>
<script language=javascript>
 function onLoad() {
        var obj_orderby = $("orderby");
        obj_orderby.value = "<?=$orderby?>";
        var obj_page = $("page");
        obj_page.value = "<?=$page?>";
        var obj_sort = $("sort");
        obj_sort.value = "<?=$sort?>";
        var obj_username = $("username");
        obj_username.value = "<?=$username?>";
    }

</script>
<body style="min-width: 1200px;width: 100%">
 <div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">��������&nbsp;</span><span class="font_b">����ע��</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright">
    <table width="874" border="0" cellspacing="0" cellpadding="0">
        <form action="main.php" method="get" name="myFORM" id="myFORM">
          <tbody>
            <tr>
                <td height="28" style="color:#fff;">&nbsp;&nbsp;�����������ע���� <input name="button" type="button" class="za_button"
                        onClick="javascript:location.reload();" value="����" />
                        ����:
                    <select id="sort" name="sort" onChange="document.myFORM.submit();" class="za_select">
                        <option value="adddate">��עʱ��</option>
                        <option value="sum_m">��ע���</option>
                    </select>
                    <select id="orderby" name="orderby" onChange="document.myFORM.submit()" class="za_select">
                        <option value="desc">����(�ɴ�С)</option>
                        <option value="asc">����(��С����)</option>
                    </select>
                    ��ע�û�:
                    <input name="username" id="username" type=text class="za_text" value="" size="12" maxlength="12">
                    ��ҳ��&nbsp;:&nbsp;
                    <select id="page" name="page" onChange="document.myFORM.submit()" class="za_select">";
                        <?if ($pagecount == 0) {?>
                        <option value='0'>0</option>
                        <?} else {?>
                        <? $i = 0;
    for (; $i < $pagecount; ++$i) {?>
       <option value='<?=$i + 1?>'><?=$i + 1?></option>
   <? }
}?>
                    </select>
                &nbsp;/&nbsp;<?=$pagecount?>&nbsp;ҳ 
                    <input name="button2" type="submit" class="za_button" id="button" value="��ѯ">
                    <input name="action" type="hidden" id="action" value="real_list_wai" />
                    <input name="uid" type="hidden" id="uid" value="<?=$uid?>" />
                </td>
            </tr>
        </form>
        </tbody>
    </table>
</div>
</div>          
    <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list bet">
        <tbody>
        <tr>
            <td width="123" height="20" align="center" class="t_list_caption">��ʱ��</td>
            <td width="54" align="center" class="t_list_caption">����/�̿�</td>
            <td width="71" align="center" class="t_list_caption">�û�</td>
            <td width="165" align="center" nowrap="nowrap" class="t_list_caption">��������</td>
            <td width="57" align="center" nowrap="nowrap" class="t_list_caption">����</td>
            <td width="77" align="center" nowrap="nowrap" class="t_list_caption">����������</td>
            <td width="53" align="center" class="t_list_caption">��ˮ���</td>
            <td width="55" align="center" nowrap="nowrap" class="t_list_caption">����IP</td>
        </tr>
        <?$result = $db1->query("select * from web_tan  where dagu='���' and kithe='" . $Current_Kithe_Num . "' " . $term . " order by " . $vvv . " " . $vvv2 . " limit " . $offset . "," . $pagesize);
if ($result->num_rows == 0) {?>
        <tr>
            <td align="center" bordercolor="cccccc" bgcolor="#FFFFFF" height="25" colspan="100%">�������������¼��</td>
        </tr>
        <? } else {?>
        <? while ($image = $result->fetch_array()) {?>
        <tr <? if ($image['qx']==1) {?>
            class="delete"
            <?}?>
            onMouseOver="setPointer(this, 0, 'over', '#FFFFFF', '#FFCC66', '#FFCC99');" onMouseOut="setPointer(this, 0,
            'out', '#FFFFFF', '#FFCC66', '#FFCC99');"> <td align="center" bordercolor="cccccc" bgcolor="#FFFFFF">
                <?=$image['num']?>
                <br />
                <font color="green" style="line-height: 14px;">
                    <?=$image['adddate']?>
                </font>
            </td>
            <td height="43" align="center" bordercolor="cccccc" bgcolor="#FFFFFF">
                <?=$image['kithe']?>
                <br />
                <font color="red">
                    <?=$image['abcd']?>��
                    <?=$image['user_ds']?>
                </font>
            </td>
            <td height="43" align="center" bordercolor="cccccc" bgcolor="#FFFFFF">
                <?=$image['username']?>
            </td>
            <td height="43" align="center" bordercolor="cccccc" bgcolor="#FFFFFF">
                <?=get_html($image['num'], $image['class1'], $image['class2'], $image['class3'], $image['sz'], $image['sum_m'])?>;
            </td>
            <td align="center" nowrap="nowrap" bordercolor="cccccc" bgcolor="#FFFFFF">
                <? if ($image['class1'] == "����" || $image['class1'] == "��ѡ����") {?>
                <? if ($image['class1'] == "��ѡ����") {?>
                <?=$image['ratelm1']?>
                <?} else {?>
                <? if ($image['class2'] == "���ж�" || $image['class2'] == "������") {?>
                <?=$image['ratelm1'] . "/" . $image['ratelm2'];?>
                <?} else {?>
                <?=$image['ratelm1']?>
                <?}
            }?>
                <?} else {?>
                <?=$image['rate']?>
                <?}?>
            </td>
            <td align="center" nowrap="nowrap" bordercolor="cccccc" bgcolor="#FFFFFF">
                <font color="#cc0000">
                    <?=round($image['sum_m'], 2)?>
                </font>
            </td>
            <td width="53" align="center" bordercolor="cccccc" bgcolor="#FFFFFF">
                <?=round($image['sum_m'] * $image['user_ds'] / 100, 2)?>
            </td>
            <td align="center" nowrap="nowrap" bordercolor="cccccc" bgcolor="#FFFFFF"><b>
                    <font color=blue>
                        <?=$image['ip']?>
                    </font>
                </b></td>
        </tr>
        <?}
}?>
        <tr>
            <td height="25" colspan="8" bordercolor="cccccc" bgcolor="#FFFFFF">
                <table width="98%" border="0" align="center" cellpadding="2" cellspacing="0" bordercolordark="#FFFFFF"
                    bordercolor="888888">
                    <tr>
                        <td height="26" align="center">

                            <span class="STYLE9">
                                ��ǰΪ��<?=$page?>ҳ&nbsp;��<?=$pagecount?>ҳ&nbsp;��<?=$total?>��¼
                            </span>&nbsp;
                            <a href="main.php?action=real_list_wai&uid=<?=$uid?>&sort=<?=$sort?>&orderby=<?=$orderby?>&username=<?=$username?>&page=1">��ҳ</a>
                            <a href="main.php?action=real_list_wai&uid=<?=$uid?>&sort=<?=$sort?>&orderby=<?=$orderby?>&username=<?=$username?>&page=<?=$pre?>">��һҳ</a>
                            <a href="main.php?action=real_list_wai&uid=<?=$uid?>&sort=<?=$sort?>&orderby=<?=$orderby?>&username=<?=$username?>&page=<?=$next?>">��һҳ</a>
                            <a href="main.php?action=real_list_wai&uid=<?=$uid?>&sort=<?=$sort?>&orderby=<?=$orderby?>&username=<?=$username?>&page=<?=$last?>">ĩҳ</a>

        <select name="page2" onChange="location.href='main.php?action=real_list_wai&uid=<?=$uid?>&sort=<?=$sort?>&orderby=<?=$orderby?>&username=<?=$username?>&page='+this.options[selectedIndex].value">

                                <?$i = 1;
                                for (; $i <= $pagecount; ++$i) {?>
                                <option value="<?=$i?>" <? if ($page==$i) {?>selected<?}?>>��<?=$i?>ҳ</option>
                                <?}?>

                            </select>&nbsp;
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
</body>