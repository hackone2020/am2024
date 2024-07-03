<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
$lx = $_GET['lx'];
$class2 = "";
switch ($lx) {
    case "1":
        $lx = "1";
        $class2 = "二尾连中";
        $ds_lb = "2WSL";
        break;
    case "2":
        $lx = "2";
        $class2 = "二尾连不中";
        $ds_lb = "2WSL";
        break;
    case "3":
        $lx = "3";
        $class2 = "三尾连中";
        $ds_lb = "3WSL";
        break;
    case "4":
        $lx = "4";
        $class2 = "三尾连不中";
        $ds_lb = "3WSL";
        break;
    case "5":
        $lx = "5";
        $class2 = "四尾连中";
        $ds_lb = "4WSL";
        break;
    case "6":
        $lx = "6";
        $class2 = "四尾连不中";
        $ds_lb = "4WSL";
        break;
    default:
        $lx = "1";
        $class2 = "二尾连中";
        $ds_lb = "2WSL";
        break;
}
$XF = 15;
$ids = "尾数连";
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
$wsl_xx = $wsl_xxx = $wsl_blc = 0;
$config_ds_temp = get_config_ds();
$user_ds_temp = get_member_ds($uid, $username);
if ($user_ds_temp != "") {
    $wsl_xx = $user_ds_temp[$ds_lb]['xx'];
    $wsl_xxx = $user_ds_temp[$ds_lb]['xxx'];
    $wsl_blc = $config_ds_temp[$ds_lb][$blc_lx];
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
    var wsl_xx = "<?= $wsl_xx ?>";
    var wsl_xxx = "<?= $wsl_xxx ?>";
    var wsl_blc = "<?= $wsl_blc ?>";
    var url = "main.php?action=bet_wsl&lx="
</script>
<script src="js/function.js" type="text/javascript"></script>
<script src="js/bet_wsl.js" type="text/javascript"></script>
<link rel="stylesheet" href="/member/stylesheets/main.css?t=1545056559" type="text/css">

<body marginwidth="0" marginheight="0">
    <? include "template/bet_wsl.tpl.php"; ?>
    <script src="js/daojishi.js" type="text/javascript"></script>
    <SCRIPT language=javascript>
        select_types("<?= $lx ?>");

        function read() {
            makeRequest('main.php?action=server&uid=<?= $uid ?>&class1=尾数连&class2=<?= $class2 ?>');
        }
    </script>