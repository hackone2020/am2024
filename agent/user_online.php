<?php

if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
if ($online != 1 || $lx < 4) {
    echo "<center>��û�и�Ȩ�޹���!</center>";
    exit;
}
$deltime = date("Y-m-d H:i:s", time() - $autodeltime);
$db1->query("delete from web_online where adddate<'" . $deltime . "'");
include "ip.php";
$select_sql = "";
if ($lx == 4) {
    $select_sql = " and dagu='" . $kauser . "' ";
}
if ($_GET['act'] == "edit") {
    $db1->query("delete from web_online where id='" . $_GET['id'] . "'" . $select_sql);
    $username = $_GET['username'];
    $str1 = "�߳��û�:" . $username;
    $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $kauser . "',kauser='" . $kauser . "',lx=3,text1='(��ɶ�)���߹���',text2='" . $str1 . "',ip='" . $userip . "'";
    $db1->query($sql);
    switch ($_GET['zt']) {
        case "0":
            $db1->query("update web_member  set uid='' where kauser='" . $username . "'" . $select_sql);
            break;
        default:
            $db1->query("update web_agent  set uid='' where kauser='" . $username . "'" . $select_sql);
            $db1->query("update web_agent_zi  set uid='' where kauser='" . $username . "' or guan='" . $username . "'");
            break;
    }
}
$result1 = $db1->query("Select Count(ID) As memnum1 From web_online Where 1=1 " . $select_sql . " order by id desc");
$rsw = $result1->fetch_array();
if ($rsw[0] != "") {
    $r_all = $rsw[0];
} else {
    $r_all = 0;
}
$result1 = $db1->query("Select Count(ID) As memnum1 From web_online Where zt=0 " . $select_sql . " order by id desc");
$rsw = $result1->fetch_array();
if ($rsw[0] != "") {
    $r_user = $rsw[0];
} else {
    $r_user = 0;
}
$result1 = $db1->query("Select Count(ID) As memnum1 From web_online Where zt=1 " . $select_sql . " order by id desc");
$rsw = $result1->fetch_array();
if ($rsw[0] != "") {
    $r_dai = $rsw[0];
} else {
    $r_dai = 0;
}
$result1 = $db1->query("Select Count(ID) As memnum1 From web_online Where zt=2 " . $select_sql . " order by id desc");
$rsw = $result1->fetch_array();
if ($rsw[0] != "") {
    $r_zong = $rsw[0];
} else {
    $r_zong = 0;
}
$result1 = $db1->query("Select Count(ID) As memnum1 From web_online Where zt=3 " . $select_sql . " order by id desc");
$rsw = $result1->fetch_array();
if ($rsw[0] != "") {
    $r_guan = $rsw[0];
} else {
    $r_guan = 0;
}?>
<link rel="stylesheet" href="css/control_main.css" type="text/css">

<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0" vlink="#0000FF" alink="#0000FF">
    <table width="874" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td class="m_tline" width="834">&nbsp;�û�����<font color="#CC0000">�����û�</font>&nbsp;&nbsp;&nbsp;<input
                    name="button" type="button" class="za_button" onClick="javascript:location.reload();" value="����" />
            </td>
            <td width="40">
                <img src="images/top_04.gif" width="30" height="24" />
            </td>
        </tr>
    </table>
    <table width="895" height="37" border="0" cellpadding="1" cellspacing="0">
        <tr class="tbtitle">
            <td width="51%" height="36">
                <font color="#5E3F00">������Ա: <a href="main.php?action=user_online&uid=<?=$uid?>&vip=<?=$vip?>&zt=0">&nbsp;��Ա��<font color=ff0000>
                            <?=$r_user?>
                        </font>��</a>&nbsp;&nbsp;&nbsp;<a href="main.php?action=user_online&uid=<?=$uid?>&vip=<?=$vip?>&zt=1">&nbsp;����<font color=ff0000>
                            <?=$r_dai?>
                        </font>��</a>&nbsp;&nbsp;&nbsp;<a href="main.php?action=user_online&uid=<?=$uid?>&vip=<?=$vip?>&zt=2">&nbsp;�ܴ���<font color=ff0000>
                            <?=$r_zong?>
                        </font>��</a>&nbsp;&nbsp;&nbsp; <a href="main.php?action=user_online&uid=<?=$uid?>&vip=<?=$vip?>&zt=3">&nbsp;�ɶ���<font color=ff0000>
                            <?=$r_guan?></font>��</a>&nbsp;&nbsp;&nbsp; <a href="main.php?action=user_online&uid=<?=$uid?>&vip=<?=$vip?>">ȫ����<font color=ff0000>
                            <?=$r_all?>
                        </font>��
                    </a>&nbsp;&nbsp;&nbsp; </font>
            </td>
        </tr>
    </table>
    <table width="900" border="0" cellpadding="0" cellspacing="1" bordercolordark="#FFFFFF" bgcolor="006255" id="tb">
        <tr>
            <td width="4%" height="23" align="center" nowrap="nowrap" class="m_title_ft"><span class="STYLE2">���</span>
            </td>

            <td width="22%" align="center" class="m_title_ft">�û�</td>
            <td width="12%" align="center" class="m_title_ft">�û�IP</td>
            <td width="12%" align="center" class="m_title_ft">���ڵ�</td>
            <td width="17%" align="center" class="m_title_ft">��·</td>
            <td width="17%" align="center" class="m_title_ft">���ʱ��</td>
            <td width="20%" align="center" class="m_title_ft">�߳�</td>
        </tr> 
        <? $tt = 0;
if ($_GET['zt'] != "") {
    $vvv = "zt='" . $_GET['zt'] . "'" . $select_sql;
} else {
    $vvv = " 1=1 " . $select_sql;
}
$pagesize = 10;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$result = $db1->query("select count(*) from web_online where  " . $vvv . "  order by id desc");
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
$result = $db1->query("select * from web_online where " . $vvv . " order by id desc limit " . $offset . "," . $pagesize);
$cou = $result->num_rows;
?>
        <?if ($cou == 0) {?>
        <tr bgColor="#ffffff" onMouseOver="javascript:this.bgColor='#eef5fc'"
            onMouseOut="javascript:this.bgColor='#ffffff'">
            <td height="35" colspan="7" align="center" nowrap="nowrap">���޼�¼!</td>
        </tr>";
        <?} else {?>
        <?  while ($image = $result->fetch_array()) {
        ++$tt;?>
        <tr bgColor="#ffffff" onMouseOver="javascript:this.bgColor='#eef5fc'" onMouseOut="javascript:this.bgColor='#ffffff'">
		<td height="28" align="center" nowrap="nowrap" ><?=$tt?>
        </td>
        <td align="center" nowrap="nowrap">
            <?=$image['username']?>
            <? switch ($image['zt']) {
            case "0":
                echo ".��Ա";
                break;
            case "1":
                echo ".����";
                break;
            case "2":
                echo ".�ܴ���";
                break;
            case "3":
                echo ".�ɶ�";
                break;
            case "4":
                echo ".��ɶ�";
                break;
            default:
                echo ".��̨";
                break;
        }?>
            <? if ($image['ag'] != "") {
          $image['ag'] . "���˺�";
            }?>
        </td>
        <td align="center" nowrap="nowrap"><a target="_blank" href="http://www.ip138.com/ips.asp?ip=<?=$image['ip']?>"><?=$image['ip']?>"
            </a></td>
        <td align="center" nowrap="nowrap">
            <?$tip = convertip($image['ip']);
                echo "$tip;&nbsp";?>
        </td>
        <td align="center" nowrap="nowrap">
            <?=$image['webname']?>
        </td>
        <td align="center" nowrap="nowrap">
            <?=$image['adddate']?>
        </td>
        <td align="center" nowrap="nowrap">
            <? if ($image['zt'] != 5) {?>
            <a
                href="main.php?action=user_online&uid=<?$uid?>&vip=<?$vip?>&act=edit&zt=<?$image['zt']?>&username=<?$image['username']?>&id=<?=$image['id']?>">�߳�</a>
            <?}?>
        </td></tr> 
   <? }?>
            <tr bgColor="#ffffff">
                <td height="28" colspan="7" align="center" nowrap="nowrap">
                    ��ǰΪ��<?=$page?>ҳ&nbsp;��<?=$pagecount?>ҳ&nbsp;��<?=$total?>��¼"&nbsp;<a href="main.php?action=user_online&uid=<?=$uid?>&vip=<?=$vip?>&zt=<?=$_GET['zt']?>&page=1">��ҳ</a>
	<a href="main.php?action=user_online&uid=<?=$uid?>&vip=<?=$vip?>&zt=<?=$_GET['zt']?>&page=<?=$pre?>">��һҳ
                    </a>
                    <a href="main.php?action=user_online&uid=<?=$uid?>&vip=<?=$vip?>&zt=<?=$_GET['zt']?>&page=<?=$next?>">��һҳ</a>
                    <a href="main.php?action=user_online&uid=<?=$uid?>&vip=<?=$vip?>&zt=<?=$_GET['zt']?>&page=<?=$last?>">ĩҳ</a>
                    <select name="page2" onChange="location.href='main.php?action=user_online&uid=<?=$uid?>&vip=<?=$vip?>&zt=<?=$_GET['zt']?>&page='+this.options[selectedIndex].value">
                        <?
                        $i = 1;
    for (;$i <= $pagecount; ++$i) {?>
                        <option value="<?=$i?>" <?if ($page==$i) {?>selected<? }?>>��<?=$i?>ҳ
                        </option>
                        <? }?>
    </select>&nbsp;</td></tr>
<?}?>
    </table>
</body>