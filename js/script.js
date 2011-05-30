var timer;
var second = 0;
var timelimit = 0;
var loaded = false;
$(document).ready(function(){

	//choose a random time limit
	randomtimelimit();
	
	//setting the time limit
	$("#drpTime").change(function(){
		if($(this).val() == "Random") {
			randomtimelimit();
		} else {
			timelimit = parseInt($(this).val());
		}
	});
	
	window.top.scrollTo(0, 1);
	$(".page").addClass("hidden");
	
	if(!window.navigator.standalone) {
		$("#install").removeClass("hidden");
	} else {
		$("#game").removeClass("hidden");
	}
	
	$("#btnPlayanyway").click(function(){
		$(".page").addClass("hidden");
		$("#game").removeClass("hidden");
	});
	$("#btnSettings").click(function(){
		if($("#drpCategory option").length == 0) { getcategories(); }
		$(".page").addClass("hidden");
		$("#settings").removeClass("hidden");
	});
	$("#btnSave").click(function(){
		$(".page").addClass("hidden");
		$("#game").removeClass("hidden");
	});
	
	$("#btnNext").click(function(){
		if($("#btnStart").hasClass("stop")) {
			newword();
		} else {
			$("#btnStart").click();
		}
	});
	
	$("#drpCategory").change(function(){
		$("#lblCategory").text("Category: "+$("#drpCategory option[value="+$("#drpCategory").val()+"]").text());
	});
	
	$("#btnStart").click(function(){
		if($(this).val() == "Start") {
			newword();
			$(this).addClass("stop");
			if(!loaded && $("#drpSound").val() != "none") {
				$("#medium")[0].play();
				$("#medium")[0].pause();
				$("#fast")[0].play();
				$("#fast")[0].pause();
				$("#buzzer")[0].play();
				$("#buzzer")[0].pause();
				loaded = true;
			}
			if($("#drpSound").val() != "none") {
				$("#slow")[0].play();
			}
			//start the game
			$(this).val("Stop");
			
			timer = setInterval(function(){
				second++;
				
				var third = parseInt(timelimit / 3);
				if(second == third) {
					if($("#drpSound").val() != "none") {
						$("#slow")[0].pause();
						$("#medium")[0].load();
						$("#medium")[0].play();
					}
				} else if(second == (parseInt(third*2))) {
					if($("#drpSound").val() != "none") {
						$("#medium")[0].pause();
						$("#fast")[0].load();
						$("#fast")[0].play();
					}
				} else if (second >= timelimit) {
					//buzz!
					if($("#drpSound").val() != "none") {
						$("#fast")[0].pause();
						$("#buzzer")[0].load();
						$("#buzzer")[0].play();
					} else {
						alert("Time's Up!");
					}
					$("#btnStart").click();
				}
			}, 1000);
		} else {
			$(this).removeClass("stop");
			if($("#drpSound").val() != "none") {
				$("#slow")[0].pause();
				$("#medium")[0].pause();
				$("#fast")[0].pause();
			}
			clearInterval(timer);
			second = 0;
			//stop the game
			$(this).val("Start");
			
		}
	});
	
	$("#btnTeam1").click(function(){
		addpoint(1);
	});
	$("#btnTeam2").click(function(){
		addpoint(2);
	});
	
	$("#drpSound").change(function(){
		if($(this).val() != 'none'){
			var theme = $(this).val();
			$("audio").each(function(){
				$(this).attr("src", "media/"+theme+"/"+$(this).attr("id")+".mp3");
			});
		}
	});
	
});

function addpoint(team){
	var score = parseInt($("#score"+team).text());
	score++;
	$("#score"+team).text(score);
	
	if(score == 10) {
		//game over!
		alert("Team "+team+" wins!");
		$("#score1").text("0");
		$("#score2").text("0");
	}
}

function randomtimelimit(){
	timelimit = Math.floor(Math.random()*5);
	switch(timelimit){
		case 0:
			timelimit = 30;
		break;
		case 1:
			timelimit = 60;
		break;
		case 2:
			timelimit = 90;
		break;
		case 3:
			timelimit = 120;
		break;
		case 4:
			timelimit = 150;
		break;
		case 5:
			timelimit = 180;
		break;
	}
}

function getcategories(){
	$.ajax({
		url: "words.php",
		dataType: 'json',
		success: function(msg){
			$("#drpCategory option").remove();
			$.each(msg, function(k, v) {
				$("#drpCategory").append("<option value='"+k+"'>"+v+"</option>");
			});
		}
	});
}

function newword(){
	$.ajax({
		url: "words.php",
		data: "q="+$("#drpCategory").val(),
		type: 'post',
		success: function(msg){
			if(msg != $("#theword").text()){
				$("#theword").text(msg);
			} else {
				newword();
			}
		}
	});
}	