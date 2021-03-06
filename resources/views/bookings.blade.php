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
      <script src="/js/tablesort.min.js"></script>
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
              <li><a href="/#sponsors">Sponsors</a></li>          
        			<li><a href="/#feedback">Feedback</a></li>

      			</ul>
      			<ul id="nav-mobile" class="side-nav">
        			<li><a href="/booking">Book a Flight</a></li>
        			<li><a href="/#about">About</a></li>
        			<li><a href="/#charts">Charts</a></li>
        			<li><a href="/poker">Poker</a></li>
        			<li><a href="/#faq">FAQ</a></li>
              <li><a href="/#sponsors">Sponsors</a></li>
        			<li><a href="/#feedback">Feedback</a></li>

      			</ul>
      		<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
    		</div>
  		</nav>
  		</div>
      <div class="container">
        <h3>Bookings</h3>
        <h6>FAQ Below</h6>
        <p>Looking to have some fun? Either make a <b><a href="/custom-booking">custom booking</a></b> or choose from one of the pre-planned flights below. All pre-made flights are guaranteed to qualify for <a href="/poker">poker</a>.</p>
        <b>ALL TIMES ARE ZULU (EDT+4, PDT+7)</b>
        <table id="bookings-table" class="fid-box">
          <thead><th class="sort-default"><u>Dept. Time</u></th><th><u>Arr. Time</u></th><th><u>Flight No.</u></th><th><u>Departs</u></th><th><u>Destination</u></th><th><u>Status</u></th></thead>
          @foreach($flights as $flight)
          <tr><td>{{substr($flight->departure, 0, 5)}}z</td><td>{{substr($flight->arrival, 0, 5)}}z</td><td>{{$flight->callsign}}</td><td>{{$flight->departs}}</td><td>{{$flight->arrives}}</td>@if($flight->booked)
          <td class="booked">Booked</td>
          @else
          <td class="not-booked"><a href="/booking/{{$flight->hash}}">Bookable</a></td>
          @endif</tr>
          @endforeach
        </table>
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
        <p><b>A:</b>&nbsp;Anytime between now and thirty minutes prior to the booking's departure time on the day of Tea Party (Aug. 8)</p>
        <p><b>Q:</b>&nbsp;I don't like any of these flights, can I create my own booking?</p>
        <p><b>A:</b>&nbsp;Yes, but not yet. While you don't need a booking to fly, if you'd still like to have the booking swag, pilots will be allowed to create a booking starting in mid-June.</p>
        <p><b>Q:</b>&nbsp;I didn't get an email, what do I do?!</p>
        <p><b>A:</b>&nbsp;The hyper-webs can be a complex place, wait an hour, if you still get nothing, email <a href="mailto:events@bostonartcc.net">our events coordinator</a> with your flight number.</p>
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
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-63783867-1', 'auto');
  ga('send', 'pageview');

</script>
<script>
  var table = new Tablesort(document.getElementById('bookings-table'));
</script>

	<script>
		$(document).ready(function(){

			$('select').material_select();
			$(".button-collapse").sideNav();
			$('.menu').smint();
		});
	</script>
</html>