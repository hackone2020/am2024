function init() {
 
    if (http_request.readyState == 4) {
   
        if (http_request.status == 0 || http_request.status == 200) {
       
            var result = http_request.responseText;

            if(result==""){
           
                result = "Access failure ";
           
            }
		    var arrResult = result.split("###");
			if( arrResult[0] != null && arrResult[1] == null){
				window.open('index.php','_top');
				return false;
			}
			arrTmp = arrResult[1];	
			num1   = arrResult[2];
			num2   = arrResult[3];
			num3   = arrResult[4];
			num4   = arrResult[5];
			if ( arrTmp != "0")
			{
				//alert(arrTmp);
				window.open('index.php','_top');
				return false;
			}
			$("num_1").innerHTML = num1;
			var str1;
			if (num2 == '1'){
				str1 = "总盘口：<font color=\"#ffff00\">开盘中</font>";
			}else{
				str1 = "总盘口：封盘中";
			}
			if (num3 == '1'){
				str1 += "&nbsp;&nbsp;特码：<font color=\"#ffff00\">开盘中</font>";
			}else{
				str1 += "&nbsp;&nbsp;特码：封盘中";
			}
			if (num4 == '1'){
				str1 += "&nbsp;&nbsp;正码：<font color=\"#ffff00\">开盘中</font>";
			}else{
				str1 += "&nbsp;&nbsp;正码：封盘中";
			}
            $("num_2").innerHTML = str1;
        } else {//http_request.status != 200
           
                return false;
       
        }
   
    }
 
}
window.onbeforeunload = function(){    
   if(((event.clientX > document.body.clientWidth - 43) && (event.clientY < 23)) || event.altKey) {
		xmlFile("main.php?action=logout&uid="+uid);
   }
} 
function xmlFile(pageURL) {
	var xmlDoc;
	if(window.XMLHttpRequest)
	{
		xmlDoc = new XMLHttpRequest();
		if(xmlDoc.overrideMimeType)
		{
			xmlDoc.overrideMimeType('text/xml'); 
		} 
	}
	else if(window.ActiveXObject) 
	{
		try
		{
			xmlDoc = new ActiveXObject("Msxml2.XMLHTTP"); 
		}
		catch (e)
		{
			try 
			{
				xmlDoc = new ActiveXObject("Microsoft.XMLHTTP"); 
			} 
			catch (e)
			{ 
			}
		}
	}
	xmlDoc.open("GET",pageURL,false);	
	xmlDoc.setRequestHeader("If-Modified-Since","0"); 
	xmlDoc.send(null);
	var strResult = unescape(xmlDoc.responseText);
	return strResult;
}