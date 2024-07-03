//封盘倒计时
function daojishi() {
		window.setTimeout("daojishi()", 1000);
		BirthDay   = new Date(fp_time);
		today      = new Date(dq_time);
		timeold    = (BirthDay.getTime() - today.getTime())-lj_time*1000;
		sectimeold = (timeold / 1000);
		secondsold = Math.floor(sectimeold);
		msPerDay = 24 * 60 * 60 * 1000;
	    e_daysold = timeold / msPerDay;
	    daysold = Math.floor(e_daysold);
		e_hrsold = (e_daysold - daysold) * 24;
		hrsold = Math.floor(e_hrsold);
		e_minsold = (e_hrsold - hrsold) * 60;
		minsold = Math.floor((e_hrsold - hrsold) * 60);
		seconds = Math.floor((e_minsold - minsold) * 60);
		today1 = today.getHours();
		if (daysold < 0){
			daysold = 0;
			hrsold  = 0;
			minsold = 0;
			seconds = 0;
		}
		if (daysold > 0){
			$("daojishi").innerHTML = daysold + "天" + hrsold + "小时" + minsold + "分" + seconds + "秒";
		} else if (hrsold > 0) {
			$("daojishi").innerHTML = hrsold + "小时" + minsold + "分" + seconds + "秒";
		} else if (minsold > 0) {
			$("daojishi").innerHTML = minsold + "分" + seconds + "秒";
		} else {
			if (seconds == 0){
			    $("daojishi").innerHTML = "<font color=\"ff0000\">已封盘</font>";
				kithe_num = 1;
			}else{
			    $("daojishi").innerHTML = seconds + "秒";
			}
		}
		lj_time   = lj_time+1;
}
daojishi();