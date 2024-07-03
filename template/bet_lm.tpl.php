<table  width="800" border="0" cellpadding="0" cellspacing="0">
   <tbody>
       <tr>
        <td width="180" height="30">
         <font class="font_b font_bold" id="item_name"><?=$ids?></font>&nbsp;
         <font class="font_g font_bold" id="g_ln"><?=$Current_Kithe_Num?>ÆÚ
         </font>
      </td>
      <td align="center">
         <font class="font_d">¾àÀë·âÅÌ:
         </font>
         <font class="font_r" id="daojishi"><span style="font-size: 12px; font-weight: bold;"class="shijiancolor" id="daojishi"></span></font>
      </td>
      <td width="50" align="center">
         <font class="font_d font_bold" id="loadingnumber" style="font-size: 16px; vertical-align: middle; display: block;">
         <span id="loadingnumber" style="font-family: @GulimChe; font-size: 16px; font-weight: bold;display: none;"><?=$autotime / 1000?></span></font>
         <span><img id="loadingimg" style="vertical-align: middle; display: none;" src="/member/images/loading.gif" alt="¼ÓÔØÖÐ..." width="16" height="20"></span>
      </td> 
      </tr>
         </tbody>
   </table>	
   <table  width="800" border="0" cellpadding="0" cellspacing="1" class="t_list">
	<form target="leftFrame" name="form1"  method="post" action="main.php?action=bet_n4&uid=<?=$uid?>&ids=<?=$ids?>&class2=<?=$class2?>" onSubmit="return ChkSubmit()">
	    <tbody>
		<tr>
		    <td height="27" colspan="15" align="center" class="t_list_tr_2">
			<INPUT name="rtype" type=radio onclick=go_main(url+"0"); value="0" <?if ( $lx == "0" ){echo "checked";}?>><span>ËÄÈ«</span>
			<INPUT name="rtype" type=radio onclick=go_main(url+"1"); value="1" <?if ( $lx == "1" ){echo "checked";}?>><span>ÈýÈ«ÖÐ</span>
			<INPUT name="rtype" type=radio onclick=go_main(url+"2"); value="2" <?if ( $lx == "2" ){echo "checked";}?>><span>ÈýÖÐ¶þ</span>
			<INPUT name="rtype" type=radio onclick=go_main(url+"3"); value="3" <?if ( $lx == "3" ){echo "checked";}?>><span>¶þÈ«ÖÐ</span>
			<INPUT name="rtype" type=radio onclick=go_main(url+"4"); value="4" <?if ( $lx == "4" ){echo "checked";}?>><span>¶þÖÐÌØ</span>
			<INPUT name="rtype" type=radio onclick=go_main(url+"5"); value="5" <?if ( $lx == "5" ){echo "checked";}?>><span>ÌØ´®</span></td>
		</tr>
    <tr>
        <td  width="28" class="t_list_caption">ºÅÂë</td>
        <td  width="50" class="t_list_caption">¹´Ñ¡</td>
        <td  width="82" class="t_list_caption">ÅâÂÊ</td>
        <td  width="28" class="t_list_caption">ºÅÂë</td>
        <td  width="50" class="t_list_caption">¹´Ñ¡</td>
        <td  width="82" class="t_list_caption">ÅâÂÊ</td>
        <td  width="28" class="t_list_caption">ºÅÂë</td>
        <td  width="50" class="t_list_caption">¹´Ñ¡</td>
        <td  width="82" class="t_list_caption">ÅâÂÊ</td>
        <td  width="28" class="t_list_caption">ºÅÂë</td>
        <td  width="50" class="t_list_caption">¹´Ñ¡</td>
        <td  width="82" class="t_list_caption">ÅâÂÊ</td>
        <td  width="28" class="t_list_caption">ºÅÂë</td>
        <td  width="50" class="t_list_caption">¹´Ñ¡</td>
        <td  width="82" class="t_list_caption">ÅâÂÊ</td>
        </tr>
    <tr>
        <td align="center" bgcolor="#FFFFFF" id="bnumber1">
            <div class="No_1"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num1" onClick="SubChkBox(1)" type="checkbox" value="1" name="num1" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl1><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber11">
            <div class="No_11"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num11" onClick="SubChkBox(11)" type="checkbox" value="11" name="num11" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl11><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber21">
            <div class="No_21"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num21" onClick="SubChkBox(21)" type="checkbox" value="21" name="num21" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl21><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber31">
            <div class="No_31"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num31" onClick="SubChkBox(31)" type="checkbox" value="31" name="num31" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl31><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber41">
            <div class="No_41"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num41" onClick="SubChkBox(41)" type="checkbox" value="41" name="num41" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl41><a>0</a></span>
        </td>
    </tr>
    <tr>
        <td align="center" bgcolor="#FFFFFF" id="bnumber2">
            <div class="No_2"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num2" onClick="SubChkBox(2)" type="checkbox" value="2" name="num2" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl2><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber12">
            <div class="No_12"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num12" onClick="SubChkBox(12)" type="checkbox" value="12" name="num12" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl12><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber22">
            <div class="No_22"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num22" onClick="SubChkBox(22)" type="checkbox" value="22" name="num22" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl22><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber32">
            <div class="No_32"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num32" onClick="SubChkBox(32)" type="checkbox" value="32" name="num32" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl32><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber42">
            <div class="No_42"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num42" onClick="SubChkBox(42)" type="checkbox" value="42" name="num42" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl42><a>0</a></span>
        </td>
    </tr>
    <tr>
        <td align="center" bgcolor="#FFFFFF" id="bnumber3">
            <div class="No_3"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num3" onClick="SubChkBox(3)" type="checkbox" value="3" name="num3" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl3><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber13">
            <div class="No_13"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num13" onClick="SubChkBox(13)" type="checkbox" value="13" name="num13" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl13><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber23">
            <div class="No_23"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num23" onClick="SubChkBox(23)" type="checkbox" value="23" name="num23" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl23><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber33">
            <div class="No_33"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num33" onClick="SubChkBox(33)" type="checkbox" value="33" name="num33" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl33><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber43">
            <div class="No_43"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num43" onClick="SubChkBox(43)" type="checkbox" value="43" name="num43" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl43><a>0</a></span>
        </td>
    </tr>
    <tr>
        <td align="center" bgcolor="#FFFFFF" id="bnumber4">
            <div class="No_4"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num4" onClick="SubChkBox(4)" type="checkbox" value="4" name="num4" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl4><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber14">
            <div class="No_14"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num14" onClick="SubChkBox(14)" type="checkbox" value="14" name="num14" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl14><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber24">
            <div class="No_24"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num24" onClick="SubChkBox(24)" type="checkbox" value="24" name="num24" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl24><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber34">
            <div class="No_34"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num34" onClick="SubChkBox(34)" type="checkbox" value="34" name="num34" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl34><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber44">
            <div class="No_44"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num44" onClick="SubChkBox(44)" type="checkbox" value="44" name="num44" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl44><a>0</a></span>
        </td>
    </tr>
    <tr>
        <td align="center" bgcolor="#FFFFFF" id="bnumber5">
            <div class="No_5"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num5" onClick="SubChkBox(5)" type="checkbox" value="5" name="num5" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl5><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber15">
            <div class="No_15"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num15" onClick="SubChkBox(15)" type="checkbox" value="15" name="num15" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl15><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber25">
            <div class="No_25"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num25" onClick="SubChkBox(25)" type="checkbox" value="25" name="num25" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl25><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber35">
            <div class="No_35"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num35" onClick="SubChkBox(35)" type="checkbox" value="35" name="num35" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl35><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber45">
            <div class="No_45"></div>
        </td>
        <td  align="middle" bgcolor="#ffffff">
            <input id="num45" onClick="SubChkBox(45)" type="checkbox" value="45" name="num45" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl45><a>0</a></span>
        </td>
    </tr>
    <tr>
        <td align="center" bgcolor="#FFFFFF" id="bnumber6">
            <div class="No_6"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num6" onClick="SubChkBox(6)" type="checkbox" value="6" name="num6" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl6><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber16">
            <div class="No_16"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num16" onClick="SubChkBox(16)" type="checkbox" value="16" name="num16" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl16><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber26">
            <div class="No_26"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num26" onClick="SubChkBox(26)" type="checkbox" value="26" name="num26" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl26><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber36">
            <div class="No_36"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num36" onClick="SubChkBox(36)" type="checkbox" value="36" name="num36" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl36><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber46">
            <div class="No_46"></div>
        </td>
        <td  align="middle" bgcolor="#ffffff">
            <input id="num46" onClick="SubChkBox(46)" type="checkbox" value="46" name="num46" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl46><a>0</a></span>
        </td>
    </tr>
    <tr>
        <td align="center" bgcolor="#FFFFFF" id="bnumber7">
            <div class="No_7"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num7" onClick="SubChkBox(7)" type="checkbox" value="7" name="num7" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl7><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber17">
            <div class="No_17"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num17" onClick="SubChkBox(17)" type="checkbox" value="17" name="num17" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl17><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber27">
            <div class="No_27"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num27" onClick="SubChkBox(27)" type="checkbox" value="27" name="num27" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl27><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber37">
            <div class="No_37"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num37" onClick="SubChkBox(37)" type="checkbox" value="37" name="num37" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl37><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber47">
            <div class="No_47"></div>
        </td>
        <td  align="middle" bgcolor="#ffffff">
            <input id="num47" onClick="SubChkBox(47)" type="checkbox" value="47" name="num47" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl47><a>0</a></span>
        </td>
    </tr>
    <tr>
        <td align="center" bgcolor="#FFFFFF" id="bnumber8">
            <div class="No_8"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num8" onClick="SubChkBox(8)" type="checkbox" value="8" name="num8" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl8><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber18">
            <div class="No_18"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num18" onClick="SubChkBox(18)" type="checkbox" value="18" name="num18" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl18><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber28">
            <div class="No_28"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num28" onClick="SubChkBox(28)" type="checkbox" value="28" name="num28" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl28><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber38">
            <div class="No_38"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num38" onClick="SubChkBox(38)" type="checkbox" value="38" name="num38" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl38><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber48">
            <div class="No_48"></div>
        </td>
        <td  align="middle" bgcolor="#ffffff">
            <input id="num48" onClick="SubChkBox(48)" type="checkbox" value="48" name="num48" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl48><a>0</a></span>
        </td>
    </tr>
    <tr>
        <td align="center" bgcolor="#FFFFFF" id="bnumber9">
            <div class="No_9"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num9" onClick="SubChkBox(9)" type="checkbox" value="9" name="num9" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl9><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber19">
            <div class="No_19"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num19" onClick="SubChkBox(19)" type="checkbox" value="19" name="num19" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl19><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber29">
            <div class="No_29"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num29" onClick="SubChkBox(29)" type="checkbox" value="29" name="num29" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl29><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber39">
            <div class="No_39"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num39" onClick="SubChkBox(39)" type="checkbox" value="39" name="num39" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl39><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber49">
            <div class="No_49"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num49" onClick="SubChkBox(49)" type="checkbox" value="49" name="num49" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl49><a>0</a></span>
        </td>
    </tr>
    <tr>
        <td align="center" bgcolor="#FFFFFF" id="bnumber10">
            <div class="No_10"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num10" onClick="SubChkBox(10)" type="checkbox" value="10" name="num10" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl10><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber20">
            <div class="No_20"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num20" onClick="SubChkBox(20)" type="checkbox" value="20" name="num20" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl20><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber30">
            <div class="No_30"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num30" onClick="SubChkBox(30)" type="checkbox" value="30" name="num30" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl30><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber40">
            <div class="No_40"></div>
        </td>
        <td align="middle" bgcolor="#ffffff">
            <input id="num40" onClick="SubChkBox(40)" type="checkbox" value="40" name="num40" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl40><a>0</a></span>
        </td>
        <td colspan="2" id="bnumber12">µ¨1:
            <input name="dan1" type="text" style="width:35px" disabled="disabled" readonly="true" class="input1" id="dan1" size="4">
        </td>
        <td colspan="2" id="bnumber12">µ¨2:
            <input name="dan2" type="text" style="width:35px" disabled="disabled" readonly="true" class="input1" id="dan2" size="4">
        </td>
        </tr>
        <tr>
        <td height="27" colspan="15" align="center" bgcolor="#FFFFFF" class="t_list_tr_3">
				<input name="lmlx" type="radio" onClick="select_lmlx(1);" value="1" checked  /><span name="fushi_text">µ¥×¢/¸´Ê½</span>
				<input name="lmlx" type="radio" onClick="select_lmlx(2);" value="2" /><span>µ¨ÍÏ</span>
				<input name="lmlx" type="radio" onClick="select_lmlx(3);" value="3" /><span>ÉúÐ¤¶ÔÅö</span>
				<input name="lmlx" type="radio" onClick="select_lmlx(4);" value="4" /><span>Î²Êý¶ÔÅö</span>
				<input name="lmlx" type="radio" onClick="select_lmlx(5);" value="5" /><span>ÉúÐ¤Î²Êý¶ÔÅö</span>
				<input name="lmlx" type="radio" onClick="select_lmlx(6);" value="6" /><span>×ÔÓÉ¶ÔÅö </span>     
        </td>
    </tr>
    <tr>
        <td height="30" colspan="15" align="center" bgcolor="#FFFFFF">
        <table width="98%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
        <td align="left"><font class="font_r" id="bet_msg"></font></td>
        <td width="80" align="right" colspan="15" id="bnumber">ÇëÊäÈëÃ¿×éÏÂ×¢½ð¶î:&nbsp;</td>
        <td width="60" align="left">
            <input name="Num_1" id="Num_1" class="inp1" size="6" onFocus="CountGold(this,'focus');this.value='';" onBlur="return CountGold(this,'blur','SP','');" onKeyPress="return CheckKey();" onKeyUp="return CountGold(this,'keyup');" />
            <INPUT type="hidden" value=0 name="allgold">
            <INPUT type="hidden" value=0 name="total_gold">
        </td>
        <td colspan="15" id="bnumber3">
            <input type="button" name="button2" id="button2" onClick="qingling();" class="btn2 chongz" value="ÖØÖÃ" />&nbsp;&nbsp;&nbsp;
            <input type="submit" name="btnSubmit" id="btnSubmit" class="btn1 stopsubmit stopsubmitx" value="ÏÂ×¢" />
        </td>
    </tr>
</table>
</td>
    </tr>
    
    </tbody>
</table>
<table id="n2" width="100%" border="0" cellpadding="0" cellspacing="0" class="maintable1" style="DISPLAY:none">
    <tr>
        <td>Êó
            <input onClick="n2_1_sx(1);" type="radio" value="1" name="n2_1" />
        </td>
        <td>Å£
            <input onClick="n2_1_sx(2);" type="radio" value="2" name="n2_1" />
        </td>
        <td>»¢
            <input onClick="n2_1_sx(3);" type="radio" value="3" name="n2_1" />
        </td>
        <td>ÍÃ
            <input onClick="n2_1_sx(4);" type="radio" value="4" name="n2_1" />
        </td>
        <td>Áú
            <input onClick="n2_1_sx(5);" type="radio" value="5" name="n2_1" />
        </td>
        <td>Éß
            <input onClick="n2_1_sx(6);" type="radio" value="6" name="n2_1" />
        </td>
        <td>Âí
            <input onClick="n2_1_sx(7);" type="radio" value="7" name="n2_1" />
        </td>
        <td>Ñò
            <input onClick="n2_1_sx(8);" type="radio" value="8" name="n2_1" />
        </td>
        <td>ºï
            <input onClick="n2_1_sx(9);" type="radio" value="9" name="n2_1" />
        </td>
        <td>¼¦
            <input onClick="n2_1_sx(10);" type="radio" value="10" name="n2_1" />
        </td>
        <td>¹·
            <input onClick="n2_1_sx(11);" type="radio" value="11" name="n2_1" />
        </td>
        <td>Öí
            <input onClick="n2_1_sx(12);" type="radio" value="12" name="n2_1" />
        </td>
    </tr>
    <tr>
        <td>Êó
            <input onClick="n2_2_sx(1);" type="radio" value="1" name="n2_2" />
        </td>
        <td>Å£
            <input onClick="n2_2_sx(2);" type="radio" value="2" name="n2_2" />
        </td>
        <td>»¢
            <input onClick="n2_2_sx(3);" type="radio" value="3" name="n2_2" />
        </td>
        <td>ÍÃ
            <input onClick="n2_2_sx(4);" type="radio" value="4" name="n2_2" />
        </td>
        <td>Áú
            <input onClick="n2_2_sx(5);" type="radio" value="5" name="n2_2" />
        </td>
        <td>Éß
            <input onClick="n2_2_sx(6);" type="radio" value="6" name="n2_2" />
        </td>
        <td>Âí
            <input onClick="n2_2_sx(7);" type="radio" value="7" name="n2_2" />
        </td>
        <td>Ñò
            <input onClick="n2_2_sx(8);" type="radio" value="8" name="n2_2" />
        </td>
        <td>ºï
            <input onClick="n2_2_sx(9);" type="radio" value="9" name="n2_2" />
        </td>
        <td>¼¦
            <input onClick="n2_2_sx(10);" type="radio" value="10" name="n2_2" />
        </td>
        <td>¹·
            <input onClick="n2_2_sx(11);" type="radio" value="11" name="n2_2" />
        </td>
        <td>Öí
            <input onClick="n2_2_sx(12);" type="radio" value="12" name="n2_2" />
        </td>
    </tr>
</table>
<table id="n3" width="100%" border="0" cellpadding="0" cellspacing="0" class="maintable1" style="DISPLAY:none">
    <tr>
        <td>0Î²
            <input onClick="n3_1_ws(1);" type="radio" value="1" name="n3_1" />
        </td>
        <td>1Î²
            <input onClick="n3_1_ws(2);" type="radio" value="2" name="n3_1" />
        </td>
        <td>2Î²
            <input onClick="n3_1_ws(3);" type="radio" value="3" name="n3_1" />
        </td>
        <td>3Î²
            <input onClick="n3_1_ws(4);" type="radio" value="4" name="n3_1" />
        </td>
        <td>4Î²
            <input onClick="n3_1_ws(5);" type="radio" value="5" name="n3_1" />
        </td>
        <td>5Î²
            <input onClick="n3_1_ws(6);" type="radio" value="6" name="n3_1" />
        </td>
        <td>6Î²
            <input onClick="n3_1_ws(7);" type="radio" value="7" name="n3_1" />
        </td>
        <td>7Î²
            <input onClick="n3_1_ws(8);" type="radio" value="8" name="n3_1" />
        </td>
        <td>8Î²
            <input onClick="n3_1_ws(9);" type="radio" value="9" name="n3_1" />
        </td>
        <td>9Î²
            <input onClick="n3_1_ws(10);" type="radio" value="10" name="n3_1" />
        </td>
    </tr>
    <tr>
        <td>0Î²
            <input onClick="n3_2_ws(1);" type="radio" value="1" name="n3_2" />
        </td>
        <td>1Î²
            <input onClick="n3_2_ws(2);" type="radio" value="2" name="n3_2" />
        </td>
        <td>2Î²
            <input onClick="n3_2_ws(3);" type="radio" value="3" name="n3_2" />
        </td>
        <td>3Î²
            <input onClick="n3_2_ws(4);" type="radio" value="4" name="n3_2" />
        </td>
        <td>4Î²
            <input onClick="n3_2_ws(5);" type="radio" value="5" name="n3_2" />
        </td>
        <td>5Î²
            <input onClick="n3_2_ws(6);" type="radio" value="6" name="n3_2" />
        </td>
        <td>6Î²
            <input onClick="n3_2_ws(7);" type="radio" value="7" name="n3_2" />
        </td>
        <td>7Î²
            <input onClick="n3_2_ws(8);" type="radio" value="8" name="n3_2" />
        </td>
        <td>8Î²
            <input onClick="n3_2_ws(9);" type="radio" value="9" name="n3_2" />
        </td>
        <td>9Î²
            <input onClick="n3_2_ws(10);" type="radio" value="10" name="n3_2" />
        </td>
    </tr>
</table>
<table id="n4" width="100%" border="0" cellpadding="0" cellspacing="0" class="maintable1" style="DISPLAY:none">
    <tr>
        <td>Êó
            <input type="radio" value="1" name="n4_1" />
        </td>
        <td>Å£
            <input type="radio" value="2" name="n4_1" />
        </td>
        <td>»¢
            <input type="radio" value="3" name="n4_1" />
        </td>
        <td>ÍÃ
            <input type="radio" value="4" name="n4_1" />
        </td>
        <td>Áú
            <input type="radio" value="5" name="n4_1" />
        </td>
        <td>Éß
            <input type="radio" value="6" name="n4_1" />
        </td>
        <td>Âí
            <input type="radio" value="7" name="n4_1" />
        </td>
        <td>Ñò
            <input type="radio" value="8" name="n4_1" />
        </td>
        <td>ºï
            <input type="radio" value="9" name="n4_1" />
        </td>
        <td>¼¦
            <input type="radio" value="10" name="n4_1" />
        </td>
        <td>¹·
            <input type="radio" value="11" name="n4_1" />
        </td>
        <td>Öí
            <input type="radio" value="12" name="n4_1" />
        </td>
    </tr>
    <tr>
        <td>0Î²
            <input type="radio" value="1" name="n4_2" />
        </td>
        <td>1Î²
            <input type="radio" value="2" name="n4_2" />
        </td>
        <td>2Î²
            <input type="radio" value="3" name="n4_2" />
        </td>
        <td>3Î²
            <input type="radio" value="4" name="n4_2" />
        </td>
        <td>4Î²
            <input type="radio" value="5" name="n4_2" />
        </td>
        <td>5Î²
            <input type="radio" value="6" name="n4_2" />
        </td>
        <td>6Î²
            <input type="radio" value="7" name="n4_2" />
        </td>
        <td>7Î²
            <input type="radio" value="8" name="n4_2" />
        </td>
        <td>8Î²
            <input type="radio" value="9" name="n4_2" />
        </td>
        <td>9Î²
            <input type="radio" value="10" name="n4_2" />
        </td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
</table>
<table id="n5" width="100%" border="0" cellpadding="0" cellspacing="0" class="maintable1" style="DISPLAY:none">
    <tr>
        <td>1
            <input id="zy1_num1" onClick="SubChkBox_zy1(1)" type="checkbox" value="1" name="zy1_num1" />
        </td>
        <td>11
            <input id="zy1_num11" onClick="SubChkBox_zy1(11)" type="checkbox" value="11" name="zy1_num11" />
        </td>
        <td>21
            <input id="zy1_num21" onClick="SubChkBox_zy1(21)" type="checkbox" value="21" name="zy1_num21" />
        </td>
        <td>31
            <input id="zy1_num31" onClick="SubChkBox_zy1(31)" type="checkbox" value="31" name="zy1_num31" />
        </td>
        <td>41
            <input id="zy1_num41" onClick="SubChkBox_zy1(41)" type="checkbox" value="41" name="zy1_num41" />
        </td>
        <td colspan="2" rowspan="10">×ÔÓÉ¶ÔÅö</td>
        <td>1
            <input id="zy2_num1" onClick="SubChkBox_zy2(1)" type="checkbox" value="1" name="zy2_num1" />
        </td>
        <td>11
            <input id="zy2_num11" onClick="SubChkBox_zy2(11)" type="checkbox" value="11" name="zy2_num11" />
        </td>
        <td>21
            <input id="zy2_num21" onClick="SubChkBox_zy2(21)" type="checkbox" value="21" name="zy2_num21" />
        </td>
        <td>31
            <input id="zy2_num31" onClick="SubChkBox_zy2(31)" type="checkbox" value="31" name="zy2_num31" />
        </td>
        <td>41
            <input id="zy2_num41" onClick="SubChkBox_zy2(41)" type="checkbox" value="41" name="zy2_num41" />
        </td>
    </tr>
    <tr>
        <td>2
            <input id="zy1_num2" onClick="SubChkBox_zy1(2)" type="checkbox" value="2" name="zy1_num2" />
        </td>
        <td>12
            <input id="zy1_num12" onClick="SubChkBox_zy1(12)" type="checkbox" value="12" name="zy1_num12" />
        </td>
        <td>22
            <input id="zy1_num22" onClick="SubChkBox_zy1(22)" type="checkbox" value="22" name="zy1_num22" />
        </td>
        <td>32
            <input id="zy1_num32" onClick="SubChkBox_zy1(32)" type="checkbox" value="32" name="zy1_num32" />
        </td>
        <td>42
            <input id="zy1_num42" onClick="SubChkBox_zy1(42)" type="checkbox" value="42" name="zy1_num42" />
        </td>
        <td>2
            <input id="zy2_num2" onClick="SubChkBox_zy2(2)" type="checkbox" value="2" name="zy2_num2" />
        </td>
        <td>12
            <input id="zy2_num12" onClick="SubChkBox_zy2(12)" type="checkbox" value="12" name="zy2_num12" />
        </td>
        <td>22
            <input id="zy2_num22" onClick="SubChkBox_zy2(22)" type="checkbox" value="22" name="zy2_num22" />
        </td>
        <td>32
            <input id="zy2_num32" onClick="SubChkBox_zy2(32)" type="checkbox" value="32" name="zy2_num32" />
        </td>
        <td>42
            <input id="zy2_num42" onClick="SubChkBox_zy2(42)" type="checkbox" value="42" name="zy2_num42" />
        </td>
    </tr>
    <tr>
        <td>3
            <input id="zy1_num3" onClick="SubChkBox_zy1(3)" type="checkbox" value="3" name="zy1_num3" />
        </td>
        <td>13
            <input id="zy1_num13" onClick="SubChkBox_zy1(13)" type="checkbox" value="13" name="zy1_num13" />
        </td>
        <td>23
            <input id="zy1_num23" onClick="SubChkBox_zy1(23)" type="checkbox" value="23" name="zy1_num23" />
        </td>
        <td>33
            <input id="zy1_num33" onClick="SubChkBox_zy1(33)" type="checkbox" value="33" name="zy1_num33" />
        </td>
        <td>43
            <input id="zy1_num43" onClick="SubChkBox_zy1(43)" type="checkbox" value="43" name="zy1_num43" />
        </td>
        <td>3
            <input id="zy2_num3" onClick="SubChkBox_zy2(3)" type="checkbox" value="3" name="zy2_num3" />
        </td>
        <td>13
            <input id="zy2_num13" onClick="SubChkBox_zy2(13)" type="checkbox" value="13" name="zy2_num13" />
        </td>
        <td>23
            <input id="zy2_num23" onClick="SubChkBox_zy2(23)" type="checkbox" value="23" name="zy2_num23" />
        </td>
        <td>33
            <input id="zy2_num33" onClick="SubChkBox_zy2(33)" type="checkbox" value="33" name="zy2_num33" />
        </td>
        <td>43
            <input id="zy2_num43" onClick="SubChkBox_zy2(43)" type="checkbox" value="43" name="zy2_num43" />
        </td>
    </tr>
    <tr>
        <td>4
            <input id="zy1_num4" onClick="SubChkBox_zy1(4)" type="checkbox" value="4" name="zy1_num4" />
        </td>
        <td>14
            <input id="zy1_num14" onClick="SubChkBox_zy1(14)" type="checkbox" value="14" name="zy1_num14" />
        </td>
        <td>24
            <input id="zy1_num24" onClick="SubChkBox_zy1(24)" type="checkbox" value="24" name="zy1_num24" />
        </td>
        <td>34
            <input id="zy1_num34" onClick="SubChkBox_zy1(34)" type="checkbox" value="34" name="zy1_num34" />
        </td>
        <td>44
            <input id="zy1_num44" onClick="SubChkBox_zy1(44)" type="checkbox" value="44" name="zy1_num44" />
        </td>
        <td>4
            <input id="zy2_num4" onClick="SubChkBox_zy2(4)" type="checkbox" value="4" name="zy2_num4" />
        </td>
        <td>14
            <input id="zy2_num14" onClick="SubChkBox_zy2(14)" type="checkbox" value="14" name="zy2_num14" />
        </td>
        <td>24
            <input id="zy2_num24" onClick="SubChkBox_zy2(24)" type="checkbox" value="24" name="zy2_num24" />
        </td>
        <td>34
            <input id="zy2_num34" onClick="SubChkBox_zy2(34)" type="checkbox" value="34" name="zy2_num34" />
        </td>
        <td>44
            <input id="zy2_num44" onClick="SubChkBox_zy2(44)" type="checkbox" value="44" name="zy2_num44" />
        </td>
    </tr>
    <tr>
        <td>5
            <input id="zy1_num5" onClick="SubChkBox_zy1(5)" type="checkbox" value="5" name="zy1_num5" />
        </td>
        <td>15
            <input id="zy1_num15" onClick="SubChkBox_zy1(15)" type="checkbox" value="15" name="zy1_num15" />
        </td>
        <td>25
            <input id="zy1_num25" onClick="SubChkBox_zy1(25)" type="checkbox" value="25" name="zy1_num25" />
        </td>
        <td>35
            <input id="zy1_num35" onClick="SubChkBox_zy1(35)" type="checkbox" value="35" name="zy1_num35" />
        </td>
        <td>45
            <input id="zy1_num45" onClick="SubChkBox_zy1(45)" type="checkbox" value="45" name="zy1_num45" />
        </td>
        <td>5
            <input id="zy2_num5" onClick="SubChkBox_zy2(5)" type="checkbox" value="5" name="zy2_num5" />
        </td>
        <td>15
            <input id="zy2_num15" onClick="SubChkBox_zy2(15)" type="checkbox" value="15" name="zy2_num15" />
        </td>
        <td>25
            <input id="zy2_num25" onClick="SubChkBox_zy2(25)" type="checkbox" value="25" name="zy2_num25" />
        </td>
        <td>35
            <input id="zy2_num35" onClick="SubChkBox_zy2(35)" type="checkbox" value="35" name="zy2_num35" />
        </td>
        <td>45
            <input id="zy2_num45" onClick="SubChkBox_zy2(45)" type="checkbox" value="45" name="zy2_num45" />
        </td>
    </tr>
    <tr>
        <td>6
            <input id="zy1_num6" onClick="SubChkBox_zy1(6)" type="checkbox" value="6" name="zy1_num6" />
        </td>
        <td>16
            <input id="zy1_num16" onClick="SubChkBox_zy1(16)" type="checkbox" value="16" name="zy1_num16" />
        </td>
        <td>26
            <input id="zy1_num26" onClick="SubChkBox_zy1(26)" type="checkbox" value="26" name="zy1_num26" />
        </td>
        <td>36
            <input id="zy1_num36" onClick="SubChkBox_zy1(36)" type="checkbox" value="36" name="zy1_num36" />
        </td>
        <td>46
            <input id="zy1_num46" onClick="SubChkBox_zy1(46)" type="checkbox" value="46" name="zy1_num46" />
        </td>
        <td>6
            <input id="zy2_num6" onClick="SubChkBox_zy2(6)" type="checkbox" value="6" name="zy2_num6" />
        </td>
        <td>16
            <input id="zy2_num16" onClick="SubChkBox_zy2(16)" type="checkbox" value="16" name="zy2_num16" />
        </td>
        <td>26
            <input id="zy2_num26" onClick="SubChkBox_zy2(26)" type="checkbox" value="26" name="zy2_num26" />
        </td>
        <td>36
            <input id="zy2_num36" onClick="SubChkBox_zy2(36)" type="checkbox" value="36" name="zy2_num36" />
        </td>
        <td>46
            <input id="zy2_num46" onClick="SubChkBox_zy2(46)" type="checkbox" value="46" name="zy2_num46" />
        </td>
    </tr>
    <tr>
        <td>7
            <input id="zy1_num7" onClick="SubChkBox_zy1(7)" type="checkbox" value="7" name="zy1_num7" />
        </td>
        <td>17
            <input id="zy1_num17" onClick="SubChkBox_zy1(17)" type="checkbox" value="17" name="zy1_num17" />
        </td>
        <td>27
            <input id="zy1_num27" onClick="SubChkBox_zy1(27)" type="checkbox" value="27" name="zy1_num27" />
        </td>
        <td>37
            <input id="zy1_num37" onClick="SubChkBox_zy1(37)" type="checkbox" value="37" name="zy1_num37" />
        </td>
        <td>47
            <input id="zy1_num47" onClick="SubChkBox_zy1(47)" type="checkbox" value="47" name="zy1_num47" />
        </td>
        <td>7
            <input id="zy2_num7" onClick="SubChkBox_zy2(7)" type="checkbox" value="7" name="zy2_num7" />
        </td>
        <td>17
            <input id="zy2_num17" onClick="SubChkBox_zy2(17)" type="checkbox" value="17" name="zy2_num17" />
        </td>
        <td>27
            <input id="zy2_num27" onClick="SubChkBox_zy2(27)" type="checkbox" value="27" name="zy2_num27" />
        </td>
        <td>37
            <input id="zy2_num37" onClick="SubChkBox_zy2(37)" type="checkbox" value="37" name="zy2_num37" />
        </td>
        <td>47
            <input id="zy2_num47" onClick="SubChkBox_zy2(47)" type="checkbox" value="47" name="zy2_num47" />
        </td>
    </tr>
    <tr>
        <td>8
            <input id="zy1_num8" onClick="SubChkBox_zy1(8)" type="checkbox" value="8" name="zy1_num8" />
        </td>
        <td>18
            <input id="zy1_num18" onClick="SubChkBox_zy1(18)" type="checkbox" value="18" name="zy1_num18" />
        </td>
        <td>28
            <input id="zy1_num28" onClick="SubChkBox_zy1(28)" type="checkbox" value="28" name="zy1_num28" />
        </td>
        <td>38
            <input id="zy1_num38" onClick="SubChkBox_zy1(38)" type="checkbox" value="38" name="zy1_num38" />
        </td>
        <td>48
            <input id="zy1_num48" onClick="SubChkBox_zy1(48)" type="checkbox" value="48" name="zy1_num48" />
        </td>
        <td>8
            <input id="zy2_num8" onClick="SubChkBox_zy2(8)" type="checkbox" value="8" name="zy2_num8" />
        </td>
        <td>18
            <input id="zy2_num18" onClick="SubChkBox_zy2(18)" type="checkbox" value="18" name="zy2_num18" />
        </td>
        <td>28
            <input id="zy2_num28" onClick="SubChkBox_zy2(28)" type="checkbox" value="28" name="zy2_num28" />
        </td>
        <td>38
            <input id="zy2_num38" onClick="SubChkBox_zy2(38)" type="checkbox" value="38" name="zy2_num38" />
        </td>
        <td>48
            <input id="zy2_num48" onClick="SubChkBox_zy2(48)" type="checkbox" value="48" name="zy2_num48" />
        </td>
    </tr>
    <tr>
        <td>9
            <input id="zy1_num9" onClick="SubChkBox_zy1(9)" type="checkbox" value="9" name="zy1_num9" />
        </td>
        <td>19
            <input id="zy1_num19" onClick="SubChkBox_zy1(19)" type="checkbox" value="19" name="zy1_num19" />
        </td>
        <td>29
            <input id="zy1_num29" onClick="SubChkBox_zy1(29)" type="checkbox" value="29" name="zy1_num29" />
        </td>
        <td>39
            <input id="zy1_num39" onClick="SubChkBox_zy1(39)" type="checkbox" value="39" name="zy1_num39" />
        </td>
        <td>49
            <input id="zy1_num49" onClick="SubChkBox_zy1(49)" type="checkbox" value="49" name="zy1_num49" />
        </td>
        <td>9
            <input id="zy2_num9" onClick="SubChkBox_zy2(9)" type="checkbox" value="9" name="zy2_num9" />
        </td>
        <td>19
            <input id="zy2_num19" onClick="SubChkBox_zy2(19)" type="checkbox" value="19" name="zy2_num19" />
        </td>
        <td>29
            <input id="zy2_num29" onClick="SubChkBox_zy2(29)" type="checkbox" value="29" name="zy2_num29" />
        </td>
        <td>39
            <input id="zy2_num39" onClick="SubChkBox_zy2(39)" type="checkbox" value="39" name="zy2_num39" />
        </td>
        <td>49
            <input id="zy2_num49" onClick="SubChkBox_zy2(49)" type="checkbox" value="49" name="zy2_num49" />
        </td>
    </tr>
    <tr>
        <td>10
            <input id="zy1_num10" onClick="SubChkBox_zy1(10)" type="checkbox" value="10" name="zy1_num10" />
        </td>
        <td>20
            <input id="zy1_num20" onClick="SubChkBox_zy1(20)" type="checkbox" value="20" name="zy1_num20" />
        </td>
        <td>30
            <input id="zy1_num30" onClick="SubChkBox_zy1(30)" type="checkbox" value="30" name="zy1_num30" />
        </td>
        <td>40
            <input id="zy1_num40" onClick="SubChkBox_zy1(40)" type="checkbox" value="40" name="zy1_num40" />
        </td>
        <td>&nbsp;</td>
        <td>10
            <input id="zy2_num10" onClick="SubChkBox_zy2(10)" type="checkbox" value="10" name="zy2_num10" />
        </td>
        <td>20
            <input id="zy2_num20" onClick="SubChkBox_zy2(20)" type="checkbox" value="20" name="zy2_num20" />
        </td>
        <td>30
            <input id="zy2_num30" onClick="SubChkBox_zy2(30)" type="checkbox" value="30" name="zy2_num30" />
        </td>
        <td>40
            <input id="zy2_num40" onClick="SubChkBox_zy2(40)" type="checkbox" value="40" name="zy2_num40" />
        </td>
        <td>&nbsp;</td>
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