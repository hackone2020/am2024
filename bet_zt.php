<?php
if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
$ids = $_GET['ids'];
switch ($ids) {
    case "��1��":
        $ids = "��1��";
        break;
    case "��2��":
        $ids = "��2��";
        break;
    case "��3��":
        $ids = "��3��";
        break;
    case "��4��":
        $ids = "��4��";
        break;
    case "��5��":
        $ids = "��5��";
        break;
    case "��6��":
        $ids = "��6��";
        break;
    default:
        $ids = "��1��";
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
$zt_xx = $zt_xxx = $zt_blc = 0;
$config_ds_temp = get_config_ds();
$user_ds_temp = get_member_ds($uid, $username);
if ($user_ds_temp != "") {
    $zt_xx = $user_ds_temp['ZT']['xx'];
    $zt_xxx = $user_ds_temp['ZT']['xxx'];
    $zt_blc = $config_ds_temp['ZT'][$blc_lx];
}
?>
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
    var zt_xx = "<?= $zt_xx ?>";
    var zt_xxx = "<?= $zt_xxx ?>";
    var zt_blc = "<?= $zt_blc ?>";
</script>
<script src="js/function.js" type="text/javascript"></script>
<script src="js/bet_zt.js" type="text/javascript"></script>
<script language=javascript>
    function onLoad() {
        var obj_ids = $("ids");
        obj_ids.value = "<?= $ids ?>";
    }
</script>

<link rel="stylesheet" href="/member/stylesheets/main.css?t=1545056559" type="text/css">
<link rel="stylesheet" href="/member/stylesheets/ball.css?t=1545056559" type="text/css">

<body class="bgcoloruserx" onLoad="onLoad();">
    <? include "template/bet_zt.tpl.php"; ?>
    <script src="js/daojishi.js" type="text/javascript"></script>
    <script language=javascript>
        makeRequest('main.php?action=server&uid=<?= $uid ?>&class1=����&class2=<?= $ids ?>')
    </script>
</body>