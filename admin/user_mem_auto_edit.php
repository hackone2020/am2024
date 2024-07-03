<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
if (strpos($flag, "08")) {
} else {
    echo "<center>你没有该权限功能!</center>";
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
        echo "<script>alert('用户不存在!');</script>";
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
        echo "<script>alert('用户:" . $user_username . "分配余额调整成功!');</script>";
    }
}
if ($username != "") {
    $sql = "select * from web_member where kauser='" . $username . "' LIMIT 1";
    $result = $db1->query($sql);
    $row = $result->fetch_assoc();
    $count = $result->num_rows;
    if ($count == 0) {
        $user_username = "用户不存在";
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
            <td class="m_tline" width="834">&nbsp;会员分配余额核对</td>
            <td width="40"><img src="images/top_04.gif" width="30" height="24" /></td>
        </tr>
    </table>
    <form action="main.php" method="get" name="myFORM" id="myFORM">
        <table width="854" height="23" border="0" cellpadding="0" cellspacing="0">

            <tr>
                <td width="86" align="center">请输入用户名:</td>
                <td width="89"><input name="username" id="username" type=text class="za_text" value=<?=$username?>
                    size="16" maxlength="16"></td>

                <td width="45"><input type="submit" name="button" id="button" value="查询"></td>
                <td width="634">当对用户注单手动结算、注销或系统重新结算时可能会出现误差，您可以使用该功能对用户的分配余额进行核对调整</td>
            </tr>
        </table>

        <input name="action" type="hidden" id="action" value="user_mem_auto_edit" />
        <input name="uid" type="hidden" id="uid" value="" ; <?=$uid?> />
    </form>

    <table width="874" height="51" border="0" cellpadding="0" cellspacing="1" bgcolor="006255">
        <tr>
            <td width="120" height="20" align="center" class="m_title_ft">用户名</td>
            <td width="110" class="m_title_ft">信用额度</td>
            <td width="95" align="center" class="m_title_ft">当前未结算</td>
            <td width="121" align="center" nowrap="nowrap" class="m_title_ft">当前已结算结果</td>
            <td width="104" align="center" nowrap="nowrap" class="m_title_ft">当前分配余额</td>
            <td width="110" align="center" nowrap="nowrap" class="m_title_ft">理论余额</td>
            <td width="102" align="center" class="m_title_ft">误差</td>
            <td width="103" align="center" nowrap="nowrap" class="m_title_ft">操作</td>
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
                <a href="main.php?action=user_mem_auto_edit&uid=<?=$uid?>&act=edit&username=<?=$user_username?>">调整</a>
                <?} else {?>
                无需调整
                <?}?>
            </td>
        </tr>
    </table>
</body>