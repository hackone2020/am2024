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
			if ( arrTmp != "0")
			{
				window.open('index.php','_top');
				return false;
			}
			if ( num1 != a7 && num1 != "")
			{
				alert(num1);
				a7 = num1;
			}

        } else {//http_request.status != 200
           
                return false;
       
        }
   
    }
 
}
window.onbeforeunload = function(){    
   if(((event.clientX > document.body.clientWidth - 43) && (event.clientY < 23)) || event.altKey) {
		xmlFile("main.php?action=logout&uid="+uid+"&vip="+vip);
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
document.oncontextmenu=new Function('event.returnValue=false;');
document.onselectstart=new Function('event.returnValue=false;');