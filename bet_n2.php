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
$num1 = $result->fetch_array();
$num = $num1[0];
if ( $num != 0 )
{
    echo "<script>alert('�Բ���,����ʱ������ע!');window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
    exit( );
}
$class2 = $_GET['class2'];
$sum_sum = $_POST['Num_1'];
switch ($class2) {
    case "��Ф":
        $XF = 15;
        $urlurl = "main.php?action=bet_sx6&uid=" . $uid . "&ids=��Ф";
        $numm = 12;
        $bl_dslb = "SX6";
        $type_max = 6;
        $type_min = 6;
        break;
    default:
        $numm = 0;
        $urlurl = "main.php?action=bet_tm&uid=" . $uid . "&ids=��A";
        $XF = 11;
        echo  "<script>window.open('index.php', '_top')</script></HTML>";
         exit();
        break;
}
if ( $Current_KitheTable[29] == 0 || $Current_KitheTable[$XF] == 0 )
{
    echo "<script>alert('�Բ���,����Ŀ�Ѿ�����!');parent.main.location.href='main.php?action=stop&uid=".$uid."&lx=2';window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
    exit( );
}
if ( $sum_sum < 0 || $sum_sum == "" || !is_numeric( $sum_sum ) )
{
    echo "<script>alert('�Բ���,ϵͳ�쳣!');window.open('index.php','_top')</script></HTML>";
    exit( );
}
require_once "include/member.php";
$config_ds_temp = get_config_ds();
$user_ds_temp = get_member_ds($uid, $username);
$bl_temp = get_bl($class2);
$bl_xx = $user_ds_temp[$bl_dslb]['xx'];
$bl_xxx = $user_ds_temp[$bl_dslb]['xxx'];
$rate0 = 0;
$sum_count = 0;
$rate_temp = 8888888;
$class1_temp = $class2_temp = $class3_temp = $text1 = "";
if ( $sum_sum < $xy )
{
    echo "<script Language=Javascript>alert('�Բ���,����޶�Ϊ".$xy."Ԫ��');parent.main.location.href='".$urlurl."';window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
    exit( );
}
if ( $bl_xx < $sum_sum )
{
    echo "<script Language=Javascript>alert('�Բ���,��ע������ע".$bl_xx."Ԫ��');parent.main.location.href='".$urlurl."';window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
    exit( );
}
$result2 = $db1->query("select SUM(sum_m) As sum_umax from web_tan where Kithe='" . $Current_Kithe_Num . "' and  class2='" . $class2 . "' and username='" . $username . "'");
$rs5 = $result2->fetch_assoc();
if ($rs5['sum_umax'] == "") {
    $sum_umax = 0;
} else {
    $sum_umax = $rs5['sum_umax'];
}
if ($bl_xxx < $sum_sum + $sum_umax) {
     echo "<script Language=Javascript>alert('�Բ���,�����ۼ���ע���:".$sum_umax."Ԫ\\n��ע��������".$bl_xxx."Ԫ��');parent.main.location.href='".$urlurl."';window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
    exit( );
}
$r = 1;
for (; $r <= $numm; ++$r) {
    $temename = "num" . $r;
    if (isset($_POST[$temename])) {
        $sum_count += 1;
        $bl_locked = $bl_temp[$r]['locked'];
        if ($bl_locked == 1) {
            echo "<script Language=Javascript>alert('�Բ���,".$class2."[".$bl_temp[$r]['class3']."]��ͣѺ��');parent.main.location.href='".$urlurl."';window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
            exit( );
        } else {
            $class1_temp = $bl_temp[$r]['class1'];
            $class2_temp = $bl_temp[$r]['class2'];
            $class3_temp .= $r . ",";
            $text1 .= $bl_temp[$r]['class3'] . ",";
            if ($bl_temp[$r]['rate'] < $rate_temp) {
                $rate_temp = $bl_temp[$r]['rate'];
            }
        }
    }
}
if ( $sum_count < $type_min )
{
    echo "<script Language=Javascript>alert('����ѡ��".$type_min."����Ф�����!��');parent.main.location.href='".$urlurl."';window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
    exit( );
}
if ( $type_max < $sum_count )
{
    echo "<script Language=Javascript>alert('���ѡ��".$type_max."����Ф�����!��');parent.main.location.href='".$urlurl."';window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
    exit( );
}
$bl_class1 = $class1_temp;
$bl_class2 = $class2_temp;
$bl_class3 = $class3_temp;
$bl_rate = $rate_temp;
switch ($abcd) {
    case "A":
        $blc = 0;
        break;
    case "B":
        $blc = $config_ds_temp[$bl_dslb]['blcb'];
        break;
    case "C":
        $blc = $config_ds_temp[$bl_dslb]['blcc'];
        break;
    case "D":
        $blc = $config_ds_temp[$bl_dslb]['blcd'];
        break;
    default:
        $blc = 0;
        break;
}
$rate0 = round($bl_rate + $blc, 3);
?>
 <script src="js/function.js" type="text/javascript"></script>
 <script src="js/left.js" type="text/javascript"></script>
 <script language=javascript> 
    var uid = "<?=$uid?>";
    var xy = "<?=$xy?> ";
    var bl_xr = "<?=isset($bl_xr) ? intval($bl_xr) : 0 ?>";
    var bl_xx = " <?=$bl_xx?> ";
    var bl_xxx = " <?=$bl_xxx?> ";
</script>
<link rel="stylesheet" href="/member/stylesheets/main.css?t=1545056559" type="text/css">
<body>
    <table border="0" id="dengtai" cellpadding="0" cellspacing="0"
        style="text-align: center;margin-top: 60px; display: none;">
        <tr>
            <td align="center" style="font-size: 12px; font-weight: bold;"> ������ע,���Ժ�...
            </td>
        </tr>
    </table>
    <table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list" id="queren">
        <tbody bgcolor="#FFFFFF">
            <tr>
            <td align="center" class="t_list_caption"> <b><?=$bl_class1?>��עȷ��</b> </td>
        </tr>
        </tbody>
    </table>

    <form action="main.php?action=bet_save_n2&uid=<?=$uid?>&class2=<?=$class2?>" method="post" name="form1" id="form1" onSubmit="return LMSubChk()">
    <table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
    <tbody bgcolor="#FFFFFF">
                            <tr>
                                <td width="50%" align="right"> ��Ա�˺ţ� </td>
                                <td width="50%" align="left" id="userLoginID"><?=$username?></td>
                            </tr>
                            <tr>
                            <td width="50%" align="right"> ���ö�ȣ� </td>
                            <td width="50%" align="left" id="userMoney" style="font-weight: bold;">��<?=$cs?></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="tdpadding" align="center"><span id="qishu" class="qishu">����<?=$Current_Kithe_Num?></span>
                                        <table border="0" cellpadding="0" cellspacing="0" width="90%" style="margin-top: 4px;text-align: center;">
                                            <tr>
                                                <td id="leixing" colspan="2" ><?=$bl_class1?>-<?=$bl_class2?></td>
                                            </tr>
                                            <tr>
                                                <td id="peilv" colspan="2" >���ʣ�<font color='red'><?=$rate0?></font>
                                                	<input name="rate_1" type="hidden" value="<?=$rate0?>" /></td>
                                            </tr>
                                            <tr>
                                                <td id="number" colspan="2"  style="word-break: break-all;"><?=$text1?></td>
                                            </tr>
                                            <tr>
                                                <td id="numbersum" colspan="2" >�� 1 ��</td>
                                            </tr>
                                            <tr>
                                                <td id="sum" colspan="2" >��ע��
                                                    <br>ÿ��<?=$sum_sum?>/�ܹ�<?=$sum_sum?>
                                                    <input name="Num_1" type="hidden" value="<?=$sum_sum?>" />
                                                    <input name="Num_dan" type="hidden" value="<?=$sum_sum?>" /> 
                                                    <input name="ioradio" type="hidden" value="1" /> 
                                                    <input type="hidden" value="<?=$bl_class3?>" name="number" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td id="oddsmess" colspan="2" style="color: Red; display: none;white-space:nowrap;" class="tdxianxi1"> </td> 
                                            </tr>
                                        </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"  align="center" style="padding-top:4px; padding-bottom: 4px; border-top: 1px #808080 solid;border-bottom: 1px #808080 solid;">
                                    <input type="button" name="btnClear" value="����" id="btnClear" onClick="javascript:location.href='main.php?action=mem_left&uid=<?=$uid?>'" class="btn2" /> &nbsp;&nbsp; 
                                    <input type="submit" name="btnsave" value="��ע" id="btnsave" class="btn1 submit1" /> 
                                </td>
                            </tr>
                            <tr>
                                <td align="right">��Ӯ��</td>
                                <td id="keying" style="color: Red;" align="left"><?=$sum_sum * $rate0?></td>
                            </tr>
                            <tr>
                                <td align="right"> ����޶ </td>
                                <td id="zuidi" align="left"><?=$xy?></td>
                            </tr>
                            <tr >
                                <td align="right"> ��ע�޶ </td>
                                <td id="danzhu" align="left"><?=$bl_xx?></td>
                            </tr>
                            <tr >
                                <td align="right"> �����޶ </td>
                                <td id="danxiang" align="left"><?=$bl_xxx?></td>
                            </tr>
                            <tr>
                                <td align="right"> �������ã� </td>
                                <td id="yiyong" align="left">��<?=$ts?></td>
                            </tr>
                            <tr>
                            <td colspan="2" align="center">
                                <span d="daojishi" style="width: 20px; line-height:20px; height:20px;">60 </span>
                                <span style="line-height:20px; height:20px;">����Զ�����</span>
                            </td>   
                        </tr>
                        </tbody>
                        </table>
                    </form>
                </td>
            </tr>
        </table>
    <script>daojishi();</script>
</body>