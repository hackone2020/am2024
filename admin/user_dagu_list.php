<?php

if ( !defined( "KK_VER" ) )
{
    exit( "��Ч�ķ���" );
}
if ( strpos( $flag, "04" ) )
{
}
else
{
    echo "<center>��û�и�Ȩ�޹���!</center>";
    exit( );
}
if ( strpos( $flag, "13" ) )
{
    if ( $_POST['sdel'] != "" )
    {
       
        $del_num = count( $_POST['sdel'] );
        $i = 0;
        for ( ; $i < $del_num; ++$i )
        {
    
            $result = $db1->query( "select kauser from web_agent  where id='{$sdel[$i]}' order by id desc LIMIT 1" );
            $row = $result->fetch_array();
            $cou = $result->num_rows;
            if ( $cou != 0 )
            {
                $kauser = $row['kauser'];
                $db1->query( "Delete from web_agent where id='{$sdel[$i]}'" );
                $db1->query( "Delete from web_agent where dagu='{$kauser}'" );
                $db1->query( "Delete from web_agent_zi where guan='{$kauser}'" );
                $db1->query( "Delete from web_member where dagu='{$kauser}'" );
                $db1->query( "Delete from web_user_ds where lx=4  and userid='{$sdel[$i]}'" );
                $db1->query( "Delete from web_user_ds where dagu='{$kauser}'" );
    
               
            
            }
        }
        echo "<script>alert('ɾ���ɹ���');window.location.href='main.php?action=user_dagu_list&uid={$uid}';</script>";
        exit( );
    }
    if ( $_GET['sdel'] != "" )
    {

        $dell = $_GET['sdel'];
        $result = $db1->query( "select kauser from web_agent  where id='{$dell}' order by id desc LIMIT 1" );
        $row = $result->fetch_array();
        $cou = $result->num_rows;
        if ( $cou != 0 )
        {
            $kauser = $row['kauser'];
            $db1->query( "Delete from web_agent where id='{$sdel}'" );
            $db1->query( "Delete from web_agent where dagu='{$kauser}'" );
            $db1->query( "Delete from web_agent_zi where guan='{$kauser}'" );
            $db1->query( "Delete from web_member where dagu='{$kauser}'" );
            $db1->query( "Delete from web_quota where lx=4  and userid='{$sdel}'" );
            $db1->query( "Delete from web_user_ds where lx=4  and userid='{$sdel}'" );
            $db1->query( "Delete from web_user_ds where dagu='{$kauser}'" );
        
        }
        echo "<script>alert('ɾ���ɹ���');window.location.href='main.php?action=user_dagu_list&uid={$uid}';</script>";
        exit( );
    }
}
if ( $_GET['pz'] == "0" )
{
    $sql = "update web_agent set uid='',adddate='".$utime."',pz=0 where id=".$_GET['id'];
    if ( !$db1->query( $sql ) )
    {
        exit( "���ݿ��޸ĳ���" );
    }
    $kauser = $_GET['name'];
    $db1->query( "update web_agent set uid='' where dagu='{$kauser}'" );
    $db1->query( "update web_agent_zi set uid='' where guan='{$kauser}'" );
    $db1->query( "update web_member set uid='' where dagu='{$kauser}'" );
    echo "<script>alert('�����û�[<".$_GET['name'].">]Ϊ�����߷ɣ�!');window.location.href='main.php?action=user_dagu_list&uid={$uid}';</script>";
    exit( );
}
if ( $_GET['pz'] == "1" )
{
    $sql = "update web_agent set uid='',adddate='".$utime."',pz=1 where id=".$_GET['id'];
    if ( !$db1->query( $sql ) )
    {
        exit( "���ݿ��޸ĳ���" );
    }
    $kauser = $_GET['name'];
    $db1->query( "update web_agent set uid='' where dagu='{$kauser}'" );
    $db1->query( "update web_agent_zi set uid='' where guan='{$kauser}'" );
    $db1->query( "update web_member set uid='' where dagu='{$kauser}'" );
    echo "<script>alert('�����û�[<".$_GET['name'].">]Ϊ��ֹ�߷�!\\n���˺ż������������̽��ر��߷ɷ���!!!');window.location.href='main.php?action=user_dagu_list&uid={$uid}';</script>";
    exit( );
}
if ( $_GET['stat'] == "0" )
{
    $sql = "update web_agent set uid='',adddate='".$utime."',stat=0 where id=".$_GET['id'];
    if ( !$db1->query( $sql ) )
    {
        exit( "���ݿ��޸ĳ���" );
    }
    echo "<script>alert('�����û�[<".$_GET['name'].">]Ϊ����!');window.location.href='main.php?action=user_dagu_list&uid={$uid}&enable=y';</script>";
    exit( );
}
if ( $_GET['stat'] == "1" )
{
    $sql = "update web_agent set uid='',adddate='".$utime."',stat=1 where id=".$_GET['id'];
    if ( !$db1->query( $sql ) )
    {
        exit( "���ݿ��޸ĳ���" );
    }
    $kauser = $_GET['name'];
    $db1->query( "update web_agent set uid='' where dagu='{$kauser}'" );
    $db1->query( "update web_agent_zi set uid='' where guan='{$kauser}'" );
    $db1->query( "update web_member set uid='' where dagu='{$kauser}'" );
    echo "<script>alert('�����û�[<".$_GET['name'].">]Ϊͣ��!');window.location.href='main.php?action=user_dagu_list&uid={$uid}&enable=n';</script>";
    exit( );
}
if ( $_GET['ty'] == "0" )
{
    $sql = "update web_agent set uid='',adddate='".$utime."',ty=0 where id=".$_GET['id'];
    if ( !$db1->query( $sql ) )
    {
        exit( "���ݿ��޸ĳ���" );
    }
    echo "<script>alert('�����û�[<".$_GET['name'].">]Ϊ����Ͷע!');window.location.href='main.php?action=user_dagu_list&uid={$uid}&enable=all';</script>";
    exit( );
}
if ( $_GET['ty'] == "1" )
{
    $sql = "update web_agent set uid='',adddate='".$utime."',ty=1 where id=".$_GET['id'];
    if ( !$db1->query( $sql ) )
    {
        exit( "���ݿ��޸ĳ���" );
    }
    echo "<script>alert('�����û�[<".$_GET['name'].">]Ϊ��ͣͶע!');window.location.href='main.php?action=user_dagu_list&uid={$uid}&enable=s';</script>";
    exit( );
}
$sort = $_GET['sort'];
$orderby = $_GET['orderby'];
$enable = $_GET['enable'];
$key = $_GET['key'];
$search = $_GET['search'];
switch ( $sort )
{
    case "username" :
        $vvv = "kauser";
        break;
    case "name" :
        $vvv = "xm";
        break;
    case "cs" :
        $vvv = "cs";
        break;
    case "slogin" :
        $vvv = "slogin";
        break;
    default :
        $vvv = "slogin";
        $sort = "slogin";
        break;
}
switch ( $orderby )
{
    case "desc" :
        $vvv2 = "desc";
        break;
    case "asc" :
        $vvv2 = "asc";
        break;
    default :
        $vvv2 = "desc";
        $orderby = "desc";
        break;
}
switch ( $enable )
{
    case "all" :
        $term = "";
        break;
    case "y" :
        $term = " and stat=0 ";
        break;
    case "n" :
        $term = " and stat=1 ";
        break;
    case "s" :
        $term = " and ty=1 ";
        break;
    default :
        $enable = "all";
        $term = "";
        break;
}
if ( $key != "" && $search != "" )
{
    switch ( $search )
    {
        case "username" :
            $term .= "and kauser";
            break;
        case "name" :
            $term .= "and xm";
            break;
        default :
            $term .= "and kauser";
            break;
    }
    $term .= " LIKE '%".$key."%' ";
}
$pagesize = 10;
$page = isset( $_GET['page'] ) ? intval( $_GET['page'] ) : 1;
$result = $db1->query( "select count(*) from web_agent where lx=4 ".$term." order by id desc" );
$num1 = $result->fetch_array();
$num=$num1[0];
$total = $num;
$pagecount = ceil( $total / $pagesize );
if ( $pagecount < $page )
{
    $page = $pagecount;
}
if ( $page <= 0 )
{
    $page = 1;
}
$offset = ( $page - 1 ) * $pagesize;
$pre = $page - 1;
$next = $page + 1;
$first = 1;
$last = $pagecount;
?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<!-- <style type="text/css">
    .m_title_sucor {
    background-color: #339999;
    text-align: center
    }
    .m_title {background-color: #86C0A6; text-align: center}
    </style> -->
<script src="js/function.js" type="text/javascript"></script>
<script language=javaScript src="js/user_search.js" type=text/javascript></script>
<script language=javaScript>

function onLoad()
{
    var obj_enable=$("enable");
    obj_enable.value='<?=$enable?>';
    var obj_orderby = $("orderby");
    obj_orderby.value = '<?=$orderby?>';
    var obj_page = $("page");
    obj_page.value = '<?=$page?>';
    var obj_sort=$("sort");
    obj_sort.value='<?=$sort?>';
    }
    
</script>
<body style="min-width: 1200px;width: 100%">
    
 <div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">�û�����</span><span class="font_b">�ֹ�˾����</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright">
    <form action="main.php" method="get" name="myFORM" id="myFORM">
         <table border="0" align="right" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                <td height="28" style="color:#fff;">ɸѡ:
                <select id="enable" name="enable" onChange="document.myFORM.submit()" class="za_select">
                    <option value="all">ȫ��</option>
                    <option value="y">����</option>
                    <option value="n">ͣ��</option>
                    <option value="s">��ͣ</option>
                </select>
                 <select id="sort" name="sort" onChange="document.myFORM.submit();" class="za_select">
                    <option value="username">�˺�</option>
                    <option value="name">����</option>
                    <option value="cs">���ö��</option>
                    <option value="slogin">��������</option>
                </select>
                ����:
                <select id="orderby" name="orderby" onChange="document.myFORM.submit()" class="za_select">
                <option value="desc">����(�ɴ�С)</option>
                <option value="asc">����(��С����)</option>
                </select>
                 <span>����</span> 
                <select name="dlg_option" id="dlg_option" class="za_select">
                    <option label="�˺�" value="username" selected="selected">�˺�</option>
                    <option label="����" value="name">����</option>
                </select>   
                <input type=text id="dlg_text"  class="inp1" size="8" maxlength="15">
                <input name="search"  class="btn4" type="button1" id="search" value="����" />
                <!--��������-->
                <input name="key" type="hidden" id="key" value="" />
                <input name="action" type="hidden" id="action" value="user_dagu_list" />
                <input name="uid" type="hidden" id="uid" value="<?=$uid?>" />
                <input type="button" name="append" value="����" onClick="javascript:location.href='main.php?action=user_dagu_add&uid=<?=$uid?>'" class="btn2" /></td>
                </td>
                 </tr>
                </tbody>
            </table>
            </form>
      </div>
  </div> 
    
<!--<table width="900" border="0" cellspacing="0" cellpadding="0">-->
<!--<form action="main.php" method="get" name="myFORM" id="myFORM"><tr>-->
<!--<td class="m_tline"><table border="0" cellspacing="0" cellpadding="0">-->
<!--<tr>-->
<!--<td nowrap="nowrap">&nbsp;�ֹ�˾����:&nbsp;&nbsp;</td>-->
<!--<td>-->
<!--<select id="enable" name="enable" onChange="document.myFORM.submit()" class="za_select">-->
<!--    <option value="all">ȫ��</option>-->
<!--    <option value="y">����</option>-->
<!--    <option value="n">ͣ��</option>-->
<!--    <option value="s">��ͣ</option>-->
<!--</select>-->
<!--</td>-->
<!--<td> -- ����:</td>-->
<!--<td>-->
<!--<select id="sort" name="sort" onChange="document.myFORM.submit();" class="za_select">-->
<!--    <option value="username">�˺�</option>-->
<!--    <option value="name">����</option>-->
<!--    <option value="cs">���ö��</option>-->
<!--    <option value="slogin">��������</option>-->
<!--</select>-->
<!--</td>-->
<!--<td nowrap="nowrap">&nbsp;-->
<!--<select id="orderby" name="orderby" onChange="document.myFORM.submit()" class="za_select">-->
<!--    <option value="desc">����(�ɴ�С)</option>-->
<!--    <option value="asc">����(��С����)</option>-->
<!--</select>-->
<!--</td>-->


<!--<?
$result = $db1->query( "select * from web_agent where lx=4 ".$term." order by ".$vvv." ".$vvv2." limit ".$offset.",".$pagesize );
?>-->

 <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bordercolordark="#FFFFFF" class="t_list">
    <tbody>
    <tr>
<form name="form1" method="post" action="main.php?action=user_dagu_list&uid=<?=$uid?>">
<?
if ( strpos( $flag, "13" ) )
{
?>
<td class="t_list_caption" width="20"><input type="checkbox" name="sele" value="checkbox" onClick="javascript:checksel(this.form);" /></td>
<?
}
?>
<td nowrap="" class="t_list_caption">�ֹ�˾�ʺ�</td>
<td nowrap="" class="t_list_caption">�ֹ�˾����</td>
<td align="center" nowrap="" class="t_list_caption">���ö��/<font class="font_g">�������</font></td>
<td align="center" class="t_list_caption" style="min-width: 48px">��������</td>
<td align="center" nowrap="nowrap" class="t_list_caption">�ɶ���</td>
<td align="center" nowrap="nowrap" class="t_list_caption">�ֹ�˾%</td>
<td align="center" nowrap="nowrap" class="t_list_caption">��˾%</td>
<td align="center" class="t_list_caption">����</td>
<td align="center" class="t_list_caption">�߷�</td>
<td width="20%" align="center" class="t_list_caption">����</td>
</tr>
<?
$cou = $result->num_rows;
if ( $cou == 0 )
{
?>
<tr>
<td nowrap="" class="t_list_caption" colspan="100%" >�����κ�����</td>
</tr>
<?
}
else
{
    while ( $image = $result->fetch_array() )
    {
        $mumu = 0;
        $result1 = $db1->query( "select SUM(cs) As sum_m  From web_agent Where lx=3 and   dagu='".$image['kauser']."' order by id desc" );
        $rsw = $result1->fetch_array();
        if ( $rsw[0] != "" )
        {
            $mumu = $rsw[0];
        }
        $result1 = $db1->query( "select SUM(cs) As sum_m  From web_member Where zs=4 and   dagu='".$image['kauser']."' order by id desc" );
        $rsw = $result1->fetch_array();
        if ( $rsw[0] != "" )
        {
            $mumu += $rsw[0];
        }
        $memnum = 0;
        $result1 = $db1->query( "select Count(ID) As memnum From web_agent Where lx=3 and dagu='".$image['kauser']."' order by id desc" );
        $rsw = $result1->fetch_array();
        if ( $rsw[0] != "" )
        {
            $memnum = $rsw[0];
        }
        else
        {
            $memnum = 0;
        }
?>
<tr bgcolor="#ffffff" onmouseover="onMouseOver(this)" onmouseout="onMouseOut(this)" onclick="onMouseClick(this)">
<?
        if ( strpos( $flag, "13" ) )
        {
?>
<td  align="center"><input name="sdel[]" type="checkbox" id="sdel" value="<?=$image['id']?>" /></td> 
<?
        }
?> 
  <td height="43" align="center" nowrap=""><a href="main.php?action=user_guan_list&uid=<?=$uid?>&dagu=<?=$image['kauser']?>"><?=$image['kauser']?></a></td>
  <td align="center" nowrap=""><?=$image['xm']?></td>
  <td align="center" nowrap=""><?=$image['cs']?>/<font color=ff0000><?=$image['cs'] - $mumu?></font></td>
  <td align="center" nowrap=""><?=date( "Y-m-d / H:i", strtotime( $image['slogin'] ) )?></td>
  <td align="center" nowrap=""><?=$memnum?></td>
  <td align="center" nowrap=""><?=$image['dagu_zc']?></td>
  <td align="center" nowrap=""><?=$image['gs_zc']?></td>
  <td align="center" nowrap="">
    <?
    if ( $image['pz'] == 0 )
        {
            echo "����";
        }
        else
        {
            echo "<SPAN STYLE='background-color: rgb(100,255,255);'>[��ֹ]</SPAN>";
        }
?> </td>
  <td align="center" nowrap="">
<?
        if ( $image['stat'] == 0 )
        {
          
            if ( $image['ty'] == 0 )
            {
                echo "����";
            }
            else
            {
                echo "<SPAN STYLE='background-color: rgb(0,255,0);'>[��ͣ��ע]</SPAN>";
            }
         
        }
        else
        {
            echo "<SPAN STYLE='background-color: rgb(255,0,0);'>ͣ��</SPAN>";
        }
  ?> </td>
  <td align="center" nowrap="">
  <a href="main.php?action=user_dagu_edit&uid=<?=$uid?>&id=<?=$image['id']?>">�޸�����</a> / <a href="main.php?action=user_dagu_set&uid=<?=$uid?>&id=<?=$image['id']?>">��ϸ����</a> / 
  <?
        if ( $image['stat'] == 0 )
        {
?>
    <a href="main.php?action=user_dagu_list&uid=<?=$uid?>&stat=1&name=<?=$image['kauser']?>&id=<?=$image['id']?>">ͣ��</a>
    <?
        }
        else
        {
?><a href="main.php?action=user_dagu_list&uid=<?=$uid?>&stat=0&name=<?=$image['kauser']?>&id=<?=$image['id']?>"><SPAN STYLE="color: rgb(255,0,0);">����</SPAN></a>
<?
        }
?> / 
<?
        if ( $image['ty'] == 0 )
        {
?><a href="main.php?action=user_dagu_list&uid=<?=$uid?>&ty=1&name=<?=$image['kauser']?>&id=<?=$image['id']?>">��ͣͶע</a>
<?
        }
        else
        {
?><a href="main.php?action=user_dagu_list&uid=<?=$uid?>&ty=0&name=<?=$image['kauser']?>&id=<?=$image['id']?>"> <SPAN STYLE="color: rgb(255,0,0);">����Ͷע</SPAN></a>
<?
        }
?> / <?
        if ( $image['pz'] == 0 )
        {
?><a href="main.php?action=user_dagu_list&uid=<?=$uid?>&pz=1&name=<?=$image['kauser']?>&id=<?=$image['id']?>">��ֹ�߷�</a>
<?
        }
        else
        {
?><a href="main.php?action=user_dagu_list&uid=<?=$uid?>&pz=0&name=<?=$image['kauser']?>&id=<?=$image['id']?>"><SPAN STYLE="color: rgb(255,0,0);">�����߷�</SPAN></a>
<?
        }
        ?>
  <br>
  <a href="main.php?action=user_tab&uid=<?=$uid?>&username=<?=$image['kauser']?>&userlx=0" target="_blank">����</a>
  <?
        if ( strpos( $flag, "14" ) )
        {
?> / <a href="main.php?action=user_log&uid=<?=$uid?>&username=<?=$image['kauser']?>">��־</a> /
<?
        }
?><a href="main.php?action=user_mem_zs_list&uid=<?=$uid?>&agent=<?=$image['kauser']?>">�鿴ֱ����Ա</a> / 
  <a href="main.php?action=user_mem_zs_add&uid=<?=$uid?>&agent=<?=$image['kauser']?>">���ֱ����Ա</a>
  <?
        if ( strpos( $flag, "13" ) )
        {
            ?>
/ <a onClick="return confirm('�˲������ɻָ�!\nȷ��ɾ��?');" href="main.php?action=user_dagu_list&uid=<?=$uid?>&act=del&id=<?=$image['id']?>&sdel=<?=$image['id']?>">ɾ��</a>
<?
        }
?></td>
</tr>
<?
    }
?> <tr>
<td height="28" colspan="11" align="center" bgcolor="#FFFFFF">
    <table width="98%" border="0" align="center" cellpadding="2" cellspacing="0" bordercolordark="#FFFFFF" bordercolor="888888">
<tr>
<td height="28" colspan="100" align="center" bgcolor="#FFFFFF">
<?
    if ( strpos( $flag, "13" ) )
    {
?> <button class="btn5" onClick="javascript:if(confirm('�˲������ɻָ�!\nȷ��ɾ��ѡ���û�?'))submit();";>ɾ��ѡ��</button>
<?
    }
?>
</td>
<td height="28" colspan="100" align="center" bgcolor="#FFFFFF">��ǰΪ��<?=$page?>ҳ&nbsp;��<?=$pagecount?>ҳ&nbsp;��<?=$total?>��¼&nbsp;
    <a href="main.php?action=user_dagu_list&uid=<?=$uid?>&enable=<?=$enable?>&sort=<?=$vvv?>&orderby=<?=$vvv2?>&page=1">��ҳ</a> 
    <a href="main.php?action=user_dagu_list&uid=<?=$uid?>&enable=<?=$enable?>&sort=<?=$vvv?>&orderby=<?=$vvv2?>&page=<?=$pre?>">��һҳ</a> 
    <a href="main.php?action=user_dagu_list&uid=<?=$uid?>&enable=<?=$enable?>&sort=<?=$vvv?>&orderby=<?=$vvv2?>&page=<?=$next?>">��һҳ</a> 
    <a href="main.php?action=user_dagu_list&uid=<?=$uid?>&enable=<?=$enable?>&sort=<?=$vvv?>&orderby=<?=$vvv2?>&page=<?=$last?>">ĩҳ</a>
    </td>
</tr>
</table></td>
</tr>
<?
}
?></form>
</table>
<!--���ٲ�ԃ����ҕ��-->
<div id="searchDlg" style="display: none;position: absolute;">
<table border="0" cellspacing="1" cellpadding="2" bgcolor="00558E">
<tr>
<td bgcolor="#FFFFFF">
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="0163A2" class="m_tab_fix" >
<tr bgcolor="0163A2">
<td><font color="#FFFFFF">���ٲ�ѯ</font><font color="#FFFFFF" id="eo_title"></font></td>
<td align="right" valign="top" ><a style="cursor:hand;" onClick="closeSearchDlg();"><img src="images/edit_dot.gif" width="16" height="14"></a></td>
</tr>
</table>
</td>
</tr>
<tr>
<td bgcolor="#FFFFFF">
<table border="0" cellspacing="0" cellpadding="0" bgcolor="0163A2" class="m_tab_fix" >
    <tr bgcolor="#000000">
        <td colspan="2" height="1"></td>
    </tr>
    <tr bgcolor="#A4C0CE">
    <td>��ѯ����</td>
    <td>
        <select name="dlg_option" id="dlg_option" class="za_select">
            <option label="�˺�" value="username" selected="selected">�˺�</option>
            <option label="����" value="name">����</option>
        </select>
    </td>
    </tr>
    <tr bgcolor="#000000">
    <td colspan="2" height="1"></td>
    </tr>
    <tr bgcolor="#A4C0CE">
    <td>�ؼ���</td>
    <td><input type=text id="dlg_text" value="" class="za_text" size="15" maxlength="15"></td>
</tr>
<tr bgcolor="#000000">
<td colspan="2" height="1"></td>
</tr>
<tr>
<td align="center" colspan="2"><input type="submit" id="dlg_ok" value="��ѯ" class="za_button" onClick="submitSearchDlg();"></td>
</tr>
</table>
</td>
</tr>
</table>
</div>
</body>
