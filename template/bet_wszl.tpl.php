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
            <td class="t_list_caption">尾数</td>
            <td class="t_list_caption">赔率</td>
            <td class="t_list_caption">金额</td>
            <td class="t_list_caption">尾数</td>
            <td class="t_list_caption">赔率</td>
            <td class="t_list_caption">金额</td>
        </tr>
        <tr>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold">尾0</font></td>
            <td height="30" align="center" bgcolor="#FFFFFF" id=bl1><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','1');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" class="inp1"  size="8" name="Num_1" />
                <input name="class3_1" value="1" type="hidden">
                <input name="xr_1" type="hidden" value="0">
                <input name="locked_1" type="hidden" value="0">
            </td>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold">尾5</font></td>
            <td height="30" align="center" bgcolor="#FFFFFF" id=bl4><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','4');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" class="inp1"  size="8" name="Num_4" />
                <input name="class3_4" value="4" type="hidden">
                <input name="xr_4" type="hidden" value="0">
                <input name="locked_4" type="hidden" value="0">
            </td>
        </tr>
        <tr>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold">尾3</font></td>
            <td height="30" align="center" bgcolor="#FFFFFF" id=bl2><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','2');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" class="inp1"  size="8" name="Num_2" />
                <input name="class3_2" value="2" type="hidden">
                <input name="xr_2" type="hidden" value="0">
                <input name="locked_2" type="hidden" value="0">
            </td>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold">尾6</font></td>
            <td height="30" align="center" bgcolor="#FFFFFF" id=bl5><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','5');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" class="inp1"  size="8" name="Num_5" />
                <input name="class3_5" value="5" type="hidden">
                <input name="xr_5" type="hidden" value="0">
                <input name="locked_5" type="hidden" value="0">
            </td>
        </tr>
        <tr>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold">尾4</font></td>
            <td height="30" align="center" bgcolor="#FFFFFF" id=bl3><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','3');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" class="inp1"  size="8" name="Num_3" />
                <input name="class3_3" value="3" type="hidden">
                <input name="xr_3" type="hidden" value="0">
                <input name="locked_3" type="hidden" value="0">
            </td>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold">尾7</font></td>
            <td height="30" align="center" bgcolor="#FFFFFF" id=bl6><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','6');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" class="inp1"  size="8" name="Num_6" />
                <input name="class3_6" value="6" type="hidden">
                <input name="xr_6" type="hidden" value="0">
                <input name="locked_6" type="hidden" value="0">
            </td>
        </tr>
        <tr>
            <td height="30" align="center" bgcolor="#FFFFFF" colspan="6" id="bnumber2">
                <span id="allgold" style="display:none;">0</span> 
                <INPUT type="hidden" value=0 name=gold_all>
                <INPUT type="hidden" value=0 name=total_gold>
                <input type="button" name="button2" id="button2" onClick="qingling();" class="btn2 chongz" value="重置" />&nbsp;&nbsp;&nbsp;
                <input type="submit" name="btnSubmit" id="btnSubmit" class="btn1 stopsubmit stopsubmitx" value="下注" />
            </td>
        </tr>
    </tbody>
      </form>
    </table>