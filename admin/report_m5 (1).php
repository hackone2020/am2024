<?php

if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
if (strpos($flag, "09")) {
} else {
    echo "<center>��û�и�Ȩ�޹���!</center>";
    exit;
}
$gtype = $_GET['gtype'];
$user = $_GET['user'];
$vvv = " ";
if ($user == "") {
    echo "<script>alert('�û�����Ϊ��!�����²�ѯ');window.location.href='main.php?action=report&uid=" . $uid . "';</script>";
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
$z_zs1 = $z_zs2 = 0;
$z_st1 = $z_st2 = 0;
$z_sum1 = $z_sum2 = 0;
$z_gs1 = $z_gs2 = 0;
$z_dagu1 = $z_dagu2 = 0;
$z_guan1 = $z_guan2 = 0;
$z_zong1 = $z_zong2 = 0;
$z_dai1 = $z_dai2 = 0;
$z_userds1 = $z_userds2 = 0;
$z_daids1 = $z_daids2 = 0;
$z_zongds1 = $z_zongds2 = 0;
$z_guands1 = $z_guands2 = 0;
$z_daguds1 = $z_daguds2 = 0;
$z_usersf1 = $z_usersf2 = 0;
$z_daisf1 = $z_daisf2 = 0;
$z_zongsf1 = $z_zongsf2 = 0;
$z_guansf1 = $z_guansf2 = 0;
$z_dagusf1 = $z_dagusf2 = 0;
$z_gssf1 = $z_gssf2 = 0;
echo "<link rel=\"stylesheet\" href=\"css/control_main.css\" type=\"text/css\">\r\n";
echo "<s";
echo "tyle type=\"text/css\">\r\n<!--\r\n.m_title_reag { background-color: #687780; text-align: center; color: #FFFFFF}\r\n-->\r\n</style>\r\n";
echo "<s";
echo "cript src=\"js/function.js\" type=\"text/javascript\"></script>\r\n";
echo "<s";
echo "cript src=\"js/report_func.js\" type=\"text/javascript\"></script>\r\n<body bgcolor=\"#FFFFFF\" text=\"#000000\" leftmargin=\"0\" topmargin=\"0\" vlink=\"#0000FF\" alink=\"#0000FF\">\r\n<table width=\"960\" height=\"24\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n    <td width=\"54\" height=\"24\" class=\"m_tline\">�����ѯ</td>\r\n      <td width=\"775\" class=\"m_tline\"><font color=\"#CC0000\">��ǰ��ѯ</font>--\r\n        ";
if ($kithe != "") {
    echo "        ��\r\n        ";
    echo $kithe;
    echo "        ��\r\n        ";
} else {
    echo "        �������䣺\r\n        ";
    echo $date_start;
    echo "        ~\r\n        ";
    echo $date_end;
    echo "        ";
}
echo "        &nbsp;&nbsp;����:\r\n        ";
if ($class2 != "") {
    echo $class2;
} else {
    echo "ȫ��";
}
echo "        &nbsp;&nbsp;(�������н����������ˮ)\r\n        &nbsp;&nbsp;����:\r\n        ";
echo $user;
echo "        --<a href=\"javascript:history.go( -1 );\">����һҳ</a> -- <a href=\"main.php?action=report&uid=";
echo $uid;
echo "\">�ر����ѯ</a>\r\n      </td>\r\n      <td width=\"40\"><img src=\"images/top_04.gif\" width=\"30\" height=\"24\" /></td>\r\n  </tr>\r\n</table>\r\n<table width=\"960\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n  <tr>\r\n    <td>&nbsp;</td>\r\n  </tr>\r\n</table>\r\n";
$result = mysql_query("SELECT username,sum(sz) as zs,sum(sum_m) as sum_m,sum(user_sf) usersf,sum(user_sq) user_ds,sum(dai_sq) dai_ds,sum(zong_sq) zong_ds,sum(guan_sq) guan_ds,sum(dagu_sq) dagu_ds,sum(daizc) as daizc,sum(dai_sf) as daisf,sum(zongzc) as zongzc,sum(zong_sf) as zongsf,sum(guanzc) as guanzc,sum(guan_sf) as guansf,sum(daguzc) as daguzc,sum(dagu_sf) as dagusf,sum(gszc) as gszc,sum(gs_sf) as gssf FROM " . $tb_name . "  WHERE dai='" . $user . "' and username!='" . $user . "' " . $vvv . " group by username order by username DESC");
$ii = 0;
if (mysql_num_rows($result) != 0) {
    echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"#000000\" class=\"m_tab\"  width=\"960\">\r\n  <tr class=\"m_title_reag\">\r\n    <td height=\"18\" colspan=\"11\" align=\"center\" nowrap=\"nowrap\" >�¼���Աע��</td>\r\n  </tr>\r\n  <tr class=\"m_title_reag\">\r\n    <td height=\"18\" align=\"center\" nowrap=\"nowrap\" >���</td>\r\n    <td align=\"center\">��Ա</td>\r\n    <td align=\"center\">����</td>\r\n    <td align=\"center\">��ע���</td";
    echo ">\r\n    <td align=\"center\">���</td>\r\n    <td align=\"center\">��ˮ</td>\r\n    <td align=\"center\">����ռ�ɽ��</td>\r\n    <td align=\"center\">����׬ˮ</td>\r\n    <td align=\"center\" bgcolor=\"#CC0000\">������</td>\r\n    <td align=\"center\" >���Ա����</td>\r\n    <td align=\"center\" >���ܴ�����</td>\r\n  </tr>\r\n";
    while ($rs = mysql_fetch_array($result)) {
        $sum_m = $usersf = $daisf = $zongsf = $guansf = $dagusf = $gssf = $userds = $daids = $zongds = $guands = $daguds = $daizc = $zongzc = $guanzc = $daguzc = $gszc = 0;
        ++$ii;
        $z_zs1 += $rs['zs'];
        $sum_m = $rs['sum_m'];
        $z_sum1 += $sum_m;
        $usersf = $rs['usersf'];
        $z_usersf1 += $usersf;
        $userds = $rs['user_ds'];
        $z_userds1 += $userds;
        $daizc = $rs['daizc'];
        $z_dai1 += $daizc;
        $daisf = $rs['daisf'];
        $z_daisf1 += $daisf;
        $daids = $rs['dai_ds'];
        $z_daids1 += $daids;
        $zongzc = $rs['zongzc'];
        $z_zong1 += $zongzc;
        $zongsf = $rs['zongsf'];
        $z_zongsf1 += $zongsf;
        $zongds = $rs['zong_ds'];
        $z_zongds1 += $zongds;
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
        $result2 = mysql_query("select * from web_member where  kauser='" . $rs['username'] . "' order by id LIMIT 1");
        $row11 = mysql_fetch_array($result2);
        if ($row11 != "") {
            $xm = "<font color=#cc0000> (" . $row11['xm'] . ")</font>";
        } else {
            $xm = "";
        }
        echo "  <tr class=\"m_rig\" onMouseOver=\"setPointer(this, 0, 'over', '#FFFFFF', '#FFCC66', '#FFCC99');\" onMouseOut=\"setPointer(this, 0, 'out', '#FFFFFF', '#FFCC66', '#FFCC99');\">\r\n    <td height=\"28\" align=\"center\" nowrap=\"nowrap\">";
        echo $ii;
        echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
        echo $rs['username'];
        echo $xm;
        echo "\t</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
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
        echo "</a>    </td>\r\n    <td height=\"28\" align=\"center\" nowrap=\"nowrap\">";
        echo round($usersf, 2);
        echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
        echo round($userds, 2);
        echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
        echo round($daizc, 2);
        echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
        echo round($daids, 2);
        echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
        echo round($daisf, 2);
        echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
        echo get_sf(round(0 - $usersf, 2));
        echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">\r\n      ";
        echo get_sf(round($usersf + $daisf, 2));
        echo "    </td>\r\n  </tr>\r\n";
    }
    echo "  <tr class=\"m_rig_re\">\r\n    <td height=\"18\" align=\"center\" nowrap=\"nowrap\">&nbsp;</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">�ܼ�</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">\r\n      ";
    echo $z_zs1;
    echo "    </td>\r\n    <td align=\"center\" nowrap=\"nowrap\">\r\n      ";
    echo $z_sum1;
    echo "    </td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
    echo round($z_usersf1, 2);
    echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">\r\n      ";
    echo round($z_userds1, 2);
    echo "    </td>\r\n    <td align=\"center\" nowrap=\"nowrap\">\r\n      ";
    echo round($z_dai1, 2);
    echo "    </td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
    echo round($z_daids1, 2);
    echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
    echo round($z_daisf1, 2);
    echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
    echo get_sf(round(0 - $z_usersf1, 2));
    echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
    echo get_sf(round($z_usersf1 + $z_daisf1, 2));
    echo "</td>\r\n  </tr>\r\n</table>\r\n<br>\r\n";
}
$result = mysql_query("SELECT username,sum(sz) as zs,sum(sum_m) as sum_m,sum(user_sf) usersf,sum(user_sq) user_ds,sum(zong_sq) zong_ds,sum(guan_sq) guan_ds,sum(dagu_sq) dagu_ds,sum(zongzc) as zongzc,sum(zong_sf) as zongsf,sum(guanzc) as guanzc,sum(guan_sf) as guansf,sum(daguzc) as daguzc,sum(dagu_sf) as dagusf,sum(gszc) as gszc,sum(gs_sf) as gssf FROM " . $tb_name . "  WHERE lx=1 and username='" . $user . "' " . $vvv . " group by username order by username DESC");
$ii = 0;
if (mysql_num_rows($result) != 0) {
    echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"#000000\" class=\"m_tab\"  width=\"960\">\r\n  <tr class=\"m_title_reag\">\r\n    <td height=\"18\" colspan=\"7\" nowrap=\"nowrap\">�������߷ɽ��</td>\r\n  </tr>\r\n  <tr class=\"m_title_reag\"s>\r\n    <td height=\"18\" align=\"center\" nowrap=\"nowrap\" >���</td>\r\n    <td align=\"center\">����</td>\r\n    <td align=\"center\">����</td>\r\n    <td align=\"center\">��ע���</td>\r\n    <td al";
    echo "ign=\"center\" bgcolor=\"#CC0000\">������</td>\r\n    <td align=\"center\">��ˮ</td>\r\n    <td align=\"center\">���ܴ�����</td>\r\n  </tr>\r\n";
    while ($rs = mysql_fetch_array($result)) {
        $sum_m = $usersf = $daisf = $zongsf = $guansf = $dagusf = $gssf = $userds = $daids = $zongds = $guands = $daguds = $daizc = $zongzc = $guanzc = $daguzc = $gszc = 0;
        ++$ii;
        $z_zs2 += $rs['zs'];
        $sum_m = $rs['sum_m'];
        $z_sum2 += $sum_m;
        $usersf = $rs['usersf'];
        $z_usersf2 += $usersf;
        $userds = $rs['user_ds'];
        $z_userds2 += $userds;
        $daisf = $usersf;
        $z_daisf2 += $daisf;
        $daids = $userds;
        $zongzc = $rs['zongzc'];
        $z_zong2 += $zongzc;
        $zongsf = $rs['zongsf'];
        $z_zongsf2 += $zongsf;
        $zongds = $rs['zong_ds'];
        $z_zongds2 += $zongds;
        $guanzc = $rs['guanzc'];
        $z_guan2 += $guanzc;
        $guansf = $rs['guansf'];
        $z_guansf2 += $guansf;
        $guands = $rs['guan_ds'];
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
        echo "&lx=1' >\r\n    ";
        echo round($sum_m, 2);
        echo "</a></td>\r\n    <td height=\"28\" align=\"center\" nowrap=\"nowrap\">";
        echo round($usersf, 2);
        echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
        echo round($userds, 2);
        echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
        echo get_sf(round($usersf, 2));
        echo "</td>\r\n  </tr>\r\n";
    }
    echo "  <tr class=\"m_rig_re\">\r\n    <td height=\"18\" align=\"center\" nowrap=\"nowrap\">&nbsp;</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">�ܼ�</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">\r\n      ";
    echo round($z_zs2, 2);
    echo "    </td>\r\n    <td align=\"center\" nowrap=\"nowrap\">\r\n      ";
    echo round($z_sum2, 2);
    echo "    </td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
    echo round($z_usersf2, 2);
    echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">\r\n      ";
    echo round($z_userds2, 2);
    echo "    </td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
    echo get_sf(round($z_usersf2, 2));
    echo "</td>\r\n  </tr>\r\n</table>\r\n<br>\r\n";
}
if ($z_zs1 != 0 || $z_zs2 != 0) {
    echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"#000000\" class=\"m_tab\"  width=\"960\">\r\n  <tr class=\"m_title_reag\">\r\n    <td height=\"18\" colspan=\"9\" nowrap=\"nowrap\">�ܼ�</td>\r\n  </tr>\r\n  <tr class=\"m_title_reag\">\r\n    <td height=\"18\" align=\"center\">����</td>\r\n    <td align=\"center\">��ע���</td>\r\n    <td align=\"center\">���</td>\r\n    <td align=\"center\">��ˮ</td>\r\n    <td align=\"center\">����ռ��</td>\r\n   ";
    echo " <td align=\"center\">����׬ˮ</td>\r\n    <td align=\"center\" bgcolor=\"#CC0000\">������</td>\r\n    <td align=\"center\">���Ա����</td>\r\n    <td align=\"center\">���ܴ�����</td>\r\n  </tr>\r\n  <tr class=\"m_rig_re\">\r\n    <td height=\"18\" align=\"center\" nowrap=\"nowrap\">\r\n      ";
    echo round($z_zs1 + $z_zs2, 2);
    echo "    </td>\r\n    <td align=\"center\" nowrap=\"nowrap\">\r\n      ";
    echo round($z_sum1 + $z_sum2, 2);
    echo "    </td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
    echo round($z_usersf1 + $z_usersf2, 2);
    echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">\r\n      ";
    echo round($z_userds1, 2);
    echo "    </td>\r\n    <td align=\"center\" nowrap=\"nowrap\">\r\n      ";
    echo round($z_dai1 - $z_sum2, 2);
    echo "    </td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
    echo round($z_daids1, 2);
    echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
    echo round($z_daisf1 + $z_daisf2, 2);
    echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
    echo get_sf(round(0 - $z_usersf1, 2));
    echo "</td>\r\n    <td align=\"center\" nowrap=\"nowrap\">";
    echo get_sf(round($z_usersf1 + $z_daisf1, 2) + round($z_usersf2, 2));
    echo "</td>\r\n  </tr>\r\n</table>\r\n";
} else {
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\">\r\n  <tr>\r\n    <td align=center height=\"30\" bgcolor=\"#CC0000\"><marquee align=\"middle\" behavior=\"alternate\" width=\"200\"><font color=\"#FFFFFF\">�����κ�����</font></marquee></td>\r\n  </tr>\r\n  <tr>\r\n    <td align=center height=\"20\" bgcolor=\"#CCCCCC\"><a href=\"javascript:history.go(-1);\">�뿪</a></td>\r\n  </tr>\r\n</table>\r\n";
}
echo "</div>\r\n";