<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
$dai_temp = get_agent($uid, $dai);
$zong_temp = get_agent($uid, $zong);
$guan_temp = get_agent($uid, $guan);
$dagu_temp = get_agent($uid, $dagu);
if ($dagu_temp['pz'] == 0) {
    $pz = 0;
    $pzall = $dagu_temp['pzall'];
    if ($pzall == 3) {
        $zong_zf_zc = $dai_temp['zc'];
        $guan_zf_zc = $zong_temp['zc'];
        $dagu_zf_zc = $guan_temp['zc'];
    } else {
        $zong_zf_zc = 0;
        $guan_zf_zc = 0;
        $dagu_zf_zc = 0;
    }
    $zc_all = $dagu_temp['zc_all'];
} else {
    $pz = 1;
}