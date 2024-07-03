<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
if (strpos($flag, "06")) {
} else {
    echo "<center>你没有该权限功能!</center>";
    exit;
}
if (strpos($flag, "13")) {
    if ($_POST['sdel'] != "") {
        $del_num = count($_POST['sdel']);
        $i = 0;
        for (; $i < $del_num; ++$i) {
            $result = $db1->query("select kauser from web_agent  where id='{$sdel[$i]}' order by id desc LIMIT 1");
            $row = $result->fetch_array();
            $cou = $result->num_rows;
            if ($cou != 0) {
                $kauser = $row['kauser'];
                $db1->query("Delete from web_agent where id='{$sdel[$i]}'");
                $db1->query("Delete from web_agent where zong='{$kauser}'");
                $db1->query("Delete from web_agent_zi where guan='{$kauser}'");
                $db1->query("Delete from web_member where zong='{$kauser}'");
                $db1->query("Delete from web_user_ds where lx=2  and userid='{$sdel[$i]}'");
                $db1->query("Delete from web_user_ds where zong='{$kauser}'");
                $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $jxadmin . "',kauser='" . $jxadmin . "',lx=3,text1='总代理管理',text2='删除总代理:" . $kauser . "',ip='" . $userip . "'";
                $db1->query($sql);
            }
        }
        echo "<script>alert('删除成功！');window.location.href='main.php?action=user_zong_list&uid={$uid}';</script>";
        exit;
    }
    if ($_GET['sdel'] != "") {
        $dell = $_GET['sdel'];
        $result = $db1->query("select kauser from web_agent  where id='{$dell}' order by id desc LIMIT 1");
        $row = $result->fetch_array();
        $cou = $result->num_rows;
        if ($cou != 0) {
            $kauser = $row['kauser'];
            $db1->query("Delete from web_agent where id='{$sdel}'");
            $db1->query("Delete from web_agent where zong='{$kauser}'");
            $db1->query("Delete from web_agent_zi where guan='{$kauser}'");
            $db1->query("Delete from web_member where zong='{$kauser}'");
            $db1->query("Delete from web_user_ds where lx=2  and userid='{$sdel}'");
            $db1->query("Delete from web_user_ds where zong='{$kauser}'");
            $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $jxadmin . "',kauser='" . $jxadmin . "',lx=3,text1='总代理管理',text2='删除总代理:" . $kauser . "',ip='" . $userip . "'";
            $db1->query($sql);
        }
        echo "<script>alert('删除成功！'); window.location.href = 'main.php?action=user_zong_list&uid={$uid}';</script>";
        exit;
    }
}
if ($_GET['pz'] == "0") {
    $sql = "update web_agent set uid='',adddate='" . $utime . "',pz=0 where id=" . $_GET['id'];
    if (!$db1->query($sql)) {
        exit("数据库修改出错");
    }
    $kauser = $_GET['name'];
    $db1->query("update web_agent set uid='' where zong='{$kauser}'");
    $db1->query("update web_agent_zi set uid='' where guan='{$kauser}'");
    $db1->query("update web_member set uid='' where zong='{$kauser}'");
    echo "<script>alert('设置用户[<" . $_GET['name'] . ">]为开启走飞！!'); window.location.href = 'main.php?action=user_zong_list&uid={$uid}';</script>";
    exit;
}
if ($_GET['pz'] == "1") {
    $sql = "update web_agent set uid='',adddate='" . $utime . "',pz=1 where id=" . $_GET['id'];
    if (!$db1->query($sql)) {
        exit("数据库修改出错");
    }
    $kauser = $_GET['name'];
    $db1->query("update web_agent set uid='' where zong='{$kauser}'");
    $db1->query("update web_agent_zi set uid='' where guan='{$kauser}'");
    $db1->query("update web_member set uid='' where zong='{$kauser}'");
    echo "<script>alert('设置用户[<" . $_GET['name'] . ">]为禁止走飞!\\n该账号及其下属代理商将关闭走飞服务!!!'); window.location.href = 'main.php?action=user_zong_list&uid={$uid}';</script>";
    exit;
}
if ($_GET['stat'] == "0") {
    $sql = "update web_agent set uid='',adddate='" . $utime . "',stat=0 where id=" . $_GET['id'];
    if (!$db1->query($sql)) {
        exit("数据库修改出错");
    }
    echo "<script>alert('设置用户[<" . $_GET['name'] . ">]为启用!'); window.location.href = 'main.php?action=user_zong_list&uid={$uid}&enable=y';</script>";
    exit;
}
if ($_GET['stat'] == "1") {
    $sql = "update web_agent set uid='',adddate='" . $utime . "',stat=1 where id=" . $_GET['id'];
    if (!$db1->query($sql)) {
        exit("数据库修改出错");
    }
    $kauser = $_GET['name'];
    $db1->query("update web_agent set uid='' where zong='{$kauser}'");
    $db1->query("update web_agent_zi set uid='' where guan='{$kauser}'");
    $db1->query("update web_member set uid='' where zong='{$kauser}'");
    echo "<script>alert('设置用户[<" . $_GET['name'] . ">]为停用!'); window.location.href = 'main.php?action=user_zong_list&uid={$uid}&enable=n';</script>";
    exit;
}
if ($_GET['ty'] == "0") {
    $sql = "update web_agent set uid='',adddate='" . $utime . "',ty=0 where id=" . $_GET['id'];
    if (!$db1->query($sql)) {
        exit("数据库修改出错");
    }
    echo "<script>alert('设置用户[<" . $_GET['name'] . ">]为开放投注!'); window.location.href = 'main.php?action=user_zong_list&uid={$uid}&enable=all';</script>";
    exit;
}
if ($_GET['ty'] == "1") {
    $sql = "update web_agent set uid='',adddate='" . $utime . "',ty=1 where id=" . $_GET['id'];
    if (!$db1->query($sql)) {
        exit("数据库修改出错");
    }
    echo "<script>alert('设置用户[<" . $_GET['name'] . ">]为暂停投注!'); window.location.href = 'main.php?action=user_zong_list&uid={$uid}&enable=s';</script>";
    exit;
}
$sort = $_GET['sort'];
$orderby = $_GET['orderby'];
$enable = $_GET['enable'];
$key = $_GET['key'];
$search = $_GET['search'];
$dagu = $_GET['dagu'];
$guan = $_GET['guan'];
switch ($sort) {
    case "username":
        $vvv = "kauser";
        break;
    case "name":
        $vvv = "xm";
        break;
    case "cs":
        $vvv = "cs";
        break;
    case "slogin":
        $vvv = "slogin";
        break;
    default:
        $vvv = "slogin";
        $sort = "slogin";
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
switch ($enable) {
    case "all":
        $term = "";
        break;
    case "y":
        $term = " and stat=0 ";
        break;
    case "n":
        $term = " and stat=1 ";
        break;
    case "s":
        $term = " and ty=1 ";
        break;
    default:
        $enable = "all";
        $term = "";
        break;
}
if ($key != "" && $search != "") {
    switch ($search) {
        case "username":
            $term .= "and kauser";
            break;
        case "name":
            $term .= "and xm";
            break;
        default:
            $term .= "and kauser";
            break;
    }
    $term .= " LIKE '%" . $key . "%' ";
}
if ($dagu != "") {
    switch ($dagu) {
        case "all":
            $dagu = "all";
            $term .= "";
            $term1 = "";
            break;
        default:
            $term .= "and dagu='" . $dagu . "' ";
            $term1 = "and dagu='" . $dagu . "' ";
            break;
    }
} else {
    $dagu = "all";
}
if ($guan != "") {
    switch ($guan) {
        case "all":
            $guan = "all";
            $term .= "";
            break;
        default:
            $term .= "and guan='" . $guan . "' ";
            break;
    }
} else {
    $guan = "all";
}
$pagesize = 10;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$result = $db1->query("select count(*) from web_agent where lx=2 " . $term . " order by id desc");
$num1 = $result->fetch_array();
$num=$num1[0];
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
<style type="text/css">
    <!--
    .m_title_sucor { background-color: #CD9A99; text-align: center}
    .m_title {background-color: #976061; text-align: center}
    -->
</style>
<script src="js/function.js" type="text/javascript"></script>
<script language=javaScript src="js/user_search.js" type=text/javascript></script>
<script language=javaScript>
function onLoad() {
        var obj_enable = $("enable");
        obj_enable.value = "<?=$enable?>";
        var obj_orderby = $("orderby");
        obj_orderby.value = "<?=$orderby?>";
        var obj_page = $("page");
        obj_page.value = "<?=$page?>";
        var obj_sort = $("sort");
        obj_sort.value = "<?=$sort?>";
        var obj_dagu = $("dagu");
        obj_dagu.value = "<?=$dagu?>";
        var obj_guan = $("guan");
        obj_guan.value = "<?=$guan?>";
    }
</script>
<body style="min-width: 1200px;width: 100%">
    <div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;用户管理&nbsp;&nbsp;</span><span class="font_b">总代理管理</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright">
   <table border="0" align="right" cellpadding="0" cellspacing="0">
        <form action="main.php" method="get" name="myFORM" id="myFORM">
             <tbody>
                <tr>
                <td class="m_tline">
                    <table border="0" cellspacing="0" cellpadding="0">
                        <tr>
                             <td height="28" style="color:#fff;">&nbsp;&nbsp;大股东:
                                <select id="dagu" name="dagu" onChange="document.myFORM.submit();" class="za_select">
                                    <option value="all">全部</option>
                                    <?$result = $db1->query("select * from web_agent where lx=4  order by id desc");
while ($image = $result->fetch_array()) {?>
                                    <option value="<?=$image['kauser']?>"><?=$image['kauser']?></option>
                                        <?}?>
                                </select>
                            
                           股东:
                                <select id="guan" name="guan" onChange="document.myFORM.submit();" class="za_select">
                                    <option value="all">全部</option>
                                    <? $result = $db1->query("select * from web_agent where lx=3 " . $term1 . " order by id desc");
while ($image = $result->fetch_array()) {?>
                                    <option value="<?=$image['kauser']?>"><?=$image['kauser']?></option>
                                        <?}?>
                                </select>

                                <select id="enable" name="enable" onChange="document.myFORM.submit()" class="za_select">
                                    <option value="all">全部</option>
                                    <option value="y">启用</option>
                                    <option value="n">停用</option>
                                    <option value="s">暂停</option>
                                </select>
                             -- 排序:

                                <select id="sort" name="sort" onChange="document.myFORM.submit();" class="za_select">
                                    <option value="username">账号</option>
                                    <option value="name">名称</option>
                                    <option value="cs">信用额度</option>
                                    <option value="slogin">新增日期</option>
                                </select>
                                &nbsp;

                                <select id="orderby" name="orderby" onChange="document.myFORM.submit()"
                                    class="za_select">
                                    <option value="desc">降幂(由大到小)</option>
                                    <option value="asc">升幂(由小到大)</option>
                                </select>
                             --&nbsp;总页数&nbsp;:&nbsp;

                                <select id="page" name="page" onChange="document.myFORM.submit()" class="za_select">
                                    <?if ($pagecount == 0) {?>
                                    <option value='0'>0</option>
                                    <?} else {
    $i = 0;
    for (; $i < $pagecount; ++$i) {?>
                                    <option value='<?=$i + 1?>'><?=$i + 1?></option>
                                    <?}
}?>
                                </select>

                            &nbsp;/&nbsp;
                                <?=$pagecount?>&nbsp;页&nbsp;--&nbsp;

                            <input type="button" name="btn_search" value="快速查询" onClick="showSearchDlg();"
                                    class="za_button">

                            --
                                <input type="button" name="append" value="新增" onClick="javascript:location.href='main.php?action=user_zong_add&uid=<?=$uid?>'" class="btn2" /></td>
                        </tr>
                    </table>

                    <input name="search" type="hidden" id="search" value="" />
                    <input name="key" type="hidden" id="key" value="" />
                    <input name="action" type="hidden" id="action" value="user_zong_list" />
                    <input name="uid" type="hidden" id="uid" value="<?=$uid?>" />
                </td>
            </tr>
        </tbody>    
        </form>
    </table>
    <?$result = $db1->query("select * from web_agent where lx=2 " . $term . " order by " . $vvv . " " . $vvv2 . " limit " . $offset . "," . $pagesize);?>
</div>
</div>
   <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list bet">
   <form name="form1" method="post" action="main.php?action=user_zong_list&uid=<?=$uid?>">
        <tbody>
        <tr>
                <? if (strpos($flag, "13"))
{?>
                <td width="20">
                    <input type="checkbox" name="sele" value="checkbox" onClick="javascript:checksel(this.form);" />
                </td>
                <?}?>
                <td width="73" height="20" nowrap class="t_list_caption">总代理帐号</td>
                <td width="73" height="20" align="center" nowrap class="t_list_caption">总代理名称</td>
                <td width="135" height="20" align="center" nowrap class="t_list_caption">信用额度/分配余额</td>
                <td width="110" align="center" class="t_list_caption">新增日期</td>
                <td width="50" height="20" align="center" nowrap="nowrap" class="t_list_caption">代理数</td>
                <td width="50" align="center" nowrap class="t_list_caption">总代理%</td>
                <td width="50" align="center" nowrap class="t_list_caption">股东%</td>
                <td width="50" height="20" align="center" nowrap class="t_list_caption">大股东%</td>
                <td width="50" height="20" align="center" nowrap="nowrap" class="t_list_caption">公司%</td>
                <td width="68" height="20" align="center" nowrap class="t_list_caption">走飞</td>
                <td width="68" height="20" align="center" nowrap class="t_list_caption">账号状况</td>
                <td width="278" height="20" align="center" class="t_list_caption">功能</td>
            </tr>
            <? $cou = $result->num_rows;
if ($cou == 0) {?>
            <tr class="m_title">
                <td height="30" colspan="100%" class="t_list_tr_2"> 查无任何资料</td>
            </tr>
            <?} else {?>
            <?while ($image = $result->fetch_array()) {
        $mumu = 0;
        $result1 = $db1->query("select SUM(cs) As sum_m  From web_agent Where lx=1 and   zong='" . $image['kauser'] . "' order by id desc");
        $rsw = $result1->fetch_array();
        if ($rsw[0] != "") {
            $mumu = $rsw[0];
        }
        $result1 = $db1->query("select SUM(cs) As sum_m  From web_member Where zs=2 and   zong='" . $image['kauser'] . "' order by id desc");
        $rsw = $result1->fetch_array();
        if ($rsw[0] != "") {
            $mumu += $rsw[0];
        }
        $memnum = 0;
        $result1 = $db1->query("select Count(ID) As memnum From web_agent Where lx=1 and zong='" . $image['kauser'] . "' order by id desc");
        $rsw = $result1->fetch_array();
        if ($rsw[0] != "") {
            $memnum = $rsw[0];
        } else {
            $memnum = 0;
        }?>
           <tr bgcolor="#ffffff" onmouseover="onMouseOver(this)" onmouseout="onMouseOut(this)" onclick="onMouseClick(this)">
                <?if (strpos($flag, "13")) {?>
                 <td height="43" align="center"><input name="sdel[]" type="checkbox" id="sdel" value="<?=$image['id']?>" /></td>
                <?}?>
                <td width="73" align="center" nowrap>
                    <a href="main.php?action=user_dai_list&uid=<?=$uid?>&zong=<?=$image['kauser']?>"><?=$image['kauser']?></a>
                </td>
                <td width="73"  align="center">
                    <?=$image['xm']?>
                </td>
                <td width="135"  align="right">
                    <?=$image['cs']?>/<font color=ff0000><?=$image['cs']-$mumu?>
                    </font>
                </td>
                <td width="110" align="center">
                    <?=date("Y-m-d / H:i", strtotime($image['slogin']))?>
                </td>
                <td  align="center" nowrap>
                    <?=$memnum?>
                </td>
                <td width="50" align="center" nowrap>
                    <?=$image['zong_zc']?>
                </td>
                <td width="50" align="center" nowrap>
                    <a href="main.php?action=user_zong_list&uid=<?=$uid?>&guan=<?=$image['guan']?>" style="color:000000">(<?=$image['guan']?>)<?=$image['guan_zc']?></a>
                </td>
                <td width="50" align="center" nowrap><a href="main.php?action=user_zong_list&uid=<?=$uid?>&dagu=<?=$image['dagu']?>" style="color:000000">(<?=$image['dagu']?>)<?=$image['dagu_zc']?></a></td>
                <td width="50"  align="center" nowrap><?=$image['gs_zc']?></td>
                <td align="center">
                    <?if ($image['pz'] == 0) {?>
                    允许
                    <?} else {?>

                    <SPAN STYLE='background-color: rgb(100,255,255);'>[禁止]</SPAN>
                    <?}?>
                </td>
                <td align="center">
                    <?if ($image['stat'] == 0) {?>
                    <?if ($image['ty'] == 0) {?>
                    启用
                    <?} else {?>
                    <SPAN STYLE='background-color: rgb(0,255,0);'>[暂停下注]</SPAN>
                    <? }?>

                    <?} else {?>
                    <SPAN STYLE='background-color: rgb(255,0,0);'>停用</SPAN>
                    <?}?>
                </td>
                <td width="278" align="center" nowrap>
                    <a href="main.php?action=user_zong_edit&uid=<?=$uid?>&id=<?=$image['id']?>">修改资料</a> / 
                    <a href="main.php?action=user_zong_set&uid=<?=$uid?>&id=<?=$image['id']?>">详细设置</a> /
                    <?if ($image['stat'] == 0) {?>
                    <a href="main.php?action=user_zong_list&uid=<?=$uid?>&stat=1&name=<?=$image['kauser']?>&id=<?=$image['id']?>">停用</a>
                    <?} else {?>
                    <a href="main.php?action=user_zong_list&uid=<?=$uid?>&stat=0&name=<?=$image['kauser']?>&id=<?=$image['id']?>"
                        <SPAN STYLE="color: rgb(255,0,0);">启用</SPAN>
                    </a>
                    <?}?>
                    /
                    <?if ($image['ty'] == 0) {?>
                    <a href="main.php?action=user_zong_list&uid=<?=$uid?>&ty=1&name=<?=$image['kauser']?>&id=<?=$image['id']?>">暂停投注</a>
                    <?} else {?>
                    <a href="main.php?action=user_zong_list&uid=<?=$uid?>&ty=0&name=<?=$image['kauser']?>&id=<?=$image['id']?>">
                        <SPAN STYLE="color: rgb(255,0,0);">开放投注</SPAN></a>
                    <?}?>
                    /
                    <?if ($image['pz'] == 0) {?>
                    <a href="main.php?action=user_zong_list&uid=<?=$uid?>&pz=1&name=<?=$image['kauser']?>&id=<?=$image['id']?>">禁止走飞</a>
                    <?} else {?>
                    <a href="main.php?action=user_zong_list&uid=<?=$uid?>&pz=0&name=<?=$image['kauser']?>&id=<?=$image['id']?>">
                        <SPAN STYLE="color: rgb(255,0,0);">允许走飞</SPAN></a>
                    <?}?>
                    <br>
                    <a href="main.php?action=user_tab&uid=<?=$uid?>&username=<?=$image['kauser']?>&userlx=0" target="_blank">登入</a>/
                    <a href="main.php?action=user_log&uid=<?=$uid?>&username=<?=$image['kauser']?>">日志</a> /
                    <a href="main.php?action=user_mem_zs_list&uid=<?=$uid?>&agent=<?=$image['kauser']?>">查看直属会员</a> /
                    <a href="main.php?action=user_mem_zs_add&uid=<?=$uid?>&agent=<?=$image['kauser']?>">添加直属会员</a>
                    <?if (strpos($flag, "13")) {?>
                    / <a onClick="return confirm('此操作不可恢复!\n确定删除?');"
                        href="main.php?action=user_zong_list&uid=<?=$uid?>&act=del&id=<?=$image['id']?>&sdel=<?=$image['id']?>">删除</a>
                    <?}?>
                </td>
            </tr>
            <?}?>
            <tr>
                <td height="25" colspan="13" bgcolor="#FFFFFF">
                    <table width="98%" border="0" align="center" cellpadding="2" cellspacing="0"
                        bordercolordark="#FFFFFF" bordercolor="888888">
                        <tr>
                            <td width="84" height="26">
                                <?if (strpos($flag, "13")) {?>
                                <button onClick="javascript:if(confirm('此操作不可恢复!\n确定删除选中用户?'))submit();"
                                    ;>删除选定</button>
                                <?}?>
                            </td>
                            <td height="26" align="center">

                                <span class="STYLE9">
                                    当前为第<?=$page?>页&nbsp;总<?=$pagecount?>页&nbsp;共<?=$total?>记录</span>&nbsp;
                        <a href="main.php?action=user_zong_list&uid=<?=$uid?>&guan=<?=$guan?>&dagu=<?=$dagu?>&enable=<?=$enable?>&sort=<?=$vvv?>&orderby=<?=$vvv2?>&page=1">首页</a>
                        <a href="main.php?action=user_zong_list&uid=<?=$uid?>&guan=<?=$guan?>&dagu=<?=$dagu?>&enable=<?=$enable?>&sort=<?=$vvv?>&orderby=<?=$vvv2?>&page=<?=$pre?>">上一页</a> 
                        <a href="main.php?action=user_zong_list&uid=<?=$uid?>&guan=<?=$guan?>&dagu=<?=$dagu?>&enable=<?=$enable?>&sort=<?=$vvv?>&orderby=<?=$vvv2?>&page=<?=$next?>">下一页</a> <a href="main.php?action=user_zong_list&uid=<?=$uid?>&guan=<?=$guan?>&dagu=<?=$dagu?>&enable=<?=$enable?>&sort=<?=$vvv?>&orderby=<?=$vvv2?>&page=<?=$last?>">末页</a>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <?}?>
         </tbody>    
        </form>
    </table>
    <!--快速查詢跳出視窗-->
    <div id="searchDlg" style="display: none;position: absolute;">
        <table border="0" cellspacing="1" cellpadding="2" bgcolor="00558E">
            <tr>
                <td bgcolor="#FFFFFF">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="0163A2" class="m_tab_fix">
                        <tr bgcolor="0163A2">
                            <td>
                                <font color="#FFFFFF">快速查询</font>
                                <font color="#FFFFFF" id="eo_title"></font>
                            </td>
                            <td align="right" valign="top">
                                <a style="cursor:hand;" onClick="closeSearchDlg();"><img src="images/edit_dot.gif"
                                        width="16" height="14"></a>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td bgcolor="#FFFFFF">
                    <table border="0" cellspacing="0" cellpadding="0" bgcolor="0163A2" class="m_tab_fix">
                        <tr bgcolor="#000000">
                            <td colspan="2" height="1"></td>
                        </tr>
                        <tr bgcolor="#A4C0CE">
                            <td>查询条件</td>

                            <td>
                                <select name="dlg_option" class="za_select" id="dlg_option">
                                    <option label="账号" value="username" selected="selected">账号</option>
                                    <option label="名称" value="name">名称</option>
                                </select>
                            </td>
                        </tr>
                        <tr bgcolor="#000000">
                            <td colspan="2" height="1"></td>
                        </tr>
                        <tr bgcolor="#A4C0CE">
                            <td></td>
                            <td>
                                <input type=text id="dlg_text" value="" class="za_text" size="15" maxlength="15">
                            </td>
                        </tr>
                        <tr bgcolor="#000000">
                            <td colspan="2" height="1"></td>
                        </tr>
                        <tr>
                            <td align="center" colspan="2">
                                <input type="submit" id="dlg_ok" value="查询" class="za_button"
                                    onClick="submitSearchDlg();">
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>