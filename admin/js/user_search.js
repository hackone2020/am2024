//快速搜尋功能 

function showSearchDlg() {
	var obj_win = document.getElementById('searchDlg');
	obj_win.style.top = document.body.scrollTop+Y+15;
	obj_win.style.left = document.body.scrollLeft+X-100;
	obj_win.style.display = "block";

	var dlg_text = document.getElementById('dlg_text');
	dlg_text.focus();
}
function closeSearchDlg() {
	var obj_win = document.getElementById('searchDlg');
	obj_win.style.top = document.body.scrollTop+Y+15;
	obj_win.style.left = document.body.scrollLeft+X-20;
	obj_win.style.display = "none";
}
function submitSearchDlg() {
	var dlg_option = document.getElementById('dlg_option');
	var dlg_text = document.getElementById('dlg_text');
	document.myFORM.search.value = dlg_option.value;
	document.myFORM.key.value = dlg_text.value;
	document.myFORM.submit();
}