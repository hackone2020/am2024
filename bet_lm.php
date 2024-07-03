<?php
if (!defined("KK_VER")) {
    exit("无效的访问");
}
$lx = $_GET['lx'];
$class2 = "";
switch ($lx) {
    case "0":
        $lx = "0";
        $class2 = "四全中";
        break;
    case "1":
        $lx = "1";
        $class2 = "三全中";
        break;
    case "2":
        $lx = "2";
        $class2 = "三中二";
        break;
    case "3":
        $lx = "3";
        $class2 = "二全中";
        break;
    case "4":
        $lx = "4";
        $class2 = "二中特";
        break;
    case "5":
        $lx = "5";
        $class2 = "特串";
        break;
    default:
        $lx = "0";
        $class2 = "四全中";
        break;
}
$XF = 15;
$ids = "连码";
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
$lm4qz_xx = $lm4qz_xxx = $lm4qz_blc = 0;
$lm3qz_xx = $lm3qz_xxx = $lm3qz_blc = 0;
$lm3z2_xx = $lm3z2_xxx = $lm3z2_blc = 0;
$lm2qz_xx = $lm2qz_xxx = $lm2qz_blc = 0;
$lm2zt_xx = $lm2zt_xxx = $lm2zt_blc = 0;
$lmtc_xx = $lmtc_xxx = $lmtc_blc = 0;
$config_ds_temp = get_config_ds();
$user_ds_temp = get_member_ds($uid, $username);
if ($user_ds_temp != "") {
    $lm4qz_xx = $user_ds_temp['LM4QZ']['xx'];
    $lm4qz_xxx = $user_ds_temp['LM4QZ']['xxx'];
    $lm4qz_blc = $config_ds_temp['LM4QZ'][$blc_lx];
    $lm3qz_xx = $user_ds_temp['LM3QZ']['xx'];
    $lm3qz_xxx = $user_ds_temp['LM3QZ']['xxx'];
    $lm3qz_blc = $config_ds_temp['LM3QZ'][$blc_lx];
    $lm3z2_xx = $user_ds_temp['LM3Z2']['xx'];
    $lm3z2_xxx = $user_ds_temp['LM3Z2']['xxx'];
    $lm3z2_blc = $config_ds_temp['LM3Z2'][$blc_lx];
    $lm2qz_xx = $user_ds_temp['LM2QZ']['xx'];
    $lm2qz_xxx = $user_ds_temp['LM2QZ']['xxx'];
    $lm2qz_blc = $config_ds_temp['LM2QZ'][$blc_lx];
    $lm2zt_xx = $user_ds_temp['LM2ZT']['xx'];
    $lm2zt_xxx = $user_ds_temp['LM2ZT']['xxx'];
    $lm2zt_blc = $config_ds_temp['LM2ZT'][$blc_lx];
    $lmtc_xx = $user_ds_temp['LMTC']['xx'];
    $lmtc_xxx = $user_ds_temp['LMTC']['xxx'];
    $lmtc_blc = $config_ds_temp['LMTC'][$blc_lx];
} ?>
<SCRIPT language=javascript>
    var uid = "<?= $uid ?>";
    var xy = "<?= $xy ?>";
    var cs = "<?= $cs ?>";
    var ts = "<?= $ts ?>";
    var ids = "<?= $ids ?>";
    var dq_time = "<?= date("F d,Y H:i:s", strtotime($utime)) ?>";
    var fp_time = "<?= date("F d,Y H:i:s", strtotime($Current_KitheTable['kizm1'])) ?>";
    var autotime = "<?= $autotime * 2 ?>";
    var lj_time = 1;
    var lm4qz_xx = "<?= $lm4qz_xx ?>";
    var lm4qz_xxx = "<?= $lm4qz_xxx ?>";
    var lm4qz_blc = "<?= $lm4qz_blc ?>";
    var lm3qz_xx = "<?= $lm3qz_xx ?>";
    var lm3qz_xxx = "<?= $lm3qz_xxx ?>";
    var lm3qz_blc = "<?= $lm3qz_blc ?>";
    var lm3z2_xx = "<?= $lm3z2_xx ?>";
    var lm3z2_xxx = "<?= $lm3z2_xxx ?>";
    var lm3z2_blc = "<?= $lm3z2_blc ?>";
    var lm2qz_xx = "<?= $lm2qz_xx ?>";
    var lm2qz_xxx = "<?= $lm2qz_xxx ?>";
    var lm2qz_blc = "<?= $lm2qz_blc ?>";
    var lm2zt_xx = "<?= $lm2zt_xx ?>";
    var lm2zt_xxx = "<?= $lm2zt_xxx ?>";
    var lm2zt_blc = "<?= $lm2zt_blc ?>";
    var lmtc_xx = "<?= $lmtc_xx ?>";
    var lmtc_xxx = "<?= $lmtc_xxx ?>";
    var lmtc_blc = "<?= $lmtc_blc ?>";
    var url = "main.php?action=bet_lm&lx=";
</script>
<script src="js/function.js" type="text/javascript"></script>
<script src="js/bet_lm.js" type="text/javascript"></script>
<link rel="stylesheet" href="/member/stylesheets/main.css?t=1545056559" type="text/css">
<link rel="stylesheet" href="/member/stylesheets/ball.css?t=1545056559" type="text/css">

<body marginwidth="0" marginheight="0">
    <? include "template/bet_lm.tpl.php"; ?>
    <script src="js/daojishi.js" type="text/javascript"></script>
    <script language=JAVASCRIPT>
        select_types(<?= $lx ?>);

        function read() {
            makeRequest('main.php?action=server_lm&uid=<?= $uid ?>&class1=连码&class2=' + class2);
        }
    </script>
</body>