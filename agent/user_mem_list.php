<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
if ($vip == 1 || $lx < 1) {
    echo "<center>你没有该权限功能!</center>";
    exit;
}
if ($lx == 4) {
    $select_sql = " and dagu='" . $kauser . "' ";
}
if ($lx == 3) {
    $select_sql = " and guan='" . $kauser . "' ";
}
if ($lx == 2) {
    $select_sql = " and zong='" . $kauser . "' ";
}
if ($lx == 1) {
    $select_sql = " and dai='" . $kauser . "' ";
}
if ($_GET['stat'] == "0") {
    $sql = "update web_member set uid='',adddate='" . $utime . "',stat=0 where id=" . $_GET['id'] . $select_sql;
    if (!$db1->query($sql)) {
        exit("数据库修改出错");
    }
    echo "<script>alert('设置用户[<" . $_GET['name'] . ">]为启用!'); window.location.href = 'main.php?action=user_mem_list&uid={$uid}&vip={$vip}&enable=y';</script>";
    exit;
}
if ($_GET['stat'] == "1") {
    $sql = "update web_member set uid='',adddate='" . $utime . "',stat=1 where id=" . $_GET['id'] . $select_sql;
    if (!$db1->query($sql)) {
        exit("数据库修改出错");
    }
    $kauser = $_GET['name'];
    echo "<script>alert('设置用户[<" . $_GET['name'] . ">]为停用!'); window.location.href = 'main.php?action=user_mem_list&uid={$uid}&vip={$vip}&enable=n';</script>";
    exit;
}
if ($_GET['ty'] == "0") {
    $sql = "update web_member set uid='',adddate='" . $utime . "',ty=0 where id=" . $_GET['id'] . $select_sql;
    if (!$db1->query($sql)) {
        exit("数据库修改出错");
    }
    echo "<script>alert('设置用户[<" . $_GET['name'] . ">]为开放投注!'); window.location.href = 'main.php?action=user_mem_list&uid={$uid}&vip={$vip}&enable=all';</script>";
    exit;
}
if ($_GET['ty'] == "1") {
    $sql = "update web_member set uid='',adddate='" . $utime . "',ty=1 where id=" . $_GET['id'] . $select_sql;
    if (!$db1->query($sql)) {
        exit("数据库修改出错");
    }
    echo "<script>alert('设置用户[<" . $_GET['name'] . ">]为暂停投注!'); window.location.href = 'main.php?action=user_mem_list&uid={$uid}&vip={$vip}&enable=s';</script>";
    exit;
}
$sort = $_GET['sort'];
$orderby = $_GET['orderby'];
$enable = $_GET['enable'];
$key = $_GET['key'];
$search = $_GET['search'];
if ($lx == 4) {
    $dai = $_GET['dai'];
    $zong = $_GET['zong'];
    $guan = $_GET['guan'];
    $dagu = $kauser;
}
if ($lx == 3) {
    $dai = $_GET['dai'];
    $zong = $_GET['zong'];
    $guan = $kauser;
    $dagu = "";
}
if ($lx == 2) {
    $dai = $_GET['dai'];
    $zong = $kauser;
    $guan = "";
    $dagu = "";
}
if ($lx == 1) {
    $dai = $kauser;
    $zong = "";
    $guan = "";
    $dagu = "";
}
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
    case "ts":
        $vvv = "ts";
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
            $term2 = "";
            break;
        default:
            $term .= "and guan='" . $guan . "' ";
            $term2 = "and guan='" . $guan . "' ";
            break;
    }
} else {
    $guan = "all";
}
if ($zong != "") {
    switch ($zong) {
        case "all":
            $zong = "all";
            $term .= "";
            $term3 = "";
            break;
        default:
            $term .= "and zong='" . $zong . "' ";
            $term3 = "and zong='" . $zong . "' ";
            break;
    }
} else {
    $zong = "all";
}
if ($dai != "") {
    switch ($dai) {
        case "all":
            $dai = "all";
            $term .= "";
            break;
        default:
            $term .= "and dai='" . $dai . "' ";
            break;
    }
} else {
    $dai = "all";
}
$pagesize = 10;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$result = $db1->query("select count(*) from web_member where zs=1 " . $term . " order by id desc");
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

<style type="text/css">
    <!--
    .m_title_sucor {
        background-color: #FEF5B5;
        text-align: center}
    .m_title {
        background-color: #E3D46E;
        text-align: center}
    -->
</style>
<script src="js/function.js" type="text/javascript"></script>
<script language=javascript src="js/user_search.js" type=text/javascript></script>
<script language=javascript>
function onLoad() {
        var obj_enable = $("enable");
        obj_enable.value = "<?=$enable?>";
        var obj_orderby = $("orderby");
        obj_orderby.value = "<?=$orderby?>";
        var obj_page = $("page");
        obj_page.value = "<?=$page?>";
        var obj_sort = $("sort");
        obj_sort.value = "<?=$sort?>";
        <? if (3 < $lx) {?>
         var obj_guan=$("guan");  
         obj_guan.value='<?=$guan?>';
      <?  } if (2 < $lx) {?>
         var obj_zong=$("zong");  
            obj_zong.value='<?=$zong?>';
          
       <? } if (1 < $lx) {?>
          var obj_dai=$("dai");  
          obj_dai.value='<?=$dai?>';
      <?  }?>
    }
    </script>
<body style="min-width: 1200px;width: 100%">
    <div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;用户管理&nbsp;&nbsp;</span><span class="font_b">会员管理</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright">
    <table border="0" align="right" cellpadding="0" cellspacing="0">
        <form action="main.php" method="get" name="myFORM" id="myFORM">
          <tbody>
            <tr>
                            <td height="28" style="color:#fff;">&nbsp;会员管理:&nbsp;&nbsp;
                            <?if ($lx == 4) {?>
                            <span>股东:</span>
                                <select id="guan" name="guan" onChange="document.myFORM.submit();" class="za_select">
                                    <option value="all">全部</option>
                                    <? $result = $db1->query("select * from web_agent where lx=3 " . $term1 . " order by id desc");
    while ($image = $result->fetch_array()) {?>
                                    <option value="<?=$image['kauser']?>"> <?=$image['kauser']?></option>
                                    <? }?>
                                </select>
                            <?}  if (2 < $lx) {?>
                            <span>总代理:</span>
                                <select id="zong" name="zong" onChange="document.myFORM.submit();" class="za_select">
                                    <option value="all">全部</option>
                                    <?$result = $db1->query("select * from web_agent where lx=2 " . $term2 . " order by id desc");
    while ($image = $result->fetch_array()) {?>
                                    <option value="<?=$image['kauser']?>"> <?=$image['kauser']?></option>
                                    <? }?>
                                </select>
                            <?}?>

                            <?if (1 < $lx) {?>
                            <span>代理:</span>
                                <select id="dai" name="dai" onChange="document.myFORM.submit();" class="za_select">
                                    <option value="all">全部</option>
                                    <? $result = $db1->query("select * from web_agent where lx=1 " . $term3 . " order by id desc");
    while ($image = $result->fetch_array()) {?>
                                    <option value="<?=$image['kauser']?>"><?=$image['kauser']?></option>
                                    <?}?>
                                </select>
                            <?}?>
                                <select id="enable" name="enable" onChange="document.myFORM.submit()" class="za_select">
                                    <option value="all">全部</option>
                                    <option value="y">启用</option>
                                    <option value="n">停用</option>
                                    <option value="s">暂停</option>
                                </select>
                            <span> -- 排序:</span>
                                <select id="sort" name="sort" onChange="document.myFORM.submit();" class="za_select">
                                    <option value="username">账号</option>
                                    <option value="name">名称</option>
                                    <option value="cs">信用额度</option>
                                    <option value="ts">分配余额</option>
                                    <option value="slogin">新增日期</option>
                                </select>
                            &nbsp;

                                <select id="orderby" name="orderby" onChange="document.myFORM.submit()"
                                    class="za_select">
                                    <option value="desc">降幂(由大到小)</option>
                                    <option value="asc">升幂(由小到大)</option>
                                </select>
                            <td> --&nbsp;总页数&nbsp;:&nbsp;</span>

                                <select id="page" name="page" onChange="document.myFORM.submit()" class="za_select">";
                                    <?if ($pagecount == 0) {?>
                                    <option value='0'>0</option>
                                    <?} else {?>
                                    <? $i = 0;
    for (; $i < $pagecount; ++$i) {?>
                                    <option value='<?=$i + 1?>'><?=$i + 1?></option>
                                    <?}}?>
                                </select>
                            &nbsp;/&nbsp;
                                <?=$pagecount?>&nbsp;页&nbsp;--&nbsp;
                            <input type="button" name="btn_search" value="快速查询" onClick="showSearchDlg();"
                                    class="za_button">
                            <td nowrap="nowrap">--</span>
                            <input type="button" name="append" value="新增"
                                    onClick="javascript:location.href='main.php?action=user_mem_add&uid=<?=$uid?>&vip=<?=$vip?>'" class="btn2" />


                    <input name="search" type="hidden" id="search" value="" /> 
                    <input name="key" type="hidden" id="key" value="" /> 
                    <input name="action" type="hidden" id="action" value="user_mem_list" /> 
                    <input name="uid" type="hidden" id="uid" value="<?=$uid?>" />
                    <input name="vip" type="hidden" id="uid" value="<?=$vip?>" />
                </td>
            </tr>
         </tbody>    
        </form>
    </table></div></div>

   <? $result = $db1->query("select * from web_member where zs=1 " . $term . " order by " . $vvv . " " . $vvv2 . " limit " . $offset . "," . $pagesize);?>

  <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bordercolordark="#FFFFFF" class="t_list">
        <form name="form1" method="post" action="main.php?action=user_mem_list&uid=<?=$uid?>&vip=<?=$vip?>">
          <tbody><tr>
            <td nowrap class="t_list_caption">在线</td>
            <td nowrap class="t_list_caption">会员帐号</td>
            <td align="center" nowrap class="t_list_caption">会员名称</td>
            <td align="center" nowrap class="t_list_caption">信用额度/分配余额</td>
            <td align="center" class="t_list_caption">盘口</td>
            <td align="center" class="t_list_caption" style="min-width: 48px">新增日期</td>
            <td align="center" nowrap class="t_list_caption">代理%</td>
            <?if (1 < $lx) { ?>
            <td align="center"   nowrap class="t_list_caption">总代理%</td>
            <?}if (2 < $lx) {?>
            <td align="center"   nowrap class="t_list_caption">股东%</td>
            <?}?>

            <?if ($lx == 4) {?>
            <td align="center" nowrap class="t_list_caption">大股东%</td>
            <?}?>

            <td  align="center" width="100" nowrap class="t_list_caption">账号状况</td>

            <td align="center" width="280" class="t_list_caption">功能</td>
            </tr>
            <?$cou = $result->num_rows;
           if ($cou == 0) {?>
            <tr>
               <td height="28" colspan="100" align="center" bgcolor="#FFFFFF">查无任何资料</td>
            </tr>
            <?} else {?>
           <? while ($image = $result->fetch_array()) {?>
            <tr bgColor="#ffffff">
                <td width="26" align="center" nowrap>
                    <?=get_online($image['kauser'])?>
                </td>
                <td width="73" height="25" align="center" nowrap>
                    <?=$image['kauser']?>
                </td>
                <td width="73" height="25" align="center">
                    <?=$image['xm']?>
                </td>
                <td width="135" height="25" align="right">
                    <?=$image['cs']?>/<font color=ff0000><?=round($image['ts'], 2)?></font>
                </td>
                <td width="50" align="center">
                    <?=$image['abcd']?>
                    盘
                </td>
                <td width="110" align="center">
                    <?=date("Y-m-d / H:i", strtotime($image['slogin']))?>
                </td>
    <td width="50" align="center" nowrap><a href="<?if (1 < $lx) {?>main.php?action=user_mem_list&uid=<?=$uid?>&vip=<?=$vip?>&dai=<?=$image['dai']?><?}else{?>#<?}?>" style="color:000000" >
                <?if (1 < $lx) {?>(<?=$image['dai']?>)<?}?><?=$image['dai_zc']?></a></td>
                <?if (1 < $lx) {?>
                <td width="50" align="center" nowrap><a href="<?if (2 < $lx) {?>main.php?action=user_mem_list&uid=<?=$uid?>&vip=<?=$vip?>&zong=<?=$image['zong']?><?} else {?>#<?}?>" style="color:000000">
                        <?if (2 < $lx) {?>(<?=$image['zong']?>)<? }?> <?=$image['zong_zc']?>
                    </a></td>
                <?}?>

                <? if (2 < $lx) {?>
                <td width="50" align="center" nowrap><a href="<? if ($lx==4) {?>main.php?action=user_mem_list&uid=<?=$uid?>&vip=<?=$vip?>&guan=<?=$image['guan']?><?} else {?>#<?}?>" style="color:000000" >
                        <?if ($lx == 4) {?>(<?=$image['guan']?>)
                        <?}?><?=$image['guan_zc']?>
                    </a></td>
                <?}?>

                <? if ($lx == 4) {?>
                <td width="50" height="25" align="center" nowrap><a href="#" style="color:000000">
                        <?=$image['dagu_zc']?>
                    </a></td>
                <?}?>
                <td height="25" align="center">
                    <? if ($image['stat'] == 0) {?>

                    <? if ($image['ty'] == 0) {?>
                   启用
                    <? } else {?>

                    <SPAN STYLE='background-color: rgb(0,255,0);'>[暂停下注]</SPAN>
                    <?}?>

                    <?} else {?>
                    <SPAN STYLE='background-color: rgb(255,0,0);'>停用</SPAN>
                    <?}?>

                </td>
                <td width="250" height="25" align="center">
                    <a href="main.php?action=user_mem_edit&uid=<?=$uid?>&vip=<?=$vip?>&id=<?=$image['id']?>">修改资料</a> 
		            <a href="main.php?action=user_mem_set&uid=<?=$uid?>&vip=<?=$vip?>&id=<?=$image['id']?>">详细设置
                    </a> /
                    <?if ($image['stat'] == 0) {?>
                    <a href="main.php?action=user_mem_list&uid=<?=$uid?>&vip=<?=$vip?>&stat=1&name=<?=$image['kauser']?>&id=<?=$image['id']?>">停用
                    </a>
                    <?} else {?>
                    <a href="main.php?action=user_mem_list&uid=<?=$uid?>&vip=<?=$vip?>&stat=0&name=<?=$image['kauser']?>&id=<?=$image['id']?>">
                                     <SPAN STYLE=" color: rgb(255,0,0);">启用</SPAN></a>
                    <?}?>
                      /
                    <?if ($image['ty'] == 0) {?>
                    <a href="main.php?action=user_mem_list&uid=<?=$uid?>&vip=<?=$vip?>&ty=1&name=<?=$image['kauser']?>&id=<?=$image['id']?>">暂停投注</a>
                   <? } else {?>
                    <a href="main.php?action=user_mem_list&uid=<?=$uid?>&vip=<?=$vip?>&ty=0&name=<?=$image['kauser']?>&id=<?=$image['id']?>">
                   <SPAN STYLE="color:rgb(255,0,0);">开放投注</SPAN></a>
                   <?}?><br>
                    <a href="main.php?action=real_list&uid=<?=$uid?>&vip=<?=$vip?>&username=<?=$image['kauser']?>">注单</a> / <a href="#"
                        onClick="ops('look.html?action=user_log&uid=<?=$uid?>&vip=<?=$vip?>&username=<?=$image['kauser']?>',400,750);">日志</a>
                </td>
            </tr> <?
            }
            ?> <tr>
                <td height="25" colspan="12" bgcolor="#FFFFFF">
                    <table width="98%" border="0" align="center" cellpadding="2" cellspacing="0"
                        bordercolordark="#FFFFFF" bordercolor="888888">
                        <tr>
                            <td height="26" align="center">
                                <span class=" STYLE9">
                                   当前为第<?=$page?>页&nbsp;总<?=$pagecount?>页&nbsp;共<?=$total?>记录</span>
                                   &nbsp;<a href="main.php?action=user_mem_list&uid=<?=$uid?>&vip=<?=$vip?><?if (1 < $lx) {?>&dai=<?=$dai?><?} if(2 < $lx) {?>&zong=<?=$zong?><?} if ($lx==4) {?>&guan=<?=$guan?><?} ?>&enable=<?=$enable?>&sort=<?=$vvv?>&orderby=<?=$vvv2?>&page=1">首页</a> 
                                   <a href="main.php?action=user_mem_list&uid=<?=$uid?>&vip=<?=$vip?><?if (1 < $lx) {?>&dai=<?=$dai?><?} if (2 < $lx) {?>&zong=<?=$zong?><?} if ($lx==4) {?>&guan=<?=$guan?><?} ?>&enable=<?=$enable?>&sort=<?=$vvv?>&orderby=<?=$vvv2?>&page=<?=$pre?>">上一页</a>
                                <a href="main.php?action=user_mem_list&uid=<?=$uid?>&vip=<?=$vip?><?if (1 < $lx) {?>&dai=<?=$dai?><?} if(2 < $lx) { ?>&zong=<?=$zong?><?} if ($lx==4) {?>&guan=<?=$guan?><?}?>&enable=<?=$enable?>&sort=<?=$vvv?>&orderby=<?=$vvv2?>&page=<?=$next?>">下一页</a> 
                                <a href="main.php?action=user_mem_list&uid=<?=$uid?>&vip=<?=$vip?><?if (1 < $lx) { ?>&dai=<?=$dai?><?} if(2 < $lx) {?>&zong=<?=$zong; }?><? if ($lx==4) {?>&guan=<?=$guan?><?}?>&enable=<?=$enable?>&sort=<?=$vvv?>&orderby=<?=$vvv2?>&page=<?=$last?>">末页</a> </td>
                        </tr>
                    </table>
                </td>
            </tr><?
            }
           ?>
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
                                <font color"; echo "=" #FFFFFF">快速查询</font>
                                <font color="#FFFFFF" id="eo_title"></font>
                            </td>
                            <td align="right" valign="top"><a style="cursor:hand;" onClick="closeSearchDlg();">
                                <img src="images/edit_dot.gif" width="16" height="14"></a></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr> 
            <td bgcolor="#FFFFFF">
                    <table border="0" cellspacing="0" cellpadding="0" bgcolor"; echo "=" 0163A2" class="m_tab_fix">
                        <tr bgcolor="#000000">
                            <td colspan="2" height="1"></td>
                        </tr>
                        <tr bgcolor="#A4C0CE">
                            <td>查询条件</td>
                            <td> 
                            
                               <select name=" dlg_option" class="za_select" id="dlg_option">
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
                            <td> <input type=text id="dlg_text" value="" class="za_text" size="15" maxlength="15"> </td>
                        </tr>
                        <tr bgcolor="#000000">
                            <td colspan="2" height="1"></td>
                        </tr>
                        <tr>
                            <td align="center" colspan="2"> <input type="submit" id="dlg_ok" value="查询" class="za_b" ;
                                    echo "utton" onClick="submitSearchDlg();"> </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>