<?php

if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
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
$result = $db1->query("select count(*) from web_agent  where ( kauser='" . $dai . "' or kauser='" . $zong . "' or kauser='" . $guan . "' or kauser='" . $dagu . "') and ty=1  order by id desc");
$num1 = $result->fetch_array();
$num = $num[0];
if ($num != 0) {
     echo "<script>alert('�Բ���,����ʱ������ע!');window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
    exit( );
    }
    $ggwinsum = get_config("ggwinsum");
    $XF = 15;
    $class2 = "����";
    $bl_dslb = "GG";
    $urlurl = "main.php?action=bet_gg&uid=" . $uid . "&ids=����";
    $numm = 42;
if ($Current_KitheTable[29] == 0 || $Current_KitheTable[$XF] == 0) {
    echo "<script>alert('�Բ���,����Ŀ�Ѿ�����!');parent.main.location.href='main.php?action=stop&uid=".$uid."&lx=2';window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
    exit( );
}
require_once "include/member.php";
$config_ds_temp = get_config_ds();
$user_ds_temp = get_member_ds($uid, $username);
$bl_temp = get_bl($class2);
$bl_xx = $user_ds_temp[$bl_dslb]['xx'];
$bl_xxx = $user_ds_temp[$bl_dslb]['xxx'];
$result2 = $db1->query("select SUM(sum_m) As sum_umax from web_tan where Kithe='" . $Current_Kithe_Num . "' and  class1='" . $class2 . "' and username='" . $username . "'");
$rs5 = $result2->fetch_assoc();
if ($rs5['sum_umax'] == "") {
    $sum_umax = 0;
} else {
    $sum_umax = $rs5['sum_umax'];
}
$bl_gold = $sum_umax;
?>
<script src="js/function.js" type="text/javascript"></script>
<script src="js/left.js" type="text/javascript"></script>
<script language="javascript">
var uid       = "<?=$uid?>";
var rate_id = 1;
var bl_gold = "<?=$bl_gold?>";
var xy = "<?=$xy?>";
var bl_xr = "<?=$bl_xxx?>" - bl_gold;
var bl_xx = "<?=$bl_xx?>";
var bl_xxx = "<?=$bl_xxx?>";
var ggwinsum = "<?=$ggwinsum?>";
</script>
<link rel="stylesheet" href="/member/stylesheets/left.css?t=1683715146" type="text/css">
<body>
    <table border="0" id="dengtai" cellpadding="0" cellspacing="0" style="text-align: center;margin-top: 60px; display: none;">
        <tr>
            <td align="center" style="font-size: 12px; font-weight: bold;"> ������ע,���Ժ�..
            </td>
        </tr>
    </table>
    <form action="main.php?action=bet_save_n3&uid=<?= $uid ?>&class2=<?= $class2 ?>" method="post" name="form1"
        id="form1" onSubmit="return GGSubChk()">
        <table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
            <tbody bgcolor="#ffffff">
                <Tr>
                    <td colspan="2" align="center" class="t_list_caption">��Ա��Ϣ��</td>
                </Tr>
                <tr>
                    <td width="50%" align="right"> ��Ա�˺ţ�</td>
                    <td width="50%" id="userLoginID" align="center"><?= $username ?>
                    </td>
                </tr>
                <tr>
                    <td width="50%" align="right"> ���ö�ȣ� </td>
                    <td width="50%" id="userMoney" align="center" style="font-weight: bold;">��<?= $cs ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list" id="queren">
            <tbody bgcolor="#ffffff">
                <tr>
                    <td align="center"> <b><?= $class2 ?>��עȷ��</b> </td>
                </tr>
            </tbody>
        </table>
        <Br>
        <table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
            <tbody bgColor="#ffffff" align="center">
                <tr>
                    <td colspan="3" align="center" class="t_list_caption">
                        <span id="qishu" >����<?= $Current_Kithe_Num ?></span>
                    </td>
                </tr>
                <tr>
                 <td id="number" colspan="3" align="center" style="font-weight:bold;font-size: 14px; letter-spacing: 3px;">
                        <? $z = 0;
                        $rate1 = 1;
                        $t = 1;
                        for (; $t <= 18; $t += 1) {
                            $temename = $_POST["game" . $t];
                            if (isset($temename) && $temename != "" && 1 <= $temename && $temename <= $numm && $z < 9) {
                                $z += 1;
                                $bl_class2 = $bl_temp[$temename]['class2'];
                                $bl_class3 = $bl_temp[$temename]['class3'];
                                $bl_rate = $bl_temp[$temename]['rate'];
                                $rate_id = $temename;
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
                                $rate1 = round($rate1 * $rate0, 3);
                                ?>
                                <?= $bl_class2 ?>&nbsp;<?= $bl_class3 ?>:<?= $rate0 ?>
                                <input type=hidden value="<?= $rate_id ?>" name="game_<?= $t ?>"><br>
                            <? }
                        }
                        if ($z < 1) {
                            echo "<script Language=Javascript>alert('����ѡ��2��!��');parent.main.location.href='" . $urlurl . "';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
                            exit();
                        }
                        if (9 < $z) {
                            echo "<script Language=Javascript>alert('���ѡ��9��!��');parent.main.location.href='" . $urlurl . "';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
                            exit();
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class="tdxianxi1">
                    </td>
                </tr>
                <tr>
                    <td id="peilv" colspan="3" class="tdxianxi1">���ʣ�<font color='red'>
                            <?= $rate1 ?>
                        </font> <input name="rate_1" type="hidden" value="<?= $rate1 ?>" /></td>
                </tr>
                <tr>
                    <td id="leixing" colspan="3" class="tdxianxi1">�������ͣ�<?= $z ?>��1</td>
                </tr>
                <tr>
                    <td colspan="3" class="tdxianxi1">
                    <span style="width: 70px;">��ע�� </span>
                    <span style="border-top: 1px #808080 solid; text-align: left;"><input name="Num_1" type="text" onKeyUp="value=value.replace(/[^\d\.\/]/ig,'');AddMoney(0);"
                            value="" /></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <input type="button" value="10" onClick="AddMoney(10)" class="btn3" />&nbsp;
                        <input type="button" value="100" onClick="AddMoney(100)" class="btn3" />&nbsp;
                        <input type="button" value="500" onClick="AddMoney(500)" class="btn3" />&nbsp;
                        <input type="button" value="1K" onClick="AddMoney(1000)" class="btn3" />&nbsp;
                        <input type="button" value="����" onClick="DiffMoney()" class="btn2" />
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="padding-top:4px; padding-bottom: 4px; border-bottom: 1px #808080 solid;">
                        <input type="button" name="btnClear" value="����" id="btnClear"
                            onClick="javascript:location.href='main.php?action=mem_left&uid=<?= $uid ?>'"
                            class="btn2" />&nbsp;&nbsp;
                        <input type="submit" name="btnsave" value="��ע" id="btnsave" class="btn1 submit1" />
                    </td>
                </tr>
                <tr style="line-height: 22px; height: 22px;">
                    <td align="right"> ��Ӯ�� </td>
                    <td id="keying" style="color: Red;" align="left">0</td>
                </tr>
                <tr style="line-height: 22px; height: 22px;">
                    <td align="right">��߿�Ӯ��</td>
                    <td id="keyingmax" style="color: Red;" align="left"><?= $ggwinsum ?></td>
                </tr>
                <tr style="line-height: 22px; height: 22px;">
                    <td align="right">����޶ </td>
                    <td id="zuidi" align="left"><?= $xy ?></td>
                </tr>
                <tr style="line-height: 22px; height: 22px;">
                    <td align="right">��ע�޶ </td>
                    <td id="danzhu" align="left"><?= $bl_xx ?></td>
                </tr>
                <tr style="line-height: 22px; height: 22px;">
                    <td align="right">�����޶</td>
                    <td id="danxiang" align="left"><?= $bl_xxx ?></td>
                </tr>
                <tr style="line-height: 22px; height: 22px;">
                    <td align="right">�������ã�</td>
                    <td id="yiyong" align="left">��<?= $ts ?>
                    </td>
                </tr>
        </table>
    </form>
    </td>
    </tr>
    </table>
    <table align="center" cellpadding="0px" cellspacing="0px" style="margin-top: 6px;">
        <tr>
            <td style="font-size: 13px; color: #471414;">
                <table>
                    <tr>
                        <td id="daojishi" style="width: 20px; line-height:20px; height:20px;">60 </td>
                        <td style="line-height:20px; height:20px;">����Զ����� </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    </div>

        <script>daojishi();</script></body>