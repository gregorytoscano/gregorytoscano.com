

/************************ CLOSE BUTTONS ***************************/

/************************ lARGE BUTTONS ***************************/
$(function(){
	$(".large-canvas-toggle, .exit-off-canvas").click(function(){
		$(".top-bar-large").toggleClass("top-bar-large-close");
		$(".middle-bar-large").toggleClass("middle-bar-large-close");
		$(".bottom-bar-large").toggleClass("bottom-bar-large-close");
	});
});

/*********************** MEDIUM BUTTONS ****************************/

$(function(){
	$(".medium-canvas-toggle, .exit-off-canvas").click(function(){
		$(".top-bar-medium").toggleClass("top-bar-medium-close");
		$(".middle-bar-medium").toggleClass("middle-bar-medium-close");
		$(".bottom-bar-medium").toggleClass("bottom-bar-medium-close");
	});
});

$(function(){
	$(".medium-spin-canvas-toggle, .exit-off-canvas").click(function(){
		$(".top-bar-medium-spin").toggleClass("top-bar-medium-spin-close");
		$(".middle-bar-medium-spin").toggleClass("middle-bar-medium-spin-close");
		$(".bottom-bar-medium-spin").toggleClass("bottom-bar-medium-spin-close");
	});
});

/*********************** SMALL BUTTONS *****************************/

$(function(){
	$(".small-canvas-toggle, .exit-off-canvas").click(function(){
		$(".top-bar-small").toggleClass("top-bar-small-close");
		$(".middle-bar-small").toggleClass("middle-bar-small-close");
		$(".bottom-bar-small").toggleClass("bottom-bar-small-close");
	});
});

$(function(){
		$("#showcode_html").hide();
		$("#showcode_css").hide();
		$("#showcode_js").hide();

	$(".xs-canvas-toggle, .exit-off-canvas").click(function(){
		$(".top-bar-xs").toggleClass("top-bar-xs-close");
		$(".middle-bar-xs").toggleClass("middle-bar-xs-close");
		$(".bottom-bar-xs").toggleClass("bottom-bar-xs-close");
	});

	$("#toggle_button").click(function(){
		$("#showcode_html").toggle();
		$("#showcode_css").toggle();
		$("#showcode_js").toggle();
	});
});
