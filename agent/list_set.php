<?php
if ( !defined( "KK_VER" ) )
{
    exit( "��Ч�ķ���" );
}
if ( $vip == 1 )
{
    echo "<center>���˺Ų����������Զ��߷�!</center>";
    exit( );
}
include( "check_zf.php" );
if ( $pz_of == 1 && ty == 1 )
{
    exit( );
}
if ( $Current_KitheTable[29] == 0 )
{
    $edit_label = "";
    $edit = 0;
}
else
{
    $edit_label = "disabled";
    $edit = 1;
}
$edit_count = 0;
$str1 = $str2 = "";
$result = $db1->query( "select ds_id,ds_lb,ds,pz,pz_sum,zf_sum from web_user_ds where username='".$kauser."' order by ID" );
$drop_table = array( );
$y = 0;
while ( $image = $result->fetch_array() )
{
    $y++;
    array_push( $drop_table, $image );
}
$drop_count = $y - 1;
if ( $_GET['save'] == "save" )
{
    $rid = $_POST['drop_id'];
    $drop_name = $_POST['drop_name'];
    $zf_sum = $_POST['zf_sum'];
    $pz_sum = $_POST['pz_sum'];
    $I = 0;
    for ( ; $I <= count( $rid ) - 1; $I = $I + 1 )
    {
        if ( !is_numeric( $zf_sum[$I] ) || $zf_sum[$I] < 0 )
        {
            $zf_sum[$I] = 500000;
        }
        if ( $edit == 0 )
        {
            if ( !is_numeric( $pz_sum[$I] ) || $pz_sum[$I] < 0 )
            {
                echo "<script>alert('".$drop_name[$I]."���Զ���������(��)ռ�ɽ����д�������������֣�');window.history.go(-1);</script>";
                exit( );
            }
        }
    }
    $I = 0;
    for ( ; $I < count( $rid ); $I = $I + 1 )
    {
        $temename = "pz_".$rid[$I];
        if ( isset( $_POST[$temename] ) )
        {
            $lock_drop = 1;
        }
        else
        {
            $lock_drop = 0;
        }
        $db1->query( "update web_user_ds set zf_sum=".$zf_sum[$I]." where  username='".$kauser."' and ds_id=".$rid[$I] );
        if ( $edit == 0 )
        {
            if ( $pz_sum[$I] != $drop_table[$I][4] || $lock_drop != $drop_table[$I][3] )
            {
                $db1->query( "update web_user_ds set pz_sum=".$pz_sum[$I].",pz=".$lock_drop." where  username='".$kauser."' and ds_id=".$rid[$I] );
                $edit_count += 1;
                $str1 .= $drop_name[$I].":".$drop_table[$I][4];
                if ( $drop_table[$I][3] == 0 )
                {
                    $str1 .= " �ر�<br>";
                }
                else
                {
                    $str1 .= " ����<br>";
                }
                $str2 .= $drop_name[$I].":".$pz_sum[$I];
                if ( $lock_drop == 0 )
                {
                    $str2 .= " �ر�<br>";
                }
                else
                {
                    $str2 .= " ����<br>";
                }
            }
        }
    }
    if ( 0 < $edit_count )
    {
        $db1->query( "update web_member set uid='' where dai='{$kauser}' or zong='{$kauser}' or guan='{$kauser}' or dagu='{$kauser}'" );
        $db1->query( "update web_agent set uid='' where zong='{$kauser}' or guan='{$kauser}' or dagu='{$kauser}'" );
        $str1 = "�޸��Զ��߷�ǰ<br>".$str1;
        $str2 = "�޸��Զ��߷ɺ�<br>".$str2;
       // $sql = "INSERT INTO  web_user_log set adddate='".$utime."',adduser='".$kauser."',kauser='".$kauser."',lx=2,text1='".$str1."',text2='".$str2."',ip='".$userip."'";
       // $db1->query( $sql );
		addlog($utime,$kauser,$kauser,'2',$str1,$str2,$userip);
    }
    echo "<script>alert('���óɹ�!');window.location.href='main.php?action=list_set&uid={$uid}&vip={$vip}';</script>";
    exit( );
}
?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<script src="js/function.js" type="text/javascript"></script>
<body style="min-width: 1200px;width: 100%">
 <div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;����</span><span class="font_b">����ע��&nbsp;</span></div>       
     <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright">
           <table border="0" align="right" cellpadding="0" cellspacing="0">
            <tbody><tr>
                <td height="28" style="color:#fff;">     
                    <td colspan="5"><?if ( $edit == 1 ){?><font color='red'>��ǰΪ�����У������ڼ䲻���޸��Զ��߷ɲ�����</font><?}?>       ��������谴��ȷ�������棡</td>
                    </tr>
              </tbody>
              </table>
      </div></div>          
     <table width="800" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
                    <tbody><tr>
                    <td align="center" nowrap="" class="t_list_caption">�淨����</td>
                    <td align="center" nowrap="" class="t_list_caption">�ֶ�����Ԥ��ӯ��/ռ�ɽ��</td>
                    <td align="center" nowrap="" class="t_list_caption">�Զ���������(��)ռ�ɽ��</td>
                    <td align="center" nowrap="" class="t_list_caption">�𲹽��</td>
                    <td align="center" nowrap="" class="t_list_caption">����/�ر��Զ�����</td>
                    </tr>
<?
$I = 0;
for ( ; $I <= $drop_count; $I = $I + 1 )
{
?>
<tr bgcolor="#ffffff" onmouseover="javascript:this.bgColor='#FFFFA2'" onmouseout="javascript:this.bgColor='#ffffff'">
<td height="30" align="right">
<input type="hidden" name="drop_name[]" value='<?=$drop_table[$I][2]?>' /><input type="hidden" name="drop_id[]" value='<?=$drop_table[$I][0]?>' /><?=$drop_table[$I][2]?>:</td>
<td align="center">
<?
    if ( $drop_table[$I][2] != "��B" && $drop_table[$I][2] != "��B" )
    {
        if ( in_array( $drop_table[$I][2], array( "��A" ) ) )
        {
            echo "<font class='font_r'>Ԥ��ӯ��=</font>";
        }
        else
        {
            echo "<font class='font_b'>ռ�ɽ��=</font>";
        }
?><input name="zf_sum[]" class="za_text" value='<?=$drop_table[$I][5]?>'  size="10" /> <?  }
    else
    {
?><input name="zf_sum[]"  type="hidden" value='<?=$drop_table[$I][5]?>' /> 
<?
    }
?>
</td>
<td align="center"><input name="pz_sum[]" class="za_text" value='<?=$drop_table[$I][4]?>'  size="10" <?=$edit_label?> /></td>
<td align="center">1</td>
<td align="center"><input name='pz_<?=$drop_table[$I][0]?>' type='checkbox' value='<?=$drop_table[$I][3]?>' 
<?
    if ( $drop_table[$I][3] == "1" )
    {
        echo "checked=checked";
    }
 
    echo $edit_label;
?>
>        </td></tr>
<?
}
?> <tr >
<tr>
            <td colspan="7" bgcolor="#FFFFFF">
                <dl>
                    <dt><b>����˵��:</b></dt>
                    <dd>1�����ʲ����������𲹽��ʱ����������ʱ������</dd>
                    <dd>2��������ӯ����ָ���Ե���ռ�ɸ�ֵ���㣨��׬ˮ��׬���ʲ��</dd>
                    <dd>3�����롢��Ф����Ф����β��������ѡ���в��������Ե�����㣬��Ա��ʽ�����ϡ�������ע���ֲ�ɵ�����в�����</dd>
                    <dd>4��<font class="font_r">�����ڼ��޸ĵ��Զ���������ֻ�����ú���Ͷע��Ŀ��Ч������ǰ�Ѳ�����ע����Ȼ��Ч��</font></dd>
                </dl>
            </td>
        </tr>    
    <td colspan="5" align="center" bgcolor="#FFFFFF" >
        <button  type="button" class="btn2" onClick="submit()";>����</button></td>
                </tr>
                </tbody>
            </table><!--table3 ���--        !-->  
           
</body>