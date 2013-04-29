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
		<input class="ss-icon ss-search" type="text" name="search" />
	</form>


	<?php
		// Lets display any errors - want to know what breaks MixDown
		// ini_set('display_errors', 'On');
		// error_reporting(E_ALL);

		// Grabbing the Soundcloud PHP helper thing
		require_once 'Services/Soundcloud.php';

		// create a client object with your app credentials
		$client = new Services_Soundcloud('91bd52531c9b150e11efac29abdb79eb', '5fc37f6ffc2af9a183cee5f5016aaa33');

		// search the API for the following.
		$tracks = $client->get(
			'tracks', array('q' => 'house', 'downloadable' => 'true', 'duration' > '1800000000'));

		// lets get that into json
		$json = file_get_contents($tracks, 0, null, null);

		// and lets decode that JSOn - not entirely sure these two steps are required?
		$data = json_decode($tracks);

		// for every result in the JSON results, form a new object $d
		foreach ( $data as $d ) {	
			// if the download_url endpoint exists, show the track
	    	if ($d->download_url == true) {
	    		// get the duration of the mix
	    		$u = $d->duration;
	    		if(($u/60) >= 60)
					{
					$u = mktime(0,($u / 360));
					}
					$timing = date('H:i:s',$u);

				// images served via SC are too small for me. They do have larger images
				// though, but these aren't served via the API - or at least, I couldn't
				// find out how. So str_replace to the rescue. remove 'large' from the
				// artwork_url endpoint and replace with t200x200 which will then provide
				// me with a 200x200 thumbnail. Fuck yeah!
				$img = $d->artwork_url;
				$thumb = str_replace("large", "t200x200", $img);

				// now to display the HTML that'll show each mix
	    		echo "<div class=track><a href={$d->permalink_url} alt='Permalink to {$d->title}'><img class=artwork src={$thumb} alt={$d->title} /></a>
	    		<div class='cleafix meta'>
	    			<h1>{$d->title}</h1>
	    			<p class='metadata'><span class='ss-icon'>Time</span> {$timing} | <span class='ss-icon'>play</span> {$d->playback_count} | <span class='ss-icon'>download</span> {$d->download_count}</p>
	    			<audio controls='controls' preload='none'>
					  <source src={$d->stream_url}?client_id=91bd52531c9b150e11efac29abdb79eb type='audio/mpeg'>
					Your browser does not support the audio element.
					</audio>
	    			<!-- download button -->
	    			<a href={$d->download_url}?client_id=91bd52531c9b150e11efac29abdb79eb class='ss-icon btn'>download</a>
	    			</div></div>";
			} else {
				// if download_url endpoint doesn't exist, show nothing.
			};
		}
		?>

	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
