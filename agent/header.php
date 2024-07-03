<?
if (!defined('KK_VER')) {
	exit('无效的访问');
} 
// 文本过滤函数
function text_convert($string) { 
    $string=htmlspecialchars($string, ENT_QUOTES); 
    $string=str_replace("<","&lt;",$string); 
    $string=str_replace(">","&gt;",$string); 
    $string=str_replace( '"', '\\"',$string);
    $string=preg_replace("/\r?\n/", "\r\n",$string);
    return $string; 
} 
$a7 = text_convert(get_config("a7"));
?>
<link rel="stylesheet" href="/stylesheets/header.css?t=1683715146" type="text/css">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7">
<script src="/js/public/function.js" type="text/javascript"></script>
<!--<script src="js/function.js" type="text/javascript"></script>-->
<!--<script src="js/header.js" type="text/javascript"></script>-->
<script src="/js/admin/function.js" type="text/javascript"></script>
<script src="/js/admin/header.js?t=1683715146" type="text/javascript"></script>
<script src="/js/admin/device.min.js?t=1683715146" type="text/javascript"></script>
<script language="JavaScript">
    var uid = "<?=$uid?>";
    var vip = "<?=$vip?>";
    var autotime = 90000;
    var a7 = "<?=$a7?>";
    var now = new Date(1685436553930);
    var cookie = "dlOO26_QbpAQRVHlYK1zObJwEcYiy3Ob";
    gapTime = now.getTime() - new Date().getTime();
    
    function SelectLine(index) {
        if (index == 0) {
            return;
        }
        --index;
        if (index >= urlsToTest.length) {
            return window.location.replace(window.location.href);
        }
        parent.parent.location.replace("http://" + urlsToTest[index].replace(/\/$/, "") + "/setcookie/set/" + encodeURI(cookie) + "?uid=" + uid);
    }
function CurentTime(){
        var mm = now.getMinutes();
        var ss = now.getTime() % 60000;
        ss = (ss - (ss % 1000)) / 1000;
        var clock = now.getHours() +':';
        if(now.getHours() < 10) clock = '0' + clock;
        if(mm < 10) clock += '0';
        clock += mm+':';
        if(ss < 10) clock += '0';
        return(clock + ss);
    }
    function refresh(){
        if(Math.abs(now.getTime() - new Date().getTime() - gapTime) > 5000 && !isReadingFile) {
            isReadingFile = true;
            readfile("ajax?uid=ZUFft2n90i9n5i659ccOrmtn",false);
        }
        now.setSeconds(now.getSeconds() + 1);
        $("time_clock").innerHTML = CurentTime();
    }
    function load(){
        
        //getElementById("logo").focus();
    }       
                   
                mBut_1[0] = new Array('即时注单', 'main.php?action=list_all&uid=<?=$uid?>&vip=<?=$vip?>');
                
                mBut_1[1] = new Array('本期流水注单', 'main.php?action=real_list&uid=<?=$uid?>&vip=<?=$vip?>');
                
                mBut_1[2] = new Array('本期补货注单', 'main.php?action=real_list_wai&uid=<?=$uid?>&vip=<?=$vip?>');
                
                mBut_1[3] = new Array('走飞设置', 'main.php?action=list_set&uid=<?=$uid?>&vip=<?=$vip?>');
    
                mBut_2[0] = new Array('股东', 'main.php?action=user_guan_list&uid=<?=$uid?>&vip=<?=$vip?>');
    
                mBut_2[1] = new Array('总代理', 'main.php?action=user_zong_list&uid=<?=$uid?>&vip=<?=$vip?>');
    
                mBut_2[2] = new Array('代理', 'main.php?action=user_dai_list&uid=<?=$uid?>&vip=<?=$vip?>');
    
                mBut_2[3] = new Array('会员', 'main.php?action=user_mem_list&uid=<?=$uid?>&vip=<?=$vip?>');
    
                mBut_2[4] = new Array('直属会员', 'main.php?action=user_mem_zs_list&uid=<?=$uid?>&vip=<?=$vip?>');
    
                mBut_2[5] = new Array('子账号', 'main.php?action=user_zi&uid=<?=$uid?>&vip=<?=$vip?>');
    
                mBut_3[0] = new Array('账户信息', 'main.php?action=user&uid=<?=$uid?>&vip=<?=$vip?>');

                mBut_3[1] = new Array('修改密码', 'main.php?action=passwd&uid=<?=$uid?>&vip=<?=$vip?>');

                mBut_4[0] = new Array('报表查询', 'main.php?action=report&uid=<?=$uid?>&vip=<?=$vip?>');
    
                var url5 = 'main.php?action=web_kithe_list&uid=<?=$uid?>&vip=<?=$vip?>';
        
                var url6 = 'main.php?action=history&uid=<?=$uid?>&vip=<?=$vip?>';
        
                var url7 = 'main.php?action=logout&uid=<?=$uid?>&vip=<?=$vip?>';
        
</script>
</script>
<style>
    .logo{
       font-size: 25px;
       color: yellow;
       margin-left: 20px;
    }
</style>
<body onload="load()">
 <div id="main_id" class="main1">
     <div id="main_top_id" class="main_top1">
             <!--logo-->
         <div id="main_top_left_id" class="main_top_left1 floatleft">
             <img id="logo" src="/images/logo.png" width="480" height="82" alt="">
             <font style="position:absolute; z-index:1; left:6px; top:0px; height:82px;text-align:center;line-height:82px;" class="text-gradient"><b id="logo">&nbsp;兴盛</b></font>
         </div>
         <!--logo end-->
         <!--nav top-->     
          <div id="main_top_nav_id" class="main_top_nav1 floatright">
		    <a href="javascript:void(0);" onclick="go_menu(1);go_main(mBut_1[0][1]);">
			  <span class="s1"><img src="/images/9.png" width="36" height="36" alt=""></span>
                 <span class="s2">即时注单</span>
            </a>
             <a href="javascript:void(0);" onclick="go_menu(2);go_main(mBut_2[0][1]);">
                 <span class="s1"><img src="/images/2.png" width="36" height="36" alt=""></span>
                 <span class="s2">用户管理</span>
             </a>
             <a href="javascript:void(0);" onclick="go_menu(3);go_main(mBut_3[0][1]);">
                <span class="s1"><img src="/images/3.png" width="36" height="36" alt=""></span>
                 <span class="s2">个人管理</span>
             </a>
             <a href="javascript:void(0);" onclick="go_menu(4);go_main(mBut_4[0][1]);">
                  <span class="s1"><img src="/images/1.png" width="36" height="36" alt=""></span>
                 <span class="s2">报表查询</span>
             </a>
             <a href="javascript:void(0);" onclick="go_menu(5);">
                  <span class="s1"><img src="/images/6.png" width="36" height="36" alt=""></span>
                 <span class="s2">开奖管理</span>
             </a>
             <a href="javascript:void(0);" onclick="go_menu(6);">
                 <span class="s1"><img src="/images/7.png" width="36" height="36" alt=""></span>
                 <span class="s2">消息</span>
             </a>
             <a href="javascript:void(0);" onclick="go_menu(7);">
                 <span class="s1"><img src="/images/8.png" width="36" height="36" alt=""></span>
                 <span class="s2">退出</span>
             </a>
             <div class="clearfloat"></div>
         </div>
     </div>
   <div class="sub_nav1 floatleft" id="menu_lb"> &nbsp;&nbsp;&nbsp;</div>
     
     <div id="sub_nav_right_id" class="sub_nav_right1 floatright">
         <select onchange="SelectLine(this.selectedIndex)">
            <option>请选择线路:</option>
            <option>重新测速</option>
            </select>
            当前时间:<span id="time_clock">14:38:21</span>
            股东账号:
            <span>sg123</span>
     </div>
   
 </div>        
<script language="JavaScript">
   // readfile("ajax?uid=ZUFft2n90i9n5i659ccOrmtn",true);
    refresh();
    setInterval('refresh()',1000);
</script>
<script type="text/javascript">
    (function browserRedirect()
    {
        if (device.mobile())
        {
            document.getElementById("main_top_id").className = "main_top";
            document.getElementById("main_top_left_id").className = "main_top_left floatleft";
            document.getElementById("main_top_nav_id").className = "main_top_nav floatright";
            document.getElementById("sub_nav_right_id").className = "sub_nav_right floatright";
            document.getElementById("menu_lb").className = "sub_nav floatleft";
            document.getElementById("main_id").className = "main";
        }
    })()
</script>
<script>
var urlsToTest = [];
var currentIndex = -1;
</script>
<script type="text/javascript" src="/js/admin/testspeed.js?t=1683715146"></script>
<!--<SCRIPT language=javascript>makeRequest('main.php?action=online&uid=<?=$uid?>')</script>-->
<!--[if lte IE 6]>
<script type="text/javascript" src="/js/iepng.js?t=1683715146"></script>
<script language="javascript" type="text/javascript">
    correctPNG();
</script>
<![endif]-->
<SCRIPT language=javascript>makeRequest('main.php?action=online&uid=<?=$uid?>&vip=<?=$vip?>')</script>
</body>
</html>