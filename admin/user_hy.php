<?php

if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
if (strpos($flag, "10")) {
} else {
    echo "<center>��û�и�Ȩ�޹���!</center>";
    exit;
}
if ($_GET['save'] == "save") {
    mysql_query("update web_member set ts=cs");
    echo "<script>alert('��Ա���öԭ�ɹ�!'); window.location.href = 'main.php?action=user_hy&uid={$uid}';</script>";
    exit;
}?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<body>
<div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_b">��ԭ���ö�&nbsp;</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright"></div>
</div>  
<table width="600" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
    <tbody>
        <tr>
            <td class="t_list_caption">��ԭ���ö�</td>
        </tr>
        <tr>
            <td height="60" align="center" bgcolor="#FFFFFF">
                <button class="btn1" onClick="javascript:if(confirm('��ȷ��Ҫ��ԭ�𣿱��������޷��ָ���')){location.href='main.php?action=user_hy&amp;uid=<?=$uid?>&amp;save=save'}" ;>
                    ��ԭ���ö�
                </button>
            </td>
        </tr>
        </tbody>
    </table>
</body>