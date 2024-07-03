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
<form target="leftFrame" name="form1"  method="post" action="main.php?action=bet_n6&uid=<?=$uid?>&class2=<?=$class2?>" onSubmit="return ChkSubmit()">
    <tbody>
    <tr>
            <td height="27" colspan="8" align="center" class="t_list_tr_2">
            <INPUT name="rtype" type=radio onclick=go_main(url+"1") value="1" <? if ($lx == "1") {?> checked<?}?>><span>二肖连中</span>
            <INPUT name="rtype" type=radio onclick=go_main(url+"2") value="2" <? if ($lx == "2") {?> checked<?}?>><span>二肖连不中</span>
            <INPUT name="rtype" type=radio onclick=go_main(url+"3") value="3" <? if ($lx == "3") {?> checked<?}?>><span>三肖连中</span>
            <INPUT name="rtype" type=radio onclick=go_main(url+"4") value="4" <? if ($lx == "4") {?> checked<?}?>><span>三肖连不中</span>
            <INPUT name="rtype" type=radio onclick=go_main(url+"5") value="5" <? if ($lx == "5") {?> checked<?}?>><span>四肖连中</span>
            <INPUT name="rtype" type=radio onclick=go_main(url+"6") value="6" <? if ($lx == "6") {?> checked<?}?>><span>四肖连不中</span>
            <INPUT name="rtype" type=radio onclick=go_main(url+"7") value="7" <? if ($lx == "7") {?> checked<?}?>><span>五肖连中</span>
            <INPUT name="rtype" type=radio onclick=go_main(url+"8") value="8" <? if ($lx == "8") {?> checked<?}?>><span>五肖连不中</span>
            </td>
    </tr>
    <tr>
        <td width="50" class="t_list_caption">生肖</td>
        <td width="82" class="t_list_caption">赔率</td>
        <td width="50" class="t_list_caption">勾选</td>
        <td width="218" class="t_list_caption">号码</td>
        <td width="50" class="t_list_caption">生肖</td>
        <td width="82" class="t_list_caption">赔率</td>
        <td width="50" class="t_list_caption">勾选</td>
        <td width="218" class="t_list_caption">号码</td>
    </tr>
    <tr>
        <td height="30" align="center" bgcolor="#FFFFFF"><font class="font_bold">鼠</font></td>
        <td align="center" bgcolor="#FFFFFF" id=bl1><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input onclick=SubChkBox(this) type="checkbox" name="num1" value="鼠">
        </td>
        <td align="center" bgcolor="#FFFFFF"><?=get_sx_m_number(1)?></td>
        <td height="30" align="center" bgcolor="#FFFFFF"><font class="font_bold">马</font></td>
        <td align="center" bgcolor="#FFFFFF" id=bl7><a>0</a></span>
        </td>
         <td align="center" bgcolor="#FFFFFF">
            <input onclick=SubChkBox(this) type="checkbox" name="num7" value="马">
        </td>
         <td align="center" bgcolor="#FFFFFF"><?=get_sx_m_number(7)?></td>
    </tr>
    <tr>
        <td height="30" align="center" bgcolor="#FFFFFF"><font class="font_bold">牛</font></td>
        <td align="center" bgcolor="#FFFFFF" id=bl2><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input onclick=SubChkBox(this) type="checkbox" name="num2" value="牛">
        </td>
        <td align="center" bgcolor="#FFFFFF"><?=get_sx_m_number(2)?></td>
        <td height="30" align="center" bgcolor="#FFFFFF"><font class="font_bold">羊</font></td>
        <td align="center" bgcolor="#FFFFFF" id=bl8><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input onclick=SubChkBox(this) type="checkbox" name="num8" value="羊">
        </td>
        <td align="center" bgcolor="#FFFFFF"><?=get_sx_m_number(8)?></td>
    </tr>
    <tr>
        <td height="30" align="center" bgcolor="#FFFFFF"><font class="font_bold">虎</font></td>
        <td align="center" bgcolor="#FFFFFF" id=bl3><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input onclick=SubChkBox(this) type="checkbox" name="num3" value="虎">
        </td>
        <td align="center" bgcolor="#FFFFFF"><?=get_sx_m_number(3)?></td>
        <td height="30" align="center" bgcolor="#FFFFFF"><font class="font_bold">猴</font></td>
        <td align="center" bgcolor="#FFFFFF" id=bl9><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input onclick=SubChkBox(this) type="checkbox" name="num9" value="猴">
        </td>
        <td align="center" bgcolor="#FFFFFF"><?=get_sx_m_number(9)?></td>
    </tr>
    <tr>
        <td height="30" align="center" bgcolor="#FFFFFF"><font class="font_bold">兔</font></td>
        <td align="center" bgcolor="#FFFFFF" id=bl4><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input onclick=SubChkBox(this) type="checkbox" name="num4" value="兔">
        </td>
        <td align="center" bgcolor="#FFFFFF"><?=get_sx_m_number(4)?></td>
        <td height="30" align="center" bgcolor="#FFFFFF"><font class="font_bold">鸡</font></td>
        <td align="center" bgcolor="#FFFFFF" id=bl10><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input onclick=SubChkBox(this) type="checkbox" name="num10" value="鸡">
        </td>
        <td align="center" bgcolor="#FFFFFF"><?=get_sx_m_number(10)?></td>
    </tr>
    <tr>
        <td height="30" align="center" bgcolor="#FFFFFF"><font class="font_bold">龙</font></td>
        <td align="center" bgcolor="#FFFFFF" id=bl5><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input onclick=SubChkBox(this) type="checkbox" name="num5" value="龙">
        </td>
        <td align="center" bgcolor="#FFFFFF"><?=get_sx_m_number(5)?></td>
        <td height="30" align="center" bgcolor="#FFFFFF"><font class="font_bold">狗</font></td>
        <td align="center" bgcolor="#FFFFFF" id=bl11><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input onclick=SubChkBox(this) type="checkbox" name="num11" value="狗">
        </td>
        <td align="center" bgcolor="#FFFFFF"><?=get_sx_m_number(11)?></td>
    </tr>
    <tr>
        <td height="30" align="center" bgcolor="#FFFFFF"><font class="font_bold">蛇</font></td>
        <td align="center" bgcolor="#FFFFFF" id=bl6><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input onclick=SubChkBox(this) type="checkbox" name="num6" value="蛇">
        </td>
        <td align="center" bgcolor="#FFFFFF"><?=get_sx_m_number(6)?></td>
        <td height="30" align="center" bgcolor="#FFFFFF"><font class="font_bold">猪</font></td>
        <td align="center" bgcolor="#FFFFFF" id=bl12><a>0</a></span>
        </td>
        <td align="center" bgcolor="#FFFFFF">
            <input onclick=SubChkBox(this) type="checkbox" name="num12" value="猪">
        </td>
        <td align="center" bgcolor="#FFFFFF"><?=get_sx_m_number(12)?></td>
    </tr>
    <tr>
        <td height="30" colspan="8" id="bnumber" align="center" bgcolor="#FFFFFF" >请输入下注金额:&nbsp;
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