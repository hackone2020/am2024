<?php
function get_html( $cnum, $c1, $c2, $c3, $c4, $c5 )
{
				global $uid;
				$html = "";
				switch ( $c1 )
				{
								case "����" :
												$number_array = explode( ",", $c2 );
												$c3_array = explode( ",", $c3 );
												$number_count = count( $number_array ) - 1;
												$html = "����:".$number_count."��1"."<br>";
												$t = 0;
												for ( ;	$t < $number_count;	$t += 1	)
												{
																$y = $t * 2;
																$html .= "<font color='red' class='fontsize'>".$number_array[$t]."</font>-<font color='green' class='fontsize'>".$c3_array[$y]."</font>@<font color='blue' class='fontsize'>".$c3_array[$y + 1]."</font><br>";
												}
												continue;
												break;
								case "����" :
												$html = $c2."��<font color='red' class='fontsize'>".$c3."</font>";
												$html .= "<br>�� ".$c4." �� ÿ��: <font color='green' class='fontsize'>".$c5 / $c4."</font>";
												break;
								case "��ѡ����" :
												$html = $c2."��<font color='red' class='fontsize'>".$c3."</font>";
												$html .= "<br>�� ".$c4." �� ÿ��: <font color='green' class='fontsize'>".$c5 / $c4."</font>";
												break;
								default :
												$html = $c2."��<font color='red' class='fontsize'>".$c3."</font>";
												break;
												return $html;
				}
}

if ( !defined( "KK_VER" ) )
{
				exit( "��Ч�ķ���" );
}
if ( strpos( $flag, "11" ) )
{
}
else
{
				echo "<center>��û�и�Ȩ�޹���!</center>";
				exit( );
}
if(isset($_POST['xg'])){
$mx=$_POST['mx'];
$mx2=$_POST['mx2'];
$sum_m=$_POST['sum_m'];
$num=$_POST['num'];
$sum=$_POST['sum'];
$kite=$_POST['kithe'];
$username=$_POST['username'];
$db1->query("update web_tan set class3='".$mx."',class5='".$mx2."',sum_m='".$sum_m."' where num='".$num."' and kithe='".$kithe."' and username='".$username."' and kithe='".$kithe."' ");
$db1->query("update web_tans set class3='".$mx."',class5='".$mx2."',sum_m='".$sum_m."' where num='".$num."' and kithe='".$kithe."' and username='".$username."' and kithe='".$kithe."' ");
}
if ( $_GET['act'] == "edit" )
{
				$user = $_GET['user'];
				$tan_num = $_GET['num'];
				$adddate = $_GET['adddate'];
				$qx = $_GET['qx'];
				if ( $user != "" && $tan_num != "" && $adddate != "" && $qx != "" )
				{
								if ( $qx == 1 )
								{
												$qx = 0;
								}
								else
								{
												$qx = 1;
								}
								$db1->query( "update web_tan set qx='".$qx."' where username='".$user."' and num='".$tan_num."' and adddate='".$adddate."'" );
								$db1->query( "update web_tans set qx='".$qx."' where username='".$user."' and num='".$tan_num."' and adddate='".$adddate."'" );
								echo "<script>parent.location.replace(parent.location.href);</script>";
								exit( );
				}
}
$vvv = "";
if ( $_GET['date_start'] != "" )
{
				$date_start = $_GET['date_start'];
}
else
{
				$date_start = date( "Y-m-d" );
}
if ( $_GET['date_end'] != "" )
{
				$date_end = $_GET['date_end'];
}
else
{
				$date_end = date( "Y-m-d" );
}
$gtype = $_GET['gtype'];
$wtype = $_GET['wtype'];
$user = $_GET['user'];
$tan_num = $_GET['num'];
if ( $user == "" && $tan_num == "" )
{
				echo "<script>alert('�û��뵥�Ų���ȫΪ��!�����²�ѯ'); window.location.href = 'main.php?action=real_list_manage&uid=".$uid."';</script>";
				exit( );
}
$stime = $date_start." 00:00:00";
$etime = $date_end." 23:59:59";
if ( $_GET['kithe'] != "" )
{
				$kithe = $_GET['kithe'];
				$vvv .= " and kithe='".$kithe."'";
}
else
{
				$kithe = "";
				$vvv .= " and adddate>='".$stime."' and adddate<='".$etime."' ";
}
$tb_name = "";
if ( $kithe == $Current_Kithe_Num )
{
				$tb_name = "web_tan";
}
else
{
				$tb_name = "web_tans";
}
if ( $kithe == "" )
{
				if ( $Current_KitheTable[29] != 0 && $date_start == date( "Y-m-d" ) )
				{
								$tb_name = "web_tan";
				}
				else
				{
								$tb_name = "web_tans";
				}
}
if ( $gtype != "" )
{
				$vvv .= " and ds_lb='".$gtype."' ";
				$result = $db1->query( "select ds from web_config_ds where ds_lb='".$gtype."' order by id desc LIMIT 1" );
				$ds_row = $result->fetch_array();
				$class2 = $ds_row['ds'];
}
else
{
				$class2 = "";
}
if ( $wtype != "" )
{
				if ( $wtype == 1 )
				{
								$qx = 1;
				}
				else
				{
								$qx = 0;
				}
				$vvv .= " and qx='".$qx."' ";
}
if ( $user != "" && $tan_num == "" )
{
				$vvv .= " and username='".$user."' ";
}
if ( $user == "" && $tan_num != "" )
{
				$vvv .= " and num='".$tan_num."' ";
}
$z_zs1 = $z_zs2 = 0;
$z_st1 = $z_st2 = 0;
$z_sum1 = $z_sum2 = 0;
$z_gs1 = $z_gs2 = 0;
$z_dagu1 = $z_dagu2 = 0;
$z_guan1 = $z_guan2 = 0;
$z_zong1 = $z_zong2 = 0;
$z_dai1 = $z_dai2 = 0;
$pagesize = 25;
$page = isset( $_GET['page'] ) ? intval( $_GET['page'] ) : 1;
$result = $db1->query( "select count(*) from ".$tb_name."   where 1=1 ".$vvv." order by adddate desc" );
$num1=$result->fetch_array();
$num = $num1[0];
$total = $num;
$pagecount = ceil( $total / $pagesize );
if ( $pagecount < $page )
{
				$page = $pagecount;
}
if ( $page <= 0 )
{
				$page = 1;
}
$offset = ( $page - 1 ) * $pagesize;
$pre = $page - 1;
$next = $page + 1;
$first = 1;
$last = $pagecount;
?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<script src="js/function.js" type="text/javascript"></script>
<script src="js/report_func.js" type="text/javascript"></script>
<body style="min-width: 1200px;width: 100%">
 <div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">ע����ѯ</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright">
		<table width="874" border="0" cellspacing="0" cellpadding="0">
        <tbody>  
        <tr>
        <td height="28" style="color:#fff;">
		<font color="#CC0000">��ǰ��ѯ</font>--
			<? if ( $kithe != "" )
{
?>��
			<?=$kithe?>��
			<? }
else
{
?><font color="#ffffff">�������䣺</font>
			<?=$date_start?> ~
			<?=$date_end?>
			<? }
?> &nbsp;&nbsp;����:
			<?
if ( $class2 != "" )
{
				echo $class2;
}
else
{
				echo "ȫ��";
}
?> &nbsp;&nbsp;ע��״̬:
			<? if ( $wtype != "" )
{
				if ( $wtype == 1 )
				{
								echo "ע��";
				}
				else
				{
								echo "��Ч";
				}
}
else
{
				echo "ȫ��";
}

if ( $user != "" && $tan_num == "" )
{
				echo "&nbsp;&nbsp;��Ա:";
				echo $user;

}

if ( $user == "" && $tan_num != "" )
{
				echo " &nbsp;&nbsp;ע����:";
				echo $tan_num;

}
?>--<a href="javascript:history.go( -1 );"><font color="ffffff">����һҳ</font></a> </td>

        </tr>
    </tbody>
    </table>
    </div></div>
	<?
$result = $db1->query( "select * from ".$tb_name."   where 1=1 ".$vvv." order by adddate desc limit ".$offset.",".$pagesize );
if ( $result->num_rows != 0 )
{
?>
	<table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
	<tbody>
		<tr>
			<td height="22" align="center" nowrap class="t_list_caption">����/ʱ��</td>
			 <td align="center" nowrap class="t_list_caption">����/�̿�</td>
			 <td align="center" nowrap class="t_list_caption">�û�</td>
			 <td align="center" width="16%" nowrap class="t_list_caption">��ע����</td>
			 <td align="center" nowrap class="t_list_caption">����</td>
			 <td align="center" nowrap width="7%" class="t_list_caption">��ע���</td>
			 <td align="center" nowrap width="3%" class="t_list_caption">��ˮ���</td>
			 <td align="center" nowrap class="t_list_caption">����(ռ��)��ˮ%</td>
			 <td align="center" nowrap class="t_list_caption">�ܴ���(ռ��)��ˮ%</td>
			 <td align="center" nowrap class="t_list_caption">�ɶ�(ռ��)��ˮ%</td>
			 <td align="center" nowrap class="t_list_caption">��ɶ�(ռ��)��ˮ%</td>
			 <td align="center" nowrap class="t_list_caption">��˾(ռ��)</td>
			 <td align="center" nowrap width="8%" class="t_list_caption">��עIP</td>
			 <td align="center" nowrap class="t_list_caption">����</td>
		</tr>
		<? while ( $image = $result->fetch_array() ){?>
		<form action="" method="post">
			<tr class="t_list_tr_2 " <? if ( $image['qx']==1 ) { ?> delete
				<? }
								?> onMouseOver="setPointer(this, 0, 'over', '#FFFFFF', '#FFCC66', '#FFCC99');" onMouseOut="setPointer(this, 0,
				'out', '#FFFFFF', '#FFCC66', '#FFCC99');"><td align="center" bordercolor="cccccc" bgcolor="#FFFFFF">
					<?=$image['num']?><input type="hidden" value="<?=$image['num']?>" name="num" /><br />
					<font color="green" style="line-height: 14px;">
						<?=$image['adddate']?>
					</font>
				</td>
				<td height="35" align="center" bordercolor="cccccc" bgcolor="#FFFFFF">
					<?=$image['kithe']?><input type="hidden" value="<?=$image['kithe']?>" name="kithe" />
					<br />
					<font color="red">
						<?=$image['abcd']?>��
						<?=$image['user_ds']?>
					</font>
				</td>
				<td height="35" align="center" bordercolor="cccccc" bgcolor="#FFFFFF">
					<?=$image['username']?><input type="hidden" value="<?=$image['username']?>" name="username" />
				</td>
				<td height="35" align="center" bordercolor="cccccc" bgcolor="#FFFFFF">
					<?=$image['class1']?>--
					<?=$image['class2']?><input type="text" value=<?=$image['class3']?> name="mx" size=10><br><input
						type="text" value=<?=$image['class5']?> name="mx2" size=30>
				</td>
				<td align="center" nowrap="nowrap" bordercolor="cccccc" bgcolor="#FFFFFF">
					<? if ( $image['class1'] == "����" || $image['class1'] == "��ѡ����" )
								{
												if ( $image['class1'] == "��ѡ����" )
												{
																echo $image['ratelm1'];
												}
												else
												{
																if ( $image['class2'] == "���ж�" || $image['class2'] == "������" )
																{
																				echo $image['ratelm1']."/".$image['ratelm2'];
																}
																else
																{
																				echo $image['ratelm1'];
																}
												}
								}
								else
								{
												echo $image['rate'];
								}
?>
				</td>
				<td align="center" nowrap="nowrap" bordercolor="cccccc" bgcolor="#FFFFFF">
					<font color="#cc0000">
						<input type="text" name="sum_m" value="<?=round( $image['sum_m'], 2 )?>" size=10 />
					</font>
				</td>
				<td width="51" align="center" bordercolor="cccccc" bgcolor="#FFFFFF">
					<?=round( $image['sum_m'] * $image['user_ds'] / 100, 2 )?>
				</td>
				<td width="59" align="center" bordercolor="cccccc" bgcolor="#FFFFFF">
					<?=$image['dai']?>
					<br>(
					<?=round( $image['daizc'], 2 )?>)<br>
					<?=$image['dai_ds']?>
				</td>
				<td width="68" align="center" bordercolor="cccccc" bgcolor="#FFFFFF">
					<?=$image['zong']?>
					<br>(
					<?=round( $image['zongzc'], 2 )?>)<br>
					<?=$image['zong_ds']?>
				</td>
				<td width="60" align="center" bordercolor="cccccc" bgcolor="#FFFFFF">
					<?=$image['guan']?>
					<br>(
					<?=round( $image['guanzc'], 2 )?>)<br>
					<?=$image['guan_ds']?>
				</td>
				<td width="68" align="center" bordercolor="cccccc" bgcolor="#FFFFFF">
					<?=$image['dagu']?><br>(
					<?=round( $image['daguzc'], 2 )?>)<br>
					<?=$image['dagu_ds']?>
				</td>
				<td align="center" nowrap="nowrap" bordercolor="cccccc" bgcolor="#FFFFFF">
					��˾<br>(
					<?=round( $image['gszc'], 2 )?>)
				</td>
				<td align="center" nowrap="nowrap" bordercolor="cccccc" bgcolor="#FFFFFF"><b>
						<font color=blue>
							<?=$image['ip']?>
						</font>
					</b></td>
				<td align="center" nowrap="nowrap" bordercolor="cccccc" bgcolor="#FFFFFF"><input type="submit" name="xg"
						value="�޸�" />

				</td>
			</tr>
		</form>
		<? }?>
		<tr>
			<td height="25" align="center" 	colspan="14" bordercolor="cccccc" bgcolor="#FFFFFF">��ǰΪ��
								<?=$page?>ҳ&nbsp;��
								<?=$pagecount?>ҳ&nbsp;��
								<?=$total?>��¼
							</span>&nbsp; <a
								href="main.php?action=real_list_m6&uid=<?=$uid?>&kithe=<?=$kithe?>&user=<?=$user?>&num=<?=$tan_num?>&date_start=<?=$date_start?>&date_end=<?=$date_end?>&gtype=<?=$gtype?>&wtype=<?=$wtype?>&page=1">��ҳ</a><a
								href="main.php?action=real_list_m6&uid=<?=$uid?>&kithe=<?=$kithe?>&user=<?=$user?>&num=<?=$tan_num?>&date_start=<?=$date_start?>&date_end=<?=$date_end?>&gtype=<?=$gtype?>&wtype=<?=$wtype?>&page=<?=$pre?>">��һҳ</a>
							<a
								href="main.php?action=real_list_m6&uid=<?=$uid?>&kithe=<?=$kithe?>&user=<?=$user?>&num=<?=$tan_num?>&date_start=<?=$date_start?>&date_end=<?=$date_end?>&gtype=<?=$gtype?>&wtype=<?=$wtype?>&page=<?=$next?>">��һҳ</a><a
								href="main.php?action=real_list_m6&uid=<?=$uid?>&kithe=<?=kithe?>&user=<?=$user?>&num=<?=$tan_num?>&date_start=<?=$date_start?>&date_end=<?=$date_end?>&gtype=<?=$gtype?>&wtype=<?=$wtype?>&page=<?=$last?>">ĩҳ</a>
							&nbsp;
			</td>
		</tr>
	</tbody>	
	</table><br>
	<table width="900" border="0" cellspacing="1" cellpadding="0" align="center" bgcolor="#FFFFFF" class="t_list">
		<tr align="center">
			<td width="101" class="t_list_tr_3">���β�ѯ�ܼ�</td>
			<td width="122" class="t_list_tr_3">����</td>
			<td width="218" class="t_list_tr_3">��ע���</td>
		</tr>
		<tr class="t_list_tr_2" align="center">
			<?
				$result = $db1->query( "select sum(sum_m) as sum_m,sum(sz) as zs from ".$tb_name."   where 1=1 ".$vvv." order by adddate desc" );
				$row = $result->fetch_array();
?>
			<td>��
				<?=$pagecount?>ҳ��ʾ
			</td>
			<td>
				<?=$row['zs']?>
			</td>
			<td>
				<?=round( $row['sum_m'], 2 )?>
			</td>
		</tr>
	</table>
	<?
}
else
{
?>
	<table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list"	>
	<tbody>
		<tr>
			<td align="center" height="30" bgcolor="#CC0000" >
				<marquee align="middle" behavior="alternate" width="200">
					<font color="#FFFFFF">�����κ�����</font>
				</marquee>
			</td>
		</tr>
		<tr>
			<td align="center"   height="20" bgcolor="#CCCCCC"><a href="javascript:history.go(-1);">�뿪</a></td>
		</tr>
		</tbody>
	</table>
	<? } ?>
</body>