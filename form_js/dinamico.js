function cual(x)
{
	var tr=x.getElementsByTagName('th');
	var url = tr[0].innerText;
	
	x.style.background = "#000";
	
	var btn = document.getElementById('eliminar');
	
	btn.href="http://www."+url+".com";
	
	alert(btn.href);
	
}