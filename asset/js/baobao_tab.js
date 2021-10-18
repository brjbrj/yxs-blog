var tabs = document.getElementById("baobao-tab").getElementsByClassName("baobao-tabspan");
// 获取所有的div标签组
var cts = document.getElementById("baobao-tab").getElementsByClassName("baobao-tabdiv");
function changeTab(current) {
	for(i = 0; i < tabs.length; i++) {
		if(tabs[i] == current) {
			tabs[i].className = "baobao-tab";
			cts[i].className = "baobao-content";
		} else {
			tabs[i].className = "";
			cts[i].className = "";
		}
	}
}