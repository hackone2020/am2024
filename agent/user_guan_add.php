<?php

if ( !defined( "KK_VER" ) )
{
    exit( "无效的访问" );
}
if ( $vip == 1 || $lx < 4 )
{
    echo "<center>你没有该权限功能!</center>";
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
        echo "<script>alert('帐号不能为空!');window.history.go(-1);</script>";
        exit( );
    }
    if ( empty( $pass ) )
    {
        echo "<script>alert('密码不能为空!');window.history.go(-1);</script>";
        exit( );
    }
    if ( $maxcs < $cs )
    {
        echo "<script>alert('总信用额超过最高信用额!');window.history.go(-1);</script>";
        exit( );
    }
    if ( $iend < $sj )
    {
        echo "<script>alert('对不起,请正确设置占成!');window.history.go(-1);</script>";
        exit( );
    }
    if ( $iend < $sf )
    {
        echo "<script>alert('对不起,请正确设置占成!');window.history.go(-1);</script>";
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
                echo "<script>alert('对不起,请正确设置占成!');window.history.go(-1);</script>";
                exit( );
            }
        }
    }
    else if ( $sj + $sf != $iend )
    {
        echo "<script>alert('对不起,请正确设置占成!');window.history.go(-1);</script>";
        exit( );
    }
    if ( $iend < $sj + $sf )
    {
        echo "<script>alert('大股东成数加股东成数不能超过".$iend."%！!');window.history.go(-1);</script>";
        exit( );
    }
    $sql = "INSERT INTO  web_agent set uid='',kauser='{$username}',kapassword='{$pass}',xm='{$xm}',slogin='{$utime}',sip='{$userip}',zlogin='{$utime}',zip='{$userip}',adduser='{$kauser}',look='0',lx='3',dagu='{$dagu}',guan='',zong='',cs='{$cs}',ts='{$cs}',adddate='{$utime}',stat='{$stat}',ty='{$ty}',pz='{$pz}',pzall='{$pzall}',abcd='',zc='{$zc}',zc_all='{$zc_all}',zc_auto='{$zc_auto}',report='{$report}',gs_zc='{$gs_zc}',dagu_zc='{$sj}',guan_zc='{$sf}',zong_zc='0',dai_zc='0'";
    if ( !$db1->query( $sql ) )
    {
        exit( "数据库修改出错" );
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
    echo "<script>alert('添加成功!');window.location.href='main.php?action=user_guan_list&uid=".$uid."&vip=".$vip."';</script>";
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
        $("username").focus(); alert("请输入账号!!!"); return false;
        
    }else{
        $("check_frame").src='main.php?action=check&uid=<?=$uid?>&vip=<?=$vip?>&username='+username_value;
        }
    }
</script>
<script>
function SubChk() {
    if ($("agent").value == '') { $("dagu").focus();alert("请选择上级!!");return false;}
    if ($("username").value == '') { $("username").focus();alert("请输入账号!!!");return false;}
    if ($("pass").value == '') { $("pass").focus();alert("请输入密码!!!");return false;}
    if ($("pass2").value == '') { $("pass2").focus();alert("请输入确认密码!!!");return false;}
    if ($("pass").value != $("pass2").value) { $("pass2").focus();alert("确认密码与密码不同!!!");return false;}
    if ($("xm").value == '') {$("xm").focus();alert("请输入名称!!!");return false;}
    if ($("cs").value == '') {$("cs").focus();alert("请输入总信用额度!!!");return false;}
    if(isNaN($("cs").value)){alert('总信用额度只能输入数字');$("cs").focus();return false;}
    if ($("cs").value > eval($("maxcs").value)) {$("cs").focus();alert("信用额度不能大于最大信用额度!!!");return false;}
    if (!confirm("是否确定添加股东?")) {return false;}
    }
</script>
<script>
<?if ( $zc_auto == 0 && $zc_all == 0 ){?>
    function ChangeSelectorSJ() {   
        var zzc=eval($("sf").value)+ eval($("sj").value); 
        if (zzc> "<?=$iend?>") {
            $("sf").value="<?=$iend?>"-$("sj").value;
            $("sj").focus();
            alert("大股东占成数+股东占成数不能大于可用占成数<?=$iend?>%！");
            return false;
            
                             }
        
        } 
    function ChangeSelectorSF() { 
        var zzc=eval($("sf").value)+ eval($("sj").value);
        if (zzc> "<?=$iend?>") {
            $("sj").value="<?=$iend?>"-$("sf").value;
            $("sf").focus();
            alert("大股东占成数+股东占成数不能大于可用占成数<?=$iend?>%！");
            return false;
            
        }
        
    }
    <?}else{?>
    function ChangeSelectorSJ() {  
      $("sf").value="<?=$iend?>"-$("sj").value;} 
    function ChangeSelectorSF() { 
      $("sj").value="<?=$iend?>"-$("sf").value;}
      
<?}?>
function StopPZ() { alert("该账号及其下属代理商将关闭走飞服务!!!");}
function StopTY() { alert("该账号及其下属会员将暂停投注服务!!!");}
</script>
<body style="min-width: 1200px;width: 100%">
 <div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;股东管理－</span><span class="font_b">添加股东&nbsp;</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright">    
        <div align="right">添加股东&nbsp;
                    <?
        if ( 4 < $lx )
        {
        ?>
<select id="dagu" name="dagu" onChange="var jmpURL='main.php?action=user_guan_add&uid=<?=$uid?>&vip=<?=$vip?>&dagu='+this.options[this.selectedIndex].value ; if(jmpURL!='') {window.location=jmpURL;} else {this.selectedIndex=0 ;}">
    <option value="" >请选择上级账号</option>
    <?
    $result = $db1->query( "select * from web_agent where lx=4  order by id desc" );
    while ( $image = $result->fetch_array() )
    {
?> <option value="<?=$image['kauser']?>" <?if ( $dagu == $image['kauser'] ){ echo "selected=selected ";}?>><?=$image['kauser']?></option><? }?></select>
<?
}
else
{
?><input name="dagu" type="hidden" id="dagu" value="<?=$dagu?>" /><?}?></font> -- <a href="main.php?action=user_guan_list&uid=<?=$uid?>&vip=<?=$vip?>" >回上一页</a></div>

</div></div>
<?
if ( $dagu != "" )
{
?>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
<tr>
<td height="20" colspan="2" align="center" bgcolor="#FFFFFF" class="t_list_caption">大股东(<?=$dagu?>)资料简述</td>
</tr>
<tr>
 <td width="16%" height="20" align="right" class="t_edit_caption">下注:</td>
<td class="t_edit_td">可用占成数:<?=$dagumaxzc?>%&nbsp;&nbsp;&nbsp;总信用额:<?=$dagumaxcs?>&nbsp;&nbsp;&nbsp;已用信用额:<?=$mumu?>&nbsp;&nbsp;&nbsp;剩余信用额:<?=$maxcs?></td>
</tr>
</table>
<?
}
?><form name="form1" onSubmit="return SubChk()" method="post" action="main.php?action=user_guan_add&uid=<?=$uid?>&vip=<?=$vip?>&act=add&dagu=<?=$dagu?>">
<table width="900" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
<tr>
<td height="20" colspan="2" align="center" bgcolor="#FFFFFF" class="t_list_caption">基本资料设定</td>
</tr>
<tr>
<td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">上级大股东:</td>
<td height="30" bgcolor="#FFFFFF" class="t_edit_td" ><input name="agent"  type="hidden" id="agent" value="<?
if ( $dagu != "" )
{
    echo $dagu;
}
?>" /><?
if ( $dagu == "" )
{
    echo "请选择上级!!";
}
else
{
    echo $dagu;
}
?></td>
</tr>
<tr>
<td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">账号:</td>
<td height="30" bgcolor="#FFFFFF" class="t_edit_td" ><input name="username" type="text" class="za_text" id="username">&nbsp;
<input type="button" onClick="check_user();" value="检查账号" class="za_button" />&nbsp;帐号必须至少1个字元长，最多12个字元长,数字(0-9)，及英文小写字母</td>
</tr>
<tr>
<td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">密码:</td>
<td height="30" bgcolor="#FFFFFF" class="t_edit_td" ><input name="pass" type="password" class="za_text" id="pass" />      &nbsp;密码必须至少6个字元长，最多12个字元长，并只能有数字(0-9)，及英文大小写字母 </td>
</tr>
<tr>
<td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">确认密码:</td>
<td bgcolor="#FFFFFF" class="t_edit_td" ><input name="pass2" type="password" class="za_text" id="pass2" /></td>
</tr>
<tr>
    <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">名称:</td>
    <td bgcolor="#FFFFFF" class="t_edit_td" ><input name="xm" type="text" class="za_text" id="xm" /></td></tr>
<tr>
<td height="17" colspan="2" align="right"  bgcolor="#FFFFFF" class="t_list_caption">下注资料设定</td>
</tr>
<tr>
<td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">总信用额:<?=$pz?></td>
<td bgcolor="#FFFFFF" class="t_edit_td" ><input name="cs" type="text" class="za_text" id="cs"  onkeyup="value=value.replace(/[^\d\.\/]/ig,'')" value="0" />最高信用额度:<?=$maxcs?><input name="maxcs"  type="hidden" id="maxcs" value="<?=$maxcs?>" /></td></tr>
<?
if ( $pz_of == 0 )
{

    if ( $pzall == 3 && $zc_all == 0 )
    {
?><tr>
<td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">接收下级走飞:</td>
<td height="30" bgcolor="#FFFFFF" class="t_edit_td" >
     <select name="zc" id="zc">
        <option value="0"  selected="selected">是</option>
        <option value="1" >否</option>
    </select> 
     <SPAN STYLE="color: rgb(255,0,0);"> 大股东是否接受该下级的走飞注单</SPAN> </td></tr>
     <?
    }
   ?>
  <tr>
  <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">走飞:</td>
  <td height="30" bgcolor="#FFFFFF" class="t_edit_td" >
  <input type="radio" name="rpz"  id="rpz" value="0" checked="checked" />允许<input type="radio" name="rpz"  id="rpz" value="1" onClick="StopPZ()"/>禁止</td>
  </tr>
  <?
}
?><tr>
<td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">投注:</td>
<td height="30" bordercolor="#CCCCCC" bgcolor="#FFFFFF" class="t_edit_td">
<input type="radio" name="rty"  id="rty" value="0" checked="checked" />开放投注
<input type="radio" name="rty"  id="rty" value="1" onClick="StopTY()"/>暂停投注</td>
</tr>
<tr>
<td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">大股东占成数:</td>
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
            print "不占成";
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
<td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">股东占成数:</td>
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
            print "不占成";
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
<td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">退水设定:</td>
<td height="30" bordercolor="#CCCCCC" bgcolor="#FFFFFF" class="t_edit_td">
<input type="radio" name="rds"  id="rds" value="0" checked="checked" />全退
<input type="radio" name="rds"  id="rds" value="1" />赚0.1
<input type="radio" name="rds"  id="rds" value="2" />赚0.5
<input type="radio" name="rds"  id="rds" value="3" />赚1
<input type="radio" name="rds"  id="rds" value="4" />赚1.5
<input type="radio" name="rds"  id="rds" value="5" />赚2
<input type="radio" name="rds"  id="rds" value="6" />赚2.5
<input type="radio" name="rds"  id="rds" value="7" />全不退
</td>
</tr>
<tr>
<td height="30" colspan="2" align="center" bgcolor="#FFFFFF" class=""><input type="submit" class="btn1" name="button" id="button" value="确定" />
</td>
</tr>
</table>
</form>
<iframe name="check_frame" src="" width="0" height="0" style="display:none"></iframe></body>
