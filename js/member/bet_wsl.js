<table width="100%" border="0" cellpadding="0" cellspacing="0" class="maintable1">
    <tr class="maintable1tr1">
        <td width="41">β��</td>
        <td width="41">����</td>
        <td width="49">��ѡ</td>
        <td width="201">����</td>
        <td width="37">β��</td>
        <td width="51">����</td>
        <td>��ѡ</td>
        <td>����</td>
    </tr>
    <tr class="maintable1tr2">
        <td class="tdbackcolor">0β</td>
        <td><span id=bl1><a>0</a></span>
        </td>
        <td class="fontweight">
            <input onclick=SubChkBox(this) type="checkbox" name="num1" value="��">
        </td>
        <td class="fontweight">10,20,30,40</td>
        <td class="tdbackcolor">5β</td>
        <td><span id=bl6><a>0</a></span>
        </td>
        <td class="fontweight">
            <input onclick=SubChkBox(this) type="checkbox" name="num6" value="��">
        </td>
        <td class="fontweight">5,15,25,35,45</td>
    </tr>
    <tr class="maintable1tr2">
        <td class="tdbackcolor">1β</td>
        <td><span id=bl2><a>0</a></span>
        </td>
        <td class="fontweight">
            <input onclick=SubChkBox(this) type="checkbox" name="num2" value="ţ">
        </td>
        <td class="fontweight">1,11,21,31,41</td>
        <td class="tdbackcolor">6β</td>
        <td><span id=bl7><a>0</a></span>
        </td>
        <td width="50" class="fontweight">
            <input onclick=SubChkBox(this) type="checkbox" name="num7" value="��">
        </td>
        <td width="213" class="fontweight">6,16,26,36,46</td>
    </tr>
    <tr class="maintable1tr2">
        <td class="tdbackcolor">2β</td>
        <td><span id=bl3><a>0</a></span>
        </td>
        <td class="fontweight">
            <input onclick=SubChkBox(this) type="checkbox" name="num3" value="��">
        </td>
        <td class="fontweight">2,12,22,32,42</td>
        <td class="tdbackcolor">7β</td>
        <td><span id=bl8><a>0</a></span>
        </td>
        <td class="fontweight">
            <input onclick=SubChkBox(this) type="checkbox" name="num8" value="��">
        </td>
        <td class="fontweight">7,17,27,37,47</td>
    </tr>
    <tr class="maintable1tr2">
        <td class="tdbackcolor">3β</td>
        <td><span id=bl4><a>0</a></span>
        </td>
        <td class="fontweight">
            <input onclick=SubChkBox(this) type="checkbox" name="num4" value="��">
        </td>
        <td class="fontweight">3,13,23,33,43</td>
        <td class="tdbackcolor">8β</td>
        <td><span id=bl9><a>0</a></span>
        </td>
        <td class="fontweight">
            <input onclick=SubChkBox(this) type="checkbox" name="num9" value="��">
        </td>
        <td class="fontweight">8,18,28,38,48</td>
    </tr>
    <tr class="maintable1tr2">
        <td class="tdbackcolor">4β</td>
        <td><span id=bl5><a>0</a></span>
        </td>
        <td class="fontweight">
            <input onclick=SubChkBox(this) type="checkbox" name="num5" value="��">
        </td>
        <td class="fontweight">4,14,24,34,44</td>
        <td class="tdbackcolor">9β</td>
        <td><span id=bl10><a>0</a></span>
        </td>
        <td class="fontweight">
            <input onclick=SubChkBox(this) type="checkbox" name="num10" value="��">
        </td>
        <td class="fontweight">9,18,29,39,49</td>
    </tr>
    <tr class="maintable1tr2">
        <td colspan="8" id="bnumber">��������ע���:&nbsp;
            <input name="Num_1" id="Num_1" class="tdinput1 tdinput2" onFocus="CountGold(this,'focus');this.value='';" onBlur="return CountGold(this,'blur','SP','');" onKeyPress="return CheckKey();" onKeyUp="return CountGold(this,'keyup');" />
            <INPUT type="hidden" value=0 name="allgold">
            <INPUT type="hidden" value=0 name="total_gold">
        </td>
    </tr>
    <tr class="maintable1tr2">
        <td colspan="8" id="bnumber3">
            <input type="button" name="button2" id="button2" onClick="qingling();" class="btn2 chongz" value="����" />&nbsp;&nbsp;&nbsp;
            <input type="submit" name="btnSubmit" id="btnSubmit" class="btn1 stopsubmit stopsubmitx" value="��ע" />
        </td>
    </tr>
</table>