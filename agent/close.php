<?php
header("Cache-Control: no-cache， must-revalidate");
include "../class/html_cache.php";
$cache = new cache(5);
$cache->cacheCheck("../cache/" . $dblabel . "/web_config/agent_close.html");
require_once "../include/global.php";
require_once "../include/function.php";
if ($opwww == 0) {
    echo "<script>window.open('index.php', '_top')</script>";
    exit;
}?>
<html>

<head>
    <title>网站维护更新启示</title>
    <meta http-equiv="Content-Type" content="text/html charset=gb2312">
    <style type="text/css">
        <!--a:link {ttext-decoration: none;}a:visited {ttext-decoration: none;}a:hover {ttext-decoration: none;}a:active {ttext-decoration: none;}
        -->
    </style>
</head>

<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0" ONCONTEXTMENU="window.event.returnValue=false;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" height="100%">
        <tr>
            <td align="center">
                <table width="350" border="0" cellspacing="0" cellpadding="0" height="160">
                    <tr>
                        <td width="16" height="13" valign="top"><img src="images/benner_01.gif" width="16" height="13">
                        </td>


                        <td bgcolor="#787573">
                            <table border="0" cellspacing="0" cellpadding="0" height="13" width="334">
                                <tr>
                                    <td height="1" bgcolor="#787573"></td>

                                    <td height="1"></td>
                                </tr>
                                <tr>
                                    <td bgcolor="#FFFFFF" width="335"></td>
                                    <td bgcolor="#787573" width="1"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" height="100%">
                                <tr>
                                    <td bgcolor="#787573" width="1"></td>
                                    <td width="12"></td>

                                    <td>
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="td_01"
                                            height="100%">
                                            <tr>
                                                <td colspan="2" align="center">
                                                    <font color="#BA2D26">网站系统公告</font>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>
                                            </tr>


                                            <tr>
                                                <td colspan="2">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">"
                                                    <?=get_config("a10")?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>
                                            </tr>
                                            <tr>



                                                <td height="5" colspan="2"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" align="center"><a href="#"
                                                        onClick="javascript:location.reload();"
                                                        style="border-width:0px;"><b>
                                                            <font color="#BA2D26">刷新</font>
                                                        </b></a></td>

                                            <tr>
                                                <td>&nbsp;</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td bgcolor="#787573" width="1"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" height="18">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td bgcolor="#787573">



                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" height="18">
                                            <tr>
                                                <td bgcolor="#787573" width="1"></td>
                                                <td bgcolor="#FFFFFF" height="18" width="328"></td>
                                            </tr>
                                            <tr>
                                                <td height="1"></td>
                                                <td height="1"></td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td align="right" width="120" valign="bottom" height="19"><img
                                            src="images/benner_03.gif" width="121" height="19"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
<?=$cache->caching()?>