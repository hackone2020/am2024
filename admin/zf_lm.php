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
                    <td align="right" valign="top"><a style="cursor:pointer;" onClick="close_win();"><img
                                src="images/edit_dot.gif" width="16" height="14"></a></td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<table width="200" border="0" cellpadding="2" cellspacing="1" bgcolor="00558E">
    <tr>
        <td bgcolor="#FFFFFF">
            <table width="200" border="0" cellpadding="0" cellspacing="0" bgcolor="0163A2" class="m_tab_fix">
                <tr bgcolor="#A4C0CE">
                    <td height="20">用户
                    </td>
                    <td>

                        <select name="classname" id="classname">
                            <option value="" selected="selected"> </option>
                            <?$result = $db1->query("select * from web_config_class order by id desc");
while ($image = $result->fetch_array()) {?>
                            <OPTION value=外调 . <?=$image['classname']?>
                                >外调 .
                                <?=$image['classname']?> .
                            </OPTION>
                            <?}?>
                        </select>
                    </td>
                </tr>

                <tr bgcolor="#000000">
                    <td colspan="2" height="1"></td>
                </tr>
                <tr bgcolor="#A4C0CE">
                    <td width="157" height="20">号码</td>
                    <td width="236">
                        <font color="ff0000" id="ag1_c">0</font>
                    </td>
                </tr>
                <tr bgcolor="#000000">
                    <td colspan="2" height="1"></td>
                </tr>
                <tr bgcolor="#A4C0CE">
                    <td height="20">退水</td>
                    <td>
                        <input name="ds" type="text" id="ds" value="0" size="6" class="za_text" />%
                    </td>
                </tr>
                <tr bgcolor="#000000">
                    <td colspan="2" height="1"></td>
                </tr>
                <tr bgcolor="#A4C0CE">
                    <td height="20" align="left">赔率</td>
                    <td align="left">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="40%"><input name="rate" type="text" id="rate" value="0" size="6"
                                        class="za_text" /></td>

                                <td width="60%">
                                    <div id="ag_count">0</div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr bgcolor="#A4C0CE" id="r2" style="DISPLAY:none;">
                    <td height="20" align="left">赔率</td>
                    <td align="left">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>

                                <td width="40%"><input name="rate2" type="text" id="rate2" value="0" size="6"
                                        class="za_text" /></td>

                                <td width="60%">
                                    <div id="ag_count2">0</div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr bgcolor="#000000">
                    <td colspan="2" height="1"></td>
                </tr>
                <tr bgcolor="#A4C0CE">
                    <td height="20">金额</td>
                    <td>
                        <input name="sum_m" type="text" id="sum_m" value="0" size="10" class="za_text" />
                    </td>
                </tr>
                <tr bgcolor="#000000">
                    <td colspan="2" height="1"></td>
                </tr>
                <tr bgcolor="#A4C0CE">
                    <td height="20" colspan="2" align="center">
                        <input type="submit" name="Submit" class="buttonnor" value="补货" />
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