<?php
if (!defined("KK_VER"))
{
    exit("无效的访问");
}
if ($_GET['class2'] == "")
{
    echo "<script>alert('非法进入!');parent.main.location.href='main.php?action=bet_tm&uid=".$uid."';window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
    exit();
}
if ($ty != 0)
{
    echo "<script>alert('对不起,您暂时不能下注!');window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
    exit();
}
$result = $db1->query("select count(*) from web_agent  where (kauser='".$dai."' or kauser='".$zong."' or kauser='".$guan."' or kauser='".$dagu."') and ty=1  order by id desc");
$num1 = $result->fetch_array();
$num=$num1[0];
if ($num != 0)
{
    echo "<script>alert('对不起,您暂时不能下注!');window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
    exit();
}
$class2 = $_GET['class2'];
switch ($class2)
{
    case "特A" :
        $XF = 11;
        $bl_dslb = "TMA";
        $urlurl = "main.php?action=bet_tm&uid=".$uid."&ids=特A";
        break;
    case "特B" :
        $XF = 11;
        $bl_dslb = "TMB";
        $urlurl = "main.php?action=bet_tm&uid=".$uid."&ids=特B";
        break;
    case "正A" :
        $XF = 15;
        $bl_dslb = "ZMA";
        $urlurl = "main.php?action=bet_zm&uid=".$uid."&ids=正A";
        break;
    case "正B" :
        $XF = 15;
        $bl_dslb = "ZMB";
        $urlurl = "main.php?action=bet_zm&uid=".$uid."&ids=正B";
        break;
    case "正1特" :
        $XF = 15;
        $bl_dslb = "ZT";
        $urlurl = "main.php?action=bet_zt&uid=".$uid."&ids=正1特";
        break;
    case "正2特" :
        $XF = 15;
        $bl_dslb = "ZT";
        $urlurl = "main.php?action=bet_zt&uid=".$uid."&ids=正2特";
        break;
    case "正3特" :
        $XF = 15;
        $bl_dslb = "ZT";
        $urlurl = "main.php?action=bet_zt&uid=".$uid."&ids=正3特";
        break;
    case "正4特" :
        $XF = 15;
        $bl_dslb = "ZT";
        $urlurl = "main.php?action=bet_zt&uid=".$uid."&ids=正4特";
        break;
    case "正5特" :
        $XF = 15;
        $bl_dslb = "ZT";
        $urlurl = "main.php?action=bet_zt&uid=".$uid."&ids=正5特";
        break;
    case "正6特" :
        $XF = 15;
        $bl_dslb = "ZT";
        $urlurl = "main.php?action=bet_zt&uid=".$uid."&ids=正6特";
        break;
    default :
        $urlurl = "main.php?action=bet_tm&uid=".$uid."&ids=特A";
        $XF = 11;
        echo "<script>window.open('index.php','_top')</script>";
        echo "</HTML>";
        exit();
        break;
}
if ($Current_KitheTable[29] == 0 || $Current_KitheTable[$XF] == 0)
{
    echo "<script>alert('对不起,该项目已经封盘!');parent.main.location.href='main.php?action=stop&uid=".$uid."&lx=2';window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
    exit();
}
$number_array = array();
$t = 1;
for ($t = 1; $t <= 49; $t++)
{
    $number_array[$t] = 0;
}
$numbersAll = $_POST['numbersAll'];
$numbersAllcount = count($numbersAll);
            echo "<script Language=Javascript>alert('对不起,".$numbersAll."';</script>";
$numbers_temp = "";
$num_temp = 0;
$money_temp = 0;
$i = 0;
for ($i = 0 ; $i < $numbersAllcount; $i++)
{
    $numbers_temp = $numbersAll[$i];
    if ($numbers_temp != "")
    {
        $money_temp = $_POST["moneyna".$numbers_temp];
        $num_temp = explode("_", $numbers_temp);
        $numbers_temp = $num_temp[0];
        $number_array[$numbers_temp] = $money_temp;
    }
}
require_once("include/member.php");
$config_ds_temp = get_config_ds();
$user_ds_temp = get_member_ds($uid, $username);
$bl_temp = get_bl($class2);
?>
<script language="javascript" type="text/javascript">
strnumbers = '';
</script>
<script src="js/function.js" type="text/javascript"></script>
<link rel="stylesheet" href="/member/stylesheets/main.css?t=1545056559" type="text/css">
<body>
<table border="0" id="dengtai" cellpadding="0" cellspacing="0" style="text-align: center;margin-top: 60px; display: none;">
	<tr>
		<td align="center" style="font-size: 12px; font-weight: bold;">正在下注,请稍候...</td>
	</tr>
</table>
<div align="center" class="lefttopmargin">
<table id="queren" border="0" cellpadding="0" cellspacing="0" class="lefttable" style="text-align: center;">
<tr>
<td valign="top">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
<td class="toptabletop">
<table width="100%" height="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td align="center"><b>下注确认</b></td>
	</tr>
</table>
</td>
</tr>
</table>
<form action="main.php?action=bet_save&uid=<?=$uid?>&class2=<?=$class2?>" method="post" name="form1" id="form1" >
<table class="lefttableborder" border="0" cellpadding="0" cellspacing="0" width="100%" id="showtable1">
<tr>
<td class="toptablebody">
<table cellpadding="0" cellspacing="0" width="100%" class="toptable1">
<tr class="background">
<td>类型</td>
<td>内容</td>
<td>赔率</td>
<td>金额</td>
</tr>
<?
$numm = 49;
$sum_sum = 0;
$sum_count = 0;
$r = 1;
for ($r = 1; $r <= $numm; $r++)
{
?>
<input name="Num_<?=$r?>" type="hidden" value="<?=$number_array[$r]?>" />
 <?  
 if ($number_array[$r] != "" && $number_array[$r] != 0)
    {
        if ($number_array[$r] < $xy)
        {
            echo "<script Language=Javascript>alert('对不起,最低限额为".$xy."元！');parent.main.location.href='".$urlurl."';window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
            exit();
        }
        $sum_count++;
        $sum_sum += $number_array[$r];
        $bl_class1 = $bl_temp[$r]['class1'];
        $bl_class2 = $bl_temp[$r]['class2'];
        $bl_class3 = $bl_temp[$r]['class3'];
        $bl_dslb = $bl_temp[$r]['ds_lb'];
        $bl_gold = $bl_temp[$r]['gold'];
        $bl_xr = $bl_temp[$r]['xr'];
        $bl_rate = $bl_temp[$r]['rate'];
        $bl_locked = $bl_temp[$r]['locked'];
        if ($bl_locked == 1)
        {
            echo "<script Language=Javascript>alert('对不起,".$bl_class2.":".$bl_class3."号已停押！');parent.main.location.href='".$urlurl."';window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
            exit();
        }
        if (($bl_class2 == "特A" || $bl_class2 == "特B") && $bl_xr < $bl_gold + $number_array[$r])
        {
            echo "<script Language=Javascript>alert('对不起,".$bl_class2.":".$bl_class3."号已停押！');parent.main.location.href='".$urlurl."';window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
            exit();
        }
        $result2 = $db1->query("select SUM(sum_m) As sum_umax from web_tan where Kithe='".$Current_Kithe_Num."' and class1='".$bl_class1."' and  class2='".$bl_class2."' and class3='".$bl_class3."' and username='".$username."'");
        $rs5 = $result2->fetch_assoc();
        if ($rs5['sum_umax'] == "")
        {
            $sum_umax = 0;
        }
        else
        {
            $sum_umax = $rs5['sum_umax'];
        }
        if ($user_ds_temp[$bl_dslb]['xxx'] < $sum_umax + $number_array[$r])
        {
            echo "<script Language=Javascript>alert('对不起,".$bl_class2.":".$bl_class3."号总下注超过单项".$user_ds_temp[$bl_dslb]['xxx']."元！');parent.main.location.href='".$urlurl."';window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
            exit();
        }
        if ($user_ds_temp[$bl_dslb]['xx'] < $number_array[$r])
        {
            echo "<script Language=Javascript>alert('对不起,".$bl_class2.":".$bl_class3."号总下注超过单注".$user_ds_temp[$bl_dslb]['xx']."元！');parent.main.location.href='".$urlurl."';window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
            exit();
        }
        switch ($abcd)
        {
            case "A" :
                $blc = 0;
                break;
            case "B" :
                $blc = $config_ds_temp[$bl_dslb]['blcb'];
                break;
            case "C" :
                $blc = $config_ds_temp[$bl_dslb]['blcc'];
                break;
            case "D" :
                $blc = $config_ds_temp[$bl_dslb]['blcd'];
                break;
            default :
                $blc = 0;
                break;
		}
                $rate0 = round($bl_rate + $blc, 3);
      ?>
       <tr>
       	<td><?=$bl_class2?></td>
       	<td><?=$bl_class3?></td>
       	<td><?=$rate0?><input name="rate_<?=$r?>" type="hidden" value="<?=$rate0?>" /></td>
       	<td><?=$number_array[$r]?>
<script type="text/javascript">
            strnumbers +="<?=$bl_class2?>"+" "+"<?=$bl_class3?>"+" @ "+"<?=$rate0?>"+"×￥"+"<?=$number_array[$r]?>"+"  "+"<?=$sum_count?>"+"\r\n";
            strnumbers +=((indexindex+1)%2!=0)?'\\r\\n':'';
</script>
</td>
</tr>
<?
            
		}
	}
            if ($ts < $sum_sum)
            {
                echo "<script Language=Javascript>alert('对不起,下注总额大于可用信用额：".$ts."!!');parent.main.location.href='".$urlurl."';window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
                exit();
            }
?> 
<tr class="background">
	<td colspan="4" align="right">共 <b id="sum"><?=$sum_count?></b> 注 合计: <b id="summoney"><?=$sum_sum?></b> &nbsp;&nbsp;</td>
</tr>
</table>
<script type="text/javascript">
var tempstrstr = '共<?=$sum_count?>注 合计:<?=$sum_sum?>，确定下注吗？';
strnumbers = tempstrstr + '\r\n' + strnumbers;
</script>
</td>
</tr>
</table>
</form>
</td>
</tr>
<tr>
<td style="padding-top: 8px; padding-bottom: 4px; display:none;">
<input type="button" name="btnClear" value="返回" id="btnClear" onClick="javascript:location.href='main.php?action=mem_left&uid=<?=$uid?>'"  class="btn2" />&nbsp;&nbsp;
<input type="submit" name="btnsave" value="确定下注" id="btnsave" class="btn1 submit queding" />
</td>
</tr>
</table>
<script language="JavaScript" type="text/javascript">
	Chk2Submit(strnumbers)
function Chk2Submit(cfstr){
	//设定『确定下注』按钮为禁止 
	if(!window.confirm(cfstr)){
		$("btnsave").disabled = false;
		window.location.href='main.php?action=mem_left&uid=<?=$uid?>';
		return false;
		}  
	$("btnsave").disabled = true;
	$("queren").style.display = 'none';
	$("dengtai").style.display ='block';
	document.form1.submit();
	} 
	</script>
	</div></body>
    


