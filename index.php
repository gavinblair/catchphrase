<!doctype html>
<!-- Conditional comment for mobile ie7 http://blogs.msdn.com/b/iemobile/ -->
<!-- Appcache Facts http://appcachefacts.info/ -->
<!--[if IEMobile 7 ]>    <html class="no-js iem7" manifest="default.appcache?v=1"> <![endif]-->
<!--[if (gt IEMobile 7)|!(IEMobile)]><!--> <html class="no-js" manifest="default.appcache?v=1"> <!--<![endif]-->

<head>
  <meta charset="utf-8">

  <title>Catch Phrase</title>
  <meta name="description" content="">
  <meta name="author" content="">
  
  <!-- Mobile viewport optimization http://goo.gl/b9SaQ -->
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  
  <meta name="apple-touch-fullscreen" content="yes" />
  
  <!-- Home screen icon  Mathias Bynens http://goo.gl/6nVq0 -->
  <!-- For iPhone 4 with high-resolution Retina display: -->
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/h/apple-touch-icon.png">
  <!-- For first-generation iPad: -->
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/m/apple-touch-icon.png">
  <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
  <link rel="apple-touch-icon-precomposed" href="img/l/apple-touch-icon-precomposed.png">
  <!-- For nokia devices: -->
  <link rel="shortcut icon" href="img/l/apple-touch-icon.png">
  
  <!--iOS web app, deletable if not needed -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <link rel="apple-touch-startup-image" href="img/l/splash.png">
  
  <!-- Mobile IE allows us to activate ClearType technology for smoothing fonts for easy reading -->
  <meta http-equiv="cleartype" content="on">
	
	<!-- more tags for your 'head' to consider https://gist.github.com/849231 -->
  
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css?v=1">
 
  <!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
  <script src="js/libs/modernizr-custom.js"></script>

</head>

<body>

  <div id="container">
      
    <div class="page hidden" id="install">
		<h1>Catch Phrase</h1>
		Please install this game to your homescreen before playing.
		<input type="button" id="btnPlayanyway" value="Play Anyway" />
	</div>
	<div class="page hidden"	id="game">
		<h1>Catch Phrase</h1>
		<input type="button" id="btnStart" value="Start" />
		<div id="theword">Press Start</div>
		<div id="lblCategory">Category: Everything</div>
		<input type="button" id="btnNext" value="Next" />
		<input type="button" id="btnTeam1" value="Team 1" />
		<input type="button" id="btnTeam2" value="Team 2" />
		<label for="btnTeam1" id="score1">0</label>
		<label for="btnTeam2" id="score2">0</label>
		<input type="button" id="btnSettings" value="Settings" />
	</div>
	<div id="settings" class="page hidden">
		<h1>Settings</h1>
		<label for="drpCategory">Category</label>
		<select id="drpCategory">
		</select>
		<label for="drpTime">Time Limit</label>
		<select id="drpTime">
			<option>Random</option>
			<!--option value="15">/**/15 Seconds</option-->
			<option value="30">30 Seconds</option>
			<option value="60">1 Minute</option>
			<option value="90">1 Minute 30 Seconds</option>
			<option value="120">2 Minutes</option>
			<option value="150">2 Minutes 30 Seconds</option>
			<option value="180">3 Minutes</option>
		</select>
		<label for="drpSound">Sound</label>
		<select id="drpSound">
			<option value="clock">Clock Ticks</option>
			<option value="none">Silence</option>
		</select>
		<input type="button" id="btnSave" value="Done" />
	</div>
	
  </div> <!--! end of #container -->
	<audio src="media/clock/slow.mp3" id="slow" onended="this.play();" preload="auto" autobuffer></audio>
	<audio src="media/clock/medium.mp3" id="medium" onended="this.play();" preload="auto" autobuffer></audio>
	<audio src="media/clock/fast.mp3" id="fast" onended="this.play();" preload="auto" autobuffer></audio>
	<audio src="media/clock/buzzer.mp3" id="buzzer" preload="auto" autobuffer></audio>

  <!-- JavaScript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if necessary -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
  <script>window.jQuery || document.write("<script src='js/libs/jquery-1.5.1.min.js'>\x3C/script>")</script>
  
  <!-- scripts concatenated and minified via ant build script -->
  <script src="js/mylibs/helper.js"></script>
  <!-- end concatenated and minified scripts-->
  <script src="js/script.js"></script>
  <script>
    // iPhone Scale Bug Fix, read this when using http://www.blog.highub.com/mobile-2/a-fix-for-iphone-viewport-scale-bug/
    MBP.scaleFix();
    
    // Media Queries Polyfill https://github.com/shichuan/mobile-html5-boilerplate/wiki/Media-Queries-Polyfill
    yepnope({
      test : Modernizr.mq('(min-width)'),
      nope : ['js/libs/respond.min.js']
    });
  </script>
  
  <!-- Debugger - remove for production -->
  <!-- <script src="https://getfirebug.com/firebug-lite.js"></script> -->
  
  <!-- mathiasbynens.be/notes/async-analytics-snippet Change UA-XXXXX-X to be your site's ID -->
  <script>
    var _gaq=[["_setAccount","UA-XXXXX-X"],["_trackPageview"]];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
    g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
    s.parentNode.insertBefore(g,s)}(document,"script"));
  </script>

</body>
</html>
