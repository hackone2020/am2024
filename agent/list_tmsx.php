<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
if ($vip == 1 && !strpos($flag, "1")) {
    echo "<center>你没有该权限功能!</center>";
    exit;
}
include "check_zf.php";
$ids = "特肖";
$abcd = "";
$zc = 0;
$kithe = $Current_Kithe_Num;
if ($_GET['abcd'] != "") {
    $abcd = $_GET['abcd'];
}
if ($_GET['zc'] != "") {
    $zc = $_GET['zc'];
}
if ($_GET['act'] == "save") {
    if ($vip == 1) {
        echo "<script>alert('子账号不允许走飞!'); window.location.href = 'main.php?action=list_tmsx&uid=" . $uid . "&vip=" . $vip . "&ids=" . $ids . "';</script>";
        exit;
    }
    if ($pz_of == 1 || $ty == 1) {
        echo "<script>alert('对不起，您没有走飞功能或者系统停押!如有疑问请联系上级!'); window.location.href = 'main.php?action=list_tmsx&uid=" . $uid . "&vip=" . $vip . "&ids=" . $ids . "';</script>";
        exit;
    }
    if (empty($_POST['sum_m']) || $_POST['sum_m'] < 1) {
        echo "<script>alert('金额有误，请输入数字!');window.location.href='main.php?action=list_tmsx&uid=" . $uid . "&vip=" . $vip . "&ids=" . $ids . "';</script>";
        exit;
    }
    if ($Current_KitheTable[29] == 0 || $Current_KitheTable[15] == 0) {
        echo "<script>alert('该项目已经封盘!'); window.location.href = 'main.php?action=list_tmsx&uid=" . $uid . "&vip=" . $vip . "&ids=" . $ids . "';</script>";
        exit;
    }
    $zf_class1 = $_POST['class1'];
    $zf_class2 = $_POST['class2'];
    $zf_class3 = $_POST['class3'];
    $zf_sum = (int) $_POST['sum_m'];
    include "ds.php";
    echo "<script>alert('补货成功!');</script>";
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
</script>
<script src="js/function.js" type="text/javascript"></script>
<script src="js/list_tmsx.js" type="text/javascript"></script>
<script language="JavaScript">
    function onLoad() {
        var obj_abcd = $("abcd");
        obj_abcd.value = "<?$abcd?>";
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
<!--top talbe 外层--        !-->    
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="3" class="t_list">
     <form action="main.php" method="get" name="myFORM" id="myFORM">
         <tr>
                 <!--外层td start-->
            <td colspan="7" align="center" class="t_list_caption">
              <table width="100%" border="0" cellpadding="0" cellspacing="1" >
                <tbody>
                <tr>          
                    <td width="5"></td>
                    <td width="180" align="left">&nbsp;期数:&nbsp;<?=$kithe?></td>
                    <td width="560" align="right">&nbsp;盘口:&nbsp;
                    <select id="abcd" name="abcd" onChange="document.myFORM.submit();" class="za_select">
                        <option value="">全部</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>
                        <input name="action" type="hidden" id="action" value="list_tmsx" />
                        <input name="uid" type="hidden" id="uid" value="<?=$uid?>" />
                        <input name="vip" type="hidden" id="vip" value="<?=$vip?>" />
                        <span>&nbsp;类型:&nbsp;</span>
                        <select id="zc" name="zc" onChange="document.myFORM.submit();" class="za_select">
                            <option value="0">实货</option>
                            <option value="1">虚货</option>
                        </select>
    
                        <?if ($Current_KitheTable[29] != 0 && $Current_KitheTable[15] != 0 && $kithe == $Current_Kithe_Num) {?>
                        距离封盘时间:
    
                        <span style="font-size: 12px; font-weight: bold;" id="daojishi"></span>
                      <?  }?>
                    </td>
                </tr>
                </tbody>
            </table><!--table3 外层--        !-->  
            </td>
        </tr>
         <tr>
                    <td width="100%" valign="top">
                        <table id="tb1" border="0" cellspacing="1" cellpadding="0" bgcolor="C2C2A6" class="m_tab" width="100%">
                            <tr>
                                <td height="30" align="center" class="t_list_tr_3">号码</td>
                                <td align="center" class="t_list_tr_3">赔率</td>
                                <td align="center" class="t_list_tr_3">注单数</td>
                                <td align="center" class="t_list_tr_3">总额</td>
                                <td align="center" class="t_list_tr_3">彩金</td>
                                <td align="center" class="t_list_tr_3">走飞</td>
                                <td align="center" class="t_list_tr_3">已走</td>
                            </tr>
                            <tr bgcolor="#FFFFFF" style="height:30;">
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
                </tr>
    </form>
</table> <!--table2 外层--        !-->  
  
    
    </td>
    </tr>
    </tbody>
    </table><!--table1 end-->    


    <DIV id=rs_window style="DISPLAY: none; POSITION: absolute">
        <form action="main.php?action=list_tmsx&uid=<?=$uid?>?vip=<?=$vip?>?act=save?kithe=<?=$kithe?>" method="post" name="form1" >
            <?include "zf.php";?>
        </form>
    </div>
    <SCRIPT language=javascript>makeRequest('main.php?action=server_tmsx&uid=<?=$uid?>&vip=<?=$vip?>&kithe=<?=$kithe?>&abcd=<?=$abcd?>&zc=<?=$zc?>')</script>
    <?if ($Current_KitheTable[29] != 0 && $Current_KitheTable[15] != 0 && $kithe == $Current_Kithe_Num) {?>
    <script src="js/daojishi.js" type="text/javascript"></script>
  <?  }?>
</body>