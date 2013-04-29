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
	<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.6.2.min.js"></script>

	<script src="http://connect.soundcloud.com/sdk.js"></script>
	<script>
	SC.initialize({
	  client_id: '91bd52531c9b150e11efac29abdb79eb'
	});

	var getMix = function(){

        var term = $('#search').val();

            SC.get('/tracks', { q: term, duration: { from: 1800000 } }, function(tracks) {
  console.log(tracks);
});

        return false;
   };

	</script>

	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, target-densitydpi=160dpi, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="css/style.css" media="all">
	<link href="webfonts/ss-standard.css" rel="stylesheet" /> <!-- <3 symbolset -->

</head>
<body>
	<h1>MixDown</h1>

	<form class="search" name="searchfield">
		<label class="ss-icon">Search</label>
		<input class="ss-icon ss-search" type="text" name="search" id="search" />
	</form>

	<div id="sc" class="sccontent">
	
	</div>

	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
