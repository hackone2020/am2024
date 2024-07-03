
<script>

   var Select = function(elem){
      var jmpURL = 'main.php?action=bet_zt&ids=' + elem + '&uid=' + uid;
      if (jmpURL != '') {
         window.location = jmpURL;
      } else {
         elem.selectedIndex = 0;
      }
   }
</script>
<table  width="800" border="0" cellpadding="0" cellspacing="0">
   <tbody>
       <tr>
        <td width="180" height="30">
         <font class="font_b font_bold" id="item_name"><?=$ids?></font>&nbsp;
         <font class="font_g font_bold" id="g_ln"><?=$Current_Kithe_Num?>期
         </font>
      </td>
      <td align="center">
         <font class="font_d">距离封盘:
         </font>
         <font class="font_r" id="daojishi"><span style="font-size: 12px; font-weight: bold;"class="shijiancolor" id="daojishi"></span></font>
      </td>
      <td width="50" align="center">
         <font class="font_d font_bold" id="loadingnumber" style="font-size: 16px; vertical-align: middle; display: block;">
              <span id="loadingnumber" style="font-family: @GulimChe; font-size: 16px; font-weight: bold;display: none;"> <?=$autotime / 1000?></font>
         <img id="loadingimg" style="vertical-align: middle; display: none;" src="/member/images/loading.gif" alt="加载中..." width="16" height="20">
      </td> 
         <td width="75" align="center">
         <a href="main.php?action=bet_kuaisu&uid=<?=$uid?>&class2=<?=$ids?>" id="kuaijiefangshi" target="leftFrame"><input name="button3" type="button" class="btn3" onmouseover="this.className='btn3m'" onmouseout="this.className='btn3'" value="快速模式" title="快速模式"></a>
      </td> 
      </tr>
         </tbody>
   </table>	
      <div style="text-align: center;width:800px">
			<!--<select id="ids" name="ids" onChange="var jmpURL='main.php?action=bet_zt&uid=<?=$uid?>&ids='+this.options[this.selectedIndex].value ; if(jmpURL!='') {window.location=jmpURL;} else {this.selectedIndex=0 ;}">-->
			<!--	<option value="正1特">正1特</option>-->
			<!--	<option value="正2特">正2特</option>-->
			<!--	<option value="正3特">正3特</option>-->
			<!--	<option value="正4特">正4特</option>-->
			<!--	<option value="正5特">正5特</option>-->
			<!--	<option value="正6特">正6特</option>-->
			<!--</select>-->
			<input name="button2" type="button" class="btn1" onmouseover="this.className='btn1m'" onmouseout="this.className='btn1'" onclick="Select('正1特');" value="正1特" title="正1特">
			<input name="button2" type="button" class="btn1" onmouseover="this.className='btn1m'" onmouseout="this.className='btn1'" onclick="Select('正2特');" value="正2特" title="正2特">
			<input name="button2" type="button" class="btn1" onmouseover="this.className='btn1m'" onmouseout="this.className='btn1'" onclick="Select('正3特');" value="正3特" title="正3特">
			<input name="button2" type="button" class="btn1" onmouseover="this.className='btn1m'" onmouseout="this.className='btn1'" onclick="Select('正4特');" value="正4特" title="正4特">
			<input name="button2" type="button" class="btn1" onmouseover="this.className='btn1m'" onmouseout="this.className='btn1'" onclick="Select('正5特');" value="正5特" title="正5特">
			<input name="button2" type="button" class="btn1" onmouseover="this.className='btn1m'" onmouseout="this.className='btn1'" onclick="Select('正6特');" value="正6特" title="正6特">
      </div>
       
								

	 <table  width="800" border="0" cellpadding="0" cellspacing="1" class="t_list">								
	<form target="leftFrame" name="form1"  method="post" action="main.php?action=bet_n1&uid=<?=$uid?>&class2=<?=$ids?>" onSubmit="return ChkSubmit()">
   <tbody>
        <tr>
            <td class="t_list_caption">号码</td>
            <td class="t_list_caption">赔率</td>
            <td class="t_list_caption">金额</td>
            <td class="t_list_caption">号码</td>
            <td class="t_list_caption">赔率</td>
            <td class="t_list_caption">金额</td>
            <td class="t_list_caption">号码</td>
            <td class="t_list_caption">赔率</td>
            <td class="t_list_caption">金额</td>
            <td class="t_list_caption">号码</td>
            <td class="t_list_caption">赔率</td>
            <td class="t_list_caption">金额</td>
            <td class="t_list_caption">号码</td>
            <td class="t_list_caption">赔率</td>
            <td class="t_list_caption">金额</td>
        </tr>
        <tr class="maintable1tr2">
             <td align="center" bgcolor="#FFFFFF" id="bnumber1">
                <div class="No_1"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl1><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','1');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_1" />
                <input name="class3_1" value="1" type="hidden">
                <input name="xr_1" type="hidden" value="0">
                <input name="locked_1" type="hidden" value="0">
            </td>
             <td align="center" bgcolor="#FFFFFF" id="bnumber11">
                <div class="No_11"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl11><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','11');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_11" />
                <input name="class3_11" value="11" type="hidden">
                <input name="xr_11" type="hidden" value="0">
                <input name="locked_11" type="hidden" value="0">
            </td>
             <td align="center" bgcolor="#FFFFFF" id="bnumber21">
                <div class="No_21"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl21><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','21');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_21" />
                <input name="class3_21" value="21" type="hidden">
                <input name="xr_21" type="hidden" value="0">
                <input name="locked_21" type="hidden" value="0">
            </td>
             <td align="center" bgcolor="#FFFFFF" id="bnumber31">
                <div class="No_31"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl31><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','31');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_31" />
                <input name="class3_31" value="31" type="hidden">
                <input name="xr_31" type="hidden" value="0">
                <input name="locked_31" type="hidden" value="0">
            </td>
             <td align="center" bgcolor="#FFFFFF" id="bnumber41">
                <div class="No_41"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl41><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','41');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_41" />
                <input name="class3_41" value="41" type="hidden">
                <input name="xr_41" type="hidden" value="0">
                <input name="locked_41" type="hidden" value="0">
            </td>
        </tr>
        <tr class="maintable1tr2">
             <td align="center" bgcolor="#FFFFFF" id="bnumber2">
                <div class="No_2"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl2><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','2');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_2" />
                <input name="class3_2" value="2" type="hidden">
                <input name="xr_2" type="hidden" value="0">
                <input name="locked_2" type="hidden" value="0">
            </td>
             <td align="center" bgcolor="#FFFFFF" id="bnumber12">
                <div class="No_12"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl12><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','12');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_12" />
                <input name="class3_12" value="12" type="hidden">
                <input name="xr_12" type="hidden" value="0">
                <input name="locked_12" type="hidden" value="0">
            </td>
             <td align="center" bgcolor="#FFFFFF" id="bnumber22">
                <div class="No_22"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl22><a>0</a></span>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','22');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_22" />
                <input name="class3_22" value="22" type="hidden">
                <input name="xr_22" type="hidden" value="0">
                <input name="locked_22" type="hidden" value="0">
            </td>
             <td align="center" bgcolor="#FFFFFF" id="bnumber32">
                <div class="No_32"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl32><a>0</a></span>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','32');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_32" />
                <input name="class3_32" value="32" type="hidden">
                <input name="xr_32" type="hidden" value="0">
                <input name="locked_32" type="hidden" value="0">
            </td>
             <td align="center" bgcolor="#FFFFFF" id="bnumber42">
                <div class="No_42"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl42><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','42');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_42" />
                <input name="class3_42" value="42" type="hidden">
                <input name="xr_42" type="hidden" value="0">
                <input name="locked_42" type="hidden" value="0">
            </td>
        </tr>
        <tr class="maintable1tr2">
             <td align="center" bgcolor="#FFFFFF" id="bnumber3">
                <div class="No_3"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl3><a>0</a></span>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','3');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_3" />
                <input name="class3_3" value="3" type="hidden">
                <input name="xr_3" type="hidden" value="0">
                <input name="locked_3" type="hidden" value="0">
            </td>
             <td align="center" bgcolor="#FFFFFF" id="bnumber13">
                <div class="No_13"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl13><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','13');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_13" />
                <input name="class3_13" value="13" type="hidden">
                <input name="xr_13" type="hidden" value="0">
                <input name="locked_13" type="hidden" value="0">
            </td>
             <td align="center" bgcolor="#FFFFFF" id="bnumber23">
                <div class="No_23"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl23><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','23');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_23" />
                <input name="class3_23" value="23" type="hidden">
                <input name="xr_23" type="hidden" value="0">
                <input name="locked_23" type="hidden" value="0">
            </td>
             <td align="center" bgcolor="#FFFFFF" id="bnumber33">
                <div class="No_33"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl33><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','33');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_33" />
                <input name="class3_33" value="33" type="hidden">
                <input name="xr_33" type="hidden" value="0">
                <input name="locked_33" type="hidden" value="0">
            </td>
             <td align="center" bgcolor="#FFFFFF" id="bnumber43">
                <div class="No_43"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl43><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','43');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_43" />
                <input name="class3_43" value="43" type="hidden">
                <input name="xr_43" type="hidden" value="0">
                <input name="locked_43" type="hidden" value="0">
            </td>
        </tr>
        <tr class="maintable1tr2">
             <td align="center" bgcolor="#FFFFFF" id="bnumber4">
                <div class="No_4"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl4><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','4');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_4" />
                <input name="class3_4" value="4" type="hidden">
                <input name="xr_4" type="hidden" value="0">
                <input name="locked_4" type="hidden" value="0">
            </td>
             <td align="center" bgcolor="#FFFFFF" id="bnumber14">
                <div class="No_14"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl14><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','14');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_14" />
                <input name="class3_14" value="14" type="hidden">
                <input name="xr_14" type="hidden" value="0">
                <input name="locked_14" type="hidden" value="0">
            </td>
             <td align="center" bgcolor="#FFFFFF" id="bnumber24">
                <div class="No_24"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl24><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','24');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_24" />
                <input name="class3_24" value="24" type="hidden">
                <input name="xr_24" type="hidden" value="0">
                <input name="locked_24" type="hidden" value="0">
            </td>
             <td align="center" bgcolor="#FFFFFF" id="bnumber34">
                <div class="No_34"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl34><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','34');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_34" />
                <input name="class3_34" value="34" type="hidden">
                <input name="xr_34" type="hidden" value="0">
                <input name="locked_34" type="hidden" value="0">
            </td>
             <td align="center" bgcolor="#FFFFFF" id="bnumber44">
                <div class="No_44"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl44><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','44');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_44" />
                <input name="class3_44" value="44" type="hidden">
                <input name="xr_44" type="hidden" value="0">
                <input name="locked_44" type="hidden" value="0">
            </td>
        </tr>
        <tr class="maintable1tr2">
             <td align="center" bgcolor="#FFFFFF" id="bnumber5">
                <div class="No_5"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl5><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','5');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_5" />
                <input name="class3_5" value="5" type="hidden">
                <input name="xr_5" type="hidden" value="0">
                <input name="locked_5" type="hidden" value="0">
            </td>
             <td align="center" bgcolor="#FFFFFF" id="bnumber15">
                <div class="No_15"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl15><a>0</a></span>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','15');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_15" />
                <input name="class3_15" value="15" type="hidden">
                <input name="xr_15" type="hidden" value="0">
                <input name="locked_15" type="hidden" value="0">
            </td>
             <td align="center" bgcolor="#FFFFFF" id="bnumber25">
                <div class="No_25"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl25><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','25');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_25" />
                <input name="class3_25" value="25" type="hidden">
                <input name="xr_25" type="hidden" value="0">
                <input name="locked_25" type="hidden" value="0">
            </td>
             <td align="center" bgcolor="#FFFFFF" id="bnumber35">
                <div class="No_35"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl35><a>0</a></span>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','35');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_35" />
                <input name="class3_35" value="35" type="hidden">
                <input name="xr_35" type="hidden" value="0">
                <input name="locked_35" type="hidden" value="0">
            </td>
             <td align="center" bgcolor="#FFFFFF" id="bnumber45">
                <div class="No_45"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl45><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','45');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_45" />
                <input name="class3_45" value="45" type="hidden">
                <input name="xr_45" type="hidden" value="0">
                <input name="locked_45" type="hidden" value="0">
            </td>
        </tr>
        <tr class="maintable1tr2">
             <td align="center" bgcolor="#FFFFFF" id="bnumber6">
                <div class="No_6"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl6><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','6');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_6" />
                <input name="class3_6" value="6" type="hidden">
                <input name="xr_6" type="hidden" value="0">
                <input name="locked_6" type="hidden" value="0">
            </td>
             <td align="center" bgcolor="#FFFFFF" id="bnumber16">
                <div class="No_16"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl16><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','16');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_16" />
                <input name="class3_16" value="16" type="hidden">
                <input name="xr_16" type="hidden" value="0">
                <input name="locked_16" type="hidden" value="0">
            </td>
             <td align="center" bgcolor="#FFFFFF" id="bnumber26">
                <div class="No_26"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl26><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','26');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_26" />
                <input name="class3_26" value="26" type="hidden">
                <input name="xr_26" type="hidden" value="0">
                <input name="locked_26" type="hidden" value="0">
            </td>
             <td align="center" bgcolor="#FFFFFF" id="bnumber36">
                <div class="No_36"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl36><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','36');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_36" />
                <input name="class3_36" value="36" type="hidden">
                <input name="xr_36" type="hidden" value="0">
                <input name="locked_36" type="hidden" value="0">
            </td>
             <td align="center" bgcolor="#FFFFFF" id="bnumber46">
                <div class="No_46"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl46><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','46');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_46" />
                <input name="class3_46" value="46" type="hidden">
                <input name="xr_46" type="hidden" value="0">
                <input name="locked_46" type="hidden" value="0">
            </td>
        </tr>
        <tr class="maintable1tr2">
             <td align="center" bgcolor="#FFFFFF" id="bnumber7">
                <div class="No_7"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl7><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','7');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_7" />
                <input name="class3_7" value="7" type="hidden">
                <input name="xr_7" type="hidden" value="0">
                <input name="locked_7" type="hidden" value="0">
            </td>
             <td align="center" bgcolor="#FFFFFF" id="bnumber17">
                <div class="No_17"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl17><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','17');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_17" />
                <input name="class3_17" value="17" type="hidden">
                <input name="xr_17" type="hidden" value="0">
                <input name="locked_17" type="hidden" value="0">
            </td>
             <td align="center" bgcolor="#FFFFFF" id="bnumber27">
                <div class="No_27"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl27><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','27');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_27" />
                <input name="class3_27" value="27" type="hidden">
                <input name="xr_27" type="hidden" value="0">
                <input name="locked_27" type="hidden" value="0">
            </td>
             <td align="center" bgcolor="#FFFFFF" id="bnumber37">
                <div class="No_37"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl37><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','37');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_37" />
                <input name="class3_37" value="37" type="hidden">
                <input name="xr_37" type="hidden" value="0">
                <input name="locked_37" type="hidden" value="0">
            </td>
             <td align="center" bgcolor="#FFFFFF" id="bnumber47">
                <div class="No_47"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl47><a>0</a></span>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','47');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_47" />
                <input name="class3_47" value="47" type="hidden">
                <input name="xr_47" type="hidden" value="0">
                <input name="locked_47" type="hidden" value="0">
            </td>
        </tr>
        <tr class="maintable1tr2">
             <td align="center" bgcolor="#FFFFFF" id="bnumber8">
                <div class="No_8"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl8><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','8');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_8" />
                <input name="class3_8" value="8" type="hidden">
                <input name="xr_8" type="hidden" value="0">
                <input name="locked_8" type="hidden" value="0">
            </td>
             <td align="center" bgcolor="#FFFFFF" id="bnumber18">
                <div class="No_18"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl18><a>0</a></span>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','18');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_18" />
                <input name="class3_18" value="18" type="hidden">
                <input name="xr_18" type="hidden" value="0">
                <input name="locked_18" type="hidden" value="0">
            </td>
             <td align="center" bgcolor="#FFFFFF" id="bnumber28">
                <div class="No_28"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl28><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','28');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_28" />
                <input name="class3_28" value="28" type="hidden">
                <input name="xr_28" type="hidden" value="0">
                <input name="locked_28" type="hidden" value="0">
            </td>
             <td align="center" bgcolor="#FFFFFF" id="bnumber38">
                <div class="No_38"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl38><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','38');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_38" />
                <input name="class3_38" value="38" type="hidden">
                <input name="xr_38" type="hidden" value="0">
                <input name="locked_38" type="hidden" value="0">
            </td>
             <td align="center" bgcolor="#FFFFFF" id="bnumber48">
                <div class="No_48"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl48><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','48');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_48" />
                <input name="class3_48" value="48" type="hidden">
                <input name="xr_48" type="hidden" value="0">
                <input name="locked_48" type="hidden" value="0">
            </td>
        </tr>
        <tr class="maintable1tr2">
             <td align="center" bgcolor="#FFFFFF" id="bnumber9">
                <div class="No_9"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl9><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','9');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_9" />
                <input name="class3_9" value="9" type="hidden">
                <input name="xr_9" type="hidden" value="0">
                <input name="locked_9" type="hidden" value="0">
            </td>
             <td align="center" bgcolor="#FFFFFF" id="bnumber19">
                <div class="No_19"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl19><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','19');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_19" />
                <input name="class3_19" value="19" type="hidden">
                <input name="xr_19" type="hidden" value="0">
                <input name="locked_19" type="hidden" value="0">
            </td>
             <td align="center" bgcolor="#FFFFFF" id="bnumber29">
                <div class="No_29"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl29><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','29');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_29" />
                <input name="class3_29" value="29" type="hidden">
                <input name="xr_29" type="hidden" value="0">
                <input name="locked_29" type="hidden" value="0">
            </td>
             <td align="center" bgcolor="#FFFFFF" id="bnumber39">
                <div class="No_39"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl39><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','39');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_39" />
                <input name="class3_39" value="39" type="hidden">
                <input name="xr_39" type="hidden" value="0">
                <input name="locked_39" type="hidden" value="0">
            </td>
             <td align="center" bgcolor="#FFFFFF" id="bnumber49">
                <div class="No_49"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl49><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','49');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_49" />
                <input name="class3_49" value="49" type="hidden">
                <input name="xr_49" type="hidden" value="0">
                <input name="locked_49" type="hidden" value="0">
            </td>
        </tr>
        <tr class="maintable1tr2">
             <td align="center" bgcolor="#FFFFFF" id="bnumber10">
                <div class="No_10"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl10><a>0</a></span>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','10');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_10" />
                <input name="class3_10" value="10" type="hidden">
                <input name="xr_10" type="hidden" value="0">
                <input name="locked_10" type="hidden" value="0">
            </td>
             <td align="center" bgcolor="#FFFFFF" id="bnumber20">
                <div class="No_20"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl20><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','20');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_20" />
                <input name="class3_20" value="20" type="hidden">
                <input name="xr_20" type="hidden" value="0">
                <input name="locked_20" type="hidden" value="0">
            </td>
             <td align="center" bgcolor="#FFFFFF" id="bnumber30">
                <div class="No_30"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl30><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','30');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_30" />
                <input name="class3_30" value="30" type="hidden">
                <input name="xr_30" type="hidden" value="0">
                <input name="locked_30" type="hidden" value="0">
            </td>
             <td align="center" bgcolor="#FFFFFF" id="bnumber40">
                <div class="No_40"></div>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF" id=bl40><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','40');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" style="width: 56px;" name="Num_40" />
                <input name="class3_40" value="40" type="hidden">
                <input name="xr_40" type="hidden" value="0">
                <input name="locked_40" type="hidden" value="0">
            </td>
            <td bgcolor="#FFFFFF"></td>
            <td bgcolor="#FFFFFF"></td>
            <td bgcolor="#FFFFFF"></td>
        </tr>
        <Tr>
            <td height="30" colspan="15" align="center" bgcolor="#FFFFFF">  
                <input type="button" name="button2" id="button2" onClick="qingling();" class="btn2 chongz" value="重置" />
                <input type="submit" name="btnSubmit" id="btnSubmit" class="btn1 stopsubmit stopsubmitx" value="下注" />
                <span id="allgold" style="display:none">0</span>
                <INPUT type="hidden" value=0 name=gold_all>
                <INPUT type="hidden" value=0 name=total_gold>
            </td>
        </Tr>

</tbody>
</form>
</table>