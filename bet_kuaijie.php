<?php

if ( !defined( "KK_VER" ) )
{
    exit( "无效的访问" );
}
if ( $_GET['class2'] == "" )
{
    echo "<script>alert('非法进入!');parent.main.location.href='main.php?action=bet_tm&uid=".$uid."';window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
    exit( );
}
if ( $ty != 0 )
{
    echo "<script>alert('对不起,您暂时不能下注!');window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
    exit( );
}
$result = $db1->query( "select count(*) from web_agent  where ( kauser='".$dai."' or kauser='".$zong."' or kauser='".$guan."' or kauser='".$dagu."') and ty=1  order by id desc" );
$num = $result->fetch_array();
$num=$num[0];
if ( $num != 0 )
{
    echo "<script>alert('对不起,您暂时不能下注!');window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
    exit( );
}
$class2 = $_GET['class2'];
$rate_id = $_GET['rate_id'];
switch ( $class2 )
{
    case "特A" :
        $XF = 11;
        $urlurl = "main.php?action=bet_tm&uid=".$uid."&ids=特A";
        $numm = 62;
        break;
    case "特B" :
        $XF = 11;
        $numm = 62;
        $urlurl = "main.php?action=bet_tm&uid=".$uid."&ids=特B";
        break;
    case "正A" :
        $XF = 15;
        $urlurl = "main.php?action=bet_zm&uid=".$uid."&ids=正A";
        $numm = 53;
        break;
    case "正B" :
        $XF = 15;
        $numm = 53;
        $urlurl = "main.php?action=bet_zm&uid=".$uid."&ids=正B";
        break;
    case "正1特" :
        $XF = 15;
        $urlurl = "main.php?action=bet_zt&uid=".$uid."&ids=正1特";
        $numm = 49;
        break;
    case "正2特" :
        $XF = 15;
        $urlurl = "main.php?action=bet_zt&uid=".$uid."&ids=正2特";
        $numm = 49;
        break;
    case "正3特" :
        $XF = 15;
        $urlurl = "main.php?action=bet_zt&uid=".$uid."&ids=正3特";
        $numm = 49;
        break;
    case "正4特" :
        $XF = 15;
        $urlurl = "main.php?action=bet_zt&uid=".$uid."&ids=正4特";
        $numm = 49;
        break;
    case "正5特" :
        $XF = 15;
        $urlurl = "main.php?action=bet_zt&uid=".$uid."&ids=正5特";
        $numm = 49;
        break;
    case "正6特" :
        $XF = 15;
        $urlurl = "main.php?action=bet_zt&uid=".$uid."&ids=正6特";
        $numm = 49;
        break;
    case "正码1-6" :
        $XF = 15;
        $urlurl = "main.php?action=bet_zm6&uid=".$uid."&ids=正码1-6";
        $numm = 66;
        break;
    case "半波" :
        $XF = 15;
        $urlurl = "main.php?action=bet_bb&uid=".$uid."&ids=半波";
        $numm = 18;
        break;
    case "尾数" :
        $XF = 15;
        $urlurl = "main.php?action=bet_ws&uid=".$uid."&ids=尾数";
        $numm = 10;
        break;
    case "特肖" :
        $XF = 15;
        $urlurl = "main.php?action=bet_tmsx&uid=".$uid."&ids=特肖";
        $numm = 12;
        break;
    case "一肖" :
        $XF = 15;
        $urlurl = "main.php?action=bet_sx&uid=".$uid."&ids=一肖";
        $numm = 12;
        break;
    default :
        $numm = 0;
        $urlurl = "main.php?action=bet_tm&uid=".$uid."&ids=特A";
        $XF = 11;
        echo "<script>window.open('index.php','_top')</script>";
        echo "</HTML>";
        exit( );
        break;
}
if ( $Current_KitheTable[29] == 0 || $Current_KitheTable[$XF] == 0 )
{
    echo "<script>alert('对不起,该项目已经封盘!');parent.main.location.href='main.php?action=stop&uid=".$uid."&lx=2';window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
    exit( );
}
if ( $rate_id < 0 || $numm < $rate_id || !is_numeric( $rate_id ) )
{
    echo "<script>alert('对不起,系统异常!');window.open('index.php','_top')</script>";
    echo "</HTML>";
    exit( );
}
require_once( "include/member.php" );
$config_ds_temp = get_config_ds( );
$user_ds_temp = get_member_ds( $uid, $username );
$bl_temp = get_bl( $class2 );
$bl_class1 = $bl_temp[$rate_id]['class1'];
$bl_class2 = $bl_temp[$rate_id]['class2'];
$bl_class3 = $bl_temp[$rate_id]['class3'];
$bl_dslb = $bl_temp[$rate_id]['ds_lb'];
$bl_gold = $bl_temp[$rate_id]['gold'];
$bl_xr = $bl_temp[$rate_id]['xr'];
$bl_rate = $bl_temp[$rate_id]['rate'];
$bl_locked = $bl_temp[$rate_id]['locked'];
if ( $bl_locked == 1 )
{
    echo "<script Language=Javascript>alert('对不起,".$bl_class2.":".$bl_class3."号已停押！');parent.main.location.href='".$urlurl."';window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
    exit( );
}
$bl_xx = $user_ds_temp[$bl_dslb]['xx'];
$bl_xxx = $user_ds_temp[$bl_dslb]['xxx'];
switch ( $abcd )
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
$rate0 = round( $bl_rate + $blc, 3 );

?>
<script src="js/function.js" type="text/javascript"></script>
<script src="js/left.js" type="text/javascript"></script>
<SCRIPT language=javascript> 
var uid       = "<?=$uid?>";
var rate_id   = "<?=$rate_id?>";
var bl_gold   = "<?=$bl_gold?>";
var xy        = "<?=$xy?>";
var bl_xr     = "<?=isset( $bl_xr )?intval( $bl_xr ):0?>";
var bl_xx     = "<?=$bl_xx?>";
var bl_xxx    = "<?=$bl_xxx?>";
</script>
<link rel="stylesheet" href="/member/stylesheets/left.css?t=1683715146" type="text/css">
<style>
    span, input, select{
        width: 55%;
    }
</style>
<body>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list" id="dengtai">
<tr>
<td align="center" style="font-size: 12px; font-weight: bold;" >正在下注,请稍候...</td>
</tr>
</table>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list" id="queren" >
    <tbody bgColor="#FFFFFF">
        <tr>
            <td align="center" class="t_list_caption"><b><?=$bl_class1?> 下注确认</b></td>
        </tr>
    </tbody>
</table>    
<form action="main.php?action=bet_save&uid=<?=$uid?>&class2=<?=$class2?>" method="post" name="form1" id="form1" onSubmit="return SubChk()">
    <table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
        <tbody bgColor="#FFFFFF">
				<tr>
                <td width="50%" align="right">会员账号</td>
                <td width="50%" id="userLoginID" align="center"><?= $username ?></td>
                </tr>
                <tr>
                    <td width="50%" align="right">信用额度：</td>
                    <td width="50%" id="userMoney" align="center" style="font-weight: bold;">￥<?= $cs ?></td>
                </tr>
                <tr>
                    <td colspan="2" class="tdpadding" align="center"><span id="qishu" class="qishu">期数<?= $Current_Kithe_Num ?></span>
                    </td>
                </tr>
                <tr>
                    <td id="number" align="center" class="tdxianxi1" style="font-weight: bold;font-size: 14px; letter-spacing: 3px;" colspan="2">
                        <?= $bl_class3 ?></td>
                </tr>
             </tbody>
        </table>

        <table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
            <tbody bgColor="#ffffff" align="center">
                <tr>
                    <td colspan="2" class="tdxianxi1"></td>
                </tr>
                <tr align="center">
                    <td id="peilv" colspan="2" class="tdxianxi1">赔率：<font color='red'><?= $rate0 ?></font><input name="rate_<?= $rate_id ?>"
                            type="hidden" value="<?= $rate0 ?>" /></td>
                </tr>
                <tr align="center">
                    <td id="leixing" colspan="2" class="tdxianxi1">类型：<?= $bl_class2 ?>-<?= $bl_class3 ?></td>
                </tr>
                <tr>
                    <td align="center" colspan="2">
                        <span>下注金额：</span>
                        <span><input name="Num_<?= $rate_id ?>" type="text" onkeyup="value=value.replace(/[^\d\.\/]/ig,'');AddMoney(0);"
                            value="" /></span</td>
            
                </tr>
                
                <tr>
                    <td colspan="2">
                        <input type="button" value="10" onClick="AddMoney(10)" class="btn3" />&nbsp;
                        <input type="button" value="100" onClick="AddMoney(100)" class="btn3" />&nbsp;
                        <input type="button" value="500" onClick="AddMoney(500)" class="btn3" />&nbsp;
                        <input type="button" value="1K" onClick="AddMoney(1000)" class="btn3" />&nbsp;
                        <input type="button" value="清零" onClick="DiffMoney()" class="btn2" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="padding-top:4px; padding-bottom: 4px; border-bottom: 1px #808080 solid;">
                        <input type="button" name="btnClear" value="返回" id="btnClear"
                            onClick="javascript:location.href='main.php?action=mem_left&uid=<?= $uid ?>'" class="btn2" /> &nbsp;&nbsp;
                        <input type="submit" name="btnsave" value="下注" id="btnsave" class="btn1 submit1" />
                    </td>
                </tr>
                <tr>
                    <td align="right">可赢金额：</td>
                    <td id="keying" style="color: Red;" align="left">0</td>
                </tr>
                <tr>
                    <td align="right">最低限额：</td>
                    <td id="zuidi" align="left"><?= $xy ?></td>
                </tr>
                <tr>
                    <td align="right">单注限额：</td>
                    <td id="danzhu" align="left"><?= $bl_xx ?></td>
                </tr>
                <tr>
                    <td align="right">单项限额：</td>
                    <td id="danxiang" align="left"><?= $bl_xxx ?></td>
                </tr>
                <tr>
                    <td align="right">可用信用：</td>
                    <td id="yiyong" align="left">￥<?= $ts ?></td>
                </tr>
                </tbody>
                </table>
                </form>
                    
                <table align="center" cellpadding="0px" cellspacing="0px" style="margin-top: 6px;">
                    <tbody bgColor="#FFFFFF">
                        <tr>
                            <td style="line-height:20px; height:20px;" colspan="3">
                                <span id="daojishi" style="width: 20px; line-height:20px; height:20px;">60</span>
                                <span style="line-height:20px; height:20px;">秒后自动返回</span>
                        </tr>
                    </tbody>
                </table>
<script>daojishi();</script>
</body>


