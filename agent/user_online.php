<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
if ($online != 1 || $lx < 4) {
    echo "<center>你没有该权限功能!</center>";
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
    $str1 = "踢出用户:" . $username;
    $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $kauser . "',kauser='" . $kauser . "',lx=3,text1='(大股东)在线管理',text2='" . $str1 . "',ip='" . $userip . "'";
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
            <td class="m_tline" width="834">&nbsp;用户管理－<font color="#CC0000">在线用户</font>&nbsp;&nbsp;&nbsp;<input
                    name="button" type="button" class="za_button" onClick="javascript:location.reload();" value="更新" />
            </td>
            <td width="40">
                <img src="images/top_04.gif" width="30" height="24" />
            </td>
        </tr>
    </table>
    <table width="895" height="37" border="0" cellpadding="1" cellspacing="0">
        <tr class="tbtitle">
            <td width="51%" height="36">
                <font color="#5E3F00">在线人员: <a href="main.php?action=user_online&uid=<?=$uid?>&vip=<?=$vip?>&zt=0">&nbsp;会员：<font color=ff0000>
                            <?=$r_user?>
                        </font>人</a>&nbsp;&nbsp;&nbsp;<a href="main.php?action=user_online&uid=<?=$uid?>&vip=<?=$vip?>&zt=1">&nbsp;代理：<font color=ff0000>
                            <?=$r_dai?>
                        </font>人</a>&nbsp;&nbsp;&nbsp;<a href="main.php?action=user_online&uid=<?=$uid?>&vip=<?=$vip?>&zt=2">&nbsp;总代理：<font color=ff0000>
                            <?=$r_zong?>
                        </font>人</a>&nbsp;&nbsp;&nbsp; <a href="main.php?action=user_online&uid=<?=$uid?>&vip=<?=$vip?>&zt=3">&nbsp;股东：<font color=ff0000>
                            <?=$r_guan?></font>人</a>&nbsp;&nbsp;&nbsp; <a href="main.php?action=user_online&uid=<?=$uid?>&vip=<?=$vip?>">全部：<font color=ff0000>
                            <?=$r_all?>
                        </font>人
                    </a>&nbsp;&nbsp;&nbsp; </font>
            </td>
        </tr>
    </table>
    <table width="900" border="0" cellpadding="0" cellspacing="1" bordercolordark="#FFFFFF" bgcolor="006255" id="tb">
        <tr>
            <td width="4%" height="23" align="center" nowrap="nowrap" class="m_title_ft"><span class="STYLE2">序号</span>
            </td>

            <td width="22%" align="center" class="m_title_ft">用户</td>
            <td width="12%" align="center" class="m_title_ft">用户IP</td>
            <td width="12%" align="center" class="m_title_ft">所在地</td>
            <td width="17%" align="center" class="m_title_ft">线路</td>
            <td width="17%" align="center" class="m_title_ft">最后活动时间</td>
            <td width="20%" align="center" class="m_title_ft">踢出</td>
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
            <td height="35" colspan="7" align="center" nowrap="nowrap">暂无记录!</td>
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
                echo ".会员";
                break;
            case "1":
                echo ".代理";
                break;
            case "2":
                echo ".总代理";
                break;
            case "3":
                echo ".股东";
                break;
            case "4":
                echo ".大股东";
                break;
            default:
                echo ".后台";
                break;
        }?>
            <? if ($image['ag'] != "") {
          $image['ag'] . "子账号";
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
                href="main.php?action=user_online&uid=<?$uid?>&vip=<?$vip?>&act=edit&zt=<?$image['zt']?>&username=<?$image['username']?>&id=<?=$image['id']?>">踢出</a>
            <?}?>
        </td></tr> 
   <? }?>
            <tr bgColor="#ffffff">
                <td height="28" colspan="7" align="center" nowrap="nowrap">
                    当前为第<?=$page?>页&nbsp;总<?=$pagecount?>页&nbsp;共<?=$total?>记录"&nbsp;<a href="main.php?action=user_online&uid=<?=$uid?>&vip=<?=$vip?>&zt=<?=$_GET['zt']?>&page=1">首页</a>
	<a href="main.php?action=user_online&uid=<?=$uid?>&vip=<?=$vip?>&zt=<?=$_GET['zt']?>&page=<?=$pre?>">上一页
                    </a>
                    <a href="main.php?action=user_online&uid=<?=$uid?>&vip=<?=$vip?>&zt=<?=$_GET['zt']?>&page=<?=$next?>">下一页</a>
                    <a href="main.php?action=user_online&uid=<?=$uid?>&vip=<?=$vip?>&zt=<?=$_GET['zt']?>&page=<?=$last?>">末页</a>
                    <select name="page2" onChange="location.href='main.php?action=user_online&uid=<?=$uid?>&vip=<?=$vip?>&zt=<?=$_GET['zt']?>&page='+this.options[selectedIndex].value">
                        <?
                        $i = 1;
    for (;$i <= $pagecount; ++$i) {?>
                        <option value="<?=$i?>" <?if ($page==$i) {?>selected<? }?>>第<?=$i?>页
                        </option>
                        <? }?>
    </select>&nbsp;</td></tr>
<?}?>
    </table>
</body>