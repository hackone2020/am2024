<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
if (strpos($flag, "09")) {
} else {
    echo "<center>你没有该权限功能!</center>";
    exit;
}?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<script src="js/function.js" type="text/javascript"></script>
<script src="js/calendar.js" type="text/javascript"></script>
<script language="JavaScript">
    function Ckpzall(ckid) {
        if (ckid == 0) { $("gtype").disabled = false; $("action").value = "report_m1"; }

        if (ckid == 1) {
            $("gtype").disabled = true;
            $("action").value = "report_class";
        }
    }
    function Cks(ckid) {
        if (ckid == 0) { }
        if (ckid == 1) { $("kithe").value = ""; }
    }
    function checks() {
        var stime = $("date_start").value;

        var etime = $("date_end").value;
        if (stime == "" || etime == "") { alert('请正确选择日期区间!!'); return false; }
        var result1 = Date.parse(stime.replace(/-/g, "/")) - Date.parse(etime.replace(/-/g, "/"));
        if (result1 > 0) {
            alert('日期区间的开始时间不得大于结束时间!!');
            $("date_start").focus(); return false;
        }
    }
    function chg_date(range, num1, num2) {
        if (range == 't' || range == 'w' || range == 'r') {
            myFORM.date_start.value = '<?=date("Y-m-d")?>';

            myFORM.date_end.value = myFORM.date_start.value;
        } if (range != 't') {
            if (myFORM.date_start.value != myFORM.date_end.value) {
                myFORM.date_start.value = '<?=date("Y-m-d")?>';

                myFORM.date_end.value = myFORM.date_start.value;
            }
            var aStartDate = myFORM.date_start.value.split('-');
            var newStartDate = new Date(parseInt(aStartDate[0], 10), parseInt(aStartDate[1], 10) - 1, parseInt(aStartDate[2], 10) + num1);
            myFORM.date_start.value = newStartDate.getFullYear() + '-' + (newStartDate.getMonth() + 1) + '-' + newStartDate.getDate();
            var aEndDate = myFORM.date_end.value.split('-');

            var newEndDate = new Date(parseInt(aEndDate[0], 10), parseInt(aEndDate[1], 10) - 1, parseInt(aEndDate[2], 10) + num2);

            myFORM.date_end.value = newEndDate.getFullYear() + '-' + (newEndDate.getMonth() + 1) + '-' + newEndDate.getDate();
        }
    }

</script>

<body style="min-width: 1200px;width: 100%">
    <form action="main.php" method="get" name="myFORM" id="myFORM" onSubmit="return checks(this)">
    <input name="action" type="hidden" id="action" value="report_m1" />
    <input name="uid" type="hidden" id="uid" value="<?=$uid?>" />
 <div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">报表查询</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright"></div>
</div>
                   <table width="800" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
                       <tbody>
                        <tr>
                             <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_list_caption">报表查询</td>
                             </tr>
                             <tr>
							<td width="15%" height="30" bgcolor="#FFFFFF" class="t_edit_caption">日期区间: </td>
                            <td width="85%" height="30" colspan="2" bgcolor="#FFFFFF" class="t_edit_td">
                                <table border="0" cellspacing="0" cellpadding="0">
                                    <tr>
										<td><input type=TEXT name="date_start" value="<?=date(" Y-m-d")?>" onKeyUp="Cks(1);" size=10 maxlength=11 class="za_text"></td>
                                        <td><a href="javascript:void(0);" onClick="new Calendar(2021,2025).show($('date_start'));Cks(1);">&nbsp;&nbsp;<img src="/images/calendar.png" name="imgCalendar" width="16" height="16" border="0"></a></td>
                                        <td width="20" align="center">~</td>
										<td><input type=TEXT name="date_end" value="<?=date(" Y-m-d")?>" onKeyUp="Cks(1);" size=10 maxlength=10 class="za_text"></td>
										<td>
											<a href="javascript:void(0);" onClick="new Calendar(2021,2025).show($('date_end'));Cks(1);">&nbsp;&nbsp;<img src="/images/calendar.png" name="imgCalendar" width="16" height="16" border="0"></a>
										</td>
                                        <td>&nbsp;</td>
                                        <td>
										 <?if ($Current_Kithe_Num != 1) {?>
                                           <input name="Submit" type="Button" class="btn4" onClick="$('kithe').value='<?=$Current_Kithe_Num?>'" value="本期">&nbsp;
                                            <? }
												$time = strtotime(date("Y-m-d"));
												$getWeekDay = date("w", $time);
												if ($getWeekDay == 0) {
												    $getWeekDay = 7;
												}
												$firstday = date("Y-m-01", strtotime(date("Y", $time) . "-" . (date("m", $time) - 1) . "-01"));
												$lastday = date("Y-m-d", strtotime("{$firstday} +1 month -1 day"));
											?>
  <input name="Submit" type="Button" class="btn4" onClick="chg_date('t',0,0);Cks(1);" value="今日">&nbsp;<input name="Submit" type="Button" class="btn4" onClick="myFORM.date_start.value='<?=date("Y-m-d", strtotime(date("Y-m-d") . " -1 day" ))?>';myFORM.date_end.value='<?=date("Y-m-d", strtotime(date("Y-m-d") . " -1 day"))?>';Cks(1);" value="昨日">&nbsp;&nbsp; <input name="Submit" type="Button" class="btn4" onClick="myFORM.date_start.value='<?=date("Y-m-d", time() - 86400 * date("w") + (0 < date("w") ? 86400 : -518400))?>';myFORM.date_end.value='<?=date("Y-m-d")?>';Cks(1);" value="本星期">&nbsp;
    <input name="Submit" type="Button" class="btn4" onClick="myFORM.date_start.value='<?=date("Y-m-d", mktime(0, 0, 0, date("m", $time), date("d", $time) - $getWeekDay + 1 - 7, date("Y",
                                                $time)))?>';myFORM.date_end.value='<?=date("Y-m-d", mktime(0, 0, 0, date("m", $time), date("d", $time) - $getWeekDay + 7 - 7, date("Y", $time)))?>';Cks(1);"
                                            value="上星期">&nbsp;
                                            <input name="Submit" type="Button" class="btn4" onClick="myFORM.date_start.value='<?=date("Y-m-d", mktime(0, 0, 0, date("n"), 1, date("Y")))?>';myFORM.date_end.value='<?=date("Y-m-d")?>';Cks(1);" value="本月">&nbsp;
                                            <input name="Submit" type="Button" class="btn4" onClick="myFORM.date_start.value='<?=$firstday?>';myFORM.date_end.value='<?=$lastday?>';Cks(1);" value="上月">
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <tr>
                            <td height="30" bgcolor="#FFFFFF" class="t_edit_caption">期数选择:</td>
                            <td height="30" bgcolor="#FFFFFF" class="t_edit_td">
                                <select name="kithe" class="za_select" id="kithe">

                                    <option value="" selected="selected">按时间来查</option>
                                    <? $result = $db1->query("select * from web_kithe order by nn desc  LIMIT 30");?>
                                    <? while ($image = $result->fetch_array()) {?>
                                    <option value="<?=$image['nn']?>">第<?=$image['nn']?>期</option>
                                        <?}?>
                                </select>&nbsp;(如果选择了期数,上面的日期将无效！)
                            </td>
                        </tr>

                        <tr>

                            <td height="30" bgcolor="#FFFFFF" class="t_edit_caption">报表类型:</td>
                           <td height="30" bgcolor="#FFFFFF" class="t_edit_td">
                                <input name="radio" type="radio" id="radio" value="all" onClick="Ckpzall(0)" checked>全部
                                <input name="radio" type="radio" id="radio" value="class" onClick="Ckpzall(1)">分类
                            </td>
                        </tr>
                        <tr>
                            <td height="30" bgcolor="#FFFFFF" class="t_edit_caption"> 下注类型: </td>
                            <td height="30" bgcolor="#FFFFFF" class="t_edit_td">

                                <select name="gtype" class="za_select" id="gtype">
                                    <option value="" selected="selected">全部</option>

                                    <? 
                                    $result = $db1->query("SELECT ds,ds_lb FROM web_config_ds ORDER BY id");
								    while ($image = $result->fetch_array()) {?>
                                    <option value="<?=$image['ds_lb']?>"><?=$image['ds']?></option>
                                    <?}?>
                                </select>
                            </td>
                        </tr>


                        <tr bgcolor="#FFFFFF">
                            <td height="30" colspan="3" align="center">
                                <input type="submit" name="submit" value="查询" class="btn1m">
                            </td>
                        </tr>
                    </table>
                </td>
                </td>
            </tr>
        </table>
    </form>
    
  <script language="JavaScript">
  <?
if ( $Current_Kithe_Num != 1 )
{
  ?>
  $("kithe").value ='<?=$Current_Kithe_Num?>';
   
<?}?>
</script>

</body>