<?php

function chk_number($nz, $nd)
{
    if (count($nz) != count(array_unique($nz))) {
        echo "<script Language=Javascript>alert('号码重复，请重新选择号码!');window.history.go(-1);</script>";
        exit;
    }
    $i = 0;
    for (; $i < $nd; ++$i) {
        if ($nz[$i] < 1 || 49 < $nz[$i]) {
        echo     "<script Language=Javascript>alert('号码异常，请重新选择号码!');window.history.go(-1);</script>";
            exit;
        }
    }
}
if (!defined("KK_VER")) {
    exit("无效的访问");
}
if ($vip == 1 && !strpos($flag, "1")) {
   echo  "<center>你没有该权限功能!</center>";
    exit;
}
include "check_zf.php";
$ids = $_GET['ids'];
if ($ids == "") {
    $ids = "自选不中";
}
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
      echo  "<script>alert('子账号不允许走飞!'); window.location.href = 'main.php?action=list_bz&uid=" . $uid . "&vip=" . $vip . "&ids=" . $ids . "';</script>";
        exit;
    }
    if ($pz_of == 1 || $ty == 1) {
      echo  "<script>alert('对不起，您没有走飞功能或者系统停押!如有疑问请联系上级!'); window.location.href = 'main.php?action=list_bz&uid=" . $uid . "&vip=" . $vip . "&ids=" . $ids . "';</script>";
        exit;
    }
    if (empty($_POST['sum_m']) || $_POST['sum_m'] < 1) {
       echo "<script>alert('金额有误，请输入数字!');window.location.href='main.php?action=list_bz&uid=" . $uid . "&vip=" . $vip . "&ids=" . $ids . "';</script>";
        exit;
    }
    if ($Current_KitheTable[29] == 0 || $Current_KitheTable[15] == 0) {
      echo  "<script>alert('该项目已经封盘!'); window.location.href = 'main.php?action=list_bz&uid=" . $uid . "&vip=" . $vip . "&ids=" . $ids . "';</script>";
        exit;
    }
    require_once "../include/agent.php";
    $num = randstr();
    $zf_class1 = $_POST['class1'];
    $zf_class2 = $_POST['class2'];
    $zf_class3 = $_POST['class3'];
    $zf_rate = $_POST['rate'];
    $zf_ds = $_POST['ds'];
    $zf_sum = $_POST['sum_m'];
    $zf_dslb = "BZ";
    $number = $_POST['class3'];
    $number_array = explode(",", $number);
    $number_count = count($number_array) - 1;
    chk_number($number_array, $number_count);
    $n = $number_count;
    $text1 = "";
    $text2 = "";
    $bl_temp = get_bl($zf_class2, 0);
    $rate_temp1 = 888;
    $r = 1;
    for (; $r <= $number_count; ++$r) {
        $temename = $number_array[$r - 1];
        if ($temename != "") {
            $bl_locked = $bl_temp[$temename]['locked'];
            if ($bl_locked == 1) {
               echo "<script>alert('对不起," . $zf_class2 . "[" . $bl_temp[$temename]['class3'] . "]已停押！');window.history.go(-1);</script>";
                exit;
            } else {
                if ($bl_temp[$temename]['rate'] < $rate_temp1) {
                    $rate_temp1 = $bl_temp[$temename]['rate'];
                }
                $text1 .= "|" . $temename . "|" . round($bl_temp[$temename]['rate'], 3) . "#";
                $text2 .= $temename . ",";
            }
        }
    }
    $text1 = "@" . $text1 . "@";
    $text2 = $text2 . "|" . $number_count;
    switch ($zf_class2) {
        case "五不中":
            $zs = $n * ($n - 1) * ($n - 2) * ($n - 3) * ($n - 4) / 120;
            $type_max = 8;
            $type_min = 5;
            break;
        case "六不中":
            $zs = $n * ($n - 1) * ($n - 2) * ($n - 3) * ($n - 4) * ($n - 5) / 720;
            $type_max = 9;
            $type_min = 6;
            break;
        case "七不中":
            $zs = $n * ($n - 1) * ($n - 2) * ($n - 3) * ($n - 4) * ($n - 5) * ($n - 6) / 5040;
            $type_max = 10;
            $type_min = 7;
            break;
        case "八不中":
            $zs = $n * ($n - 1) * ($n - 2) * ($n - 3) * ($n - 4) * ($n - 5) * ($n - 6) * ($n - 7) / 40320;
            $type_max = 11;
            $type_min = 8;
            break;
        case "九不中":
            $zs = $n * ($n - 1) * ($n - 2) * ($n - 3) * ($n - 4) * ($n - 5) * ($n - 6) * ($n - 7) * ($n - 8) / 362880;
            $type_max = 12;
            $type_min = 9;
            break;
        case "十不中":
            $zs = $n * ($n - 1) * ($n - 2) * ($n - 3) * ($n - 4) * ($n - 5) * ($n - 6) * ($n - 7) * ($n - 8) * ($n - 9) / 3628800;
            $type_max = 13;
            $type_min = 10;
            break;
        default:
            echo "<script>alert('补货失败，请重新操作!');window.history.go(-1);</script>";
            exit;
    }
    if ($n < $type_min) {
    echo    "<script Language=Javascript>alert('最少选择" . $type_min . "个号码！');window.history.go(-1);</script>";
        exit;
    }
    if ($type_max < $n) {
      echo   "<script Language=Javascript>alert('最多选择" . $type_max . "个号码！');window.history.go(-1);</script>";
        exit;
    }
    $zf_lmlx = 0;
    $num = randstr();
    $abcd = "A";
    $rate0 = $rate_temp1;
    $rate1 = $rate_temp1;
    $zf_rate = $rate0;
    $lmclass3 = $text2;
    $class4 = md5($zf_class1 . "@" . $zf_class2 . "@" . $zf_class3 . "\$-" . $zf_sum);
    $class5 = $text1;
    include "ds_45.php";
    echo "<script>alert('补货成功!');</script>";
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
<script src="js/list_bz.js" type="text/javascript"></script>
<script language="JavaScript">
    function onLoad() {
        var obj_abcd = $("abcd");
        obj_abcd.value = "<?=$abcd?>";
        var obj_zc = $("zc");
        obj_zc.value = "<?=$zc?>";
    }</script>
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
<!--table2 外层--        !-->   
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="3" class="t_list">
    <form action="main.php" method="get" name="myFORM" id="myFORM">
        <tr>
            <td colspan="6" align="center" class="t_list_caption">
		<!--table3 外层--        !-->  
             <table width="100%" border="0" cellpadding="0" cellspacing="1" >
                <tbody>
                <tr>          
                <td width="5"></td>
                <td>&nbsp;期数:&nbsp;<?=$kithe?></td>
                <td colspan="2">&nbsp;盘口:&nbsp;
                    <select id="abcd" name="abcd" onChange="document.myFORM.submit();" class="za_select">
                        <option value="">全部</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>
                    <input name="action" type="hidden" id="action" value="list_bz" />
                    <input name="ids" type="hidden" id="ids" value="<?=$ids?>" />
                    <input name=" uid" type="hidden" id="uid" value="<?=$uid?>" />
                    <input name="vip" type="hidden" id="vip" value="<?=$vip?>" />
                </td>
                <td>&nbsp;类型:&nbsp;
                    <select id="zc" name="zc" onChange="document.myFORM.submit();" class="za_select">
                        <option value="0">实货</option>
                        <option value="1">虚货</option>
                    </select>
                </td>
                <td>
                  <?  if ($Current_KitheTable[29] != 0 && $Current_KitheTable[15] != 0 && $kithe == $Current_Kithe_Num) {?>
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
        <table id="tb1" border="0" cellspacing="1" cellpadding="0" bgcolor="C2C2A6" class="m_tab" width="100%">
        <tr class="m_title align="center" class="t_list_tr_3"_ft_future">
            <td width="79" align="center" class="t_list_tr_3">类型</td>
            <td width="60" align="center" class="t_list_tr_3">注数</td>
            <td width="107" align="center" class="t_list_tr_3">总额</td>
            <td width="99" align="center" class="t_list_tr_3">彩金</td>
            <td width="99" align="center" class="t_list_tr_3">已走</td>
            <td width="109" align="center" class="t_list_tr_3">查看统计排行</td>
        </tr>
        <tr bgcolor="#FFFFFF">
            <td>&nbsp;
            </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
    </table>
            </tr>
    </form>
</table><!--table2 外层--        !-->  



    </td>
    </tr>
    </tbody>
    </table><!--table1 end-->    


    <SCRIPT language=javascript>makeRequest('main.php?action=server_bz&uid=<?=$uid?>&vip=<?=$vip?>&abcd=<?=$abcd?>&zc=<?=$zc?>&ids=<?=$ids?>')</script>
    <DIV id="rs_window" style="DISPLAY: none; POSITION: absolute">
        <form action="main.php?action=list_bz&uid=<?=$uid?>&vip=<?=$vip?>&act=save" method="post" name="form1" >
          <?  include "zf.php";?>
        </form>
    </div>
    <DIV id="lm_window" style="DISPLAY: none;">
        <table id="tb2" border="0" cellspacing="1" cellpadding="0" bgcolor="C2C2A6" class="m_tab" width="650">
            <tr bgcolor="#FFFFFF">
                <td>
                    <DIV id="list_div"></DIV>
                </td>
            </tr>
        </table>
    </div>
   <? if ($Current_KitheTable[29] != 0 && $Current_KitheTable[15] != 0 && $kithe == $Current_Kithe_Num) {?>

    <script src="js/daojishi.js" type="text/javascript"></script>
   <? }?>
</body>