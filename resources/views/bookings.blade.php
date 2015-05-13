<html>
	<head>
		<title>Tea Party 2015</title>

		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
		<!-- Compiled and minified CSS -->
  		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/css/materialize.min.css">

  		<!-- Compiled and minified JavaScript -->
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/js/materialize.min.js"></script>
  		<script src="/js/jquery.smint.js"></script>
  		<link href='http://fonts.googleapis.com/css?family=Roboto+Slab|Open+Sans' rel='stylesheet' type='text/css'>
  		<link rel="stylesheet" href="/css/main.css">
      <link rel="stylesheet" href="/css/fids.css">
	</head>
	<body>
		<div class="navbar-fixed">
		<nav class="blue darken-1 menu" role="navigation">
    		<div class="nav-wrapper"><a id="logo-container" href="/" class="brand-logo left" style="margin-left:6%;">Tea Party 2015</a>
      			<ul class="right hide-on-med-and-down" style="margin-right:5%;">
        			<li><a href="/booking">Book a Flight</a></li>
        			<li><a href="/#about">About</a></li>
        			<li><a href="/#charts">Charts</a></li>
          		<li><a href="/poker">Poker</a></li>
        			<li><a href="/#faq">FAQ</a></li>
        			<li><a href="/#feedback">Feedback</a></li>

      			</ul>
      			<ul id="nav-mobile" class="side-nav">
        			<li><a href="/booking">Book a Flight</a></li>
        			<li><a href="/#about">About</a></li>
        			<li><a href="/#charts">Charts</a></li>
        			<li><a href="/poker">Poker</a></li>
        			<li><a href="/#faq">FAQ</a></li>
        			<li><a href="/#feedback">Feedback</a></li>

      			</ul>
      		<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
    		</div>
  		</nav>
  		</div>
      <div class="container">
        <h3>Bookings FAQ</h3>
        <p><b>Q:</b>&nbsp;Do I have to have a booking?</p>
        <p><b>A:</b>&nbsp;No, only if you want to qualify for airport poker do you need to have a booking.</p>
        <p><b>Q:</b>&nbsp;Can I make multiple bookings?</p>
        <p><b>A:</b>&nbsp;Of course, make as many bookings as you can fly!</p>
        <p><b>Q:</b>&nbsp;Do I have to fly at that time?</p>
        <p><b>A:</b>&nbsp;While not required, we ask that you try to depart within +/- 30 minutes of the scheduled departure time so we can plan for the traffic. If you are departing KBOS we recommend you sign on 25-35 minutes prior in case of delays.</p>
        <p><b>Q:</b>&nbsp;What is a booking?</p>
        <p><b>A:</b>&nbsp;A reserved flight. However, this does not reserve the callsign for you on VATSIM. Provided in the booking is a suggested departure time, route and cruise altitude to make your flight planning all the more simple.</p>
        <p><b>Q:</b>&nbsp;Who can make a booking?</p>
        <p><b>A:</b>&nbsp;Any VATSIM pilot or controller who is not a home member of the Boston ARTCC.</p>
        <p><b>Q:</b>&nbsp;When can I make a booking?</p>
        <p><b>A</b>&nbsp;Anytime between now and thirty minutes prior to the booking's departure time on the day of Tea Party (Aug. 8)</p>
        <h3>Bookings</h3>
        <table class="fid-box">
          <thead><th>Dept. Time</th><th>Arr. Time</th><th>Flight No.</th><th>Departs</th><th>Destination</th><th>Status</th></thead>
          @foreach($flights as $flight)
          <tr><td>{{$flight->departure}}</td><td>{{$flight->arrival}}</td><td>{{$flight->callsign}}</td><td>{{$flight->departs}}</td><td>{{$flight->arrives}}</td></tr>
          @endforeach
        </table>
      </div>
	</body>
	<footer class="page-footer blue darken-1">
	          <div class="container blue darken-1">
	            <div class="row">
	              <div class="col l6 s12">
	                <h5 class="white-text">About</h5>
	                <p class="grey-text text-lighten-4">Sixteen years running, Tea Party has been a staple of the Boston ARTCC. Come and join us in a spectacular afternoon of fun and ATC.</p>
	              </div>
	              <div class="col l4 offset-l2 s12">
	                <h5 class="white-text">Links</h5>
	                <ul>
	                  <li><a class="grey-text text-lighten-3" href="http://bostonartcc.net">Boston ARTCC</a></li>
	                  <li><a class="grey-text text-lighten-3" href="http://forums.bostonartcc.net/">Forums</a></li>
	                  <li><a class="grey-text text-lighten-3" href="http://vatusa.net">VATUSA</a></li>
	                  <li><a class="grey-text text-lighten-3" href="http://vatsim.net">VATSIM</a></li>
	                </ul>
	              </div>
	            </div>
	          </div>
	          <div class="footer-copyright blue darken-6">
	            <div class="container">
	            © 2015 Erik Partridge and the Virtual Boston ARTCC
	            </div>
	          </div>
	        </footer>
	<script>
		$(document).ready(function(){

			$('select').material_select();
			$(".button-collapse").sideNav();
			$('.menu').smint();
		});
	</script>
</html>