<?php

function text_convert($string)
{
    $string = htmlspecialchars($string, ENT_QUOTES);
    $string = str_replace("<", "&lt;", $string);
    $string = str_replace(">", "&gt;", $string);
    $string = str_replace("", "\"", $string);
    $string = preg_replace( "/\r?\n/", "/\r\n/", $string );
    return $string;
}
if (!defined("KK_VER")) {
    exit("无效的访问");
}
$result = $db1->query("select * from web_config order by id LIMIT 1");
$row = $result->fetch_array();
$affice = $row['affice'];
$a7 = $row['a7'];
$a7 = text_convert($a7);
$a6 = $row['a6'];
$a6 = text_convert($a6);
$a5 = $row['a5'];
$a5 = text_convert($a5);
$a4 = $row['a4'];
$a4 = text_convert($a4);
$affice = str_replace("@webname@", $webname, $affice);
$affice = str_replace("@webnn@", $Current_Kithe_Num, $affice);
$affice = str_replace("@webname@", $webname, $affice);
$web_date_start = substr($Current_KitheTable['zfbdate1'], 0, 16);
$web_date_end = substr($Current_KitheTable['zfbdate'], 0, 16);
$affice = str_replace("@web_date_start@", $web_date_start, $affice);
$affice = str_replace("@web_date_end@", $web_date_end, $affice);
?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<script src="js/function.js" type="text/javascript"></script>
<body style="min-width: 1200px;width: 100%">
 <div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">系统公告:</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright">
      </div>
      </div>      
      <table width="750" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
        <tr>
            <td width="150" align="right" height="25">系统公告:</td><td width="520"><marquee scrollDelay=200><?=$affice?></marquee>
            </td>
            <td align="center"> <a href="javascript:;" onClick="javascript:location.reload();">历史讯息</a>
            </td>
        </tr>
    </table>

   <table width="750" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
        <tr>
            <td bgcolor="#FFFFFF" width="40" height="25" align="center" >1</td>
            <td bgcolor="#FFFFFF"><?=$affice?>
            </td>
        </tr>
       <? $i = 1;
        if ($a4 != "") {
        $i += 1;?>
        <tr>
            <td bgcolor="#FFFFFF" width="40" align="center"><?=$i?></td>
            <td bgcolor="#FFFFFF"><?=$a4?></td>
        </tr>
      <?  }
        if ($a5 != "") {
        $i += 1;
        ?>
        <tr>
            <td bgcolor="#FFFFFF" width="40" align="center"><?=$i?></td>
            <td bgcolor="#FFFFFF"><?=$a5?></td>
        </tr>
       <? }

        if ($a6 != "") {
        $i += 1;
        ?>
        <tr>
            <td bgcolor="#FFFFFF" width="40" align="center"><?=$i?></td>
            <td bgcolor="#FFFFFF"><?=$a6?></td>
        </tr>
       <? }?>
    </table>
</body>
<? if ($a7 != "") {?>
<script>alert("<?=$a7?>")</script>
<?}?>