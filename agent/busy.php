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
}?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE>error</TITLE>
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<STYLE>.line {tBORDER-RIGHT: #336699 1px solid; BORDER-TOP: #336699 1px solid; BACKGROUND-IMAGE: url(images/index_bg.gif); BORDER-LEFT: #336699 1px solid; WIDTH: 500px; BORDER-BOTTOM: #336699 1px solid; BACKGROUND-REPEAT: no-repeat; HEIGHT: 200px}.back {\tMARGIN-TOP: -20px; PADDING-LEFT: 30px; FONT-SIZE: 12px; FLOAT: right; COLOR: #ffff00; MARGIN-RIGHT: 10px; PADDING-TOP: 5px; HEIGHT: 32px;";
 TEXT-DECORATION: none}.back A:link {tCOLOR: #ffff00; TEXT-DECORATION: none}.back A:visited {tCOLOR: #ffff00; TEXT-DECORATION: none}A:hover {tCOLOR: #ffffff; TEXT-DECORATION: none}.foot {tPADDING-RIGHT: 0px; DISPLAY: block; PADDING-LEFT: 0px; FONT-SIZE: 12px; PADDING-BOTTOM: 0px; WIDTH: 500px; COLOR: #000000; BOTTOM: 10px; LINE-HEIGHT: 18px; PADDING-TOP: 30px; POSITION: rel";
ative; TEXT-ALIGN: left}.head {tBACKGROUND-POSITION: right 50%; PADDING-LEFT: 10px; FONT-WEIGHT: bold; FONT-SIZE: 17px; BACKGROUND-IMAGE: url(images/head.gif); COLOR: #ffffff; PADDING-TOP: 5px; BACKGROUND-REPEAT: no-repeat; FONT-FAMILY: Arial, Helvetica, sans-serif; HEIGHT: 25px; BACKGROUND-COLOR: #164ba8}.code2 {tMARGIN-TOP: 30px; TEXT-ALIGN: center}.text1{tfont-family: Arial, H";elvetica, sans-serif;tfont-size: 16px;tfont-weight: bold;}
</STYLE>
<META content="MSHTML 6.00.2900.6148" name=GENERATOR>
</HEAD>
<BODY oncontextmenu=window.event.returnValue=false>
<DIV class=code2>
<TABLE border=0 align="center" cellPadding=0 cellSpacing=0 class=line>  
<TBODY> 
<TR>   
<TD class=head>讯息告知<A href="javascript:location.reload();" style="cursor:pointer;">";
<SPAN  class=back>刷新</SPAN></A></TD></TR> 
<TR>  
<TD align=middle class="text1">"<?=$msg?>"请稍后再尝试刷新页面<BR></TD></TR></TBODY></TABLE></DIV>
</BODY>
</HTML>
 