<?php

if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
if ($vip == 1 && !strpos($flag, "1")) {
    echo "<center>��û�и�Ȩ�޹���!</center>";
    exit;
}
include "check_zf.php";
$ids = "Ӳ��";
$abcd = "";
$zc = 0;
$kithe = $Current_Kithe_Num;
if ($_GET['abcd'] != "") {
    $abcd = $_GET['abcd'];
}
if ($_GET['zc'] != "") {
    $zc = $_GET['zc'];
}
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
if ($_GET['act'] == "save") {
    if ($vip == 1) {
        echo "<script>alert('���˺Ų������߷�!'); window.location.href = 'main.php?action=list_yt&uid=" . $uid . "&vip=" . $vip . "&ids=" . $ids . "';</script>";
        exit;
    }
    if ($pz_of == 1 || $ty == 1) {
        echo "<script>alert('�Բ�����û���߷ɹ��ܻ���ϵͳͣѺ!������������ϵ�ϼ�!'); window.location.href = 'main.php?action=list_yt&uid=" . $uid . "&vip=" . $vip . "&ids=" . $ids . "';</script>";
        exit;
    }
    if (empty($_POST['sum_m']) || $_POST['sum_m'] < 1) {
        echo "<script>alert('�����������������!');window.location.href='main.php?action=list_yt&uid=" . $uid . "&vip=" . $vip . "&ids=" . $ids . "';</script>";
        exit;
    }
    if ($Current_KitheTable[29] == 0 || $Current_KitheTable[15] == 0) {
        echo "<script>alert('����Ŀ�Ѿ�����!'); window.location.href = 'main.php?action=list_yt&uid=" . $uid . "&vip=" . $vip . "&ids=" . $ids . "';</script>";
        exit;
    }
    $zf_class1 = $_POST['class1'];
    $zf_class2 = $_POST['class2'];
    $zf_class3 = $_POST['class3'];
    $zf_sum = (int) $_POST['sum_m'];
    $zf_dslb = "YT";
    $class4 = md5($zf_class1 . "@" . $zf_class2 . "@" . $zf_class3 . "\$-" . $zf_sum);
    $text1 = "";
    $zf_class3_temp = str_replace("��:", "", $zf_class3);
    $zf_class3_temp = str_replace("��:", "", $zf_class3_temp);
    $number_array = explode(",", $zf_class3_temp);
    $number_count = count($number_array) - 1;
    if (2 < $number_count || $number_count < 2) {
        echo "<script>alert('����ʧ�ܣ������²���!');window.history.go(-1);</script>";
        exit;
    }
    $result = mysql_query("SELECT class3,rate,locked FROM web_bl WHERE class2='Ӳ��' Order By ID");
    $bl_temp = array();
    $x = 0;
    while ($Image = mysql_fetch_assoc($result)) {
        $bl_temp[$Image['class3']]['rate'] = $Image['rate'];
        $bl_temp[$Image['class3']]['locked'] = $Image['locked'];
        ++$x;
    }
    $r = 0;
    for (; $r < $number_count; ++$r) {
        $text1 .= "|" . $number_array[$r] . "|";
        if ($bl_temp[$number_array[$r]]['rate'] < 1 || $bl_temp[$number_array[$r]]['locked'] == 1) {
            echo "<script>alert('�Բ���," . $zf_class2 . "[" . $number_array[$r] . "]��ͣѺ!');window.history.go(-1);</script>";
            exit;
        }
    }
    $num = randstr();
    $abcd = "A";
    $rate0 = min($bl_temp[$number_array[0]]['rate'], $bl_temp[$number_array[1]]['rate']);
    $zf_rate = $rate0;
    $text1 = "@" . $text1 . "@";
    $class5 = $text1;
    include "ds_2367.php";
    echo "<script>alert('�����ɹ�!');</script>";
}?>
<link rel="stylesheet" href="css/control_main.css" type="text/css">
<link rel="stylesheet" href="css/ball.css" type="text/css">
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
    var url = "main.php?action=list_yt&uid=" <?= $uid ?>
? vip =<?= $vip ?>? kithe =<?= $kithe ?>? abcd =<?= $abcd ?>? zc =<?= $zc ?> ";
</script>
<script src="js/function.js" type="text/javascript"></script>
<script src="js/list_yt.js" type="text/javascript"></script>
<script language="JavaScript">
function onLoad() {
        var obj_abcd = $("abcd");
        obj_abcd.value = "<?$abcd?>";
        var obj_zc = $("zc");
        obj_zc.value = "<?$zc?>";
    }
</script>
<script language="JavaScript"></script>

<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0" vlink="#0000FF" alink="#0000FF" onLoad="onLoad();">
    <? require_once "list_header.php";?>
    <table cellpadding="0" cellspacing="3">
        <form action="main.php" method="get" name="myFORM" id="myFORM">
            <tr>
                <td>�ۿ���ʽ&nbsp;</td>
                <td>&nbsp;����:&nbsp;</td>
                <td>
                    <?=kithe?>
                </td>
                <td>&nbsp;�̿�:&nbsp;</td>
                <td>
                    <select id="abcd" name="abcd" onChange="document.myFORM.submit();" class="za_select">
                        <option value="">ȫ��</option>

                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>
                    <input name="action" type="hidden" id="action" value="list_yt" />
                    <input name="uid" type="hidden" id="uid" value="<?=$uid?>" />
                    <input name="vip" type="hidden" id="vip" value="<?=$vip?>" />
                </td>
                <td>&nbsp;����:&nbsp;</td>
                <td>
                    <select id="zc" name="zc" onChange="document.myFORM.submit();" class="za_select">
                        <option value="0">ʵ��</option>
                        <option value="1">���</option>
                    </select>
                </td>
                <td>
                    <? if ($Current_KitheTable[29] != 0 && $Current_KitheTable[15] != 0 && $kithe == $Current_Kithe_Num) {?>
                    �������ʱ��:
                    <span style="font-size: 12px; font-weight: bold;" id="daojishi"></span>
                    }
                </td>
            </tr>
        </form>
    </table>
    <DIV id="list_div"></DIV>
    <DIV id=rs_window style="DISPLAY: none; POSITION: absolute">
        <form action="main.php?action=list_yt&uid=" <?=$uid?>?vip=
            <?=$vip?>?act=save?kithe=
            <?=$kithe?>" method="post" name="form1" >
            <? include "zf.php";?>
        </form>
    </div>
    <SCRIPT language=javascript>makeRequest('main.php?action=server_yt&uid="
            <?= $uid ?>? vip =<?= $vip ?>? kithe =<?= $kithe ?>? abcd =<?= $abcd ?>? zc =<?= $zc ?>? page =<?= $page ?> "')</script>
    <? if ($Current_KitheTable[29] != 0 && $Current_KitheTable[15] != 0 && $kithe == $Current_Kithe_Num) {?>
    <script src="js/daojishi.js" type="text/javascript"></script>
    }
</body>