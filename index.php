<!DOCTYPE HTML>

<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1"><![endif]-->
<!--[if lt IE 7 ]><html class="no-js ie6" lang="en"><![endif]-->
<!--[if IE 7 ]><html class="no-js ie7" lang="en"><![endif]-->
<!--[if IE 8 ]><html class="no-js ie8" lang="en"><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!-->
<html class="no-js" lang="en"><!--<![endif]-->

<head>
	<meta charset="UTF-8">
	<title>Brockout ~ A Better sort tool for SoundCloud</title>

	<!-- If JS is available, changes <html> class to js -->
	<script>
		var docElement = document.documentElement;
		docElement.className = docElement.className.replace(/\bno-js\b/,'') + ' js';
	</script>

	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, target-densitydpi=160dpi, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="css/style.css" media="all">
</head>
<body>
	<h1>BrockOut</h1>

	<?php
		ini_set('display_errors', 'On');
		error_reporting(E_ALL);
		require_once 'Services/Soundcloud.php';

		// create a client object with your app credentials
		$client = new Services_Soundcloud('91bd52531c9b150e11efac29abdb79eb', '5fc37f6ffc2af9a183cee5f5016aaa33');

		// find all sounds of buskers licensed under 'creative commons share alike'
		$tracks = $client->get(
			'tracks', array('q' => 'dubstep', 'downloadable' => 'true','duration' > '1800000000'));

		$json = file_get_contents($tracks, 0, null, null);

		$data = json_decode($tracks);


		foreach ( $data as $d ) {	
	    	if ($d->download_url == true) {
	    		// get the duration of the mix
	    		$u = $d->duration;
	    		if(($u/60) >= 60)
					{
					$u = mktime(0,($u / 360));
					}
					$timing = date('H:i:s',$u);

				$img = $d->artwork_url;
				$thumb = str_replace("large", "t200x200", $img);
	    		echo "<div class=track><img class=artwork src={$thumb} alt={$d->title} />
	    		<div class='cleafix meta'>
	    			<h1>{$d->title}</h1>
	    			<p>Duration: {$timing}</p>
	    			<p><a href={$d->permalink_url}>Perma</a>
	    			<a href={$d->download_url}?client_id=91bd52531c9b150e11efac29abdb79eb class=btn>download</a>
	    			</div></div>";
			} else {
				
			};
		}
		?>

	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
