<table border="0" id="dengtai" cellpadding="0" cellspacing="0" style="text-align: center;margin-top: 60px; display: none;">
		<tr>
			<td align="center" style="font-size: 12px; font-weight: bold;">正在下注,请稍候...</td>
		</tr>
</table>	

<form action="main.php?action=bet_nn&uid=<?=$uid?>&class2=<?=$class2?>" method="post" name="form1" id="form1" onSubmit="return SubChk()">
	<table width="90%"  id="queren" border="0" align="center" cellpadding="0" cellspacing="1" class="t_son">
		<tbody>
			<tr>
				<td align="center" colspan="2" class="t_list_caption">
					<font class="font_r" id="formname"><?= $class2 ?>-快速方式</font>
				</td>
			</tr>
			<tr>
				<td width="65" height="25" align="right" bgcolor="#FFFFFF">会员账号：</td>
				<td height="25" bgcolor="#FFFFFF" class="t_td_text"><?= $username ?>( <?= $xm ?>) <?= $abcd ?>盘
				</td>
			</tr>
			<tr>
				<td width="65" height="25" align="right" bgcolor="#FFFFFF">可用金额：</td>
				<td height="25" bgcolor="#FFFFFF" class="t_td_text"><?= $ts ?>
				</td>
			</tr>
			<tr>
			<td colspan="2" bgcolor="#FFFFFF">
				<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" id="easy">
					<tbody>
						<Tr>
							<td height="22" align="center" bgcolor="#FFFFFF" class="font_r" onclick="sel(this.id);"
									id="bnumber1">01</td>
								<td align="center" bgcolor="#FFFFFF" class="font_g" onclick="sel(this.id);"
									id="bnumber11">11</td>
								<td align="center" bgcolor="#FFFFFF" class="font_g" onclick="sel(this.id);"
									id="bnumber21">21</td>
								<td align="center" bgcolor="#FFFFFF" class="font_b" onclick="sel(this.id);"
									id="bnumber31">31</td>
								<td align="center" bgcolor="#FFFFFF" class="font_b" onclick="sel(this.id);"
									id="bnumber41">41</td>
						</Tr>
						<tr>
								<td align="center" class="font_g" bgcolor="#FFFFFF" onclick="sel(this.id);"
									id="bnumber2">02</td>
								<td align="center" class="font_g" bgcolor="#FFFFFF" onclick="sel(this.id);"
									id="bnumber12">12</td>
								<td align="center" class="font_g" bgcolor="#FFFFFF" onclick="sel(this.id);"
									id="bnumber22">22</td>
								<td align="center" class="font_g" bgcolor="#FFFFFF" onclick="sel(this.id);"
									id="bnumber32">32</td>
								<td align="center" class="font_b" bgcolor="#FFFFFF" onclick="sel(this.id);"
									id="bnumber42">42</td>
						</tr>
						<tr>
							<td align="center" class="font_g" bgcolor="#FFFFFF" onclick="sel(this.id);" id="bnumber3">03</td>
							<td align="center" class="font_r" bgcolor="#FFFFFF" onclick="sel(this.id);" id="bnumber13">13</td>
							<td align="center" class="font_r" bgcolor="#FFFFFF" onclick="sel(this.id);" id="bnumber23">23</td>
							<td align="center" class="font_g" bgcolor="#FFFFFF" onclick="sel(this.id);" id="bnumber33">33</td>
							<td align="center" class="font_g" bgcolor="#FFFFFF" onclick="sel(this.id);" id="bnumber43">43</td>
						</tr>
						<tr>
							<td align="center" bgcolor="#FFFFFF" class="font_b" onclick="sel(this.id);" id="bnumber4">04</td>
							<td align="center" bgcolor="#FFFFFF" class="font_b" onclick="sel(this.id);" id="bnumber14">14</td>
							<td align="center" bgcolor="#FFFFFF" class="font_r" onclick="sel(this.id);" id="bnumber24">24</td>
							<td align="center" bgcolor="#FFFFFF" class="font_r" onclick="sel(this.id);" id="bnumber34">34</td>
							<td align="center" bgcolor="#FFFFFF" class="font_g" onclick="sel(this.id);" id="bnumber44">44</td>
						</tr>
						<tr>
							<td align="center" bgcolor="#FFFFFF" class="font_g" onclick="sel(this.id);" id="bnumber5">05</td>
							<td align="center" bgcolor="#FFFFFF" class="font_b" onclick="sel(this.id);" id="bnumber15">15</td>
							<td align="center" bgcolor="#FFFFFF" class="font_b" onclick="sel(this.id);" id="bnumber25">25</td>
							<td align="center" bgcolor="#FFFFFF" class="font_r" onclick="sel(this.id);" id="bnumber35">35</td>
							<td align="center" bgcolor="#FFFFFF" class="font_r" onclick="sel(this.id);" id="bnumber45">45</td>
						</tr>
						<tr>
							<td align="center" bgcolor="#FFFFFF" class="font_g" onclick="sel(this.id);" id="bnumber6">06</td>
							<td align="center" bgcolor="#FFFFFF" class="font_g" onclick="sel(this.id);" id="bnumber16">16</td>
							<td align="center" bgcolor="#FFFFFF" class="font_b" onclick="sel(this.id);" id="bnumber26">26</td>
							<td align="center" bgcolor="#FFFFFF" class="font_b" onclick="sel(this.id);" id="bnumber36">36</td>
							<td align="center" bgcolor="#FFFFFF" class="font_r" onclick="sel(this.id);" id="bnumber46">46</td>
						</tr>
						<tr>
							<td align="center" bgcolor="#FFFFFF" class="font_r" onclick="sel(this.id);" id="bnumber7">07</td>
							<td align="center" bgcolor="#FFFFFF" class="font_g" onclick="sel(this.id);" id="bnumber17">17</td>
							<td align="center" bgcolor="#FFFFFF" class="font_g" onclick="sel(this.id);" id="bnumber27">27</td>
							<td align="center" bgcolor="#FFFFFF" class="font_b" onclick="sel(this.id);" id="bnumber37">37</td>
							<td align="center" bgcolor="#FFFFFF" class="font_b" onclick="sel(this.id);" id="bnumber47">47</td>
						</tr>
						<tr>
							<td align="center" bgcolor="#FFFFFF" class="font_r" onclick="sel(this.id);" id="bnumber8">08</td>
							<td align="center" bgcolor="#FFFFFF" class="font_r" onclick="sel(this.id);" id="bnumber18">18</td>
							<td align="center" bgcolor="#FFFFFF" align="center" bgcolor="#FFFFFF" class="font_g"
								onclick="sel(this.id);" id="bnumber28">28</td>
							<td align="center" bgcolor="#FFFFFF" align="center" bgcolor="#FFFFFF" class="font_g"
								onclick="sel(this.id);" id="bnumber38">38</td>
							<td align="center" bgcolor="#FFFFFF" class="font_b" onclick="sel(this.id);" id="bnumber48">48</td>
						</tr>
						<tr>
							<td align="center" bgcolor="#FFFFFF" class="font_b" onclick="sel(this.id);" id="bnumber9">09</td>
							<td align="center" bgcolor="#FFFFFF" class="font_r" onclick="sel(this.id);" id="bnumber19">19</td>
							<td align="center" bgcolor="#FFFFFF" class="font_r" onclick="sel(this.id);" id="bnumber29">29</td>
							<td align="center" bgcolor="#FFFFFF" align="center" bgcolor="#FFFFFF" class="font_g"
								onclick="sel(this.id);" id="bnumber39">39</td>
							<td align="center" bgcolor="#FFFFFF" align="center" bgcolor="#FFFFFF" class="font_g"
								onclick="sel(this.id);" id="bnumber49">49</td>
						</tr>
						<tr>
							<td align="center" bgcolor="#FFFFFF" class="font_b" onclick="sel(this.id);" id="bnumber10">10</td>
							<td align="center" bgcolor="#FFFFFF" class="font_b" onclick="sel(this.id);" id="bnumber20">20</td>
							<td align="center" bgcolor="#FFFFFF" class="font_r" onclick="sel(this.id);" id="bnumber30">30</td>
							<td align="center" bgcolor="#FFFFFF" class="font_r" onclick="sel(this.id);" id="bnumber40">40</td>
							<td align="center" bgcolor="#FFFFFF" align="center" bgcolor="#FFFFFF" class="font_g" id="tdnull">&nbsp;
							</td>
						</tr>
					</tbody>
				</table>
			</td>
			<tr>
				<td colspan="2" align="center" bgcolor="#FFFFFF">
					<span class="font_b">
						<a href="#0" class="quan fontred" onclick="sx_sel(this,0);" id="quan0">红 </a>
						<a href="#1" class="quan fontgreen" onclick="sx_sel(this,1);" id="quan1">绿 </a>
						<a href="#2" class="quan fontblue" onclick="sx_sel(this,2);" id="quan2">蓝 </a>
						<a href="#3" class="quanclear" onclick="sx_sel(this,3);" id="quan3">单 </a>
						<a href="#4" class="quanclear" onclick="sx_sel(this,4);" id="quan4">双 </a>
						<a href="#5" class="quanclear" onclick="sx_sel(this,5);" id="quan5">大 </a>
						<a href="#6" class="quanclear" onclick="sx_sel(this,6);" id="quan6">小 </a>
						<a href="#7" class="quanclear" onclick="sx_sel(this,7);" id="quan7">合单 </a>
						<a href="#8" class="quanclear" onclick="sx_sel(this,8);" id="quan8">合双 </a>
						<br>
						<strong class="font_o">头 </strong>
						<span class="font_bold">
							<a href="#11" onclick="sx_sel(this,11);" id="quan11">0</a>
							<a href="#12" onclick="sx_sel(this,12);" id="quan12">1</a>
							<a href="#13" onclick="sx_sel(this,13);" id="quan13">2</a>
							<a href="#14" onclick="sx_sel(this,14);" id="quan14">3</a>
							<a href="#15" onclick="sx_sel(this,15);" id="quan15">4</a>
							<br>
							<strong class="font_o">尾</strong>
							<a href="#16" onclick="sx_sel(this,16);" id="quan16">0</a>
							<a href="#17" onclick="sx_sel(this,17);" id="quan17">1</a>
							<a href="#18" onclick="sx_sel(this,18);" id="quan18">2</a>
							<a href="#19" onclick="sx_sel(this,19);" id="quan19">3</a>
							<a href="#20" onclick="sx_sel(this,20);" id="quan20">4</a>
							<a href="#21" onclick="sx_sel(this,21);" id="quan21">5</a>
							<a href="#22" onclick="sx_sel(this,22);" id="quan22">6</a>
							<a href="#23" onclick="sx_sel(this,23);" id="quan23">7</a>
							<a href="#24" onclick="sx_sel(this,24);" id="quan24">8</a>
							<a href="#25" onclick="sx_sel(this,25);" id="quan25">9</a>
						</span>
						<br>
						<a href="#40" onclick="sx_sel(this,40);" id="quan40">大单 </a>
						<a href="#41" onclick="sx_sel(this,41);" id="quan41">大双 </a>
						<a href="#42" onclick="sx_sel(this,42);" id="quan42">小单 </a>
						<a href="#43" onclick="sx_sel(this,43);" id="quan43">小双 </a>
						<br>
						<a href="#38" onclick="sx_sel(this,38);" id="quan38">尾大 </a>
						<a href="#39" onclick="sx_sel(this,39);" id="quan39">尾小 </a>
						<a href="#9" onclick="sx_sel(this,9);" id="quan9">家禽 </a>
						<a href="#10" onclick="sx_sel(this,10);" id="quan10">野兽 </a>
						<a href="#" onclick="rkcolor(1);">全选 </a>
						<a href="#" onclick="rkcolor(2);">反选 </a>
						<a href="#" onclick="rkcolor(0);">取消 </a>
						<br>
						<a href="#26" onclick="sx_sel(this,26);" id="quan26">鼠 </a>
						<a href="#27" onclick="sx_sel(this,27);" id="quan27">牛 </a>
						<a href="#28" onclick="sx_sel(this,28);" id="quan28">虎 </a>
						<a href="#29" onclick="sx_sel(this,29);" id="quan29">兔 </a>
						<a href="#30" onclick="sx_sel(this,30);" id="quan30">龙 </a>
						<a href="#31" onclick="sx_sel(this,31);" id="quan31">蛇 </a>
						<br>
						<a href="#32" onclick="sx_sel(this,32);" id="quan32">马 </a>
						<a href="#33" onclick="sx_sel(this,33);" id="quan33">羊 </a>
						<a href="#34" onclick="sx_sel(this,34);" id="quan34">猴 </a>
						<a href="#35" onclick="sx_sel(this,35);" id="quan35">鸡 </a>
						<a href="#36" onclick="sx_sel(this,36);" id="quan36">狗 </a>
						<a href="#37" onclick="sx_sel(this,37);" id="quan37">猪 </a>
						<a href="#" onclick="gengduo();" id="gengduosel1" class="font_r">[更多] </a>
						<br>
						<div id="more_up"><br></div>
						<div style="display: none;" id="gengduosel">
							<a href="#44" onclick="sx_sel(this,44);" id="quan44">
								<font class="fontred">红</font>大
							</a>
							<a href="#45" onclick="sx_sel(this,45);" id="quan45">
								<font class="fontred">红</font>小
							</a>
							<a href="#46" onclick="sx_sel(this,46);" id="quan46">
								<font class="fontred">红</font>单
							</a>
							<a href="#47" onclick="sx_sel(this,47);" id="quan47">
								<font class="fontred">红</font>双
							</a>
							<br>
							<a href="#48" onclick="sx_sel(this,48);" id="quan48">
								<font class="fontblue">蓝</font>大
							</a>
							<a href="#49" onclick="sx_sel(this,49);" id="quan49">
								<font class="fontblue">蓝</font>小
							</a>
							<a href="#50" onclick="sx_sel(this,50);" id="quan50">
								<font class="fontblue">蓝</font>单
							</a>
							<a href="#51" onclick="sx_sel(this,51);" id="quan51">
								<font class="fontblue">蓝</font>双
							</a>
							<br>
							<a href="#52" onclick="sx_sel(this,52);" id="quan52">
								<font class="fontgreen">绿</font>大
							</a>
							<a href="#53" onclick="sx_sel(this,53);" id="quan53">
								<font class="fontgreen">绿</font>小
							</a>
							<a href="#54" onclick="sx_sel(this,54);" id="quan54">
								<font class="fontgreen">绿</font>单
							</a>
							<a href="#55" onclick="sx_sel(this,55);" id="quan55">
								<font class="fontgreen">绿</font>双
							</a>
						</div>
					</span>
				</td>
			</tr>
			<tr style="display:none;">
				<td colspan="2" class="tdpadding" align="center">
					<input name="numbers" type="hidden" value="" />
				</td>
			</tr>
			<tr>
				<td width="65" height="30" align="right" bgcolor="#FFFFFF">下注金额：</td>
				<td height="30" bgcolor="#FFFFFF" class="t_td_text">
				<input name="Num_1" type="text" id="Num_1" class="inp1" size="7"onKeyUp="value=value.replace(/[^\d\.\/]/ig,'');" />
				<input name="add" type="button" class="btn4" onClick="addform();" value="添加" />
				</td>
			</tr>
			<tr>
				<td colspan="2" bgcolor="#FFFFFF" align="center">
					<input type="button" value="10" onClick="AddMoneys(10)" class="btn4" />&nbsp;
					<input type="button" value="100" onClick="AddMoneys(100)" class="btn4" />&nbsp;
					<input type="button" value="500" onClick="AddMoneys(500)" class="btn4" />&nbsp;
					<input type="button" value="1K" onClick="AddMoneys(1000)" class="btn4" />&nbsp;
					<input type="button" value="清零" onClick="DiffMoneys()" class="btn4" />
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center" bgcolor="#FFFFFF">
					<input name="clear" type="button" class="btn2" onClick="clearforms();" value="清除" />&nbsp;
					<input type="submit" name="btnsave" value="下注" id="btnsave" class="btn1 submit1" />
				</td>
			</tr>
			<tr>
			<td height="30" colspan="2" align="center" bgcolor="#FFFFFF">
				<input type="button" name="btnClear" value="返回" id="btnClear" onClick="javascript:location.href='main.php?action=mem_left&uid=<?= $uid ?>'" class="btn2" />&nbsp;
			</td>
			</tr>
			<tr>
				<td colspan="2" >
					<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="1"  class="toptable1" id="tm1">
						<tr bgcolor="#ffffff" align="center">
							<td style="width: 22%;">类型</td>
							<td style="width: 25%;">内容</td>
							<td style="width: 40%;">金额</td>
							<td style="width: 40px;">操作</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td width="65" height="25" align="right" bgcolor="#FFFFFF">总下注额：</td>
				<td height="25" bgcolor="#FFFFFF" class="t_td_text" id="zxze">0 / 0 笔</td>
			</tr>
			<tr>
				<td width="65" height="25" align="right" bgcolor="#FFFFFF">最低限额：</td>
				<td height="25" bgcolor="#FFFFFF" class="t_td_text" id="zuidi"><?= $xy ?></td>
			</tr>
			<tr>
				<td width="65" height="25" align="right" bgcolor="#FFFFFF">单注限额：</td>
				<td height="25" bgcolor="#FFFFFF" class="t_td_text" id="danzhu"><?= $bl_xx ?></td>
			</tr>
			<tr>
				<td width="65" height="25" align="right" bgcolor="#FFFFFF">单项限额：</td>
				<td height="25" bgcolor="#FFFFFF" class="t_td_text" id="danxiang"><?= $bl_xxx ?></td>
			</tr>
			<tr>
				<td width="65" height="25" align="right" bgcolor="#FFFFFF">可用信用：</td>
				<td height="25" bgcolor="#FFFFFF" class="t_td_text" id="yiyong">￥<?= $ts ?></td>
			</tr>
			<tr bgcolor="#ffffff">
				<td>总下注额：</td>
				<td class="formsumk" id="zxze">0 / 0 笔</td>
			</tr>
		</tbody>
		</table>	
	</form>

