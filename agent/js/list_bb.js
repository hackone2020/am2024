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
				num2 = "<strong><center>"+arrTmp[2]+"</center></strong>"; //字段num2的值
				if (i==(arrResult.length-2)){
					num2="<center><font color=ff0000>总计</font></center>"
					num1 = "<center>&nbsp;</center>";
				}else{
					num1 = "<strong><center>"+arrTmp[0]+"</center></strong>"; //字段num1的值
				}
				num3 = "<center>"+arrTmp[3]+"</center>"; //字段num3的值
				//下注金额
				if ( i!=(arrResult.length-2) && arrTmp[4] != "" && arrTmp[4] != 0 )
				{
					var strtmp = "look.html?action=list_look&uid="+uid+"&vip="+vip+"&kithe="+kithe+"&class1="+ids+"&class3="+arrTmp[1];
				    num4 = "<center><button class=btn1 onmouseover=this.className='btn2';return true; onMouseOut=this.className='btn1';return true; onClick=ops('"+strtmp+"',400,750) >"+arrTmp[4]+"</button></center>"; //字段num4的值
				}else{
				    num4 = "<center>"+arrTmp[4]+"</center>"; //字段num4的值
				}
				num5 = "<center>"+arrTmp[5]+"</center>"; //字段num5的值
				//提示走飞
				if ( kithe == kithe_num && pz_of == 0 && vip == 0 )
				{
				    num6 = "<center>"+arrTmp[6]+"</center>"; //字段num6的值
				}else{
				    num6 = "<center>&nbsp;</center>"; //字段num6的值
				}
				//走飞金额
				if ( i!=(arrResult.length-2) && arrTmp[7] != "" && arrTmp[7] != 0 )
				{
					var strtmp = "look.html?action=list_look&uid="+uid+"&vip="+vip+"&kithe="+kithe+"&lx="+lx+"&class1="+ids+"&class3="+arrTmp[1];
				    num7 = "<center><button class=btn1 onmouseover=this.className='btn2';return true; onMouseOut=this.className='btn1';return true; onClick=ops('"+strtmp+"',400,750) >"+arrTmp[7]+"</button></center>"; //字段num8的值
				}else{
				    num7 = "<center>"+arrTmp[7]+"</center>"; //字段num7的值
				}
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
				cell7 = row1.insertCell(6);
				cell7.innerHTML = num7;
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