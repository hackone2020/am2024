<?php

if ( !defined( "KK_VER" ) )
{
    exit( "��Ч�ķ���" );
}
if ( strpos( $flag, "01" ) )
{
}
else
{
    echo "<center>��û�и�Ȩ�޹���!</center>";
    exit( );
}
if ( $_POST['sdel'] != "" )
{
    $del_num = count( $_POST['sdel'] );
    $i = 0;
    for ( ; $i < $del_num; ++$i )
    {
        $db1->query( "Delete from web_kithe where id='{$sdel[$i]}'" );
    }
    echo "<script type='text/javascript'>alert('ɾ���ɹ���');window.location.href='main.php?action=web_kithe_list&uid={$uid}';</script>";
}
if ( $_GET['sdel'] != "" )
{
    $dell = $_GET['sdel'];
    $db1->query( "Delete from web_kithe where id='{$dell}'" );
    echo "<script type='text/javascript'>alert('ɾ���ɹ���');window.location.href='main.php?action=web_kithe_list&uid={$uid}';</script>";
}
if ( $_GET['t0'] == "y" )
{
    $sql = "update web_kithe set lx=1 where id=".$_GET['newsid'];
    if ( !$db1->query( $sql ) )
    {
        exit( "���ݿ��޸ĳ���" );
    }
    $sql = "update web_tans set visible=1 where visible=0 and kithe='".$_GET['name']."'";
    if ( !$db1->query( $sql ) )
    {
        exit( "���ݿ��޸ĳ���" );
    }
    set_config( "report_time", $utime );
    echo "<script>alert('�޸ĵ�[<".$_GET['name'].">]��Ϊ�������û�Ա�ܴ�����Բ鿴����!');window.location.href='main.php?action=web_kithe_list&uid={$uid}';</script>";
    exit( );
}
if ( $_GET['t0'] == "n" )
{
    $sql = "update web_kithe set lx=0 where id=".$_GET['newsid'];
    if ( !$db1->query( $sql ) )
    {
        exit( "���ݿ��޸ĳ���" );
    }
    $sql = "update web_tans set visible=0 where visible=1 and kithe='".$_GET['name']."'";
    if ( !$db1->query( $sql ) )
    {
        exit( "���ݿ��޸ĳ���" );
    }

    set_config( "report_time", $utime );
    echo "<script>alert('�޸ĵ�[<".$_GET['name'].">]��Ϊ���أ��û�Ա�ܴ���鿴��������!');window.location.href='main.php?action=web_kithe_list&uid={$uid}';</script>";
    exit( );
}
if ( $_GET['id'] != "" )
{
    $id = $_GET['id'];
}
else
{
    $id = 0;
}?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<link rel="stylesheet" href="css/ball.css" type="text/css">
<script src="js/function.js" type="text/javascript"></script>
<script language="JavaScript">
var uid = "<?=$uid?>";
var url = "";
function show_from(kk1) {
if (kk1 != ""){
url = "main.php?action=web_win&uid="+uid+"&kithe="+kk1;
$("msg_had").innerHTML = "<font color='#FFFFFF'>("+kk1+"��)</font>";
$("rs_window").style.top =Y;
$("rs_window").style.left=X-100;
$("rs_window").style.display = "block";
}
}
</script>
<body>
<div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;��ʷ</span><span class="font_b">�̿ڹ���&nbsp;</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright">
          <table border="0" align="right" cellpadding="0" cellspacing="0">
            <tbody>
            <tr>
             <td height="28" style="color:#fff;">&nbsp;&nbsp;&nbsp;&nbsp;��ʾ����&nbsp;&nbsp;
            <select name="sid" class="za_select" onChange="location.href='main.php?action=web_kithe_list&uid=<?=$uid?>&id='+this.options[selectedIndex].value">
            <option value="0" <?if ( $id == 0 ){echo "selected";}?>>�������� </option>
            <option value="2" <?if ( $id == 2 ){echo "selected";}?>>�ѿ���</option>
            <option value="1" <?if ( $id == 1 ){echo "selected";}?>>δ����</option>
            </select>
            &nbsp;&nbsp;<font color="#CC0000">��ǰ��<?=$Current_Kithe_Num?>��&nbsp;&nbsp;(ע�⣺��ǰ���������δ������ϵͳǰ̨�����ڽ���״̬)</font>
            </td>
            </tr>
            </tbody>      
            </table>
      </div>
</div>  
    
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list bet">
    <form name="form1" method="post" action="main.php?action=web_kithe_list&uid=<?=$uid?>">
    <tbody>
        <tr>
        <td width="50" height="20" nowrap class="t_list_caption"><input type="checkbox" name="sele" value="checkbox" onClick="javascript:checksel(this.form);" /></td>
        <td width="60" height="20" nowrap class="t_list_caption">����</td>
        <td width="150" height="20" align="center" nowrap class="t_list_caption">����ʱ��</td>
        <td width="27" height="20" align="center" nowrap class="t_list_caption">��1</td>
        <td width="27" height="20" align="center" nowrap class="t_list_caption">&nbsp;</td>
        <td width="27" height="20" align="center" nowrap class="t_list_caption">��2</td>
        <td width="27" height="20" align="center" nowrap class="t_list_caption">&nbsp;</td>
        <td width="27" height="20" align="center" nowrap class="t_list_caption">��3</td>
        <td width="27" height="20" align="center" nowrap class="t_list_caption">&nbsp;</td>
        <td width="27" height="20" align="center" nowrap class="t_list_caption">��4</td>
        <td width="27" height="20" align="center" nowrap class="t_list_caption">&nbsp;</td>
        <td width="27" height="20" align="center" nowrap class="t_list_caption">��5</td>
        <td width="27" height="20" align="center" nowrap class="t_list_caption">&nbsp;</td>
        <td width="27" height="20" align="center" nowrap class="t_list_caption">��6</td>
        <td width="27" height="20" align="center" nowrap class="t_list_caption">&nbsp;</td>
        <td width="27" height="20" align="center" nowrap class="t_list_caption">����</td>
        <td width="27" height="20" align="center" nowrap="nowrap" class="t_list_caption">��Ф</td>
        <td width="80" height="20" align="center" nowrap="nowrap" class="t_list_caption">�Ƿ񿪽�</td>
        <td width="50" height="20" align="center" nowrap class="t_list_caption">״̬</td><td width="150" height="20" nowrap="nowrap" class="t_list_caption">����</td>
        </tr>
        <?
$vvv = " where na<>0 ";
$vvvv = "&id=".$id."";
if ( $id == 1 )
{
    $vvv .= " and lx=0  ";
}
if ( $id == 2 )
{
    $vvv .= " and lx=1  ";
}
$pagesize = 10;
$page = isset( $_GET['page'] ) ? intval( $_GET['page'] ) : 1;
$result = $db1->query( "select count(*) from web_kithe  ".$vvv."  order by id desc" );
$pagenum = $result->fetch_array();
$num = $pagenum[0];
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
$result = $db1->query( "select * from web_kithe  ".$vvv."  order by id desc limit ".$offset.",".$pagesize );
while ( $image = $result->fetch_array() )
{
    ?>
    <tr align="center" bgcolor="#FFFFFF">
        <td height="28" align="center" nowrap bgcolor="#FFFFFF"><input name="sdel[]" type="checkbox" id="sdel[]" value="<?=$image['id']?>" /></td>
        <td height="28" align="center" nowrap bgcolor="#FFFFFF"><?=$image['nn']?></td>
        <td height="28" align="center" nowrap bgcolor="#FFFFFF"><?=$image['nd']?></td>
        <td width="27" height="28" align="center" nowrap bgcolor="#FFFFFF" class="No_<?=$image['n1']?>"></td>
        <td width="27" height="28" align="center" nowrap bgcolor="#FFFFFF"><?=$image['sx1']?></td>
        <td width="27" height="28" align="center" nowrap bgcolor="#FFFFFF" class="No_<?=$image['n2']?>"></td>
        <td width="27" height="28" align="center" nowrap bgcolor="#FFFFFF"><?=$image['sx2']?></td>
        <td width="27" height="28" align="center" nowrap bgcolor="#FFFFFF" class="No_<?=$image['n3']?>"></td>
        <td width="27" height="28" align="center" nowrap bgcolor="#FFFFFF"><?=$image['sx3']?></td>
        <td width="27" height="28" align="center" nowrap bgcolor="#FFFFFF" class="No_<?=$image['n4']?>"></td>
        <td width="27" height="28" align="center" nowrap bgcolor="#FFFFFF"><?=$image['sx4']?></td>
        <td width="27" height="28" align="center" nowrap bgcolor="#FFFFFF" class="No_<?=$image['n5']?>"></td>
        <td width="27" height="28" align="center" nowrap bgcolor="#FFFFFF"><?=$image['sx5']?></td>
        <td width="27" height="28" align="center" nowrap bgcolor="#FFFFFF" class="No_<?=$image['n6']?>"></td>
        <td width="27" height="28" align="center" nowrap bgcolor="#FFFFFF"><?=$image['sx6']?></td>
        <td width="27" height="28" align="center" nowrap bgcolor="#FFFFFF" class="No_<?=$image['na']?>"></td>
        <td width="27" height="28" align="center" nowrap bgcolor="#FFFFFF"><?=$image['sx']?></td>
        <td height="28" align="center" nowrap bgcolor="#FFFFFF">
        <?
    if ( $image['na'] != 0 )
    {
        echo "�ѿ���";
    }
    else
    {
        echo "<font color=ff0000>δ����</font>";
    }
    ?> </td>
    <td height="28" align="center" nowrap bgcolor="#FFFFFF">
    <?
    if ( $image['n1'] != 0 )
    {
 ?>
 <a href="main.php?action=web_kithe_list&uid=<?=$uid?>&newsid=<?=$image['id']?>&t0=<? if ($image['lx'] == 1 ){echo "n";}else{ echo "y";}?>&id=<?=$image['id']?>&ids=<?=$ids?>&page=<?=$curpage?>&name=<?=$image['nn']?>&key=<?=$_POST['key']?>">
 <?
        if ( $image['lx'] == 1 )
        {
            echo "�ѿ���";
        }
        else
        {
            echo "<font color=\"ff0000\">δ����</font>";
        }
       ?></a>
       <?
    }
    else
    {
        echo "       <font color=\"ff0000\">δ����</font>";
    }
   ?></td>
   <td height="28" align="center" nowrap="nowrap" bgcolor="#FFFFFF">
   <button type="button" onClick="javascript:show_from('<?=$image['nn']?>');" >����</button>&nbsp;<button type="button" onClick="javascript:location.href='main.php?action=web_kithe_edit&uid=<?=$uid?>&id=<?=$image['id']?>'" >�޸�</button>&nbsp;<button type="button" onClick="if(confirm('ȷ��ɾ������?'))location.href='main.php?action=web_kithe_list&uid=<?=$uid?>&act=del&page=<?=$curpage?>&id=<?=$image['id']?>&sdel=<?=$image['id']?>'">ɾ��</button></td>
   </tr>
   <?}?> <tr>
<td height="26" colspan="20" nowrap bordercolor="cccccc" bgcolor="#FFFFFF">
   <table width="900" border="0" align="left" cellpadding="0" cellspacing="0" bordercolordark="#FFFFFF">
    <tr>
        <td width="180" height="26" nowrap="nowrap"><button type="button" onClick="javascript:if(confirm('ȷ��ɾ��ѡ����?'))submit();">ɾ��ѡ��</button>&nbsp;<button onClick="javascript:location.reload();" >����</button></td>
        <td height="26" align="center">
��ǰΪ��<?=$page?>ҳ&nbsp;��<?=$pagecount?>ҳ&nbsp;��<?=$total?>��¼
<a href="main.php?action=web_kithe_list&uid=<?=$uid?>&id=<?=$id?>&page=1">��ҳ</a>
<a href="main.php?action=web_kithe_list&uid=<?=$uid?>&id=<?=$id?>&page=<?=$pre?>">��һҳ</a>
<a href="main.php?action=web_kithe_list&uid=<?=$uid?>&id=<?=$id?>&page=<?=$next?>">��һҳ</a>
<a href="main.php?action=web_kithe_list&uid=<?=$uid?>&id=<?=$id?>&page=<?=$last?>">ĩҳ</a>
<select name="page2" onChange="location.href='main.php?action=web_kithe_list&uid=<?=$uid?>&id=<?=$id?>&page='+this.options[selectedIndex].value">
<?
$i = 1;
for ( ; $i <= $pagecount; ++$i )
{
 ?><option value="<?=$i?>"
   <? if ( $page == $i )
    {
        echo "selected";
    }?>
   >��<?=$i?>ҳ</option>
<? }?>
</select>&nbsp;</td></tr></table></td></tr></form></tbody></table>
<div id="rs_window" style="DISPLAY: none; POSITION: absolute;">
<table width="200" cellspacing="1" cellpadding="2" border="0" bgcolor="00558E">
  <tbody><tr>
    <td bgcolor="#FFFFFF">
          <table class="m_tab_fix" width="200" cellspacing="0" cellpadding="0" border="0" bgcolor="0163A2">
            <tbody><tr bgcolor="0163A2">
              <td><font color="#FFFFFF">��ʾ<span id="msg_had"></span></font></td>
              <td valign="top" align="right"><a style="cursor:pointer;" onclick="close_win();url='';"><img src="images/edit_dot.gif" width="16" height="14"></a></td>
            </tr>
          </tbody></table>
    </td>
   </tr>
</tbody></table>
<table width="200" cellspacing="1" cellpadding="2" border="0" bgcolor="00558E">
  <tbody><tr>
    <td bgcolor="#FFFFFF">
      <table class="m_tab_fix" width="200" cellspacing="0" cellpadding="0" border="0" bgcolor="0163A2">
          <tbody><tr bgcolor="#A4C0CE">
            <td height="20" align="center">���ڽ��������״̬?</td>
          </tr>
          <tr bgcolor="#000000">
            <td height="1"></td>
          </tr>
          <tr bgcolor="#A4C0CE">
            <td height="20" align="center">
                <input type="button" name="btn1" onclick="javascript:location.href=url+'&amp;kf=0';" class="buttonnor" value="�ֶ�����">
                &nbsp;
                <input type="button" name="btn2" onclick="javascript:location.href=url+'&amp;kf=1';" class="buttonnor" value="�Զ�����">            </td>
          </tr>
    </tbody></table>
    </td>
  </tr>
</tbody>
</table>
</div>
</body>