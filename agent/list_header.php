<?php
if ( !defined( "KK_VER" ) )
{
				exit( "无效的访问" );
}
$vvv1 = "";
$tb_name = "";
$blbl = "";
$kithe = $Current_Kithe_Num;
$tb_name = "web_tan";
$vvv1 .= " and kithe='".$kithe."'";
$abcd = $_GET['abcd'];
switch ( $abcd )
{
				case "A" :
								$vvv1 .= " and abcd='A' ";
								break;
				case "B" :
								$vvv1 .= " and abcd='B' ";
								break;
				case "C" :
								$vvv1 .= " and abcd='C' ";
								break;
				case "D" :
								$vvv1 .= " and abcd='D' ";
								break;
				default :
								break;
}
switch ( $lx )
{
				case "4" :
								$select_sql = " dagu='".$kauser."' ";
								$tb_zd = "daguzc";
								break;
				case "3" :
								$select_sql = " guan='".$kauser."' ";
								$tb_zd = "guanzc";
								break;
				case "2" :
								$select_sql = " zong='".$kauser."' ";
								$tb_zd = "zongzc";
								break;
				case "1" :
								$select_sql = " dai='".$kauser."' ";
								$tb_zd = "daizc";
								break;
				default :
								echo "<center>你没有该权限功能!</center>";
								exit( );
								break;
}
								$result = $db1->query( "select ds_lb,ds from  web_config_ds where lx=0 order by id" );
								$dstable = array( );
								$y = 0;
								while ( $row = $result->fetch_assoc() )
								{
												$dstable[$y] = $row;
												++$y;
								}
								$ds_count = count( $dstable ) - 1;
								$result8 = $db1->query( "SELECT ds_lb,sum(if(username<>'".$kauser."',sum_m,-sum_m)) as sum_m,sum(if(username<>'".$kauser."',".$tb_zd.",-sum_m)) as zc_sum,sum(sz) as zs FROM ".$tb_name." WHERE  ".$select_sql." and qx=0 ".$vvv1." group by ds_lb order by ds_lb DESC" );
								$rs1_table = array( );
								while ( $row = $result8->fetch_assoc() )
								{
												$rs1_table[$row['ds_lb']] = $row;
								}
								$rs1_count = count( $rs1_table ) - 1;
								$ii = 0;
								$z_zs = $z_sum = $z_zcsum = 0;
								$i = 0;
								for ( ;	$i <= $ds_count;	$i += 1	)
								{
												$sum_m = isset( $rs1_table[$dstable[$i]['ds_lb']]['sum_m'] ) ? round( $rs1_table[$dstable[$i]['ds_lb']]['sum_m'], 2 ) : 0;
												$zc_sum = isset( $rs1_table[$dstable[$i]['ds_lb']]['zc_sum'] ) ? round( $rs1_table[$dstable[$i]['ds_lb']]['zc_sum'], 2 ) : 0;
												$zs = isset( $rs1_table[$dstable[$i]['ds_lb']]['zs'] ) ? $rs1_table[$dstable[$i]['ds_lb']]['zs'] : 0;
												if ( $sum_m != 0 )
												{
																++$ii;
																$z_zs += $zs;
																$z_sum += $sum_m;
																$z_zcsum += $zc_sum;
																
												}
								}




//特码占成
$tmzszc=$rs1_table[$dstable[0]['ds_lb']]['zc_sum']+$rs1_table[$dstable[1]['ds_lb']]['zc_sum']+$rs1_table[$dstable[2]['ds_lb']]['zc_sum']+$rs1_table[$dstable[3]['ds_lb']]['zc_sum']+$rs1_table[$dstable[4]['ds_lb']]['zc_sum']+$rs1_table[$dstable[5]['ds_lb']]['zc_sum']+$rs1_table[$dstable[6]['ds_lb']]['zc_sum']+$rs1_table[$dstable[7]['ds_lb']]['zc_sum'];



//正码占成
$zmzszc=$rs1_table[$dstable[9]['ds_lb']]['zc_sum']+$rs1_table[$dstable[10]['ds_lb']]['zc_sum']+$rs1_table[$dstable[11]['ds_lb']]['zc_sum']+$rs1_table[$dstable[12]['ds_lb']]['zc_sum'];



//连码占成
$lmzszc=$rs1_table[$dstable[20]['ds_lb']]['zc_sum']+$rs1_table[$dstable[21]['ds_lb']]['zc_sum']+$rs1_table[$dstable[22]['ds_lb']]['zc_sum']+$rs1_table[$dstable[23]['ds_lb']]['zc_sum']+$rs1_table[$dstable[24]['ds_lb']]['zc_sum']+$rs1_table[$dstable[25]['ds_lb']]['zc_sum'];



//一肖占成
$yxzszc=$rs1_table[$dstable[26]['ds_lb']]['zc_sum'];



//尾数占成
$wszszc=$rs1_table[$dstable[29]['ds_lb']]['zc_sum'];



//特肖占成
$txzszc=$rs1_table[$dstable[27]['ds_lb']]['zc_sum'];


//六肖占成
$liuxzszc=$rs1_table[$dstable[28]['ds_lb']]['zc_sum'];


//半波占成
$bbzszc=$rs1_table[$dstable[8]['ds_lb']]['zc_sum'];


//半波占成
$ztzszc=$rs1_table[$dstable[13]['ds_lb']]['zc_sum'];


//过关占成
$ggzszc=$rs1_table[$dstable[19]['ds_lb']]['zc_sum'];



//自选不中占成
$bzzszc=$rs1_table[$dstable[36]['ds_lb']]['zc_sum'];



//多中一占成
$zyzszc=$rs1_table[$dstable[37]['ds_lb']]['zc_sum'];



//正码1-6占成
$z6zszc=$rs1_table[$dstable[14]['ds_lb']]['zc_sum']+$rs1_table[$dstable[15]['ds_lb']]['zc_sum']+$rs1_table[$dstable[16]['ds_lb']]['zc_sum']+$rs1_table[$dstable[17]['ds_lb']]['zc_sum']+$rs1_table[$dstable[18]['ds_lb']]['zc_sum'];

//生肖连占成
$slzszc=$rs1_table[$dstable[30]['ds_lb']]['zc_sum']+$rs1_table[$dstable[31]['ds_lb']]['zc_sum']+$rs1_table[$dstable[32]['ds_lb']]['zc_sum'];

//尾连占成
$wlzszc=$rs1_table[$dstable[33]['ds_lb']]['zc_sum']+$rs1_table[$dstable[34]['ds_lb']]['zc_sum']+$rs1_table[$dstable[35]['ds_lb']]['zc_sum'];
?>

<style type="text/css">
<!--
.url13 {font-size: 13px}
.ttt {
margin-top: 3px;
margin-right: 0px;
margin-bottom: 1px;
margin-left: 3px;
}
-->
</style>

<table width="255" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
    <tbody>
        <tr>
<td height="22" colspan="2" width="50%" align="center" class="t_list_tr_3" style="padding-left:3px;"><b>            
      &nbsp;&nbsp;<a href="main.php?action=list_all&uid=<?=$uid?>&vip=<?=$vip?>&ids=全部"  
<? if ( $action == "list_all" ) {?> style="color:ff0000" <? }?> >全部<font class="font_g"(<?=$z_zcsum?>)</a></font></td>
    </tr>
    <tr>
<td height="22" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">    
      <a href="main.php?action=list_tm&uid=<?=$uid?>&vip=<?=$vip?>&ids=特码"  
<? if ( $action == "list_tm" ) {?> style="color:ff0000" <? }?> ><font class="font_r"><b>特码:<font class="font_g">(<?=round( $tmzszc, 2 )?>)</font></font></a></td><td  >
    <td height="22" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;"> 
      <a href="main.php?action=list_zm&uid=<?=$uid?>&vip=<?=$vip?>&ids=正码"  
<? if ( $action == "list_zm" ) {?> style="color:ff0000" <? }?> >正码<font class="font_g">(<?=round( $zmzszc, 2 )?>)</font></a></td><td  >
    </tr>
    <tr>
        <td height="22" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;"> 
      <a href="main.php?action=list_lm&uid=<?=$uid?>&vip=<?=$vip?>&ids=连码"  
<? if ( $action == "list_lm" ) {?> style="color:ff0000" <? }?> >连码<font class="font_g">(<?=round( $lmzszc, 2 )?>)</font></a></td><td  >
     <td height="22" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;"> 
      <a href="main.php?action=list_sx&uid=<?=$uid?>&vip=<?=$vip?>&ids=一肖"  
<? if ( $action == "list_sx" ) {?> style="color:ff0000" <? }?> >一肖<font class="font_g">(<?=round( $yxzszc, 2 )?>)</font></a></td><td  >
    </tr>
    <tr>
        <td height="22" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;"> 
      <a href="main.php?action=list_ws&uid=<?=$uid?>&vip=<?=$vip?>&ids=尾数"  
<? if ( $action == "list_ws" ) {?> style="color:ff0000" <? }?> >尾数<font class="font_g">(<?=round( $wszszc, 2 )?>)</font></a></td><td  >
    <td height="22" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;"> 
      <a href="main.php?action=list_tmsx&uid=<?=$uid?>&vip=<?=$vip?>&ids=特肖"  
<? if ( $action == "list_tmsx" ) {?> style="color:ff0000" <? }?> >特肖<font class="font_g">(<?=round( $txzszc, 2 )?>)</font></a></td><td  >
        </tr>
    <tr>
        <td height="22" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;"> 
      <a href="main.php?action=list_sx6&uid=<?=$uid?>&vip=<?=$vip?>&ids=六肖"  
<? if ( $action == "list_sx6" ) {?> style="color:ff0000" <? }?> >六肖<font class="font_g">(<?=round( $liuxzszc, 2 )?>)</font></a></td><td  >
    <td height="22" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;"> 
      <a href="main.php?action=list_bb&uid=<?=$uid?>&vip=<?=$vip?>&ids=半波"  
<? if ( $action == "list_bb" ) {?> style="color:ff0000" <? }?> >半波<font class="font_g">(<?=round( $bbzszc, 2 )?>)</font></a></td><td  >
        </tr>
    <tr>
        <td height="22" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;"> 
      <a href="main.php?action=list_zt&uid=<?=$uid?>&vip=<?=$vip?>&ids=正1特"  
<? if ( $action == "list_zt" ) {?> style="color:ff0000" <? }?> >正特<font class="font_g">(<?=round( $ztzszc, 2 )?>)</font></a></td><td  >
    <td height="22" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;"> 
      <a href="main.php?action=list_zm6&uid=<?=$uid?>&vip=<?=$vip?>&ids=正码1-6"  
<? if ( $action == "list_zm6" ) {?> style="color:ff0000" <? }?> >正码1-6<font class="font_g">(<?=round( $z6zszc, 2 )?>)</font></a></td><td >
    </tr>
    <tr>
        <td height="22" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;"> 
      <a href="main.php?action=list_gg&uid=<?=$uid?>&vip=<?=$vip?>&ids=过关"  
<? if ( $action == "list_gg" ) {?> style="color:ff0000" <? }?> >过关<font class="font_g">(<?=round( $ggzszc, 2 )?>)</font></a></td><td  >
    <td height="22" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;"> 
      <a href="main.php?action=list_bz&uid=<?=$uid?>&vip=<?=$vip?>&ids=自选不中"  
<? if ( $action == "list_bz" ) {?> style="color:ff0000" <? }?> >自选不中<font class="font_g">(<?=round( $bzzszc, 2 )?>)</font></a></td><td  >
        </tr>
    <tr>
        <td height="22" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;"> 
      <a href="main.php?action=list_sxl&uid=<?=$uid?>&vip=<?=$vip?>&ids=生肖连"  
<? if ( $action == "list_sxl" ) {?> style="color:ff0000" <? }?> >生肖连<font class="font_g">(<?=round( $slzszc, 2 )?>)</font></a></td><td  >
    <td height="22" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;"> 
      <a href="main.php?action=list_wsl&uid=<?=$uid?>&vip=<?=$vip?>&ids=尾数连"  
<? if ( $action == "list_wsl" ) {?> style="color:ff0000" <? }?> >尾数连<font class="font_g">(<?=round( $wlzszc, 2 )?>)</font></a></td><td  >
        </tr>
    <tr>
        <td height="22" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;"> 
      <a href="main.php?action=list_dzy&uid=<?=$uid?>&vip=<?=$vip?>&ids=多中一"  
<? if ( $action == "list_dzy" ) {?> style="color:ff0000" <? }?> >多中一<font class="font_g">(<?=round( $zyzszc, 2 )?>)</font></a></td><td  >
    <td height="22" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;"> </td>
      </tr>
  </tr>
  </tbody>
</table>

