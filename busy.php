<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
switch ($web_status) {
    case "1":
        $msg = "系统开码中,请稍后再访问...";
        break;
    case "2":
        $msg = "系统结算中,请稍等...";
        break;
    default:
        $msg = "系统繁忙,请稍后再访问...";
        break;
}
include "class/html_cache.php";
$cache = new cache(10);
$cache->cacheCheck("cache/" . $dblabel . "/web_config/busy_" . $web_status . ".html");
$n1 = $Current_KitheTable['n1'];
$n2 = $Current_KitheTable['n2'];
$n3 = $Current_KitheTable['n3'];
$n4 = $Current_KitheTable['n4'];
$n5 = $Current_KitheTable['n5'];
$n6 = $Current_KitheTable['n6'];
$na = $Current_KitheTable['na'];
?>
<script src="js/function.js" type="text/javascript"></script>

<script>
< !--var limit = "15"if (document.images) { \tvar parselimit = limit } function beginrefresh() {
        if (!document.images) \treturnif(parselimit == 1) \tself.location.reload()else { \tparselimit -= 1\tcurmin = Math.floor(parselimit) \tif(curmin != 0) \t\tcurtime = curmin + "秒后自动刷新！"\telse\t\tcurtime = cursec + "秒后自动刷新！"\t\ttimeinfo.innerText = curtime\t\tsetTimeout("beginrefresh()", 1000) \t } \r";
        \n
    } window.onload = beginrefresh</script>

<link href="css/main.css" type="text/css" rel="stylesheet" />
<body class="bgcoloruserx">
<div align="center" style="margin-top: 70px;">
<table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">            <tr>                <td>                    <div align="center">
<table border="0" align="center" cellpadding="0" cellspacing="0" width="500" height="196" background="images/m_td.gif"><tr>
<td colspan="17" align="center">
<h1 id="mess" style="font-size:18px;">"<?=$msg?>"
</h1></td></tr>
if ($web_status == 1 || $web_status == 2) {
	
<tr>
<td align="center">&nbsp;</td>
<td align="center">
<div class='numberdiv numberdiv";$n1; '></div></td>
<td align="center">"<?=get_sx_name($n1)?>" </td>
<td align="center"><div class='numberdiv numberdiv "<?=$n2?>" '></div></td>
	
	<td align="center">"<?=get_sx_name($n2)?>"</td>	
	<td align="center"><div class='numberdiv numberdiv";$n3;'></div></td>	
	<td align="center">"<?= get_sx_name($n3)?>"
    </td>	
	<td align="center"><div class='numberdiv numberdiv"<?=$n4?>"
    '></div></td>
	
	<td align="center">get_sx_name($n4);
    </td>	
	<td align="center"><div class='numberdiv numberdiv"
    <?=$n5?>"
    '></div></td>
	
	<td align="center">"get_sx_name($n5);
    </td>
	
	<td align="center"><div class='numberdiv numberdiv"$n6"></div></td>
	
	<td align="center">"get_sx_name($n6);
    </td>
	
	<td align="center">＋</td>
	
	<td align="center"><div class='numberdiv numberdiv "<?=$na?>"
    '></div></td>
	<td align="center">";get_sx_name($na);
    </td>
	<td align="center">&nbsp;</td>
	</tr>                            
}
<tr>
<td colspan="17" align="center">
<span id="timeinfo"></span></td>
</tr></table>
</div></td>
</tr></table>
</div>
</body>
</html>
$cache->caching();