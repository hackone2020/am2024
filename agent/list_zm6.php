<?php

if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
if ($vip == 1 && !strpos($flag, "1")) {
    echo "<center>��û�и�Ȩ�޹���!</center>";
    exit;
}
include "check_zf.php";
$ids = "����1-6";
$abcd = "";
$zc = 0;
$kithe = $Current_Kithe_Num;
if ($_GET['abcd'] != "") {
    $abcd = $_GET['abcd'];
}
if ($_GET['zc'] != "") {
    $zc = $_GET['zc'];
}
if ($_GET['act'] == "save") {
    if ($vip == 1) {
        echo "<script>alert('���˺Ų������߷�!');window.location.href='main.php?action=list_zm6&uid=" . $uid . "&vip=" . $vip . "&ids=" . $ids . "';</script>";
        exit;
    }
    if ($pz_of == 1 || $ty == 1) {
        echo "<script>alert('�Բ�����û���߷ɹ��ܻ���ϵͳͣѺ!������������ϵ�ϼ�!');window.location.href='main.php?action=list_zm6&uid=" . $uid . "&vip=" . $vip . "&ids=" . $ids . "';</script>";
        exit;
    }
    if (empty($_POST['sum_m']) || $_POST['sum_m'] < 1) {
        echo "<script>alert('�����������������!');window.location.href='main.php?action=list_zm6&uid=" . $uid . "&vip=" . $vip . "&ids=" . $ids . "';</script>";
        exit;
    }
    if ($Current_KitheTable[29] == 0 || $Current_KitheTable[15] == 0) {
        echo "<script>alert('����Ŀ�Ѿ�����!');window.location.href='main.php?action=list_zm6&uid=" . $uid . "&vip=" . $vip . "&ids=" . $ids . "';</script>";
        exit;
    }
    $zf_class1 = $_POST['class1'];
    $zf_class2 = $_POST['class2'];
    $zf_class3 = $_POST['class3'];
    $zf_sum = (int)$_POST['sum_m'];
    include "ds.php";
    echo "<script>alert('�����ɹ�!');</script>";
}?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<link rel="stylesheet" href="css/ball.css" type="text/css">

<script language="JavaScript">
var uid    = "<?=$uid?>";
var vip    = "<?=$vip?>";
var lx     = "<?=$lx?>";
var ids    = "<?=$ids?>";
var kithe     = "<?=$kithe?>";
var kithe_num = "<?=$Current_Kithe_Num?>";
var pz_of  = "<?=$pz_of?>";
var autotime= "<?=$autotime?>";
var lj_time = 1;
var dq_time = "<?=date("F d,Y H:i:s", strtotime($utime))?>";
var fp_time = "<?=date("F d,Y H:i:s", strtotime($Current_KitheTable['kizm1']))?>";
</script>
<script src="js/function.js" type="text/javascript"></script>
<script src="js/list_zm6.js" type="text/javascript"></script>
<script language="JavaScript">function onLoad()
{ 
 var obj_abcd = $("abcd");  
 obj_abcd.value = "<?=$abcd?>";
 var obj_zc = $("zc"); 
 obj_zc.value = "<?=$zc?>";
}</script>
<script language="JavaScript"></script>
<body style="min-width: 1200px;width: 100%">
<!--table1 start-->    
 <table width="100%" border="0" cellspacing="1" cellpadding="0">
    <tbody>
    <tr>
    <!--left-->    
    <td width="260" align="center" valign="top"> <?php require_once "list_header.php";?></td>
    <!--right-->
    <td valign="top">
<!--table2 ���--        !-->   
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="3" class="t_list">
    <form action="main.php" method="get" name="myFORM" id="myFORM">
        <tr>
            <td colspan="6" align="center" class="t_list_caption">
		<!--table3 ���--        !-->  
             <table width="100%" border="0" cellpadding="0" cellspacing="1" >
                <tbody>
                <tr>          
                    <td width="5"></td>
                    <td>&nbsp;����:&nbsp;<?=$kithe?></td>
                    <td>&nbsp;�̿�:&nbsp;
                    <select id="abcd" name="abcd" onChange="document.myFORM.submit();" class="za_select">                   
                    <option value="">ȫ��</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    </select>
                    <input name="action" type="hidden" id="action" value="list_zm6" />
                    <input name="uid" type="hidden" id="uid" value="<?=$uid?>"/>
                    <input name="vip" type="hidden" id="vip" value="<?=$vip?>"/>
                    <span>&nbsp;����:&nbsp;</span>
                    <select id="zc" name="zc" onChange="document.myFORM.submit();" class="za_select">
                    <option value="0">ʵ��</option>
                    <option value="1">���</option>
                    </select>
                    <? if ($Current_KitheTable[29] != 0 && $Current_KitheTable[15] != 0 && $kithe == $Current_Kithe_Num) {?>
                                  �������ʱ��:
                        <span style="font-size: 12px; font-weight: bold;" id="daojishi"></span>
                    <?}?>
                     </td>
                </tr>
                </tbody>
            </table><!--table3 ���--        !-->  
            </td>
        </tr>
        <tr>
 <table width="100%" border="0" cellpadding="0" cellspacing="3">
    <tr>
     <td align="center" valign="top" class="t_list_caption">����1</td>
     <td align="center" valign="top" class="t_list_caption">����2</td>  </tr>
    <tr>
        <td width="50%" valign="top"><table id="tb1" border="0" cellspacing="1" cellpadding="0"  bgcolor="C2C2A6" class="m_tab" width="100%">
        <tr class="m_title_ft_future">
            <td height="30" align="center" class="t_list_tr_3">����</td>
            <td align="center" class="t_list_tr_3">����</td>
            <td align="center" class="t_list_tr_3">ע����</td>
           <td align="center" class="t_list_tr_3">�ܶ�</td>
            <td align="center" class="t_list_tr_3">�ʽ�</td>
            <td align="center" class="t_list_tr_3">�߷�</td>
            <td align="center" class="t_list_tr_3">����</td>
        </tr>
        <tr bgcolor="#FFFFFF">
        <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
        <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></table></td>
            <td width="50%" valign="top">
        <table id="tb2" border="0" cellspacing="1" cellpadding="0"  bgcolor="C2C2A6" class="m_tab" width="100%">      
        <tr class="m_title_ft_future">
        
        <td height="30" align="center" class="t_list_tr_3">����</td>
        <td align="center" class="t_list_tr_3">����</td>
        <td align="center" class="t_list_tr_3">ע����</td>
         <td align="center" class="t_list_tr_3">�ܶ�</td>
        <td align="center" class="t_list_tr_3">�ʽ�</td>
        <td align="center" class="t_list_tr_3">�߷�</td>
        <td align="center" class="t_list_tr_3">����</td>
        </tr>
        <tr bgcolor="#FFFFFF">
        <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>      </tr>
        </table></td>
        </tr>
        <tr>
        <td align="center" valign="top" class="t_list_caption">����3</td>
        <td align="center" valign="top" class="t_list_caption">����4</td></tr>
        <tr>
        <td valign="top"><table id="tb3" border="0" cellspacing="1" cellpadding="0"  bgcolor="C2C2A6" class="m_tab" width="100%">
        
        <tr class="m_title_ft_future">
        <td height="30" align="center" class="t_list_tr_3">����</td>
        <td align="center" class="t_list_tr_3">����</td>
        <td align="center" class="t_list_tr_3">ע����</td>
       <td align="center" class="t_list_tr_3">�ܶ�</td>
        <td align="center" class="t_list_tr_3">�ʽ�</td>
        <td align="center" class="t_list_tr_3">�߷�</td>
        <td align="center" class="t_list_tr_3">����</td></tr>
        <tr bgcolor="#FFFFFF">
        <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>      </tr></table></td>
        
        <td valign="top">
        <table id="tb4" border="0" cellspacing="1" cellpadding="0"  bgcolor="C2C2A6" class="m_tab" width="100%">
        <tr class="m_title_ft_future">
        <td height="30" align="center" class="t_list_tr_3">����</td>
        <td align="center" class="t_list_tr_3">����</td>
        <td align="center" class="t_list_tr_3">ע����</td>
       <td align="center" class="t_list_tr_3">�ܶ�</td>
        <td align="center" class="t_list_tr_3">�ʽ�</td>
        <td align="center" class="t_list_tr_3">�߷�</td>
        <td align="center" class="t_list_tr_3">����</td>
        </tr>
        <tr bgcolor="#FFFFFF">
        <td>&nbsp;</td>
        <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>    </table></td></tr>
        <tr>
        <td align="center" valign="top" class="t_list_caption">����5</td>
        
        <td align="center" valign="top" class="t_list_caption">����6</td>  </tr>
        <tr><td valign="top"><table id="tb5" border="0" cellspacing="1" cellpadding="0"  bgcolor="C2C2A6" class="m_tab" width="100%">
        
        <tr class="m_title_ft_future">
        <td height="30" align="center" class="t_list_tr_3">����</td>
        <td align="center" class="t_list_tr_3">����</td>
        <td align="center" class="t_list_tr_3">ע����</td>
       <td align="center" class="t_list_tr_3">�ܶ�</td>
        <td align="center" class="t_list_tr_3">�ʽ�</td>
        <td align="center" class="t_list_tr_3">�߷�</td>
        <td align="center" class="t_list_tr_3">����</td>
        </tr><tr bgcolor="#FFFFFF">
        <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>      </tr></table></td>
        
        <td valign="top"><table id="tb6" border="0" cellspacing="1" cellpadding="0"  bgcolor="C2C2A6" class="m_tab" width="100%">      
        <tr class="m_title_ft_future">
        
        <td height="30" align="center" class="t_list_tr_3">����</td>
        
        <td align="center" class="t_list_tr_3">����</td>
        <td align="center" class="t_list_tr_3">ע����</td>
       <td align="center" class="t_list_tr_3">�ܶ�</td>
        <td align="center" class="t_list_tr_3">�ʽ�</td>
        <td align="center" class="t_list_tr_3">�߷�</td>
        <td align="center" class="t_list_tr_3">����</td></tr>
        
        <tr bgcolor="#FFFFFF"><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></table></td>
        </tr>
        <tr>
        <td colspan="2" align="center" valign="top">
            <table id="tb7" border="0" cellspacing="1" cellpadding="0"  bgcolor="C2C2A6" class="m_tab" width="450">      <tr class="m_title_ft_future">
            <td width="83" height="16">&nbsp;</td>
            <td width="101">ע����</td>
            <td width="124">�ܶ�</td>
            <td width="137">����</td></tr>
            <tr bgcolor="#FFFFFF">
            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></table></td>
        </tr>
    </table>
   
        </tr>
    </form>
</table><!--table2 ���--        !-->  



    </td>
    </tr>
    </tbody>
    </table><!--table1 end-->    

<DIV id=rs_window style="DISPLAY: none; POSITION: absolute">
<form action="main.php?action=list_zm6&uid=<?=$uid?>&vip=<?=$vip?>&act=save&kithe=<?=$kithe?>"    method="post" name="form1" >
<? include "zf.php"; ?>
</form></div>
<SCRIPT language=javascript>makeRequest('main.php?action=server_zm6&uid=<?=$uid?>&vip=<?=$vip?>&kithe=<?=$kithe?>&abcd=<?=$abcd?>&zc=<?=$zc?>')</script>
<?if ($Current_KitheTable[29] != 0 && $Current_KitheTable[15] != 0 && $kithe == $Current_Kithe_Num) {?>
    <script src="js/daojishi.js" type="text/javascript"></script>
<?}?>
</body>