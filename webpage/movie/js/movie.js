window.onload = function(){
	Button_Tree('Contents');
}
function Button_Tree(Div) {
	document.getElementById("Contents").style.display = 'none';
	document.getElementById("Actors").style.display = 'none';
	document.getElementById("Directors").style.display = 'none';
	document.getElementById(Div).style.display = "block";
}
