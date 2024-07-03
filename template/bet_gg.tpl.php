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
              <span id="loadingnumber" style="font-family: @GulimChe; font-size: 16px; font-weight: bold;display: none;"> <?=$autotime / 1000?></font>
         <img id="loadingimg" style="vertical-align: middle; display: none;" src="/member/images/loading.gif" alt="¼ÓÔØÖÐ..." width="16" height="20">
      </td>  
      
       </tr>
   </tbody>
   </table>
     <table  width="800" border="0" cellpadding="0" cellspacing="1" class="t_list">
    <form target="leftFrame" name="form1" method="post" action="main.php?action=bet_n3&uid=<?=$uid?>&class2=<?=$ids?> " onSubmit="return ChkSubmit(this)">
    <tbody>
    <tr>
            <td class="t_list_caption" colspan="2">ÕýÂë1</td>
            <td class="t_list_caption" colspan="2">ÕýÂë2</td>
            <td class="t_list_caption" colspan="2">ÕýÂë3</td>
            <td class="t_list_caption" colspan="2">ÕýÂë4</td>
            <td class="t_list_caption" colspan="2">ÕýÂë5</td>
            <td class="t_list_caption" colspan="2">ÕýÂë6</td>
        </tr>
        <!--<tr>-->
        <!--    <td class="t_list_caption">ºÅÂë</td>-->
        <!--    <td class="t_list_caption">ÅâÂÊ</td>-->
        <!--    <td class="t_list_caption">ºÅÂë</td>-->
        <!--    <td class="t_list_caption">ÅâÂÊ</td>-->
        <!--    <td class="t_list_caption">ºÅÂë</td>-->
        <!--    <td class="t_list_caption">ÅâÂÊ</td>-->
        <!--    <td class="t_list_caption">ºÅÂë</td>-->
        <!--    <td class="t_list_caption">ÅâÂÊ</td>-->
        <!--    <td class="t_list_caption">ºÅÂë</td>-->
        <!--    <td class="t_list_caption">ÅâÂÊ</td>-->
        <!--    <td class="t_list_caption">ºÅÂë</td>-->
        <!--    <td class="t_list_caption">ÅâÂÊ</td>-->
        <!--</tr>-->
        <tr>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold">µ¥</font></td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <INPUT type=radio onclick=SubChkBox(this) value="1" name="game1" id="num1"> <span id=bl1><a>0</a></span>
            </td>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold">µ¥</font></td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <INPUT type=radio onclick=SubChkBox(this) value="8" name="game4" id="num8"> <span id=bl8><a>0</a></span>
            </td>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold">µ¥</font></td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <INPUT type=radio onclick=SubChkBox(this) value="15" name="game7" id="num15"> <span id=bl15><a>0</a></span>
            </td>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold">µ¥</font></td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <INPUT type=radio onclick=SubChkBox(this) value="22" name="game10" id="num22"> <span id=bl22><a>0</a></span>
            </td>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold">µ¥</font></td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <INPUT type=radio onclick=SubChkBox(this) value="29" name="game13" id="num29"> <span id=bl29><a>0</a></span>
            </td>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold">µ¥</font></td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <INPUT type=radio onclick=SubChkBox(this) value="36" name="game16" id="num36"> <span id=bl36><a>0</a></span>
            </td>
        </tr>
        <tr>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold">Ë«</font></td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <INPUT type=radio onclick=SubChkBox(this) value="2" name="game1" id="num2"> <span id=bl2><a>0</a></span>
            </td>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold">Ë«</font></td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <INPUT type=radio onclick=SubChkBox(this) value="9" name="game4" id="num9"> <span id=bl9><a>0</a></span>
            </td>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold">Ë«</font></td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <INPUT type=radio onclick=SubChkBox(this) value="16" name="game7" id="num16"> <span id=bl16><a>0</a></span>
            </td>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold">Ë«</font></td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <INPUT type=radio onclick=SubChkBox(this) value="23" name="game10" id="num23"> <span id=bl23><a>0</a></span>
            </td>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold">Ë«</font></td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <INPUT type=radio onclick=SubChkBox(this) value="30" name="game13" id="num30"> <span id=bl30><a>0</a></span>
            </td>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold">Ë«</font></td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <INPUT type=radio onclick=SubChkBox(this) value="37" name="game16" id="num37"> <span id=bl37><a>0</a></span>
            </td>
        </tr>
        <tr>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold">´ó</font></td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <INPUT type=radio onclick=SubChkBox(this) value="3" name="game2" id="num3"> <span id=bl3><a>0</a></span>
            </td>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold">´ó</font></td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <INPUT type=radio onclick=SubChkBox(this) value="10" name="game5" id="num10"> <span id=bl10><a>0</a></span>
            </td>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold">´ó</font></td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <INPUT type=radio onclick=SubChkBox(this) value="17" name="game8" id="num17"> <span id=bl17><a>0</a></span>
            </td>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold">´ó</font></td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <INPUT type=radio onclick=SubChkBox(this) value="24" name="game11" id="num24"> <span id=bl24><a>0</a></span>
            </td>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold">´ó</font></td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <INPUT type=radio onclick=SubChkBox(this) value="31" name="game14" id="num31"> <span id=bl31><a>0</a></span>
            </td>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold">´ó</font></td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <INPUT type=radio onclick=SubChkBox(this) value="38" name="game17" id="num38"> <span id=bl38><a>0</a></span>
            </td>
        </tr>
        <tr>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold">Ð¡</font></td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <INPUT type=radio onclick=SubChkBox(this) value="4" name="game2" id="num4"> <span id=bl4><a>0</a></span>
            </td>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold">Ð¡</font></td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <INPUT type=radio onclick=SubChkBox(this) value="11" name="game5" id="num11"> <span id=bl11><a>0</a></span>
            </td>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold">Ð¡</font></td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <INPUT type=radio onclick=SubChkBox(this) value="18" name="game8" id="num18"> <span id=bl18><a>0</a></span>
            </td>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold">Ð¡</font></td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <INPUT type=radio onclick=SubChkBox(this) value="25" name="game11" id="num25"> <span id=bl25><a>0</a></span>
            </td>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold">Ð¡</font></td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <INPUT type=radio onclick=SubChkBox(this) value="32" name="game14" id="num32"> <span id=bl32><a>0</a></span>
            </td>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold">Ð¡</font></td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <INPUT type=radio onclick=SubChkBox(this) value="39" name="game17" id="num39"> <span id=bl39><a>0</a></span>
            </td>
        </tr>
        <tr>
            <td align="center" bgcolor="#FFFFFF"><font color="ff0000">ºì²¨</font>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <INPUT type=radio onclick=SubChkBox(this) value="5" name="game3" id="num5"> <span id=bl5><a>0</a></span>
            </td>
            <td align="center" bgcolor="#FFFFFF"><font color="ff0000">ºì²¨</font>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <INPUT type=radio onclick=SubChkBox(this) value="12" name="game6" id="num12"> <span id=bl12><a>0</a></span>
            </td>
            <td align="center" bgcolor="#FFFFFF"><font color="ff0000">ºì²¨</font>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <INPUT type=radio onclick=SubChkBox(this) value="19" name="game9" id="num19"> <span id=bl19><a>0</a></span>
            </td>
            <td align="center" bgcolor="#FFFFFF"><font color="ff0000">ºì²¨</font>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <INPUT type=radio onclick=SubChkBox(this) value="26" name="game12" id="num26"> <span id=bl26><a>0</a></span>
            </td>
            <td align="center" bgcolor="#FFFFFF"><font color="ff0000">ºì²¨</font>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <INPUT type=radio onclick=SubChkBox(this) value="33" name="game15" id="num33"> <span id=bl33><a>0</a></span>
            </td>
            <td align="center" bgcolor="#FFFFFF"><font color="ff0000">ºì²¨</font>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <INPUT type=radio onclick=SubChkBox(this) value="40" name="game18" id="num40"> <span id=bl40><a>0</a></span>
            </td>
        </tr>
        <tr>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold"><font color="green">ÂÌ²¨</font>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <INPUT type=radio onclick=SubChkBox(this) value="6" name="game3" id="num6"> <span id=bl6><a>0</a></span>
            </td>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold"><font color="green">ÂÌ²¨</font>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <INPUT type=radio onclick=SubChkBox(this) value="13" name="game6" id="num13"> <span id=bl13><a>0</a></span>
            </td>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold"><font color="green">ÂÌ²¨</font>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <INPUT type=radio onclick=SubChkBox(this) value="20" name="game9" id="num20"> <span id=bl20><a>0</a></span>
            </td>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold"><font color="green">ÂÌ²¨</font>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <INPUT type=radio onclick=SubChkBox(this) value="27" name="game12" id="num27"> <span id=bl27><a>0</a></span>
            </td>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold"><font color="green">ÂÌ²¨</font>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <INPUT type=radio onclick=SubChkBox(this) value="34" name="game15" id="num34"> <span id=bl34><a>0</a></span>
            </td>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold"><font color="green">ÂÌ²¨</font>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <INPUT type=radio onclick=SubChkBox(this) value="41" name="game18" id="num41"> <span id=bl41><a>0</a></span>
            </td>
        </tr>
        <tr>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold"><font color="0000ff">À¶²¨</font>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <INPUT type=radio onclick=SubChkBox(this) value="7" name="game3" id="num7"> <span id=bl7><a>0</a></span>
            </td>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold"><font color="0000ff">À¶²¨</font>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <INPUT type=radio onclick=SubChkBox(this) value="14" name="game6" id="num14"> <span id=bl14><a>0</a></span>
            </td>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold"><font color="0000ff">À¶²¨</font>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <INPUT type=radio onclick=SubChkBox(this) value="21" name="game9" id="num21"> <span id=bl21><a>0</a></span>
            </td>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold"><font color="0000ff">À¶²¨</font>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <INPUT type=radio onclick=SubChkBox(this) value="28" name="game12" id="num28"> <span id=bl28><a>0</a></span>
            </td>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold"><font color="0000ff">À¶²¨</font>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <INPUT type=radio onclick=SubChkBox(this) value="35" name="game15" id="num35"> <span id=bl35><a>0</a></span>
            </td>
            <td align="center" bgcolor="#FFFFFF"><font class="font_bold"><font color="0000ff">À¶²¨</font>
            </td>
            <td height="30" align="center" bgcolor="#FFFFFF">
                <INPUT type=radio onclick=SubChkBox(this) value="42" name="game18" id="num42"> <span id=bl42><a>0</a></span>
            </td>
        </tr>
        <tr>
            <td colspan="12" align="center" bgcolor="#FFFFFF"  id="bnumber2">
                <input type="button" name="button2" id="button2" onClick="qingling();" class="btn2 chongz" value="ÖØÖÃ" />&nbsp;&nbsp;
                <input type="submit" name="btnSubmit" id="btnSubmit" class="btn1 stopsubmit stopsubmitx" value="ÏÂ×¢" />
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