<?php

if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
if (strpos($flag, "08")) {
} else {
    echo "<center>��û�и�Ȩ�޹���!</center>";
    exit;
}
if (strpos($flag, "13")) {
    if ($_POST['sdel'] != "") {
        $del_num = count($_POST['sdel']);
        $i = 0;
        for (; $i < $del_num; ++$i) {
            $result = $db1->query("select kauser from web_member  where id='{$sdel[$i]}' order by id desc LIMIT 1");
            $row = $result->fetch_array();
            $cou = $result->num_rows;
            if ($cou != 0) {
                $kauser = $row['kauser'];
                $db1->query("Delete from web_member where kauser='{$kauser}'");
                $db1->query("Delete from web_user_ds where lx=0  and username='{$kauser}'");
                $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $jxadmin . "',kauser='" . $jxadmin . "',lx=3,text1='ֱ����Ա����',text2='ɾ��ֱ����Ա:" . $kauser . "',ip='" . $userip . "'";
                $db1->query($sql);
            }
        }
        echo "<script>alert('ɾ���ɹ���');window.location.href='main.php?action=user_mem_zs_list&uid={$uid}';</script>";
        exit;
    }
    if ($_GET['sdel'] != "") {
        $dell = $_GET['sdel'];
        $result = $db1->query("select kauser from web_member  where id='{$dell}' order by id desc LIMIT 1");
        $row = $result->fetch_array();
        $cou = $result->num_rows;
        if ($cou != 0) {
            $kauser = $row['kauser'];
            $db1->query("Delete from web_member where kauser='{$kauser}'");
            $db1->query("Delete from web_user_ds where lx=0  and username='{$kauser}'");
            $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $jxadmin . "',kauser='" . $jxadmin . "',lx=3,text1='ֱ����Ա����',text2='ɾ��ֱ����Ա:" . $kauser . "',ip='" . $userip . "'";
            $db1->query($sql);
        }
        echo "<script>alert('ɾ���ɹ���'); window.location.href = 'main.php?action=user_mem_zs_list&uid={$uid}';</script>";
        exit;
    }
}
if ($_GET['stat'] == "0") {
    $sql = "update web_member set uid='',adddate='" . $utime . "',stat=0 where id=" . $_GET['id'];
    if (!$db1->query($sql)) {
        exit("���ݿ��޸ĳ���");
    }
    echo "<script>alert('�����û�[<" . $_GET['name'] . ">]Ϊ����!'); window.location.href = 'main.php?action=user_mem_zs_list&uid={$uid}&enable=y';</script>";
    exit;
}
if ($_GET['stat'] == "1") {
    $sql = "update web_member set uid='',adddate='" . $utime . "',stat=1 where id=" . $_GET['id'];
    if (!$db1->query($sql)) {
        exit("���ݿ��޸ĳ���");
    }
    $kauser = $_GET['name'];
    echo "<script>alert('�����û�[<" . $_GET['name'] . ">]Ϊͣ��!'); window.location.href = 'main.php?action=user_mem_zs_list&uid={$uid}&enable=n';</script>";
    exit;
}
if ($_GET['ty'] == "0") {
    $sql = "update web_member set uid='',adddate='" . $utime . "',ty=0 where id=" . $_GET['id'];
    if (!$db1->query($sql)) {
        exit("���ݿ��޸ĳ���");
    }
    echo "<script>alert('�����û�[<" . $_GET['name'] . ">]Ϊ����Ͷע!'); window.location.href = 'main.php?action=user_mem_zs_list&uid={$uid}&enable=all';</script>";
    exit;
}
if ($_GET['ty'] == "1") {
    $sql = "update web_member set uid='',adddate='" . $utime . "',ty=1 where id=" . $_GET['id'];
    if (!$db1->query($sql)) {
        exit("���ݿ��޸ĳ���");
    }
    echo "<script>alert('�����û�[<" . $_GET['name'] . ">]Ϊ��ͣͶע!'); window.location.href = 'main.php?action=user_mem_zs_list&uid={$uid}&enable=s';</script>";
    exit;
}
$sort = $_GET['sort'];
$orderby = $_GET['orderby'];
$enable = $_GET['enable'];
$key = $_GET['key'];
$search = $_GET['search'];
$zslx = $_GET['zslx'];
$agent = $_GET['agent'];
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
if ($zslx != "") {
    switch ($zslx) {
        case "all":
            $zslx = "all";
            $term .= "";
            $term1 = "";
            break;
        case "dagu":
            $zslx = "dagu";
            $term .= "and zs='4' ";
            $term1 = "and zs='4' ";
            break;
        case "guan":
            $zslx = "guan";
            $term .= "and zs='3' ";
            $term1 = "and zs='3' ";
            break;
        case "zong":
            $zslx = "zong";
            $term .= "and zs='2' ";
            $term1 = "and zs='2' ";
            break;
        default:
            $zslx = "all";
            $term .= "";
            $term1 = "";
            break;
    }
} else {
    $zslx = "all";
}
if ($agent != "") {
    switch ($agent) {
        case "all":
            $dai = "all";
            $term .= "";
            break;
        default:
            $term .= "and dai='" . $agent . "' ";
            break;
    }
} else {
    $agent = "all";
}
$pagesize = 10;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$result = $db1->query("select count(*) from web_member where zs>1 " . $term . " order by id desc");
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
    <!--.m_title_sucor {background-color: #FEF5B5;text-align: center}.m_title {background-color: E3D46E;text-align: center}
    -->
</style>
<script src="js/function.js" type="text/javascript"></script>
<script language=javaScript src="js/user_search.js" type=text/javascript></script>
<script language=javaScript>
function onLoad() {
     var obj_enable = $("enable"); 
     obj_enable.value = '<?=$enable?>';
     var obj_orderby = $("orderby");
     obj_orderby.value = '<?=$orderby?>';
     var obj_page = $("page");
     obj_page.value = '<?=$page?>';
     var obj_sort = $("sort");
     obj_sort.value = '<?=$sort?>';
     var obj_zslx = $("zslx");
     obj_zslx.value = '<?=$zslx?>';
     var obj_agent = $("agent");
     obj_agent.value = '<?=$agent?>';
      
      }
     
</script>
<body style="min-width: 1200px;width: 100%">
<div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;�û�����&nbsp;&nbsp;</span><span class="font_b">ֱ����Ա����:&nbsp;&nbsp;</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright">
    <table border="0" align="right" cellpadding="0" cellspacing="0">
        <form action="main.php" method="get" name="myFORM" id="myFORM">
            <tbody>
            <tr>
                <td height="28" style="color:#fff;">&nbsp;&nbsp;ֱ������:&nbsp;&nbsp;
                    <select id="zslx" name="zslx" onChange="document.myFORM.submit();" class="za_select">
                        <option value="all">ȫ��</option>
                        <option value="dagu">��ɶ�ֱ��</option>
                        <option value="guan">�ɶ�ֱ��</option>
                        <option value="zong">�ܴ���ֱ��</option>
                    </select>
                �ϼ��˺�:
                    <select id="agent" name="agent" onChange="document.myFORM.submit();" class="za_select">
                        <option value="all">ȫ��</option>
                        <? $result = $db1->query("SELECT distinct(dai) as kauser FROM web_member WHERE zs>1 " . $term1 . " order by id desc");
    while ($image = $result->fetch_array()) {?>
                        <option value="<?=$image['kauser']?>"><?=$image['kauser']?></option>
                        <?}?>
                    </select>
                    <select id="enable" name="enable" onChange="document.myFORM.submit()" class="za_select">
                        <option value="all">ȫ��</option>
                        <option value="y">����</option>
                        <option value="n">ͣ��</option>
                        <option value="s">��ͣ</option>
                    </select>
                 -- ����:
                    <select id="sort" name="sort" onChange="document.myFORM.submit();" class="za_select">
                        <option value="username">�˺�</option>
                        <option value="name">����</option>
                        <option value="cs">���ö��</option>
                        <option value="slogin">��������</option>
                    </select>
                &nbsp;
                    <select id="orderby" name="orderby" onChange="document.myFORM.submit()"
                        class="za_select">
                        <option value="desc">����(�ɴ�С)</option>
                        <option value="asc">����(��С����)</option>
                    </select>
                 --&nbsp;��ҳ��&nbsp;:&nbsp;
                    <select id="page" name="page" onChange="document.myFORM.submit()" class="za_select">
                        <? if ($pagecount == 0) {?>
                        <option value='0'>0</option>
                        <? } else {
    $i = 0;
    for (; $i < $pagecount; ++$i) {?>
                        <option value='<?=$i + 1?>'><?=$i + 1?></option>
                        <?}
    }?>
                    </select>
                &nbsp;/&nbsp;
                    <?=$pagecount?>&nbsp;ҳ&nbsp;--&nbsp;


                    <input type="button" name="btn_search" value="���ٲ�ѯ" onClick="showSearchDlg();" class="za_button">
                            --
                    <input type="button" name="append" value="����" onClick="javascript:location.href='main.php?action=user_mem_zs_add&uid=<?=$uid?>'"
                                    class="btn2" />
                    <input name="search" type="hidden" id="search" value="" />
                    <input name="key" type="hidden" id="key" value="" />
                    <input name="action" type="hidden" id="action" value="user_mem_zs_list" />
                    <input name="uid" type="hidden" id="uid" value="<?=$uid?>" />
                </td>
            </tr>
        </form>
        </tbody>
    </table>
    <? $result = $db1->query("select * from web_member where zs>1 " . $term . " order by " . $vvv . " " . $vvv2 . " limit " . $offset . "," . $pagesize);?>
</div></div>
     <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list bet">
        <form name="form1" method="post" action="main.php?action=user_mem_zs_list&uid=<?=$uid?>">
         <tbody> 
            <tr >
                <? if (strpos($flag, "13")) {?>
                <td width="20"><input type="checkbox" name="sele" value="checkbox"
                        onClick="javascript:checksel(this.form);" /></td>
                <?}?>
                <td nowrap class="t_list_caption">����</td>
                <td nowrap class="t_list_caption">��Ա����</td>
                <td nowrap class="t_list_caption">��Ա�ʺ�</td>
                <td align="center" nowrap class="t_list_caption">��Ա����</td>
                <td align="center" nowrap class="t_list_caption">���ö��/�������</td>
                <td align="center" class="t_list_caption">�̿�</td>
                <td align="center" class="t_list_caption">��������</td>
                <td align="center" nowrap class="t_list_caption">�ܴ���%</td>
                <td align="center" nowrap class="t_list_caption">�ɶ�%</td>
                <td align="center" nowrap class="t_list_caption">��ɶ�%</td>
                <td align="center" nowrap="nowrap" class="t_list_caption">��˾%</td>
                <td width="5%" align="center" nowrap class="t_list_caption">�˺�״��</td>
                <td width="20%" align="center" class="t_list_caption">����</td>
            </tr>
            <? $cou = $result->num_rows;
if ($cou == 0) {?>
            <tr bgcolor="#ffffff" onmouseover="onMouseOver(this)" onmouseout="onMouseOut(this)" onclick="onMouseClick(this)">
                <td height="30" colspan="100%" class="m_title_sucor"> �����κ�����</td>
            </tr>
            <?} else {
    while ($image = $result->fetch_array()) {?>
            <tr bgColor="#ffffff">
                <? if (strpos($flag, "13")) {?>
                 <td height="43"  align="center"><input name="sdel[]" type="checkbox" id="sdel"
                        value="<?=$image['id']?>" /></td>
                <?}?>
                <td width="26" align="center" nowrap>
                    <?=get_online($image['kauser'])?>
                </td>
                <td width="73" align="center" nowrap>
                    <? switch ($image['zs']) {
            case "2":
                echo "�ܴ���ֱ��";
                break;
            case "3":
                echo "�ɶ�ֱ��";
                break;
            case "4":
                echo "��ɶ�ֱ��";
                break;
            default:
                break;
        }?>
                </td>
                <td width="73" height="25" align="center" nowrap><?=$image['kauser']?></td>
                <td width="73" height="25" align="center"><?=$image['xm']?></td>
                <td width="135" height="25" align="right"><?=$image['cs']?>/<font color=ff0000><?=round($image['ts'], 2)?></font></td>
                <td width="50" align="center"><?=$image['abcd']?>��</td>
                <td width="110" align="center"><?=date("Y-m-d / H:i", strtotime($image['slogin']))?></td>
                <td width="50" align="center" nowrap><? if ($image['zs'] < 3) {?><a href="main.php?action=user_mem_zs_list&uid=<?=$uid?>&agent=<?=$image['zong']?>" style="color:000000">(<?=$image['zong']?>)<?=$image['zong_zc']?></a>
                    <?}?>
                </td>
                <td width="50" align="center" nowrap><? if ($image['zs'] < 4) {?><a href="main.php?action=user_mem_zs_list&uid=<?=$uid?>&agent=<?=$image['guan']?>" style="color:000000">(<?=$image['guan']?>)<?=$image['guan_zc']?></a>
                    <?}?>
                </td>
                <td width="50" height="25" align="center" nowrap><a href="main.php?action=user_mem_zs_list&uid=<?=$uid?>&agent=<?=$image['dagu']?>" style="color:000000">(<?=$image['dagu']?>)<?=$image['dagu_zc']?></a></td>
                <td width="50" height="25" align="center" nowrap><?=$image['gs_zc']?></td>
                <td height="25" align="center"><? if ($image['stat'] == 0) {?><? if ($image['ty'] == 0) {?>����<? } else {?><SPAN STYLE='background-color: rgb(0,255,0);'>[��ͣ��ע]</SPAN><?}?><?} else {?>
                    <SPAN STYLE='background-color: rgb(255,0,0);'>ͣ��</SPAN><? }?>
                </td>
                <td width="250" height="25" align="center"> 
                    <a href="main.php?action=user_mem_zs_edit&uid=<?=$uid?>&id=<?=$image['id']?>">�޸�����</a> / 
                    <a href="main.php?action=user_mem_zs_set&uid=<?=$uid?>&id=<?=$image['id']?>">��ϸ����</a> /
                    <? if ($image['stat'] == 0) {?>
                    <a href="main.php?action=user_mem_zs_list&uid=<?=$uid?>&stat=1&name=<?=$image['kauser']?>&id=<?=$image['id']?>">ͣ��</a>
                    <? } else {?>
                    <a href="main.php?action=user_mem_zs_list&uid=<?=$uid?>&stat=0&name=<?=$image['kauser']?>&id=<?=$image['id']?>"><SPAN STYLE="color: rgb(255,0,0);">����</SPAN></a>
                    <?}?>
                    /
                    <? if ($image['ty'] == 0) {?>
                    <a href="main.php?action=user_mem_zs_list&uid=<?=$uid?>&ty=1&name=<?=$image['kauser']?>&id=<?=$image['id']?>">��ͣͶע</a>
                    <?} else {?>
                    <a href="main.php?action=user_mem_zs_list&uid=<?=$uid?>&ty=0&name=<?=$image['kauser']?>&id=<?=$image['id']?>">
                        <SPAN STYLE="color: rgb(255,0,0);">����Ͷע</SPAN></a>
                    <?}?>
                    <br><a href="main.php?action=user_tab&uid=<?=$uid?>&username=<?=$image['kauser']?>&userlx=1" target="_blank">����</a>
                    <?if (strpos($flag, "11")) {?>
                    / <a href="main.php?action=real_list&uid=<?=$uid?>&username=<?=$image['kauser']?>">ע��</a>
                    <?}?>

                    <? if (strpos($flag, "14")) {?>
                    / <a href="main.php?action=user_log&uid=<?=$uid?>&username=<?=$image['kauser']?>">��־</a>
                    <?}?>

                    <? if (strpos($flag, "13")) {?>
                    / <a onClick="return confirm('�˲������ɻָ�!\nȷ��ɾ��?');" href="main.php?action=user_mem_zs_list&uid=<?=$uid?>&act=del&id=<?=$image['id']?>&sdel=<?=$image['id']?>">ɾ��</a>
                    <?}?>
        </td></tr>
    <?}?>
            <tr>
                <td height="25" colspan="14" bgcolor="#FFFFFF">
                    <table width="98%" border="0" align="center" cellpadding="2" cellspacing="0"
                        bordercolordark="#FFFFFF" bordercolor="888888">
                        <tr>
                            <td width="84" height="26">
                                <? if (strpos($flag, "13")) {?>
                                <button onClick="javascript:if(confirm('ȷ��ɾ��ѡ���û�?'))submit();" ;>ɾ��ѡ��</button>
                                <?}?>
                            </td>
                            <td height="26" align="center">

                                <span class="STYLE9">
                                    ��ǰΪ��<?=$page?>ҳ&nbsp;��<?=$pagecount?>ҳ&nbsp;��<?=$total?>��¼
                                </span>&nbsp;
                                <a href="main.php?action=user_mem_zs_list&uid=<?=$uid?>&zslx=<?=$zslx?>&agent=<?=$agent?>&enable=<?=$enable?>&sort=<?=$vvv?>&orderby=<?=$vvv2?>&page=1">��ҳ</a> 
                                <a href="main.php?action=user_mem_zs_list&uid=<?=$uid?>&zslx=<?=$zslx?>&agent=<?=$agent?>&enable=<?=$enable?>&sort=<?=$vvv?>&orderby=<?=$vvv2?>&page=<?=$pre?>">��һҳ</a> 
                                <a href="main.php?action=user_mem_zs_list&uid=<?=$uid?>&zslx=<?=$zslx?>&agent=<?=$agent?>&enable=<?=$enable?>&sort=<?=$vvv?>&orderby=<?=$vvv2?>&page=<?=$next?>">��һҳ</a> 
                                <a href="main.php?action=user_mem_zs_list&uid=<?=$uid?>&zslx=<?=$zslx?>&agent=<?=$agent?>&enable=<?=$enable?>&sort=<?=$vvv?>&orderby=<?=$vvv2?>&page=<?=$last?>">ĩҳ</a>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <?}?>
            </tbody>
        </form>
    </table>


    <!--���ٲ�ԃ����ҕ��-->
    <div id="searchDlg" style="display: none;position: absolute;">
        <table border="0" cellspacing="1" cellpadding="2" bgcolor="00558E">
            <tr>
                <td bgcolor="#FFFFFF">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="0163A2" class="m_tab_fix">
                        <tr bgcolor="0163A2">

                            <td>
                                <font color="#FFFFFF">���ٲ�ѯ</font>
                                <font color="#FFFFFF" id="eo_title"></font>
                            </td>
                            <td align="right" valign="top"><a style="cursor:hand;" onClick="closeSearchDlg();"><img
                                        src="images/edit_dot.gif" width="16" height="14"></a></td>
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
                            <td>��ѯ����</td>
                            <td>
                                <select name="dlg_option" class="za_select" id="dlg_option">
                                    <option label="�˺�" value="username" selected="selected">�˺�</option>
                                    <option label="����" value="name">����</option>
                                </select>
                            </td>
                        </tr>
                        <tr bgcolor="#000000">
                            <td colspan="2" height="1"></td>
                        </tr>
                        <tr bgcolor="#A4C0CE">
                            <td>
                            </td>
                            <td>
                                <input type=text id="dlg_text" value="" class="za_text" size="15" maxlength="15">
                            </td>
                        </tr>
                        <tr bgcolor="#000000">
                            <td colspan="2" height="1"></td>
                        </tr>
                        <tr>
                            <td align="center" colspan="2">
                                <input type="submit" id="dlg_ok" value="��ѯ" class="za_button"
                                    onClick="submitSearchDlg();">
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>