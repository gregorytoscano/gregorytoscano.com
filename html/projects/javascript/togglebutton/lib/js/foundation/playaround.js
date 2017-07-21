var arr = new Array();

function display()
{
	var numberGiven = document.getElementById("number").value;
	for(var i=0; i < numberGiven; i++)
	{
		for(var j= 0; j < 4; j++)
		{
			
		}
		arr[i] = "|";
	}
	document.getElementById("results").innerHTML = arr.join("");
}
