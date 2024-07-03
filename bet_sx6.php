<?php
if (!defined("KK_VER")) {
    exit("无效的访问");
}
$ids = $_GET['ids'];
switch ($ids) {
    case "六肖":
        $ids = "六肖";
        break;
        break;
    default:
        $ids = "六肖";
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
$sx_xx = $sx_xxx = $sx_blc = 0;
$config_ds_temp = get_config_ds();
$user_ds_temp = get_member_ds($uid, $username);
if ($user_ds_temp != "") {
    $sx6_xx = $user_ds_temp['SX6']['xx'];
    $sx6_xxx = $user_ds_temp['SX6']['xxx'];
    $sx6_blc = $config_ds_temp['SX6'][$blc_lx];
} ?>
<script language=javascript>
    var uid = "<?= $uid ?>";
    var xy = "<?= $xy ?>";
    var cs = "<?= $cs ?>";
    var ts = "<?= $ts ?>";
    var ids = "<?= $ids ?>";
    var dq_time = "<?= date("F d,Y H:i:s", strtotime($utime)) ?>";
    var fp_time = "<?= date("F d,Y H:i:s", strtotime($Current_KitheTable['kizm1'])) ?>";
    var autotime = "<?= $autotime ?>";
    var lj_time = 1;
    var sx6_xx = "<?= $sx6_xx ?>";
    var sx6_xxx = "<?= $sx6_xxx ?>";
    var sx6_blc = "<?= $sx6_blc ?>";
</script>
<script src="js/function.js" type="text/javascript"></script>
<script src="js/bet_sx6.js" type="text/javascript"></script>
<link rel="stylesheet" href="/member/stylesheets/main.css?t=1545056559" type="text/css">

<body class="bgcoloruserx">
    <? include "template/bet_sx6.tpl.php"; ?>
    <script src="js/daojishi.js" type="text/javascript"></script>
    <script language=javascript>
        makeRequest('main.php?action=server&uid=<?= $uid ?>&class1=生肖&class2=<?= $ids ?>')
    </script>
</body>