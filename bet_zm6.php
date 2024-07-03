<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
$ids = $_GET['ids'];
switch ($ids) {
    case "正码1-6":
        $ids = "正码1-6";
        break;
    default:
        $ids = "正码1-6";
        break;
}
$XF = 15;
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
$zm6ds_xx = $zm6ds_xxx = $zm6dx_xx = $zm6dx_xxx = $zm6hsds_xx = $zm6hsds_xxx = $zm6hsdx_xx = $zm6hsdx_xxx = $zm6sb_xx = $zm6sb_xx = 0;
$zm6ds_blc = $zm6dx_blc = ${$zm6hsds_blc} = $zm6hsdx_blc = $zm6sb_blc = 0;
$config_ds_temp = get_config_ds();
$user_ds_temp = get_member_ds($uid, $username);
if ($user_ds_temp != "") {
    $zm6ds_xx = $user_ds_temp['ZM1-6DS']['xx'];
    $zm6ds_xxx = $user_ds_temp['ZM1-6DS']['xxx'];
    $zm6ds_blc = $config_ds_temp['ZM1-6DS'][$blc_lx];
    $zm6dx_xx = $user_ds_temp['ZM1-6DX']['xx'];
    $zm6dx_xxx = $user_ds_temp['ZM1-6DX']['xxx'];
    $zm6dx_blc = $config_ds_temp['ZM1-6DX'][$blc_lx];
    $zm6hsds_xx = $user_ds_temp['ZM1-6HSDS']['xx'];
    $zm6hsds_xxx = $user_ds_temp['ZM1-6HSDS']['xxx'];
    $zm6hsds_blc = $config_ds_temp['ZM1-6HSDS'][$blc_lx];
    $zm6hsdx_xx = $user_ds_temp['ZM1-6HSDX']['xx'];
    $zm6hsdx_xxx = $user_ds_temp['ZM1-6HSDX']['xxx'];
    $zm6hsdx_blc = $config_ds_temp['ZM1-6HSDX'][$blc_lx];
    $zm6sb_xx = $user_ds_temp['ZM1-6SB']['xx'];
    $zm6sb_xxx = $user_ds_temp['ZM1-6SB']['xxx'];
    ${$zm6sb_blc} = $config_ds_temp['ZM1-6SB'][$blc_lx];
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
    var autotime = "<?= $autotime * 2 ?>";
    var lj_time = 1;
    var zm6ds_xx = "<?= $zm6ds_xx ?>";
    var zm6ds_xxx = "<?= $zm6ds_xxx ?>";
    var zm6ds_blc = "<?= $zm6ds_blc ?>";
    var zm6dx_xx = "<?= $zm6dx_xx ?>";
    var zm6dx_xxx = "<?= $zm6dx_xxx ?>";
    var zm6dx_blc = "<?= $zm6dx_blc ?>";
    var zm6hsds_xx = "<?= $zm6hsds_xx ?>";
    var zm6hsds_xxx = "<?= $zm6hsds_xxx ?>";
    var zm6hsds_blc = "<?= $zm6hsds_blc ?>";
    var zm6hsdx_xx = "<?= $zm6hsdx_xx ?>";
    var zm6hsdx_xxx = "<?= $zm6hsdx_xxx ?>";
    var zm6hsdx_blc = "<?= $zm6hsdx_blc ?>";
    var zm6sb_xx = "<?= $zm6sb_xx ?>";
    var zm6sb_xxx = "<?= $zm6sb_xxx ?>";
    var zm6sb_blc = "<?= $zm6sb_blc ?>";
</script>
<script src="js/function.js" type="text/javascript"></script>
<script src="js/bet_zm6.js" type="text/javascript"></script>
<link rel="stylesheet" href="/member/stylesheets/main.css?t=1545056559" type="text/css">

<body class="bgcoloruserx">
    <? include "template/bet_zm6.tpl.php"; ?>
    <script src="js/daojishi.js" type="text/javascript"></script>
    <script language=javascript>
        makeRequest('main.php?action=server&uid=<?= $uid ?>&class1=正码1-6&class2=<?= $ids ?>')
    </script>
</body>