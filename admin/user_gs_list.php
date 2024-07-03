<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
if (strpos($flag, "13")) {
} else {
    echo "<center>你没有该权限功能!</center>";
    exit;
}
if ($_POST['sdel'] != "") {
    $del_num = count($_POST['sdel']);
    $i = 0;
    for (; $i < $del_num; ++$i) {
        $db1->query("Delete from web_admin where id='{$sdel[$i]}'");
    }
    $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $jxadmin . "',kauser='" . $jxadmin . "',lx=3,text1='管理员管理',text2='批量删除管理员!!',ip='" . $userip . "'";
    $db1->query($sql);
    echo "<script>alert('删除成功!');window.location.href='main.php?action=user_gs_list&uid=" . $uid . "';</script>";
    exit;
}
if ($_GET['sdel'] != "") {
    $dell = $_GET['sdel'];
    $user = $_GET['name'];
    $db1->query("Delete from web_admin where id='{$sdel}'");
    $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $jxadmin . "',kauser='" . $jxadmin . "',lx=3,text1='管理员管理',text2='删除管理员:" . $user . "',ip='" . $userip . "'";
    $db1->query($sql);
    echo "<script>alert('删除成功!'); window.location.href = 'main.php?action=user_gs_list&uid=" . $uid . "';</script>";
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
            <div class="tit_center floatleft font_bold"><span class="font_g">用户管理</span> <span class="font_b">管理员</span></div>
            <div class="tit_right floatleft"><img src="/images/tit_03.png" width="4" height="31" alt=""></div>
            <div class="biaoti_right floatright">
                <table border="0" align="right" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td height="28" style="color:#fff;">
                                筛选:
                                <select id="status" name="status" onchange="CheckSelect()">
                                    <option value="all">全部</option>
                                    <option value="1">启用</option>
                                    <option value="3">停用</option>
                                    <option value="2">暂停</option>
                                </select>&nbsp;&nbsp;
                                排序:
                                <select id="sort" name="sort" onchange="CheckSelect()">
                                    <option value="created_at">新增时间</option>
                                    <option value="User.last_login_at">最后登陆时间</option>
                                    <option value="UserMembership.credits">信用额度</option>
                                    <option value="`UserMembership.creditsRemaining`">可用额度</option>
                                    <option value="username">账号</option>
                                </select>
                                <select id="orderby" name="orderby" onchange="CheckSelect()">
                                    <option value="desc">降幂(由大到小)</option>
                                    <option value="asc">升幂(由小到大)</option>
                                </select>&nbsp;&nbsp;

                                <span>搜索:</span>



                                <select id="search" name="search">
                                    <option value="username">用户账号:</option>
                                    <option value="remark">用户备注:</option>
                                </select>
                                <input name="like" type="text" class="inp1" id="like" onfocus="this.className='inp1m'" onblur="this.className='inp1'" value="" size="8">
                                <input name="button1" type="button" class="btn4" onmouseover="this.className='btn4m'" onmouseout="this.className='btn4'" onclick="Search();" value="查找">&nbsp;&nbsp;
                                <input name="button2" type="button" class="btn2" onmouseover="this.className='btn2m'" onmouseout="this.className='btn2'" onclick="javascript:location.href='main.php?action=user_gs_add&uid=<?=$uid?>'" value="新增">&nbsp;&nbsp;

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
                    <td width="26" nowrap class="t_list_caption">在线</td>
                    <td nowrap="" class="t_list_caption">
                        用户类型
                    </td>
                    <td nowrap="" class="t_list_caption">帐号</td>
                    <td align="center" class="t_list_caption">新增时间</td>
                    <td align="center" class="t_list_caption">功能</td>
                    <td align="center" class="t_list_caption">状态</td>
            </tr>
            <? $cou = $result->num_rows;
            if ($cou == 0) { ?>
                <tr class="m_title">
                    <td align="center" colspan="6" bgcolor="#fff" height="30">暂无管理员</td>
                </tr>
                <? } else {
                while ($image = $result->fetch_array()) { ?>
                    <tr bgcolor="#ffffff">
                        <!--<td height="43" align="center" nowrap="">-->
                        <!--    <input name="sdel[]" type="checkbox" id="sdel" value="<?= $image['id'] ?>" />-->
                        <!--</td>-->
                        <td width="26" align="center" nowrap><?= get_online($image['username']) ?></td>
                        <td height="43" align="center" nowrap="">
                            系统管理员
                        </td>
                        <td align="center" nowrap="">
                            <?= $image['username'] ?>
                        </td>
                        <td align="center" nowrap="">
                            <?= $image['CreateTime'] ?>
                        </td>
                        <td align="center" nowrap=""> <a href="main.php?action=user_gs_edit&uid=<?= $uid ?>&id=<?= $image['id'] ?>">修改</a> / <a href="main.php?action=user_log&uid=<?= $uid ?>&username=<?= $image['username'] ?>">日志</a> / <a onClick="return confirm('此操作不可恢复!\n确定删除?');" href="main.php?action=user_gs_list&uid=<?= $uid ?>&act=del&id=<?= $image['id'] ?>&sdel=<?= $image['id'] ?>&name=<?= $image['username'] ?>">删除</a>
                        </td>
                        <td align="center" nowrap="">
                            <? if ($image['Status'] == 1) {
                                echo "启用";
                            } else {
                                echo "停用";
                            } ?>
                        </td>
                    </tr>
                <? } ?>
                <tr>
                    <td height="28" colspan="6" align="center" bgcolor="#FFFFFF">
                        <!--<button onClick="javascript:if(confirm('此操作不可恢复!\n确定删除选中用户?'))submit();";>删除选定</button>-->

                        共 <?= $pagecount ?> 页,&nbsp;<?= $total ?> 条记录</span>&nbsp;<a href="main.php?action=user_gs_list&uid=<?= $uid ?>&sort=<?= $vvv ?>&orderby=<?= $vvv2 ?>&page=1">首页</a> <a href="main.php?action=user_gs_list&uid=<?= $uid ?>&sort=<?= $vvv ?>&orderby=<?= $vvv2 ?>&page=<?= $pre ?>">上一页</a> <a href="main.php?action=user_gs_list&uid=<?= $uid ?>&sort=<?= $vvv ?>&orderby=<?= $vvv2 ?>&page=<?= $next ?>">下一页</a> <a href="main.php?action=user_gs_list&uid=<?= $uid ?>&sort=<?= $vvv ?>&orderby=<?= $vvv2 ?>&page=<?= $last ?>">尾页</a>
                    </td>
                </tr>
        </tbody>
    <? } ?>
    </form>
    </table>
</body>