<?php

if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
if (strpos($flag, "03")) {
} else {
    echo "<center>��û�и�Ȩ�޹���!</center>";
    exit;
}
$ids = "ȫ��";
$abcd = "";
if ($_GET['kithe'] != "") {
    $kithe = $_GET['kithe'];
} else {
    $kithe = $Current_Kithe_Num;
}
if ($_GET['abcd'] != "") {
    $abcd = $_GET['abcd'];
}?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<link rel="stylesheet" href="css/ball.css" type="text/css">
<script language="JavaScript">
    var uid = "<?=$uid?>";
    var ids = "<?=$ids?>";
    var autotime = "<?=$autotime*2?>";
    var lj_time = 1;
    var dq_time = "<?=date("F d, Y H: i: s", strtotime($utime))?>";
    var fp_time = "<?=date("F d, Y H: i: s", strtotime($Current_KitheTable[30]))?>";
</script>
<script src="js/function.js" type="text/javascript"></script>
<script src="js/list_all.js" type="text/javascript"></script>
<script language="JavaScript">
    function onLoad() {
        var obj_kithe = $("kithe");
        obj_kithe.value = "<?=$kithe?>";
        var obj_abcd = $("abcd");
        obj_abcd.value = "<?=$abcd?>";
         }
    </script>
<body style="min-width: 1200px;width: 100%">
    <table width="100%" border="0" cellspacing="1" cellpadding="0">
    <tbody>
    <tr>
    <!--left-->    
    <td width="260" align="center" valign="top">    
    <? require_once "list_header.php";?>
    </td>
    <!--right-->
    <td valign="top">
<!--top talbe ���--        !-->
<table width="100%" border="0" cellpadding="0" cellspacing="1" class="t_list" id="tb1" style="line-height:21px;" >
    <form action="main.php" method="get" name="myFORM" id="myFORM">
         <tbody><tr>
             <!--���td start-->
             <td colspan="5" align="center" class="t_list_caption">
                 <!--top table ����-->
                 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                         <tbody><tr>
                            <td width="5"> &nbsp;</td>
                            <td width="100">�ۿ���ʽ&nbsp;</td>
                            <td align="center">
                                &nbsp;<font class="font_g font_bold">����:&nbsp;</font>
                            <select id="kithe" name="kithe" onChange="document.myFORM.submit();" class="za_select">
                                <? $result = $db1->query("select * from web_kithe order by nn desc limit 30");
                                while ($image = $result->fetch_array()) {?>
                                <option value='<?=$image['nn']?>'>��<?=$image['nn']?>��</OPTION>
                                <?}?>
                            </select>
                            </Td>
                <td width="160" align="left">            
                <td width="560" align="left">
                    <span>&nbsp;�̿�:&nbsp;</span>
                    <select id="abcd" name="abcd" onChange="document.myFORM.submit();" class="za_select">
                        <option value="">ȫ��</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>
                    <input name="action" type="hidden" id="action" value="list_all" />
                    <input name="uid" type="hidden" id="uid" value="<?=$uid?>" />
                    <? if ($Current_KitheTable[29] != 0 && $kithe == $Current_Kithe_Num) {?>
                    �������ʱ��:
                    <span style="font-size: 12px; font-weight: bold;" id="daojishi"></span>
                    <?}?>
                </td>
                <td width="5"  class="t_list_caption">&nbsp;</td>
            </tr>
        </tbody>
    </table>
    </td> <!--���td end-->
    </tr>

        <tr>
            <td height="20" align="center" class="t_list_tr_3">���</td>
            <td align="center" class="t_list_tr_3">����</td>
            <td align="center" class="t_list_tr_3">ע��</td>
            <td align="center" class="t_list_tr_3">��ע�ܶ�</td>
            <td align="center" class="t_list_tr_3">��˾ռ��</td>
        </tr>
        <tr >
            <td height="20" align="center" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
        </tbody>
        </form>
    </table>
    </td>
    <td width="5">&nbsp;</td>
    <SCRIPT language=javascript>makeRequest('main.php?action=server_all&uid=<?=$uid?>&kithe=<?=$kithe?>&abcd=<?=$abcd?>')
    </script>
    <? if ($Current_KitheTable[29] != 0 && $kithe == $Current_Kithe_Num) {?>

    <script src="js/daojishi.js" type="text/javascript"></script>
    <?}?>
</body>