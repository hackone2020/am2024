<?php

function chk_number($nz, $nd)
{
    if (count($nz) != count(array_unique($nz))) {
       echo "<script Language=Javascript>alert('�����ظ���������ѡ�����!');window.history.go(-1);</script>";
        exit;
    }
    $i = 0;
    for (; $i < $nd; ++$i) {
        if ($nz[$i] < 1 || 49 < $nz[$i]) {
           echo "<script Language=Javascript>alert('�����쳣��������ѡ�����!');window.history.go(-1);</script>";
            exit;
        }
    }
}
function chk_number_repeat($nz1, $nz2)
{
    $nz = array_intersect($nz1, $nz2);
    $nzc = count($nz);
    if ($nzc != 0) {
        echo "<script Language=Javascript>alert('����" . $nzc . "���ظ���������ѡ�����!'); window.history.go(-1);</script>";
        exit;
    }
}
if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
if ($vip == 1 && !strpos($flag, "1")) {
   echo "<center>��û�и�Ȩ�޹���!</center>";
    exit;
}
include "check_zf.php";
$ids = "����";
$abcd = "";
$zc = 0;
$sort = 0;
$kithe = $Current_Kithe_Num;
if ($_GET['abcd'] != "") {
    $abcd = $_GET['abcd'];
}
if ($_GET['zc'] != "") {
    $zc = $_GET['zc'];
}
if ($_GET['act'] == "save") {
    if ($vip == 1) {
       echo "<script>alert('���˺Ų������߷�!'); window.location.href = 'main.php?action=list_lm&uid=" . $uid . "&vip=" . $vip . "&ids=" . $ids . "';</script>";
        exit;
    }
    if ($pz_of == 1 || $ty == 1) {
        echo "<script>alert('�Բ�����û���߷ɹ��ܻ���ϵͳͣѺ!������������ϵ�ϼ�!'); window.location.href = 'main.php?action=list_lm&uid=" . $uid . "&vip=" . $vip . "&ids=" . $ids . "';</script>";
        exit;
    }
    if (empty($_POST['sum_m']) || $_POST['sum_m'] < 1) {
        echo "<script>alert('�����������������!');window.location.href='main.php?action=list_lm&uid=" . $uid . "&vip=" . $vip . "&ids=" . $ids . "';</script>";
        exit;
    }
    if ($Current_KitheTable[29] == 0 || $Current_KitheTable[15] == 0) {
        echo "<script>alert('����Ŀ�Ѿ�����!'); window.location.href = 'main.php?action=list_lm&uid=" . $uid . "&vip=" . $vip . "&ids=" . $ids . "';</script>";
        exit;
    }
    require_once "../include/agent.php";
    $zf_class1 = $_POST['class1'];
    $zf_class2 = $_POST['class2'];
    $zf_class3 = $_POST['class3'];
    $zf_sum = (int) $_POST['sum_m'];
    switch ($zf_class2) {
        case "��ȫ��":
            $rtype = 0;
            $zf_dslb = "LM4QZ";
            $type_max = 10;
            $type_min = 4;
            $dan_min = 0;
            $zf_rate2 = $zf_rate;
            break;
        case "��ȫ��":
            $rtype = 1;
            $zf_dslb = "LM3QZ";
            $type_max = 10;
            $type_min = 3;
            $dan_min = 2;
            $zf_rate2 = $zf_rate;
            break;
        case "���ж�":
            $rtype = 2;
            $zf_dslb = "LM3Z2";
            $type_max = 10;
            $type_min = 3;
            $dan_min = 2;
            break;
        case "��ȫ��":
            $rtype = 3;
            $zf_dslb = "LM2QZ";
            $type_max = 10;
            $type_min = 2;
            $dan_min = 1;
            $zf_rate2 = $zf_rate;
            break;
        case "������":
            $rtype = 4;
            $zf_dslb = "LM2ZT";
            $type_max = 10;
            $type_min = 2;
            $dan_min = 1;
            break;
        case "�ش�":
            $rtype = 5;
            $zf_dslb = "LMTC";
            $type_max = 10;
            $type_min = 2;
            $dan_min = 1;
            $zf_rate2 = $zf_rate;
            break;
        default:
           echo"<script>alert('����ʧ�ܣ������²���!'); window.history.go(-1);</script>";
            exit;
    }
    $zf_lmlx = 0;
    $number1 = $zf_class3;
    $number2 = "";
    if (strstr($zf_class3, "��")) {
        $zf_lmlx = 1;
        $temp_c3 = explode("��", $zf_class3);
        list($number2, $number1) = $temp_c3;
    }
    if (strstr($zf_class3, "��")) {
        $zf_lmlx = 2;
        $temp_c3 = explode("��", $zf_class3);
        list($number2, $number1) = $temp_c3;
    }
    $jianzs = 0;
    switch ($zf_lmlx) {
        case "0":
            $number1_array = explode(",", $number1);
            $number1_count = count($number1_array) - 1;
            chk_number($number1_array, $number1_count);
            $n = $number1_count;
            $class3_temp = $number1;
            $number = $number1;
            break;
        case "2":
            $number1_array = explode(",", $number1);
            $number1_count = count($number1_array) - 1;
            chk_number($number1_array, $number1_count);
            $n1 = $number1_count;
            $number2_array = explode(",", $number2);
            $number2_count = count($number2_array);
            chk_number($number2_array, $number2_count);
            $m1 = $number2_count;
            chk_number_repeat($number1_array, $number2_array);
            $n = $n1;
            $class3_temp = $number2 . "��" . $number1;
            $number = $number1 . $number2 . ",";
            if (!($dan_min != $number2_count)) {
                break;
            }
            echo"<script>alert('����ʧ��!��ͷ���������" . $dan_min . "��!'); window.history.go(-1);</script>";
            exit;
            break;
        case "1":
            $number1_array = explode(",", $number1);
            $number1_count = count($number1_array);
            chk_number($number1_array, $number1_count);
            $n1 = $number1_count;
            $number2_array = explode(",", $number2);
            $number2_count = count($number2_array);
            chk_number($number2_array, $number2_count);
            $m1 = $number2_count;
            $nz = array_intersect($number1_array, $number2_array);
            $jianzs = count($nz);
            $n = $n1 + $m1;
            $class3_temp = $number2 . "��" . $number1;
            $number = $number2 . "," . $number1 . ",";
            break;
        default:
           echo" <script>alert('����ʧ�ܣ������²���!'); window.history.go(-1);</script>";
            exit;
    }
    $number_array = explode(",", $number);
    $number_count = count($number_array) - 1;
    if ($number_count < $type_min) {
        echo"<script Language=Javascript>alert('����ѡ��" . $type_min . "�����룡');window.history.go(-1);</script>";
        exit;
    }
    if ($type_max < $number_count) {
        echo"<script Language=Javascript>alert('���ѡ��" . $type_max . "�����룡');window.history.go(-1);</script>";
        exit;
    }
    if ($rtype == "0") {
        $zs = $n * ($n - 1) * ($n - 2) * ($n - 3) / 24;
    }
    if ($rtype == "1" || $rtype == "2") {
        if ($zf_lmlx == 2) {
            $zs = $n;
        } else {
            $zs = $n * ($n - 1) * ($n - 2) / 6;
        }
    }
    if ($rtype == "3" || $rtype == "4" || $rtype == "5") {
        if ($zf_lmlx == 0) {
            $zs = $n * ($n - 1) / 2;
        }
        if ($zf_lmlx == 2) {
            $zs = $n;
        }
        if ($zf_lmlx == 1) {
            $zs = $n1 * $m1;
        }
    }
    $bl_temp = get_bl($zf_class2, 0);
    $zs -= $jianzs;
    $rate_temp1 = 8888;
    $rate_temp2 = 8888;
    $r = 1;
    for (; $r <= $number_count; ++$r) {
        $temename = $number_array[$r - 1];
        if ($temename != "") {
            $bl_locked = $bl_temp[$temename]['locked'];
            if ($bl_locked == 1) {
                echo "<script>alert('�Բ���," . $zf_class2 . "[" . $bl_temp[$temename]['class3'] . "]��ͣѺ��');window.history.go(-1);</script>";
                exit;
            } else {
                if ($bl_temp[$temename]['rate'] < $rate_temp1) {
                    $rate_temp1 = $bl_temp[$temename]['rate'];
                }
                if ($rtype == "2" || $rtype == "4") {
                    if ($bl_temp[$temename + 49]['rate'] < $rate_temp2) {
                        $rate_temp2 = $bl_temp[$temename + 49]['rate'];
                    }
                } else {
                    $rate_temp2 = 0;
                }
                if ($rtype == "2" || $rtype == "4") {
                    $text1 .= "|" . $temename . "|" . round($bl_temp[$temename]['rate'], 3) . "/" . round($bl_temp[$temename + 49]['rate'], 3) . "#";
                } else {
                    $text1 .= "|" . $temename . "|" . round($bl_temp[$temename]['rate'], 3) . "#";
                }
            }
        }
    }
    $num = randstr();
    $abcd = "A";
    $rate0 = $rate_temp1;
    $rate1 = $rate_temp2;
    $zf_rate = $rate0;
    $text2 = $number . "|" . $number_count;
    $lmclass3 = $text2;
    $class4 = md5($zf_class1 . "@" . $zf_class2 . "@" . $zf_class3 . "\$-" . $zf_sum);
    $class5 = "@" . $text1 . "@";
    include "ds_45.php";
   echo "<script>alert('�����ɹ�!');</script>";
}?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<script language="JavaScript">
    var uid = "<?=$uid?>";
    var vip = "<?=$vip?>";
    var lx = "<?=$lx?>";
    var ids = "<?=$ids?>";
    var kithe = "<?=$kithe?>";
    var kithe_num = "<?=$Current_Kithe_Num?>";
    var pz_of = "<?=$pz_of?>";
    var autotime = "<?=$autotime?>";
    var lj_time = 1;
    var dq_time = "<?=date("F d, Y H: i: s", strtotime($utime))?>";
    var fp_time = "<?=date("F d, Y H: i: s", strtotime($Current_KitheTable['kizm1']))?>";
    var abcd = "<?=$abcd?>";
    var zc = "<?=$zc?>";
</script>
<script src="js/function.js" type="text/javascript"></script>
<script src="js/list_lm.js" type="text/javascript"></script>
<script language="JavaScript">
function onLoad() {
        var obj_abcd = $("abcd");
        obj_abcd.value = "<?=$abcd?>";
        var obj_zc = $("zc");
        obj_zc.value = "<?=$zc?>";
    }</script>
<script language="JavaScript"></script>
<body style="min-width: 1200px;width: 100%">
 <table width="100%" border="0" cellspacing="1" cellpadding="0">
    <tbody>
    <tr>
    <!--left-->    
    <td width="260" align="center" valign="top"> <?php require_once "list_header.php";?></td>
    <!--right-->
    <td valign="top">
<!--top talbe ���--        !-->
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="3" class="t_list">
        <form action="main.php" method="get" name="myFORM" id="myFORM">
            <tr>
                 <!--���td start-->
            <td colspan="6" align="center" class="t_list_caption">
                 <!--top table ����-->
             <table width="100%" border="0" cellpadding="0" cellspacing="1" >
              <tbody>
                <tr>          
                <td width="5"></td>
                <td width="180" align="left">&nbsp;����:&nbsp;<?=$kithe?></td>
                <td width="560" align="right">&nbsp;�̿�:&nbsp;
                    <select id="abcd" name="abcd" onChange="document.myFORM.submit();" class="za_select">
                        <option value="">ȫ��</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>
                    <input name="action" type="hidden" id="action" value="list_lm" />
                    <input name="ids" type="hidden" id="ids" value="<?=$ids?>" />
                    <input name="uid" type="hidden" id="uid" value="<?=$uid?>" />
                    <input name="vip" type="hidden" id="vip" value="<?=$vip?>" />
                <span>&nbsp;����:&nbsp;</span>

                    <select id="zc" name="zc" onChange="document.myFORM.submit();" class="za_select">

                        <option value="0">ʵ��</option>
                        <option value="1">���</option>
                    </select>
                    <?if ($Current_KitheTable[29] != 0 && $Current_KitheTable[15] != 0 && $kithe == $Current_Kithe_Num) {?>
                    �������ʱ��:
                    <span style="font-size: 12px; font-weight: bold;" id="daojishi"></span>
                  <?  }?>
                </td>
            </tr>
        </form>
    </table>
    <table id="tb1" border="0" cellspacing="1" cellpadding="0" bgcolor="C2C2A6" class="m_tab" width="100%">
        <tr>
            	<td height="20" align="center" class="t_list_tr_3">����</td>
            	<td align="center" class="t_list_tr_3">ע��</td>
            	<td align="center" class="t_list_tr_3">�ܶ�</td>
            	<td align="center" class="t_list_tr_3">�ʽ�</td>
            	<td align="center" class="t_list_tr_3">����</td>
            	<td align="center" class="t_list_tr_3">�鿴ͳ������</td>
        </tr>
        <tr bgcolor="#FFFFFF">
            <td>&nbsp";</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
    </table>
    <SCRIPT language=javascript>makeRequest('main.php?action=server_lm&uid=<?=$uid?>&vip=<?=$vip?>&abcd=<?=$abcd?>&zc=<?=$zc?>&ids=<?=$ids ?>')</script>
    <DIV id="rs_window" style="DISPLAY: none; POSITION: absolute">
        <form action="main.php?action=list_lm&uid=<?=$uid?>&vip=<?=$vip?>&act=save" method="post" name="form1">
            <?include "zf.php";?>
        </form>
    </div>
    <DIV id="lm_window" style="DISPLAY:none;">
        <table id="tb2" border="0" cellspacing="1" cellpadding="0" bgcolor="C2C2A6" class="m_tab" width="100%">
            <tr bgcolor="#FFFFFF">
                <td>
                    <DIV id="list_div"></DIV>
                </td>
            </tr>
        </table>
    </div>
    <?if ($Current_KitheTable[29] != 0 && $Current_KitheTable[15] != 0 && $kithe == $Current_Kithe_Num) {?>

    <script src="js/daojishi.js" type="text/javascript"></script>
   <? }?>
</body>