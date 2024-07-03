<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
$lx = $_GET['lx'];
$class2 = "";
switch ($lx) {
    case "1":
        $lx = "1";
        $class2 = "一肖量";
        $ds_lb = "1SXZL";
        break;
    case "2":
        $lx = "2";
        $class2 = "二肖量";
        $ds_lb = "2SXZL";
        break;
    case "3":
        $lx = "3";
        $class2 = "三肖量";
        $ds_lb = "3SXZL";
        break;
    case "4":
        $lx = "4";
        $class2 = "四肖量";
        $ds_lb = "4SXZL";
        break;
    case "5":
        $lx = "5";
        $class2 = "五肖量";
        $ds_lb = "5SXZL";
        break;
    default:
        $lx = "1";
        $class2 = "一肖量";
        $ds_lb = "1SXZL";
        break;
}
$XF = 15;
$ids = "生肖量";
if ($Current_KitheTable[29] == 0 || $Current_KitheTable[$XF] == 0) {
    echo "<meta http-equiv=\"refresh\" content=\"0;url=main.php?action=stop&uid=" . $uid . "&lx=2\">";
    exit();
}
require_once "include/member.php";
switch ($abcd) {
    case "A":
        $blc_lx = "blca";
        break;
    case "B":
        $blc_lx = "blcb";
        break;
    case "C":
        $blc_lx = "blcc";
        break;
    case "D":
        $blc_lx = "blcd";
        break;
    case "E":
        $blc_lx = "blce";
        break;
    case "F":
        $blc_lx = "blcf";
        break;
    case "G":
        $blc_lx = "blcg";
        break;
    case "H":
        $blc_lx = "blch";
        break;
    default:
        $blc_lx = "blca";
        break;
}
$sx_xx = $sx_xxx = $sx_blc = 0;
$config_ds_temp = get_config_ds();
$user_ds_temp = get_member_ds($uid, $username);
if ($user_ds_temp != "") {
    $sx_xx = $user_ds_temp[$ds_lb]['xx'];
    $sx_xxx = $user_ds_temp[$ds_lb]['xxx'];
    $sx_blc = $config_ds_temp[$ds_lb][$blc_lx];
}
?>
<script language=javascript>
    var uid = "<?= $uid ?>";
    var xy = "<?= $xy ?>";
    var cs = "<?= $cs ?>";
    var ts = "<?= $ts ?>";
    var ids = "<?= $ids ?>";
    var dq_time = "<?= date("F d, Y H: i: s", strtotime($utime)) ?>";
    var fp_time = "<?= date("F d, Y H: i: s", strtotime($Current_KitheTable['kizm1'])) ?>";
    var autotime = "<?= $autotime ?>";
    var lj_time = 1;
    var sx_xx = "<?= $sx_xx ?>";
    var sx_xxx = "<?= $sx_xxx ?>";
    var sx_blc = "<?= $sx_blc ?>";
    var url = "main.php?action=bet_sxzl&lx="
</script>
<script src="js/function.js" type="text/javascript"></script>
<script src="js/bet_sxzl.js" type="text/javascript"></script>
<link rel="stylesheet" href="/member/stylesheets/main.css?t=1545056559" type="text/css">

<body marginwidth="0" marginheight="0">
    <? include "template/bet_sxzl.tpl.php"; ?>
    <script src="js/daojishi.js" type="text/javascript"></script>
    <SCRIPT language=javascript>
        makeRequest('main.php?action=server&uid=<?= $uid ?>&class1=生肖量&class2=<?= $class2 ?>')
    </script>