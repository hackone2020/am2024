<?php

if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
if (strpos($flag, "08")) {
} else {
    echo "<center>��û�и�Ȩ�޹���!</center>";
    exit;
}
$username = $_GET['username'];
$user_username = $user_cs = $user_ts = $user_li = $user_r1 = $user_r2 = $user_wc = "";
if ($_GET['act'] == "edit" && $username != "") {
    $sql = "select * from web_member where kauser='" . $username . "' LIMIT 1";
    $result = $db1->query($sql);
    $row = $result->fetch_assoc();
    $count = $result->num_rows;
    if ($count == 0) {
        echo "<script>alert('�û�������!');</script>";
    } else {
        $user_username = $username;
        $user_cs = $row['cs'];
        $result1 = $db1->query("select sum(sum_m) as sum_m from web_tan where username='" . $username . "' and qx=0 and result=0 ");
        $Rs1 = $result1->fetch_array();
        $user_r1 = isset($Rs1['sum_m']) ? round($Rs1['sum_m'], 2) : 0;
        $result2 = $db1->query("select sum(mem_value-sum_m) as sum_m from web_tan where username='" . $username . "' and qx=0 and result=1 ");
        $Rs2 = $result2->fetch_array();
        $user_r2 = isset($Rs2['sum_m']) ? round($Rs2['sum_m'], 2) : 0;
        $user_li = $user_cs - $user_r1 + $user_r2;
        $sql = "update  web_member set ts='" . $user_li . "' where kauser='" . $user_username . "'";
        $db1->query($sql);
        echo "<script>alert('�û�:" . $user_username . "�����������ɹ�!');</script>";
    }
}
if ($username != "") {
    $sql = "select * from web_member where kauser='" . $username . "' LIMIT 1";
    $result = $db1->query($sql);
    $row = $result->fetch_assoc();
    $count = $result->num_rows;
    if ($count == 0) {
        $user_username = "�û�������";
    } else {
        $user_username = $username;
        $user_cs = $row['cs'];
        $user_ts = round($row['ts'], 2);
        $result1 = $db1->query("select sum(sum_m) as sum_m from web_tan where username='" . $username . "' and qx=0 and result=0 ");
        $Rs1 = $result1->fetch_array();
        $user_r1 = isset($Rs1['sum_m']) ? round($Rs1['sum_m'], 2) : 0;
        $result2 = $db1->query("select sum(mem_value-sum_m) as sum_m from web_tan where username='" . $username . "' and qx=0 and result=1 ");
        $Rs2 = $result2->fetch_array();
        $user_r2 = isset($Rs2['sum_m']) ? round($Rs2['sum_m'], 2) : 0;
        $user_li = $user_cs - $user_r1 + $user_r2;
        $user_wc = round($user_li - $user_ts, 2);
    }
}?>
<link rel="stylesheet" href="css/control_main.css" type="text/css">
<script src="js/function.js" type="text/javascript"></script>

<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0" vlink="#0000FF" alink="#0000FF">
    <table width="874" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td class="m_tline" width="834">&nbsp;��Ա�������˶�</td>
            <td width="40"><img src="images/top_04.gif" width="30" height="24" /></td>
        </tr>
    </table>
    <form action="main.php" method="get" name="myFORM" id="myFORM">
        <table width="854" height="23" border="0" cellpadding="0" cellspacing="0">

            <tr>
                <td width="86" align="center">�������û���:</td>
                <td width="89"><input name="username" id="username" type=text class="za_text" value=<?=$username?>
                    size="16" maxlength="16"></td>

                <td width="45"><input type="submit" name="button" id="button" value="��ѯ"></td>
                <td width="634">�����û�ע���ֶ����㡢ע����ϵͳ���½���ʱ���ܻ������������ʹ�øù��ܶ��û��ķ��������к˶Ե���</td>
            </tr>
        </table>

        <input name="action" type="hidden" id="action" value="user_mem_auto_edit" />
        <input name="uid" type="hidden" id="uid" value="" ; <?=$uid?> />
    </form>

    <table width="874" height="51" border="0" cellpadding="0" cellspacing="1" bgcolor="006255">
        <tr>
            <td width="120" height="20" align="center" class="m_title_ft">�û���</td>
            <td width="110" class="m_title_ft">���ö��</td>
            <td width="95" align="center" class="m_title_ft">��ǰδ����</td>
            <td width="121" align="center" nowrap="nowrap" class="m_title_ft">��ǰ�ѽ�����</td>
            <td width="104" align="center" nowrap="nowrap" class="m_title_ft">��ǰ�������</td>
            <td width="110" align="center" nowrap="nowrap" class="m_title_ft">�������</td>
            <td width="102" align="center" class="m_title_ft">���</td>
            <td width="103" align="center" nowrap="nowrap" class="m_title_ft">����</td>
        </tr>
        <tr>
            <td height="20" align="center" bgcolor="#FFFFFF">
                <?=$user_username?>
            </td>

            <td bgcolor="#FFFFFF">
                <?=$user_cs?>
            </td>
            <td align="center" bgcolor="#FFFFFF">
                <?=$user_r1?>
            </td>
            <td align="center" nowrap="nowrap" bgcolor="#FFFFFF">
                <?=$user_r2?>
            </td>
            <td align="center" nowrap="nowrap" bgcolor="#FFFFFF">
                <?=$user_ts?>
            </td>
            <td align="center" nowrap="nowrap" bgcolor="#FFFFFF">
                <?=$user_li?>
            </td>
            <td align="center" bgcolor="#FFFFFF">
                <?=$user_wc?>
            </td>
            <td align="center" nowrap="nowrap" bgcolor="#FFFFFF">
                <? if ($user_wc != 0) {?>
                <a href="main.php?action=user_mem_auto_edit&uid=<?=$uid?>&act=edit&username=<?=$user_username?>">����</a>
                <?} else {?>
                �������
                <?}?>
            </td>
        </tr>
    </table>
</body>