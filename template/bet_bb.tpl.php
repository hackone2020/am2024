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
       </tr>
   </tbody>
   </table>
<table  width="800" border="0" cellpadding="0" cellspacing="1" class="t_list">
    <form target="leftFrame" name="form1" method="post" action="main.php?action=bet_n1&uid=<?=$uid?>&class2=<?=$ids?>" onSubmit="return ChkSubmit()">
     <tbody>
        <tr>
			<td class="t_list_caption">半波</td>
			<td class="t_list_caption">赔率</td>
			<td class="t_list_caption">号码</td>
			<td class="t_list_caption">金额</td>
		</tr> 
		<tr>
			 <td align="center" bgcolor="#FFFFFF" id="bnumber2"><font class="font_r font_bold">红单</font></td>
			 <td height="30" align="center" bgcolor="#FFFFFF" id=bl1><a>0</a></span></td>
			<td align="center" bgcolor="#FFFFFF" style="color: Red;">1,7,13,19,23,29,35,45</font></td>
			<td align="center" bgcolor="#FFFFFF"><input name="Num_1" class="tdinput1 tdinput2" onFocus="CountGold(this,'focus');this.value='';" onBlur="return CountGold(this,'blur','SP','0','1');" onKeyPress="return CheckKey();" onKeyUp="return CountGold(this,'keyup');" /> 
                <input name="class3_1" value="1" type="hidden" >
				<input name="xr_1" type="hidden" value="0" >
				<input name="locked_1" type="hidden"  value="0" >
			</td>
		</tr>
		<tr>
			 <td align="center" bgcolor="#FFFFFF" id="bnumber2"><font class="font_r font_bold">红双</font></td>
			 <td height="30" align="center" bgcolor="#FFFFFF" id=bl2><a>0</a></span></td>
			<td align="center" bgcolor="#FFFFFF" style="color: Red;">2,8,12,18,24,30,34,40,46</font></td>
			<td align="center" bgcolor="#FFFFFF"> <input name="Num_2" class="tdinput1 tdinput2" onFocus="CountGold(this,'focus');this.value='';" onBlur="return CountGold(this,'blur','SP','0','2');" onKeyPress="return CheckKey();" onKeyUp="return CountGold(this,'keyup');" /> 
				<input name="class3_2" value="2" type="hidden" >
				<input name="xr_2" type="hidden" value="0" >
				<input name="locked_2" type="hidden"  value="0" >
			</td>
		</tr> 
		<tr>
			 <td align="center" bgcolor="#FFFFFF" id="bnumber2"><font class="font_r font_bold">红大</font></td>
			 <td height="30" align="center" bgcolor="#FFFFFF" id=bl3><a>0</a></span></td>
			<td align="center" bgcolor="#FFFFFF" style="color: Red;">29,30,34,35,40,45,46</font></td>
			<td align="center" bgcolor="#FFFFFF"><input name="Num_3" class="tdinput1 tdinput2" onFocus="CountGold(this,'focus');this.value='';" onBlur="return CountGold(this,'blur','SP','0','3');" onKeyPress="return CheckKey();" onKeyUp="return CountGold(this,'keyup');" />
			<input name="class3_3" value="3" type="hidden" >
			<input name="xr_3" type="hidden" value="0" > 
			<input name="locked_3" type="hidden"  value="0" >
			</td>
		</tr>
		<tr>
			 <td align="center" bgcolor="#FFFFFF" id="bnumber2"><font class="font_r font_bold">红小</font></td>
			 <td height="30" align="center" bgcolor="#FFFFFF" id=bl4><a>0</a></span></td>
			<td align="center" bgcolor="#FFFFFF" style="color: Red;">1,2,7,8,12,13,18,19,23,24</font></td>
			<td align="center" bgcolor="#FFFFFF"><input name="Num_4" class="tdinput1 tdinput2" onFocus="CountGold(this,'focus');this.value='';" onBlur="return CountGold(this,'blur','SP','0','4');" onKeyPress="return CheckKey();" onKeyUp="return CountGold(this,'keyup');" /> 
				<input name="class3_4" value="4" type="hidden" >
				<input name="xr_4" type="hidden" value="0" >
				<input name="locked_4" type="hidden"  value="0" >
			</td>
		</tr>
		<tr>
			 <td align="center" bgcolor="#FFFFFF" id="bnumber2"><font class="font_g font_bold">绿单</font></td>
			 <td height="30" align="center" bgcolor="#FFFFFF" id=bl5><a>0</a></span></td>
			<td align="center" bgcolor="#FFFFFF"  style="color: Green;">5,11,17,21,27,33,39,43,49</td>
			<td align="center" bgcolor="#FFFFFF"> <input name="Num_5" class="tdinput1 tdinput2" onFocus="CountGold(this,'focus');this.value='';" onBlur="return CountGold(this,'blur','SP','0','5');" onKeyPress="return CheckKey();" onKeyUp="return CountGold(this,'keyup');" />
				<input name="class3_5" value="5" type="hidden" >
				<input name="xr_5" type="hidden" value="0" >
				<input name="locked_5" type="hidden"  value="0" >
			</td>
		</tr>
		<tr>
			 <td align="center" bgcolor="#FFFFFF" id="bnumber2"><font class="font_g font_bold">绿双</font></td>
			 <td height="30" align="center" bgcolor="#FFFFFF" id=bl6><a>0</a></span></td>
			<td align="center" bgcolor="#FFFFFF"  style="color: Green;">6,16,22,28,32,38,44</td>
			<td align="center" bgcolor="#FFFFFF"> <input name="Num_6" class="tdinput1 tdinput2" onFocus="CountGold(this,'focus');this.value='';" onBlur="return CountGold(this,'blur','SP','0','6');" onKeyPress="return CheckKey();" onKeyUp="return CountGold(this,'keyup');" />
				<input name="class3_6" value="6" type="hidden" >
				<input name="xr_6" type="hidden" value="0" >
				<input name="locked_6" type="hidden"  value="0" >
			</td>
		</tr>
		<tr>
			 <td align="center" bgcolor="#FFFFFF" id="bnumber2"><font class="font_g font_bold">绿大</font></td>
			 <td height="30" align="center" bgcolor="#FFFFFF" id=bl7><a>0</a></span></td>
			<td align="center" bgcolor="#FFFFFF"  style="color: Green;">27,28,32,33,38,39,43,44,49</td>
			<td align="center" bgcolor="#FFFFFF"> <input name="Num_7" class="tdinput1 tdinput2" onFocus="CountGold(this,'focus');this.value='';" onBlur="return CountGold(this,'blur','SP','0','7');" onKeyPress="return CheckKey();" onKeyUp="return CountGold(this,'keyup');" />
				<input name="class3_7" value="7" type="hidden" > 
				<input name="xr_7" type="hidden" value="0" >
				<input name="locked_7" type="hidden"  value="0" > 
			</td>
		</tr>
		<tr>
			 <td align="center" bgcolor="#FFFFFF" id="bnumber2"><font class="font_g font_bold">绿小</font></td>
			 <td height="30" align="center" bgcolor="#FFFFFF" id=bl8><a>0</a></span></td>
			<td align="center" bgcolor="#FFFFFF"  style="color: Green;">5,6,11,16,17,21,22</td>
			<td align="center" bgcolor="#FFFFFF"> <input name="Num_8" class="tdinput1 tdinput2" onFocus="CountGold(this,'focus');this.value='';" onBlur="return CountGold(this,'blur','SP','0','8');" onKeyPress="return CheckKey();" onKeyUp\"return CountGold(this,'keyup');" /> 
				<input name="class3_8" value="8" type="hidden" >
				<input name="xr_8" type="hidden" value="0" >
				<input name="locked_8" type="hidden"  value="0" >
			</td>
		</tr>
		<tr> 
			 <td align="center" bgcolor="#FFFFFF" id="bnumber2"><font class="font_b font_bold">蓝单</font></td>
			 <td height="30" align="center" bgcolor="#FFFFFF" id=bl9><a>0</a></span></td>
			<td align="center" bgcolor="#FFFFFF"  style="color: Blue;">3,9,15,25,31,37,41,47</td>
			<td align="center" bgcolor="#FFFFFF"> <input name="Num_9" class="tdinput1 tdinput2" onFocus="CountGold(this,'focus');this.value='';" onBlur="return CountGold(this,'blur','SP','0','9');" onKeyPress="return CheckKey();" onKeyUp="return CountGold(this,'keyup');" /> 
				<input name="class3_9" value="9" type="hidden" >
				<input name="xr_9" type="hidden" value="0" >
				<input name="locked_9" type="hidden"  value="0" >
			</td>
		</tr>
		<tr>
			 <td align="center" bgcolor="#FFFFFF" id="bnumber2"><font class="font_b font_bold">蓝双</font></td>
			 <td height="30" align="center" bgcolor="#FFFFFF" id=bl10><a>0</a></span></td>
			<td align="center" bgcolor="#FFFFFF"  style="color: Blue;">4,10,14,20,26,36,42,48</td>
			<td align="center" bgcolor="#FFFFFF"> <input name="Num_10" class="tdinput1 tdinput2" onFocus="CountGold(this,'focus');this.value='';" onBlur="return CountGold(this,'blur','SP','0','10');" onKeyPress="return CheckKey();" onKeyUp="return CountGold(this,'keyup');" /> 
				<input name="class3_10" value="10" type="hidden" >
				<input name="xr_10" type="hidden" value="0" >                               
				<input name="locked_10" type="hidden"  value="0" >
			</td>
		</tr>
		<tr>
			 <td align="center" bgcolor="#FFFFFF" id="bnumber2"><font class="font_b font_bold">蓝大</font></td>
			 <td height="30" align="center" bgcolor="#FFFFFF" id=bl11><a>0</a></span></td>
			<td align="center" bgcolor="#FFFFFF"  style="color: Blue;">25,26,31,36,37,41,42,47,48</td>
			<td align="center" bgcolor="#FFFFFF"> <input name="Num_11" class="tdinput1 tdinput2" onFocus="CountGold(this,'focus');this.value='';" onBlur="return CountGold(this,'blur','SP','0','11');" onKeyPress="return CheckKey();" onKeyUp="return CountGold(this,'keyup');" /> 
				<input name="class3_11" value="11" type="hidden" >
				<input name="xr_11" type="hidden" value="0" > 
				<input name="locked_11" type="hidden"  value="0" >
			</td>
		</tr>
		<tr>
			 <td align="center" bgcolor="#FFFFFF" id="bnumber2"><font class="font_b font_bold">蓝小</font></td>
			 <td height="30" align="center" bgcolor="#FFFFFF" id=bl12><a>0</a></span></td>
			<td align="center" bgcolor="#FFFFFF"  style="color: Blue;">3,4,9,10,14,15,20</td>
			<td align="center" bgcolor="#FFFFFF"> <input name="Num_12" class="tdinput1 tdinput2" onFocus="CountGold(this,'focus');this.value='';" onBlur="return CountGold(this,'blur','SP','0','12');" onKeyPress="return CheckKey();" onKeyUp="return CountGold(this,'keyup');" />
				<input name="class3_12" value="12" type="hidden" >
				<input name="xr_12" type="hidden" value="0" >
				<input name="locked_12" type="hidden"  value="0" >
			</td>
		</tr>
		<tr>
			 <td align="center" bgcolor="#FFFFFF" id="bnumber2"><font class="font_r font_bold">红合单</font></td>
			 <td height="30" align="center" bgcolor="#FFFFFF" id=bl13><a>0</a></span></td>
			<td align="center" bgcolor="#FFFFFF" style="color: Red;">1,7,23,29,45,12,18,30,34</font></td>
			<td align="center" bgcolor="#FFFFFF"> <input name="Num_13" class="tdinput1 tdinput2" onFocus="CountGold(this,'focus');this.value='';" onBlur="return CountGold(this,'blur','SP','0','13');" onKeyPress="return CheckKey();" onKeyUp="return CountGold(this,'keyup');" /> 
				<input name="class3_13" value="13" type="hidden" >
				<input name="xr_13" type="hidden" value="0" > 
				<input name="locked_13" type="hidden"  value="0" >
			</td>
		</tr>
		<tr>
			 <td align="center" bgcolor="#FFFFFF" id="bnumber2"><font class="font_r font_bold">红合双</font></td>
			 <td height="30" align="center" bgcolor="#FFFFFF" id=bl14><a>0</a></span></td>
			<td align="center" bgcolor="#FFFFFF" style="color: Red;">13,19,35,2,8,24,40,46</font></td>
			<td align="center" bgcolor="#FFFFFF"> <input name="Num_14" class="tdinput1 tdinput2" onFocus="CountGold(this,'focus');this.value='';" onBlur="return CountGold(this,'blur','SP','0','14');" onKeyPress="return CheckKey();" onKeyUp="return CountGold(this,'keyup');" />
				<input name="class3_14" value="14" type="hidden" >
				<input name="xr_14" type="hidden" value="0" >
				<input name="locked_14" type="hidden"  value="0" >
			</td>
		</tr>
		<tr>
			 <td align="center" bgcolor="#FFFFFF" id="bnumber2"><font class="font_g font_bold">绿合单</font></td>
			 <td height="30" align="center" bgcolor="#FFFFFF" id=bl15><a>0</a></span></td>
			<td align="center" bgcolor="#FFFFFF"  style="color: Green;">5,16,21,27,32,38,43,49</font></td>
			<td align="center" bgcolor="#FFFFFF"> <input name="Num_15" class="tdinput1 tdinput2" onFocus="CountGold(this,'focus');this.value='';" onBlur="return CountGold(this,'blur','SP','0','15');" onKeyPress="return CheckKey();" onKeyUp="return CountGold(this,'keyup');" /> 
				<input name="class3_15" value="15" type="hidden" ><input name="xr_15" type="hidden" value="0" >
				<input name="locked_15" type="hidden"  value="0" ></td>
			</tr>
			<tr>
				 <td align="center" bgcolor="#FFFFFF" id="bnumber2"><font class="font_g font_bold">绿合双</font></td>
				 <td height="30" align="center" bgcolor="#FFFFFF" id=bl16><a>0</a></span></td>
				<td align="center" bgcolor="#FFFFFF"  style="color: Green;">6,11,17,22,28,32,39,44</td>
				<td align="center" bgcolor="#FFFFFF"> <input name="Num_16" class="tdinput1 tdinput2" onFocus="CountGold(this,'focus');this.value='';" onBlur="return CountGold(this,'blur','SP','0','16');" onKeyPress="return CheckKey();" onKeyUp="return CountGold(this,'keyup');" /> 
					<input name="class3_16" value="16" type="hidden" >
					<input name="xr_16" type="hidden" value="0" >
					<input name="locked_16" type="hidden"  value="0" >
				</td>
			</tr>
			<tr> 
				 <td align="center" bgcolor="#FFFFFF" id="bnumber2"><font class="font_b font_bold">蓝合单</font></td>
				 <td height="30" align="center" bgcolor="#FFFFFF" id=bl17><a>0</a></span></td>
				<td align="center" bgcolor="#FFFFFF"  style="color: Blue;">3,9,25,41,47,10,14,36</td>
				<td align="center" bgcolor="#FFFFFF">  <input name="Num_17" class="tdinput1 tdinput2" onFocus="CountGold(this,'focus');this.value='';" onBlur="return CountGold(this,'blur','SP','0','17');" onKeyPress="return CheckKey();" onKeyUp="return CountGold(this,'keyup');" />
					<input name="class3_17" value="17" type="hidden" >
					<input name="xr_17" type="hidden" value="0" >
					<input name="locked_17" type="hidden"  value="0" >
				</td>
			</tr>
			<tr>
				 <td align="center" bgcolor="#FFFFFF" id="bnumber2"><font class="font_b font_bold">蓝合双</font></td>
				 <td height="30" align="center" bgcolor="#FFFFFF" id=bl18><a>0</a></span></td>
				<td align="center" bgcolor="#FFFFFF"  style="color: Blue;">15,31,37,4,20,26,42,48</td>
				<td align="center" bgcolor="#FFFFFF"> <input name="Num_18" class="tdinput1 tdinput2" onFocus="CountGold(this,'focus');this.value='';" onBlur="return CountGold(this,'blur','SP','0','18');" onKeyPress="return CheckKey();" onKeyUp="return CountGold(this,'keyup');" />
					<input name="class3_18" value="18" type="hidden" >
					<input name="xr_18" type="hidden" value="0" >
					<input name="locked_18" type="hidden"  value="0" >
				</td>
			</tr>
			<tr>

				<tr>
					<td height="30" colspan="4" align="center" bgcolor="#FFFFFF"> 
					<input type="button" name="button2" id="button2" onClick="qingling();"  class="btn2 chongz" value="重置" />&nbsp;&nbsp;&nbsp;
					<input type="submit" name="btnSubmit" id="btnSubmit" class="btn1 stopsubmit stopsubmitx" value="下注" /></td>
                    <span  id="allgold" style="display:none;">0</span><INPUT type="hidden"  value=0 name=gold_all><INPUT  type="hidden" value=0 name=total_gold></td>
				</tr>
                         </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
            <td>
            </td>
        </tr>
    </table>