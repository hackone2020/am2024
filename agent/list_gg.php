<?php

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

echo   "<script>alert('���˺Ų������߷�!'); window.location.href = 'main.php?action=list_sx6&uid=" . $uid . "&vip=" . $vip . "&ids=" . $ids . "';</script>";
        exit;
    }
    if ($pz_of == 1 || $ty == 1) {
   echo     "<script>alert('�Բ�����û���߷ɹ��ܻ���ϵͳͣѺ!������������ϵ�ϼ�!'); window.location.href = 'main.php?action=list_sx6&uid=" . $uid . "&vip=" . $vip . "&ids=" . $ids . "';</script>";
        exit;
    }
    if (empty($_POST['sum_m']) || $_POST['sum_m'] < 1) {
      echo   "<script>alert('�����������������!');window.location.href='main.php?action=list_sx6&uid=" . $uid . "&vip=" . $vip . "&ids=" . $ids . "';</script>";
        exit;
    }
    if ($Current_KitheTable[29] == 0 || $Current_KitheTable[15] == 0) {
       echo  "<script>alert('����Ŀ�Ѿ�����!'); window.location.href = 'main.php?action=list_sx6&uid=" . $uid . "&vip=" . $vip . "&ids=" . $ids . "';</script>";
        exit;
    }
    $zf_class1 = $_POST['class1'];
    $zf_class2 = $_POST['class2'];
    $zf_class3 = $_POST['class3'];
    $zf_sum = (int) $_POST['sum_m'];
    $zf_dslb = "GG";
    $num = randstr();
    $abcd = "A";
    $class4 = md5($zf_class1 . "@" . $zf_class2 . "@" . $zf_class3 . "\$-" . $zf_sum);
    $class5 = "@|" . $zf_class3 . "|@";
    $result = $db1->query("select rate from web_tan where kithe='" . $kithe . "' and class1='" . $zf_class1 . "' and class2='" . $zf_class2 . "' and class3='" . $zf_class3 . "' and qx=0 LIMIT 1");
    $rows = $result->fetch_array();
    $rate0 = round($rows['rate'], 3);
    $zf_rate = $rate0;
    include "ds_2367.php";
   echo "<script>alert('�����ɹ�!');</script>";
}?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
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
    var url = "main.php?action=list_gg&uid=<?=$uid?>&vip=<?=$vip?>&kithe=<?=$kithe?>&abcd=<?=$abcd?>&zc=<?=$zc?>";
</script>
<script src="js/function.js" type="text/javascript"></script>
<script src="js/list_gg.js" type="text/javascript"></script>
<script language="JavaScript">
    function onLoad() {
        var obj_abcd = $("abcd");
        obj_abcd.value = "<?=$abcd?>";
        var obj_zc = $("zc");
        obj_zc.value = "<?=$zc?>";
    }
</script>
<script language="JavaScript"></script>
<body style="min-width: 1200px;width: 100%">
<!--table1 start-->    
 <table width="100%" border="0" cellspacing="1" cellpadding="0">
    <tbody>
    <tr>
    <!--left-->    
    <td width="260" align="center" valign="top"> <?php require_once "list_header.php";?></td>
    <!--right-->
    <td valign="top">
<!--table2 ���--        !-->   
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="3" class="t_list">
    <form action="main.php" method="get" name="myFORM" id="myFORM">
        <tr>
            <td colspan="6" align="center" class="t_list_caption">
		<!--table3 ���--        !-->  
             <table width="100%" border="0" cellpadding="0" cellspacing="1" >
                <tbody>
                <tr>          
                    <td width="5"></td>
                    <td>&nbsp;����:&nbsp;<?=$kithe?></td>
                <td>&nbsp;�̿�:&nbsp;</td>
                <td>
                    <select id="abcd" name="abcd" onChange="document.myFORM.submit();" class="za_select">
                        <option value="">ȫ��</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>
                    <input name="action" type="hidden" id="action" value="list_gg" />
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
                    <?}?>
                </td>
                </tr>
                </tbody>
            </table><!--table3 ���--        !-->  
            </td>
            
        </tr>
    </form>
</table><!--table2 ���--        !-->  

    <DIV id="list_div" ></DIV>

    </td>
    </tr>
    </tbody>
    </table><!--table1 end-->    

    <DIV id=rs_window style="DISPLAY: none; POSITION: absolute">
        <form action="main.php?action=list_gg&uid=<?=$uid?>&vip=<?=$vip?>&act=save&kithe=<?=$kithe?>" method="post"
            name="form1">
            <?
include "zf.php";
?>
        </form>
    </div>
    <SCRIPT
        language=javascript>makeRequest('main.php?action=server_gg&uid=<?=$uid?>&vip=<?=$vip?>&kithe=<?=$kithe?>&abcd=<?=$abcd?>&zc=<?=$zc?>&page=<?=$page?>');</script>
    <? if ($Current_KitheTable[29] != 0 && $Current_KitheTable[15] != 0 && $kithe == $Current_Kithe_Num) { ?>
    <script src="js/daojishi.js" type="text/javascript"></script>
    <? }?>
</body>