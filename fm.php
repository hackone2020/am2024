<?php

header("Cache-Control: no-cache?? must-revalidate");
include "class/html_cache.php";
$cache = new cache(5);
$cache->cacheCheck("cache/" . $dblabel . "/web_config/close.html");
require_once "include/global.php";
require_once "include/function.php";
if ($fmzt == 0) {
    echo "<script>window.open('index.php', '_top')</script>";
    exit;
}?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <title>网站繁忙启示</title>
    <style type="text/css">
        body {
            tbackground-image: url(images/m_bg.jpg);
            tbackground-repeat: no-repeat;
            tbackground-position: center;
            tfont-size: 12px;
        }
    </style>

</head>

<body>
    <table width="500" height="411" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td height="363" align="center"><?get_config("a10")?></td>
        </tr>
        <tr>
            <td align="center">
                <input type="image" name="ibtnCome" id="ibtnCome" src="images/shuaxin.gif"
                    onClick="javascript:location.reload();" style="border-width:0px;" />
            </td>
        </tr>
    </table>
</body>

</html>
<?=$cache->caching()?>