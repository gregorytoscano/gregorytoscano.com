var tails = 0;
var heads = 0;
var clicks = 0;
var hpercent = 0;
var tpercent = 0;

function clicked()
{
	clicks += 1;
    document.getElementById("seq").innerHTML = clicks;
}

function toss() {
    clicked();
    var rows = 0;
    document.getElementById("results").innerHTML = "";
    while (rows < 1) {   
       var arr = new Array();
        for (var i = 0; i < 1; i++) 
		{       
            var val = Math.floor( Math.random() * 2 );
            if (val === 1) {
                arr[i] = imageHeads("images/heads.jpg");
				heads = heads + 1;
                hpercent = Math.floor((heads/clicks) * 100);
                tpercent =  100 - hpercent;
				checkHeads();
            } else {
                arr[i] = imageTails("images/tails.jpg");
				tails = tails + 1;
                tpercent = Math.floor((tails/clicks) * 100);
                hpercent = 100 - tpercent;
				checkTails();
            }       
        }
        document.getElementById("results").innerHTML += "<br />" + arr;
        delete arr;
        rows++;
    }
}

function checkHeads()
{
	document.getElementById("headsDisplay").innerHTML = heads;
    document.getElementById("heads_Percent_Display").innerHTML = hpercent;
    document.getElementById("tails_Percent_Display").innerHTML = tpercent;
}

function checkTails()
{
	document.getElementById("tailsDisplay").innerHTML = tails;
    document.getElementById("heads_Percent_Display").innerHTML = hpercent;
    document.getElementById("tails_Percent_Display").innerHTML = tpercent;
}


function imageHeads(src) {
    var img = document.createElement("img");
    img.src = src;

    // This next line will just add it to the <body> tag
    document.getElementById('results').appendChild(img);

}

function imageTails(src) {
    var img = document.createElement("img");
    img.src = src;

    // This next line will just add it to the <body> tag
    document.getElementById('results').appendChild(img);
	
}