<?php

if (!defined("KK_VER")) {
    exit("ÎÞÐ§µÄ·ÃÎÊ");
}
$ids = $_GET['ids'];
switch ($ids) {
    case "°ë²¨":
        $ids = "°ë²¨";
        break;
        break;
    default:
        $ids = "°ë²¨";
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
$bb_xx = $bb_xxx = $bb_blc = 0;
$config_ds_temp = get_config_ds();
$user_ds_temp = get_member_ds($uid, $username);
if ($user_ds_temp != "") {
    $bb_xx = $user_ds_temp['TMBB']['xx'];
    $bb_xxx = $user_ds_temp['TMBB']['xxx'];
    $bb_blc = $config_ds_temp['TMBB'][$blc_lx];
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
    var bb_xx = "<?= $bb_xx ?>";
    var bb_xxx = "<?= $bb_xxx ?>";
    var bb_blc = "<?= $bb_blc ?>";
</script>
<script src="js/function.js" type="text/javascript"></script>
<script src="js/bet_bb.js" type="text/javascript"></script>
<link rel="stylesheet" href="/member/stylesheets/main.css?t=1545056559" type="text/css">
<link rel="stylesheet" href="/member/stylesheets/ball.css?t=1545056559" type="text/css">

<body marginwidth="0" marginheight="0">
    <? include "template/bet_bb.tpl.php"; ?>
    <script src="js/daojishi.js" type="text/javascript"></script>
    <SCRIPT language=javascript>
        makeRequest('main.php?action=server&uid=<?= $uid ?>&class1=°ë²¨&class2=<?= $ids ?>')
    </script>
</body>