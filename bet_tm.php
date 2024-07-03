<?php
if (!defined("KK_VER")) {
    exit("无效的访问");
}
$ids = $_GET['ids'];
switch ($ids) {
    case "特A":
        $ids = "特A";
        break;
    case "特B":
        $ids = "特B";
        break;
    default:
        $ids = "特A";
        break;
}
$XF = 11;
if ($Current_KitheTable[29] == 0 || $Current_KitheTable[$XF] == 0) {
    echo   "<meta http-equiv=\"refresh\" content=\"0;url=main.php?action=stop&uid=$uid&lx=2\">";
    exit;
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
$tm_xx = $tm_xxx = $tmds_xx = $tmds_xxx = $tmdx_xx = $tmdx_xxx = $tmhsds_xx = $tmhsds_xxx = $tmhsdx_xx = $tmhsdx_xxx = $tmwdwx_xx = $tmwdwx_xxx = $tmsb_xx = $tmsb_xx = 0;
$tm_blc = $tmds_blc = $tmdx_blc = $tmhsds_blc = $tmhsdx_blc = $tmwdwx_blc = $tmsb_blc = 0;
$config_ds_temp = get_config_ds();
$user_ds_temp = get_member_ds($uid, $username);
if ($user_ds_temp != "") {
    if ($ids == "特A") {
        $tm_xx = $user_ds_temp['TMA']['xx'];
        $tm_xxx = $user_ds_temp['TMA']['xxx'];
        $tm_blc = $config_ds_temp['TMA'][$blc_lx];
    } else {
        $tm_xx = $user_ds_temp['TMB']['xx'];
        $tm_xxx = $user_ds_temp['TMB']['xxx'];
        $tm_blc = $config_ds_temp['TMB'][$blc_lx];
    }
    $tmds_xx = $user_ds_temp['TMDS']['xx'];
    $tmds_xxx = $user_ds_temp['TMDS']['xxx'];
    $tmds_blc = $config_ds_temp['TMDS'][$blc_lx];
    $tmdx_xx = $user_ds_temp['TMDX']['xx'];
    $tmdx_xxx = $user_ds_temp['TMDX']['xxx'];
    $tmdx_blc = $config_ds_temp['TMDX'][$blc_lx];
    $tmhsds_xx = $user_ds_temp['TMHSDS']['xx'];
    $tmhsds_xxx = $user_ds_temp['TMHSDS']['xxx'];
    $tmhsds_blc = $config_ds_temp['TMHSDS'][$blc_lx];
    $tmhsdx_xx = $user_ds_temp['TMHSDX']['xx'];
    $tmhsdx_xxx = $user_ds_temp['TMHSDX']['xxx'];
    $tmhsdx_blc = $config_ds_temp['TMHSDX'][$blc_lx];
    $tmwdwx_xx = $user_ds_temp['TMWDWX']['xx'];
    $tmwdwx_xxx = $user_ds_temp['TMWDWX']['xxx'];
    $tmwdwx_blc = $config_ds_temp['TMWDWX'][$blc_lx];
    $tmsb_xx = $user_ds_temp['TMSB']['xx'];
    $tmsb_xxx = $user_ds_temp['TMSB']['xxx'];
    $tmsb_blc = $config_ds_temp['TMSB'][$blc_lx];
} ?>
<script>
    var uid = "<?= $uid ?>";
    var xy = "<?= $xy ?>";
    var cs = "<?= $cs ?>";
    var ts = "<?= $ts ?>";
    var ids = "<?= $ids ?>";
    var dq_time = '<?= date("F d, Y H: i: s", strtotime($utime)) ?>';
    var fp_time = '<?= date("F d, Y H: i: s", strtotime($Current_KitheTable[30])) ?>';
    var autotime = "<?= $autotime ?>";
    var lj_time = 1;
    var tm_xx = "<?= $tm_xx ?>";
    var tm_xxx = "<?= $tm_xxx ?>";
    var tm_blc = "<?= $tm_blc ?>";
    var tmds_xx = "<?= $tmds_xx ?>";
    var tmds_xxx = "<?= $tmds_xxx ?>";
    var tmds_blc = "<?= $tmds_blc ?>";
    var tmdx_xx = "<?= $tmdx_xx ?>";
    var tmdx_xxx = "<?= $tmdx_xxx ?>";
    var tmdx_blc = "<?= $tmdx_blc ?>";
    var tmhsds_xx = "<?= $tmhsds_xx ?>";
    var tmhsds_xxx = "<?= $tmhsds_xxx ?>";
    var tmhsds_blc = "<?= $tmhsds_blc ?>";
    var tmhsdx_xx = "<?= $tmhsdx_xx ?>";
    var tmhsdx_xxx = "<?= $tmhsdx_xxx ?>";
    var tmhsdx_blc = "<?= $tmhsdx_blc ?>";
    var tmwdwx_xx = "<?= $tmwdwx_xx ?>";
    var tmwdwx_xxx = "<?= $tmwdwx_xxx ?>";
    var tmwdwx_blc = "<?= $tmwdwx_blc ?>";
    var tmsb_xx = "<?= $tmsb_xx ?>";
    var tmsb_xxx = "<?= $tmsb_xxx ?>";
    var tmsb_blc = "<?= $tmsb_blc ?>";
</script>
<script src="js/function.js" type="text/javascript"></script>
<script src="js/bet_tm.js" type="text/javascript"></script>
<link rel="stylesheet" href="/member/stylesheets/main.css?t=1545056559" type="text/css">
<link rel="stylesheet" href="/member/stylesheets/ball.css?t=1545056559" type="text/css">

<body marginwidth="0" marginheight="0">
    <? include "template/bet_tm.tpl.php"; ?>
    <script src="js/daojishi.js" type="text/javascript"></script>
    <SCRIPT language=javascript>
        makeRequest('main.php?action=server&uid=<?= $uid ?>&class1=特码&class2=<?= $ids ?>')
    </script>
</body>