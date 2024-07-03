function init() {
 
    if (http_request.readyState == 4) {
   
        if (http_request.status == 0 || http_request.status == 200) {
			severtime= new Date(http_request.getResponseHeader("Date")); 
	        dq_time  = severtime;
			lj_time  = 1;
            var result = http_request.responseText;
            if(result==""){
           
                result = "Access failure ";
           
            }
		    var arrResult = result.split("###");	
		    RemoveRow(); //删除以前的数据.
		    for(var i=0;i<arrResult.length-1;i++)
            {
				arrTmp = arrResult[i].split("@@@");
				num2 = ""+arrTmp[0]+""; //字段num2的值
				if (i==(arrResult.length-2)){
					num2="<font class=font_bold>总计</font>"
					num1 = "&nbsp;";
				}else{
					num1 = ""+(i+1)+""; //字段num1的值
				}
				num3 = ""+arrTmp[1]+""; //字段num3的值
				num4 = ""+arrTmp[2]+""; //字段num4的值
				num5 = ""+arrTmp[3]+""; //字段num5的值
				num6 = ""+arrTmp[4]+""; //字段num6的值
				row1 = document.getElementById("tb1").insertRow(document.getElementById("tb1").rows.length);
				row1.bgColor='#FFFFFF'
				row1.align='center'
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