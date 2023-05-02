function append_user_id(user_id)
{
	var links = document.getElementsByTagName("a");
	for (var i=0; i<links.length; i++)
	{
		var link = links[i].getAttribute("href");
		var append;
		link.indexOf("?") > -1 ? append = "&" : append = "?";
		append += "user_id="+user_id;
		links[i].setAttribute("href", link+append);
	}		
}

function redirect(page)
{
	location.href = page;
}