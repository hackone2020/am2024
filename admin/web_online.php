<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
if (strpos($flag, "12")) {
} else {
    echo "<center>你没有该权限功能!</center>";
    exit;
}
$deltime = date("Y-m-d H:i:s", time() - $autodeltime);
$db1->query("delete from web_online where adddate<'" . $deltime . "'");
include "ip.php";
if ($_GET['act'] == "edit") {
    $db1->query("delete from web_online where id='" . $_GET['id'] . "'");
    $username = $_GET['username'];
    $str1 = "踢出用户:" . $username;
    $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $jxadmin . "',kauser='" . $jxadmin . "',lx=3,text1='在线管理',text2='" . $str1 . "',ip='" . $userip . "'";
    $db1->query($sql);
    switch ($_GET['zt']) {
        case "5":
            $db1->query("update web_admin  set uid='' where username='" . $username . "'");
            break;
        case "0":
            $db1->query("update web_member  set uid='' where kauser='" . $username . "'");
            break;
        default:
            $db1->query("update web_agent  set uid='' where kauser='" . $username . "'");
            $db1->query("update web_agent_zi  set uid='' where kauser='" . $username . "' or guan='" . $username . "'");
            break;
    }
}
if ($jxadmin != "admin") {
    $vv = " and username!='admin' ";
} else {
    $vv = "";
}
$result1 = $db1->query("Select Count(ID) As memnum1 From web_online Where 1=1 " . $vv . " order by id desc");
$rsw = $result1->fetch_array();
if ($rsw[0] != "") {
    $r_all = $rsw[0];
} else {
    $r_all = 0;
}
$result1 = $db1->query("Select Count(ID) As memnum1 From web_online Where zt=0 order by id desc");
$rsw = $result1->fetch_array();
if ($rsw[0] != "") {
    $r_user = $rsw[0];
} else {
    $r_user = 0;
}
$result1 = $db1->query("Select Count(ID) As memnum1 From web_online Where zt=1 order by id desc");
$rsw = $result1->fetch_array();
if ($rsw[0] != "") {
    $r_dai = $rsw[0];
} else {
    $r_dai = 0;
}
$result1 = $db1->query("Select Count(ID) As memnum1 From web_online Where zt=2 order by id desc");
$rsw = $result1->fetch_array();
if ($rsw[0] != "") {
    $r_zong = $rsw[0];
} else {
    $r_zong = 0;
}
$result1 = $db1->query("Select Count(ID) As memnum1 From web_online Where zt=3 order by id desc");
$rsw = $result1->fetch_array();
if ($rsw[0] != "") {
    $r_guan = $rsw[0];
} else {
    $r_guan = 0;
}
$result1 = $db1->query("Select Count(ID) As memnum1 From web_online Where zt=4 order by id desc");
$rsw = $result1->fetch_array();
if ($rsw[0] != "") {
    $r_dagu = $rsw[0];
} else {
    $r_dagu = 0;
}
$result1 = $db1->query("Select Count(ID) As memnum1 From web_online Where zt=5  " . $vv . "  order by id desc");
$rsw = $result1->fetch_array();
if ($rsw[0] != "") {
    $r_admin = $rsw[0];
} else {
    $r_admin = 0;
}?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<body style="min-width: 1200px;width: 100%">
<div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;用户管理&nbsp;&nbsp;</span><span class="font_b">在线用户</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright">
        <table border="0" align="right" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td height="28" style="color:#fff;">&nbsp;&nbsp;在线人员:
                            <a href="main.php?action=web_online&uid=<?=$uid?>&zt=0">&nbsp;会员：<font color=ff0000><?=$r_user?></font>人</a>&nbsp;&nbsp;&nbsp;
                            <a href="main.php?action=web_online&uid=<?=$uid?>&zt=1">&nbsp;代理：<font color=ff0000><?=$r_dai?></font>人</a>&nbsp;&nbsp;&nbsp;
                            <a href="main.php?action=web_online&uid=<?=$uid?>&zt=2">&nbsp;总代理：<font color=ff0000> <?=$r_zong?></font>人</a>&nbsp;&nbsp;&nbsp;
                            <a href="main.php?action=web_online&uid=<?=$uid?>&zt=3">&nbsp;股东： <font color=ff0000><?=$r_guan?></font>人</a>&nbsp;&nbsp;&nbsp;
                            <a href="main.php?action=web_online&uid=<?=$uid?>&zt=4">&nbsp;大股东：<font color=ff0000><?=$r_dagu?></font>人</a>&nbsp;&nbsp;&nbsp;
                            <a href="main.php?action=web_online&uid=<?=$uid?>&zt=5">&nbsp;后台：<font color=ff0000><?=$r_admin?></font>人</a>&nbsp;&nbsp;&nbsp;
                            <a href="main.php?action=web_online&uid=<?=$uid?>">全部： <font color=ff0000><?=$r_all?></font>人</a>&nbsp;&nbsp;&nbsp;
                            当前线路情况:
                            <select id="webname" name="webname" class="za_select">
                            <? $result = $db1->query("SELECT distinct(webname) as webname FROM web_online WHERE 1=1 " . $vv . " order by id desc");
        $cou = $result->num_rows;
        if ($cou == 0) {?>
                            <option value="">暂时没有人在线</option>
                            <?} else {?>
                            <?  while ($image =$result->fetch_array()) {
                $rs = $db1->query("select count(*) from web_online where webname='" . $image['webname'] . "' " . $vv . " order by id desc");
               $num1=$rs->fetch_array();
                $num = $num1[0];
                ?>
               <option value="<?=$image['webname']?>">(<?=$num?>人)</option>
               
           <? }
        }?>
                        </select>
                    </td>
                </tr>
             </tbody>
        </table>
    </div></div>    
 <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list bet">
     <tbody>
        <tr>
            <td width="4%" height="23" align="center" nowrap="nowrap" class="t_list_caption">
                <span class="STYLE2">序号</span>
            </td>
            <TD width="22%" align="center" class="t_list_caption">用户</TD>
            <TD width="12%" align="center" class="t_list_caption">用户IP</TD>
            <TD width="12%" align="center" class="t_list_caption">所在地</TD>
            <TD width="17%" align="center" class="t_list_caption">线路</TD>
            <TD width="17%" align="center" class="t_list_caption">最后活动时间</TD> 
            <TD width="20%" align="center" class="t_list_caption">踢出</TD>
        </tr>
        <?$tt = 0;
if ($_GET['zt'] != "") {
    $vvv = "zt='" . $_GET['zt'] . "'" . $vv;
} else {
    $vvv = " 1=1 " . $vv;
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
while ($image = $result->fetch_array()) {?>
        <? ++$tt;?>
        <tr bgColor="#ffffff" onMouseOver="javascript:this.bgColor='#eef5fc'"
            onMouseOut="javascript:this.bgColor='#ffffff'">
            <td height="28" align="center" nowrap="nowrap">
                <?=$tt?>
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
                <?if ($image['ag'] != "") {
        echo $image['ag'] . "子账号";
    }?>
            </td>
            <td align="center" nowrap="nowrap"><a target="_blank" href="http://www.ip138.com/ips.asp?ip="
                    <?=$image['ip']?>
                    <?=$image['ip']?>>
                </a></td>
            <td align="center" nowrap="nowrap">
                <? $tip = convertip($image['ip']); echo $tip?>&nbsp;
            </td>
            <td align="center" nowrap="nowrap">
                <?=$image['webname']?>
            </td>

            <td align="center" nowrap="nowrap">
                <?=$image['adddate']?>
            </td>
            <td align="center" nowrap="nowrap">
                <?if ($image['zt'] != 5) {?>
                <a href="main.php?action=web_online&uid=<?=$uid?>&act=edit&zt=<?=$image['zt']?>&username=<?=$image['username']?>&id=<?=$image['id']?>">踢出</a>
                <?}?>
            </td>
        </tr>
        <?}?>
        <tr bgColor="#ffffff">
            <td height="28" colspan="7" align="center" nowrap="nowrap">当前为第<?=$page?>页&nbsp;总<?=$pagecount?>页&nbsp;共<?=$total?>记录&nbsp;
            <a href="main.php?action=web_online&uid=?=$uid?>&zt=<?=$_GET['zt']?>&page=1">首页</a> 
            <a href="main.php?action=web_online&uid=<?=$uid?>&zt=<?=$_GET['zt']?>&page=<?=$pre?>">上一页</a> 
            <a href="main.php?action=web_online&uid=<?=$uid?>&zt=<?=$_GET['zt']?>&page=<?=$next?>">下一页</a> 
            <a href="main.php?action=web_online&uid=<?=$uid?>&zt=<?=$_GET['zt']?>&page=<?=$last?>">末页</a>

                <select name="page2" onChange="location.href='main.php?action=web_online&uid=<?=$uid?>&zt=<?=$_GET['zt']?>&page='+this.options[selectedIndex].value">
                    <? $i = 1;
for (; $i <= $pagecount; ++$i) {?>
                    <option value="<?=$i?>" <?if ($page==$i) {?>
                        selected
                        <?}?>
                        >第
                        <?=$i?>页
                    </option>
                    <?}?>
                </select>&nbsp;
            </td>
        </tr>
        </tbody>
    </table>
</body>