<?php

if (!defined("KK_VER")) {
	exit("无效的访问");
}

$ids = $_GET["ids"];

switch ($ids) {
	case "半波":
		$ids = "半波";
		break;
		break;

	default:
		$ids = "半波";
		break;
}

$XF = 15;
if (($Current_KitheTable[29] == 0) || ($Current_KitheTable[$XF] == 0)) { ?>
	<meta http-equiv="refresh" content="0;url=main.php?action=stop&uid=" . $uid . "&lx=2">
<?php exit();
}

echo "<SCRIPT language=javascript>";
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
		$bb_xx = $bb_xxx = $bb_blc = 0;
		$config_ds_temp = get_config_ds();
		$user_ds_temp = get_member_ds($uid, $username);

		if ($user_ds_temp != "") {
			$bb_xx = $user_ds_temp["TMBB"]["xx"];
			$bb_xxx = $user_ds_temp["TMBB"]["xxx"];
			$bb_blc = $config_ds_temp["TMBB"][$blc_lx];
		}
}

echo "\t\t\t\t\t\t\t\tvar uid    = \"<?=\$uid?>\";\r\n\t\t\t\t\t\t\t\tvar xy     = \"<?=\$xy?>\";\r\n\t\t\t\t\t\t\t\tvar cs     = \"<?=\$cs?>\";\r\n\t\t\t\t\t\t\t        var ts     = \"<?=\$ts?>\";\r\n\t\t\t\t\t\t\t\tvar ids    = \"<?=\$ids?>\";\r\n\t\t\t\t\t\t\t        var dq_time = \"<?=date( \"F d,Y H:i:s\", strtotime( \$utime ) )?>\";\r\n\t\t\t\t\t\t\t\tvar fp_time = \"<?=date( \"F d,Y H:i:s\", strtotime( \$Current_KitheTable['kizm1'] ) )?>\";\r\n\t\t\t\t\t\t\t\tvar autotime= \"<?=\$autotime?>\";\r\n\t\t\t\t\t\t\t\tvar lj_time = 1;\r\n\t\t\t\t\t\t\t\tvar bb_xx=\"<?=\$bb_xx?>\";\r\n\t\t\t\t\t\t\t        var bb_xxx=\"<?=\$bb_xxx?>\";\r\n\t\t\t\t\t\t\t\tvar bb_blc=\"<?=\$bb_blc?>\";\r\n\t\t\t\t\t\t\t\t</SCRIPT>\r\n\t\t\t\t\t\t\t\t<script src=\"js/function.js\" type=\"text/javascript\"></script>\r\n\t\t\t\t\t\t\t\t<script src=\"js/bet_bb.js\" type=\"text/javascript\"></script><link href=\"css/main.css\" type=\"text/css\" rel=\"stylesheet\" />\r\n                              <body class=\"bgcoloruserx\"><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"><tr><td valign=\"middle\"></td><td valign=\"top\"><div style=\"margin-left:10px; margin-top:6px;\">\r\n                              <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"685\"><tr><td><div class=\"main\"><div><table cellpadding=\"0px\" cellspacing=\"0px\" width=\"685px\"> <tr><td class=\"maintd1\"> </td>\r\n                               <td class=\"maintd2\"> <table cellpadding=\"0px\" cellspacing=\"0px\" width=\"99%\" border=\"0\"><tr>\r\n                               <td class=\"typename\" id=\"typestr\"> \r\n\t\t\t\t\t\t\t\t<?=\$ids?>\r\n\t\t\t\t\t\t\t\t</td>\r\n   <td id=\"ctl00_ContentPlaceHolder1_wucshijian1_issuetime\" style=\"color: #ffeaaa; font-size: 12px;\">\r\n\t\t\t\t\t\t\t\t<?=\$Current_Kithe_Num?>期</td><td style=\"font-size: 12px;\" class=\"shijiancolor\">                               距截止下注还有：\r\n<span style=\"font-size: 12px; font-weight: bold;\" class=\"shijiancolor\" id=\"daojishi\"></span></td><td style=\"font-size: 12px; width: 40px; display:none;\">\r\n<input type=\"button\" value=\"更新\" id=\"loadodds\" class=\"btn1\" />：</td>\r\n<td style=\"font-size: 12px; width:40px; padding-left:4px;\" class=\"shijiancolor2\">    \r\n<span id=\"loadingnumber\" style=\"font-family: @GulimChe; font-size: 16px; font-weight: bold;display: none;\">\r\n\t\t\t\t\t\t\t\t<?=\$autotime / 1000?>\r\n\t\t\t\t\t\t\t\t</span>\r\n\t\t\t\t\t\t\t<span id=\"loadingimg\"><img src=\"images/loading1.gif\" alt=\"加载中...\" /></span> </td>\r\n<td align=\"right\" valign=\"middle\">&nbsp;</td><td>&nbsp;</td></tr> </table></td><td class=\"maintd3\"> </td></tr></table>\r\n<form target=\"leftFrame\" name=\"form1\"  method=\"post\" action=\"main.php?action=bet_n1&uid=<?=\$uid?>&class2=<?=\$ids?> onSubmit=\"return ChkSubmit()\">\r\n<script src=\"js/member/bet_bb.js\" type=\"text/javascript\"></script></form></div></div></td></tr></table></div></td><td></td></tr></table>\r\n<script src=\"js/daojishi.js\" type=\"text/javascript\"></script>\r\n<SCRIPT language=javascript>makeRequest('main.php?action=server&uid=<?=\$uid?>&class1=半波&class2=<?=\$ids?>')</script></body>\r\n\r\n";

?>