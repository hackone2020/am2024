function init() {
    if (http_request.readyState == 4) {
        if (http_request.status == 0 || http_request.status == 200){
            var result = http_request.responseText;
            if(result==""){
                result = "Access failure ";
            }
		    var arrResult = result.split("###");	
		    RemoveRow(); //删除以前的数据.
		    for(var i=0;i<arrResult.length-1;i++){
				arrTmp = arrResult[i].split("@@@");
				if (i==(arrResult.length-2)){
					num1="<center><font color=ff0000>总计</font></center>"
				}else{
					num1 = "<strong><center>"+arrTmp[0]+"</center></strong>"; //字段num1的值
				}
				num2 = "<center>"+arrTmp[2]+"</center>"; //字段num2的值
				//下注金额
				if ( i!=(arrResult.length-2) && arrTmp[3] != "" && arrTmp[3] != 0 ){
					var strtmp = "look.html?action=list_look&uid="+uid+"&vip="+vip+"&kithe="+kithe+"&class1="+ids+"&class2="+arrTmp[1];
				    num3 = "<center><button class=btn1 onmouseover=this.className='btn2';return true; onMouseOut=this.className='btn1';return true; onClick=ops('"+strtmp+"',400,750) >"+arrTmp[3]+"</button></center>"; //字段num3的值
				}else{
				    num3 = "<center>"+arrTmp[3]+"</center>"; //字段num3的值
				}
				num4 = "<center>"+arrTmp[4]+"</center>"; //字段num4的值
				//走飞金额
				if ( i!=(arrResult.length-2) && arrTmp[5] != "" && arrTmp[5] != 0 ){
					var strtmp = "look.html?action=list_look&uid="+uid+"&vip="+vip+"&kithe="+kithe+"&lx="+lx+"&class1="+ids+"&class2="+arrTmp[1];
				    num5 = "<center><button class=btn1 onmouseover=this.className='btn2';return true; onMouseOut=this.className='btn1';return true; onClick=ops('"+strtmp+"',400,750) >"+arrTmp[5]+"</button></center>"; //字段num5的值
				}else{
				    num5 = "<center>"+arrTmp[5]+"</center>"; //字段num5的值
				}
				num6 = "<center>"+arrTmp[6]+"</center>"; //字段num6的值
				row1 = document.getElementById("tb1").insertRow(document.getElementById("tb1").rows.length);
				row1.bgColor='#FFFFFF';
				row1.height="28px";
				cell1 = row1.insertCell(0);
				cell1.innerHTML = num1;
				cell2 = row1.insertCell(1);
				cell2.innerHTML = num2;
				cell3 = row1.insertCell(2);
				cell3.innerHTML = num3;
				cell4 = row1.insertCell(3);
				cell4.innerHTML = num4;
				cell5 = row1.insertCell(4);
				cell5.innerHTML = num5;
				cell6 = row1.insertCell(5);
				cell6.innerHTML = num6;
            }
			if ( url != ""){
				var str1 =  sendCommand("",url+"&","");
				$("list_div").innerHTML = str1;
			}
        } else {//http_request.status != 200
                return false;
        }
    }
}
function RemoveRow()
{
	//保留第一行表头,其余数据均删除.
	var iRows = document.getElementById("tb1").rows.length;
	for(var i=0;i<iRows-1;i++)
	{
		document.getElementById("tb1").deleteRow(1);
	}
}
var url;
function show_lm(c2){
	if(c2=='')	{
		return false;
	}else{
		var str0 = 'main.php?action=list_wsl_show&uid='+uid+'&vip='+vip+'&class2='+c2+'&abcd='+abcd+'&zc='+zc+'&kithe='+kithe+"&";
	    var str1 =  sendCommand("",str0,"");
		url      = 'main.php?action=list_wsl_show&uid='+uid+'&vip='+vip+'&class2='+c2+'&abcd='+abcd+'&zc='+zc+'&kithe='+kithe;
		$("list_div").innerHTML = str1;
	}
}
function show_lm_win() {
	$("lm_window").style.display = "block";
}
function go_page(u,p) {
	if(u!= null && p!= null){
		u = u + "&page=" + p +"&";
		var str1 =  sendCommand("",u,"");
		$("list_div").innerHTML = str1;
	}
}
function show_win_lm(class3,zs,sum_m,rate,ds,class1,class2) {
	var number_array = class2.split(",");
	var c3_array     = class3.split(",");
	var number_count = number_array.length-1;
	var showhtml     = class1+"-"+class2+"<br>";
	showhtml         = showhtml+class3+"<br><font color='blue'>"+"共"+zs+"组</font>";
	if ( vip != '0'){
		alert("对不起，子账号不允许走飞!");
		return false;
	}
	if ( kithe_num == '1'){
		alert("该项目已经封盘!");
		return false;
	}
	if ( pz_of == '1'){
		alert("您没有走飞功能或者账户为暂停投注状态!");
		return false;
	}
	$("ag_count0").innerHTML =kithe_num;
	$("ag_count1").innerHTML =ds;
	$("ag_count2").innerHTML =rate;
	$("ag1_c").innerHTML = showhtml;
	document.form1.sum_m.value =sum_m;
	document.form1.rate.value =rate;
	document.form1.ds.value   =ds;
	document.form1.class1.value =class1;
	document.form1.class3.value =class3;
	document.form1.class2.value =class2;
	$("rs_window").style.top =Y;
	$("rs_window").style.left=X;
	$("rs_window").style.display = "block";
}