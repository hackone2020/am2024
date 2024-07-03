<table  width="800" border="0" cellpadding="0" cellspacing="0">
   <tbody>
       <tr>
        <td width="180" height="30">
         <font class="font_b font_bold" id="item_name"><?=$ids?></font>&nbsp;
         <font class="font_g font_bold" id="g_ln"><?=$Current_Kithe_Num?>∆⁄
         </font>
      </td>
      <td align="center">
         <font class="font_d">æ‡¿Î∑‚≈Ã:
         </font>
         <font class="font_r" id="daojishi"><span style="font-size: 12px; font-weight: bold;"class="shijiancolor" id="daojishi"></span></font>
      </td>
      <td width="50" align="center">
         <font class="font_d font_bold" id="loadingnumber" style="font-size: 16px; vertical-align: middle; display: block;">
              <span id="loadingnumber" style="font-family: @GulimChe; font-size: 16px; font-weight: bold;display: none;"> <?=$autotime / 1000?></font>
         <img id="loadingimg" style="vertical-align: middle; display: none;" src="/member/images/loading.gif" alt="º”‘ÿ÷–..." width="16" height="20">
      </td>   
       </tr>
   </tbody>
   </table>
<table  width="800" border="0" cellpadding="0" cellspacing="1" class="t_list">                                  
<form target="leftFrame" name="form1" method="post"  action="main.php?action=bet_n1&uid=<?=$uid?>&class2=<?=$ids?>" onSubmit="return ChkSubmit()">
        <tbody>
		<tr>
            <td class="t_list_caption">Ãÿ–§</td>
            <td class="t_list_caption">≈‚¬ </td>
            <td class="t_list_caption">∫≈¬Î</td>
            <td class="t_list_caption">Ω∂Ó</td>
            <td class="t_list_caption">Ãÿ–§</td>
            <td class="t_list_caption">≈‚¬ </td>
            <td class="t_list_caption">∫≈¬Î</td>
            <td class="t_list_caption">Ω∂Ó</td>
        </tr>
        <tr>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold"> Û</td>
            <td height="30" align="center" bgcolor="#FFFFFF" id=bl1><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF"> <?=get_sx_m_number(1)?></td>
            <td align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','1');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" class="inp1" size="8" name="Num_1" />
                <input name="class3_1" value="1" type="hidden">
                <input name="xr_1" type="hidden" value="0">
                <input name="locked_1" type="hidden" value="0">
            </td>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold">¬Ì</font></td>
            <td height="30" align="center" bgcolor="#FFFFFF" id=bl7><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF"><?=get_sx_m_number(7)?></td>
            <td align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','7');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" class="inp1" size="8" name="Num_7" />
                <input name="class3_7" value="7" type="hidden">
                <input name="xr_7" type="hidden" value="0">
                <input name="locked_7" type="hidden" value="0">
            </td>
        </tr>
        <tr>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold">≈£</font></td>
            <td height="30" align="center" bgcolor="#FFFFFF" id=bl2><a>0</a></span>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF"><?=get_sx_m_number(2)?></td>
            <td align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','2');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" class="inp1" size="8" name="Num_2" />
                <input name="class3_2" value="2" type="hidden">
                <input name="xr_2" type="hidden" value="0">
                <input name="locked_2" type="hidden" value="0">
            </td>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold">—Ú</font></td>
            <td height="30" align="center" bgcolor="#FFFFFF" id=bl8><a>0</a></span>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF"> <?=get_sx_m_number(8)?></td>
           <td align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','8');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" class="inp1" size="8" name="Num_8" />
                <input name="class3_8" value="8" type="hidden">
                <input name="xr_8" type="hidden" value="0">
                <input name="locked_8" type="hidden" value="0">
            </td>
        </tr>
        <tr>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold">ª¢</font></td>
            <td height="30" align="center" bgcolor="#FFFFFF" id=bl3><a>0</a></span>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF"> <?=get_sx_m_number(3)?></td>
            <td align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','3');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" class="inp1" size="8" name="Num_3" />
                <input name="class3_3" value="3" type="hidden">
                <input name="xr_3" type="hidden" value="0">
                <input name="locked_3" type="hidden" value="0">
            </td>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold">∫Ô</font></td>
            <td height="30" align="center" bgcolor="#FFFFFF" id=bl9><a>0</a></span>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF"> <?=get_sx_m_number(9)?></td>
            <td align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','9');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" class="inp1" size="8" name="Num_9" />
                <input name="class3_9" value="9" type="hidden">
                <input name="xr_9" type="hidden" value="0">
                <input name="locked_9" type="hidden" value="0">
            </td>
        </tr>
        <tr>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold">Õ√</font></td>
            <td height="30" align="center" bgcolor="#FFFFFF" id=bl4><a>0</a></span>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF"> <?=get_sx_m_number(4)?></td>
            <td align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','4');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" class="inp1" size="8" name="Num_4" />
                <input name="class3_4" value="4" type="hidden">
                <input name="xr_4" type="hidden" value="0">
                <input name="locked_4" type="hidden" value="0">
            </td>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold">º¶</font></td>
            <td height="30" align="center" bgcolor="#FFFFFF" id=bl10><a>0</a></span>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF"> <?=get_sx_m_number(10)?></td>
            <td align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','10');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" class="inp1" size="8" name="Num_10" />
                <input name="class3_10" value="10" type="hidden">
                <input name="xr_10" type="hidden" value="0">
                <input name="locked_10" type="hidden" value="0">
            </td>
        </tr>
        <tr>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold">¡˙</font></td>
            <td height="30" align="center" bgcolor="#FFFFFF" id=bl5><a>0</a></span>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF"> <?=get_sx_m_number(5)?></td>
            <td align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','5');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" class="inp1" size="8" name="Num_5" />
                <input name="class3_5" value="5" type="hidden">
                <input name="xr_5" type="hidden" value="0">
                <input name="locked_5" type="hidden" value="0">
            </td>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold">π∑</font></td>
            <td height="30" align="center" bgcolor="#FFFFFF" id=bl11><a>0</a></span>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF"> <?=get_sx_m_number(11)?></td>
            <td align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','11');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" class="inp1" size="8" name="Num_11" />
                <input name="class3_11" value="11" type="hidden">
                <input name="xr_11" type="hidden" value="0">
                <input name="locked_11" type="hidden" value="0">
            </td>
        </tr>
        <tr>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold">…ﬂ</font></td>
            <td height="30" align="center" bgcolor="#FFFFFF" id=bl6><a>0</a></span>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF"> <?=get_sx_m_number(6)?></td>
            <td align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','6');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" class="inp1" size="8" name="Num_6" />
                <input name="class3_6" value="6" type="hidden">
                <input name="xr_6" type="hidden" value="0">
                <input name="locked_6" type="hidden" value="0">
            </td>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold">÷Ì</font></td>
            <td height="30" align="center" bgcolor="#FFFFFF" id=bl12><a>0</a></span>
            </td>
           <td height="30" align="center" bgcolor="#FFFFFF"> <?=get_sx_m_number(12)?></td>
            <td align="center" bgcolor="#FFFFFF">
                <input onKeyPress="return CheckKey();" onBlur="return CountGold(this,'blur','SP','0','12');" onKeyUp="return CountGold(this,'keyup');" onFocus="CountGold(this,'focus');this.value='';" class="inp1" size="8" name="Num_12" />
                <input name="class3_12" value="12" type="hidden">
                <input name="xr_12" type="hidden" value="0">
                <input name="locked_12" type="hidden" value="0">
            </td>
        </tr>
        <tr>
            <td height="30" colspan="8" id="bnumber2" align="center" bgcolor="#FFFFFF" style="display:none;"> ‰»Î¿€º∆◊‹∂Ó:<span id="allgold">0</span> 
                <INPUT type="hidden" value=0 name=gold_all>
                <INPUT type="hidden" value=0 name=total_gold>
            </td>
        </tr>
        <tr>
            <td height="30" colspan="8" id="bnumber3" align="center" bgcolor="#FFFFFF">
                <input type="button" name="button2" id="button2" onClick="qingling();" class="btn2 chongz" value="÷ÿ÷√" />&nbsp;&nbsp;&nbsp;
                <input type="submit" name="btnSubmit" id="btnSubmit" class="btn1 stopsubmit stopsubmitx" value="œ¬◊¢" />
            </td>
        </tr>
    </table>
</div>
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