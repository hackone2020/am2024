function go_page(u,p) {
	if(u!= null && p!= null){
		u = u + "&page=" + p;
		window.location.href = u;
	}
}

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
		    var arrResult = result;	
			$("list_div").innerHTML = arrResult;
 
        } else {//http_request.status != 200
           
                return false;
       
        }
   
    }
 
}