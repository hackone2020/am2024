<?php

if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
if (strpos($flag, "03")) {
} else {
    echo "<center>��û�и�Ȩ�޹���!</center>";
    exit;
}
if ($_GET['ids'] != "") {
    $ids = $_GET['ids'];
} else {
    $ids = "����һ";
}
$abcd = "";
$zc = 0;
if ($_GET['kithe'] != "") {
    $kithe = $_GET['kithe'];
} else {
    $kithe = $Current_Kithe_Num;
}
if ($_GET['abcd'] != "") {
    $abcd = $_GET['abcd'];
}
if ($_GET['zc'] != "") {
    $zc = $_GET['zc'];
}
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;



if ($_GET['act'] == "save") {
    if ($_POST['ds'] == "") {
        echo "<script>alert('��ˮ��������������!'); window.history.go(-1);</script>";
        exit;
    }
    if (empty($_POST['rate'])) {
        echo "<script>alert('�����������������֣�'); window.history.go(-1);</script>";
        exit;
    }
    if (empty($_POST['sum_m'])) {
        echo "<script>alert('�����������������!'); window.history.go(-1);</script>";
        exit;
    }
    if ($_POST['classname'] != "") {
        $zf_username = $_POST['classname'];
    } else {
        $zf_username = "���";
    }
    $num = randstr();
    $zf_class1 = $_POST['class1'];
    $zf_class2 = $_POST['class2'];
    $zf_class3 = $_POST['class3'];
    $zf_rate = $_POST['rate'];
    $zf_ds = $_POST['ds'];
    $zf_sum = $_POST['sum_m'];
    $zf_dslb = "SX6";
    $zf_class4 = md5($zf_class1 . "@" . $zf_class2 . "@" . $zf_class3 . "\$-" . $zf_sum);
    $text1 = "";
    $number_array = explode(",", $zf_class3);
    $number_count = count($number_array) - 1;
    if (6 < $number_count || $number_count < 6) {
        echo "<script>alert('����ʧ�ܣ������²���!');window.history.go(-1);</script>";
        exit;
    }
    $r = 0;
    for (; $r < $number_count; ++$r) {
        $text1 .= "|" . $number_array[$r] . "|";
    }
    $text1 = "@" . $text1 . "@";
    $zf_class5 = $text1;
    $sql_set = " set num='{$num}', username='{$zf_username}', kithe='{$kithe}', adddate='{$utime}', ds_lb='{$zf_dslb}', class1='" . $zf_class1 . "', class2='" . $zf_class2 . "', class3='" . $zf_class3 . "', rate='" . $zf_rate . "', rate2='" . $zf_rate . "', sum_m='-" . $zf_sum . "', daizc='0', zongzc='0', guanzc='0', daguzc='0', gszc='-" . $zf_sum . "', user_ds='" . $zf_ds . "', dai_ds='" . $zf_ds . "', zong_ds='" . $zf_ds . "', guan_ds='" . $zf_ds . "', dagu_ds='" . $zf_ds . "', dai_rate='{$zf_rate}', zong_rate='{$zf_rate}', guan_rate='{$zf_rate}', dagu_rate='{$zf_rate}', bm=2, dai='���', zong='���', guan='���', dagu='���', lx=5, visible=1, abcd='A', qx=0, jx=0, lm=0, lmlx=0, sz=1,win='0', class4='{$zf_class4}', class5='{$zf_class5}', rate3=0, rate4=0, ratelm1=0, ratelm2=0, lmclass3=0, ip='{$userip}' ";
    $sql1 = "INSERT INTO  web_tan " . $sql_set;
    $sql2 = "INSERT INTO  web_tans " . $sql_set;
    if (!$db1->query($sql1)) {
        exit("���ݿ��޸ĳ���1");
    }
    if (!$db1->query($sql2)) {
        exit("���ݿ��޸ĳ���2");
    }
    echo "<script>alert('�����ɹ�!');</script>";
} ?>


<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<link rel="stylesheet" href="css/ball.css" type="text/css">
<script language="JavaScript">
    var uid = "<?= $uid ?>";
    var ids = "<?= $ids ?>";
    var kithe = "<?= $kithe ?>";
    var kithe_num = "<?= $Current_Kithe_Num ?>";
    var autotime = "<?= $autotime ?>";
    var lj_time = 1;
    var dq_time = "<?= date("F d, Y H: i: s", strtotime($utime)) ?>";
    var fp_time = "<?= date("F d, Y H: i: s", strtotime($Current_KitheTable['kizm1'])) ?>";
    var url = "main.php?action=list_dzy&class2=<?= $ids ?>&uid=<?= $uid ?>&kithe=<?= $kithe ?>&abcd=<?= $abcd ?>&zc=<?= $zc ?>";
</script>
<script src="js/function.js" type="text/javascript"></script>
<script src="js/list_dzy.js" type="text/javascript"></script>
<script language="JavaScript">
    function onLoad() {
        var obj_kithe = $("kithe");
        obj_kithe.value = "<?= $kithe ?>";
        var obj_abcd = $("abcd");
        obj_abcd.value = "<?= $abcd ?>";
        var obj_zc = $("zc");
        obj_zc.value = "<?= $zc ?>";
    }
</script>
<script language="JavaScript"></script>

<body style="min-width: 1200px;width: 100%">
    <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tbody>
            <tr>
                <!--left-->
                <td width="260" align="center" valign="top">
                    <? require_once "list_header.php"; ?>
                </td>
                <!--right-->
                <td valign="top">
                    <!--top talbe ���--        !-->
                    <table width="100%" border="0" cellpadding="0" cellspacing="1" class="t_list">
                        <form action="main.php" method="get" name="myFORM" id="myFORM">
                            <tbody>
                                <tr>
                                    <!--���td start-->
                                    <td colspan="14" align="center" class="t_list_caption">
                                        <!--top table ����-->
                                        <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td class="font_b">&nbsp;������
                                                        <select id="kithe" name="kithe" onChange="document.myFORM.submit();" class="za_select">
                                                            <?
                                                            $result = $db1->query("select * from web_kithe order by nn desc limit 30");
                                                            while ($image = $result->fetch_array()) { ?>
                                                                <option <? if ($kithe == $image['nn']) echo "selected"; ?> value='<?= $image['nn'] ?>'>��<?= $image['nn'] ?>��</OPTION>
                                                            <? } ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <? if ($Current_KitheTable[29] != 0 && $Current_KitheTable[15] != 0 && $kithe == $Current_Kithe_Num) { ?>
                                                            �������ʱ��:
                                                            <span class="font_r" style="font-size: 12px; font-weight: bold;" id="daojishi"></span>
                                                        <? } ?>
                                                    </td>
                                                    <td align="right">&nbsp;�̿�:&nbsp;

                                                        <select id="abcd" name="abcd" onChange="document.myFORM.submit();" class="za_select">
                                                            <option value="" <? if ($abcd == "") echo "selected"; ?>>ȫ��</option>
                                                            <option value="A" <? if ($abcd == "A") echo "selected"; ?>>A</option>
                                                            <option value="B" <? if ($abcd == "B") echo "selected"; ?>>B</option>
                                                            <option value="C" <? if ($abcd == "C") echo "selected"; ?>>C</option>
                                                            <option value="D" <? if ($abcd == "D") echo "selected"; ?>>D</option>
                                                            <option value="E" <? if ($abcd == "E") echo "selected"; ?>>E</option>
                                                            <option value="F" <? if ($abcd == "F") echo "selected"; ?>>F</option>
                                                            <option value="G" <? if ($abcd == "G") echo "selected"; ?>>G</option>
                                                            <option value="H" <? if ($abcd == "H") echo "selected"; ?>>H</option>
                                                        </select>
                                                        <input name="action" type="hidden" id="action" value="list_dzy" />
                                                        <input name="uid" type="hidden" id="uid" value="<?= $uid ?>" />
                                                        <input name="ids" type="hidden" id="ids" value="<?= $ids ?>" />
                                                        <span>&nbsp;����:&nbsp;</span>

                                                        <select id="zc" name="zc" onChange="document.myFORM.submit();" class="za_select">
                                                            <option value="0" <? if ($zc == "0") echo "selected"; ?>>ʵ��</option>
                                                            <option value="1" <? if ($zc == "1") echo "selected"; ?>>���</option>
                                                        </select>
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td> <!--���td end-->

                                </tr>
                            </tbody>
                        </form>
                    </table>
                    <DIV id="list_div"></DIV>
                    <!--top talbe ���--        !-->
                </td>
            </tr>
        </tbody>
    </table>
    <DIV id="list_div"></DIV>
    <DIV id="rs_window" style="DISPLAY: none; POSITION: absolute">
        <form action="main.php?action=list_dzy&class2=<?= $ids ?>&uid=<?= $uid ?>&act=save&kithe=<?= $kithe ?>" method="post" name="form1">
            <? include "zf.php"; ?>
        </form>
    </div>

    <SCRIPT language="javascript">
        makeRequest('main.php?action=list_dzy_show&class2=<?= $ids ?>&uid=<?= $uid ?>&kithe=<?= $kithe ?>&abcd=<?= $abcd ?>&zc=<?= $zc ?>&page=<?= $page ?>')
    </script>
    <? if ($Current_KitheTable[29] != 0 && $Current_KitheTable[15] != 0 && $kithe == $Current_Kithe_Num) { ?>

        <script src="js/daojishi.js" type="text/javascript"></script>
    <? } ?>
</body>