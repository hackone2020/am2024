function init() {
 
    if (http_request.readyState == 4) {
   
        if (http_request.status == 0 || http_request.status == 200) {
       
            var result = http_request.responseText;
           
            if(result==""){
           
                result = "Access failure ";
           
            }
           
		    var arrResult = result.split("###");	
			for(var i=0;i<49;i++)
			{	   
				arrTmp = arrResult[i].split("@@@");
				num1 = arrTmp[0]; //字段num1的值
				num2 = arrTmp[1]; //字段num2的值
				num3 = arrTmp[2]; //字段num1的值
				num4 = arrTmp[3]; //字段num2的值
				var bl;
				bl="bl"+i;
				$(bl).innerHTML= num2;
				
				var gold;
				gold="gold"+i;
				$(gold).innerHTML= "<font color=ff6600>"+num4+"</font>";
			}
           
        } else {//http_request.status != 200
           
                return false;
       
        }
   
    }
 
}
function UpdateRate(commandName,inputID,cellID,strPara)
{
	//功能：将strPara参数串发送给rake_update页面，并将返回结果回传
	//传入参数：	inputID,cellID:要显示返回数据的页面控件名
	//		strPara，包含发送给rake_update页面的参数
	//class1:类别1
	//ids:(即class2)标记不中为特A或特B；qtqt:调整幅度；lxlx调整方向，1为加，否则为减
	//class3:调整的类别
	switch(commandName)
	{
		case "MODIFYRATE":	//更新赔率
			{
				var strResult = sendCommand(commandName,"rake_update.php",strPara);
				
				if (strResult!="")
				{
					clearTimeout(timeoutProcess);
					makeRequest("no");
					$(inputID).value=strResult;
					
				}
				break;
			}
		case "LOCK":		//关闭项目
			{


				var strResult=sendCommand(commandName,"rake_update.php",strPara);
				

				if (strResult!="")
				
				{
					if(strResult=='1')					
						$(inputID).checked=true;
					else
						$(inputID).checked=false;
				}else{
				
				
					$(inputID).checked=!$(inputID).checked;
				}
				break;
			}
		default:	//其它情况
	}
}