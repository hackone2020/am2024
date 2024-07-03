function $(id) {
    if (document.getElementById(id)) {
        return document.getElementById(id);
    } else {
        return document.getElementsByName(id).item(0);
    }
}
/////弹出退出窗口///////////////////////
function ops(str1,str2,str3)
{
window.open(str1,"_blank","toolbar=yes, location=yes, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=no, copyhistory=yes, width="+str3+", height="+str2);
}
//判断全选反选
function checksel(form){
	if (form.sele.checked == true)
		checkall(form,true);
	else
		checkall(form,false);
}
///////////////////全选/////////////////////////
function CheckAll(form)
{
	for (var i=0;i<form.elements.length;i++)
	{
		var e = form.elements[i];
//		if (e.name != 'chkall')
			e.checked = true// form.chkall.checked;
	}
}
///////////////////全部取消/////////////////////////
function checkall(form,str)
{
	for (var i=0;i<form.elements.length;i++)
	{
		var e = form.elements[i];
//		if (e.name != 'chkall')
			e.checked = str// form.chkall.checked;
	}
}
var timeoutProcess = "";
var mkurl = "";
function makeRequest(url)
{
	http_request = false; 
	if(window.XMLHttpRequest)
	{
		http_request = new XMLHttpRequest();
		if(http_request.overrideMimeType)
		{
			http_request.overrideMimeType('text/xml'); 
		} 
	}
	else if(window.ActiveXObject) 
	{
		try
		{
			http_request = new ActiveXObject("Msxml2.XMLHTTP"); 
		}
		catch (e)
		{
			try 
			{
				http_request = new ActiveXObject("Microsoft.XMLHTTP"); 
			} 
			catch (e)
			{ 
			}
		}
	}
	if( url != "no")
	{
		mkurl = url;
	}
	http_request.onreadystatechange = init;
	http_request.open('GET', mkurl, true);
	http_request.setRequestHeader("If-Modified-Since","0"); 
	http_request.send(null); 
	try
	{
		var Requesttime = autotime;
	}
	catch(err)
	{
		var Requesttime  = 45000;
	}
	timeoutProcess = setTimeout("makeRequest('"+mkurl+"')", Requesttime);
}
function sendCommand(commandName, pageURL, strPara) {
	var oBao;
	if(window.XMLHttpRequest)
	{
		oBao = new XMLHttpRequest();
		if(oBao.overrideMimeType)
		{
			oBao.overrideMimeType('text/xml'); 
		} 
	}
	else if(window.ActiveXObject) 
	{
		try
		{
			oBao = new ActiveXObject("Msxml2.XMLHTTP"); 
		}
		catch (e)
		{
			try 
			{
				oBao = new ActiveXObject("Microsoft.XMLHTTP"); 
			} 
			catch (e)
			{ 
			}
		}
	}
	oBao.open("GET",pageURL+"?commandName="+commandName+"&"+strPara,false);	
	oBao.send();
	var strResult = unescape(oBao.responseText);
	return strResult;
}
function close_win() {
	$("rs_window").style.display = "none";
}
function show_win(class3,sum_m,rate,ds,class1,class2) {
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
	$("ag1_c").innerHTML = class1+"-("+class2+"):"+class3;
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
var X = 0;
var Y = 0;
function mouseMove(ev) {
	ev = ev || window.event;
	var mousePos = mouseCoords(ev); 
	X = mousePos.x;  
	Y = mousePos.y;  
}   
function mouseCoords(ev) { 
if(ev.pageX || ev.pageY){  
return {x:ev.pageX, y:ev.pageY};  }  
return {  x:ev.clientX + document.body.scrollLeft - document.body.clientLeft,  y:ev.clientY + document.body.scrollTop - document.body.clientTop  }; 
}   
document.onmousemove = mouseMove;  
document.oncontextmenu=new Function('event.returnValue=false;');
document.onselectstart=new Function('event.returnValue=false;');