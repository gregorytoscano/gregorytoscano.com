var arr = new Array();
var wallet = 0;

play();


function play()
{
	checkMoney();
}


function checkMoney()
{
	if(wallet !== 0)
	{
		match_numbers();
	}
	else
	{
		document.getElementById("wincheck").innerHTML = "<div class='alert fresh-color alert-danger'>" + 
														"Insufficient Funds." + "<br />" + "Please add more money." +
														"</div>";
	}
}

function addMoney()
{
	wallet = wallet + 5;
	document.getElementById("wallet").innerHTML = wallet;
}

function randomizer()
{
	for(var i = 0; i < 7; i++)
	{
		arr[i] = Math.floor((Math.random() * 20) + 1);
	}
	document.getElementById("winningNumber").innerHTML = arr[0];
	document.getElementById("num1").innerHTML = arr[1];
	document.getElementById("num2").innerHTML = arr[2];
	document.getElementById("num3").innerHTML = arr[3];
	document.getElementById("num4").innerHTML = arr[4];
	document.getElementById("num5").innerHTML = arr[5];
	document.getElementById("num6").innerHTML = arr[6];
}

function match_numbers()
{
	wallet = wallet - 1;
	
	randomizer();
	var win = arr[0];
	/************ JackPot *******************/
	if(win === arr[1] && win === arr[2] && win === arr[3] && win === arr[4] && win === arr[5] && win === arr[6])
	{
		document.getElementById("wincheck").innerHTML = "<div class='alert fresh-color alert-success'>" +
														"JACKPOT!!!" + "<br />" +  "ALL Numbers Match" + 
														"<br />" + "$10,000 added to wallet"
														"</div>";
		wallet = wallet + 10000;
	}

	/************ 5 NUMBERS CORRECT *******************/
	else if(win === arr[1] && win === arr[2] && win === arr[3] && win === arr[4] && win === arr[5] ||
			win === arr[1] && win === arr[2] && win === arr[3] && win === arr[4] && win === arr[6] ||
			win === arr[1] && win === arr[2] && win === arr[3] && win === arr[5] && win === arr[6] ||
			win === arr[1] && win === arr[2] && win === arr[4] && win === arr[5] && win === arr[6] ||
			win === arr[1] && win === arr[3] && win === arr[4] && win === arr[5] && win === arr[6] ||
			win === arr[2] && win === arr[3] && win === arr[4] && win === arr[5] && win === arr[6] )
	{
		document.getElementById("wincheck").innerHTML = "<div class='alert fresh-color alert-success'>" +
														"You are a winner!!" + "<br />" +  "5 Numbers Match" +
														"<br />" + "$1,000 added to wallet"
														"</div>";
		wallet = wallet + 1000;
	}
	/************ 4 NUMBERS CORRECT *******************/
	else if(win === arr[1] && win === arr[2] && win === arr[3] && win === arr[4]  || /** 1 2 3 4**/
			win === arr[1] && win === arr[2] && win === arr[3] && win === arr[5]  || /** 1 2 3 5**/
			win === arr[1] && win === arr[2] && win === arr[3] && win === arr[6]  || /** 1 2 3 6**/
			win === arr[1] && win === arr[2] && win === arr[4] && win === arr[5]  || /** 1 2 4 5**/
			win === arr[1] && win === arr[2] && win === arr[4] && win === arr[6]  || /** 1 2 4 6**/
			win === arr[1] && win === arr[3] && win === arr[4] && win === arr[5]  || /** 1 3 4 5**/
			win === arr[1] && win === arr[3] && win === arr[4] && win === arr[6]  || /** 1 3 4 6**/
			win === arr[2] && win === arr[3] && win === arr[4] && win === arr[5]  || /** 2 3 4 5**/
			win === arr[2] && win === arr[3] && win === arr[4] && win === arr[6]  )  /** 2 3 4 6**/
	{
		document.getElementById("wincheck").innerHTML = "<div class='alert fresh-color alert-success'>" +
														"You are a winner!!" + "<br />" +  "4 Numbers Match" +
														"<br />" + "$100 added to wallet"
														"</div>";
		wallet = wallet + 100;
	}
	/************ 3 NUMBERS CORRECT *******************/
	else if(win === arr[1] && win === arr[2] && win === arr[3] ||  
			win === arr[1] && win === arr[2] && win === arr[4] ||  
			win === arr[1] && win === arr[2] && win === arr[5] ||  
			win === arr[1] && win === arr[2] && win === arr[6] ||  
			win === arr[1] && win === arr[3] && win === arr[4] ||
			win === arr[1] && win === arr[3] && win === arr[5] ||
			win === arr[1] && win === arr[3] && win === arr[6] ||
			win === arr[2] && win === arr[3] && win === arr[4] ||
			win === arr[2] && win === arr[3] && win === arr[5] ||
			win === arr[2] && win === arr[3] && win === arr[6] ||
			win === arr[3] && win === arr[4] && win === arr[5] ||
			win === arr[3] && win === arr[4] && win === arr[6] || 
			win === arr[4] && win === arr[5] && win === arr[6] )  
	{
		document.getElementById("wincheck").innerHTML = "<div class='alert fresh-color alert-success'>" +
														"You are a winner!!" + "<br />" +  "3 Numbers Match" +
														"<br />" + "$50 added to wallet"
														"</div>";
		wallet = wallet + 50;
	}
	/************ 2 NUMBERS CORRECT *******************/
	else if(win === arr[1] && win === arr[2] ||
			win === arr[1] && win === arr[3] ||
			win === arr[1] && win === arr[4] ||
			win === arr[1] && win === arr[5] ||
			win === arr[1] && win === arr[6] ||
			win === arr[2] && win === arr[3] ||
			win === arr[2] && win === arr[4] ||
			win === arr[2] && win === arr[5] ||
			win === arr[2] && win === arr[6] ||
			win === arr[3] && win === arr[4] ||
			win === arr[3] && win === arr[5] ||
			win === arr[3] && win === arr[6] ||
			win === arr[4] && win === arr[5] ||
			win === arr[4] && win === arr[6] ||
			win === arr[5] && win === arr[6] )  
	{
		document.getElementById("wincheck").innerHTML = "<div class='alert fresh-color alert-success'>" +
														"You are a winner!!" + "<br />" +  "2 Numbers Match" +
														"<br />" + "$10 added to wallet"
														"</div>";
		wallet = wallet + 10;
	}
	/************ 1 NUMBER CORRECT ********************/
	else if(win === arr[1] || win === arr[2] || win === arr[3] || win === arr[4] || win === arr[5] || win === arr[6])
	{
		document.getElementById("wincheck").innerHTML = "<div class='alert fresh-color alert-success'>" +
														"You are a winner!!" + "<br />" +  "1 Number Matches" +
														"<br />" + "$1 added to wallet"
														"</div>";
		wallet = wallet + 1;
	}
	else
	{
		document.getElementById("wincheck").innerHTML = "<div class='alert fresh-color alert-danger'>" +
														"You are a loser!!" + "<br />" +  "No Numbers Match" +
														"<br />" + "$1 taken from wallet"
														"</div>";
	}
	document.getElementById("wallet").innerHTML = wallet;
}