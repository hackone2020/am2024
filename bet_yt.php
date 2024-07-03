<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
$class2 = "硬特";
$XF = 15;
$ids = "硬特";
if ($Current_KitheTable[29] == 0 || $Current_KitheTable[$XF] == 0) {
    echo '<meta http-equiv="refresh" content="0;url=main.php?action=stop&uid=" . $uid . "&lx=2">';
    exit;
} ?>
<SCRIPT language=javascript>
    <?
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
    $yt_xx = $yt_xxx = $yt_blc = 0;
    $config_ds_temp = get_config_ds();
    $user_ds_temp = get_member_ds($uid, $username);
    if ($user_ds_temp != "") {
        $yt_xx = $user_ds_temp['YT']['xx'];
        $yt_xxx = $user_ds_temp['YT']['xxx'];
        $yt_blc = $config_ds_temp['YT'][$blc_lx];
    }
    ?>
    var uid = "<?= $uid ?>";
    var xy = "<?= $xy ?>";
    var cs = "<?= $cs ?>";
    var ts = "<?= $ts ?>";
    var ids = "<?= $ids ?>";
    var dq_time = "<?= date("F d, Y H: i: s", strtotime($utime)) ?>";
    var fp_time = "<?= date("F d, Y H: i: s", strtotime($Current_KitheTable['kizm1'])) ?>";
    var autotime = "<?= $autotime * 2 ?>";
    var lj_time = 1;
    var yt_xx = "<?= $yt_xx ?>";
    var yt_xxx = "<?= $yt_xxx ?>";
    var yt_blc = "<?= $yt_blc ?>";
</SCRIPT>
<script src="js/function.js" type="text/javascript"></script>
<script src="js/bet_yt.js" type="text/javascript"></script>
<link rel="stylesheet" href="/member/stylesheets/main.css?t=1545056559" type="text/css">

<body class="bgcoloruserx">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td valign="middle"></td>
            <td valign="top">
                <div style="margin-left:10px; margin-top:6px;">
                    <table border="0" cellpadding="0" cellspacing="0" width="685">
                        <tr>
                            <td>
                                <div class="main">
                                    <div>
                                        <table cellpadding="0px" cellspacing="0px" width="685px">
                                            <tr>
                                                <td class="maintd1">
                                                </td>
                                                <td class="maintd2">
                                                    <table cellpadding="0px" cellspacing="0px" width="99%" border="0">
                                                        <tr>
                                                            <td class="typename" id="typestr">"
                                                                <?= $ids ?>"
                                                            </td>
                                                            <td id="ctl00_ContentPlaceHolder1_wucshijian1_issuetime" style="color: #ffeaaa; font-size: 12px;">"
                                                                <?= $Current_Kithe_Num ?>"期
                                                            </td>

                                                            <td style="font-size: 12px;" class="shijiancolor">距截止下注还有：
                                                                <span style="font-size: 12px; font-weight: bold;" class="shijiancolor" id="daojishi"></span>
                                                            </td>
                                                            <td style="font-size: 12px; width: 40px; display:none;">
                                                                <input type="button" value="更新" id="loadodds" class="btn1" />
                                                            </td>
                                                            <td style="font-size: 12px; width:40px; padding-left:4px;" class="shijian" "color2">
                                                                <span id="loadingnumber" style="font-size: 16px; font-weight: bold;display: none;">"
                                                                    <?= $autotime / 1000 ?>
                                                                </span>
                                                                <span id="loadingimg">
                                                                    <img src="images/loading1.gif" alt="加载中..." />
                                                                </span>
                                                            </td>
                                                            <td align="right" valign="middle">&nbsp;
                                                            </td>
                                                            <td>&nbsp;</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td class="maintd3">
                                                </td>
                                            </tr>
                                        </table>
                                        <form target="leftFrame" name="form1" method="post" action="main.php?action=bet_n9&uid=" <?= $uid ?>"&ids="
                                            <?= $ids ?>" &class2="
                                            <?= $class2 ?>" onSubmit="return ChkSubmit()">
                                            <div class="maindiv1">
                                                <script src="js/member/bet_yt.js" type="text/javascript"></script>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
            <td>
            </td>
        </tr>
    </table>
    <script src="js/daojishi.js" type="text/javascript"></script>
    <script language=JAVASCRIPT>
        makeRequest('main.php?action=server&uid="<?= $uid ?>"&class1=硬特&class2=硬特');
    </script>
</body>