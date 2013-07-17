<!DOCTYPE HTML>

<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1"><![endif]-->
<!--[if lt IE 7 ]><html class="no-js ie6" lang="en"><![endif]-->
<!--[if IE 7 ]><html class="no-js ie7" lang="en"><![endif]-->
<!--[if IE 8 ]><html class="no-js ie8" lang="en"><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!-->
<html class="no-js" lang="en"><!--<![endif]-->

<head>
	<meta charset="UTF-8">
	<title>MixDown ~ A Better sort tool for SoundCloud</title>

	<!-- If JS is available, changes <html> class to js -->
	<script>
		var docElement = document.documentElement;
		docElement.className = docElement.className.replace(/\bno-js\b/,'') + ' js';
	</script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

	<script src="http://connect.soundcloud.com/sdk.js"></script>

	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, target-densitydpi=160dpi, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="css/style.css" media="all">
	<link href="webfonts/ss-standard.css" rel="stylesheet" /> <!-- <3 symbolset -->
	<link rel="icon" type="image/png" href="favicon.png" />

</head>
<body>
	<div class="container">
	<h1><img src="img/mixdown-white.png" alt="MixDown" /></h1>

	<form class="search" name="searchfield" id="searchform">
		<label class="ss-icon">Search</label>
		<input type="text" name="search" id="search" />
		<img id="spinner" src="css/spinner.gif" alt="Loading&hellip;" title="Loading results&hellip;" />
	</form>
	
	<div id="sc" class="sccontent">

	</div>
</div>

	<footer>
		<p>Another lab project from <a href="http://mrqwest.co.uk" title="MrQwest - A Croydon Web Designer">MrQwest</a> ~ <a href="http://twitter.com/mrqwest" title="mrqwest on twitter">@mrqwest</a> with help from <a href="humans.txt" title="humans">these fine folk</a>! <a href="https://github.com/MrQwest/mixdown" title="Fork me on github">Fork me on Github</a></p>
	</footer>

	<script type="text/javascript" src="js/script.js"></script>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-1099002-21', 'mrqwest.co.uk');
	 	ga('send', 'pageview');
	</script>
	<?php $url = substr(str_replace(array('labs/mixdown/', '%20'), array('', '+'), $_SERVER['REQUEST_URI']), 1); if($url != '') { $sq = str_replace('+', ' ', $url); ?><script> 
		$('#search').val('<?= $sq ?>');
		loadMusic('<?= $sq ?>');
		history.replaceState('<?= $sq ?>', '"<?= $sq ?>" mixes ~ MixDown', '<?= $url ?>');	
	</script><?php } ?> 
</body>
</html>
