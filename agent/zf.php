<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}?>
<table width="200" border="0" cellpadding="2" cellspacing="1" bgcolor="00558E">
    <tr>
        <td bgcolor="#FFFFFF">
            <table width="200" border="0" cellspacing="0" cellpadding="0" bgcolor="0163A2" class="m_tab_fix">
                <tr bgcolor="0163A2">
                    <td>
                        <font color="#FFFFFF">走飞</font>
                    </td>
                    <td align="right" valign="top">
                        <a style="cursor:pointer;" onClick="close_win();"><img src="images/edit_dot.gif" width="16"
                                height="14"></a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<table width="200" border="0" cellpadding="2" cellspacing="1" bgcolor="00558E">
    <tr>
        <td bgcolor="#FFFFFF">
            <table width="200" border="0" cellpadding="0" cellspacing="0" bgcolor="0163A2" class="m_tab_fix">
                <tr bgcolor="#000000">
                    <td colspan="2" height="1"></td>
                </tr>
                <tr bgcolor="#A4C0CE">
                    <td height="20" align="center">期数</td>
                    <td>
                        <font color="#009900" id="ag_count0">0</font>
                    </td>
                </tr>
                <tr bgcolor="#A4C0CE">
                    <td width="157" height="20" align="center">号码</td>
                    <td width="236">
                        <font color="ff0000" id="ag1_c">0</font>
                    </td>
                </tr>
                <tr align="center" bgcolor="#000000">
                    <td height="1" colspan="2"></td>
                </tr>
                <tr bgcolor="#A4C0CE">
                    <td height="20" align="center">退水</td>
                    <td><input name="ds" type="hidden" id="ds" value="0" size="6" class="za_text" />
                        <font color="#000000" id="ag_count1">0</font>%
                    </td>
                </tr>
                <tr align="center" bgcolor="#000000">
                    <td height="1" colspan="2"></td>
                </tr>
                <tr bgcolor="#A4C0CE">
                    <td height="20" align="center">赔率</td>
                    <td align="left">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td><input name="rate" type="hidden" id="rate" value="0" size="6" class="za_text" />
                                    <font color="#000000" id="ag_count2">0</font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr align="center" bgcolor="#000000">
                    <td height="1" colspan="2"></td>
                </tr>
                <tr bgcolor="#A4C0CE">
                    <td height="20" align="center">金额</td>
                    <td><input name="sum_m" type="text" id="sum_m" value="0" size="10" class="za_text" /></td>
                </tr>
                <tr bgcolor="#000000">
                    <td colspan="2" height="1"></td>
                </tr>
                <tr bgcolor="#A4C0CE">
                    <td height="20" colspan="2" align="center"><input type="submit" name="Submit" class="buttonnor"
                            value="补货" />
                        <input type="button" name="Submit2" onclick="javascript:close_win()" class="buttonnor"
                            value="取消" />
                        <input name="class3" type="hidden" id="class3" />
                        <input name="class1" type="hidden" id="class1" />
                        <input name="class2" type="hidden" id="class2" />
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>