<?php

if ( !defined( "KK_VER" ) )
{
    exit( "��Ч�ķ���" );
}
if ( $_GET['class2'] == "" )
{
    echo "<script>alert('�Ƿ�����!');parent.main.location.href='main.php?action=bet_tm&uid=".$uid."';window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
    exit( );
}
if ( $ty != 0 )
{
    echo "<script>alert('�Բ���,����ʱ������ע!');window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
    exit( );
}
$result = $db1->query( "select count(*) from web_agent  where ( kauser='".$dai."' or kauser='".$zong."' or kauser='".$guan."' or kauser='".$dagu."') and ty=1  order by id desc" );
$num = $result->fetch_array();
$num=$num[0];
if ( $num != 0 )
{
    echo "<script>alert('�Բ���,����ʱ������ע!');window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
    exit( );
}
$class2 = $_GET['class2'];
$rate_id = $_GET['rate_id'];
switch ( $class2 )
{
    case "��A" :
        $XF = 11;
        $urlurl = "main.php?action=bet_tm&uid=".$uid."&ids=��A";
        $numm = 62;
        break;
    case "��B" :
        $XF = 11;
        $numm = 62;
        $urlurl = "main.php?action=bet_tm&uid=".$uid."&ids=��B";
        break;
    case "��A" :
        $XF = 15;
        $urlurl = "main.php?action=bet_zm&uid=".$uid."&ids=��A";
        $numm = 53;
        break;
    case "��B" :
        $XF = 15;
        $numm = 53;
        $urlurl = "main.php?action=bet_zm&uid=".$uid."&ids=��B";
        break;
    case "��1��" :
        $XF = 15;
        $urlurl = "main.php?action=bet_zt&uid=".$uid."&ids=��1��";
        $numm = 49;
        break;
    case "��2��" :
        $XF = 15;
        $urlurl = "main.php?action=bet_zt&uid=".$uid."&ids=��2��";
        $numm = 49;
        break;
    case "��3��" :
        $XF = 15;
        $urlurl = "main.php?action=bet_zt&uid=".$uid."&ids=��3��";
        $numm = 49;
        break;
    case "��4��" :
        $XF = 15;
        $urlurl = "main.php?action=bet_zt&uid=".$uid."&ids=��4��";
        $numm = 49;
        break;
    case "��5��" :
        $XF = 15;
        $urlurl = "main.php?action=bet_zt&uid=".$uid."&ids=��5��";
        $numm = 49;
        break;
    case "��6��" :
        $XF = 15;
        $urlurl = "main.php?action=bet_zt&uid=".$uid."&ids=��6��";
        $numm = 49;
        break;
    case "����1-6" :
        $XF = 15;
        $urlurl = "main.php?action=bet_zm6&uid=".$uid."&ids=����1-6";
        $numm = 66;
        break;
    case "�벨" :
        $XF = 15;
        $urlurl = "main.php?action=bet_bb&uid=".$uid."&ids=�벨";
        $numm = 18;
        break;
    case "β��" :
        $XF = 15;
        $urlurl = "main.php?action=bet_ws&uid=".$uid."&ids=β��";
        $numm = 10;
        break;
    case "��Ф" :
        $XF = 15;
        $urlurl = "main.php?action=bet_tmsx&uid=".$uid."&ids=��Ф";
        $numm = 12;
        break;
    case "һФ" :
        $XF = 15;
        $urlurl = "main.php?action=bet_sx&uid=".$uid."&ids=һФ";
        $numm = 12;
        break;
    default :
        $numm = 0;
        $urlurl = "main.php?action=bet_tm&uid=".$uid."&ids=��A";
        $XF = 11;
        echo "<script>window.open('index.php','_top')</script>";
        echo "</HTML>";
        exit( );
        break;
}
if ( $Current_KitheTable[29] == 0 || $Current_KitheTable[$XF] == 0 )
{
    echo "<script>alert('�Բ���,����Ŀ�Ѿ�����!');parent.main.location.href='main.php?action=stop&uid=".$uid."&lx=2';window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
    exit( );
}
if ( $rate_id < 0 || $numm < $rate_id || !is_numeric( $rate_id ) )
{
    echo "<script>alert('�Բ���,ϵͳ�쳣!');window.open('index.php','_top')</script>";
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
    echo "<script Language=Javascript>alert('�Բ���,".$bl_class2.":".$bl_class3."����ͣѺ��');parent.main.location.href='".$urlurl."';window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
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
<td align="center" style="font-size: 12px; font-weight: bold;" >������ע,���Ժ�...</td>
</tr>
</table>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list" id="queren" >
    <tbody bgColor="#FFFFFF">
        <tr>
            <td align="center" class="t_list_caption"><b><?=$bl_class1?> ��עȷ��</b></td>
        </tr>
    </tbody>
</table>    
<form action="main.php?action=bet_save&uid=<?=$uid?>&class2=<?=$class2?>" method="post" name="form1" id="form1" onSubmit="return SubChk()">
    <table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
        <tbody bgColor="#FFFFFF">
				<tr>
                <td width="50%" align="right">��Ա�˺�</td>
                <td width="50%" id="userLoginID" align="center"><?= $username ?></td>
                </tr>
                <tr>
                    <td width="50%" align="right">���ö�ȣ�</td>
                    <td width="50%" id="userMoney" align="center" style="font-weight: bold;">��<?= $cs ?></td>
                </tr>
                <tr>
                    <td colspan="2" class="tdpadding" align="center"><span id="qishu" class="qishu">����<?= $Current_Kithe_Num ?></span>
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
                    <td id="peilv" colspan="2" class="tdxianxi1">���ʣ�<font color='red'><?= $rate0 ?></font><input name="rate_<?= $rate_id ?>"
                            type="hidden" value="<?= $rate0 ?>" /></td>
                </tr>
                <tr align="center">
                    <td id="leixing" colspan="2" class="tdxianxi1">���ͣ�<?= $bl_class2 ?>-<?= $bl_class3 ?></td>
                </tr>
                <tr>
                    <td align="center" colspan="2">
                        <span>��ע��</span>
                        <span><input name="Num_<?= $rate_id ?>" type="text" onkeyup="value=value.replace(/[^\d\.\/]/ig,'');AddMoney(0);"
                            value="" /></span</td>
            
                </tr>
                
                <tr>
                    <td colspan="2">
                        <input type="button" value="10" onClick="AddMoney(10)" class="btn3" />&nbsp;
                        <input type="button" value="100" onClick="AddMoney(100)" class="btn3" />&nbsp;
                        <input type="button" value="500" onClick="AddMoney(500)" class="btn3" />&nbsp;
                        <input type="button" value="1K" onClick="AddMoney(1000)" class="btn3" />&nbsp;
                        <input type="button" value="����" onClick="DiffMoney()" class="btn2" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="padding-top:4px; padding-bottom: 4px; border-bottom: 1px #808080 solid;">
                        <input type="button" name="btnClear" value="����" id="btnClear"
                            onClick="javascript:location.href='main.php?action=mem_left&uid=<?= $uid ?>'" class="btn2" /> &nbsp;&nbsp;
                        <input type="submit" name="btnsave" value="��ע" id="btnsave" class="btn1 submit1" />
                    </td>
                </tr>
                <tr>
                    <td align="right">��Ӯ��</td>
                    <td id="keying" style="color: Red;" align="left">0</td>
                </tr>
                <tr>
                    <td align="right">����޶</td>
                    <td id="zuidi" align="left"><?= $xy ?></td>
                </tr>
                <tr>
                    <td align="right">��ע�޶</td>
                    <td id="danzhu" align="left"><?= $bl_xx ?></td>
                </tr>
                <tr>
                    <td align="right">�����޶</td>
                    <td id="danxiang" align="left"><?= $bl_xxx ?></td>
                </tr>
                <tr>
                    <td align="right">�������ã�</td>
                    <td id="yiyong" align="left">��<?= $ts ?></td>
                </tr>
                </tbody>
                </table>
                </form>
                    
                <table align="center" cellpadding="0px" cellspacing="0px" style="margin-top: 6px;">
                    <tbody bgColor="#FFFFFF">
                        <tr>
                            <td style="line-height:20px; height:20px;" colspan="3">
                                <span id="daojishi" style="width: 20px; line-height:20px; height:20px;">60</span>
                                <span style="line-height:20px; height:20px;">����Զ�����</span>
                        </tr>
                    </tbody>
                </table>
<script>daojishi();</script>
</body>


