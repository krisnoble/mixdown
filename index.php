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

</head>
<body>
	<h1>MixDown</h1>

	<form class="search" name="searchfield" id="searchform">
		<label class="ss-icon">Search</label>
		<input class="ss-icon ss-search" type="text" name="search" id="search" />
	</form>

	<div id="sc" class="sccontent">

	</div>

	<footer>
		<p>Another lab project from <a href="http://mrqwest.co.uk" title="MrQwest - A Croydon Web Designer">MrQwest</a> ~ <a href="http://twitter.com/mrqwest" title="mrqwest on twitter">@mrqwest</a> with help from <a href="humans.txt" title="humans">these fine folk</a>!
	</footer>

	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
