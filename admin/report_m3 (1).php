<?php

if (!defined("KK_VER")) {
    exit("ÎÞÐ§µÄ·ÃÎÊ");
}
if (strpos($flag, "09")) {
} else {
    echo "<center>ÄãÃ»ÓÐ¸ÃÈ¨ÏÞ¹¦ÄÜ!</center>";
    exit;
}
$gtype = $_GET['gtype'];
$user = $_GET['user'];
$vvv = " ";
if ($user == "") {
    echo "<script>alert('ÓÃ»§²»ÄÜÎª¿Õ!ÇëÖØÐÂ²éÑ¯');window.location.href='main.php?action=report&uid=" . $uid . "';</script>";
    exit;
}
if ($_GET['date_start'] != "") {
    $date_start = $_GET['date_start'];
} else {
    $date_start = date("Y-m-d");
}
if ($_GET['date_end'] != "") {
    $date_end = $_GET['date_end'];
} else {
    $date_end = date("Y-m-d");
}
$stime = $date_start . " 00:00:00";
$etime = $date_end . " 23:59:59";
if ($_GET['kithe'] != "") {
    $kithe = $_GET['kithe'];
    $vvv .= " and kithe='" . $kithe . "'";
} else {
    $kithe = "";
    $vvv .= " and adddate>='" . $stime . "' and adddate<='" . $etime . "' ";
}
$tb_name = "";
if ($Current_KitheTable[29] != 0 && $kithe == $Current_Kithe_Num) {
    $tb_name = "web_tan";
} else {
    $tb_name = "web_tans";
}
if ($kithe == "") {
    if ($Current_KitheTable[29] != 0 && $date_start == date("Y-m-d")) {
        $tb_name = "web_tan";
    } else {
        $tb_name = "web_tans";
    }
}
if ($gtype != "") {
    $vvv .= " and ds_lb='" . $gtype . "' ";
    $result = mysql_query("select ds from web_config_ds where ds_lb='" . $gtype . "' order by id desc LIMIT 1");
    $ds_row = mysql_fetch_array($result);
    $class2 = $ds_row['ds'];
} else {
    $class2 = "";
}
$z_zs1 = $z_zs2 = $z_zs3 = 0;
$z_sum1 = $z_sum2 = $z_sum3 = 0;
$z_guan1 = $z_guan2 = $z_guan3 = 0;
$z_dagu1 = $z_dagu2 = $z_dagu3 = 0;
$z_gs1 = $z_gs2 = $z_gs3 = 0;
$z_userds1 = $z_userds2 = $z_userds3 = 0;
$z_daguds1 = $z_daguds2 = $z_daguds3 = 0;
$z_guands1 = $z_guands2 = $z_guands3 = 0;
$z_usersf1 = $z_usersf2 = $z_usersf3 = 0;
$z_guansf1 = $z_guansf2 = $z_guansf3 = 0;
$z_dagusf1 = $z_dagusf2 = $z_dagusf3 = 0;
$z_gssf1 = $z_gssf2 = $z_gssf3 = 0;
echo "<link rel=\"stylesheet\" href=\"css/control_main.css\" type=\"text/css\">\r\n";
echo "<s";
echo "tyle type=\"text/css\">\r\n<!--\r\n.m_title_reag { background-color: #687780; text-align: center; color: #FFFFFF}\r\n-->\r\n</style>\r\n";
echo "<s";
echo "cript src=\"js/function.js\" type=\"text/javascript\"></script>\r\n";
echo "<s";
echo "cript src=\"js/report_func.js\" type=\"text/javascript\"></script>\r\n<body bgcolor=\"#FFFFFF\" text=\"#000000\" leftmargin=\"0\" topmargin=\"0\" vlink=\"#0000FF\" alink=\"#0000FF\">\r\n<table width=\"960\" height=\"24\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n  \r\n    <td width=\"54\" height=\"24\" class=\"m_tline\">±¨±í²éÑ¯</td>\r\n      <td width=\"775\" class=\"m_tline\"><font color=\"#CC0000\">µ±Ç°²éÑ¯</font>--\r\n        ";
if ($kithe != "") {
    echo "        µÚ\r\n        ";
    echo $kithe;
    echo "        ÆÚ\r\n        ";
} else {
    echo "        ÈÕÆÚÇø¼ä£º\r\n        ";
    echo $date_start;
    echo "        ~\r\n        ";
    echo $date_end;
    echo "        ";
}
echo "        &nbsp;&nbsp;ÀàÐÍ:\r\n        ";
if ($class2 != "") {
    echo $class2;
} else {
    echo "È«²¿";
}
echo "        &nbsp;&nbsp;(ÒÔÏÂËùÓÐ½á¹û¾ù°üº¬ÍËË®)\r\n        &nbsp;&nbsp;¹É¶«:\r\n        ";
echo $user;
echo "        --<a href=\"javascript:history.go( -1 );\">»ØÉÏÒ»Ò³</a> -- <a href=\"main.php?action=report&uid=";
echo $uid;
echo "\">»Ø±¨±í²éÑ¯</a>\r\n      </td>\r\n      <td width=\"40\"><img src=\"images/top_04.gif\" width=\"30\" height=\"24\" /></td>\r\n  </tr>\r\n</table>\r\n<table width=\"960\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n  <tr>\r\n    <td>&nbsp;</td>\r\n  </tr>\r\n</table>\r\n";
$result = mysql_query("SELECT zong,sum(sz) as zs,sum(sum_m) as sum_m,sum(user_sf) usersf,sum(user_sq) user_ds,sum(dai_sq) dai_ds,sum(zong_sq) zong_ds,sum(guan_sq) guan_ds,sum(guanzc) as guanzc,sum(guan_sf) as guansf,sum(daguzc) as daguzc,sum(dagu_sf) as dagusf,sum(gszc) as gszc,sum(gs_sf) as gssf FROM " . $tb_name . "  WHERE guan='" . $user . "' and dai!='" . $user . "' and username!='" . $user . "' " . $vvv . " group by zong order by zong DESC");
$ii = 0;
if (mysql_num_rows($result) != 0) {
    echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"#000000\" class=\"m_tab\"  width=\"960\">\r\n  <tr class=\"m_title_reag\">\r\n    <td height=\"18\" colspan=\"11\" align=\"center\" nowrap=\"nowrap\" >ÏÂ¼¶×Ü´úÀí×¢µ¥</td>\r\n  </tr>\r\n  <tr class=\"m_title_reag\">\r\n    <td height=\"18\" align=\"center\" nowrap=\"nowrap\" >ÐòºÅ</td>\r\n    <td align=\"center\">×Ü´úÀí</td>\r\n    <td align=\"center\">×éÊý</td>\r\n    <td align=\"center\">ÏÂ×¢½ð¶";
    echo "î</td>\r\n    <td align=\"center\">½á¹û</td>\r\n    <td align=\"center\">ÍËË®</td>\r\n    <td align=\"center\">¹É¶«Õ¼³É½ð¶î</td>\r\n    <td align=\"center\">¹É¶«×¬Ë®</td>\r\n    <td align=\"center\" bgcolor=\"#CC0000\">¹É¶«½á¹û</td>\r\n    <td align=\"center\" >Óë×Ü´úÀí½»ÊÕ</td>\r\n    <td align=\"center\" >Óë´ó¹É¶«½»ÊÕ</td>\r\n  </tr>\r\n";
    while ($rs = mysql_fetch_array($result)) {
        $sum_m = $usersf = $guansf = $dagusf = $gssf = $userds = $guands = $daguds = $guanzc = $daguzc = $gszc = 0;
        ++$ii;
        $z_zs1 += $rs['zs'];
        $sum_m = $rs['sum_m'];
        $z_sum1 += $sum_m;
        $usersf = $rs['usersf'] + $rs['dai_ds'] + $rs['zong_ds'];
        $z_usersf1 += $usersf;
        $userds = $rs['user_ds'] + $rs['dai_ds'] + $rs['zong_ds'];
        $z_userds1 += $userds;
        $guanzc = $rs['guanzc'];
        $z_guan1 += $guanzc;
        $guansf = $rs['guansf'];
        $z_guansf1 += $guansf;
        $guands = $rs['guan_ds'];
        $z_guands1 += $guands;
        $daguzc = $rs['daguzc'];
        $z_dagu1 += $daguzc;
        $dagusf = $rs['dagusf'];
        $z_dagusf1 += $dagusf;
        $daguds = $rs['dagu_ds'];
        $z_daguds1 += $daguds;
        $gszc = $rs['gszc'];
        $z_gs1 += $gszc;
        $gssf = $rs['gssf'];
        $z_gssf1 += $gssf;
        $result2 = mysql_query("select * from web_agent where  kauser='" . $rs['zong'] . "' order by id LIMIT 1");
        $row11 = mysql_fetch_array($result2);
        if ($row11 != "") {
            $xm = "<font color=#cc0000> (" . $row11['xm'] . ")</font>";
        } else {
            $xm = "";
        }
        echo "  <tr class=\"m_rig\" onMouseOver=\"setPointer(this, 0, 'over', '#FFFFFF', '#FFCC66', '#FFCC99');\" onMouseOut=\"setPointer(this, 0, 'out', '#FFFFFF', '#FFCC66', '#FFCC99');\">\r\n    <td height=\"28\" align=\"center\" nowrap=\"nowrap\">";
        echo $ii;
        echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
        echo $rs['zong'];
        echo $xm;
        echo "\t</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
        echo $rs['zs'];
        echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\"><a href='main.php?action=report_m4&uid=";
        echo $uid;
        echo "&kithe=";
        echo $kithe;
        echo "&user=";
        echo $rs['zong'];
        echo "&date_start=";
        echo $date_start;
        echo "&date_end=";
        echo $date_end;
        echo "&gtype=";
        echo $gtype;
        echo "' >\r\n    ";
        echo round($sum_m, 2);
        echo "</a>    </td>\r\n    <td height=\"28\" align=\"center\" nowrap=\"nowrap\">";
        echo round($usersf, 2);
        echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
        echo round($userds, 2);
        echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
        echo round($guanzc, 2);
        echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
        echo round($guands, 2);
        echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
        echo round($guansf, 2);
        echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
        echo get_sf(round($guansf + $dagusf + $gssf, 2));
        echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">\r\n      ";
        echo get_sf(round(0 - $gssf - $dagusf, 2));
        echo "    </td>\r\n  </tr>\r\n";
    }
    echo "  <tr class=\"m_rig_re\">\r\n    <td height=\"18\" align=\"center\" nowrap=\"nowrap\">&nbsp;</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">×Ü¼Æ</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">\r\n      ";
    echo $z_zs1;
    echo "    </td>\r\n    <td align=\"center\" nowrap=\"nowrap\">\r\n      ";
    echo $z_sum1;
    echo "    </td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
    echo round($z_usersf1, 2);
    echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">\r\n      ";
    echo round($z_userds1, 2);
    echo "    </td>\r\n    <td align=\"center\" nowrap=\"nowrap\">\r\n      ";
    echo round($z_guan1, 2);
    echo "    </td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
    echo round($z_guands1, 2);
    echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
    echo round($z_guansf1, 2);
    echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
    echo get_sf(round($z_guansf1 + $z_dagusf1 + $z_gssf1, 2));
    echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
    echo get_sf(round(0 - $z_gssf1 - $z_dagusf1, 2));
    echo "</td>\r\n  </tr>\r\n</table>\r\n<br>\r\n";
}
$result = mysql_query("SELECT username,sum(sz) as zs,sum(sum_m) as sum_m,sum(user_sf) usersf,sum(user_sq) user_ds,sum(dai_sq) dai_ds,sum(dagu_sq) dagu_ds,sum(guanzc) as guanzc,sum(guan_sf) as guansf,sum(daguzc) as daguzc,sum(dagu_sf) as dagusf,sum(gszc) as gszc,sum(gs_sf) as gssf FROM " . $tb_name . "  WHERE guan='" . $user . "' and dai='" . $user . "' and username!='" . $user . "' " . $vvv . " group by username order by username DESC");
$ii = 0;
if (mysql_num_rows($result) != 0) {
    echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"#000000\" class=\"m_tab\"  width=\"960\">\r\n  <tr class=\"m_title_reag\">\r\n    <td height=\"18\" colspan=\"11\" nowrap=\"nowrap\">Ö±Êô»áÔ±½á¹û</td>\r\n  </tr>\r\n  <tr class=\"m_title_reag\"s>\r\n    <td height=\"18\" align=\"center\" nowrap=\"nowrap\" >ÐòºÅ</td>\r\n    <td align=\"center\">»áÔ±</td>\r\n    <td align=\"center\">×éÊý</td>\r\n    <td align=\"center\">ÏÂ×¢½ð¶î</td>\r\n    <td align";
    echo "=\"center\">½á¹û</td>\r\n    <td align=\"center\">ÍËË®</td>\r\n    <td align=\"center\">¹É¶«Õ¼³É½ð¶î</td>\r\n    <td align=\"center\">¹É¶«×¬Ë®</td>\r\n    <td align=\"center\" bgcolor=\"#CC0000\">¹É¶«½á¹û</td>\r\n    <td align=\"center\">Óë»áÔ±½»ÊÕ</td>\r\n    <td align=\"center\">Óë´ó¹É¶«½»ÊÕ</td>\r\n  </tr>\r\n";
    while ($rs = mysql_fetch_array($result)) {
        $sum_m = $usersf = $guansf = $dagusf = $gssf = $userds = $guands = $daguds = $guanzc = $daguzc = $gszc = 0;
        ++$ii;
        $z_zs2 += $rs['zs'];
        $sum_m = $rs['sum_m'];
        $z_sum2 += $sum_m;
        $usersf = $rs['usersf'];
        $z_usersf2 += $usersf;
        $userds = $rs['user_ds'];
        $z_userds2 += $userds;
        $guanzc = $rs['guanzc'];
        $z_guan2 += $guanzc;
        $guansf = $rs['guansf'] + $rs['dai_ds'];
        $z_guansf2 += $guansf;
        $guands = $rs['dai_ds'];
        $z_guands2 += $guands;
        $daguzc = $rs['daguzc'];
        $z_dagu2 += $daguzc;
        $dagusf = $rs['dagusf'];
        $z_dagusf2 += $dagusf;
        $daguds = $rs['dagu_ds'];
        $z_daguds2 += $daguds;
        $gszc = $rs['gszc'];
        $z_gs2 += $gszc;
        $gssf = $rs['gssf'];
        $z_gssf2 += $gssf;
        $result2 = mysql_query("select * from web_member where  kauser='" . $rs['username'] . "' order by id LIMIT 1");
        $row11 = mysql_fetch_array($result2);
        if ($row11 != "") {
            $xm = "<font color=#cc0000> (" . $row11['xm'] . ")</font>";
        } else {
            $xm = "";
        }
        echo "   <tr class=\"m_rig\" onMouseOver=\"setPointer(this, 0, 'over', '#FFFFFF', '#FFCC66', '#FFCC99');\" onMouseOut=\"setPointer(this, 0, 'out', '#FFFFFF', '#FFCC66', '#FFCC99');\">\r\n    <td height=\"28\" align=\"center\" nowrap=\"nowrap\">";
        echo $ii;
        echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
        echo $rs['username'];
        echo "    ";
        echo $xm;
        echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
        echo $rs['zs'];
        echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\"><a href='main.php?action=report_m6&uid=";
        echo $uid;
        echo "&kithe=";
        echo $kithe;
        echo "&user=";
        echo $rs['username'];
        echo "&date_start=";
        echo $date_start;
        echo "&date_end=";
        echo $date_end;
        echo "&gtype=";
        echo $gtype;
        echo "' >\r\n    ";
        echo round($sum_m, 2);
        echo "</a></td>\r\n    <td height=\"28\" align=\"center\" nowrap=\"nowrap\">";
        echo round($usersf, 2);
        echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
        echo round($userds, 2);
        echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
        echo round($guanzc, 2);
        echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
        echo round($guands, 2);
        echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
        echo round($guansf, 2);
        echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
        echo get_sf(round($dagusf + $gssf + $guansf, 2));
        echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
        echo get_sf(round(0 - $gssf - $dagusf, 2));
        echo "</td>\r\n  </tr>\r\n";
    }
    echo "  <tr class=\"m_rig_re\">\r\n    <td height=\"18\" align=\"center\" nowrap=\"nowrap\">&nbsp;</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">×Ü¼Æ</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">\r\n      ";
    echo round($z_zs2, 2);
    echo "    </td>\r\n    <td align=\"center\" nowrap=\"nowrap\">\r\n      ";
    echo round($z_sum2, 2);
    echo "    </td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
    echo round($z_usersf2, 2);
    echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">\r\n      ";
    echo round($z_userds2, 2);
    echo "    </td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
    echo round($z_guan2, 2);
    echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
    echo round($z_guands2, 2);
    echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
    echo round($z_guansf2, 2);
    echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
    echo get_sf(round($z_guansf2 + $z_dagusf2 + $z_gssf2, 2));
    echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
    echo get_sf(round(0 - $z_gssf2 - $z_dagusf2, 2));
    echo "</td>\r\n  </tr>\r\n</table>\r\n<br>\r\n";
}
$result = mysql_query("SELECT username,sum(sz) as zs,sum(sum_m) as sum_m,sum(user_sf) usersf,sum(user_sq) user_ds,sum(dagu_sq) dagu_ds,sum(daguzc) as daguzc,sum(dagu_sf) as dagusf,sum(gszc) as gszc,sum(gs_sf) as gssf FROM " . $tb_name . "  WHERE lx=3 and username='" . $user . "' " . $vvv . " group by username order by username DESC");
$ii = 0;
if (mysql_num_rows($result) != 0) {
    echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"#000000\" class=\"m_tab\"  width=\"960\">\r\n  <tr class=\"m_title_reag\">\r\n    <td height=\"18\" colspan=\"7\" nowrap=\"nowrap\">¹É¶«²¹»õ×ß·É½á¹û</td>\r\n  </tr>\r\n  <tr class=\"m_title_reag\"s>\r\n    <td height=\"18\" align=\"center\" nowrap=\"nowrap\" >ÐòºÅ</td>\r\n    <td align=\"center\">¹É¶«</td>\r\n    <td align=\"center\">×éÊý</td>\r\n    <td align=\"center\">ÏÂ×¢½ð¶î</td>\r\n    <td al";
    echo "ign=\"center\" bgcolor=\"#CC0000\">¹É¶«½á¹û</td>\r\n    <td align=\"center\">ÍËË®</td>\r\n    <td align=\"center\">Óë´ó¹É¶«½»ÊÕ</td>\r\n  </tr>\r\n";
    while ($rs = mysql_fetch_array($result)) {
        $sum_m = $usersf = $guansf = $dagusf = $gssf = $userds = $guands = $daguds = $daguzc = $gszc = 0;
        ++$ii;
        $z_zs3 += $rs['zs'];
        $sum_m = $rs['sum_m'];
        $z_sum3 += $sum_m;
        $usersf = $rs['usersf'];
        $z_usersf3 += $usersf;
        $userds = $rs['user_ds'];
        $z_userds3 += $userds;
        $guansf = $usersf;
        $z_guansf3 += $guansf;
        $guands = $userds;
        $daguzc = $rs['daguzc'];
        $z_dagu3 += $daguzc;
        $dagusf = $rs['dagusf'];
        $z_dagusf3 += $dagusf;
        $daguds = $rs['dagu_ds'];
        $z_daguds3 += $daguds;
        $gszc = $rs['gszc'];
        $z_gs3 += $gszc;
        $gssf = $rs['gssf'];
        $z_gssf3 += $gssf;
        echo "   <tr class=\"m_rig\" onMouseOver=\"setPointer(this, 0, 'over', '#FFFFFF', '#FFCC66', '#FFCC99');\" onMouseOut=\"setPointer(this, 0, 'out', '#FFFFFF', '#FFCC66', '#FFCC99');\">\r\n    <td height=\"28\" align=\"center\" nowrap=\"nowrap\">";
        echo $ii;
        echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
        echo $rs['username'];
        echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
        echo $rs['zs'];
        echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\"><a href='main.php?action=report_m6&uid=";
        echo $uid;
        echo "&kithe=";
        echo $kithe;
        echo "&user=";
        echo $rs['username'];
        echo "&date_start=";
        echo $date_start;
        echo "&date_end=";
        echo $date_end;
        echo "&gtype=";
        echo $gtype;
        echo "&lx=3' >\r\n    ";
        echo round($sum_m, 2);
        echo "</a></td>\r\n    <td height=\"28\" align=\"center\" nowrap=\"nowrap\">";
        echo round($usersf, 2);
        echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
        echo round($userds, 2);
        echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
        echo get_sf(round(0 - $gssf - $dagusf, 2));
        echo "</td>\r\n  </tr>\r\n";
    }
    echo "  <tr class=\"m_rig_re\">\r\n    <td height=\"18\" align=\"center\" nowrap=\"nowrap\">&nbsp;</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">×Ü¼Æ</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">\r\n      ";
    echo round($z_zs3, 2);
    echo "    </td>\r\n    <td align=\"center\" nowrap=\"nowrap\">\r\n      ";
    echo round($z_sum3, 2);
    echo "    </td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
    echo round($z_usersf3, 2);
    echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">\r\n      ";
    echo round($z_userds3, 2);
    echo "    </td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
    echo get_sf(round(0 - $z_gssf3 - $z_dagusf3, 2));
    echo "</td>\r\n  </tr>\r\n</table>\r\n<br>\r\n";
}
if ($z_zs1 != 0 || $z_zs2 != 0 || $z_zs3 != 0) {
    echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"#000000\" class=\"m_tab\"  width=\"960\">\r\n  <tr class=\"m_title_reag\">\r\n    <td height=\"18\" colspan=\"9\" nowrap=\"nowrap\">×Ü¼Æ</td>\r\n  </tr>\r\n  <tr class=\"m_title_reag\">\r\n    <td height=\"18\" align=\"center\">×éÊý</td>\r\n    <td align=\"center\">ÏÂ×¢½ð¶î</td>\r\n    <td align=\"center\">½á¹û</td>\r\n    <td align=\"center\">ÍËË®</td>\r\n    <td align=\"center\">¹É¶«Õ¼³É</td>\r\n   ";
    echo " <td align=\"center\">¹É¶«×¬Ë®</td>\r\n    <td align=\"center\" bgcolor=\"#CC0000\">¹É¶«½á¹û</td>\r\n    <td align=\"center\">ÓëÏÂ¼¶½»ÊÕ</td>\r\n    <td align=\"center\">Óë´ó¹É¶«½»ÊÕ</td>\r\n  </tr>\r\n  <tr class=\"m_rig_re\">\r\n    <td height=\"18\" align=\"center\" nowrap=\"nowrap\">\r\n      ";
    echo round($z_zs1 + $z_zs2 + $z_zs3, 2);
    echo "    </td>\r\n    <td align=\"center\" nowrap=\"nowrap\">\r\n      ";
    echo round($z_sum1 + $z_sum2 + $z_sum3, 2);
    echo "    </td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
    echo round($z_usersf1 + $z_usersf2 + $z_usersf3, 2);
    echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">\r\n      ";
    echo round($z_userds1 + $z_userds2 + $z_userds3, 2);
    echo "    </td>\r\n    <td align=\"center\" nowrap=\"nowrap\">\r\n      ";
    echo round($z_guan1 + $z_guan2 - $z_sum3, 2);
    echo "    </td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
    echo round($z_guands1 + $z_guands2, 2);
    echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
    echo round($z_guansf1 + $z_guansf2 + $z_guansf3, 2);
    echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
    echo get_sf(round($z_guansf1 + $z_dagusf1 + $z_gssf1, 2) + round($z_guansf2 + $z_dagusf2 + $z_gssf2, 2));
    echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
    echo get_sf(round(0 - $z_gssf1 - $z_dagusf1, 2) + round(0 - $z_gssf2 - $z_dagusf2, 2) + round(0 - $z_gssf3 - $z_dagusf3, 2));
    echo "</td>\r\n  </tr>\r\n</table>\r\n";
} else {
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\">\r\n  <tr>\r\n    <td align=center height=\"30\" bgcolor=\"#CC0000\"><marquee align=\"middle\" behavior=\"alternate\" width=\"200\"><font color=\"#FFFFFF\">²éÎÞÈÎºÎ×ÊÁÏ</font></marquee></td>\r\n  </tr>\r\n  <tr>\r\n    <td align=center height=\"20\" bgcolor=\"#CCCCCC\"><a href=\"javascript:history.go(-1);\">Àë¿ª</a></td>\r\n  </tr>\r\n</table>\r\n";
}
echo "</div>\r\n";