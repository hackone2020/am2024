<?php

if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
if (strpos($flag, "13")) {
} else {
    echo "<center>��û�и�Ȩ�޹���!</center>";
    exit;
}
if ($_POST['sdel'] != "") {
    $del_num = count($_POST['sdel']);
    $i = 0;
    for (; $i < $del_num; ++$i) {
        $db1->query("Delete from web_admin where id='{$sdel[$i]}'");
    }
    $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $jxadmin . "',kauser='" . $jxadmin . "',lx=3,text1='����Ա����',text2='����ɾ������Ա!!',ip='" . $userip . "'";
    $db1->query($sql);
    echo "<script>alert('ɾ���ɹ�!');window.location.href='main.php?action=user_gs_list&uid=" . $uid . "';</script>";
    exit;
}
if ($_GET['sdel'] != "") {
    $dell = $_GET['sdel'];
    $user = $_GET['name'];
    $db1->query("Delete from web_admin where id='{$sdel}'");
    $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $jxadmin . "',kauser='" . $jxadmin . "',lx=3,text1='����Ա����',text2='ɾ������Ա:" . $user . "',ip='" . $userip . "'";
    $db1->query($sql);
    echo "<script>alert('ɾ���ɹ�!'); window.location.href = 'main.php?action=user_gs_list&uid=" . $uid . "';</script>";
    exit;
}
$sort = $_GET['sort'];
$orderby = $_GET['orderby'];
switch ($sort) {
    case "lastlogin":
        $vvv = "lastlogin";
        break;
    case "username":
        $vvv = "username";
        break;
    default:
        $vvv = "username";
        $sort = "username";
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
$pagesize = 10;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$result = $db1->query("select count(*) from web_admin where username!='" . $jxadmin . "' and username!='admin'  order by id desc");
$num1 = $result->fetch_array();
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
<Script src="js/function.js" type="text/javascript"></script>
<script language=javaScript>
    function onLoad() {
        var obj_orderby = $("orderby");
        obj_orderby.value = '<?= $orderby ?>';
        var obj_page = $("page");
        obj_page.value = '<?= $page ?>';
        var obj_sort = $("sort");
        obj_sort.value = '<?= $sort ?>';
    }
</script>

<body style="min-width: 1200px;width: 100%">
    <div class="tit" id="tit">
        <form action="main.php" method="get" name="myFORM" id="myFORM">
            <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
            <div class="tit_center floatleft font_bold"><span class="font_g">�û�����</span> <span class="font_b">����Ա</span></div>
            <div class="tit_right floatleft"><img src="/images/tit_03.png" width="4" height="31" alt=""></div>
            <div class="biaoti_right floatright">
                <table border="0" align="right" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td height="28" style="color:#fff;">
                                ɸѡ:
                                <select id="status" name="status" onchange="CheckSelect()">
                                    <option value="all">ȫ��</option>
                                    <option value="1">����</option>
                                    <option value="3">ͣ��</option>
                                    <option value="2">��ͣ</option>
                                </select>&nbsp;&nbsp;
                                ����:
                                <select id="sort" name="sort" onchange="CheckSelect()">
                                    <option value="created_at">����ʱ��</option>
                                    <option value="User.last_login_at">����½ʱ��</option>
                                    <option value="UserMembership.credits">���ö��</option>
                                    <option value="`UserMembership.creditsRemaining`">���ö��</option>
                                    <option value="username">�˺�</option>
                                </select>
                                <select id="orderby" name="orderby" onchange="CheckSelect()">
                                    <option value="desc">����(�ɴ�С)</option>
                                    <option value="asc">����(��С����)</option>
                                </select>&nbsp;&nbsp;

                                <span>����:</span>



                                <select id="search" name="search">
                                    <option value="username">�û��˺�:</option>
                                    <option value="remark">�û���ע:</option>
                                </select>
                                <input name="like" type="text" class="inp1" id="like" onfocus="this.className='inp1m'" onblur="this.className='inp1'" value="" size="8">
                                <input name="button1" type="button" class="btn4" onmouseover="this.className='btn4m'" onmouseout="this.className='btn4'" onclick="Search();" value="����">&nbsp;&nbsp;
                                <input name="button2" type="button" class="btn2" onmouseover="this.className='btn2m'" onmouseout="this.className='btn2'" onclick="javascript:location.href='main.php?action=user_gs_add&uid=<?=$uid?>'" value="����">&nbsp;&nbsp;

                            </td>
                        </tr>
                    </tbody>
                </table>
        </form>
    </div>
    </div>

    <? $result = $db1->query("select * from web_admin where username!='" . $jxadmin . "' and username!='admin' order by " . $vvv . " " . $vvv2 . " limit " . $offset . "," . $pagesize);
    ?>
    <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bordercolordark="#FFFFFF" class="t_list">
        <tbody>
            <tr>
                <form name="form1" method="post" action="main.php?action=user_gs_list&uid=<?= $uid ?>">

                    <!--<td nowrap="" class="t_list_caption">-->
                    <!--    <input type="checkbox" name="sele" value="checkbox" onClick="javascript:checksel(this.form);" />-->
                    <!--</td>-->
                    <td width="26" nowrap class="t_list_caption">����</td>
                    <td nowrap="" class="t_list_caption">
                        �û�����
                    </td>
                    <td nowrap="" class="t_list_caption">�ʺ�</td>
                    <td align="center" class="t_list_caption">����ʱ��</td>
                    <td align="center" class="t_list_caption">����</td>
                    <td align="center" class="t_list_caption">״̬</td>
            </tr>
            <? $cou = $result->num_rows;
            if ($cou == 0) { ?>
                <tr class="m_title">
                    <td align="center" colspan="6" bgcolor="#fff" height="30">���޹���Ա</td>
                </tr>
                <? } else {
                while ($image = $result->fetch_array()) { ?>
                    <tr bgcolor="#ffffff">
                        <!--<td height="43" align="center" nowrap="">-->
                        <!--    <input name="sdel[]" type="checkbox" id="sdel" value="<?= $image['id'] ?>" />-->
                        <!--</td>-->
                        <td width="26" align="center" nowrap><?= get_online($image['username']) ?></td>
                        <td height="43" align="center" nowrap="">
                            ϵͳ����Ա
                        </td>
                        <td align="center" nowrap="">
                            <?= $image['username'] ?>
                        </td>
                        <td align="center" nowrap="">
                            <?= $image['CreateTime'] ?>
                        </td>
                        <td align="center" nowrap=""> <a href="main.php?action=user_gs_edit&uid=<?= $uid ?>&id=<?= $image['id'] ?>">�޸�</a> / <a href="main.php?action=user_log&uid=<?= $uid ?>&username=<?= $image['username'] ?>">��־</a> / <a onClick="return confirm('�˲������ɻָ�!\nȷ��ɾ��?');" href="main.php?action=user_gs_list&uid=<?= $uid ?>&act=del&id=<?= $image['id'] ?>&sdel=<?= $image['id'] ?>&name=<?= $image['username'] ?>">ɾ��</a>
                        </td>
                        <td align="center" nowrap="">
                            <? if ($image['Status'] == 1) {
                                echo "����";
                            } else {
                                echo "ͣ��";
                            } ?>
                        </td>
                    </tr>
                <? } ?>
                <tr>
                    <td height="28" colspan="6" align="center" bgcolor="#FFFFFF">
                        <!--<button onClick="javascript:if(confirm('�˲������ɻָ�!\nȷ��ɾ��ѡ���û�?'))submit();";>ɾ��ѡ��</button>-->

                        �� <?= $pagecount ?> ҳ,&nbsp;<?= $total ?> ����¼</span>&nbsp;<a href="main.php?action=user_gs_list&uid=<?= $uid ?>&sort=<?= $vvv ?>&orderby=<?= $vvv2 ?>&page=1">��ҳ</a> <a href="main.php?action=user_gs_list&uid=<?= $uid ?>&sort=<?= $vvv ?>&orderby=<?= $vvv2 ?>&page=<?= $pre ?>">��һҳ</a> <a href="main.php?action=user_gs_list&uid=<?= $uid ?>&sort=<?= $vvv ?>&orderby=<?= $vvv2 ?>&page=<?= $next ?>">��һҳ</a> <a href="main.php?action=user_gs_list&uid=<?= $uid ?>&sort=<?= $vvv ?>&orderby=<?= $vvv2 ?>&page=<?= $last ?>">βҳ</a>
                    </td>
                </tr>
        </tbody>
    <? } ?>
    </form>
    </table>
</body>