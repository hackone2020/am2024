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
    $ids = "��1��";
}
$abcd = "";
$zc = 0;
$sort = 1;
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
if ($_GET['sort'] != "") {
    $sort = $_GET['sort'];
}
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
    $result = $db1->query("select ds_lb from web_bl where class1='" . $zf_class1 . "' and  class2='" . $zf_class2 . "' and class3='" . $zf_class3 . "' order by id LIMIT 1");
    $row = $result->fetch_array();
    $zf_dslb = $row['ds_lb'];
    $zf_class4 = md5($zf_class1 . "@" . $zf_class2 . "@" . $zf_class3 . "\$-" . $zf_sum);
    $zf_class5 = "@|" . $_POST['class3'] . "|@";
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
</script>
<script src="js/function.js" type="text/javascript"></script>
<script src="js/list_zt.js" type="text/javascript"></script>
<script language="JavaScript">
    function onLoad() {
        var obj_ids = $("ids");
        obj_ids.value = "<?= $ids ?>";
        var obj_kithe = $("kithe");
        obj_kithe.value = "<?= $kithe ?>";
        var obj_abcd = $("abcd");
        obj_abcd.value = "<?= $abcd ?>";
        var obj_zc = $("zc");
        obj_zc.value = "<?= $zc ?>";
        var obj_sort = $("sort");
        obj_sort.value = "<?= $sort ?>";
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
                                        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td class="font_b">&nbsp;<?=$ids?>&nbsp;
                                                        <select id="kithe" name="kithe" onChange="document.myFORM.submit();" class="za_select">
                                                            <? $result = $db1->query("select * from web_kithe order by nn desc limit 30");
                                                            while ($image = $result->fetch_array()) { ?>
                                                                <option value='<?= $image['nn'] ?>'>��<?= $image['nn'] ?>��</OPTION>
                                                            <? } ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                    �������ʱ��:
                                                        <? if ($Current_KitheTable[29] != 0 && $Current_KitheTable[15] != 0 && $kithe == $Current_Kithe_Num) { ?>
                                                            <span class="font_r" style="font-size: 12px; font-weight: bold;" id="daojishi"></span>
                                                        <? }else{ ?>
                                                            <span class="font_r" style="font-size: 12px; font-weight: bold;">�ѷ���</span>
                                                            <? } ?>
                                                    </td>
                                                    <td align="right">&nbsp;�̿�:&nbsp;
                                                        <select id="abcd" name="abcd" onChange="document.myFORM.submit();" class="za_select">
                                                            <option value="">ȫ��</option>
                                                            <option value="A">A</option>
                                                            <option value="B">B</option>
                                                            <option value="C">C</option>
                                                            <option value="D">D</option>
                                                        </select>

                                                        <input name="action" type="hidden" id="action" value="list_zt" />
                                                        <input name="uid" type="hidden" id="uid" value="<?= $uid ?>" />
                                                        <span>&nbsp;����:&nbsp;</span>
                                                        <select id="zc" name="zc" onChange="document.myFORM.submit();" class="za_select">
                                                            <option value="0">ʵ��</option>
                                                            <option value="1">���</option>
                                                        </select>
                                                        <span>&nbsp;����:&nbsp;</span>
                                                        <select id="sort" name="sort" onChange="document.myFORM.submit();" class="za_select">
                                                            <option value="0">�ʽ�</option>
                                                            <option value="1">��ע�ܶ�</option>
                                                            <option value="2">1-49</option>
                                                        </select>
                                                        <? if ($Current_KitheTable[29] != 0 && $Current_KitheTable[15] != 0 && $kithe == $Current_Kithe_Num) { ?>
                                                            �������ʱ��:
                                                            <span style="font-size: 12px; font-weight: bold;" id="daojishi"></span>
                                                        <? } ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td width="50%" valign="top">
                                                <table id="tb2" border="0" cellspacing="1" cellpadding="0" bgcolor="C2C2A6" class="m_tab" width="100%">
                                                    <tr>
                                                        <td height="20" align="center" class="t_list_tr_3">����</td>
                                                        <td align="center" class="t_list_tr_3">����</td>
                                                        <td align="center" class="t_list_tr_3">ע����</td>
                                                        <td align="center" class="t_list_tr_3">�ܶ�</td>
                                                        <td align="center" class="t_list_tr_3">�ʽ�</td>
                                                        <td align="center" class="t_list_tr_3">�߷�</td>
                                                        <td align="center" class="t_list_tr_3">����</td>
                                                    </tr>
                                                    <tr bgcolor="#FFFFFF">
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="50%" valign="top">
                                                <table id="tb1" border="0" cellspacing="1" cellpadding="0" bgcolor="C2C2A6" class="m_tab" width="100%">
                                                    <tr>
                                                        <td width="60" align="center" class="t_list_tr_3">����</td>
                                                        <td align="center" class="t_list_tr_3">����</td>
                                                        <td align="center" class="t_list_tr_3">ע����</td>
                                                        <td align="center" class="t_list_tr_3">�ܶ�</td>
                                                        <td align="center" class="t_list_tr_3">�ʽ�</td>
                                                        <td align="center" class="t_list_tr_3">�߷�</td>
                                                        <td align="center" class="t_list_tr_3">����</td>
                                                    </tr>
                                                    <tr bgcolor="#FFFFFF">
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                </table>
                                                <br>
                                                <table id="tb3" border="0" cellspacing="1" cellpadding="0" bgcolor="C2C2A6" class="m_tab" width="100%">
                                                    <tr class="m_title_ft_future">
                                                        <td width="83" height="16">&nbsp;</td>
                                                        <td width="101">ע����</td>
                                                        <td width="124">�ܶ�</td>
                                                        <td width="137">����</td>
                                                    </tr>
                                                    <tr bgcolor="#FFFFFF">
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </tr>
                            </tbody>
                        </form>
                    </table>
                </td>
                <Td width="10">&nbsp;</Td>
            </tr>
        </tbody>
    </table>
    <DIV id=rs_window style="DISPLAY: none; POSITION: absolute">
        <form action="main.php?action=list_zt&uid=<?= $uid ?>&act=save&ids=<?= $ids ?>&kithe=<?= $kithe ?>" method="post" name="form1">
            <? include "zf.php"; ?>
        </form>
    </div>
    <SCRIPT language=javascript>
        makeRequest('main.php?action=server_zt&uid=<?= $uid ?>&ids=<?= $ids ?>&kithe=<?= $kithe ?>&abcd=<?= $abcd ?>&zc=<?= $zc ?>&sort=<? $sort ?>')
    </script>
    <? if ($Current_KitheTable[29] != 0 && $Current_KitheTable[15] != 0 && $kithe == $Current_Kithe_Num) { ?>
        <script src="js/daojishi.js" type="text/javascript">
        </script>
    <?  } ?>
</body>