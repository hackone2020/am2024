<?php

class RunTime
{
    public function Rstartime()
    {
        $nowtime = explode(" ", microtime());
        $starttime = $nowtime[1] + $nowtime[0];
        return $starttime;
    }
    public function Rendtime()
    {
        global $starttime;
        $nowtime = explode(" ", microtime());
        $endtime = $nowtime[1] + $nowtime[0];
        $totaltime = $endtime - $starttime;
        return number_format($totaltime, 6);
    }
}
function get_tbnum($c)
{
    if ($c % 2) {
        return 2;
    } else {
        return 1;
    }
}
if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
if ($Current_KitheTable[29] != 0 && $kplist == 1) {
     echo "<meta http-equiv=\"refresh\" content=\"0;url=main.php?action=stop&uid=".$uid."&lx=1\">";
    exit( );
}
$time = new RunTime();
$starttime = $time->Rstartime();
?>
<script src="js/function.js" type="text/javascript"></script>
<link rel="stylesheet" href="/member/stylesheets/main.css?t=1683715146" type="text/css">
<body marginwidth="0" marginheight="0">
<table width="800" cellpadding="0" cellspacing="0">
  <tbody><tr>
    <td height="22">�˻���ʷ-������</td>
  </tr>
</tbody></table>

        <?
include "class/text_cache.php";
$cache = new cache(86400);
$cachename = date("YmdHis", strtotime($report_time));
$temp = $cache->cacheCheck("cache/" . $dblabel . "/member/" . $uid . "/mem_wagers_history_" . $cachename . ".php");
if ($temp != true) {?>
 <table width="800" border="0" cellpadding="0" cellspacing="1" class="t_list">
  <tbody><tr>
	<td width="200" class="t_list_caption">����</td>	
	<td width="100" class="t_list_caption">����</td>
	<td width="100" class="t_list_caption">ע����</td>
	<td width="100" class="t_list_caption">��ע���</td>
	<td width="100" class="t_list_caption">���</td>
	<td width="100" class="t_list_caption">��ˮ</td>
	<td width="100" class="t_list_caption">��ˮ����</td>
	</tr>
   <?
   $ii = 0;
    $z_sum = 0;
    $z_zs = 0;
    $z_user = 0;
    $z_userds = 0;
    $d = array("����", "��һ", "�ܶ�", "����", "����", "����", "����");
    $result = $db1->query("select nd,nn from web_kithe where  na<>0 and lx=1 order by nn desc limit 16");
    if ($result->num_rows == 0) {
     ?>   <tr>
		<td bgcolor="#FFFFFF" align="center" height="28" colspan=7>���޼�¼��</td></tr>
      <?  exit;
    } else {
        while ($rs = $result->fetch_array()) {
            ++$ii;
            $result1 = $db1->query("select sum(sum_m) as sum_m,sum(sz) as zs from web_tans   where username='" . $username . "' and kithe='" . $rs['nn'] . "' and visible=1 ");
            $Rs5 = $result1->fetch_array();
            $z_zs += $Rs5['zs'];
            $z_sum += $Rs5['sum_m'];
            $result2 = $db1->query("select sum(user_sf) as user_sf,sum(user_sq) as user_sq from web_tans  where username='" . $username . "' and kithe='" . $rs['nn'] . "' and (bm=0 or bm=1)and qx=0 and visible=1 ");
            $Rs6 = $result2->fetch_array();
            $z_user += $Rs6['user_sf'];
            $z_userds += $Rs6['user_sq'];
      ?>      
			<tr bgcolor="#FFFFA2" onmouseover="javascript:this.bgColor='#FFFFA2'" onmouseout="javascript:this.bgColor='#ffffff'">
			<td height="27" align="center"><?=substr($rs['nd'], 0, 10)?>
			<font class="font_b"><?=$d[date("w", strtotime($rs['nd']))]?>
            </font></td>
			
			<td align="center">��<?=$rs['nn']?>��</td>
    		<td align="center"><?=$Rs5['zs']?></td>
			<td align="center"><a href="main.php?action=mem_wagers_list&uid=<?=$uid?>&kithe=<?=$rs['nn']?>"><?=round($Rs5['sum_m'], 2)?></a></td>
        	<td align="center"><a href="main.php?action=mem_wagers_list&uid=<?=$uid?>&kithe=<?=$rs['nn']?>"><?=round($Rs6['user_sf'] - $Rs6['user_sq'], 2)?></a></td>
			<td align="center"><a href="main.php?action=mem_wagers_list&uid=<?=$uid?>&kithe=<?=$rs['nn']?>"><?=round($Rs6['user_sq'], 2)?></a></td>
			<td align="center"><a href="main.php?action=mem_wagers_list&uid=<?=$uid?>&kithe=<?=$rs['nn']?>"><font color="red"><?=round($Rs6['user_sf'], 2)?></font></a></td>
        </tr>
        <?}
        }?>
        <td height="22" colspan="2" align="center" class="t_list_tr_2">�ܼ�:
                <span id="bishu" class="formtongji1"><?=$z_zs?></span> ��&nbsp;
            </td>
            <td align="center" class="t_list_tr_2">
                <span id="jine" class="formtongji1"><?=round($z_sum, 2)?>
                </span>
            </td>
		    <td align="center" class="t_list_tr_2">
                <?=round($z_user - $z_userds, 2)?>
            </td>
			<td align="center" class="t_list_tr_2">
                <span id="tuishui" class="formtongji1"><?=round($z_userds, 2)?></span>
            </td>
			<td align="center" class="t_list_tr_2">
                <span id="keying" class="formtongji1"><?=round($z_user, 2)?></span>
            </td>
        </tr>
        </table>
       <? $cache->caching();
        }
        $time = $time->Rendtime();
        $htmlstr = "ҳ��ִ��" . $time . " ��<br>";
        echo $htmlstr;
        ?>
    </div>
</body>