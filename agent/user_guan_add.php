<?php

if ( !defined( "KK_VER" ) )
{
    exit( "��Ч�ķ���" );
}
if ( $vip == 1 || $lx < 4 )
{
    echo "<center>��û�и�Ȩ�޹���!</center>";
    exit( );
}
$maxcs = 888888888;
$istar = 0;
$iend = 100;
if ( $lx == 4 )
{
    $select_sql = " and dagu='".$kauser."' ";
    $dagu = $kauser;
}
else
{
    $dagu = $_GET['dagu'];
}
if ( $dagu != "" )
{
    $result = $db1->query( "select * from web_agent where kauser='".$dagu."' and lx=4 order by id LIMIT 1" );
    $row = $result->fetch_assoc();
    if ( $row == "" )
    {
        exit( );
    }
    $iend = $row['dagu_zc'];
    $maxcs = $row['cs'];
    $dagumaxcs = $row['cs'];
    $dagumaxzc = $row['dagu_zc'];
    $gs_zc = $row['gs_zc'];
    $zc_auto = $row['zc_auto'];
    $zc_all = $row['zc_all'];
    $pz = $row['pz'];
    $pz_of = $pz;
    $pzall = $row['pzall'];
    $zc = 0;
    $mumu = 0;
    $result1 = $db1->query( "select SUM(cs) As sum_m  From web_agent Where lx=3 and   dagu='".$dagu."' order by id desc" );
    $rsw = $result1->fetch_array();
    if ( $rsw[0] != "" )
    {
        $mumu = $rsw[0];
    }
    $result1 = $db1->query( "select SUM(cs) As sum_m  From web_member Where zs=4 and   dagu='".$dagu."' order by id desc" );
    $rsw = $result1->fetch_array();
    if ( $rsw[0] != "" )
    {
        $mumu += $rsw[0];
    }
    $maxcs -= $mumu;
}
else
{
    exit( );
}
if ( $_GET['act'] == "add" )
{
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    chk_user( $username );
    chk_pwd( $pass );
    $pass = md5( $pass );
    $xm = isset( $_POST['xm'] ) ? safe_convert( $_POST['xm'] ) : $username;
    $cs = isset( $_POST['cs'] ) ? intval( $_POST['cs'] ) : 0;
    $sj = isset( $_POST['sj'] ) ? intval( $_POST['sj'] ) : $iend;
    $sf = isset( $_POST['sf'] ) ? intval( $_POST['sf'] ) : 0;
    $stat = 0;
    if ( $_POST['rpz'] == 1 )
    {
        $pz = 1;
    }
    else
    {
        $pz = 0;
    }
    if ( $_POST['rty'] == 1 )
    {
        $ty = 1;
    }
    else
    {
        $ty = 0;
    }
    if ( $pzall == 3 && $zc_all == 0 )
    {
        if ( $_POST['zc'] == "1" )
        {
            $zc = 1;
        }
        else
        {
            $zc = 0;
        }
    }
    else
    {
        $zc = 0;
    }
    $rds = $_POST['rds'];
    switch ( $rds )
    {
        case "0" :
            $dsc = 0;
            break;
        case "1" :
            $dsc = 0.1;
            break;
        case "2" :
            $dsc = 0.5;
            break;
        case "3" :
            $dsc = 1;
            break;
        case "4" :
            $dsc = 1.5;
            break;
        case "5" :
            $dsc = 2;
            break;
        case "6" :
            $dsc = 2.5;
            break;
        case "7" :
            $dsc = -1;
            break;
        default :
            $dsc = 0;
            break;
    }
    if ( empty( $username ) )
    {
        echo "<script>alert('�ʺŲ���Ϊ��!');window.history.go(-1);</script>";
        exit( );
    }
    if ( empty( $pass ) )
    {
        echo "<script>alert('���벻��Ϊ��!');window.history.go(-1);</script>";
        exit( );
    }
    if ( $maxcs < $cs )
    {
        echo "<script>alert('�����ö��������ö�!');window.history.go(-1);</script>";
        exit( );
    }
    if ( $iend < $sj )
    {
        echo "<script>alert('�Բ���,����ȷ����ռ��!');window.history.go(-1);</script>";
        exit( );
    }
    if ( $iend < $sf )
    {
        echo "<script>alert('�Բ���,����ȷ����ռ��!');window.history.go(-1);</script>";
        exit( );
    }
    if ( $zc_auto == 0 )
    {
        if ( $zc_all == 0 )
        {
            $gs_zc = 100 - $sj - $sf;
        }
        else
        {
            if ( $sj + $sf != $iend )
            {
                echo "<script>alert('�Բ���,����ȷ����ռ��!');window.history.go(-1);</script>";
                exit( );
            }
        }
    }
    else if ( $sj + $sf != $iend )
    {
        echo "<script>alert('�Բ���,����ȷ����ռ��!');window.history.go(-1);</script>";
        exit( );
    }
    if ( $iend < $sj + $sf )
    {
        echo "<script>alert('��ɶ������ӹɶ��������ܳ���".$iend."%��!');window.history.go(-1);</script>";
        exit( );
    }
    $sql = "INSERT INTO  web_agent set uid='',kauser='{$username}',kapassword='{$pass}',xm='{$xm}',slogin='{$utime}',sip='{$userip}',zlogin='{$utime}',zip='{$userip}',adduser='{$kauser}',look='0',lx='3',dagu='{$dagu}',guan='',zong='',cs='{$cs}',ts='{$cs}',adddate='{$utime}',stat='{$stat}',ty='{$ty}',pz='{$pz}',pzall='{$pzall}',abcd='',zc='{$zc}',zc_all='{$zc_all}',zc_auto='{$zc_auto}',report='{$report}',gs_zc='{$gs_zc}',dagu_zc='{$sj}',guan_zc='{$sf}',zong_zc='0',dai_zc='0'";
    if ( !$db1->query( $sql ) )
    {
        exit( "���ݿ��޸ĳ���" );
    }
    $result = $db1->query( "select * from web_agent where  kauser='".$username."'  order by id desc LIMIT 1" );
    $row = $result->fetch_array();
    $userid = $row['id'];
    $result = $db1->query( "select id,ds_lb,ds_id,ds,yg,ygb,ygc,ygd,xx,xxx,ds_lock from  web_user_ds where lx=4 and username='".$dagu."' order by id" );
    while ( $image = $result->fetch_array())
    {
        if ( 0 <= $dsc )
        {
            $yg = round( $image['yg'] - $dsc, 2 );
            $ygb = round( $image['ygb'] - $dsc, 2 );
            $ygc = round( $image['ygc'] - $dsc, 2 );
            $ygd = round( $image['ygd'] - $dsc, 2 );
        }
        else
        {
            $yg = $ygb = $ygc = $ygd = 0;
        }
        $db1->query( "INSERT INTO web_user_ds set username='{$username}',userid='{$userid}',ds_lb='".$image['ds_lb']."',ds_id='".$image['ds_id']."',ds='".$image['ds']."',yg='".$yg."',ygb='".$ygb."',ygc='".$ygc."',ygd='".$ygd."',xx='".$image['xx']."',xxx='".$image['xxx']."',ds_lock='".$image['ds_lock']."',lx='3',pz='0',pz_sum='0',zf_sum='500000',dagu='".$dagu."',guan='',zong='',dai=''" );
    }
    echo "<script>alert('��ӳɹ�!');window.location.href='main.php?action=user_guan_list&uid=".$uid."&vip=".$vip."';</script>";
    exit( );
}
?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<style type="text/css">
<!--
.m_suag_ed {  background-color: #D3C9CB; text-align: right}
-->
</style>
<script src="js/function.js" type="text/javascript"></script>
<script>
function check_user(){
    username_value=$("username").value;
    if(username_value=='')
    {
        $("username").focus(); alert("�������˺�!!!"); return false;
        
    }else{
        $("check_frame").src='main.php?action=check&uid=<?=$uid?>&vip=<?=$vip?>&username='+username_value;
        }
    }
</script>
<script>
function SubChk() {
    if ($("agent").value == '') { $("dagu").focus();alert("��ѡ���ϼ�!!");return false;}
    if ($("username").value == '') { $("username").focus();alert("�������˺�!!!");return false;}
    if ($("pass").value == '') { $("pass").focus();alert("����������!!!");return false;}
    if ($("pass2").value == '') { $("pass2").focus();alert("������ȷ������!!!");return false;}
    if ($("pass").value != $("pass2").value) { $("pass2").focus();alert("ȷ�����������벻ͬ!!!");return false;}
    if ($("xm").value == '') {$("xm").focus();alert("����������!!!");return false;}
    if ($("cs").value == '') {$("cs").focus();alert("�����������ö��!!!");return false;}
    if(isNaN($("cs").value)){alert('�����ö��ֻ����������');$("cs").focus();return false;}
    if ($("cs").value > eval($("maxcs").value)) {$("cs").focus();alert("���ö�Ȳ��ܴ���������ö��!!!");return false;}
    if (!confirm("�Ƿ�ȷ����ӹɶ�?")) {return false;}
    }
</script>
<script>
<?if ( $zc_auto == 0 && $zc_all == 0 ){?>
    function ChangeSelectorSJ() {   
        var zzc=eval($("sf").value)+ eval($("sj").value); 
        if (zzc> "<?=$iend?>") {
            $("sf").value="<?=$iend?>"-$("sj").value;
            $("sj").focus();
            alert("��ɶ�ռ����+�ɶ�ռ�������ܴ��ڿ���ռ����<?=$iend?>%��");
            return false;
            
                             }
        
        } 
    function ChangeSelectorSF() { 
        var zzc=eval($("sf").value)+ eval($("sj").value);
        if (zzc> "<?=$iend?>") {
            $("sj").value="<?=$iend?>"-$("sf").value;
            $("sf").focus();
            alert("��ɶ�ռ����+�ɶ�ռ�������ܴ��ڿ���ռ����<?=$iend?>%��");
            return false;
            
        }
        
    }
    <?}else{?>
    function ChangeSelectorSJ() {  
      $("sf").value="<?=$iend?>"-$("sj").value;} 
    function ChangeSelectorSF() { 
      $("sj").value="<?=$iend?>"-$("sf").value;}
      
<?}?>
function StopPZ() { alert("���˺ż������������̽��ر��߷ɷ���!!!");}
function StopTY() { alert("���˺ż���������Ա����ͣͶע����!!!");}
</script>
<body style="min-width: 1200px;width: 100%">
 <div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;�ɶ�����</span><span class="font_b">��ӹɶ�&nbsp;</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright">    
        <div align="right">��ӹɶ�&nbsp;
                    <?
        if ( 4 < $lx )
        {
        ?>
<select id="dagu" name="dagu" onChange="var jmpURL='main.php?action=user_guan_add&uid=<?=$uid?>&vip=<?=$vip?>&dagu='+this.options[this.selectedIndex].value ; if(jmpURL!='') {window.location=jmpURL;} else {this.selectedIndex=0 ;}">
    <option value="" >��ѡ���ϼ��˺�</option>
    <?
    $result = $db1->query( "select * from web_agent where lx=4  order by id desc" );
    while ( $image = $result->fetch_array() )
    {
?> <option value="<?=$image['kauser']?>" <?if ( $dagu == $image['kauser'] ){ echo "selected=selected ";}?>><?=$image['kauser']?></option><? }?></select>
<?
}
else
{
?><input name="dagu" type="hidden" id="dagu" value="<?=$dagu?>" /><?}?></font> -- <a href="main.php?action=user_guan_list&uid=<?=$uid?>&vip=<?=$vip?>" >����һҳ</a></div>

</div></div>
<?
if ( $dagu != "" )
{
?>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
<tr>
<td height="20" colspan="2" align="center" bgcolor="#FFFFFF" class="t_list_caption">��ɶ�(<?=$dagu?>)���ϼ���</td>
</tr>
<tr>
 <td width="16%" height="20" align="right" class="t_edit_caption">��ע:</td>
<td class="t_edit_td">����ռ����:<?=$dagumaxzc?>%&nbsp;&nbsp;&nbsp;�����ö�:<?=$dagumaxcs?>&nbsp;&nbsp;&nbsp;�������ö�:<?=$mumu?>&nbsp;&nbsp;&nbsp;ʣ�����ö�:<?=$maxcs?></td>
</tr>
</table>
<?
}
?><form name="form1" onSubmit="return SubChk()" method="post" action="main.php?action=user_guan_add&uid=<?=$uid?>&vip=<?=$vip?>&act=add&dagu=<?=$dagu?>">
<table width="900" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
<tr>
<td height="20" colspan="2" align="center" bgcolor="#FFFFFF" class="t_list_caption">���������趨</td>
</tr>
<tr>
<td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�ϼ���ɶ�:</td>
<td height="30" bgcolor="#FFFFFF" class="t_edit_td" ><input name="agent"  type="hidden" id="agent" value="<?
if ( $dagu != "" )
{
    echo $dagu;
}
?>" /><?
if ( $dagu == "" )
{
    echo "��ѡ���ϼ�!!";
}
else
{
    echo $dagu;
}
?></td>
</tr>
<tr>
<td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�˺�:</td>
<td height="30" bgcolor="#FFFFFF" class="t_edit_td" ><input name="username" type="text" class="za_text" id="username">&nbsp;
<input type="button" onClick="check_user();" value="����˺�" class="za_button" />&nbsp;�ʺű�������1����Ԫ�������12����Ԫ��,����(0-9)����Ӣ��Сд��ĸ</td>
</tr>
<tr>
<td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">����:</td>
<td height="30" bgcolor="#FFFFFF" class="t_edit_td" ><input name="pass" type="password" class="za_text" id="pass" />      &nbsp;�����������6����Ԫ�������12����Ԫ������ֻ��������(0-9)����Ӣ�Ĵ�Сд��ĸ </td>
</tr>
<tr>
<td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">ȷ������:</td>
<td bgcolor="#FFFFFF" class="t_edit_td" ><input name="pass2" type="password" class="za_text" id="pass2" /></td>
</tr>
<tr>
    <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">����:</td>
    <td bgcolor="#FFFFFF" class="t_edit_td" ><input name="xm" type="text" class="za_text" id="xm" /></td></tr>
<tr>
<td height="17" colspan="2" align="right"  bgcolor="#FFFFFF" class="t_list_caption">��ע�����趨</td>
</tr>
<tr>
<td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�����ö�:<?=$pz?></td>
<td bgcolor="#FFFFFF" class="t_edit_td" ><input name="cs" type="text" class="za_text" id="cs"  onkeyup="value=value.replace(/[^\d\.\/]/ig,'')" value="0" />������ö��:<?=$maxcs?><input name="maxcs"  type="hidden" id="maxcs" value="<?=$maxcs?>" /></td></tr>
<?
if ( $pz_of == 0 )
{

    if ( $pzall == 3 && $zc_all == 0 )
    {
?><tr>
<td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�����¼��߷�:</td>
<td height="30" bgcolor="#FFFFFF" class="t_edit_td" >
     <select name="zc" id="zc">
        <option value="0"  selected="selected">��</option>
        <option value="1" >��</option>
    </select> 
     <SPAN STYLE="color: rgb(255,0,0);"> ��ɶ��Ƿ���ܸ��¼����߷�ע��</SPAN> </td></tr>
     <?
    }
   ?>
  <tr>
  <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�߷�:</td>
  <td height="30" bgcolor="#FFFFFF" class="t_edit_td" >
  <input type="radio" name="rpz"  id="rpz" value="0" checked="checked" />����<input type="radio" name="rpz"  id="rpz" value="1" onClick="StopPZ()"/>��ֹ</td>
  </tr>
  <?
}
?><tr>
<td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">Ͷע:</td>
<td height="30" bordercolor="#CCCCCC" bgcolor="#FFFFFF" class="t_edit_td">
<input type="radio" name="rty"  id="rty" value="0" checked="checked" />����Ͷע
<input type="radio" name="rty"  id="rty" value="1" onClick="StopTY()"/>��ͣͶע</td>
</tr>
<tr>
<td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">��ɶ�ռ����:</td>
<td height="30" bordercolor="#CCCCCC" bgcolor="#FFFFFF" class="t_edit_td">
<select  name="sj"  id="sj" onchange=ChangeSelectorSJ()>
<?
$bb = $istar;
for ( ; $bb <= $iend; $bb += 5 )
{
?><option value="<?=$bb?>"
 <?   if ( $bb == $iend )
    {
?>selected="selected"
  <?  }?>>
  <?
    switch ( $bb )
    {
        case 0 :
            print "��ռ��";
            break;
            break;
        default :
            print $bb."%";
            break;
    }
?></option>
<?
}
?></select>
</td>
</tr>
<tr>
<td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�ɶ�ռ����:</td>
<td height="30" bordercolor="#CCCCCC" bgcolor="#FFFFFF" class="t_edit_td">
<select name="sf"  id="sf" onchange=ChangeSelectorSF()>
<?
$bb = $istar;
for ( ; $bb <= $iend; $bb += 5 )
{
?><option value="<?=$bb?>">
<?
    switch ( $bb )
    {
        case 0 :
            print "��ռ��";
            break;
        default :
            print $bb."%";
            
            break;
        }
        ?></option>
	<?	}?>
       </select>
</td>
</tr>
<tr>
<td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">��ˮ�趨:</td>
<td height="30" bordercolor="#CCCCCC" bgcolor="#FFFFFF" class="t_edit_td">
<input type="radio" name="rds"  id="rds" value="0" checked="checked" />ȫ��
<input type="radio" name="rds"  id="rds" value="1" />׬0.1
<input type="radio" name="rds"  id="rds" value="2" />׬0.5
<input type="radio" name="rds"  id="rds" value="3" />׬1
<input type="radio" name="rds"  id="rds" value="4" />׬1.5
<input type="radio" name="rds"  id="rds" value="5" />׬2
<input type="radio" name="rds"  id="rds" value="6" />׬2.5
<input type="radio" name="rds"  id="rds" value="7" />ȫ����
</td>
</tr>
<tr>
<td height="30" colspan="2" align="center" bgcolor="#FFFFFF" class=""><input type="submit" class="btn1" name="button" id="button" value="ȷ��" />
</td>
</tr>
</table>
</form>
<iframe name="check_frame" src="" width="0" height="0" style="display:none"></iframe></body>
