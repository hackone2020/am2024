<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
if (strpos($flag, "14")) {
} else {
    echo "<center>你没有该权限功能!</center>";
    exit;
}
if ($_GET['alldel'] == "delall1") {
    $db1->query("Delete from web_user_log where lx=0");
    $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $jxadmin . "',kauser='" . $jxadmin . "',lx=3,text1='系统管理',text2='清空登陆日志',ip='" . $userip . "'";
    $db1->query($sql);
    echo "<script>alert('登陆日志清空成功!'); window.location.href = 'main.php?action=web_log&uid=" . $uid . "&lx=0';</script>";
    exit;
}
if ($_GET['alldel'] == "delall2") {
    $db1->query("Delete from web_user_log where lx=2");
    
    $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $jxadmin . "',kauser='" . $jxadmin . "',lx=3,text1='系统管理',text2='清空用户更改日志',ip='" . $userip . "'";
    $db1->query($sql);
    echo "<script>alert('用户更改日志清空成功!'); window.location.href = 'main.php?action=web_log&uid=" . $uid . "&lx=2';</script>";
    exit;
}
if ($_GET['alldel'] == "delall3") {
    $db1->query("Delete from web_user_log where lx=3");
    $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $jxadmin . "',kauser='" . $jxadmin . "',lx=3,text1='系统管理',text2='清空操盘日志',ip='" . $userip . "'";
    $db1->query($sql);
    echo "<script>alert('操盘日志清空成功!'); window.location.href = 'main.php?action=web_log&uid=" . $uid . "&lx=3';</script>";
    exit;
}
if ($_GET['alldel'] == "delall30") {
    $db1->query("Delete from web_user_log where adddate <'" . date("Y-m-d", strtotime($utime . " -30 day")) . "'");
    $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $jxadmin . "',kauser='" . $jxadmin . "',lx=3,text1='系统管理',text2='删除30天前的日志',ip='" . $userip . "'";
    $db1->query($sql);
    echo "<script>alert('成功删除30天前的日志!');window.location.href='main.php?action=web_log&uid=" . $uid . "&lx=3';</script>";
    exit;
}
if ($_GET['alldel'] == "delall4") {
    $db1->query("TRUNCATE TABLE web_user_log");
    $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $jxadmin . "',kauser='" . $jxadmin . "',lx=3,text1='系统管理',text2='清空全部日志',ip='" . $userip . "'";
    $db1->query($sql);
    echo "<script>alert('操盘日志清空成功!'); window.location.href = 'main.php?action=web_log&uid=" . $uid . "';</script>";
    exit;
}
if ($_POST['sdel1'] != "") {
    $del_num = count($_POST['sdel1']);
    $i = 0;
    for (; $i < $del_num; ++$i) {
        $db1->query("Delete from web_user_log where id='{$sdel1[$i]}'");
    }
    $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $jxadmin . "',kauser='" . $jxadmin . "',lx=3,text1='系统管理',text2='删除用户日志',ip='" . $userip . "'";
    $db1->query($sql);
    echo "<script>alert('删除成功!');window.location.href='main.php?action=web_log&uid=" . $uid . "';</script>";
    exit;
}
$lx = $_GET['lx'];
if ($lx != "") {
    $vvv = " where lx=" . $lx;
} else {
    $vvv = " where lx=0 ";
}
if ($jxadmin != "admin") {
    $vvv .= " and adduser!='admin' ";
}?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<body style="min-width: 1200px;width: 100%">
<script language=JAVAscript>//判断全选反选function checksel(form)
        { if (form.sele.checked == true) checkall(form, true); elsecheckall(form, false); }///////////////////全选/////////////////////////
        function CheckAll(form) {
            for (var i = 0; i < form.elements.length; i++) {
                var e = form.elements[i];
                //if (e.name != 'chkall')e.checked = true// form.chkall.checked;}}/////";
                //////////////全部取消/////////////////////////
                function checkall(form, str) { for (var i = 0; i < form.elements.length; i++) { var e = form.elements[i];
//if (e.name != 'chkall')e.checked = str// form.chkall.checked;}}
    </script>
  <div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">用户管理</span><span class="font_b">用户日志</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright">
         <div align="right"> 
        <input name="button" type="button" class="za_button" onClick="javascript:location.reload();"value="更新" />&nbsp;&nbsp;
        <a href="#" onClick="javascript:history.go(-1)" ;>回上一页</a>
      </div>
</div>    

 <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
    <tbody>
    <tr>
        <form action="main.php?action=web_log&uid=<?=$uid?>" method="post" name="form1">
            <tr>
                <td height="20" colspan="7" align="center" bordercolor="cccccc" bgcolor="#D9F2CF"><a
                        href="main.php?action=web_log&uid=<?=$uid?>&lx=0" ; <?if ($lx==0) {?>
                        echo "style="color:ff0000" ";
                        <?}?>
                        >登陆日志
                    </a>&nbsp;&nbsp;&nbsp;<a href="main.php?action=web_log&uid=<?=$uid?>&lx=2" <?if ($lx==2) {?>style="color:ff0000"<?}?> >用户更改日志</a>&nbsp;&nbsp;&nbsp;
                    <a href="main.php?action=web_log&uid=<?=$uid?>&lx=3" <? if ($lx==3) {?>
                      style="color:ff0000"
                        <?}?>
                        >操盘日志
                    </a>
        <a onClick="return confirm('此操作不可恢复\n确定清空登陆日志');" href="main.php?action=web_log&uid=<?=$uid?>&alldel=delall1">清空登陆日志</a>&nbsp;&nbsp; 
        <a onClick="return confirm('此操作不可恢复!\n确定清空用户更改日志');" href="main.php?action=web_log&uid=<?=$uid?>&alldel=delall2">清空用户更改日志</a>&nbsp;&nbsp;
        <a onClick="return confirm('此操作不可恢复!\n确定清空操盘日志');" href="main.php?action=web_log&uid=<?=$uid?>&alldel=delall3">清空操盘日志</a>&nbsp;&nbsp; 
        <a onClick="return confirm('此操作不可恢复!\n确定删除30天前的日志');" href="main.php?action=web_log&uid=<?=$uid?>&alldel=delall30">删除30天前的日志</a>&nbsp;&nbsp;
            </tr>

            <tr>
               <td class="t_list_caption">
                    <input type="checkbox" name="sele" value="checkbox" onClick="javascript:checksel(this.form);" />
                </td>
                <td class="t_list_caption">操作者/期数</td>
                <td class="t_list_caption">IP</td>
                <td align="center" class="t_list_caption">用户</td>
                <td class="t_list_caption">操作内容 1</td>
                <td class="t_list_caption">操作内容 2</td>
                <td class="t_list_caption">操作时间</td>
            </tr>
            <? $pagesize = 10;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$result = $db1->query("select count(*) from web_user_log  " . $vvv . "  order by id desc");
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
$result = $db1->query("select * from web_user_log  " . $vvv . "  order by id desc limit " . $offset . "," . $pagesize);
while ($image = $result->fetch_array()) {?>
            <tr bgcolor="#ffffff" onmouseover="onMouseOver(this)" onmouseout="onMouseOut(this)" onclick="onMouseClick(this)">
                 <td align="center" valign="middle"><input name="sdel1[]" type="checkbox" id="sdel1[]" value="<?=$image['id']?>" /></td>

                 <td height="38" align="center" valign="middle"><?=$image['adduser']?></td>

                <td align="center" bordercolor="cccccc" bgcolor="#FFFFFF"><?=$image['ip']?></td>
                <td align="center" valign="middle" class="font_g"><?=$image['kauser']?></td>

                 <td align="center" valign="middle"><?=$image['text1']?></td>
                <td align="center" nowrap="nowrap" bordercolor="cccccc" bgcolor="#FFFFFF"><?=$image['text2']?></td>

                <td align="center" nowrap="nowrap" bordercolor="cccccc" bgcolor="#FFFFFF"><?=$image['adddate']?></td>
            </tr>
            <?}?>
            <tr>
               
                <td height="28" colspan="7" align="center" bgcolor="#FFFFFF">
                 <button class="za_button" onClick="javascript:if(confirm('此操作不可恢复!\n确定删除选中日志?'))submit();">删除选定</button>
                  当前为第<?=$page?>页&nbsp;总<?=$pagecount?>页&nbsp;共<?=$total?>记录
                  </span>&nbsp;<a href="main.php?action=web_log&uid=<?=$uid?>&lx=<?=$lx?>&page=1">首页</a>
                 <a href="main.php?action=web_log&uid=<?=$uid?>&lx=<?=$lx?>&page=<?=$pre?>">上一页</a> 
                 <a href="main.php?action=web_log&uid=<?=$uid?>&lx=<?=$lx?>&page=<?=$next?>">下一页</a> 
                 <a href="main.php?action=web_log&uid=<?=$uid?>&lx=<?=$lx?>&page=<?=$last?>">末页</a>
<select name="page2" onChange="location.href='main.php?action=web_log&uid=<?=$uid?>&lx=<?=$lx?>&page='+this.options[selectedIndex].value">
                                    <? $i = 1;
for (; $i <= $pagecount; ++$i) {?>
                                    <option value="<?=$i?>" <?if ($page==$i) {?>
                                        "selected"
                                        <?}?>
                                        >第
                                        <?=$i?>页
                                    </option>
                                    <?}?>

                                </select>&nbsp;
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </form>
    </table>
</body>