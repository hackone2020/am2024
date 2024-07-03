<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
$result = $db1->query("select xm,dagu_zc,guan_zc,zong_zc,dai_zc from web_agent  where kauser='" . $kauser . "' order by id desc LIMIT 1");
$row = $result->fetch_array();
$xm = $row['xm'];
switch ($lx) {
    case "4":
        $zc = $row['dagu_zc'];
        break;
    case "3":
        $zc = $row['guan_zc'];
        break;
    case "2":
        $zc = $row['zong_zc'];
        break;
    case "1":
        $zc = $row['dai_zc'];
        break;
    default:
        $zc = 0;
        break;
}
$mumu = 0;
if (1 < $lx) {
    $result1 = $db1->query("select SUM(cs) As sum_m  From web_agent Where lx=" . ($lx - 1) . " and (dagu='" . $kauser . "' or guan='" . $kauser . "' or zong='" . $kauser . "') order by id desc");
    $rsw = $result1->fetch_array();
    if ($rsw[0] != "") {
        $mumu = $rsw[0];
    }
}
$result1 = $db1->query("select SUM(cs) As sum_m  From web_member Where zs=" . $lx . " and  dai='" . $kauser . "' order by id desc");
$rsw = $result1->fetch_array();
if ($rsw[0] != "") {
    $mumu += $rsw[0];
}?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<style type="text/css">
    <!--.m_suag_ed {  background-color: #D3C9CB; text-align: right}.m_ag_ed {  background-color: #bdd1de; text-align: right}
    -->
</style>
<script src="js/function.js" type="text/javascript"></script>
<body style="min-width: 1200px;width: 100%">
 <div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;账户信息</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright"></div>
</div>  
<table width="60%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
    <tbody>
        <tr>
            <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">账户信息账号:</td>
            <td height="30" bgcolor="#FFFFFF" class="t_edit_td"><?=$kauser?>(<?=$xm?>)</td>
        </tr>
        <tr>
            <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">信用额度:</td>
            <td height="30" bgcolor="#FFFFFF" class="t_edit_td"><?=$cs?></td>
        </tr>
        <tr>
            <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">分配余额:</td>
            <td height="30" bgcolor="#FFFFFF" class="t_edit_td"><?=$cs - $mumu?> </td>
</tr>
<tr>
            <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">占成数:</td>      
            <td height="30" bgcolor="#FFFFFF" class="t_edit_td"><?=$zc?>%</td>
</tr>
</table>

<table width="60%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
  <tbody>
        <tr>
            <td width="100" height="20" align="center" class="t_list_caption">类型</td>
            <td height="20" align="center" class="t_list_caption">A盘退水%</td>

            <td height="20" align="center" class="t_list_caption">B盘退水%</td>
            <td height="20" align="center" class="t_list_caption">C盘退水%</td>
            <td height="20" align="center" class="t_list_caption">D盘退水%</td>
            <td height="20" align="center" class="t_list_caption">单注限额</td>
            <td height="20" align="center" class="t_list_caption">单项(号)限额</td>
        </tr>
        <?$result = $db1->query("select * from  web_user_ds where userid=" . $kauserid . " and username='" . $kauser . "' order by id ");
$num1 = $result->num_rows;
$t = 0;
while ($num1 != "" && ($image = $result->fetch_array())) {?>
       <tr bgcolor="#ffffff" onmouseover="javascript:this.bgColor='#FFFFA2'" onmouseout="javascript:this.bgColor='#ffffff'">
            <td height="30" align="right"><?=$image['ds']?></td>
            <td align="center" bgcolor="#FFFFFF"><?=$image['yg']?></td>
            <td align="center" bgcolor="#FFFFFF"><?=$image['ygb']?></td>
            <td align="center" bgcolor="#FFFFFF"><?=$image['ygc']?></td>
            <td align="center" bgcolor="#FFFFFF"><?=$image['ygd']?></td>
            <td align="center" bgcolor="#FFFFFF"><?=$image['xx']?></td>
            <td align="center" bgcolor="#FFFFFF"><?=$image['xxx']?></td>
        </tr>
        <? ++$t;
}?>
    </table>
</body>