<?php

header("Cache-Control: no-cache， must-revalidate");
require_once "../include/global.php";
require_once "../include/function.php";
ignore_user_abort(TRUE);
if ($opwww == 1) {
    echo "<script>window.open('close.php','_top')</script>";
    exit;
}
?>
<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>LOGIN</title>
</HEAD>
<?
if ($_GET['action'] != "list_look" && $_GET['action'] != "user_log") {
    echo "<script>if(self == top) location='/'</script>";
}
$uid = $_GET['uid'];
$vip = $_GET['vip'];
$action = $_GET['action'];
if (!preg_match("/^[0-9a-zA-Z\\_]*\$/", $uid)) {
    echo "UID error!!";
    exit;
}
if ($uid != "" && $vip != "") {
    if ($vip == 0) {
        $sql = "select id,kauser,cs,lx,online,report,dagu,guan,zong from web_agent where uid='{$uid}' and stat=0 LIMIT 1";
        $result = $db1->query($sql);
        $row = $result->fetch_assoc();
        $cou = $result->num_rows;
        if ($cou == 0) {
            echo "<script>window.open('index.php','_top')</script>";
            echo "</HTML>";
            exit;
        }
        $kauser = $row['kauser'];
        $kauserid = $row['id'];
        $cs = $row['cs'];
        $lx = $row['lx'];
        $online = $row['online'];
        $rball = $row['report'];
        $zong = $row['zong'];
        $guan = $row['guan'];
        $dagu = $row['dagu'];
    } else {
        $sql = "select id,kauser,guan,flag from web_agent_zi where uid='{$uid}' LIMIT 1";
        $result = $db1->query($sql);
        $row = $result->fetch_array();
        $cou = $result->num_rows;
        if ($cou == 0) {
            echo "<script>window.open('index.php','_top')</script>";
            echo "</HTML>";
            exit;
        }
        $kazi = $row['kauser'];
        $kaziid = $row['id'];
        $kauser = $row['guan'];
        $flag = $row['flag'];
        $result = $db1->query("select id,kauser,cs,stat,lx,online,report,dagu,guan,zong from web_agent  where kauser='" . $kauser . "' order by id desc LIMIT 1");
        $row = $result->fetch_array();
        $cou = $result->num_rows;
        if ($cou == 0) {
            echo "<script>window.open('index.php','_top')</script>";
            echo "</HTML>";
            exit;
        }
        $kauserid = $row['id'];
        $cs = $row['cs'];
        $stat = $row['stat'];
        $lx = $row['lx'];
        $online = $row['online'];
        $rball = $row['report'];
        $zong = $row['zong'];
        $guan = $row['guan'];
        $dagu = $row['dagu'];
        $vvv = " 1=2 ";
        if ($zong != "") {
            $vvv .= " or kauser='" . $zong . "'";
        }
        if ($guan != "") {
            $vvv .= " or kauser='" . $guan . "'";
        }
        if ($dagu != "") {
            $vvv .= " or kauser='" . $dagu . "'";
        }
        if ($stat == 1) {
            echo "<script>alert('对不起,您的主账号已停用!');window.open('index.php','_top')</script>";
            exit;
        }
        $result = $db1->query("select count(*) from web_agent  where (" . $vvv . ") and stat=1  order by id desc");
        $num1 = $result->fetch_array();
        $num=$num1[0];
        if ($num != 0) {
            echo "<script>alert('对不起,您的主账号已停用!');window.open('index.php','_top')</script>";
            exit;
        }
        $result = $db1->query("select count(*) from web_agent  where (" . $vvv . ") and stat=1  order by id desc");
        $num1=$result->fetch_array();
        $num = $num1[0];
        if ($num != 0) {
            echo "<script>alert('对不起,您的主账号已停用!');window.open('index.php','_top')</script>";
            exit;
        }
    }
} else {
    echo "<script>window.open('index.php','_top')</script>";
    echo "</HTML>";
    exit;
}
if ($kauser && in_array($action, array("header", "logout", "passwd", "history", "online", "user", "user_log", "user_online", "user_zi", "web_kithe_list", "report", "report_class", "report_class_gs", "report_m1", "report_m2", "report_m3", "report_m4", "report_m5", "report_m6", "report_m6_gs", "user_guan_list", "user_guan_add", "user_guan_edit", "user_guan_set", "user_zong_list", "user_zong_add", "user_zong_edit", "user_zong_set", "user_dai_list", "user_dai_add", "user_dai_edit", "user_dai_set", "user_mem_list", "user_mem_add", "user_mem_edit", "user_mem_set", "user_mem_zs_list", "user_mem_zs_add", "user_mem_zs_edit", "user_mem_zs_set", "check", "list_all", "server_all", "list_look", "list_set", "list_tm", "server_tm", "list_bb", "server_bb", "list_zm", "server_zm", "list_sx", "server_sx", "list_ws", "server_ws", "list_tmsx", "server_tmsx", "list_zt", "server_zt", "list_zm6", "server_zm6", "list_sx6", "server_sx6", "list_gg", "server_gg", "list_lm", "server_lm", "list_lm_show", "list_bz", "server_bz", "list_bz_show", "list_sxl", "server_sxl", "list_sxl_show", "list_wsl", "server_wsl", "list_wsl_show", "real_list", "real_list_wai", "list_dzy", "server_dzy", "list_dzy_show", "list_yt", "server_yt"))) {
    if (!in_array($action, array("header", "logout", "passwd", "history", "online", "user", "user_log", "user_online", "user_zi", "web_kithe_list", "user_guan_list", "user_guan_add", "user_guan_edit", "user_guan_set", "user_zong_list", "user_zong_add", "user_zong_edit", "user_zong_set", "user_dai_list", "user_dai_add", "user_dai_edit", "user_dai_set", "user_mem_list", "user_mem_add", "user_mem_edit", "user_mem_set", "user_mem_zs_list", "user_mem_zs_add", "user_mem_zs_edit", "user_mem_zs_set", "check")) && (0 < $web_status || $report_of == 1)) {
        require_once "busy.php";
        exit;
    }
    require_once $action.".php";
    echo "</HTML>";
    exit;
}?>