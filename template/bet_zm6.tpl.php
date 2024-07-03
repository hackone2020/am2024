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
      <!-- <td width="75" align="center">-->
      <!--   <input name="button1" type="button" class="btn1" onmouseover="this.className='btn1m'" onmouseout="this.className='btn1'" onclick="javascript:location.href='main.php?action=bet_tm&uid=<?=$uid?>&ids=特A'" value="特A" title="特A">-->
      <!--</td>-->
      <!--<td width="75" align="center">-->
      <!--   <input name="button2" type="button" class="btn1" onmouseover="this.className='btn1m'" onmouseout="this.className='btn1'" onclick="javascript:location.href='main.php?action=bet_tm&uid=<?=$uid?>&ids=特B'" value="特B" title="特B">-->
      <!--</td>-->
      <!--     <td width="75" align="center">-->
      <!--   <a href="main.php?action=bet_kuaisu&uid=<?=$uid?>&class2=<?=$ids?>" id="kuaijiefangshi" target="leftFrame"><input name="button3" type="button" class="btn3" onmouseover="this.className='btn3m'" onmouseout="this.className='btn3'" value="快速模式" title="快速模式"></a>-->
      <!--</td> -->
      
      
       </tr>
   </tbody>
   </table>
   
   <table  width="800" border="0" cellpadding="0" cellspacing="1" class="t_list">
    <form target="leftFrame" name="form1" method="post" action="main.php?action=bet_n1&uid=<?=$uid?>&class2=<?=$ids?>" onSubmit="return ChkSubmit()">
    <tbody>
        <tr>
                   <td colspan="3" class="t_list_caption">
                        正码1
                    </td>
                    <td colspan="3" class="t_list_caption">
                        正码2
                    </td>
                    <td colspan="3" class="t_list_caption">
                        正码3
                    </td>
                    <td colspan="3" class="t_list_caption">
                        正码4
                    </td>
                    <td colspan="3" class="t_list_caption">
                        正码5
                    </td>
                    <td colspan="3" class="t_list_caption">
                        正码6
                    </td>
                </tr>
                <tr>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber91">
                        <font class="font_bold">单</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl1"><a>0</a></span>
                    </td>
                   <td height="30" align="center" bgcolor="#FFFFFF">
                        <input name="Num_1" style="width: 47px;" onfocus="CountGold(this,'focus');this.value='';" onblur="return CountGold(this,'blur','ds','0','1');" onkeypress="return CheckKey();" onkeyup="return CountGold(this,'keyup');"> <input name="class3_1" value="1" type="hidden"> <input name="xr_1" type="hidden" value="0"> <input name="locked_1" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber91">
                        <font class="font_bold">单</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl12"><a>0</a></span>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','ds','0','12');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_12"> <input name="class3_12" value="12" type="hidden"> <input name="xr_12" type="hidden" value="0"> <input name="locked_12" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber91">
                        <font class="font_bold">单</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl23"><a>0</a></span>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','ds','0','23');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_23"> <input name="class3_23" value="23" type="hidden"> <input name="xr_23" type="hidden" value="0"> <input name="locked_23" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber91">
                        <font class="font_bold">单</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl34"><a>0</a></span>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','ds','0','34');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_34"> <input name="class3_34" value="34" type="hidden"> <input name="xr_34" type="hidden" value="0"> <input name="locked_34" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber91">
                        <font class="font_bold">单
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl45"><a>0</a></span>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','ds','0','45');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_45"> <input name="class3_45" value="45" type="hidden"> <input name="xr_45" type="hidden" value="0"> <input name="locked_45" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber91">
                        <font class="font_bold">单</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl56"><a>0</a></span>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','ds','0','56');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_56"> <input name="class3_56" value="56" type="hidden"> <input name="xr_56" type="hidden" value="0"> <input name="locked_56" type="hidden" value="0">
                    </td>
                </tr>
                <tr>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber86">
                        <font class="font_bold">双</font>
                    </td>
                   <td height="30" align="center" bgcolor="#FFFFFF" id="bl2"><a>0</a></span>
                    </td>
                   <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','ds','0','2');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_2"> <input name="class3_2" value="2" type="hidden"> <input name="xr_2" type="hidden" value="0"> <input name="locked_2" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber86">
                        <font class="font_bold">双</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl13"><a>0</a></span>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','ds','0','13');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_13"> <input name="class3_13" value="13" type="hidden"> <input name="xr_13" type="hidden" value="0"> <input name="locked_13" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber86">
                        <font class="font_bold">双</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl24"><a>0</a></span>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','ds','0','24');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_24"> <input name="class3_24" value="24" type="hidden"> <input name="xr_24" type="hidden" value="0"> <input name="locked_24" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber86">
                       <font class="font_bold"> 双</font>
                    </td>
                   <td height="30" align="center" bgcolor="#FFFFFF" id="bl35"><a>0</a></span>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','ds','0','35');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_35"> <input name="class3_35" value="35" type="hidden"> <input name="xr_35" type="hidden" value="0"> <input name="locked_35" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber86">
                       <font class="font_bold"> 双</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl46"><a>0</a></span>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','ds','0','46');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_46"> <input name="class3_46" value="46" type="hidden"> <input name="xr_46" type="hidden" value="0"> <input name="locked_46" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber86">
                        <font class="font_bold">双</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl57"><a>0</a></span>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','ds','0','57');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_57"> <input name="class3_57" value="57" type="hidden"> <input name="xr_57" type="hidden" value="0"> <input name="locked_57" type="hidden" value="0">
                    </td>
                </tr>
                <tr>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber81">
                        <font class="font_bold"><font class="font_bold">大</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl3"><a>0</a></span>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','dx','0','3');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_3"> <input name="class3_3" value="3" type="hidden"> <input name="xr_3" type="hidden" value="0"> <input name="locked_3" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber81">
                        <font class="font_bold">大</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl14"><a>0</a></span>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','dx','0','14');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_14"> <input name="class3_14" value="14" type="hidden"> <input name="xr_14" type="hidden" value="0"> <input name="locked_14" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber81">
                        <font class="font_bold">大</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl25"><a>0</a></span>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','dx','0','25');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_25"> <input name="class3_25" value="25" type="hidden"> <input name="xr_25" type="hidden" value="0"> <input name="locked_25" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber81">
                        <font class="font_bold">大</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl36"><a>0</a></span>
                    </td>
                   <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','dx','0','36');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_36"> <input name="class3_36" value="36" type="hidden"> <input name="xr_36" type="hidden" value="0"> <input name="locked_36" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber81">
                        <font class="font_bold">大</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl47"><a>0</a></span>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','dx','0','47');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_47"> <input name="class3_47" value="47" type="hidden"> <input name="xr_47" type="hidden" value="0"> <input name="locked_47" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber81">
                        <font class="font_bold">大</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl58"><a>0</a></span>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','dx','0','58');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_58"> <input name="class3_58" value="58" type="hidden"> <input name="xr_58" type="hidden" value="0"> <input name="locked_58" type="hidden" value="0">
                    </td>
                </tr>
                <tr>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber76">
                        <font class="font_bold">小</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl4"><a>0</a></span>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','dx','0','4');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_4"> <input name="class3_4" value="4" type="hidden"> <input name="xr_4" type="hidden" value="0"> <input name="locked_4" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber76">
                        <font class="font_bold">小</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl15"><a>0</a></span>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','dx','0','15');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_15"> <input name="class3_15" value="15" type="hidden"> <input name="xr_15" type="hidden" value="0"> <input name="locked_15" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber76">
                        <font class="font_bold">小</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl26"><a>0</a></span>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','dx','0','26');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_26"> <input name="class3_26" value="26" type="hidden"> <input name="xr_26" type="hidden" value="0"> <input name="locked_26" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber76">
                        <font class="font_bold">小</font>
                    </td>
                   <td height="30" align="center" bgcolor="#FFFFFF" id="bl37"><a>0</a></span>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','dx','0','37');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_37"> <input name="class3_37" value="37" type="hidden"> <input name="xr_37" type="hidden" value="0"> <input name="locked_37" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber76">
                        <font class="font_bold">小</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl48"><a>0</a></span>
                    </td>
                   <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','dx','0','48');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_48"> <input name="class3_48" value="48" type="hidden"> <input name="xr_48" type="hidden" value="0"> <input name="locked_48" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber76">
                        <font class="font_bold">小</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl59"><a>0</a></span>
                    </td>
                   <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','dx','0','59');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_59"> <input name="class3_59" value="59" type="hidden"> <input name="xr_59" type="hidden" value="0"> <input name="locked_59" type="hidden" value="0">
                    </td>
                </tr>
                <tr>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber71">
                        <font class="font_bold">合单</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl5"><a>0</a></span>
                    </td>
                     <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','hsds','0','5');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_5"> <input name="class3_5" value="5" type="hidden"> <input name="xr_5" type="hidden" value="0"> <input name="locked_5" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber71">
                        <font class="font_bold">合单</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl16"><a>0</a></span>
                    </td>
                     <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','hsds','0','16');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_16"> <input name="class3_16" value="16" type="hidden"> <input name="xr_16" type="hidden" value="0"> <input name="locked_16" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber71">
                        <font class="font_bold">合单</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl27"><a>0</a></span>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','hsds','0','27');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_27"> <input name="class3_27" value="27" type="hidden"> <input name="xr_27" type="hidden" value="0"> <input name="locked_27" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber71">
                        <font class="font_bold">合单</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl38"><a>0</a></span>
                    </td>
                     <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','hsds','0','38');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_38"> <input name="class3_38" value="38" type="hidden"> <input name="xr_38" type="hidden" value="0"> <input name="locked_38" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber71">
                        <font class="font_bold">合单</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl49"><a>0</a></span>
                    </td>
                     <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','hsds','0','49');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_49"> <input name="class3_49" value="49" type="hidden"> <input name="xr_49" type="hidden" value="0"> <input name="locked_49" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber71">
                        <font class="font_bold">合单</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl60"><a>0</a></span>
                    </td>
                     <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','hsds','0','60');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_60"> <input name="class3_60" value="60" type="hidden"> <input name="xr_60" type="hidden" value="0"> <input name="locked_60" type="hidden" value="0">
                    </td>
                </tr>
                <tr>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber66">
                        <font class="font_bold">合双</font>
                    </td>
                   <td height="30" align="center" bgcolor="#FFFFFF" id="bl6"><a>0</a></span>
                    </td>
                     <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','hsds','0','6');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_6"> <input name="class3_6" value="6" type="hidden"> <input name="xr_6" type="hidden" value="0"> <input name="locked_6" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber66">
                        <font class="font_bold">合双</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl17"><a>0</a></span>
                    </td>
                     <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','hsds','0','17');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_17"> <input name="class3_17" value="17" type="hidden"> <input name="xr_17" type="hidden" value="0"> <input name="locked_17" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber66">
                        <font class="font_bold">合双
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl28"><a>0</a></span>
                    </td>
                     <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','hsds','0','28');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_28"> <input name="class3_28" value="28" type="hidden"> <input name="xr_28" type="hidden" value="0"> <input name="locked_28" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber66">
                        <font class="font_bold">合双</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl39"><a>0</a></span>
                    </td>
                     <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','hsds','0','39');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_39"> <input name="class3_39" value="39" type="hidden"> <input name="xr_39" type="hidden" value="0"> <input name="locked_39" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber66">
                        <font class="font_bold">合双</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl50"><a>0</a></span>
                    </td>
                     <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','hsds','0','50');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_50"> <input name="class3_50" value="50" type="hidden"> <input name="xr_50" type="hidden" value="0"> <input name="locked_50" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber66">
                       <font class="font_bold"> 合双</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl61"><a>0</a></span>
                    </td>
                     <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','hsds','0','61');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_61"> <input name="class3_61" value="61" type="hidden"> <input name="xr_61" type="hidden" value="0"> <input name="locked_61" type="hidden" value="0">
                    </td>
                </tr>
                <tr>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber61">
                        <font class="font_bold">合大</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl7"><a>0</a></span>
                    </td>
                     <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','hsdx','0','7');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_7"> <input name="class3_7" value="7" type="hidden"> <input name="xr_7" type="hidden" value="0"> <input name="locked_7" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber61">
                        <font class="font_bold">合大</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl18"><a>0</a></span>
                    </td>
                     <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','hsdx','0','18');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_18"> <input name="class3_18" value="18" type="hidden"> <input name="xr_18" type="hidden" value="0"> <input name="locked_18" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber61">
                        <font class="font_bold">合大</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl29"><a>0</a></span>
                    </td>
                     <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','hsdx','0','29');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_29"> <input name="class3_29" value="29" type="hidden"> <input name="xr_29" type="hidden" value="0"> <input name="locked_29" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber61">
                        <font class="font_bold">合大</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl40"><a>0</a></span>
                    </td>
                     <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','hsdx','0','40');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_40"> <input name="class3_40" value="40" type="hidden"> <input name="xr_40" type="hidden" value="0"> <input name="locked_40" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber61">
                        <font class="font_bold">合大</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl51"><a>0</a></span>
                    </td>
                     <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','hsdx','0','51');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_51"> <input name="class3_51" value="51" type="hidden"> <input name="xr_51" type="hidden" value="0"> <input name="locked_51" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber61">
                        <font class="font_bold">合大</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl62"><a>0</a></span>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','hsdx','0','62');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_62"> <input name="class3_62" value="62" type="hidden"> <input name="xr_62" type="hidden" value="0"> <input name="locked_62" type="hidden" value="0">
                    </td>
                </tr>
                <tr>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber56">
                        <font class="font_bold">合小</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl8"><a>0</a></span>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','hsdx','0','8');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_8"> <input name="class3_8" value="8" type="hidden"> <input name="xr_8" type="hidden" value="0"> <input name="locked_8" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber56">
                        <font class="font_bold">合小</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl19"><a>0</a></span>
                    </td>
                     <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','hsdx','0','19');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_19"> <input name="class3_19" value="19" type="hidden"> <input name="xr_19" type="hidden" value="0"> <input name="locked_19" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber56">
                       <font class="font_bold"> 合小</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl30"><a>0</a></span>
                    </td>
                     <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','hsdx','0','30');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_30"> <input name="class3_30" value="30" type="hidden"> <input name="xr_30" type="hidden" value="0"> <input name="locked_30" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber56">
                        <font class="font_bold">合小</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl41"><a>0</a></span>
                    </td>
                     <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','hsdx','0','41');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_41"> <input name="class3_41" value="41" type="hidden"> <input name="xr_41" type="hidden" value="0"> <input name="locked_41" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber56">
                        <font class="font_bold">合小</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl52"><a>0</a></span>
                    </td>
                     <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','hsdx','0','52');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_52"> <input name="class3_52" value="52" type="hidden"> <input name="xr_52" type="hidden" value="0"> <input name="locked_52" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber56">
                        <font class="font_bold">合小</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl63"><a>0</a></span>
                    </td>
                     <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','hsdx','0','63');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_63"> <input name="class3_63" value="63" type="hidden"> <input name="xr_63" type="hidden" value="0"> <input name="locked_63" type="hidden" value="0">
                    </td>
                </tr>
                <tr>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber10">
                        <font color="#FF0000">红波</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl9"><a>0</a></span>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','sb','0','9');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_9"> <input name="class3_9" value="9" type="hidden"> <input name="xr_9" type="hidden" value="0"> <input name="locked_9" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber10">
                        <font color="#FF0000">红波</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl20"><a>0</a></span>
                    </td>
                     <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','sb','0','20');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_20"> <input name="class3_20" value="20" type="hidden"> <input name="xr_20" type="hidden" value="0"> <input name="locked_20" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber10">
                        <font color="#FF0000">红波</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl31"><a>0</a></span>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','sb','0','31');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_31"> <input name="class3_31" value="31" type="hidden"> <input name="xr_31" type="hidden" value="0"> <input name="locked_31" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber10">
                        <font color="#FF0000">红波</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl42"><a>0</a></span>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','sb','0','42');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_42"> <input name="class3_42" value="42" type="hidden"> <input name="xr_42" type="hidden" value="0"> <input name="locked_42" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber10">
                        <font color="#FF0000">红波</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl53"><a>0</a></span>
                    </td>
                     <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','sb','0','53');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_53"> <input name="class3_53" value="53" type="hidden"> <input name="xr_53" type="hidden" value="0"> <input name="locked_53" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber10">
                        <font color="#FF0000">红波</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl64"><a>0</a></span>
                    </td>
                     <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','sb','0','64');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_64"> <input name="class3_64" value="64" type="hidden"> <input name="xr_64" type="hidden" value="0"> <input name="locked_64" type="hidden" value="0">
                    </td>
                </tr>
                <tr>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber51">
                        <font color="green">绿波</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl10"><a>0</a></span>
                    </td>
                     <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','sb','0','10');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_10"> <input name="class3_10" value="10" type="hidden"> <input name="xr_10" type="hidden" value="0"> <input name="locked_10" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber51">
                        <font color="green">绿波</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl21"><a>0</a></span>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','sb','0','21');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_21"> <input name="class3_21" value="21" type="hidden"> <input name="xr_21" type="hidden" value="0"> <input name="locked_21" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber51">
                        <font color="green">绿波</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl32"><a>0</a></span>
                    </td>
                     <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','sb','0','32');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_32"> <input name="class3_32" value="32" type="hidden"> <input name="xr_32" type="hidden" value="0"> <input name="locked_32" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber51">
                        <font color="green">绿波</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl43"><a>0</a></span>
                    </td>
                     <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','sb','0','43');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_43"> <input name="class3_43" value="43" type="hidden"> <input name="xr_43" type="hidden" value="0"> <input name="locked_43" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber51">
                        <font color="green">绿波</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl54"><a>0</a></span>
                    </td>
                     <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','sb','0','54');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_54"> <input name="class3_54" value="54" type="hidden"> <input name="xr_54" type="hidden" value="0"> <input name="locked_54" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber51">
                        <font color="green">绿波</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl65"><a>0</a></span>
                    </td>
                     <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','sb','0','65');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_65"> <input name="class3_65" value="65" type="hidden"> <input name="xr_65" type="hidden" value="0"> <input name="locked_65" type="hidden" value="0">
                    </td>
                </tr>
                <tr>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber">
                        <font color="#0000FF">蓝波</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl11"><a>0</a></span>
                    </td>
                     <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','sb','0','11');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_11"> <input name="class3_11" value="11" type="hidden"> <input name="xr_11" type="hidden" value="0"> <input name="locked_11" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber">
                        <font color="#0000FF">蓝波</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl22"><a>0</a></span>
                    </td>
                     <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','sb','0','22');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_22"> <input name="class3_22" value="22" type="hidden"> <input name="xr_22" type="hidden" value="0"> <input name="locked_22" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber">
                        <font color="#0000FF">蓝波</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl33"><a>0</a></span>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','sb','0','33');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_33"> <input name="class3_33" value="33" type="hidden"> <input name="xr_33" type="hidden" value="0"> <input name="locked_33" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber">
                        <font color="#0000FF">蓝波</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl44"><a>0</a></span>
                    </td>
                     <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','sb','0','44');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_44"> <input name="class3_44" value="44" type="hidden"> <input name="xr_44" type="hidden" value="0"> <input name="locked_44" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber">
                        <font color="#0000FF">蓝波</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl55"><a>0</a></span>
                    </td>
                     <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','sb','0','55');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_55"> <input name="class3_55" value="55" type="hidden"> <input name="xr_55" type="hidden" value="0"> <input name="locked_55" type="hidden" value="0">
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bnumber">
                        <font color="#0000FF">蓝波</font>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF" id="bl66"><a>0</a></span>
                    </td>
                    <td height="30" align="center" bgcolor="#FFFFFF">
                        <input onkeypress="return CheckKey();" onblur="return CountGold(this,'blur','sb','0','66');" onkeyup="return CountGold(this,'keyup');" onfocus="CountGold(this,'focus');this.value='';" style="width: 47px;" name="Num_66"> <input name="class3_66" value="66" type="hidden"> <input name="xr_66" type="hidden" value="0"> <input name="locked_66" type="hidden" value="0">
                    </td>
                </tr>
                <tr>
                    <td height="30" colspan="18" align="center" bgcolor="#FFFFFF">
                        <input type="button" name="button2" id="button2" onclick="qingling();" class="btn2 chongz" value="重置"> &nbsp;&nbsp; 
                        <input type="submit" name="btnSubmit" id="btnSubmit" class="btn1 stopsubmit stopsubmitx" value="下注">
                        <span id="allgold" style="display: none">0</span>
                        <input type="hidden" value="0" name="gold_all"> 
                        <input type="hidden" value="0" name="total_gold">
                    </td>
                    </tr>
                </tbody>
                </form>
    </table>