<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
$ids = $_GET['ids'];
switch ($ids) {
    case "正A":
        $ids = "正A";
        break;
    case "正B":
        $ids = "正B";
        break;
    default:
        $ids = "正A";
        break;
}
$XF = 15;
if ($Current_KitheTable[29] == 0 || $Current_KitheTable[$XF] == 0) {
    echo "<meta http-equiv=\"refresh\" content=\"0;url=main.php?action=stop&uid=" . $uid . "&lx=2\">";
    exit();
}
require_once("include/member.php");


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
$zm_xx = $zm_xxx = $zmzfds_xx = $zmzfds_xxx = 0;
$zm_blc = $zfds_blc = $zfds_blc = 0;
$config_ds_temp = get_config_ds();
$user_ds_temp = get_member_ds($uid, $username);
if ($user_ds_temp != "") {
    if ($ids == "正A") {
        $zm_xx = $user_ds_temp['ZMA']['xx'];
        $zm_xxx = $user_ds_temp['ZMA']['xxx'];
        $zm_blc = $config_ds_temp['ZMA'][$blc_lx];
    } else {
        $zm_xx = $user_ds_temp['ZMB']['xx'];
        $zm_xxx = $user_ds_temp['ZMB']['xxx'];
        $zm_blc = $config_ds_temp['ZMB'][$blc_lx];
    }
    $zfds_xx = $user_ds_temp['ZFDS']['xx'];
    $zfds_xxx = $user_ds_temp['ZFDS']['xxx'];
    $zfds_blc = $config_ds_temp['ZFDS'][$blc_lx];
    $zfdx_xx = $user_ds_temp['ZFDX']['xx'];
    $zfdx_xxx = $user_ds_temp['ZFDX']['xxx'];
    $zfdx_blc = $config_ds_temp['ZFDX'][$blc_lx];
}
?>
<script language=javascript>
    var uid = '<?= $uid ?>';
    var xy = '<?= $xy ?>';
    var cs = '<?= $cs ?>';
    var ts = '<?= $ts ?>';
    var ids = '<?= $ids ?>';
    var dq_time = '<?= date("F d,Y H:i:s", strtotime($utime)) ?>';
    var fp_time = '<?= date("F d,Y H:i:s", strtotime($Current_KitheTable['kizm1'])) ?>';
    var autotime = '<?= $autotime ?>';
    var lj_time = 1;
    var zm_xx = '<?= $zm_xx ?>';
    var zm_xxx = '<?= $zm_xxx ?>';
    var zm_blc = '<?= $zm_blc ?>';
    var zfds_xx = '<?= $zfds_xx ?>';
    var zfds_xxx = '<?= $zfds_xxx ?>';
    var zfds_blc = '<?= $zfds_blc ?>';
    var zfdx_xx = '<?= $zfdx_xx ?>';
    var zfdx_xxx = '<?= $zfdx_xxx ?>';
    var zfdx_blc = '<?= $zfdx_blc ?>';
</script>
<script src="js/function.js" type="text/javascript"></script>
<script src="js/bet_zm.js" type="text/javascript"></script>
<link rel="stylesheet" href="/member/stylesheets/main.css?t=1545056559" type="text/css">
<link rel="stylesheet" href="/member/stylesheets/ball.css?t=1545056559" type="text/css">

<body class="bgcoloruserx">
    <? include "template/bet_zm.tpl.php"; ?>
    <script src="js/daojishi.js" type="text/javascript"></script>
    <script language=javascript>
        makeRequest('main.php?action=server&uid=<?= $uid ?>&class1=正码&class2=<?= $ids ?>')
    </script>
</body>