<table width="100%" border="0" cellpadding="0" cellspacing="0" class="maintable1">
    <tr class="maintable1tr1">
        <td width="41">Î²Êý</td>
        <td width="41">ÅâÂÊ</td>
        <td width="49">¹´Ñ¡</td>
        <td width="201">ºÅÂë</td>
        <td width="37">Î²Êý</td>
        <td width="51">ÅâÂÊ</td>
        <td>¹´Ñ¡</td>
        <td>ºÅÂë</td>
    </tr>
    <tr class="maintable1tr2">
        <td class="tdbackcolor">0Î²</td>
        <td><span id=bl1><a>0</a></span>
        </td>
        <td class="fontweight">
            <input onclick=SubChkBox(this) type="checkbox" name="num1" value="Êó">
        </td>
        <td class="fontweight">10,20,30,40</td>
        <td class="tdbackcolor">5Î²</td>
        <td><span id=bl6><a>0</a></span>
        </td>
        <td class="fontweight">
            <input onclick=SubChkBox(this) type="checkbox" name="num6" value="Éß">
        </td>
        <td class="fontweight">5,15,25,35,45</td>
    </tr>
    <tr class="maintable1tr2">
        <td class="tdbackcolor">1Î²</td>
        <td><span id=bl2><a>0</a></span>
        </td>
        <td class="fontweight">
            <input onclick=SubChkBox(this) type="checkbox" name="num2" value="Å£">
        </td>
        <td class="fontweight">1,11,21,31,41</td>
        <td class="tdbackcolor">6Î²</td>
        <td><span id=bl7><a>0</a></span>
        </td>
        <td width="50" class="fontweight">
            <input onclick=SubChkBox(this) type="checkbox" name="num7" value="Âí">
        </td>
        <td width="213" class="fontweight">6,16,26,36,46</td>
    </tr>
    <tr class="maintable1tr2">
        <td class="tdbackcolor">2Î²</td>
        <td><span id=bl3><a>0</a></span>
        </td>
        <td class="fontweight">
            <input onclick=SubChkBox(this) type="checkbox" name="num3" value="»¢">
        </td>
        <td class="fontweight">2,12,22,32,42</td>
        <td class="tdbackcolor">7Î²</td>
        <td><span id=bl8><a>0</a></span>
        </td>
        <td class="fontweight">
            <input onclick=SubChkBox(this) type="checkbox" name="num8" value="Ñò">
        </td>
        <td class="fontweight">7,17,27,37,47</td>
    </tr>
    <tr class="maintable1tr2">
        <td class="tdbackcolor">3Î²</td>
        <td><span id=bl4><a>0</a></span>
        </td>
        <td class="fontweight">
            <input onclick=SubChkBox(this) type="checkbox" name="num4" value="ÍÃ">
        </td>
        <td class="fontweight">3,13,23,33,43</td>
        <td class="tdbackcolor">8Î²</td>
        <td><span id=bl9><a>0</a></span>
        </td>
        <td class="fontweight">
            <input onclick=SubChkBox(this) type="checkbox" name="num9" value="ºï">
        </td>
        <td class="fontweight">8,18,28,38,48</td>
    </tr>
    <tr class="maintable1tr2">
        <td class="tdbackcolor">4Î²</td>
        <td><span id=bl5><a>0</a></span>
        </td>
        <td class="fontweight">
            <input onclick=SubChkBox(this) type="checkbox" name="num5" value="Áú">
        </td>
        <td class="fontweight">4,14,24,34,44</td>
        <td class="tdbackcolor">9Î²</td>
        <td><span id=bl10><a>0</a></span>
        </td>
        <td class="fontweight">
            <input onclick=SubChkBox(this) type="checkbox" name="num10" value="¼¦">
        </td>
        <td class="fontweight">9,18,29,39,49</td>
    </tr>
    <tr class="maintable1tr2">
        <td colspan="8" id="bnumber">ÇëÊäÈëÏÂ×¢½ð¶î:&nbsp;
            <input name="Num_1" id="Num_1" class="tdinput1 tdinput2" onFocus="CountGold(this,'focus');this.value='';" onBlur="return CountGold(this,'blur','SP','');" onKeyPress="return CheckKey();" onKeyUp="return CountGold(this,'keyup');" />
            <INPUT type="hidden" value=0 name="allgold">
            <INPUT type="hidden" value=0 name="total_gold">
        </td>
    </tr>
    <tr class="maintable1tr2">
        <td colspan="8" id="bnumber3">
            <input type="button" name="button2" id="button2" onClick="qingling();" class="btn2 chongz" value="ÖØÖÃ" />&nbsp;&nbsp;&nbsp;
            <input type="submit" name="btnSubmit" id="btnSubmit" class="btn1 stopsubmit stopsubmitx" value="ÏÂ×¢" />
        </td>
    </tr>
</table>