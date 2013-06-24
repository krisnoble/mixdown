var tracks = "";

SC.initialize({
	client_id: '91bd52531c9b150e11efac29abdb79eb'
});

function loadMusic(q)
{
$.get('https://api.soundcloud.com/tracks/?client_id=91bd52531c9b150e11efac29abdb79eb&format=json', { q: q, download_count: {from: 10 }, duration: { from: 1800000 }, limit: 50 }, function(tracks) {


	// You pass the comparison function (comparer) to .sort
	// console.log(tracks.sort(comparer).reverse());

	console.log(tracks);

	// https://github.com/alihaberfield/journeymix/blob/master/assets/js/journeymix.js, // thanks Ali Haberfield!
	function convertFromMS(ms) {
		var d, h, m, s;
		s = Math.floor(ms / 1000);
		m = Math.floor(s / 60);
		s = s % 60;
		h = Math.floor(m / 60);
		m = m % 60;
		d = Math.floor(h / 24);
		h = h % 24;
		return "" + h + "hr :" + m + "mins";
	}

	var output = '';

	for (var i = 0; i < tracks.length; i++) {
		// grab the artwork URL and pop it in thumb
		var thumb = ((typeof tracks[i].artwork_url !== 'undefined' && tracks[i].artwork_url !== null) ? tracks[i].artwork_url : 'img/default.png');

		// replace large with t200x200 in thumb and pop the new val in thumbs
		var thumbs = thumb.replace('large', 't200x200');
		output += '<div class=track><a href='+tracks[i].permalink_url+' alt="Permalink to '+tracks[i].title+'"><img class=artwork src='+thumbs+' alt='+tracks[i].title+' /></a><div class="clearfix meta"><h1><a href='+tracks[i].permalink_url+' alt="Permalink to '+tracks[i].title+'">'+tracks[i].title+'</a></h1><p class="metadata"><span class="ss-icon">Time</span>' +convertFromMS(tracks[i].duration) + ' | <span class="ss-icon">play</span> '+tracks[i].playback_count+' | <span class="ss-icon">download</span> '+tracks[i].download_count+' | <span class="ss-icon">tag</span>'+tracks[i].genre+'</p><audio controls="controls" preload="none"><source src='+tracks[i].stream_url+'?client_id=91bd52531c9b150e11efac29abdb79eb type="audio/mpeg">Your browser does not support the audio element.</audio><!-- download button --><a href='+tracks[i].download_url+'?client_id=91bd52531c9b150e11efac29abdb79eb class="ss-icon btn">download</a></div></div>';
	}

	// Takes two elements of the array and compares them
	var comparer = function (a, b) {
		return a.duration - b.duration;
	};

	$(".sortlength a").on("click", function(event) {
		// TODO: REMOVE CONSOLE LOG AND MOVE THE SORTER INTO A VAR
		console.log(tracks.sort(comparer).reverse());
		event.preventDefault();
	});

	// THIS IS THE OUTPUT, It takes the output var and stuffs it into #sc.
	$('#sc').html(output);


})
.fail(function() {
	// This fail function fires if the .get encounters a problem - might be nice to put something on the page otherwise its just blank. Search 'indie' for an example
	console.log("There was an error retriving the results");
	// TODO: Remove the linebreaks and style text
	$('#sc').html('<br /><br /><p>Oops, no one has added anything to Soundcloud that matches your search.</p>');
});
}


$('#searchform').submit(function() {
	$("#search").keyup(function () {
      var sq = $(this).val();
      console.log(sq);
      $('footer').css( "position", "relative" );
      loadMusic(sq);
    }).keyup();
	return false;
});


