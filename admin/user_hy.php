<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
if (strpos($flag, "10")) {
} else {
    echo "<center>你没有该权限功能!</center>";
    exit;
}
if ($_GET['save'] == "save") {
    mysql_query("update web_member set ts=cs");
    echo "<script>alert('会员信用额还原成功!'); window.location.href = 'main.php?action=user_hy&uid={$uid}';</script>";
    exit;
}?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<body>
<div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_b">还原信用额&nbsp;</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright"></div>
</div>  
<table width="600" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
    <tbody>
        <tr>
            <td class="t_list_caption">还原信用额</td>
        </tr>
        <tr>
            <td height="60" align="center" bgcolor="#FFFFFF">
                <button class="btn1" onClick="javascript:if(confirm('您确定要还原吗？本操作将无法恢复！')){location.href='main.php?action=user_hy&amp;uid=<?=$uid?>&amp;save=save'}" ;>
                    还原信用额
                </button>
            </td>
        </tr>
        </tbody>
    </table>
</body>