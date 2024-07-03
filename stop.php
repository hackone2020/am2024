<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
$lx = $_GET['lx'];
switch ($lx) {
    case "1":
        $msg = "开盘期间,不开放历史报表!";
        break;
    case "2":
        $msg = "系统已封盘!";
        break;
    default:
        break;
}?>
<script src="js/function.js" type="text/javascript"></script>
<link href="css/main.css" type="text/css" rel="stylesheet" />

<body marginwidth="0" marginheight="0">
    <table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">
     <tbody><tr>
        <td height="40" valign="top">&nbsp;</td>
    </tr>
     <td valign="top">
            <div align="center">
                <table border="0" align="center" cellpadding="0" cellspacing="0" width="500" height="196" background="/images/m_td.gif">
                    <tbody><tr>
                        <td height="15" colspan="2" align="center">&nbsp;</td>
                    </tr>
                     <tr>
                        <td width="480" height="35" align="right" valign="top"><font class="font_d font_bold" id="loadingnumber" style="font-size: 16px; vertical-align: middle;">46</font></td>
                        <td width="20" align="center">&nbsp;</td>
                    </tr>
                    <tr>
                        <td height="96" colspan="2" align="center"><h1 id="mess" style="font-size:18px;"><?=$msg?></h1></td>
                    </tr>
                    <tr>
                        <td height="30" colspan="2" align="center" id="number_td"><table border="0" align="center" cellpadding="0" cellspacing="0"><tbody><tr></tr></tbody></table></td>
                    </tr>
                    <tr>
                        <td height="20" colspan="2" align="center">&nbsp;</td>
                    </tr>
                </tbody></table>
            </div>
        </td>
    </tr>
</tbody></table>
</body>
</html>