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
	<form target="leftFrame" name="form1"  method="post" action="main.php?action=bet_n2&uid=<?=$uid?>&class2=<?=$ids?>" onSubmit="return ChkSubmit()">

    <tbody>
        <tr>
                   <td class="t_list_caption">
                        …˙–§
                    </td>
                    <td class="t_list_caption">
                        ≈‚¬ 
                    </td>
                   <td class="t_list_caption">
                        π¥—°
                    </td>
                    <td class="t_list_caption">
                        ∫≈¬Î
                    </td>
                   <td class="t_list_caption">
                        …˙–§
                    </td>
                    <td class="t_list_caption">
                        ≈‚¬ 
                    </td>
                   <td class="t_list_caption">
                        π¥—°
                    </td>
                    <td class="t_list_caption">
                        ∫≈¬Î
                    </td>
                </tr>
                <tr>
                    <td height="30" align="center" bgcolor="#FFFFFF"><font class="font_bold">
                         Û</font>
                    </td>
                    <td align="center" bgcolor="#FFFFFF"  id="bl1"><a>0</a></span>
                    </td>
                   <td align="center" bgcolor="#FFFFFF">
                        <input onclick="SubChkBox(this)" type="checkbox" name="num1" value=" Û">
                    </td>
                   <td align="center" bgcolor="#FFFFFF">
                        <?=get_sx_m_number(1)?>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF"><font class="font_bold">
                        ¬Ì</font>
                    </td>
                    <td align="center" bgcolor="#FFFFFF" id="bl7"><a>0</a></span>
                    </td>
                   <td align="center" bgcolor="#FFFFFF">
                        <input onclick="SubChkBox(this)" type="checkbox" name="num7" value="¬Ì">
                    </td>
                   <td align="center" bgcolor="#FFFFFF">
                        <?=get_sx_m_number(7)?>
                    </td>
                </tr>
                <tr>
                    <td height="30" align="center" bgcolor="#FFFFFF"><font class="font_bold">
                        ≈£</font>
                    </td>
                    <td align="center" bgcolor="#FFFFFF" id="bl2"><a>0</a></span>
                    </td>
                    <td align="center" bgcolor="#FFFFFF">
                        <input onclick="SubChkBox(this)" type="checkbox" name="num2" value="≈£">
                    </td>
                    <td align="center" bgcolor="#FFFFFF">
                        <?=get_sx_m_number(2)?>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF"><font class="font_bold">
                        —Ú</font>
                    </td>
                    <td align="center" bgcolor="#FFFFFF" id="bl8"><a>0</a></span>
                    </td>
                    <td align="center" bgcolor="#FFFFFF">
                        <input onclick="SubChkBox(this)" type="checkbox" name="num8" value="—Ú">
                    </td>
                    <td align="center" bgcolor="#FFFFFF">
                        <?=get_sx_m_number(8)?>
                    </td>
                </tr>
                <tr>
                    <td height="30" align="center" bgcolor="#FFFFFF"><font class="font_bold">
                        ª¢</font>
                    </td>
                    <td align="center" bgcolor="#FFFFFF" id="bl3"><a>0</a></span>
                    </td>
                    <td align="center" bgcolor="#FFFFFF">
                        <input onclick="SubChkBox(this)" type="checkbox" name="num3" value="ª¢">
                    </td>
                    <td align="center" bgcolor="#FFFFFF">
                       <?=get_sx_m_number(3)?>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF"><font class="font_bold">
                        ∫Ô</font>
                    </td>
                    <td align="center" bgcolor="#FFFFFF" id="bl9"><a>0</a></span>
                    </td>
                    <td align="center" bgcolor="#FFFFFF">
                        <input onclick="SubChkBox(this)" type="checkbox" name="num9" value="∫Ô">
                    </td>
                    <td align="center" bgcolor="#FFFFFF">
                        <?=get_sx_m_number(9)?>
                    </td>
                </tr>
                <tr>
                    <td height="30" align="center" bgcolor="#FFFFFF"><font class="font_bold">
                        Õ√</font>
                    </td>
                    <td align="center" bgcolor="#FFFFFF" id="bl4"><a>0</a></span>
                    </td>
                    <td align="center" bgcolor="#FFFFFF">
                        <input onclick="SubChkBox(this)" type="checkbox" name="num4" value="Õ√">
                    </td>
                    <td align="center" bgcolor="#FFFFFF">
                        <?=get_sx_m_number(4)?>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF"><font class="font_bold">
                        º¶</font>
                    </td>
                    <td align="center" bgcolor="#FFFFFF" id="bl10"><a>0</a></span>
                    </td>
                    <td align="center" bgcolor="#FFFFFF">
                        <input onclick="SubChkBox(this)" type="checkbox" name="num10" value="º¶">
                    </td>
                    <td align="center" bgcolor="#FFFFFF">
                        <?=get_sx_m_number(10)?>
                    </td>
                </tr>
                <tr>
                    <td height="30" align="center" bgcolor="#FFFFFF"><font class="font_bold">
                        ¡˙</font>
                    </td>
                    <td align="center" bgcolor="#FFFFFF" id="bl5"><a>0</a></span>
                    </td>
                    <td align="center" bgcolor="#FFFFFF">
                        <input onclick="SubChkBox(this)" type="checkbox" name="num5" value="¡˙">
                    </td>
                    <td align="center" bgcolor="#FFFFFF">
                        <?=get_sx_m_number(5)?>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF"><font class="font_bold">
                        π∑</font>
                    </td>
                   <td align="center" bgcolor="#FFFFFF" id="bl11"><a>0</a></span>
                    </td>
                    <td align="center" bgcolor="#FFFFFF">
                        <input onclick="SubChkBox(this)" type="checkbox" name="num11" value="π∑">
                    </td>
                    <td align="center" bgcolor="#FFFFFF">
                        <?=get_sx_m_number(11)?>
                    </td>
                </tr>
                <tr>
                    <td height="30" align="center" bgcolor="#FFFFFF"><font class="font_bold"><font class="font_bold">
                        …ﬂ
                    </font></td>
                    <td align="center" bgcolor="#FFFFFF" id="bl6"><a>0</a></span>
                    </td>
                    <td align="center" bgcolor="#FFFFFF">
                        <input onclick="SubChkBox(this)" type="checkbox" name="num6" value="…ﬂ">
                    </td>
                    <td align="center" bgcolor="#FFFFFF">
                        <?=get_sx_m_number(6)?>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF"><font class="font_bold">
                        ÷Ì</font>
                    </td>
                   <td align="center" bgcolor="#FFFFFF" id="bl12"><a>0</a></span>
                    </td>
                    <td align="center" bgcolor="#FFFFFF">
                        <input onclick="SubChkBox(this)" type="checkbox" name="num12" value="÷Ì">
                    </td>
                    <td align="center" bgcolor="#FFFFFF">
                        <?=get_sx_m_number(12)?>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" id="bnumber" align="center" bgcolor="#FFFFFF">
                        «Î ‰»Îœ¬◊¢Ω∂Ó:&nbsp;<input name="Num_1" id="Num_1" class="tdinput1 tdinput2" onfocus="CountGold(this,'focus');this.value='';" onblur="return CountGold(this,'blur','SP','');" onkeypress="return CheckKey();" onkeyup="return CountGold(this,'keyup');"> &nbsp;<input name="button1" type="button" class="btn3" onclick="kuaixuan(arr1)" value="º“«›"> &nbsp;<input name="button2" type="button" class="btn3" onclick="kuaixuan(arr2)" value="“∞ ﬁ"> <input type="hidden" value="0" name="allgold"><input type="hidden" value="0" name="total_gold">
                    </td>
                </tr>
                <tr>
                    <td colspan="8" id="bnumber3" align="center" bgcolor="#FFFFFF">
                        <input type="button" name="button2" id="button2" onclick="qingling();" class="btn2 chongz" value="÷ÿ÷√"> &nbsp;&nbsp;&nbsp; <input type="submit" name="btnSubmit" id="btnSubmit" class="btn1 stopsubmit stopsubmitx" value="œ¬◊¢">
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