/*! A fix for the iOS orientationchange zoom bug. Script by @scottjehl, rebound by @wilto.MIT / GPLv2 License.*/(function(a){function m(){d.setAttribute("content",g),h=!0}function n(){d.setAttribute("content",f),h=!1}function o(b){l=b.accelerationIncludingGravity,i=Math.abs(l.x),j=Math.abs(l.y),k=Math.abs(l.z),(!a.orientation||a.orientation===180)&&(i>7||(k>6&&j<8||k<8&&j>6)&&i>5)?h&&n():h||m()}var b=navigator.userAgent;if(!(/iPhone|iPad|iPod/.test(navigator.platform)&&/OS [1-5]_[0-9_]* like Mac OS X/i.test(b)&&b.indexOf("AppleWebKit")>-1))return;var c=a.document;if(!c.querySelector)return;var d=c.querySelector("meta[name=viewport]"),e=d&&d.getAttribute("content"),f=e+",maximum-scale=1",g=e+",maximum-scale=10",h=!0,i,j,k,l;if(!d)return;a.addEventListener("orientationchange",m,!1),a.addEventListener("devicemotion",o,!1)});(this);

SC.initialize({
	client_id: '91bd52531c9b150e11efac29abdb79eb'
});

function loadMusic(q)
{
$.get('https://api.soundcloud.com/tracks/?client_id=91bd52531c9b150e11efac29abdb79eb&format=json', { q: q, download_url: true, duration: { from: 1800000 }, limit: 20 }, function(tracks) {
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
		output += '<div class=track><a href='+tracks[i].permalink_url+' alt="Permalink to '+tracks[i].title+'"><img class=artwork src='+thumbs+' alt='+tracks[i].title+' /></a><div class="clearfix meta"><h1>'+tracks[i].title+'</h1><p class="metadata"><span class="ss-icon">Time</span>' +convertFromMS(tracks[i].duration) + ' | <span class="ss-icon">play</span> '+tracks[i].playback_count+' | <span class="ss-icon">download</span> '+tracks[i].download_count+'</p><audio controls="controls" preload="none"><source src='+tracks[i].stream_url+'?client_id=91bd52531c9b150e11efac29abdb79eb type="audio/mpeg">Your browser does not support the audio element.</audio><!-- download button --><a href='+tracks[i].download_url+'?client_id=91bd52531c9b150e11efac29abdb79eb class="ss-icon btn">download</a></div></div>';
	}
	$('#sc').html(output);
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
