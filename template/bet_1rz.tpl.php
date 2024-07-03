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
    <form target="leftFrame" name="form1" method="post" action="main.php?action=bet_nrz&uid=<?=$uid?>&ids=<?=$ids?>&class2=<?=$class2?>" onSubmit="return ChkSubmit()">
     <tbody>
        <tr>
           <td height="27" colspan="15" align="center" class="t_list_tr_2">
            <INPUT name="rtype" type=radio onclick=go_main(url+"1"); value="1" <? if($lx=="1" ) { ?> checked <?}?>><span>一粒任中</span>
            <INPUT name="rtype" type=radio onclick=go_main(url+"2"); value="2" <? if($lx=="2" ) { ?> checked <?}?>><span>二粒任中</span>
            <INPUT name="rtype" type=radio onclick=go_main(url+"3"); value="3" <? if($lx=="3" ) { ?> checked <?}?>><span>三粒任中</span>
            <INPUT name="rtype" type=radio onclick=go_main(url+"4"); value="4" <? if($lx=="4" ) { ?> checked <?}?>><span>四粒任中</span>
            <INPUT name="rtype" type=radio onclick=go_main(url+"5"); value="5" <? if($lx=="5" ) { ?> checked <?}?>><span>五粒任中</span>
            </td>
         </tr>
        <tr>
        <td width="28" class="t_list_caption">号码</td>
        <td width="50" class="t_list_caption">勾选</td>
        <td width="82" class="t_list_caption">赔率</td>
        <td width="28" class="t_list_caption">号码</td>
        <td width="50" class="t_list_caption">勾选</td>
        <td width="82" class="t_list_caption">赔率</td>
        <td width="28" class="t_list_caption">号码</td>
        <td width="50" class="t_list_caption">勾选</td>
        <td width="82" class="t_list_caption">赔率</td>
        <td width="28" class="t_list_caption">号码</td>
        <td width="50" class="t_list_caption">勾选</td>
        <td width="82" class="t_list_caption">赔率</td>
        <td width="28" class="t_list_caption">号码</td>
        <td width="50" class="t_list_caption">勾选</td>
        <td width="82" class="t_list_caption">赔率</td>
    </tr>
    <tr>
        <td align="center" bgcolor="#FFFFFF" id="bnumber1">
            <div class="No_1"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num1" onClick="SubChkBox(1)" type="checkbox" value="1" name="num1" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl1><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber11">
            <div class="No_11"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num11" onClick="SubChkBox(11)" type="checkbox" value="11" name="num11" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl11><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber21">
            <div class="No_21"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num21" onClick="SubChkBox(21)" type="checkbox" value="21" name="num21" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl21><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber31">
            <div class="No_31"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num31" onClick="SubChkBox(31)" type="checkbox" value="31" name="num31" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl31><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber41">
            <div class="No_41"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num41" onClick="SubChkBox(41)" type="checkbox" value="41" name="num41" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl41><a>0</a></span>
        </td>
    </tr>
    <tr>
        <td align="center" bgcolor="#FFFFFF" id="bnumber2">
            <div class="No_2"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num2" onClick="SubChkBox(2)" type="checkbox" value="2" name="num2" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl2><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber12">
            <div class="No_12"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num12" onClick="SubChkBox(12)" type="checkbox" value="12" name="num12" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl12><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber22">
            <div class="No_22"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num22" onClick="SubChkBox(22)" type="checkbox" value="22" name="num22" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl22><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber32">
            <div class="No_32"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num32" onClick="SubChkBox(32)" type="checkbox" value="32" name="num32" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl32><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber42">
            <div class="No_42"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num42" onClick="SubChkBox(42)" type="checkbox" value="42" name="num42" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl42><a>0</a></span>
        </td>
    </tr>
    <tr>
        <td align="center" bgcolor="#FFFFFF" id="bnumber3">
            <div class="No_3"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num3" onClick="SubChkBox(3)" type="checkbox" value="3" name="num3" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl3><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber13">
            <div class="No_13"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num13" onClick="SubChkBox(13)" type="checkbox" value="13" name="num13" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl13><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber23">
            <div class="No_23"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num23" onClick="SubChkBox(23)" type="checkbox" value="23" name="num23" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl23><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber33">
            <div class="No_33"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num33" onClick="SubChkBox(33)" type="checkbox" value="33" name="num33" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl33><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber43">
            <div class="No_43"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num43" onClick="SubChkBox(43)" type="checkbox" value="43" name="num43" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl43><a>0</a></span>
        </td>
    </tr>
    <tr>
        <td align="center" bgcolor="#FFFFFF" id="bnumber4">
            <div class="No_4"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num4" onClick="SubChkBox(4)" type="checkbox" value="4" name="num4" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl4><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber14">
            <div class="No_14"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num14" onClick="SubChkBox(14)" type="checkbox" value="14" name="num14" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl14><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber24">
            <div class="No_24"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num24" onClick="SubChkBox(24)" type="checkbox" value="24" name="num24" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl24><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber34">
            <div class="No_34"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num34" onClick="SubChkBox(34)" type="checkbox" value="34" name="num34" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl34><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber44">
            <div class="No_44"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num44" onClick="SubChkBox(44)" type="checkbox" value="44" name="num44" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl44><a>0</a></span>
        </td>
    </tr>
    <tr>
        <td align="center" bgcolor="#FFFFFF" id="bnumber5">
            <div class="No_5"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num5" onClick="SubChkBox(5)" type="checkbox" value="5" name="num5" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl5><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber15">
            <div class="No_15"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num15" onClick="SubChkBox(15)" type="checkbox" value="15" name="num15" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl15><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber25">
            <div class="No_25"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num25" onClick="SubChkBox(25)" type="checkbox" value="25" name="num25" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl25><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber35">
            <div class="No_35"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num35" onClick="SubChkBox(35)" type="checkbox" value="35" name="num35" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl35><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber45">
            <div class="No_45"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num45" onClick="SubChkBox(45)" type="checkbox" value="45" name="num45" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl45><a>0</a></span>
        </td>
    </tr>
    <tr>
        <td align="center" bgcolor="#FFFFFF" id="bnumber6">
            <div class="No_6"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num6" onClick="SubChkBox(6)" type="checkbox" value="6" name="num6" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl6><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber16">
            <div class="No_16"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num16" onClick="SubChkBox(16)" type="checkbox" value="16" name="num16" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl16><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber26">
            <div class="No_26"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num26" onClick="SubChkBox(26)" type="checkbox" value="26" name="num26" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl26><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber36">
            <div class="No_36"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num36" onClick="SubChkBox(36)" type="checkbox" value="36" name="num36" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl36><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber46">
            <div class="No_46"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num46" onClick="SubChkBox(46)" type="checkbox" value="46" name="num46" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl46><a>0</a></span>
        </td>
    </tr>
    <tr>
        <td align="center" bgcolor="#FFFFFF" id="bnumber7">
            <div class="No_7"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num7" onClick="SubChkBox(7)" type="checkbox" value="7" name="num7" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl7><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber17">
            <div class="No_17"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num17" onClick="SubChkBox(17)" type="checkbox" value="17" name="num17" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl17><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber27">
            <div class="No_27"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num27" onClick="SubChkBox(27)" type="checkbox" value="27" name="num27" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl27><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber37">
            <div class="No_37"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num37" onClick="SubChkBox(37)" type="checkbox" value="37" name="num37" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl37><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber47">
            <div class="No_47"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num47" onClick="SubChkBox(47)" type="checkbox" value="47" name="num47" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl47><a>0</a></span>
        </td>
    </tr>
    <tr>
        <td align="center" bgcolor="#FFFFFF" id="bnumber8">
            <div class="No_8"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num8" onClick="SubChkBox(8)" type="checkbox" value="8" name="num8" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl8><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber18">
            <div class="No_18"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num18" onClick="SubChkBox(18)" type="checkbox" value="18" name="num18" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl18><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber28">
            <div class="No_28"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num28" onClick="SubChkBox(28)" type="checkbox" value="28" name="num28" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl28><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber38">
            <div class="No_38"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num38" onClick="SubChkBox(38)" type="checkbox" value="38" name="num38" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl38><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber48">
            <div class="No_48"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num48" onClick="SubChkBox(48)" type="checkbox" value="48" name="num48" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl48><a>0</a></span>
        </td>
    </tr>
    <tr>
        <td align="center" bgcolor="#FFFFFF" id="bnumber9">
            <div class="No_9"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num9" onClick="SubChkBox(9)" type="checkbox" value="9" name="num9" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl9><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber19">
            <div class="No_19"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num19" onClick="SubChkBox(19)" type="checkbox" value="19" name="num19" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl19><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber29">
            <div class="No_29"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num29" onClick="SubChkBox(29)" type="checkbox" value="29" name="num29" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl29><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber39">
            <div class="No_39"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num39" onClick="SubChkBox(39)" type="checkbox" value="39" name="num39" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl39><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber49">
            <div class="No_49"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num49" onClick="SubChkBox(49)" type="checkbox" value="49" name="num49" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl49><a>0</a></span>
        </td>
    </tr>
    <tr>
        <td align="center" bgcolor="#FFFFFF" id="bnumber10">
            <div class="No_10"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num10" onClick="SubChkBox(10)" type="checkbox" value="10" name="num10" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl10><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber20">
            <div class="No_20"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num20" onClick="SubChkBox(20)" type="checkbox" value="20" name="num20" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl20><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber30">
            <div class="No_30"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num30" onClick="SubChkBox(30)" type="checkbox" value="30" name="num30" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl30><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF" id="bnumber40">
            <div class="No_40"></div>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input id="num40" onClick="SubChkBox(40)" type="checkbox" value="40" name="num40" />
        </td>
        <td align="center" bgcolor="#FFFFFF" id=bl40><a>0</a></span>
        </td>
        <td colspan="4" bgcolor="#FFFFFF" id="bnumber12"></td>
    </tr>

    <tr>
        <td height="30" colspan="15" align="center" bgcolor="#FFFFFF"  id="bnumber">请输入每组下注金额:&nbsp;
            <input name="Num_1" id="Num_1" class="inp1" size="6" onFocus="CountGold(this,'focus');this.value='';" onBlur="return CountGold(this,'blur','SP','');" onKeyPress="return CheckKey();" onKeyUp="return CountGold(this,'keyup');" />
            <INPUT type="hidden" value=0 name="allgold">
            <INPUT type="hidden" value=0 name="total_gold">
            <input type="button" name="button2" id="button2" onClick="qingling();" class="btn2 chongz" value="重置" />&nbsp;&nbsp;&nbsp;
            <input type="submit" name="btnSubmit" id="btnSubmit" class="btn1 stopsubmit stopsubmitx" value="下注" />
        </td>
    </tr>
    </tbody>
     </form>
</table>