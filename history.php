<?php
function text_convert( $string )
{
    $string = htmlspecialchars( $string, ENT_QUOTES,'GB2312');
    $string = str_replace( "<", "&lt;", $string );
    $string = str_replace( ">", "&gt;", $string );
    $string = str_replace( "\"", "\\\"", $string );
    $string = preg_replace( "/\r?\n/", "/\\r\\n/", $string );
    return $string;
}

if ( !defined( "KK_VER" ) )
{
    exit( "无效的访问" );
}
$result = $db1->query( "select * from web_config order by id LIMIT 1" );
$row = $result->fetch_array();
$affice = $row['affice'];
$a8 = $row['a8'];
$a8 = text_convert( $a8 );
$a6 = $row['a6'];
$a6 = text_convert( $a6 );
$a5 = $row['a5'];
$a5 = text_convert( $a5 );
$a4 = $row['a4'];
$a4 = text_convert( $a4 );
$affice = str_replace( "@webname@", $webname, $affice );
$affice = str_replace( "@webnn@", $Current_Kithe_Num, $affice );
$affice = str_replace( "@webname@", $webname, $affice );
$web_date_start = substr( $Current_KitheTable['zfbdate1'], 0, 16 );
$web_date_end = substr( $Current_KitheTable['zfbdate'], 0, 16 );
$affice = str_replace( "@web_date_start@", $web_date_start, $affice );
$affice = str_replace( "@web_date_end@", $web_date_end, $affice );
?>
<script src="js/function.js" type="text/javascrip"></script>
<script type="text/javascript">

function GetIEVersion() {
    var sAgent = window.navigator.userAgent;
    var Idx = sAgent.indexOf("MSIE");

    // If IE, return version number.
    if (Idx > 0)
        return parseInt(sAgent.substring(Idx+ 5, sAgent.indexOf(".", Idx)));

    // If IE 11 then look for Updated user agent string.
    else if (!!navigator.userAgent.match(/Trident\/7\./))
        return 11;

    else
        return false; //It is not IE
}

    var DisplayContent = function (index) {
        $("#content_table").children().children().each(function (idx, tr) {
            if (tr.id && (typeof tr.id === 'string')) {
                var parts = tr.id.split('_');
                if (parts[0] === 'messagerow' && parts[1] == index) {
                    if (GetIEVersion() == 6 || GetIEVersion() == 7) {
                      tr.style.display = 'block';
                    } else {
                      tr.style.display = 'table-row';
                    }
                } else if (parts[0] === 'messagerow') {
                    tr.style.display = 'none';
                }
            }
        });
        $("#headertabs").children().each(function (idx, td) {
            var parts = td.id.split('_');
            if (parts[0] === 'headertab' && parts[1] == index) {
                td.style['background'] = 'url(/images/t_caption_bg_x.jpg)';
                td.style['background-size'] = '100% 100%';
            } else if (parts[0] === 'headertab') {
                td.style['background'] = '#FFFFFF';
            }
        });
        query.curpage = index;
        url = "mainframe?" + simpleQueryString.stringify(query);
    }
</script>
<link rel="stylesheet" href="/member/stylesheets/main.css?t=1683715146" type="text/css">
<link rel="stylesheet" href="/member/stylesheets/calendar.css?t=1683715146" type="text/css">
<body marginwidth="0" marginheight="0">
<div style="float: left">
   <table width="800" border="0" id="header_table" cellpadding="0" cellspacing="1" class="t_list" style="margin-right: 10px; margin-bottom: -1px;">
     <tbody>
     <tr id="headertabs">
        <td id="headertab_0" onmouseover="DisplayContent(0);" colspan="1" align="center" height="30" style="font-size: 14px; background: url(&quot;/images/t_caption_bg_x.jpg&quot;) 0% 0% / 100% 100%;">
            公告
        </td>
    
        <!--<td id="headertab_1" onmouseover="DisplayContent(1);" colspan="1" align="center" height="30" style="font-size: 14px; background: rgb(255, 255, 255);">-->
        <!--    公告-->
        <!--</td>-->
    
        <!--<td id="headertab_2" onmouseover="DisplayContent(2);" colspan="1" align="center" height="30" style="font-size: 14px; background: rgb(255, 255, 255);">-->
        <!--    活动-->
        <!--</td>-->
    
        <!--<td id="headertab_3" onmouseover="DisplayContent(3);" colspan="1" align="center" height="30" style="font-size: 14px; background: rgb(255, 255, 255);">-->
        <!--    秘书-->
        <!--</td>-->
    
        <!--<td id="headertab_4" onmouseover="DisplayContent(4);" colspan="1" align="center" height="30" style="font-size: 14px; background: rgb(255, 255, 255);">-->
        <!--    重要-->
        <!--</td>-->
        </tr>
    </tbody>
    </table>
    
    <table width="800" border="0" id="content_table" cellpadding="0" cellspacing="1" class="t_list" style="margin-right: 10px; margin-bottom: 10px; margin-top: 0px;">
        <tbody>
        <tr bgcolor="#FFFFA2" id="messagerow_0_0" onmouseover="javascript:this.bgColor='#FFFFA2'" onmouseout="javascript:this.bgColor='#FFFFFF'" style="display: table-row;">

            <td height="32" width="118px" colspan="1" align="center">
                 <div align="center" style="font-size: 1.1em; white-space: nowrap;"><?php echo $showtime=date("Y-m-d");?><br> <?php echo $showtime=date("H:i:s");?>
                </div>

            </td>
            <!--第一条记录-->
            <td height="32" width="678px" colspan="4" style="word-break: break-all; padding: 10px;">
                    <div align="left" style="font-size: 1.1em;">公告1：<?=$affice?></div>

            </td>
            <?
            $i = 1;
            if ( $a4 != "" )
            {
                $i += 1;
            ?>
            
            </tr>
            <tr bgcolor="#FFFFA2" id="messagerow_0_0" onmouseover="javascript:this.bgColor='#FFFFA2'" onmouseout="javascript:this.bgColor='#FFFFFF'" style="display: table-row;">
            <td height="32" width="118px" colspan="1" align="center">
                 <div align="center" style="font-size: 1.1em; white-space: nowrap;"><?php echo $showtime=date("Y-m-d");?><br> <?php echo $showtime=date("H:i:s");?>
                </div>

            </td>    
            <td height="32" width="678px" colspan="4" style="word-break: break-all; padding: 10px;">
                 <div align="left" style="font-size: 1.1em;">公告<?=$i?>：<?=$a4?>
                </div>

            </td>
            <?}
            if ( $a5 != "" )
            {
                $i += 1;
            ?>
            
            </tr>
            <!--第二条记录-->
            <tr bgcolor="#FFFFA2" id="messagerow_0_0" onmouseover="javascript:this.bgColor='#FFFFA2'" onmouseout="javascript:this.bgColor='#FFFFFF'" style="display: table-row;">
            <td height="32" width="118px" colspan="1" align="center">
                 <div align="center" style="font-size: 1.1em; white-space: nowrap;"><?php echo $showtime=date("Y-m-d");?><br> <?php echo $showtime=date("H:i:s");?>
                </div>

            </td>    
            <td height="32" width="678px" colspan="4" style="word-break: break-all; padding: 10px;">
                 <div align="left" style="font-size: 1.1em;">公告<?=$i?>：<?=$a5?>
                </div>

            </td>
            <?
            }
            if ( $a6 != "" )
            {
                $i += 1;
            ?>
            
            </Tr>
            <!--第三条记录-->
            <tr bgcolor="#FFFFA2" id="messagerow_0_0" onmouseover="javascript:this.bgColor='#FFFFA2'" onmouseout="javascript:this.bgColor='#FFFFFF'" style="display: table-row;">
            <td height="32" width="118px" colspan="1" align="center">
                 <div align="center" style="font-size: 1.1em; white-space: nowrap;"><?php echo $showtime=date("Y-m-d");?><br> <?php echo $showtime=date("H:i:s");?>
                </div>

            </td>    
            <td height="32" width="678px" colspan="4" style="word-break: break-all; padding: 10px;">
                 <div align="left" style="font-size: 1.1em;">公告<?=$i?>：<?=$a6?>
                </div>

            </td>
            
            
            <!--第四条记录-->
            
            
        </tr>

        <tr id="messagerow_1_tp" bgcolor="#FFFFFF" style="display: none;">
        <td height="28" colspan="5" align="center">
            
<?}?>

</tbody></table>
</body>

