<?php

if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
$ids = $_GET['ids'];
switch ($ids) {
    case "һФ����":
        $ids = "һФ����";
        break;
    default:
        $ids = "һФ����";
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
$sx_xx = $sx_xxx = $sx_blc = 0;
$config_ds_temp = get_config_ds();
$user_ds_temp = get_member_ds($uid, $username);
if ($user_ds_temp != "") {
    $sx_xx = $user_ds_temp['SX']['xx'];
    $sx_xxx = $user_ds_temp['SX']['xxx'];
    $sx_blc = $config_ds_temp['SX'][$blc_lx];
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
    var sx_xx = "<?= $sx_xx ?>";
    var sx_xxx = "<?= $sx_xxx ?>";
    var sx_blc = "<?= $sx_blc ?>";
</script>
<script src="js/function.js" type="text/javascript"></script>
<script src="js/bet_sx.js" type="text/javascript"></script>
<link rel="stylesheet" href="/member/stylesheets/main.css?t=1545056559" type="text/css">

<body class="bgcoloruserx">
    <? include "template/bet_sx.tpl.php"; ?>
    <script src="js/daojishi.js" type="text/javascript"></script>
    <script language=javascript>
        makeRequest('main.php?action=server&uid=<?= $uid ?>&class1=��Ф&class2=<?= $ids ?>')
    </script>

</body>