<?php

if ( !defined( "KK_VER" ) )
{
    exit( "��Ч�ķ���" );
}
if ( $vip == 1 || $lx < 1 )
{
    echo "<center>��û�и�Ȩ�޹���!</center>";
    exit( );
}
$result = $db1->query( "select count(*) from web_member" );
$numr=$result->fetch_array();
$numr = $numr[0];
if ( $maxmem != 0 && $maxmem <= $numr )
{
    echo "<script>alert('��ǰϵͳ�����Ѵ�����!');window.history.go(-1);</script>";
    exit( );
}
$dai = "";
$term = "";
$zslx = $_GET['zslx'];
if ( $lx == 4 )
{
    $term = " and (dagu='".$kauser."' or kauser='".$kauser."') ";
    if ( $zslx == "dagu" )
    {
        $select_sql = "";
        $dai = $kauser;
    }
    else
    {
        $select_sql = " and dagu='".$kauser."' ";
        $dai = $_GET['agent'];
    }
}
if ( $lx == 3 )
{
    $term = " and (guan='".$kauser."' or kauser='".$kauser."') ";
    if ( $zslx == "guan" )
    {
        $select_sql = "";
        $dai = $kauser;
    }
    else
    {
        $select_sql = " and guan='".$kauser."' ";
        $dai = $_GET['agent'];
    }
}
if ( $lx == 2 )
{
    $term = " and kauser='".$kauser."'";
    $select_sql = "";
    $dai = $kauser;
}
$maxcs = 0;
$istar = 0;
$iend = 100;
if ( $zslx != "" )
{
    switch ( $zslx )
    {
        case "all" :
            $zslx = "all";
            $term .= " and zs='888' ";
            break;
        case "dagu" :
            $zslx = "dagu";
            $term .= " and lx='4' ";
            break;
        case "guan" :
            $zslx = "guan";
            $term .= " and lx='3' ";
            break;
        case "zong" :
            $zslx = "zong";
            $term .= " and lx='2' ";
            break;
        default :
            $zslx = "all";
            $term .= " zs='888' ";
            break;
    }
}
else
{
    $zslx = "all";
    $term .= " zs='888' ";
}
if ( $dai != "" )
{
    $result = $db1->query( "select * from web_agent where kauser='".$dai."' and lx>1 ".$select_sql." order by id LIMIT 1" );
    $row = $result->fetch_assoc();
    if ( $row == "" )
    {
        exit( );
    }
    $maxcs = $row['cs'];
    $daimaxcs = $row['cs'];
    $lx = $row['lx'];
    switch ( $lx )
    {
        case "4" :
            $zslx = "dagu";
            $zslabel = "��ɶ�ֱ��";
            $iend = $row['dagu_zc'];
            $daimaxzc = $row['dagu_zc'];
            $gs_zc = $row['gs_zc'];
            $dagu_zc = $row['dagu_zc'];
            $guan_zc = 0;
            $zong_zc = 0;
            $dai_zc = 0;
            $dagu = $row['kauser'];
            $guan = $row['kauser'];
            $zong = $row['kauser'];
            $zc_auto = $row['zc_auto'];
            $zc_all = $row['zc_all'];
            break;
        case "3" :
            $zslx = "guan";
            $zslabel = "�ɶ�ֱ��";
            $iend = $row['guan_zc'];
            $daimaxzc = $row['guan_zc'];
            $gs_zc = $row['gs_zc'];
            $dagu_zc = $row['dagu_zc'];
            $guan_zc = $row['guan_zc'];
            $zong_zc = 0;
            $dai_zc = 0;
            $dagu = $row['dagu'];
            $guan = $row['kauser'];
            $zong = $row['kauser'];
            break;
        case "2" :
            $zslx = "zong";
            $zslabel = "�ܴ���ֱ��";
            $iend = $row['zong_zc'];
            $daimaxzc = $row['zong_zc'];
            $gs_zc = $row['gs_zc'];
            $dagu_zc = $row['dagu_zc'];
            $guan_zc = $row['guan_zc'];
            $zong_zc = $row['zong_zc'];
            $dai_zc = 0;
            $dagu = $row['dagu'];
            $guan = $row['guan'];
            $zong = $row['kauser'];
            break;
        default :
            $zslabel = "";
            break;
    }
    if ( $lx == 3 || $lx == 2 )
    {
        $result1 = $db1->query( "select * from web_agent where kauser='".$dagu."' and lx=4 order by id LIMIT 1" );
        $rows = $result1->fetch_assoc();
        if ( $rows == "" )
        {
            exit( );
        }
        $zc_auto = $rows['zc_auto'];
        $zc_all = $rows['zc_all'];
    }
    $mumu = 0;
    $result1 = $db1->query( "select SUM(cs) As sum_m  From web_agent Where lx=".( $lx - 1 )." and   ".$zslx."='".$dai."' order by id desc" );
    $rsw = $result1->fetch_array();
    if ( $rsw[0] != "" )
    {
        $mumu = $rsw[0];
    }
    $result1 = $db1->query( "select SUM(cs) As sum_m  From web_member Where zs=".$lx." and  ".$zslx."='".$dai."' order by id desc" );
    $rsw = $result1->fetch_array();
    if ( $rsw[0] != "" )
    {
        $mumu += $rsw[0];
    }
    $maxcs -= $mumu;
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
    $stat = 0;
    $abcd = $_POST['abcd'];
    switch ( $abcd )
    {
        case "A" :
            $abcd = "A";
            break;
        case "B" :
            $abcd = "B";
            break;
        case "C" :
            $abcd = "C";
            break;
        case "D" :
            $abcd = "D";
            break;
        default :
            $abcd = "A";
            break;
    }
    $xy = isset( $_POST['xy'] ) ? intval( $_POST['xy'] ) : 1;
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
    if ( empty( $_POST['xy'] ) )
    {
        echo "<script>alert('��ע���Ͷע���Ϊ��!');window.history.go(-1);</script>";
        exit( );
    }
    if ( $maxcs < $_POST['cs'] )
    {
        echo "<script>alert('�����ö��������ö�!');window.history.go(-1);</script>";
        exit( );
    }
    if ( $zc_auto == 0 )
    {
        switch ( $lx )
        {
            case "4" :
                $dagu_zc = isset( $_POST['sj'] ) ? intval( $_POST['sj'] ) : $iend;
                break;
            case "3" :
                $guan_zc = isset( $_POST['sj'] ) ? intval( $_POST['sj'] ) : $iend;
                break;
            case "2" :
                $zong_zc = isset( $_POST['sj'] ) ? intval( $_POST['sj'] ) : $iend;
                break;
            default :
                break;
        }
        if ( $zc_all == 0 )
        {
            $gs_zc = 100 - $dagu_zc - $guan_zc - $zong_zc - $dai_zc;
        }
        else
        {
            $dagu_zc = 100 - $gs_zc - $guan_zc - $zong_zc - $dai_zc;
        }
    }
    $result2 = $db1->query( "SELECT count(*)  FROM web_config_ds" );
    $num2=$result2->fetch_array();
    $num2 = $num2[0];
    $result1 = $db1->query( "SELECT count(*)  FROM web_user_ds where username='{$dai}' " );
    $num1=$result1->fetch_array();
    $num1 = $num1[0];
    if ( $num1 != $num2 )
    {
        echo "<script>alert('�ϼ���������ˮ��������,�޷�������Ա,����ϵ�ϼ���!');window.history.go(-1);</script>";
        exit( );
    }
    $sql = "INSERT INTO web_member  set uid='',kauser='".$username."',kapassword='".$pass."',xm='".$xm."',cs='".$cs."',ts='".$cs."',slogin='".$utime."',sip='".$userip."',zlogin='".$utime."',zip='".$userip."',adduser='".$kauser."',adddate='".$utime."',look='0',stat='".$stat."',ty='0',jin='0',xy='".$xy."',abcd='".$abcd."',zs='".$lx."',dagu='".$dagu."',guan='".$guan."',zong='".$zong."',dai='".$dai."',dai_zc='".$dai_zc."',zong_zc='".$zong_zc."',guan_zc='".$guan_zc."',dagu_zc='".$dagu_zc."',gs_zc='".$gs_zc."'";
    if ( !$db1->query( $sql ) )
    {
        exit( "���ݿ��޸ĳ���" );
    }
    $result = $db1->query( "select * from web_member where  kauser='".$username."'  order by id desc LIMIT 1" );
    $row = $result->fetch_array();
    $userid = $row['id'];
    $result = $db1->query( "select id,ds_lb,ds_id,ds,yg,ygb,ygc,ygd,xx,xxx,ds_lock from  web_user_ds where lx=".$lx." and username='".$dai."' order by id" );
    while ( $image = $result->fetch_array() )
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
        $db1->query( "INSERT INTO web_user_ds set username='{$username}',userid='{$userid}',ds_lb='".$image['ds_lb']."',ds_id='".$image['ds_id']."',ds='".$image['ds']."',yg='".$yg."',ygb='".$ygb."',ygc='".$ygc."',ygd='".$ygd."',xx='".$image['xx']."',xxx='".$image['xxx']."',ds_lock='".$image['ds_lock']."',lx='0',pz='0',pz_sum='0',zf_sum='500000',dagu='".$dagu."',guan='".$guan."',zong='".$zong."',dai='".$dai."'" );
    }
    echo "<script>alert('���ӳɹ�!');window.location.href='main.php?action=user_mem_zs_list&uid=".$uid."&vip=".$vip."&agent=".$dai."';</script>";
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
    if(username_value==''){
        $("username").focus(); 
        alert("�������˺�!!!"); 
        return false;}
    else{
        $("check_frame").src='main.php?action=check&uid=<?=$uid?>&vip=<?=$vip?>&username='+username_value;
        
    }
    
}
</script>
<script>
function SubChk() {
    if ($("agent").value == '') {
            $("agent").focus();
            alert("��ѡ���ϼ�!!");
            return false;
        
    }
    if ($("username").value == '') {
        $("username").focus();
        alert("�������˺�!!!");
        return false;
    }
    if ($("pass").value == '') {
         $("pass").focus();
         alert("����������!!!");
         return false;
    }
    if ($("pass2").value == '') {
            $("pass2").focus();
            alert("������ȷ������!!!");
            return false;
          }
    if ($("pass").value != $("pass2").value) {
        $("pass2").focus();
        alert("ȷ�����������벻һ��!!!");
        return false;
        
    }
    if ($("xm").value == '') {
        $("xm").focus();
        alert("����������!!!");
        return false
        
    }
    if ($("cs").value == '') {
        $("cs").focus();
        alert("�����������ö��!!!");
        return false;
        
    }
    if(isNaN($("cs").value))
    {
     alert('�����ö��ֻ����������');
     $("cs").focus();
     return false;
    }
    if ($("cs").value > eval($("maxcs").value)) {
        $("cs").focus();
        alert("���ö�Ȳ��ܴ���������ö��!!!");
        return false;
        
    }
    if ($("xy").value == '') {
        $("xy").focus();
        alert("�����뵥ע���Ͷע��!!!");
       return false;
       }
     if(isNaN($("xy").value))
        {
        alert('��ע���Ͷע��ֻ����������');
        $("xy").focus();
        return false;
        }
    if (!confirm("�Ƿ�ȷ�����ӻ�Ա?")) {return false;}
    }
</script>
<body style="min-width: 1200px;width: 100%">
 <div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">ֱ����Ա������</span><span class="font_b">����ֱ����Ա</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright">    
<table border="0" align="right" cellpadding="0" cellspacing="0">
            <tbody><tr>
                <td height="28" style="color:#fff;">����ֱ����Ա&nbsp;
    <?
if ( $dai == "" )
{
?>ֱ������-
  <select id="zslx" name="zslx" onChange="var jmpURL='main.php?action=user_mem_zs_add&uid=<?=$uid?>&vip=<?=$vip?>&zslx='+this.options[this.selectedIndex].value ; if(jmpURL!='') {window.location=jmpURL;} else {this.selectedIndex=0 ;}" >
    <option value="all">����ѡ��ֱ������</option>
    <?if ( 3 < $lx ){?><option value="dagu" <?if ( $zslx == "dagu" ){?>selected="selected"<?}?>>��ɶ�ֱ��</option><?}?>
  <?if ( 2 < $lx ){?><option value="guan" <?if ( $zslx == "guan" ){?>selected="selected"<?}?>>�ɶ�ֱ��</option><?}
    if ( 1 < $lx ){?><option value="zong" <?if ( $zslx == "zong" ){?>selected="selected"<?}?>>�ܴ���ֱ��</option><? }?>
 </select> 
�ϼ��˺�-

    <select id="agent" name="agent" onChange="var jmpURL='main.php?action=user_mem_zs_add&uid=<?=$uid?>&vip=<?=$vip?>&agent='+this.options[this.selectedIndex].value ; if(jmpURL!='') {window.location=jmpURL;} else {this.selectedIndex=0 ;}">
    <option value="" >��ѡ���ϼ��˺�</option>
    <?
    $result = $db1->query( "select * from web_agent where 1=1 ".$term." order by id desc" );
    while ( $image = $result->fetch_array() )
    {
?>  <option value="<?=$image['kauser']?>" <?if ( $dai == $image['kauser'] ){?> selected="selected"<?}?>><?=$image['kauser']?></option><?}?>
    </select>
    <td width="215" class="m_tline"><a href="main.php?action=user_mem_zs_list&uid=<?=$uid?>&vip=<?=$vip?>" >����һҳ</a></td>
    <?}?>
</tbody>
</table>
</div>
</div>
<?
if ( $dai != "" )
{
?><br>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
    <tr>
        <td height="20" colspan="2" align="center" bgcolor="#FFFFFF" class="t_list_caption">�ϼ�(<?=$dai?>)����</td>
    </tr>
    <tr>
        <td width="16%" height="20" align="right" class="t_edit_caption">��ע:</td>
        <td class="t_edit_td">����ռ����:<?=$daimaxzc?>%&nbsp;&nbsp;&nbsp;�����ö�:<?=$daimaxcs?>&nbsp;&nbsp;&nbsp;�������ö�:<?=$mumu?>&nbsp;&nbsp;&nbsp;ʣ�����ö�:<?=$maxcs?></td>
    </tr>
    </table>
    <?}?>
    <form name="form1" onSubmit="return SubChk()" method="post" action="main.php?action=user_mem_zs_add&uid=<?=$uid?>&vip=<?=$vip?>&act=add&zslx=<?=$zslx?>&agent=<?=$dai?>">
        <table width="900" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
            <tr>
                <td height="20" colspan="2" align="center" bgcolor="#FFFFFF" class="t_list_caption">���������趨</td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�ϼ��˺�:</td>
                <td height="30" bgcolor="#FFFFFF" class="t_edit_td" >
                <?if ( $dai != "" ){?><input name="agent"  type="hidden" id="agent" value="<?=$dai?>" />
                <?}if ( $dai == "" ){?>��ѡ���ϼ�!!<?}else{?><?=$dai?>&nbsp;&nbsp;&nbsp;&nbsp;ֱ������:<?=$zslabel?>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="main.php?action=user_mem_zs_add&uid=<?=$uid?>&vip=<?=$vip?>" >����ѡ���ϼ�</a><?}?>
                </td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�˺�:</td>
                <td height="30" bgcolor="#FFFFFF" class="t_edit_td" >
                    <input name="username" type="text" class="za_text"  id="username" />
              &nbsp;<input type="button" onClick="check_user();" value="����˺�" class="za_button" />&nbsp;
              �ʺű�������1����Ԫ�������12����Ԫ������ֻ��������(0-9)����Ӣ��Сд��ĸ</td>
             </tr>
             <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">����:</td>
                <td height="30" bgcolor="#FFFFFF" class="t_edit_td" ><input name="pass" type="password" class="za_text"  id="pass" />&nbsp;�����������6����Ԫ�������12����Ԫ������ֻ��������(0-9)����Ӣ�Ĵ�Сд��ĸ </td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">ȷ������:</td>
                <td height="30" bgcolor="#FFFFFF" class="t_edit_td" ><input name="pass2" type="password" class="za_text" id="pass2" /></td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">����:</td>
                <td height="30" bgcolor="#FFFFFF" class="t_edit_td" >
                    <input name="xm" type="text" class="za_text"  id="xm" /></td>
            </tr>
            <tr>
                <td height="17" colspan="2" align="right"  bgcolor="#FFFFFF" class="t_list_caption">��ע�����趨</td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�����ö�:</td>
                <td height="30" bgcolor="#FFFFFF" class="t_edit_td" >
                    <input name="cs" type="text" class="za_text" id="cs"  onkeyup="value=value.replace(/[^\d\.\/]/ig,'')" value="0" />������ö��:<?=$maxcs?>
                    <input name="maxcs"  type="hidden" id="maxcs" value="<?=$maxcs?>" />
                </td>
           </tr>
           <tr>
            <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�̿�:</td>
            <td height="30" bgcolor="#FFFFFF" class="t_edit_td" >
                <select name="abcd" id="abcd">
                    <option value="A" selected="selected">A��</option>
                    <option value="B">B��</option>
                    <option value="C">C��</option>
                    <option value="D">D��</option>
                </select>
            </td>
        </tr>
        <tr>
            <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">��ע���Ͷע��:</td>
            <td height="30" bgcolor="#FFFFFF" class="t_edit_td" >
                <input name="xy" type="text" class="za_text"  id="xy"  onkeyup="value=value.replace(/[^\d\.\/]/ig,'')"  value="10" size="10" />
            </td>
        </tr>
        <tr>
            <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�ϼ�ռ��:</td>
            <td height="30" bgcolor="#FFFFFF" class="t_edit_td" >
            <?
if ( $zc_auto == 0 )
{
  ?>
  <select class="za_select" name="sj"  id="zc">
  <?
    $bb = $istar;
    for ( ; $bb <= $iend; $bb += 5 )
    {
   ?>
   <option value="<?=$bb?>" <?if ( $bb == $iend ){?>selected="selected"<?}?>>
   <?
        switch ( $bb )
        {
            case 0 :
                print "��ռ��";
                break;
            default :
                print $bb."%";
                break;
?></option>
<? }
       }
      ?></select><?
}?><?=$daimaxzc."%"?></td>
</tr>
<tr>
    <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">��ˮ�趨:</td>
    <td height="30" bgcolor="#FFFFFF" class="t_edit_td" >
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
<td height="30" colspan="2" align="center"   bgcolor="#FFFFFF" class="">
    <input  type="submit" class="btn1"  name="Submit" value="ȷ��" />     
</td>
</tr>
</table>
</form>
<iframe name="check_frame" src="" width="0" height="0" style="display:none"></iframe>
</body>
